<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pageMeta['metaTitle'] ?? $settings->site_name ?? 'Sanlive Pharmacy' }} - Sanlive Pharmacy</title>
    <meta name="description" content="{{ $pageMeta['description'] ?? 'Get all your medications delivered to your doorstep from the No. 1 online pharmacy store in Lagos Nigeria - Sanlive Pharmacy.' }}">
    <meta name="keywords" content="{{ $pageMeta['keywords'] ?? 'online pharmacy, medicine delivery, health store, buy drugs online' }}">
    <meta name="robots" content="@yield('meta_robots', $pageMeta['robots'] ?? 'index, follow')">

    <meta property="og:type" content="{{ $pageMeta['og_type'] ?? 'website' }}">
    <meta property="og:site_name" content="Sanlive Pharmacy">
    <meta property="og:title" content="{{ $pageMeta['metaTitle'] ?? $settings->site_name ?? 'Sanlive Pharmacy' }}">
    <meta property="og:description" content="{{ $pageMeta['description'] ?? 'Get all your medications delivered to your doorstep.' }}">
    <meta property="og:image" content="{{ $pageMeta['image_url'] ?? asset('images/'.$settings->site_logo) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <link rel="canonical" href="{{ $pageMeta['url'] ?? url()->current() }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageMeta['metaTitle'] ?? $settings->site_name ?? 'Sanlive Pharmacy' }}">
    <meta name="twitter:description" content="{{ $pageMeta['description'] ?? 'Get all your medications delivered to your doorstep.' }}">
    <meta name="twitter:image" content="{{ $pageMeta['image_url'] ?? asset('images/'.$settings->site_logo) }}">

    <link href="{{ asset('images/'.$settings->fav) }}" rel="shortcut icon" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('/apple-touch-icon.png') }}" sizes="180x180">
    <link rel="manifest" href="/manifest.json">

    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:400,500,600,700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('/frontend/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/fonts/Linearicons/Font/demo-files/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/plugins/bootstrap4/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/plugins/owl-carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/plugins/slick/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/plugins/lightGallery/dist/css/lightgallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/plugins/noUiSlider/nouislider.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/plugins/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/home-8.css') }}">
    @yield('styles')

    <meta name="google-site-verification" content="S7jnu8AWZFcOOYIKhw_EWy2ieNVUEwzSkgldPg1aMZ4">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0EBDQSBKBC"></script>
    <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-0EBDQSBKBC');</script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-MSKX7LHR');</script>

    @yield('schema')
    @yield('head')
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MSKX7LHR" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

@include('frontend.partials.header-mobile')
@include('frontend.partials.mobile-sidebar')
@include('frontend.partials.header')

<div class="ps-page">
    @yield('content')
    @include('frontend.partials.footer')
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('/frontend/plugins/popper.min.js') }}"></script>
<script src="{{ asset('/frontend/plugins/bootstrap4/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/frontend/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/frontend/plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
<script src="{{ asset('/frontend/plugins/lightGallery/dist/js/lightgallery-all.min.js') }}"></script>
<script src="{{ asset('/frontend/plugins/slick/slick/slick.min.js') }}"></script>
<script src="{{ asset('/frontend/plugins/noUiSlider/nouislider.min.js') }}"></script>
    <script src="{{ asset('/frontend/plugins/select2/dist/js/select2.full.min.js') }}"></script>

<script>
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
@if($errors->any())
    toastr.error('{{ $errors->first() }}');
@endif
</script>

@yield('scripts')

<script>
// Mobile hamburger toggle is handled in mobile-sidebar.blade.php
</script>

<style>
.btn-menu { border: none; background: none; }
</style>

{{-- ===== AUTH MODAL ===== --}}
@guest
<style>
/* Overlay */
#auth-modal-overlay {
    display: none; position: fixed; inset: 0; z-index: 99999;
    background: rgba(10,34,80,.55); backdrop-filter: blur(4px);
    align-items: center; justify-content: center;
}
#auth-modal-overlay.open { display: flex; }

