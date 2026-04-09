{{-- resources/views/frontend/partials/header.blade.php --}}
<header class="ps-header ps-header--1">
    <div class="ps-noti p-2">
        <div class="container">
            <p class="m-0" style="color:#fff; font-weight:bold; font-size: 13px;"><marquee>{{ $announcment?->content }}</marquee></p>
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
                    <li><a href="{{ route('login') }}" rel="nofollow" style="font-size:0.9em; color:#5b6c8f; white-space:nowrap;">Sign in</a></li>
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
    <div class="ps-navigation" style="background:#E6F3FF; border-top:1px solid #e4e8ee; border-bottom:1px solid #e4e8ee">
        <div class="container">
            <div style="text-align: center;">
                <nav class="ps-main-menu">
                    <ul class="menu">
                        <li><a href="{{ route('users.index') }}">Home</a></li>
                        <li><a href="{{ route('products.search') }}">Products</a></li>
                        <li><a href="/page/services">Our Services</a></li>
                        <li><a href="{{ route('AboutUs') }}">About Us</a></li>
                        <li><a href="{{ route('contactUs') }}">Contact Us</a></li>
                        <li><a href="{{ route('blogs.index') }}">Blog</a></li>
                        <li><a href="{{ route('faq.index') }}">FAQ</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
