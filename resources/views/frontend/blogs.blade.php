@extends('layouts.app')


@section('content')
<div class="ps-blog">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="{{ route('users.index') }}">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">Blog</li>
        </ul>
        <h1 style="font-size:24px; font-weight:700; margin-bottom:25px">Health Blog &amp; Wellness Articles</h1>

        <div class="row">
            @forelse($blogs as $blog)
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="ps-post" style="border-radius:10px; overflow:hidden; box-shadow:0 2px 10px rgba(0,0,0,0.07); height:100%">
                    @if($blog->image)
                    <div class="ps-post__thumbnail">
                        <a href="{{ route('blogs.details', ['id' => $blog->hashid]) }}">
                            <img src="{{ asset('images/blogs/'.$blog->image) }}"
                                 alt="{{ $blog->title }}"
                                 style="width:100%; height:200px; object-fit:cover">
                        </a>
                    </div>
                    @endif
                    <div class="ps-post__content" style="padding:18px">
                        <a href="{{ route('blogs.details', ['id' => $blog->hashid]) }}">
                            <h2 style="font-size:16px; font-weight:600; color:#103178; margin-bottom:8px; line-height:1.4">
                                {{ $blog->title }}
                            </h2>
                        </a>
                        <p style="font-size:13px; color:#888; margin-bottom:10px">
                            <i class="fa fa-calendar mr-1"></i>
                            {{ \Carbon\Carbon::parse($blog->created_at)->format('M d, Y') }}
                        </p>
                        <p style="font-size:14px; color:#555; line-height:1.6">
                            {{ Str::limit(strip_tags($blog->content), 120) }}
                        </p>
                        <a href="{{ route('blogs.details', ['id' => $blog->hashid]) }}"
                           style="font-size:13px; color:#007bff; font-weight:600">Read more →</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p style="text-align:center; color:#888; padding:60px">No blog posts yet.</p>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div style="display:flex; justify-content:center; margin-top:30px; margin-bottom:40px">
            {{ $blogs->links() }}
        </div>
    </div>
</div>
@endsection
