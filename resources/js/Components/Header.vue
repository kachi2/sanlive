<template>
       
   <header class="ps-header ps-header--1" >

    <div class="ps-noti p-2">
        <div class="container" >
            <h1 class="m-0" style="color:#fff; font-weight:bold; font-size: 13px;"> <marquee>  <span v-html="page?.props?.announcment?.content"> </span> </marquee></h1>
        </div>

    </div>
    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-logo"><a href="/"> 
                <img :src="`/images/${page?.props.settings?.site_logo}`"  style="width: 160px" alt="sanlive pharmacy">
            <img class="sticky-logo" src="" alt=""></a>
     
        </div>
            <div class="ps-header__right">
                <ul class="ps-header__icons">
                   
                    <li><a class="ps-header__item open-search" href=""><i class="icon-magnifier"></i></a></li>
                  
                    <span v-if="!page?.props?.auth?.user">
                    <Link class="" href="/login">Sign in</Link> 
                
                    </span>
                    <li v-else>
                        <Link   class="ps-header__item" style="width:120px; font-size:0.85em; color:#5b6c8f"  href="/accounts/index" > 
                        <i class="icon-user"  style="font-size:1.4em; padding-right:2px; font-weight:800;"></i>Hi, {{page?.props?.auth?.user?.first_name?.toUpperCase()}} </Link>
                    </li>
            
                    <li><a class="ps-header__item" target="_blank"   href="https://wa.me/+2348058885913?text='Good day, please i want to make enquiries'" id="cart-mini"><i class="icon-phone-bubble"></i></a></li>
                    <li><Link class="ps-header__item" href="/carts/index" id="cart-mini"><i class="icon-cart-empty"></i> <span class="badge cartReload" >{{page?.props?.cartItem}}</span></Link></li>
                </ul>
                <div class="ps-header__search">
                    <form action="" @submit.prevent="searchProducts">
                        <div class="ps-search-table">
                            <div class="input-group">
                                <input class="form-control ps-input" type="text"  name="q" v-model="form.q" placeholder="Search for anti-malaria, antibiotics, asthma, cough and cold,  eyes drops, fitness and vitality etc..">
                                <div class="input-group-append"><button type="submit" style="border:none; background:none"><i class="fa fa-search"></i></button></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <TopNav  />
    </header>

    </template>

<script setup="">
import TopNav from "./TopNav.vue"
import { usePage, Link, useForm } from "@inertiajs/vue3";

const page = usePage()

const queryParam = new URLSearchParams(page.url?.split('?')[1] ?? '')


const form = useForm({
    q: queryParam.get('query')??''
})

function searchProducts(query)
{

    form.get('/catalogs', {
    })


}


</script>