/* Card */
.auth-modal {
    background: #fff; border-radius: 16px; width: 100%; max-width: 440px;
    margin: 16px; box-shadow: 0 24px 72px rgba(16,49,120,.22);
    overflow: hidden; animation: authSlideIn .25s ease;
    position: relative;
}
@keyframes authSlideIn {
    from { opacity:0; transform:translateY(-18px) scale(.97); }
    to   { opacity:1; transform:translateY(0) scale(1); }
}

/* Close btn */
.auth-modal__close {
    position: absolute; top: 14px; right: 16px; background: none; border: none;
    font-size: 1.4rem; color: #8a9bb5; cursor: pointer; line-height: 1; z-index: 1;
}
.auth-modal__close:hover { color: #103178; }

/* Tabs */
.auth-tabs { display: flex; border-bottom: 2px solid #eef1f8; }
.auth-tab {
    flex: 1; padding: 18px 0 14px; text-align: center; font-weight: 600;
    font-size: .95rem; color: #8a9bb5; cursor: pointer; letter-spacing: .02em;
    border-bottom: 3px solid transparent; margin-bottom: -2px; transition: color .2s;
}
.auth-tab.active { color: #103178; border-bottom-color: #25d366; }

/* Panel */
.auth-panel { display: none; padding: 28px 30px 30px; }
.auth-panel.active { display: block; }

/* Brand mark */
.auth-brand { text-align: center; margin-bottom: 18px; }
.auth-brand img { height: 46px; object-fit: contain; }
.auth-brand h2 { font-size: 1.2rem; font-weight: 700; color: #103178; margin: 8px 0 2px; }
.auth-brand p  { font-size: .82rem; color: #8a9bb5; margin: 0; }

/* Google btn */
.auth-google-btn {
    display: flex; align-items: center; justify-content: center; gap: 10px;
    width: 100%; padding: 11px 16px; border: 1.5px solid #dadce0; border-radius: 8px;
    background: #fff; font-size: .9rem; font-weight: 500; color: #3c4043;
    cursor: pointer; text-decoration: none; transition: box-shadow .18s, background .18s;
    margin-bottom: 18px;
}
.auth-google-btn:hover { box-shadow: 0 2px 8px rgba(60,64,67,.18); background: #f8f9fa; text-decoration: none; color: #3c4043; }
.auth-google-btn svg { flex-shrink: 0; }

/* Divider */
.auth-divider {
    display: flex; align-items: center; gap: 10px; margin-bottom: 18px; color: #b0bdd0; font-size: .8rem;
}
.auth-divider::before, .auth-divider::after { content:''; flex:1; height:1px; background:#eef1f8; }

/* Fields */
.auth-field { margin-bottom: 18px; }
.auth-field label { display: block; font-size: .92rem; font-weight: 600; color: #103178; margin-bottom: 7px; }
.auth-field input {
    width: 100%; padding: 13px 16px; border: 1.5px solid #dde3ef; border-radius: 10px;
    font-size: 1rem; color: #1a2a4a; outline: none; transition: border-color .18s;
    box-sizing: border-box; background: #fafbff; height: 50px;
}
.auth-field input:focus { border-color: #103178; background: #fff; box-shadow: 0 0 0 3px rgba(16,49,120,.08); }
.auth-field input.is-invalid { border-color: #e53e3e; }
.auth-field .field-error { font-size: .84rem; color: #e53e3e; margin-top: 5px; }

/* Row for 2-col */
.auth-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
@media(max-width:420px) { .auth-row { grid-template-columns: 1fr; } }

/* Forgot link */
.auth-forgot { font-size: .78rem; color: #5b6c8f; text-align: right; margin-top: -8px; margin-bottom: 14px; display: block; }
.auth-forgot:hover { color: #103178; }

/* Submit btn */
.auth-submit {
    width: 100%; padding: 12px; background: #103178; color: #fff;
    border: none; border-radius: 8px; font-size: .95rem; font-weight: 600;
    cursor: pointer; transition: background .18s; margin-top: 4px;
}
.auth-submit:hover { background: #0a2255; }
.auth-submit:disabled { background: #8a9bb5; cursor: not-allowed; }

/* Notice */
.auth-switch { text-align: center; margin-top: 18px; font-size: .82rem; color: #8a9bb5; }
.auth-switch a { color: #103178; font-weight: 600; cursor: pointer; }

/* Spinner */
.auth-spinner {
    display: inline-block; width: 16px; height: 16px;
    border: 2px solid rgba(255,255,255,.4); border-top-color: #fff;
    border-radius: 50%; animation: authSpin .7s linear infinite; vertical-align: middle; margin-right: 6px;
}
@keyframes authSpin { to { transform: rotate(360deg); } }

/* Error banner */
.auth-error-banner {
    background: #fff5f5; border: 1px solid #fed7d7; border-radius: 8px;
    padding: 10px 14px; font-size: .83rem; color: #e53e3e; margin-bottom: 14px;
    display: none;
}
</style>

<div id="auth-modal-overlay">
    <div class="auth-modal" role="dialog" aria-modal="true" aria-label="Sign in or Register">
        <button class="auth-modal__close" id="auth-modal-close" aria-label="Close">&times;</button>

        {{-- Tabs --}}
        <div class="auth-tabs">
            <div class="auth-tab active" data-tab="login">Sign In</div>
            <div class="auth-tab" data-tab="register">Create Account</div>
        </div>

        {{-- LOGIN PANEL --}}
        <div class="auth-panel active" id="panel-login">
            <div class="auth-brand">
                @if(isset($settings) && $settings->site_logo)
                    <img src="{{ asset('/images/'.$settings->site_logo) }}" alt="{{ config('app.name') }}">
                @endif
                <p>Welcome back! Sign in to continue.</p>
            </div>

            <a href="{{ route('auth.google') }}" class="auth-google-btn">
                <svg width="18" height="18" viewBox="0 0 18 18"><path fill="#4285F4" d="M17.64 9.2c0-.637-.057-1.251-.164-1.84H9v3.481h4.844c-.209 1.125-.843 2.078-1.796 2.717v2.258h2.908c1.702-1.567 2.684-3.875 2.684-6.615z"/><path fill="#34A853" d="M9 18c2.43 0 4.467-.806 5.956-2.18L12.048 13.56C11.226 14.105 10.177 14.43 9 14.43c-2.344 0-4.328-1.584-5.036-3.711H.957v2.332A8.997 8.997 0 0 0 9 18z"/><path fill="#FBBC05" d="M3.964 10.71A5.41 5.41 0 0 1 3.682 9c0-.593.102-1.17.282-1.71V4.958H.957A8.996 8.996 0 0 0 0 9c0 1.452.348 2.827.957 4.042l3.007-2.332z"/><path fill="#EA4335" d="M9 3.58c1.321 0 2.508.454 3.44 1.345l2.582-2.58C13.463.891 11.426 0 9 0A8.997 8.997 0 0 0 .957 4.958L3.964 6.29C4.672 4.163 6.656 3.58 9 3.58z"/></svg>
                Continue with Google
            </a>

            <div class="auth-divider">or sign in with email</div>

            <div class="auth-error-banner" id="login-error"></div>

            <form id="login-form" novalidate>
                @csrf
                <div class="auth-field">
                    <label for="login-email">Email address</label>
                    <input type="email" id="login-email" name="email" placeholder="you@example.com" autocomplete="email" required>
                    <div class="field-error" id="login-email-err"></div>
                </div>
                <div class="auth-field">
                    <label for="login-password">Password</label>
                    <input type="password" id="login-password" name="password" placeholder="Your password" autocomplete="current-password" required>
                    <div class="field-error" id="login-password-err"></div>
                </div>
                <a href="{{ route('password.request') }}" class="auth-forgot">Forgot password?</a>
                <button type="submit" class="auth-submit" id="login-submit">Sign In</button>
            </form>

            <div class="auth-switch">No account? <a id="switch-to-register">Create one free</a></div>
        </div>

        {{-- REGISTER PANEL --}}
        <div class="auth-panel" id="panel-register">
            <div class="auth-brand">
                <p>Join Sanlive Pharmacy — fast, affordable healthcare delivery.</p>
            </div>

            <a href="{{ route('auth.google') }}" class="auth-google-btn">
                <svg width="18" height="18" viewBox="0 0 18 18"><path fill="#4285F4" d="M17.64 9.2c0-.637-.057-1.251-.164-1.84H9v3.481h4.844c-.209 1.125-.843 2.078-1.796 2.717v2.258h2.908c1.702-1.567 2.684-3.875 2.684-6.615z"/><path fill="#34A853" d="M9 18c2.43 0 4.467-.806 5.956-2.18L12.048 13.56C11.226 14.105 10.177 14.43 9 14.43c-2.344 0-4.328-1.584-5.036-3.711H.957v2.332A8.997 8.997 0 0 0 9 18z"/><path fill="#FBBC05" d="M3.964 10.71A5.41 5.41 0 0 1 3.682 9c0-.593.102-1.17.282-1.71V4.958H.957A8.996 8.996 0 0 0 0 9c0 1.452.348 2.827.957 4.042l3.007-2.332z"/><path fill="#EA4335" d="M9 3.58c1.321 0 2.508.454 3.44 1.345l2.582-2.58C13.463.891 11.426 0 9 0A8.997 8.997 0 0 0 .957 4.958L3.964 6.29C4.672 4.163 6.656 3.58 9 3.58z"/></svg>
                Sign up with Google
            </a>

            <div class="auth-divider">or create your account</div>

            <div class="auth-error-banner" id="register-error"></div>

            <form id="register-form" novalidate>
                @csrf
                <div class="auth-row">
                    <div class="auth-field">
                        <label for="reg-first">First name</label>
                        <input type="text" id="reg-first" name="first_name" placeholder="John" autocomplete="given-name" required>
                        <div class="field-error" id="reg-first-err"></div>
                    </div>
                    <div class="auth-field">
                        <label for="reg-last">Last name</label>
                        <input type="text" id="reg-last" name="last_name" placeholder="Doe" autocomplete="family-name" required>
                        <div class="field-error" id="reg-last-err"></div>
                    </div>
                </div>
                <div class="auth-field">
                    <label for="reg-email">Email address</label>
                    <input type="email" id="reg-email" name="email" placeholder="you@example.com" autocomplete="email" required>
                    <div class="field-error" id="reg-email-err"></div>
                </div>
                <div class="auth-field">
                    <label for="reg-phone">Phone number <span style="color:#b0bdd0;font-weight:400">(optional)</span></label>
                    <input type="tel" id="reg-phone" name="phone" placeholder="+234 800 000 0000" autocomplete="tel">
                </div>
                <div class="auth-field">
                    <label for="reg-password">Password</label>
                    <input type="password" id="reg-password" name="password" placeholder="Min. 8 characters" autocomplete="new-password" required>
                    <div class="field-error" id="reg-password-err"></div>
                </div>
                <div class="auth-field">
                    <label for="reg-confirm">Confirm password</label>
                    <input type="password" id="reg-confirm" name="password_confirmation" placeholder="Repeat password" autocomplete="new-password" required>
                </div>
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
    var openBtn = document.getElementById('open-auth-modal');
    if (openBtn) openBtn.addEventListener('click', function(e){ e.preventDefault(); openModal('login'); });

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
<script type="text/javascript">
var Tawk_API=Tawk_API||{},Tawk_LoadStart=new Date();
(function(){var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;s1.src='https://embed.tawk.to/6575ebf907843602b800450a/default';
s1.charset='UTF-8';s1.setAttribute('crossorigin','*');s0.parentNode.insertBefore(s1,s0);})();
</script>
</body>
</html>
