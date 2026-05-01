@extends('layouts.app')

@section('meta_robots', 'noindex, nofollow')

@section('styles')
<style>
.sanlive-product-card{background:#fff;border:1px solid #eee;border-radius:10px;overflow:hidden;display:flex;flex-direction:column;height:100%;transition:box-shadow .2s}
.sanlive-product-card:hover{box-shadow:0 6px 24px rgba(0,0,0,.10)}
.sanlive-product-card__img{display:block;width:100%;aspect-ratio:1/1;object-fit:contain;padding:12px;background:#fafafa}
.sanlive-product-card__body{padding:8px 10px 4px;flex:1}
.sanlive-product-card__name{font-size:12px;font-weight:700;color:#222;text-transform:uppercase;letter-spacing:.3px;margin-bottom:6px;line-height:1.4;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.sanlive-product-card__name a{color:inherit;text-decoration:none}
.sanlive-product-card__name a:hover{color:#103178}
.sanlive-product-card__price{display:flex;align-items:center;gap:6px;margin-bottom:8px}
.sanlive-product-card__sale{font-size:14px;font-weight:700;color:#25a244}
.sanlive-product-card__original{font-size:12px;color:#aaa;text-decoration:line-through}
.sanlive-product-card__actions{display:flex;flex-direction:column;gap:6px;padding:0 10px 10px}
.btn-sanlive-cart{display:flex;align-items:center;justify-content:center;gap:6px;padding:8px 6px;font-size:12px;font-weight:600;color:#333;background:#fff;border:1.5px solid #ccc;border-radius:6px;text-decoration:none!important;white-space:nowrap;transition:border-color .15s,color .15s;width:100%}
.btn-sanlive-cart:hover{border-color:#103178;color:#103178}
.btn-sanlive-wa{display:flex;align-items:center;justify-content:center;gap:6px;padding:8px 6px;font-size:12px;font-weight:600;color:#fff;background:#25d366;border:1.5px solid #25d366;border-radius:6px;text-decoration:none!important;white-space:nowrap;transition:background .15s;width:100%}
.btn-sanlive-wa:hover{background:#1ebe5d;border-color:#1ebe5d;color:#fff}
@media(min-width:480px){.sanlive-product-card__actions{flex-direction:row}.btn-sanlive-cart,.btn-sanlive-wa{width:auto;flex:1}}
</style>
@endsection

@section('content')
<div class="ps-shopping" style="background: #fff">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-9 mt-5" style="background: #fff">
                    @if(count($carts) > 0)
                    <div class="ps-categogy--list">
                        @foreach($carts as $cart)
                        <form action="{{ route('carts.update') }}" method="POST" id="cartUpdate">
                            @csrf
                            <input type="hidden" name="cartId" value="{{ $cart->id }}">
                            <input type="hidden" name="qty" value="{{ $cart->quantity }}">
                            <div class="ps-product ps-product--list" style="border:2px solid #d1d5dad4; border-radius:10px">
                                <div class="ps-product__content" style="border-right:0px">
                                    <div class="ps-product__thumbnail">
                                        <a class="ps-product__image" href="#">
                                            <figure>
                                                <img src="{{ asset('images/products/'.($cart->associatedModel->image_path ?? '')) }}" alt="{{ $cart->associatedModel->name ?? 'Product image' }}" width="80" height="80" loading="lazy">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="ps-product__info">
                                        <a class="ps-product__branch" href="#">{{ $cart->associatedModel->category->name ?? '' }}</a>
                                        <h3 class="ps-product__tite" style="font-size:16px; color:#262525"><a>{{ $cart->name }}</a></h3>
                                        <div class="ps-product__meta">
                                            <span class="ps-product__price" style="font-size:15px"></span>
                                            {{ moneyFormat($cart->associatedModel->sale_price ?? $cart->price) }}
                                            <span class="ps-product__del" style="font-size:15px">
                                                {{ moneyFormat($cart->associatedModel->price ?? 0) }}
                                            </span>
                                        </div>
                                        <ul class="ps-product__list">
                                            <li><span class="ps-list__title">SKU: </span><a class="ps-list__text" href="#">{{ $cart->associatedModel->sku ?? '' }}</a></li>
                                        </ul>
                                        <button type="submit" name="action" value="-" class="ps-btn--success decrement-btn" style="width: 30px; border-radius:3px; height:30px"> - </button>
                                        <input type="text" value="{{ $cart->quantity }}" class="qty" style="border: 1px solid #8c8a8a53; height:30px; width:30px; text-align:center">
                                        <button type="submit" name="action" value="+" class="ps-btn--success increment-btn" style="width: 30px; border-radius:3px; height:30px"> + </button>
                                        <span style="padding-left:10px">
                                            <a href="{{ route('carts.delete', $cart->id) }}" class="btn btn-danger">Remove</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endforeach
                    </div>
                    @else
                    <div class="ps-product ps-product--li">
                        <div class="ps-prod" style="border-right:0px">
                            <p style="text-align: center">
                                <i style="font-size:50px; padding-right:2px; font-weight:800" class="icon-cart-empty"></i>
                                <br> Your cart is empty.
                                You have not added any item to your cart.
                            </p>
                        </div>
                    </div>
                    @endif
                </div>
                @if(count($carts) > 0)
                <div class="col-12 col-md-5 col-lg-3">
                    <div class="ps-shopping__box mt-5" style="background: #fff">
                        <div class="ps-shopping__row">
                            <div class="ps-shopping__label">Cart Summary</div>
                        </div>
                        <div class="ps-shopping__form">
                            <div class="ps-shopping__group">
                                <input class="form-control ps-input" type="text" placeholder="County">
                            </div>
                            <div class="ps-shopping__group">
                                <input class="form-control ps-input" type="text" placeholder="Town / City">
                            </div>
                            <div class="ps-shopping__group">
                                <input class="form-control ps-input" type="text" placeholder="Postcode">
                            </div>
                        </div>
                        <div class="ps-shopping__row">
                            <div class="ps-shopping__label">Total</div>
                            <div class="ps-shopping__price">{{ moneyFormat($total) }}</div>
                        </div>
                        <div class="ps-shopping__text">Shipping options will be updated during checkout.</div>
                        <div class="ps-shopping__checkout">
                            <a class="ps-btn ps-btn--primary" style="border-radius:5px" href="{{ route('checkout.index', ['cart' => $cartSession]) }}">Proceed to checkout</a>
                            <a class="ps-shopping__link" href="{{ route('products.search') }}">Continue Shopping</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div style="height: 2em; background:#eee"></div>
<section class="ps-section--latest" style="margin-top:5px">
    <div class="container" style="background:#f4f3f33f; padding:10px; border:5px solid #ede8e836">
        <div class="ps-noti p-2" style="border-radius:5px">
            <p class="ml-2" style="color:#fff; font-weight:bold; text-align:left">Latest Products</p>
        </div>
        @if($latest->count())
        <div class="row" style="margin-top:12px;">
            @foreach($latest as $prod)
            <div class="col-6 col-md-4 col-lg-3 mb-3">
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
                            @if($prod->price > $prod->sale_price)
                            <span class="sanlive-product-card__original">{{ moneyFormat($prod->price) }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="sanlive-product-card__actions">
                        <a href="{{ route('users.products', $prod->slug) }}" class="btn-sanlive-cart">
                            <i class="icon-cart" style="font-size:13px;"></i> Add to Cart
                        </a>
                        <a href="https://wa.me/+2348058885913?text={{ urlencode('I want to order: '.$prod->name.' — '.moneyFormat($prod->sale_price)) }}"
                           target="_blank" rel="noopener noreferrer" class="btn-sanlive-wa">
                            <img src="{{ asset('/frontend/whatsapp.png') }}" style="width:14px;height:14px;object-fit:contain;filter:brightness(0) invert(1)" alt=""> WhatsApp
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
@endsection
