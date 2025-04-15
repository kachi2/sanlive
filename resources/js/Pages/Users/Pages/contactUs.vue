<script setup lang="ts">
import AppTemplate from '@/AppTemplate.vue';
import { Link } from '@inertiajs/vue3';


const props = defineProps({
    blogs: Object
})
</script>

<template>
    <AppTemplate>

        <template $content>
            <div class="ps-contact">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">Contact us</li>
        </ul>
        <div class="ps-contact__content">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="ps-contact__info">
                        <h2 class="ps-contact__title">How can we help you?</h2>
                        <p class="ps-contact__text">
                            Phone: {{$settings->site_phone}} <br>
                            Email: {{$settings->site_email}} <br>
                            Address: {{$settings->address}}<br>
                        </p>
                        <ul class="ps-social">
                            <li><a class="ps-social__link facebook" href="{{$settings->facebook}}"><i class="fa fa-facebook"> </i><span class="ps-tooltip">Facebook</span></a></li>
                            <li><a class="ps-social__link instagram" href="{{$settings->instagram}}"><i class="fa fa-instagram"></i><span class="ps-tooltip">Instagram</span></a></li>
                            <li><a class="ps-social__link pinterest" href="{{ $settings->pinterest}}"><i class="fa fa-pinterest-p"></i><span class="ps-tooltip">Pinterest</span></a></li>
                            <li><a class="ps-social__link linkedin" href="{{ $settings->linkedIn}}"><i class="fa fa-linkedin"></i><span class="ps-tooltip">Linkedin</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <form action="" method="post">
                        <div class="ps-form--contact">
                            <h2 class="ps-form__title">Fill up the form if you have any question</h2>
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="ps-form__group">
                                        <input class="form-control ps-form__input" type="text" placeholder="Name and Surname">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="ps-form__group">
                                        <input class="form-control ps-form__input" type="email" placeholder="Your E-mail">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="ps-form__group">
                                        <input class="form-control ps-form__input" type="text" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="ps-form__group">
                                        <textarea class="form-control ps-form__textarea" rows="5" placeholder="Message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-form__submit">
                                <button class="ps-btn ps-btn--warning">Send message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </div>
</div>
        </template>
    </AppTemplate>
</template>