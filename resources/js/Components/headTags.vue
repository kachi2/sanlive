<template>
<Head>
    <title>{{ pageMeta.title }} - Sanlive Pharmacy</title>
    <meta name="description" :content="pageMeta.description ?? 'Get all your medications delivered to your doorstep from the No. 1 online pharmacy store in Lagos Nigeria - Sanlive Pharmacy and Stores.'" />
    <meta name="keywords" :content="pageMeta.keywords" />
    <meta name="robots" :content="pageMeta.robots || 'index, follow'" />
    <meta property="og:type" content="website" />
    <meta property="og:title" :content="pageMeta.metaTitle ?? pageMeta.title" />
    <meta property="og:description" :content="pageMeta.description ?? 'Get all your medications delivered to your doorstep from the No. 1 online pharmacy store in Lagos Nigeria - Sanlive Pharmacy and Stores.'" />
    <meta property="og:image" :content="pageMeta.image_url" />
    <meta property="og:url" :content="pageMeta.url" />
    <link rel="canonical" :href="pageMeta.url" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" :content="pageMeta.metaTitle ?? pageMeta.title" />
    <meta name="twitter:description" :content="pageMeta.description ?? 'Get all your medications delivered to your doorstep from the No. 1 online pharmacy store in Lagos Nigeria - Sanlive Pharmacy and Stores.'" />
    <meta name="twitter:image" :content="pageMeta.image_url" />
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