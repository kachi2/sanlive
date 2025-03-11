<template>
    <div class="ps-navigation" style="background:#E6F3FF; border-top:1px solid #e4e8ee; border-bottom:1px solid #e4e8ee ">
    <div class="container">
        <div class="" style="text-align: center;">
            <nav class="ps-main-menu" >
                <ul class="menu">
                    <li><Link   href="/">Home</Link></li>
                    <li><Link href="/catalogs">Products</Link></li>
                    <li><Link   href="">Our Services</Link></li>
                    <li><Link href="/pages/about">About Us</Link></li>
                    <li><Link   href="pages/contactus">Contact Us</Link></li>
                    <li><Link href="/blogs">Blog</Link></li>
                    <li><Link href="/faq">FAQ</Link></li>

                </ul>
            </nav>
        </div>
        <!-- <div class="ps-navigation__right">Need help?  <i class="fa fa-phone"> </i><strong>09089898989</strong></div> -->
    </div>
</div>

</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>