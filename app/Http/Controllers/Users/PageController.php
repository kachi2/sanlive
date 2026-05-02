<?php

namespace App\Http\Controllers\Users;

use App\Models\Privacypolicy;
use App\Http\Controllers\Controller;
use App\Mail\contactUs;
use App\Models\AboutUs;
use App\Models\Setting;
use App\Models\TermsCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Spatie\SchemaOrg\Schema;

class PageController extends Controller
{
    public function privacypolicy(){
        $privacypolicy = Privacypolicy::first();
        // return inertia('Users/Pages/privacy', ['privacy' => $privacypolicy, 'pageMeta' => [...]]); // Vue/Inertia preserved
        return view('frontend.privacy', [
            'privacy' => $privacypolicy,
            'pageMeta' => [
                'url'         => url()->current(),
                'title'       => 'Privacy Policy – How We Protect Your Health Data',
                'metaTitle'   => 'Privacy Policy – How We Protect Your Health Data',
                'description' => 'Read Sanlive Pharmacy\'s privacy policy to learn how we collect, use, and protect your personal and health data in compliance with Nigerian data protection regulations.',
                'keywords'    => 'sanlive pharmacy privacy policy, health data protection Nigeria, online pharmacy privacy',
                'image_url'   => websiteLogo(),
            ]
        ]);
    }

    public function Terms(){
        $termscondition = TermsCondition::first();
        // return inertia('Users/Pages/terms', ['terms' => $termscondition, 'pageMeta' => [...]]); // Vue/Inertia preserved
        return view('frontend.terms', [
            'terms' => $termscondition,
            'pageMeta' => [
                'url'         => url()->current(),
                'title'       => 'Terms & Conditions',
                'metaTitle'   => 'Terms & Conditions',
                'description' => 'Read Sanlive Pharmacy\'s terms and conditions governing use of our online platform, including product purchases, delivery times, returns, and your rights as a customer.',
                'keywords'    => 'sanlive pharmacy terms and conditions, online pharmacy terms Nigeria, pharmacy user agreement',
                'image_url'   => websiteLogo(),
            ]
        ]);
    }

    public function aboutUs(){
        $settings = Setting::first();
        // return inertia('Users/Pages/aboutUs', ['aboutUs' => AboutUs::latest()->first(), 'pageMeta' => [...]]); // Vue/Inertia preserved
        return view('frontend.about', [
            'aboutUs' => AboutUs::latest()->first(),
            'pageMeta' => [
                'url'         => url()->current(),
                'title'       => 'About Sanlive Pharmacy – Licensed Online Pharmacy in Nigeria',
                'metaTitle'   => 'About Sanlive Pharmacy – Licensed Online Pharmacy in Nigeria',
                'description' => 'Learn about Sanlive Pharmacy, a PCN-regulated online platform providing safe, affordable medicines with fast doorstep delivery across Nigeria. Your trusted health partner since 2023.',
                'keywords'    => 'about sanlive pharmacy, PCN licensed pharmacy Nigeria, trusted online pharmacy Lagos, affordable medicines Nigeria',
                'image_url'   => websiteLogo(),
            ],
            'schema' => Schema::aboutPage()
                ->name('About Sanlive Pharmacy')
                ->url(url()->current())
                ->description('PCN-licensed online pharmacy providing safe, affordable medicines with fast doorstep delivery across Nigeria.')
                ->publisher(
                    Schema::organization()
                        ->name($settings?->site_name ?? 'Sanlive Pharmacy')
                        ->url(url('/'))
                        ->logo(Schema::imageObject()->url(websiteLogo())->contentUrl(websiteLogo()))
                )
                ->toScript(),
        ]);
    }

    public function contactUs(){
        $settings = Setting::first();
        // return inertia('Users/Pages/contactUs', ['pageMeta' => [...]]); // Vue/Inertia preserved
        return view('frontend.contact', [
            'pageMeta' => [
                'url'         => url()->current(),
                'title'       => 'Contact Sanlive Pharmacy – Medicine Delivery in Lagos Nigeria',
                'metaTitle'   => 'Contact Sanlive Pharmacy – Medicine Delivery in Lagos Nigeria',
                'description' => 'Contact Sanlive Pharmacy for enquiries, prescription support, or special medication requests. Call +234 805 888 5913 or send us a message. We offer fast delivery across Nigeria.',
                'keywords'    => 'contact sanlive pharmacy, online pharmacy Nigeria contact, medicine delivery enquiry, Lagos pharmacy',
                'image_url'   => websiteLogo(),
            ],
            'schema' => Schema::contactPage()
                ->name('Contact Sanlive Pharmacy')
                ->url(url()->current())
                ->description('Get in touch with Sanlive Pharmacy for orders, prescription support, or delivery enquiries.')
                ->contactPoint(
                    Schema::contactPoint()
                        ->contactType('customer support')
                        ->availableLanguage('en')
                        ->areaServed('NG')
                        ->if(!empty($settings?->site_phone), fn ($cp) => $cp->telephone($settings->site_phone))
                        ->if(!empty($settings?->site_email), fn ($cp) => $cp->email($settings->site_email))
                )
                ->toScript(),
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
        // return inertia('Users/Pages/service', ['pageMeta' => [...]]); // Vue/Inertia preserved
        return view('frontend.service', [
            'pageMeta' => [
                'url'         => url()->current(),
                'title'       => 'Our Services – Medicine Delivery & Prescription Upload | Sanlive Pharmacy',
                'metaTitle'   => 'Our Services – Medicine Delivery & Prescription Upload',
                'description' => 'Discover Sanlive Pharmacy services: fast medicine delivery, prescription upload, special medication requests, health consultations support, and nationwide doorstep service.',
                'keywords'    => 'online pharmacy services Nigeria, medicine delivery service, prescription upload Lagos, sanlive pharmacy services',
                'image_url'   => websiteLogo(),
            ]
        ]);
    }

}
