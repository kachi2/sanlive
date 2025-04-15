<script setup>
import AppTemplate from '@/AppTemplate.vue';
import AccountSidebar from '@/Components/accountSidebar.vue';
import { useForm } from '@inertiajs/vue3';


const props = defineProps({
    user: Object
})

console.log(props.user, 'users data')

const form = useForm({
    first_name: props.user.first_name,
    last_name: props.user.last_name,
    phone: props.user.phone,
    city: props.user.city,
    country: props.user.country,
    oldpassword:'',
    password: '',
})


function submitSettings(){
form.post('/accounts/settings/update',{
    onSuccess:(page)  => {
    if(page.props.flash.success){
        toastr.success(page.props.flash.success);
    }else{
        toastr.error(page.props.flash.error);
    }
        }

}
)
}
</script>

<template>

<AppTemplate>

    <template #content>
<div class="ps-shopping" style="background: #eee; ">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
              <AccountSidebar />
                <div class="col-12 col-md-7 col-lg-8 mt-5" style="background: #fff; border-radius: 5px">
                   <form  @submit.prevent="submitSettings">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12" style="background: #fff; border-radius:10px">
                          <span class="mt-4">Account Settings </span>
                            <hr>
                            <div class="row m-3">
                                <div class="col-12 col-md-6 ">
                                    <div class="ps-form__group">
                                        <label for="name" style="color:rgb(114, 111, 111)"> First Name</label>
                                        <input style="border-radius: 5px" class="form-control ps-form__input " :class="{'is-invalid': form.errors.first_name}" type="text"
                                            v-model="form.first_name" placeholder="First name" id="name" name="first_name">
                                            <span class="badge bg-warning">
                                        {{form.errors.first_name}}
                                    </span>
                                        </div>
                                  
                                </div>
                                <div class="col-12 col-md-6 mt-1">
                                    <div class="ps-form__group">
                                        <label for="name" style="color:rgb(114, 111, 111)"> Last Name</label>
                                        <input style="border-radius: 5px" class="form-control ps-form__input" :class="{'is-invalid': form.errors.last_name}" type="text"
                                            v-model="form.last_name" placeholder="Last name"  name="last_name">
                                            <span class="badge bg-warning">
                                        {{form.errors.last_name}}
                                    </span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mt-1">
                                    <div class="ps-form__group">
                                        <label for="phone" style="color:rgb(114, 111, 111)"> Phone Number</label>
                                        <input style="border-radius: 5px" class="form-control ps-form__input" :class="{'is-invalid': form.errors.phone}" type="text"
                                            v-model="form.phone" placeholder="Phone Number" name="phone">
                                            <span class="badge bg-warning">
                                        {{form.errors.phone}}
                                    </span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mt-1">
                                    <div class="ps-form__group">
                                        <label id="city" style="color:rgb(114, 111, 111)"> City</label>
                                        <input class="form-control ps-form__input" :class="{'is-invalid': form.errors.city}" type="text"
                                            placeholder="Enter City and State"  id="city" v-model="form.city" name="city">
                                    
                                            <span class="badge bg-warning">
                                        {{form.errors.city}}
                                    </span>
                                        </div>
                                </div>
                                <div class="col-12 col-md-6 mt-1">
                                    <div class="ps-form__group">
                                        <label id="country" style="color:rgb(114, 111, 111)">Country </label>
                                        <input class="form-control ps-form__input" :class="{'is-invalid':form.errors.country}" type="text"
                                            placeholder="Country"  id="country" v-model="form.country"  name="country">
                                            <span class="badge bg-warning">
                                        {{form.errors.country}}
                                    </span>
                                        </div>
                                    
                                </div>
                                <div class="col-12 col-md-6 mt-1">
                                    <div class="ps-form__group">
                                        <label id="oldpassword" style="color:rgb(114, 111, 111)">Old Password</label>
                                        <input class="form-control ps-form__input" :class="{'is-invalid': form.errors.oldpassword}" type="password"
                                            placeholder="Old password"  id="oldpassword" v-model="form.oldpassword" name="oldpassword" autocomplete="off">
                                            <span class="badge bg-warning">
                                        {{form.errors.oldpassword}}
                                    </span>
                                        </div>
                                   
                                </div>

                                <div class="col-12 col-md-6 mt-1">
                                    <div class="ps-form__group">
                                        <label id="password" style="color:rgb(114, 111, 111)">New Password</label>
                                        <input class="form-control ps-form__input" :class="{'is-invalid': form.errors.password}"  type="password"
                                            placeholder="password"  id="password" v-model="form.password" name="password" autocomplete="off">
                                            <span class="badge bg-warning">
                                        {{form.errors.password}}
                                    </span>
                                        </div>
                                    
                                </div>
                               
                            </div>
                            <div class="m-4" style="">
                                <button class="ps-btn ps-btn--success w-100" style="border-radius: 5px"> Update Account</button>
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
<style scoped>
        .navIL {
            padding: 15px;
            padding-left: 10px
        }

        .dropdown-item:hover {
            background: rgb(219, 218, 218);
        }
    </style>
