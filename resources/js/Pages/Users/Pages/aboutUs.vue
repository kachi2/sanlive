<script setup>
import AppTemplate from '@/AppTemplate.vue';
import HeadTags from '@/Components/headTags.vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();

const props = defineProps({
    aboutUs:Object,
    pageMeta: Object
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
                                <h2 class="ps-banner__title" >Your one and only  <br> online  Pharmacy!</h2>
                                <p>Eliminate the hassle of visiting pharmacies to find your medications.<br>  {{ page.props.settings.site_name }} delivers your prescriptions right to your doorstep with just a few simple clicks. </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="ps-about__content">
                <section class="ps-about__project">
                    <div class="container">
                        <section class="ps-section--block-grid">
                            <div class="ps-section__thumbnail"> <a class="ps-section__image" href="#"><img src="/frontend/weare.jpeg" alt=""></a></div>
                            <div class="ps-section__content">
                                <h3 class="ps-section__title">Who We Are</h3>
                                <div class="ps-section__desc">{{ page.props.settings.site_name }}  is an online pharmacy platform designed to leverage technology for the secure distribution and delivery of high-quality medications. <br> We are dedicated to playing our part in fostering a healthier Nigeria, where everyone can access quality drugs, thus positioning ourselves as the vital connection between you and your medication.

                                                    Navigating a bustling city in search of medicine can be quite a challenge. <br> {{ page.props.settings.site_name }}  offers the perfect solution. We alleviate the frustration of searching endlessly by utilizing our extensive database of drugstores and pharmacies throughout Nigeria to deliver the medications you need, wherever you may be.

                                                   <br> We are readily available through various platforms (Website, Mobile App, WhatsApp) for swift access to quality medications. <br> We also prioritize quality and safety for individuals, which has motivated us to ensure that all our staff and pharmacy partners maintain the highest standards of products and services.</div>
                                                                            
                            </div>
                        </section>
                        <section class="ps-section--block-grid row-reverse">
                            <div class="ps-section__thumbnail"> <a class="ps-section__image" href="#"><img src="/frontend/wedo.jpg" alt=""></a></div>
                            <div class="ps-section__content">
                                <h3 class="ps-section__title">What We Do</h3>
                                <div class="ps-section__desc">
                                    We collaborate with authorized manufacturers, importers, and pharmacies in Nigeria to deliver pharmaceuticals swiftly to those in need. Our goal as a distribution network is to ensure easy and uninterrupted access to medications.

                                        We provide top-notch online pharmaceutical services, including dosage advice, monitoring, and prescription refills. Our mission as a Pharma-Tech is to leverage technology to deliver high-quality pharmaceutical care directly to individuals in the comfort of their own homes.
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