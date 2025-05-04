<script setup>
import { Head } from '@inertiajs/vue3';
import  AppTemplate from "../AppTemplate.vue"
import Slider from '@/Components/Slider.vue';
import Category from './Home/category.vue';
import { onMounted } from 'vue';
import ProductList from './Home/ProductList.vue';
import HeadTags from '@/Components/headTags.vue';


onMounted(() => {
    $('.slider-carousel').owlCarousel({
      items: 1,
      loop: true,
      autoplay: true
    });

    $('.category-carousel').owlCarousel({
      responsive: {
    0: {
      items: 2 
    },
    600: {
      items: 4 
    },
    1000: {
      items: 6 
    }
  },
      loop: true,
      autoplay: true
    });
  });

const props = defineProps({
    'sliders': Object,
    'categories': Object,
    'category': Object,
    'pageMeta': Object,
});

</script>
<template> 
  <HeadTags :pageMeta="pageMeta" />
  <AppTemplate>
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

