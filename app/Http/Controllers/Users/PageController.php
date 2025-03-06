<?php

namespace App\Http\Controllers\Users;

use App\Models\Privacypolicy;
use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\TermsCondition;


class PageController extends Controller
{
    public function privacypolicy(){
        $privacypolicy = Privacypolicy::first();
        return  view('users.pages.privacy')
        ->with('policy', $privacypolicy);
    }

    public function Terms(){
        $termscondition = TermsCondition::first();
        return  view('users.pages.terms')
        ->with('terms', $termscondition);
    }

    public function aboutUs(){
        return  view('users.pages.aboutUs')
        ->with('aboutUs', AboutUs::latest()->first());
    }

    public function contactUs(){
        return view('users.pages.contactUs');
    }

}
