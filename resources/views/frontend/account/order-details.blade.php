@extends('layouts.app')

@section('meta_robots', 'noindex, nofollow')

@section('content')
<div class="acct-bg">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
                @include('frontend.partials.account-sidebar')
                <div class="col-12 col-md-7 col-lg-9 acct-col" id="pdfContent">

                    <div class="acct-page-header">
                        <h2 class="acct-page-title">Order Details</h2>
                        <div style="display:flex;gap:10px;align-items:center">
                            <a href="#" onclick="history.back()" class="acct-back-link">
                                <i class="icon-arrow-left" style="font-size:12px"></i> Back
                            </a>
                            <button onclick="window.print()"
                                    class="acct-btn acct-btn--outline"
                                    style="padding:8px 16px;font-size:13px">
                                <i class="icon-printer" style="font-size:13px"></i> Print
                            </button>
                        </div>
                    </div>

                    {{-- Order summary banner --}}
                    <div class="acct-welcome" style="margin-bottom:20px">
                        <div style="flex:1">
                            <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap;margin-bottom:6px">
                                <span style="color:#fff;font-size:15px;font-weight:700">Order #{{ $orders->order_no }}</span>
                                @if($orders->is_paid == 1)
                                <span class="acct-badge acct-badge--green">Paid</span>
                                @else
                                <span class="acct-badge acct-badge--orange">Unpaid</span>
                                @endif
                            </div>
                            <div style="color:rgba(255,255,255,.7);font-size:12.5px">
                                Placed {{ \Carbon\Carbon::parse($orders->created_at)->format('M d, Y \a\t H:i') }}
                            </div>
                        </div>
                        <div style="text-align:right">
                            <div style="color:rgba(255,255,255,.7);font-size:11px;margin-bottom:2px">Total</div>
                            <div style="color:#fff;font-size:22px;font-weight:800">₦{{ number_format($orders->payable) }}</div>
                        </div>
                        <div style="flex-shrink:0">
                            <img src="{{ asset('images/'.$settings->site_logo) }}" height="38" style="opacity:.85">
                        </div>
                    </div>

                    {{-- Items --}}
                    <div style="margin-bottom:8px">
                        <p class="acct-section-label" style="margin-top:0">Items in Your Order</p>
                    </div>
                    @foreach($order_items as $item)
                    <div style="background:#fff;border:1.5px solid #eef0f8;border-radius:14px;padding:16px 18px;margin-bottom:12px;display:flex;align-items:center;gap:16px">
                        <img src="{{ asset('images/products/'.$item->image) }}"
                             alt="{{ $item->product_name }}"
                             style="width:72px;height:72px;object-fit:contain;border-radius:10px;background:#f8f9ff;padding:6px;flex-shrink:0">
                        <div style="flex:1;min-width:0">
                            <div style="font-size:14px;font-weight:700;color:#111;margin-bottom:3px">{{ $item->product_name }}</div>
                            <div style="font-size:12px;color:#888">Order #{{ $item->Order_no }} &bull; Qty: {{ $item->qty }}</div>
                        </div>
                        <div style="font-size:16px;font-weight:800;color:#103178;white-space:nowrap">₦{{ number_format($item->payable) }}</div>
                    </div>
                    @endforeach

                    {{-- Payment + Shipping --}}
                    <div class="row" style="margin-top:20px">
                        <div class="col-12 col-md-6" style="margin-bottom:14px">
                            <div class="acct-card-sm">
                                <div class="acct-card__header">
                                    <span class="acct-card__title">Payment Info</span>
                                    @if($orders->is_paid == 1)
                                    <span class="acct-badge acct-badge--green">Paid</span>
                                    @else
                                    <span class="acct-badge acct-badge--orange">Pending</span>
                                    @endif
                                </div>
                                <div class="acct-info-field">
                                    <div class="acct-info-field__label">Method</div>
                                    <div class="acct-info-field__value">{{ $orders->payment_method }}</div>
                                </div>
                                <div class="acct-info-field">
                                    <div class="acct-info-field__label">Items Amount</div>
                                    <div class="acct-info-field__value">₦{{ number_format($orders->payable) }}</div>
                                </div>
                                <div class="acct-info-field">
                                    <div class="acct-info-field__label">Delivery Fee</div>
                                    <div class="acct-info-field__value">₦{{ number_format($delivery->fee ?? 0) }}</div>
                                </div>
                                <div class="acct-info-field" style="margin-bottom:0">
                                    <div class="acct-info-field__label">Payment Ref</div>
                                    <div class="acct-info-field__value" style="font-size:12px;word-break:break-all">{{ $orders->payment_ref ?: '—' }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6" style="margin-bottom:14px">
                            <div class="acct-card-sm">
                                <div class="acct-card__header">
                                    <span class="acct-card__title">Shipping Info</span>
                                </div>
                                <div class="acct-info-field">
                                    <div class="acct-info-field__label">Method</div>
                                    <div class="acct-info-field__value">{{ $orders->shipping_method == 'home_delivery' ? 'Home Delivery' : 'Pick-up' }}</div>
                                </div>
                                @if($shipping)
                                <div class="acct-info-field">
                                    <div class="acct-info-field__label">Recipient</div>
                                    <div class="acct-info-field__value">{{ $shipping->name }}</div>
                                </div>
                                <div class="acct-info-field">
                                    <div class="acct-info-field__label">Phone</div>
                                    <div class="acct-info-field__value">{{ $shipping->phone }}</div>
                                </div>
                                <div class="acct-info-field" style="margin-bottom:0">
                                    <div class="acct-info-field__label">Address</div>
                                    <div class="acct-info-field__value">{{ $shipping->address ?? '—' }}</div>
                                </div>
                                @else
                                <div style="font-size:13px;color:#aaa">No shipping address recorded.</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Customer info (print only) --}}
                    <div style="display:none" class="d-print-block">
                        <div class="acct-card-sm" style="margin-top:14px">
                            <p style="font-size:12px">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }} — {{ auth()->user()->email }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div style="height:2em;background:#f0f2f8"></div>
@endsection
