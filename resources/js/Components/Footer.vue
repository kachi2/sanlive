<template>
    <footer class="ps-footer ps-footer--8" style="background: #73c2fb">
<div class="container">
    <div class="ps-footer__middle" >
        <div class="row">
            <div class="col-12 col-md-5">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="ps-footer--address">
                            <div class="ps-logo"><a href=""> <img src="" style="border-radius: 5px" alt="">
                                <img class="logo-white" src=""  style="border-radius: 5px" alt="">
                                <img class="logo-black" src="" style="border-radius: 5px"  alt="">
                                <img class="logo-white-all" src=""  style="border-radius: 5px" alt="">
                                <img class="logo-green" src="" style="border-radius: 5px"  alt="" ></a></div>
                            <div class="ps-footer__title">Our store</div>
                            <p style="color:#000"></p>
                            <ul class="ps-social">
                                <li><a class="ps-social__link facebook" style="color:#000" href=""><i class="fa fa-facebook"> </i><span class="ps-tooltip">Facebook</span></a></li>
                                <li><a class="ps-social__link instagram" style="color:#000" href=""><i class="fa fa-instagram"></i><span class="ps-tooltip">Instagram</span></a></li>
                                <li><a class="ps-social__link pinterest" style="color:#000" href=""><i class="fa fa-pinterest-p"></i><span class="ps-tooltip">Pinterest</span></a></li>
                                <li><a class="ps-social__link linkedin" style="color:#000" href=""><i class="fa fa-linkedin"></i><span class="ps-tooltip">Linkedin</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="ps-footer--contact">
                            <h5 class="ps-footer__title">Need help</h5>
                            <div class="ps-footer__work" style="color:#000"><i class="icon-telephone"></i></div>
                            <p class="ps-footer__work" style="color:#000"></p>
                          
                  
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7">
                <div class="row">
                    <div class="col-6 col-md-4">
                        <div class="ps-footer--block">
                            <h5 class="ps-block__title" style="color:#000">Categories</h5>
                            <ul class="ps-block__list">
                                <!-- @forelse ($site_categories->take(5) as $menus) -->
                                <li><a href=""></a></li>
                                <!-- @empty
                                @endforelse -->
                               
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="ps-footer--block">
                            <h5 class="ps-block__title" style="color:#000">Account</h5>
                            <ul class="ps-block__list">
                                <li><a href="">My account</a></li>
                                <li><a href="">My orders</a></li>
                                <li><a href="">Address Book</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="ps-footer--block">
                            <h5 class="ps-block__title" style="color:#000">Help Links</h5>
                            <ul class="ps-block__list">
                                <li><a href="">About Us</a></li>
                                <li><a href="">Privacy Policy</a></li>
                                <li><a href="">Terms &amp; Conditions</a></li>
                                <li><a href="">Contact Us</a></li>
                                <li><a href="">Blogs</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-footer--bottom">
        <div class="row">
            <div class="col-12 col-md-5" style="background: #">
                <p style="color:#000"></p>
            </div> 
            <div class="col-12 col-md-7 text-right" style="background: #">
                <img src="'/images/paystack_logo.png'"  width="50px" alt="">
                <img class="payment-light" src="/images/paystack.png"      width="50px"alt="">
                <img class="payment-light" src="/images/nafdac.png"      width="50px"alt="">
                <img class="payment-light" src="/images/secure_ssl.png"  width="50px" alt="">
                <img class="payment-light" src="images/mastercard.png"  width="50px"alt="">
                <img class="payment-light" src="images/visa.png"  width="50px" alt="">
                <img class="payment-light" src="/images/pcn.png"  width="50px"alt="">
            </div>
        </div>
    </div>
</div>
</footer>
</template>