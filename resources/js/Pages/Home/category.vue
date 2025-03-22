<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({'categories':Array})

// console.log(props.categories, 'categories')

</script>

<template>
     <div class="container p-2">
        <div class="ps-noti p-2" style="border-radius:5px">
        <div class="container"  >
            <p class="m-0" style="color:#fff; font-weight:bold; text-align:left"> Shop By Category</p>
        </div>

    </div>
     <section class="ps-section--category ps-category--image">
                        <h3 class="ps-section__title">Check out the most popular categories</h3>
                        <div class="ps-section__content">
                          <div class="ps-section__carousel">
                            <div class="owl-carousel" data-owl-auto="true" data-owl-loop="true" data-owl-speed="12000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                              <div v-for="category in categories">
                              <div class="ps-category__thumbnail"> <Link class="ps-category__image" :href="`/catalogs/${category.hashid}`"><img :src="`/images/category/${category.image_path}`" :alt="category.name"></Link> </div>
                            </div>
                            </div>
                        </div>
                      </div>
                    </section>
                    <div class="button-container">
                        <Link href="/catalogs" class="custom-btn">
                            <span class="btn-icon">📂</span> 
                            <span class="btn-text">All Categories</span>
                        </Link>

                        <Link  href="/pages/contactus" class="custom-btn">
                            <span class="btn-icon">⭐</span>
                            <span class="btn-text">Special Medication Request</span>
                        </Link>

                        <Link href="/upload/prescription" class="custom-btn">
                            <span class="btn-icon">📤</span>
                            <span class="btn-text">Upload Doctor's Prescription</span>
                        </Link>
                        </div>

            </div>
                    
</template>

<style>
.button-container {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 1.5rem; 
  padding: 2rem 1rem;
}

.custom-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem; 
  background-color: #103178; 
  color: white;
  border: none;
  padding: 1rem 2rem;
  border-radius: 8px;
  font-size: 1rem;
  font-weight: 500;
  cursor: pointer;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  transition: background-color 0.3s ease, transform 0.2s ease;
}

.custom-btn:hover {
  background-color: #27ae60;
  transform: translateY(-2px);
}

.custom-btn:active {
  transform: translateY(0);
}

.btn-icon {
  font-size: 1.2rem;
}

@media (max-width: 768px) {
  .custom-btn {
    width: 70%;
    /* justify-content: flex-start; */
  }

  .button-container {
    gap: 1rem;
  }
}

@media (max-width: 480px) {
  .custom-btn {
    padding: 0.75rem 1.25rem;
    font-size: 0.9rem;
  }

  .btn-icon {
    font-size: 1rem;
  }
}

</style>
