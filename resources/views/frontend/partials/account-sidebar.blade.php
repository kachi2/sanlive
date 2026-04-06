{{-- resources/views/frontend/partials/account-sidebar.blade.php --}}
<div class="d-none d-xl-block col-xl-3 col-12 col-md-5 col-lg-3" style="border-radius:10px">
    <div class="ps-shopping__box mt-5" style="background:#fff;padding:0px">
        <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar view-all">
            <li class="dropdown-title mb-0 p-4"
                style="background:#103178;color:#fff;padding-left:10px;border-radius:10px 10px 0px 0px">
                <strong>Account Information</strong>
            </li>
            <li class="border-b-4">
                <a class="dropdown-item" style="padding:15px;font-weight:bold" href="{{ route('users.account.index') }}">
                    <i class="icon-user"></i> &nbsp;Account
                </a>
            </li>
            <li><a class="dropdown-item" style="padding:12px;padding-left:10px" href="{{ route('users.orders') }}"><i class="icon-cart"></i> &nbsp;Orders</a></li>
            <li><a class="dropdown-item" style="padding:12px;padding-left:10px" href="{{ route('users.account.address') }}"><i class="icon-book"></i> &nbsp;Address Book</a></li>
            <li><a class="dropdown-item" style="padding:12px;padding-left:10px" href="{{ route('users.order.payments') }}"><i class="icon-wallet"></i> &nbsp;Card Payments</a></li>
            <li><a class="dropdown-item" style="padding:12px;padding-left:10px" href="{{ route('users.account.settings') }}"><i class="icon-cog"></i> &nbsp;Update Account</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item" style="padding:12px;padding-left:10px;background:none;border:none;width:100%;text-align:left">
                        <i class="icon-eraser"></i> &nbsp;Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
