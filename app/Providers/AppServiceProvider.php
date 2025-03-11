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
use Illuminate\Support\Facades\View;
use Vinkla\Hashids\Facades\Hashids;


use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        view::composer('*', function($view) {
             $view->with('settings', Setting::latest()->first());
             $view->with('categories', Category::inRandomOrder()->get());
             $view->with('site_menu', Menu::get());
             $view->with('advert_top', Advert::where('placement', 'top')->first());
             $view->with('unread_notify', AdminNotification::latest()->get());
        });

        Inertia::share('settings', function(){ return Setting::latest()->first();  });
      
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

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
