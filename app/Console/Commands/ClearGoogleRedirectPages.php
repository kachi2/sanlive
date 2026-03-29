<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Product;
use App\Services\GoogleIndexingService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Vinkla\Hashids\Facades\Hashids;

/**
 * Automatically submits URL_DELETED for old redirect URLs and URL_UPDATED for
 * canonical URLs to the Google Indexing API, obeying the 200-requests/day quota
 * by tracking progress in storage/app/google-indexing-progress.json and
 * resuming from where the last run left off.
 *
 * Scheduled daily via App\Console\Kernel — just set up the service account key
 * and ensure your server's cron runs: * * * * * php /path/to/artisan schedule:run
 *
 * Manual usage:
 *   php artisan google:clear-redirects              — run next batch of 200
 *   php artisan google:clear-redirects --limit=50   — run smaller batch
 *   php artisan google:clear-redirects --reset      — clear saved progress and start over
 */
class ClearGoogleRedirectPages extends Command
{
    protected $signature   = 'google:clear-redirects
                                {--limit=200 : Max URLs to send per run (Google quota is 200/day)}
                                {--reset     : Clear saved progress and restart from the beginning}';

    protected $description = 'Daily: submit URL_DELETED for old redirect URLs then URL_UPDATED for canonical URLs (resumes from last position)';

    /** Where progress is stored between runs */
    protected string $progressFile = 'google-indexing-progress.json';

