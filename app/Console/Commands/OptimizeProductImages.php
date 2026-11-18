<?php

namespace App\Console\Commands;

use App\Services\ProductImageOptimizer;
use Illuminate\Console\Command;

/**
 * Creates a full-size WebP copy of every product image (same dimensions, no blur).
 * Image URLs on the site do not change: public/.htaccess serves the WebP copy at
 * the original URL to browsers that support it. Safe to re-run.
 *
 *   php artisan images:optimize-products           — only creates missing copies
 *   php artisan images:optimize-products --force   — regenerate all copies
 */
class OptimizeProductImages extends Command
{
    protected $signature = 'images:optimize-products {--force : Regenerate copies that already exist}';

    protected $description = 'Create full-size WebP copies of product images (served at the original URL via .htaccess)';

    public function handle(ProductImageOptimizer $optimizer): int
    {
        ini_set('memory_limit', '512M');

        $dir = public_path('images/products');
        $files = array_values(array_filter(scandir($dir), fn ($f) => is_file($dir . '/' . $f)));

        $bar = $this->output->createProgressBar(count($files));
        $written = 0;

        foreach ($files as $file) {
            if ($optimizer->optimize($file, (bool) $this->option('force'))) {
                $written++;
            }
            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info("Done. {$written} WebP copies written to public/images/products/webp/.");

        return self::SUCCESS;
    }
}
