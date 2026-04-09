@extends('layouts.app')

@section('meta_robots', 'noindex, nofollow')

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
                                                <img src="{{ asset('images/products/'.($cart->associatedModel->image_path ?? '')) }}" alt="">
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
    <div class="container" style="background: #f4f3f33f; padding:10px; border:5px solid #ede8e836">
        <div class="ps-noti p-2" style="border-radius:5px">
            <p class="ml-2" style="color:#fff; font-weight:bold; text-align:left"> Related Products </p>
        </div>
        <div class="ps-section__carousel">
            <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                @foreach($latest as $prod)
                <div>
                    <div class="ps-section__product shadow-sm">
                        <div class="ps-product ps-product--standard cart-card border-gray-800" style="background-color:#fff">
                            <div class="ps-product__thumbnail">
                                <a class="ps-product__image" href="{{ route('users.products', $prod->slug) }}" style="min-height:250px">
                                    <figure>
                                        <img src="{{ asset('images/products/'.$prod->image_path) }}" alt="" style="max-height:200px">
                                        <img src="{{ asset('images/products/'.$prod->image_path) }}" alt="{{ $prod->name }}">
                                    </figure>
                                </a>
                            </div>
                            <div class="ps-product__content">
                                <h5><a href="{{ route('users.products', $prod->slug) }}">{{ $prod->name }}</a></h5>
                                <div class="ps-product__meta">
                                    <span class="ps-product__price sale">{{ moneyFormat($prod->sale_price) }}</span>
                                    <span class="ps-product__del">{{ moneyFormat($prod->price) }}</span>
                                </div>
                                <span class="download-note">
                                    <span>
                                        <a class="btn btn-lg" href="{{ route('users.products', $prod->slug) }}" style="background:#fff; color:#73c2fb; border:1px solid #73c2fb; display: inline;"><i class="fa fa-plus"></i> Add to basket</a>
                                        <a target="_blank" rel="noopener noreferrer" href="https://wa.me/+2348058885913?text={{ urlencode('Please i need to order this product '.$prod->name.' the price is: '.moneyFormat($prod->sale_price)) }}">
                                            <img src="/frontend/whatsapp.png" style="width: 80px; float:right; padding: 0px;">
                                        </a>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
