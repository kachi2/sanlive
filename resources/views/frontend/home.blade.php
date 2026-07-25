@extends('layouts.app')

@if(isset($schema))
@section('schema')
{!! $schema !!}
@endsection
@endif

{{-- Preload first hero slider image for LCP --}}
@if($sliders->isNotEmpty())
@section('preload')
<link rel="preload" as="image" href="{{ asset('images/sliders/'.$sliders->first()->image_path) }}" fetchpriority="high">
@endsection
@endif

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
/* ── Impact stats banner ── */
.hp-impact{background:linear-gradient(135deg,#103178 0%,#1a449f 100%);padding:16px 20px;position:relative;overflow:hidden;margin:4px 0 18px;border-radius:14px;box-shadow:0 6px 20px rgba(16,49,120,.18)}
.hp-impact::before{content:'';position:absolute;right:-70px;top:-70px;width:220px;height:220px;border-radius:50%;background:rgba(255,255,255,.045)}
.hp-impact::after{content:'';position:absolute;left:-60px;bottom:-60px;width:160px;height:160px;border-radius:50%;background:rgba(255,255,255,.03)}
.hp-impact__inner{display:flex;align-items:center;justify-content:space-around;flex-wrap:wrap;position:relative;gap:6px}
.hp-impact__stat{display:flex;align-items:center;gap:11px;text-align:left;padding:2px 18px}
.hp-impact__stat+.hp-impact__stat{border-left:1px solid rgba(255,255,255,.16)}
.hp-impact__icon{width:34px;height:34px;flex-shrink:0;border-radius:10px;background:rgba(255,255,255,.14);display:flex;align-items:center;justify-content:center}
.hp-impact__icon svg{width:17px;height:17px}
.hp-impact__num{font-size:19px;font-weight:800;color:#fff;line-height:1.2;white-space:nowrap}
.hp-impact__lbl{font-size:11px;color:rgba(255,255,255,.85);font-weight:600;white-space:nowrap}
.hp-impact__lbl .hp-impact__sub{color:#a8e6b8;font-weight:700}
.hp-impact__lbl .hp-impact__sub::before{content:'· '}
@media(max-width:767px){
    .hp-impact{padding:14px 14px}
    .hp-impact__inner{justify-content:flex-start;overflow-x:auto;flex-wrap:nowrap;gap:0}
    .hp-impact__stat{padding:2px 16px;flex-shrink:0}
}
/* ── Testimonials ── */
.hp-t-rating{display:inline-flex;align-items:center;gap:10px;background:#fff;border:1px solid #eef0f6;border-radius:14px;padding:9px 18px;box-shadow:0 4px 20px rgba(16,49,120,.06)}
.hp-t-rating__num{font-size:15px;font-weight:800;color:#111}
.hp-t-stars{color:#f5a623;font-size:13px;letter-spacing:2px}
.hp-t-rating__count{font-size:12px;color:#888}
.testimonial-carousel .owl-item{display:flex;height:auto;padding:4px 2px}
.hp-t-card{background:#f8f9fc;border:1px solid #eef0f6;border-radius:16px;padding:24px 22px;flex:1;display:flex;flex-direction:column}
.hp-t-card .hp-t-stars{display:block;margin-bottom:12px}
.hp-t-quote{font-size:13.5px;color:#444;line-height:1.7;margin:0 0 18px;flex:1}
.hp-t-foot{display:flex;align-items:center;gap:11px}
.hp-t-avatar{width:38px;height:38px;border-radius:50%;background:#103178;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:13px;flex-shrink:0}
.hp-t-name{font-size:13px;font-weight:700;color:#111;margin:0}
.hp-t-role{font-size:11px;color:#888;margin-top:1px}
/* ── Team ── */
.hp-team__card{background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 6px 20px rgba(16,49,120,.08);text-align:center;height:100%;transition:transform .15s,box-shadow .15s}
.hp-team__card:hover{transform:translateY(-4px);box-shadow:0 10px 28px rgba(16,49,120,.14)}
.hp-team__photo{width:100%;aspect-ratio:3/4;object-fit:cover;display:block;background:#eef2ff}
.hp-team__body{padding:14px 12px 18px}
.hp-team__name{font-size:13.5px;font-weight:800;color:#111;margin:0 0 2px}
.hp-team__cred{font-size:10.5px;color:#103178;font-weight:700;letter-spacing:.3px;margin-bottom:5px;text-transform:uppercase}
.hp-team__role{font-size:11.5px;color:#777;margin:0}
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
        @foreach($sliders as $i => $slide)
        <div>
            <div class="ps-banner">
                <div class="container-no-round">
                    <div class="ps-banner__block">
                        <div class="ps-banner__thumbnail ps-banner__fluid">
                            <a href="{{ route('products.search') }}" style="position:inherit">
                                <img class="ps-banner__image"
                                     src="{{ asset('images/sliders/'.$slide->image_path) }}"
                                     alt="{{ $slide->title ?? 'Sanlive Pharmacy | Buy prescription medicines online in Nigeria — Sanlive Pharmacy' }}"
                                     width="1200" height="480"
                                     @if($i === 0) fetchpriority="high" loading="eager" @else loading="lazy" @endif>
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
    <h1 style="font-size:1.8rem;font-weight:700;color:#103178;padding:12px 0 4px">Trusted Online Pharmacy in Nigeria &ndash; Fast &amp; Reliable Medicine Delivery</h1>
    <p style="font-size:14px; color:#555; line-height:1.7; padding:8px 0 12px;">
Sanlive Pharmacy is Nigeria's trusted PCN-licensed online pharmacy,
delivering
genuine medicines, vitamins, supplements, vaccines, and healthcare products
straight to your doorstep. We serve customers in Lagos, Abuja, Port
Harcourt,
and nationwide across Nigeria. We also ship medication to customers across
different continent, Africa, Europe, Asia, Middle-East, Australia, America,
Uk and Canada. Browse over 2,000 products across 30+ categories
and order online or via WhatsApp for fast, discreet delivery.
</p>
<div class="hp-impact">
    <div class="hp-impact__inner">
        <div class="hp-impact__stat">
            <div class="hp-impact__icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
            </div>
            <div>
                <div class="hp-impact__num">320K+</div>
                <div class="hp-impact__lbl">Lives Impacted <span class="hp-impact__sub">and still counting</span></div>
            </div>
        </div>
        <div class="hp-impact__stat">
            <div class="hp-impact__icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.29 7 12 12 20.71 7"/><line x1="12" y1="22" x2="12" y2="12"/></svg>
            </div>
            <div>
                <div class="hp-impact__num">460K+</div>
                <div class="hp-impact__lbl">Medications Delivered <span class="hp-impact__sub">and still counting</span></div>
            </div>
        </div>
        <div class="hp-impact__stat">
            <div class="hp-impact__icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
            </div>
            <div>
                <div class="hp-impact__num">23</div>
                <div class="hp-impact__lbl">Countries Reached <span class="hp-impact__sub">and still counting</span></div>
            </div>
        </div>
    </div>
</div>
    <div class="ps-noti p-2" style="border-radius:5px">
        <div class="container">
            <p class="m-0" style="color:#fff;font-weight:bold;text-align:left">Shop By Category</p>
        </div>
    </div>
    <section class="ps-section--category ps-category--image">
        <h2 class="ps-section__title">Check out the most popular categories</h2>
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
                                <img src="{{ asset('images/category/'.$cat->image_path) }}"
                                     alt="{{ $cat->name }}" width="120" height="120" loading="lazy">
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
                                 alt="{{ $product->name }}" width="280" height="280"
                                 style="aspect-ratio:auto 280/280" loading="lazy">
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

{{-- Testimonials --}}
<section class="ps-section" style="padding:44px 0 8px">
    <div class="container">
        <div style="text-align:center;margin-bottom:26px">
            <h2 style="font-size:20px;font-weight:800;color:#111;margin:0 0 10px">Why People Trust Sanlive Pharmacy</h2>
            <div class="hp-t-rating">
                <span class="hp-t-rating__num">5.0</span>
                <span class="hp-t-stars">★★★★★</span>
                <span class="hp-t-rating__count">from 19+ Google Reviews</span>
            </div>
        </div>
        <div class="owl-carousel testimonial-carousel"
             data-owl-auto="true" data-owl-loop="true" data-owl-speed="3500"
             data-owl-gap="20" data-owl-nav="true" data-owl-dots="true"
             data-owl-item="3" data-owl-item-xs="1" data-owl-item-sm="1"
             data-owl-item-md="2" data-owl-item-lg="3" data-owl-item-xl="3"
             data-owl-duration="1000" data-owl-mousedrag="on">
            <div>
                <div class="hp-t-card">
                    <span class="hp-t-stars">★★★★★</span>
                    <p class="hp-t-quote">"At Sanlive, no records for fake and substandard drugs. Sanlive Pharmacy gives you hope in standard and affordability of all their drugs."</p>
                    <div class="hp-t-foot">
                        <div class="hp-t-avatar">A</div>
                        <div>
                            <p class="hp-t-name">Adeyanju Samson</p>
                            <div class="hp-t-role">Google Review</div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="hp-t-card">
                    <span class="hp-t-stars">★★★★★</span>
                    <p class="hp-t-quote">"Great pharmaceutical services. Sanlive pharmacy, your first and best choice of med store and care services. I recommend Sanlive any day anytime."</p>
                    <div class="hp-t-foot">
                        <div class="hp-t-avatar">J</div>
                        <div>
                            <p class="hp-t-name">Joyi Joseph</p>
                            <div class="hp-t-role">Google Review</div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="hp-t-card">
                    <span class="hp-t-stars">★★★★★</span>
                    <p class="hp-t-quote">"Best store you can get authentic/original products, will definitely keep recommending my friends and family. 100%"</p>
                    <div class="hp-t-foot">
                        <div class="hp-t-avatar">S</div>
                        <div>
                            <p class="hp-t-name">Sylvia Uche</p>
                            <div class="hp-t-role">Google Review</div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="hp-t-card">
                    <span class="hp-t-stars">★★★★★</span>
                    <p class="hp-t-quote">"I had a really quick delivery than expected. Their customer service too is one of the best. Can't wait to purchase from them."</p>
                    <div class="hp-t-foot">
                        <div class="hp-t-avatar">J</div>
                        <div>
                            <p class="hp-t-name">Juliet Hetty Abrokwah</p>
                            <div class="hp-t-role">Google Review</div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="hp-t-card">
                    <span class="hp-t-stars">★★★★★</span>
                    <p class="hp-t-quote">"The service is fast and I got my order right away. Amazing customer service. Great job!"</p>
                    <div class="hp-t-foot">
                        <div class="hp-t-avatar">P</div>
                        <div>
                            <p class="hp-t-name">Pretty Princess</p>
                            <div class="hp-t-role">Google Review</div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="hp-t-card">
                    <span class="hp-t-stars">★★★★★</span>
                    <p class="hp-t-quote">"Reliable services and affordable."</p>
                    <div class="hp-t-foot">
                        <div class="hp-t-avatar">M</div>
                        <div>
                            <p class="hp-t-name">Machine Gun</p>
                            <div class="hp-t-role">Google Review</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ps-section--featured">
    <div class="container">

        <div class="ps-section__content">
            <div class="row p-3">
                     <h2 style="font-size: 18px; font-weight: 600; color: #222; margin-bottom: 8px;">
                        About Sanlive Pharmacy — Nigeria's Trusted Online Pharmacy
                    </h2>
                    <p style="font-size:13.5px; color:#666; line-height:1.8;">
                        Sanlive Pharmacy is a PCN-licensed online pharmacy delivering genuine medicines, vitamins, supplements, vaccines, and healthcare products to your doorstep across Nigeria and internationally. We serve customers in Lagos, Abuja, Port Harcourt and all 36 states in Nigeria, as well as international customers across Africa, the UK, USA, Canada, and beyond.
                    </p>
                    <p style="font-size:13.5px; color:#666; line-height:1.8;">
                        We are licensed and regulated by the Pharmacists' Council of Nigeria (PCN) and stock only NAFDAC-approved products. Whether you need prescription medications, chronic disease management drugs, baby and infant health products, skincare, vitamins, or medical equipment — we have it all in one place. Order online or via WhatsApp for same-day delivery in Lagos, nationwide delivery across Nigeria, and reliable international shipping worldwide.
                    </p>

            </div>
        </div>
    </div>
</section>

{{-- Meet Our Team --}}
<section class="ps-section" style="padding:16px 0 40px">
    <div class="container">
        <div style="text-align:center;margin-bottom:24px">
            <h2 style="font-size:20px;font-weight:800;color:#111;margin:0 0 8px">Meet Our Pharmacists &amp; Nurses</h2>
            <p style="font-size:13.5px;color:#666;max-width:520px;margin:0 auto;line-height:1.7">The licensed professionals behind every prescription review, dosage check, and delivery at Sanlive Pharmacy.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-6 col-md-4 col-lg">
                <div class="hp-team__card">
                    <img class="hp-team__photo" src="/frontend/team/sandra-vincent.jpeg" alt="Pharm. Sandra Vincent" loading="lazy">
                    <div class="hp-team__body">
                        <p class="hp-team__name">Pharm. Sandra Vincent</p>
                        <div class="hp-team__cred">B.Pharm</div>
                        <p class="hp-team__role">CEO, Sanlive Pharmacy</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg">
                <div class="hp-team__card">
                    <img class="hp-team__photo" src="/frontend/team/nurse-victoria.jpeg" alt="Nurse Victoria" loading="lazy">
                    <div class="hp-team__body">
                        <p class="hp-team__name">Nurse Victoria</p>
                        <div class="hp-team__cred">RN</div>
                        <p class="hp-team__role">Nurse, Sanlive Pharmacy</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg">
                <div class="hp-team__card">
                    <img class="hp-team__photo" src="/frontend/team/nurse-gift.jpeg" alt="Nurse Gift" loading="lazy">
                    <div class="hp-team__body">
                        <p class="hp-team__name">Nurse Gift</p>
                        <div class="hp-team__cred">RN</div>
                        <p class="hp-team__role">Nurse, Sanlive Pharmacy</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg">
                <div class="hp-team__card">
                    <img class="hp-team__photo" src="/frontend/team/pharm-mo.jpeg" alt="Pharm. MO" loading="lazy">
                    <div class="hp-team__body">
                        <p class="hp-team__name">Pharm. MO</p>
                        <div class="hp-team__cred">B.Pharm</div>
                        <p class="hp-team__role">Pharmacist, Sanlive Pharmacy</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg">
                <div class="hp-team__card">
                    <img class="hp-team__photo" src="/frontend/team/pharm-dominic.jpeg" alt="Pharm. Dominic" loading="lazy">
                    <div class="hp-team__body">
                        <p class="hp-team__name">Pharm. Dominic</p>
                        <div class="hp-team__cred">B.Pharm</div>
                        <p class="hp-team__role">Pharmacist, Sanlive Pharmacy</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
    $('.testimonial-carousel').owlCarousel({
        responsive: { 0:{items:1}, 768:{items:2}, 992:{items:3} },
        margin: 20, nav: true, dots: true,
        loop:true, autoplay:true, autoplayTimeout:3500, autoplayHoverPause:true
    });
});
</script>
<style>
.button-container{display:flex;justify-content:center;flex-wrap:wrap;gap:1.5rem;padding:2rem 1rem}
.custom-btn{display:flex;align-items:center;justify-content:center;gap:.5rem;background-color:#103178;color:#fff!important;border:none;padding:1rem 2rem;border-radius:8px;font-size:1rem;font-weight:500;text-decoration:none;transition:background-color .3s ease,transform .2s ease}
.custom-btn:hover{background-color:#27ae60;text-decoration:none;transform:translateY(-2px)}
</style>
@endsection
