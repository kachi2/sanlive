<?php

namespace App\Services;

use Intervention\Image\Facades\Image;
use Throwable;

/**
 * Creates a WebP copy of each image at the SAME width/height (no resizing,
 * so no blur) for faster loading. Works for these folders under public/images/:
 *
 *   images/{folder}/{file}              original (untouched, URL unchanged)
 *   images/{folder}/webp/{file}.webp    WebP copy, e.g. "aquacef.png.webp"
 *
 * Pages keep using the original URL. A rule in public/.htaccess serves the WebP
 * copy at that same URL to browsers that support WebP; others get the original.
 */
class ProductImageOptimizer
{
    /** Folders under public/images/ that get WebP copies (must match public/.htaccess). */
    public const FOLDERS = ['products', 'sliders', 'category'];

    public const QUALITY = 85;

    private const EXTENSIONS = ['jpg', 'jpeg', 'png'];

    public static function webpPath(string $file, string $folder = 'products'): string
    {
        return public_path('images/' . $folder . '/webp/' . $file . '.webp');
    }

    /**
     * Create the WebP copy for one image.
     * Returns true if a copy was written.
     */
    public function optimize(string $file, bool $force = false, string $folder = 'products'): bool
    {
        $source = public_path('images/' . $folder . '/' . $file);
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        if ($file === '' || !is_file($source) || !in_array($ext, self::EXTENSIONS, true)) {
            return false;
        }

        $target = self::webpPath($file, $folder);
        if (!$force && is_file($target)) {
            return false;
        }
        if (!is_dir(dirname($target))) {
            mkdir(dirname($target), 0755, true);
        }

        try {
            $img = Image::make($source);           // no resize: same dimensions as the original
            $img->encode('webp', self::QUALITY)->save($target);
            $img->destroy();
        } catch (Throwable $e) {
            report($e);
            return false;
        }

        // Only keep the copy if it actually saves bytes; otherwise the original is served.
        if (filesize($target) >= filesize($source)) {
            @unlink($target);
            return false;
        }

        return true;
    }
}
