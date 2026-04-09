@extends('errors.minimal')

@section('title', 'Page Expired')

@section('error-body')
<div class="err-icon" style="background:#fffbeb">
    <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
</div>
<div class="err-code" style="background:linear-gradient(135deg,#d97706,#92400e)">419</div>
<h1 class="err-title">Page Expired</h1>
<p class="err-msg">Your session has expired or the page took too long to load.<br>Please refresh and try submitting again.</p>
<div class="err-actions">
    <button onclick="window.location.reload()" class="err-btn err-btn--primary">Refresh Page</button>
    <a href="{{ url('/') }}" class="err-btn err-btn--ghost">Go Home</a>
</div>
@endsection
