<script setup lang="ts">
import AppTemplate from '@/AppTemplate.vue';
import AccountSidebar from '@/Components/accountSidebar.vue';
import { Link } from '@inertiajs/vue3';


const props = defineProps({
    addresses: Object
})

</script>

<template>

    <AppTemplate>

        <template #content>
            <div class="ps-shopping" style="background: #eee; ">
                <div class="container">
                    <div class="ps-shopping__content">
                        <div class="row">
                            <AccountSidebar />
                            <div class="col-12 col-md-8 col-lg-8 mt-5" style="background: #fff; border-radius: 5px">
                                <div class="row">
                                    <span class="pt-5 pl-5"> <a href="#" onclick="history.back()">
                                            << back </a>
                                                <hr style="width:100%"></span>
                                    <div class="col-12 col-md-11">
                                        <span style="float:right">
                                            <Link href="/account/address/create" class="btn btn-primary "> Add
                                                New Address</Link>
                                        </span>
                                    </div>

                                    <div v-if="addresses.length > 0" class="col-12 col-md-6" v-for="address in addresses" >
                                        <div class="ps-categogy--list">
                                            <div class="ps-product ps-product--list"
                                                style="border:2px solid #d1d5dad4; border-radius:10px">
                                                <div class="ps-product__conent" style="border-right:0px">
                                                    <div class="ps-product__info"><a class="ps-product__branch"
                                                        href="#"></a>
                                                    <p class="ps-product__tite " style="font-size:16px; color:#262525">
                                                        <small v-if="address.is_default == 1" style="font-size: 10px; color:rgb(117, 131, 242)">Default</small>
                                                    
                                                        <span style="float: right">
                                                            <Link :href="`/account/address/edit/${address.hashid}`">
                                                                <i class="icon-pen"></i> </Link>
                                                            <Link :href="`/account/address/delete/${address.hashid}`"
                                                                onclick="return confirm('Are you, you want to delete this Address?')">
                                                                &nbsp; &nbsp;<i class="badge badge-danger">X</i>
                                                            </Link> </span>
                                                    </p>
                                                    <div class="ps-product__meta">
                                                        <span class="ps-product__price"
                                                            style="font-size:15px; "> {{ address.name.toUpperCase() }} </span>
                                                    </div>
                                                    <ul class="ps-product__list">
                                                        <li> <span class="">
                                                            </span>{{ address.email?address.email+',':'' }}  {{ address.phone?address.phone+',':'' }}
                                                        </li>
                                                        <li>
                                                            {{ address.address}}  
                                                            <!-- {{ address.city? address.city+',':''}} -->
                                                            <!-- {{ address.state?address.state+',':'' }}  {{ address.country??'' }} -->
                                                        </li>
                                                    </ul>
                                                </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div v-else class="col-12 col-md-6" >
                                        <div class="ps-categogy--list">
                                            <div class="ps-product ps-product--list"
                                                style="border:2px solid #d1d5dad4; border-radius:10px">
                                                <div class="ps-product__conent" style="border-right:0px">
                                                    <div class="ps-product__info"><a class="ps-product__branch"
                                                            href="#"></a>
                                                        <p class="ps-product__tite "
                                                            style="font-size:16px; color:#262525"><a></a>

                                                            Shipping Address <small
                                                                style="font-size: 10px; color:rgb(117, 131, 242)">
                                                                Default</small>
                                                            <span style="float: right"> <a href=""> <i
                                                                        class="icon-pen"></i> </a> </span>
                                                        </p>
                                                        <hr>

                                                        <ul class="ps-product__list">
                                                            <li> <span class="ps-list__title"> </span>You don't have a
                                                                shippig address yet <br>
                                                                <Link href="/account/address/create" class="btn btn-primary "> Add
                                                                    New Address</Link>

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