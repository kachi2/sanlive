<!DOCTYPE html>
<html lang="en">
<head>
    @yield('title')
    <link href="{{ asset('images/'.$settings->fav)}}" rel="shortcut icon" type="image/png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="format-detection" content="telephone=no">
    <meta name="title" content=" {{isset($metaTitle)?$metaTitle:__('Sanlive pharmacy Online Health Store, Medicines, Vitamins')}} ">
    <meta name="description" content="{{isset($metaDescription)?$metaDescription: __('Get your healthcare needs delivered at your doorstep from the No one online Pharmacy store  Sanlive Pharmacy. Fast delivery, affordable prices')}}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="robots" content="index, follow">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="author" content="Sanlive pharmacy ">
    <meta name="application-name" content="https://sanlivepharmacy.com">

      <!-- Open Graph -->
      <meta property="og:site_name" content="Sanlive Pharmacy: Online Pharmacy in Nigeria">
      <meta property="og:title" content="{{isset($ogTitle)?$ogTitle:__('Sanlive Pharmacy: Online Pharmacy in Nigeria')}}">
      <meta property="og:description" content="{{isset($ogDescription)?$ogDescription: __('Sanlive Pharmacy is a wholesale, retail, and dispensing healthcare platform established for the distribution and retailing of locally manufactured and imported drugs. Easily get affordable medication and prescription drugs delivered to your doorstep.')}}">
      <meta property="og:image" content="{{ isset($ogImage)?$ogImage:asset('images/'.$settings->site_logo) }}">
      <meta property="og:url" content="https://sanlivepharmacy.com">
      
   <!-- Twitter -->
   <meta name="twitter:card" content="summary_large_image">
   <meta name="twitter:title" content="{{isset($twitterTitle)?$twitterTitle: __('Sanlive Pharmacy | Online Pharmacy in Nigeria')}} ">
   <meta name="twitter:description" content="{{isset($twitterDescription)?$twitterDescription:__('Online Pharmacy in Nigeria')}}">
   <meta name="twitter:image" content="{{isset($twitterImage)?$twitterImage: asset('images/'.$settings->site_logo) }}">
   
    <!-- Keywords -->
  <meta name="keywords" content="online pharmacy, medicine delivery, health store, wellness tablets, medical prescription, buy drugs online, ecommerce pharmacy">
    

   
    <link rel="stylesheet" href="{{asset('/frontend/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/fonts/Linearicons/Font/demo-files/demo.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:400,500,600,700&amp;display=swap&amp;ver=1607580870">
    <link rel="stylesheet" href="{{asset('/frontend/plugins/bootstrap4/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/plugins/owl-carousel/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/plugins/slick/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/plugins/lightGallery/dist/css/lightgallery.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/plugins/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/plugins/noUiSlider/nouislider.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/home-8.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">



    <meta name="p:domain_verify" content="41e4054dd47a348a28e771a36e9e5092"/>


    @yield('head')
    @yield('styles')
 
<style>
    .textcolor{
        color:#000;
    }
</style>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MSKX7LHR');</script>
    <!-- End Google Tag Manager -->

    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-0EBDQSBKBC"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-0EBDQSBKBC');
</script>

    <!-- Google tag (gtag.js) -->
<!--<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11172431606"></script>-->
<!-- Google tag (gtag.js) -->
{{-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-G8Q4Z4SFSQ">
    google-site-verification=C_cQyxouQa2uttVZE64GP2PeP7YnVzPWoonTiyvsebE
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-G8Q4Z4SFSQ');
</script> --}}

<!-- Google tag (gtag.js) -->
{{-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-0QPD7YQNP1"></script> --}}
{{-- <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-0QPD7YQNP1');
</script> --}}
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MSKX7LHR"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="ps-page">

@include('partials.header')
@yield('content')

{{-- @include('partials.footer') --}}

<script src="{{asset('/frontend/plugins/jquery.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/popper.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/bootstrap4/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/lightGallery/dist/js/lightgallery-all.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/slick/slick/slick.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/noUiSlider/nouislider.min.js')}}"></script>
    <script src="{{asset('/frontend/js/main.js')}}"></script>
    @yield('script')


    
    <script type="text/javascript">


let message = {!! json_encode(Session::get('msg')) !!};
let msg = {!! json_encode(Session::get('alert')) !!};
//alert(msg);
toastr.options = {
        timeOut: 6000,
        progressBar: true,
        showMethod: "slideDown",
        hideMethod: "slideUp",
        showDuration: 200,
        hideDuration: 600
    };
if(message != null && msg == 'success'){
toastr.success(message);
}else if(message != null && msg == 'error'){
    toastr.error(message);
}        
     </script>
     <!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/6575ebf907843602b800450a/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
</body>
</html>

