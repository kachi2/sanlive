<script setup>
import AppTemplate from '@/AppTemplate.vue';
import HeadTags from '@/Components/headTags.vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();

const props = defineProps({
    aboutUs:Object,
    pageMeta:Object
})
</script>

<template>
 <HeadTags :pageMeta="pageMeta" />
    <AppTemplate>

        <template #content>
            <div class="ps-about">
            <div>
                <section class="ps-banner--round" >
                    <div class="ps-banner" style="height: 200px;" >
                        <div class="ps-" >
                            <div class="ps-banner__content" style="text-align: center; width: 100%; padding:20px;">
                                <h2 class="ps-banner__title" >Our Services!</h2>
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
                            <div class="ps-section__thumbnail"> <a class="ps-section__image" href="#"><img src="/frontend/chooseus.jpg"  style="width:400px; height: 300px;" alt=""></a></div>
                            <div class="ps-section__content">
                                <h3 class="ps-section__title">Why Choose Us?</h3>
                                <div class="ps-section__desc">
                                    <p>We utilize technology effectively to enhance your well-being. Access high-quality pharmaceutical services online in just seconds.</p>

                                <ul style="list-style-type: disc;">
                                 <li>   Are you too occupied to visit the pharmacy?</li>
                                 <li>   Do you struggle to obtain a specific medication or lack information about your prescriptions?</li>
                                 <li>   Perhaps you occasionally feel too unmotivated to go to the pharmacy?</li>
                                 <li>   Or maybe you feel too embarrassed to enter a pharmacy to buy items like condoms, Postinor, lubricants, and so on?</li>
                                </ul>
                                    <h4>{{ page.props.settings.site_name }} is here for you </h4>
                                </div>                                              
                            </div>
                        </section>
                        <section class="ps-section--block-grid row-reverse">
                            <div class="ps-section__thumbnail"> <a class="ps-section__image" href="#"><img src="/frontend/delivery.avif" style="width: 400px;" alt=""></a></div>
                            <div class="ps-section__content">
                                <h3 class="ps-section__title">We Deliver Fast</h3>
                                <div class="ps-section__desc">
                                    Eliminate the constant trips to the pharmacy with our quick medication delivery service. Your prescriptions and lab tests are only a few taps away when you utilize the eMedicStore App. We provide easy access to our delivery options, whether through our app or via WhatsApp chat. No matter the method you select, we are dedicated to delivering high-quality products promptly.</div>
                            </div>
                        </section>
                    </div>
                </section>

                <section class="ps-about__project">
                    <div class="container">
                        <section class="ps-section--block-grid">
                            <div class="ps-section__thumbnail"> <a class="ps-section__image" href="#"><img src="/frontend/certi.png"  style="width: 400px;" alt=""></a></div>
                            <div class="ps-section__content">
                                <h3 class="ps-section__title">We are Certified Pharmaceutical Store</h3>
                                <div class="ps-section__desc">
                                    <p>our store, your health and safety come first. We are proud to be a Certified Pharmaceutical Store, licensed and regulated to provide genuine, high-quality medications and healthcare products.</p> 

                                        Our certification ensures that:
                                        <ul>
                                       <li> ✅ All medications are sourced from trusted and approved manufacturers</li>

                                       <li> ✅ Storage conditions meet strict pharmaceutical standards</li>

                                       <li> ✅ Our staff is trained and qualified to offer safe, informed guidance</li>

                                       <li>  ✅ We comply with national health and drug control regulations</li>
                                    </ul>
                                        Whether you need prescription drugs, over-the-counter medication, or expert advice, you can count on us for reliable and professional service.

                                        Your health is in trusted hands.
                                    <h4>{{ page.props.settings.site_name }} is here for you </h4>
                                </div>                                              
                            </div>
                        </section>
                        <section class="ps-section--block-grid row-reverse">
                            <div class="ps-section__thumbnail"> <a class="ps-section__image" href="#"><img src="/frontend/geria.webp" alt=""></a></div>
                            <div class="ps-section__content">
                                <h3 class="ps-section__title">Geriatric Care</h3>
                                <div class="ps-section__desc">
                                    We provide pharmaceutical support for the elderly. Our geriatric care services include;
                                    <ul>
                                        <li>A Consultation with the patient and his or her doctor to decide what medication works best.</li>
                                        <li>Full dosage monitoring to ensure compliance.</li>
                                        <li>Automatic drug refill.</li> 
                                        <li>Periodic evaluation to decide whether to change or discontinue the medication.</li>
                                    </ul>
                                    .</div>
                            </div>
                        </section>
                    </div>
                </section>

                <section class="ps-about__project">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body" style="background: #103178;">
                                    <h3 class="ps-section__title" style="color:#fff; text-align: center;"> Our Mission</h3>
                                    <p style="color:#fff">
                                        Our vision is to revolutionize the way people access healthcare. We envision a future where individuals
                                         can easily find and purchase the medications and products they need to support their health and wellness goals.
                                          By leveraging technology and innovation, we aim to create a seamless online shopping experience that puts the power of healthcare in your hands.
                                    </p>
                              </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                 <div class="card-body" style="background: #007bff;">
                                    <h3 class="ps-section__title" style="color:#fff; text-align: center;"> Our Vision</h3>
                                    <p style="color:#fff">
                                        Our mission is to empower individuals to take control of their health and well-being. We believe that everyone deserves access to quality healthcare solutions,
                                         regardless of their location or circumstances. Through our online platform, 
                                         we aim to simplify the process of purchasing medications and healthcare products, ensuring that you receive the care you need with ease.
                                    </p>
                              </div>
                                </div>
                            </div>
                        </div>
                   
                </div>
                </section>
            </div>
     
        </div>
            
        </template>
    </AppTemplate>
</template>