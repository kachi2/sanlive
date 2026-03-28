import { withCtx, unref, createTextVNode, toDisplayString, createVNode, openBlock, createBlock, Fragment, renderList, createCommentVNode, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderStyle, ssrRenderList, ssrRenderAttr, ssrInterpolate } from "vue/server-renderer";
import { A as AppTemplate } from "./AppTemplate-2d192a23.js";
import { A as AccountSidebar } from "./accountSidebar-48f81fac.js";
import { Link } from "@inertiajs/vue3";
import { u as useFunctions } from "./useFunctions-b8a0fd2e.js";
import { H as HeadTags } from "./headTags-218fe00b.js";
import "./pwa-0a2b72e5.js";
import "./_plugin-vue_export-helper-cc2b3d55.js";
const _sfc_main = {
  __name: "orders",
  __ssrInlineRender: true,
  props: {
    orders: Object,
    pageMeta: Object
  },
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(HeadTags, { pageMeta: __props.pageMeta }, null, _parent));
      _push(ssrRenderComponent(AppTemplate, null, {
        content: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="ps-shopping" style="${ssrRenderStyle({ "background": "#eee" })}"${_scopeId}><div class="container"${_scopeId}><div class="ps-shopping__content"${_scopeId}><div class="row"${_scopeId}>`);
            _push2(ssrRenderComponent(AccountSidebar, null, null, _parent2, _scopeId));
            _push2(`<div class="col-12 col-md-7 col-lg-8 mt-5" style="${ssrRenderStyle({ "background": "#fff", "border-radius": "5px" })}"${_scopeId}><div class="row"${_scopeId}>`);
            if (__props.orders.length > 0) {
              _push2(`<div${_scopeId}><h3 class="p-5"${_scopeId}> Orders <hr style="${ssrRenderStyle({ "width": "100%" })}"${_scopeId}></h3><!--[-->`);
              ssrRenderList(__props.orders, (order) => {
                _push2(`<div${_scopeId}><div class="col-12 col-md-12"${_scopeId}><div class="ps-product ps-product--list" style="${ssrRenderStyle({ "border": "2px solid #d1d5dad4", "border-radius": "10px", "margin-top": "15px" })}"${_scopeId}><div class="ps-product__content" style="${ssrRenderStyle({ "border-right": "0px" })}"${_scopeId}><div class="ps-product__thumbnail"${_scopeId}><a class="ps-product__image" h${ssrRenderAttr("href", `/account/orders/details/${order == null ? void 0 : order.Order_no}`)}${_scopeId}><figure${_scopeId}><img${ssrRenderAttr("src", `/images/products/${order.image}`)}${ssrRenderAttr("alt", order == null ? void 0 : order.product_name)}${_scopeId}></figure></a></div><div class="ps-product__info"${_scopeId}><p class="ps-product__tite" style="${ssrRenderStyle({ "font-size": "16px", "color": "#262525" })}"${_scopeId}>`);
                _push2(ssrRenderComponent(unref(Link), {
                  class: "ps-product__branch",
                  href: `/account/orders/details/${order.Order_no}`
                }, {
                  default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      _push3(`${ssrInterpolate(order == null ? void 0 : order.product_name)}`);
                    } else {
                      return [
                        createTextVNode(toDisplayString(order == null ? void 0 : order.product_name), 1)
                      ];
                    }
                  }),
                  _: 2
                }, _parent2, _scopeId));
                _push2(`<br${_scopeId}>`);
                _push2(ssrRenderComponent(unref(Link), {
                  href: `/account/orders/details/${order.Order_no}`,
                  style: { "color": "#5e5b5b" }
                }, {
                  default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      _push3(`Order: ${ssrInterpolate(order == null ? void 0 : order.Order_no)}`);
                    } else {
                      return [
                        createTextVNode("Order: " + toDisplayString(order == null ? void 0 : order.Order_no), 1)
                      ];
                    }
                  }),
                  _: 2
                }, _parent2, _scopeId));
                _push2(`<br${_scopeId}> Amount: ${ssrInterpolate(unref(useFunctions).addSeperator(order.payable))} <br${_scopeId}>`);
                if ((order == null ? void 0 : order.dispatch_status) == 1) {
                  _push2(`<span class="badge badge-success"${_scopeId}> delivered</span>`);
                } else {
                  _push2(`<!---->`);
                }
                if ((order == null ? void 0 : order.dispatch_status) == 0) {
                  _push2(`<span class="badge badge-info"${_scopeId}> Awaiting Confirmation</span>`);
                } else {
                  _push2(`<!---->`);
                }
                if ((order == null ? void 0 : order.dispatch_status) == -1) {
                  _push2(`<span class="badge badge-danger"${_scopeId}> Cancelled</span>`);
                } else {
                  _push2(`<!---->`);
                }
                if ((order == null ? void 0 : order.dispatch_status) == 2) {
                  _push2(`<span class="badge badge-primary"${_scopeId}> Shipped</span>`);
                } else {
                  _push2(`<!---->`);
                }
                _push2(`<br${_scopeId}>`);
                if (order.is_paid == 1) {
                  _push2(`<span class="badge badge-success"${_scopeId}> Paid</span>`);
                } else {
                  _push2(`<span class="badge badge-warning"${_scopeId}> Not Paid</span>`);
                }
                _push2(`</p><ul class="ps-product__list"${_scopeId}><li${_scopeId}><span class="ps-list__title"${_scopeId}>Created: </span>`);
                _push2(ssrRenderComponent(unref(Link), {
                  class: "ps-list__text",
                  href: "#"
                }, {
                  default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      _push3(`${ssrInterpolate(order.created_at)}`);
                    } else {
                      return [
                        createTextVNode(toDisplayString(order.created_at), 1)
                      ];
                    }
                  }),
                  _: 2
                }, _parent2, _scopeId));
                _push2(`</li></ul></div></div><div class="ps-product__footer"${_scopeId}><div class="d-none d-xl-block"${_scopeId}><span style="${ssrRenderStyle({ "float": "right", "color": "rgb(10, 10, 128)" })}"${_scopeId}>`);
                _push2(ssrRenderComponent(unref(Link), {
                  href: `/account/orders/details/${order.Order_no}`,
                  style: {}
                }, {
                  default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      _push3(` View Details`);
                    } else {
                      return [
                        createTextVNode(" View Details")
                      ];
                    }
                  }),
                  _: 2
                }, _parent2, _scopeId));
                _push2(`</span></div></div></div></div></div>`);
              });
              _push2(`<!--]--></div>`);
            } else {
              _push2(`<div class="col-12 col-md-12"${_scopeId}><div class="ps-product ps-product--list" style="${ssrRenderStyle({ "border": "2px solid #d1d5dad4", "border-radius": "10px", "margin-top": "15px" })}"${_scopeId}><div class="ps-product__content" style="${ssrRenderStyle({ "border-right": "0px" })}"${_scopeId}><div class="ps-product__info"${_scopeId}><p class="ps-product__tite" style="${ssrRenderStyle({ "font-size": "16px", "color": "#262525" })}"${_scopeId}> You don&#39;t have any order yet <br${_scopeId}><a href="/catalogs" class="btn btn-primary"${_scopeId}> Start Shopping</a></p></div></div></div></div>`);
            }
            _push2(`<div class="p-5" style="${ssrRenderStyle({ "float": "right" })}"${_scopeId}></div></div></div></div></div></div></div>`);
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
                          __props.orders.length > 0 ? (openBlock(), createBlock("div", { key: 0 }, [
                            createVNode("h3", { class: "p-5" }, [
                              createTextVNode(" Orders "),
                              createVNode("hr", { style: { "width": "100%" } })
                            ]),
                            (openBlock(true), createBlock(Fragment, null, renderList(__props.orders, (order) => {
                              return openBlock(), createBlock("div", null, [
                                createVNode("div", { class: "col-12 col-md-12" }, [
                                  createVNode("div", {
                                    class: "ps-product ps-product--list",
                                    style: { "border": "2px solid #d1d5dad4", "border-radius": "10px", "margin-top": "15px" }
                                  }, [
                                    createVNode("div", {
                                      class: "ps-product__content",
                                      style: { "border-right": "0px" }
                                    }, [
                                      createVNode("div", { class: "ps-product__thumbnail" }, [
                                        createVNode("a", {
                                          class: "ps-product__image",
                                          h: "",
                                          href: `/account/orders/details/${order == null ? void 0 : order.Order_no}`
                                        }, [
                                          createVNode("figure", null, [
                                            createVNode("img", {
                                              src: `/images/products/${order.image}`,
                                              alt: order == null ? void 0 : order.product_name
                                            }, null, 8, ["src", "alt"])
                                          ])
                                        ], 8, ["href"])
                                      ]),
                                      createVNode("div", { class: "ps-product__info" }, [
                                        createVNode("p", {
                                          class: "ps-product__tite",
                                          style: { "font-size": "16px", "color": "#262525" }
                                        }, [
                                          createVNode(unref(Link), {
                                            class: "ps-product__branch",
                                            href: `/account/orders/details/${order.Order_no}`
                                          }, {
                                            default: withCtx(() => [
                                              createTextVNode(toDisplayString(order == null ? void 0 : order.product_name), 1)
                                            ]),
                                            _: 2
                                          }, 1032, ["href"]),
                                          createVNode("br"),
                                          createVNode(unref(Link), {
                                            href: `/account/orders/details/${order.Order_no}`,
                                            style: { "color": "#5e5b5b" }
                                          }, {
                                            default: withCtx(() => [
                                              createTextVNode("Order: " + toDisplayString(order == null ? void 0 : order.Order_no), 1)
                                            ]),
                                            _: 2
                                          }, 1032, ["href"]),
                                          createVNode("br"),
                                          createTextVNode(" Amount: " + toDisplayString(unref(useFunctions).addSeperator(order.payable)) + " ", 1),
                                          createVNode("br"),
                                          (order == null ? void 0 : order.dispatch_status) == 1 ? (openBlock(), createBlock("span", {
                                            key: 0,
                                            class: "badge badge-success"
                                          }, " delivered")) : createCommentVNode("", true),
                                          (order == null ? void 0 : order.dispatch_status) == 0 ? (openBlock(), createBlock("span", {
                                            key: 1,
                                            class: "badge badge-info"
                                          }, " Awaiting Confirmation")) : createCommentVNode("", true),
                                          (order == null ? void 0 : order.dispatch_status) == -1 ? (openBlock(), createBlock("span", {
                                            key: 2,
                                            class: "badge badge-danger"
                                          }, " Cancelled")) : createCommentVNode("", true),
                                          (order == null ? void 0 : order.dispatch_status) == 2 ? (openBlock(), createBlock("span", {
                                            key: 3,
                                            class: "badge badge-primary"
                                          }, " Shipped")) : createCommentVNode("", true),
                                          createVNode("br"),
                                          order.is_paid == 1 ? (openBlock(), createBlock("span", {
                                            key: 4,
                                            class: "badge badge-success"
                                          }, " Paid")) : (openBlock(), createBlock("span", {
                                            key: 5,
                                            class: "badge badge-warning"
                                          }, " Not Paid"))
                                        ]),
                                        createVNode("ul", { class: "ps-product__list" }, [
                                          createVNode("li", null, [
                                            createVNode("span", { class: "ps-list__title" }, "Created: "),
                                            createVNode(unref(Link), {
                                              class: "ps-list__text",
                                              href: "#"
                                            }, {
                                              default: withCtx(() => [
                                                createTextVNode(toDisplayString(order.created_at), 1)
                                              ]),
                                              _: 2
                                            }, 1024)
                                          ])
                                        ])
                                      ])
                                    ]),
                                    createVNode("div", { class: "ps-product__footer" }, [
                                      createVNode("div", { class: "d-none d-xl-block" }, [
                                        createVNode("span", { style: { "float": "right", "color": "rgb(10, 10, 128)" } }, [
                                          createVNode(unref(Link), {
                                            href: `/account/orders/details/${order.Order_no}`,
                                            style: {}
                                          }, {
                                            default: withCtx(() => [
                                              createTextVNode(" View Details")
                                            ]),
                                            _: 2
                                          }, 1032, ["href"])
                                        ])
                                      ])
                                    ])
                                  ])
                                ])
                              ]);
                            }), 256))
                          ])) : (openBlock(), createBlock("div", {
                            key: 1,
                            class: "col-12 col-md-12"
                          }, [
                            createVNode("div", {
                              class: "ps-product ps-product--list",
                              style: { "border": "2px solid #d1d5dad4", "border-radius": "10px", "margin-top": "15px" }
                            }, [
                              createVNode("div", {
                                class: "ps-product__content",
                                style: { "border-right": "0px" }
                              }, [
                                createVNode("div", { class: "ps-product__info" }, [
                                  createVNode("p", {
                                    class: "ps-product__tite",
                                    style: { "font-size": "16px", "color": "#262525" }
                                  }, [
                                    createTextVNode(" You don't have any order yet "),
                                    createVNode("br"),
                                    createVNode("a", {
                                      href: "/catalogs",
                                      class: "btn btn-primary"
                                    }, " Start Shopping")
                                  ])
                                ])
                              ])
                            ])
                          ])),
                          createVNode("div", {
                            class: "p-5",
                            style: { "float": "right" }
                          })
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Users/Accounts/orders.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
