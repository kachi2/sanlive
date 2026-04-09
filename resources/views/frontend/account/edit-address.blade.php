@extends('layouts.app')

@section('title', 'Edit Address')
@section('meta_robots', 'noindex, nofollow')

@section('content')
<div class="acct-bg">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
                @include('frontend.partials.account-sidebar')
                <div class="col-12 col-md-7 col-lg-9 acct-col">

                    <div class="acct-page-header">
                        <h2 class="acct-page-title">Edit Address</h2>
                        <a href="{{ route('users.account.address') }}" class="acct-back-link">
                            <i class="icon-arrow-left" style="font-size:12px"></i> Address Book
                        </a>
                    </div>

                    <div class="acct-card">
                        @if(!empty($errors) && $errors->any())
                        <div class="acct-alert acct-alert--warn">
                            @foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach
                        </div>
                        @endif

                        <form action="/account/address/update/{{ $address->hashid }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="acct-field">
                                        <label class="acct-label">Full Name</label>
                                        <input class="acct-input @error('name') is-invalid @enderror" type="text"
                                               name="name" placeholder="Recipient full name"
                                               value="{{ old('name', $address->name) }}">
                                        @error('name')<div class="acct-err">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="acct-field">
                                        <label class="acct-label">Phone Number</label>
                                        <input class="acct-input @error('phone') is-invalid @enderror" type="text"
                                               name="phone" placeholder="e.g. 08012345678"
                                               value="{{ old('phone', $address->phone) }}">
                                        @error('phone')<div class="acct-err">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="acct-field">
                                        <label class="acct-label">Email Address</label>
                                        <input class="acct-input @error('email') is-invalid @enderror" type="email"
                                               name="email" placeholder="delivery@email.com"
                                               value="{{ old('email', $address->email) }}">
                                        @error('email')<div class="acct-err">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="acct-field">
                                        <label class="acct-label">Full Delivery Address</label>
                                        <input class="acct-input @error('address') is-invalid @enderror" type="text"
                                               name="address" placeholder="Street, City, State"
                                               value="{{ old('address', $address->address) }}">
                                        @error('address')<div class="acct-err">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-12" style="margin-bottom:20px">
                                    <label style="display:flex;align-items:center;gap:10px;cursor:pointer;font-size:14px;color:#444">
                                        <input type="checkbox" name="is_default" id="is_default" value="1"
                                               style="width:18px;height:18px;accent-color:#103178"
                                               {{ $address->is_default == 1 ? 'checked' : '' }}>
                                        <span>Set as my default shipping address</span>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="acct-btn acct-btn--primary w-100" style="padding:13px;font-size:15px">
                                        Update Address
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div style="height:2em;background:#f0f2f8"></div>
@endsection
