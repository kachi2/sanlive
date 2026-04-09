@extends('errors.minimal')

@section('title', 'Service Unavailable')

@section('error-body')
<div class="err-icon" style="background:#f0f9ff">
    <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#0284c7" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><line x1="12" y1="8" x2="12" y2="12"/><circle cx="12" cy="16" r=".5" fill="#0284c7"/></svg>
</div>
<div class="err-code" style="background:linear-gradient(135deg,#0284c7,#075985)">503</div>
<h1 class="err-title">Service Unavailable</h1>
<p class="err-msg">We're currently down for maintenance or experiencing high traffic.<br>We'll be back up shortly — thank you for your patience.</p>
<div class="err-actions">
    <button onclick="window.location.reload()" class="err-btn err-btn--primary">Check Again</button>
</div>
@endsection
