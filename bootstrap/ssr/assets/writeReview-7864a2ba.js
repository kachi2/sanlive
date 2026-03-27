import { ref, mergeProps, unref, useSSRContext } from "vue";
import { ssrRenderAttrs, ssrRenderList, ssrRenderStyle, ssrRenderClass, ssrRenderAttr, ssrInterpolate } from "vue/server-renderer";
import { useForm } from "@inertiajs/vue3";
import { _ as _export_sfc } from "./_plugin-vue_export-helper-cc2b3d55.js";
const writeReview_vue_vue_type_style_index_0_scoped_3ddf20ac_lang = "";
const _sfc_main = {
  __name: "writeReview",
  __ssrInlineRender: true,
  props: {
    product: Object
  },
  setup(__props) {
    const props = __props;
    ref(0);
    const form = useForm({
      name: "",
      email: "",
      title: "",
      comment: "",
      rating: 0,
      product_id: props.product.id
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "container mt-4" }, _attrs))} data-v-3ddf20ac><div class="d-flex align-items-center mb-3" data-v-3ddf20ac><h6 class="text-uppercase font-weight-bold" data-v-3ddf20ac>Leave a review</h6></div><form data-v-3ddf20ac><div class="form-row" data-v-3ddf20ac><div class="col-4" data-v-3ddf20ac></div><div class="col-4" data-v-3ddf20ac><div class="d-flex" data-v-3ddf20ac><!--[-->`);
      ssrRenderList(5, (star) => {
        _push(`<span class="mx-1" style="${ssrRenderStyle({ "cursor": "pointer", "font-size": "2rem" })}" data-v-3ddf20ac><i class="${ssrRenderClass([star <= unref(form).rating ? "fa-star text-warning" : "fa-star text-secondary", "fa"])}" data-v-3ddf20ac></i></span>`);
      });
      _push(`<!--]--></div></div><div class="form-group col-md-6" data-v-3ddf20ac><label for="reviewTitle" data-v-3ddf20ac>Review Title</label><input type="text"${ssrRenderAttr("value", unref(form).title)} class="${ssrRenderClass([{ "is-invalid": unref(form).errors.title }, "form-control"])}" id="reviewTitle" placeholder="e.g. I like it! / I don&#39;t like it!" data-v-3ddf20ac><span class="badge bg-warning" data-v-3ddf20ac>${ssrInterpolate(unref(form).errors.title)}</span></div><div class="form-group col-md-3" data-v-3ddf20ac><label for="yourName" data-v-3ddf20ac>Your Name</label><input type="text" id="yourName" class="${ssrRenderClass([{ "is-invalid": unref(form).errors.name }, "form-control"])}" placeholder="Michael"${ssrRenderAttr("value", unref(form).name)} data-v-3ddf20ac><span class="badge bg-warning" data-v-3ddf20ac>${ssrInterpolate(unref(form).errors.name)}</span></div><div class="form-group col-md-3" data-v-3ddf20ac><label for="email" data-v-3ddf20ac>Your Email</label><input type="email" id="email" class="${ssrRenderClass([{ "is-invalid": unref(form).errors.name }, "form-control"])}" placeholder="email@example.com"${ssrRenderAttr("value", unref(form).email)} data-v-3ddf20ac><span class="badge bg-warning" data-v-3ddf20ac>${ssrInterpolate(unref(form).errors.email)}</span></div></div><div class="form-group mt-4" data-v-3ddf20ac><label for="detailedReview" data-v-3ddf20ac>Detailed Review</label><textarea id="detailedReview" rows="5" placeholder="Tell us more about your rating!" class="${ssrRenderClass([{ "is-invalid": unref(form).errors.comment }, "form-control"])}" data-v-3ddf20ac>${ssrInterpolate(unref(form).comment)}</textarea></div><div class="row mb-4" data-v-3ddf20ac><div class="col-6" data-v-3ddf20ac><button type="submit" style="${ssrRenderStyle({ "border-radius": "1px" })}" class="btn btn-success btn-lg" data-v-3ddf20ac>Submit your review</button></div></div></form></div>`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Users/Carts/writeReview.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const WriteReview = /* @__PURE__ */ _export_sfc(_sfc_main, [["__scopeId", "data-v-3ddf20ac"]]);
export {
  WriteReview as default
};
