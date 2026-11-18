<?php

namespace App\Console\Commands;

use App\Services\ProductImageOptimizer;
use Illuminate\Console\Command;

/**
 * One-off (and safe to re-run): creates 300px and 600px WebP copies of every
 * product image so mobile pages load small files instead of the originals.
 *
 *   php artisan images:optimize-products           — only creates missing copies
 *   php artisan images:optimize-products --force   — regenerate all copies
 */
class OptimizeProductImages extends Command
{
    protected $signature = 'images:optimize-products {--force : Regenerate copies that already exist}';

    protected $description = 'Create small WebP copies of product images for faster mobile pages';

    public function handle(ProductImageOptimizer $optimizer): int
    {
        ini_set('memory_limit', '512M');

        $dir = public_path('images/products');
        $files = array_values(array_filter(scandir($dir), fn ($f) => is_file($dir . '/' . $f)));

        $bar = $this->output->createProgressBar(count($files));
        $written = 0;

        foreach ($files as $file) {
            $written += $optimizer->optimize($file, (bool) $this->option('force'));
            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info("Done. {$written} WebP files written to public/images/products/webp/.");

        return self::SUCCESS;
    }
}
