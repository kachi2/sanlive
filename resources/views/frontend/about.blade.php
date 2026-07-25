@extends('layouts.app')

@if(isset($schema))
@section('schema')
{!! $schema !!}
@endsection
@endif

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
/* Impact banner */
.pg-impact{background:linear-gradient(135deg,#103178 0%,#1a449f 100%);padding:60px 0;position:relative;overflow:hidden}
.pg-impact::before{content:'';position:absolute;right:-100px;top:-100px;width:300px;height:300px;border-radius:50%;background:rgba(255,255,255,.04)}
.pg-impact::after{content:'';position:absolute;left:-80px;bottom:-80px;width:220px;height:220px;border-radius:50%;background:rgba(255,255,255,.03)}
.pg-impact__head{text-align:center;margin-bottom:44px;position:relative}
.pg-impact__title{font-size:clamp(20px,3vw,27px);font-weight:800;color:#fff;margin:10px 0 0}
.pg-impact__row{position:relative}
.pg-impact__col{text-align:center;padding:0 16px}
.pg-impact__col+.pg-impact__col{border-left:1px solid rgba(255,255,255,.12)}
.pg-impact__icon{width:52px;height:52px;border-radius:14px;background:rgba(255,255,255,.12);display:flex;align-items:center;justify-content:center;margin:0 auto 16px}
.pg-impact__num{font-size:clamp(32px,5vw,44px);font-weight:800;color:#fff;line-height:1;letter-spacing:-.5px}
.pg-impact__lbl{font-size:14.5px;color:rgba(255,255,255,.85);font-weight:600;margin-top:10px}
.pg-impact__sub{display:inline-block;font-size:11px;color:#a8e6b8;background:rgba(37,162,68,.18);font-weight:700;text-transform:uppercase;letter-spacing:.5px;margin-top:10px;padding:4px 12px;border-radius:20px}
@media (max-width:767px){.pg-impact__col+.pg-impact__col{border-left:none;border-top:1px solid rgba(255,255,255,.12);padding-top:28px;margin-top:28px}}
/* Testimonials */
.pg-t-rating{display:inline-flex;align-items:center;gap:10px;background:#fff;border:1px solid #eef0f6;border-radius:14px;padding:10px 18px;box-shadow:0 4px 20px rgba(16,49,120,.06);margin-bottom:14px}
.pg-t-rating__num{font-size:16px;font-weight:800;color:#111}
.pg-t-stars{color:#f5a623;font-size:14px;letter-spacing:2px}
.pg-t-rating__count{font-size:12.5px;color:#888}
.pg-t-card{background:#f8f9fc;border:1px solid #eef0f6;border-radius:18px;padding:28px 26px;height:100%}
.pg-t-card .pg-t-stars{display:block;margin-bottom:14px}
.pg-t-quote{font-size:14px;color:#444;line-height:1.75;margin:0 0 22px;min-height:84px}
.pg-t-foot{display:flex;align-items:center;gap:12px}
.pg-t-avatar{width:40px;height:40px;border-radius:50%;background:#103178;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:14px;flex-shrink:0}
.pg-t-name{font-size:13.5px;font-weight:700;color:#111;margin:0}
.pg-t-role{font-size:11.5px;color:#888;display:flex;align-items:center;gap:5px;margin-top:1px}
/* Team */
.pg-team__card{background:#fff;border-radius:18px;overflow:hidden;box-shadow:0 6px 24px rgba(16,49,120,.08);text-align:center;transition:transform .15s,box-shadow .15s;height:100%}
.pg-team__card:hover{transform:translateY(-4px);box-shadow:0 12px 32px rgba(16,49,120,.14)}
.pg-team__photo{width:100%;aspect-ratio:3/4;object-fit:cover;display:block;background:#eef2ff}
.pg-team__body{padding:16px 14px 20px}
.pg-team__name{font-size:14.5px;font-weight:800;color:#111;margin:0 0 2px}
.pg-team__cred{font-size:11px;color:#103178;font-weight:700;letter-spacing:.3px;margin-bottom:6px;text-transform:uppercase}
.pg-team__role{font-size:12.5px;color:#777;margin:0}
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

    {{-- Our Impact --}}
    <div class="pg-impact">
        <div class="container">
            <div class="pg-impact__head">
                <span class="pg-section__tag" style="background:rgba(255,255,255,.14);color:#fff">Our Impact</span>
                <h2 class="pg-impact__title">Trusted by thousands, every single day</h2>
            </div>
            <div class="row g-4 pg-impact__row">
                <div class="col-12 col-md-4 pg-impact__col">
                    <div class="pg-impact__icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                    </div>
                    <div class="pg-impact__num">320K+</div>
                    <div class="pg-impact__lbl">Lives Impacted</div>
                    <div class="pg-impact__sub">And Still Counting</div>
                </div>
                <div class="col-12 col-md-4 pg-impact__col">
                    <div class="pg-impact__icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.29 7 12 12 20.71 7"/><line x1="12" y1="22" x2="12" y2="12"/></svg>
                    </div>
                    <div class="pg-impact__num">460K+</div>
                    <div class="pg-impact__lbl">Medications Delivered</div>
                    <div class="pg-impact__sub">And Still Counting</div>
                </div>
                <div class="col-12 col-md-4 pg-impact__col">
                    <div class="pg-impact__icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                    </div>
                    <div class="pg-impact__num">23</div>
                    <div class="pg-impact__lbl">Countries Reached</div>
                    <div class="pg-impact__sub">And Still Counting</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Meet Our Team --}}
    <div class="pg-section pg-section--alt">
        <div class="container">
            <div style="text-align:center;margin-bottom:40px">
                <span class="pg-section__tag">Our Team</span>
                <h2 class="pg-section__headline" style="margin-top:8px">Meet our pharmacists &amp; nurses</h2>
                <p class="pg-section__body" style="max-width:560px;margin:0 auto">The licensed professionals behind every prescription review, dosage check, and delivery at {{ $settings->site_name ?? 'Sanlive Pharmacy' }}.</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-6 col-md-4 col-lg">
                    <div class="pg-team__card">
                        <img class="pg-team__photo" src="/frontend/team/sandra-vincent.jpeg" alt="Pharm. Sandra Vincent" loading="lazy">
                        <div class="pg-team__body">
                            <p class="pg-team__name">Pharm. Sandra Vincent</p>
                            <div class="pg-team__cred">B.Pharm</div>
                            <p class="pg-team__role">CEO, Sanlive Pharmacy</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg">
                    <div class="pg-team__card">
                        <img class="pg-team__photo" src="/frontend/team/nurse-victoria.jpeg" alt="Nurse Victoria" loading="lazy">
                        <div class="pg-team__body">
                            <p class="pg-team__name">Nurse Victoria</p>
                            <div class="pg-team__cred">RN</div>
                            <p class="pg-team__role">Nurse, Sanlive Pharmacy</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg">
                    <div class="pg-team__card">
                        <img class="pg-team__photo" src="/frontend/team/nurse-gift.jpeg" alt="Nurse Gift" loading="lazy">
                        <div class="pg-team__body">
                            <p class="pg-team__name">Nurse Gift</p>
                            <div class="pg-team__cred">RN</div>
                            <p class="pg-team__role">Nurse, Sanlive Pharmacy</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg">
                    <div class="pg-team__card">
                        <img class="pg-team__photo" src="/frontend/team/pharm-mo.jpeg" alt="Pharm. MO" loading="lazy">
                        <div class="pg-team__body">
                            <p class="pg-team__name">Pharm. MO</p>
                            <div class="pg-team__cred">B.Pharm</div>
                            <p class="pg-team__role">Pharmacist, Sanlive Pharmacy</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg">
                    <div class="pg-team__card">
                        <img class="pg-team__photo" src="/frontend/team/pharm-dominic.jpeg" alt="Pharm. Dominic" loading="lazy">
                        <div class="pg-team__body">
                            <p class="pg-team__name">Pharm. Dominic</p>
                            <div class="pg-team__cred">B.Pharm</div>
                            <p class="pg-team__role">Pharmacist, Sanlive Pharmacy</p>
                        </div>
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
        </div>
    </div>

    {{-- Testimonials --}}
    <div class="pg-section pg-section--alt">
        <div class="container">
            <div style="text-align:center;margin-bottom:40px">
                <span class="pg-section__tag">Testimonials</span>
                <h2 class="pg-section__headline" style="margin-top:8px">Why people trust {{ $settings->site_name ?? 'Sanlive Pharmacy' }}</h2>
                <div class="pg-t-rating">
                    <span class="pg-t-rating__num">5.0</span>
                    <span class="pg-t-stars">★★★★★</span>
                    <span class="pg-t-rating__count">from 19+ Google Reviews</span>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="pg-t-card">
                        <span class="pg-t-stars">★★★★★</span>
                        <p class="pg-t-quote">"At Sanlive, no records for fake and substandard drugs. Sanlive Pharmacy gives you hope in standard and affordability of all their drugs."</p>
                        <div class="pg-t-foot">
                            <div class="pg-t-avatar">A</div>
                            <div>
                                <p class="pg-t-name">Adeyanju Samson</p>
                                <div class="pg-t-role">Google Review</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="pg-t-card">
                        <span class="pg-t-stars">★★★★★</span>
                        <p class="pg-t-quote">"Great pharmaceutical services. Sanlive pharmacy, your first and best choice of med store and care services. I recommend Sanlive any day anytime."</p>
                        <div class="pg-t-foot">
                            <div class="pg-t-avatar">J</div>
                            <div>
                                <p class="pg-t-name">Joyi Joseph</p>
                                <div class="pg-t-role">Google Review</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="pg-t-card">
                        <span class="pg-t-stars">★★★★★</span>
                        <p class="pg-t-quote">"Best store you can get authentic/original products, will definitely keep recommending my friends and family. 100%"</p>
                        <div class="pg-t-foot">
                            <div class="pg-t-avatar">S</div>
                            <div>
                                <p class="pg-t-name">Sylvia Uche</p>
                                <div class="pg-t-role">Google Review</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="pg-t-card">
                        <span class="pg-t-stars">★★★★★</span>
                        <p class="pg-t-quote">"I had a really quick delivery than expected. Their customer service too is one of the best. Can't wait to purchase from them."</p>
                        <div class="pg-t-foot">
                            <div class="pg-t-avatar">J</div>
                            <div>
                                <p class="pg-t-name">Juliet Hetty Abrokwah</p>
                                <div class="pg-t-role">Google Review</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="pg-t-card">
                        <span class="pg-t-stars">★★★★★</span>
                        <p class="pg-t-quote">"The service is fast and I got my order right away. Amazing customer service. Great job!"</p>
                        <div class="pg-t-foot">
                            <div class="pg-t-avatar">P</div>
                            <div>
                                <p class="pg-t-name">Pretty Princess</p>
                                <div class="pg-t-role">Google Review</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="pg-t-card">
                        <span class="pg-t-stars">★★★★★</span>
                        <p class="pg-t-quote">"Reliable services and affordable."</p>
                        <div class="pg-t-foot">
                            <div class="pg-t-avatar">M</div>
                            <div>
                                <p class="pg-t-name">Machine Gun</p>
                                <div class="pg-t-role">Google Review</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- CTA --}}
    <div class="pg-section">
        <div class="container">
            <div class="pg-cta">
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
