@extends('errors.minimal')

@section('title', 'Page Not Found')

@section('error-body')
<div class="err-icon" style="background:#eef2ff">
    <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#103178" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="11"/><circle cx="11" cy="14" r=".5" fill="#103178"/></svg>
</div>
<div class="err-code">404</div>
<h1 class="err-title">Page Not Found</h1>
<p class="err-msg">Oops! The page you're looking for doesn't exist or has been moved.<br>Double-check the URL or head back home.</p>
<div class="err-actions">
    <a href="{{ route('users.index') }}" class="err-btn err-btn--primary">← Back to Homepage</a>
    <a href="{{ route('products.search') }}" class="err-btn err-btn--ghost">Browse Products</a>
</div>
@endsection