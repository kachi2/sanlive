{{-- resources/views/frontend/partials/footer.blade.php --}}
<footer class="ps-footer ps-footer--8" style="background-image: url('/frontend/footer.png'); background-repeat: no-repeat; background-size: cover;">
    <div class="container">
        <div class="ps-footer__middle">
            <div class="row">
                <div class="col-12 col-md-7">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="ps-footer--address">
                                <div class="ps-logo">
                                    <a href="/">
                                        <img src="{{ asset('images/'.$settings->site_logo) }}" alt="{{ $settings->site_name }}">
                                        <img class="logo-white" src="{{ asset('images/'.$settings->site_logo) }}" style="border-radius: 5px" alt="">
                                        <img class="logo-black" src="" style="border-radius: 5px" alt="">
                                        <img class="logo-white-all" src="{{ asset('images/'.$settings->site_logo) }}" style="border-radius: 5px" alt="">
                                        <img class="logo-green" src="{{ asset('images/'.$settings->site_logo) }}" style="border-radius: 5px" alt="">
                                    </a>
                                </div>
                                <p>{{ $settings->title }}</p>
                                <p>Follow Us</p>
                                <ul class="ps-social">
                                    <li><a class="ps-social__link facebook" href="{{ $settings->facebook }}"><i class="fa fa-facebook"></i><span class="ps-tooltip">Facebook</span></a></li>
                                    <li><a class="ps-social__link instagram" href="{{ $settings->instagram }}"><i class="fa fa-instagram"></i><span class="ps-tooltip">Instagram</span></a></li>
                                    <li><a class="ps-social__link pinterest" href="{{ $settings->pinterest }}"><i class="fa fa-pinterest-p"></i><span class="ps-tooltip">Pinterest</span></a></li>
                                    <li><a class="ps-social__link linkedin" href="{{ $settings->linkedIn }}"><i class="fa fa-linkedin"></i><span class="ps-tooltip">Linkedin</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="ps-footer--contact">
                                <h5 class="ps-footer__title">Need help</h5>
                                <div class="ps-footer__work" style="color:#fff"><i class="icon-telephone"></i> {{ $settings->site_phone }}</div>
                                <p class="ps-footer__work" style="color:#fff"><i class="icon-envelope-open"></i> {{ $settings->site_email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="ps-footer--block">
                                <h5 class="ps-block__title">Account</h5>
                                <ul class="ps-block__list">
                                    <li><a href="{{ route('users.account.index') }}" rel="nofollow">My account</a></li>
                                    <li><a href="{{ route('users.orders') }}" rel="nofollow">My orders</a></li>
                                    <li><a href="{{ route('users.account.address') }}" rel="nofollow">Address Book</a></li>
                                    <li><a href="{{ route('users.order.payments') }}" rel="nofollow">Payments</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="ps-footer--block">
                                <h5 class="ps-block__title">Help Links</h5>
                                <ul class="ps-block__list">
                                    <li><a href="{{ route('AboutUs') }}" rel="nofollow">About Us</a></li>
                                    <li><a href="{{ route('PrivacyPolicy') }}" rel="nofollow">Privacy Policy</a></li>
                                    <li><a href="{{ route('pages.terms') }}" rel="nofollow">Terms &amp; Conditions</a></li>
                                    <li><a href="{{ route('contactUs') }}" rel="nofollow">Contact Us</a></li>
                                    <li><a href="{{ route('blogs.index') }}">Blogs</a></li>
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
                    <p>{{ $settings->site_copyright }}</p>
                </div>
                <div class="col-12 col-md-7 text-right">
                    <img src="/images/paystack_logo.png" width="50px" alt="">
                    <img class="payment-light" src="/images/paystack.png" width="50px" alt="">
                    <img class="payment-light" src="/images/nafdac.png" width="50px" alt="">
                    <img class="payment-light" src="/images/secure_ssl.png" width="50px" alt="">
                    <img class="payment-light" src="/images/mastercard.png" width="50px" alt="">
                    <img class="payment-light" src="/images/visa.png" width="50px" alt="">
                    <img class="payment-light" src="/images/pcn.png" width="50px" alt="">
                </div>
            </div>
        </div>
    </div>
</footer>
