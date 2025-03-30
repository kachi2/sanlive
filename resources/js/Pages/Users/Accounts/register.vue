<template>
    <appTemplate>
        <template #content>
<div class="ps-shopping" style="background: #fff">
    <div class="container">
        <div class="ps-shopping__content">

            <form @submit.prevent="CreateUser">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-9 mt-5 p-5">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12" style="background: #fff; border-radius:10px; border:2px solid #eee">
                            <p class="m-4" style="color:#332d2d"> <i class="fa fa-check-square-o"
                                    style="color:rgb(79, 81, 79)"></i>
                                Shipping Information </p>
                            <hr>
                            <div class="row m-3">
                                <div class="col-12 col-md-6 ">
                                    <div class="ps-form__group">
                                        <label for="name" style="color:rgb(114, 111, 111)"> Full Name</label>
                                        <input style="border-radius: 5px"  :class="{'is-invalid': form.errors.name}" class="form-control  ps-form__input" type="text"
                                             placeholder="Full name"  name="name" v-model="form.name">

                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mt-1">
                                    <div class="ps-form__group">
                                        <label for="phone" style="color:rgb(114, 111, 111)"> Phone Number</label>
                                        <input class="form-control ps-form__input" type="text"
                                            placeholder="Phone Number"   :class="{'is-invalid': form.errors.phone}"  id="phone"  v-model="form.phone" name="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="row m-3">

                                <div class="col-12 col-md-6 mt-1">
                                    <div class="ps-form__group">
                                        <label for="email" style="color:rgb(114, 111, 111)"> Email Address</label>
                                        <input class="form-control ps-form__input " type="email"
                                            placeholder="Email Address"  id="email"   :class="{'is-invalid': form.errors.email}"  v-model="form.email" name="email">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mt-1">
                                    <div class="ps-form__group">
                                        <label id="address" style="color:rgb(114, 111, 111)"> Full Address </label>
                                        <input  class="form-control ps-form__input " type="text"
                                            placeholder="Full Address" id="address"   :class="{'is-invalid': form.errors.address}"  v-model="form.address" name="address">
                                    </div>
                                </div>
                               
                            </div>
                            <!-- <div class="m-4" style="">
                                <button class="ps-btn ps-btn--primary w-50" style="border-radius: 5px; border:2px solid #eee">Proceed to checkout</button>
                            </div> -->
                        </div>
                  

                        <div class="col-12 col-md-12 col-lg-12 mt-3" style="background: #fff;  border-radius:10px; border:2px solid #eee">
                            <p class="m-4" style="color:rgb(114, 111, 111)"> <i class="fa fa-check-square-o"
                                style="color:rgb(114, 111, 111)"></i> Shipping Method</p>

                        </div>

                        <div class="col-12 col-md-12 col-lg-12 mt-3" style="background: #fff;  border-radius:10px; border:2px solid #eee">
                            <p class="m-4" style="color:rgb(114, 111, 111)"><i class="fa fa-check-square-o"
                                style="color:rgb(114, 111, 111)"></i> Payment Method</p>

                        </div>
                    </div>
                </div>
                    <div class="col-12 col-md-5 col-lg-3 mt-5">
                        <div class="ps-shopping__box mt-5" style="background: #fff">
                            <div class="ps-shopping__row">
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
                                <div class="ps-shopping__price">₦{{useFxt.addSeperator(total)}}</div>
                            </div>
                            <div class="ps-shopping__text">Shipping options will be updated during checkout.</div>

                            <div class="ps-shopping__checkout"><button class="ps-btn ps-btn--primary"
                                    style="border-radius:5px">Proceed to
                                    checkout</button>
                                <a class="ps-shopping__link" href="{{ route('shops.index') }}">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
              
            </div>
        </form>

        </div>
    </div>
</div>
<div style="height: 2em; background:#eee"></div>


        </template>


    </appTemplate>


</template>

<script  setup>

import AppTemplate from '@/AppTemplate.vue';
import {reactive} from "vue"
import useFxt from '../useFunctions';
import {router, Link, useForm} from "@inertiajs/vue3"


const props = defineProps({
    carts: Object,
    total: Number
})


const form = useForm({
    name:'',
    email: '',
    phone:'',
    address:''  
})

function CreateUser()
{
    form.post('/checkout/shippinginformation')
}
</script>

<style>
.labl {
    display: block;
}

.labl>input {
    /* HIDE RADIO */
    visibility: hidden;
    position: absolute;
}

.labl>input+div {
    /* DIV STYLES */
    cursor: pointer;
    border: 2px solid transparent;
}

.labl>input:checked+div {
    /* (RADIO CHECKED) DIV STYLES */
    background-color: #ffd6bb;
    border: 1px solid #ff6600;
}
</style>