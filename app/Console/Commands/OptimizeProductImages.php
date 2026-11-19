<?php

namespace App\Console\Commands;

use App\Services\ProductImageOptimizer;
use Illuminate\Console\Command;

/**
 * Creates a full-size WebP copy of every product, slider and category image
 * (same dimensions, no blur). Image URLs on the site do not change:
 * public/.htaccess serves the WebP copy at the original URL to browsers that
 * support it. Safe to re-run.
 *
 *   php artisan images:optimize-products                    — all folders, missing copies only
 *   php artisan images:optimize-products --folder=sliders   — one folder
 *   php artisan images:optimize-products --force            — regenerate all copies
 */
class OptimizeProductImages extends Command
{
    protected $signature = 'images:optimize-products
                            {--folder= : Only this folder (products, sliders or category)}
                            {--force : Regenerate copies that already exist}';

    protected $description = 'Create full-size WebP copies of product, slider and category images (served at the original URL via .htaccess)';

    public function handle(ProductImageOptimizer $optimizer): int
    {
        ini_set('memory_limit', '512M');

        $folders = $this->option('folder') ? [$this->option('folder')] : ProductImageOptimizer::FOLDERS;

        foreach ($folders as $folder) {
            if (!in_array($folder, ProductImageOptimizer::FOLDERS, true)) {
                $this->error("Unknown folder '{$folder}'. Use: " . implode(', ', ProductImageOptimizer::FOLDERS));
                return self::FAILURE;
            }

            $dir = public_path('images/' . $folder);
            if (!is_dir($dir)) {
                $this->warn("Skipping {$folder}: folder not found.");
                continue;
            }

            $files = array_values(array_filter(scandir($dir), fn ($f) => is_file($dir . '/' . $f)));
            $this->line("<info>{$folder}</info> (" . count($files) . ' files)');

            $bar = $this->output->createProgressBar(count($files));
            $written = 0;
            foreach ($files as $file) {
                if ($optimizer->optimize($file, (bool) $this->option('force'), $folder)) {
                    $written++;
                }
                $bar->advance();
            }
            $bar->finish();
            $this->newLine();
            $this->info("  {$written} WebP copies written to public/images/{$folder}/webp/");
        }

        return self::SUCCESS;
    }
}
