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
            <div class="ps-about">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">Terms and Conditions</li>
        </ul>
    </div>
    <div class="ps-about__content">
        <section class="ps-about__project">
            <div class="container">
                {{-- <h2 class="ps-about__title">Your home medical provider now also online</h2> --}}
                <section class="ps-section">
                    <div class="ps-section__cntent">
                        <div class="ps-section__desc" style="color:#09376e">    {!! $terms->content !!}</div>
                    </div>
                </section>
            </div>
        </section>
       
    </div>
 
</div>
        </template>
    </AppTemplate>
</template>