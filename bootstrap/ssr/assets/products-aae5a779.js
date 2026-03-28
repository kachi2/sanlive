import { withCtx, unref, createVNode, createTextVNode, toDisplayString, openBlock, createBlock, createCommentVNode, Fragment, renderList, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderStyle, ssrInterpolate, ssrRenderList, ssrRenderAttr } from "vue/server-renderer";
import { A as AppTemplate } from "./AppTemplate-2d192a23.js";
import { Link } from "@inertiajs/vue3";
import { u as useFunctions } from "./useFunctions-b8a0fd2e.js";
import { H as HeadTags } from "./headTags-218fe00b.js";
import "./pwa-0a2b72e5.js";
import "./_plugin-vue_export-helper-cc2b3d55.js";
const _sfc_main = {
  __name: "products",
  __ssrInlineRender: true,
  props: {
    searchterm: String,
    products: Object,
    categories: Object,
    pageMeta: Object
  },
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(HeadTags, { pageMeta: __props.pageMeta }, null, _parent));
      _push(ssrRenderComponent(AppTemplate, null, {
        content: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="ps-categogy ps-categogy--dark" style="${ssrRenderStyle({ "background": "#e8e8e8" })}"${_scopeId}><div class="container"${_scopeId}><ul class="ps-breadcrumb"${_scopeId}><li class="ps-breadcrumb__item"${_scopeId}><a href=""${_scopeId}>Home</a></li><li class="ps-breadcrumb__item"${_scopeId}><a href=""${_scopeId}>Category</a></li><li class="ps-breadcrumb__item"${_scopeId}><a href=""${_scopeId}>`);
            if (__props.searchterm) {
              _push2(`<span${_scopeId}>${ssrInterpolate(__props.searchterm)}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</a></li></ul><div class="ps-categogy__content"${_scopeId}><div class="row row-reverse"${_scopeId}><div class="col-12 col-md-9" style="${ssrRenderStyle({ "background": "#fff", "padding": "10px", "border-radius": "10px", "top": "-40px" })}"${_scopeId}><div class="ps-categogy__wrapper"${_scopeId}><div class="ps-categogy__onsale"${_scopeId}><form${_scopeId}><div class="custom-control custom-checkbox"${_scopeId}><input class="custom-control-input" type="checkbox" id="onSaleProduct" checked${_scopeId}><label class="custom-control-label" for="onSaleProduct"${_scopeId}>`);
            if (__props.searchterm) {
              _push2(`<h1 style="${ssrRenderStyle({ "font-size": "15px" })}"${_scopeId}>${ssrInterpolate(__props.searchterm)}</h1>`);
            } else {
              _push2(`<span${_scopeId}> Showing All Results </span>`);
            }
            _push2(`</label></div></form></div><div class="ps-categogy__sort"${_scopeId}></div></div><div class="ps-categogy--grid"${_scopeId}><div class="row m-0"${_scopeId}>`);
            if (__props.products.length > 0) {
              _push2(`<!--[-->`);
              ssrRenderList(__props.products, (prods) => {
                _push2(`<div class="col-6 col-lg-4 col-md-4 col-xl-4"${_scopeId}><div class="ps-product ps-product--standard pb-3"${_scopeId}><div class="ps-product__thumbnail"${_scopeId}>`);
                _push2(ssrRenderComponent(unref(Link), {
                  class: "ps-product__image",
                  href: `/products/${prods.slug}`
                }, {
                  default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      _push3(`<figure${_scopeId2}><img${ssrRenderAttr("src", `/images/products/${prods.image_path}`)}${ssrRenderAttr("alt", prods.name)}${_scopeId2}><img${ssrRenderAttr("src", `/images/products/${prods.image_path}`)}${ssrRenderAttr("alt", prods.name)}${_scopeId2}></figure>`);
                    } else {
                      return [
                        createVNode("figure", null, [
                          createVNode("img", {
                            src: `/images/products/${prods.image_path}`,
                            alt: prods.name
                          }, null, 8, ["src", "alt"]),
                          createVNode("img", {
                            src: `/images/products/${prods.image_path}`,
                            alt: prods.name
                          }, null, 8, ["src", "alt"])
                        ])
                      ];
                    }
                  }),
                  _: 2
                }, _parent2, _scopeId));
                _push2(`</div><div class="ps-product__content"${_scopeId}><h5 class="ps-product__tite"${_scopeId}>`);
                _push2(ssrRenderComponent(unref(Link), {
                  href: `/products/${prods.slug}`
                }, {
                  default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      _push3(`${ssrInterpolate(prods.name)}`);
                    } else {
                      return [
                        createTextVNode(toDisplayString(prods.name), 1)
                      ];
                    }
                  }),
                  _: 2
                }, _parent2, _scopeId));
                _push2(`</h5><div class="ps-product__meta"${_scopeId}><span class="ps-product__price sale"${_scopeId}>${ssrInterpolate(unref(useFunctions).addSeperator(prods.sale_price))}</span><span class="ps-product__del"${_scopeId}>${ssrInterpolate(unref(useFunctions).addSeperator(prods.price))}</span></div></div>`);
                _push2(ssrRenderComponent(unref(Link), {
                  href: `/products/${prods.slug}`,
                  class: "btn btn-lg",
                  style: { "background": "#fff", "color": "#73c2fb", "border": "1px solid #73c2fb", "width": "100px" }
                }, {
                  default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      _push3(` Add to Cart <i class="fa fa-shopping-basket"${_scopeId2}></i>`);
                    } else {
                      return [
                        createTextVNode(" Add to Cart "),
                        createVNode("i", { class: "fa fa-shopping-basket" })
                      ];
                    }
                  }),
                  _: 2
                }, _parent2, _scopeId));
                _push2(ssrRenderComponent(unref(Link), {
                  target: "_blank",
                  rel: "noopener noreferrer",
                  href: `https://wa.me/+2348058885913?text=Please i need ${prods.name}, the  price on your website is ${prods.sale_price}} `
                }, {
                  default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      _push3(`     <img src="/frontend/whatsapp.png" style="${ssrRenderStyle({ "width": "90px", "padding": "0px" })}"${_scopeId2}>`);
                    } else {
                      return [
                        createTextVNode("     "),
                        createVNode("img", {
                          src: "/frontend/whatsapp.png",
                          style: { "width": "90px", "padding": "0px" }
                        })
                      ];
                    }
                  }),
                  _: 2
                }, _parent2, _scopeId));
                _push2(`</div></div>`);
              });
              _push2(`<!--]-->`);
            } else {
              _push2(`<div class="ps-delivery ps-delivery--info"${_scopeId}><div class="ps-delivery__content"${_scopeId}><div class="ps-delivery__text"${_scopeId}><i class="icon-shield-check"${_scopeId}></i><span${_scopeId}><h2 style="${ssrRenderStyle({ "font-size": "15px" })}"${_scopeId}>No Item found </h2></span></div></div></div>`);
            }
            _push2(`</div></div></div><div class="col-12 col-md-3" style="${ssrRenderStyle({ "top": "-40px" })}"${_scopeId}><div class="ps-widget ps-widget--product" style="${ssrRenderStyle({ "background": "#fff", "border-radius": "10px", "padding": "10px 20px" })}"${_scopeId}><div class="ps-widget__block"${_scopeId}><h4 class="ps-widget__title"${_scopeId}>Categories</h4><a class="ps-block-control" href="#"${_scopeId}><i class="fa fa-angle-down"${_scopeId}></i></a><div class="ps-widget__content ps-widget__category"${_scopeId}><ul class="menu--mobile"${_scopeId}><!--[-->`);
            ssrRenderList(__props.categories, (cat) => {
              _push2(`<li${_scopeId}>`);
              _push2(ssrRenderComponent(unref(Link), {
                href: `/catalogs/${cat.slug}`,
                style: { "font-size": "14px" }
              }, {
                default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`${ssrInterpolate(cat.name)}`);
                  } else {
                    return [
                      createTextVNode(toDisplayString(cat.name), 1)
                    ];
                  }
                }),
                _: 2
              }, _parent2, _scopeId));
              _push2(`<span class="sub-toggle"${_scopeId}><i class="fa fa-chevron-down"${_scopeId}></i></span><ul class="sub-menu"${_scopeId}><!--[-->`);
              ssrRenderList(cat.products, (prod) => {
                _push2(`<li${_scopeId}>`);
                _push2(ssrRenderComponent(unref(Link), {
                  href: `/products/${__props.products.slug}`
                }, {
                  default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      _push3(`${ssrInterpolate(prod.name)}`);
                    } else {
                      return [
                        createTextVNode(toDisplayString(prod.name), 1)
                      ];
                    }
                  }),
                  _: 2
                }, _parent2, _scopeId));
                _push2(`</li>`);
              });
              _push2(`<!--]--></ul></li>`);
            });
            _push2(`<!--]--></ul></div></div></div></div></div></div></div></div>`);
          } else {
            return [
              createVNode("div", {
                class: "ps-categogy ps-categogy--dark",
                style: { "background": "#e8e8e8" }
              }, [
                createVNode("div", { class: "container" }, [
                  createVNode("ul", { class: "ps-breadcrumb" }, [
                    createVNode("li", { class: "ps-breadcrumb__item" }, [
                      createVNode("a", { href: "" }, "Home")
                    ]),
                    createVNode("li", { class: "ps-breadcrumb__item" }, [
                      createVNode("a", { href: "" }, "Category")
                    ]),
                    createVNode("li", { class: "ps-breadcrumb__item" }, [
                      createVNode("a", { href: "" }, [
                        __props.searchterm ? (openBlock(), createBlock("span", { key: 0 }, toDisplayString(__props.searchterm), 1)) : createCommentVNode("", true)
                      ])
                    ])
                  ]),
                  createVNode("div", { class: "ps-categogy__content" }, [
                    createVNode("div", { class: "row row-reverse" }, [
                      createVNode("div", {
                        class: "col-12 col-md-9",
                        style: { "background": "#fff", "padding": "10px", "border-radius": "10px", "top": "-40px" }
                      }, [
                        createVNode("div", { class: "ps-categogy__wrapper" }, [
                          createVNode("div", { class: "ps-categogy__onsale" }, [
                            createVNode("form", null, [
                              createVNode("div", { class: "custom-control custom-checkbox" }, [
                                createVNode("input", {
                                  class: "custom-control-input",
                                  type: "checkbox",
                                  id: "onSaleProduct",
                                  checked: ""
                                }),
                                createVNode("label", {
                                  class: "custom-control-label",
                                  for: "onSaleProduct"
                                }, [
                                  __props.searchterm ? (openBlock(), createBlock("h1", {
                                    key: 0,
                                    style: { "font-size": "15px" }
                                  }, toDisplayString(__props.searchterm), 1)) : (openBlock(), createBlock("span", { key: 1 }, " Showing All Results "))
                                ])
                              ])
                            ])
                          ]),
                          createVNode("div", { class: "ps-categogy__sort" })
                        ]),
                        createVNode("div", { class: "ps-categogy--grid" }, [
                          createVNode("div", { class: "row m-0" }, [
                            __props.products.length > 0 ? (openBlock(true), createBlock(Fragment, { key: 0 }, renderList(__props.products, (prods) => {
                              return openBlock(), createBlock("div", { class: "col-6 col-lg-4 col-md-4 col-xl-4" }, [
                                createVNode("div", { class: "ps-product ps-product--standard pb-3" }, [
                                  createVNode("div", { class: "ps-product__thumbnail" }, [
                                    createVNode(unref(Link), {
                                      class: "ps-product__image",
                                      href: `/products/${prods.slug}`
                                    }, {
                                      default: withCtx(() => [
                                        createVNode("figure", null, [
                                          createVNode("img", {
                                            src: `/images/products/${prods.image_path}`,
                                            alt: prods.name
                                          }, null, 8, ["src", "alt"]),
                                          createVNode("img", {
                                            src: `/images/products/${prods.image_path}`,
                                            alt: prods.name
                                          }, null, 8, ["src", "alt"])
                                        ])
                                      ]),
                                      _: 2
                                    }, 1032, ["href"])
                                  ]),
                                  createVNode("div", { class: "ps-product__content" }, [
                                    createVNode("h5", { class: "ps-product__tite" }, [
                                      createVNode(unref(Link), {
                                        href: `/products/${prods.slug}`
                                      }, {
                                        default: withCtx(() => [
                                          createTextVNode(toDisplayString(prods.name), 1)
                                        ]),
                                        _: 2
                                      }, 1032, ["href"])
                                    ]),
                                    createVNode("div", { class: "ps-product__meta" }, [
                                      createVNode("span", { class: "ps-product__price sale" }, toDisplayString(unref(useFunctions).addSeperator(prods.sale_price)), 1),
                                      createVNode("span", { class: "ps-product__del" }, toDisplayString(unref(useFunctions).addSeperator(prods.price)), 1)
                                    ])
                                  ]),
                                  createVNode(unref(Link), {
                                    href: `/products/${prods.slug}`,
                                    class: "btn btn-lg",
                                    style: { "background": "#fff", "color": "#73c2fb", "border": "1px solid #73c2fb", "width": "100px" }
                                  }, {
                                    default: withCtx(() => [
                                      createTextVNode(" Add to Cart "),
                                      createVNode("i", { class: "fa fa-shopping-basket" })
                                    ]),
                                    _: 2
                                  }, 1032, ["href"]),
                                  createVNode(unref(Link), {
                                    target: "_blank",
                                    rel: "noopener noreferrer",
                                    href: `https://wa.me/+2348058885913?text=Please i need ${prods.name}, the  price on your website is ${prods.sale_price}} `
                                  }, {
                                    default: withCtx(() => [
                                      createTextVNode("     "),
                                      createVNode("img", {
                                        src: "/frontend/whatsapp.png",
                                        style: { "width": "90px", "padding": "0px" }
                                      })
                                    ]),
                                    _: 2
                                  }, 1032, ["href"])
                                ])
                              ]);
                            }), 256)) : (openBlock(), createBlock("div", {
                              key: 1,
                              class: "ps-delivery ps-delivery--info"
                            }, [
                              createVNode("div", { class: "ps-delivery__content" }, [
                                createVNode("div", { class: "ps-delivery__text" }, [
                                  createVNode("i", { class: "icon-shield-check" }),
                                  createVNode("span", null, [
                                    createVNode("h2", { style: { "font-size": "15px" } }, "No Item found ")
                                  ])
                                ])
                              ])
                            ]))
                          ])
                        ])
                      ]),
                      createVNode("div", {
                        class: "col-12 col-md-3",
                        style: { "top": "-40px" }
                      }, [
                        createVNode("div", {
                          class: "ps-widget ps-widget--product",
                          style: { "background": "#fff", "border-radius": "10px", "padding": "10px 20px" }
                        }, [
                          createVNode("div", { class: "ps-widget__block" }, [
                            createVNode("h4", { class: "ps-widget__title" }, "Categories"),
                            createVNode("a", {
                              class: "ps-block-control",
                              href: "#"
                            }, [
                              createVNode("i", { class: "fa fa-angle-down" })
                            ]),
                            createVNode("div", { class: "ps-widget__content ps-widget__category" }, [
                              createVNode("ul", { class: "menu--mobile" }, [
                                (openBlock(true), createBlock(Fragment, null, renderList(__props.categories, (cat) => {
                                  return openBlock(), createBlock("li", null, [
                                    createVNode(unref(Link), {
                                      href: `/catalogs/${cat.slug}`,
                                      style: { "font-size": "14px" }
                                    }, {
                                      default: withCtx(() => [
                                        createTextVNode(toDisplayString(cat.name), 1)
                                      ]),
                                      _: 2
                                    }, 1032, ["href"]),
                                    createVNode("span", { class: "sub-toggle" }, [
                                      createVNode("i", { class: "fa fa-chevron-down" })
                                    ]),
                                    createVNode("ul", { class: "sub-menu" }, [
                                      (openBlock(true), createBlock(Fragment, null, renderList(cat.products, (prod) => {
                                        return openBlock(), createBlock("li", null, [
                                          createVNode(unref(Link), {
                                            href: `/products/${__props.products.slug}`
                                          }, {
                                            default: withCtx(() => [
                                              createTextVNode(toDisplayString(prod.name), 1)
                                            ]),
                                            _: 2
                                          }, 1032, ["href"])
                                        ]);
                                      }), 256))
                                    ])
                                  ]);
                                }), 256))
                              ])
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
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Users/Pages/products.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
