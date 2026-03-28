import { withCtx, unref, createVNode, createTextVNode, toDisplayString, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderStyle, ssrInterpolate } from "vue/server-renderer";
import { A as AppTemplate } from "./AppTemplate-2d192a23.js";
import { H as HeadTags } from "./headTags-218fe00b.js";
import { usePage } from "@inertiajs/vue3";
import "./pwa-0a2b72e5.js";
import "./_plugin-vue_export-helper-cc2b3d55.js";
const _sfc_main = {
  __name: "service",
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
            _push2(`<div class="ps-about"${_scopeId}><div${_scopeId}><section class="ps-banner--round"${_scopeId}><div class="ps-banner" style="${ssrRenderStyle({ "height": "200px" })}"${_scopeId}><div class="ps-"${_scopeId}><div class="ps-banner__content" style="${ssrRenderStyle({ "text-align": "center", "width": "100%", "padding": "20px" })}"${_scopeId}><h2 class="ps-banner__title"${_scopeId}>Our Services!</h2><p${_scopeId}>As a pharmaceutical technology firm, all of our offerings are centered around leveraging technology to deliver pharmaceutical services, <br${_scopeId}> particularly in the distribution and delivery of medications. As an online pharmacy, we ensure that your medications reach you. </p></div></div></div></section></div><div class="ps-about__content"${_scopeId}><section class="ps-about__project"${_scopeId}><div class="container"${_scopeId}><section class="ps-section--block-grid"${_scopeId}><div class="ps-section__thumbnail"${_scopeId}><a class="ps-section__image" href="#"${_scopeId}><img src="/frontend/chooseus.jpg" style="${ssrRenderStyle({ "width": "400px", "height": "300px" })}" alt=""${_scopeId}></a></div><div class="ps-section__content"${_scopeId}><h3 class="ps-section__title"${_scopeId}>Why Choose Us?</h3><div class="ps-section__desc"${_scopeId}><p${_scopeId}>We utilize technology effectively to enhance your well-being. Access high-quality pharmaceutical services online in just seconds.</p><ul style="${ssrRenderStyle({ "list-style-type": "disc" })}"${_scopeId}><li${_scopeId}> Are you too occupied to visit the pharmacy?</li><li${_scopeId}> Do you struggle to obtain a specific medication or lack information about your prescriptions?</li><li${_scopeId}> Perhaps you occasionally feel too unmotivated to go to the pharmacy?</li><li${_scopeId}> Or maybe you feel too embarrassed to enter a pharmacy to buy items like condoms, Postinor, lubricants, and so on?</li></ul><h4${_scopeId}>${ssrInterpolate(unref(page).props.settings.site_name)} is here for you </h4></div></div></section><section class="ps-section--block-grid row-reverse"${_scopeId}><div class="ps-section__thumbnail"${_scopeId}><a class="ps-section__image" href="#"${_scopeId}><img src="/frontend/delivery.avif" style="${ssrRenderStyle({ "width": "400px" })}" alt=""${_scopeId}></a></div><div class="ps-section__content"${_scopeId}><h3 class="ps-section__title"${_scopeId}>We Deliver Fast</h3><div class="ps-section__desc"${_scopeId}> Eliminate the constant trips to the pharmacy with our quick medication delivery service. Your prescriptions and lab tests are only a few taps away when you utilize the eMedicStore App. We provide easy access to our delivery options, whether through our app or via WhatsApp chat. No matter the method you select, we are dedicated to delivering high-quality products promptly.</div></div></section></div></section><section class="ps-about__project"${_scopeId}><div class="container"${_scopeId}><section class="ps-section--block-grid"${_scopeId}><div class="ps-section__thumbnail"${_scopeId}><a class="ps-section__image" href="#"${_scopeId}><img src="/frontend/certi.png" style="${ssrRenderStyle({ "width": "400px" })}" alt=""${_scopeId}></a></div><div class="ps-section__content"${_scopeId}><h3 class="ps-section__title"${_scopeId}>We are Certified Pharmaceutical Store</h3><div class="ps-section__desc"${_scopeId}><p${_scopeId}>our store, your health and safety come first. We are proud to be a Certified Pharmaceutical Store, licensed and regulated to provide genuine, high-quality medications and healthcare products.</p> Our certification ensures that: <ul${_scopeId}><li${_scopeId}> ✅ All medications are sourced from trusted and approved manufacturers</li><li${_scopeId}> ✅ Storage conditions meet strict pharmaceutical standards</li><li${_scopeId}> ✅ Our staff is trained and qualified to offer safe, informed guidance</li><li${_scopeId}> ✅ We comply with national health and drug control regulations</li></ul> Whether you need prescription drugs, over-the-counter medication, or expert advice, you can count on us for reliable and professional service. Your health is in trusted hands. <h4${_scopeId}>${ssrInterpolate(unref(page).props.settings.site_name)} is here for you </h4></div></div></section><section class="ps-section--block-grid row-reverse"${_scopeId}><div class="ps-section__thumbnail"${_scopeId}><a class="ps-section__image" href="#"${_scopeId}><img src="/frontend/geria.webp" alt=""${_scopeId}></a></div><div class="ps-section__content"${_scopeId}><h3 class="ps-section__title"${_scopeId}>Geriatric Care</h3><div class="ps-section__desc"${_scopeId}> We provide pharmaceutical support for the elderly. Our geriatric care services include; <ul${_scopeId}><li${_scopeId}>A Consultation with the patient and his or her doctor to decide what medication works best.</li><li${_scopeId}>Full dosage monitoring to ensure compliance.</li><li${_scopeId}>Automatic drug refill.</li><li${_scopeId}>Periodic evaluation to decide whether to change or discontinue the medication.</li></ul> .</div></div></section></div></section><section class="ps-about__project"${_scopeId}><div class="container"${_scopeId}><div class="row"${_scopeId}><div class="col-md-6"${_scopeId}><div class="card"${_scopeId}><div class="card-body" style="${ssrRenderStyle({ "background": "#103178" })}"${_scopeId}><h3 class="ps-section__title" style="${ssrRenderStyle({ "color": "#fff", "text-align": "center" })}"${_scopeId}> Our Mission</h3><p style="${ssrRenderStyle({ "color": "#fff" })}"${_scopeId}> Our vision is to revolutionize the way people access healthcare. We envision a future where individuals can easily find and purchase the medications and products they need to support their health and wellness goals. By leveraging technology and innovation, we aim to create a seamless online shopping experience that puts the power of healthcare in your hands. </p></div></div></div><div class="col-md-6"${_scopeId}><div class="card"${_scopeId}><div class="card-body" style="${ssrRenderStyle({ "background": "#007bff" })}"${_scopeId}><h3 class="ps-section__title" style="${ssrRenderStyle({ "color": "#fff", "text-align": "center" })}"${_scopeId}> Our Vision</h3><p style="${ssrRenderStyle({ "color": "#fff" })}"${_scopeId}> Our mission is to empower individuals to take control of their health and well-being. We believe that everyone deserves access to quality healthcare solutions, regardless of their location or circumstances. Through our online platform, we aim to simplify the process of purchasing medications and healthcare products, ensuring that you receive the care you need with ease. </p></div></div></div></div></div></section></div></div>`);
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
                          createVNode("h2", { class: "ps-banner__title" }, "Our Services!"),
                          createVNode("p", null, [
                            createTextVNode("As a pharmaceutical technology firm, all of our offerings are centered around leveraging technology to deliver pharmaceutical services, "),
                            createVNode("br"),
                            createTextVNode(" particularly in the distribution and delivery of medications. As an online pharmacy, we ensure that your medications reach you. ")
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
                              src: "/frontend/chooseus.jpg",
                              style: { "width": "400px", "height": "300px" },
                              alt: ""
                            })
                          ])
                        ]),
                        createVNode("div", { class: "ps-section__content" }, [
                          createVNode("h3", { class: "ps-section__title" }, "Why Choose Us?"),
                          createVNode("div", { class: "ps-section__desc" }, [
                            createVNode("p", null, "We utilize technology effectively to enhance your well-being. Access high-quality pharmaceutical services online in just seconds."),
                            createVNode("ul", { style: { "list-style-type": "disc" } }, [
                              createVNode("li", null, " Are you too occupied to visit the pharmacy?"),
                              createVNode("li", null, " Do you struggle to obtain a specific medication or lack information about your prescriptions?"),
                              createVNode("li", null, " Perhaps you occasionally feel too unmotivated to go to the pharmacy?"),
                              createVNode("li", null, " Or maybe you feel too embarrassed to enter a pharmacy to buy items like condoms, Postinor, lubricants, and so on?")
                            ]),
                            createVNode("h4", null, toDisplayString(unref(page).props.settings.site_name) + " is here for you ", 1)
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
                              src: "/frontend/delivery.avif",
                              style: { "width": "400px" },
                              alt: ""
                            })
                          ])
                        ]),
                        createVNode("div", { class: "ps-section__content" }, [
                          createVNode("h3", { class: "ps-section__title" }, "We Deliver Fast"),
                          createVNode("div", { class: "ps-section__desc" }, " Eliminate the constant trips to the pharmacy with our quick medication delivery service. Your prescriptions and lab tests are only a few taps away when you utilize the eMedicStore App. We provide easy access to our delivery options, whether through our app or via WhatsApp chat. No matter the method you select, we are dedicated to delivering high-quality products promptly.")
                        ])
                      ])
                    ])
                  ]),
                  createVNode("section", { class: "ps-about__project" }, [
                    createVNode("div", { class: "container" }, [
                      createVNode("section", { class: "ps-section--block-grid" }, [
                        createVNode("div", { class: "ps-section__thumbnail" }, [
                          createVNode("a", {
                            class: "ps-section__image",
                            href: "#"
                          }, [
                            createVNode("img", {
                              src: "/frontend/certi.png",
                              style: { "width": "400px" },
                              alt: ""
                            })
                          ])
                        ]),
                        createVNode("div", { class: "ps-section__content" }, [
                          createVNode("h3", { class: "ps-section__title" }, "We are Certified Pharmaceutical Store"),
                          createVNode("div", { class: "ps-section__desc" }, [
                            createVNode("p", null, "our store, your health and safety come first. We are proud to be a Certified Pharmaceutical Store, licensed and regulated to provide genuine, high-quality medications and healthcare products."),
                            createTextVNode(" Our certification ensures that: "),
                            createVNode("ul", null, [
                              createVNode("li", null, " ✅ All medications are sourced from trusted and approved manufacturers"),
                              createVNode("li", null, " ✅ Storage conditions meet strict pharmaceutical standards"),
                              createVNode("li", null, " ✅ Our staff is trained and qualified to offer safe, informed guidance"),
                              createVNode("li", null, " ✅ We comply with national health and drug control regulations")
                            ]),
                            createTextVNode(" Whether you need prescription drugs, over-the-counter medication, or expert advice, you can count on us for reliable and professional service. Your health is in trusted hands. "),
                            createVNode("h4", null, toDisplayString(unref(page).props.settings.site_name) + " is here for you ", 1)
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
                              src: "/frontend/geria.webp",
                              alt: ""
                            })
                          ])
                        ]),
                        createVNode("div", { class: "ps-section__content" }, [
                          createVNode("h3", { class: "ps-section__title" }, "Geriatric Care"),
                          createVNode("div", { class: "ps-section__desc" }, [
                            createTextVNode(" We provide pharmaceutical support for the elderly. Our geriatric care services include; "),
                            createVNode("ul", null, [
                              createVNode("li", null, "A Consultation with the patient and his or her doctor to decide what medication works best."),
                              createVNode("li", null, "Full dosage monitoring to ensure compliance."),
                              createVNode("li", null, "Automatic drug refill."),
                              createVNode("li", null, "Periodic evaluation to decide whether to change or discontinue the medication.")
                            ]),
                            createTextVNode(" .")
                          ])
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Users/Pages/service.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
