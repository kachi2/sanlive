{{-- resources/views/frontend/partials/header-mobile.blade.php --}}
<style>
.mob-header {
    display: none;
    background: #fff;
    border-bottom: 1px solid #eef1f8;
    position: sticky; top: 0; z-index: 9000;
    box-shadow: 0 2px 12px rgba(16,49,120,.08);
}
@media(max-width:991px){ .mob-header { display: block; } }

/* Announcement bar */
.mob-announce {
    background: #103178; color: #fff;
    font-size: .78rem; font-weight: 500;
    padding: 6px 16px; text-align: center;
    overflow: hidden; white-space: nowrap;
}
.mob-announce marquee { display: inline-block; }

/* Top bar */
.mob-topbar {
    display: flex; align-items: center; justify-content: space-between;
    padding: 10px 16px; gap: 12px;
}
.mob-logo img { height: 38px; object-fit: contain; }

.mob-actions { display: flex; align-items: center; gap: 6px; }

.mob-icon-btn {
    display: flex; align-items: center; justify-content: center;
    width: 40px; height: 40px; border-radius: 10px;
    border: none; background: #f4f6fb; color: #103178;
    font-size: 1.2rem; cursor: pointer; position: relative;
    text-decoration: none;
}
.mob-icon-btn:hover { background: #e8edf8; color: #103178; }

.mob-cart-badge {
    position: absolute; top: -4px; right: -4px;
    background: #25d366; color: #fff;
    font-size: .6rem; font-weight: 700;
    width: 17px; height: 17px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    border: 2px solid #fff;
}

.mob-hamburger {
    display: flex; flex-direction: column; justify-content: center;
    gap: 5px; width: 40px; height: 40px; padding: 10px;
    border-radius: 10px; border: none; background: #f4f6fb; cursor: pointer;
}
.mob-hamburger span {
    display: block; height: 2px; border-radius: 2px;
    background: #103178; transition: all .25s ease;
    transform-origin: center;
}
.mob-hamburger.is-open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
.mob-hamburger.is-open span:nth-child(2) { opacity: 0; transform: scaleX(0); }
.mob-hamburger.is-open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

/* Search bar */
.mob-search-wrap { padding: 0 16px 12px; }
.mob-search-form {
    display: flex; align-items: center;
    background: #f4f6fb; border-radius: 10px;
    border: 1.5px solid #eef1f8; overflow: hidden;
    transition: border-color .2s;
}
.mob-search-form:focus-within { border-color: #103178; background: #fff; }
.mob-search-input {
    flex: 1; border: none; background: transparent;
    padding: 10px 14px; font-size: .9rem; color: #1a2a4a; outline: none;
}
.mob-search-input::placeholder { color: #b0bdd0; }
.mob-search-btn {
    padding: 10px 14px; border: none; background: transparent;
    color: #103178; font-size: 1rem; cursor: pointer;
}
</style>

<div class="mob-header d-md-none">
    @if($announcment?->content)
    <div class="mob-announce">
        <marquee behavior="scroll" direction="left">{{ $announcment->content }}</marquee>
    </div>
    @endif

    <div class="mob-topbar">
        <a href="/" class="mob-logo">
            <img src="{{ asset('images/'.$settings->site_logo) }}" alt="{{ $settings->site_name }}">
        </a>

        <div class="mob-actions">
            @guest
            <a href="#" id="open-auth-modal" class="mob-icon-btn" title="Sign in">
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
            <input class="mob-search-input" type="text" name="q"
                   value="{{ request('q') }}"
                   placeholder="Search medicines, vitamins..." autocomplete="off">
            <button type="submit" class="mob-search-btn"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>
