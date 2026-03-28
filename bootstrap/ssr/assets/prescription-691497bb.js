import { withCtx, unref, createVNode, withModifiers, withDirectives, vModelText, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderClass, ssrRenderAttr, ssrInterpolate, ssrRenderStyle } from "vue/server-renderer";
import { A as AppTemplate } from "./AppTemplate-2d192a23.js";
import { H as HeadTags } from "./headTags-218fe00b.js";
import { useForm } from "@inertiajs/vue3";
import "./pwa-0a2b72e5.js";
import "./_plugin-vue_export-helper-cc2b3d55.js";
const prescription_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "prescription",
  __ssrInlineRender: true,
  props: {
    blogs: Object,
    pageMeta: Object
  },
  setup(__props) {
    const form = useForm({
      name: "",
      email: "",
      phone: "",
      address: "",
      city: "",
      state: "",
      image: "",
      notes: ""
    });
    function submitForm() {
      form.post("/doctor/prescription", {
        onSuccess: (page) => {
          if (page.props.flash.success) {
            toastr.success(page.props.flash.success);
          }
        }
      });
    }
    function UploadFile(event) {
      const image = event.target.files[0];
      form.image = image;
    }
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(HeadTags, { pageMeta: __props.pageMeta }, null, _parent));
      _push(ssrRenderComponent(AppTemplate, null, {
        content: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="ps-checkout"${_scopeId}><div class="container"${_scopeId}><ul class="ps-breadcrumb"${_scopeId}><li class="ps-breadcrumb__item"${_scopeId}><a href=""${_scopeId}>Home</a></li><li class="ps-breadcrumb__item active" aria-current="page"${_scopeId}> Doctor&#39;s Prescription</li></ul><div class="ps-checkout__content"${_scopeId}><form enctype="multipart/form-data"${_scopeId}><div class="row"${_scopeId}><div class="col-12 col-lg-6"${_scopeId}><div class="ps-checkout__form"${_scopeId}><h3 class="ps-checkout__heading"${_scopeId}>Patient&#39;s Information</h3><div class="row"${_scopeId}><div class="col-12 col-md-6"${_scopeId}><div class="ps-checkout__group"${_scopeId}><label class="ps-checkout__label"${_scopeId}>Full name *</label><input class="${ssrRenderClass([{ "is-invalid": unref(form).name }, "form-control form-data"])}"${ssrRenderAttr("value", unref(form).name)} name="name" type="text" placeholder="full name"${_scopeId}></div></div><div class="col-12 col-md-6"${_scopeId}><div class="ps-checkout__group"${_scopeId}><label class="ps-checkout__label"${_scopeId}>Email address *</label><input class="${ssrRenderClass([{ "is-invalid": unref(form).email }, "form-control form-data"])}"${ssrRenderAttr("value", unref(form).email)} name="email" type="email" placeholder="email"${_scopeId}></div></div></div><div class="row"${_scopeId}><div class="col-12 col-md-6"${_scopeId}><div class="ps-checkout__group"${_scopeId}><label class="ps-checkout__label"${_scopeId}>Phone *</label><input${ssrRenderAttr("value", unref(form).phone)} class="${ssrRenderClass([{ "is-invalid": unref(form).phone }, "form-control form-data"])}" name="phone" type="text" placeholder="phone"${_scopeId}></div></div><div class="col-12 col-md-6"${_scopeId}><div class="ps-checkout__group"${_scopeId}><label class="ps-checkout__label"${_scopeId}>Street address *</label><input${ssrRenderAttr("value", unref(form).address)} class="${ssrRenderClass([{ "is-invalid": unref(form).address }, "form-control form-data"])}" name="address" type="text" placeholder="House number and street name"${_scopeId}></div></div></div><div class="row"${_scopeId}><div class="col-12 col-md-6"${_scopeId}><div class="ps-checkout__group"${_scopeId}><label class="ps-checkout__label"${_scopeId}>Town / City *</label><input${ssrRenderAttr("value", unref(form).city)} class="${ssrRenderClass([{ "is-invalid": unref(form).city }, "form-control form-data"])}" name="city" type="text" placeholder="town/city"${_scopeId}></div></div><div class="col-12 col-md-6"${_scopeId}><div class="ps-checkout__group"${_scopeId}><label class="ps-checkout__label"${_scopeId}>State *</label><input${ssrRenderAttr("value", unref(form).state)} class="${ssrRenderClass([{ "is-invalid": unref(form).state }, "form-control form-data"])}" name="state" type="text"${_scopeId}></div></div><div class="col-12"${_scopeId}><div class="ps-checkout__group"${_scopeId}><label class="ps-checkout__label"${_scopeId}>Upload Prescription *</label><input name="image" type="file" class="${ssrRenderClass([{ "is-invalid": unref(form).image }, "ps-input"])}"${_scopeId}></div></div><div class="col-12"${_scopeId}><div class="ps-checkout__group"${_scopeId}><label class="ps-checkout__label"${_scopeId}>Notes </label><textarea name="notes" class="${ssrRenderClass([{ "is-invalid": unref(form).notes }, "form-control form-data"])}" rows="7" placeholder="write additional notes about the description."${_scopeId}>${ssrInterpolate(unref(form).notes)}</textarea></div></div></div><button type="submit" class="btn btn-success btn-lg w-25 p-2" style="${ssrRenderStyle({ "border-radius": "10px" })}"${_scopeId}> Upload Prescription</button></div></div><div class="col-12 col-lg-6"${_scopeId}><section class="ps-section--block-grid" style="${ssrRenderStyle({ "display": "block" })}"${_scopeId}><div class="ps-section__content"${_scopeId}><h3 class="ps-section__title"${_scopeId}>Upload your Prescription from a Doctor</h3><div class="ps-section__subtitle"${_scopeId}>Here&#39;s a guide to ensure you upload a valid Prescription.</div><div class="ps-section__desc"${_scopeId}>Please Ensure Your Prescription Contains All 5 Elements</div><ul class="ps-section__list"${_scopeId}><li${_scopeId}>Hospital / Clinic Information</li><li${_scopeId}>Doctor&#39;s Details</li><li${_scopeId}>Patient&#39;s Details</li><li${_scopeId}>Drug Details</li><li${_scopeId}>Doctor&#39;s Signature / Stamp &amp; Date</li></ul></div></section></div></div></form></div></div></div>`);
          } else {
            return [
              createVNode("div", { class: "ps-checkout" }, [
                createVNode("div", { class: "container" }, [
                  createVNode("ul", { class: "ps-breadcrumb" }, [
                    createVNode("li", { class: "ps-breadcrumb__item" }, [
                      createVNode("a", { href: "" }, "Home")
                    ]),
                    createVNode("li", {
                      class: "ps-breadcrumb__item active",
                      "aria-current": "page"
                    }, " Doctor's Prescription")
                  ]),
                  createVNode("div", { class: "ps-checkout__content" }, [
                    createVNode("form", {
                      onSubmit: withModifiers(submitForm, ["prevent"]),
                      enctype: "multipart/form-data"
                    }, [
                      createVNode("div", { class: "row" }, [
                        createVNode("div", { class: "col-12 col-lg-6" }, [
                          createVNode("div", { class: "ps-checkout__form" }, [
                            createVNode("h3", { class: "ps-checkout__heading" }, "Patient's Information"),
                            createVNode("div", { class: "row" }, [
                              createVNode("div", { class: "col-12 col-md-6" }, [
                                createVNode("div", { class: "ps-checkout__group" }, [
                                  createVNode("label", { class: "ps-checkout__label" }, "Full name *"),
                                  withDirectives(createVNode("input", {
                                    class: ["form-control form-data", { "is-invalid": unref(form).name }],
                                    "onUpdate:modelValue": ($event) => unref(form).name = $event,
                                    name: "name",
                                    type: "text",
                                    placeholder: "full name"
                                  }, null, 10, ["onUpdate:modelValue"]), [
                                    [vModelText, unref(form).name]
                                  ])
                                ])
                              ]),
                              createVNode("div", { class: "col-12 col-md-6" }, [
                                createVNode("div", { class: "ps-checkout__group" }, [
                                  createVNode("label", { class: "ps-checkout__label" }, "Email address *"),
                                  withDirectives(createVNode("input", {
                                    class: ["form-control form-data", { "is-invalid": unref(form).email }],
                                    "onUpdate:modelValue": ($event) => unref(form).email = $event,
                                    name: "email",
                                    type: "email",
                                    placeholder: "email"
                                  }, null, 10, ["onUpdate:modelValue"]), [
                                    [vModelText, unref(form).email]
                                  ])
                                ])
                              ])
                            ]),
                            createVNode("div", { class: "row" }, [
                              createVNode("div", { class: "col-12 col-md-6" }, [
                                createVNode("div", { class: "ps-checkout__group" }, [
                                  createVNode("label", { class: "ps-checkout__label" }, "Phone *"),
                                  withDirectives(createVNode("input", {
                                    class: ["form-control form-data", { "is-invalid": unref(form).phone }],
                                    "onUpdate:modelValue": ($event) => unref(form).phone = $event,
                                    name: "phone",
                                    type: "text",
                                    placeholder: "phone"
                                  }, null, 10, ["onUpdate:modelValue"]), [
                                    [vModelText, unref(form).phone]
                                  ])
                                ])
                              ]),
                              createVNode("div", { class: "col-12 col-md-6" }, [
                                createVNode("div", { class: "ps-checkout__group" }, [
                                  createVNode("label", { class: "ps-checkout__label" }, "Street address *"),
                                  withDirectives(createVNode("input", {
                                    class: ["form-control form-data", { "is-invalid": unref(form).address }],
                                    "onUpdate:modelValue": ($event) => unref(form).address = $event,
                                    name: "address",
                                    type: "text",
                                    placeholder: "House number and street name"
                                  }, null, 10, ["onUpdate:modelValue"]), [
                                    [vModelText, unref(form).address]
                                  ])
                                ])
                              ])
                            ]),
                            createVNode("div", { class: "row" }, [
                              createVNode("div", { class: "col-12 col-md-6" }, [
                                createVNode("div", { class: "ps-checkout__group" }, [
                                  createVNode("label", { class: "ps-checkout__label" }, "Town / City *"),
                                  withDirectives(createVNode("input", {
                                    class: ["form-control form-data", { "is-invalid": unref(form).city }],
                                    "onUpdate:modelValue": ($event) => unref(form).city = $event,
                                    name: "city",
                                    type: "text",
                                    placeholder: "town/city"
                                  }, null, 10, ["onUpdate:modelValue"]), [
                                    [vModelText, unref(form).city]
                                  ])
                                ])
                              ]),
                              createVNode("div", { class: "col-12 col-md-6" }, [
                                createVNode("div", { class: "ps-checkout__group" }, [
                                  createVNode("label", { class: "ps-checkout__label" }, "State *"),
                                  withDirectives(createVNode("input", {
                                    class: ["form-control form-data", { "is-invalid": unref(form).state }],
                                    "onUpdate:modelValue": ($event) => unref(form).state = $event,
                                    name: "state",
                                    type: "text"
                                  }, null, 10, ["onUpdate:modelValue"]), [
                                    [vModelText, unref(form).state]
                                  ])
                                ])
                              ]),
                              createVNode("div", { class: "col-12" }, [
                                createVNode("div", { class: "ps-checkout__group" }, [
                                  createVNode("label", { class: "ps-checkout__label" }, "Upload Prescription *"),
                                  createVNode("input", {
                                    class: ["ps-input", { "is-invalid": unref(form).image }],
                                    name: "image",
                                    type: "file",
                                    onChange: UploadFile
                                  }, null, 34)
                                ])
                              ]),
                              createVNode("div", { class: "col-12" }, [
                                createVNode("div", { class: "ps-checkout__group" }, [
                                  createVNode("label", { class: "ps-checkout__label" }, "Notes "),
                                  withDirectives(createVNode("textarea", {
                                    class: ["form-control form-data", { "is-invalid": unref(form).notes }],
                                    name: "notes",
                                    "onUpdate:modelValue": ($event) => unref(form).notes = $event,
                                    rows: "7",
                                    placeholder: "write additional notes about the description."
                                  }, null, 10, ["onUpdate:modelValue"]), [
                                    [vModelText, unref(form).notes]
                                  ])
                                ])
                              ])
                            ]),
                            createVNode("button", {
                              type: "submit",
                              class: "btn btn-success btn-lg w-25 p-2",
                              style: { "border-radius": "10px" }
                            }, " Upload Prescription")
                          ])
                        ]),
                        createVNode("div", { class: "col-12 col-lg-6" }, [
                          createVNode("section", {
                            class: "ps-section--block-grid",
                            style: { "display": "block" }
                          }, [
                            createVNode("div", { class: "ps-section__content" }, [
                              createVNode("h3", { class: "ps-section__title" }, "Upload your Prescription from a Doctor"),
                              createVNode("div", { class: "ps-section__subtitle" }, "Here's a guide to ensure you upload a valid Prescription."),
                              createVNode("div", { class: "ps-section__desc" }, "Please Ensure Your Prescription Contains All 5 Elements"),
                              createVNode("ul", { class: "ps-section__list" }, [
                                createVNode("li", null, "Hospital / Clinic Information"),
                                createVNode("li", null, "Doctor's Details"),
                                createVNode("li", null, "Patient's Details"),
                                createVNode("li", null, "Drug Details"),
                                createVNode("li", null, "Doctor's Signature / Stamp & Date")
                              ])
                            ])
                          ])
                        ])
                      ])
                    ], 32)
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Users/Pages/prescription.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
