@extends('errors.minimal')

@section('title', 'Payment Required')

@section('error-body')
<div class="err-icon" style="background:#f0fdf4">
    <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
</div>
<div class="err-code" style="background:linear-gradient(135deg,#16a34a,#15803d)">402</div>
<h1 class="err-title">Payment Required</h1>
<p class="err-msg">This action requires a completed payment.<br>Please complete your payment to continue.</p>
<div class="err-actions">
    <a href="{{ url('/') }}" class="err-btn err-btn--primary">← Go Home</a>
</div>
@endsection
