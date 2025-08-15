<script setup >
import AppTemplate from '@/AppTemplate.vue';
import CartAlert from '@/Components/old/CartAlert.vue';
import { Head, Link, router, usePage} from '@inertiajs/vue3';
import { onMounted, reactive, ref } from 'vue';
import useFunctions from '../useFunctions';
import HeadTags from '@/Components/headTags.vue';
import ProductReview from './productReview.vue';
import WriteReview from './writeReview.vue';
import { computed } from 'vue';

onMounted(() => {
    $('.owl-carousel').owlCarousel({
        responsive: {
    0: {
      items: 2
    },
    600: {
      items: 3 
    },
    1000: {
      items: 4
    }
}
    });
  });


const page = usePage()
const props = defineProps({
data : Object,
pageMeta: Object,
reviews: Object,
ratings: Object
});

let product =  props.data.product
const form = reactive({
    image:'',
    qty:1,
})

const TaglineText = computed(() => {

    return product.tagline.replace(/Description:/gi, '')
})

const addSubstract = function (oprand)  { 
   
    if(oprand == "+"){
        form.qty++
        return form 
    }else if(oprand == "-")
    {
        if(form.qty <= 0) return
        form.qty--
        return form;
    }
    return false
}
const isPrescribed = ref(product.requires_prescription)

const isLoading = ref(false)
function addToCart(id)
    {  
        if(isPrescribed.value == 1 && !ImageFile.value)
    {
        toastr.error("please Upload prescription before you add this item to card");
        return
    }
        isLoading.value = true
        router.post('/cart/'+id,form, {
            onSuccess: (page) => {
                setTimeout(() => { 
            if(page.props.flash.success){
                isLoading.value = false
                toastr.success(page.props.flash.success);
            }else
            {
                toastr.error(page.props.flash.error);
            }
                toastr.options.preventDuplicates = true;
                toastr.options.progressBar = true;
            }, 2000);
            },
        })    
    }

const ImageFile = ref('')
function handleFileUpload(event)
{
    ImageFile.value = event.target.files[0]
    form.image = ImageFile.value
}
</script>

