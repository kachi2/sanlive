<template>
    <div class="container">
        <div style="text-align:center; padding:10px">
            <img class="logo" :src="`/images/${page.props.settings.site_logo}`" alt="" width="200px">
        </div>
    
        <h4 style="text-align:center"> Forgot Passord</h4>
        <p>
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset
            link that will allow you to choose a new one.
        </p>
        <div v-if="status" class="badge bg-info">
            {{ status }}
        </div>
        <form @submit.prevent="submit">
            <div class="form-group">
                <label style="float:left" for="password"> Email</label>
                <input type="text" name="email" v-model="form.email" class="form-control" :class="{'is-invalid':form.errors.email}" placeholder="Email" required="" autofocus="" autocomplete="">
                <span class="badge bg-danger"> {{form.errors.email}} </span>
            </div>
            <button class="btn btn-primary" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Email Password Reset Link
            </button>
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
    import { useForm, usePage } from '@inertiajs/vue3';
    
    const page = usePage()
 
    defineProps({
        status: {
            type: String,
        },
        pageMeta: Object
    });
    
    const form = useForm({
        email: '',
    });
    
    const submit = () => {
        form.post(route('password.email'));
    };
    </script>
    

