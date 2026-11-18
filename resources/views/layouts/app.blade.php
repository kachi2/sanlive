<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pageMeta['title'] }}</title>
    <meta name="description" content="{{ $pageMeta['description'] ?? 'Get all your medications delivered to your doorstep from the No. 1 online pharmacy store in Lagos Nigeria - Sanlive Pharmacy.' }}">
    <meta name="robots" content="@yield('meta_robots', $pageMeta['robots'] ?? 'index, follow')">

    <meta property="og:type" content="{{ $pageMeta['og_type'] ?? 'website' }}">
    <meta property="og:site_name" content="Sanlive Pharmacy">
    <meta property="og:locale" content="en_NG">
    <meta property="og:title" content="{{ $pageMeta['metaTitle']}}">
    <meta property="og:description" content="{{ $pageMeta['description'] ?? 'Get all your medications delivered to your doorstep.' }}">
    <meta property="og:image" content="{{ $pageMeta['image_url'] ?? asset('images/'.$settings->site_logo) }}">
    <meta property="og:image:alt" content="{{ $pageMeta['metaTitle'] ?? 'Sanlive Pharmacy' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <link rel="canonical" href="{{ $pageMeta['url'] ?? url()->current() }}">

    <meta name="twitter:card" content="summary_large_image">
    @if(!empty($settings->twitter))
    <meta name="twitter:site" content="{{ str_starts_with($settings->twitter, '@') ? $settings->twitter : '@'.$settings->twitter }}">
    @endif
    <meta name="twitter:title" content="{{ $pageMeta['metaTitle']}}">
    <meta name="twitter:description" content="{{ $pageMeta['description'] ?? 'Get all your medications delivered to your doorstep.' }}">
    <meta name="twitter:image" content="{{ $pageMeta['image_url'] ?? asset('images/'.$settings->site_logo) }}">
    <meta name="twitter:image:alt" content="{{ $pageMeta['metaTitle'] ?? 'Sanlive Pharmacy' }}">

    <link href="{{ asset('images/'.$settings->fav) }}" rel="shortcut icon" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('/apple-touch-icon.png') }}" sizes="180x180">
    <link rel="manifest" href="/manifest.json">

    {{-- DNS prefetch for remaining third-party origins --}}
    <link rel="dns-prefetch" href="https://www.googletagmanager.com">

    {{-- Fonts: local copy of Jost (400–700) --}}
    {{-- Tiny file, loaded normally so text doesn't re-flow when it arrives late --}}
    <link rel="stylesheet" href="{{ asset('/frontend/fonts/jost/jost.css') }}">

    {{-- Critical CSS: vendor + main style --}}
    @vite(['resources/css/vendor.css'])
    <link rel="stylesheet" href="{{ asset('/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/home-8.css') }}">
    @vite(['resources/css/frontend.css'])

    {{-- Non-critical CSS: loaded async to remove render-blocking --}}
    <link rel="preload" as="style" fetchpriority="low" href="{{ asset('/frontend/plugins/font-awesome/css/font-awesome.min.css') }}" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" as="style" fetchpriority="low" href="{{ asset('/frontend/fonts/Linearicons/Font/demo-files/demo.css') }}" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('/frontend/plugins/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/frontend/fonts/Linearicons/Font/demo-files/demo.css') }}">
    </noscript>
    {{-- Owl carousel CSS/JS now load only on pages that use it (home) --}}

    {{-- Page-specific preloads (e.g. LCP image) --}}
    @yield('preload')
    @yield('styles')

    <meta name="google-site-verification" content="S7jnu8AWZFcOOYIKhw_EWy2ieNVUEwzSkgldPg1aMZ4">

    @if(recaptchaEnabled())
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif

    @yield('schema')
    @yield('head')
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MSKX7LHR" title="Google Tag Manager" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

@include('frontend.partials.header-mobile')
@include('frontend.partials.mobile-sidebar')
@include('frontend.partials.header')
@include('frontend.partials.floating-cart')

<div class="ps-page">                                                                                                                                                                                                       
    @yield('content')
    @include('frontend.partials.footer')
</div>

{{-- Core: jQuery + Bootstrap (account dropdown, page scripts) --}}
<script src="{{ asset('/frontend/plugins/jquery.min.js') }}"></script>
<script src="{{ asset('/frontend/plugins/popper.min.js') }}"></script>
<script src="{{ asset('/frontend/plugins/bootstrap4/js/bootstrap.min.js') }}"></script>

{{-- Deferred: not needed until after first paint --}}
<script src="{{ asset('/frontend/plugins/toastr/toastr.min.js') }}" defer></script>
{{-- Removed (unused on frontend): slick, lightGallery, bar-rating, noUiSlider, select2 --}}

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-TVXCCDXSLS"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-TVXCCDXSLS');
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof toastr !== 'undefined') {
        toastr.options = { timeOut:6000, progressBar:true, showMethod:"slideDown", hideMethod:"slideUp" };
        @if(session('msg') == 'success')
            toastr.success({!! json_encode(session('message')) !!});
        @elseif(session('msg') == 'error')
            toastr.error({!! json_encode(session('message')) !!});
        @endif
        @if(session('success'))
            toastr.success({!! json_encode(session('success')) !!});
        @endif
        @if(session('error'))
            toastr.error({!! json_encode(session('error')) !!});
        @endif
    }
});
</script>

