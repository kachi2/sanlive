
<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    'slider': Array
})

</script>

<template>

<section class="ps-section--banner ps-banner--container">
    <div class="ps-section__overlay">
        <div class="ps-section__loading"></div>
    </div>
    <div class="owl-carousel slider-carousel" data-owl-auto="true" data-owl-loop="true" data-owl-speed="4000"
        data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1"
        data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
    
        <div v-for="slide in slider " :key="slide.index">
            <div class="ps-banner" >
                <div class="container-no-round">
                    <div class="ps-banner__block">
                        <div class="ps-banner__coMntent">
                            <!-- <h4 class="ps-banner__title text-black">{{ slide.title }}</h4> -->
                            <div class="ps-banner__desc text-"></div>
                            <div class="ps-banner__btn-group">
                            </div>
                        </div>
                         <div class="ps-banner__thumnail ps-banner__fluid">
                             <Link style="position:inherit" href="/catalogs"> 
                           <img class="ps-banner__image" :src="`/images/sliders/${slide.image_path}`" :alt="slide.title" />
                          </Link>
                        </div>
                  
                    </div>
                </div>
            </div>
        </div>

    </div>

  
</section>
</template>