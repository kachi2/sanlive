<template>
    <div class="ps-menu--slidebar" :class="['ps-menu--slidebar', { 'active': isMenuOpen }]">
    <div class="ps-menu__content">
        <ul class="menu--mobile"> 
            <div class="pb-5">
            <img :src="`/images/${page.props.settings?.site_logo}`"  style="width: 160px" alt="sanlive pharmacy">
        </div>
            <li style="border-bottom: 1px solid #eee;"><Link href="/accounts/index" rel="nofollow"> Account</Link></li>
                <li style="border-bottom: 1px solid #eee;"> <Link  href="/account/orders" rel="nofollow">  Orders</Link></li>
                <li style="border-bottom: 1px solid #eee;"><Link href="/catalogs">Products</Link></li>
                <li style="border-bottom: 1px solid #eee;"><Link href="/page/services">Our Services</Link></li>
                <li style="border-bottom: 1px solid #eee;"><Link href="/pages/about" rel="nofollow">About Us</Link></li>
                <li style="border-bottom: 1px solid #eee;"><Link href="/pages/contactus" rel="nofollow">Contact Us</Link></li>
                <li style="border-bottom: 1px solid #eee;"><Link href="/blogs">Blog</Link></li>
                <li style="border-bottom: 1px solid #eee;"><Link href="/pages/privacypolicy" rel="nofollow">Privacy Policy</Link></li>
                <li style="border-bottom: 1px solid #eee;"><Link href="/pages/terms" rel="nofollow">Terms &amp; Conditions</Link></li>
                <li style="border-bottom: 1px solid #eee;"><Link href="/faq" rel="nofollow">FAQ</Link></li>
            <li class="nav-item"><a  class="nav-link   pl-3" style="color:#fff; background:#103178"  href="/upload/prescription" rel="nofollow"> UPLOAD PRESCRIPTION</a></li>
        </ul>
    </div>
    <div class="ps-menu__footer">
        <div class="ps-menu__item">
            <ul class="ps-language-currency">
                <li class="menu-item-has-children"><a href="#">English</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                </li>
                <li class="menu-item-has-children"><a href="#">NGN</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                </li>
            </ul>
        </div>
        <div class="ps-menu__item">
            <div class="ps-menu__contact">Need help? <strong></strong></div>
        </div>
    </div>
</div>
</template>

<script setup>
import { inject, ref } from 'vue'
import { Link, usePage } from '@inertiajs/vue3';
const page = usePage()

const isMenuOpen = inject('isMenuOpen', ref(false))
</script>