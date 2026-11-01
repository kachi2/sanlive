@extends('layouts.app')

@section('meta_keywords', $pageMeta['keywords'] ?? '')
@section('meta_robots', $pageMeta['robots'] ?? 'index, follow')

@if(isset($schema) && $schema)
@section('schema')
{!! $schema !!}
@endsection
@endif

@section('styles')
<style>
.sanlive-category-sidebar {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 12px rgba(0,0,0,0.07);
    position: sticky;
    top: 80px;
}
.sidebar-header {
    background: #103178;
    color: #fff;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.6px;
    text-transform: uppercase;
    padding: 14px 18px;
}
.sidebar-list {
    list-style: none;
    margin: 0;
    padding: 6px 0;
}
.sidebar-list li + li {
    border-top: 1px solid #f3f4f7;
}
.sidebar-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 18px;
    font-size: 13.5px;
    color: #444;
    text-decoration: none !important;
    border-left: 3px solid transparent;
    transition: background 0.15s, color 0.15s, border-color 0.15s;
}
.sidebar-item:hover {
    background: #f5f7ff;
    color: #103178;
    border-left-color: #103178;
    text-decoration: none !important;
}
.sidebar-item--active {
    background: #eef2ff;
    color: #103178 !important;
    font-weight: 700;
    border-left-color: #103178 !important;
}
.sidebar-arrow {
    font-size: 12px;
    color: #bbb;
    transition: color 0.15s;
}
.sidebar-item--active .sidebar-arrow,
.sidebar-item:hover .sidebar-arrow {
    color: #103178;
}

