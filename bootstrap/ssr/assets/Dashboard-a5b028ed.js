import { mergeProps, unref, withCtx, createVNode, useSSRContext, onMounted, openBlock, createBlock, Fragment, renderList } from "vue";
import { ssrRenderAttrs, ssrRenderList, ssrRenderComponent, ssrRenderAttr } from "vue/server-renderer";
import { Link } from "@inertiajs/vue3";
import { A as AppTemplate } from "./AppTemplate-63cfd3c1.js";
import _sfc_main$2 from "./category-b57224dc.js";
import _sfc_main$3 from "./ProductList-724356fc.js";
import { H as HeadTags } from "./headTags-d006710e.js";
import "./useFunctions-b8a0fd2e.js";
import "./pwa-521173f5.js";
import "./_plugin-vue_export-helper-cc2b3d55.js";
const _sfc_main$1 = {
  __name: "Slider",
  __ssrInlineRender: true,
  props: {
    "slider": Array
  },
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<section${ssrRenderAttrs(mergeProps({ class: "ps-section--banner ps-banner--container" }, _attrs))}><div class="ps-section__overlay"><div class="ps-section__loading"></div></div><div class="owl-carousel slider-carousel" data-owl-auto="true" data-owl-loop="true" data-owl-speed="4000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on"><!--[-->`);
      ssrRenderList(__props.slider, (slide) => {
        _push(`<div><div class="ps-banner"><div class="container-no-round"><div class="ps-banner__block"><div class="ps-banner__coMntent"><div class="ps-banner__desc text-"></div><div class="ps-banner__btn-group"></div></div><div class="ps-banner__thumnail ps-banner__fluid">`);
        _push(ssrRenderComponent(unref(Link), {
          style: { "position": "inherit" },
          href: "/catalogs"
        }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`<img class="ps-banner__image"${ssrRenderAttr("src", `/images/sliders/${slide.image_path}`)}${ssrRenderAttr("alt", slide.title)}${_scopeId}>`);
            } else {
              return [
                createVNode("img", {
                  class: "ps-banner__image",
                  src: `/images/sliders/${slide.image_path}`,
                  alt: slide.title
                }, null, 8, ["src", "alt"])
              ];
            }
          }),
          _: 2
        }, _parent));
        _push(`</div></div></div></div></div>`);
      });
      _push(`<!--]--></div></section>`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Slider.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const _sfc_main = {
  __name: "Dashboard",
  __ssrInlineRender: true,
  props: {
    "sliders": Object,
    "categories": Object,
    "category": Object,
    "pageMeta": Object
  },
  setup(__props) {
    onMounted(() => {
      $(".slider-carousel").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true
      });
      $(".category-carousel").owlCarousel({
        responsive: {
          0: {
            items: 2
          },
          600: {
            items: 4
          },
          1e3: {
            items: 6
          }
        },
        loop: true,
        autoplay: true
      });
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(HeadTags, { pageMeta: __props.pageMeta }, null, _parent));
      _push(ssrRenderComponent(AppTemplate, null, {
        content: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="ps-home ps-home--8"${_scopeId}><div class="ps-home__content"${_scopeId}>`);
            _push2(ssrRenderComponent(_sfc_main$1, { slider: __props.sliders }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_sfc_main$2, { categories: __props.categories }, null, _parent2, _scopeId));
            _push2(`<!--[-->`);
            ssrRenderList(__props.category, (cat) => {
              _push2(ssrRenderComponent(_sfc_main$3, { products: cat }, null, _parent2, _scopeId));
            });
            _push2(`<!--]--></div></div>`);
          } else {
            return [
              createVNode("div", { class: "ps-home ps-home--8" }, [
                createVNode("div", { class: "ps-home__content" }, [
                  createVNode(_sfc_main$1, { slider: __props.sliders }, null, 8, ["slider"]),
                  createVNode(_sfc_main$2, { categories: __props.categories }, null, 8, ["categories"]),
                  (openBlock(true), createBlock(Fragment, null, renderList(__props.category, (cat) => {
                    return openBlock(), createBlock(_sfc_main$3, { products: cat }, null, 8, ["products"]);
                  }), 256))
                ])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Dashboard.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
