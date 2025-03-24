<script setup>
import { Link } from '@inertiajs/vue3';


const props = defineProps({

    'products': Object
})

console.log(props.products, 'category products')
</script>

<template>
 <section class="ps-section--featured">
<div class="container">
        <div class="ps-noti p-2" style="border-radius:5px">
            <p class="ml-2" style="color:#fff; font-weight:bold; text-align:left"> {{ products.name }} </p>
         </div>
        <div class="ps-section__content">
        <div class="row m-0">
         
             <div class="col-12 col-md-6 col-lg-3 pt-4" v-for=" product in products.products " >
                     <div class="ps-section__product shadow-sm "  >
                        <div class="ps-product ps-product--standard cart-card  border-gray-800 " style="background-color:#fff">
                            <div class="ps-product__thumbnail ">
                                <Link class="ps-product__image" :href="`/products/${product.hashid}/${product.productUrl}`" style="min-height:250px">
                                    <figure>
                                        <img :src="`/images/products/${product.image_path}`" alt="" /><img :src="`/images/products/${product.image_path}`" :alt="product.name">
                                    </figure>
                                </Link>
                                <div class="ps-product__badge">

                                </div>
                            </div>
                            <div class="ps-product__content">
                                <h5 class=""><Link :href="`/products/${product.hashid}/${product.productUrl}`"> {{ product.name }}</Link>
                                </h5>
                                <div class="ps-product__meta"><span class="ps-product__price sale"> 3599</span><span class="ps-product__del">232323</span>
                                   <!-- <small style="color:#434242b5"> -20%</small>  -->
                              
                                </div>
                                <span class="download-note"> 
                                    <span >  <Link  class=" btn btn-lg"  :href="`/products/${product.hashid}/${product.productUrl}`"  style="background:#fff; color:#73c2fb; border:1px solid #73c2fb; width:100px="> <i class="fa fa-plus"> </i> Add to basket</Link>  
                                    
                                    <a target="_blank" rel="noopener noreferrer" href="https://wa.me/+2348058885913?text=Please i need , the  price on your website is  ">
                                                           <i class="fa fa-whatsapp" aria-hidden="true" style="font-size:23px;  padding-left:15px; color:#73c2fb; float:right "> 
                                        </i></a>
                                  </span> 
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