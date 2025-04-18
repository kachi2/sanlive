<script setup>
import AppTemplate from '@/AppTemplate.vue';
import { Link, useForm } from '@inertiajs/vue3';


const props = defineProps({
    blogs: Object
})



const form = useForm({

    name:'',
    email: '',
    phone: '',
    address: '',
    city: '',
    state: '',
    image: '',
    notes: ''
})

function submitForm()
{
    form.post('/doctor/prescription', {
        onSuccess: (page) => {
            if(page.props.flash.success){
                toastr.success(page.props.flash.success);
            }
        }
    })
}

function UploadFile(event)
{
    const image = event.target.files[0]
    form.image = image;
}
</script>

<template>
    <AppTemplate>

        <template #content>

            <div class="ps-checkout">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page"> Doctor's Prescription</li>
        </ul>
        <div class="ps-checkout__content">
    <form @submit.prevent="submitForm" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="ps-checkout__form">
                    <h3 class="ps-checkout__heading">Patient's Information</h3>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="ps-checkout__group">
                                <label class="ps-checkout__label">Full name *</label>
                                <input class="form-control form-data" :class="{'is-invalid': form.name}"  v-model="form.name" name="name" type="text" placeholder="full name">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="ps-checkout__group">
                                <label class="ps-checkout__label">Email address *</label>
                                <input class="form-control form-data"  :class="{'is-invalid': form.email}" v-model="form.email" name="email" type="email" placeholder="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="ps-checkout__group">
                                <label class="ps-checkout__label">Phone *</label>
                                <input class="form-control form-data"  v-model="form.phone" :class="{'is-invalid': form.phone}"  name="phone" type="text" placeholder="phone">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="ps-checkout__group">
                                <label class="ps-checkout__label">Street address *</label>
                                <input class="form-control form-data"v-model="form.address" :class="{'is-invalid': form.address}"  name="address" type="text" placeholder="House number and street name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="ps-checkout__group">
                                <label class="ps-checkout__label">Town / City *</label>
                                <input class="form-control form-data" v-model="form.city"  :class="{'is-invalid': form.city}"  name="city" type="text" placeholder="town/city">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="ps-checkout__group">
                                <label class="ps-checkout__label">State *</label>
                                <input class="form-control form-data" v-model="form.state"  :class="{'is-invalid': form.state}"  name="state" type="text">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="ps-checkout__group">
                                <label class="ps-checkout__label">Upload Prescription *</label>
                                <input class="ps-input" name="image" type="file"  @change="UploadFile" :class="{'is-invalid': form.image}"  > 
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="ps-checkout__group">
                                <label class="ps-checkout__label">Notes </label>
                                <textarea class="form-control form-data" name="notes" v-model="form.notes"  :class="{'is-invalid': form.notes}"  rows="7" placeholder="write additional notes about the description."></textarea>
                            </div>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-success btn-lg w-25 p-2" style="border-radius: 10px"> Upload Prescription</button>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <section class="ps-section--block-grid" style="display: block">
                    <div class="ps-section__content">
                        <h3 class="ps-section__title">Upload your Prescription from a Doctor</h3>
                        <div class="ps-section__subtitle">Here's a guide to ensure you upload a valid Prescription.</div>
                        <div class="ps-section__desc">Please Ensure Your Prescription Contains All 5 Elements</div>
                        <ul class="ps-section__list">
                            <li>Hospital / Clinic Information</li>
                            <li>Doctor's Details</li>
                            <li>Patient's Details</li>
                            <li>Drug Details</li>
                            <li>Doctor's Signature / Stamp & Date</li>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </form>
</div>
        </div>
    </div>
        </template>
    </AppTemplate>
</template>

<style>
.form-data{
    border-radius: 10px;
}
</style>