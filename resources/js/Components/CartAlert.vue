<template>

<p v-if="message?.success" class="cart-success" style="color:#fff">  {{message.success}} </p>
<p  v-if="message?.error" class="cart-success"> {{message.error}} </p>

</template>

<script setup lang="ts">
import { computed, ref } from 'vue'



const props = defineProps({
    message:Object
})

</script>


<style>

.cart-error{
background:darkred;
color:#fff;
z-index: 1000;
top:10px;
padding:10px;
width: 100%;
margin:0px;
}
.cart-success{
background:#108ee9;
color:#7a1919;
z-index: 1000;
top:10px;
border-radius: 4px;
border:1px solid #ffffff53;
padding:10px;
width: 100%;
font-weight: bolder;
margin:0px;
}
</style>