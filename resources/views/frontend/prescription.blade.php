@extends('layouts.app')

@section('styles')
<style>
.rx-page{background:#f0f2f8;min-height:80vh;padding:36px 0 56px}
/* Hero banner */
.rx-hero{background:linear-gradient(135deg,#103178 0%,#1a449f 100%);border-radius:20px;padding:36px 40px;margin-bottom:32px;display:flex;align-items:center;gap:24px}
.rx-hero__icon{width:72px;height:72px;border-radius:18px;background:rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;flex-shrink:0}
.rx-hero__text h1{font-size:22px;font-weight:800;color:#fff;margin:0 0 6px}
.rx-hero__text p{font-size:14px;color:rgba(255,255,255,.75);margin:0;line-height:1.6}
/* Card */
.rx-card{background:#fff;border-radius:20px;box-shadow:0 4px 24px rgba(16,49,120,.08);padding:36px 36px 32px}
/* Section label */
.rx-section{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;color:#103178;margin:0 0 20px;display:flex;align-items:center;gap:8px}
.rx-section::after{content:'';flex:1;height:1.5px;background:#f0f2f8}
/* Fields */
.rx-field{margin-bottom:20px}
.rx-label{font-size:12px;font-weight:600;color:#777;text-transform:uppercase;letter-spacing:.5px;margin-bottom:7px;display:block}
.rx-label span{color:#e74c3c;margin-left:2px}
.rx-input{width:100%;padding:13px 16px;border:1.5px solid #e0e4f0;border-radius:10px;font-size:14.5px;color:#222;background:#fff;transition:border-color .15s,box-shadow .15s;outline:none}
.rx-input:focus{border-color:#103178;box-shadow:0 0 0 3px rgba(16,49,120,.08)}
.rx-input.is-invalid{border-color:#e74c3c}
.rx-textarea{resize:vertical;min-height:120px}
.rx-err{font-size:11px;color:#e74c3c;margin-top:4px}
/* File upload */
.rx-upload-area{border:2px dashed #c5cef0;border-radius:12px;padding:28px 20px;text-align:center;cursor:pointer;transition:border-color .15s,background .15s;background:#fafbff;position:relative}
.rx-upload-area:hover{border-color:#103178;background:#f3f6ff}
.rx-upload-area input[type=file]{position:absolute;inset:0;opacity:0;cursor:pointer;width:100%;height:100%}
.rx-upload-area__icon{font-size:32px;color:#c5cef0;margin-bottom:8px}
.rx-upload-area__text{font-size:13.5px;font-weight:600;color:#103178;margin-bottom:4px}
.rx-upload-area__sub{font-size:12px;color:#aaa}
/* Submit btn */
.rx-submit{width:100%;padding:15px;background:#25a244;color:#fff;font-size:15px;font-weight:700;border:none;border-radius:12px;cursor:pointer;letter-spacing:.3px;transition:background .15s,box-shadow .15s;margin-top:8px}
.rx-submit:hover{background:#1e8a38;box-shadow:0 6px 20px rgba(37,162,68,.3)}
/* Info panel */
.rx-info{background:#fff;border-radius:20px;box-shadow:0 4px 24px rgba(16,49,120,.08);padding:28px 28px;height:100%}
.rx-info__title{font-size:14px;font-weight:800;color:#103178;text-transform:uppercase;letter-spacing:.6px;margin-bottom:20px;display:flex;align-items:center;gap:8px}
.rx-step{display:flex;gap:14px;margin-bottom:18px;align-items:flex-start}
.rx-step__num{width:28px;height:28px;border-radius:50%;background:linear-gradient(135deg,#103178,#1a449f);color:#fff;font-size:12px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:1px}
.rx-step__text{font-size:13.5px;color:#444;line-height:1.5}
.rx-step__text strong{color:#111;display:block;margin-bottom:2px;font-size:13px}
.rx-divider{height:1.5px;background:#f0f2f8;margin:20px 0}
.rx-contact{display:flex;align-items:center;gap:10px;background:#f3f6ff;border-radius:10px;padding:14px 16px}
.rx-contact__icon{width:36px;height:36px;border-radius:10px;background:#103178;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.rx-contact__label{font-size:10.5px;color:#aaa;font-weight:600;text-transform:uppercase;letter-spacing:.4px}
.rx-contact__val{font-size:14px;font-weight:700;color:#103178}
.rx-secure{display:flex;align-items:center;gap:8px;font-size:12px;color:#aaa;margin-top:16px;justify-content:center}
/* Alert */
.rx-alert{border-radius:12px;padding:14px 18px;font-size:13.5px;margin-bottom:24px;background:#e6faf0;color:#166534;border-left:4px solid #25a244;display:flex;align-items:center;gap:10px}
</style>
@endsection

@section('content')
<div class="rx-page">
    <div class="container">

        {{-- Breadcrumb --}}
        <nav style="margin-bottom:20px;font-size:13px;color:#aaa">
            <a href="{{ route('users.index') }}" style="color:#103178;text-decoration:none;font-weight:500">Home</a>
            <span style="margin:0 8px">›</span>
            <span style="color:#555">Upload Prescription</span>
        </nav>

        {{-- Hero --}}
        <div class="rx-hero">
            <div class="rx-hero__icon">
                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/>
                    <line x1="16" y1="13" x2="8" y2="13"/>
                    <line x1="16" y1="17" x2="8" y2="17"/>
                    <polyline points="10 9 9 9 8 9"/>
                </svg>
            </div>
            <div class="rx-hero__text">
                <h1>Upload Your Doctor's Prescription</h1>
                <p>Fill in your details and upload your prescription. Our pharmacist will review it and prepare your medications for doorstep delivery.</p>
            </div>
        </div>

        <form action="/doctor/prescription" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row" style="align-items:flex-start">

                {{-- Left: Form --}}
                <div class="col-12 col-lg-8" style="margin-bottom:24px">
                    <div class="rx-card">

                        @if(session('success'))
                        <div class="rx-alert">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#25a244" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            {{ session('success') }}
                        </div>
                        @endif

                        <p class="rx-section">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            Patient Information
                        </p>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="rx-field">
                                    <label class="rx-label">Full Name <span>*</span></label>
                                    <input class="rx-input @error('name') is-invalid @enderror" name="name" type="text"
                                           placeholder="e.g. John Doe" value="{{ old('name', auth()->user()->first_name ?? '') }} {{ old('name') ? '' : auth()->user()->last_name ?? '' }}">
                                    @error('name')<div class="rx-err">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="rx-field">
                                    <label class="rx-label">Email Address <span>*</span></label>
                                    <input class="rx-input @error('email') is-invalid @enderror" name="email" type="email"
                                           placeholder="you@example.com" value="{{ old('email', auth()->user()->email ?? '') }}">
                                    @error('email')<div class="rx-err">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="rx-field">
                                    <label class="rx-label">Phone Number <span>*</span></label>
                                    <input class="rx-input @error('phone') is-invalid @enderror" name="phone" type="text"
                                           placeholder="e.g. 08012345678" value="{{ old('phone', auth()->user()->phone ?? '') }}">
                                    @error('phone')<div class="rx-err">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="rx-field">
                                    <label class="rx-label">Street Address <span>*</span></label>
                                    <input class="rx-input @error('address') is-invalid @enderror" name="address" type="text"
                                           placeholder="House number and street name" value="{{ old('address') }}">
                                    @error('address')<div class="rx-err">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="rx-field">
                                    <label class="rx-label">Town / City <span>*</span></label>
                                    <input class="rx-input @error('city') is-invalid @enderror" name="city" type="text"
                                           placeholder="e.g. Lagos" value="{{ old('city') }}">
                                    @error('city')<div class="rx-err">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="rx-field">
                                    <label class="rx-label">State <span>*</span></label>
                                    <input class="rx-input @error('state') is-invalid @enderror" name="state" type="text"
                                           placeholder="e.g. Lagos State" value="{{ old('state') }}">
                                    @error('state')<div class="rx-err">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>

                        <p class="rx-section" style="margin-top:12px">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                            Prescription File
                        </p>

                        <div class="rx-field">
                            <div class="rx-upload-area" id="uploadBox">
                                <input name="image" type="file" accept="image/*,.pdf" id="rxFile"
                                       onchange="document.getElementById('fileName').textContent = this.files[0]?.name || 'No file chosen'">
                                <div class="rx-upload-area__icon">
                                    <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#c5cef0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                                </div>
                                <div class="rx-upload-area__text">Click to upload or drag & drop</div>
                                <div class="rx-upload-area__sub" id="fileName">Accepts JPG, PNG or PDF · Max 5MB</div>
                            </div>
                            @error('image')<div class="rx-err" style="margin-top:6px">{{ $message }}</div>@enderror
                        </div>

                        <div class="rx-field">
                            <label class="rx-label">Additional Notes</label>
                            <textarea class="rx-input rx-textarea" name="notes"
                                      placeholder="Any special instructions or notes for our pharmacist...">{{ old('notes') }}</textarea>
                        </div>

                        <button type="submit" class="rx-submit">
                            Upload Prescription →
                        </button>

                        <div class="rx-secure">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Your information is encrypted and securely stored
                        </div>
                    </div>
                </div>

                {{-- Right: Info panel --}}
                <div class="col-12 col-lg-4">
                    <div class="rx-info">
                        <div class="rx-info__title">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#103178" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><circle cx="12" cy="16" r=".5" fill="#103178"/></svg>
                            How It Works
                        </div>

                        <div class="rx-step">
                            <div class="rx-step__num">1</div>
                            <div class="rx-step__text">
                                <strong>Fill Your Details</strong>
                                Enter your patient info and delivery address
                            </div>
                        </div>
                        <div class="rx-step">
                            <div class="rx-step__num">2</div>
                            <div class="rx-step__text">
                                <strong>Upload Prescription</strong>
                                Photo or PDF accepted — clear and legible
                            </div>
                        </div>
                        <div class="rx-step">
                            <div class="rx-step__num">3</div>
                            <div class="rx-step__text">
                                <strong>Pharmacist Reviews</strong>
                                A licensed pharmacist validates your prescription
                            </div>
                        </div>
                        <div class="rx-step" style="margin-bottom:0">
                            <div class="rx-step__num">4</div>
                            <div class="rx-step__text">
                                <strong>Doorstep Delivery</strong>
                                We prepare and deliver your medications to you
                            </div>
                        </div>

                        <div class="rx-divider"></div>

                        <div class="rx-contact">
                            <div class="rx-contact__icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.64 3.38 2 2 0 0 1 3.62 1.21h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.91a16 16 0 0 0 6 6l.86-.86a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.5 16.92z"/></svg>
                            </div>
                            <div>
                                <div class="rx-contact__label">Questions? Call us</div>
                                <div class="rx-contact__val">{{ $settings->site_phone ?? '+234 805 888 5913' }}</div>
                            </div>
                        </div>

                        <div style="margin-top:16px;background:#fff7ed;border-radius:10px;padding:14px 16px">
                            <div style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.5px;color:#d97706;margin-bottom:6px">Important</div>
                            <p style="font-size:12.5px;color:#666;line-height:1.6;margin:0">
                                Prescriptions must be valid and issued by a licensed medical practitioner. We will contact you before dispensing any controlled medication.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection
