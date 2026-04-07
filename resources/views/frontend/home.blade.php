@extends('layouts.app')


@section('content')
<div class="ps-home ps-home--8">
<div class="ps-home__content">

{{-- Hero Slider --}}
<section class="ps-section--banner ps-banner--container">
    <div class="ps-section__overlay"><div class="ps-section__loading"></div></div>
    <div class="owl-carousel slider-carousel"
         data-owl-auto="true" data-owl-loop="true" data-owl-speed="4000"
         data-owl-gap="0" data-owl-nav="true" data-owl-dots="true"
         data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1"
         data-owl-item-md="1" data-owl-item-lg="1"
         data-owl-duration="1000" data-owl-mousedrag="on">
        @foreach($sliders as $slide)
        <div>
            <div class="ps-banner">
                <div class="container-no-round">
                    <div class="ps-banner__block">
                        <div class="ps-banner__thumbnail ps-banner__fluid">
                            <a href="{{ route('products.search') }}" style="position:inherit">
                                <img class="ps-banner__image"
                                     src="{{ asset('images/sliders/'.$slide->image_path) }}"
                                     alt="{{ $slide->title ?? 'Sanlive Pharmacy' }}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- Category Carousel --}}
<div class="container p-2">
    <div class="ps-noti p-2" style="border-radius:5px">
        <div class="container">
            <p class="m-0" style="color:#fff;font-weight:bold;text-align:left">Shop By Category</p>
        </div>
    </div>
    <section class="ps-section--category ps-category--image">
        <h3 class="ps-section__title">Check out the most popular categories</h3>
        <div class="ps-section__content">
            <div class="ps-section__carousel">
                <div class="owl-carousel category-carousel"
                     data-owl-auto="true" data-owl-loop="true" data-owl-speed="100"
                     data-owl-gap="0" data-owl-nav="true" data-owl-dots="true"
                     data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2"
                     data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5"
                     data-owl-duration="1000" data-owl-mousedrag="on">
                    @foreach($allCategories as $cat)
                    <div>
                        <div class="ps-category__thumbnail">
                            <a class="ps-category__image" href="{{ route('products.search', $cat->slug) }}">
                                <img src="{{ asset('images/category/'.$cat->image_path) }}" alt="{{ $cat->name }}">
                            </a>
                            <div class="ps-category__content">
                                <a href="{{ route('products.search', $cat->slug) }}">{{ $cat->name }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <div class="button-container">
        <a href="{{ route('products.search') }}" class="custom-btn">
            <span>📂</span><span>All Categories</span>
        </a>
        <a href="{{ route('contactUs') }}" class="custom-btn">
            <span>⭐</span><span>Special Medication Request</span>
        </a>
        <a href="{{ route('user.prescription') }}" class="custom-btn">
            <span>📤</span><span>Upload Doctor's Prescription</span>
        </a>
    </div>
</div>

{{-- Product Sections by Category --}}
@foreach($productSections as $section)
<section class="ps-section--featured">
    <div class="container">
        <div class="ps-noti p-2" style="border-radius:5px">
            <a href="{{ route('products.search', $section->slug) }}">
                <p class="ml-2" style="color:#fff;font-weight:bold;text-align:left">{{ $section->name }}</p>
            </a>
        </div>
        <div class="ps-section__content">
            <div class="row m-0">
                @foreach($section->products as $product)
                <div class="col-6 p-2 col-md-6 col-lg-3 pt-4">
                    <div class="ps-section__product shadow-sm">
                        <div class="ps-product ps-product--standard" style="background-color:#fff">
                            <div class="ps-product__thumbnail">
                                <a class="ps-product__image" href="{{ route('users.products', $product->slug) }}" style="max-height:250px">
                                    <figure>
                                        <img src="{{ asset('images/products/'.$product->image_path) }}"
                                             alt="{{ $product->name }}" loading="lazy">
                                    </figure>
                                </a>
                            </div>
                            <div class="ps-product__content">
                                <h3 style="font-size:14px">
                                    <a href="{{ route('users.products', $product->slug) }}">{{ $product->name }}</a>
                                </h3>
                                <p class="ps-product__meta">
                                    <span class="ps-product__price sale">{{ moneyFormat($product->sale_price) }}</span>
                                    <span class="ps-product__del">{{ moneyFormat($product->price) }}</span>
                                </p>
                                <div class="row">
                                    <div class="col-12 col-md-6 p-2">
                                        <a class="btn btn-lg" href="{{ route('users.products', $product->slug) }}"
                                           style="background:#fff;color:#73c2fb;border:1px solid #73c2fb;">
                                            <i class="fa fa-plus"></i> Add to basket
                                        </a>
                                    </div>
                                    <div class="col-12 col-md-6 p-2">
                                        <a target="_blank" rel="noopener noreferrer"
                                           href="https://wa.me/+2348058885913?text={{ urlencode('I want to order: '.$product->name.' - Price: '.moneyFormat($product->sale_price)) }}">
                                            <img src="{{ asset('/frontend/whatsapp.png') }}" style="width:90px" alt="Order via WhatsApp">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endforeach

</div>{{-- .ps-home__content --}}
</div>{{-- .ps-home --}}
@endsection

@section('scripts')
<script>
$(document).ready(function () {
    $('.slider-carousel').owlCarousel({ items:1, loop:true, autoplay:true, autoplayTimeout:4000 });
    $('.category-carousel').owlCarousel({
        responsive: { 0:{items:2}, 600:{items:4}, 1000:{items:6} },
        loop:true, autoplay:true
    });
});
</script>
<style>
.button-container{display:flex;justify-content:center;flex-wrap:wrap;gap:1.5rem;padding:2rem 1rem}
.custom-btn{display:flex;align-items:center;justify-content:center;gap:.5rem;background-color:#103178;color:#fff!important;border:none;padding:1rem 2rem;border-radius:8px;font-size:1rem;font-weight:500;text-decoration:none;transition:background-color .3s ease,transform .2s ease}
.custom-btn:hover{background-color:#27ae60;text-decoration:none;transform:translateY(-2px)}
</style>
@endsection
