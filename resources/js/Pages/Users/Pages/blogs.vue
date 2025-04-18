<script setup lang="ts">
import AppTemplate from '@/AppTemplate.vue';
import { Link } from '@inertiajs/vue3';


const props = defineProps({
    blogs: Object
})

console.log(props.blogs, 'asasasas')
</script>

<template>
    <AppTemplate>

        <template #content>
            <div class="ps-blog ps-blog--masonry">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">Blogs </li>
        </ul>
        <div class="ps-blog__content">
            <div class="row">
                    <div v-if="blogs.data.length > 0" v-for="blog in blogs.data" class="col-12 col-md-6 col-lg-4">
                    <div class="ps-blog--latset">
                        <div class="ps-blog__thumbnail"><Link :href="`/blogs/details/${blog.hashid}`">
                            <img :src="`/images/blog/${blog.image}`" :alt="blog.title">  </Link>
                        </div>
                        <div class="ps-blog__content">
                            <div class="ps-blog__meta"> 
                                <!-- <span class="ps-blog__date">Created: {{$item->created_at->format('M d, Y')}}.</span> -->
                                <!-- <Link class="ps-blog__author" :href="`blogs/${blog.hashid}`">{{_('By'). ' '.$settings->site_name}}</Link> -->
                            </div>
                                <Link class="ps-blog__title" :href="`/blogs/details/${blog.hashid}`">{{blog.title}}</Link>

                        </div>
                    </div>
                </div>
                <div v-else class="col-12 col-md-6 col-lg-4">
                    <div class="ps-blog--latset">
                        <div class="ps-blog__content">
                            <p class="ps-blog__desc">No data found</p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- <button class="btn btn-info pl-3 pr-3"> Previous</button>  <button class="btn btn-info pl-5 pr-5">   Next</button> -->
            <div>

            </div>
  
        </div>
    </div>
</div>
        </template>
    </AppTemplate>
</template>