<script setup>
import AppTemplate from '@/AppTemplate.vue';
import { Link } from '@inertiajs/vue3';


const props = defineProps({
    blog: Object,
    blogs:Object

})

</script>

<template>
    <AppTemplate>

        <template #content>
            <div class="ps-post ps-post--sidebar">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">Blog</li>
        </ul>
        <div class="ps-post__content">
            <div class="row">
                <div class="col-12 col-md-9">
                    <div class="ps-blog__banner">
                            <img :src="`/images/blog/'${blog.image}}`" :alt="blog.title" style="width: 400px">
                             </div>
                    <h1 class="ps-post__title">{{blog.title}}</h1>
                    <!-- <div class="ps-blog__meta"> 
                        <span class="ps-blog__date">Created: {{$blog->created_at->format('M d, Y')}}.</span>
                        <a class="ps-blog__author" href="">{{_('By'). ' '.$settings->site_name}}</a>
                    </div> -->
                    
                    <p class="ps-blog__text" v-html="blog.content"></p>
                </div>
                <div class="col-12 col-md-3">
                    <div class="ps-widget ps-widget--blog">
                        <div class="ps-widget__block">
                            <h4 class="ps-widget__title">Latest Blogs</h4><a class="ps-block-control" href="#"><i class="fa fa-angle-down"></i></a>
                            <div class="ps-widget__content">
                                <div class="ps-widget__product">

                                    <div v-if="blogs.data.length > 0"  v-for="item in blogs.data" class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail">
                                            <Link class="ps-product__image" :href="`blogs/details/${item.hashid}`">
                                                <figure><img :src="`/images/blog/${item.image}`" :alt="item.title"><img :src="`/images/blog/'${item.image}`" :alt="item.title">
                                                </figure>
                                            </Link>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><Link :href="`blogs/details/${item.hashid}`">{{item.title}}</Link></h5>
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