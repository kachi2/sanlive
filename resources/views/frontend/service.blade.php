@extends('layouts.app')


@section('content')
<div class="ps-about">
    <div>
        <section class="ps-banner--round">
            <div class="ps-banner" style="height:200px">
                <div class="ps-">
                    <div class="ps-banner__content" style="text-align: center; width: 100%; padding:20px;">
                        <h1 class="ps-banner__title">Our Services &ndash; Reliable Healthcare Solutions</h1>
                        <p>As a pharmaceutical technology firm, all of our offerings are centered around leveraging technology to deliver pharmaceutical services, <br> particularly in the distribution and delivery of medications. As an online pharmacy, we ensure that your medications reach you. </p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="ps-about__content">
        <section class="ps-about__project">
            <div class="container">
                <section class="ps-section--block-grid">
                    <div class="ps-section__thumbnail">
                        <a class="ps-section__image" href="#"><img src="/frontend/chooseus.jpg" style="width:400px; height:300px" alt="Why Choose Us"></a>
                    </div>
                    <div class="ps-section__content">
                        <h3 class="ps-section__title">Why Choose Us?</h3>
                        <div class="ps-section__desc">
                            <p>We utilize technology effectively to enhance your well-being. Access high-quality pharmaceutical services online in just seconds.</p>
                            <ul style="list-style-type:disc">
                                <li>Are you too occupied to visit the pharmacy?</li>
                                <li>Do you struggle to obtain a specific medication or lack information about your prescriptions?</li>
                                <li>Perhaps you occasionally feel too unmotivated to go to the pharmacy?</li>
                                <li>Or maybe you feel too embarrassed to enter a pharmacy to buy certain items?</li>
                            </ul>
                            <h4>{{ $settings->site_name }} is here for you</h4>
                        </div>
                    </div>
                </section>

                <section class="ps-section--block-grid row-reverse mt-5">
                    <div class="ps-section__thumbnail">
                        <a class="ps-section__image" href="#"><img src="/frontend/delivery.avif" style="width:400px" alt="Fast Delivery"></a>
                    </div>
                    <div class="ps-section__content">
                        <h3 class="ps-section__title">We Deliver Fast</h3>
                        <div class="ps-section__desc">
                            Eliminate the constant trips to the pharmacy with our quick medication delivery service.
                            Your prescriptions and lab tests are only a few taps away. No matter the method you select,
                            we are dedicated to delivering high-quality products promptly.
                        </div>
                    </div>
                </section>
            </div>
        </section>

        <section class="ps-about__project">
            <div class="container">
                <section class="ps-section--block-grid">
                    <div class="ps-section__thumbnail">
                        <a class="ps-section__image" href="#"><img src="/frontend/certi.png" style="width:400px" alt="Certified Pharmacy"></a>
                    </div>
                    <div class="ps-section__content">
                        <h3 class="ps-section__title">We are Certified Pharmaceutical Store</h3>
                        <div class="ps-section__desc">
                            <p>Your health and safety come first. We are proud to be a Certified Pharmaceutical Store, licensed and regulated to provide genuine, high-quality medications.</p>
                            <ul>
                                <li>✅ All medications are sourced from trusted and approved manufacturers</li>
                                <li>✅ Storage conditions meet strict pharmaceutical standards</li>
                                <li>✅ Our staff is trained and qualified to offer safe, informed guidance</li>
                                <li>✅ We comply with national health and drug control regulations</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <section class="ps-section--block-grid row-reverse mt-5">
                    <div class="ps-section__thumbnail">
                        <a class="ps-section__image" href="#"><img src="/frontend/geria.webp" alt="Geriatric Care"></a>
                    </div>
                    <div class="ps-section__content">
                        <h3 class="ps-section__title">Geriatric Care</h3>
                        <div class="ps-section__desc">
                            We provide pharmaceutical support for the elderly. Our geriatric care services include:
                            <ul>
                                <li>Consultation with the patient and doctor to decide what medication works best.</li>
                                <li>Full dosage monitoring to ensure compliance.</li>
                                <li>Automatic drug refill.</li>
                                <li>Periodic evaluation to decide whether to change or discontinue the medication.</li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </section>

        <section class="ps-about__project">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body" style="background:#103178">
                                <h3 class="ps-section__title" style="color:#fff; text-align:center">Our Mission</h3>
                                <p style="color:#fff">
                                    Our vision is to revolutionize the way people access healthcare — creating a seamless
                                    online shopping experience that puts the power of healthcare in your hands.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body" style="background:#007bff">
                                <h3 class="ps-section__title" style="color:#fff; text-align:center">Our Vision</h3>
                                <p style="color:#fff">
                                    To empower individuals to take control of their health. Everyone deserves access to quality
                                    healthcare solutions, regardless of location or circumstances.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