@yield('scripts')

<script>
// Mobile hamburger toggle is handled in mobile-sidebar.blade.php
</script>

{{-- ===== AUTH MODAL ===== --}}
@guest

<div id="auth-modal-overlay">
    <div class="auth-modal" role="dialog" aria-modal="true" aria-label="Sign in or Register">
        <button class="auth-modal__close" id="auth-modal-close" aria-label="Close">&times;</button>

        {{-- Tabs --}}
        <div class="auth-tabs" role="tablist">
            <button class="auth-tab active" data-tab="login" role="tab" aria-selected="true" aria-controls="panel-login" type="button" style="font-size:15px">Sign In</button>
            <button class="auth-tab" data-tab="register" role="tab" aria-selected="false" aria-controls="panel-register" type="button" style="font-size:15px">Create Account</button>
        </div>

        {{-- LOGIN PANEL --}}
        <div class="auth-panel active" id="panel-login">
            <div class="auth-brand">
                @if(isset($settings) && $settings->site_logo)
                    <img src="{{ asset('/images/'.$settings->site_logo) }}" alt="{{ config('app.name') }}">
                @endif
            </div>

            <a href="{{ route('auth.google') }}" class="auth-google-btn" style="font-size:15px">
                <svg width="18" height="18" viewBox="0 0 18 18"><path fill="#4285F4" d="M17.64 9.2c0-.637-.057-1.251-.164-1.84H9v3.481h4.844c-.209 1.125-.843 2.078-1.796 2.717v2.258h2.908c1.702-1.567 2.684-3.875 2.684-6.615z"/><path fill="#34A853" d="M9 18c2.43 0 4.467-.806 5.956-2.18L12.048 13.56C11.226 14.105 10.177 14.43 9 14.43c-2.344 0-4.328-1.584-5.036-3.711H.957v2.332A8.997 8.997 0 0 0 9 18z"/><path fill="#FBBC05" d="M3.964 10.71A5.41 5.41 0 0 1 3.682 9c0-.593.102-1.17.282-1.71V4.958H.957A8.996 8.996 0 0 0 0 9c0 1.452.348 2.827.957 4.042l3.007-2.332z"/><path fill="#EA4335" d="M9 3.58c1.321 0 2.508.454 3.44 1.345l2.582-2.58C13.463.891 11.426 0 9 0A8.997 8.997 0 0 0 .957 4.958L3.964 6.29C4.672 4.163 6.656 3.58 9 3.58z"/></svg>
                Continue with Google
            </a>

            <div class="auth-divider" style="font-size:15px">or sign in with email</div>

            <div class="auth-error-banner" id="login-error"></div>

            <form id="login-form" novalidate>
                @csrf
                <div class="auth-field">
                    <label for="login-email" style="font-size:15px">Email address</label>
                    <input type="email" id="login-email" style="font-size:15px"  name="email" placeholder="you@example.com" autocomplete="email" required>
                    <div class="field-error" id="login-email-err"></div>
                </div>
                <div class="auth-field">
                    <label for="login-password" style="font-size:15px">Password</label>
                    <input type="password" style="font-size:15px"  id="login-password" name="password" placeholder="Your password" autocomplete="current-password" required>
                    <div class="field-error" id="login-password-err"></div>
                </div>
                <a href="{{ route('password.request') }}" class="auth-forgot" style="font-size:13px">Forgot password?</a>
                @if(recaptchaEnabled())
                <div class="auth-field">
                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                </div>
                @endif
                <button type="submit" class="auth-submit" id="login-submit" style="font-size:15px">Sign In</button>
            </form>

            <div class="auth-switch" style="font-size:15px">No account? <a id="switch-to-register" >Create one free</a></div>
        </div>

        {{-- REGISTER PANEL --}}
        <div class="auth-panel" id="panel-register">

            <a href="{{ route('auth.google') }}" class="auth-google-btn" style="font-size:15px">
                <svg width="18" height="18" viewBox="0 0 18 18"><path fill="#4285F4" d="M17.64 9.2c0-.637-.057-1.251-.164-1.84H9v3.481h4.844c-.209 1.125-.843 2.078-1.796 2.717v2.258h2.908c1.702-1.567 2.684-3.875 2.684-6.615z"/><path fill="#34A853" d="M9 18c2.43 0 4.467-.806 5.956-2.18L12.048 13.56C11.226 14.105 10.177 14.43 9 14.43c-2.344 0-4.328-1.584-5.036-3.711H.957v2.332A8.997 8.997 0 0 0 9 18z"/><path fill="#FBBC05" d="M3.964 10.71A5.41 5.41 0 0 1 3.682 9c0-.593.102-1.17.282-1.71V4.958H.957A8.996 8.996 0 0 0 0 9c0 1.452.348 2.827.957 4.042l3.007-2.332z"/><path fill="#EA4335" d="M9 3.58c1.321 0 2.508.454 3.44 1.345l2.582-2.58C13.463.891 11.426 0 9 0A8.997 8.997 0 0 0 .957 4.958L3.964 6.29C4.672 4.163 6.656 3.58 9 3.58z"/></svg>
                Sign up with Google
            </a>

            <div class="auth-divider" style="font-size:15px">or create your account</div>

            <div class="auth-error-banner" id="register-error"></div>

            <form id="register-form" novalidate>
                @csrf
                <div class="auth-row">
                    <div class="auth-field">
                        <label for="reg-first" style="font-size:15px">First name</label>
                        <input type="text" id="reg-first" name="first_name" style="font-size:15px"  placeholder="John" autocomplete="given-name" required>
                        <div class="field-error" id="reg-first-err"></div>
                    </div>
                    <div class="auth-field">
                        <label for="reg-last" style="font-size:15px">Last name</label>
                        <input type="text" id="reg-last" name="last_name" style="font-size:15px"  placeholder="Doe" autocomplete="family-name" required>
                        <div class="field-error" id="reg-last-err"></div>
                    </div>
                </div>
                <div class="auth-field">
                    <label for="reg-email" style="font-size:15px">Email address</label>
                    <input type="email" id="reg-email" name="email" style="font-size:15px" placeholder="you@example.com" autocomplete="email" required>
                    <div class="field-error" id="reg-email-err"></div>
                </div>
                <div class="auth-field">
                    <label for="reg-password" style="font-size:15px">Password</label>
                    <input type="password" id="reg-password" style="font-size:15px" name="password" placeholder="Min. 8 characters" autocomplete="new-password" required>
                    <div class="field-error" id="reg-password-err"></div>
                </div>
                <div class="auth-field">
                    <label for="reg-confirm" style="font-size:15px">Confirm password</label>
                    <input type="password" id="reg-confirm" style="font-size:15px" name="password_confirmation" placeholder="Repeat password" autocomplete="new-password" required>
                </div>
                @if(recaptchaEnabled())
                <div class="auth-field">
                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                </div>
                @endif
                <button type="submit" class="auth-submit" id="register-submit">Create Account</button>
            </form>

            <div class="auth-switch">Already have an account? <a id="switch-to-login">Sign in</a></div>
        </div>
    </div>
