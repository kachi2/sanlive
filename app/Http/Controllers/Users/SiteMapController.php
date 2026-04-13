<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Services\SitemapService;

class SiteMapController extends Controller
{
    public function SiteMap(SitemapService $service)
    {
        $service->generate();

        return response()->file(public_path('sitemap.xml'), [
            'Content-Type' => 'application/xml; charset=UTF-8',
        ]);
    }
}

