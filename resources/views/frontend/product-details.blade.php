@extends('layouts.app')

@if(isset($schema))
@section('schema')
{!! $schema !!}
@endsection
@endif

@section('preload')
<link rel="preload" as="image" href="{{ asset('images/products/'.$data['product']->image_path) }}" fetchpriority="high">
@endsection

@section('styles')
<style>
/* ── Page shell ── */
.pd-page { background: #f0f2f8; padding-bottom: 64px; }

/* ── Breadcrumb ── */
.pd-breadcrumb { font-size: 12.5px; color: #888; padding: 14px 0 10px; }
.pd-breadcrumb a { color: #103178; text-decoration: none; font-weight: 500; }
.pd-breadcrumb a:hover { text-decoration: underline; }
.pd-breadcrumb span { margin: 0 6px; color: #bbb; }

/* ── Product card ── */
.pd-card { background: #fff; border-radius: 16px; box-shadow: 0 2px 20px rgba(16,49,120,.07); padding: 28px; margin-bottom: 24px; }

/* ── Image panel ── */
.pd-img-wrap { border-radius: 12px; overflow: hidden; background: #fafafa; border: 1px solid #eef0f6; display: flex; align-items: center; justify-content: center; min-height: 320px; }
.pd-img-wrap img { max-width: 100%; max-height: 360px; object-fit: contain; display: block; transition: transform .3s; }
.pd-img-wrap:hover img { transform: scale(1.04); }

/* ── Info panel ── */
.pd-category-link { font-size: 11.5px; font-weight: 700; text-transform: uppercase; letter-spacing: .6px; color: #103178; background: #eef2ff; padding: 3px 10px; border-radius: 20px; text-decoration: none; display: inline-block; margin-bottom: 12px; }
.pd-category-link:hover { background: #103178; color: #fff; text-decoration: none; }
.pd-badge-out { display: inline-block; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: .5px; background: #fde8e8; color: #c0392b; padding: 3px 10px; border-radius: 20px; margin-bottom: 8px; }
.pd-title { font-size: clamp(17px, 2.5vw, 22px); font-weight: 800; color: #111; margin: 0 0 14px; line-height: 1.3; }
.pd-price-row { display: flex; align-items: center; gap: 12px; margin-bottom: 16px; flex-wrap: wrap; }
.pd-price { font-size: 22px; font-weight: 800; color: #25a244; }
.pd-price-original { font-size: 16px; color: #aaa; text-decoration: line-through; }
.pd-divider { border: none; border-top: 1px solid #f0f2f8; margin: 16px 0; }
.pd-meta-row { font-size: 13.5px; color: #555; margin-bottom: 8px; line-height: 1.6; }
.pd-meta-row strong { color: #333; font-weight: 600; }
.pd-tagline { font-size: 13.5px; color: #555; line-height: 1.7; margin-bottom: 16px; }

/* ── Qty + buttons ── */
.pd-qty-row { display: flex; align-items: center; gap: 0; margin-bottom: 18px; }
.pd-qty-label { font-size: 13px; font-weight: 600; color: #333; margin-right: 12px; }
.pd-qty-btn { width: 34px; height: 34px; border: 1.5px solid #ddd; background: #fff; font-size: 18px; font-weight: 700; color: #333; cursor: pointer; transition: border-color .15s, color .15s; display: flex; align-items: center; justify-content: center; line-height: 1; border-radius: 0; }
.pd-qty-btn:first-of-type { border-radius: 8px 0 0 8px; }
.pd-qty-btn:last-of-type { border-radius: 0 8px 8px 0; }
.pd-qty-btn:hover { border-color: #103178; color: #103178; }
.pd-qty-input { width: 44px; height: 34px; border: 1.5px solid #ddd; border-left: none; border-right: none; text-align: center; font-size: 14px; font-weight: 600; color: #333; outline: none; }
.pd-rx-label { display: inline-flex; align-items: center; gap: 8px; font-size: 13px; color: #103178; font-weight: 600; cursor: pointer; border: 1.5px dashed #103178; border-radius: 8px; padding: 8px 14px; margin-bottom: 16px; background: #f5f7ff; }
.pd-rx-label input[type=file] { display: none; }
.pd-rx-label svg { flex-shrink: 0; }
.pd-rx-filename { font-size: 11.5px; color: #888; margin-top: 4px; }
.pd-btn-cart { display: flex; align-items: center; justify-content: center; gap: 8px; padding: 12px 24px; font-size: 14px; font-weight: 700; color: #fff; background: #103178; border: none; border-radius: 10px; cursor: pointer; text-decoration: none; transition: background .15s, box-shadow .15s; flex: 1; }
.pd-btn-cart:hover { background: #0c2660; box-shadow: 0 4px 16px rgba(16,49,120,.25); color: #fff; }
.pd-btn-wa { display: flex; align-items: center; justify-content: center; gap: 8px; padding: 12px 24px; font-size: 14px; font-weight: 700; color: #fff; background: #25d366; border: none; border-radius: 10px; text-decoration: none; transition: background .15s, box-shadow .15s; flex: 1; }
.pd-btn-wa:hover { background: #1ebe5d; box-shadow: 0 4px 16px rgba(37,211,102,.25); color: #fff; text-decoration: none; }
.pd-actions { display: flex; gap: 10px; flex-wrap: wrap; }

/* ── Share row ── */
.pd-share-row { display: flex; align-items: center; gap: 10px; margin-top: 20px; flex-wrap: wrap; }
.pd-share-label { font-size: 12px; font-weight: 600; color: #888; text-transform: uppercase; letter-spacing: .6px; }
.pd-share-btn { width: 34px; height: 34px; border-radius: 50%; border: 1.5px solid #eee; display: flex; align-items: center; justify-content: center; color: #555; font-size: 15px; text-decoration: none; transition: border-color .15s, color .15s, background .15s; }
.pd-share-btn:hover { border-color: #103178; color: #fff; background: #103178; }

/* ── Tabs ── */
.pd-tabs { margin-bottom: 28px; }
.pd-tab-nav { display: flex; gap: 0; border-bottom: 2px solid #eef0f6; margin-bottom: 0; list-style: none; padding: 0; flex-wrap: wrap; }
.pd-tab-nav__item { margin-bottom: -2px; }
.pd-tab-nav__link { display: block; padding: 11px 22px; font-size: 13.5px; font-weight: 600; color: #777; text-decoration: none; border-bottom: 2px solid transparent; transition: color .15s, border-color .15s; white-space: nowrap; cursor: pointer; }
.pd-tab-nav__link:hover { color: #103178; }
.pd-tab-nav__link.active { color: #103178; border-bottom-color: #103178; }
.pd-tab-pane { display: none; padding: 24px 4px 8px; }
.pd-tab-pane.active { display: block; }
.pd-description { font-size: 14.5px; color: #444; line-height: 1.8; }
.pd-description h1,.pd-description h2,.pd-description h3 { color: #103178; font-weight: 700; margin-bottom: 10px; }
.pd-description p { margin-bottom: 12px; }
.pd-description ul, .pd-description ol { padding-left: 20px; margin-bottom: 14px; }

/* ── Reviews ── */
.pd-review-item { border-bottom: 1px solid #f0f2f8; padding: 16px 0; }
.pd-review-item:last-child { border-bottom: none; }
.pd-review-name { font-size: 13.5px; font-weight: 700; color: #222; }
.pd-review-date { font-size: 11.5px; color: #aaa; margin-left: 8px; }
.pd-review-stars { color: #f5a623; font-size: 12px; margin: 4px 0 6px; }
.pd-review-text { font-size: 13.5px; color: #555; line-height: 1.6; margin: 0; }
.pd-review-empty { font-size: 14px; color: #aaa; padding: 20px 0; text-align: center; }
.pd-review-form label { font-size: 13px; font-weight: 600; color: #333; margin-bottom: 6px; display: block; }
.pd-star-rating { display: flex; flex-direction: row-reverse; justify-content: flex-end; gap: 4px; font-size: 30px; margin-bottom: 16px; }
.pd-star-rating input { display: none; }
.pd-star-rating label { color: #ddd; cursor: pointer; margin: 0; line-height: 1; transition: color .1s; }
.pd-star-rating input:checked ~ label,
.pd-star-rating label:hover,
.pd-star-rating label:hover ~ label { color: #f5a623; }

/* ── Related products ── */
.pd-related { margin-top: 8px; }
.pd-related__header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; }
.pd-related__title { font-size: 18px; font-weight: 800; color: #111; margin: 0; }
.pd-related__title span { color: #103178; }
.sanlive-product-card { background: #fff; border: 1px solid #eee; border-radius: 10px; overflow: hidden; display: flex; flex-direction: column; transition: box-shadow .2s; height: 100%; }
.sanlive-product-card:hover { box-shadow: 0 6px 24px rgba(0,0,0,.10); }
.sanlive-product-card__img { display: block; width: 100%; aspect-ratio: 1/1; object-fit: contain; padding: 14px; background: #fafafa; }
.sanlive-product-card__body { padding: 10px 12px 4px; flex: 1; }
.sanlive-product-card__name { font-size: 12px; font-weight: 700; color: #222; text-transform: uppercase; letter-spacing: .3px; margin-bottom: 8px; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
.sanlive-product-card__name a { color: inherit; text-decoration: none; }
.sanlive-product-card__name a:hover { color: #103178; }
.sanlive-product-card__price { display: flex; align-items: center; gap: 8px; margin-bottom: 10px; }
.sanlive-product-card__sale { font-size: 15px; font-weight: 700; color: #25a244; }
.sanlive-product-card__original { font-size: 13px; color: #aaa; text-decoration: line-through; }
.sanlive-product-card__actions { display: flex; flex-direction: column; gap: 6px; padding: 0 10px 12px; }
.btn-sanlive-cart { display: flex; align-items: center; justify-content: center; gap: 6px; padding: 8px 6px; font-size: 12px; font-weight: 600; color: #333; background: #fff; border: 1.5px solid #ccc; border-radius: 6px; text-decoration: none !important; white-space: nowrap; transition: border-color .15s, color .15s; width: 100%; }
.btn-sanlive-cart:hover { border-color: #103178; color: #103178; }
.btn-sanlive-wa { display: flex; align-items: center; justify-content: center; gap: 6px; padding: 8px 6px; font-size: 12px; font-weight: 600; color: #fff; background: #25d366; border: 1.5px solid #25d366; border-radius: 6px; text-decoration: none !important; white-space: nowrap; transition: background .15s; width: 100%; }
.btn-sanlive-wa:hover { background: #1ebe5d; border-color: #1ebe5d; color: #fff; }
@media(min-width:480px) {
    .sanlive-product-card__actions { flex-direction: row; }
    .btn-sanlive-cart, .btn-sanlive-wa { width: auto; flex: 1; }
}
</style>
@endsection

@section('content')
<div class="pd-page">
<div class="container">

    {{-- Breadcrumb --}}
    <div class="pd-breadcrumb">
        <a href="{{ route('users.index') }}">Home</a>
        <span>›</span>
        <a href="{{ route('products.search') }}">{{ $data['product']->category->name ?? 'Products' }}</a>
        <span>›</span>
        {{ Str::limit($data['product']->name, 50) }}
    </div>
    {{-- Main Product Card --}}
    <div class="pd-card">
        <div class="row g-4">

            {{-- Image --}}
            <div class="col-12 col-lg-5">
                <div class="pd-img-wrap">
                    <img src="{{ asset('images/products/'.$data['product']->image_path) }}"
                         alt="{{ $data['product']->name }}"
                         width="600" height="600"
                         fetchpriority="high" loading="eager">
                </div>
            </div>

            {{-- Info --}}
            <div class="col-12 col-lg-7">

                @if($data['product']->status == 1)
                <div class="pd-badge-out">Out of Stock</div>
                @endif

                <a href="{{ route('products.search') }}?category={{ $data['product']->category->id ?? '' }}" class="pd-category-link">
                    {{ $data['product']->category->name ?? 'General' }}
                </a>

                <h1 class="pd-title">{{ $data['product']->name }}</h1>

                <div class="pd-price-row">
                    <span class="pd-price">{{ moneyFormat($data['product']->sale_price) }}</span>
                    @if($data['product']->price && $data['product']->price != $data['product']->sale_price)
                    <span class="pd-price-original">{{ moneyFormat($data['product']->price) }}</span>
                    @endif
                </div>

                @if($data['product']->tagline)
                <div class="pd-tagline">{!! preg_replace('/Description:/i', '', $data['product']->tagline) !!}</div>
                @endif

                @if($data['product']->brand)
                <div class="pd-meta-row"><strong>Manufacturer:</strong> {{ $data['product']->brand }}</div>
                @endif

                <hr class="pd-divider">

                <form action="{{ route('carts.add', $data['product']->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Qty --}}
                    <div class="pd-qty-row">
                        <span class="pd-qty-label">Qty</span>
                        <button type="button" class="pd-qty-btn" onclick="changeQty(-1)">−</button>
                        <input type="text" name="qty" id="qty" value="1" class="pd-qty-input">
                        <button type="button" class="pd-qty-btn" onclick="changeQty(1)">+</button>
                    </div>

                    {{-- Prescription upload --}}
                    @if($data['product']->requires_prescription == 1)
                    <label for="precription_upload" class="pd-rx-label">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                        Upload Prescription
                        <input type="file" id="precription_upload" name="image" onchange="document.getElementById('rx-fname').textContent = this.files[0]?.name ?? ''">
                    </label>
                    <div id="rx-fname" class="pd-rx-filename"></div>
                    @endif

                    {{-- Action buttons --}}
                    <div class="pd-actions">
                        <button type="submit" class="pd-btn-cart" id="add2cart"
                            {{ $data['product']->status == 1 ? 'disabled' : '' }}>
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                            Add to Cart
                        </button>
                        <a target="_blank" rel="noopener noreferrer"
                           href="https://wa.me/+2348058885913?text={{ urlencode('Hi, I need '.$data['product']->name.'. Price on your website: '.moneyFormat($data['product']->sale_price)) }}"
                           class="pd-btn-wa">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.127.558 4.12 1.532 5.845L.053 23.25a.75.75 0 0 0 .916.98l5.604-1.474A11.953 11.953 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.75a9.71 9.71 0 0 1-4.953-1.352l-.355-.211-3.668.965.977-3.567-.232-.367A9.712 9.712 0 0 1 2.25 12C2.25 6.59 6.59 2.25 12 2.25S21.75 6.59 21.75 12 17.41 21.75 12 21.75z"/></svg>
                            Order on WhatsApp
                        </a>
                    </div>
                </form>

                {{-- Share --}}
                <div class="pd-share-row">
                    <span class="pd-share-label">Share</span>
                    <a class="pd-share-btn" target="_blank" rel="noopener noreferrer"
                       href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('users.products', $data['product']->slug)) }}"
                       title="Facebook"><i class="fa fa-facebook"></i></a>
                    <a class="pd-share-btn" target="_blank" rel="noopener noreferrer"
                       href="https://twitter.com/share?url={{ urlencode(route('users.products', $data['product']->slug)) }}"
                       title="Twitter"><i class="fa fa-twitter"></i></a>
                    <a class="pd-share-btn" target="_blank" rel="noopener noreferrer"
                       href="https://api.whatsapp.com/send?text={{ urlencode(route('users.products', $data['product']->slug)) }}"
                       title="WhatsApp"><i class="fa fa-whatsapp"></i></a>
                </div>

            </div>
        </div>
    </div>

    {{-- Tabs: Description / Reviews / Write Review --}}
    <div class="pd-card pd-tabs">
        <ul class="pd-tab-nav" id="pdTabNav">
            <li class="pd-tab-nav__item">
                <a class="pd-tab-nav__link active" data-pd-tab="pd-description">Description</a>
            </li>
            <li class="pd-tab-nav__item">
                <a class="pd-tab-nav__link" data-pd-tab="pd-reviews">
                    Reviews
                    @if($reviews->total() > 0)
                    <span style="background:#103178;color:#fff;font-size:10px;font-weight:700;padding:1px 7px;border-radius:20px;margin-left:4px">{{ $reviews->total() }}</span>
                    @endif
                </a>
            </li>
            <li class="pd-tab-nav__item">
                <a class="pd-tab-nav__link" data-pd-tab="pd-write-review">Write a Review</a>
            </li>
        </ul>

        {{-- Description --}}
        <div class="pd-tab-pane active" id="pd-description">
            <div class="pd-description">
                {!! $data['product']->description !!}
            </div>
        </div>

        {{-- Reviews --}}
        <div class="pd-tab-pane" id="pd-reviews">
            @forelse($reviews as $review)
            <div class="pd-review-item">
                <span class="pd-review-name">{{ $review->name ?? 'Anonymous' }}</span>
                <span class="pd-review-date">{{ $review->created_at->diffForHumans() }}</span>
                <div class="pd-review-stars">
                    @for($i=1;$i<=5;$i++)
                        <i class="fa fa-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
                    @endfor
                </div>
                @if($review->title)
                <p style="font-size:13px; font-weight:600; color:#333; margin:4px 0 2px">{{ $review->title }}</p>
                @endif
                <p class="pd-review-text">{{ $review->comment }}</p>
            </div>
            @empty
            <p class="pd-review-empty">No reviews yet — be the first!</p>
            @endforelse
            @if(method_exists($reviews, 'links') && $reviews->lastPage() > 1)
            <div style="margin-top:16px">{{ $reviews->links() }}</div>
            @endif
        </div>

        {{-- Write Review --}}
        <div class="pd-tab-pane" id="pd-write-review">
            @auth
            <form action="/store/product/reviews" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $data['product']->id }}">
                <input type="hidden" name="name"  value="{{ Auth::user()->first_name.' '.Auth::user()->last_name }}">
                <input type="hidden" name="email" value="{{ Auth::user()->email }}">

                <div style="margin-bottom:16px">
                    <label style="display:block; font-size:13px; font-weight:600; color:#333; margin-bottom:6px">Review Title <span style="font-weight:400;color:#aaa">(optional)</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Summarise your experience..." style="border-radius:8px; font-size:13.5px; height:44px;">
                </div>
                <div style="margin-bottom:16px">
                    <label style="display:block; font-size:13px; font-weight:600; color:#333; margin-bottom:6px">Your Rating</label>
                    <div class="pd-star-rating">
                        @for($r=5;$r>=1;$r--)
                        <input type="radio" name="rating" id="pds{{ $r }}" value="{{ $r }}">
                        <label for="pds{{ $r }}" title="{{ $r }} star{{ $r > 1 ? 's' : '' }}">&#9733;</label>
                        @endfor
                    </div>
                </div>
                <div style="margin-bottom:16px">
                    <label style="font-size:13px; font-weight:600; color:#333; display:block; margin-bottom:6px">Your Review</label>
                    <textarea name="comment" class="form-control" rows="4" placeholder="Share your experience with this product..." style="border-radius:8px; font-size:13.5px"></textarea>
                </div>
                <button type="submit" class="pd-btn-cart" style="max-width:180px">Submit Review</button>
            </form>
            @else
            <p style="font-size:14px; color:#666; padding:8px 0">
                <a href="#" data-auth-modal="login" style="color:#103178; font-weight:700">Log in</a> to write a review.
            </p>
            @endauth
        </div>
    </div>

    {{-- Related Products --}}
    @if($data['related']->count())
    <div class="pd-related">
        <div class="pd-related__header">
            <h2 class="pd-related__title">Related <span>Products</span></h2>
        </div>
        <div class="row g-3">
            @foreach($data['related']->reject(fn($r) => $r->id == $data['product']->id)->take(8) as $rel)
            <div class="col-6 col-md-4 col-lg-3 d-flex">
                <div class="sanlive-product-card w-100">
                    <a href="{{ route('users.products', $rel->slug) }}">
                        <img class="sanlive-product-card__img"
                             src="{{ asset('images/products/'.$rel->image_path) }}"
                             alt="{{ $rel->name }}" width="280" height="280"
                             style="aspect-ratio:auto 280/280" loading="lazy">
                    </a>
                    <div class="sanlive-product-card__body">
                        <div class="sanlive-product-card__name">
                            <a href="{{ route('users.products', $rel->slug) }}">{{ $rel->name }}</a>
                        </div>
                        <div class="sanlive-product-card__price">
                            <span class="sanlive-product-card__sale">{{ moneyFormat($rel->sale_price) }}</span>
                            @if($rel->price && $rel->price != $rel->sale_price)
                            <span class="sanlive-product-card__original">{{ moneyFormat($rel->price) }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="sanlive-product-card__actions">
                        <a href="{{ route('users.products', $rel->slug) }}" class="btn-sanlive-cart">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                            View &amp; Add
                        </a>
                        <a target="_blank" rel="noopener noreferrer"
                           href="https://wa.me/+2348058885913?text={{ urlencode('Hi, I need '.$rel->name.'. Price: '.moneyFormat($rel->sale_price)) }}"
                           class="btn-sanlive-wa">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413z"/></svg>
                            WhatsApp
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

</div>{{-- /container --}}
</div>{{-- /pd-page --}}
@endsection

@section('scripts')
<script>
function changeQty(delta) {
    var input = document.getElementById('qty');
    var val = parseInt(input.value) || 1;
    val = Math.max(1, val + delta);
    input.value = val;
}

// Simple tab switcher
document.querySelectorAll('[data-pd-tab]').forEach(function(link) {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        var target = this.getAttribute('data-pd-tab');
        document.querySelectorAll('.pd-tab-nav__link').forEach(function(l){ l.classList.remove('active'); });
        document.querySelectorAll('.pd-tab-pane').forEach(function(p){ p.classList.remove('active'); });
        this.classList.add('active');
        document.getElementById(target).classList.add('active');
    });
});
</script>
@endsection
