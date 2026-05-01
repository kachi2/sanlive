<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CountryCurrency;
use App\Models\Product;
use App\Models\Setting;
use Carbon\Carbon;
use Vinkla\Hashids\Facades\Hashids;
use Spatie\SchemaOrg\Schema;
use Spatie\SchemaOrg\Graph;

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
        try{
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


        $categories = Category::inRandomOrder()->get();
        addHashId($category);
        addHashId($categories);
        $meta = [
            'url'         => url()->current(),
            'title'       => 'Buy Medicines, Vitamins & Supplements Online in Nigeria | Sanlive Pharmacy',
            'metaTitle'   => 'Buy Medicines, Vitamins & Supplements Online in Nigeria',
            'description' => 'Trusted PCN-licensed online pharmacy in Nigeria. Fast doorstep delivery of medicines, vaccines, vitamins, skincare & more in Lagos and nationwide. Upload prescription and order safely today.',
            'keywords'    => 'online pharmacy Nigeria, buy medicine online Lagos, prescription delivery Nigeria, vitamins supplements, PCN licensed pharmacy',
            'image_url'   => websiteLogo(),
        ];
        // return inertia('Dashboard', [
        //     'sliders' => $slider,
        //     'category' => $category,
        //     'categories' => $categories,
        //     'pageMeta' => $meta
        // ])->withViewData($meta); // Vue/Inertia preserved
        return view('frontend.home', [
            'sliders' => $slider,
            'productSections' => $category,
            'allCategories' => $categories,
            'pageMeta' => $meta,
            'schema'   => $this->buildHomeSchema(Setting::first()),
        ]);
      }catch(\Exception $e)
      {
        // return inertia('404')->toResponse(request())->setStatusCode(404); // Vue/Inertia preserved
        abort(404);
      }
    }

    private function buildHomeSchema(?Setting $settings): string
    {
        $graph = new Graph();

        $graph->webSite()
            ->name($settings->site_name ?? 'Sanlive Pharmacy')
            ->url(url('/'))
            ->potentialAction(
                Schema::searchAction()
                    ->target(url('/catalogs') . '?q={search_term_string}')
                    ->setProperty('query-input', 'required name=search_term_string')
            );

        $sameAs = array_values(array_filter([
            $settings->facebook  ?? null,
            $settings->instagram ?? null,
            $settings->twitter   ?? null,
            $settings->linkedIn  ?? null,
        ]));

        $graph->pharmacy()
            ->name($settings->site_name ?? 'Sanlive Pharmacy')
            ->url(url('/'))
            ->logo(websiteLogo())
            ->telephone($settings->site_phone ?? '')
            ->email($settings->site_email ?? '')
            ->address(
                Schema::postalAddress()
                    ->streetAddress($settings->address ?? '')
                    ->addressLocality($settings->city ?? 'Lagos')
                    ->addressRegion($settings->state ?? 'Lagos')
                    ->addressCountry('NG')
            )
            ->openingHours($settings->opening_hours ?? 'Mo-Su 08:00-20:00')
            ->priceRange('₦₦')
            ->image(websiteLogo())
            ->if(!empty($sameAs), fn ($s) => $s->sameAs($sameAs));

        return $graph->toScript();
    }
}
