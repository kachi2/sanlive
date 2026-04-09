@extends('layouts.app')

@section('styles')
<style>
/* ── Product Card (shared) ── */
.sanlive-product-card {
    background: #fff;
    border: 1px solid #eee;
    border-radius: 10px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    height: 100%;
    transition: box-shadow 0.2s;
}
.sanlive-product-card:hover { box-shadow: 0 6px 24px rgba(0,0,0,0.10); }
.sanlive-product-card__img {
    display: block;
    width: 100%;
    aspect-ratio: 1 / 1;
    object-fit: contain;
    padding: 14px;
    background: #fafafa;
}
.sanlive-product-card__body {
    padding: 10px 12px 4px;
    flex: 1;
}
.sanlive-product-card__name {
    font-size: 12px;
    font-weight: 700;
    color: #222;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    margin-bottom: 8px;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.sanlive-product-card__name a { color: inherit; text-decoration: none; }
.sanlive-product-card__name a:hover { color: #103178; }
.sanlive-product-card__price {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 10px;
}
.sanlive-product-card__sale { font-size: 15px; font-weight: 700; color: #25a244; }
.sanlive-product-card__original { font-size: 13px; color: #aaa; text-decoration: line-through; }
.sanlive-product-card__actions {
    display: flex;
    flex-direction: column;
    gap: 6px;
    padding: 0 10px 12px;
}
.btn-sanlive-cart {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 8px 6px;
    font-size: 12px;
    font-weight: 600;
    color: #333;
    background: #fff;
    border: 1.5px solid #ccc;
    border-radius: 6px;
    text-decoration: none !important;
    white-space: nowrap;
    transition: border-color 0.15s, color 0.15s;
    width: 100%;
}
.btn-sanlive-cart:hover { border-color: #103178; color: #103178; }
.btn-sanlive-wa {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 8px 6px;
    font-size: 12px;
    font-weight: 600;
    color: #fff;
    background: #25d366;
    border: 1.5px solid #25d366;
    border-radius: 6px;
    text-decoration: none !important;
    white-space: nowrap;
    transition: background 0.15s;
    width: 100%;
}
.btn-sanlive-wa:hover { background: #1ebe5d; border-color: #1ebe5d; color: #fff; }
/* On wider screens, put buttons side by side */
@media(min-width: 480px) {
    .sanlive-product-card__actions { flex-direction: row; }
    .btn-sanlive-cart, .btn-sanlive-wa { width: auto; flex: 1; }
}
</style>
@endsection

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
    <h1 style="font-size:1.3rem;font-weight:700;color:#103178;padding:12px 0 4px">Trusted Online Pharmacy in Nigeria &ndash; Fast &amp; Reliable Medicine Delivery</h1>
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
                                {{-- <a href="{{ route('products.search', $cat->slug) }}">{{ $cat->name }}</a> --}}
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
                <div class="col-6 col-md-6 col-lg-3 p-2 d-flex">
                    <div class="sanlive-product-card w-100">
                        <a href="{{ route('users.products', $product->slug) }}">
                            <img class="sanlive-product-card__img"
                                 src="{{ asset('images/products/'.$product->image_path) }}"
                                 alt="{{ $product->name }}" loading="lazy">
                        </a>
                        <div class="sanlive-product-card__body">
                            <div class="sanlive-product-card__name">
                                <a href="{{ route('users.products', $product->slug) }}">{{ $product->name }}</a>
                            </div>
                            <div class="sanlive-product-card__price">
                                <span class="sanlive-product-card__sale">{{ moneyFormat($product->sale_price) }}</span>
                                @if($product->price && $product->price != $product->sale_price)
                                <span class="sanlive-product-card__original">{{ moneyFormat($product->price) }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="sanlive-product-card__actions">
                            <a href="{{ route('users.products', $product->slug) }}" class="btn-sanlive-cart">
                                Add to Cart <i class="fa fa-shopping-basket"></i>
                            </a>
                            <a href="https://wa.me/+2348058885913?text={{ urlencode('I want to order: '.$product->name.' - Price: '.moneyFormat($product->sale_price)) }}"
                               target="_blank" rel="noopener noreferrer" class="btn-sanlive-wa">
                                <img src="{{ asset('/frontend/whatsapp.png') }}" style="width:14px;height:14px;object-fit:contain;filter:brightness(0) invert(1)" alt="">
                                WhatsApp
                            </a>
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
