@extends('errors.minimal')

@section('title', 'Server Error')

@section('error-body')
<div class="err-icon" style="background:#fff1f1">
    <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 22 20 2 20"/><line x1="12" y1="9" x2="12" y2="13"/><circle cx="12" cy="17" r=".5" fill="#dc2626"/></svg>
</div>
<div class="err-code" style="background:linear-gradient(135deg,#dc2626,#b91c1c)">500</div>
<h1 class="err-title">Internal Server Error</h1>
<p class="err-msg">Something went wrong on our end. Our team has been notified and is working on a fix.<br>Please try again in a few moments.</p>
<div class="err-actions">
    <a href="{{ url('/') }}" class="err-btn err-btn--primary">← Go Home</a>
    <button onclick="window.location.reload()" class="err-btn err-btn--ghost">Try Again</button>
</div>
@endsection
