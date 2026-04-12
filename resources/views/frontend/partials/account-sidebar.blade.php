{{-- resources/views/frontend/partials/account-sidebar.blade.php --}}

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
