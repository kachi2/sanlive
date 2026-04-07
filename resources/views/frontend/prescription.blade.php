@extends('layouts.app')


@section('content')
<div class="ps-checkout">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="{{ route('users.index') }}">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">Doctor's Prescription</li>
        </ul>
        <div class="ps-checkout__content">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="/doctor/prescription" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="ps-checkout__form">
                            <h3 class="ps-checkout__heading">Patient's Information</h3>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="ps-checkout__group">
                                        <label class="ps-checkout__label">Full name *</label>
                                        <input class="form-control form-data @error('name') is-invalid @enderror"
                                               name="name" type="text" placeholder="Full name" value="{{ old('name') }}">
                                        @error('name')<span class="badge bg-warning">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="ps-checkout__group">
                                        <label class="ps-checkout__label">Email address *</label>
                                        <input class="form-control form-data @error('email') is-invalid @enderror"
                                               name="email" type="email" placeholder="Email" value="{{ old('email') }}">
                                        @error('email')<span class="badge bg-warning">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="ps-checkout__group">
                                        <label class="ps-checkout__label">Phone *</label>
                                        <input class="form-control form-data @error('phone') is-invalid @enderror"
                                               name="phone" type="text" placeholder="Phone" value="{{ old('phone') }}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="ps-checkout__group">
                                        <label class="ps-checkout__label">Street address *</label>
                                        <input class="form-control form-data @error('address') is-invalid @enderror"
                                               name="address" type="text"
                                               placeholder="House number and street name" value="{{ old('address') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="ps-checkout__group">
                                        <label class="ps-checkout__label">Town / City *</label>
                                        <input class="form-control form-data @error('city') is-invalid @enderror"
                                               name="city" type="text" placeholder="Town/City" value="{{ old('city') }}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="ps-checkout__group">
                                        <label class="ps-checkout__label">State *</label>
                                        <input class="form-control form-data @error('state') is-invalid @enderror"
                                               name="state" type="text" value="{{ old('state') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="ps-checkout__group">
                                        <label class="ps-checkout__label">Upload Prescription *</label>
                                        <input class="ps-input @error('image') is-invalid @enderror"
                                               name="image" type="file" accept="image/*,.pdf">
                                        @error('image')<span class="badge bg-warning">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="ps-checkout__group">
                                        <label class="ps-checkout__label">Notes</label>
                                        <textarea class="form-control form-data" name="notes" rows="7"
                                                  placeholder="Write additional notes about the prescription.">{{ old('notes') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-lg w-25 p-2" style="border-radius:10px">
                                Upload Prescription
                            </button>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mt-4">
                        <div style="background:#f0f8ff; border-radius:10px; padding:25px">
                            <h4 style="color:#103178; font-weight:600">How it works</h4>
                            <ol style="color:#555; font-size:14px; line-height:2">
                                <li>Fill in your patient information</li>
                                <li>Upload your doctor's prescription (photo or PDF)</li>
                                <li>Our pharmacist will review your prescription</li>
                                <li>We'll prepare your medications and deliver to your doorstep</li>
                            </ol>
                            <p style="font-size:13px; color:#888; margin-top:10px">
                                <i class="fa fa-phone mr-1"></i> Questions? Call us: {{ $settings->site_phone ?? '' }}
                            </p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
