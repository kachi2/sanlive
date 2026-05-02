@extends('layouts.app')

@if(isset($schema))
@section('schema')
{!! $schema !!}
@endsection
@endif

@section('styles')
<style>
.faq-page{background:#f0f2f8;padding-bottom:64px}
/* Hero */
.faq-hero{background:linear-gradient(135deg,#103178 0%,#1a449f 100%);padding:60px 0 56px;position:relative;overflow:hidden}
.faq-hero::before{content:'';position:absolute;right:-80px;top:-80px;width:320px;height:320px;border-radius:50%;background:rgba(255,255,255,.045)}
.faq-hero::after{content:'';position:absolute;left:-60px;bottom:-60px;width:200px;height:200px;border-radius:50%;background:rgba(255,255,255,.03)}
.faq-hero__tag{display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,.15);color:rgba(255,255,255,.9);font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;padding:5px 14px;border-radius:20px;margin-bottom:16px}
.faq-hero h1{font-size:clamp(24px,4vw,38px);font-weight:800;color:#fff;margin:0 0 14px;line-height:1.2;max-width:640px}
.faq-hero p{font-size:15px;color:rgba(255,255,255,.78);margin:0;max-width:500px;line-height:1.7}
.faq-breadcrumb{font-size:13px;color:rgba(255,255,255,.6);margin-bottom:20px}
.faq-breadcrumb a{color:rgba(255,255,255,.8);text-decoration:none;font-weight:500}
.faq-breadcrumb a:hover{color:#fff}
/* Main layout */
.faq-body{padding:56px 0}
/* Category tabs */
.faq-tabs{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:32px}
.faq-tab{padding:8px 18px;border-radius:20px;font-size:13px;font-weight:600;cursor:pointer;border:1.5px solid transparent;transition:all .15s;background:#fff;color:#555;box-shadow:0 1px 8px rgba(16,49,120,.06)}
.faq-tab.active,.faq-tab:hover{background:#103178;color:#fff;border-color:#103178}
/* FAQ content card */
.faq-card{background:#fff;border-radius:20px;box-shadow:0 4px 24px rgba(16,49,120,.08);padding:36px 36px}
/* Rich content from DB — style the injected HTML */
.faq-content{color:#444;font-size:14.5px;line-height:1.85}
.faq-content h1,.faq-content h2,.faq-content h3,.faq-content h4{color:#103178;font-weight:700;margin:28px 0 10px}
.faq-content h2{font-size:18px}
.faq-content h3{font-size:16px}
.faq-content h4{font-size:14.5px}
.faq-content p{margin-bottom:14px}
.faq-content ul,.faq-content ol{padding-left:20px;margin-bottom:14px}
.faq-content li{margin-bottom:6px}
.faq-content strong{color:#111}
.faq-content a{color:#103178;text-decoration:underline}
.faq-content hr{border:none;border-top:1.5px solid #f0f2f8;margin:28px 0}
/* Accordion (used when no DB content) */
.faq-item{border-radius:14px;background:#fff;box-shadow:0 2px 12px rgba(16,49,120,.06);margin-bottom:12px;overflow:hidden;transition:box-shadow .15s}
.faq-item:hover{box-shadow:0 4px 20px rgba(16,49,120,.11)}
.faq-item__btn{width:100%;background:none;border:none;text-align:left;padding:20px 24px;display:flex;align-items:center;justify-content:space-between;gap:16px;cursor:pointer;font-size:14.5px;font-weight:600;color:#111}
.faq-item__btn[aria-expanded="true"]{color:#103178}
.faq-item__chevron{width:22px;height:22px;border-radius:6px;background:#f0f2f8;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:background .15s,transform .25s}
.faq-item__btn[aria-expanded="true"] .faq-item__chevron{background:#103178;transform:rotate(180deg)}
.faq-item__chevron svg{stroke:#555;transition:stroke .15s}
.faq-item__btn[aria-expanded="true"] .faq-item__chevron svg{stroke:#fff}
.faq-item__body{font-size:14px;color:#555;line-height:1.7;padding:0 24px 20px}
/* CTA */
.faq-cta{background:linear-gradient(135deg,#103178,#1a449f);border-radius:20px;padding:44px;text-align:center;margin-top:40px}
.faq-cta h3{color:#fff;font-size:20px;font-weight:800;margin:0 0 8px}
.faq-cta p{color:rgba(255,255,255,.75);font-size:14px;margin:0 0 22px}
.faq-cta__btns{display:flex;gap:12px;justify-content:center;flex-wrap:wrap}
.faq-cta__btn{display:inline-flex;align-items:center;gap:8px;background:#25a244;color:#fff!important;font-size:14px;font-weight:700;padding:12px 26px;border-radius:12px;text-decoration:none!important;transition:background .15s,box-shadow .15s}
.faq-cta__btn:hover{background:#1e8a38;box-shadow:0 6px 20px rgba(37,162,68,.35)}
.faq-cta__btn--outline{background:rgba(255,255,255,.14);border:1.5px solid rgba(255,255,255,.3)}
.faq-cta__btn--outline:hover{background:rgba(255,255,255,.22);box-shadow:none}
</style>
@endsection

@section('content')
<div class="faq-page">

    {{-- Hero --}}
    <div class="faq-hero">
        <div class="container">
            <div class="faq-breadcrumb">
                <a href="{{ route('users.index') }}">Home</a>
                <span style="margin:0 8px;opacity:.5">›</span>
                FAQ
            </div>
            <div class="faq-hero__tag">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                Help Center
            </div>
            <h1>Frequently Asked Questions</h1>
            <p>Find quick answers to common questions about ordering, delivery, prescriptions, payments, and more.</p>
        </div>
    </div>

    <div class="faq-body">
        <div class="container">
            <div class="row" style="align-items:flex-start">

                {{-- Main content --}}
                <div class="col-12 col-lg-8" style="margin-bottom:24px">
                    @if($faq && $faq->content)
                    <div class="faq-card">
                        <div class="faq-content">
                            {!! $faq->content !!}
                        </div>
                    </div>
                    @else
                    {{-- Default accordion when no DB content --}}
                    <div class="faq-item">
                        <button class="faq-item__btn" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true">
                            How do I place an order on Sanlive Pharmacy?
                            <span class="faq-item__chevron"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span>
                        </button>
                        <div id="faq1" class="collapse show">
                            <div class="faq-item__body">Browse our product catalogue, add items to your cart, and proceed to checkout. You'll need to be logged in to complete your order. We accept card payments, bank transfer, and more.</div>
                        </div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-item__btn" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false">
                            Do I need a prescription to order medications?
                            <span class="faq-item__chevron"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span>
                        </button>
                        <div id="faq2" class="collapse">
                            <div class="faq-item__body">Some medications require a valid prescription from a licensed doctor. For those, you can upload your prescription directly on our website and our pharmacist will review it before dispensing.</div>
                        </div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-item__btn" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false">
                            How long does delivery take?
                            <span class="faq-item__chevron"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span>
                        </button>
                        <div id="faq3" class="collapse">
                            <div class="faq-item__body">Lagos orders are typically delivered same-day or within 24 hours. Nationwide orders take 1–3 business days depending on your location. You'll receive tracking updates once your order is dispatched.</div>
                        </div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-item__btn" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false">
                            What payment methods do you accept?
                            <span class="faq-item__chevron"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span>
                        </button>
                        <div id="faq4" class="collapse">
                            <div class="faq-item__body">We accept debit/credit cards (Visa, Mastercard), bank transfers, and other local payment methods via our secure payment gateway. All transactions are encrypted and safe.</div>
                        </div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-item__btn" type="button" data-bs-toggle="collapse" data-bs-target="#faq5" aria-expanded="false">
                            Can I return or exchange a product?
                            <span class="faq-item__chevron"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span>
                        </button>
                        <div id="faq5" class="collapse">
                            <div class="faq-item__body">Due to health and safety regulations, most pharmaceutical products cannot be returned once dispensed. However, if you received a wrong or damaged item, please contact us within 24 hours of delivery and we'll make it right.</div>
                        </div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-item__btn" type="button" data-bs-toggle="collapse" data-bs-target="#faq6" aria-expanded="false">
                            How do I upload a prescription?
                            <span class="faq-item__chevron"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span>
                        </button>
                        <div id="faq6" class="collapse">
                            <div class="faq-item__body">Visit our <a href="/doctor/prescription">Prescription Upload</a> page, fill in your details, and attach a clear photo or PDF of your doctor's prescription. Our pharmacist will review it and reach out to confirm your order.</div>
                        </div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-item__btn" type="button" data-bs-toggle="collapse" data-bs-target="#faq7" aria-expanded="false">
                            Are the medications genuine and safe?
                            <span class="faq-item__chevron"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span>
                        </button>
                        <div id="faq7" class="collapse">
                            <div class="faq-item__body">Yes. We are a PCN-licensed pharmacy and only stock medications sourced from approved manufacturers and distributors. All products meet strict pharmaceutical standards for quality and safety.</div>
                        </div>
                    </div>
                    @endif

                    {{-- CTA --}}
                    <div class="faq-cta">
                        <h3>Didn't find your answer?</h3>
                        <p>Our support team is happy to help. Reach out to us directly.</p>
                        <div class="faq-cta__btns">
                            <a href="{{ route('contactUs') }}" class="faq-cta__btn">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                Send a Message
                            </a>
                            <a href="tel:{{ $settings->site_phone ?? '' }}" class="faq-cta__btn faq-cta__btn--outline">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.64 3.38 2 2 0 0 1 3.62 1.21h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.91a16 16 0 0 0 6 6l.86-.86a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.5 16.92z"/></svg>
                                Call Us
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="col-12 col-lg-4">
                    {{-- Quick links --}}
                    <div style="background:#fff;border-radius:18px;box-shadow:0 2px 16px rgba(16,49,120,.07);padding:24px 22px;margin-bottom:16px">
                        <div style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.7px;color:#103178;margin-bottom:16px">Quick Links</div>
                        <a href="{{ route('users.index') }}" style="display:flex;align-items:center;gap:10px;padding:10px 0;border-bottom:1px solid #f3f4f8;color:#333;text-decoration:none;font-size:13.5px;font-weight:500">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#103178" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                            Shop Medications
                        </a>
                        <a href="/doctor/prescription" style="display:flex;align-items:center;gap:10px;padding:10px 0;border-bottom:1px solid #f3f4f8;color:#333;text-decoration:none;font-size:13.5px;font-weight:500">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#103178" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                            Upload Prescription
                        </a>
                        <a href="{{ route('users.orders') }}" style="display:flex;align-items:center;gap:10px;padding:10px 0;border-bottom:1px solid #f3f4f8;color:#333;text-decoration:none;font-size:13.5px;font-weight:500">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#103178" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
                            Track My Order
                        </a>
                        <a href="{{ route('contactUs') }}" style="display:flex;align-items:center;gap:10px;padding:10px 0;color:#333;text-decoration:none;font-size:13.5px;font-weight:500">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#103178" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            Contact Support
                        </a>
                    </div>

                    {{-- Contact card --}}
                    <div style="background:linear-gradient(135deg,#103178,#1a449f);border-radius:18px;padding:24px 22px">
                        <div style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.7px;color:rgba(255,255,255,.7);margin-bottom:14px">Need urgent help?</div>
                        <a href="tel:{{ $settings->site_phone ?? '' }}" style="display:flex;align-items:center;gap:12px;background:rgba(255,255,255,.12);border-radius:12px;padding:14px 16px;margin-bottom:10px;text-decoration:none">
                            <div style="width:36px;height:36px;background:rgba(255,255,255,.15);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0">
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.64 3.38 2 2 0 0 1 3.62 1.21h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.91a16 16 0 0 0 6 6l.86-.86a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.5 16.92z"/></svg>
                            </div>
                            <div>
                                <div style="font-size:10.5px;color:rgba(255,255,255,.65);font-weight:600;text-transform:uppercase;letter-spacing:.4px">Call us</div>
                                <div style="font-size:14px;font-weight:700;color:#fff">{{ $settings->site_phone ?? '+234 805 888 5913' }}</div>
                            </div>
                        </a>
                        <a href="mailto:{{ $settings->site_email ?? '' }}" style="display:flex;align-items:center;gap:12px;background:rgba(255,255,255,.1);border-radius:12px;padding:14px 16px;text-decoration:none">
                            <div style="width:36px;height:36px;background:rgba(255,255,255,.15);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0">
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            </div>
                            <div>
                                <div style="font-size:10.5px;color:rgba(255,255,255,.65);font-weight:600;text-transform:uppercase;letter-spacing:.4px">Email us</div>
                                <div style="font-size:13px;font-weight:600;color:#fff">{{ $settings->site_email ?? 'support@sanlivepharmacy.com' }}</div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
