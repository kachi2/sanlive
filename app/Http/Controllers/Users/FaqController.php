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
        $meta = [
            'url'         => url()->current(),
            'title'       => 'Frequently Asked Questions – Sanlive Pharmacy Nigeria',
            'metaTitle'   => 'Frequently Asked Questions – Sanlive Pharmacy Nigeria',
            'description' => 'Find answers to common questions about ordering medicines online, delivery times, prescription upload, payments, and more at Sanlive Pharmacy – Nigeria\'s trusted online pharmacy.',
            'keywords'    => 'online pharmacy FAQ Nigeria, medicine delivery questions, how to order medicines online, prescription upload help, sanlive pharmacy support',
            'image_url'   => websiteLogo(),
        ];
        // return inertia('Users/Pages/faq', ['faq' => Faq::latest()->first(), 'pageMeta' => $meta])->withViewData($meta); // Vue/Inertia preserved
        return view('frontend.faq', [
            'faq' => Faq::latest()->first(),
            'pageMeta' => $meta
        ]);
    }
}
