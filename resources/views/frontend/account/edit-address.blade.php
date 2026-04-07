@extends('layouts.app')

@section('title', 'Edit Address')
@section('meta_robots', 'noindex, nofollow')

@section('content')
<div class="ps-shopping" style="background:#eee">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
                @include('frontend.partials.account-sidebar')
                <div class="col-12 col-md-7 col-lg-8 mt-5" style="background:#fff; border-radius:5px">
                    <form action="/account/address/update/{{ $address->hashid }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12" style="background:#fff; border-radius:10px">
                                <p class="m-4" style="color:#332d2d">
                                    <i class="fa fa-check-square-o" style="color:rgb(79,81,79)"></i>
                                    Edit Address
                                </p>
                                <hr>
                                @if($errors->any())
                                <div class="alert alert-warning m-3">
                                    @foreach($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                                @endif
                                <div class="row m-3">
                                    <div class="col-12 col-md-6">
                                        <div class="ps-form__group">
                                            <label style="color:rgb(114,111,111)">Full Name</label>
                                            <input style="border-radius:5px" class="form-control ps-form__input @error('name') is-invalid @enderror"
                                                   type="text" name="name" placeholder="Full name"
                                                   value="{{ old('name', $address->name) }}">
                                            @error('name')<span class="badge bg-warning">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mt-1">
                                        <div class="ps-form__group">
                                            <label style="color:rgb(114,111,111)">Phone Number</label>
                                            <input class="form-control ps-form__input @error('phone') is-invalid @enderror"
                                                   type="text" name="phone" placeholder="Phone Number"
                                                   value="{{ old('phone', $address->phone) }}">
                                            @error('phone')<span class="badge bg-warning">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-3">
                                    <div class="col-12 col-md-6 mt-1">
                                        <div class="ps-form__group">
                                            <label style="color:rgb(114,111,111)">Email Address</label>
                                            <input class="form-control ps-form__input @error('email') is-invalid @enderror"
                                                   type="email" name="email" placeholder="Email Address"
                                                   value="{{ old('email', $address->email) }}">
                                            @error('email')<span class="badge bg-warning">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mt-1">
                                        <div class="ps-form__group">
                                            <label style="color:rgb(114,111,111)">Full Address</label>
                                            <input class="form-control ps-form__input @error('address') is-invalid @enderror"
                                                   type="text" name="address" placeholder="Full Address"
                                                   value="{{ old('address', $address->address) }}">
                                            @error('address')<span class="badge bg-warning">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div style="display:flex; color:rgb(114,111,111); align-items:center; margin-top:10px">
                                        <input style="width:18px" value="1" type="checkbox" name="is_default" id="is_default"
                                               {{ $address->is_default == 1 ? 'checked' : '' }}>
                                        <label for="is_default" class="pl-2">Set as Default Address</label>
                                    </div>
                                    <div class="m-4" style="float:right">
                                        <button type="submit" class="ps-btn ps-btn--success w-100" style="border-radius:5px">
                                            Update Address
                                        </button>
                                    </div>
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
