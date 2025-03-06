<template>
<header class="ps-header ps-header--2 ps-header--8">
    <div class="ps-noti" style="background: #73c2fb">
        <div class="container">
            <p class="m-0" style="color:#000">  <marquee> {!! $announcment->content??null !!}</marquee> </p>
        </div><a class="ps-noti__close"><i class="icon-cross"></i></a>
    </div>
    <div class="ps-header__top">
        <div class="container">
            <div class="ps-header__text"> <strong>100% Secure delivery, </strong>Secured Payment options </div>
            <div class="ps-top__right">
                <div class="ps-language-currency">
                    <a class="ps-dropdown-value" href="javascript:void(0);" data-toggle="modal" data-target="#popupCurrency">NGN</a></div>
                <div class="ps-top__social">
                    <ul class="ps-social">
                        <li><a class="ps-social__link facebook" href="{{$settings->facebook}}"><i class="fa fa-facebook"> </i><span class="ps-tooltip">Facebook</span></a></li>
                        <li><a class="ps-social__link instagram" href="{{$settings->instagram}}"><i class="fa fa-instagram"></i><span class="ps-tooltip">Instagram</span></a></li>
                        <li><a class="ps-social__link linkedin" href="{{$settings->linkedin}}"><i class="fa fa-linkedin"></i><span class="ps-tooltip">Linkedin</span></a></li>
                        <li><a class="ps-social__link linkedin" href="{{$settings->twitter}}"><i class="fa fa-twitter"></i><span class="ps-tooltip">Twitter</span></a></li>
                    </ul>
                </div>
           
            </div>
        </div>
    </div>
    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-logo"><a href="{{route('users.index')}}"> <img src="{{asset('images/'.$settings->site_logo)}}"  alt>
                <img class="sticky-logo" src="{{asset('images/'.$settings->site_logo)}}" alt></a></div><a class="ps-menu--sticky" href="{{route('users.index')}}"><i class="fa fa-bars"></i></a>
            <div class="ps-header__right">
                <ul class="ps-header__icons">
                    <li ><a   class="ps-header__item" style="width:80px; font-size:1em; border:1px solid #eeeeee5f; color:#5b6c8f"  href="{{route('login')}}" id="login-modal"> <i class="icon-user"  style="font-size:20px; padding-right:2px; font-weight:800"></i> Account </a>
                    </li>
                  
                    <li ><a   class="ps-header__item" style="width:120px; font-size:1em; border:1px solid #eeeeee5f; color:#5b6c8f"  href="{{route('users.account.index')}}" > 
                        <i class="icon-user"  style="font-size:20px; padding-right:2px; font-weight:800"></i> Hi! Michael </a>
                    </li>
                   
                    <li ><a   class="ps-header__item" style="width:80px; font-size:1em; border:1px solid #eeeeee5f; color:#5b6c8f"  href="#" > 
                        <i class="icon-question" style="font-size:14px; margin-right:2px; border:2px solid #5b6c8f; border-radius:50px; padding:2px; font-weight:bolder" ></i> Help</a>
                        <li ><a   class="ps-header__item " style="width:80px; font-size:1em; border:1px solid #eeeeee5f; color:#5b6c8f"  href="{{route('carts.index')}}" > 
                            <i  style="font-size:20px; padding-right:2px; font-weight:800" class="icon-cart-empty"></i> 
                             <span class="badge cartReload" style="left:12px">cart count</span>  Cart </a>
                </ul>
                <div class="ps-header__search">
                    <form action="{{route('products.search')}}" method="get">
                        <div class="ps-search-table" style="border-radius:5px">
                            <div class="input-group">
                                <input class="form-control ps-input" value="{{old('q')}}" name="q" type="text" placeholder="Search for products">
                                <div class="input-group-append"></div> <button class="btn " style="background:#73c2fb; color:#000" type="submit"> <span style="font-size: 15px"> Search </span></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="ps-middle__text">Need help? <strong>08039366207</strong> </div>
            </div>
        </div>
    </div>
    <TopNav  />
</header>

<MobileNav />
</template>

<script setup="">
import TopNav from "./TopNav.vue"
import MobileHeader from "./MobileHeader.vue"
import MobileNav from "./MobileNav.vue"


</script>