<script setup>
import { Head } from '@inertiajs/vue3';
import  AppTemplate from "../AppTemplate.vue"
import Slider from '@/Components/Slider.vue';
import Category from './Home/category.vue';
</script>
<template>
    <AppTemplate> 
    <Head title="Sanlive Pharmacy" />

    <template #content> 
        <div class="ps-home ps-home--8">
        <div class="ps-home__content">
              <Slider />
              <Category />
        </div>
    </div>
    </template>
    

</AppTemplate>
</template>

