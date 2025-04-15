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
         ['faq' => Faq::latest()->first()]);
    }
}
