<template>

    <appTemplate>

        <template #content>

            <div class="ps-shopping" style="background: #fff">
                <form action="" method="post">
                    <div class="container">
                        <div class="ps-shopping__content">
                            <div class="row">
                                <div class="col-12 col-md-7 col-lg-9 mt-5">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12 mb-0 box-shadow border-r-amber-50"
                                            style="background: #eee;  border-radius: 10px 10px 0px 0px">
                                            <p class="m-4" style="color:#000; font-weight:bolder"> Shipping Address
                                                <span style="float:right">
                                                    <a href="{{ route('checkouts.changeAddress') }}"> </a> </span>
                                            </p>
                                        </div>
                                        <div class="col-6 mb-2 card" style="background: #fff;  border:none">
                                            <p style="color:#76717a">Name: </p>
                                            <p style="color:#76717a">Address:
                                                <!-- {{ $address->address?$address->address.',': '' }} {{ $address->city?$address->city.',': '' }} 
                    {{ $address->state?$address->state.',':'' }} {{ $address->country?$address->country.',':'' }} -->
                                            </p>
                                        </div>
                                        <div class="col-6 mb-2" style="background: #fff">
                                            <p style="color:#76717a"> {{ 'Phone:' }}</p>
                                            <p style="color:#76717a"> {{ 'Email: ' }}</p>
                                        </div>


                                        <div class="col-12 col-md-12 col-lg-12 mb-0 border-r-amber-50"
                                            style="background: #eee;  border-radius: 10px 10px 0px 0px">
                                            <p class="m-4" style="color:#000; font-weight:bolder"> Delivery Details
                                            </p>
                                        </div>
                                        <div class="card" style="background:#fff; border:none;width: 100%;">
                                            <div class="card-header" id="">
                                                <label for="delivery" style="width: 100%; background: #fff">
                                                    <div style="border:0px solid #00000031; border-radius:10px">
                                                        <div class="ps-categogy--ist p-4" style="display: flex; ">
                                                            <input type="radio" id="delivery" name="delivery"
                                                                value="pickup_delivery" data-amount="0" checked>
                                                            <label for="delivery" class="pl-2"> Pick-up Delivery
                                                            </label>
                                                        </div>

                                                        <div style="">
                                                            <p class="p-4 delivery"> -
                                                                <span style="float:right; color:green"> N0 </span>
                                                            </p>
                                                            <p class="p-4 delivery"> You have to visit our office at to
                                                                pick your item</p>
                                                            <input type="hidden" name="address_id"
                                                                value="{{$address->id}}">
                                                            <input type="hidden" name="orderNo" value="{{$orderNo}}">
                                                            <input type="hidden" name="fee" value="0">
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="card" style="background:#fff; border:none; width: 100%;">
                                            <div class="card-header" id="">
                                                <label for="home" style="width: 100%">
                                                    <div style=" border-radius:10px">
                                                        <div class="ps-categogy--ist p-4" style="display: flex; ">
                                                            <input type="radio" name="delivery" id="home"
                                                                value="home_delivery" data-amount="{{$shipping_fee}}">
                                                            <input type="hidden" value="{{$shipping_fee}}"
                                                                name="shipping_cost">
                                                            <label for="home" class="pl-2"> Home Delivery Delivery
                                                            </label>
                                                        </div>
                                                        <div class="mb-5">
                                                            <p class="p-4 delivery"> Delivery between- <span
                                                                    style="float:right; color:green"> </span></p>
                                                            <p class="p-4 delivery"> Item will be shipped to your
                                                                location at
                                                                <!-- {{ $address->address?$address->address.',': '' }} {{ $address->city?$address->city.',': '' }} 
                        {{ $address->state?$address->state.',':'' }} {{ $address->country?$address->country.',':'' }}  -->
                                                            </p>
                                                            <input type="hidden" name="fee" value="{{$shipping_fee}}">
                                                        </div>
                                                    </div>
                                                </label>

                                            </div>
                                        </div>


                                        <div class="col-12 col-md-12 col-lg-12 mt-0"
                                            style="background: #eee;  border-radius: 10px 10px 0px 0px">
                                            <p class="m-4" style="color:#000; font-weight:bolder"> Select Payment
                                                Method
                                            </p>

                                        </div>
                                        <div class="col-12 col-md-12 col-lg-12  pb-3 pt-3" style="background:#fff">
                                            <div class="accordion" id="accordionExample">
                                                <div class="card">
                                                    <div class="card-header" id="headingOne">
                                                        <label data-toggle="collapse" data-target="#collapseOne"
                                                            aria-expanded="true" aria-controls="collapseOne">
                                                            <div class="row">
                                                                <div style="width: 50px; padding-left:10px">
                                                                    <input style="border-radius: 5px"
                                                                        class="@error('payment_method') is-invalid @enderror"
                                                                        type="radio"
                                                                        value="{{ old('payment_method', 'paystack') }}"
                                                                        id="paystack" name="payment_method">
                                                                </div>
                                                                <div class="col-md-6 col-lg-6 col-12">
                                                                    <strong> Secured Local Payment with Paystack
                                                                    </strong>
                                                                </div>
                                                                <div class="col-md-2 col-lg-2 col-2">
                                                                    <img src="{{ asset('frontend/paystack.webp') }}">
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
                                                                        class="@error('payment_method') is-invalid @enderror"
                                                                        type="radio"
                                                                        value="{{ old('payment_method', 'flutter') }}"
                                                                        id="paystack" name="payment_method">
                                                                </div>
                                                                <div class="col-md-6 col-lg-6 col-12">
                                                                    <strong> Secured Internation Payment with
                                                                        Flutterwave</strong>
                                                                </div>
                                                                <div class="col-md-2 col-lg-2 col-2">
                                                                    <img src="{{ asset('frontend/FLUTTER.webp') }}">
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
                                            <div class="ps-shopping__label">Cart Summary</div>
                                        </div>
                                        <div class="ps-shopping__row">
                                            <div class="ps-shopping__label">Item Total</div>
                                            <div class="ps-shopping__price">₦</div>
                                        </div>
                                        <div class="ps-shopping__row">
                                            <div class="ps-shopping__label">Delivery Fee</div>
                                            <div class="ps-shopping__price" id="fee"></div>

                                        </div>
                                        <div class="ps-shopping__row">
                                            <div class="ps-shopping__label">Total</div>
                                            <div class="ps-shopping__price" id="total"></div>
                                            <input type="hidden" id="sub_total" value={{\Cart::priceTotalFloat()}}>
                                        </div>
                                        <input type="hidden" id="amount" name="amount"
                                            value="{{\Cart::priceTotalFloat()}}">
                                        <div class="ps-shopping__checkout">
                                            <button class="ps-btn ps-btn--primary" style="border-radius:5px"
                                                href="{{route('checkout.index')}}">Complete Order</button>
                                            <a class="ps-shopping__link" href="{{route('shops.index')}}">Continue
                                                Shopping</a>
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




<script  setup>
import AppTemplate from '@/AppTemplate.vue';



</script>