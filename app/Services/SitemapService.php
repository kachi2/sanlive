<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapService
{
    /**
     * Generate the sitemap, write it to public/sitemap.xml,
     * and notify Google that the sitemap has been updated.
     */
    public function generate(): void
    {
        $sitemap = Sitemap::create();

        // Static public pages
        $staticRoutes = [
            '/',
            '/pages/about',
            '/pages/terms',
            '/pages/privacypolicy',
            '/pages/contactus',
            '/blogs',
            '/faq',
            '/page/services',
        ];

        foreach ($staticRoutes as $route) {
            $sitemap->add(
                Url::create($route)
                    ->setLastModificationDate(Carbon::now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.8)
            );
        }

        // Category pages
        foreach (Category::all() as $category) {
            $sitemap->add(
                Url::create("/catalogs/{$category->slug}")
                    ->setLastModificationDate($category->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.8)
            );
        }

        // Product pages
        foreach (Product::whereNotNull('slug')->where('slug', '!=', '')->get() as $product) {
            $sitemap->add(
                Url::create("/products/{$product->slug}")
                    ->setLastModificationDate($product->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.8)
            );
        }

        // Blog pages
        foreach (Blog::whereNotNull('slug')->where('slug', '!=', '')->get() as $blog) {
            $sitemap->add(
                Url::create("/blogs/{$blog->slug}")
                    ->setLastModificationDate($blog->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.7)
            );
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->pingGoogle();
    }

    /**
     * Notify Google that the sitemap has been updated.
     */
    public function pingGoogle(): void
    {
        $sitemapUrl = rtrim(config('app.url'), '/') . '/sitemap.xml';

        try {
            $response = Http::timeout(10)->get('https://www.google.com/ping', [
                'sitemap' => $sitemapUrl,
            ]);

            if ($response->successful()) {
                Log::info('Google sitemap ping successful.', ['sitemap' => $sitemapUrl]);
            } else {
                Log::warning('Google sitemap ping returned non-2xx.', [
                    'sitemap' => $sitemapUrl,
                    'status'  => $response->status(),
                ]);
            }
        } catch (\Throwable $e) {
            Log::error('Google sitemap ping failed.', [
                'sitemap' => $sitemapUrl,
                'error'   => $e->getMessage(),
            ]);
        }
    }
}
