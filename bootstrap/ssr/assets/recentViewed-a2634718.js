import { defineComponent, resolveComponent, withCtx, unref, createTextVNode, toDisplayString, createVNode, openBlock, createBlock, Fragment, renderList, createCommentVNode, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderStyle, ssrRenderList, ssrRenderAttr, ssrInterpolate } from "vue/server-renderer";
import { A as AppTemplate } from "./AppTemplate-2d192a23.js";
import { A as AccountSidebar } from "./accountSidebar-48f81fac.js";
import { Link } from "@inertiajs/vue3";
const _sfc_main = /* @__PURE__ */ defineComponent({
  __name: "recentViewed",
  __ssrInlineRender: true,
  props: {
    recent: Object
  },
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      const _component_center = resolveComponent("center");
      _push(ssrRenderComponent(AppTemplate, _attrs, {
        content: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="ps-shopping" style="${ssrRenderStyle({ "background": "#eee" })}"${_scopeId}><div class="container"${_scopeId}><div class="ps-shopping__content"${_scopeId}><div class="row"${_scopeId}>`);
            _push2(ssrRenderComponent(AccountSidebar, null, null, _parent2, _scopeId));
            _push2(`<div class="col-12 col-md-7 col-lg-8 mt-5" style="${ssrRenderStyle({ "background": "#fff", "border-radius": "5px" })}"${_scopeId}><div class="row"${_scopeId}><span class="pt-5 pl-5"${_scopeId}><a href="#" onclick="history.back()"${_scopeId}> &lt;&lt; back </a> <hr style="${ssrRenderStyle({ "width": "100%" })}"${_scopeId}></span><div class="ps-categogy--grid"${_scopeId}><div class="row m-0"${_scopeId}>`);
            if (__props.recent.length > 0) {
              _push2(`<!--[-->`);
              ssrRenderList(__props.recent, (product) => {
                _push2(`<div class="col-6 col-lg-4 col-xl-3 p-0"${_scopeId}><div class="ps-product ps-product--standard"${_scopeId}><div class="ps-product__thumbnail"${_scopeId}><a class="ps-product__image" href="product1.html"${_scopeId}><figure${_scopeId}><img${ssrRenderAttr("src", `/images/products/${product.image_path}`)}${ssrRenderAttr("alt", product.name)}${_scopeId}></figure></a><div class="ps-product__badge"${_scopeId}><div class="ps-badge ps-badge--sale"${_scopeId}>-${ssrInterpolate(product.discount)}%</div></div></div><div class="ps-product__content"${_scopeId}>`);
                _push2(ssrRenderComponent(unref(Link), {
                  href: `/products/${product.slug}`
                }, {
                  default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      _push3(`${ssrInterpolate(product.category.name)}`);
                    } else {
                      return [
                        createTextVNode(toDisplayString(product.category.name), 1)
                      ];
                    }
                  }),
                  _: 2
                }, _parent2, _scopeId));
                _push2(`<h5 class="ps-product__ttle"${_scopeId}>`);
                _push2(ssrRenderComponent(unref(Link), {
                  href: `/products/${product.slug}`
                }, {
                  default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      _push3(`${ssrInterpolate(product.name)}`);
                    } else {
                      return [
                        createTextVNode(toDisplayString(product.name), 1)
                      ];
                    }
                  }),
                  _: 2
                }, _parent2, _scopeId));
                _push2(`</h5><div class="ps-product__meta"${_scopeId}><span class="ps-product__price sale"${_scopeId}>${ssrInterpolate(product.sale_price)}</span><span class="ps-product__del"${_scopeId}>${ssrInterpolate(product.price)}</span></div>`);
                _push2(ssrRenderComponent(_component_center, null, {
                  default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      _push3(ssrRenderComponent(unref(Link), {
                        href: `/products/${product.slug}`,
                        class: "btn btn-primary"
                      }, {
                        default: withCtx((_3, _push4, _parent4, _scopeId3) => {
                          if (_push4) {
                            _push4(` Add To Cart`);
                          } else {
                            return [
                              createTextVNode(" Add To Cart")
                            ];
                          }
                        }),
                        _: 2
                      }, _parent3, _scopeId2));
                    } else {
                      return [
                        createVNode(unref(Link), {
                          href: `/products/${product.slug}`,
                          class: "btn btn-primary"
                        }, {
                          default: withCtx(() => [
                            createTextVNode(" Add To Cart")
                          ]),
                          _: 2
                        }, 1032, ["href"])
                      ];
                    }
                  }),
                  _: 2
                }, _parent2, _scopeId));
                _push2(`</div></div></div>`);
              });
              _push2(`<!--]-->`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div></div></div></div></div></div></div></div>`);
          } else {
            return [
              createVNode("div", {
                class: "ps-shopping",
                style: { "background": "#eee" }
              }, [
                createVNode("div", { class: "container" }, [
                  createVNode("div", { class: "ps-shopping__content" }, [
                    createVNode("div", { class: "row" }, [
                      createVNode(AccountSidebar),
                      createVNode("div", {
                        class: "col-12 col-md-7 col-lg-8 mt-5",
                        style: { "background": "#fff", "border-radius": "5px" }
                      }, [
                        createVNode("div", { class: "row" }, [
                          createVNode("span", { class: "pt-5 pl-5" }, [
                            createVNode("a", {
                              href: "#",
                              onclick: "history.back()"
                            }, " << back "),
                            createTextVNode(),
                            createVNode("hr", { style: { "width": "100%" } })
                          ]),
                          createVNode("div", { class: "ps-categogy--grid" }, [
                            createVNode("div", { class: "row m-0" }, [
                              __props.recent.length > 0 ? (openBlock(true), createBlock(Fragment, { key: 0 }, renderList(__props.recent, (product) => {
                                return openBlock(), createBlock("div", { class: "col-6 col-lg-4 col-xl-3 p-0" }, [
                                  createVNode("div", { class: "ps-product ps-product--standard" }, [
                                    createVNode("div", { class: "ps-product__thumbnail" }, [
                                      createVNode("a", {
                                        class: "ps-product__image",
                                        href: "product1.html"
                                      }, [
                                        createVNode("figure", null, [
                                          createVNode("img", {
                                            src: `/images/products/${product.image_path}`,
                                            alt: product.name
                                          }, null, 8, ["src", "alt"])
                                        ])
                                      ]),
                                      createVNode("div", { class: "ps-product__badge" }, [
                                        createVNode("div", { class: "ps-badge ps-badge--sale" }, "-" + toDisplayString(product.discount) + "%", 1)
                                      ])
                                    ]),
                                    createVNode("div", { class: "ps-product__content" }, [
                                      createVNode(unref(Link), {
                                        href: `/products/${product.slug}`
                                      }, {
                                        default: withCtx(() => [
                                          createTextVNode(toDisplayString(product.category.name), 1)
                                        ]),
                                        _: 2
                                      }, 1032, ["href"]),
                                      createVNode("h5", { class: "ps-product__ttle" }, [
                                        createVNode(unref(Link), {
                                          href: `/products/${product.slug}`
                                        }, {
                                          default: withCtx(() => [
                                            createTextVNode(toDisplayString(product.name), 1)
                                          ]),
                                          _: 2
                                        }, 1032, ["href"])
                                      ]),
                                      createVNode("div", { class: "ps-product__meta" }, [
                                        createVNode("span", { class: "ps-product__price sale" }, toDisplayString(product.sale_price), 1),
                                        createVNode("span", { class: "ps-product__del" }, toDisplayString(product.price), 1)
                                      ]),
                                      createVNode(_component_center, null, {
                                        default: withCtx(() => [
                                          createVNode(unref(Link), {
                                            href: `/products/${product.slug}`,
                                            class: "btn btn-primary"
                                          }, {
                                            default: withCtx(() => [
                                              createTextVNode(" Add To Cart")
                                            ]),
                                            _: 2
                                          }, 1032, ["href"])
                                        ]),
                                        _: 2
                                      }, 1024)
                                    ])
                                  ])
                                ]);
                              }), 256)) : createCommentVNode("", true)
                            ])
                          ])
                        ])
                      ])
                    ])
                  ])
                ])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
    };
  }
});
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Users/Accounts/recentViewed.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
