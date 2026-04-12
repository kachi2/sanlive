{{-- resources/views/frontend/partials/header.blade.php --}}
<header class="ps-header ps-header--1">
    <div class="ps-noti p-2">
        <div class="container">
            <div class="marquee">
  <div class="track">
    <span style="color:#fff; font-weight:bold">{{ $announcment?->content }} </span>
  </div>
</div>
            {{-- <p class="m-0" style="color:#fff; font-weight:bold; font-size: 13px;"><marquee>{{ $announcment?->content }}</marquee></p> --}}
        </div>
    </div>
    <div class="ps-header__middle">
        <div class="container" style="display:flex; align-items:center; gap:16px;">
            <div class="ps-logo" style="flex:0 0 180px;">
                <a href="/">
                    <img src="{{ asset('images/'.$settings->site_logo) }}" style="width: 160px" alt="sanlive pharmacy">
                    <img class="sticky-logo" src="" alt="">
                </a>
            </div>
            <div class="ps-header__search" style="flex:1; max-width:560px;">
                <form action="{{ route('products.search') }}" method="get">
                    <div class="ps-search-table">
                        <div class="input-group">
                            <input class="form-control ps-input" type="text" name="q" value="{{ request('q') }}" placeholder="Search medicines, vitamins, antibiotics...">
                            <div class="input-group-append"><button type="submit" style="border:none; background:none; padding:0 12px;"><i class="fa fa-search"></i></button></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="ps-header__right" style="flex:0 0 auto; margin-left:auto;">
                <ul class="ps-header__icons" style="display:flex; align-items:center; gap:4px; list-style:none; margin:0; padding:0; flex-wrap:nowrap;">
                    @guest
                    <li><a href="#" data-auth-modal="login" rel="nofollow" style="font-size:0.9em; color:#5b6c8f; white-space:nowrap;">Sign in</a></li>
                    @else
                    <li class="dropdown" style="position:relative; list-style:none;">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"
                           style="display:flex; align-items:center; gap:4px; font-size:0.85em; color:#5b6c8f; text-decoration:none; white-space:nowrap; padding:6px 8px;">
                            <i class="icon-user" style="font-size:1.3em;"></i>
                            <span>Hi, {{ ucfirst(strtolower(Auth::user()->first_name ?? '')) }}</span>
                            <i class="fa fa-chevron-down" style="font-size:0.65em; margin-left:2px;"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" style="min-width:210px; border-radius:8px; border:1px solid #e4e8ee; box-shadow:0 6px 20px rgba(0,0,0,0.12); padding:6px 0; margin-top:4px;">
                            <a class="dropdown-item" href="{{ route('users.account.index') }}" style="display:flex; align-items:center; gap:12px; padding:11px 18px; font-size:1.2em; color:#333;">
                                <i class="icon-user" style="width:28px; text-align:center; color:#888;"></i> My Account
                            </a>
                            <a class="dropdown-item" href="{{ route('users.orders') }}" style="display:flex; align-items:center; gap:12px; padding:11px 18px; font-size:1.2em; color:#333;">
                                <i class="icon-cart" style="width:28px; text-align:center; color:#888;"></i> Orders
                            </a>
                            <a class="dropdown-item" href="{{ route('users.account.address') }}" style="display:flex; align-items:center; gap:12px; padding:11px 18px; font-size:1.2em; color:#333;">
                                <i class="icon-book" style="width:28px; text-align:center; color:#888;"></i> Address Book
                            </a>
                            <a class="dropdown-item" href="{{ route('users.order.payments') }}" style="display:flex; align-items:center; gap:12px; padding:11px 18px; font-size:1.2em; color:#333;">
                                <i class="icon-wallet" style="width:28px; text-align:center; color:#888;"></i> Payments
                            </a>
                            <a class="dropdown-item" href="{{ route('users.account.settings') }}" style="display:flex; align-items:center; gap:12px; padding:11px 18px; font-size:1.2em; color:#333;">
                                <i class="icon-cog" style="width:28px; text-align:center; color:#888;"></i> Settings
                            </a>
                            <div style="border-top:1px solid #f0f2f5; margin:5px 0;"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item" style="display:flex; align-items:center; gap:12px; padding:11px 18px; font-size:1.2em; color:#e74c3c; background:none; border:none; width:100%; text-align:left; cursor:pointer;">
                                    <i class="icon-eraser" style="width:28px; text-align:center;"></i> Logout
                                </button>
                            </form>
                        </div>
                    </li>
                    @endguest
                    <li><a class="ps-header__item" target="_blank" href="https://wa.me/+2348058885913?text='Good day, please i want to make enquiries'" id="cart-mini"><i class="icon-phone-bubble"></i></a></li>
                    <li><a class="ps-header__item" href="{{ route('carts.index') }}" id="cart-mini"><i class="icon-cart-empty"></i> <span class="badge cartReload">{{ $cartItem ?? 0 }}</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <nav class="sanlive-nav d-none d-md-block">
        <div class="container sanlive-nav__inner">
            <ul class="sanlive-nav__menu">
                <li>
                    <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.index') ? 'active' : '' }}">Home</a>
                </li>
                <li class="has-dropdown">
                    <a href="{{ route('products.search') }}" class="{{ request()->routeIs('products.search') ? 'active' : '' }}">
                        Products <i class="fa fa-chevron-down" style="font-size:10px; margin-left:3px;"></i>
                    </a>
                    <div class="sanlive-nav__dropdown">
                        <ul>
                            @foreach($categories as $cat)
                            <li><a href="{{ route('products.search', $cat->slug) }}">{{ $cat->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="/page/services" class="{{ request()->is('page/services') ? 'active' : '' }}">Our Services</a>
                </li>
                <li>
                    <a href="{{ route('AboutUs') }}" class="{{ request()->routeIs('AboutUs') ? 'active' : '' }}">About Us</a>
                </li>
                <li>
                    <a href="{{ route('contactUs') }}" class="{{ request()->routeIs('contactUs') ? 'active' : '' }}">Contact</a>
                </li>
                <li>
                    <a href="{{ route('blogs.index') }}" class="{{ request()->routeIs('blogs.*') ? 'active' : '' }}">Blog</a>
                </li>
                <li>
                    <a href="{{ route('faq.index') }}" class="{{ request()->routeIs('faq.index') ? 'active' : '' }}">FAQ</a>
                </li>
            </ul>
            <a href="{{ route('user.prescription') }}" class="sanlive-nav__cta">
                <i class="fa fa-upload" style="font-size:11px;"></i> Upload Prescription
            </a>
        </div>
    </nav>
</header>




<style>
.marquee {
  overflow: hidden;
  white-space: nowrap;
}

.track {
  display: inline-block;
  animation: scroll 10s linear infinite;
}

.track span {
  padding-right: 50px;
}

@keyframes scroll {
  from { transform: translateX(0); }
  to   { transform: translateX(-50%); }
}
.marquee:hover .track {
  animation-play-state: paused;
}
</style>
<style>
.sanlive-nav {
    background: #103178;
    position: relative;
    z-index: 100;
}
.sanlive-nav__inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.sanlive-nav__menu {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 2px;
}
.sanlive-nav__menu > li {
    position: relative;
}
.sanlive-nav__menu > li > a {
    display: block;
    padding: 13px 15px;
    font-size: 13.5px;
    font-weight: 600;
    color: rgba(255,255,255,0.85) !important;
    text-decoration: none !important;
    letter-spacing: 0.2px;
    position: relative;
    transition: color 0.15s;
    white-space: nowrap;
}
.sanlive-nav__menu > li > a::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 15px;
    right: 15px;
    height: 3px;
    background: #25d366;
    border-radius: 3px 3px 0 0;
    transform: scaleX(0);
    transition: transform 0.2s ease;
}
.sanlive-nav__menu > li > a:hover {
    color: #fff !important;
}
.sanlive-nav__menu > li > a:hover::after,
.sanlive-nav__menu > li > a.active::after {
    transform: scaleX(1);
}
.sanlive-nav__menu > li > a.active {
    color: #fff !important;
}
/* Dropdown */
.sanlive-nav__menu > li.has-dropdown:hover .sanlive-nav__dropdown {
    display: block;
}
.sanlive-nav__dropdown {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: #fff;
    border-radius: 0 8px 8px 8px;
    box-shadow: 0 8px 28px rgba(0,0,0,0.13);
    z-index: 999;
    min-width: 480px;
    padding: 10px 0;
}
.sanlive-nav__dropdown ul {
    list-style: none;
    margin: 0;
    padding: 6px 8px;
    columns: 2;
    column-gap: 0;
}
.sanlive-nav__dropdown ul li a {
    display: block;
    padding: 8px 14px;
    font-size: 13px;
    color: #333 !important;
    text-decoration: none !important;
    border-radius: 6px;
    white-space: nowrap;
    transition: background 0.12s, color 0.12s;
    break-inside: avoid;
}
.sanlive-nav__dropdown ul li a:hover {
    background: #f0f4ff;
    color: #103178 !important;
}
/* Prescription CTA */
.sanlive-nav__cta {
    display: flex;
    align-items: center;
    gap: 7px;
    padding: 7px 16px;
    background: #25d366;
    color: #fff !important;
    font-size: 12.5px;
    font-weight: 700;
    border-radius: 20px;
    text-decoration: none !important;
    white-space: nowrap;
    transition: background 0.15s, transform 0.15s;
    flex-shrink: 0;
}
.sanlive-nav__cta:hover {
    background: #1ebe5d;
    color: #fff !important;
    transform: translateY(-1px);
}
</style>
