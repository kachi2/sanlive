{{-- resources/views/frontend/partials/footer.blade.php --}}


<footer class="sanlive-footer">
              
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
                    <p class="footer-tagline">Trusted Online Pharmacy in Nigeria – Fast & Reliable Medicine Delivery</p>
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
                    <a href="{{ route('user.prescription') }}" class="footer-cta footer-rx-cta">
                        <span class="footer-rx-cta__icon">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="12" y1="18" x2="12" y2="12"/><polyline points="9 15 12 12 15 15"/></svg>
                        </span>
                        Upload Your Prescription
                    </a>
                    <style>
                    .footer-cta.footer-rx-cta { gap: 10px; padding: 6px 20px 6px 6px; background: #fff; color: #103178 !important; font-size: 14px; font-weight: 700; border-radius: 999px; box-shadow: 0 4px 14px rgba(0,0,0,.2); transition: box-shadow .15s, transform .15s; }
                    .footer-cta.footer-rx-cta:hover { background: #fff; color: #103178 !important; transform: translateY(-2px); box-shadow: 0 8px 22px rgba(0,0,0,.3); }
                    .footer-rx-cta__icon { display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%; background: #25a244; color: #fff; transition: background .15s; }
                    .footer-rx-cta:hover .footer-rx-cta__icon { background: #1e8a38; }
                    </style>
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

