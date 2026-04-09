@extends('layouts.app')

@section('meta_robots', 'noindex, nofollow')

@section('content')
<div class="acct-bg">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
                @include('frontend.partials.account-sidebar')
                <div class="col-12 col-md-7 col-lg-9 acct-col">

                    <div class="acct-page-header">
                        <h2 class="acct-page-title">My Orders</h2>
                        <span style="font-size:13px;color:#888">{{ count($orders) }} order{{ count($orders) != 1 ? 's' : '' }}</span>
                    </div>

                    @if(count($orders) > 0)
                        @foreach($orders as $order)
                        <a href="/account/orders/details/{{ $order->Order_no }}" class="acct-order-card">
                            <img class="acct-order-card__img"
                                 src="{{ asset('images/products/'.$order->image) }}"
                                 alt="{{ $order->product_name }}">
                            <div class="acct-order-card__info">
                                <div class="acct-order-card__name">{{ $order->product_name }}</div>
                                <div class="acct-order-card__sub">Order #{{ $order->Order_no }} &bull; {{ \Carbon\Carbon::parse($order->created_at)->format('M d, Y') }}</div>
                                <div class="acct-order-card__meta">
                                    @if($order->dispatch_status == 1)
                                        <span class="acct-badge acct-badge--green">Delivered</span>
                                    @elseif($order->dispatch_status == 2)
                                        <span class="acct-badge acct-badge--blue">Shipped</span>
                                    @elseif($order->dispatch_status == -1)
                                        <span class="acct-badge acct-badge--red">Cancelled</span>
                                    @else
                                        <span class="acct-badge acct-badge--orange">Awaiting Confirmation</span>
                                    @endif
                                    @if($order->is_paid == 1)
                                        <span class="acct-badge acct-badge--green">Paid</span>
                                    @else
                                        <span class="acct-badge acct-badge--gray">Unpaid</span>
                                    @endif
                                </div>
                            </div>
                            <div class="acct-order-card__price">₦{{ number_format($order->payable) }}</div>
                            <i class="icon-chevron-right acct-order-card__arrow"></i>
                        </a>
                        @endforeach
                    @else
                        <div class="acct-card">
                            <div class="acct-empty">
                                <i class="icon-bag2"></i>
                                <p>You haven't placed any orders yet.</p>
                                <a href="{{ route('products.search') }}" class="acct-btn acct-btn--primary">Start Shopping</a>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<div style="height:2em;background:#f0f2f8"></div>
@endsection
