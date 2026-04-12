<?php

namespace App\Providers;
use App\Interfaces\paymentInterface;
use App\Models\AdminNotification;
use App\Models\Advert;
use App\Models\Annoucement;
use App\Models\Menu;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Notification;
use App\Services\paymentServices;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Vinkla\Hashids\Facades\Hashids;


use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->bind(paymentInterface::class, paymentServices::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view::composer('*', function($view) {
            // Static flag ensures these queries run only ONCE per request,
            // no matter how many blade partials are rendered.
            static $shared;

            if (!isset($shared)) {
                $shared = [
                    'settings'      => Cache::remember('site_settings', 3600, function() { return Setting::latest()->first(); }),
                    'categories'    => Cache::remember('site_categories', 300,  function() { return Category::inRandomOrder()->get(); }),
                    'site_menu'     => Cache::remember('site_menu', 3600,       function() { return Menu::get(); }),
                    'advert_top'    => Cache::remember('advert_top', 3600,      function() { return Advert::where('placement', 'top')->first(); }),
                    'announcment'   => Cache::remember('site_announcement', 600, function() { return Annoucement::latest()->first(); }),
                    'unread_notify' => Cache::remember('admin_notifications', 60, function() { return AdminNotification::latest()->take(50)->get(); }),
                    // Cart is session-based (per-user) — never cache globally
                    'cartItem'      => \Cart::getTotalQuantity(),
                ];
            }

            foreach ($shared as $key => $value) {
                $view->with($key, $value);
            }
       });

    //    Inertia::share('settings', function(){ return Setting::latest()->first();  });
     
       // View::share('announcment', Annoucement::first());
       // View::share('settings', function(){ return Setting::latest()->first();
       // });
       // View::share('site_menu', Menu::get());
       // View::share('advert_top', Advert::where('placement', 'top')->first());
       // View::share('unread_notify', AdminNotification::latest()->get());
       // $categories = Category::inRandomOrder()->get();
       // foreach($categories as $cat){
       //     addHashId($cat->products);
       //     $cat->hashid = Hashids::connection('products')->encode($cat->id);
       // }
       // View::share('site_categories', $categories);
    }
}
