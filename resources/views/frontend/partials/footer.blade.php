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

<style>
/* \u2500\u2500 Footer \u2500\u2500 */
.sanlive-footer {
    font-family: inherit;
}

/* Trust strip */
.sanlive-footer__strip {
    background: #0a2250;
    border-top: 3px solid #25d366;
    padding: 12px 0;
}
.sanlive-footer__strip-inner {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 10px;
}
.strip-item {
    font-size: 12.5px;
    font-weight: 600;
    color: rgba(255,255,255,0.85);
    display: flex;
    align-items: center;
    gap: 7px;
}
.strip-item .fa { color: #25d366; font-size: 14px; }

/* Main body */
.sanlive-footer__main {
    background: #102060;
    padding: 50px 0 30px;
}
.footer-tagline {
    font-size: 13px;
    color: rgba(255,255,255,0.6);
    line-height: 1.7;
    margin-bottom: 18px;
}
.footer-contact-line {
    font-size: 13px;
    color: rgba(255,255,255,0.75);
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 9px;
}
.footer-contact-line .fa { color: #25d366; width: 14px; }
.footer-contact-line a { color: rgba(255,255,255,0.75); text-decoration: none; }
.footer-contact-line a:hover { color: #fff; }
.footer-social {
    display: flex;
    gap: 10px;
    margin-top: 18px;
}
.footer-social a {
    width: 34px;
    height: 34px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: rgba(255,255,255,0.08);
    color: rgba(255,255,255,0.75) !important;
    font-size: 14px;
    text-decoration: none !important;
    transition: background 0.15s, color 0.15s;
}
.footer-social a:hover { background: #25d366; color: #fff !important; }

/* Headings */
.footer-heading {
    font-size: 12px;
    font-weight: 800;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 18px;
    padding-bottom: 10px;
    border-bottom: 2px solid rgba(255,255,255,0.1);
    position: relative;
}
.footer-heading::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -2px;
    width: 30px;
    height: 2px;
    background: #25d366;
}

/* Links */
.footer-links {
    list-style: none;
    margin: 0;
    padding: 0;
}
.footer-links li {
    margin-bottom: 9px;
}
.footer-links li a {
    font-size: 13px;
    color: rgba(255,255,255,0.65) !important;
    text-decoration: none !important;
    transition: color 0.15s, padding-left 0.15s;
    display: flex;
    align-items: center;
    gap: 6px;
}
.footer-links li a::before {
    content: '';
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: #25d366;
    flex-shrink: 0;
    opacity: 0;
    transition: opacity 0.15s;
}
.footer-links li a:hover { color: #fff !important; }
.footer-links li a:hover::before { opacity: 1; }

/* CTA button */
.footer-cta {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    background: #25d366;
    color: #fff !important;
    font-size: 13px;
    font-weight: 700;
    border-radius: 25px;
    text-decoration: none !important;
    transition: background 0.15s, transform 0.15s;
}
.footer-cta:hover { background: #1ebe5d; transform: translateY(-2px); color: #fff !important; }

/* Bottom bar */
.sanlive-footer__bottom {
    background: #0a1a40;
    padding: 16px 0;
    border-top: 1px solid rgba(255,255,255,0.07);
}
.sanlive-footer__bottom-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
}
.footer-copy {
    font-size: 12.5px;
    color: rgba(255,255,255,0.5);
    margin: 0;
}
.footer-badges {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}
.footer-badges img {
    height: 28px;
    width: auto;
    object-fit: contain;
    filter: brightness(0) invert(1);
    opacity: 0.6;
    transition: opacity 0.15s;
}
.footer-badges img:hover { opacity: 1; }

@media (max-width: 767px) {
    .sanlive-footer__strip-inner { justify-content: flex-start; gap: 14px; }
    .sanlive-footer__bottom-inner { flex-direction: column; align-items: flex-start; }
}
</style>
