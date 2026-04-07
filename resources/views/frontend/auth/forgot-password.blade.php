@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')
<div style="text-align:center; padding:10px; margin-bottom:20px">
    <a href="{{ route('users.index') }}">
        <img src="{{ asset('images/'.$settings->site_logo) }}" alt="{{ $settings->site_name }}" width="180">
    </a>
</div>

<h4 style="text-align:center; margin-bottom:15px">Forgot Password</h4>
<p style="font-size:14px; color:#666; margin-bottom:20px">
    Forgot your password? No problem. Just let us know your email address and we will email you a
    password reset link that will allow you to choose a new one.
</p>

@if(session('status'))
<div class="alert alert-info">{{ session('status') }}</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
</div>
@endif

<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <div class="form-group">
        <label style="float:left; font-size:13px">Email Address</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
               placeholder="Email" required autofocus value="{{ old('email') }}">
        @error('email')<span class="badge badge-danger">{{ $message }}</span>@enderror
    </div>
    <button type="submit" class="btn btn-primary">Email Password Reset Link</button>
</form>

<p class="text-muted mt-4 text-center">
    <a href="{{ route('login') }}" style="font-size:13px">← Back to Sign In</a>
</p>
@endsection
