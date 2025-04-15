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

}
