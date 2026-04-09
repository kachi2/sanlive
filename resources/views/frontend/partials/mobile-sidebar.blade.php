{{-- resources/views/frontend/partials/mobile-sidebar.blade.php --}}
<style>
/* Sidebar drawer */
.mob-drawer-overlay {
    display: none; position: fixed; inset: 0; z-index: 9998;
    background: rgba(10,34,80,.45); backdrop-filter: blur(2px);
}
.mob-drawer-overlay.open { display: block; }

.mob-drawer {
    position: fixed; top: 0; left: 0; bottom: 0;
    width: 300px; max-width: 88vw;
    background: #fff; z-index: 9999;
    transform: translateX(-100%);
    transition: transform .3s cubic-bezier(.4,0,.2,1);
    display: flex; flex-direction: column;
    overflow: hidden;
}
.mob-drawer.open { transform: translateX(0); }

/* Drawer header */
.mob-drawer__head {
    background: #103178;
    padding: 20px 20px 16px;
    display: flex; align-items: center; justify-content: space-between;
    flex-shrink: 0;
}
.mob-drawer__logo img { height: 36px; object-fit: contain; filter: brightness(0) invert(1); }
.mob-drawer__close {
    background: rgba(255,255,255,.15); border: none;
    width: 34px; height: 34px; border-radius: 8px;
    color: #fff; font-size: 1.1rem; cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    transition: background .18s;
}
.mob-drawer__close:hover { background: rgba(255,255,255,.28); }

/* User strip */
.mob-drawer__user {
    background: #0e2a6e;
    padding: 12px 20px;
    flex-shrink: 0;
}
.mob-drawer__user-name {
    font-size: .88rem; color: #c8d8ff; font-weight: 600;
}
.mob-drawer__user-links { display: flex; gap: 12px; margin-top: 4px; }
.mob-drawer__user-links a {
    font-size: .78rem; color: #7fa8ff;
    text-decoration: none;
}
.mob-drawer__user-links a:hover { color: #fff; }

/* Nav list */
.mob-drawer__nav {
    flex: 1; overflow-y: auto; padding: 8px 0;
}
.mob-drawer__nav a {
    display: flex; align-items: center; justify-content: space-between;
    padding: 13px 20px;
    font-size: .95rem; font-weight: 500; color: #1a2a4a;
    text-decoration: none; border-left: 3px solid transparent;
    transition: background .15s, border-color .15s, color .15s;
}
.mob-drawer__nav a:hover, .mob-drawer__nav a.active {
    background: #f0f4ff; border-left-color: #25d366; color: #103178;
}
.mob-drawer__nav a .nav-arrow { color: #b0bdd0; font-size: .75rem; }
.mob-drawer__nav .nav-divider {
    height: 1px; background: #f0f2f8; margin: 4px 20px;
}

/* CTA */
.mob-drawer__cta {
    padding: 16px 20px;
    border-top: 1px solid #eef1f8;
    flex-shrink: 0;
}
.mob-drawer__cta a {
    display: block; text-align: center;
    background: #25d366; color: #fff;
    padding: 13px; border-radius: 10px;
    font-size: .92rem; font-weight: 700;
    text-decoration: none; letter-spacing: .02em;
    transition: background .18s;
}
.mob-drawer__cta a:hover { background: #1db858; color: #fff; }

/* Footer strip */
.mob-drawer__foot {
    padding: 12px 20px;
    background: #f8f9fb;
    border-top: 1px solid #eef1f8;
    flex-shrink: 0;
}
.mob-drawer__foot-links { display: flex; gap: 16px; flex-wrap: wrap; }
.mob-drawer__foot-links a {
    font-size: .75rem; color: #8a9bb5; text-decoration: none;
}
.mob-drawer__foot-links a:hover { color: #103178; }
</style>

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
