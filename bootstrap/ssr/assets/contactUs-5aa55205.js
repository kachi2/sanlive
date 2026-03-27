import { withCtx, unref, createVNode, createTextVNode, toDisplayString, withModifiers, withDirectives, vModelText, useSSRContext } from "vue";
import { ssrRenderComponent, ssrInterpolate, ssrRenderAttr, ssrRenderClass } from "vue/server-renderer";
import { A as AppTemplate } from "./AppTemplate-63cfd3c1.js";
import { H as HeadTags } from "./headTags-d006710e.js";
import { usePage, useForm } from "@inertiajs/vue3";
import "./pwa-521173f5.js";
import "./_plugin-vue_export-helper-cc2b3d55.js";
const _sfc_main = {
  __name: "contactUs",
  __ssrInlineRender: true,
  props: {
    blogs: Object,
    pageMeta: Object
  },
  setup(__props) {
    const page = usePage();
    const form = useForm({
      name: "",
      email: "",
      phone: "",
      message: ""
    });
    function SubmitContact() {
      form.post("/contact/us/submit", {
        onSuccess: (page2) => {
          if (page2.props.flash.success) {
            toastr.success(page2.props.flash.success);
          }
        }
      });
    }
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(HeadTags, { pageMeta: __props.pageMeta }, null, _parent));
      _push(ssrRenderComponent(AppTemplate, null, {
        content: withCtx((_, _push2, _parent2, _scopeId) => {
          var _a, _b, _c, _d, _e, _f;
          if (_push2) {
            _push2(`<div class="ps-contact"${_scopeId}><div class="container"${_scopeId}><ul class="ps-breadcrumb"${_scopeId}><li class="ps-breadcrumb__item"${_scopeId}><a href=""${_scopeId}>Home</a></li><li class="ps-breadcrumb__item active" aria-current="page"${_scopeId}>Contact us</li></ul><div class="ps-contact__content"${_scopeId}><div class="row"${_scopeId}><div class="col-12 col-lg-4"${_scopeId}><div class="ps-contact__info"${_scopeId}><h3 class=""${_scopeId}>How can we help you?</h3><p class="ps-contact__text"${_scopeId}> Phone: ${ssrInterpolate((_a = unref(page).props.settings) == null ? void 0 : _a.site_phone)} <br${_scopeId}> Email: ${ssrInterpolate((_b = unref(page).props.settings) == null ? void 0 : _b.site_email)} <br${_scopeId}> Address: ${ssrInterpolate((_c = unref(page).props.settings) == null ? void 0 : _c.address)}<br${_scopeId}></p><ul class="ps-social"${_scopeId}><li${_scopeId}><a class="ps-social__link facebook" href="{{page.props.settings?.facebook}}"${_scopeId}><i class="fa fa-facebook"${_scopeId}></i><span class="ps-tooltip"${_scopeId}>Facebook</span></a></li><li${_scopeId}><a class="ps-social__link instagram" href="{{page.props.settings?.instagram}}"${_scopeId}><i class="fa fa-instagram"${_scopeId}></i><span class="ps-tooltip"${_scopeId}>Instagram</span></a></li><li${_scopeId}><a class="ps-social__link pinterest" href="{{ page.props.settings?.pinterest}}"${_scopeId}><i class="fa fa-pinterest-p"${_scopeId}></i><span class="ps-tooltip"${_scopeId}>Pinterest</span></a></li><li${_scopeId}><a class="ps-social__link linkedin" href="{{ page.props.settings?.linkedIn}}"${_scopeId}><i class="fa fa-linkedin"${_scopeId}></i><span class="ps-tooltip"${_scopeId}>Linkedin</span></a></li></ul></div></div><div class="col-12 col-lg-8"${_scopeId}><form action=""${_scopeId}><div class="ps-form--contact"${_scopeId}><h2 class="ps-form__title"${_scopeId}>Fill up the form if you have any question</h2><div class="row"${_scopeId}><div class="col-12 col-md-4"${_scopeId}><div class="ps-form__group"${_scopeId}><input${ssrRenderAttr("value", unref(form).name)} class="${ssrRenderClass([{ "in-valid": unref(form).errors.name }, "form-control"])}" name="name" type="text" placeholder="Full Name" required${_scopeId}></div></div><div class="col-12 col-md-4"${_scopeId}><div class="ps-form__group"${_scopeId}><input${ssrRenderAttr("value", unref(form).email)} class="${ssrRenderClass([{ "in-valid": unref(form).errors.email }, "form-control"])}" type="email" name="email" placeholder="Your E-mail" required${_scopeId}></div></div><div class="col-12 col-md-4"${_scopeId}><div class="ps-form__group"${_scopeId}><input${ssrRenderAttr("value", unref(form).phone)} class="${ssrRenderClass([{ "in-valid": unref(form).errors.phone }, "form-control"])}" type="text" name="phone" placeholder="Phone" required${_scopeId}></div></div><div class="col-12"${_scopeId}><div class="ps-form__group"${_scopeId}><textarea rows="5" class="${ssrRenderClass([{ "in-valid": unref(form).errors.message }, "form-control"])}" name="message" placeholder="Message" required${_scopeId}>${ssrInterpolate(unref(form).message)}</textarea></div></div></div><div class="ps-form__submit"${_scopeId}><button class="btn btn-info btn-lg"${_scopeId}>Send message</button></div></div></form></div></div></div></div></div>`);
          } else {
            return [
              createVNode("div", { class: "ps-contact" }, [
                createVNode("div", { class: "container" }, [
                  createVNode("ul", { class: "ps-breadcrumb" }, [
                    createVNode("li", { class: "ps-breadcrumb__item" }, [
                      createVNode("a", { href: "" }, "Home")
                    ]),
                    createVNode("li", {
                      class: "ps-breadcrumb__item active",
                      "aria-current": "page"
                    }, "Contact us")
                  ]),
                  createVNode("div", { class: "ps-contact__content" }, [
                    createVNode("div", { class: "row" }, [
                      createVNode("div", { class: "col-12 col-lg-4" }, [
                        createVNode("div", { class: "ps-contact__info" }, [
                          createVNode("h3", { class: "" }, "How can we help you?"),
                          createVNode("p", { class: "ps-contact__text" }, [
                            createTextVNode(" Phone: " + toDisplayString((_d = unref(page).props.settings) == null ? void 0 : _d.site_phone) + " ", 1),
                            createVNode("br"),
                            createTextVNode(" Email: " + toDisplayString((_e = unref(page).props.settings) == null ? void 0 : _e.site_email) + " ", 1),
                            createVNode("br"),
                            createTextVNode(" Address: " + toDisplayString((_f = unref(page).props.settings) == null ? void 0 : _f.address), 1),
                            createVNode("br")
                          ]),
                          createVNode("ul", { class: "ps-social" }, [
                            createVNode("li", null, [
                              createVNode("a", {
                                class: "ps-social__link facebook",
                                href: "{{page.props.settings?.facebook}}"
                              }, [
                                createVNode("i", { class: "fa fa-facebook" }),
                                createVNode("span", { class: "ps-tooltip" }, "Facebook")
                              ])
                            ]),
                            createVNode("li", null, [
                              createVNode("a", {
                                class: "ps-social__link instagram",
                                href: "{{page.props.settings?.instagram}}"
                              }, [
                                createVNode("i", { class: "fa fa-instagram" }),
                                createVNode("span", { class: "ps-tooltip" }, "Instagram")
                              ])
                            ]),
                            createVNode("li", null, [
                              createVNode("a", {
                                class: "ps-social__link pinterest",
                                href: "{{ page.props.settings?.pinterest}}"
                              }, [
                                createVNode("i", { class: "fa fa-pinterest-p" }),
                                createVNode("span", { class: "ps-tooltip" }, "Pinterest")
                              ])
                            ]),
                            createVNode("li", null, [
                              createVNode("a", {
                                class: "ps-social__link linkedin",
                                href: "{{ page.props.settings?.linkedIn}}"
                              }, [
                                createVNode("i", { class: "fa fa-linkedin" }),
                                createVNode("span", { class: "ps-tooltip" }, "Linkedin")
                              ])
                            ])
                          ])
                        ])
                      ]),
                      createVNode("div", { class: "col-12 col-lg-8" }, [
                        createVNode("form", {
                          action: "",
                          onSubmit: withModifiers(SubmitContact, ["prevent"])
                        }, [
                          createVNode("div", { class: "ps-form--contact" }, [
                            createVNode("h2", { class: "ps-form__title" }, "Fill up the form if you have any question"),
                            createVNode("div", { class: "row" }, [
                              createVNode("div", { class: "col-12 col-md-4" }, [
                                createVNode("div", { class: "ps-form__group" }, [
                                  withDirectives(createVNode("input", {
                                    class: ["form-control", { "in-valid": unref(form).errors.name }],
                                    "onUpdate:modelValue": ($event) => unref(form).name = $event,
                                    name: "name",
                                    type: "text",
                                    placeholder: "Full Name",
                                    required: ""
                                  }, null, 10, ["onUpdate:modelValue"]), [
                                    [vModelText, unref(form).name]
                                  ])
                                ])
                              ]),
                              createVNode("div", { class: "col-12 col-md-4" }, [
                                createVNode("div", { class: "ps-form__group" }, [
                                  withDirectives(createVNode("input", {
                                    class: ["form-control", { "in-valid": unref(form).errors.email }],
                                    "onUpdate:modelValue": ($event) => unref(form).email = $event,
                                    type: "email",
                                    name: "email",
                                    placeholder: "Your E-mail",
                                    required: ""
                                  }, null, 10, ["onUpdate:modelValue"]), [
                                    [vModelText, unref(form).email]
                                  ])
                                ])
                              ]),
                              createVNode("div", { class: "col-12 col-md-4" }, [
                                createVNode("div", { class: "ps-form__group" }, [
                                  withDirectives(createVNode("input", {
                                    class: ["form-control", { "in-valid": unref(form).errors.phone }],
                                    "onUpdate:modelValue": ($event) => unref(form).phone = $event,
                                    type: "text",
                                    name: "phone",
                                    placeholder: "Phone",
                                    required: ""
                                  }, null, 10, ["onUpdate:modelValue"]), [
                                    [vModelText, unref(form).phone]
                                  ])
                                ])
                              ]),
                              createVNode("div", { class: "col-12" }, [
                                createVNode("div", { class: "ps-form__group" }, [
                                  withDirectives(createVNode("textarea", {
                                    class: ["form-control", { "in-valid": unref(form).errors.message }],
                                    "onUpdate:modelValue": ($event) => unref(form).message = $event,
                                    rows: "5",
                                    name: "message",
                                    placeholder: "Message",
                                    required: ""
                                  }, null, 10, ["onUpdate:modelValue"]), [
                                    [vModelText, unref(form).message]
                                  ])
                                ])
                              ])
                            ]),
                            createVNode("div", { class: "ps-form__submit" }, [
                              createVNode("button", { class: "btn btn-info btn-lg" }, "Send message")
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Users/Pages/contactUs.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
