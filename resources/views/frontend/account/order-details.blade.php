@extends('layouts.app')

@section('meta_robots', 'noindex, nofollow')

@section('content')
<div class="ps-shopping" style="background:#eee">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
                @include('frontend.partials.account-sidebar')
                <div class="col-12 col-md-7 col-lg-8 mt-5" style="background:#fff; border-radius:5px" id="pdfContent">
                    <div class="row">
                        <span class="pt-5 pl-5">
                            <a href="#" onclick="history.back()"> Back </a>  
                            &nbsp;&nbsp;&nbsp;
                            <button onclick="window.print()" class="btn btn-outline-info">Print Receipt</button>
                        </span>
                        <hr style="width:100%">

                        {{-- User Info --}}
                        <div class="col-12 col-md-12" id="userDetails">
                            <span style="float:right; padding-right:20px">
                                <img src="{{ asset('images/'.$settings->site_logo) }}" width="100">
                            </span>
                            <p class="pl-3" style="color:#050505">
                                First Name: {{ auth()->user()->first_name }}<br>
                                Last Name: {{ auth()->user()->last_name }}<br>
                                Email: {{ auth()->user()->email }}
                            </p>
                            <hr>
                        </div>

                        {{-- Order Summary --}}
                        <div class="col-12 col-md-12">
                            <p class="pl-3" style="color:#414040">
                                Order No: {{ $orders->order_no }}<br>
                                Placed On: {{ \Carbon\Carbon::parse($orders->created_at)->format('M d, Y H:i') }}<br>
                                Total Amount: ₦{{ number_format($orders->payable) }}
                            </p>
                        </div>

                        {{-- Order Items --}}
                        <span class="pt-4 pl-5 w-100">Items in Your Order</span>
                        @foreach($order_items as $item)
                        <div class="col-12 col-md-12">
                            <div class="ps-product ps-product--list" style="border:2px solid #d1d5dad4; border-radius:10px; margin-top:15px">
                                <div class="ps-product__content" style="border-right:0px">
                                    <div class="ps-product__thumbnail">
                                        <a href="#" class="ps-product__image">
                                            <figure>
                                                <img src="{{ asset('images/products/'.$item->image) }}"
                                                     alt="{{ $item->product_name }}" style="width:100px">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="ps-product__info">
                                        <p style="font-size:15px; color:#1e1b1b">
                                            <a style="font-weight:600">{{ $item->product_name }}</a><br>
                                            <span style="color:#201c1c">Order: {{ $item->Order_no }}</span><br>
                                            <span style="color:#1c1818">QTY: {{ $item->qty }}</span><br>
                                            ₦{{ number_format($item->payable) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        {{-- Payment + Shipping --}}
                        <div class="row mt-4 w-100 ml-1">
                            <div class="col-12 col-md-6">
                                <div class="ps-categogy--list">
                                <div class="ps-product ps-product--list" style="border:2px solid #d1d5dad4; border-radius:10px">
                                    <div class="ps-product__content" style="border-right:0px">
                                        <div class="ps-product__info">
                                            <a class="ps-product__branch" href="#"></a>
                                            <p style="font-size:16px; color:#262525"><a></a>Payment Information</p>
                                            <hr>
                                            <div class="ps-product__meta">
                                                <span style="font-size:15px">Payment Method: {{ $orders->payment_method }}</span>
                                            </div>
                                            <ul class="ps-product__list"> Payment Details
                                                <li>Items Amount: ₦{{ number_format($orders->payable) }}</li>
                                                <li>Delivery Fee: ₦{{ number_format($delivery->fee ?? 0) }}</li>
                                                <li>Payment Ref: {{ $orders->payment_ref }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="ps-categogy--list">
                                <div class="ps-product ps-product--list" style="border:2px solid #d1d5dad4; border-radius:10px">
                                    <div class="ps-product__content" style="border-right:0px">
                                        <div class="ps-product__info">
                                            <a class="ps-product__branch" href="#"></a>
                                            <p style="font-size:16px; color:#262525"><a></a>Shipping Information</p>
                                            <hr>
                                            <div class="ps-product__meta">
                                                <span style="font-size:15px">Delivery Method: {{ $orders->shipping_method == 'home_delivery' ? 'Home delivery' : 'Pick-up Delivery' }}</span>
                                            </div>
                                            @if($shipping)
                                            <ul class="ps-product__list">
                                                <li><span class="ps-list__title">{{ $shipping->name }}</span></li>
                                                <li><span class="ps-list__title">{{ $shipping->phone }}</span></li>
                                                <li><span class="ps-list__title">{{ $shipping->address ?? '' }}</span></li>
                                            </ul>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height:2em; background:#eee"></div>
@endsection
