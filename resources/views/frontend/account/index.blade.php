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
                        <div class="col-12 col-md-6">
                            <div class="ps-categogy--list">
                            <div class="ps-product ps-product--list" style="border:2px solid #d1d5dad4; border-radius:10px">
                                <div class="ps-product__content" style="border-right:0px">
                                    <div class="ps-product__info">
                                        <a class="ps-product__branch" href="#"></a>
                                        <p class="ps-product__title" style="font-size:16px; color:#262525"><a></a>
                                            Account Information
                                        </p>
                                        <hr>
                                        <div class="ps-product__meta">
                                            <span style="font-size:15px">{{ $account->first_name.' '.$account->last_name }}</span>
                                        </div>
                                        <ul class="ps-product__list">
                                            <li>{{ $account->email }}</li>
                                            <li>{{ $account->phone ?? '' }}</li>
                                            <li>Last Login: {{ $account->last_login ?? 'N/A' }}</li>
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
                                        @if($address)
                                        <p class="ps-product__title" style="font-size:16px; color:#262525">
                                            Shipping Address
                                            <small style="font-size:10px; color:rgb(117,131,242)">Default</small>
                                            <span style="float:right">
                                                <a href="/account/address/edit/{{ $address->hashid }}">
                                                    <i class="icon-pen"></i>
                                                </a>
                                            </span>
                                        </p>
                                        <hr>
                                        <div class="ps-product__meta">
                                            <span style="font-size:15px">{{ $address->name }}</span>
                                        </div>
                                        <ul class="ps-product__list">
                                            <li>{{ $address->email }} &bull; {{ $address->phone ?? '' }}</li>
                                            <li>{{ $address->address }}</li>
                                        </ul>
                                        @else
                                        <p class="ps-product__title" style="font-size:16px; color:#262525">
                                            Shipping Address
                                        </p>
                                        <hr>
                                        <p style="font-size:14px; color:#888">You don't have a shipping address yet.</p>
                                        <a href="{{ route('users.address.create') }}" class="btn btn-primary btn-sm">
                                            Add New Address
                                        </a>
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
<div style="height:2em; background:#eee"></div>
@endsection
