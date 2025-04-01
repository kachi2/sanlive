<template>
       
   <header class="ps-header ps-header--1" >

    <div class="ps-noti p-2">
        <div class="container" >
     
                <!-- <CartAlert :message="page.props.flash" />  -->
        
        
            <!-- <p class="m-0" style="color:#fff; font-weight:bold;"> <marquee> we wre here to serve yowe wre here to serve yowe wre</marquee></p> -->
        </div>

    </div>
    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-logo"><a href=""> 
                <img src="/images/1731168076sdsds.png" style="width: 160px" alt>
            <img class="sticky-logo" src="" alt=""></a>
     
        </div>
            <div class="ps-header__right">
                <ul class="ps-header__icons">
                   
                    <li><a class="ps-header__item open-search" href=""><i class="icon-magnifier"></i></a></li>
                    <a class="" href="">Sign in</a> 
                    
                    <!-- <li >
                        <a   class="ps-header__item" style="width:120px; font-size:0.85em; border:1px solid #eeeeee5f; color:#5b6c8f"  href="{{route('users.account.index')}}" > 
                        <i class="icon-user"  style="font-size:0.95em; padding-right:2px; font-weight:800; background:#eef"></i>kachi </a>
                    </li> -->
                   
            
                    <li><Link class="ps-header__item" href="/carts/index" id="cart-mini"><i class="icon-cart-empty"></i> <span class="badge cartReload" >{{page.props.cartItem}}</span></Link></li>
                </ul>
                <div class="ps-header__search">
                    <form action="" method="get">
                        <div class="ps-search-table">
                            <div class="input-group">
                                <input class="form-control ps-input" type="text"  name="q" placeholder="Search for anti-malaria, antibiotics, asthma, cough and cold,  eyes drops, fitness and vitality etc..">
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
import CartAlert from "./CartAlert.vue";
import TopNav from "./TopNav.vue"
import { usePage, Link } from "@inertiajs/vue3";

const page = usePage()



</script>