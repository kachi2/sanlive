@extends('layouts.app')

@section('styles')
<style>
/* ── Shared page shell ───────────────────────── */
.pg-page{background:#f0f2f8;padding-bottom:64px}
/* Hero */
.pg-hero{background:linear-gradient(135deg,#103178 0%,#1a449f 100%);padding:60px 0 56px;position:relative;overflow:hidden}
.pg-hero::before{content:'';position:absolute;right:-80px;top:-80px;width:320px;height:320px;border-radius:50%;background:rgba(255,255,255,.045)}
.pg-hero::after{content:'';position:absolute;left:-60px;bottom:-60px;width:240px;height:240px;border-radius:50%;background:rgba(255,255,255,.03)}
.pg-hero__tag{display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,.15);color:rgba(255,255,255,.9);font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;padding:5px 14px;border-radius:20px;margin-bottom:16px}
.pg-hero h1{font-size:clamp(24px,4vw,38px);font-weight:800;color:#fff;margin:0 0 14px;line-height:1.2;max-width:680px}
.pg-hero p{font-size:15px;color:rgba(255,255,255,.78);margin:0;max-width:520px;line-height:1.7}
.pg-breadcrumb{font-size:13px;color:rgba(255,255,255,.6);margin-bottom:20px}
.pg-breadcrumb a{color:rgba(255,255,255,.8);text-decoration:none;font-weight:500}
.pg-breadcrumb a:hover{color:#fff}
/* Stats strip */
.pg-stats{background:#fff;box-shadow:0 2px 20px rgba(16,49,120,.08);padding:28px 0;margin-bottom:0}
.pg-stat{text-align:center;padding:0 24px;border-right:1.5px solid #f0f2f8}
.pg-stat:last-child{border-right:none}
.pg-stat__num{font-size:28px;font-weight:800;color:#103178;line-height:1}
.pg-stat__lbl{font-size:12px;color:#888;margin-top:5px;font-weight:500}
/* Content sections */
.pg-section{padding:64px 0}
.pg-section--alt{background:#fff}
.pg-section__tag{display:inline-block;background:#eef2ff;color:#103178;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.7px;padding:4px 12px;border-radius:20px;margin-bottom:12px}
.pg-section__headline{font-size:clamp(20px,3vw,28px);font-weight:800;color:#111;margin:0 0 16px;line-height:1.3}
.pg-section__body{font-size:14.5px;color:#555;line-height:1.8}
.pg-section__body p{margin-bottom:12px}
/* Image frame */
.pg-img-frame{border-radius:20px;overflow:hidden;box-shadow:0 8px 40px rgba(16,49,120,.12);height:100%;max-height:380px}
.pg-img-frame img{width:100%;height:100%;object-fit:cover;display:block}
/* Mission / Vision */
.pg-mv-card{border-radius:20px;padding:36px 32px;height:100%;position:relative;overflow:hidden}
.pg-mv-card::before{content:'';position:absolute;right:-40px;bottom:-40px;width:160px;height:160px;border-radius:50%;background:rgba(255,255,255,.07)}
.pg-mv-card__icon{width:52px;height:52px;border-radius:14px;background:rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;margin-bottom:18px}
.pg-mv-card__title{font-size:16px;font-weight:800;color:#fff;margin:0 0 12px}
.pg-mv-card__text{font-size:14px;color:rgba(255,255,255,.82);line-height:1.7;margin:0}
/* Values list */
.pg-value-item{display:flex;align-items:flex-start;gap:14px;margin-bottom:16px}
.pg-value-item__dot{width:32px;height:32px;border-radius:10px;background:#eef2ff;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:1px}
.pg-value-item__text{font-size:14.5px;color:#444;line-height:1.5}
/* CTA strip */
.pg-cta{background:linear-gradient(135deg,#103178,#1a449f);border-radius:20px;padding:44px 44px;display:flex;align-items:center;justify-content:space-between;gap:24px;flex-wrap:wrap}
.pg-cta__text h3{color:#fff;font-size:20px;font-weight:800;margin:0 0 6px}
.pg-cta__text p{color:rgba(255,255,255,.75);font-size:14px;margin:0}
.pg-cta__btn{display:inline-flex;align-items:center;gap:8px;background:#25a244;color:#fff!important;font-size:14px;font-weight:700;padding:13px 28px;border-radius:12px;text-decoration:none!important;white-space:nowrap;transition:background .15s,box-shadow .15s}
.pg-cta__btn:hover{background:#1e8a38;box-shadow:0 6px 20px rgba(37,162,68,.35)}
</style>
@endsection

@section('content')
<div class="pg-page">

    {{-- Hero --}}
    <div class="pg-hero">
        <div class="container">
            <div class="pg-breadcrumb">
                <a href="{{ route('users.index') }}">Home</a>
                <span style="margin:0 8px;opacity:.5">›</span>
                About Us
            </div>
            <div class="pg-hero__tag">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                Our Story
            </div>
            <h1>About Sanlive Pharmacy – Your Trusted PCN Licensed Online Pharmacy in Nigeria</h1>
            <p>Delivering the medications you need, right to your doorstep. Reliable, safe, and regulated — because your health matters.</p>
        </div>
    </div>

    {{-- Stats strip --}}
    <div class="pg-stats">
        <div class="container">
            <div class="row text-center">
                <div class="col-6 col-md-3 pg-stat">
                    <div class="pg-stat__num">5,000+</div>
                    <div class="pg-stat__lbl">Products Available</div>
                </div>
                <div class="col-6 col-md-3 pg-stat">
                    <div class="pg-stat__num">10,000+</div>
                    <div class="pg-stat__lbl">Happy Customers</div>
                </div>
                <div class="col-6 col-md-3 pg-stat" style="margin-top:16px">
                    <div class="pg-stat__num" style="margin-top:0">24 hrs</div>
                    <div class="pg-stat__lbl">Avg Delivery Time</div>
                </div>
                <div class="col-6 col-md-3 pg-stat" style="margin-top:16px">
                    <div class="pg-stat__num" style="margin-top:0">PCN</div>
                    <div class="pg-stat__lbl">Licensed &amp; Regulated</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Who We Are --}}
    <div class="pg-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-12 col-lg-5">
                    <div class="pg-img-frame">
                        <img src="/frontend/weare.jpeg" alt="Who We Are – Sanlive Pharmacy">
                    </div>
                </div>
                <div class="col-12 col-lg-7">
                    <span class="pg-section__tag">Who We Are</span>
                    <h2 class="pg-section__headline">Nigeria's go-to online pharmacy platform</h2>
                    <div class="pg-section__body">
                        <p>{{ $settings->site_name ?? 'Sanlive Pharmacy' }} is an online pharmacy platform built to leverage technology for the secure distribution and delivery of high-quality medications. We are dedicated to fostering a healthier Nigeria — the vital connection between you and your medication.</p>
                        <p>Navigating a busy city in search of medicine is a challenge. We solve that by tapping into our extensive network of licensed drugstores and pharmacies across Nigeria to get you exactly what you need, wherever you are.</p>
                    </div>
                    <div style="margin-top:20px">
                        <div class="pg-value-item">
                            <div class="pg-value-item__dot">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#103178" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <div class="pg-value-item__text">Available on Website, Mobile App &amp; WhatsApp</div>
                        </div>
                        <div class="pg-value-item">
                            <div class="pg-value-item__dot">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#103178" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <div class="pg-value-item__text">All staff and pharmacy partners meet the highest standards</div>
                        </div>
                        <div class="pg-value-item">
                            <div class="pg-value-item__dot">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#103178" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <div class="pg-value-item__text">PCN-licensed and fully regulated for your safety</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- What We Do --}}
    <div class="pg-section pg-section--alt">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-12 col-lg-7 order-2 order-lg-1">
                    <span class="pg-section__tag">What We Do</span>
                    <h2 class="pg-section__headline">Pharma-tech solutions for everyday health needs</h2>
                    <div class="pg-section__body">
                        <p>We collaborate with authorised manufacturers, importers, and pharmacies across Nigeria to deliver pharmaceuticals swiftly to those in need. Our goal is easy, uninterrupted access to medications for everyone.</p>
                        <p>We provide top-notch online pharmaceutical services — dosage advice, medication monitoring, and prescription refills. As a Pharma-Tech company, we leverage technology to bring quality pharmaceutical care directly to your home.</p>
                    </div>
                    <div style="margin-top:20px">
                        <div class="pg-value-item">
                            <div class="pg-value-item__dot">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#103178" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <div class="pg-value-item__text">Doorstep delivery of prescription &amp; OTC medications</div>
                        </div>
                        <div class="pg-value-item">
                            <div class="pg-value-item__dot">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#103178" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <div class="pg-value-item__text">Online prescription upload &amp; pharmacist review</div>
                        </div>
                        <div class="pg-value-item">
                            <div class="pg-value-item__dot">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#103178" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <div class="pg-value-item__text">Nationwide coverage across all 36 Nigerian states</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 order-1 order-lg-2">
                    <div class="pg-img-frame">
                        <img src="/frontend/wedo.jpg" alt="What We Do – Sanlive Pharmacy">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Mission & Vision --}}
    <div class="pg-section">
        <div class="container">
            <div style="text-align:center;margin-bottom:40px">
                <span class="pg-section__tag">Our Purpose</span>
                <h2 class="pg-section__headline" style="margin-top:8px">Driven by a clear mission &amp; vision</h2>
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <div class="pg-mv-card" style="background:linear-gradient(135deg,#103178,#1a449f)">
                        <div class="pg-mv-card__icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </div>
                        <div class="pg-mv-card__title">Our Mission</div>
                        <p class="pg-mv-card__text">To empower individuals to take control of their health and well-being. We believe everyone deserves access to quality healthcare solutions — regardless of location or circumstance — through a seamless, technology-driven platform.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="pg-mv-card" style="background:linear-gradient(135deg,#25a244,#1e8a38)">
                        <div class="pg-mv-card__icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </div>
                        <div class="pg-mv-card__title">Our Vision</div>
                        <p class="pg-mv-card__text">To revolutionise the way people access healthcare in Nigeria and Africa — becoming the most trusted, accessible, and innovative pharmaceutical platform on the continent.</p>
                    </div>
                </div>
            </div>

            {{-- CTA --}}
            <div class="pg-cta" style="margin-top:40px">
                <div class="pg-cta__text">
                    <h3>Ready to experience better healthcare?</h3>
                    <p>Browse our products or upload your prescription and get medications delivered today.</p>
                </div>
                <a href="{{ route('users.index') }}" class="pg-cta__btn">
                    Shop Now
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>
        </div>
    </div>

</div>
@endsection
