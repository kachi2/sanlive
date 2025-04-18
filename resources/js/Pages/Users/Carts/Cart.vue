<script setup >
import AppTemplate from '@/AppTemplate.vue';
import { onMounted, reactive,ref } from 'vue';
import { router,Link } from '@inertiajs/vue3';
import useFxt from '../useFunctions';
import CartAlert from '@/Components/old/CartAlert.vue';



const props = defineProps({
    carts:Object,
    latest:Object,
    cartSession:String,
    total:Number,
    message:String

})


function updateAction(param)
{
    if(param == "+")cartForm.action = "+"
    if(param == "-") cartForm.action = "-"

}


const cartForm = reactive({
    qty:0,
    cartId:0,
    action:'',
})

const isLoading = ref(false)





function updateCart(cartsData){
    cartForm.qty = cartsData.quantity;
    cartForm.cartId = cartsData.id
    isLoading.value = true;
    router.post('/updatecart', cartForm, {
        onSuccess: (page) => {
            if(page.props.flash.success){
                toastr.success(page.props.flash.success);
            sleep(2)
            isLoading.value = false;
        }else{
            toastr.error(page.props.flash.error);
        }
                toastr.options.preventDuplicates = true;
                toastr.options.progressBar = true;
            },
    })
}

function deleteCart(CartData)
{
router.get('/delete/'+CartData.id,{
    onSuccess:(page) =>{
        toastr.error(page.props.flash.error);
    }
})
}
</script>

<template>

<AppTemplate>
    <CartAlert  :message="message" />  
    <template #content>
<div class="ps-shopping" style="background: #fff">
    <div class="container">
        <div class="ps-shopping__content" >
            <div class="row" >
                <div class="col-12 col-md-7 col-lg-9 mt-5" style="background: #fff">
                <h1 class="m-4" style="font-size:12px"></h1> 
                <div class="ps-categogy--list" v-if="Object.entries(carts).length > 0">
                    <div v-for="cart in carts" :key="cart.id">  
                        <!-- {{ console.log(cart, 'cartsi sinder') }} -->
                <form  id="cartUpdate" @submit.prevent="updateCart(cart)">
                <div class="ps-product ps-product--list" style="border:2px solid #d1d5dad4; border-radius:10px">
                    <div class="ps-product__content" style="border-right:0px">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="">
                                <figure><img :src="`/images/products/${cart.associatedModel?.image_path}`" alt="">
                                </figure>
                            </a>
                        </div>
                  
                        <div class="ps-product__info"><a class="ps-product__branch" href="#">
                            {{cart?.associatedModel?.category?.name}}
                        </a>
                            <h3 class="ps-product__tite" style="font-size:16px; color:#262525"><a>
                                {{cart.name}}
                            </a></h3>
                            <div class="ps-product__meta"><span class="ps-product__price" style="font-size:15px"> </span>
                                ₦{{ useFxt.addSeperator(cart?.associatedModel?.sale_price)}}
                                <span class="ps-product__del" style="font-size:15px">
                                    ₦{{ useFxt.addSeperator(cart?.associatedModel?.price)}}
                                </span>
                            </div>
                            <ul class="ps-product__list">
                                <li> <span class="ps-list__title">SKU: </span><a class="ps-list__text" href="#">
                                    {{cart?.associatedModel?.sku}}
                                </a>
                                </li>
                            </ul>
                            <button  type="submit"  @click="updateAction('-')" value="decrement" class="ps-btn--success  decrement-btn" style="width: 30px; border-radius:3px; height:30px"> - </button> 
                            <input type="text" :value="cart.quantity"  class="qty" style="border: 1px solid #8c8a8a53; height:30px; width:30px; text-align:center"> 
                            <input type="hidden" :value="cartForm.cartId">
                            <button  type="submit"  @click="updateAction('+')"  value="increment" class="ps-btn--success  increment-btn" style="width: 30px; border-radius:3px; height:30px"> + </button> 

                           <span style="padding-left:10px"> <Link href=""  @click="deleteCart(cart)"  class="btn btn-danger"> Remove</Link></span>
                        </div>
                    </div>
                </div>
                </form>
            </div>
                </div>   
                <div class="ps-product ps-product--li" v-else>
                    <div class="ps-prod" style="border-right:0px">
              <p style="text-align: center"> 
                <i  style="font-size:50px; padding-right:2px; font-weight:800" class="icon-cart-empty"></i> 
                <br> Your cart is empty.
                You have not added any item to your cart.</p> 
                    </div>
                </div>
                </div>
                <div class="col-12 col-md-5 col-lg-3" v-if="Object.entries(carts).length > 0">
                    <div class="ps-shopping__box mt-5" style="background: #fff">
                        <div class="ps-shopping__row" >
                            <div class="ps-shopping__label">Cart Summary</div>
                        </div>

                        <div class="ps-shopping__form">
                            <div class="ps-shopping__group">
                                <input class="form-control ps-input" type="text" placeholder="County">
                            </div>
                            <div class="ps-shopping__group">
                                <input class="form-control ps-input" type="text" placeholder="Town / City">
                            </div>
                            <div class="ps-shopping__group">
                                <input class="form-control ps-input" type="text" placeholder="Postcode">
                            </div>
                        </div>
                        <div class="ps-shopping__row">
                            <div class="ps-shopping__label">Total</div>
                            <div class="ps-shopping__price">₦{{ useFxt.addSeperator(total) }}</div>
                        </div>
                        <div class="ps-shopping__text">Shipping options will be updated during checkout.</div> 
                        <div class="ps-shopping__checkout">
                        <Link class="ps-btn ps-btn--primary"  style="border-radius:5px" :href="`/checkout/${cartSession}`">Proceed to checkout</Link>
                            <Link class="ps-shopping__link" href="/catalogs">Continue Shopping</Link></div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
        </div>
