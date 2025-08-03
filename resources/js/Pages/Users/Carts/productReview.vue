<template>
  <div class="card border mt-4">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Verified Customer Feedback</h5>
    </div>

    <div class="card-body">
      <div class="row">
        <div class="col-md-4 border-right text-center">
          <h2 class="mb-0"> 1212 </h2>
          <div class="mb-2">
            <StarDisplay  />
          </div>
          <p class="small text-muted mb-4"> 12234 verified ratings</p>

          <div  class="d-flex align-items-center mb-2">
            <small class="mr-2">5</small>
            <div class="flex-grow-1 bg-light position-relative" style="height: 8px; border-radius: 4px;">
              <div class="bg-warning position-absolute">
             <span>★★★★★</span>
            </div>
            </div>
            <small class="ml-2 text-muted">45 </small>
          </div>
           <div  class="d-flex align-items-center mb-2">
            <small class="mr-2">4</small>
            <div class="flex-grow-1 bg-light position-relative" style="height: 8px; border-radius: 4px;">
              <div class="bg-warning position-absolute">
             <span>★★★★</span>
            </div>
            </div>
            <small class="ml-2 text-muted">66 </small>
          </div>

           <div  class="d-flex align-items-center mb-2">
            <small class="mr-2">3</small>
            <div class="flex-grow-1 bg-light position-relative" style="height: 8px; border-radius: 4px;">
              <div class="bg-warning position-absolute">
             <span>★★★</span>
            </div>
            </div>
            <small class="ml-2 text-muted"> 45</small>
          </div>

          <div  class="d-flex align-items-center mb-2">
            <small class="mr-2">2</small>
            <div class="flex-grow-1 bg-light position-relative" style="height: 8px; border-radius: 4px;">
              <div class="bg-warning position-absolute">
             <span>★★</span>
            </div>
            </div>
            <small class="ml-2 text-muted">65 </small>
          </div>

          <div  class="d-flex align-items-center mb-2">
            <small class="mr-2">1</small>
            <div class="flex-grow-1 bg-light position-relative" style="height: 8px; border-radius: 4px;">
              <div class="bg-warning position-absolute">
             <span>★</span>
            </div>
            </div>
            <small class="ml-2 text-muted">45 </small>
          </div>

        </div>

        <div class="col-md-8 pl-4">
          <h6 class="font-weight-bold mb-3">Comments from Verified Purchases </h6>

          <div  class="mb-4 pb-3 border-bottom">
            <div class="d-flex align-items-center mb-2">
              <StarDisplay />
              <span class="ml-2 font-weight-bold"></span>
            </div>
            <p class="small mb-1"> ssdsd ssd</p>
            <small class="text-muted">
           sdsdsdss dsdsd sdsdsd 
            </small>
            <div  class="text-success small font-weight-bold mt-1">
              <i class="fas fa-check-circle"></i> Verified Purchase
            </div>
          </div>
          <!-- -------------- -->
              <div  class="mb-4 pb-3 border-bottom">
            <div class="d-flex align-items-center mb-2">
              <StarDisplay />
              <span class="ml-2 font-weight-bold"></span>
            </div>
            <p class="small mb-1"> ssdsd ssd</p>
            <small class="text-muted">
           sdsdsdss dsdsd sdsdsd 
            </small>
            <div  class="text-success small font-weight-bold mt-1">
              <i class="fas fa-check-circle"></i> Verified Purchase
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { defineProps } from 'vue'
import StarDisplay from '@/Components/starDisplay.vue' 



// const getRatingPercentage = (stars) => {
//   const total = Object.values(props.ratingsCount).reduce((a, b) => a + b, 0)
//   if (!total) return 0
//   return ((props.ratingsCount[stars] ?? 0) / total) * 100
// }
// </script>

<style scoped>
.text-orange {
  color: #ff6f00;
}
</style>
