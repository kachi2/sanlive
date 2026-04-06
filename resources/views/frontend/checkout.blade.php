@extends('layouts.app')

@section('meta_robots', 'noindex, nofollow')
@section('content')
<div class="ps-shopping" style="background:#f5f5f5; min-height:80vh;">
    <form action="{{ route('payment.checkout') }}" method="POST" id="checkoutForm">
        @csrf
        <div class="container">
            <div class="ps-shopping__content">

                @if(session('error'))
                <div class="alert alert-danger mt-4">{{ session('error') }}</div>
                @endif

                <div class="row">
                    {{-- Left column --}}
                    <div class="col-12 col-md-7 col-lg-9 mt-5">

                        {{-- Customer Address --}}
                        <div style="background:#fff; border-radius:10px; border:2px solid #eee; margin-bottom:16px;">
                            <div class="d-flex align-items-center justify-content-between m-4" style="margin-bottom:0!important;">
                                <p class="m-0" style="color:#332d2d; font-weight:600;">
                                    <i class="fa fa-check-square-o" style="color:rgb(79,81,79);"></i>
                                    Customer Address
                                </p>
                                <a href="{{ route('checkouts.changeAddress') }}" style="font-size:13px; color:#103178;">Change Address</a>
                            </div>
                            <hr>
                            @if($address)
                            <div class="row mx-3 mb-3">
                                <div class="col-12 col-md-6">
                                    <p style="color:#76717a; margin-bottom:6px;"><span style="font-weight:600; color:#444;">Name: </span>{{ $address->name }}</p>
                                    <p style="color:#76717a; margin-bottom:0;"><span style="font-weight:600; color:#444;">Address: </span>{{ $address->address ?? '' }} {{ $address->city ?? '' }} {{ $address->state ?? '' }} {{ $address->country ?? '' }}</p>
                                </div>
                                <div class="col-12 col-md-6 mt-2 mt-md-0">
                                    <p style="color:#76717a; margin-bottom:6px;"><span style="font-weight:600; color:#444;">Phone: </span>{{ $address->phone }}</p>
                                    <p style="color:#76717a; margin-bottom:0;"><span style="font-weight:600; color:#444;">Email: </span>{{ $address->email }}</p>
                                </div>
                            </div>
                            @else
                            <div class="mx-3 mb-3">
                                <p style="color:#888;">No address found. <a href="{{ route('users.address.create') }}" style="color:#103178;">Add address</a></p>
                            </div>
                            @endif
                        </div>

                        {{-- Delivery Details --}}
                        <div style="background:#fff; border-radius:10px; border:2px solid #eee; margin-bottom:16px;">
                            <p class="m-4" style="color:#332d2d; font-weight:600; margin-bottom:0!important;">
                                <i class="fa fa-check-square-o" style="color:rgb(79,81,79);"></i>
                                Delivery Details
                            </p>
                            <hr>

                            {{-- Pickup option --}}
                            <label for="delivery" style="width:100%; cursor:pointer; padding:0 20px 4px;">
                                <div id="card-delivery" style="border:1.5px solid #eee; border-radius:8px; padding:14px 16px; display:flex; align-items:flex-start; gap:12px; margin-bottom:10px; transition:all .2s;">
                                    <input type="radio" id="delivery" name="delivery" value="pickup_delivery"
                                           data-amount="0" onchange="updateTotal(0); selectOption('delivery')" required style="margin-top:3px; flex-shrink:0;">
                                    <div>
                                        <p style="font-weight:600; margin-bottom:4px; color:#333;">Pick up Station &mdash; <span style="color:#27ae60;">Free</span></p>
                                        <small style="color:#888;">No 29, Doyin Omololu Street, Alapere, Ketu, Lagos, Nigeria.</small>
                                    </div>
                                </div>
                            </label>

                            {{-- Home delivery option --}}
                            <label for="home" style="width:100%; cursor:pointer; padding:0 20px 16px;">
                                <div id="card-home" style="border:1.5px solid #eee; border-radius:8px; padding:14px 16px; display:flex; align-items:flex-start; gap:12px; transition:all .2s;">
                                    <input type="radio" id="home" name="delivery" value="home_delivery"
                                           data-amount="{{ $shipping_fee }}" onchange="updateTotal({{ $shipping_fee }}); selectOption('home')" style="margin-top:3px; flex-shrink:0;">
                                    <div>
                                        <p style="font-weight:600; margin-bottom:4px; color:#333;">Home Delivery &mdash; <span style="color:#e07b00;">&#8358;{{ number_format($shipping_fee) }}</span></p>
                                        <small style="color:#888;">Item will be shipped to: {{ $address->address ?? '' }} {{ $address->city ?? '' }} {{ $address->state ?? '' }}</small>
                                    </div>
                                </div>
                            </label>
                        </div>

                        {{-- Payment Method --}}
                        <div style="background:#fff; border-radius:10px; border:2px solid #eee; margin-bottom:16px;">
                            <p class="m-4" style="color:#332d2d; font-weight:600; margin-bottom:0!important;">
                                <i class="fa fa-check-square-o" style="color:rgb(79,81,79);"></i>
                                Payment Method
                            </p>
                            <hr>
                            <div class="mx-3 mb-3">
                                <label for="flutter" style="width:100%; cursor:pointer;">
                                    <div id="card-flutter" style="border:1.5px solid #eee; border-radius:8px; padding:14px 16px; display:flex; align-items:center; gap:16px; transition:all .2s;">
                                        <input type="radio" id="flutter" name="payment_method" value="flutter" onchange="selectOption('flutter')" style="flex-shrink:0;">
                                        <div style="flex:1;">
                                            <p style="font-weight:600; margin-bottom:2px; color:#333;">Secured Payment with Flutterwave</p>
                                            <small style="color:#888;">Pay with local and international cards. Your card information is secured.</small>
                                        </div>
                                        <img src="/frontend/FLUTTER.webp" style="height:28px; flex-shrink:0;">
                                    </div>
                                </label>
                            </div>
                        </div>

                    </div>

                    {{-- Right: Cart Summary --}}
                    <div class="col-12 col-md-5 col-lg-3 mt-5">
                        <div style="background:#fff; border-radius:10px; border:2px solid #eee; padding:20px; position:sticky; top:20px;">
                            <p style="font-weight:700; font-size:15px; color:#333; margin-bottom:14px;">Cart Summary</p>

                            @foreach($carts as $item)
                            <div style="display:flex; justify-content:space-between; font-size:13px; color:#555; padding:7px 0; border-bottom:1px solid #f5f5f5;">
                                <span style="flex:1; padding-right:8px;">{{ $item->name }} &times; {{ $item->quantity }}</span>
                                <span style="font-weight:600; white-space:nowrap;">&#8358;{{ number_format($item->price * $item->quantity) }}</span>
                            </div>
                            @endforeach

                            <div style="display:flex; justify-content:space-between; font-size:13px; color:#555; padding:8px 0; border-bottom:1px solid #f0f0f0;">
                                <span>Item Total</span>
                                <span style="font-weight:600;">{{ moneyFormat($total) }}</span>
                            </div>
                            <div style="display:flex; justify-content:space-between; font-size:13px; color:#555; padding:8px 0; border-bottom:1px solid #f0f0f0;">
                                <span>Delivery Fee</span>
                                <span style="font-weight:600;" id="fee">&#8358;0</span>
                            </div>
                            <div style="display:flex; justify-content:space-between; font-size:15px; font-weight:700; color:#103178; padding:10px 0;">
                                <span>Total</span>
                                <span id="total">{{ moneyFormat($total) }}</span>
                            </div>

                            <input type="hidden" id="amount" name="amount" value="{{ $total }}">
                            <input type="hidden" name="orderNo" value="{{ $orderNo }}">

                            <button type="submit" class="ps-btn ps-btn--primary" style="border-radius:6px; width:100%; margin-top:8px;">
                                Complete Order
                            </button>
                            <a class="ps-shopping__link" href="{{ route('products.search') }}" style="display:block; text-align:center; margin-top:10px; font-size:13px; color:#888;">Continue Shopping</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
var baseTotal = {{ $total }};

function updateTotal(fee) {
    var cartTotal = baseTotal + fee;
    document.getElementById('fee').textContent = fee > 0 ? '₦' + fee.toLocaleString() : '₦0';
    document.getElementById('total').textContent = '₦' + cartTotal.toLocaleString();
    document.getElementById('amount').value = cartTotal;
}

var deliveryCards = ['card-delivery', 'card-home'];
var paymentCards  = ['card-flutter'];

function selectOption(id) {
    var group = deliveryCards.includes('card-' + id) ? deliveryCards : paymentCards;
    group.forEach(function(cardId) {
        var el = document.getElementById(cardId);
        if (!el) return;
        el.style.border        = '1.5px solid #eee';
        el.style.background    = '#fff';
        el.style.boxShadow     = 'none';
    });
    var selected = document.getElementById('card-' + id);
    if (selected) {
        selected.style.border     = '2px solid #103178';
        selected.style.background = '#f0f5ff';
        selected.style.boxShadow  = '0 2px 10px rgba(16,49,120,.10)';
    }
}
</script>
@endsection
