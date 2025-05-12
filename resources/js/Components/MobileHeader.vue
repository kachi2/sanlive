<template>
    <header class="ps-header ps-header--8 ps-header--mobile">
    <div class="ps-noti">
        <div class="container">
            <p class="m-0" style="color:#fff; font-weight:bold;"> <marquee>  <span v-html="page.props.announcment?.content"> </span> </marquee></p>
        </div>
    </div>
    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-logo"><a href="/"> <img :src="`/images/${page.props.settings?.site_logo}`"  style="width: 160px"  alt=""></a></div>
            <div class="ps-header__right">

                <ul class="ps-header__icons">
                    <a style="color:green; width:49px" href="/carts/index/"><i class="icon-cart"></i><span class="badge bg-info" style="color:#fff">{{page.props.cartItem}}</span></a> &nbsp; &nbsp;
                    <div class="ps-nav__item"  style="display: inline;">
                        <button v-if="!isMenuOpen" @click="toggleMenu" id="open-menus" class="btn-menu"><i class="icon-menu" style="font-size:30px"></i> </button>
                        <button v-if="isMenuOpen" @click="toggleMenu" id="close-menus" class="btn-menu"><i class="icon-cross" style="font-size:30px"></i></button>
                        </div>
                </ul>
            </div> 
        </div>
    </div>
        <div class="ps-search__content ps-search--mobile" style="padding: 15px">
            <form action="" @submit.prevent="searchProducts">
                        <div class="ps-search-table">
                            <div class="input-group">
                                <input class="form-control ps-input" type="text"  name="q" v-model="form.q" placeholder="Search for anti-malaria, antibiotics, asthma, cough and cold,  eyes drops, fitness and vitality etc..">
                                <div class="input-group-append"><button type="submit" style="border:none; background:none"><i class="fa fa-search"></i></button></div>
                            </div>
                        </div>
                    </form>
    </div>
</header>

<div class="ps-menu--slidebar" :class="['ps-menu--slidebar', { 'active': isMenuOpen }]">
    <div class="ps-menu__content">
        <ul class="menu--mobile"> 
            <div class="pb-5">
            <img :src="`/images/${page.props.settings?.site_logo}`"  style="width: 160px" alt="sanlive pharmacy">
        </div>
            <li style="border-bottom: 1px solid #eee;"><Link href="/accounts/index"> Account</Link></li>
                <li style="border-bottom: 1px solid #eee;"> <Link href="/accounts/orders">  Orders</Link></li>
                <li style="border-bottom: 1px solid #eee;"><Link href="/catalogs">Products</Link></li>
                <li style="border-bottom: 1px solid #eee;"><Link href="/page/services">Our Services</Link></li>
                <li style="border-bottom: 1px solid #eee;"><Link href="/pages/about">About Us</Link></li>
                <li style="border-bottom: 1px solid #eee;"><Link href="/pages/contactus">Contact Us</Link></li>
                <li style="border-bottom: 1px solid #eee;"><Link href="/blogs">Blog</Link></li>
                <li style="border-bottom: 1px solid #eee;"><Link href="/pages/privacypolicy">Privacy Policy</Link></li>
                <li style="border-bottom: 1px solid #eee;"><Link href="/pages/terms">Terms &amp; Conditions</Link></li>
                <li style="border-bottom: 1px solid #eee;"><Link href="/faq">FAQ</Link></li>
            <li class="nav-item"><a  class="nav-link   pl-3" style="color:#fff; background:#103178"  href="/upload/prescription"> UPLOAD PRESCRIPTION</a></li>
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
import { usePage, Link, useForm } from "@inertiajs/vue3";
import { onMounted, ref } from 'vue'
const page = usePage()

const queryParam = new URLSearchParams(page.url?.split('?')[1] ?? '')


const isMenuOpen = ref(false)

function toggleMenu() {
  isMenuOpen.value = !isMenuOpen.value
}


const form = useForm({
    q: queryParam.get('q')??''
})

function searchProducts(query)
{

    form.get('/catalogs', {
    })


}
</script>

<style scope>
.ps-menu--slidebar {
  display: none;
  transition: transform 0.1s ease-in-out;
}
.btn-menu {
    border:none;
}
.ps-menu--slidebar.active {
  display: block; 
  transform: translateX(0);
}


</style>