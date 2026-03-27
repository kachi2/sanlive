import { mergeProps, unref, withCtx, createVNode, toDisplayString, createTextVNode, useSSRContext } from "vue";
import { ssrRenderAttrs, ssrRenderStyle, ssrRenderComponent, ssrInterpolate, ssrRenderList, ssrRenderAttr } from "vue/server-renderer";
import { Link } from "@inertiajs/vue3";
import { u as useFunctions } from "./useFunctions-b8a0fd2e.js";
const _sfc_main = {
  __name: "ProductList",
  __ssrInlineRender: true,
  props: {
    "products": Object
  },
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<section${ssrRenderAttrs(mergeProps({ class: "ps-section--featured" }, _attrs))}><div class="container"><div class="ps-noti p-2" style="${ssrRenderStyle({ "border-radius": "5px" })}">`);
      _push(ssrRenderComponent(unref(Link), {
        class: "ps-category__image",
        href: `/catalogs/${__props.products.slug}`
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<p class="ml-2" style="${ssrRenderStyle({ "color": "#fff", "font-weight": "bold", "text-align": "left" })}"${_scopeId}>${ssrInterpolate(__props.products.name)}</p>`);
          } else {
            return [
              createVNode("p", {
                class: "ml-2",
                style: { "color": "#fff", "font-weight": "bold", "text-align": "left" }
              }, toDisplayString(__props.products.name), 1)
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div><div class="ps-section__content"><div class="row m-0"><!--[-->`);
      ssrRenderList(__props.products.products, (product) => {
        _push(`<div class="col-6 p-2 col-md-6 col-lg-3 pt-4"><div class="ps-section__product shadow-sm"><div class="ps-product ps-product--standard cart-card border-gray-800" style="${ssrRenderStyle({ "background-color": "#fff" })}"><div class="ps-product__thumbnail">`);
        _push(ssrRenderComponent(unref(Link), {
          class: "ps-product__image",
          href: `/products/${product.slug}`,
          style: { "max-height": "250px" }
        }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`<figure${_scopeId}><img${ssrRenderAttr("src", `/images/products/${product.image_path}`)} alt=""${_scopeId}><img${ssrRenderAttr("src", `/images/products/${product.image_path}`)}${ssrRenderAttr("alt", product.name)}${_scopeId}></figure>`);
            } else {
              return [
                createVNode("figure", null, [
                  createVNode("img", {
                    src: `/images/products/${product.image_path}`,
                    alt: ""
                  }, null, 8, ["src"]),
                  createVNode("img", {
                    src: `/images/products/${product.image_path}`,
                    alt: product.name
                  }, null, 8, ["src", "alt"])
                ])
              ];
            }
          }),
          _: 2
        }, _parent));
        _push(`<div class="ps-product__badge"></div></div><div class="ps-product__content"><h2 class="" style="${ssrRenderStyle({ "font-size": "14px" })}">`);
        _push(ssrRenderComponent(unref(Link), {
          href: `/products/${product.slug}`
        }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`${ssrInterpolate(product.name)}`);
            } else {
              return [
                createTextVNode(toDisplayString(product.name), 1)
              ];
            }
          }),
          _: 2
        }, _parent));
        _push(`</h2><h3 class="ps-product__meta"><span class="ps-product__price sale">${ssrInterpolate(unref(useFunctions).addSeperator(product.sale_price))}</span><span class="ps-product__del">${ssrInterpolate(unref(useFunctions).addSeperator(product.price))}</span></h3><span class="download-note"><div class="row"><div class="col-12 col-md-6 col-lg-6 p-2">`);
        _push(ssrRenderComponent(unref(Link), {
          class: "btn btn-lg",
          href: `/products/${product.slug}`,
          style: { "background": "#fff", "color": "#73c2fb", "border": "1px solid #73c2fb", "width": "100px=" }
        }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`<i class="fa fa-plus"${_scopeId}></i> Add to basket`);
            } else {
              return [
                createVNode("i", { class: "fa fa-plus" }),
                createTextVNode(" Add to basket")
              ];
            }
          }),
          _: 2
        }, _parent));
        _push(`</div><div class="col-12 col-md-6 col-lg-6 p-2"><a target="_blank" rel="noopener noreferrer"${ssrRenderAttr("href", `https://wa.me/+2348058885913?text=Please i need  to order this product ${product.name} the price is: ${unref(useFunctions).addSeperator(product.sale_price)} `)}><img src="/frontend/whatsapp.png" style="${ssrRenderStyle({ "width": "90px" })}"></a></div></div></span></div></div></div></div>`);
      });
      _push(`<!--]--></div></div></div></section>`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Home/ProductList.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
