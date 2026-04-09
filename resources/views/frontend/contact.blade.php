@extends('layouts.app')

@section('styles')
<style>
.ct-page{background:#f0f2f8;min-height:80vh;padding:36px 0 60px}
/* Hero */
.ct-hero{background:linear-gradient(135deg,#103178 0%,#1a449f 100%);border-radius:20px;padding:40px 44px;margin-bottom:36px;position:relative;overflow:hidden}
.ct-hero::before{content:'';position:absolute;right:-40px;top:-40px;width:220px;height:220px;border-radius:50%;background:rgba(255,255,255,.05)}
.ct-hero::after{content:'';position:absolute;right:60px;bottom:-60px;width:160px;height:160px;border-radius:50%;background:rgba(255,255,255,.04)}
.ct-hero__tag{display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,.15);color:rgba(255,255,255,.9);font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;padding:5px 12px;border-radius:20px;margin-bottom:14px}
.ct-hero h1{font-size:clamp(22px,4vw,32px);font-weight:800;color:#fff;margin:0 0 10px;line-height:1.2}
.ct-hero p{font-size:14.5px;color:rgba(255,255,255,.75);margin:0;max-width:480px;line-height:1.6}
/* Info cards */
.ct-info-card{background:#fff;border-radius:16px;box-shadow:0 2px 16px rgba(16,49,120,.07);padding:24px 22px;margin-bottom:14px;display:flex;align-items:flex-start;gap:16px;transition:box-shadow .2s}
.ct-info-card:hover{box-shadow:0 6px 24px rgba(16,49,120,.12)}
.ct-info-card__icon{width:46px;height:46px;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.ct-info-card__label{font-size:10.5px;font-weight:700;text-transform:uppercase;letter-spacing:.6px;color:#aaa;margin-bottom:3px}
.ct-info-card__val{font-size:14px;font-weight:600;color:#111;line-height:1.4}
.ct-info-card__val a{color:inherit;text-decoration:none}
.ct-info-card__val a:hover{color:#103178}
/* Socials */
.ct-socials{display:flex;gap:10px;margin-top:4px}
.ct-social{width:40px;height:40px;border-radius:10px;background:#f3f6ff;display:flex;align-items:center;justify-content:center;color:#103178;text-decoration:none!important;transition:background .15s,color .15s;font-size:15px}
.ct-social:hover{background:#103178;color:#fff}
/* Form card */
.ct-form-card{background:#fff;border-radius:20px;box-shadow:0 4px 24px rgba(16,49,120,.08);padding:36px 36px 32px}
.ct-form-title{font-size:19px;font-weight:800;color:#111;margin-bottom:6px}
.ct-form-sub{font-size:13.5px;color:#888;margin-bottom:28px}
/* Fields */
.ct-field{margin-bottom:18px}
.ct-label{font-size:11.5px;font-weight:600;color:#888;text-transform:uppercase;letter-spacing:.5px;margin-bottom:6px;display:block}
.ct-input{width:100%;padding:13px 16px;border:1.5px solid #e0e4f0;border-radius:10px;font-size:14.5px;color:#222;background:#fff;transition:border-color .15s,box-shadow .15s;outline:none}
.ct-input:focus{border-color:#103178;box-shadow:0 0 0 3px rgba(16,49,120,.08)}
.ct-input.is-invalid{border-color:#e74c3c}
.ct-textarea{resize:vertical;min-height:130px}
.ct-err{font-size:11px;color:#e74c3c;margin-top:4px}
/* Submit */
.ct-submit{width:100%;padding:15px;background:#103178;color:#fff;font-size:15px;font-weight:700;border:none;border-radius:12px;cursor:pointer;letter-spacing:.3px;transition:background .15s,box-shadow .15s;margin-top:4px;display:flex;align-items:center;justify-content:center;gap:8px}
.ct-submit:hover{background:#0d2560;box-shadow:0 6px 20px rgba(16,49,120,.28)}
/* Alert */
.ct-alert{border-radius:12px;padding:14px 18px;font-size:13.5px;margin-bottom:22px;background:#e6faf0;color:#166534;border-left:4px solid #25a244;display:flex;align-items:center;gap:10px}
/* Hours card */
.ct-hours{background:#fff;border-radius:16px;box-shadow:0 2px 16px rgba(16,49,120,.07);padding:22px 22px}
.ct-hours__title{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.7px;color:#103178;margin-bottom:14px}
.ct-hours__row{display:flex;justify-content:space-between;align-items:center;padding:8px 0;border-bottom:1px solid #f3f4f8;font-size:13px}
.ct-hours__row:last-child{border-bottom:none}
.ct-hours__day{color:#555;font-weight:500}
.ct-hours__time{color:#111;font-weight:600}
.ct-hours__time--green{color:#25a244}
</style>
@endsection

@section('content')
<div class="ct-page">
    <div class="container">

        {{-- Breadcrumb --}}
        <nav style="margin-bottom:20px;font-size:13px;color:#aaa">
            <a href="{{ route('users.index') }}" style="color:#103178;text-decoration:none;font-weight:500">Home</a>
            <span style="margin:0 8px">›</span>
            <span style="color:#555">Contact Us</span>
        </nav>

        {{-- Hero --}}
        <div class="ct-hero">
            <div class="ct-hero__tag">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.64 3.38 2 2 0 0 1 3.62 1.21h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.91a16 16 0 0 0 6 6l.86-.86a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.5 16.92z"/></svg>
                Get in Touch
            </div>
            <h1>We're here to help you</h1>
            <p>Have a question about your order, a prescription, or need medical advice? Our team is ready to assist you every step of the way.</p>
        </div>

        <div class="row" style="align-items:flex-start">

            {{-- Left: Contact Info --}}
            <div class="col-12 col-lg-4" style="margin-bottom:24px">

                <div class="ct-info-card">
                    <div class="ct-info-card__icon" style="background:#eef2ff">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#103178" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.64 3.38 2 2 0 0 1 3.62 1.21h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.91a16 16 0 0 0 6 6l.86-.86a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.5 16.92z"/></svg>
                    </div>
                    <div>
                        <div class="ct-info-card__label">Phone</div>
                        <div class="ct-info-card__val">
                            <a href="tel:{{ $settings->site_phone ?? '' }}">{{ $settings->site_phone ?? '+234 805 888 5913' }}</a>
                        </div>
                    </div>
                </div>

                <div class="ct-info-card">
                    <div class="ct-info-card__icon" style="background:#f0fdf4">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#25a244" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    </div>
                    <div>
                        <div class="ct-info-card__label">Email</div>
                        <div class="ct-info-card__val">
                            <a href="mailto:{{ $settings->site_email ?? '' }}">{{ $settings->site_email ?? 'support@sanlivepharmacy.com' }}</a>
                        </div>
                    </div>
                </div>

                <div class="ct-info-card">
                    <div class="ct-info-card__icon" style="background:#fff7ed">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <div>
                        <div class="ct-info-card__label">Address</div>
                        <div class="ct-info-card__val">{{ $settings->address ?? '29, Doyin Omololu Street, Alapere, Ketu, Lagos' }}</div>
                    </div>
                </div>

                {{-- Hours --}}
                <div class="ct-hours" style="margin-top:4px;margin-bottom:16px">
                    <div class="ct-hours__title">Business Hours</div>
                    <div class="ct-hours__row">
                        <span class="ct-hours__day">Mon – Fri</span>
                        <span class="ct-hours__time ct-hours__time--green">8:00am – 8:00pm</span>
                    </div>
                    <div class="ct-hours__row">
                        <span class="ct-hours__day">Saturday</span>
                        <span class="ct-hours__time ct-hours__time--green">9:00am – 6:00pm</span>
                    </div>
                    <div class="ct-hours__row">
                        <span class="ct-hours__day">Sunday</span>
                        <span class="ct-hours__time" style="color:#e74c3c">Closed</span>
                    </div>
                </div>

                {{-- Socials --}}
                <div style="background:#fff;border-radius:16px;box-shadow:0 2px 16px rgba(16,49,120,.07);padding:20px 22px">
                    <div style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.7px;color:#103178;margin-bottom:14px">Follow Us</div>
                    <div class="ct-socials">
                        @if(!empty($settings->facebook))
                        <a href="{{ $settings->facebook }}" class="ct-social" target="_blank" rel="noopener" title="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        @endif
                        @if(!empty($settings->instagram))
                        <a href="{{ $settings->instagram }}" class="ct-social" target="_blank" rel="noopener" title="Instagram">
                            <i class="fa fa-instagram"></i>
                        </a>
                        @endif
                        @if(!empty($settings->pinterest))
                        <a href="{{ $settings->pinterest }}" class="ct-social" target="_blank" rel="noopener" title="Pinterest">
                            <i class="fa fa-pinterest-p"></i>
                        </a>
                        @endif
                        @if(!empty($settings->linkedIn))
                        <a href="{{ $settings->linkedIn }}" class="ct-social" target="_blank" rel="noopener" title="LinkedIn">
                            <i class="fa fa-linkedin"></i>
                        </a>
                        @endif
                        <a href="https://wa.me/{{ preg_replace('/\D/', '', $settings->site_phone ?? '2348058885913') }}" class="ct-social" target="_blank" rel="noopener" title="WhatsApp" style="background:#e6faf0;color:#25a244">
                            <i class="fa fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

            </div>

            {{-- Right: Form --}}
            <div class="col-12 col-lg-8">
                <div class="ct-form-card">
                    <div class="ct-form-title">Send us a message</div>
                    <div class="ct-form-sub">We typically respond within 1–2 business hours.</div>

                    @if(session('success'))
                    <div class="ct-alert">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#25a244" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="/contact/us/submit" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="ct-field">
                                    <label class="ct-label">Full Name <span style="color:#e74c3c">*</span></label>
                                    <input class="ct-input @error('name') is-invalid @enderror" name="name" type="text"
                                           placeholder="John Doe" required value="{{ old('name') }}">
                                    @error('name')<div class="ct-err">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="ct-field">
                                    <label class="ct-label">Email Address <span style="color:#e74c3c">*</span></label>
                                    <input class="ct-input @error('email') is-invalid @enderror" name="email" type="email"
                                           placeholder="you@example.com" required value="{{ old('email') }}">
                                    @error('email')<div class="ct-err">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="ct-field">
                                    <label class="ct-label">Phone Number</label>
                                    <input class="ct-input" name="phone" type="text"
                                           placeholder="08012345678" value="{{ old('phone') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="ct-field">
                                    <label class="ct-label">Subject</label>
                                    <input class="ct-input" name="subject" type="text"
                                           placeholder="e.g. Order enquiry, Prescription question…" value="{{ old('subject') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="ct-field">
                                    <label class="ct-label">Message <span style="color:#e74c3c">*</span></label>
                                    <textarea class="ct-input ct-textarea" name="message"
                                              placeholder="Tell us how we can help you…" required>{{ old('message') }}</textarea>
                                    @error('message')<div class="ct-err">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="ct-submit">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                            Send Message
                        </button>
                        <p style="text-align:center;font-size:12px;color:#aaa;margin-top:14px">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#aaa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:middle;margin-right:3px"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Your information is kept private and never shared
                        </p>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
