@extends('layouts.app')

@section('meta_robots', 'noindex, nofollow')
@section('content')
<div class="ps-shopping" style="background: #fff">
    <form action="{{ route('payment.checkout') }}" method="POST" id="checkoutForm">
        @csrf
        <div class="container">
            <div class="ps-shopping__content">
                <div class="row">
                    <div class="col-12 col-md-7 col-lg-9 mt-5 p-5">
                        <div class="row">
                            {{-- Customer Address --}}
                            <div class="col-12 col-md-12 col-lg-12" style="background: #fff; border-radius: 10px; border: 2px solid #eee;">
                                <p class="m-4" style="color: #332d2d">
                                    <i class="fa fa-check-square-o" style="color: rgb(79, 81, 79);"></i>
                                    Customer Address
                                    <span style="float: right">
                                        <a href="{{ route('checkouts.changeAddress') }}"></a>
                                    </span>
                                </p>
                                <hr />
                                @if($address)
                                <div class="row m-3">
                                    <div class="col-12 col-md-6">
                                        <div class="ps-form__group">
                                            <p style="color: #76717a;">
                                                <span style="font-weight: bold;">Name: </span>{{ $address->name }}
                                            </p>
                                            <p style="color: #76717a;">
                                                <span style="font-weight: bold;">Address: </span>
                                                {{ $address->address ?? '' }} {{ $address->city ?? '' }} {{ $address->state ?? '' }} {{ $address->country ?? '' }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mt-1">
                                        <div class="ps-form__group">
                                            <p style="color: #76717a;">
                                                <span style="font-weight: bold;">Phone: </span>{{ $address->phone }}
                                            </p>
                                            <p style="color: #76717a;">
                                                <span style="font-weight: bold;">Email: </span>{{ $address->email }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="m-3">
                                    <p>No address found. <a href="{{ route('users.address.create') }}">Add address</a></p>
                                </div>
                                @endif
                            </div>

                            {{-- Delivery Details --}}
                            <div class="col-12 col-md-12 col-lg-12 mt-3" style="background: #fff; border-radius: 10px; border: 2px solid #eee;">
                                <p class="m-4" style="color: rgb(114, 111, 111);">
                                    <i class="fa fa-check-square-o" style="color: rgb(114,111,111);"></i>
                                    Delivery Details
                                </p>
                                <hr />
                                <label for="delivery" style="width: 100%; background: #fff;">
                                    <div style="border: 0px solid #00000031; border-radius: 10px;">
                                        <div class="ps-categogy--ist p-4" style="display: flex">
                                            <input type="radio" id="delivery" name="delivery"
                                                value="pickup_delivery" data-amount="0"
                                                onchange="updateTotal(0)" required />
                                            <label for="delivery" class="pl-2">
                                                Pick up Station - N0 fee
                                            </label>
                                        </div>
                                    </div>
                                    <span class="card ml-3">
                                        <span class="card-body">
                                            <small style="border-bottom: 1px solid #000; padding: 2px;">You can pick your Item</small>
                                            <p>No 29, Doyin Omololu Street, Alapere, Ketu, Lagos, Nigeria.</p>
                                        </span>
                                    </span>
                                </label>

                                <label for="home" style="width: 100%; background: #fff;">
                                    <div style="border: 0px solid #00000031; border-radius: 10px;">
                                        <div class="ps-categogy--ist p-4" style="display: flex">
                                            <input type="radio" id="home" name="delivery"
                                                value="home_delivery" data-amount="{{ $shipping_fee }}"
                                                onchange="updateTotal({{ $shipping_fee }})" />
                                            <label for="home" class="pl-2">
                                                Home Delivery - N{{ number_format($shipping_fee) }} fee
                                            </label>
                                        </div>
                                    </div>
                                    <span class="card ml-3">
                                        <span class="card-body">
                                            <small style="border-bottom: 1px solid #000; padding: 2px;">Item will be shipped to your address</small>
                                            <p>{{ $address->address ?? '' }} {{ $address->city ?? '' }} {{ $address->state ?? '' }} {{ $address->country ?? '' }}</p>
                                        </span>
                                    </span>
                                </label>
                            </div>

                            {{-- Payment Method --}}
                            <div class="col-12 col-md-12 col-lg-12 mt-3" style="background: #fff; border-radius: 10px; border: 2px solid #eee;">
                                <p class="m-4" style="color: rgb(114, 111, 111);">
                                    <i class="fa fa-check-square-o" style="color: rgb(114,111,111);"></i>
                                    Payment Method
                                </p>
                                <div class="accordion" id="accordionExampleTwo">
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <label data-toggle="collapse" data-target="#collapseTwo"
                                                aria-expanded="true" aria-controls="collapseTwo">
                                                <div class="row">
                                                    <div style="width: 50px; padding-left:10px">
                                                        <input style="border-radius: 5px"
                                                            type="radio"
                                                            value="flutter"
                                                            id="flutter" name="payment_method">
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-12">
                                                        <strong>Secured Payment with Flutterwave</strong>
                                                    </div>
                                                    <div class="col-md-2 col-lg-2 col-2">
                                                        <img src="/frontend/FLUTTER.webp">
                                                    </div>
                                                </div>
                                            </label>
                                            <div id="collapseTwo" class="collapse"
                                                aria-labelledby="headingTwo"
                                                data-parent="#accordionExampleTwo">
                                                <div class="card-body">
                                                    <small>Pay with Flutterwave for both local and international cards, your card <br> information is secured</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Cart Summary --}}
                    <div class="col-12 col-md-5 col-lg-3">
                        <div class="ps-shopping__box mt-5" style="background: #fff">
                            <div class="ps-shopping__row">
                                <div class="ps-shopping__label">Cart Summary</div>
                            </div>
                            <div class="ps-shopping__row">
                                <div class="ps-shopping__label">Item Total</div>
                                <div class="ps-shopping__price">{{ moneyFormat($total) }}</div>
                            </div>
                            <div class="ps-shopping__row">
                                <div class="ps-shopping__label">Delivery Fee</div>
                                <div class="ps-shopping__price" id="fee">0</div>
                            </div>
                            <div class="ps-shopping__row">
                                <div class="ps-shopping__label">Total</div>
                                <div class="ps-shopping__price" id="total">{{ moneyFormat($total) }}</div>
                            </div>
                            <input type="hidden" id="amount" name="amount" value="{{ $total }}" />
                            <input type="hidden" name="orderNo" value="{{ $orderNo }}">
                            <div class="ps-shopping__checkout">
                                <button type="submit" class="ps-btn ps-btn--primary" style="border-radius: 5px">
                                    Complete Order
                                </button>
                                <a class="ps-shopping__link" href="{{ route('products.search') }}">Continue Shopping</a>
                            </div>
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
    document.getElementById('fee').textContent = fee > 0 ? 'N' + fee.toLocaleString() : '0';
    document.getElementById('total').textContent = 'N' + cartTotal.toLocaleString();
    document.getElementById('amount').value = cartTotal;
}
</script>
@endsection
