@extends('layouts.app')

@section('styles')
<style>
.blog-page{background:#f0f2f8;padding-bottom:64px}
/* Hero */
.blog-hero{background:linear-gradient(135deg,#103178 0%,#1a449f 100%);padding:56px 0 52px;position:relative;overflow:hidden}
.blog-hero::before{content:'';position:absolute;right:-80px;top:-80px;width:300px;height:300px;border-radius:50%;background:rgba(255,255,255,.045)}
.blog-hero::after{content:'';position:absolute;left:-60px;bottom:-60px;width:200px;height:200px;border-radius:50%;background:rgba(255,255,255,.03)}
.blog-hero__tag{display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,.15);color:rgba(255,255,255,.9);font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;padding:5px 14px;border-radius:20px;margin-bottom:16px}
.blog-hero h1{font-size:clamp(22px,4vw,34px);font-weight:800;color:#fff;margin:0 0 12px;line-height:1.2}
.blog-hero p{font-size:14.5px;color:rgba(255,255,255,.75);margin:0;max-width:480px;line-height:1.6}
.blog-breadcrumb{font-size:13px;color:rgba(255,255,255,.6);margin-bottom:18px}
.blog-breadcrumb a{color:rgba(255,255,255,.8);text-decoration:none;font-weight:500}
.blog-breadcrumb a:hover{color:#fff}
/* Body */
.blog-body{padding:48px 0}
/* Card */
.blog-card{background:#fff;border-radius:18px;box-shadow:0 2px 16px rgba(16,49,120,.07);overflow:hidden;height:100%;display:flex;flex-direction:column;transition:box-shadow .2s,transform .2s}
.blog-card:hover{box-shadow:0 8px 32px rgba(16,49,120,.14);transform:translateY(-3px)}
.blog-card__img{position:relative;height:200px;overflow:hidden;background:#e8ecf8}
.blog-card__img img{width:100%;height:100%;object-fit:cover;display:block;transition:transform .4s}
.blog-card:hover .blog-card__img img{transform:scale(1.04)}
.blog-card__img-placeholder{width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#eef2ff,#dce4ff)}
.blog-card__body{padding:22px 22px 18px;display:flex;flex-direction:column;flex:1}
.blog-card__meta{display:flex;align-items:center;gap:14px;margin-bottom:10px}
.blog-card__date{font-size:11.5px;color:#aaa;font-weight:500;display:flex;align-items:center;gap:5px}
.blog-card__views{font-size:11.5px;color:#aaa;font-weight:500;display:flex;align-items:center;gap:5px}
.blog-card__title{font-size:16px;font-weight:700;color:#111;margin:0 0 10px;line-height:1.45;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.blog-card__title a{color:inherit;text-decoration:none}
.blog-card__title a:hover{color:#103178}
.blog-card__excerpt{font-size:13.5px;color:#666;line-height:1.65;flex:1;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;margin-bottom:18px}
.blog-card__footer{border-top:1.5px solid #f0f2f8;padding-top:14px;display:flex;align-items:center;justify-content:space-between}
.blog-card__read{font-size:13px;font-weight:700;color:#103178;text-decoration:none;display:flex;align-items:center;gap:5px;transition:gap .15s}
.blog-card__read:hover{color:#0d2560;gap:9px}
/* Empty state */
.blog-empty{text-align:center;padding:80px 20px;background:#fff;border-radius:18px;box-shadow:0 2px 16px rgba(16,49,120,.07)}
.blog-empty__icon{font-size:52px;color:#d0d5e8;margin-bottom:16px}
.blog-empty p{font-size:15px;color:#999}
/* Pagination */
.blog-pagination{display:flex;justify-content:center;align-items:center;gap:12px;margin-top:40px}
.blog-pagination__btn{display:inline-flex;align-items:center;gap:6px;padding:10px 22px;border-radius:10px;font-size:13.5px;font-weight:700;text-decoration:none;border:1.5px solid #e0e4f0;background:#fff;color:#103178;transition:all .15s;box-shadow:0 1px 8px rgba(16,49,120,.06)}
.blog-pagination__btn:hover{background:#103178;border-color:#103178;color:#fff;box-shadow:0 4px 14px rgba(16,49,120,.18)}
.blog-pagination__btn--disabled{opacity:.4;pointer-events:none}
.blog-pagination__info{font-size:13px;color:#888;font-weight:500}
</style>
@endsection

@section('content')
<div class="blog-page">

    {{-- Hero --}}
    <div class="blog-hero">
        <div class="container">
            <div class="blog-breadcrumb">
                <a href="{{ route('users.index') }}">Home</a>
                <span style="margin:0 8px;opacity:.5">›</span>
                Blog
            </div>
            <div class="blog-hero__tag">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                Health Blog
            </div>
            <h1>Tips, Articles &amp; Wellness Advice</h1>
            <p>Stay informed with expert health insights, medicine guides and wellness tips from the Sanlive Pharmacy team.</p>
        </div>
    </div>

    <div class="blog-body">
        <div class="container">

            <div class="row g-4">
                @forelse($blogs as $blog)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="blog-card">
                        <a href="{{ route('blogs.details', $blog->slug) }}" class="blog-card__img">
                            @if($blog->image)
                            <img src="{{ asset('images/blog/'.$blog->image) }}" alt="{{ $blog->title }}" loading="lazy">
                            @else
                            <div class="blog-card__img-placeholder">
                                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#a0aedc" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                            </div>
                            @endif
                        </a>
                        <div class="blog-card__body">
                            <div class="blog-card__meta">
                                <span class="blog-card__date">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                    {{ \Carbon\Carbon::parse($blog->created_at)->format('M d, Y') }}
                                </span>
                                @if($blog->views)
                                <span class="blog-card__views">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    {{ number_format($blog->views) }}
                                </span>
                                @endif
                            </div>
                            <div class="blog-card__title">
                                <a href="{{ route('blogs.details', $blog->slug) }}">{{ $blog->title }}</a>
                            </div>
                            <p class="blog-card__excerpt">{{ Str::limit(strip_tags($blog->content), 130) }}</p>
                            <div class="blog-card__footer">
                                <a href="{{ route('blogs.details', $blog->slug) }}" class="blog-card__read">
                                    Read article
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="blog-empty">
                        <div class="blog-empty__icon">
                            <svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="#d0d5e8" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                        </div>
                        <p>No blog posts published yet. Check back soon!</p>
                    </div>
                </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            @if($blogs->hasPages())
            <div class="blog-pagination">
                @if($blogs->onFirstPage())
                <span class="blog-pagination__btn blog-pagination__btn--disabled">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                    Previous
                </span>
                @else
                <a href="{{ $blogs->previousPageUrl() }}" class="blog-pagination__btn">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                    Previous
                </a>
                @endif

                <span class="blog-pagination__info">Page {{ $blogs->currentPage() }} of {{ $blogs->lastPage() }}</span>

                @if($blogs->hasMorePages())
                <a href="{{ $blogs->nextPageUrl() }}" class="blog-pagination__btn">
                    Next
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
                @else
                <span class="blog-pagination__btn blog-pagination__btn--disabled">
                    Next
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </span>
                @endif
            </div>
            @endif

        </div>
    </div>

</div>
@endsection
