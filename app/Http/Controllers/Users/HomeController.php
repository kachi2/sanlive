<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CountryCurrency;
use App\Models\Product;
use Carbon\Carbon;
use Vinkla\Hashids\Facades\Hashids;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     
    public function __invoke(Request $request)
    {
        // getCountryCurrency();

    //     $ss =   getUserLocationData();
    //   $sss =   updateExchangeRate();
    //   $data = CountryCurrency::pluck('currency');
    //   $data =  $data->toArray();
    //   foreach($sss['conversion_rates'] as $rates => $value)
    //   {
    //     if(in_array($rates, $data))
    //     {
    //         $currency = CountryCurrency::where('currency', $rates)->first();
    //         $currency->update(['exchange_rate' => $value, 'last_updated' => Carbon::now()]);
    //     }
    //   }
    
        $slider = Slider::latest()->get();

        $category = Category::whereHas('products', function($query){
            $query->havingRaw('COUNT(*) > 5');
        })->take(10)->inRandomOrder()->get();
        foreach($category as $cat)
        {
            $cat->products = $cat->products()->take(4)->get();
            addHashId($cat->products);
        }

        // dd($category);

        $categories = Category::inRandomOrder()->get();
        addHashId($category);
        addHashId($categories);
        return inertia('Dashboard', [
            'sliders' => $slider,
            'category' => $category,
            'categories' => $categories
        ]);
    }
}
