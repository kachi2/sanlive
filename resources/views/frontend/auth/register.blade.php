@extends('layouts.app')

@section('content')
<div style="background:#f0f2f8; min-height:80vh; display:flex; align-items:center; justify-content:center; padding:40px 16px;">
    <div class="auth-modal" style="position:relative; animation:authSlideIn .25s ease; max-width:440px; width:100%;">

        <div class="auth-tabs">
            <a href="{{ route('login') }}" class="auth-tab" style="text-decoration:none;">Sign In</a>
            <div class="auth-tab active">Create Account</div>
        </div>

        <div class="auth-panel active" style="display:block;">
            <div class="auth-brand">
                @if(isset($settings) && $settings->site_logo)
                    <img src="{{ asset('/images/'.$settings->site_logo) }}" alt="{{ config('app.name') }}">
                @endif
                <p>Join Sanlive Pharmacy — fast, affordable healthcare delivery.</p>
            </div>

            <a href="{{ route('auth.google') }}" class="auth-google-btn">
                <svg width="18" height="18" viewBox="0 0 18 18"><path fill="#4285F4" d="M17.64 9.2c0-.637-.057-1.251-.164-1.84H9v3.481h4.844c-.209 1.125-.843 2.078-1.796 2.717v2.258h2.908c1.702-1.567 2.684-3.875 2.684-6.615z"/><path fill="#34A853" d="M9 18c2.43 0 4.467-.806 5.956-2.18L12.048 13.56C11.226 14.105 10.177 14.43 9 14.43c-2.344 0-4.328-1.584-5.036-3.711H.957v2.332A8.997 8.997 0 0 0 9 18z"/><path fill="#FBBC05" d="M3.964 10.71A5.41 5.41 0 0 1 3.682 9c0-.593.102-1.17.282-1.71V4.958H.957A8.996 8.996 0 0 0 0 9c0 1.452.348 2.827.957 4.042l3.007-2.332z"/><path fill="#EA4335" d="M9 3.58c1.321 0 2.508.454 3.44 1.345l2.582-2.58C13.463.891 11.426 0 9 0A8.997 8.997 0 0 0 .957 4.958L3.964 6.29C4.672 4.163 6.656 3.58 9 3.58z"/></svg>
                Sign up with Google
            </a>

            <div class="auth-divider">or create your account</div>

            @if($errors->any())
            <div class="auth-error-banner" style="display:block;">
                {{ $errors->first() }}
            </div>
            @endif
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="auth-row">
                    <div class="auth-field">
                        <label for="reg-first">First name</label>
                        <input type="text" id="reg-first" name="first_name" class="@error('first_name') is-invalid @enderror"
                               placeholder="John" autocomplete="given-name" required autofocus value="{{ old('first_name') }}">
                    </div>
                    <div class="auth-field">
                        <label for="reg-last">Last name</label>
                        <input type="text" id="reg-last" name="last_name" class="@error('last_name') is-invalid @enderror"
                               placeholder="Doe" autocomplete="family-name" required value="{{ old('last_name') }}">
                    </div>
                </div>
                <div class="auth-field">
                    <label for="reg-email">Email address</label>
                    <input type="email" id="reg-email" name="email" class="@error('email') is-invalid @enderror"
                           placeholder="you@example.com" autocomplete="email" required value="{{ old('email') }}">
                </div>
                <div class="auth-field">
                    <label for="reg-phone">Phone number <span style="color:#b0bdd0;font-weight:400">(optional)</span></label>
                    <input type="tel" id="reg-phone" name="phone" placeholder="+234 800 000 0000" autocomplete="tel" value="{{ old('phone') }}">
                </div>
                <div class="auth-field">
                    <label for="reg-password">Password</label>
                    <input type="password" id="reg-password" name="password" class="@error('password') is-invalid @enderror"
                           placeholder="Min. 8 characters" autocomplete="new-password" required>
                </div>
                <div class="auth-field">
                    <label for="reg-confirm">Confirm password</label>
                    <input type="password" id="reg-confirm" name="password_confirmation"
                           placeholder="Repeat password" autocomplete="new-password" required>
                </div>
                <button type="submit" class="auth-submit">Create Account</button>
            </form>

            <div class="auth-switch">Already have an account? <a href="{{ route('login') }}">Sign in</a></div>
        </div>
    </div>
</div>
@endsection
