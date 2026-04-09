@extends('layouts.app')

@section('styles')
<style>
/* ── Shared page shell ───────────────────────── */
.pg-page{background:#f0f2f8;padding-bottom:64px}
.pg-hero{background:linear-gradient(135deg,#103178 0%,#1a449f 100%);padding:60px 0 56px;position:relative;overflow:hidden}
.pg-hero::before{content:'';position:absolute;right:-80px;top:-80px;width:320px;height:320px;border-radius:50%;background:rgba(255,255,255,.045)}
.pg-hero::after{content:'';position:absolute;left:-60px;bottom:-60px;width:240px;height:240px;border-radius:50%;background:rgba(255,255,255,.03)}
.pg-hero__tag{display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,.15);color:rgba(255,255,255,.9);font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;padding:5px 14px;border-radius:20px;margin-bottom:16px}
.pg-hero h1{font-size:clamp(24px,4vw,38px);font-weight:800;color:#fff;margin:0 0 14px;line-height:1.2;max-width:700px}
.pg-hero p{font-size:15px;color:rgba(255,255,255,.78);margin:0;max-width:550px;line-height:1.7}
.pg-breadcrumb{font-size:13px;color:rgba(255,255,255,.6);margin-bottom:20px}
.pg-breadcrumb a{color:rgba(255,255,255,.8);text-decoration:none;font-weight:500}
.pg-breadcrumb a:hover{color:#fff}
/* Service feature sections */
.pg-section{padding:64px 0}
.pg-section--alt{background:#fff}
.pg-section__tag{display:inline-block;background:#eef2ff;color:#103178;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.7px;padding:4px 12px;border-radius:20px;margin-bottom:12px}
.pg-section__headline{font-size:clamp(20px,3vw,28px);font-weight:800;color:#111;margin:0 0 16px;line-height:1.3}
.pg-section__body{font-size:14.5px;color:#555;line-height:1.8}
.pg-section__body p{margin-bottom:12px}
/* Image frame */
.pg-img-frame{border-radius:20px;overflow:hidden;box-shadow:0 8px 40px rgba(16,49,120,.12);height:100%;max-height:380px}
.pg-img-frame img{width:100%;height:100%;object-fit:cover;display:block}
/* Check list */
.pg-check-item{display:flex;align-items:flex-start;gap:14px;margin-bottom:14px}
.pg-check-item__icon{width:28px;height:28px;border-radius:8px;background:#e6faf0;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:2px}
.pg-check-item__text{font-size:14.5px;color:#444;line-height:1.5}
/* Service cards grid */
.pg-svc-card{background:#fff;border-radius:18px;padding:28px 24px;box-shadow:0 2px 16px rgba(16,49,120,.07);height:100%;transition:box-shadow .2s,transform .2s}
.pg-svc-card:hover{box-shadow:0 8px 32px rgba(16,49,120,.14);transform:translateY(-3px)}
.pg-svc-card__icon{width:54px;height:54px;border-radius:15px;display:flex;align-items:center;justify-content:center;margin-bottom:18px}
.pg-svc-card__title{font-size:16px;font-weight:700;color:#111;margin:0 0 10px}
.pg-svc-card__text{font-size:13.5px;color:#666;line-height:1.6;margin:0}
/* Mission / Vision */
.pg-mv-card{border-radius:20px;padding:36px 32px;height:100%;position:relative;overflow:hidden}
.pg-mv-card::before{content:'';position:absolute;right:-40px;bottom:-40px;width:160px;height:160px;border-radius:50%;background:rgba(255,255,255,.07)}
.pg-mv-card__icon{width:52px;height:52px;border-radius:14px;background:rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;margin-bottom:18px}
.pg-mv-card__title{font-size:16px;font-weight:800;color:#fff;margin:0 0 12px}
.pg-mv-card__text{font-size:14px;color:rgba(255,255,255,.82);line-height:1.7;margin:0}
/* CTA */
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
                Our Services
            </div>
            <div class="pg-hero__tag">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                What We Offer
            </div>
            <h1>Reliable Healthcare Solutions<br>Built Around You</h1>
            <p>From fast medication delivery to prescription uploads and geriatric care — all our services are powered by technology to make quality healthcare accessible everywhere in Nigeria.</p>
        </div>
    </div>

    {{-- Service cards overview --}}
    <div class="pg-section">
        <div class="container">
            <div style="text-align:center;margin-bottom:40px">
                <span class="pg-section__tag">Core Services</span>
                <h2 class="pg-section__headline" style="margin-top:8px">Everything you need, in one platform</h2>
            </div>
            <div class="row g-4">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="pg-svc-card">
                        <div class="pg-svc-card__icon" style="background:#eef2ff">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#103178" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13" rx="2"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                        </div>
                        <div class="pg-svc-card__title">Fast Delivery</div>
                        <p class="pg-svc-card__text">Get your medications delivered to your doorstep within hours. No more pharmacy queues.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="pg-svc-card">
                        <div class="pg-svc-card__icon" style="background:#f0fdf4">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#25a244" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                        </div>
                        <div class="pg-svc-card__title">Prescription Upload</div>
                        <p class="pg-svc-card__text">Upload your doctor's prescription online. Our pharmacists review and prepare your order.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="pg-svc-card">
                        <div class="pg-svc-card__icon" style="background:#fff7ed">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                        </div>
                        <div class="pg-svc-card__title">Geriatric Care</div>
                        <p class="pg-svc-card__text">Specialised pharmaceutical support for the elderly, including dosage monitoring and refills.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="pg-svc-card">
                        <div class="pg-svc-card__icon" style="background:#fdf4ff">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#9333ea" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        </div>
                        <div class="pg-svc-card__title">PCN Certified</div>
                        <p class="pg-svc-card__text">Licensed and regulated by the Pharmacist Council of Nigeria. Only genuine, quality medications.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Why Choose Us --}}
    <div class="pg-section pg-section--alt">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-12 col-lg-5">
                    <div class="pg-img-frame">
                        <img src="/frontend/chooseus.jpg" alt="Why Choose Sanlive Pharmacy">
                    </div>
                </div>
                <div class="col-12 col-lg-7">
                    <span class="pg-section__tag">Why Choose Us</span>
                    <h2 class="pg-section__headline">We use technology to put your well-being first</h2>
                    <div class="pg-section__body">
                        <p>Access high-quality pharmaceutical services online in just seconds — no matter who you are or where you live in Nigeria.</p>
                    </div>
                    <div style="margin-top:16px">
                        <div class="pg-check-item">
                            <div class="pg-check-item__icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#25a244" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
                            <div class="pg-check-item__text">Too busy to visit a pharmacy? We come to you.</div>
                        </div>
                        <div class="pg-check-item">
                            <div class="pg-check-item__icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#25a244" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
                            <div class="pg-check-item__text">Can't find a specific medication locally? Our network covers thousands of products.</div>
                        </div>
                        <div class="pg-check-item">
                            <div class="pg-check-item__icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#25a244" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
                            <div class="pg-check-item__text">Discreet, professional service for all your pharmaceutical needs.</div>
                        </div>
                        <div class="pg-check-item">
                            <div class="pg-check-item__icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#25a244" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
                            <div class="pg-check-item__text">{{ $settings->site_name ?? 'Sanlive Pharmacy' }} is always here for you — 24/7 online.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Fast Delivery --}}
    <div class="pg-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-12 col-lg-7 order-2 order-lg-1">
                    <span class="pg-section__tag">Delivery</span>
                    <h2 class="pg-section__headline">We deliver fast — so you don't have to wait</h2>
                    <div class="pg-section__body">
                        <p>Eliminate the constant trips to the pharmacy with our quick medication delivery service. Your prescriptions and lab tests are only a few taps away on any device.</p>
                        <p>No matter the delivery option you choose, we are dedicated to getting high-quality products to you promptly and safely.</p>
                    </div>
                    <div style="display:flex;gap:20px;margin-top:22px;flex-wrap:wrap">
                        <div style="background:#fff;border-radius:14px;padding:16px 20px;box-shadow:0 2px 14px rgba(16,49,120,.07);text-align:center;min-width:100px">
                            <div style="font-size:22px;font-weight:800;color:#103178">Same day</div>
                            <div style="font-size:12px;color:#888;margin-top:3px">Lagos delivery</div>
                        </div>
                        <div style="background:#fff;border-radius:14px;padding:16px 20px;box-shadow:0 2px 14px rgba(16,49,120,.07);text-align:center;min-width:100px">
                            <div style="font-size:22px;font-weight:800;color:#103178">1–3 days</div>
                            <div style="font-size:12px;color:#888;margin-top:3px">Nationwide</div>
                        </div>
                        <div style="background:#fff;border-radius:14px;padding:16px 20px;box-shadow:0 2px 14px rgba(16,49,120,.07);text-align:center;min-width:100px">
                            <div style="font-size:22px;font-weight:800;color:#103178">36</div>
                            <div style="font-size:12px;color:#888;margin-top:3px">States covered</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 order-1 order-lg-2">
                    <div class="pg-img-frame">
                        <img src="/frontend/delivery.avif" alt="Fast Medication Delivery">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Certified --}}
    <div class="pg-section pg-section--alt">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-12 col-lg-5">
                    <div class="pg-img-frame">
                        <img src="/frontend/certi.png" alt="PCN Certified Pharmacy">
                    </div>
                </div>
                <div class="col-12 col-lg-7">
                    <span class="pg-section__tag">Certification</span>
                    <h2 class="pg-section__headline">A certified pharmaceutical store you can trust</h2>
                    <div class="pg-section__body">
                        <p>Your health and safety come first. We are licensed and regulated to provide genuine, high-quality medications every single time.</p>
                    </div>
                    <div style="margin-top:16px">
                        <div class="pg-check-item">
                            <div class="pg-check-item__icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#25a244" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
                            <div class="pg-check-item__text">All medications sourced from trusted, approved manufacturers</div>
                        </div>
                        <div class="pg-check-item">
                            <div class="pg-check-item__icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#25a244" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
                            <div class="pg-check-item__text">Storage conditions meet strict pharmaceutical standards</div>
                        </div>
                        <div class="pg-check-item">
                            <div class="pg-check-item__icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#25a244" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
                            <div class="pg-check-item__text">Our pharmacists are trained, qualified and patient-focused</div>
                        </div>
                        <div class="pg-check-item">
                            <div class="pg-check-item__icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#25a244" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
                            <div class="pg-check-item__text">Full compliance with national health and drug control regulations</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Geriatric Care --}}
    <div class="pg-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-12 col-lg-7 order-2 order-lg-1">
                    <span class="pg-section__tag">Geriatric Care</span>
                    <h2 class="pg-section__headline">Specialised care for our elderly patients</h2>
                    <div class="pg-section__body">
                        <p>We provide dedicated pharmaceutical support for the elderly — ensuring they receive the right medications at the right time, with full professional oversight.</p>
                    </div>
                    <div style="margin-top:16px">
                        <div class="pg-check-item">
                            <div class="pg-check-item__icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#25a244" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
                            <div class="pg-check-item__text">Consultation with patient and doctor to choose the best medication</div>
                        </div>
                        <div class="pg-check-item">
                            <div class="pg-check-item__icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#25a244" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
                            <div class="pg-check-item__text">Full dosage monitoring to ensure compliance and safety</div>
                        </div>
                        <div class="pg-check-item">
                            <div class="pg-check-item__icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#25a244" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
                            <div class="pg-check-item__text">Automatic drug refill to prevent interruptions in treatment</div>
                        </div>
                        <div class="pg-check-item">
                            <div class="pg-check-item__icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#25a244" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
                            <div class="pg-check-item__text">Periodic evaluation to review or adjust medication as needed</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 order-1 order-lg-2">
                    <div class="pg-img-frame">
                        <img src="/frontend/geria.webp" alt="Geriatric Care Services">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Mission & Vision --}}
    <div class="pg-section pg-section--alt">
        <div class="container">
            <div style="text-align:center;margin-bottom:36px">
                <span class="pg-section__tag">Our Purpose</span>
                <h2 class="pg-section__headline" style="margin-top:8px">Guided by mission &amp; vision</h2>
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <div class="pg-mv-card" style="background:linear-gradient(135deg,#103178,#1a449f)">
                        <div class="pg-mv-card__icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </div>
                        <div class="pg-mv-card__title">Our Mission</div>
                        <p class="pg-mv-card__text">To revolutionise how people access healthcare — creating a seamless experience that puts the power of pharmaceutical care in your hands, wherever you are.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="pg-mv-card" style="background:linear-gradient(135deg,#25a244,#1e8a38)">
                        <div class="pg-mv-card__icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </div>
                        <div class="pg-mv-card__title">Our Vision</div>
                        <p class="pg-mv-card__text">To become Nigeria's most trusted, accessible, and innovative pharmaceutical platform — ensuring that everyone deserves quality healthcare regardless of location or circumstances.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- CTA --}}
    <div style="padding:0 0 0">
        <div class="container">
            <div class="pg-cta" style="margin-top:40px">
                <div class="pg-cta__text">
                    <h3>Start your health journey with us today</h3>
                    <p>Order medications, upload a prescription, or reach out to our pharmacists.</p>
                </div>
                <div style="display:flex;gap:12px;flex-wrap:wrap">
                    <a href="{{ route('users.index') }}" class="pg-cta__btn">
                        Shop Now
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                    <a href="/upload/prescription" style="display:inline-flex;align-items:center;gap:8px;background:rgba(255,255,255,.15);color:#fff!important;font-size:14px;font-weight:700;padding:13px 24px;border-radius:12px;text-decoration:none!important;transition:background .15s">
                        Upload Prescription
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
