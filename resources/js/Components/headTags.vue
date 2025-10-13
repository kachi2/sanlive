<template> 
<Head>
    <title > {{ pageMeta.title }}</title>
    <meta property="title" :content="pageMeta.metaTitle">
    <meta name="description" :content="pageMeta.description??'Get all your medications delivered to your doorstep from your number one online pharmacy store in Lagos Nigeria- Sanlive Pharmacy and Stores. Fast delivery and affordable medication'" />
    <meta name="keywords" :content="pageMeta.keywords" />
    <meta property="og:title" :content="pageMeta.metaTitle??'Sanlive Pharmacy: The largest and biggest online pharmacy marketplace that you can trus'" />
    <meta property="og:description" :content="pageMeta.description??'Get all your medications delivered to your doorstep from your number one online pharmacy store in Lagos Nigeria- Sanlive Pharmacy and Stores. Fast delivery and affordable medication'" />
    <meta property="og:image" :content="pageMeta.image_url" />
    <meta property="og:url" :content="pageMeta.url" />
    <link rel="canonical" :href="pageMeta.url" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" :content="pageMeta.metaTitle??'Sanlive Pharmacy: The largest and biggest online pharmacy marketplace that you can trust'" />
    <meta name="twitter:description" :content="pageMeta.description??'Get all your medications delivered to your doorstep from your number one online pharmacy store in Lagos Nigeria- Sanlive Pharmacy and Stores. Fast delivery and affordable medication'" />
    <meta name="twitter:image" :content="pageMeta.image_url" />
     <meta name="robots" :content="pageMeta.robots || 'index, follow'" />
    <meta name="mobile-web-app-capable" content="yes">
</Head>
<Pwa />
</template>

<script setup>
import Pwa from '@/Pages/pwa.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    pageMeta: Object
})
</script>