@extends('layouts.app')

@if(isset($schema))
@section('schema')
{!! $schema !!}
@endsection
@endif

@section('styles')
<style>
.blogd-page{background:#f0f2f8;padding-bottom:64px}
/* Hero image */
.blogd-hero{position:relative;height:420px;background:#1a449f;overflow:hidden}
.blogd-hero__img{width:100%;height:100%;object-fit:cover;display:block;opacity:.55}
.blogd-hero__overlay{position:absolute;inset:0;background:linear-gradient(to bottom,rgba(16,49,120,.2) 0%,rgba(16,49,120,.82) 100%)}
.blogd-hero__content{position:absolute;bottom:0;left:0;right:0;padding:36px 0}
.blogd-breadcrumb{font-size:12.5px;color:rgba(255,255,255,.65);margin-bottom:14px}
.blogd-breadcrumb a{color:rgba(255,255,255,.8);text-decoration:none;font-weight:500}
.blogd-breadcrumb a:hover{color:#fff}
.blogd-hero__title{font-size:clamp(20px,4vw,32px);font-weight:800;color:#fff;margin:0 0 14px;line-height:1.3;max-width:720px}
.blogd-hero__meta{display:flex;align-items:center;gap:20px;flex-wrap:wrap}
.blogd-hero__meta-item{display:flex;align-items:center;gap:6px;font-size:12.5px;color:rgba(255,255,255,.75)}
/* No image variant */
.blogd-hero--plain{height:auto;background:linear-gradient(135deg,#103178,#1a449f);padding:52px 0 44px}
.blogd-hero--plain .blogd-hero__title{color:#fff}
.blogd-hero--plain .blogd-breadcrumb a{color:rgba(255,255,255,.8)}
/* Body layout */
.blogd-body{padding:48px 0}
/* Article card */
.blogd-article{background:#fff;border-radius:20px;box-shadow:0 4px 24px rgba(16,49,120,.08);padding:40px 44px;margin-bottom:24px}
.blogd-article__content{font-size:15px;color:#3a3a3a;line-height:1.9}
.blogd-article__content h1,.blogd-article__content h2,.blogd-article__content h3,.blogd-article__content h4{color:#103178;font-weight:700;margin:28px 0 10px;line-height:1.3}
.blogd-article__content h2{font-size:20px}
.blogd-article__content h3{font-size:17px}
.blogd-article__content p{margin-bottom:16px}
.blogd-article__content ul,.blogd-article__content ol{padding-left:22px;margin-bottom:16px}
.blogd-article__content li{margin-bottom:6px}
.blogd-article__content img{max-width:100%;border-radius:12px;margin:12px 0}
.blogd-article__content blockquote{border-left:4px solid #103178;background:#f3f6ff;padding:16px 20px;border-radius:0 10px 10px 0;margin:20px 0;font-style:italic;color:#555}
.blogd-article__content a{color:#103178;text-decoration:underline}
.blogd-article__content hr{border:none;border-top:1.5px solid #f0f2f8;margin:28px 0}
/* Sidebar */
.blogd-sidebar{position:sticky;top:24px}
.blogd-widget{background:#fff;border-radius:18px;box-shadow:0 2px 16px rgba(16,49,120,.07);padding:24px 22px;margin-bottom:16px}
.blogd-widget__title{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.7px;color:#103178;margin-bottom:18px;padding-bottom:12px;border-bottom:1.5px solid #f0f2f8}
/* Recent post item */
.blogd-recent{display:flex;gap:12px;padding:10px 0;border-bottom:1px solid #f3f4f8;text-decoration:none;align-items:flex-start;transition:opacity .15s}
.blogd-recent:last-child{border-bottom:none;padding-bottom:0}
.blogd-recent:hover{opacity:.8}
.blogd-recent__thumb{width:56px;height:56px;border-radius:10px;overflow:hidden;flex-shrink:0;background:#eef2ff}
.blogd-recent__thumb img{width:100%;height:100%;object-fit:cover;display:block}
.blogd-recent__thumb-placeholder{width:100%;height:100%;display:flex;align-items:center;justify-content:center}
.blogd-recent__text{flex:1;min-width:0}
.blogd-recent__title{font-size:13px;font-weight:600;color:#111;line-height:1.4;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;margin-bottom:3px}
.blogd-recent__date{font-size:11px;color:#aaa;font-weight:500}
/* Back btn */
.blogd-back{display:inline-flex;align-items:center;gap:6px;font-size:13px;font-weight:600;color:#103178;text-decoration:none;padding:9px 18px;background:#eef2ff;border-radius:10px;transition:background .15s;margin-bottom:24px}
.blogd-back:hover{background:#dbe3ff;color:#103178}
@media(max-width:767px){
    .blogd-article{padding:24px 20px}
    .blogd-hero{height:300px}
}
</style>
@endsection

@section('content')
<div class="blogd-page">

    {{-- Hero --}}
    @if($blog->image)
    <div class="blogd-hero">
        <img class="blogd-hero__img" src="{{ asset('images/blog/'.$blog->image) }}" alt="{{ $blog->title }}">
        <div class="blogd-hero__overlay"></div>
        <div class="blogd-hero__content">
            <div class="container">
                <div class="blogd-breadcrumb">
                    <a href="{{ route('users.index') }}">Home</a>
                    <span style="margin:0 8px;opacity:.5">›</span>
                    <a href="{{ route('blogs.index') }}">Blog</a>
                    <span style="margin:0 8px;opacity:.5">›</span>
                    <span style="color:rgba(255,255,255,.8)">{{ Str::limit($blog->title, 40) }}</span>
                </div>
                <h1 class="blogd-hero__title">{{ $blog->title }}</h1>
                <div class="blogd-hero__meta">
                    <span class="blogd-hero__meta-item">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        {{ \Carbon\Carbon::parse($blog->created_at)->format('F d, Y') }}
                    </span>
                    @if($blog->views)
                    <span class="blogd-hero__meta-item">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        {{ number_format($blog->views) }} views
                    </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="blogd-hero blogd-hero--plain">
        <div class="container">
            <div class="blogd-breadcrumb">
                <a href="{{ route('users.index') }}">Home</a>
                <span style="margin:0 8px;opacity:.5">›</span>
                <a href="{{ route('blogs.index') }}">Blog</a>
                <span style="margin:0 8px;opacity:.5">›</span>
                <span style="color:rgba(255,255,255,.8)">{{ Str::limit($blog->title, 40) }}</span>
            </div>
            <h1 class="blogd-hero__title">{{ $blog->title }}</h1>
            <div class="blogd-hero__meta">
                <span class="blogd-hero__meta-item" style="color:rgba(255,255,255,.75)">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    {{ \Carbon\Carbon::parse($blog->created_at)->format('F d, Y') }}
                </span>
                @if($blog->views)
                <span class="blogd-hero__meta-item" style="color:rgba(255,255,255,.75)">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    {{ number_format($blog->views) }} views
                </span>
                @endif
            </div>
        </div>
    </div>
    @endif

    <div class="blogd-body">
        <div class="container">
            <div class="row" style="align-items:flex-start">

                {{-- Main article --}}
                <div class="col-12 col-lg-8" style="margin-bottom:24px">
                    <a href="{{ route('blogs.index') }}" class="blogd-back">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                        Back to Blog
                    </a>
                    <div class="blogd-article">
                        <div class="blogd-article__content">
                            {!! $blog->content !!}
                        </div>
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="col-12 col-lg-4">
                    <div class="blogd-sidebar">
                        <div class="blogd-widget">
                            <div class="blogd-widget__title">Recent Articles</div>
                            @forelse($blogs as $item)
                            <a href="{{ route('blogs.details', $item->slug) }}" class="blogd-recent">
                                <div class="blogd-recent__thumb">
                                    @if($item->image)
                                    <img src="{{ asset('images/blog/'.$item->image) }}" alt="{{ $item->title }}" loading="lazy">
                                    @else
                                    <div class="blogd-recent__thumb-placeholder">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#a0aedc" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                                    </div>
                                    @endif
                                </div>
                                <div class="blogd-recent__text">
                                    <div class="blogd-recent__title">{{ $item->title }}</div>
                                    <div class="blogd-recent__date">{{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</div>
                                </div>
                            </a>
                            @empty
                            <p style="font-size:13px;color:#aaa;text-align:center;padding:16px 0">No recent posts.</p>
                            @endforelse
                        </div>

                        {{-- CTA widget --}}
                        <div style="background:linear-gradient(135deg,#103178,#1a449f);border-radius:18px;padding:24px 22px">
                            <div style="font-size:13px;font-weight:800;color:#fff;margin-bottom:8px">Need medications?</div>
                            <p style="font-size:13px;color:rgba(255,255,255,.75);margin-bottom:18px;line-height:1.5">Browse our catalogue and get fast doorstep delivery across Nigeria.</p>
                            <a href="{{ route('shops.index') }}" style="display:inline-flex;align-items:center;gap:7px;background:#25a244;color:#fff;font-size:13px;font-weight:700;padding:11px 22px;border-radius:10px;text-decoration:none;transition:background .15s">
                                Shop Now
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
