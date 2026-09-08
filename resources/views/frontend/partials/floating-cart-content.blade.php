{{-- resources/views/frontend/partials/floating-cart-content.blade.php --}}
@php
    $floatingCarts = \Cart::getContent();
    $floatingTotal = \Cart::getTotal();
@endphp
@if($floatingCarts->count() > 0)
    <div class="fcart__items">
        @foreach($floatingCarts as $item)
        <div class="fcart__item" data-cart-id="{{ $item->id }}">
            <div class="fcart__item-img">
                <img src="{{ asset('images/products/'.($item->associatedModel->image_path ?? '')) }}" alt="{{ $item->name }}" loading="lazy">
            </div>
            <div class="fcart__item-info">
                <div class="fcart__item-name">{{ $item->name }}</div>
                <div class="fcart__item-price">{{ moneyFormat($item->price) }}</div>
                <div class="fcart__item-qty">
                    <div class="fcart__qty-group" data-cart-id="{{ $item->id }}" data-qty="{{ $item->quantity }}">
                        <button type="button" class="fcart__qty-btn" data-op="-">&minus;</button>
                        <span class="fcart__qty-val">{{ $item->quantity }}</span>
                        <button type="button" class="fcart__qty-btn" data-op="+">+</button>
                    </div>
                    <a href="{{ route('carts.delete', $item->id) }}" class="fcart__remove" data-cart-remove>Remove</a>
                </div>
            </div>
            <div class="fcart__item-total">{{ moneyFormat($item->price * $item->quantity) }}</div>
        </div>
        @endforeach
    </div>
    <div class="fcart__summary">
        <div class="fcart__row">
            <span>Subtotal</span>
            <span>{{ moneyFormat($floatingTotal) }}</span>
        </div>
        <div class="fcart__note">Shipping fee is calculated at checkout.</div>
        <div class="fcart__row fcart__row--total">
            <span>Total</span>
            <span>{{ moneyFormat($floatingTotal) }}</span>
        </div>
    </div>
    <a href="{{ route('checkout.index') }}" class="fcart__checkout-btn">Proceed to Checkout</a>
@else
    <div class="fcart__empty">Your basket is empty.</div>
@endif
