@extends('layouts.app')

@section('meta_keywords', $pageMeta['keywords'] ?? '')
@section('meta_robots', $pageMeta['robots'] ?? 'index, follow')

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
    gap: 6px;
    padding: 0 12px 12px;
}
.btn-sanlive-cart {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 7px 6px;
    font-size: 11.5px;
    font-weight: 600;
    color: #333;
    background: #fff;
    border: 1.5px solid #ccc;
    border-radius: 6px;
    text-decoration: none !important;
    white-space: nowrap;
    transition: border-color 0.15s, color 0.15s;
}
.btn-sanlive-cart:hover {
    border-color: #103178;
    color: #103178;
}
.btn-sanlive-wa {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    padding: 7px 6px;
    font-size: 11.5px;
    font-weight: 600;
    color: #fff;
    background: #25d366;
    border: 1.5px solid #25d366;
    border-radius: 6px;
    text-decoration: none !important;
    white-space: nowrap;
    transition: background 0.15s;
}
.btn-sanlive-wa:hover { background: #1ebe5d; border-color: #1ebe5d; color: #fff; }
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
                                             alt="{{ $prod->name }}" loading="lazy">
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
                                    </div>
                                    <div class="sanlive-product-card__actions">
                                        <a href="{{ route('users.products', $prod->slug) }}" class="btn-sanlive-cart">
                                            Add to Cart <i class="fa fa-shopping-basket"></i>
                                        </a>
                                        <a href="https://wa.me/+2348058885913?text={{ urlencode('Please I need '.$prod->name.', the price on your website is '.moneyFormat($prod->sale_price)) }}"
                                           target="_blank" rel="noopener noreferrer" class="btn-sanlive-wa">
                                            <img src="{{ asset('/frontend/whatsapp.png') }}" style="width:14px;height:14px;object-fit:contain;filter:brightness(0) invert(1)" alt="">
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
