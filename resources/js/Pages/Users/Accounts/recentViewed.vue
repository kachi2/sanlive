<script setup lang="ts">
import AppTemplate from '@/AppTemplate.vue';
import AccountSidebar from '@/Components/accountSidebar.vue';
import { Link } from '@inertiajs/vue3';


const props = defineProps({
    recent:Object
})
</script>

<template>
    <AppTemplate>

<template #content>
 <div class="ps-shopping" style="background: #eee; ">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
                <AccountSidebar />
                <div class="col-12 col-md-7 col-lg-8 mt-5" style="background: #fff; border-radius: 5px">

                    <div class="row">
                        <span class="pt-5 pl-5"> <a href="#" onclick="history.back()"> << back  </a> <hr style="width:100%"></span>
                        
                       <div class="ps-categogy--grid">
                        <div class="row m-0">
                            <div v-if="recent.length > 0" v-for="product in recent" class="col-6 col-lg-4 col-xl-3 p-0">
                                <div class="ps-product ps-product--standard">
                                    <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                            <figure><img :src="`/images/products/${product.image_path}`" :alt="product.name">
                                            </figure>
                                        </a>
                                        <div class="ps-product__badge">
                                            <div class="ps-badge ps-badge--sale">-{{product.discount}}%</div>
                                        </div>
                                    </div>
                                    <div class="ps-product__content">
                                        <Link :href="`/products/${product.slug}`"> {{product.category.name}} </Link>

                                        <h5 class="ps-product__ttle"><Link :href="`/products/${product.slug}`">{{product.name}}</Link></h5>
                                        <div class="ps-product__meta"><span class="ps-product__price sale">{{product.sale_price}}</span><span class="ps-product__del">{{product.price}}</span>
                                        </div>
                                      <center>  <Link :href="`/products/${product.slug}`" class="btn btn-primary"> Add To Cart</Link></center>  
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
        </template>



    </AppTemplate>
</template>