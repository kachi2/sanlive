<script setup>
import { Link } from '@inertiajs/vue3';
import useFunctions from '../Users/useFunctions';


const props = defineProps({
    'products': Object
})


</script>

<template>
 <section class="ps-section--featured">
<div class="container">
        <div class="ps-noti p-2" style="border-radius:5px">
            <Link class="ps-category__image" :href="`/catalogs/${products.slug}`">     <p class="ml-2" style="color:#fff; font-weight:bold; text-align:left"> {{ products.name }} </p> </Link>
         </div>
        <div class="ps-section__content">
        <div class="row m-0">
             <div class="col-6 p-2 col-md-6 col-lg-3 pt-4" v-for=" product in products.products " >
                     <div class="ps-section__product shadow-sm "  >
                        <div class="ps-product ps-product--standard cart-card  border-gray-800 " style="background-color:#fff">
                            <div class="ps-product__thumbnail ">
                                <Link class="ps-product__image" :href="`/products/${product.slug}`" style="max-height:250px">
                                    <figure>
                                        <img :src="`/images/products/${product.image_path}`" alt="" /><img :src="`/images/products/${product.image_path}`" :alt="product.name">
                                    </figure>
                                </Link>
                                <div class="ps-product__badge">
                                </div>
                            </div>
                            <div class="ps-product__content">
                                <h5 class=""><Link :href="`/products/${product.slug}`"> {{ product.name }}</Link>
                                </h5>
                                <div class="ps-product__meta"><span class="ps-product__price sale"> {{useFunctions.addSeperator(product.sale_price)  }}</span><span class="ps-product__del">{{useFunctions.addSeperator(product.price)  }}</span>
                                </div>
                                <!-- <span class="download-note"> 
                                    <div class="row ">
                                        <div class="col-12 col-md-6 col-lg-6 p-2">
                                          <Link  class=" btn btn-lg"  :href="`/products/${product.slug}`"  style="background:#fff; color:#73c2fb; border:1px solid #73c2fb; width:100px="> <i class="fa fa-plus"> </i> Add to basket</Link>  
                                        </div>
                                        <div class="col-12 col-md-6  col-lg-6 p-2">
                                        <a target="_blank" rel="noopener noreferrer" :href="`https://wa.me/+2348058885913?text=Please i need  to order this product ${product.name} the price is: ${useFunctions.addSeperator(product.sale_price)  } `">
                                        <img src="/frontend/whatsapp.png" style="width: 90px;"> 
                                        </a>
                                        </div>
                              
                                    </div>
                         
                                </span>  -->

                                   <span class="download-note"> 
                                    <div class="row ">
                                        <div class="col-12 col-md-6 col-lg-6 p-2">
                                          <Link  class=" btn btn-lg"  :href="`/products/${product.slug}`"  style="background:#fff; color:#73c2fb; border:1px solid #73c2fb; width:100px="> <i class="fa fa-plus"> </i> Add to basket</Link>  
                                        </div>
                                        <div class="col-12 col-md-6  col-lg-6 p-2">
                                        <a target="_blank" rel="noopener noreferrer" :href="`https://wa.me/+2348058885913?text=Please i need  to order this product ${product.name} the price is: ${useFunctions.addSeperator(product.sale_price)  } `">
                                        <img src="/frontend/whatsapp.png" style="width: 90px;"> 
                                        </a>
                                        </div>
                              
                                    </div>
                         
                                </span> 
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
               
            </div>
        </div>
    
    </div>
</section>
            
</template>