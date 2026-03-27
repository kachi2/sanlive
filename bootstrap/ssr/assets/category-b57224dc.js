import { mergeProps, unref, withCtx, createVNode, useSSRContext } from "vue";
import { ssrRenderAttrs, ssrRenderStyle, ssrRenderList, ssrRenderComponent, ssrRenderAttr } from "vue/server-renderer";
import { Link } from "@inertiajs/vue3";
const category_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "category",
  __ssrInlineRender: true,
  props: { "categories": Object },
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "container p-2" }, _attrs))}><div class="ps-noti p-2" style="${ssrRenderStyle({ "border-radius": "5px" })}"><div class="container"><p class="m-0" style="${ssrRenderStyle({ "color": "#fff", "font-weight": "bold", "text-align": "left" })}"> Shop By Category</p></div></div><section class="ps-section--category ps-category--image"><h3 class="ps-section__title">Check out the most popular categories</h3><div class="ps-section__content"><div class="ps-section__carousel"><div class="owl-carousel category-carousel" data-owl-auto="true" data-owl-loop="true" data-owl-speed="100" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on"><!--[-->`);
      ssrRenderList(__props.categories, (category) => {
        _push(`<div><div class="ps-category__thumbnail">`);
        _push(ssrRenderComponent(unref(Link), {
          class: "ps-category__image",
          href: `/catalogs/${category.slug}`
        }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`<img${ssrRenderAttr("src", `/images/category/${category.image_path}`)}${ssrRenderAttr("alt", category.name)}${_scopeId}>`);
            } else {
              return [
                createVNode("img", {
                  src: `/images/category/${category.image_path}`,
                  alt: category.name
                }, null, 8, ["src", "alt"])
              ];
            }
          }),
          _: 2
        }, _parent));
        _push(`</div></div>`);
      });
      _push(`<!--]--></div></div></div></section><div class="button-container">`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/catalogs",
        class: "custom-btn"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<span class="btn-icon"${_scopeId}>📂</span><span class="btn-text"${_scopeId}>All Categories</span>`);
          } else {
            return [
              createVNode("span", { class: "btn-icon" }, "📂"),
              createVNode("span", { class: "btn-text" }, "All Categories")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(unref(Link), {
        href: "/pages/contactus",
        class: "custom-btn"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<span class="btn-icon"${_scopeId}>⭐</span><span class="btn-text"${_scopeId}>Special Medication Request</span>`);
          } else {
            return [
              createVNode("span", { class: "btn-icon" }, "⭐"),
              createVNode("span", { class: "btn-text" }, "Special Medication Request")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(unref(Link), {
        href: "/upload/prescription",
        class: "custom-btn"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<span class="btn-icon"${_scopeId}>📤</span><span class="btn-text"${_scopeId}>Upload Doctor&#39;s Prescription</span>`);
          } else {
            return [
              createVNode("span", { class: "btn-icon" }, "📤"),
              createVNode("span", { class: "btn-text" }, "Upload Doctor's Prescription")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div>`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Home/category.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
