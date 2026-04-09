@extends('layouts.app')

@section('title', 'Payment History')
@section('meta_robots', 'noindex, nofollow')

@section('content')
<div class="acct-bg">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
                @include('frontend.partials.account-sidebar')
                <div class="col-12 col-md-7 col-lg-9 acct-col">

                    <div class="acct-page-header">
                        <h2 class="acct-page-title">Payment History</h2>
                    </div>

                    <div class="acct-card" style="padding:0;overflow:hidden">
                        @if($payments->count())
                        <div class="table-responsive">
                            <table class="acct-table">
                                <thead>
                                    <tr>
                                        <th>Order No</th>
                                        <th>Payment Ref</th>
                                        <th class="d-none d-md-table-cell">External Ref</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($payments as $pay)
                                    <tr>
                                        <td style="font-weight:600;color:#103178">#{{ $pay->order_id }}</td>
                                        <td style="font-size:12px;color:#666">{{ $pay->payment_ref }}</td>
                                        <td class="d-none d-md-table-cell" style="font-size:12px;color:#666">{{ $pay->external_ref ?? '—' }}</td>
                                        <td style="font-weight:700">₦{{ number_format($pay->payable ?? 0) }}</td>
                                        <td>
                                            @if($pay->status == 1)
                                            <span class="acct-badge acct-badge--green">Success</span>
                                            @else
                                            <span class="acct-badge acct-badge--orange">Pending</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="acct-empty">
                            <i class="icon-credit-card"></i>
                            <p>No payment records found.</p>
                        </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div style="height:2em;background:#f0f2f8"></div>
@endsection
