<template>
<div class=" d-none  d-xl-block col-xl-3  col-12 col-md-5 col-lg-3" style="border-radius: 10px">
    <div class="ps-shopping__box mt-5" style="background: #fff; padding: 0px">
        <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar view-all">
            <li class="dropdown-title  mb-0 p-4"
                style="background: #103178; color:#fff; padding-left:10px; border-radius:10px 10px 0px 0px">
                <strong>Account Information</strong></li>
            <li class="border-b-4">
                <Link class="dropdown-item " style="padding:15px; font-weight:bold"
                    href="/accounts/index"> <i class="icon-user"> </i> &nbsp;Account </Link>
                </li>
            <li><Link class="dropdown-item navIL" href="/account/orders"> <i class=" icon-cart"> </i> &nbsp;
                    Orders</Link></li>
            <li><Link class="dropdown-item navIL" href="/account/address"> <i class="icon-book"> </i> &nbsp; Address
                    Book</Link></li>
            <li><Link class="dropdown-item navIL" href="/account/order/payments"> <i class="icon-wallet"> </i>&nbsp; Card
                    Payments</Link></li>
            <li><Link class="dropdown-item navIL" href="/accounts/settings"><i class="icon-cog"> </i>&nbsp; Update
                    Account</Link>
            </li>
            <li>
                    <button class="dropdown-item navIL"  @click="Logout" ><i class="icon-eraser"> </i>&nbsp;
                         Logout</button>
                         <form id="logout-form"  method="POST" @submit.prevent="">
                        </form> 
                </li>
        </ul>
    </div>
</div>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';


function Logout()
{
    router.post('/logout')
}
</script>

<style>
        .navIL 
        {
            padding: 12px;
            padding-left: 10px
        }
        .dropdown-item:hover 
        {
            background: rgb(219, 218, 218);
        }
    </style>