{{-- resources/views/frontend/partials/header-mobile.blade.php --}}

<div class="mob-header d-md-none">
    @if($announcment?->content)
    <div class="mob-announce">
        <span class="mob-announce-track">{{ $announcment->content }}</span>
    </div>
    @endif

    <div class="mob-topbar">
        <a href="/" class="mob-logo">
            <img src="{{ asset('images/'.$settings->site_logo) }}" alt="{{ $settings->site_name }}" width="120" height="40" loading="lazy">
        </a>

        <div class="mob-actions">
            @guest
            <a href="#" data-auth-modal="login" class="mob-icon-btn" title="Sign in">
                <i class="icon-user"></i>
            </a>
            @else
            <a href="{{ route('users.account.index') }}" class="mob-icon-btn" rel="nofollow" title="My Account">
                <i class="icon-user"></i>
            </a>
            @endguest

            <a href="{{ route('carts.index') }}" class="mob-icon-btn" rel="nofollow" title="Cart">
                <i class="icon-cart"></i>
                @if(($cartItem ?? 0) > 0)
                <span class="mob-cart-badge">{{ $cartItem }}</span>
                @endif
            </a>

            <button class="mob-hamburger" id="open-menus" aria-label="Open menu" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>

    <div class="mob-search-wrap">
        <form action="{{ route('products.search') }}" method="get" class="mob-search-form">
            <label for="mob-search" class="visually-hidden">Search products</label>
            <input class="mob-search-input" id="mob-search" type="text" name="q"
                   value="{{ request('q') }}"
                   placeholder="Search medicines, vitamins..." autocomplete="off">
            <button type="submit" class="mob-search-btn" aria-label="Search"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
    </div>
</div>
