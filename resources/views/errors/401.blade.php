@extends('errors.minimal')

@section('title', 'Unauthorized')

@section('error-body')
<div class="err-icon" style="background:#f0fdf4">
    <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/><line x1="18" y1="8" x2="23" y2="13"/><line x1="23" y1="8" x2="18" y2="13"/></svg>
</div>
<div class="err-code" style="background:linear-gradient(135deg,#16a34a,#15803d)">401</div>
<h1 class="err-title">Unauthorized</h1>
<p class="err-msg">You need to be signed in to view this page.<br>Please log in and try again.</p>
<div class="err-actions">
    <a href="{{ url('/') }}" class="err-btn err-btn--primary">Sign In</a>
    <a href="{{ url('/') }}" class="err-btn err-btn--ghost">Go Home</a>
</div>
@endsection
