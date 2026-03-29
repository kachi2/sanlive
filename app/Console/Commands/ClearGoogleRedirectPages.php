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
    protected $signature   = 'google:clear-redirects {--only= : Run only "delete" or "update"}';
    protected $description = 'Submit URL_DELETED for old redirect URLs and URL_UPDATED for canonical URLs to Google Indexing API';

    public function handle(GoogleIndexingService $indexing): int
    {
        $only    = $this->option('only');
        $baseUrl = rtrim(config('app.url'), '/');

        $products   = Product::whereNotNull('slug')->where('slug', '!=', '')->get();
        $categories = Category::whereNotNull('slug')->where('slug', '!=', '')->get();

        $deleteUrls = [];
        $updateUrls = [];

        // ── Build old (redirect) URL patterns ──────────────────────────────
        foreach ($products as $product) {
            $hashid    = Hashids::connection('products')->encode($product->id);
            $nameSlug  = Str::slug($product->name);

            // Pattern 1: /products/{hashid}/{slug}  (original format)
            $deleteUrls[] = "{$baseUrl}/products/{$hashid}/{$nameSlug}";

            // Pattern 2: /products/{hashid}/undefined  (the Vue bug that caused undefined slugs)
            $deleteUrls[] = "{$baseUrl}/products/{$hashid}/undefined";

            // Pattern 3: /index.php/products/{hashid}/{slug}  (index.php prefix)
            $deleteUrls[] = "{$baseUrl}/index.php/products/{$hashid}/{$nameSlug}";

            // Pattern 4: /index.php/products/{slug}  (index.php prefix on clean slug)
            $deleteUrls[] = "{$baseUrl}/index.php/products/{$product->slug}";
        }

        foreach ($categories as $category) {
            $hashid = Hashids::connection('products')->encode($category->id);

            // Pattern: /catalogs/{hashid}  (old hashid-based category URL)
            $deleteUrls[] = "{$baseUrl}/catalogs/{$hashid}";

            // Pattern: /index.php/catalogs/{hashid}
            $deleteUrls[] = "{$baseUrl}/index.php/catalogs/{$hashid}";
        }

        // ── Build canonical (current correct) URLs ─────────────────────────
        foreach ($products as $product) {
            $updateUrls[] = "{$baseUrl}/products/{$product->slug}";
        }

        foreach ($categories as $category) {
            $updateUrls[] = "{$baseUrl}/catalogs/{$category->slug}";
        }

        // Static pages
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

        // ── Submit ─────────────────────────────────────────────────────────
        if ($only !== 'update') {
            $this->info('Submitting URL_DELETED for ' . count($deleteUrls) . ' old redirect URLs...');
            $deletePayload = array_fill_keys($deleteUrls, 'URL_DELETED');
            $deleteResults = $indexing->submitBatch($deletePayload);
            $this->info('  ✓ Deleted successfully: ' . count($deleteResults['success']));
            if (!empty($deleteResults['failed'])) {
                $this->warn('  ✗ Failed: ' . count($deleteResults['failed']));
                foreach ($deleteResults['failed'] as $f) {
                    $this->line("    {$f['url']} → {$f['error']}");
                }
            }
        }

        if ($only !== 'delete') {
            $this->info('Submitting URL_UPDATED for ' . count($updateUrls) . ' canonical URLs...');
            $updatePayload = array_fill_keys($updateUrls, 'URL_UPDATED');
            $updateResults = $indexing->submitBatch($updatePayload);
            $this->info('  ✓ Updated successfully: ' . count($updateResults['success']));
            if (!empty($updateResults['failed'])) {
                $this->warn('  ✗ Failed: ' . count($updateResults['failed']));
                foreach ($updateResults['failed'] as $f) {
                    $this->line("    {$f['url']} → {$f['error']}");
                }
            }
        }

        $this->info('Done.');
        return self::SUCCESS;
    }
}
