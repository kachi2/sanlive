import { withCtx, unref, createVNode, withModifiers, withDirectives, vModelText, toDisplayString, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderStyle, ssrRenderClass, ssrRenderAttr, ssrInterpolate } from "vue/server-renderer";
import { A as AppTemplate } from "./AppTemplate-2d192a23.js";
import { A as AccountSidebar } from "./accountSidebar-48f81fac.js";
import { H as HeadTags } from "./headTags-218fe00b.js";
import { useForm } from "@inertiajs/vue3";
import { _ as _export_sfc } from "./_plugin-vue_export-helper-cc2b3d55.js";
import "./pwa-0a2b72e5.js";
const settings_vue_vue_type_style_index_0_scoped_e35d0c82_lang = "";
const _sfc_main = {
  __name: "settings",
  __ssrInlineRender: true,
  props: {
    user: Object,
    pageMeta: Object
  },
  setup(__props) {
    const props = __props;
    console.log(props.user, "users data");
    const form = useForm({
      first_name: props.user.first_name,
      last_name: props.user.last_name,
      phone: props.user.phone,
      city: props.user.city,
      country: props.user.country,
      oldpassword: "",
      password: ""
    });
    function submitSettings() {
      form.post(
        "/accounts/settings/update",
        {
          onSuccess: (page) => {
            if (page.props.flash.success) {
              toastr.success(page.props.flash.success);
            } else {
              toastr.error(page.props.flash.error);
            }
          }
        }
      );
    }
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(HeadTags, { pageMeta: __props.pageMeta }, null, _parent));
      _push(ssrRenderComponent(AppTemplate, null, {
        content: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="ps-shopping" style="${ssrRenderStyle({ "background": "#eee" })}" data-v-e35d0c82${_scopeId}><div class="container" data-v-e35d0c82${_scopeId}><div class="ps-shopping__content" data-v-e35d0c82${_scopeId}><div class="row" data-v-e35d0c82${_scopeId}>`);
            _push2(ssrRenderComponent(AccountSidebar, null, null, _parent2, _scopeId));
            _push2(`<div class="col-12 col-md-7 col-lg-8 mt-5" style="${ssrRenderStyle({ "background": "#fff", "border-radius": "5px" })}" data-v-e35d0c82${_scopeId}><form data-v-e35d0c82${_scopeId}><div class="row" data-v-e35d0c82${_scopeId}><div class="col-12 col-md-12 col-lg-12" style="${ssrRenderStyle({ "background": "#fff", "border-radius": "10px" })}" data-v-e35d0c82${_scopeId}><span class="mt-4" data-v-e35d0c82${_scopeId}>Account Settings </span><hr data-v-e35d0c82${_scopeId}><div class="row m-3" data-v-e35d0c82${_scopeId}><div class="col-12 col-md-6" data-v-e35d0c82${_scopeId}><div class="ps-form__group" data-v-e35d0c82${_scopeId}><label for="name" style="${ssrRenderStyle({ "color": "rgb(114, 111, 111)" })}" data-v-e35d0c82${_scopeId}> First Name</label><input style="${ssrRenderStyle({ "border-radius": "5px" })}" class="${ssrRenderClass([{ "is-invalid": unref(form).errors.first_name }, "form-control ps-form__input"])}" type="text"${ssrRenderAttr("value", unref(form).first_name)} placeholder="First name" id="name" name="first_name" data-v-e35d0c82${_scopeId}><span class="badge bg-warning" data-v-e35d0c82${_scopeId}>${ssrInterpolate(unref(form).errors.first_name)}</span></div></div><div class="col-12 col-md-6 mt-1" data-v-e35d0c82${_scopeId}><div class="ps-form__group" data-v-e35d0c82${_scopeId}><label for="name" style="${ssrRenderStyle({ "color": "rgb(114, 111, 111)" })}" data-v-e35d0c82${_scopeId}> Last Name</label><input style="${ssrRenderStyle({ "border-radius": "5px" })}" class="${ssrRenderClass([{ "is-invalid": unref(form).errors.last_name }, "form-control ps-form__input"])}" type="text"${ssrRenderAttr("value", unref(form).last_name)} placeholder="Last name" name="last_name" data-v-e35d0c82${_scopeId}><span class="badge bg-warning" data-v-e35d0c82${_scopeId}>${ssrInterpolate(unref(form).errors.last_name)}</span></div></div><div class="col-12 col-md-6 mt-1" data-v-e35d0c82${_scopeId}><div class="ps-form__group" data-v-e35d0c82${_scopeId}><label for="phone" style="${ssrRenderStyle({ "color": "rgb(114, 111, 111)" })}" data-v-e35d0c82${_scopeId}> Phone Number</label><input style="${ssrRenderStyle({ "border-radius": "5px" })}" class="${ssrRenderClass([{ "is-invalid": unref(form).errors.phone }, "form-control ps-form__input"])}" type="text"${ssrRenderAttr("value", unref(form).phone)} placeholder="Phone Number" name="phone" data-v-e35d0c82${_scopeId}><span class="badge bg-warning" data-v-e35d0c82${_scopeId}>${ssrInterpolate(unref(form).errors.phone)}</span></div></div><div class="col-12 col-md-6 mt-1" data-v-e35d0c82${_scopeId}><div class="ps-form__group" data-v-e35d0c82${_scopeId}><label id="city" style="${ssrRenderStyle({ "color": "rgb(114, 111, 111)" })}" data-v-e35d0c82${_scopeId}> City</label><input class="${ssrRenderClass([{ "is-invalid": unref(form).errors.city }, "form-control ps-form__input"])}" type="text" placeholder="Enter City and State" id="city"${ssrRenderAttr("value", unref(form).city)} name="city" data-v-e35d0c82${_scopeId}><span class="badge bg-warning" data-v-e35d0c82${_scopeId}>${ssrInterpolate(unref(form).errors.city)}</span></div></div><div class="col-12 col-md-6 mt-1" data-v-e35d0c82${_scopeId}><div class="ps-form__group" data-v-e35d0c82${_scopeId}><label id="country" style="${ssrRenderStyle({ "color": "rgb(114, 111, 111)" })}" data-v-e35d0c82${_scopeId}>Country </label><input class="${ssrRenderClass([{ "is-invalid": unref(form).errors.country }, "form-control ps-form__input"])}" type="text" placeholder="Country" id="country"${ssrRenderAttr("value", unref(form).country)} name="country" data-v-e35d0c82${_scopeId}><span class="badge bg-warning" data-v-e35d0c82${_scopeId}>${ssrInterpolate(unref(form).errors.country)}</span></div></div><div class="col-12 col-md-6 mt-1" data-v-e35d0c82${_scopeId}><div class="ps-form__group" data-v-e35d0c82${_scopeId}><label id="oldpassword" style="${ssrRenderStyle({ "color": "rgb(114, 111, 111)" })}" data-v-e35d0c82${_scopeId}>Old Password</label><input class="${ssrRenderClass([{ "is-invalid": unref(form).errors.oldpassword }, "form-control ps-form__input"])}" type="password" placeholder="Old password" id="oldpassword"${ssrRenderAttr("value", unref(form).oldpassword)} name="oldpassword" autocomplete="off" data-v-e35d0c82${_scopeId}><span class="badge bg-warning" data-v-e35d0c82${_scopeId}>${ssrInterpolate(unref(form).errors.oldpassword)}</span></div></div><div class="col-12 col-md-6 mt-1" data-v-e35d0c82${_scopeId}><div class="ps-form__group" data-v-e35d0c82${_scopeId}><label id="password" style="${ssrRenderStyle({ "color": "rgb(114, 111, 111)" })}" data-v-e35d0c82${_scopeId}>New Password</label><input class="${ssrRenderClass([{ "is-invalid": unref(form).errors.password }, "form-control ps-form__input"])}" type="password" placeholder="password" id="password"${ssrRenderAttr("value", unref(form).password)} name="password" autocomplete="off" data-v-e35d0c82${_scopeId}><span class="badge bg-warning" data-v-e35d0c82${_scopeId}>${ssrInterpolate(unref(form).errors.password)}</span></div></div></div><div class="m-4" style="${ssrRenderStyle({})}" data-v-e35d0c82${_scopeId}><button class="ps-btn ps-btn--success w-100" style="${ssrRenderStyle({ "border-radius": "5px" })}" data-v-e35d0c82${_scopeId}> Update Account</button></div></div></div></form></div></div></div></div></div>`);
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
                          onSubmit: withModifiers(submitSettings, ["prevent"])
                        }, [
                          createVNode("div", { class: "row" }, [
                            createVNode("div", {
                              class: "col-12 col-md-12 col-lg-12",
                              style: { "background": "#fff", "border-radius": "10px" }
                            }, [
                              createVNode("span", { class: "mt-4" }, "Account Settings "),
                              createVNode("hr"),
                              createVNode("div", { class: "row m-3" }, [
                                createVNode("div", { class: "col-12 col-md-6" }, [
                                  createVNode("div", { class: "ps-form__group" }, [
                                    createVNode("label", {
                                      for: "name",
                                      style: { "color": "rgb(114, 111, 111)" }
                                    }, " First Name"),
                                    withDirectives(createVNode("input", {
                                      style: { "border-radius": "5px" },
                                      class: ["form-control ps-form__input", { "is-invalid": unref(form).errors.first_name }],
                                      type: "text",
                                      "onUpdate:modelValue": ($event) => unref(form).first_name = $event,
                                      placeholder: "First name",
                                      id: "name",
                                      name: "first_name"
                                    }, null, 10, ["onUpdate:modelValue"]), [
                                      [vModelText, unref(form).first_name]
                                    ]),
                                    createVNode("span", { class: "badge bg-warning" }, toDisplayString(unref(form).errors.first_name), 1)
                                  ])
                                ]),
                                createVNode("div", { class: "col-12 col-md-6 mt-1" }, [
                                  createVNode("div", { class: "ps-form__group" }, [
                                    createVNode("label", {
                                      for: "name",
                                      style: { "color": "rgb(114, 111, 111)" }
                                    }, " Last Name"),
                                    withDirectives(createVNode("input", {
                                      style: { "border-radius": "5px" },
                                      class: ["form-control ps-form__input", { "is-invalid": unref(form).errors.last_name }],
                                      type: "text",
                                      "onUpdate:modelValue": ($event) => unref(form).last_name = $event,
                                      placeholder: "Last name",
                                      name: "last_name"
                                    }, null, 10, ["onUpdate:modelValue"]), [
                                      [vModelText, unref(form).last_name]
                                    ]),
                                    createVNode("span", { class: "badge bg-warning" }, toDisplayString(unref(form).errors.last_name), 1)
                                  ])
                                ]),
                                createVNode("div", { class: "col-12 col-md-6 mt-1" }, [
                                  createVNode("div", { class: "ps-form__group" }, [
                                    createVNode("label", {
                                      for: "phone",
                                      style: { "color": "rgb(114, 111, 111)" }
                                    }, " Phone Number"),
                                    withDirectives(createVNode("input", {
                                      style: { "border-radius": "5px" },
                                      class: ["form-control ps-form__input", { "is-invalid": unref(form).errors.phone }],
                                      type: "text",
                                      "onUpdate:modelValue": ($event) => unref(form).phone = $event,
                                      placeholder: "Phone Number",
                                      name: "phone"
                                    }, null, 10, ["onUpdate:modelValue"]), [
                                      [vModelText, unref(form).phone]
                                    ]),
                                    createVNode("span", { class: "badge bg-warning" }, toDisplayString(unref(form).errors.phone), 1)
                                  ])
                                ]),
                                createVNode("div", { class: "col-12 col-md-6 mt-1" }, [
                                  createVNode("div", { class: "ps-form__group" }, [
                                    createVNode("label", {
                                      id: "city",
                                      style: { "color": "rgb(114, 111, 111)" }
                                    }, " City"),
                                    withDirectives(createVNode("input", {
                                      class: ["form-control ps-form__input", { "is-invalid": unref(form).errors.city }],
                                      type: "text",
                                      placeholder: "Enter City and State",
                                      id: "city",
                                      "onUpdate:modelValue": ($event) => unref(form).city = $event,
                                      name: "city"
                                    }, null, 10, ["onUpdate:modelValue"]), [
                                      [vModelText, unref(form).city]
                                    ]),
                                    createVNode("span", { class: "badge bg-warning" }, toDisplayString(unref(form).errors.city), 1)
                                  ])
                                ]),
                                createVNode("div", { class: "col-12 col-md-6 mt-1" }, [
                                  createVNode("div", { class: "ps-form__group" }, [
                                    createVNode("label", {
                                      id: "country",
                                      style: { "color": "rgb(114, 111, 111)" }
                                    }, "Country "),
                                    withDirectives(createVNode("input", {
                                      class: ["form-control ps-form__input", { "is-invalid": unref(form).errors.country }],
                                      type: "text",
                                      placeholder: "Country",
                                      id: "country",
                                      "onUpdate:modelValue": ($event) => unref(form).country = $event,
                                      name: "country"
                                    }, null, 10, ["onUpdate:modelValue"]), [
                                      [vModelText, unref(form).country]
                                    ]),
                                    createVNode("span", { class: "badge bg-warning" }, toDisplayString(unref(form).errors.country), 1)
                                  ])
                                ]),
                                createVNode("div", { class: "col-12 col-md-6 mt-1" }, [
                                  createVNode("div", { class: "ps-form__group" }, [
                                    createVNode("label", {
                                      id: "oldpassword",
                                      style: { "color": "rgb(114, 111, 111)" }
                                    }, "Old Password"),
                                    withDirectives(createVNode("input", {
                                      class: ["form-control ps-form__input", { "is-invalid": unref(form).errors.oldpassword }],
                                      type: "password",
                                      placeholder: "Old password",
                                      id: "oldpassword",
                                      "onUpdate:modelValue": ($event) => unref(form).oldpassword = $event,
                                      name: "oldpassword",
                                      autocomplete: "off"
                                    }, null, 10, ["onUpdate:modelValue"]), [
                                      [vModelText, unref(form).oldpassword]
                                    ]),
                                    createVNode("span", { class: "badge bg-warning" }, toDisplayString(unref(form).errors.oldpassword), 1)
                                  ])
                                ]),
                                createVNode("div", { class: "col-12 col-md-6 mt-1" }, [
                                  createVNode("div", { class: "ps-form__group" }, [
                                    createVNode("label", {
                                      id: "password",
                                      style: { "color": "rgb(114, 111, 111)" }
                                    }, "New Password"),
                                    withDirectives(createVNode("input", {
                                      class: ["form-control ps-form__input", { "is-invalid": unref(form).errors.password }],
                                      type: "password",
                                      placeholder: "password",
                                      id: "password",
                                      "onUpdate:modelValue": ($event) => unref(form).password = $event,
                                      name: "password",
                                      autocomplete: "off"
                                    }, null, 10, ["onUpdate:modelValue"]), [
                                      [vModelText, unref(form).password]
                                    ]),
                                    createVNode("span", { class: "badge bg-warning" }, toDisplayString(unref(form).errors.password), 1)
                                  ])
                                ])
                              ]),
                              createVNode("div", {
                                class: "m-4",
                                style: {}
                              }, [
                                createVNode("button", {
                                  class: "ps-btn ps-btn--success w-100",
                                  style: { "border-radius": "5px" }
                                }, " Update Account")
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Users/Accounts/settings.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const settings = /* @__PURE__ */ _export_sfc(_sfc_main, [["__scopeId", "data-v-e35d0c82"]]);
export {
  settings as default
};
