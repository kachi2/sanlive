<?php

namespace App\Services;

use Intervention\Image\Facades\Image;
use Throwable;

/**
 * Creates a WebP copy of each product image at the SAME width/height (no resizing,
 * so no blur) for faster loading:
 *
 *   public/images/products/{file}              original (untouched, URL unchanged)
 *   public/images/products/webp/{file}.webp    WebP copy, e.g. "aquacef.png.webp"
 *
 * Pages keep using the original URL. A rule in public/.htaccess serves the WebP
 * copy at that same URL to browsers that support WebP; others get the original.
 */
class ProductImageOptimizer
{
    public const QUALITY = 85;

    private const EXTENSIONS = ['jpg', 'jpeg', 'png'];

    public static function webpPath(string $file): string
    {
        return public_path('images/products/webp/' . $file . '.webp');
    }

    /**
     * Create the WebP copy for one product image.
     * Returns true if a copy was written.
     */
    public function optimize(string $file, bool $force = false): bool
    {
        $source = public_path('images/products/' . $file);
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        if ($file === '' || !is_file($source) || !in_array($ext, self::EXTENSIONS, true)) {
            return false;
        }

        $target = self::webpPath($file);
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
