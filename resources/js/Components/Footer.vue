<template>
    <footer class="ps-footer ps-footer--8" style="background-image: url('/frontend/footer.png'); background-repeat: no-repeat;background-size: cover;" >
<div class="container" >
    <div class="ps-footer__middle" >
        <div class="row">
            <div class="col-12 col-md-7">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="ps-footer--address">
                            <div class="ps-logo"><Link href="">  <img :src="`/images/${page.props.settings?.site_logo}`"  alt="">
                                <img class="logo-white":src="`/images/${page.props.settings?.site_logo}`"   style="border-radius: 5px" alt="">
                                <img class="logo-black" src="" style="border-radius: 5px"  alt="">
                                <img class="logo-white-all" :src="`/images/${page.props.settings?.site_logo}`"   style="border-radius: 5px" alt="">
                                <img class="logo-green" :src="`/images/${page.props.settings?.site_logo}`" style="border-radius: 5px"  alt="" >
                            </Link></div>
                            <p>{{ page.props.settings?.title }}</p>
                        
                            <p >Follow Us</p>
                            <ul class="ps-social">
                                <li><Link class="ps-social__link facebook" :href="`${page.props.settings?.facebook}`"><i class="fa fa-facebook"> </i><span class="ps-tooltip">Facebook</span></Link></li>
                                <li><Link class="ps-social__link instagram"  :href="`${page.props.settings?.instagram}`"><i class="fa fa-instagram"></i><span class="ps-tooltip">Instagram</span></Link></li>
                                <li><Link class="ps-social__link pinterest"  :href="`${page.props.settings?.pinterest}`"><i class="fa fa-pinterest-p"></i><span class="ps-tooltip">Pinterest</span></Link></li>
                                <li><Link class="ps-social__link linkedin"  :href="`${page.props.settings?.linkedin}`"><i class="fa fa-linkedin"></i><span class="ps-tooltip">Linkedin</span></Link></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="ps-footer--contact">
                            <h5 class="ps-footer__title">Need help</h5>
                            <div class="ps-footer__work" style="color:#fff" ><i class="icon-telephone"></i> {{page.props.settings?.site_phone}}</div>
                            <p class="ps-footer__work" style="color:#fff"> <i class="icon-envelope-open"></i>  {{page.props.settings?.site_email}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="row">
                    <div class="col-6 col-md-4">
                        <div class="ps-footer--block">
                            <h5 class="ps-block__title" >Account</h5>
                            <ul class="ps-block__list">
                                <li><Link href="/accounts/index">My account</Link></li>
                                <li><Link href="/account/orders">My orders</Link></li>
                                <li><Link href="/account/address">Address Book</Link></li>
                                <li><Link href="/account/order/payments">Payments</Link></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="ps-footer--block">
                            <h5 class="ps-block__title">Help Links</h5>
                            <ul class="ps-block__list">
                                <li><Link href="/pages/about">About Us</Link></li>
                                <li><Link href="/pages/privacypolicy">Privacy Policy</Link></li>
                                <li><Link href="/pages/terms">Terms &amp; Conditions</Link></li>
                                <li><Link href="/pages/contactus">Contact Us</Link></li>
                                <li><Link href="/blogs">Blogs</Link></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-footer--bottom">
        <div class="row">
            <div class="col-12 col-md-5">
                <p > {{page.props.settings.site_copyright}}</p>
            </div> 
            <div class="col-12 col-md-7 text-right" >
                <img src="/images/paystack_logo.png"  width="50px" alt="">
                <img class="payment-light" src="/images/paystack.png"      width="50px"alt="">
                <img class="payment-light" src="/images/nafdac.png"      width="50px"alt="">
                <img class="payment-light" src="/images/secure_ssl.png"  width="50px" alt="">
                <img class="payment-light" src="/images/mastercard.png"  width="50px"alt="">
                <img class="payment-light" src="/images/visa.png"  width="50px" alt="">
                <img class="payment-light" src="/images/pcn.png"  width="50px"alt="">
            </div>
        </div>
    </div>
</div>
</footer>
</template>

<script setup>
import { usePage,Link } from '@inertiajs/vue3';


const page = usePage()

</script>