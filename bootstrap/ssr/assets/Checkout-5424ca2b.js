import { ref, computed, withCtx, unref, createTextVNode, createVNode, withModifiers, toDisplayString, withDirectives, vModelRadio, vModelText, openBlock, createBlock, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderStyle, ssrInterpolate, ssrRenderClass, ssrIncludeBooleanAttr, ssrLooseEqual, ssrRenderAttr } from "vue/server-renderer";
import { A as AppTemplate } from "./AppTemplate-2d192a23.js";
import { useForm, Link } from "@inertiajs/vue3";
import { u as useFunctions } from "./useFunctions-b8a0fd2e.js";
import { H as HeadTags } from "./headTags-218fe00b.js";
import "./pwa-0a2b72e5.js";
import "./_plugin-vue_export-helper-cc2b3d55.js";
const _sfc_main = {
  __name: "Checkout",
  __ssrInlineRender: true,
  props: {
    data: Object,
    address: Object,
    orderNo: Number,
    shipping_fee: String,
    total: Number,
    pageMeta: Object
  },
  setup(__props) {
    const props = __props;
    const shipping_fees = ref(0);
    let CartTotal = ref(props.total);
    const amounts = ref(CartTotal.value);
    const isLoading = ref(false);
    function isSelected(param) {
      if (param == "delivery") {
        shipping_fees.value = props.shipping_fee;
        CartTotal.value = parseInt(props.total) + parseInt(props.shipping_fee);
        amounts.value = CartTotal.value;
      } else {
        CartTotal.value = parseInt(props.total);
        shipping_fees.value = 0;
        amounts.value = CartTotal.value;
      }
      return CartTotal.value;
    }
    const form = useForm({
      delivery: "",
      payment_method: "",
      amount: computed(() => amounts.value),
      orderNo: props.orderNo
    });
    function proceedToCheckout() {
      isLoading.value = true;
      form.post("/checkout/payment", {
        onSuccess: (page) => {
          if (page.props.flash.success) {
            isLoading.value = false;
            toastr.success(page.props.flash.success);
          } else {
            toastr.error(page.props.flash.error);
          }
        }
      });
    }
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(HeadTags, { pageMeta: __props.pageMeta }, null, _parent));
      _push(ssrRenderComponent(AppTemplate, null, {
        content: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="ps-shopping" style="${ssrRenderStyle({ "background": "#fff" })}"${_scopeId}><form action=""${_scopeId}><div class="container"${_scopeId}><div class="ps-shopping__content"${_scopeId}><div class="row"${_scopeId}><div class="col-12 col-md-7 col-lg-9 mt-5 p-5"${_scopeId}><div class="row"${_scopeId}><div class="col-12 col-md-12 col-lg-12" style="${ssrRenderStyle({ "background": "#fff", "border-radius": "10px", "border": "2px solid #eee" })}"${_scopeId}><p class="m-4" style="${ssrRenderStyle({ "color": "#332d2d" })}"${_scopeId}><i class="fa fa-check-square-o" style="${ssrRenderStyle({ "color": "rgb(79, 81, 79)" })}"${_scopeId}></i> Customer Address <span style="${ssrRenderStyle({ "float": "right" })}"${_scopeId}>`);
            _push2(ssrRenderComponent(unref(Link), { href: "/checkout/address/index" }, null, _parent2, _scopeId));
            _push2(`</span></p><hr${_scopeId}><div class="row m-3"${_scopeId}><div class="col-12 col-md-6"${_scopeId}><div class="ps-form__group"${_scopeId}><p style="${ssrRenderStyle({ "color": "#76717a" })}"${_scopeId}><span style="${ssrRenderStyle({ "font-weight": "bold" })}"${_scopeId}>Name: </span>${ssrInterpolate(__props.address.name)}</p><p style="${ssrRenderStyle({ "color": "#76717a" })}"${_scopeId}><span style="${ssrRenderStyle({ "font-weight": "bold" })}"${_scopeId}> Address: </span> ${ssrInterpolate(__props.address.address ? __props.address.address : "")} ${ssrInterpolate(__props.address.city ? __props.address.city : "")} ${ssrInterpolate(__props.address.state ? __props.address.tate : "")} ${ssrInterpolate(__props.address.country ? __props.address.country : "")}</p></div></div><div class="col-12 col-md-6 mt-1"${_scopeId}><div class="ps-form__group"${_scopeId}><p style="${ssrRenderStyle({ "color": "#76717a" })}"${_scopeId}><span style="${ssrRenderStyle({ "font-weight": "bold" })}"${_scopeId}>Phone: </span> ${ssrInterpolate(__props.address.phone)}</p><p style="${ssrRenderStyle({ "color": "#76717a" })}"${_scopeId}><span style="${ssrRenderStyle({ "font-weight": "bold" })}"${_scopeId}>Email: </span> ${ssrInterpolate(__props.address.email)}</p></div></div></div></div><div class="col-12 col-md-12 col-lg-12 mt-3" style="${ssrRenderStyle({ "background": "#fff", "border-radius": "10px", "border": "2px solid #eee" })}"${_scopeId}><p class="m-4" style="${ssrRenderStyle({ "color": "rgb(114, 111, 111)" })}"${_scopeId}><i class="fa fa-check-square-o" style="${ssrRenderStyle({ "color": "rgb(114,111,111)" })}"${_scopeId}></i> Delivery Details </p><hr${_scopeId}><label for="delivery" style="${ssrRenderStyle({ "width": "100%", "background": "#fff" })}"${_scopeId}><div style="${ssrRenderStyle({ "border": "0px solid #00000031", "border-radius": "10px" })}"${_scopeId}><div class="ps-categogy--ist p-4" style="${ssrRenderStyle({ "display": "flex" })}"${_scopeId}><input type="radio" id="delivery" name="delivery" value="pickup_delivery" data-amount="0" required${_scopeId}><label for="delivery" class="pl-2"${_scopeId}> Pick up Station - N0 fee </label></div></div><span class="card ml-3"${_scopeId}><span class="card-body"${_scopeId}><small style="${ssrRenderStyle({ "border-bottom": "1px solid #000", "padding": "2px" })}"${_scopeId}>You can pick your Item</small><p${_scopeId}> No 29, Doyin Omololu Street, Alapere, Ketu,Lagos, Nigeria.</p></span></span></label><label for="home" style="${ssrRenderStyle({ "width": "100%", "background": "#fff" })}"${_scopeId}><div style="${ssrRenderStyle({ "border": "0px solid #00000031", "border-radius": "10px" })}"${_scopeId}><div class="ps-categogy--ist p-4" style="${ssrRenderStyle({ "display": "flex" })}"${_scopeId}><input type="radio" id="home" name="delivery" value="home_delivery" data-amount="0"${_scopeId}><label for="home" class="pl-2"${_scopeId}> Home Delivery - N${ssrInterpolate(unref(useFunctions).addSeperator(__props.shipping_fee))} fee </label></div></div><span class="card ml-3"${_scopeId}><span class="card-body"${_scopeId}><small style="${ssrRenderStyle({ "border-bottom": "1px solid #000", "padding": "2px" })}"${_scopeId}>Item will be shipped to your address</small><p${_scopeId}>${ssrInterpolate(__props.address.address ?? "")} ${ssrInterpolate(__props.address.city ?? "")} ${ssrInterpolate(__props.address.state ?? "")} ${ssrInterpolate(__props.address.country ?? "")}</p></span></span></label></div><div class="col-12 col-md-12 col-lg-12 mt-3" style="${ssrRenderStyle({ "background": "#fff", "border-radius": "10px", "border": "2px solid #eee" })}"${_scopeId}><p class="m-4" style="${ssrRenderStyle({ "color": "rgb(114, 111, 111)" })}"${_scopeId}><i class="fa fa-check-square-o" style="${ssrRenderStyle({ "color": "rgb(114,111,111)" })}"${_scopeId}></i> Payment Method </p><div class="accordion" id="accordionExampleTwo"${_scopeId}><div class="card"${_scopeId}><div class="card-header" id="headingTwo"${_scopeId}><label data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"${_scopeId}><div class="row"${_scopeId}><div style="${ssrRenderStyle({ "width": "50px", "padding-left": "10px" })}"${_scopeId}><input style="${ssrRenderStyle({ "border-radius": "5px" })}" class="${ssrRenderClass({ "is-invalid": unref(form).errors.payment_method })}" type="radio" value="flutter"${ssrIncludeBooleanAttr(ssrLooseEqual(unref(form).payment_method, "flutter")) ? " checked" : ""} id="paystack" name="payment_method"${_scopeId}></div><div class="col-md-6 col-lg-6 col-12"${_scopeId}><strong${_scopeId}> Secured Payment with Flutterwave</strong></div><div class="col-md-2 col-lg-2 col-2"${_scopeId}><img src="/frontend/FLUTTER.webp"${_scopeId}></div></div></label><div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExampleTwo"${_scopeId}><div class="card-body"${_scopeId}><small${_scopeId}> Pay with Flutterwave for both local and international cards, your card <br${_scopeId}> information is secured </small></div></div></div></div></div></div></div></div><div class="col-12 col-md-5 col-lg-3"${_scopeId}><div class="ps-shopping__box mt-5" style="${ssrRenderStyle({ "background": "#fff" })}"${_scopeId}><div class="ps-shopping__row"${_scopeId}><div class="ps-shopping__label"${_scopeId}> Cart Summary </div></div><div class="ps-shopping__row"${_scopeId}><div class="ps-shopping__label"${_scopeId}> Item Total </div><div class="ps-shopping__price"${_scopeId}>${ssrInterpolate(unref(useFunctions).addSeperator(__props.total))}</div></div><div class="ps-shopping__row"${_scopeId}><div class="ps-shopping__label"${_scopeId}> Delivery Fee </div><div class="ps-shopping__price" id="fee"${_scopeId}>${ssrInterpolate(unref(useFunctions).addSeperator(shipping_fees.value) ?? 0)}</div></div><div class="ps-shopping__row"${_scopeId}><div class="ps-shopping__label"${_scopeId}> Total </div><div class="ps-shopping__price" id="total"${_scopeId}>${ssrInterpolate(unref(useFunctions).addSeperator(unref(CartTotal)))}</div><input type="hidden" id="sub_total"${ssrRenderAttr("value", unref(CartTotal))}${_scopeId}></div><input type="hidden" id="amount" name="amount"${ssrRenderAttr("value", unref(form).amount)}${_scopeId}><input type="hidden" name="orderNo"${ssrRenderAttr("value", __props.orderNo)}${_scopeId}><div class="ps-shopping__checkout"${_scopeId}>`);
            if (!isLoading.value) {
              _push2(`<button class="ps-btn ps-btn--primary" style="${ssrRenderStyle({ "border-radius": "5px" })}"${_scopeId}> Complete Order </button>`);
            } else {
              _push2(`<button class="ps-btn ps-btn--primary" style="${ssrRenderStyle({ "border-radius": "5px" })}"${_scopeId}> Please wait .... </button>`);
            }
            _push2(ssrRenderComponent(unref(Link), {
              class: "ps-shopping__link",
              href: "/catalogs"
            }, {
              default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`Continue Shopping`);
                } else {
                  return [
                    createTextVNode("Continue Shopping")
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(`</div></div></div></div></div></div></form></div>`);
          } else {
            return [
              createVNode("div", {
                class: "ps-shopping",
                style: { "background": "#fff" }
              }, [
                createVNode("form", {
                  action: "",
                  onSubmit: withModifiers(proceedToCheckout, ["prevent"])
                }, [
                  createVNode("div", { class: "container" }, [
                    createVNode("div", { class: "ps-shopping__content" }, [
                      createVNode("div", { class: "row" }, [
                        createVNode("div", { class: "col-12 col-md-7 col-lg-9 mt-5 p-5" }, [
                          createVNode("div", { class: "row" }, [
                            createVNode("div", {
                              class: "col-12 col-md-12 col-lg-12",
                              style: { "background": "#fff", "border-radius": "10px", "border": "2px solid #eee" }
                            }, [
                              createVNode("p", {
                                class: "m-4",
                                style: { "color": "#332d2d" }
                              }, [
                                createVNode("i", {
                                  class: "fa fa-check-square-o",
                                  style: { "color": "rgb(79, 81, 79)" }
                                }),
                                createTextVNode(" Customer Address "),
                                createVNode("span", { style: { "float": "right" } }, [
                                  createVNode(unref(Link), { href: "/checkout/address/index" })
                                ])
                              ]),
                              createVNode("hr"),
                              createVNode("div", { class: "row m-3" }, [
                                createVNode("div", { class: "col-12 col-md-6" }, [
                                  createVNode("div", { class: "ps-form__group" }, [
                                    createVNode("p", { style: { "color": "#76717a" } }, [
                                      createVNode("span", { style: { "font-weight": "bold" } }, "Name: "),
                                      createTextVNode(toDisplayString(__props.address.name), 1)
                                    ]),
                                    createVNode("p", { style: { "color": "#76717a" } }, [
                                      createVNode("span", { style: { "font-weight": "bold" } }, " Address: "),
                                      createTextVNode(" " + toDisplayString(__props.address.address ? __props.address.address : "") + " " + toDisplayString(__props.address.city ? __props.address.city : "") + " " + toDisplayString(__props.address.state ? __props.address.tate : "") + " " + toDisplayString(__props.address.country ? __props.address.country : ""), 1)
                                    ])
                                  ])
                                ]),
                                createVNode("div", { class: "col-12 col-md-6 mt-1" }, [
                                  createVNode("div", { class: "ps-form__group" }, [
                                    createVNode("p", { style: { "color": "#76717a" } }, [
                                      createVNode("span", { style: { "font-weight": "bold" } }, "Phone: "),
                                      createTextVNode(" " + toDisplayString(__props.address.phone), 1)
                                    ]),
                                    createVNode("p", { style: { "color": "#76717a" } }, [
                                      createVNode("span", { style: { "font-weight": "bold" } }, "Email: "),
                                      createTextVNode(" " + toDisplayString(__props.address.email), 1)
                                    ])
                                  ])
                                ])
                              ])
                            ]),
                            createVNode("div", {
                              class: "col-12 col-md-12 col-lg-12 mt-3",
                              style: { "background": "#fff", "border-radius": "10px", "border": "2px solid #eee" }
                            }, [
                              createVNode("p", {
                                class: "m-4",
                                style: { "color": "rgb(114, 111, 111)" }
                              }, [
                                createVNode("i", {
                                  class: "fa fa-check-square-o",
                                  style: { "color": "rgb(114,111,111)" }
                                }),
                                createTextVNode(" Delivery Details ")
                              ]),
                              createVNode("hr"),
                              createVNode("label", {
                                for: "delivery",
                                style: { "width": "100%", "background": "#fff" }
                              }, [
                                createVNode("div", { style: { "border": "0px solid #00000031", "border-radius": "10px" } }, [
                                  createVNode("div", {
                                    class: "ps-categogy--ist p-4",
                                    style: { "display": "flex" }
                                  }, [
                                    createVNode("input", {
                                      type: "radio",
                                      id: "delivery",
                                      name: "delivery",
                                      onClick: ($event) => isSelected("pickup"),
                                      value: "pickup_delivery",
                                      "data-amount": "0",
                                      required: ""
                                    }, null, 8, ["onClick"]),
                                    createVNode("label", {
                                      for: "delivery",
                                      class: "pl-2"
                                    }, " Pick up Station - N0 fee ")
                                  ])
                                ]),
                                createVNode("span", { class: "card ml-3" }, [
                                  createVNode("span", { class: "card-body" }, [
                                    createVNode("small", { style: { "border-bottom": "1px solid #000", "padding": "2px" } }, "You can pick your Item"),
                                    createVNode("p", null, " No 29, Doyin Omololu Street, Alapere, Ketu,Lagos, Nigeria.")
                                  ])
                                ])
                              ]),
                              createVNode("label", {
                                for: "home",
                                style: { "width": "100%", "background": "#fff" }
                              }, [
                                createVNode("div", { style: { "border": "0px solid #00000031", "border-radius": "10px" } }, [
                                  createVNode("div", {
                                    class: "ps-categogy--ist p-4",
                                    style: { "display": "flex" }
                                  }, [
                                    createVNode("input", {
                                      type: "radio",
                                      id: "home",
                                      name: "delivery",
                                      onClick: ($event) => isSelected("delivery"),
                                      value: "home_delivery",
                                      "data-amount": "0"
                                    }, null, 8, ["onClick"]),
                                    createVNode("label", {
                                      for: "home",
                                      class: "pl-2"
                                    }, " Home Delivery - N" + toDisplayString(unref(useFunctions).addSeperator(__props.shipping_fee)) + " fee ", 1)
                                  ])
                                ]),
                                createVNode("span", { class: "card ml-3" }, [
                                  createVNode("span", { class: "card-body" }, [
                                    createVNode("small", { style: { "border-bottom": "1px solid #000", "padding": "2px" } }, "Item will be shipped to your address"),
                                    createVNode("p", null, toDisplayString(__props.address.address ?? "") + " " + toDisplayString(__props.address.city ?? "") + " " + toDisplayString(__props.address.state ?? "") + " " + toDisplayString(__props.address.country ?? ""), 1)
                                  ])
                                ])
                              ])
                            ]),
                            createVNode("div", {
                              class: "col-12 col-md-12 col-lg-12 mt-3",
                              style: { "background": "#fff", "border-radius": "10px", "border": "2px solid #eee" }
                            }, [
                              createVNode("p", {
                                class: "m-4",
                                style: { "color": "rgb(114, 111, 111)" }
                              }, [
                                createVNode("i", {
                                  class: "fa fa-check-square-o",
                                  style: { "color": "rgb(114,111,111)" }
                                }),
                                createTextVNode(" Payment Method ")
                              ]),
                              createVNode("div", {
                                class: "accordion",
                                id: "accordionExampleTwo"
                              }, [
                                createVNode("div", { class: "card" }, [
                                  createVNode("div", {
                                    class: "card-header",
                                    id: "headingTwo"
                                  }, [
                                    createVNode("label", {
                                      "data-toggle": "collapse",
                                      "data-target": "#collapseTwo",
                                      "aria-expanded": "true",
                                      "aria-controls": "collapseTwo"
                                    }, [
                                      createVNode("div", { class: "row" }, [
                                        createVNode("div", { style: { "width": "50px", "padding-left": "10px" } }, [
                                          withDirectives(createVNode("input", {
                                            style: { "border-radius": "5px" },
                                            class: { "is-invalid": unref(form).errors.payment_method },
                                            type: "radio",
                                            value: "flutter",
                                            "onUpdate:modelValue": ($event) => unref(form).payment_method = $event,
                                            id: "paystack",
                                            name: "payment_method"
                                          }, null, 10, ["onUpdate:modelValue"]), [
                                            [vModelRadio, unref(form).payment_method]
                                          ])
                                        ]),
                                        createVNode("div", { class: "col-md-6 col-lg-6 col-12" }, [
                                          createVNode("strong", null, " Secured Payment with Flutterwave")
                                        ]),
                                        createVNode("div", { class: "col-md-2 col-lg-2 col-2" }, [
                                          createVNode("img", { src: "/frontend/FLUTTER.webp" })
                                        ])
                                      ])
                                    ]),
                                    createVNode("div", {
                                      id: "collapseTwo",
                                      class: "collapse",
                                      "aria-labelledby": "headingTwo",
                                      "data-parent": "#accordionExampleTwo"
                                    }, [
                                      createVNode("div", { class: "card-body" }, [
                                        createVNode("small", null, [
                                          createTextVNode(" Pay with Flutterwave for both local and international cards, your card "),
                                          createVNode("br"),
                                          createTextVNode(" information is secured ")
                                        ])
                                      ])
                                    ])
                                  ])
                                ])
                              ])
                            ])
                          ])
                        ]),
                        createVNode("div", { class: "col-12 col-md-5 col-lg-3" }, [
                          createVNode("div", {
                            class: "ps-shopping__box mt-5",
                            style: { "background": "#fff" }
                          }, [
                            createVNode("div", { class: "ps-shopping__row" }, [
                              createVNode("div", { class: "ps-shopping__label" }, " Cart Summary ")
                            ]),
                            createVNode("div", { class: "ps-shopping__row" }, [
                              createVNode("div", { class: "ps-shopping__label" }, " Item Total "),
                              createVNode("div", { class: "ps-shopping__price" }, toDisplayString(unref(useFunctions).addSeperator(__props.total)), 1)
                            ]),
                            createVNode("div", { class: "ps-shopping__row" }, [
                              createVNode("div", { class: "ps-shopping__label" }, " Delivery Fee "),
                              createVNode("div", {
                                class: "ps-shopping__price",
                                id: "fee"
                              }, toDisplayString(unref(useFunctions).addSeperator(shipping_fees.value) ?? 0), 1)
                            ]),
                            createVNode("div", { class: "ps-shopping__row" }, [
                              createVNode("div", { class: "ps-shopping__label" }, " Total "),
                              createVNode("div", {
                                class: "ps-shopping__price",
                                id: "total"
                              }, toDisplayString(unref(useFunctions).addSeperator(unref(CartTotal))), 1),
                              createVNode("input", {
                                type: "hidden",
                                id: "sub_total",
                                value: unref(CartTotal)
                              }, null, 8, ["value"])
                            ]),
                            withDirectives(createVNode("input", {
                              type: "hidden",
                              id: "amount",
                              name: "amount",
                              "onUpdate:modelValue": ($event) => unref(form).amount = $event
                            }, null, 8, ["onUpdate:modelValue"]), [
                              [vModelText, unref(form).amount]
                            ]),
                            createVNode("input", {
                              type: "hidden",
                              name: "orderNo",
                              value: __props.orderNo
                            }, null, 8, ["value"]),
                            createVNode("div", { class: "ps-shopping__checkout" }, [
                              !isLoading.value ? (openBlock(), createBlock("button", {
                                key: 0,
                                class: "ps-btn ps-btn--primary",
                                style: { "border-radius": "5px" }
                              }, " Complete Order ")) : (openBlock(), createBlock("button", {
                                key: 1,
                                class: "ps-btn ps-btn--primary",
                                style: { "border-radius": "5px" }
                              }, " Please wait .... ")),
                              createVNode(unref(Link), {
                                class: "ps-shopping__link",
                                href: "/catalogs"
                              }, {
                                default: withCtx(() => [
                                  createTextVNode("Continue Shopping")
                                ]),
                                _: 1
                              })
                            ])
                          ])
                        ])
                      ])
                    ])
                  ])
                ], 32)
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Users/Carts/Checkout.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
