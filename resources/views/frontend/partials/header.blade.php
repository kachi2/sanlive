{{-- resources/views/frontend/partials/header.blade.php --}}
<header class="ps-header ps-header--1">
    <div class="ps-noti p-2">
        <div class="container">
            <h1 class="m-0" style="color:#fff; font-weight:bold; font-size: 13px;"><marquee>{{ $announcment?->content }}</marquee></h1>
        </div>
    </div>
    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-logo">
                <a href="/">
                    <img src="{{ asset('images/'.$settings->site_logo) }}" style="width: 160px" alt="sanlive pharmacy">
                    <img class="sticky-logo" src="" alt="">
                </a>
            </div>
            <div class="ps-header__right">
                <ul class="ps-header__icons">
                    <li><a class="ps-header__item open-search" href=""><i class="icon-magnifier"></i></a></li>
                    @guest
                    <li><a class="" href="{{ route('login') }}" rel="nofollow">Sign in</a></li>
                    @else
                    <li>
                        <a class="ps-header__item" style="width:120px; font-size:0.85em; color:#5b6c8f" href="{{ route('users.account.index') }}">
                            <i class="icon-user" style="font-size:1.4em; padding-right:2px; font-weight:800;"></i>Hi, {{ strtoupper(Auth::user()->first_name ?? '') }}
                        </a>
                    </li>
                    @endguest
                    <li><a class="ps-header__item" target="_blank" href="https://wa.me/+2348058885913?text='Good day, please i want to make enquiries'" id="cart-mini"><i class="icon-phone-bubble"></i></a></li>
                    <li><a class="ps-header__item" href="{{ route('carts.index') }}" id="cart-mini"><i class="icon-cart-empty"></i> <span class="badge cartReload">{{ $cartItem ?? 0 }}</span></a></li>
                </ul>
                <div class="ps-header__search">
                    <form action="{{ route('products.search') }}" method="get">
                        <div class="ps-search-table">
                            <div class="input-group">
                                <input class="form-control ps-input" type="text" name="q" value="{{ request('q') }}" placeholder="Search for anti-malaria, antibiotics, asthma, cough and cold,  eyes drops, fitness and vitality etc..">
                                <div class="input-group-append"><button type="submit" style="border:none; background:none"><i class="fa fa-search"></i></button></div>
                            </div>
                        </div>
                    </form>
                </div>
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
