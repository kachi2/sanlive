<?php

namespace App\Http\Controllers\Users;

use App\Models\Privacypolicy;
use App\Http\Controllers\Controller;
use App\Mail\contactUs;
use App\Models\AboutUs;
use App\Models\TermsCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function privacypolicy(){
        $privacypolicy = Privacypolicy::first();
        return  inertia('Users/Pages/privacy',
        ['privacy' => $privacypolicy, 
        'pageMeta' => [
            'url' => url()->current(),
            'title' => websiteName().' Online Health Store, Medicines, Vitamins',
            'metaTitle' => websiteName().' Online Health Store, Medicines, Vitamins',
            'description' => 'Get your healthcare needs delivered at your doorstep from the No one online Pharmacy store  Sanlive Pharmacy. Fast delivery, affordable prices',
            'keywords' => 'online pharmacy, medicine delivery, health store, wellness tablets, medical prescription, buy drugs online, ecommerce pharmacy',
            'image_url' => websiteLogo()
            ]
        ]);
    }

    public function Terms(){
        $termscondition = TermsCondition::first();
        return  inertia('Users/Pages/terms',
        ['terms' => $termscondition, 
        'pageMeta' => [
            'url' => url()->current(),
            'title' => websiteName().' Online Health Store, Medicines, Vitamins',
            'metaTitle' => websiteName().' Online Health Store, Medicines, Vitamins',
            'description' => 'Get your healthcare needs delivered at your doorstep from the No one online Pharmacy store  Sanlive Pharmacy. Fast delivery, affordable prices',
            'keywords' => 'online pharmacy, medicine delivery, health store, wellness tablets, medical prescription, buy drugs online, ecommerce pharmacy',
            'image_url' => websiteLogo()
            ]
    ]);
    }

    public function aboutUs(){
        return  inertia('Users/Pages/aboutUs',
        ['aboutUs' => AboutUs::latest()->first(),
        'pageMeta' => [
            'url' => url()->current(),
            'title' => 'About Us | Online Health Store, Medicines, Vitamins',
            'metaTitle' => websiteName().' Online Health Store, Medicines, Vitamins',
            'description' => 'Get your healthcare needs delivered at your doorstep from the No one online Pharmacy store  Sanlive Pharmacy. Fast delivery, affordable prices',
            'keywords' => 'online pharmacy, medicine delivery, health store, wellness tablets, medical prescription, buy drugs online, ecommerce pharmacy',
            'image_url' => websiteLogo()
            ]
    ]);
    }

    public function contactUs(){
        return inertia('Users/Pages/contactUs', [
            'pageMeta' => [
            'url' => url()->current(),
            'title' => 'Contact Us | Online Health Store, Medicines, Vitamins',
            'metaTitle' => websiteName().' Online Health Store, Medicines, Vitamins',
            'description' => 'Get your healthcare needs delivered at your doorstep from the No one online Pharmacy store  Sanlive Pharmacy. Fast delivery, affordable prices',
            'keywords' => 'online pharmacy, medicine delivery, health store, wellness tablets, medical prescription, buy drugs online, ecommerce pharmacy',
            'image_url' => websiteLogo()
            ]
        ]);
    }

    public function contactUsSubmit(Request $request)
    {
        $req = $request->only(['name', 'email', 'phone', 'message']);
        Mail::to('mikkynoble@gmail.com')->send(new contactUs($req));
        Session::flash('success', 'Message sent successfully');
        return back();
    }

    public function viewService()
    {
        return inertia('Users/Pages/service', [
            'pageMeta' => [
            'url' => url()->current(),
            'title' => 'Services |  Online Health Store, Medicines, Vitamins',
            'metaTitle' => websiteName().' Online Health Store, Medicines, Vitamins',
            'description' => 'Get your healthcare needs delivered at your doorstep from the No one online Pharmacy store  Sanlive Pharmacy. Fast delivery, affordable prices',
            'keywords' => 'online pharmacy, medicine delivery, health store, wellness tablets, medical prescription, buy drugs online, ecommerce pharmacy',
            'image_url' => websiteLogo()
            ]
        ]);
    }

}
