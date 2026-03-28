<template>
<Head>
    <title>{{ pageMeta.title }} - Sanlive Pharmacy</title>
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