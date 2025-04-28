<script setup>
import HeadTags from '@/Components/headTags.vue';
import {useForm, usePage} from '@inertiajs/vue3';
import { ref } from 'vue';

const page = usePage()

const props = defineProps({
    email: {
        type: String,
        required: true,
    },
    token: {
        type: String,
        required: true,
    },
    pageMeta: Object
});


const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const status = ref('');


const submit = () => {
    form.post(route('password.store'), {
        onFinish: () =>  {
            form.reset('password', 'password_confirmation')

            status.value = "Password Reset completed successfully"
        },
    });
};
</script>
<template>
    <HeadTags :pageMeta="pageMeta" />
    <div class="container">
        <div style="text-align:center; padding:10px">
            <img class="logo" :src="`/images/${page.props.settings.site_logo}`" alt="" width="200px">
        </div>
    
        <h4 style="text-align:center"> Reset Passord</h4>

        <div class="m-4">
            <div v-if="status" class="badge bg-info p-2">
            {{ status }}
        </div>
        </div>
       
        <form @submit.prevent="submit">
            <div class="form-group">
                <input type="password" name="password"
                v-model="form.password" class="form-control" 
                 :class="{'is-invalid':form.errors.password}" 
                 placeholder="password" required=""
                  autofocus="" autocomplete="new-password">
                <span class="badge bg-danger"> {{form.errors.password}} </span>
            </div>


            <div class="form-group">
                <input type="password" name="password"
                v-model="form.password_confirmation" class="form-control" 
                 :class="{'is-invalid':form.errors.password_confirmation}" 
                 placeholder="password confirmation" required=""
                  autofocus="" autocomplete="new-password">
                <span class="badge bg-danger"> {{form.errors.password_confirmation}} </span>
            </div>
                
              
       
            <button class="btn btn-primary" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Reset Password
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