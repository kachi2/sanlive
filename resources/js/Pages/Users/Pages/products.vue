<script setup >
import AppTemplate from '@/AppTemplate.vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    
    searchterm:String,
    products:Object,
    categories: Object
})

</script>

<template>

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
                                    <label class="custom-control-label" for="onSaleProduct">  <span  v-if="searchterm"> Showing {{searchterm}}  results </span> <span v-else> Showing All Results </span> </label>
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
                            <div  v-if="products.length > 0" v-for="prods in products" class="col-6 col-lg-4 col-xl-3 p-0">
                                <div class="ps-product ps-product--standard">
                                    <div class="ps-product__thumbnail"><Link class="ps-product__image" :href="`/products/${products.hashid}/${products.productUrl}`">
                                                   <figure><img :src="`/images/products/${prods.image_path}`":alt="prods.name" /><img :src="`/images/products/${prods.image_path}`" :alt="prods.name" /> 
                                            </figure>
                                        </Link>
                                        <div class="ps-product__badge">
                                            <span class="badge badge-warning"> -{{prods.discount}}%</span>
                                        </div>
                                    </div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__tite"><Link :href="`/products/${products.hashid}/${products.productUrl}`"> {{ products.name }}</Link></h5>
                                        <div class="ps-product__meta"><span class="ps-product__price">{{prods.sale_price}}</span>
                                        <span class="ps-product__price "> <small> <del> {{prods.price}}</del> </small></span>
                                        </div>
                                    </div>
                                     <center> <Link :href="`/products/${products.hashid}/${products.productUrl}`"
                                                        class="btn  btn-lg" style="background:#fff; color:#73c2fb; border:1px solid #73c2fb; width:100px"> Add to
                                                    Cart <i class="fa fa-shopping-basket"></i></Link>
                                                       <Link target="_blank" rel="noopener noreferrer" :href="`https://wa.me/+2348058885913?text=Please i need ${prods.name }, the  price on your website is ${prods.sale_price}} `">
                                                             <i class="fa fa-whatsapp" aria-hidden="true" style="font-size:20px; border:1px solid #eee; padding:5px; color:#73c2fb "> 
                                                             </i></Link> 
                                                    </center>
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
                    <div class="ps-widget ps-widget--product" style=" background: #fff;   border-radius: 10px; padding: 10px 20px;">
                        <div class="ps-widget__block">
                            <h4 class="ps-widget__title">Categories</h4><a class="ps-block-control" href="#"><i class="fa fa-angle-down"></i></a>
                            <div class="ps-widget__content ps-widget__category">
                                <ul class="menu--mobile">
                                  
                                <span v-for="cat in categories"> 
                                    <li><a :href="`/products/${products.hashid}/${products.productUrl}`" style="font-size: 14px">{{cat.name}}</a>
                                        <span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                                        <ul class="sub-menu">
                                            <span v-for="prod in cat.products"> 
                                            <li><a :href="`/products/${products.hashid}/${products.productUrl}`">{{prod.name}}</a></li>
                                            </span>
                                        </ul>
                                    </li>
                                </span>

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