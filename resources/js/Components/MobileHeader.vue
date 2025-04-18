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
                        <a href="#" style="color:#000;" id="open-menu"><i class="icon-menu"></i> </a>
                        <a href="#" style="display:none" id="close-menu"><i class="icon-cross"></i></a>
                        </div>
                </ul>
            </div>
        </div>
    </div>
        <div class="ps-search__content ps-search--mobile" style="padding: 15px">
            <form action="" method="get">
                        <div class="ps-search-table">
                            <div class="input-group">
                                <input class="form-control ps-input" type="text"  name="q" placeholder="Search for anti-malaria, antibiotics, asthma, cough and cold,  eyes drops, fitness and vitality etc..">
                                <div class="input-group-append"><button type="submit" style="border:none; background:none"><i class="fa fa-search"></i></button></div>
                            </div>
                        </div>
                    </form>
  
    </div>
    
</header>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';

const page = usePage()

</script>