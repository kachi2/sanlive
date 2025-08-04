<script setup>

</script>

<template>


    <div class="container mt-4">
    <div class="d-flex align-items-center mb-3">
          <h6 class="text-uppercase font-weight-bold">Leave a review</h6>
    </div>


  

    <form>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="reviewTitle">Review Title</label>
                <input type="text" class="form-control" id="reviewTitle" placeholder="e.g. I like it! / I don't like it!">
            </div>
            <div class="form-group col-md-6">
                <label for="yourName">Your Name</label>
                <input type="text" class="form-control" id="yourName" value="Michael">
            </div>
        </div>
           <select class="form-control" id="ratingSelect" name="rating">
                <option value="">Select rating</option>
                <option value="1"> <span class="text-warning">★★★★★</span></option>
                <option value="2"> <span class="text-warning">★★★★</span></option>
                <option value="3"><span class="text-warning">★★★</span></option>
                <option value="4"> <span class="text-warning">★★</span></option>
                <option value="5"> <span class="text-warning">★</span></option>
            </select>

        <div class="form-group mt-4">
            <label for="detailedReview">Detailed Review</label>
            <textarea class="form-control" id="detailedReview" rows="5" placeholder="Tell us more about your rating!"></textarea>
        </div>

        <button type="submit" style="border-radius:5px"  class="ps-btn ps-btn--primary w-25">Submit your review</button>
    </form>
</div>

</template>