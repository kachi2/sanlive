import { withCtx, unref, createVNode, withModifiers, createTextVNode, withDirectives, vModelText, toDisplayString, vModelCheckbox, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderStyle, ssrRenderAttr, ssrRenderClass, ssrInterpolate, ssrIncludeBooleanAttr, ssrLooseContain } from "vue/server-renderer";
import { A as AppTemplate } from "./AppTemplate-2d192a23.js";
import { A as AccountSidebar } from "./accountSidebar-48f81fac.js";
import { H as HeadTags } from "./headTags-218fe00b.js";
import { useForm } from "@inertiajs/vue3";
import "./pwa-0a2b72e5.js";
import "./_plugin-vue_export-helper-cc2b3d55.js";
const _sfc_main = {
  __name: "createAddress",
  __ssrInlineRender: true,
  props: {
    address: Object,
    pageMeta: Object
  },
  setup(__props) {
    const form = useForm({
      name: "",
      phone: "",
      email: "",
      address: "",
      is_default: ""
    });
    function CreateAddress() {
      form.post("/account/address/store", {
        onSuccess: (page) => {
          if (page.props.flash.success) {
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
            _push2(`<div class="ps-shopping" style="${ssrRenderStyle({ "background": "#eee" })}"${_scopeId}><div class="container"${_scopeId}><div class="ps-shopping__content"${_scopeId}><div class="row"${_scopeId}>`);
            _push2(ssrRenderComponent(AccountSidebar, null, null, _parent2, _scopeId));
            _push2(`<div class="col-12 col-md-7 col-lg-8 mt-5" style="${ssrRenderStyle({ "background": "#fff", "border-radius": "5px" })}"${_scopeId}><form action=""${_scopeId}><div class="row"${_scopeId}><div class="col-12 col-md-12 col-lg-12" style="${ssrRenderStyle({ "background": "#fff", "border-radius": "10px" })}"${_scopeId}><p class="m-4" style="${ssrRenderStyle({ "color": "#332d2d" })}"${_scopeId}><i class="fa fa-check-square-o" style="${ssrRenderStyle({ "color": "rgb(79, 81, 79)" })}"${_scopeId}></i> Edit Address </p><hr${_scopeId}><div class="row m-3"${_scopeId}><div class="col-12 col-md-6"${_scopeId}><div class="ps-form__group"${_scopeId}><label for="name" style="${ssrRenderStyle({ "color": "rgb(114, 111, 111)" })}"${_scopeId}> Full Name</label><input style="${ssrRenderStyle({ "border-radius": "5px" })}" type="text"${ssrRenderAttr("value", unref(form).name)} class="${ssrRenderClass([{ "is-invalid": unref(form).errors.phone }, "form-control ps-form__input"])}" placeholder="Full name" id="name" name="name"${_scopeId}><span class="badge bg-warning"${_scopeId}>${ssrInterpolate(unref(form).errors.name)}</span></div></div><div class="col-12 col-md-6 mt-1"${_scopeId}><div class="ps-form__group"${_scopeId}><label for="phone" style="${ssrRenderStyle({ "color": "rgb(114, 111, 111)" })}"${_scopeId}> Phone Number</label><input class="${ssrRenderClass([{ "is-invalid": unref(form).errors.phone }, "form-control ps-form__input"])}" type="text" placeholder="Phone Number" id="phone"${ssrRenderAttr("value", unref(form).phone)} name="phone"${_scopeId}><span class="badge bg-warning"${_scopeId}>${ssrInterpolate(unref(form).errors.phone)}</span></div></div></div><div class="row m-3"${_scopeId}><div class="col-12 col-md-6 mt-1"${_scopeId}><div class="ps-form__group"${_scopeId}><label for="email" style="${ssrRenderStyle({ "color": "rgb(114, 111, 111)" })}"${_scopeId}> Email Address</label><input class="${ssrRenderClass([{ "is-invalid": unref(form).errors.email }, "form-control ps-form__input"])}" type="email" placeholder="Email Address" id="email"${ssrRenderAttr("value", unref(form).email)} name="email"${_scopeId}><span class="badge bg-warning" role="error"${_scopeId}>${ssrInterpolate(unref(form).errors.email)}</span></div></div><div class="col-12 col-md-6 mt-1"${_scopeId}><div class="ps-form__group"${_scopeId}><label id="address" style="${ssrRenderStyle({ "color": "rgb(114, 111, 111)" })}"${_scopeId}> Full Address </label><input class="${ssrRenderClass([{ "is-invalid": unref(form).errors.address }, "form-control ps-form__input"])}" type="text" placeholder="Full Address" id="address"${ssrRenderAttr("value", unref(form).address)} name="address"${_scopeId}><span class="badge bg-warning" role="error"${_scopeId}>${ssrInterpolate(unref(form).errors.address)}</span></div></div><div class="" style="${ssrRenderStyle({ "display": "flex", "color": "rgb(114, 111, 111)", "align-items": "center" })}"${_scopeId}><input style="${ssrRenderStyle({ "color": "rgb(114, 111, 111)", "width": "18px" })}" value="1" type="checkbox"${ssrIncludeBooleanAttr(Array.isArray(unref(form).is_default) ? ssrLooseContain(unref(form).is_default, "1") : unref(form).is_default) ? " checked" : ""} name="is_default" id="is_default"${_scopeId}><label for="" class="pl-2"${_scopeId}> Set as Default Address </label></div><div class="m-4" style="${ssrRenderStyle({ "float": "right" })}"${_scopeId}><button class="ps-btn ps-btn--success w-100" style="${ssrRenderStyle({ "border-radius": "5px" })}"${_scopeId}> Create Address</button></div></div></div></div></form></div></div></div></div></div>`);
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
                        createVNode("form", {
                          action: "",
                          onSubmit: withModifiers(CreateAddress, ["prevent"])
                        }, [
                          createVNode("div", { class: "row" }, [
                            createVNode("div", {
                              class: "col-12 col-md-12 col-lg-12",
                              style: { "background": "#fff", "border-radius": "10px" }
                            }, [
                              createVNode("p", {
                                class: "m-4",
                                style: { "color": "#332d2d" }
                              }, [
                                createVNode("i", {
                                  class: "fa fa-check-square-o",
                                  style: { "color": "rgb(79, 81, 79)" }
                                }),
                                createTextVNode(" Edit Address ")
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
                                      class: ["form-control ps-form__input", { "is-invalid": unref(form).errors.phone }],
                                      type: "text",
                                      "onUpdate:modelValue": ($event) => unref(form).name = $event,
                                      placeholder: "Full name",
                                      id: "name",
                                      name: "name"
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
                                    createVNode("span", {
                                      class: "badge bg-warning",
                                      role: "error"
                                    }, toDisplayString(unref(form).errors.email), 1)
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
                                    createVNode("span", {
                                      class: "badge bg-warning",
                                      role: "error"
                                    }, toDisplayString(unref(form).errors.address), 1)
                                  ])
                                ]),
                                createVNode("div", {
                                  class: "",
                                  style: { "display": "flex", "color": "rgb(114, 111, 111)", "align-items": "center" }
                                }, [
                                  withDirectives(createVNode("input", {
                                    style: { "color": "rgb(114, 111, 111)", "width": "18px" },
                                    value: "1",
                                    type: "checkbox",
                                    "onUpdate:modelValue": ($event) => unref(form).is_default = $event,
                                    name: "is_default",
                                    id: "is_default"
                                  }, null, 8, ["onUpdate:modelValue"]), [
                                    [vModelCheckbox, unref(form).is_default]
                                  ]),
                                  createVNode("label", {
                                    for: "",
                                    class: "pl-2"
                                  }, " Set as Default Address ")
                                ]),
                                createVNode("div", {
                                  class: "m-4",
                                  style: { "float": "right" }
                                }, [
                                  createVNode("button", {
                                    class: "ps-btn ps-btn--success w-100",
                                    style: { "border-radius": "5px" }
                                  }, " Create Address")
                                ])
                              ])
                            ])
                          ])
                        ], 32)
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Users/Accounts/createAddress.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
