@extends('errors.minimal')

@section('title', 'Too Many Requests')

@section('error-body')
<div class="err-icon" style="background:#fef2f2">
    <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
</div>
<div class="err-code" style="background:linear-gradient(135deg,#dc2626,#991b1b)">429</div>
<h1 class="err-title">Too Many Requests</h1>
<p class="err-msg">You've made too many requests in a short period of time.<br>Please slow down and try again in a few minutes.</p>
<div class="err-actions">
    <button onclick="window.location.reload()" class="err-btn err-btn--primary">Try Again</button>
    <a href="{{ url('/') }}" class="err-btn err-btn--ghost">Go Home</a>
</div>
@endsection
