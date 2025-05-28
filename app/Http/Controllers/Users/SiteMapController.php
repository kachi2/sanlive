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
        $staticRoutes = [
            '/',
            '/dashboard',
            '/products',
            '/carts/index',
            '/checkout',
            '/checkout/address/index',
            '/account/orders',
            '/account/address',
            '/accounts/index',
            '/accounts/settings',
            '/account/recent/products',
            '/account/order/payments',
            '/pages/about',
            '/pages/terms',
            '/pages/privacypolicy',
            '/pages/contactus',
            '/upload/prescription',
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
        addHashId($categories);
        
        foreach($categories as $category)
        {
            $sitemap->add(Url::create("catalogs/$category->slug")
            ->setLastModificationDate($category->updated_at)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.8));
    }


        $Product = Product::all();
        foreach ($Product as $product) {
            $sitemap->add(Url::create("products/$product->slug")
                ->setLastModificationDate($product->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8));
        }
        foreach (Blog::all() as $blog) {
            $ids = encrypt($blog->id);
            $sitemap->add(
                Url::create("/blogs/details/$ids")
                    ->setLastModificationDate($blog->updated_at)
                    ->setPriority(0.7)
            );
        }
        return response($sitemap->render())
        ->header('Content-Type', 'application/xml');
    }
}

