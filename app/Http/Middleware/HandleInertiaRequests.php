<?php

namespace App\Http\Middleware;

use App\Models\Annoucement;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {

    
        return array_merge([
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
            ],
            'cartItem' => \Cart::getTotalQuantity(),
            'flash' => [
                'success' => session('success'),
                'error' => session('error'),
                'warning'=> session('warning')
            ],
            'settings' => Setting::latest()->first(),
            'announcment', Annoucement::first()
        ]);
    }
}
