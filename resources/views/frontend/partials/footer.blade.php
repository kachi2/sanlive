{{-- resources/views/frontend/partials/footer.blade.php --}}
<footer class="sanlive-footer">

    {{-- Trust Strip --}}
    <div class="sanlive-footer__strip">
        <div class="container sanlive-footer__strip-inner">
            <div class="strip-item"><i class="fa fa-check-circle"></i> PCN Licensed Pharmacy</div>
            <div class="strip-item"><i class="fa fa-truck"></i> Nationwide Doorstep Delivery</div>
            <div class="strip-item"><i class="fa fa-lock"></i> Secure &amp; Encrypted Payments</div>
            <div class="strip-item"><i class="fa fa-headphones"></i> Dedicated Customer Support</div>
        </div>
    </div>

    {{-- Main Footer Body --}}
    <div class="sanlive-footer__main">
        <div class="container">
            <div class="row">

                {{-- Col 1: Brand --}}
                <div class="col-12 col-md-4 col-lg-4 mb-4">
                    <a href="/">
                        <img src="{{ asset('images/'.$settings->site_logo) }}" alt="{{ $settings->site_name }}" style="height:50px; margin-bottom:16px; border-radius:6px;">
                    </a>
                    <p class="footer-tagline">Nigeria's trusted online pharmacy — delivering genuine medicines, vitamins &amp; healthcare products to your doorstep.</p>
                    <div class="footer-contact-line"><i class="fa fa-phone"></i> <a href="tel:{{ $settings->site_phone }}">{{ $settings->site_phone }}</a></div>
                    <div class="footer-contact-line"><i class="fa fa-envelope-o"></i> <a href="mailto:{{ $settings->site_email }}">{{ $settings->site_email }}</a></div>
                    <div class="footer-contact-line"><i class="fa fa-map-marker"></i> Lagos, Nigeria</div>
                    <div class="footer-social">
                        @if($settings->facebook)
                        <a href="{{ $settings->facebook }}" target="_blank" rel="noopener noreferrer" title="Facebook"><i class="fa fa-facebook"></i></a>
                        @endif
                        @if($settings->instagram)
                        <a href="{{ $settings->instagram }}" target="_blank" rel="noopener noreferrer" title="Instagram"><i class="fa fa-instagram"></i></a>
                        @endif
                        @if($settings->linkedIn)
                        <a href="{{ $settings->linkedIn }}" target="_blank" rel="noopener noreferrer" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                        @endif
                        <a href="https://wa.me/+2348058885913" target="_blank" rel="noopener noreferrer" title="WhatsApp"><i class="fa fa-whatsapp"></i></a>
                    </div>
                </div>

                {{-- Col 2: Quick Links --}}
                <div class="col-6 col-md-2 col-lg-2 mb-4">
                    <h6 class="footer-heading">Quick Links</h6>
                    <ul class="footer-links">
                        <li><a href="{{ route('users.index') }}">Home</a></li>
                        <li><a href="{{ route('products.search') }}">All Products</a></li>
                        <li><a href="/page/services">Our Services</a></li>
                        <li><a href="{{ route('AboutUs') }}">About Us</a></li>
                        <li><a href="{{ route('contactUs') }}">Contact Us</a></li>
                        <li><a href="{{ route('blogs.index') }}">Blog</a></li>
                        <li><a href="{{ route('faq.index') }}">FAQ</a></li>
                    </ul>
                </div>

                {{-- Col 3: Account --}}
                <div class="col-6 col-md-2 col-lg-2 mb-4">
                    <h6 class="footer-heading">My Account</h6>
                    <ul class="footer-links">
                        <li><a href="{{ route('users.account.index') }}">My Account</a></li>
                        <li><a href="{{ route('users.orders') }}">My Orders</a></li>
                        <li><a href="{{ route('users.account.address') }}">Address Book</a></li>
                        <li><a href="{{ route('users.order.payments') }}">Payments</a></li>
                        <li><a href="{{ route('PrivacyPolicy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('pages.terms') }}">Terms &amp; Conditions</a></li>
                    </ul>
                </div>

                {{-- Col 4: Services --}}
                <div class="col-12 col-md-4 col-lg-4 mb-4">
                    <h6 class="footer-heading">Healthcare Services</h6>
                    <ul class="footer-links mb-4">
                        <li><a href="{{ route('products.search') }}">Buy Medicines Online</a></li>
                        <li><a href="{{ route('user.prescription') }}">Upload Prescription</a></li>
                        <li><a href="{{ route('contactUs') }}">Special Medication Request</a></li>
                        <li><a href="https://wa.me/+2348058885913" target="_blank" rel="noopener noreferrer">Chat a Pharmacist</a></li>
                    </ul>
                    <a href="{{ route('user.prescription') }}" class="footer-cta">
                        <i class="fa fa-upload"></i> Upload Your Prescription
                    </a>
                </div>

            </div>
        </div>
    </div>

    {{-- Bottom Bar --}}
    <div class="sanlive-footer__bottom">
        <div class="container sanlive-footer__bottom-inner">
            <p class="footer-copy">{{ '© '.date('Y').' Sanlive Pharmacy. All rights reserved.' }}</p>
            <div class="footer-badges">
                <img src="/images/paystack_logo.png" alt="Paystack" title="Paystack">
                <img src="/images/mastercard.png" alt="Mastercard" title="Mastercard">
                <img src="/images/visa.png" alt="Visa" title="Visa">
                <img src="/images/pcn.png" alt="PCN Licensed" title="PCN Licensed">
                <img src="/images/nafdac.png" alt="NAFDAC" title="NAFDAC">
                <img src="/images/secure_ssl.png" alt="SSL Secure" title="SSL Secure">
            </div>
        </div>
    </div>

</footer>

