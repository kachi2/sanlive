<template>
     <HeadTags :pageMeta="pageMeta" />
    <appTemplate>
        <template #content>
            <div class="ps-shopping" style="background: #fff">
                <form action=""  @submit.prevent="proceedToCheckout">
                    <div class="container">
                        <div class="ps-shopping__content">
                            <div class="row">
                                <div class="col-12 col-md-7 col-lg-9 mt-5 p-5">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12" style="background: #fff; border-radius: 10px; border: 2px solid #eee;">
                                            <p class="m-4" style="color: #332d2d">
                                                <i class="fa fa-check-square-o" style="color: rgb(79, 81, 79); "></i>
                                                Customer Address
                                                <span style="float: right">
                                                    <Link href="/checkout/address/index"> </Link> 
                                                </span>
                                            </p>
                                            <hr />
                                            <div class="row m-3">
                                                <div class="col-12 col-md-6">
                                                    <div class="ps-form__group">
                                                        <p style="color: #76717a;">
                                                            <span style="font-weight: bold;">Name:  </span>{{ address.name }}
                                                        </p>
                                                        <p style=" color: #76717a;">
                                                            <span style="font-weight: bold;"> Address: </span>
                                                            {{ address.address?address.address: '' }} {{ address.city?address.city: '' }} 
                                                            {{ address.state?address.tate:'' }} {{ address.country?address.country:'' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-1">
                                                    <div class="ps-form__group">
                                                        <p style="color: #76717a; ">
                                                            <span style="font-weight: bold;">Phone: </span> {{address.phone }}
                                                        </p>
                                                        <p style=" color: #76717a;">
                                                            <span style="font-weight: bold;">Email: </span>  {{address.email }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-12 col-lg-12 mt-3" style="
                                                background: #fff;
                                                border-radius: 10px;
                                                border: 2px solid #eee;">
                                            <p class="m-4" style="color: rgb(114, 111, 111); ">
                                                <i class="fa fa-check-square-o" style="color: rgb(114,111,111);"></i>
                                                Delivery Details
                                            </p>
                                            <hr />
                                            <label for="delivery" style=" width: 100%; background: #fff; ">
                                                <div style=" border: 0px solid #00000031; border-radius: 10px;">
                                                    <div class="ps-categogy--ist p-4" style="display: flex">
                                                        <input type="radio" id="delivery" name="delivery"  @click="isSelected('pickup')" 
                                                            value="pickup_delivery" data-amount="0"  required/>
                                                        <label for="delivery" class="pl-2">
                                                            Pick up Station - N0 fee
                                                        </label>
                                                    </div>
                                                </div>
                                                <span class="card ml-3">
                                                    <span class="card-body">
                                                        <small style=" border-bottom: 1px solid #000; padding: 2px; ">You can pick your Item</small>
                                                        <p> No 29, Doyin Omololu Street, Alapere, Ketu,Lagos, Nigeria.</p>
                                                    </span>
                                                </span>
                                            </label>

                                            <label for="home" style=" width: 100%; background: #fff; ">
                                                <div style=" border: 0px solid #00000031; border-radius: 10px;">
                                                    <div class="ps-categogy--ist p-4" style="display: flex">
                                                        <input type="radio" id="home" name="delivery"   @click="isSelected('delivery')"
                                                            value="home_delivery" data-amount="0"  />
                                                        <label for="home" class="pl-2">
                                                            Home Delivery - N{{useFunctions.addSeperator(shipping_fee)}} fee
                                                        </label>
                                                    </div>
                                                </div>
                                                <span class="card ml-3">
                                                    <span class="card-body">
                                                        <small style=" border-bottom: 1px solid #000; padding: 2px; ">Item will be shipped to your address</small>
                                                        <p> No 12 odo isuti road, igando, lagos</p>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>

                                        <div class="col-12 col-md-12 col-lg-12 mt-3" style=" background: #fff; border-radius: 10px; border: 2px solid #eee;">
                                            <p class="m-4" style="  color: rgb(114, 111, 111); ">
                                                <i class="fa fa-check-square-o" style="color: rgb(114,111,111);"></i>
                                                Payment Method
                                            </p>
                                            <div class="accordion" id="accordionExample">
                                                <div class="card">
                                                    <div class="card-header" id="headingOne">
                                                        <label data-toggle="collapse" data-target="#collapseOne"
                                                            aria-expanded="true" aria-controls="collapseOne">
                                                            <div class="row">
                                                                <div style="width: 50px; padding-left:10px">
                                                                    <input style="border-radius: 5px"
                                                                        :class="{'is-invalid':form.errors.payment_method}"
                                                                        type="radio"
                                                                        value="paystack"
                                                                        v-model="form.payment_method"
                                                                        id="paystack" name="payment_method" required>
                                                                </div>
                                                                <div class="col-md-6 col-lg-6 col-12">
                                                                    <strong> Secured Local Payment with Paystack
                                                                    </strong>
                                                                </div>
                                                                <div class="col-md-2 col-lg-2 col-2">
                                                                    <img src="/frontend/paystack.webp">
                                                                </div>

                                                            </div>
                                                        </label>
                                                        <div id="collapseOne" class="collapse "
                                                            aria-labelledby="headingOne"
                                                            data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <small> Pay with Paystack with your local Nigerian card
                                                                    <br> Your information is secured
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion" id="accordionExampleTwo">
                                                <div class="card">
                                                    <div class="card-header" id="headingTwo">
                                                        <label data-toggle="collapse" data-target="#collapseTwo"
                                                            aria-expanded="true" aria-controls="collapseTwo">
                                                            <div class="row">
                                                                <div style="width: 50px; padding-left:10px">
                                                                    <input style="border-radius: 5px"
                                                                        :class="{'is-invalid':form.errors.payment_method}"
                                                                        type="radio"
                                                                        value="flutter"
                                                                        v-model="form.payment_method"
                                                                        id="paystack" name="payment_method">
                                                                </div>
                                                                <div class="col-md-6 col-lg-6 col-12">
                                                                    <strong> Secured Internation Payment with
                                                                        Flutterwave</strong>
                                                                </div>
                                                                <div class="col-md-2 col-lg-2 col-2">
                                                                    <img src="/frontend/FLUTTER.webp">
                                                                </div>

                                                            </div>
                                                        </label>
                                                        <div id="collapseTwo" class="collapse"
                                                            aria-labelledby="headingTwo"
                                                            data-parent="#accordionExampleTwo">
                                                            <div class="card-body">
                                                                <small>
                                                                    Pay with Flutterwave for both local and internation
                                                                    cards,
                                                                    your card <br> information is secured
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-5 col-lg-3">
                                    <div class="ps-shopping__box mt-5" style="background: #fff">
                                        <div class="ps-shopping__row">
                                            <div class="ps-shopping__label">
                                                Cart Summary
                                            </div>
                                        </div>
                                        <div class="ps-shopping__row">
                                            <div class="ps-shopping__label">
                                                Item Total
                                            </div>
                                            <div class="ps-shopping__price">
                                                {{ useFunctions.addSeperator(total)}}
                                            </div>
                                        </div>
                                        <div class="ps-shopping__row">
                                            <div class="ps-shopping__label">
                                                Delivery Fee
                                            </div>
                                            <div class="ps-shopping__price" id="fee"> {{  useFunctions.addSeperator(shipping_fees)??0 }}</div>
                                        </div>
                                        <div class="ps-shopping__row">
                                            <div class="ps-shopping__label">
                                                Total
                                            </div>
                                            <div class="ps-shopping__price" id="total">{{  useFunctions.addSeperator(CartTotal) }}</div>
                                            <input type="hidden" id="sub_total" :value="CartTotal" />
                                        </div>
                                        <input type="hidden" id="amount" name="amount"
                                            v-model="form.amount"  />
                                        <input type="hidden" name="orderNo" :value="orderNo">
                                        <div class="ps-shopping__checkout">
                                            <button v-if="!isLoading" class="ps-btn ps-btn--primary" style="border-radius: 5px">
                                                Complete Order
                                            </button>
                                            <button v-else class="ps-btn ps-btn--primary" style="border-radius: 5px">
                                               Please wait ....
                                            </button>
                                            <Link class="ps-shopping__link" href="/catalogs">Continue
                                                Shopping</Link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </template>
    </appTemplate>
</template>

<script setup>
import AppTemplate from "@/AppTemplate.vue";
import {router, Link, useForm} from "@inertiajs/vue3"
import useFunctions from "../useFunctions";
import { computed, reactive, ref, watch} from "vue";
import HeadTags from "@/Components/headTags.vue";


const props = defineProps({
        data: Object,
        address: Object,
        orderNo: Number,
        shipping_fee: String,
        total:Number,
        pageMeta: Object
})

const shipping_fees = ref(0)


let CartTotal = ref(props.total)
const amounts = ref(CartTotal.value)

const isLoading = ref(false)
function isSelected(param){
    if(param == "delivery")
        {
        shipping_fees.value = props.shipping_fee
         CartTotal.value = parseInt(props.total) + parseInt(props.shipping_fee)
         amounts.value = CartTotal.value
           
        }else{    
            CartTotal.value = parseInt(props.total)
            shipping_fees.value = 0
            amounts.value = CartTotal.value
        } 
    return  CartTotal.value
    }


    const form = useForm({
        delivery:'',
        payment_method: '',
        amount:computed(() =>  amounts.value),
        orderNo:props.orderNo

    })



    function proceedToCheckout()
    {
        isLoading.value = true
        form.post('/checkout/payment', {
            onSuccess:(page) => {
            if(page.props.flash.success){
                isLoading.value = false
                toastr.success(page.props.flash.success)
            }else{
            toastr.error(page.props.flash.error)
            }
            }
        
        })
    }

</script>
