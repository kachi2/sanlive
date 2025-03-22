<script setup>
import { Head } from '@inertiajs/vue3';
import  AppTemplate from "../AppTemplate.vue"
import Slider from '@/Components/Slider.vue';
import Category from './Home/category.vue';
import ProductList from './Home/ProductList.vue';


const props = defineProps({
    'sliders': Array,
    'categories': Array,
    'category': Array
});

// console.log(props.categories)
</script>
<template>
    <AppTemplate> 
    <Head>
        <title> Home</title>
    </Head>

    <template #content> 
        <div class="ps-home ps-home--8">
        <div class="ps-home__content">
            
              <Slider  :slider="sliders"/>
              <Category :categories="categories"/>
             
              <ProductList v-for="cat in category"  :products="cat" />
            
        </div>
    </div>
    </template>
    

</AppTemplate>
</template>

