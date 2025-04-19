<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title inertia></title>
        <link href="https://fonts.googleapis.com/css?family=Jost:400,500,600,700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com/">
        <link href="" rel="shortcut icon" type="image/png">
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

        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>

  <body>
        @inertia
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
    </body>
</html>
