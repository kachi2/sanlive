import { withCtx, unref, createVNode, createTextVNode, toDisplayString, openBlock, createBlock, Fragment, renderList, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderStyle, ssrRenderAttr, ssrInterpolate, ssrRenderList } from "vue/server-renderer";
import { A as AppTemplate } from "./AppTemplate-63cfd3c1.js";
import { A as AccountSidebar } from "./accountSidebar-48f81fac.js";
import { usePage } from "@inertiajs/vue3";
import { u as useFunctions } from "./useFunctions-b8a0fd2e.js";
import { H as HeadTags } from "./headTags-d006710e.js";
import "./pwa-521173f5.js";
import "./_plugin-vue_export-helper-cc2b3d55.js";
const _sfc_main = {
  __name: "orderDetails",
  __ssrInlineRender: true,
  props: {
    order_items: Object,
    orders: Array,
    shipping: Object,
    delivery: Array,
    pageMeta: Object
  },
  setup(__props) {
    const page = usePage();
    const auth = page.props.auth;
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(HeadTags, { pageMeta: __props.pageMeta }, null, _parent));
      _push(ssrRenderComponent(AppTemplate, null, {
        content: withCtx((_, _push2, _parent2, _scopeId) => {
          var _a, _b, _c, _d, _e, _f, _g, _h;
          if (_push2) {
            _push2(`<div class="ps-shopping" style="${ssrRenderStyle({ "background": "#eee" })}"${_scopeId}><div class="container"${_scopeId}><div class="ps-shopping__content"${_scopeId}><div class="row"${_scopeId}>`);
            _push2(ssrRenderComponent(AccountSidebar, null, null, _parent2, _scopeId));
            _push2(`<div class="col-12 col-md-7 col-lg-8 mt-5" style="${ssrRenderStyle({ "background": "#fff", "border-radius": "5px" })}" id="pdfContent"${_scopeId}><div class="row"${_scopeId}><span class="pt-5 pl-5"${_scopeId}><a href="#" onclick="history.back()"${_scopeId}> Back </a>       <button onclick="window.print()" class="btn btn-outline-info" style="${ssrRenderStyle({ "left": "50px" })}"${_scopeId}> Print Receipt</button></span><hr style="${ssrRenderStyle({ "width": "100%" })}"${_scopeId}><div class="col-12 col-md-12" id="userDetails"${_scopeId}><span style="${ssrRenderStyle({ "float": "right", "padding-right": "20px" })}"${_scopeId}><img${ssrRenderAttr("src", `/images/${unref(page).props.settings.site_logo}`)} width="100px"${_scopeId}></span><p class="pl-3" style="${ssrRenderStyle({ "color": "#050505" })}"${_scopeId}> First Name: ${ssrInterpolate(unref(auth).user.first_name)} <br${_scopeId}> Last Name: ${ssrInterpolate(unref(auth).user.last_name)}<br${_scopeId}> Email: ${ssrInterpolate(unref(auth).user.email)}</p><hr${_scopeId}></div><div class="col-12 col-md-12"${_scopeId}><p class="pl-3" style="${ssrRenderStyle({ "color": "#414040" })}"${_scopeId}> Order No: ${ssrInterpolate(__props.orders.order_no)} <br${_scopeId}> Placed On: ${ssrInterpolate(__props.orders.created_at)}<br${_scopeId}> Total Amount: ${ssrInterpolate(unref(useFunctions).addSeperator(__props.orders.payable))}</p></div><span class="pt-5 pl-5"${_scopeId}> Items in Your Order </span><!--[-->`);
            ssrRenderList(__props.order_items, (order) => {
              _push2(`<div class="col-12 col-md-12"${_scopeId}><div class="ps-product ps-product--list" style="${ssrRenderStyle({ "border": "2px solid #d1d5dad4", "border-radius": "10px", "margin-top": "15px" })}"${_scopeId}><div class="ps-product__content" style="${ssrRenderStyle({ "border-right": "0px" })}"${_scopeId}><div class="ps-product__thumbnil" style="${ssrRenderStyle({})}"${_scopeId}><a class="ps-product__image" href=""${_scopeId}><figure${_scopeId}><img${ssrRenderAttr("src", `/images/products/${order.image}`)} style="${ssrRenderStyle({ "width": "100px" })}"${ssrRenderAttr("alt", order.product_name)}${_scopeId}></figure></a></div><div class="ps-product__info"${_scopeId}><p class="ps-product__tite" style="${ssrRenderStyle({ "font-size": "16px", "color": "#1e1b1b" })}"${_scopeId}><a class="ps-product__branch" href="#"${_scopeId}>${ssrInterpolate(order.product_name)}</a><br${_scopeId}><a style="${ssrRenderStyle({ "color": "#201c1c" })}"${_scopeId}>Order: ${ssrInterpolate(order.Order_no)}</a><br${_scopeId}><a style="${ssrRenderStyle({ "color": "#1c1818" })}"${_scopeId}>QTY: ${ssrInterpolate(order.qty)}</a><br${_scopeId}> ${ssrInterpolate(unref(useFunctions).addSeperator(order.payable))}</p></div></div></div></div>`);
            });
            _push2(`<!--]--></div><div class="row"${_scopeId}><div class="col-12 col-md-6"${_scopeId}><div class="ps-categogy--list"${_scopeId}><div class="ps-product ps-product--list" style="${ssrRenderStyle({ "border": "2px solid #d1d5dad4", "border-radius": "10px" })}"${_scopeId}><div class="ps-product__conent" style="${ssrRenderStyle({ "border-right": "0px" })}"${_scopeId}><div class="ps-product__info"${_scopeId}><a class="ps-product__branch" href="#"${_scopeId}></a><p class="ps-product__tite" style="${ssrRenderStyle({ "font-size": "16px", "color": "#262525" })}"${_scopeId}><a${_scopeId}></a> Payment Information </p><hr${_scopeId}><div class="ps-product__meta"${_scopeId}><span class="ps-product__price" style="${ssrRenderStyle({ "font-size": "15px" })}"${_scopeId}> Payment Method: ${ssrInterpolate(__props.orders.payment_method)}</span></div><ul class="ps-product__list"${_scopeId}> Payment Details <li${_scopeId}><span class="ps-list__title"${_scopeId}></span> Items Amount: ${ssrInterpolate(unref(useFunctions).addSeperator(__props.orders.payable))}</li><li${_scopeId}><span class="ps-list__title"${_scopeId}></span>Delivery Fee: ${ssrInterpolate(unref(useFunctions).addSeperator((_a = __props.delivery) == null ? void 0 : _a.fee))}</li><li${_scopeId}><span class="ps-list__title"${_scopeId}></span>Payment Ref: ${ssrInterpolate(__props.orders.payment_ref)}</li></ul></div></div></div></div></div><div class="col-12 col-md-6"${_scopeId}><div class="ps-categogy--list"${_scopeId}><div class="ps-product ps-product--list" style="${ssrRenderStyle({ "border": "2px solid #d1d5dad4", "border-radius": "10px" })}"${_scopeId}><div class="ps-product__conent" style="${ssrRenderStyle({ "border-right": "0px" })}"${_scopeId}><div class="ps-product__info"${_scopeId}><a class="ps-product__branch" href="#"${_scopeId}></a><p class="ps-product__tite" style="${ssrRenderStyle({ "font-size": "16px", "color": "#262525" })}"${_scopeId}><a${_scopeId}></a> Shipping Information </p><hr${_scopeId}><div class="ps-product__meta"${_scopeId}><span class="ps-product__price" style="${ssrRenderStyle({ "font-size": "15px" })}"${_scopeId}> Delivery Method: ${ssrInterpolate(__props.orders.shipping_method == "home_delivery" ? "Home delivery" : "Pick-up Delivery")}</span></div><ul class="ps-product__list"${_scopeId}><li${_scopeId}><span class="ps-list__title"${_scopeId}>${ssrInterpolate((_b = __props.shipping) == null ? void 0 : _b.name)}</span></li><li${_scopeId}><span class="ps-list__title"${_scopeId}>${ssrInterpolate((_c = __props.shipping) == null ? void 0 : _c.phone)}</span></li><li${_scopeId}><span class="ps-list__title"${_scopeId}>${ssrInterpolate(((_d = __props.shipping) == null ? void 0 : _d.address) ?? "")}</span></li><li${_scopeId}><span class="ps-list__title"${_scopeId}></span></li></ul></div></div></div></div></div></div></div></div></div></div></div>`);
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
                        style: { "background": "#fff", "border-radius": "5px" },
                        id: "pdfContent"
                      }, [
                        createVNode("div", { class: "row" }, [
                          createVNode("span", { class: "pt-5 pl-5" }, [
                            createVNode("a", {
                              href: "#",
                              onclick: "history.back()"
                            }, " Back "),
                            createTextVNode("       "),
                            createVNode("button", {
                              onclick: "window.print()",
                              class: "btn btn-outline-info",
                              style: { "left": "50px" }
                            }, " Print Receipt")
                          ]),
                          createVNode("hr", { style: { "width": "100%" } }),
                          createVNode("div", {
                            class: "col-12 col-md-12",
                            id: "userDetails"
                          }, [
                            createVNode("span", { style: { "float": "right", "padding-right": "20px" } }, [
                              createVNode("img", {
                                src: `/images/${unref(page).props.settings.site_logo}`,
                                width: "100px"
                              }, null, 8, ["src"])
                            ]),
                            createVNode("p", {
                              class: "pl-3",
                              style: { "color": "#050505" }
                            }, [
                              createTextVNode(" First Name: " + toDisplayString(unref(auth).user.first_name) + " ", 1),
                              createVNode("br"),
                              createTextVNode(" Last Name: " + toDisplayString(unref(auth).user.last_name), 1),
                              createVNode("br"),
                              createTextVNode(" Email: " + toDisplayString(unref(auth).user.email), 1)
                            ]),
                            createVNode("hr")
                          ]),
                          createVNode("div", { class: "col-12 col-md-12" }, [
                            createVNode("p", {
                              class: "pl-3",
                              style: { "color": "#414040" }
                            }, [
                              createTextVNode(" Order No: " + toDisplayString(__props.orders.order_no) + " ", 1),
                              createVNode("br"),
                              createTextVNode(" Placed On: " + toDisplayString(__props.orders.created_at), 1),
                              createVNode("br"),
                              createTextVNode(" Total Amount: " + toDisplayString(unref(useFunctions).addSeperator(__props.orders.payable)), 1)
                            ])
                          ]),
                          createVNode("span", { class: "pt-5 pl-5" }, " Items in Your Order "),
                          (openBlock(true), createBlock(Fragment, null, renderList(__props.order_items, (order) => {
                            return openBlock(), createBlock("div", { class: "col-12 col-md-12" }, [
                              createVNode("div", {
                                class: "ps-product ps-product--list",
                                style: { "border": "2px solid #d1d5dad4", "border-radius": "10px", "margin-top": "15px" }
                              }, [
                                createVNode("div", {
                                  class: "ps-product__content",
                                  style: { "border-right": "0px" }
                                }, [
                                  createVNode("div", {
                                    class: "ps-product__thumbnil",
                                    style: {}
                                  }, [
                                    createVNode("a", {
                                      class: "ps-product__image",
                                      href: ""
                                    }, [
                                      createVNode("figure", null, [
                                        createVNode("img", {
                                          src: `/images/products/${order.image}`,
                                          style: { "width": "100px" },
                                          alt: order.product_name
                                        }, null, 8, ["src", "alt"])
                                      ])
                                    ])
                                  ]),
                                  createVNode("div", { class: "ps-product__info" }, [
                                    createVNode("p", {
                                      class: "ps-product__tite",
                                      style: { "font-size": "16px", "color": "#1e1b1b" }
                                    }, [
                                      createVNode("a", {
                                        class: "ps-product__branch",
                                        href: "#"
                                      }, toDisplayString(order.product_name), 1),
                                      createVNode("br"),
                                      createVNode("a", { style: { "color": "#201c1c" } }, "Order: " + toDisplayString(order.Order_no), 1),
                                      createVNode("br"),
                                      createVNode("a", { style: { "color": "#1c1818" } }, "QTY: " + toDisplayString(order.qty), 1),
                                      createVNode("br"),
                                      createTextVNode(" " + toDisplayString(unref(useFunctions).addSeperator(order.payable)), 1)
                                    ])
                                  ])
                                ])
                              ])
                            ]);
                          }), 256))
                        ]),
                        createVNode("div", { class: "row" }, [
                          createVNode("div", { class: "col-12 col-md-6" }, [
                            createVNode("div", { class: "ps-categogy--list" }, [
                              createVNode("div", {
                                class: "ps-product ps-product--list",
                                style: { "border": "2px solid #d1d5dad4", "border-radius": "10px" }
                              }, [
                                createVNode("div", {
                                  class: "ps-product__conent",
                                  style: { "border-right": "0px" }
                                }, [
                                  createVNode("div", { class: "ps-product__info" }, [
                                    createVNode("a", {
                                      class: "ps-product__branch",
                                      href: "#"
                                    }),
                                    createVNode("p", {
                                      class: "ps-product__tite",
                                      style: { "font-size": "16px", "color": "#262525" }
                                    }, [
                                      createVNode("a"),
                                      createTextVNode(" Payment Information ")
                                    ]),
                                    createVNode("hr"),
                                    createVNode("div", { class: "ps-product__meta" }, [
                                      createVNode("span", {
                                        class: "ps-product__price",
                                        style: { "font-size": "15px" }
                                      }, " Payment Method: " + toDisplayString(__props.orders.payment_method), 1)
                                    ]),
                                    createVNode("ul", { class: "ps-product__list" }, [
                                      createTextVNode(" Payment Details "),
                                      createVNode("li", null, [
                                        createVNode("span", { class: "ps-list__title" }),
                                        createTextVNode(" Items Amount: " + toDisplayString(unref(useFunctions).addSeperator(__props.orders.payable)), 1)
                                      ]),
                                      createVNode("li", null, [
                                        createVNode("span", { class: "ps-list__title" }),
                                        createTextVNode("Delivery Fee: " + toDisplayString(unref(useFunctions).addSeperator((_e = __props.delivery) == null ? void 0 : _e.fee)), 1)
                                      ]),
                                      createVNode("li", null, [
                                        createVNode("span", { class: "ps-list__title" }),
                                        createTextVNode("Payment Ref: " + toDisplayString(__props.orders.payment_ref), 1)
                                      ])
                                    ])
                                  ])
                                ])
                              ])
                            ])
                          ]),
                          createVNode("div", { class: "col-12 col-md-6" }, [
                            createVNode("div", { class: "ps-categogy--list" }, [
                              createVNode("div", {
                                class: "ps-product ps-product--list",
                                style: { "border": "2px solid #d1d5dad4", "border-radius": "10px" }
                              }, [
                                createVNode("div", {
                                  class: "ps-product__conent",
                                  style: { "border-right": "0px" }
                                }, [
                                  createVNode("div", { class: "ps-product__info" }, [
                                    createVNode("a", {
                                      class: "ps-product__branch",
                                      href: "#"
                                    }),
                                    createVNode("p", {
                                      class: "ps-product__tite",
                                      style: { "font-size": "16px", "color": "#262525" }
                                    }, [
                                      createVNode("a"),
                                      createTextVNode(" Shipping Information ")
                                    ]),
                                    createVNode("hr"),
                                    createVNode("div", { class: "ps-product__meta" }, [
                                      createVNode("span", {
                                        class: "ps-product__price",
                                        style: { "font-size": "15px" }
                                      }, " Delivery Method: " + toDisplayString(__props.orders.shipping_method == "home_delivery" ? "Home delivery" : "Pick-up Delivery"), 1)
                                    ]),
                                    createVNode("ul", { class: "ps-product__list" }, [
                                      createVNode("li", null, [
                                        createVNode("span", { class: "ps-list__title" }, toDisplayString((_f = __props.shipping) == null ? void 0 : _f.name), 1)
                                      ]),
                                      createVNode("li", null, [
                                        createVNode("span", { class: "ps-list__title" }, toDisplayString((_g = __props.shipping) == null ? void 0 : _g.phone), 1)
                                      ]),
                                      createVNode("li", null, [
                                        createVNode("span", { class: "ps-list__title" }, toDisplayString(((_h = __props.shipping) == null ? void 0 : _h.address) ?? ""), 1)
                                      ]),
                                      createVNode("li", null, [
                                        createVNode("span", { class: "ps-list__title" })
                                      ])
                                    ])
                                  ])
                                ])
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Users/Accounts/orderDetails.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
