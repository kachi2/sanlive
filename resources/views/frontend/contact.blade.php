@extends('layouts.app')


@section('content')
<div class="ps-contact">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="{{ route('users.index') }}">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">Contact Us</li>
        </ul>
        <h1 style="font-size:1.2rem;font-weight:700;color:#103178;margin:16px 0">Contact Us &ndash; Sanlive Pharmacy Nigeria</h1>
        <div class="ps-contact__content">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="ps-contact__info">
                        <h3>How can we help you?</h3>
                        <p class="ps-contact__text">
                            Phone: {{ $settings->site_phone ?? '' }}<br>
                            Email: {{ $settings->site_email ?? '' }}<br>
                            Address: {{ $settings->address ?? '' }}
                        </p>
                        <ul class="ps-social">
                            <li><a class="ps-social__link facebook" href="{{ $settings->facebook ?? '' }}">
                                <i class="fa fa-facebook"></i><span class="ps-tooltip">Facebook</span>
                            </a></li>
                            <li><a class="ps-social__link instagram" href="{{ $settings->instagram ?? '' }}">
                                <i class="fa fa-instagram"></i><span class="ps-tooltip">Instagram</span>
                            </a></li>
                            <li><a class="ps-social__link pinterest" href="{{ $settings->pinterest ?? '' }}">
                                <i class="fa fa-pinterest-p"></i><span class="ps-tooltip">Pinterest</span>
                            </a></li>
                            <li><a class="ps-social__link linkedin" href="{{ $settings->linkedIn ?? '' }}">
                                <i class="fa fa-linkedin"></i><span class="ps-tooltip">Linkedin</span>
                            </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="/contact/us/submit" method="POST">
                        @csrf
                        <div class="ps-form--contact">
                            <h2 class="ps-form__title">Fill up the form if you have any question</h2>
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="ps-form__group">
                                        <input class="form-control" name="name" type="text"
                                               placeholder="Full Name" required
                                               value="{{ old('name') }}">
                                        @error('name')<span class="badge bg-warning">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="ps-form__group">
                                        <input class="form-control" type="email" name="email"
                                               placeholder="Your E-mail" required
                                               value="{{ old('email') }}">
                                        @error('email')<span class="badge bg-warning">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="ps-form__group">
                                        <input class="form-control" type="text" name="phone"
                                               placeholder="Phone" required
                                               value="{{ old('phone') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="ps-form__group">
                                        <textarea class="form-control" rows="5" name="message"
                                                  placeholder="Message" required>{{ old('message') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-form__submit">
                                <button type="submit" class="btn btn-info btn-lg">Send message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
