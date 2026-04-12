{{-- resources/views/frontend/partials/mobile-sidebar.blade.php --}}

<div class="mob-drawer-overlay" id="mob-overlay"></div>

<div class="mob-drawer" id="mobile-sidebar" role="navigation" aria-label="Mobile navigation">

    {{-- Header --}}
    <div class="mob-drawer__head">
        <div class="mob-drawer__logo">
            {{-- <img src="{{ asset('images/'.$settings->site_logo) }}" alt="{{ $settings->site_name }}"> --}}
        </div>
        <button class="mob-drawer__close" id="close-menus" aria-label="Close menu">&times;</button>
    </div>

    {{-- User strip --}}
    @auth
    <div class="mob-drawer__user">
        <div class="mob-drawer__user-name">Hi, {{ ucfirst(strtolower(Auth::user()->first_name ?? '')) }} 👋</div>
        <div class="mob-drawer__user-links">
            <a href="{{ route('users.account.index') }}" rel="nofollow">My Account</a>
            <a href="{{ route('users.orders') }}" rel="nofollow">My Orders</a>
        </div>
    </div>
    @endauth

    {{-- Nav links --}}
    <nav class="mob-drawer__nav">
        <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">
            <span>Home</span><i class="fa fa-chevron-right nav-arrow"></i>
        </a>
        <div class="nav-divider"></div>

        {{-- Categories accordion --}}
        <a href="{{ route('products.search') }}" class="{{ request()->routeIs('products.*') ? 'active' : '' }}">
            <span>Products</span><i class="fa fa-chevron-right nav-arrow"></i>
        </a>
        @if(!empty($categories) && $categories->count())
        @foreach($categories->take(6) as $cat)
        <a href="{{ route('products.search', ['category' => $cat->slug]) }}" style="padding-left:32px; font-size:.85rem; color:#5b6c8f;">
            <span>{{ $cat->name }}</span>
        </a>
        @endforeach
        @endif
        <div class="nav-divider"></div>

        <a href="/page/services"><span>Our Services</span><i class="fa fa-chevron-right nav-arrow"></i></a>
        <a href="{{ route('AboutUs') }}"><span>About Us</span><i class="fa fa-chevron-right nav-arrow"></i></a>
        <a href="{{ route('blogs.index') }}"><span>Blog</span><i class="fa fa-chevron-right nav-arrow"></i></a>
        <a href="{{ route('contactUs') }}"><span>Contact Us</span><i class="fa fa-chevron-right nav-arrow"></i></a>
        <a href="{{ route('faq.index') }}"><span>FAQ</span><i class="fa fa-chevron-right nav-arrow"></i></a>

        <div class="nav-divider"></div>

        @guest
        <a href="#" id="mob-open-login" data-auth-modal="login"><span>Sign In</span><i class="fa fa-chevron-right nav-arrow"></i></a>
        <a href="#" data-auth-modal="register"><span>Create Account</span><i class="fa fa-chevron-right nav-arrow"></i></a>
        @else
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('mob-logout-form').submit();">
            <span>Sign Out</span><i class="fa fa-chevron-right nav-arrow"></i>
        </a>
        <form id="mob-logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
        @endguest
    </nav>

    {{-- CTA --}}
    <div class="mob-drawer__cta">
        <a href="{{ route('user.prescription') }}" rel="nofollow">&#8593; Upload Prescription</a>
    </div>

    {{-- Footer links --}}
    <div class="mob-drawer__foot">
        <div class="mob-drawer__foot-links">
            <a href="{{ route('PrivacyPolicy') }}">Privacy Policy</a>
            <a href="{{ route('pages.terms') }}">Terms &amp; Conditions</a>
        </div>
    </div>
</div>

<script>
(function(){
    var drawer  = document.getElementById('mobile-sidebar');
    var overlay = document.getElementById('mob-overlay');
    var openBtn = document.getElementById('open-menus');
    var closeBtn= document.getElementById('close-menus');

    function openDrawer(){
        drawer.classList.add('open');
        overlay.classList.add('open');
        document.body.style.overflow='hidden';
        if(openBtn) openBtn.classList.add('is-open');
    }
    function closeDrawer(){
        drawer.classList.remove('open');
        overlay.classList.remove('open');
        document.body.style.overflow='';
        if(openBtn) openBtn.classList.remove('is-open');
    }

    if(openBtn)  openBtn.addEventListener('click', openDrawer);
    if(closeBtn) closeBtn.addEventListener('click', closeDrawer);
    overlay.addEventListener('click', closeDrawer);
    document.addEventListener('keydown', function(e){ if(e.key==='Escape') closeDrawer(); });
})();
</script>
