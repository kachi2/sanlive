@extends('layouts.app')

@section('meta_robots', 'noindex, nofollow')

@section('content')
<div class="ps-shopping" style="background:#eee">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
                @include('frontend.partials.account-sidebar')
                <div class="col-12 col-md-7 col-lg-8 mt-5" style="background:#fff; border-radius:5px">
                    <div class="row">
                        @if(count($orders) > 0)
                        <h3 class="p-5">Orders <hr style="width:100%"></h3>
                        @foreach($orders as $order)
                        <div class="col-12 col-md-12">
                            <div class="ps-product ps-product--list" style="border:2px solid #d1d5dad4; border-radius:10px; margin-top:15px">
                                <div class="ps-product__content" style="border-right:0px">
                                    <div class="ps-product__thumbnail">
                                        <a href="/account/orders/details/{{ $order->Order_no }}" class="ps-product__image">
                                            <figure>
                                                <img src="{{ asset('images/products/'.$order->image) }}"
                                                     alt="{{ $order->product_name }}"
                                                     style="width:80px; height:80px; object-fit:contain">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="ps-product__info">
                                        <a href="/account/orders/details/{{ $order->Order_no }}"
                                           class="ps-product__title" style="font-size:15px; color:#262525">
                                            {{ $order->product_name }}
                                        </a><br>
                                        <a href="/account/orders/details/{{ $order->Order_no }}" style="color:#5e5b5b; font-size:13px">
                                            Order: {{ $order->Order_no }}
                                        </a><br>
                                        <span style="font-size:14px">Amount: ₦{{ number_format($order->payable) }}</span><br>
                                        @if($order->dispatch_status == 1)
                                            <span class="badge badge-success">Delivered</span>
                                        @elseif($order->dispatch_status == 0)
                                            <span class="badge badge-info">Awaiting Confirmation</span>
                                        @elseif($order->dispatch_status == -1)
                                            <span class="badge badge-danger">Cancelled</span>
                                        @elseif($order->dispatch_status == 2)
                                            <span class="badge badge-primary">Shipped</span>
                                        @endif
                                        &nbsp;
                                        @if($order->is_paid == 1)
                                            <span class="badge badge-success">Paid</span>
                                        @else
                                            <span class="badge badge-warning">Not Paid</span>
                                        @endif
                                        <ul class="ps-product__list mt-1">
                                            <li style="font-size:12px; color:#888">Created: {{ \Carbon\Carbon::parse($order->created_at)->format('M d, Y H:i') }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="ps-product__footer">
                                    <div class="d-none d-xl-block">
                                    <span style="float:right; color:rgb(10,10,128)">
                                        <a href="/account/orders/details/{{ $order->Order_no }}" style="font-size:13px">View Details</a>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="col-12">
                            <div class="ps-product ps-product--list" style="border:2px solid #d1d5dad4; border-radius:10px; margin-top:15px">
                                <div class="ps-product__content" style="border-right:0px">
                                    <div class="ps-product__info" style="padding:40px">
                                        <p style="font-size:16px; color:#262525">You don't have any orders yet.</p>
                                        <a href="{{ route('products.search') }}" class="btn btn-primary">Start Shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="p-5" style="float:right"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height:2em; background:#eee"></div>
@endsection
