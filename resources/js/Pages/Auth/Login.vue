<template>
    <HeadTags :pageMeta="pageMeta" />
    <div class="container">
        <div style="text-align:center; padding:10px">
            <img class="logo" :src="`/images/${page.props.settings.site_logo}`" alt="" width="200px">
        </div>
    
        <h4 style="text-align:center">Sign in</h4>
        <form @submit.prevent="submit">
            <div class="form-group">
                <input type="text" name="email" v-model="form.email" class="form-control" :class="{'is-invalid':form.errors.email}" placeholder="Email" required="" autofocus="" autocomplete="">
                <span class="badge bg-danger"> {{form.errors.email}} </span>
            </div>
            <div class="form-group">
                <input type="password" name="password" v-model="form.password" class="form-control "   :class="{'is-invalid':form.errors.password}" id="password" placeholder="Password" required="" autocomplete="off">

            </div>
            <div class="form-group d-flex justify-content-between">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" v-model="form.remember" checked="" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                </div>
                <Link
                    :href="route('password.request')"
                    class=" underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Forgot your password?
                </Link>
            </div>
            <button class="btn btn-primary btn-block" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Sign in</button>
            
      
            <p class="text-muted m-4">Don't have an account?
            <a href="/register" class="">Register now!</a>
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
    
    <script setup>
    import HeadTags from '@/Components/headTags.vue';
import {Link, useForm, usePage} from '@inertiajs/vue3'

defineProps({
    pageMeta: Object
})
    const page = usePage()

    const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
    
    </script>