<template>
   <HeadTags :pageMeta="pageMeta" />
    <AppTemplate>     
    <Head>
        <title>Product details</title>
    </Head>

    <template #content>
    <div class="ps-page--product ps-page--product1">
    <div class="container " >
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="/">Home</a></li>
            <li class="ps-breadcrumb__item"><a href="/catalogs">{{ product.category.name }}</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">{{ product.name }}</li>
        </ul>
        <div class="ps-page__content">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="ps-product--detail">
                        <div class="row">
                            <div class="col-12 col-xl-6">
                                <div class="">
                                    <div class="">
                                       <img :src="`/images/products/${product.image_path}`" :alt="product.name" />
                                    </div>
                                    <!-- <div class="ps-gallery--image">
                                        <div class="slide">
                                            <div class="slide"><img :src="`/images/products/${product.image_path}`" :alt="product.name" /></div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="ps-product__info">
                                    <div class="ps-product__badge"><span class="ps-badge ps-badge--outstock" v-if="product.status == 1">OUT OF STOCK</span>
                                    </div>
                                    <h2 class="ps-product__branch" style="font-size:13px">Category: <Link href="/catalogs">{{product.category.name}}</Link></h2>
                                    <h1 style="font-size:20px" class="ps-product__title"> <a href="#"> {{product.name}}</a></h1>
                                    <p> 
                                        <span class="ps-product__price sale"> {{useFunctions.addSeperator(product.sale_price)  }}</span>
                                        <span class="ps-product__del">{{useFunctions.addSeperator(product.price)  }}</span>
                                        <!-- <span class="ps-product__price" style="font-size:20px">{{useFunctions.addSeperator(product.sale_price)}} </span> <span class="ps-product__del"> {{useFunctions.addSeperator(product.price)}} </span>  -->
                                    </p>
                                    
                                
                                    <div class="ps-product__meta">
                                        <h2 style="font-size:25px; color:deepskyblue">Description:
                                            <span v-html="TaglineText"> </span>
                                        </h2>
                                        
                                    </div>
                                     <div class="ps-product__meta">
                                        <h2 style="font-size:20px; color:deepskyblue">Manufacturer:  <span style="font-size:15px">{{ product?.brand }} </span></h2>
                                        
                                    </div>


                                    <form enctype="multipart/form-data"  @submit.prevent="addToCart(product.id)">
                                    <div class="ps-product__quantity">
                                        <h6>Quantity:   

                                             <button  type="button" @click="addSubstract('-')" class="ps-btn--primary  decrement-btn" style="width: 30px; border-radius:3px; height:30px"> - </button> 
                                             <input type="text"   v-model="form.qty"  id="qty" style="border: 1px solid #8c8a8a53; height:30px; width:30px; text-align:center"> 
                                             <button  type="button" @click="addSubstract('+')" class="ps-btn--primary  increment-btn" style="width: 30px; border-radius:3px; height:30px"> + </button>  </h6>
                        
                                            <div v-if="product.requires_prescription == 1">
                                            <label for="precription_upload" > <span id="fileName" style="color:red" hidden> Upload file </span>
                                            <div class="pb-1"><img src="/frontend/upload.png">
                                                {{ ImageFile.name }}
                                            </div> 
                                            <input type="file" id="precription_upload" @change="handleFileUpload" style="border: none; visibility:hidden" > 
                                      
                                        </label>
                                        
                                            <br>
                                             </div>

                                            
                                        <div class="d-md-flex align-items-center">
                                            <div class="def-number-input number-input safari_only">
                                            </div>
                                            <br/>
                                            
                                            <button v-if="!isLoading"  style="border-radius:5px" class="ps-btn ps-btn--primary w-50"  id="add2cart"> 
                                                Add to Cart
                                        </button>
                                        <button v-else="!isLoading"  style="border-radius:5px" class="ps-btn ps-btn--primary w-50"  id="add2cart"> 
                                              Please wait...
                                        </button>
                                        <br/>
                                        <br/>
                                            <span class="p-2"></span>
                                          <a target="_blank" class="btn btn-primary" rel="noopener noreferrer"
                                             :href="`https://wa.me/+2348058885913?text=Please i need ${product.name}, the  price on your website is ${product.sale_price} `">
                                                             <i class="fa fa-whatsapp" aria-hidden="true" style="font-size:20px; padding:5px; color:#fff "> 
                                                           Order on Whatsapp  </i>
                                                         </a>  
                                        </div>
                                    </div>
                                    </form>
                                    <div class="ps-product__social">
                                        <ul class="ps-social ps-social--color">
                                            Share this Product
                                            <li><a class="ps-social__link facebook" target="_blank" rel="noopener noreferrer" :href="`https://www.facebook.com/sharer/sharer.php?u=products/${product.slug}`"><i class="fa fa-facebook"> </i><span class="ps-tooltip">Facebook</span></a></li>
                                            <li><a class="ps-social__link twitter"  target="_blank" rel="noopener noreferrer" :href="`https://twitter.com/share?url=products/${product.slug}`"><i class="fa fa-twitter"></i><span class="ps-tooltip">Twitter</span></a></li>
                                            <li ><a class="ps-social__link whatsapp" target="_blank"  rel="noopener noreferrer" data-action="share/whatsapp/share"  :href="`https://api.whatsapp.com/send?text=products/${product.slug}`"><i class="fa fa-whatsapp"></i><span class="ps-tooltip">WhatsApp</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ps-product__content mt-5">
                            <ul class="nav nav-tabs ps-tab-list" id="productContentTabs" role="tablist">
                                <li class="nav-item" role="presentation"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description-content" role="tab" aria-controls="description-content" aria-selected="true">Description</a></li>
                                    <li class="nav-item" role="presentation"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews-content" role="tab" aria-controls="reviews-content" aria-selected="false">Reviews</a></li>
                                     <li class="nav-item" role="presentation"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#write-reviews" role="tab" aria-controls="write-reviews" aria-selected="false">Write a Review</a></li>
                            </ul>
                            <div class="tab-content" id="productContent">
                                <div class="tab-pane fade show active" id="description-content" role="tabpanel" aria-labelledby="description-tab">
                                    <div class="ps-document">
                                        <div class="row row-reverse">
                                            <div class="col-12 col-md-12">
                                                <p class="p-4" v-html="product.description "> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <div class="tab-pane fade" id="reviews-content" role="tabpanel" aria-labelledby="reviews-tab">
                                            
                                        <ProductReview :reviews="reviews"  :ratings="ratings"/>

                                        </div>
                                           <div class="tab-pane fade" id="write-reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                            
                                        <WriteReview :product="product"/>

                                        </div>
                            </div>
                        </div>
        </div>
    </div>
    <section class="ps-section--latest" style="margin-top:5px">
        <div class="container" style="background: #f4f3f33f; padding:10px; border:5px solid #ede8e836">
                <div class="ps-noti p-2" style="border-radius:5px">
                <p class="ml-2" style="color:#fff; font-weight:bold; text-align:left"> Related Products </p>
                </div>
            <div class="ps-section__carousel">
            <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
            <div v-for=" products in data.related " > 
                     <div class="ps-section__product shadow-sm"  >
                        <div class="ps-product ps-product--standard cart-card  border-gray-800 " style="background-color:#fff">
                            <div class="ps-product__thumbnail ">
                                <Link class="ps-product__image" :href="`/products/${products.slug}/`" style="min-height:250px">
                                    <figure>
                                        <img :src="`/images/products/${products.image_path}`" :alt="products.name" style="max-height:200px" /><img :src="`/images/products/${products.image_path}`" :alt="product.name">
                                    </figure>
                                </Link>
                            </div>
                            <div class="ps-product__content">
                                <h5 class=""><Link :href="`/products/${products.slug}`"> {{ products.name }}</Link>
                                </h5>
                                <div class="ps-product__meta"><span class="ps-product__price sale"> {{ useFunctions.addSeperator(products.sale_price) }}</span><span class="ps-product__del">{{useFunctions.addSeperator(products.price)}}</span>
                                   <!-- <small style="color:#434242b5"> -20%</small>  -->
                              
                                </div>
                                <span class="download-note"> 
                                    <span >  
                                    <Link  class=" btn btn-lg"  :href="`/products/${products.slug}`"  style="background:#fff; color:#73c2fb; border:1px solid #73c2fb; display: inline;"> <i class="fa fa-plus"> </i> Add to basket</Link>  
                                    
                                    <a target="_blank" rel="noopener noreferrer" :href="`https://wa.me/+2348058885913?text=Please i need  to order this product ${products.name} the price is: ${useFunctions.addSeperator(products.sale_price)  } `">
                                                           <!-- <i class="fa fa-whatsapp" aria-hidden="true" style="font-size:23px;  padding-left:15px; color:#73c2fb; float:right "> 
                                        </i> -->
                                        <img src="/frontend/whatsapp.png" style="width: 80px;  float:right;padding: 0px;"> 
                                    </a>
                                  </span> 
                                </span> 
                            </div>
                        </div>
                    </div>
                    
                </div>
               
            </div>
        </div>
               
            </div>
   
    </section>
    </div>
</template>
    </AppTemplate>
</template>

<style scoped>
.nav .active 
{
    color: #fff;
    background: #17a2b8;
}
</style>

