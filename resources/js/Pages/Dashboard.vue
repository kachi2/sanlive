<script setup>
import { Head } from '@inertiajs/vue3';
import  AppTemplate from "../AppTemplate.vue"
import Slider from '@/Components/Slider.vue';
import Category from './Home/category.vue';
import ProductList from './Home/ProductList.vue';


const props = defineProps({
    'sliders': Array,
    'data': Array
});

console.log(props.sliders)
</script>
<template>
    <AppTemplate> 
    <Head>
        <title> Home</title>
    </Head>

    <template #content> 
        <div class="ps-home ps-home--8">
        <div class="ps-home__content">
            
              <Slider  :slider="props.sliders"/>
              <Category :category="props.data"/>

              
              <ProductList />
              <ProductList />
              <ProductList />
              <ProductList />
        </div>
    </div>
    </template>
    

</AppTemplate>
</template>

