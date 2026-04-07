@extends('layouts.app')

@section('meta_robots', 'noindex, nofollow')

@section('content')
<div class="ps-shopping" style="background:#eee">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
                @include('frontend.partials.account-sidebar')
                <div class="col-12 col-md-7 col-lg-8 mt-5" style="background:#fff; border-radius:5px">
                    <form action="/accounts/settings/update" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12" style="background:#fff; border-radius:10px">
                                <span class="mt-4">Account Settings </span>
                                <hr>
                                @if(session('success'))
                                <div class="alert alert-success m-3">{{ session('success') }}</div>
                                @endif
                                @if(session('error'))
                                <div class="alert alert-danger m-3">{{ session('error') }}</div>
                                @endif
                                @if($errors->any())
                                <div class="alert alert-warning m-3">
                                    @foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach
                                </div>
                                @endif
                                <div class="row m-3">
                                    <div class="col-12 col-md-6">
                                        <div class="ps-form__group">
                                            <label style="color:rgb(114,111,111)">First Name</label>
                                            <input style="border-radius:5px" class="form-control ps-form__input @error('first_name') is-invalid @enderror"
                                                   type="text" name="first_name" placeholder="First name"
                                                   value="{{ old('first_name', $user->first_name) }}">
                                            @error('first_name')<span class="badge bg-warning">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mt-1">
                                        <div class="ps-form__group">
                                            <label style="color:rgb(114,111,111)">Last Name</label>
                                            <input style="border-radius:5px" class="form-control ps-form__input @error('last_name') is-invalid @enderror"
                                                   type="text" name="last_name" placeholder="Last name"
                                                   value="{{ old('last_name', $user->last_name) }}">
                                            @error('last_name')<span class="badge bg-warning">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mt-1">
                                        <div class="ps-form__group">
                                            <label style="color:rgb(114,111,111)">Phone Number</label>
                                            <input style="border-radius:5px" class="form-control ps-form__input @error('phone') is-invalid @enderror"
                                                   type="text" name="phone" placeholder="Phone Number"
                                                   value="{{ old('phone', $user->phone) }}">
                                            @error('phone')<span class="badge bg-warning">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mt-1">
                                        <div class="ps-form__group">
                                            <label style="color:rgb(114,111,111)">City</label>
                                            <input class="form-control ps-form__input @error('city') is-invalid @enderror"
                                                   type="text" name="city" placeholder="Enter City and State"
                                                   value="{{ old('city', $user->city) }}">
                                            @error('city')<span class="badge bg-warning">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mt-1">
                                        <div class="ps-form__group">
                                            <label style="color:rgb(114,111,111)">Country</label>
                                            <input class="form-control ps-form__input @error('country') is-invalid @enderror"
                                                   type="text" name="country" placeholder="Country"
                                                   value="{{ old('country', $user->country) }}">
                                            @error('country')<span class="badge bg-warning">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mt-1">
                                        <div class="ps-form__group">
                                            <label style="color:rgb(114,111,111)">Old Password</label>
                                            <input class="form-control ps-form__input @error('oldpassword') is-invalid @enderror"
                                                   type="password" name="oldpassword" placeholder="Old password" autocomplete="off">
                                            @error('oldpassword')<span class="badge bg-warning">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mt-1">
                                        <div class="ps-form__group">
                                            <label style="color:rgb(114,111,111)">New Password</label>
                                            <input class="form-control ps-form__input @error('password') is-invalid @enderror"
                                                   type="password" name="password" placeholder="New password" autocomplete="off">
                                            @error('password')<span class="badge bg-warning">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <button type="submit" class="ps-btn ps-btn--success w-100" style="border-radius:5px">
                                        Update Account
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height:2em; background:#eee"></div>
@endsection
