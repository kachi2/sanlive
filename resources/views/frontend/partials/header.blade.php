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
                    <img src="{{ asset('images/'.$settings->site_logo) }}" style="width: 160px" alt="{{ $settings->site_name }} logo" width="160" height="50" fetchpriority="high">
                </a>
            </div>
            <div class="ps-header__search" style="flex:1; max-width:560px;">
                <form action="{{ route('products.search') }}" method="get">
                    <div class="ps-search-table">
                        <div class="input-group">
                            <label for="header-search" class="visually-hidden">Search products</label>
                            <input class="form-control ps-input" id="header-search" type="text" name="q" value="{{ request('q') }}" placeholder="Search medicines, vitamins, antibiotics...">
                            <div class="input-group-append"><button type="submit" aria-label="Search" style="border:none; background:none; padding:0 12px;"><i class="fa fa-search" aria-hidden="true"></i></button></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="ps-header__right" style="flex:0 0 auto; margin-left:auto;">
                <ul class="hdr-actions">
                    @guest
                    <li>
                        <a href="#" data-auth-modal="login" rel="nofollow" class="hdr-account">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            <span>Sign in</span>
                        </a>
                    </li>
                    @else
                    <li class="dropdown" style="position:relative;">
                        <a class="hdr-account dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="hdr-avatar">{{ strtoupper(mb_substr(Auth::user()->first_name ?? 'U', 0, 1)) }}</span>
                            <span>Hi, {{ ucfirst(strtolower(Auth::user()->first_name ?? '')) }}</span>
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
                    <li>
                        <a class="hdr-icon hdr-icon--wa" target="_blank" rel="noopener" href="https://wa.me/+2348058885913?text='Good day, please i want to make enquiries'" aria-label="Chat with a pharmacist on WhatsApp" title="Chat with a pharmacist">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.127.558 4.12 1.532 5.845L.053 23.25a.75.75 0 0 0 .916.98l5.604-1.474A11.953 11.953 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.75a9.71 9.71 0 0 1-4.953-1.352l-.355-.211-3.668.965.977-3.567-.232-.367A9.712 9.712 0 0 1 2.25 12C2.25 6.59 6.59 2.25 12 2.25S21.75 6.59 21.75 12 17.41 21.75 12 21.75z"/></svg>
                        </a>
                    </li>
                    <li>
                        <a class="hdr-icon hdr-icon--cart" href="{{ route('carts.index') }}" aria-label="View cart" id="cart-mini">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                            <span class="hdr-badge cartReload">{{ $cartItem ?? 0 }}</span>
                        </a>
                    </li>
                </ul>
                <style>
                .hdr-actions { display: flex; align-items: center; gap: 10px; list-style: none; margin: 0; padding: 0; flex-wrap: nowrap; }
                .hdr-actions > li { list-style: none; }
                .hdr-account { display: inline-flex; align-items: center; gap: 8px; height: 42px; padding: 0 16px 0 12px; border-radius: 999px; border: 1.5px solid #e4e8f0; background: #fff; color: #103178; font-size: 14px; font-weight: 600; white-space: nowrap; text-decoration: none !important; transition: border-color .15s, background .15s, box-shadow .15s; }
                .hdr-account:hover { border-color: #103178; background: #f5f7ff; color: #103178; box-shadow: 0 4px 12px rgba(16,49,120,.08); }
                .hdr-account.dropdown-toggle::after { margin-left: 2px; }
                .hdr-avatar { display: inline-flex; align-items: center; justify-content: center; width: 26px; height: 26px; border-radius: 50%; background: #103178; color: #fff; font-size: 12px; font-weight: 700; }
                .hdr-icon { position: relative; display: inline-flex; align-items: center; justify-content: center; width: 42px; height: 42px; border-radius: 50%; background: #f3f5fa; color: #103178; text-decoration: none !important; transition: background .15s, color .15s, transform .15s; }
                .hdr-icon:hover { transform: translateY(-1px); }
                .hdr-icon--wa { color: #25a244; background: #eaf7ee; }
                .hdr-icon--wa:hover { background: #25d366; color: #fff; }
                .hdr-icon--cart:hover { background: #103178; color: #fff; }
                /* ── Main menu ── */
                .sanlive-nav { background: linear-gradient(90deg, #0e2a6b 0%, #103178 50%, #14398a 100%); box-shadow: 0 2px 12px rgba(16,49,120,.18); }
                /* white band so the menu doesn't merge into blue page banners below it */
                .sanlive-nav { border-bottom: 10px solid #fff; }
                .sanlive-nav .sanlive-nav__menu { gap: 4px; padding: 7px 0; }
                .sanlive-nav .sanlive-nav__menu > li > a { padding: 8px 16px; border-radius: 999px; font-size: 14px; font-weight: 600; letter-spacing: .1px; color: rgba(255,255,255,.82) !important; transition: background .15s, color .15s; }
                .sanlive-nav .sanlive-nav__menu > li > a::after { display: none; }
                .sanlive-nav .sanlive-nav__menu > li > a:hover { background: rgba(255,255,255,.1); color: #fff !important; }
                .sanlive-nav .sanlive-nav__menu > li > a.active { background: rgba(255,255,255,.16); color: #fff !important; box-shadow: inset 0 0 0 1px rgba(255,255,255,.12); }
                .sanlive-nav .sanlive-nav__menu > li > a .fa-chevron-down { transition: transform .2s; opacity: .8; }
                .sanlive-nav .has-dropdown:hover > a .fa-chevron-down { transform: rotate(180deg); }
                .sanlive-nav .has-dropdown:hover > a { background: rgba(255,255,255,.1); color: #fff !important; }
                .sanlive-nav .sanlive-nav__dropdown { top: calc(100% + 4px); border-radius: 14px; border: 1px solid #eef1f8; box-shadow: 0 16px 40px rgba(16,49,120,.18); padding: 10px; animation: hdr-drop .18s ease; }
                .sanlive-nav .sanlive-nav__dropdown::before { content: ""; position: absolute; left: 0; right: 0; top: -8px; height: 8px; } /* hover bridge */
                .sanlive-nav .sanlive-nav__dropdown ul { padding: 0; }
                .sanlive-nav .sanlive-nav__dropdown ul li a { padding: 9px 14px; border-radius: 8px; font-size: 13.5px; color: #2b3a55 !important; }
                .sanlive-nav .sanlive-nav__dropdown ul li a:hover { background: #f0f4ff; color: #103178 !important; }
                @keyframes hdr-drop { from { opacity: 0; transform: translateY(-6px); } to { opacity: 1; transform: translateY(0); } }
                @media (prefers-reduced-motion: reduce) { .sanlive-nav .sanlive-nav__dropdown { animation: none; } }

                .sanlive-nav__cta.hdr-rx-cta { gap: 8px; padding: 5px 16px 5px 5px; margin: 6px 0; background: #fff; color: #103178 !important; font-size: 13px; font-weight: 700; border-radius: 999px; box-shadow: 0 2px 10px rgba(0,0,0,.12); transition: box-shadow .15s, transform .15s; }
                .sanlive-nav__cta.hdr-rx-cta:hover { background: #fff; color: #103178 !important; transform: translateY(-1px); box-shadow: 0 6px 18px rgba(0,0,0,.2); }
                .hdr-rx-cta__icon { display: inline-flex; align-items: center; justify-content: center; width: 26px; height: 26px; border-radius: 50%; background: #25a244; color: #fff; transition: background .15s; }
                .hdr-rx-cta:hover .hdr-rx-cta__icon { background: #1e8a38; }
                .hdr-badge { position: absolute; top: -3px; right: -3px; min-width: 19px; height: 19px; padding: 0 5px; border-radius: 999px; background: #e5484d; color: #fff; font-size: 11px; font-weight: 700; line-height: 19px; text-align: center; border: 2px solid #fff; box-sizing: content-box; }
                </style>
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
            <a href="{{ route('user.prescription') }}" class="sanlive-nav__cta hdr-rx-cta">
                <span class="hdr-rx-cta__icon">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="12" y1="18" x2="12" y2="12"/><polyline points="9 15 12 12 15 15"/></svg>
                </span>
                Upload Prescription
            </a>
        </div>
    </nav>
</header>
