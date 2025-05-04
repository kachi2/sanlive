<template>
<HeadTags :pageMeta="pageMeta" />
    <AppTemplate>
        <template #content>

            <div class="ps-shopping" style="background: #eee; ">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
              <accountSidebar />
                <div class="col-12 col-md-7 col-lg-8 mt-5" style="background: #fff; border-radius: 5px" id="pdfContent">
                    <div class="row">
                        
                       
                        <span class="pt-5 pl-5"> <a href="#" onclick="history.back()"> Back </a>  
                             &nbsp;  &nbsp; &nbsp; 
                              <button  onclick="window.print()" class="btn btn-outline-info" style=" left:50px"> Print Receipt</button>  
                             </span>
                               <hr style="width:100%"/> 
                        
                        <div class="col-12 col-md-12 "  id="userDetails" >
                            <span style="float:right; padding-right: 20px">
                                <img :src="`/images/${page.props.settings.site_logo}`" width="100px" >
                            </span>
                           

                            <p class=" pl-3" style="color:#050505"> 
                                First Name: {{auth.user.first_name}} <br>
                              Last Name: {{auth.user.last_name}}<br>
                              Email: {{auth.user.email}}
                            </p>
                    <hr>
                        </div>
                       
                           <div class="col-12 col-md-12 "  >
                            <p class="pl-3" style="color:#414040"> Order No: {{orders.order_no}} <br>
                             Placed On: {{orders.created_at}}<br>
                             Total Amount: {{useFunctions.addSeperator(orders.payable)}}</p>  
                          </div>
                     
                       <span class="pt-5 pl-5"> Items in Your Order    </span> 
                        
                        <div v-for="order in order_items" class="col-12 col-md-12 " >
                            <div class="ps-product ps-product--list" style="border:2px solid #d1d5dad4; border-radius:10px; margin-top:15px">
                                <div class="ps-product__content" style="border-right:0px">
                                    <div class="ps-product__thumbnil" style="">
                                        <a class="ps-product__image" href="">
                                            <figure><img :src="`/images/products/${order.image}`" style="width: 100px" :alt="order.product_name">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="ps-product__info">
                                        <p class="ps-product__tite" style="font-size:16px; color:#1e1b1b">
                                            <a class="ps-product__branch" href="#">{{order.product_name}}</a><br>
                                            <a style="color:#201c1c">Order: {{order.Order_no}}</a><br>
                                            <a style="color:#1c1818">QTY:  {{order.qty}}</a><br>
                                            {{useFunctions.addSeperator(order.payable)}}
                                        </p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="ps-categogy--list">
                                <div class="ps-product ps-product--list"
                                    style="border:2px solid #d1d5dad4; border-radius:10px">
                                    <div class="ps-product__conent" style="border-right:0px">
                                        <div class="ps-product__info"><a class="ps-product__branch" href="#"></a>
                                            <p class="ps-product__tite " style="font-size:16px; color:#262525"><a></a>

                                                Payment Information
                                            </p>
                                            <hr>
                                            <div class="ps-product__meta">
                                                <span class="ps-product__price"
                                                    style="font-size:15px; "> Payment Method: {{orders.payment_method}} </span>
                                            </div>
                                            <ul class="ps-product__list"> Payment Details
                                                <li> <span class="ps-list__title"> </span> Items Amount: {{useFunctions.addSeperator(orders.payable)}} 
                                                </li>
                                                <li> <span class="ps-list__title"> </span>Delivery Fee: {{useFunctions.addSeperator(delivery?.fee)}}
                                            </li>
                                                <li> <span class="ps-list__title"> </span>Payment Ref: {{orders.payment_ref}}
                                            </li>
                                            </ul>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="ps-categogy--list">
                                <div class="ps-product ps-product--list"
                                style="border:2px solid #d1d5dad4; border-radius:10px">
                                <div class="ps-product__conent" style="border-right:0px">
                                    <div class="ps-product__info"><a class="ps-product__branch" href="#"></a>
                                        <p class="ps-product__tite " style="font-size:16px; color:#262525"><a></a>

                              Shipping Information 
                                            
                                        </p>
                                        <hr>
                                        <div class="ps-product__meta">
                                            <span class="ps-product__price"
                                                style="font-size:15px; "> Delivery Method: {{orders.shipping_method == 'home_delivery' ? "Home delivery":"Pick-up Delivery"}} </span>
                                        </div>
                                        <ul class="ps-product__list">
                                            <li> <span class="ps-list__title"> {{shipping?.name}}</span>
                                            </li>
                                            <li> <span class="ps-list__title"> {{shipping?.phone}}</span>
                                            </li>
                                            <li> <span class="ps-list__title"> {{shipping?.address??''}}</span>
                                            </li>
                                            <!-- <li> <span class="ps-list__title"> {{shipping.city??'' + ' ' + shipping.state??'' + ' '+shipping.country??''}}</span></li> -->
                                            <li> <span class="ps-list__title"> </span>
                                                 
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

        </div>
    </div>
</div>

        </template>



    </AppTemplate>
</template>


<script setup>
import AppTemplate from '@/AppTemplate.vue'
import accountSidebar from '@/Components/accountSidebar.vue'
import {usePage} from '@inertiajs/vue3'
import useFunctions from '../useFunctions';
import HeadTags from '@/Components/headTags.vue';

const page = usePage();
const auth = page.props.auth;

const props = defineProps({
    order_items: Object,
    orders: Array,
    shipping:Object,
    delivery:Array,
    pageMeta:Object
})
</script>