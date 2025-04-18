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
        ['policy' => $privacypolicy 
        ]);
    }

    public function Terms(){
        $termscondition = TermsCondition::first();
        return  inertia('Users/Pages/terms',
        ['terms' => $termscondition ]);
    }

    public function aboutUs(){
        return  inertia('Users/Pages/aboutUs',
        ['aboutUs' => AboutUs::latest()->first()
    ]);
    }

    public function contactUs(){
        return inertia('Users/Pages/contactUs');
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
        return inertia('Users/Pages/service');
    }

}
