<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:type" content="website">
        <meta name="application-name" content="https://sanlivepharmacy.com">
        <meta name="theme-color" content="#42b883">
        @inertiaHead
        @if (isset($page['props']['schema']))
        <script type="application/ld+json">
            {!! json_encode($page['props']['schema'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
        </script>
        @endif
        <link rel="preconnect" href="https://fonts.gstatic.com/">
        <link href="https://fonts.googleapis.com/css?family=Jost:400,500,600,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:400,500,600,700&amp;display=swap&amp;ver=1607580870">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <link href="{{ asset('images/'.$settings->fav)}}" rel="shortcut icon" type="image/png">
        <link rel="apple-touch-icon" href="{{asset('/apple-touch-icon.png')}}" sizes="180x180">
        <link rel="manifest" href="/manifest.json">
        <link rel="stylesheet" href="{{ asset('/frontend/plugins/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/frontend/fonts/Linearicons/Font/demo-files/demo.css') }}">
        <link rel="stylesheet" href="{{ asset('/frontend/plugins/bootstrap4/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/frontend/plugins/owl-carousel/assets/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('/frontend/plugins/slick/slick/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('/frontend/plugins/lightGallery/dist/css/lightgallery.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/frontend/plugins/noUiSlider/nouislider.css') }}">
        <link rel="stylesheet" href="{{ asset('/frontend/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('/frontend/css/home-8.css') }}">
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        <meta name="p:domain_verify" content="41e4054dd47a348a28e771a36e9e5092">
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MSKX7LHR');</script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-0EBDQSBKBC"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', 'G-0EBDQSBKBC');
        </script>
    </head>

    <body>
        @inertia
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
    <script src="{{ asset('/frontend/plugins/popper.min.js') }}" ></script>
    <script src="{{ asset('/frontend/plugins/bootstrap4/js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('/frontend/plugins/owl-carousel/owl.carousel.min.js') }}" ></script>
    <script src="{{ asset('/frontend/plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}" ></script>
    <script src="{{ asset('/frontend/plugins/lightGallery/dist/js/lightgallery-all.min.js') }}" ></script>
    <script src="{{ asset('/frontend/plugins/slick/slick/slick.min.js') }}" ></script>
    <script src="{{ asset('/frontend/plugins/noUiSlider/nouislider.min.js') }}" ></script>
    <script src="{{ asset('/frontend/js/main.js') }}" ></script>


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
    </body>
</html>
