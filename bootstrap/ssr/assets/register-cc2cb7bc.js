import { withCtx, unref, createVNode, withModifiers, createTextVNode, withDirectives, vModelText, toDisplayString, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderStyle, ssrRenderClass, ssrRenderAttr, ssrInterpolate } from "vue/server-renderer";
import { A as AppTemplate } from "./AppTemplate-2d192a23.js";
import { u as useFunctions } from "./useFunctions-b8a0fd2e.js";
import { useForm } from "@inertiajs/vue3";
import { H as HeadTags } from "./headTags-218fe00b.js";
import "./pwa-0a2b72e5.js";
import "./_plugin-vue_export-helper-cc2b3d55.js";
const register_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "register",
  __ssrInlineRender: true,
  props: {
    carts: Object,
    total: Number,
    pageMeta: Object
  },
  setup(__props) {
    const form = useForm({
      name: "",
      email: "",
      phone: "",
      address: ""
    });
    function CreateUser() {
      form.post("/checkout/shippinginformation", {
        onSuccess: (page) => {
          if (page.props.flash.success) {
            toastr.success(page.props.flash.success);
          } else {
            toastr.error(page.props.flash.error);
          }
          toastr.options.preventDuplicates = true;
          toastr.options.progressBar = true;
        }
      });
    }
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(HeadTags, { pageMeta: __props.pageMeta }, null, _parent));
      _push(ssrRenderComponent(AppTemplate, null, {
        content: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="ps-shopping" style="${ssrRenderStyle({ "background": "#fff" })}"${_scopeId}><div class="container"${_scopeId}><div class="ps-shopping__content"${_scopeId}><form${_scopeId}><div class="row"${_scopeId}><div class="col-12 col-md-7 col-lg-9 mt-5 p-5"${_scopeId}><div class="row"${_scopeId}><div class="col-12 col-md-12 col-lg-12" style="${ssrRenderStyle({ "background": "#fff", "border-radius": "10px", "border": "2px solid #eee" })}"${_scopeId}><p class="m-4" style="${ssrRenderStyle({ "color": "#332d2d" })}"${_scopeId}><i class="fa fa-check-square-o" style="${ssrRenderStyle({ "color": "rgb(79, 81, 79)" })}"${_scopeId}></i> Shipping Information </p><hr${_scopeId}><div class="row m-3"${_scopeId}><div class="col-12 col-md-6"${_scopeId}><div class="ps-form__group"${_scopeId}><label for="name" style="${ssrRenderStyle({ "color": "rgb(114, 111, 111)" })}"${_scopeId}> Full Name</label><input style="${ssrRenderStyle({ "border-radius": "5px" })}" class="${ssrRenderClass([{ "is-invalid": unref(form).errors.name }, "form-control ps-form__input"])}" type="text" placeholder="Full name" name="name"${ssrRenderAttr("value", unref(form).name)}${_scopeId}><span class="badge bg-warning"${_scopeId}>${ssrInterpolate(unref(form).errors.name)}</span></div></div><div class="col-12 col-md-6 mt-1"${_scopeId}><div class="ps-form__group"${_scopeId}><label for="phone" style="${ssrRenderStyle({ "color": "rgb(114, 111, 111)" })}"${_scopeId}> Phone Number</label><input type="text" placeholder="Phone Number" class="${ssrRenderClass([{ "is-invalid": unref(form).errors.phone }, "form-control ps-form__input"])}" id="phone"${ssrRenderAttr("value", unref(form).phone)} name="phone"${_scopeId}><span class="badge bg-warning"${_scopeId}>${ssrInterpolate(unref(form).errors.phone)}</span></div></div></div><div class="row m-3"${_scopeId}><div class="col-12 col-md-6 mt-1"${_scopeId}><div class="ps-form__group"${_scopeId}><label for="email" style="${ssrRenderStyle({ "color": "rgb(114, 111, 111)" })}"${_scopeId}> Email Address</label><input type="email" placeholder="Email Address" id="email" class="${ssrRenderClass([{ "is-invalid": unref(form).errors.email }, "form-control ps-form__input"])}"${ssrRenderAttr("value", unref(form).email)} name="email"${_scopeId}><span class="badge bg-warning"${_scopeId}>${ssrInterpolate(unref(form).errors.email)}</span></div></div><div class="col-12 col-md-6 mt-1"${_scopeId}><div class="ps-form__group"${_scopeId}><label id="address" style="${ssrRenderStyle({ "color": "rgb(114, 111, 111)" })}"${_scopeId}> Full Address </label><input type="text" placeholder="Full Address" id="address" class="${ssrRenderClass([{ "is-invalid": unref(form).errors.address }, "form-control ps-form__input"])}"${ssrRenderAttr("value", unref(form).address)} name="address"${_scopeId}><span class="badge bg-warning"${_scopeId}>${ssrInterpolate(unref(form).errors.address)}</span></div></div></div></div><div class="col-12 col-md-12 col-lg-12 mt-3" style="${ssrRenderStyle({ "background": "#fff", "border-radius": "10px", "border": "2px solid #eee" })}"${_scopeId}><p class="m-4" style="${ssrRenderStyle({ "color": "rgb(114, 111, 111)" })}"${_scopeId}><i class="fa fa-check-square-o" style="${ssrRenderStyle({ "color": "rgb(114, 111, 111)" })}"${_scopeId}></i> Shipping Method</p></div><div class="col-12 col-md-12 col-lg-12 mt-3" style="${ssrRenderStyle({ "background": "#fff", "border-radius": "10px", "border": "2px solid #eee" })}"${_scopeId}><p class="m-4" style="${ssrRenderStyle({ "color": "rgb(114, 111, 111)" })}"${_scopeId}><i class="fa fa-check-square-o" style="${ssrRenderStyle({ "color": "rgb(114, 111, 111)" })}"${_scopeId}></i> Payment Method</p></div></div></div><div class="col-12 col-md-5 col-lg-3 mt-5"${_scopeId}><div class="ps-shopping__box mt-5" style="${ssrRenderStyle({ "background": "#fff" })}"${_scopeId}><div class="ps-shopping__row"${_scopeId}><div class="ps-shopping__label"${_scopeId}>Cart Summary</div></div><div class="ps-shopping__form"${_scopeId}><div class="ps-shopping__group"${_scopeId}><input class="form-control ps-input" type="text" placeholder="County"${_scopeId}></div><div class="ps-shopping__group"${_scopeId}><input class="form-control ps-input" type="text" placeholder="Town / City"${_scopeId}></div><div class="ps-shopping__group"${_scopeId}><input class="form-control ps-input" type="text" placeholder="Postcode"${_scopeId}></div></div><div class="ps-shopping__row"${_scopeId}><div class="ps-shopping__label"${_scopeId}>Total</div><div class="ps-shopping__price"${_scopeId}>${ssrInterpolate(unref(useFunctions).addSeperator(__props.total))}</div></div><div class="ps-shopping__text"${_scopeId}>Shipping options will be updated during checkout.</div><div class="ps-shopping__checkout"${_scopeId}><button class="ps-btn ps-btn--primary" style="${ssrRenderStyle({ "border-radius": "5px" })}"${_scopeId}>Proceed to checkout</button><a class="ps-shopping__link" href="{{ route(&#39;shops.index&#39;) }}"${_scopeId}>Continue Shopping</a></div></div></div></div></form></div></div></div><div style="${ssrRenderStyle({ "height": "2em", "background": "#eee" })}"${_scopeId}></div>`);
          } else {
            return [
              createVNode("div", {
                class: "ps-shopping",
                style: { "background": "#fff" }
              }, [
                createVNode("div", { class: "container" }, [
                  createVNode("div", { class: "ps-shopping__content" }, [
                    createVNode("form", {
                      onSubmit: withModifiers(CreateUser, ["prevent"])
                    }, [
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
                                createTextVNode(" Shipping Information ")
                              ]),
                              createVNode("hr"),
                              createVNode("div", { class: "row m-3" }, [
                                createVNode("div", { class: "col-12 col-md-6" }, [
                                  createVNode("div", { class: "ps-form__group" }, [
                                    createVNode("label", {
                                      for: "name",
                                      style: { "color": "rgb(114, 111, 111)" }
                                    }, " Full Name"),
                                    withDirectives(createVNode("input", {
                                      style: { "border-radius": "5px" },
                                      class: [{ "is-invalid": unref(form).errors.name }, "form-control ps-form__input"],
                                      type: "text",
                                      placeholder: "Full name",
                                      name: "name",
                                      "onUpdate:modelValue": ($event) => unref(form).name = $event
                                    }, null, 10, ["onUpdate:modelValue"]), [
                                      [vModelText, unref(form).name]
                                    ]),
                                    createVNode("span", { class: "badge bg-warning" }, toDisplayString(unref(form).errors.name), 1)
                                  ])
                                ]),
                                createVNode("div", { class: "col-12 col-md-6 mt-1" }, [
                                  createVNode("div", { class: "ps-form__group" }, [
                                    createVNode("label", {
                                      for: "phone",
                                      style: { "color": "rgb(114, 111, 111)" }
                                    }, " Phone Number"),
                                    withDirectives(createVNode("input", {
                                      class: ["form-control ps-form__input", { "is-invalid": unref(form).errors.phone }],
                                      type: "text",
                                      placeholder: "Phone Number",
                                      id: "phone",
                                      "onUpdate:modelValue": ($event) => unref(form).phone = $event,
                                      name: "phone"
                                    }, null, 10, ["onUpdate:modelValue"]), [
                                      [vModelText, unref(form).phone]
                                    ]),
                                    createVNode("span", { class: "badge bg-warning" }, toDisplayString(unref(form).errors.phone), 1)
                                  ])
                                ])
                              ]),
                              createVNode("div", { class: "row m-3" }, [
                                createVNode("div", { class: "col-12 col-md-6 mt-1" }, [
                                  createVNode("div", { class: "ps-form__group" }, [
                                    createVNode("label", {
                                      for: "email",
                                      style: { "color": "rgb(114, 111, 111)" }
                                    }, " Email Address"),
                                    withDirectives(createVNode("input", {
                                      class: ["form-control ps-form__input", { "is-invalid": unref(form).errors.email }],
                                      type: "email",
                                      placeholder: "Email Address",
                                      id: "email",
                                      "onUpdate:modelValue": ($event) => unref(form).email = $event,
                                      name: "email"
                                    }, null, 10, ["onUpdate:modelValue"]), [
                                      [vModelText, unref(form).email]
                                    ]),
                                    createVNode("span", { class: "badge bg-warning" }, toDisplayString(unref(form).errors.email), 1)
                                  ])
                                ]),
                                createVNode("div", { class: "col-12 col-md-6 mt-1" }, [
                                  createVNode("div", { class: "ps-form__group" }, [
                                    createVNode("label", {
                                      id: "address",
                                      style: { "color": "rgb(114, 111, 111)" }
                                    }, " Full Address "),
                                    withDirectives(createVNode("input", {
                                      class: ["form-control ps-form__input", { "is-invalid": unref(form).errors.address }],
                                      type: "text",
                                      placeholder: "Full Address",
                                      id: "address",
                                      "onUpdate:modelValue": ($event) => unref(form).address = $event,
                                      name: "address"
                                    }, null, 10, ["onUpdate:modelValue"]), [
                                      [vModelText, unref(form).address]
                                    ]),
                                    createVNode("span", { class: "badge bg-warning" }, toDisplayString(unref(form).errors.address), 1)
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
                                  style: { "color": "rgb(114, 111, 111)" }
                                }),
                                createTextVNode(" Shipping Method")
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
                                  style: { "color": "rgb(114, 111, 111)" }
                                }),
                                createTextVNode(" Payment Method")
                              ])
                            ])
                          ])
                        ]),
                        createVNode("div", { class: "col-12 col-md-5 col-lg-3 mt-5" }, [
                          createVNode("div", {
                            class: "ps-shopping__box mt-5",
                            style: { "background": "#fff" }
                          }, [
                            createVNode("div", { class: "ps-shopping__row" }, [
                              createVNode("div", { class: "ps-shopping__label" }, "Cart Summary")
                            ]),
                            createVNode("div", { class: "ps-shopping__form" }, [
                              createVNode("div", { class: "ps-shopping__group" }, [
                                createVNode("input", {
                                  class: "form-control ps-input",
                                  type: "text",
                                  placeholder: "County"
                                })
                              ]),
                              createVNode("div", { class: "ps-shopping__group" }, [
                                createVNode("input", {
                                  class: "form-control ps-input",
                                  type: "text",
                                  placeholder: "Town / City"
                                })
                              ]),
                              createVNode("div", { class: "ps-shopping__group" }, [
                                createVNode("input", {
                                  class: "form-control ps-input",
                                  type: "text",
                                  placeholder: "Postcode"
                                })
                              ])
                            ]),
                            createVNode("div", { class: "ps-shopping__row" }, [
                              createVNode("div", { class: "ps-shopping__label" }, "Total"),
                              createVNode("div", { class: "ps-shopping__price" }, toDisplayString(unref(useFunctions).addSeperator(__props.total)), 1)
                            ]),
                            createVNode("div", { class: "ps-shopping__text" }, "Shipping options will be updated during checkout."),
                            createVNode("div", { class: "ps-shopping__checkout" }, [
                              createVNode("button", {
                                class: "ps-btn ps-btn--primary",
                                style: { "border-radius": "5px" }
                              }, "Proceed to checkout"),
                              createVNode("a", {
                                class: "ps-shopping__link",
                                href: "{{ route('shops.index') }}"
                              }, "Continue Shopping")
                            ])
                          ])
                        ])
                      ])
                    ], 32)
                  ])
                ])
              ]),
              createVNode("div", { style: { "height": "2em", "background": "#eee" } })
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Users/Accounts/register.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