<div style="height: 2em; background:#eee"></div>
<section class="ps-section--latest" style="margin-top:5px">
        <div class="container" style="background: #f4f3f33f; padding:10px; border:5px solid #ede8e836">
                <div class="ps-noti p-2" style="border-radius:5px">
                <p class="ml-2" style="color:#fff; font-weight:bold; text-align:left"> Related Products </p>
                </div>
            <div class="ps-section__carousel">
            <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
            <div v-for="products in latest" > 
                     <div class="ps-section__product shadow-sm"  >
                        <div class="ps-product ps-product--standard cart-card  border-gray-800 " style="background-color:#fff">
                            <div class="ps-product__thumbnail ">
                                <Link class="ps-product__image" :href="`/products/${products?.hashid}/${products?.productUrl}`" style="min-height:250px">
                                    <figure>
                                        <img :src="`/images/products/${products?.image_path}`" alt="" style="max-height:200px" /><img :src="`/images/products/${products?.image_path}`" :alt="products?.name">
                                    </figure>
                                </Link>
                            </div>
                            <div class="ps-product__content">
                                <h5 class=""><Link :href="`/products/${products?.hashid}/${products?.productUrl}`"> {{ products?.name }}</Link>
                                </h5>
                                <div class="ps-product__meta"><span class="ps-product__price sale"> N{{ products?.sale_price }}</span><span class="ps-product__del">N{{products?.price}}</span>
                                   <!-- <small style="color:#434242b5"> -20%</small>  -->
                              
                                </div>
                                <span class="download-note"> 
                                    <span >  <Link  class=" btn btn-lg"  :href="`/products/${products?.hashid}/${products?.productUrl}`"  style="background:#fff; color:#73c2fb; border:1px solid #73c2fb; width:100px="> <i class="fa fa-plus"> </i> Add to basket</Link>  
                                    
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
</ AppTemplate>
</template>
