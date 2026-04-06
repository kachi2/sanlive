{{-- resources/views/frontend/partials/header-mobile.blade.php --}}
<header class="ps-header ps-header--8 ps-header--mobile">
    <div class="ps-noti">
        <div class="container">
            <p class="m-0" style="color:#fff;font-weight:bold;"><marquee>{{ $announcment?->content }}</marquee></p>
        </div>
    </div>
    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-logo">
                <a href="/"><img src="{{ asset('images/'.$settings->site_logo) }}" style="width:160px" alt="{{ $settings->site_name }}"></a>
            </div>
            <div class="ps-header__right">
                <ul class="ps-header__icons">
                    <a style="color:green; width:49px" href="{{ route('carts.index') }}"><i class="icon-cart"></i><span class="badge bg-info" style="color:#fff">{{ $cartItem ?? 0 }}</span></a> &nbsp; &nbsp;
                    <div class="ps-nav__item" style="display: inline;">
                        <button id="open-menus" class="btn-menu"><i class="icon-menu" style="font-size:30px"></i></button>
                        <button id="close-menus" class="btn-menu" style="display:none"><i class="icon-cross" style="font-size:30px"></i></button>
                    </div>
                </ul>
            </div>
        </div>
    </div>
    <div class="ps-search__content ps-search--mobile" style="padding:15px">
        <form action="{{ route('products.search') }}" method="get">
            <div class="ps-search-table" style="border-radius:5px">
                <div class="input-group">
                    <input class="form-control ps-input" style="border-radius:5px" name="q"
                           value="{{ request('q') }}"
                           type="text" placeholder="Search for anti-malaria, antibiotics, vitamins...">
                    <div class="input-group-append"><button type="submit" style="border:none; background:none"><i class="fa fa-search"></i></button></div>
                </div>
            </div>
        </form>
    </div>
</header>
