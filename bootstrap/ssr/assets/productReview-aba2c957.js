import { useSSRContext, computed, mergeProps, unref } from "vue";
import { ssrRenderAttrs, ssrInterpolate, ssrRenderList, ssrRenderStyle, ssrRenderClass, ssrRenderComponent } from "vue/server-renderer";
import { Link } from "@inertiajs/vue3";
import { _ as _export_sfc } from "./_plugin-vue_export-helper-cc2b3d55.js";
const starDisplay_vue_vue_type_style_index_0_scoped_331d7e80_lang = "";
const _sfc_main$1 = {
  __name: "starDisplay",
  __ssrInlineRender: true,
  props: {
    rating: { type: Number, required: true }
  },
  setup(__props) {
    const props = __props;
    const ratingPercent = computed(() => {
      return Math.min(Math.max(props.rating, 0), 5) / 5 * 100;
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({
        class: "star-rating",
        style: { "--rating-percent": ratingPercent.value + "%" }
      }, _attrs))} data-v-331d7e80><span data-v-331d7e80>★★★★★</span></div>`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/starDisplay.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const productReview_vue_vue_type_style_index_0_scoped_831cc203_lang = "";
const _sfc_main = {
  __name: "productReview",
  __ssrInlineRender: true,
  props: {
    reviews: Object,
    ratings: Object
  },
  setup(__props) {
    const props = __props;
    const fiveRating = [];
    const fourRating = [];
    const threeRating = [];
    const twoRating = [];
    const oneRating = [];
    props.ratings.forEach((rating, index) => {
      if (rating == 5) {
        fiveRating.push(rating);
      } else if (rating == 4) {
        fourRating.push(rating);
      } else if (rating == 3) {
        threeRating.push(rating);
      } else if (rating == 2) {
        twoRating.push(rating);
      } else {
        oneRating.push(rating);
      }
    });
    const overAllRating = computed(() => {
      return (5 * fiveRating.length + 4 * fourRating.length + 3 * threeRating.length + 2 * twoRating.length + 1 * oneRating.length) / props.ratings.length;
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "card border mt-4" }, _attrs))} data-v-831cc203><div class="card-header bg-white d-flex justify-content-between align-items-center" data-v-831cc203><h5 class="mb-0" data-v-831cc203>Verified Customer Feedback</h5></div><div class="card-body" data-v-831cc203><div class="row" data-v-831cc203><div class="col-md-4 border-right text-center" data-v-831cc203><h2 class="mb-0" data-v-831cc203></h2><div class="mb-2" data-v-831cc203>`);
      if (overAllRating.value > 0) {
        _push(`<span data-v-831cc203> (${ssrInterpolate(Math.round(overAllRating.value))} / 5) </span>`);
      } else {
        _push(`<!---->`);
      }
      _push(` <!--[-->`);
      ssrRenderList(5, (star) => {
        _push(`<span class="mx-1" style="${ssrRenderStyle({ "cursor": "pointer", "font-size": "1.2rem" })}" data-v-831cc203><i class="${ssrRenderClass([star <= overAllRating.value ? "fa-star text-warning" : "fa-star text-secondary", "fa"])}" data-v-831cc203></i></span>`);
      });
      _push(`<!--]--></div><p class="small text-muted mb-4" data-v-831cc203>${ssrInterpolate(__props.ratings.length)} Verified ratings</p><div class="d-flex align-items-center mb-2" data-v-831cc203> 5 <small class="text-warning" data-v-831cc203>★★★★★</small><div class="flex-grow-1 bg-light position-relative" style="${ssrRenderStyle({ "height": "2px", "border-radius": "1px" })}" data-v-831cc203></div><small class="ml-2 text-muted" data-v-831cc203>(${ssrInterpolate(fiveRating.length)}) `);
      if (fiveRating.length > 0) {
        _push(`<span data-v-831cc203>${ssrInterpolate(Math.round(fiveRating.length / __props.ratings.length * 100))}% </span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</small></div><div class="d-flex align-items-center mb-2" data-v-831cc203> 4 <small class="text-warning" data-v-831cc203>★★★★</small><div class="flex-grow-1 bg-light position-relative" style="${ssrRenderStyle({ "height": "2px", "border-radius": "1px" })}" data-v-831cc203></div><small class="ml-2 text-muted" data-v-831cc203>(${ssrInterpolate(fourRating.length)}) `);
      if (fiveRating.length > 0) {
        _push(`<span data-v-831cc203>${ssrInterpolate(Math.round(fourRating.length / __props.ratings.length * 100))}% </span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</small></div><div class="d-flex align-items-center mb-2" data-v-831cc203> 3 <small class="text-warning" data-v-831cc203>★★★</small><div class="flex-grow-1 bg-light position-relative" style="${ssrRenderStyle({ "height": "2px", "border-radius": "1px" })}" data-v-831cc203></div><small class="ml-2 text-muted" data-v-831cc203>(${ssrInterpolate(threeRating.length)}) `);
      if (fiveRating.length > 0) {
        _push(`<span data-v-831cc203>${ssrInterpolate(Math.round(threeRating.length / __props.ratings.length * 100))}% </span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</small></div><div class="d-flex align-items-center mb-2" data-v-831cc203> 2 <small class="text-warning" data-v-831cc203>★★</small><div class="flex-grow-1 bg-light position-relative" style="${ssrRenderStyle({ "height": "2px", "border-radius": "1px" })}" data-v-831cc203></div><small class="ml-2 text-muted" data-v-831cc203>(${ssrInterpolate(twoRating.length)}) `);
      if (fiveRating.length > 0) {
        _push(`<span data-v-831cc203>${ssrInterpolate(Math.round(twoRating.length / __props.ratings.length * 100))}% </span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</small></div><div class="d-flex align-items-center mb-2" data-v-831cc203> 1 <small class="text-warning" data-v-831cc203>★</small><div class="flex-grow-1 bg-light position-relative" style="${ssrRenderStyle({ "height": "2px", "border-radius": "1px" })}" data-v-831cc203></div><small class="ml-2 text-muted" data-v-831cc203>(${ssrInterpolate(oneRating.length)}) `);
      if (fiveRating.length > 0) {
        _push(`<span data-v-831cc203>${ssrInterpolate(Math.round(oneRating.length / __props.ratings.length * 100))}% </span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</small></div></div><div class="col-md-8" data-v-831cc203><!--[-->`);
      ssrRenderList(__props.reviews.data, (review) => {
        _push(`<div class="mb-4 pb-3 border-bottom" data-v-831cc203><div class="d-flex align-items-center mb-2" data-v-831cc203><!--[-->`);
        ssrRenderList(5, (star) => {
          _push(`<span class="mx-1" style="${ssrRenderStyle({ "cursor": "pointer", "font-size": "1.2rem" })}" data-v-831cc203><i class="${ssrRenderClass([star <= (review == null ? void 0 : review.rating) ? "fa-star text-warning" : "fa-star text-secondary", "fa"])}" data-v-831cc203></i></span>`);
        });
        _push(`<!--]--><span class="ml-2 font-weight-bold" data-v-831cc203></span></div><p class="mb-1" data-v-831cc203>${ssrInterpolate(review == null ? void 0 : review.title)}</p><p class="text-muted" data-v-831cc203>${ssrInterpolate(review == null ? void 0 : review.comment)}</p><div data-v-831cc203><small class="pt-3 text-muted" data-v-831cc203>${ssrInterpolate(new Date(review == null ? void 0 : review.created_at).toLocaleDateString("en-GB"))} ${ssrInterpolate(review == null ? void 0 : review.name)} <span class="float-end text-success" style="${ssrRenderStyle({ "font-size": "8px" })}" data-v-831cc203><i class="fa fa-check-circle" data-v-831cc203></i> Verified Purchase</span></small></div></div>`);
      });
      _push(`<!--]-->`);
      if (__props.reviews.links.length > 5) {
        _push(`<div class="d-flex justify-content-center mt-3" data-v-831cc203><ul class="pagination" data-v-831cc203><!--[-->`);
        ssrRenderList(__props.reviews.links, (link) => {
          _push(`<li class="${ssrRenderClass(["page-item", { active: link.active, disabled: !link.url }])}" data-v-831cc203>`);
          if (link.url) {
            _push(ssrRenderComponent(unref(Link), {
              href: link.url,
              class: "page-link"
            }, null, _parent));
          } else {
            _push(`<span class="page-link" data-v-831cc203>${link.label ?? ""}</span>`);
          }
          _push(`</li>`);
        });
        _push(`<!--]--></ul></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div></div></div>`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Users/Carts/productReview.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const ProductReview = /* @__PURE__ */ _export_sfc(_sfc_main, [["__scopeId", "data-v-831cc203"]]);
export {
  ProductReview as default
};