    public function handle(GoogleIndexingService $indexing): int
    {
        $limit   = (int) $this->option('limit');
        $baseUrl = rtrim(config('app.url'), '/');

        // ── Build the full ordered work queue ──────────────────────────────
        $allUrls = $this->buildUrlQueue($baseUrl);
        $total   = count($allUrls);

        // ── Handle --reset ──────────────────────────────────────────────────
        if ($this->option('reset')) {
            Storage::delete($this->progressFile);
            $this->info("Progress reset. Will start from the beginning on next run.");
        }

        // ── Load saved progress ─────────────────────────────────────────────
        $progress = $this->loadProgress();
        $offset   = $progress['offset'] ?? 0;
        $done     = $progress['done']   ?? 0;
        $errors   = $progress['errors'] ?? 0;

        if ($offset >= $total) {
            $this->info("✅ All {$total} URLs have already been submitted ({$done} sent, {$errors} failed).");
            $this->info("   Run with --reset to start over.");
            return self::SUCCESS;
        }

        $remaining = $total - $offset;
        $batch     = array_slice($allUrls, $offset, $limit);
        $batchSize = count($batch);

        $this->newLine();
        $this->line("<fg=cyan>Google Indexing — Daily Batch</>");
        $this->line("  Total URLs : {$total}");
        $this->line("  Already sent : {$offset} (approx)");
        $this->line("  This batch : {$batchSize}");
        $this->line("  Remaining after this run : " . max(0, $remaining - $batchSize));
        $this->newLine();

        // ── Progress bar ────────────────────────────────────────────────────
        $bar = $this->output->createProgressBar($batchSize);
        $bar->setFormat(" %current%/%max% [%bar%] %percent:3s%% — ✓ %message%");
        $bar->setMessage("starting...");
        $bar->start();

        $batchSuccess = 0;
        $batchFailed  = 0;
        $firstError   = null;

        foreach ($batch as $item) {
            $result = $item['type'] === 'URL_DELETED'
                ? $indexing->notifyDeleted($item['url'])
                : $indexing->notifyUpdated($item['url']);

            if (isset($result['error'])) {
                $batchFailed++;
                $firstError ??= $result['error'];
            } else {
                $batchSuccess++;
            }

            $bar->setMessage("sent {$batchSuccess}, failed {$batchFailed}");
            $bar->advance();
            usleep(100000); // 100ms — stays well within rate limits
        }

        $bar->finish();
        $this->newLine();

        // ── Save progress ───────────────────────────────────────────────────
        $newOffset = $offset + $batchSize;
        $this->saveProgress([
            'offset'       => $newOffset,
            'done'         => $done + $batchSuccess,
            'errors'       => $errors + $batchFailed,
            'total'        => $total,
            'last_run'     => now()->toDateTimeString(),
            'completed'    => $newOffset >= $total,
        ]);

        // ── Summary ─────────────────────────────────────────────────────────
        $this->newLine();
        $this->info("  ✓ Sent this run  : {$batchSuccess}");

        if ($batchFailed > 0) {
            $this->warn("  ✗ Failed this run: {$batchFailed}");
            if ($firstError) {
                $errorText = is_array($firstError)
                    ? json_encode($firstError, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
                    : $firstError;
                $this->error("  First error: {$errorText}");
            }
        }

        if ($newOffset >= $total) {
            $this->newLine();
            $this->info("🎉 All {$total} URLs have now been submitted!");
            $this->info("   Run --reset if you want to resubmit everything.");
        } else {
            $leftover = $total - $newOffset;
            $daysLeft = ceil($leftover / $limit);
            $this->newLine();
            $this->line("  Progress saved. {$leftover} URLs remaining (~{$daysLeft} more daily run(s)).");
        }

        return self::SUCCESS;
    }

    // ──────────────────────────────────────────────────────────────────────────
    // Build the full ordered queue: DELETE old URLs first, then UPDATE canonical
    // ──────────────────────────────────────────────────────────────────────────
    protected function buildUrlQueue(string $baseUrl): array
    {
        $queue = [];

        $products   = Product::whereNotNull('slug')->where('slug', '!=', '')->get();
        $categories = Category::whereNotNull('slug')->where('slug', '!=', '')->get();

        // Phase 1 — URL_DELETED: every old URL pattern Google may have indexed
        foreach ($products as $product) {
            $hashid   = Hashids::connection('products')->encode($product->id);
            $nameSlug = Str::slug($product->name);

            $queue[] = ['type' => 'URL_DELETED', 'url' => "{$baseUrl}/products/{$hashid}/{$nameSlug}"];
            $queue[] = ['type' => 'URL_DELETED', 'url' => "{$baseUrl}/products/{$hashid}/undefined"];
            $queue[] = ['type' => 'URL_DELETED', 'url' => "{$baseUrl}/index.php/products/{$hashid}/{$nameSlug}"];
            $queue[] = ['type' => 'URL_DELETED', 'url' => "{$baseUrl}/index.php/products/{$product->slug}"];
        }

        foreach ($categories as $category) {
            $hashid = Hashids::connection('products')->encode($category->id);
            $queue[] = ['type' => 'URL_DELETED', 'url' => "{$baseUrl}/catalogs/{$hashid}"];
            $queue[] = ['type' => 'URL_DELETED', 'url' => "{$baseUrl}/index.php/catalogs/{$hashid}"];
        }

        // Phase 2 — URL_UPDATED: all current canonical URLs
        foreach ($products as $product) {
            $queue[] = ['type' => 'URL_UPDATED', 'url' => "{$baseUrl}/products/{$product->slug}"];
        }
        foreach ($categories as $category) {
            $queue[] = ['type' => 'URL_UPDATED', 'url' => "{$baseUrl}/catalogs/{$category->slug}"];
        }
        foreach ([
            '/', '/pages/about', '/pages/terms', '/pages/privacypolicy',
            '/pages/contactus', '/blogs', '/faq', '/page/services',
        ] as $path) {
            $queue[] = ['type' => 'URL_UPDATED', 'url' => $baseUrl . $path];
        }

        return $queue;
    }

    // ──────────────────────────────────────────────────────────────────────────
    // Progress persistence (storage/app/google-indexing-progress.json)
    // ──────────────────────────────────────────────────────────────────────────
    protected function loadProgress(): array
    {
        if (!Storage::exists($this->progressFile)) {
            return [];
        }
        return json_decode(Storage::get($this->progressFile), true) ?? [];
    }

    protected function saveProgress(array $data): void
    {
        Storage::put($this->progressFile, json_encode($data, JSON_PRETTY_PRINT));
    }
}
