<script setup lang="ts">
import AppTemplate from '@/AppTemplate.vue';
import { onMounted, reactive } from 'vue';

const props = defineProps({
    carts:Object,
    latest:Array,
    cartSession:String

})

const form = reactive({
    qty:0,
})


// onMounted( () => {
//     form.qty = 

// });

console.log(props.carts, 'carts items' )
</script>

<template>

<AppTemplate>
    <template #content>
<div class="ps-shopping" style="background: #eee">
    <div class="container">
        <div class="ps-shopping__content" >
            <div class="row" >
                <div class="col-12 col-md-7 col-lg-9 mt-5" style="background: #fff">
                <h1 class="m-4" style="font-size:12px"></h1> 
                <div class="ps-categogy--list">
                    <div v-for="cart in carts" :key="cart.id">  
                        {{ console.log(cart, 'cartsi sinder') }}
                <form action="" method="post" id="cartUpdate">
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
                                {{cart?.associatedModel?.sale_price}}
                                <span class="ps-product__del" style="font-size:15px">
                                    {{cart?.associatedModel?.price}}
                                </span>
                            </div>
                            <ul class="ps-product__list">
                                <li> <span class="ps-list__title">SKU: </span><a class="ps-list__text" href="#">
                                    {{cart?.associatedModel?.sku}}
                                </a>
                                </li>
                            </ul>
                            <button  type="submit" name="qty" value="{{$cart->qty -1 }}" class="ps-btn--success  decrement-btn" style="width: 30px; border-radius:3px; height:30px"> - </button> 
                            <input type="text" :value="cart.quantity"  class="qty" style="border: 1px solid #8c8a8a53; height:30px; width:30px; text-align:center"> 
                            <input type="hidden" min="0" name="cartId" value="{{$cart->rowId}}">
                            <button  type="submit" name="qty" value="{{$cart->qty + 1}}" class="ps-btn--success  increment-btn" style="width: 30px; border-radius:3px; height:30px"> + </button> 

                           <span style="padding-left:10px"> <a href="{{route('carts.delete', $cart->rowId)}}"   class="btn btn-danger"> Remove</a></span>
                        </div>
                    </div>
                </div>
                </form>
            </div>
                </div>   
                <div class="ps-product ps-product--li">
                    <div class="ps-prod" style="border-right:0px">
              <p style="text-align: center"> 
                <i  style="font-size:50px; padding-right:2px; font-weight:800" class="icon-cart-empty"></i> 
                <br> Your cart is empty.
                You have not added any item to your cart.</p> 
                    </div>
                </div>
                </div>
                <div class="col-12 col-md-5 col-lg-3">
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
                            <div class="ps-shopping__price">₦</div>
                        </div>
                        <div class="ps-shopping__text">Shipping options will be updated during checkout.</div> 
                       
                        <div class="ps-shopping__checkout">
                        <a class="ps-btn ps-btn--success"  style="border-radius:5px" href="{{route('checkout.index',$cartSession)}}">Proceed to checkout</a>
                            <a class="ps-shopping__link" href="{{route('products.search')}}">Continue Shopping</a></div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
        </div>
<div style="height: 2em; background:#eee"></div>
<section class="ps-section--latest" style="margin-top:5px">
    <div class="container" style="background: #f4f3f33f; padding:10px; border:5px solid #ede8e836">
        <h1 class="" style="font-size: 20px; color:#000;">Latest Products</h1>
        <div class="ps-section__carousel">
            <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                @forelse ($latest as $prod)
                <div class="ps-section__product">
                    <div class="ps-product ps-product--standard">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                    <figure><img src="{{asset('images/products/'.$prod->image_path)}}" alt="{{$prod->name}}" /><img src="{{asset('images/products/'.$prod->image_path)}}" alt="{{$prod->name}}" />
                                </figure>
                            </a>
                            <div class="ps-product__badge" style="right:20px; ">
                                <div class="ps-badge ps-badge--hot" style="background: rgb(225, 136, 136); border-radius:3px; padding:0 0;">
                                    <!-- -{{number_format($prod->discount)}}% -->
                                </div>
                            </div>
                        </div>
                        <div class="ps-product__content">
                            <h5 class="ps-p"><a href="product1.html">
                                <!-- {{$prod->name}} -->
                            </a></h5>
                            <div class="ps-product__meta"><span class="ps-pr">
                                <!-- {{moneyFormat($prod->sale_price)}}    -->
                                <span style="font-size:15px"> <del>
                                     <!-- {{moneyFormat($prod->price)}} -->
                                    </del></span></span>
                            </div>
                            <div class="ps-product__actions ps-product__group-mobile">
                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a></div>
                            </div>
                           <center> <a href="{{route('users.products',[$prod->hashid, $prod->productUrl])}}" class="btn btn-success"> Add to Cart</a></center> 
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
