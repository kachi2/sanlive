<template> 
<Head>
    <title > {{ pageMeta.title }}</title>
    <meta property="title" content="Sanlive Pharmacy: The largest and biggest online pharmacy marketplace that you can trust.">
    <meta name="description" :content="pageMeta.description" />
    <meta name="keywords" :content="pageMeta.keywords" />
    <meta property="og:title" :content="pageMeta.metaTitle" />
    <meta property="og:description" :content="pageMeta.description" />
    <meta property="og:image" :content="pageMeta.image_url" />
    <meta property="og:url" :content="pageMeta.url" />
    <link rel="canonical" :href="pageMeta.url" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" :content="pageMeta.metaTitle" />
    <meta name="twitter:description" :content="pageMeta.description" />
    <meta name="twitter:image" :content="pageMeta.image_url" />
</Head>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    pageMeta: Object
})
</script>