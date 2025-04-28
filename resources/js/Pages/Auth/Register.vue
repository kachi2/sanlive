<script setup>
import HeadTags from '@/Components/headTags.vue';
import {Link, useForm, usePage} from '@inertiajs/vue3'

defineProps({
    pageMeta: Object
})
const page = usePage()

const form = useForm({
    first_name: '',
    last_name: '',
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>
<template>
    <HeadTags :pageMeta="pageMeta" />
    <div class="container">
        <div style="text-align:center; padding:10px">
            <img class="logo" :src="`/images/${page.props.settings.site_logo}`" alt="" width="200px">
        </div>
    
        <h4 style="text-align:center">Register</h4>
        <form @submit.prevent="submit">
            <div class="form-group">
                <input type="text" name="first_name" v-model="form.first_name" class="form-control" :class="{'is-invalid':form.errors.first_name}" placeholder="Enter First Name" required="" autofocus="" autocomplete="">
                <span class="badge bg-danger"> {{form.errors.firs_name}} </span>
            </div>
            <div class="form-group">
                <input type="text" name="last_name" v-model="form.last_name" class="form-control" :class="{'is-invalid':form.errors.last_name}" placeholder="Enter last name" required="" autofocus="" autocomplete="">
                <span class="badge bg-danger"> {{form.errors.last_name}} </span>
            </div>
            <div class="form-group">
                <input type="text" name="email" v-model="form.email" class="form-control" :class="{'is-invalid':form.errors.email}" placeholder="Email" required="" autofocus="" autocomplete="">
                <span class="badge bg-danger"> {{form.errors.email}} </span>
            </div>
            <div class="form-group">
                <input type="password" name="password" v-model="form.password" class="form-control "   :class="{'is-invalid':form.errors.password}" id="password" placeholder="Password" required="" autocomplete="off">

            </div>
            <div class="form-group">
                <input type="password" name="password_confirmation" v-model="form.password_confirmation" class="form-control "   :class="{'is-invalid':form.errors.password_confirmation}" id="password" placeholder="Password confirmation" required="" autocomplete="off">

            </div>
            <button class="btn btn-primary btn-block" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Sign in</button>
            
      
            <p class="text-muted m-4">Already have an account?
            <a href="/login" class="">Login now!</a>
        </p>
        </form>
    
</div>
    </template>
    
    
    <style >

body{
    background:#eee;
    width:100%;
    height:100%;
}
.container{
    margin:100px auto;
    width:500px;
    background:#fff;
    position:relative;
    border-radius:10px;
    padding:50px;
}
.container input{
    border-radius:10px;
}

.container button{
    width:100%;
    border-radius:10px;
    height:40px

}
    
    </style>