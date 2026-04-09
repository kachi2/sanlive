@extends('layouts.app')


@section('content')
<div class="ps-about">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="{{ route('users.index') }}">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">FAQ</li>
        </ul>
    </div>
    <div class="container" style="padding-top:12px">
        <h1 style="font-size:1.2rem;font-weight:700;color:#103178;margin:0 0 8px 0">Frequently Asked Questions (FAQ)</h1>
    </div>
    <div class="ps-about__content">
        <section class="ps-about__project">
            <div class="container">
                <section class="ps-section">
                    <div class="ps-section__cntent">
                        <div class="ps-section__desc" style="color:#09376e">
                            @if($faq)
                            {!! $faq->content !!}
                            @else
                            <p>FAQ content coming soon.</p>
                            @endif
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </div>
</div>
@endsection
