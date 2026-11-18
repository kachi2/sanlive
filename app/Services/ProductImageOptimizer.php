<?php

namespace App\Services;

use Intervention\Image\Facades\Image;
use Throwable;

/**
 * Creates small WebP copies of product images for fast mobile loading.
 *
 *   public/images/products/{file}                 original (untouched)
 *   public/images/products/webp/card/{name}.webp  300px – listings, cart, related
 *   public/images/products/webp/full/{name}.webp  600px – product page main image
 *
 * Views use productImage($file, 'card'|'full'), which falls back to the
 * original when the WebP copy doesn't exist yet.
 */
class ProductImageOptimizer
{
    public const SIZES = ['card' => 300, 'full' => 600];
    public const QUALITY = 80;

    private const EXTENSIONS = ['jpg', 'jpeg', 'png', 'webp'];

    public static function webpRelativePath(string $file, string $size): string
    {
        return 'images/products/webp/' . $size . '/' . pathinfo($file, PATHINFO_FILENAME) . '.webp';
    }

    /**
     * Generate the WebP copies for one product image.
     * Returns the number of files written (0 if skipped or already present).
     */
    public function optimize(string $file, bool $force = false): int
    {
        $source = public_path('images/products/' . $file);
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        if ($file === '' || !is_file($source) || !in_array($ext, self::EXTENSIONS, true)) {
            return 0;
        }

        $written = 0;
        foreach (self::SIZES as $size => $px) {
            $target = public_path(self::webpRelativePath($file, $size));
            if (!$force && is_file($target)) {
                continue;
            }
            if (!is_dir(dirname($target))) {
                mkdir(dirname($target), 0755, true);
            }

            try {
                $img = Image::make($source);
                $img->resize($px, $px, function ($c) {
                    $c->aspectRatio();
                    $c->upsize();
                })->encode('webp', self::QUALITY)->save($target);
                $img->destroy();
                $written++;
            } catch (Throwable $e) {
                report($e);
            }
        }

        return $written;
    }
}
