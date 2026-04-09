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
                        <h2 class="acct-page-title">Address Book</h2>
                        <a href="{{ route('users.address.create') }}" class="acct-btn acct-btn--primary" style="padding:10px 20px;font-size:13px">
                            <i class="icon-plus" style="font-size:12px"></i> Add Address
                        </a>
                    </div>

                    @if(session('success'))
                    <div class="acct-alert acct-alert--success">{{ session('success') }}</div>
                    @endif

                    @forelse($addresses as $address)
                    <div class="acct-card-sm" style="margin-bottom:14px">
                        <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:12px">
                            <div style="flex:1">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px">
                                    <span style="font-size:14px;font-weight:700;color:#111">{{ strtoupper($address->name) }}</span>
                                    @if($address->is_default == 1)
                                    <span class="acct-badge acct-badge--blue">Default</span>
                                    @endif
                                </div>
                                @if($address->phone)
                                <div style="font-size:13px;color:#555;margin-bottom:3px">
                                    <i class="icon-telephone" style="font-size:12px;color:#aaa;margin-right:4px"></i>{{ $address->phone }}
                                </div>
                                @endif
                                @if($address->email)
                                <div style="font-size:13px;color:#555;margin-bottom:3px">
                                    <i class="icon-envelope" style="font-size:12px;color:#aaa;margin-right:4px"></i>{{ $address->email }}
                                </div>
                                @endif
                                <div style="font-size:13px;color:#555;margin-top:4px">
                                    <i class="icon-map-marker" style="font-size:12px;color:#aaa;margin-right:4px"></i>{{ $address->address }}
                                </div>
                            </div>
                            <div style="display:flex;gap:8px;flex-shrink:0">
                                <a href="/account/address/edit/{{ $address->hashid }}" class="acct-card__edit" title="Edit">
                                    <i class="icon-pen" style="font-size:13px"></i>
                                </a>
                                <a href="/account/address/delete/{{ $address->hashid }}"
                                   onclick="return confirm('Delete this address?')"
                                   class="acct-card__edit" title="Delete"
                                   style="background:#fff1f1;color:#e74c3c">
                                    <i class="icon-trash" style="font-size:13px"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="acct-card">
                        <div class="acct-empty">
                            <i class="icon-map-marker"></i>
                            <p>No addresses saved yet. Add one to speed up checkout.</p>
                            <a href="{{ route('users.address.create') }}" class="acct-btn acct-btn--primary">Add New Address</a>
                        </div>
                    </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>
<div style="height:2em;background:#f0f2f8"></div>
@endsection
