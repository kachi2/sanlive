@extends('layouts.auth')

@section('title', 'Sign In')

@section('content')
<div style="text-align:center; padding:10px; margin-bottom:20px">
    <a href="{{ route('users.index') }}">
        <img src="{{ asset('images/'.$settings->site_logo) }}" alt="{{ $settings->site_name }}" width="180">
    </a>
</div>

<h4 style="text-align:center; margin-bottom:25px">Sign In</h4>

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

<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="form-group">
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
               placeholder="Email" required autofocus value="{{ old('email') }}">
        @error('email')<span class="badge badge-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
               id="password" placeholder="Password" required autocomplete="current-password">
    </div>
    <div class="form-group d-flex justify-content-between">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="remember" id="remember"
                   {{ old('remember') ? 'checked' : '' }}>
            <label class="custom-control-label" for="remember">Remember me</label>
        </div>
        @if(Route::has('password.request'))
        <a href="{{ route('password.request') }}" style="font-size:13px">Forgot your password?</a>
        @endif
    </div>
    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
</form>

<p class="text-muted mt-4 text-center">Don't have an account?
    <a href="{{ route('register') }}">Register now!</a>
</p>
@endsection
