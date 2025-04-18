<template>
    <AppTemplate> 
        <template #content>
<div class="ps-shopping" style="background: #eee; ">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
                <accountSidebar />
                <div class="col-12 col-md-7 col-lg-8 mt-5" style="background: #fff; border-radius: 5px">
                    <div class="row">
                    <div v-if="orders.length > 0">
                      <h3 class="p-5">  Orders   <hr style="width:100%">  </h3>
                      <div  v-for="order in orders" > 
                        <div class="col-12 col-md-12" >
                            <div class="ps-product ps-product--list" style="border:2px solid #d1d5dad4; border-radius:10px; margin-top:15px">
                                <div class="ps-product__content" style="border-right:0px">
                                    <div class="ps-product__thumbnail"><a class="ps-product__image" h :href="`/account/orders/details/${order?.Order_no}`">
                                            <figure><img :src="`/images/products/${order.image}`" :alt="order?.product_name">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="ps-product__info">
                                        <p class="ps-product__tite" style="font-size:16px; color:#262525">
                                            <Link class="ps-product__branch" :href="`/account/orders/details/${order.Order_no}`">{{ order?.product_name }}</Link><br>
                                            <Link  :href="`/account/orders/details/${order.Order_no}`" style="color:#5e5b5b">Order: {{ order?.Order_no }} </Link><br>
                                           Amount: {{ useFunctions.addSeperator(order.payable) }}
                                          <br>
                                            <span class="badge badge-success" v-if="order?.dispatch_status == 1"> delivered</span>
                                          <span class="badge badge-info" v-if="order?.dispatch_status == 0"> Awaiting Confirmation</span> 
                                             <span class="badge badge-danger" v-if="order?.dispatch_status == -1"> Cancelled</span>
                                          <span class="badge badge-primary" v-if="order?.dispatch_status == 2"> Shipped</span>
                                          
                                            <br>
                                             <span class="badge badge-success" v-if="order.is_paid == 1"> Paid</span>
                                            <span class="badge badge-warning" v-else> Not Paid</span>
                                        </p>
                                        <ul class="ps-product__list">
                                            <li> <span class="ps-list__title">Created: </span><Link class="ps-list__text" href="#">{{ order.created_at }}</Link>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="ps-product__footer" >
                                    <div class="d-none  d-xl-block ">
                                    <span style=" float:right; color:rgb(10, 10, 128)"><Link  :href="`/account/orders/details/${order.Order_no}`" style="" > View Details</Link></span> </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    </div>
                        <div class="col-12 col-md-12"  v-else>
                            <div class="ps-product ps-product--list" style="border:2px solid #d1d5dad4; border-radius:10px; margin-top:15px">
                                <div class="ps-product__content" style="border-right:0px">
                              
                              
                                    <div class="ps-product__info">
                                        <p class="ps-product__tite" style="font-size:16px; color:#262525">
                                          You don't have any order yet
                                          <br> 
                                          <a href="/catalogs" class="btn btn-primary"> Start Shopping</a>
                                        </p>
                                       

                                    </div>
                                </div>
                               
                                
                            </div>
                        </div>
                        <div class="p-5" style="float: right;"> </div>
                    </div>

                </div>



            </div>

        </div>
    </div>
</div>
</template>
</AppTemplate>
</template>

<script setup>
import AppTemplate from '@/AppTemplate.vue';
import accountSidebar from '@/Components/accountSidebar.vue';
import { Link } from '@inertiajs/vue3';
import useFunctions from '../useFunctions';


const props = defineProps({
    orders:Object
});

</script>