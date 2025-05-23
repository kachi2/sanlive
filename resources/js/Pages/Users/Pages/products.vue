<script setup >
import AppTemplate from '@/AppTemplate.vue';
import { Link } from '@inertiajs/vue3';
import useFunctions from '../useFunctions';
import HeadTags from '@/Components/headTags.vue';

const props = defineProps({
    
    searchterm:String,
    products:Object,
    categories: Object,
    pageMeta: Object
})


</script>

<template>
 <HeadTags :pageMeta="pageMeta" />
    <AppTemplate>

        <template #content>

            <div class="ps-categogy ps-categogy--dark" style="background: #e8e8e8;">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="">Home</a></li>
            <li class="ps-breadcrumb__item"><a href="">Category</a></li>
            <li class="ps-breadcrumb__item"><a href="">Products</a></li>
        </ul>
        <div class="ps-categogy__content">
            <div class="row row-reverse">
                <div class="col-12 col-md-9" style="
                background: #fff;
                padding: 10px;
                border-radius: 10px; top:-40px">
                    <div class="ps-categogy__wrapper">
                      
                        <div class="ps-categogy__onsale">
                            <form>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="onSaleProduct" checked >
                                    <label class="custom-control-label" for="onSaleProduct">  <span  v-if="searchterm">  {{searchterm}} </span> <span v-else> Showing All Results </span> </label>
                                </div>
                            </form>
                        </div>
                        <div class="ps-categogy__sort">
                            <form><span>Sort by</span>
                                <select class="form-select">
                                    <option selected="">Latest</option>
                                    <option value="Popularity">Popularity</option>
                                </select>
                            </form>
                        </div>
                       
                    </div>
                    <div class="ps-categogy--grid">
                        <div class="row m-0">
                            <div  v-if="products.length > 0" v-for="prods in products" class="col-6 col-lg-4  col-md-4 col-xl-4">
                                <div class="ps-product ps-product--standard pb-3">
                                    <div class="ps-product__thumbnail"><Link class="ps-product__image" :href="`/products/${prods.hashid}/${prods.productUrl}`">
                                                   <figure><img :src="`/images/products/${prods.image_path}`":alt="prods.name" /><img :src="`/images/products/${prods.image_path}`" :alt="prods.name" /> 
                                            </figure>
                                        </Link>
                                        <!-- <div class="ps-product__badge">
                                            <span class="badge badge-warning"> -{{prods.discount}}%</span>
                                        </div> -->
                                    </div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__tite"><Link :href="`/products/${prods.hashid}/${prods.productUrl}`"> {{ prods.name }}</Link></h5>
                                        <div class="ps-product__meta">
                                            <span class="ps-product__price sale"> {{useFunctions.addSeperator(prods.sale_price)  }}</span>
                                            <span class="ps-product__del">{{useFunctions.addSeperator(prods.price)  }}</span>
                                        </div>
                                    </div>
                                      <Link :href="`/products/${prods.hashid}/${prods.productUrl}`"
                                            class="btn  btn-lg" style="background:#fff; color:#73c2fb; border:1px solid #73c2fb; width:100px"> Add to
                                        Cart <i class="fa fa-shopping-basket"></i></Link>
                                            <Link target="_blank" rel="noopener noreferrer" :href="`https://wa.me/+2348058885913?text=Please i need ${prods.name }, the  price on your website is ${prods.sale_price}} `">
                                                  <!-- <span  style="background:#fff; color:#73c2fb; border:1px solid #73c2fb; width:80px" class="btn" > Order Via   <i class="fa fa-whatsapp" aria-hidden="true" style="font-size:10px; padding:10px; color:#73c2fb "> 
                                                </i> </span> -->
                                                  &nbsp;  &nbsp;  <img src="/frontend/whatsapp.png" style="width: 90px;padding: 0px;"> 
                                                </Link>   
                                </div>
                            </div> 
                            <div v-else class="ps-delivery ps-delivery--info" >
                                <div class="ps-delivery__content">
                                    <div class="ps-delivery__text"> <i class="icon-shield-check"></i><span> <strong>No Item found </strong></span></div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-3" style="top:-40px">
                    <div class="ps-widget ps-widget--product" style="
                    background: #fff;
                    border-radius: 10px;
                    padding: 10px 20px;">
                        <div class="ps-widget__block">
                            <h4 class="ps-widget__title">Categories</h4><a class="ps-block-control" href="#"><i class="fa fa-angle-down"></i></a>
                            <div class="ps-widget__content ps-widget__category">
                                <ul class="menu--mobile">
                                    <li v-for="cat in categories">
                                        <Link :href="`/catalogs/${cat.productUrl}-${cat.hashid}`" style="font-size: 14px">{{cat.name}}</Link><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                                        <ul class="sub-menu">
                                            <li v-for="prod in cat.products">
                                                <Link :href="`/products/${products.hashid}/${products.productUrl}`">{{prod.name}}</Link>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
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