/* ── Product Card ── */
.sanlive-product-card {
    background: #fff;
    border: 1px solid #eee;
    border-radius: 10px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: box-shadow 0.2s;
    height: 100%;
}
.sanlive-product-card:hover {
    box-shadow: 0 6px 24px rgba(0,0,0,0.10);
}
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
.sanlive-product-card__name a {
    color: inherit;
    text-decoration: none;
}
.sanlive-product-card__name a:hover { color: #103178; }
.sanlive-product-card__price {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 10px;
}
.sanlive-product-card__rx {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .2px;
    color: #b42318;
    background: #fef3f2;
    border: 1px solid #fecdca;
    border-radius: 999px;
    padding: 2px 7px 2px 3px;
    margin: -2px 0 10px;
}
.sanlive-product-card__rx::before {
    content: "℞";
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 13px;
    height: 13px;
    border-radius: 50%;
    background: #d92d20;
    color: #fff;
    font-size: 8px;
    font-weight: 700;
}
.sanlive-product-card__sale {
    font-size: 15px;
    font-weight: 700;
    color: #25a244;
}
.sanlive-product-card__original {
    font-size: 13px;
    color: #aaa;
    text-decoration: line-through;
}
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
.btn-sanlive-cart:hover {
    border-color: #103178;
    color: #103178;
}
.btn-sanlive-wa {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 8px 6px;
    font-size: 12px;
    font-weight: 600;
    color: #1e8a38;
    background: #eaf7ee;
    border: 1.5px solid #c9ebd3;
    border-radius: 6px;
    text-decoration: none !important;
    white-space: nowrap;
    transition: background 0.15s;
    width: 100%;
}
.btn-sanlive-wa:hover { background: #25a244; border-color: #25a244; color: #fff; }
/* On wider screens, put buttons side by side */
@media(min-width: 480px) {
    .sanlive-product-card__actions { flex-direction: row; }
    .btn-sanlive-cart, .btn-sanlive-wa { width: auto; flex: 1; }
}
</style>
@endsection

@section('content')
<div class="ps-categogy ps-categogy--dark" style="background:#e8e8e8">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="{{ route('users.index') }}">Home</a></li>
            <li class="ps-breadcrumb__item"><a href="{{ route('products.search') }}">Products</a></li>
            @if($searchterm)
            <li class="ps-breadcrumb__item active">{{ $searchterm }}</li>
            @endif
        </ul>
        <div class="ps-categogy__content">
            <div class="row row-reverse">
                {{-- Products Grid --}}
                <div class="col-12 col-md-9" style="background:#fff;padding:10px;border-radius:10px;top:-40px">
                    <div class="ps-categogy__wrapper">
                        <div class="ps-categogy__onsale">
                            <h1 style="font-size:15px">{{ $pageH1 ?? ($searchterm ?: 'Shop All Health Products – Sanlive Pharmacy') }}</h1>
                        </div>
                    </div>
                    <div class="ps-categogy--grid">
                        <div class="row m-0">
                            @forelse($products as $prod)
                            <div class="col-6 col-lg-4 col-md-4 col-xl-4 mb-3 d-flex">
                                <div class="sanlive-product-card w-100">
                                    <a href="{{ route('users.products', $prod->slug) }}">
                                        <img class="sanlive-product-card__img"
                                             src="{{ asset('images/products/'.$prod->image_path) }}"
                                             alt="{{ $prod->name }}" width="280" height="280"
                                             style="aspect-ratio:auto 280/280" loading="lazy">
                                    </a>
                                    <div class="sanlive-product-card__body">
                                        <div class="sanlive-product-card__name">
                                            <a href="{{ route('users.products', $prod->slug) }}">{{ $prod->name }}</a>
                                        </div>
                                        <div class="sanlive-product-card__price">
                                            <span class="sanlive-product-card__sale">{{ moneyFormat($prod->sale_price) }}</span>
                                            @if($prod->price && $prod->price != $prod->sale_price)
                                            <span class="sanlive-product-card__original">{{ moneyFormat($prod->price) }}</span>
                                            @endif
                                        </div>
                                        @if($prod->requires_prescription == 1)
                                        <div class="sanlive-product-card__rx">Prescription required</div>
                                        @endif
                                    </div>
                                    <div class="sanlive-product-card__actions">
                                        <a href="{{ route('users.products', $prod->slug) }}" class="btn-sanlive-cart">
                                            Add to Cart <i class="fa fa-shopping-basket"></i>
                                        </a>
                                        <a href="https://wa.me/+2348058885913?text={{ urlencode('Please I need '.$prod->name.', the price on your website is '.moneyFormat($prod->sale_price)) }}"
                                           target="_blank" rel="noopener noreferrer" class="btn-sanlive-wa">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.127.558 4.12 1.532 5.845L.053 23.25a.75.75 0 0 0 .916.98l5.604-1.474A11.953 11.953 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.75a9.71 9.71 0 0 1-4.953-1.352l-.355-.211-3.668.965.977-3.567-.232-.367A9.712 9.712 0 0 1 2.25 12C2.25 6.59 6.59 2.25 12 2.25S21.75 6.59 21.75 12 17.41 21.75 12 21.75z"/></svg>
                                            WhatsApp
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12">
                                <div class="ps-delivery ps-delivery--info">
                                    <div class="ps-delivery__content">
                                        <div class="ps-delivery__text">
                                            <i class="icon-shield-check"></i>
                                            <span><h2 style="font-size:15px">No Items Found</h2></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>

                    {{-- Pagination --}}
                    @if(method_exists($products, 'links'))
                    <div class="p-3">{{ $products->links() }}</div>
                    @endif
                </div>

                {{-- Category Sidebar --}}
                <div class="col-12 col-md-3" style="top:-40px">
                    <div class="sanlive-category-sidebar">
                        <div class="sidebar-header">
                            <i class="fa fa-th-list" style="margin-right:8px;opacity:0.85"></i> Categories
                        </div>
                        <ul class="sidebar-list">
                            {{-- All Products --}}
                            <li>
                                <a href="{{ route('products.search') }}"
                                   class="sidebar-item {{ !($activeCategory ?? null) && !request('q') ? 'sidebar-item--active' : '' }}">
                                    <span>All Products</span>
                                    <i class="fa fa-angle-right sidebar-arrow"></i>
                                </a>
                            </li>
                            @foreach($categories as $cat)
                            <li>
                                <a href="{{ route('products.search', $cat->slug) }}"
                                   class="sidebar-item {{ ($activeCategory ?? null) === $cat->slug ? 'sidebar-item--active' : '' }}">
                                    <span>{{ $cat->name }}</span>
                                    <i class="fa fa-angle-right sidebar-arrow"></i>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
