<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue'

const props = defineProps({
    product: Object
})
const rating = ref(0)

const setRating = (value) => {
  form.rating = value
}

const form = useForm({
        name: '',
        email: '',
        title: '',
        comment: '',
        rating: 0,
        product_id: props.product.id
})

function storeReviews()
{
    form.post('/store/product/reviews', {
        onSuccess: (page)=>{

            if(page.props.flash.success){
                   toastr.success(page.props.flash.success);
             }else{
            toastr.error(page.props.flash.error);
            }
        }
    })
}
</script>


<template>


    <div class="container mt-4">
    <div class="d-flex align-items-center mb-3">
          <h6 class="text-uppercase font-weight-bold">Leave a review</h6>
    </div>
    <form @submit.prevent="storeReviews()">
        <div class="form-row">
            <div class="col-4"></div>
            <div class="col-4">
              <div class="d-flex">
                <span v-for="star in 5" :key="star" class="mx-1" style="cursor: pointer; font-size: 2rem;" @click="setRating(star)">
                <i class="fa" :class="star <= form.rating ? 'fa-star text-warning' : 'fa-star text-secondary'"></i>
                </span>
            </div>
            <!-- {{ form.rating }} -->
            </div>

            <div class="form-group col-md-6">
                <label for="reviewTitle">Review Title</label>
                <input type="text" v-model="form.title" :class="{'is-invalid': form.errors.title}" id="reviewTitle" class="form-control" placeholder="e.g. I like it! / I don't like it!"
                >
                <span class="badge bg-warning"> {{ form.errors.title }}</span>
            </div>
            <div class="form-group col-md-3">
                <label for="yourName">Your Name</label>
                <input type="text" class="form-control" id="yourName" :class="{'is-invalid': form.errors.name}" placeholder="Michael" v-model="form.name">
                <span class="badge bg-warning"> {{ form.errors.name }}</span>
            </div>
            <div class="form-group col-md-3">
                <label for="email">Your Email</label>
                <input type="email" class="form-control" id="email" :class="{'is-invalid': form.errors.name}"  placeholder="email@example.com" v-model="form.email">
                 <span class="badge bg-warning"> {{ form.errors.email }}</span>
            </div>
        </div>
          
           
        <div class="form-group mt-4 ">
            <label for="detailedReview">Detailed Review</label>
            <textarea class="form-control" id="detailedReview" rows="5" v-model="form.comment" placeholder="Tell us more about your rating!" :class="{'is-invalid': form.errors.comment}"></textarea>
        </div>
       
        <div class="row mb-4" >
            <div class="col-6">
        <button type="submit" style="border-radius:1px"  class=" btn btn-success btn-lg">Submit your review</button>
          </div>
         </div>
        </form>
</div>

</template>

<style scoped>
.text-warning {
  color: gold !important;
}
.text-secondary {
  color: #ccc !important;
}
</style>