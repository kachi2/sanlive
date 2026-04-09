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
                        <h2 class="acct-page-title">Account Settings</h2>
                    </div>

                    <div class="acct-card">
                        @if(session('success'))
                        <div class="acct-alert acct-alert--success">{{ session('success') }}</div>
                        @endif
                        @if(session('error'))
                        <div class="acct-alert acct-alert--error">{{ session('error') }}</div>
                        @endif
                        @if(!empty($errors) && $errors->any())
                        <div class="acct-alert acct-alert--warn">
                            @foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
                        </div>
                        @endif

                        <form action="/accounts/settings/update" method="POST">
                            @csrf
                            @method('PUT')

                            <p class="acct-section-label" style="margin-top:0">Personal Details</p>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="acct-field">
                                        <label class="acct-label">First Name</label>
                                        <input class="acct-input @error('first_name') is-invalid @enderror" type="text" name="first_name"
                                               placeholder="First name" value="{{ old('first_name', $user->first_name) }}">
                                        @error('first_name')<div class="acct-err">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="acct-field">
                                        <label class="acct-label">Last Name</label>
                                        <input class="acct-input @error('last_name') is-invalid @enderror" type="text" name="last_name"
                                               placeholder="Last name" value="{{ old('last_name', $user->last_name) }}">
                                        @error('last_name')<div class="acct-err">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="acct-field">
                                        <label class="acct-label">Phone Number</label>
                                        <input class="acct-input @error('phone') is-invalid @enderror" type="text" name="phone"
                                               placeholder="e.g. 08012345678" value="{{ old('phone', $user->phone) }}">
                                        @error('phone')<div class="acct-err">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="acct-field">
                                        <label class="acct-label">City / State</label>
                                        <input class="acct-input @error('city') is-invalid @enderror" type="text" name="city"
                                               placeholder="e.g. Lagos" value="{{ old('city', $user->city) }}">
                                        @error('city')<div class="acct-err">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="acct-field">
                                        <label class="acct-label">Country</label>
                                        <input class="acct-input @error('country') is-invalid @enderror" type="text" name="country"
                                               placeholder="e.g. Nigeria" value="{{ old('country', $user->country) }}">
                                        @error('country')<div class="acct-err">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            <p class="acct-section-label">Change Password <span style="font-weight:400;text-transform:none;letter-spacing:0;color:#bbb">(leave blank to keep current)</span></p>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="acct-field">
                                        <label class="acct-label">Current Password</label>
                                        <input class="acct-input @error('oldpassword') is-invalid @enderror" type="password"
                                               name="oldpassword" placeholder="Enter current password" autocomplete="off">
                                        @error('oldpassword')<div class="acct-err">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="acct-field">
                                        <label class="acct-label">New Password</label>
                                        <input class="acct-input @error('password') is-invalid @enderror" type="password"
                                               name="password" placeholder="Enter new password" autocomplete="off">
                                        @error('password')<div class="acct-err">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            <div style="margin-top:8px">
                                <button type="submit" class="acct-btn acct-btn--primary w-100" style="font-size:15px;padding:14px">
                                    Save Changes
                                </button>
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
