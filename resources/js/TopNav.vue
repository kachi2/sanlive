<template>
    <div class="ps-navigation" style="background:aliceblue; border-top:1px solid #e4e8ee; border-bottom:1px solid #e4e8ee ">
    <div class="container">
        <div class="ps-navigation__left">
            <nav class="ps-main-menu" >
                <ul class="menu">
                    <li class="has-mega-menu"><a href="{{route('products.search')}}" style="font-size:0.9em"> <i class="fa fa-bars"></i>All Categories<span class="sub-toggle"></span></a>
                    </li>
                    <li><a style="font-size:0.9em; "  href="{{ route('index')}}">Home</a></li>
                    <li><a style="font-size:0.9em; "  href="{{ route('AboutUs')}}">About Us</a></li>
                    <li><a style="font-size:0.9em;"  href="{{ route('contactUs')}}">Contact Us</a></li>
                    <li><a style="font-size:0.9em;" href="{{ route('blogs.index')}}">Blog</a></li>
                    <li><a style="font-size:0.9em;" href="{{ route('faq.index')}}">FAQ</a></li>

                </ul>
            </nav>
        </div>
        <div class="ps-navigation__right">Need help?  <i class="fa fa-phone"> </i><strong>09089898989</strong></div>
    </div>
</div>

</template>