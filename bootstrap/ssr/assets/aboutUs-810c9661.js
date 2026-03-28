import { withCtx, unref, createVNode, createTextVNode, toDisplayString, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderStyle, ssrInterpolate } from "vue/server-renderer";
import { A as AppTemplate } from "./AppTemplate-2d192a23.js";
import { H as HeadTags } from "./headTags-218fe00b.js";
import { usePage } from "@inertiajs/vue3";
import "./pwa-0a2b72e5.js";
import "./_plugin-vue_export-helper-cc2b3d55.js";
const _sfc_main = {
  __name: "aboutUs",
  __ssrInlineRender: true,
  props: {
    aboutUs: Object,
    pageMeta: Object
  },
  setup(__props) {
    const page = usePage();
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(HeadTags, { pageMeta: __props.pageMeta }, null, _parent));
      _push(ssrRenderComponent(AppTemplate, null, {
        content: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="ps-about"${_scopeId}><div${_scopeId}><section class="ps-banner--round"${_scopeId}><div class="ps-banner" style="${ssrRenderStyle({ "height": "200px" })}"${_scopeId}><div class="ps-"${_scopeId}><div class="ps-banner__content" style="${ssrRenderStyle({ "text-align": "center", "width": "100%", "padding": "20px" })}"${_scopeId}><h2 class="ps-banner__title"${_scopeId}>Your one and only <br${_scopeId}> online Pharmacy!</h2><p${_scopeId}>Eliminate the hassle of visiting pharmacies to find your medications.<br${_scopeId}> ${ssrInterpolate(unref(page).props.settings.site_name)} delivers your prescriptions right to your doorstep with just a few simple clicks. </p></div></div></div></section></div><div class="ps-about__content"${_scopeId}><section class="ps-about__project"${_scopeId}><div class="container"${_scopeId}><section class="ps-section--block-grid"${_scopeId}><div class="ps-section__thumbnail"${_scopeId}><a class="ps-section__image" href="#"${_scopeId}><img src="/frontend/weare.jpeg" alt=""${_scopeId}></a></div><div class="ps-section__content"${_scopeId}><h3 class="ps-section__title"${_scopeId}>Who We Are</h3><div class="ps-section__desc"${_scopeId}>${ssrInterpolate(unref(page).props.settings.site_name)} is an online pharmacy platform designed to leverage technology for the secure distribution and delivery of high-quality medications. <br${_scopeId}> We are dedicated to playing our part in fostering a healthier Nigeria, where everyone can access quality drugs, thus positioning ourselves as the vital connection between you and your medication. Navigating a bustling city in search of medicine can be quite a challenge. <br${_scopeId}> ${ssrInterpolate(unref(page).props.settings.site_name)} offers the perfect solution. We alleviate the frustration of searching endlessly by utilizing our extensive database of drugstores and pharmacies throughout Nigeria to deliver the medications you need, wherever you may be. <br${_scopeId}> We are readily available through various platforms (Website, Mobile App, WhatsApp) for swift access to quality medications. <br${_scopeId}> We also prioritize quality and safety for individuals, which has motivated us to ensure that all our staff and pharmacy partners maintain the highest standards of products and services.</div></div></section><section class="ps-section--block-grid row-reverse"${_scopeId}><div class="ps-section__thumbnail"${_scopeId}><a class="ps-section__image" href="#"${_scopeId}><img src="/frontend/wedo.jpg" alt=""${_scopeId}></a></div><div class="ps-section__content"${_scopeId}><h3 class="ps-section__title"${_scopeId}>What We Do</h3><div class="ps-section__desc"${_scopeId}> We collaborate with authorized manufacturers, importers, and pharmacies in Nigeria to deliver pharmaceuticals swiftly to those in need. Our goal as a distribution network is to ensure easy and uninterrupted access to medications. We provide top-notch online pharmaceutical services, including dosage advice, monitoring, and prescription refills. Our mission as a Pharma-Tech is to leverage technology to deliver high-quality pharmaceutical care directly to individuals in the comfort of their own homes. </div></div></section></div></section><section class="ps-about__project"${_scopeId}><div class="container"${_scopeId}><div class="row"${_scopeId}><div class="col-md-6"${_scopeId}><div class="card"${_scopeId}><div class="card-body" style="${ssrRenderStyle({ "background": "#103178" })}"${_scopeId}><h3 class="ps-section__title" style="${ssrRenderStyle({ "color": "#fff", "text-align": "center" })}"${_scopeId}> Our Mission</h3><p style="${ssrRenderStyle({ "color": "#fff" })}"${_scopeId}> Our vision is to revolutionize the way people access healthcare. We envision a future where individuals can easily find and purchase the medications and products they need to support their health and wellness goals. By leveraging technology and innovation, we aim to create a seamless online shopping experience that puts the power of healthcare in your hands. </p></div></div></div><div class="col-md-6"${_scopeId}><div class="card"${_scopeId}><div class="card-body" style="${ssrRenderStyle({ "background": "#007bff" })}"${_scopeId}><h3 class="ps-section__title" style="${ssrRenderStyle({ "color": "#fff", "text-align": "center" })}"${_scopeId}> Our Vision</h3><p style="${ssrRenderStyle({ "color": "#fff" })}"${_scopeId}> Our mission is to empower individuals to take control of their health and well-being. We believe that everyone deserves access to quality healthcare solutions, regardless of their location or circumstances. Through our online platform, we aim to simplify the process of purchasing medications and healthcare products, ensuring that you receive the care you need with ease. </p></div></div></div></div></div></section></div></div>`);
          } else {
            return [
              createVNode("div", { class: "ps-about" }, [
                createVNode("div", null, [
                  createVNode("section", { class: "ps-banner--round" }, [
                    createVNode("div", {
                      class: "ps-banner",
                      style: { "height": "200px" }
                    }, [
                      createVNode("div", { class: "ps-" }, [
                        createVNode("div", {
                          class: "ps-banner__content",
                          style: { "text-align": "center", "width": "100%", "padding": "20px" }
                        }, [
                          createVNode("h2", { class: "ps-banner__title" }, [
                            createTextVNode("Your one and only "),
                            createVNode("br"),
                            createTextVNode(" online Pharmacy!")
                          ]),
                          createVNode("p", null, [
                            createTextVNode("Eliminate the hassle of visiting pharmacies to find your medications."),
                            createVNode("br"),
                            createTextVNode(" " + toDisplayString(unref(page).props.settings.site_name) + " delivers your prescriptions right to your doorstep with just a few simple clicks. ", 1)
                          ])
                        ])
                      ])
                    ])
                  ])
                ]),
                createVNode("div", { class: "ps-about__content" }, [
                  createVNode("section", { class: "ps-about__project" }, [
                    createVNode("div", { class: "container" }, [
                      createVNode("section", { class: "ps-section--block-grid" }, [
                        createVNode("div", { class: "ps-section__thumbnail" }, [
                          createVNode("a", {
                            class: "ps-section__image",
                            href: "#"
                          }, [
                            createVNode("img", {
                              src: "/frontend/weare.jpeg",
                              alt: ""
                            })
                          ])
                        ]),
                        createVNode("div", { class: "ps-section__content" }, [
                          createVNode("h3", { class: "ps-section__title" }, "Who We Are"),
                          createVNode("div", { class: "ps-section__desc" }, [
                            createTextVNode(toDisplayString(unref(page).props.settings.site_name) + " is an online pharmacy platform designed to leverage technology for the secure distribution and delivery of high-quality medications. ", 1),
                            createVNode("br"),
                            createTextVNode(" We are dedicated to playing our part in fostering a healthier Nigeria, where everyone can access quality drugs, thus positioning ourselves as the vital connection between you and your medication. Navigating a bustling city in search of medicine can be quite a challenge. "),
                            createVNode("br"),
                            createTextVNode(" " + toDisplayString(unref(page).props.settings.site_name) + " offers the perfect solution. We alleviate the frustration of searching endlessly by utilizing our extensive database of drugstores and pharmacies throughout Nigeria to deliver the medications you need, wherever you may be. ", 1),
                            createVNode("br"),
                            createTextVNode(" We are readily available through various platforms (Website, Mobile App, WhatsApp) for swift access to quality medications. "),
                            createVNode("br"),
                            createTextVNode(" We also prioritize quality and safety for individuals, which has motivated us to ensure that all our staff and pharmacy partners maintain the highest standards of products and services.")
                          ])
                        ])
                      ]),
                      createVNode("section", { class: "ps-section--block-grid row-reverse" }, [
                        createVNode("div", { class: "ps-section__thumbnail" }, [
                          createVNode("a", {
                            class: "ps-section__image",
                            href: "#"
                          }, [
                            createVNode("img", {
                              src: "/frontend/wedo.jpg",
                              alt: ""
                            })
                          ])
                        ]),
                        createVNode("div", { class: "ps-section__content" }, [
                          createVNode("h3", { class: "ps-section__title" }, "What We Do"),
                          createVNode("div", { class: "ps-section__desc" }, " We collaborate with authorized manufacturers, importers, and pharmacies in Nigeria to deliver pharmaceuticals swiftly to those in need. Our goal as a distribution network is to ensure easy and uninterrupted access to medications. We provide top-notch online pharmaceutical services, including dosage advice, monitoring, and prescription refills. Our mission as a Pharma-Tech is to leverage technology to deliver high-quality pharmaceutical care directly to individuals in the comfort of their own homes. ")
                        ])
                      ])
                    ])
                  ]),
                  createVNode("section", { class: "ps-about__project" }, [
                    createVNode("div", { class: "container" }, [
                      createVNode("div", { class: "row" }, [
                        createVNode("div", { class: "col-md-6" }, [
                          createVNode("div", { class: "card" }, [
                            createVNode("div", {
                              class: "card-body",
                              style: { "background": "#103178" }
                            }, [
                              createVNode("h3", {
                                class: "ps-section__title",
                                style: { "color": "#fff", "text-align": "center" }
                              }, " Our Mission"),
                              createVNode("p", { style: { "color": "#fff" } }, " Our vision is to revolutionize the way people access healthcare. We envision a future where individuals can easily find and purchase the medications and products they need to support their health and wellness goals. By leveraging technology and innovation, we aim to create a seamless online shopping experience that puts the power of healthcare in your hands. ")
                            ])
                          ])
                        ]),
                        createVNode("div", { class: "col-md-6" }, [
                          createVNode("div", { class: "card" }, [
                            createVNode("div", {
                              class: "card-body",
                              style: { "background": "#007bff" }
                            }, [
                              createVNode("h3", {
                                class: "ps-section__title",
                                style: { "color": "#fff", "text-align": "center" }
                              }, " Our Vision"),
                              createVNode("p", { style: { "color": "#fff" } }, " Our mission is to empower individuals to take control of their health and well-being. We believe that everyone deserves access to quality healthcare solutions, regardless of their location or circumstances. Through our online platform, we aim to simplify the process of purchasing medications and healthcare products, ensuring that you receive the care you need with ease. ")
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Users/Pages/aboutUs.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
