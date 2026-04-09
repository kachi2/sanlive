{{-- resources/views/frontend/partials/account-sidebar.blade.php --}}
<style>
/* ── Shared account page layout ── */
.acct-bg{background:#f0f2f8;min-height:80vh;padding-bottom:48px}
.acct-col{margin-top:40px}
/* Page header */
.acct-page-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:22px}
.acct-page-title{font-size:18px;font-weight:800;color:#103178;margin:0}
.acct-back-link{font-size:13px;color:#103178;text-decoration:none;display:inline-flex;align-items:center;gap:5px;font-weight:500}
.acct-back-link:hover{color:#0d2560}
/* Card shell */
.acct-card{background:#fff;border-radius:16px;box-shadow:0 2px 16px rgba(16,49,120,.07);padding:28px 28px;height:100%}
.acct-card-sm{background:#fff;border-radius:16px;box-shadow:0 2px 16px rgba(16,49,120,.07);padding:22px 24px}
.acct-card__header{display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;padding-bottom:14px;border-bottom:1.5px solid #f0f2f8}
.acct-card__title{font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;color:#103178;margin:0}
.acct-card__badge{font-size:10px;font-weight:700;background:#eef2ff;color:#103178;border-radius:20px;padding:3px 10px;letter-spacing:.4px}
.acct-card__badge--green{background:#e6faf0;color:#25a244}
.acct-card__edit{display:flex;align-items:center;justify-content:center;width:32px;height:32px;border-radius:8px;background:#f3f6ff;color:#103178;text-decoration:none!important;transition:background .15s}
.acct-card__edit:hover{background:#103178;color:#fff}
/* Form */
.acct-field{margin-bottom:18px}
.acct-label{font-size:12.5px;font-weight:600;color:#888;text-transform:uppercase;letter-spacing:.6px;margin-bottom:7px;display:block}
.acct-field{margin-bottom:22px}
.acct-input{width:100%;padding:14px 16px;border:1.5px solid #e0e4f0;border-radius:10px;font-size:15px;color:#222;background:#fff;transition:border-color .15s,box-shadow .15s;outline:none;height:52px}
.acct-input:focus{border-color:#103178;box-shadow:0 0 0 3px rgba(16,49,120,.08)}
.acct-input.is-invalid{border-color:#e74c3c}
.acct-err{font-size:11px;color:#e74c3c;margin-top:4px}
.acct-section-label{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.7px;color:#aaa;margin:22px 0 12px}
/* Buttons */
.acct-btn{display:inline-flex;align-items:center;justify-content:center;gap:7px;padding:12px 28px;border-radius:10px;font-size:14px;font-weight:700;text-decoration:none!important;cursor:pointer;border:none;transition:background .15s,box-shadow .15s}
.acct-btn--primary{background:#103178;color:#fff}
.acct-btn--primary:hover{background:#0d2560;box-shadow:0 4px 16px rgba(16,49,120,.25);color:#fff}
.acct-btn--outline{background:#fff;color:#103178;border:1.5px solid #103178}
.acct-btn--outline:hover{background:#f3f6ff}
.acct-btn--danger{background:#fff;color:#e74c3c;border:1.5px solid #fdd}
.acct-btn--danger:hover{background:#fff5f5}
.acct-btn--green{background:#25a244;color:#fff}
.acct-btn--green:hover{background:#1e8a38;color:#fff}
/* Badges */
.acct-badge{display:inline-flex;align-items:center;padding:3px 10px;border-radius:20px;font-size:11px;font-weight:700;letter-spacing:.3px}
.acct-badge--green{background:#e6faf0;color:#1a8c3a}
.acct-badge--blue{background:#eef2ff;color:#103178}
.acct-badge--orange{background:#fff7e6;color:#d97706}
.acct-badge--red{background:#fff1f1;color:#dc2626}
.acct-badge--gray{background:#f3f4f6;color:#6b7280}
/* Alerts */
.acct-alert{border-radius:10px;padding:12px 16px;font-size:13px;margin-bottom:18px}
.acct-alert--success{background:#e6faf0;color:#166534;border-left:4px solid #25a244}
.acct-alert--error{background:#fff1f1;color:#991b1b;border-left:4px solid #e74c3c}
.acct-alert--warn{background:#fffbeb;color:#92400e;border-left:4px solid #f59e0b}
/* Empty state */
.acct-empty{text-align:center;padding:52px 20px}
.acct-empty i{font-size:44px;color:#d0d5e8;display:block;margin-bottom:14px}
.acct-empty p{color:#999;font-size:14px;margin-bottom:18px}
/* Table */
.acct-table{width:100%;border-collapse:separate;border-spacing:0}
.acct-table thead th{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.6px;color:#888;padding:10px 16px;background:#f8f9ff;border-bottom:2px solid #eef0f8}
.acct-table thead th:first-child{border-radius:10px 0 0 0}
.acct-table thead th:last-child{border-radius:0 10px 0 0}
.acct-table tbody tr{border-bottom:1px solid #f3f4f8;transition:background .12s}
.acct-table tbody tr:hover{background:#f8f9ff}
.acct-table tbody td{padding:13px 16px;font-size:13.5px;color:#333;vertical-align:middle}
.acct-table tbody tr:last-child td{border-bottom:none}
/* Order card */
.acct-order-card{background:#fff;border:1.5px solid #eef0f8;border-radius:14px;padding:18px 20px;margin-bottom:14px;display:flex;align-items:center;gap:16px;transition:box-shadow .15s,border-color .15s;text-decoration:none!important}
.acct-order-card:hover{box-shadow:0 6px 22px rgba(16,49,120,.1);border-color:#c5cef0}
.acct-order-card__img{width:70px;height:70px;object-fit:contain;border-radius:10px;background:#f8f9ff;padding:6px;flex-shrink:0}
.acct-order-card__info{flex:1;min-width:0}
.acct-order-card__name{font-size:14px;font-weight:700;color:#111;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;margin-bottom:4px}
.acct-order-card__sub{font-size:12px;color:#888;margin-bottom:6px}
.acct-order-card__meta{display:flex;align-items:center;gap:8px;flex-wrap:wrap}
.acct-order-card__price{font-size:14px;font-weight:700;color:#103178;margin-left:auto;white-space:nowrap}
.acct-order-card__arrow{color:#c0c9e0;font-size:18px;flex-shrink:0}
/* Welcome banner */
.acct-welcome{background:linear-gradient(135deg,#103178 0%,#1a449f 100%);border-radius:16px;padding:26px 30px;display:flex;align-items:center;gap:18px;margin-bottom:24px;box-shadow:0 6px 24px rgba(16,49,120,.15)}
.acct-welcome__avatar{width:56px;height:56px;border-radius:50%;background:rgba(255,255,255,.18);border:3px solid rgba(255,255,255,.35);display:flex;align-items:center;justify-content:center;font-size:20px;font-weight:800;color:#fff;flex-shrink:0;text-transform:uppercase}
.acct-welcome__text h4{color:#fff;font-size:17px;font-weight:700;margin:0 0 2px}
.acct-welcome__text p{color:rgba(255,255,255,.7);font-size:12.5px;margin:0}
/* Info field */
.acct-info-field{margin-bottom:14px}
.acct-info-field__label{font-size:10.5px;font-weight:600;color:#aaa;text-transform:uppercase;letter-spacing:.6px;margin-bottom:2px}
.acct-info-field__value{font-size:14px;font-weight:500;color:#222}
/* Sidebar */
.acct-sidebar{background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(16,49,120,.08);margin-top:40px}
.acct-sidebar__hero{background:linear-gradient(135deg,#103178 0%,#1a449f 100%);padding:28px 20px 22px;text-align:center}
.acct-sidebar__avatar{width:64px;height:64px;border-radius:50%;background:rgba(255,255,255,.18);border:3px solid rgba(255,255,255,.4);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;font-size:24px;font-weight:700;color:#fff;letter-spacing:1px;text-transform:uppercase}
.acct-sidebar__name{font-size:15px;font-weight:700;color:#fff;margin-bottom:2px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.acct-sidebar__email{font-size:11px;color:rgba(255,255,255,.65);white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.acct-sidebar__nav{padding:10px 0}
.acct-sidebar__link{display:flex;align-items:center;gap:12px;padding:12px 22px;font-size:13.5px;font-weight:500;color:#444;text-decoration:none!important;transition:background .15s,color .15s;border-left:3px solid transparent;position:relative}
.acct-sidebar__link:hover{background:#f3f6ff;color:#103178;border-left-color:#103178}
.acct-sidebar__link.is-active{background:#eef2ff;color:#103178;font-weight:700;border-left-color:#103178}
.acct-sidebar__link i{font-size:16px;width:20px;text-align:center;opacity:.7}
.acct-sidebar__link.is-active i{opacity:1}
.acct-sidebar__divider{height:1px;background:#f0f0f0;margin:6px 20px}
.acct-sidebar__logout{display:flex;align-items:center;gap:12px;padding:12px 22px;font-size:13.5px;font-weight:500;color:#e74c3c;background:none;border:none;width:100%;text-align:left;cursor:pointer;border-left:3px solid transparent;transition:background .15s}
.acct-sidebar__logout:hover{background:#fff5f5;border-left-color:#e74c3c}
.acct-sidebar__logout i{font-size:16px;width:20px;text-align:center}
</style>

<div class="d-none d-xl-block col-xl-3 col-12 col-md-5 col-lg-3">
    @php
        $authUser = auth()->user();
        $initials = strtoupper(substr($authUser->first_name ?? 'U', 0, 1) . substr($authUser->last_name ?? '', 0, 1));
        $currentRoute = request()->route()->getName();
    @endphp
    <div class="acct-sidebar">
        <div class="acct-sidebar__hero">
            <div class="acct-sidebar__avatar">{{ $initials }}</div>
            <div class="acct-sidebar__name">{{ ($authUser->first_name ?? '') . ' ' . ($authUser->last_name ?? '') }}</div>
            <div class="acct-sidebar__email">{{ $authUser->email ?? '' }}</div>
        </div>
        <nav class="acct-sidebar__nav">
            <a href="{{ route('users.account.index') }}" class="acct-sidebar__link {{ $currentRoute === 'users.account.index' ? 'is-active' : '' }}">
                <i class="icon-user"></i> <span>My Account</span>
            </a>
            <a href="{{ route('users.orders') }}" class="acct-sidebar__link {{ $currentRoute === 'users.orders' ? 'is-active' : '' }}">
                <i class="icon-bag2"></i> <span>Orders</span>
            </a>
            <a href="{{ route('users.account.address') }}" class="acct-sidebar__link {{ in_array($currentRoute, ['users.account.address','users.address.create','users.address.edit']) ? 'is-active' : '' }}">
                <i class="icon-map-marker"></i> <span>Address Book</span>
            </a>
            <a href="{{ route('users.order.payments') }}" class="acct-sidebar__link {{ $currentRoute === 'users.order.payments' ? 'is-active' : '' }}">
                <i class="icon-credit-card"></i> <span>Payments</span>
            </a>
            <a href="{{ route('users.account.settings') }}" class="acct-sidebar__link {{ $currentRoute === 'users.account.settings' ? 'is-active' : '' }}">
                <i class="icon-cog"></i> <span>Settings</span>
            </a>
            <div class="acct-sidebar__divider"></div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="acct-sidebar__logout">
                    <i class="icon-power-switch"></i> <span>Sign Out</span>
                </button>
            </form>
        </nav>
    </div>
</div>
