@extends('layouts.app')

@section('meta_robots', 'noindex, nofollow')

@section('styles')
<style>
.acct-page{background:#f0f2f8;min-height:80vh;padding-bottom:40px}
.acct-main{margin-top:40px}
/* Welcome banner */
.acct-welcome{background:linear-gradient(135deg,#103178 0%,#1a449f 100%);border-radius:16px;padding:28px 32px;display:flex;align-items:center;gap:20px;margin-bottom:24px;box-shadow:0 6px 24px rgba(16,49,120,.15)}
.acct-welcome__avatar{width:60px;height:60px;border-radius:50%;background:rgba(255,255,255,.18);border:3px solid rgba(255,255,255,.35);display:flex;align-items:center;justify-content:center;font-size:22px;font-weight:700;color:#fff;flex-shrink:0;text-transform:uppercase}
.acct-welcome__text h4{color:#fff;font-size:18px;font-weight:700;margin:0 0 3px}
.acct-welcome__text p{color:rgba(255,255,255,.7);font-size:13px;margin:0}
/* Info cards */
.acct-card{background:#fff;border-radius:16px;box-shadow:0 2px 16px rgba(16,49,120,.07);padding:24px 26px;height:100%;transition:box-shadow .2s}
.acct-card:hover{box-shadow:0 6px 28px rgba(16,49,120,.13)}
.acct-card__header{display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;padding-bottom:14px;border-bottom:1.5px solid #f0f2f8}
.acct-card__title{font-size:13px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;color:#103178}
.acct-card__badge{font-size:10px;font-weight:700;background:#eef2ff;color:#103178;border-radius:20px;padding:3px 10px;letter-spacing:.4px}
.acct-card__edit{display:flex;align-items:center;justify-content:center;width:32px;height:32px;border-radius:8px;background:#f3f6ff;color:#103178;text-decoration:none!important;transition:background .15s}
.acct-card__edit:hover{background:#103178;color:#fff}
.acct-card__field{display:flex;flex-direction:column;gap:2px;margin-bottom:14px}
.acct-card__label{font-size:10.5px;font-weight:600;color:#aaa;text-transform:uppercase;letter-spacing:.6px}
.acct-card__value{font-size:14px;font-weight:500;color:#222}
.acct-card__empty{text-align:center;padding:24px 0}
.acct-card__empty i{font-size:36px;color:#d0d5e8;margin-bottom:10px;display:block}
.acct-card__empty p{font-size:13px;color:#999;margin-bottom:12px}
.acct-card__add-btn{display:inline-flex;align-items:center;gap:6px;padding:8px 18px;background:#103178;color:#fff!important;border-radius:8px;font-size:13px;font-weight:600;text-decoration:none!important;transition:background .15s}
.acct-card__add-btn:hover{background:#0d2560}
/* Quick stats */
.acct-stats{display:flex;gap:14px;margin-bottom:24px}
.acct-stat{flex:1;background:#fff;border-radius:12px;padding:16px 18px;text-align:center;box-shadow:0 2px 12px rgba(16,49,120,.06)}
.acct-stat__num{font-size:22px;font-weight:800;color:#103178;line-height:1}
.acct-stat__lbl{font-size:11px;color:#888;margin-top:4px;font-weight:500}
</style>
@endsection

@section('content')
<div class="acct-page">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
                @include('frontend.partials.account-sidebar')
                <div class="col-12 col-md-7 col-lg-9 acct-main">

                    {{-- Welcome Banner --}}
                    <div class="acct-welcome">
                        <div class="acct-welcome__avatar">
                            {{ strtoupper(substr($account->first_name ?? 'U', 0, 1) . substr($account->last_name ?? '', 0, 1)) }}
                        </div>
                        <div class="acct-welcome__text">
                            <h4>Welcome back, {{ $account->first_name ?? 'there' }}!</h4>
                            <p>Manage your account, track orders and update your preferences</p>
                        </div>
                    </div>

                    {{-- Cards Row --}}
                    <div class="row g-3">
                        {{-- Account Info Card --}}
                        <div class="col-12 col-md-6">
                            <div class="acct-card">
                                <div class="acct-card__header">
                                    <span class="acct-card__title">Account Info</span>
                                    <a href="{{ route('users.account.settings') }}" class="acct-card__edit" title="Edit">
                                        <i class="icon-pen" style="font-size:13px"></i>
                                    </a>
                                </div>
                                <div class="acct-card__field">
                                    <span class="acct-card__label">Full Name</span>
                                    <span class="acct-card__value">{{ $account->first_name . ' ' . $account->last_name }}</span>
                                </div>
                                <div class="acct-card__field">
                                    <span class="acct-card__label">Email Address</span>
                                    <span class="acct-card__value">{{ $account->email }}</span>
                                </div>
                                @if($account->phone)
                                <div class="acct-card__field">
                                    <span class="acct-card__label">Phone</span>
                                    <span class="acct-card__value">{{ $account->phone }}</span>
                                </div>
                                @endif
                                <div class="acct-card__field" style="margin-bottom:0">
                                    <span class="acct-card__label">Last Login</span>
                                    <span class="acct-card__value">{{ $account->last_login ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Default Address Card --}}
                        <div class="col-12 col-md-6">
                            <div class="acct-card">
                                <div class="acct-card__header">
                                    <div style="display:flex;align-items:center;gap:8px">
                                        <span class="acct-card__title">Shipping Address</span>
                                        @if($address)
                                        <span class="acct-card__badge">Default</span>
                                        @endif
                                    </div>
                                    {{-- @if($address)
                                    <a href="/account/address/edit/{{ $address->hashid }}" class="acct-card__edit" title="Edit">
                                        <i class="icon-pen" style="font-size:13px"></i>
                                    </a>
                                    @endif --}}
                                </div>
                                @if($address)
                                <div class="acct-card__field">
                                    <span class="acct-card__label">Name</span>
                                    <span class="acct-card__value">{{ $address->name }}</span>
                                </div>
                                @if($address->phone)
                                <div class="acct-card__field">
                                    <span class="acct-card__label">Phone</span>
                                    <span class="acct-card__value">{{ $address->phone }}</span>
                                </div>
                                @endif
                                @if($address->email)
                                <div class="acct-card__field">
                                    <span class="acct-card__label">Email</span>
                                    <span class="acct-card__value">{{ $address->email }}</span>
                                </div>
                                @endif
                                <div class="acct-card__field" style="margin-bottom:0">
                                    <span class="acct-card__label">Address</span>
                                    <span class="acct-card__value">{{ $address->address }}</span>
                                </div>
                                @else
                                <div class="acct-card__empty">
                                    <i class="icon-map-marker"></i>
                                    <p>No shipping address saved yet.</p>
                                    <a href="{{ route('users.address.create') }}" class="acct-card__add-btn">
                                        <i class="icon-plus" style="font-size:12px"></i> Add Address
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div style="height:2em; background:#f0f2f8"></div>
@endsection
