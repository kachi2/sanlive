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

        $siteName  = $settings?->site_name ?? 'Sanlive Pharmacy';
        $logoUrl   = websiteLogo();
        $siteUrl   = url('/');

        // WebSite node — used by Google for the site name feature in SERPs.
        // NOTE: SearchAction / Sitelinks Searchbox was retired by Google in 2023.
        $graph->webSite()
            ->setProperty('@id', $siteUrl . '#website')
            ->name($siteName)
            ->url($siteUrl);

        $sameAs = array_values(array_filter([
            $settings?->facebook  ?? null,
            $settings?->instagram ?? null,
            $settings?->twitter   ?? null,
            $settings?->linkedIn  ?? null,
        ]));

        // Build address — only include non-empty fields to avoid invalid empty nodes.
        $address = Schema::postalAddress()
            ->addressLocality($settings?->city ?? 'Lagos')
            ->addressRegion($settings?->state ?? 'Lagos')
            ->addressCountry('NG');

        if (!empty($settings?->address)) {
            $address->streetAddress($settings->address);
        }

        $pharmacyNode = $graph->pharmacy()
            ->setProperty('@id', $siteUrl . '#pharmacy')
            ->name($siteName)
            ->url($siteUrl)
            ->logo(
                Schema::imageObject()
                    ->setProperty('@id', $siteUrl . '#logo')
                    ->url($logoUrl)
                    ->contentUrl($logoUrl)
            )
            ->image($logoUrl)
            ->address($address)
            ->openingHoursSpecification([
                Schema::openingHoursSpecification()
                    ->dayOfWeek([
                        'https://schema.org/Monday',
                        'https://schema.org/Tuesday',
                        'https://schema.org/Wednesday',
                        'https://schema.org/Thursday',
                        'https://schema.org/Friday',
                        'https://schema.org/Saturday',
                        'https://schema.org/Sunday',
                    ])
                    ->opens('08:00')
                    ->closes('20:00'),
            ])
            ->priceRange('₦₦');

        if (!empty($settings?->site_phone)) {
            $pharmacyNode->telephone($settings->site_phone);
        }

        if (!empty($settings?->site_email)) {
            $pharmacyNode->email($settings->site_email);
        }

        if (!empty($sameAs)) {
            $pharmacyNode->sameAs($sameAs);
        }

        return $graph->toScript();
    }
}
