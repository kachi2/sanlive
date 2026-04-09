@extends('layouts.app')

@section('meta_keywords', $pageMeta['keywords'] ?? '')
@section('meta_robots', $pageMeta['robots'] ?? 'index, follow')
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
                            <div class="col-6 col-lg-4 col-md-4 col-xl-4">
                                <div class="ps-product ps-product--standard pb-3">
                                    <div class="ps-product__thumbnail">
                                        <a class="ps-product__image" href="{{ route('users.products', $prod->slug) }}">
                                            <figure>
                                                <img src="{{ asset('images/products/'.$prod->image_path) }}"
                                                     alt="{{ $prod->name }}" loading="lazy">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__tite">
                                            <a href="{{ route('users.products', $prod->slug) }}">{{ $prod->name }}</a>
                                        </h5>
                                        <div class="ps-product__meta">
                                            <span class="ps-product__price sale">{{ moneyFormat($prod->sale_price) }}</span>
                                            <span class="ps-product__del">{{ moneyFormat($prod->price) }}</span>
                                        </div>
                                    </div>
                                    <div class="product-actions">
                                        <a href="{{ route('users.products', $prod->slug) }}"
                                           class="btn btn-cart">
                                            Add to Cart <i class="fa fa-shopping-basket ml-1"></i>
                                        </a>
                                        <a target="_blank" rel="noopener noreferrer"
                                           href="https://wa.me/+2348058885913?text={{ urlencode('Please I need '.$prod->name.', the price on your website is '.moneyFormat($prod->sale_price)) }}"
                                           class="btn btn-whatsapp">
                                            <img src="{{ asset('/frontend/whatsapp.png') }}" style="width:16px;height:16px;object-fit:contain;vertical-align:middle" alt="">
                                            <span class="wa-label"> WhatsApp</span>
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
                    <div class="ps-widget ps-widget--product" style="background:#fff;border-radius:10px;padding:10px 20px">
                        <div class="ps-widget__block">
                            <h4 class="ps-widget__title">Categories</h4>
                            <div class="ps-widget__content ps-widget__category">
                                <ul class="menu--mobile">
                                    @foreach($categories as $cat)
                                    <li>
                                        <a href="{{ route('products.search', $cat->slug) }}" style="font-size:14px">
                                            {{ $cat->name }}
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
    </div>
</div>
@endsection
