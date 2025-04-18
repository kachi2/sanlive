<script setup>
import AppTemplate from '@/AppTemplate.vue';
import { Link, useForm } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';

const page = usePage()


const props = defineProps({
    blogs: Object
})


const form = useForm({
        name: '',
        email: '',
        phone: '',
        message: ''
})


function SubmitContact()
{

    form.post('/contact/us/submit', {
        onSuccess:(page)=>{
            if(page.props.flash.success)
        {
        toastr.success(page.props.flash.success)

        }
        }
    })


    
}
</script>

<template>
    <AppTemplate>

        <template #content>
            <div class="ps-contact">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">Contact us</li>
        </ul>
        <div class="ps-contact__content">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="ps-contact__info">
                        <h3 class="">How can we help you?</h3>
                        <p class="ps-contact__text">
                            Phone: {{page.props.settings?.site_phone}} <br>
                            Email: {{page.props.settings?.site_email}} <br>
                            Address: {{page.props.settings?.address}}<br>
                        </p>
                        <ul class="ps-social">
                            <li><a class="ps-social__link facebook" href="{{page.props.settings?.facebook}}"><i class="fa fa-facebook"> </i><span class="ps-tooltip">Facebook</span></a></li>
                            <li><a class="ps-social__link instagram" href="{{page.props.settings?.instagram}}"><i class="fa fa-instagram"></i><span class="ps-tooltip">Instagram</span></a></li>
                            <li><a class="ps-social__link pinterest" href="{{ page.props.settings?.pinterest}}"><i class="fa fa-pinterest-p"></i><span class="ps-tooltip">Pinterest</span></a></li>
                            <li><a class="ps-social__link linkedin" href="{{ page.props.settings?.linkedIn}}"><i class="fa fa-linkedin"></i><span class="ps-tooltip">Linkedin</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <form action="" @submit.prevent="SubmitContact">
                        <div class="ps-form--contact">
                            <h2 class="ps-form__title">Fill up the form if you have any question</h2>
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="ps-form__group">
                                        <input class="form-control " v-model="form.name" :class="{'in-valid': form.errors.name}"  name="name" type="text" placeholder="Full Name" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="ps-form__group">
                                        <input class="form-control "  v-model="form.email"   :class="{'in-valid': form.errors.email}"  type="email" name="email" placeholder="Your E-mail" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="ps-form__group">
                                        <input class="form-control " v-model="form.phone"  :class="{'in-valid': form.errors.phone}"  type="text" name="phone" placeholder="Phone" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="ps-form__group">
                                        <textarea class="form-control" v-model="form.message"  rows="5"  :class="{'in-valid': form.errors.message}"  name="message" placeholder="Message" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-form__submit">
                                <button class="btn btn-info btn-lg">Send message</button>
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