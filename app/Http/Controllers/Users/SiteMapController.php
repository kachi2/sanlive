<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Spatie\Sitemap\Tags\Url;
use App\Models\Product;
use Spatie\Sitemap\Sitemap;
use Carbon\Carbon;

class SiteMapController extends Controller
{
    public function SiteMap()
    {
        $sitemap = Sitemap::create();

        // Only public-facing, indexable static pages
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
        $categories = Category::all();

        foreach($categories as $category)
        {
            $sitemap->add(Url::create("catalogs/$category->slug")
            ->setLastModificationDate($category->updated_at)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.8));
    }


        $Product = Product::whereNotNull('slug')->where('slug', '!=', '')->get();
        foreach ($Product as $product) {
            $sitemap->add(Url::create("products/$product->slug")
                ->setLastModificationDate($product->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8));
        }
        foreach (Blog::whereNotNull('slug')->where('slug', '!=', '')->get() as $blog) {
            $sitemap->add(
                Url::create("/blogs/{$blog->slug}")
                    ->setLastModificationDate($blog->updated_at)
                    ->setPriority(0.7)
            );
        }
          $sitemap->writeToFile(public_path('sitemap.xml'));

         return response($sitemap->render(), 200)
        ->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}

