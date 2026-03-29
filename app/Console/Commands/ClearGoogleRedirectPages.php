<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Product;
use App\Services\GoogleIndexingService;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Vinkla\Hashids\Facades\Hashids;

/**
 * Usage:
 *   php artisan google:clear-redirects              — delete old URLs + update canonical URLs
 *   php artisan google:clear-redirects --only=delete — only send URL_DELETED for old patterns
 *   php artisan google:clear-redirects --only=update — only send URL_UPDATED for canonical URLs
 *
 * Prerequisites:
 *   1. Download your Google Service Account JSON key from Google Cloud Console.
 *   2. Add the service account email as an OWNER in Google Search Console
 *      (Settings → Users and Permissions).
 *   3. Save the key to:  storage/app/google-service-account.json
 *      OR set GOOGLE_SERVICE_ACCOUNT_KEY_PATH=/full/path/to/key.json in your .env
 *
 * Note: Google Indexing API default quota is 200 requests/day per property.
 * Run in batches if you have more than 200 URLs (the command handles this automatically).
 */
class ClearGoogleRedirectPages extends Command
{
    protected $signature   = 'google:clear-redirects {--only= : Run only "delete" or "update"} {--limit=200 : Max URLs to send per run (Google quota is 200/day)}';
    protected $description = 'Submit URL_DELETED for old redirect URLs and URL_UPDATED for canonical URLs to Google Indexing API';

    public function handle(GoogleIndexingService $indexing): int
    {
        $only    = $this->option('only');
        $limit   = (int) $this->option('limit');
        $baseUrl = rtrim(config('app.url'), '/');

        $products   = Product::whereNotNull('slug')->where('slug', '!=', '')->get();
        $categories = Category::whereNotNull('slug')->where('slug', '!=', '')->get();

        $deleteUrls = [];
        $updateUrls = [];

        // ── Build old (redirect) URL patterns ──────────────────────────────
        foreach ($products as $product) {
            $hashid   = Hashids::connection('products')->encode($product->id);
            $nameSlug = Str::slug($product->name);

            $deleteUrls[] = "{$baseUrl}/products/{$hashid}/{$nameSlug}";
            $deleteUrls[] = "{$baseUrl}/products/{$hashid}/undefined";
            $deleteUrls[] = "{$baseUrl}/index.php/products/{$hashid}/{$nameSlug}";
            $deleteUrls[] = "{$baseUrl}/index.php/products/{$product->slug}";
        }

        foreach ($categories as $category) {
            $hashid = Hashids::connection('products')->encode($category->id);
            $deleteUrls[] = "{$baseUrl}/catalogs/{$hashid}";
            $deleteUrls[] = "{$baseUrl}/index.php/catalogs/{$hashid}";
        }

        // ── Build canonical (current correct) URLs ─────────────────────────
        foreach ($products as $product) {
            $updateUrls[] = "{$baseUrl}/products/{$product->slug}";
        }
        foreach ($categories as $category) {
            $updateUrls[] = "{$baseUrl}/catalogs/{$category->slug}";
        }
        $updateUrls = array_merge($updateUrls, [
            $baseUrl . '/',
            $baseUrl . '/pages/about',
            $baseUrl . '/pages/terms',
            $baseUrl . '/pages/privacypolicy',
            $baseUrl . '/pages/contactus',
            $baseUrl . '/blogs',
            $baseUrl . '/faq',
            $baseUrl . '/page/services',
        ]);

        // ── Warn if over daily quota ────────────────────────────────────────
        $total = ($only === 'update' ? 0 : count($deleteUrls))
               + ($only === 'delete' ? 0 : count($updateUrls));

        if ($total > 200) {
            $this->warn("⚠  Google Indexing API default quota is 200 requests/day.");
            $this->warn("   You have {$total} URLs total. Only the first {$limit} will be sent.");
            $this->warn("   Run again tomorrow (or request a quota increase in Google Cloud Console).");
            $this->newLine();
        }

        // ── Submit with progress bar ────────────────────────────────────────
        if ($only !== 'update') {
            $this->submitWithProgress($indexing, array_slice($deleteUrls, 0, $limit), 'URL_DELETED', 'Clearing old redirect URLs');
        }

        if ($only !== 'delete') {
            $remaining = $limit - ($only === 'update' ? 0 : min(count($deleteUrls), $limit));
            if ($remaining > 0) {
                $this->submitWithProgress($indexing, array_slice($updateUrls, 0, $remaining), 'URL_UPDATED', 'Submitting canonical URLs');
            }
        }

        $this->newLine();
        $this->info('Done. Check storage/logs/laravel.log for any API errors.');
        return self::SUCCESS;
    }

    // ──────────────────────────────────────────────────────────────────────────
    // Helper: submit a list of URLs with a live progress bar
    // ──────────────────────────────────────────────────────────────────────────
    protected function submitWithProgress(GoogleIndexingService $indexing, array $urls, string $type, string $label): void
    {
        $total   = count($urls);
        $success = 0;
        $failed  = 0;

        $this->newLine();
        $this->line("<fg=cyan>{$label}</> ({$total} URLs, type: {$type})");

        $bar = $this->output->createProgressBar($total);
        $bar->setFormat(" %current%/%max% [%bar%] %percent:3s%% — ✓ %message%");
        $bar->setMessage("starting...");
        $bar->start();

        foreach ($urls as $url) {
            $result = $type === 'URL_DELETED'
                ? $indexing->notifyDeleted($url)
                : $indexing->notifyUpdated($url);

            if (isset($result['error'])) {
                $failed++;
            } else {
                $success++;
            }

            $bar->setMessage("sent {$success}, failed {$failed}");
            $bar->advance();

            // Respect rate limit: ~1 req/sec is safe within Google's quota
            usleep(100000); // 100ms between requests
        }

        $bar->finish();
        $this->newLine();

        $this->info("  ✓ Sent successfully: {$success}");
        if ($failed > 0) {
            $this->warn("  ✗ Failed: {$failed} — see storage/logs/laravel.log for details");
        }
    }
}
