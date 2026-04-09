<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
        } catch (\Exception $e) {
            return redirect()->route('users.index')
                ->withErrors(['google' => 'Google sign-in failed. Please try again.']);
        }

        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            $nameParts = explode(' ', $googleUser->getName(), 2);
            $user = User::create([
                'first_name' => $nameParts[0],
                'last_name'  => $nameParts[1] ?? '',
                'email'      => $googleUser->getEmail(),
                'password'   => bcrypt(Str::random(24)),
                'google_id'  => $googleUser->getId(),
            ]);
            event(new Registered($user));
        } elseif (!$user->google_id) {
            $user->update(['google_id' => $googleUser->getId()]);
        }

        Auth::login($user, true);

        return redirect('/');
    }
}
