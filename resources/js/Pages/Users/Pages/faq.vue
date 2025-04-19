<script setup lang="ts">
import AppTemplate from '@/AppTemplate.vue';
import HeadTags from '@/Components/headTags.vue';
import { Link } from '@inertiajs/vue3';


const props = defineProps({
    faq: Object,
    pageMeta: Object
})
</script>

<template>
           <HeadTags :pageMeta="pageMeta" />
    <AppTemplate>

        <template #content>
            <div class="ps-about">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">FAQ</li>
        </ul>
    </div>
    <div class="ps-about__content">
        <section class="ps-about__project">
            <div class="container">
              
                <section class="ps-section">
                    <div class="ps-section__cntent">
                        <div class="ps-section__desc" style="color:#09376e" v-html="faq.content">    </div>
                    </div>
                </section>
            </div>
        </section>
       
    </div>
 
</div>
        </template>
    </AppTemplate>
</template>