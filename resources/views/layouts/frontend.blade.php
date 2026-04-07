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
    <meta name="robots" content="index, follow">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Sanlive Pharmacy">
    <meta property="og:title" content="{{ $pageMeta['metaTitle'] ?? $settings->site_name ?? 'Sanlive Pharmacy' }}">
    <meta property="og:description" content="{{ $pageMeta['description'] ?? 'Get all your medications delivered to your doorstep.' }}">
    <meta property="og:image" content="{{ $pageMeta['image_url'] ?? asset('images/'.$settings->site_logo) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <link rel="canonical" href="{{ $pageMeta['url'] ?? url()->current() }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', $settings->site_name ?? 'Sanlive Pharmacy')">
    <meta name="twitter:description" content="@yield('og_description', 'Get all your medications delivered to your doorstep.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/'.$settings->site_logo))">

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
// Mobile menu toggle
document.getElementById('open-menus')?.addEventListener('click', function(e) {
    e.preventDefault();
    document.getElementById('mobile-sidebar')?.classList.add('active');
    this.style.display = 'none';
    document.getElementById('close-menus').style.display = 'inline';
});
document.getElementById('close-menus')?.addEventListener('click', function(e) {
    e.preventDefault();
    document.getElementById('mobile-sidebar')?.classList.remove('active');
    this.style.display = 'none';
    document.getElementById('open-menus').style.display = 'inline';
});
</script>

<style>
.ps-menu--slidebar { display: none; transition: transform 0.1s ease-in-out; }
.btn-menu { border: none; background: none; }
.ps-menu--slidebar.active { display: block; transform: translateX(0); }
</style>
<script type="text/javascript">
var Tawk_API=Tawk_API||{},Tawk_LoadStart=new Date();
(function(){var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;s1.src='https://embed.tawk.to/6575ebf907843602b800450a/default';
s1.charset='UTF-8';s1.setAttribute('crossorigin','*');s0.parentNode.insertBefore(s1,s0);})();
</script>
</body>
</html>
