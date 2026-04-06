{{-- resources/views/frontend/partials/mobile-sidebar.blade.php --}}
<div class="ps-menu--slidebar" id="mobile-sidebar">
    <div class="ps-menu__content">
        <ul class="menu--mobile">
            <div class="pb-5">
                <img src="{{ asset('images/'.$settings->site_logo) }}" style="width:160px" alt="{{ $settings->site_name }}">
            </div>
            @auth
            <li style="border-bottom: 1px solid #eee;"><a href="{{ route('users.account.index') }}" rel="nofollow"> Account</a></li>
            <li style="border-bottom: 1px solid #eee;"><a href="{{ route('users.orders') }}" rel="nofollow">Orders</a></li>
            @endauth
            <li style="border-bottom: 1px solid #eee;"><a href="{{ route('products.search') }}" rel="nofollow">Products</a></li>
            <li style="border-bottom: 1px solid #eee;"><a href="/page/services" rel="nofollow">Our Services</a></li>
            <li style="border-bottom: 1px solid #eee;"><a href="{{ route('AboutUs') }}" rel="nofollow">About Us</a></li>
            <li style="border-bottom: 1px solid #eee;"><a href="{{ route('contactUs') }}" rel="nofollow">Contact Us</a></li>
            <li style="border-bottom: 1px solid #eee;"><a href="{{ route('blogs.index') }}">Blog</a></li>
            <li style="border-bottom: 1px solid #eee;"><a href="{{ route('PrivacyPolicy') }}" rel="nofollow">Privacy Policy</a></li>
            <li style="border-bottom: 1px solid #eee;"><a href="{{ route('pages.terms') }}" rel="nofollow">Terms &amp; Conditions</a></li>
            <li style="border-bottom: 1px solid #eee;"><a href="{{ route('faq.index') }}" rel="nofollow">FAQ</a></li>
            <li class="nav-item"><a class="nav-link pl-3" style="color:#fff; background:#103178" href="{{ route('user.prescription') }}" rel="nofollow"> UPLOAD PRESCRIPTION</a></li>
        </ul>
    </div>
    <div class="ps-menu__footer">
        <div class="ps-menu__item">
            <ul class="ps-language-currency">
                <li class="menu-item-has-children"><a href="#">English</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span></li>
                <li class="menu-item-has-children"><a href="#">NGN</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span></li>
            </ul>
        </div>
        <div class="ps-menu__item">
            <div class="ps-menu__contact">Need help? <strong></strong></div>
        </div>
    </div>
</div>
