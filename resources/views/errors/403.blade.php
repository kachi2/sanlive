@extends('errors.minimal')

@section('title', 'Access Forbidden')

@section('error-body')
<div class="err-icon" style="background:#fff7ed">
    <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
</div>
<div class="err-code" style="background:linear-gradient(135deg,#d97706,#b45309)">403</div>
<h1 class="err-title">Access Forbidden</h1>
<p class="err-msg">You don't have permission to access this page.<br>If you think this is a mistake, please contact support.</p>
<div class="err-actions">
    <a href="{{ url('/') }}" class="err-btn err-btn--primary">← Go Home</a>
</div>
@endsection
