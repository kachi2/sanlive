<template>
<HeadTags :pageMeta="pageMeta" />
    <AppTemplate>
    
        <template #content>
    
            <div class="ps-shopping" style="background: #eee; ">
        <div class="container">
            <div class="ps-shopping__content">
                <div class="row">
                <AccountSidebar />
                    <div class="col-12 col-md-7 col-lg-8 mt-5" style="background: #fff; border-radius: 5px">
                       <form action="" @submit.prevent="CreateAddress">
                        
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12" style="background: #fff; border-radius:10px">
                                <p class="m-4" style="color:#332d2d"> <i class="fa fa-check-square-o"
                                        style="color:rgb(79, 81, 79)"></i>
                                    Edit Address </p>
                                <hr>
                                <div class="row m-3">
                                    <div class="col-12 col-md-6 ">
                                        <div class="ps-form__group">
                                            <label for="name" style="color:rgb(114, 111, 111)"> Full Name</label>
                                            <input style="border-radius: 5px" class="form-control ps-form__input " type="text"
                                                v-model="form.name"   :class="{'is-invalid': form.errors.phone}"  placeholder="Full name" id="name" name="name">
                                                <span class="badge bg-warning"> {{form.errors.name}} </span>
                                            </div>
                                       
                                    </div>
                                    <div class="col-12 col-md-6 mt-1">
                                        <div class="ps-form__group">
                                            <label for="phone" style="color:rgb(114, 111, 111)"> Phone Number</label>
                                            <input class="form-control ps-form__input" :class="{'is-invalid': form.errors.phone}" type="text"
                                                placeholder="Phone Number" id="phone"  v-model="form.phone" name="phone">
                                                <span class="badge bg-warning"> {{form.errors.phone}} </span>
                                            </div>
                                    </div>
                                   
                                </div>
                                <div class="row m-3">
                                     <div class="col-12 col-md-6 mt-1">
                                        <div class="ps-form__group">
                                            <label for="email" style="color:rgb(114, 111, 111)"> Email Address</label>
                                            <input class="form-control ps-form__input  " :class="{'is-invalid': form.errors.email}" type="email"
                                                placeholder="Email Address"  id="email" v-model="form.email" name="email">
                                                <span class="badge bg-warning" role="error">
                                            {{form.errors.email}}
                                        </span>
                                            </div>
                                       
                                    </div>
                                    <div class="col-12 col-md-6 mt-1">
                                        <div class="ps-form__group">
                                            <label id="address" style="color:rgb(114, 111, 111)"> Full Address </label>
                                            <input class="form-control ps-form__input" :class="{'is-invalid': form.errors.address}" type="text"
                                                placeholder="Full Address" id="address" v-model="form.address" name="address">
                                                <span class="badge bg-warning" role="error">
                                            {{form.errors.address}}
                                        </span>
                                        </div>
                                    </div>
                                 
                                    <div class="  " style="display: flex; color:rgb(114, 111, 111); align-items:center;">
                                         <input style="color:rgb(114, 111, 111); width:18px" value="1" type="checkbox" v-model="form.is_default" name="is_default" id="is_default">  
                                         <label for="" class="pl-2"> Set as Default Address  </label> 
                                        </div>
                                    <div class="m-4" style="float: right;">
                                        <button class="ps-btn ps-btn--success w-100" style="border-radius: 5px"> Create Address</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                       </form>
    
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
    import AccountSidebar from '@/Components/accountSidebar.vue';
import HeadTags from '@/Components/headTags.vue';
    import { router, useForm } from '@inertiajs/vue3';
    
    const props = defineProps({
        address: Object,
        pageMeta: Object
    })
    
    const form = useForm({
        name:'',
        phone:'',
        email:'',
        address:'',
        is_default:'',
    })
    
    
    function CreateAddress() 
    { 
        form.post('/account/address/store', {
            onSuccess:(page)  => {
                if(page.props.flash.success){
                    toastr.success(page.props.flash.success);
                }else{
                    toastr.error(page.props.flash.error);
                }
            }
        });
    }
    
    </script>