</div>

<script>
(function () {
    var overlay   = document.getElementById('auth-modal-overlay');
    var closeBtn  = document.getElementById('auth-modal-close');
    var tabs      = document.querySelectorAll('.auth-tab');
    var panels    = document.querySelectorAll('.auth-panel');

    function openModal(tab) {
        switchTab(tab || 'login');
        overlay.classList.add('open');
        document.body.style.overflow = 'hidden';
    }
    function closeModal() {
        overlay.classList.remove('open');
        document.body.style.overflow = '';
    }
    function switchTab(name) {
        tabs.forEach(function(t){ t.classList.toggle('active', t.dataset.tab === name); });
        panels.forEach(function(p){ p.classList.toggle('active', p.id === 'panel-' + name); });
    }

    // Open triggers

    // Any other login/register link added later can use data-auth-modal="login"
    document.addEventListener('click', function(e) {
        var t = e.target.closest('[data-auth-modal]');
        if (t) { e.preventDefault(); openModal(t.dataset.authModal); }
    });

    closeBtn.addEventListener('click', closeModal);
    overlay.addEventListener('click', function(e){ if (e.target === overlay) closeModal(); });
    document.addEventListener('keydown', function(e){ if (e.key === 'Escape') closeModal(); });

    tabs.forEach(function(t){ t.addEventListener('click', function(){ switchTab(t.dataset.tab); }); });
    document.getElementById('switch-to-register').addEventListener('click', function(){ switchTab('register'); });
    document.getElementById('switch-to-login').addEventListener('click', function(){ switchTab('login'); });

    // ---- CSRF helper ----
    function getCsrf() {
        var m = document.querySelector('#login-form [name="_token"], #register-form [name="_token"]');
        return m ? m.value : '';
    }

    // ---- Field error display ----
    function clearErrors(prefix) {
        document.querySelectorAll('[id^="' + prefix + '-"][id$="-err"]').forEach(function(el){ el.textContent=''; });
        document.querySelectorAll('#panel-' + prefix + ' input').forEach(function(el){ el.classList.remove('is-invalid'); });
        var banner = document.getElementById(prefix + '-error');
        if (banner) { banner.style.display='none'; banner.textContent=''; }
    }
    function showErrors(prefix, errors) {
        var map = { login: {email:'login-email', password:'login-password'}, register: {first_name:'reg-first', last_name:'reg-last', email:'reg-email', password:'reg-password'} };
        var shown = false;
        Object.keys(errors).forEach(function(field) {
            var elId = map[prefix] && map[prefix][field];
            if (elId) {
                var errEl = document.getElementById(elId + '-err');
                var inp   = document.getElementById(elId);
                if (errEl) errEl.textContent = errors[field][0];
                if (inp)   inp.classList.add('is-invalid');
                shown = true;
            }
        });
        if (!shown) {
            var banner = document.getElementById(prefix + '-error');
            var firstMsg = errors[Object.keys(errors)[0]];
            if (banner && firstMsg) { banner.textContent = Array.isArray(firstMsg) ? firstMsg[0] : firstMsg; banner.style.display = 'block'; }
        }
    }
    function setBusy(btn, busy) {
        if (busy) {
            btn.disabled = true;
            btn.dataset.orig = btn.textContent;
            btn.innerHTML = '<span class="auth-spinner"></span> Please wait…';
        } else {
            btn.disabled = false;
            btn.textContent = btn.dataset.orig || btn.textContent;
        }
    }

    // ---- AJAX submit helper ----
    function ajaxSubmit(url, formEl, prefix, submitBtn) {
        clearErrors(prefix);
        setBusy(submitBtn, true);
        var data = new FormData(formEl);
        fetch(url, {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': getCsrf(), 'Accept': 'application/json' },
            body: data
        })
        .then(function(res) {
            if (res.ok) return res.json().then(function(d){ window.location.href = d.redirect || '/'; });
            return res.json().then(function(d){
                setBusy(submitBtn, false);
                if (d.errors) showErrors(prefix, d.errors);
                else {
                    var banner = document.getElementById(prefix + '-error');
                    if (banner) { banner.textContent = d.message || 'Something went wrong.'; banner.style.display = 'block'; }
                }
            });
        })
        .catch(function() {
            setBusy(submitBtn, false);
            var banner = document.getElementById(prefix + '-error');
            if (banner) { banner.textContent = 'Network error. Please try again.'; banner.style.display = 'block'; }
        });
    }

    document.getElementById('login-form').addEventListener('submit', function(e) {
        e.preventDefault();
        ajaxSubmit('{{ route("ajax.login") }}', this, 'login', document.getElementById('login-submit'));
    });
    document.getElementById('register-form').addEventListener('submit', function(e) {
        e.preventDefault();
        ajaxSubmit('{{ route("ajax.register") }}', this, 'register', document.getElementById('register-submit'));
    });
})();
</script>
@endguest
{{-- WhatsApp chat button (replaces Tawk.to — no third-party script, faster pages) --}}
<a class="wa-float" target="_blank" rel="noopener"
   href="https://wa.me/2348058885913?text={{ rawurlencode('Hello Sanlive Pharmacy, I need help with: '.url()->current()) }}"
   aria-label="Chat with a pharmacist on WhatsApp">
    <svg width="30" height="30" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.127.558 4.12 1.532 5.845L.053 23.25a.75.75 0 0 0 .916.98l5.604-1.474A11.953 11.953 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.75a9.71 9.71 0 0 1-4.953-1.352l-.355-.211-3.668.965.977-3.567-.232-.367A9.712 9.712 0 0 1 2.25 12C2.25 6.59 6.59 2.25 12 2.25S21.75 6.59 21.75 12 17.41 21.75 12 21.75z"/></svg>
    <span class="wa-float__label">Chat with a pharmacist</span>
</a>
</body>
</html>
