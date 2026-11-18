@extends('layouts.app')

@section('meta_robots', 'noindex, nofollow')

@section('styles')
<style>
.cart-page{background:#f7f8fb;padding:32px 0 8px}
.cart-page__head{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px;margin-bottom:22px}
.cart-page__head h1{font-size:24px;font-weight:800;color:#103178;margin:0}
.cart-page__continue-link{font-size:13px;font-weight:600;color:#103178;text-decoration:none;display:inline-flex;align-items:center;gap:5px}
.cart-page__continue-link:hover{text-decoration:underline}

.cart-page__grid{display:grid;grid-template-columns:1fr 340px;gap:22px;align-items:start}
@media(max-width:900px){.cart-page__grid{grid-template-columns:1fr}}

.cart-page__items{display:flex;flex-direction:column;gap:14px}
.cart-item{display:flex;align-items:center;gap:16px;background:#fff;border-radius:12px;padding:16px;box-shadow:0 2px 10px rgba(16,49,120,.06)}
.cart-item__img{flex:0 0 auto;width:76px;height:76px;border-radius:10px;background:#fafafa;display:flex;align-items:center;justify-content:center;overflow:hidden}
.cart-item__img img{width:100%;height:100%;object-fit:contain}
.cart-item__info{flex:1;min-width:0}
.cart-item__category{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.5px;color:#8a93a6}
.cart-item__name{font-size:15px;font-weight:700;color:#1a2436;margin:3px 0 6px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.cart-item__price-row{display:flex;align-items:center;gap:8px;margin-bottom:10px}
.cart-item__price{font-size:14px;font-weight:700;color:#25a244}
.cart-item__price-original{font-size:12px;color:#aaa;text-decoration:line-through}
.cart-item__controls{display:flex;align-items:center;gap:16px;flex-wrap:wrap}
.cart-item__qty{display:flex;align-items:center;gap:10px;background:#f4f6fb;border-radius:8px;padding:4px}
.cart-item__qty-btn{width:26px;height:26px;border-radius:6px;border:none;background:#fff;box-shadow:0 1px 3px rgba(0,0,0,.12);color:#103178;font-size:15px;font-weight:700;cursor:pointer;display:flex;align-items:center;justify-content:center}
.cart-item__qty-val{font-size:14px;font-weight:700;color:#222;min-width:16px;text-align:center}
.cart-item__remove{font-size:12px;font-weight:600;color:#e5344c;text-decoration:none}
.cart-item__remove:hover{text-decoration:underline}
.cart-item__total{flex:0 0 auto;font-size:15px;font-weight:800;color:#1a2436;white-space:nowrap}
@media(max-width:480px){.cart-item{flex-wrap:wrap}.cart-item__total{margin-left:92px}}

.cart-summary{background:#fff;border-radius:12px;padding:20px;box-shadow:0 2px 10px rgba(16,49,120,.06);position:sticky;top:20px}
.cart-summary__title{font-size:16px;font-weight:800;color:#103178;margin:0 0 14px}
.cart-summary__row{display:flex;justify-content:space-between;font-size:14px;color:#444;padding:6px 0}
.cart-summary__note{font-size:12px;color:#999;padding:2px 0 10px}
.cart-summary__row--total{font-size:17px;font-weight:800;color:#111;border-top:1px solid #eee;margin-top:4px;padding-top:12px}
.cart-summary__checkout-btn{display:block;text-align:center;margin-top:18px;padding:13px;border-radius:9px;background:#25a244;color:#fff!important;font-weight:700;font-size:14px;text-decoration:none!important}
.cart-summary__checkout-btn:hover{background:#1e8a38}
.cart-summary__continue-link{display:block;text-align:center;margin-top:12px;font-size:13px;font-weight:600;color:#103178;text-decoration:none}
.cart-summary__continue-link:hover{text-decoration:underline}

.cart-empty{background:#fff;border-radius:12px;padding:60px 20px;text-align:center;box-shadow:0 2px 10px rgba(16,49,120,.06)}
.cart-empty__icon{font-size:56px;color:#d0d5e8;margin-bottom:16px}
.cart-empty h2{font-size:18px;font-weight:800;color:#1a2436;margin:0 0 8px}
.cart-empty p{font-size:14px;color:#888;margin:0 0 20px}
.cart-empty__btn{display:inline-block;padding:12px 28px;border-radius:9px;background:#103178;color:#fff!important;font-weight:700;font-size:14px;text-decoration:none!important}
.cart-empty__btn:hover{background:#0c2560}

.sanlive-product-card{background:#fff;border:1px solid #eee;border-radius:10px;overflow:hidden;display:flex;flex-direction:column;height:100%;transition:box-shadow .2s}
.sanlive-product-card:hover{box-shadow:0 6px 24px rgba(0,0,0,.10)}
.sanlive-product-card__img{display:block;width:100%;aspect-ratio:1/1;object-fit:contain;padding:12px;background:#fafafa}
.sanlive-product-card__body{padding:8px 10px 4px;flex:1}
.sanlive-product-card__name{font-size:12px;font-weight:700;color:#222;text-transform:uppercase;letter-spacing:.3px;margin-bottom:6px;line-height:1.4;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.sanlive-product-card__name a{color:inherit;text-decoration:none}
.sanlive-product-card__name a:hover{color:#103178}
.sanlive-product-card__price{display:flex;align-items:center;gap:6px;margin-bottom:8px}
.sanlive-product-card__rx{display:inline-flex;align-items:center;gap: 4px;font-size: 10px;font-weight:600;letter-spacing:.2px;color:#b42318;background:#fef3f2;border:1px solid #fecdca;border-radius:999px;padding: 2px 7px 2px 3px;margin:-2px 0 8px}
.sanlive-product-card__rx::before{content:"℞";display:inline-flex;align-items:center;justify-content:center;width: 13px;height: 13px;border-radius:50%;background:#d92d20;color:#fff;font-size: 8px;font-weight:700}
.sanlive-product-card__sale{font-size:14px;font-weight:700;color:#25a244}
.sanlive-product-card__original{font-size:12px;color:#aaa;text-decoration:line-through}
.sanlive-product-card__actions{display:flex;flex-direction:column;gap:6px;padding:0 10px 10px}
.btn-sanlive-cart{display:flex;align-items:center;justify-content:center;gap:6px;padding:8px 6px;font-size:12px;font-weight:600;color:#333;background:#fff;border:1.5px solid #ccc;border-radius:6px;text-decoration:none!important;white-space:nowrap;transition:border-color .15s,color .15s;width:100%}
.btn-sanlive-cart:hover{border-color:#103178;color:#103178}
.btn-sanlive-wa{display:flex;align-items:center;justify-content:center;gap:6px;padding:8px 6px;font-size:12px;font-weight:600;color:#1e8a38;background:#eaf7ee;border:1.5px solid #c9ebd3;border-radius:6px;text-decoration:none!important;white-space:nowrap;transition:background .15s;width:100%}
.btn-sanlive-wa:hover{background:#25a244;border-color:#25a244;color:#fff}
@media(min-width:480px){.sanlive-product-card__actions{flex-direction:row}.btn-sanlive-cart,.btn-sanlive-wa{width:auto;flex:1}}
</style>
@endsection

@section('content')
<div class="cart-page">
    <div class="container">
        <div class="cart-page__head">
            <h1>Your Cart</h1>
            <a href="{{ route('products.search') }}" class="cart-page__continue-link">&larr; Continue Shopping</a>
        </div>

        @if(count($carts) > 0)
        <div class="cart-page__grid">
            <div class="cart-page__items">
                @foreach($carts as $cart)
                <form action="{{ route('carts.update') }}" method="POST" class="cart-item">
                    @csrf
                    <input type="hidden" name="cartId" value="{{ $cart->id }}">
                    <input type="hidden" name="qty" value="{{ $cart->quantity }}">
                    <div class="cart-item__img">
                        <img src="{{ asset('images/products/'.($cart->associatedModel->image_path ?? '')) }}" alt="{{ $cart->associatedModel->name ?? 'Product image' }}" loading="lazy">
                    </div>
                    <div class="cart-item__info">
                        <span class="cart-item__category">{{ $cart->associatedModel->category->name ?? '' }}</span>
                        <h3 class="cart-item__name">{{ $cart->name }}</h3>
                        <div class="cart-item__price-row">
                            <span class="cart-item__price">{{ moneyFormat($cart->associatedModel->sale_price ?? $cart->price) }}</span>
                            @if(($cart->associatedModel->price ?? 0) > ($cart->associatedModel->sale_price ?? $cart->price))
                            <span class="cart-item__price-original">{{ moneyFormat($cart->associatedModel->price ?? 0) }}</span>
                            @endif
                        </div>
                        <div class="cart-item__controls">
                            <div class="cart-item__qty">
                                <button type="submit" name="action" value="-" class="cart-item__qty-btn" aria-label="Decrease quantity">&minus;</button>
                                <span class="cart-item__qty-val">{{ $cart->quantity }}</span>
                                <button type="submit" name="action" value="+" class="cart-item__qty-btn" aria-label="Increase quantity">+</button>
                            </div>
                            <a href="{{ route('carts.delete', $cart->id) }}" class="cart-item__remove">Remove</a>
                        </div>
                    </div>
                    <div class="cart-item__total">{{ moneyFormat(($cart->associatedModel->sale_price ?? $cart->price) * $cart->quantity) }}</div>
                </form>
                @endforeach
            </div>

            <div class="cart-page__summary">
                <div class="cart-summary">
                    <h2 class="cart-summary__title">Order Summary</h2>
                    <div class="cart-summary__row">
                        <span>Subtotal</span>
                        <span>{{ moneyFormat($total) }}</span>
                    </div>
                    <div class="cart-summary__note">Shipping fee is calculated at checkout.</div>
                    <div class="cart-summary__row cart-summary__row--total">
                        <span>Total</span>
                        <span>{{ moneyFormat($total) }}</span>
                    </div>
                    <a class="cart-summary__checkout-btn" href="{{ route('checkout.index', ['cart' => $cartSession]) }}">Proceed to Checkout</a>
                    <a class="cart-summary__continue-link" href="{{ route('products.search') }}">Continue Shopping</a>
                </div>
            </div>
        </div>
        @else
        <div class="cart-empty">
            <div class="cart-empty__icon"><i class="icon-cart-empty"></i></div>
            <h2>Your cart is empty</h2>
            <p>You have not added any items to your cart yet.</p>
            <a href="{{ route('products.search') }}" class="cart-empty__btn">Start Shopping</a>
        </div>
        @endif
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
                        @if($prod->requires_prescription == 1)
                        <div class="sanlive-product-card__rx">Prescription required</div>
                        @endif
                    </div>
                    <div class="sanlive-product-card__actions">
                        <a href="{{ route('users.products', $prod->slug) }}" class="btn-sanlive-cart">
                            <i class="icon-cart" style="font-size:13px;"></i> Add to Cart
                        </a>
                        <a href="https://wa.me/+2348058885913?text={{ urlencode('I want to order: '.$prod->name.' — '.moneyFormat($prod->sale_price)) }}"
                           target="_blank" rel="noopener noreferrer" class="btn-sanlive-wa">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.127.558 4.12 1.532 5.845L.053 23.25a.75.75 0 0 0 .916.98l5.604-1.474A11.953 11.953 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.75a9.71 9.71 0 0 1-4.953-1.352l-.355-.211-3.668.965.977-3.567-.232-.367A9.712 9.712 0 0 1 2.25 12C2.25 6.59 6.59 2.25 12 2.25S21.75 6.59 21.75 12 17.41 21.75 12 21.75z"/></svg> WhatsApp
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
