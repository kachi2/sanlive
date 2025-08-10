<template>
  <div class="card border mt-4">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Verified Customer Feedback</h5>
    </div>

    <div class="card-body">
      <div class="row">
        <div class="col-md-4 border-right text-center">
          <h2 class="mb-0">  </h2>
          <div class="mb-2">
           {{ Math.round(overAllRating) }} <span v-for="star in 5" :key="star" class="mx-1" style="cursor: pointer; font-size: 1.2rem;">
                <i class="fa" :class="star <= overAllRating ? 'fa-star text-warning' : 'fa-star text-secondary'"></i>
              </span> 
          </div>
          <p class="small text-muted mb-4"> {{ ratings.length }} Verified ratings</p>

          <div  class="d-flex align-items-center mb-2">
            <small class="mr-2">5</small>
            <div class="flex-grow-1 bg-light position-relative" style="height: 8px; border-radius: 4px;">
            <div class=" position-absolute">
             <span class="text-warning">★★★★★</span>
            </div>
            </div>
            <small class="ml-2 text-muted">{{ Math.round((fiveRating.length/ratings.length)*100) }} </small>
          </div>
           <div  class="d-flex align-items-center mb-2">
            <small class="mr-2">4</small>
            <div class="flex-grow-1 bg-light position-relative" style="height: 8px; border-radius: 4px;">
              <div class=" position-absolute">
             <span class="text-warning">★★★★</span>
            </div>
            </div>
            <small class="ml-2 text-muted">{{ Math.round((fourRating.length/ratings.length)*100) }} </small>
          </div>

           <div  class="d-flex align-items-center mb-2">
            <small class="mr-2">3</small>
            <div class="flex-grow-1 bg-light position-relative" style="height: 8px; border-radius: 4px;">
                <div class=" position-absolute">
             <span class="text-warning">★★★</span>
            </div>
            </div>
            <small class="ml-2 text-muted">{{ Math.round((threeRating.length/ratings.length)*100) }}</small>
          </div>

          <div  class="d-flex align-items-center mb-2">
            <small class="mr-2">2</small>
            <div class="flex-grow-1 bg-light position-relative" style="height: 8px; border-radius: 4px;">
               <div class=" position-absolute">
             <span class="text-warning">★★</span>
            </div>
            </div>
            <small class="ml-2 text-muted">{{ Math.round((twoRating.length/ratings.length)*100) }}</small>
          </div>

          <div  class="d-flex align-items-center mb-2">
            <small class="mr-2">1</small>
            <div class="flex-grow-1 bg-light position-relative" style="height: 8px; border-radius: 4px;">
                <div class=" position-absolute">
             <span class="text-warning">★</span>
            </div>
            </div>
            <small class="ml-2 text-muted">{{ Math.round((oneRating.length/ratings.length)*100) }}</small>
          </div>
        </div>
        <div  class="col-md-8"> 
          <div v-for="review in reviews.data" class="mb-4 pb-3 border-bottom" >
            <div class="d-flex align-items-center mb-2">
              <span v-for="star in 5" :key="star" class="mx-1" style="cursor: pointer; font-size: 1.2rem;">
                <i class="fa" :class="star <= review?.rating ? 'fa-star text-warning' : 'fa-star text-secondary'"></i>
              </span> 
              <span class="ml-2 font-weight-bold"></span>
            </div>
            <p class=" mb-1"> {{ review?.title }}</p>
            <p class="text-muted">
           {{ review?.comment }}
            </p>
            <div>
                <small class="pt-3 text-muted">
            {{ new Date(review?.created_at).toLocaleDateString('en-GB')}} {{ review?.name }}
            <span class="float-end text-success" style="font-size:8px"> <i class="fa fa-check-circle"></i> Verified Purchase</span>
                </small>
            </div>
            
            
          </div>
       <div class="d-flex justify-content-center mt-3">
        <ul class="pagination">
          <li v-for="link in reviews.links" :key="link.label" 
              :class="['page-item', { active: link.active, disabled: !link.url }]">
            <Link 
              v-if="link.url" 
              :href="link.url" 
              class="page-link" 
              v-html="link.label" />
            <span v-else class="page-link" v-html="link.label"></span>
            
          </li>
        </ul>
      </div>
          </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import StarDisplay from '@/Components/starDisplay.vue' 
import { Link, router} from '@inertiajs/vue3'
import { ref, computed} from 'vue';

const props = defineProps({
  reviews: Object,
  ratings: Object
})
const fiveRating = [];
const fourRating = [];
const threeRating = [];
const twoRating = [];
const oneRating = [];
 
  props.ratings.forEach((rating, index) => {
  if(rating == 5)
  {
  fiveRating.push(rating);
  }else if(rating == 4)
  {
  fourRating.push(rating)
  }else if(rating == 3)
  {
   threeRating.push(rating)
  }else if(rating == 2)
  {
     twoRating.push(rating)
  }else
  {
     oneRating.push(rating)
  }
});


const overAllRating = computed(()=>{
 return ((5*fiveRating.length) + (4*fourRating.length)+(3*threeRating.length)+(2*twoRating.length)+(1*oneRating.length))/props.ratings.length 
})
</script>


<style scoped>

.text-orange {
  color: #ff6f00;
}
</style>
