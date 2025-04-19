<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //


    public function __invoke()
    {
        return inertia('Users/Pages/faq',
         ['faq' => Faq::latest()->first(),
         'pageMeta' => [
            'url' => url()->current(),
            'title' => 'Faq ',
            'metaTitle' => 'Buy medical products, order fast, get fast delivery ',
            'description' => websiteName().' Get your healthcare needs delivered at your doorstep from the No one online Pharmacy store  Sanlive Pharmacy. Fast delivery, affordable prices',
            'keywords' => "online pharmacy, buy medicine online, health store, wellness products, vitamins supplements, drugstore Nigeria, Sanlive Pharmacy, OTC drugs online, prescription delivery, immune boosters, baby care, sexual wellness, diabetes care",
            'image_url' => websiteLogo()
            ]
        ]);
    }
}
