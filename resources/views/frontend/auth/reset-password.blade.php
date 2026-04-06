@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
<div style="text-align:center; padding:10px; margin-bottom:20px">
    <a href="{{ route('users.index') }}">
        <img src="{{ asset('images/'.$settings->site_logo) }}" alt="{{ $settings->site_name }}" width="180">
    </a>
</div>

<h4 style="text-align:center; margin-bottom:25px">Reset Password</h4>

@if($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
</div>
@endif

<form action="{{ route('password.store') }}" method="POST">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="form-group">
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
               placeholder="Email" required value="{{ $email ?? old('email') }}">
        @error('email')<span class="badge badge-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
               placeholder="New Password" required autofocus autocomplete="new-password">
        @error('password')<span class="badge badge-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <input type="password" name="password_confirmation" class="form-control"
               placeholder="Confirm New Password" required autocomplete="new-password">
    </div>
    <button type="submit" class="btn btn-primary">Reset Password</button>
</form>
@endsection
