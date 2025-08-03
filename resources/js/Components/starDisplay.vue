<template>
  <div class="star-rating" :style="{ '--rating-percent': ratingPercent + '%' }">
    <span>★★★★★</span>
  </div>
</template>

<script setup>
import { defineProps, computed } from 'vue'

const props = defineProps({
  rating: { type: Number, required: true }
})

const ratingPercent = computed(() => {
  return Math.min(Math.max(props.rating, 0), 5) / 5 * 100
})
</script>

<style scoped>
.star-rating {
  position: relative;
  font-size: 1rem;
  color: #e4e5e9;
  display: inline-block;
}
.star-rating::before {
  content: '★★★★★';
  letter-spacing: 1px;
}
.star-rating span {
  content: '★★★★★';
  position: absolute;
  top: 0;
  left: 0;
  white-space: nowrap;
  overflow: hidden;
  color: #ffc107;
  width: var(--rating-percent);
}
</style>
