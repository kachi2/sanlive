import { resolveComponent, withCtx, createVNode, createTextVNode, toDisplayString, openBlock, createBlock, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderStyle, ssrInterpolate } from "vue/server-renderer";
import { A as AppTemplate } from "./AppTemplate-2d192a23.js";
import { A as AccountSidebar } from "./accountSidebar-48f81fac.js";
import { H as HeadTags } from "./headTags-218fe00b.js";
import "@inertiajs/vue3";
import "./pwa-0a2b72e5.js";
import "./_plugin-vue_export-helper-cc2b3d55.js";
const _sfc_main = {
  __name: "account",
  __ssrInlineRender: true,
  props: {
    account: Object,
    address: Object,
    pageMeta: Object
  },
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Link = resolveComponent("Link");
      _push(`<!--[-->`);
      _push(ssrRenderComponent(HeadTags, { pageMeta: __props.pageMeta }, null, _parent));
      _push(ssrRenderComponent(AppTemplate, null, {
        content: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="ps-shopping" style="${ssrRenderStyle({ "background": "#eee" })}"${_scopeId}><div class="container"${_scopeId}><div class="ps-shopping__content"${_scopeId}><div class="row"${_scopeId}>`);
            _push2(ssrRenderComponent(AccountSidebar, null, null, _parent2, _scopeId));
            _push2(`<div class="col-12 col-md-7 col-lg-8 mt-5" style="${ssrRenderStyle({ "background": "#fff", "border-radius": "5px" })}"${_scopeId}><div class="row"${_scopeId}><div class="col-12 col-md-6"${_scopeId}><div class="ps-categogy--list"${_scopeId}><div class="ps-product ps-product--list" style="${ssrRenderStyle({ "border": "2px solid #d1d5dad4", "border-radius": "10px" })}"${_scopeId}><div class="ps-product__conent" style="${ssrRenderStyle({ "border-right": "0px" })}"${_scopeId}><div class="ps-product__info"${_scopeId}><a class="ps-product__branch" href="#"${_scopeId}></a><p class="ps-product__tite" style="${ssrRenderStyle({ "font-size": "16px", "color": "#262525" })}"${_scopeId}><a${_scopeId}></a> Account Information </p><hr${_scopeId}><div class="ps-product__meta"${_scopeId}><span class="ps-product__price" style="${ssrRenderStyle({ "font-size": "15px" })}"${_scopeId}>${ssrInterpolate(__props.account.first_name + " " + __props.account.last_name)}</span></div><ul class="ps-product__list"${_scopeId}><li${_scopeId}><span class="ps-list__title"${_scopeId}></span>${ssrInterpolate(__props.account.email)}</li><li${_scopeId}><span class="ps-list__title"${_scopeId}></span>${ssrInterpolate(__props.account.phone ?? null)}</li><li${_scopeId}><span class="ps-list__title"${_scopeId}></span>Last Login: ${ssrInterpolate(__props.account.last_login)}</li></ul></div></div></div></div></div><div class="col-12 col-md-6"${_scopeId}><div class="ps-categogy--list"${_scopeId}><div class="ps-product ps-product--list" style="${ssrRenderStyle({ "border": "2px solid #d1d5dad4", "border-radius": "10px" })}"${_scopeId}><div class="ps-product__conent" style="${ssrRenderStyle({ "border-right": "0px" })}"${_scopeId}>`);
            if (__props.address) {
              _push2(`<div class="ps-product__info"${_scopeId}><a class="ps-product__branch" href="#"${_scopeId}></a><p class="ps-product__tite" style="${ssrRenderStyle({ "font-size": "16px", "color": "#262525" })}"${_scopeId}><a${_scopeId}></a> Shipping Address <small style="${ssrRenderStyle({ "font-size": "10px", "color": "rgb(117, 131, 242)" })}"${_scopeId}> Default</small><span style="${ssrRenderStyle({ "float": "right" })}"${_scopeId}>`);
              _push2(ssrRenderComponent(_component_Link, {
                href: `/account/address/edit/${__props.address.hashid}`
              }, {
                default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<i class="icon-pen"${_scopeId2}></i>`);
                  } else {
                    return [
                      createVNode("i", { class: "icon-pen" })
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(`</span></p><hr${_scopeId}><div class="ps-product__meta"${_scopeId}><span class="ps-product__price" style="${ssrRenderStyle({ "font-size": "15px" })}"${_scopeId}>${ssrInterpolate(__props.address.name)}</span></div><ul class="ps-product__list"${_scopeId}><li${_scopeId}><span class="ps-list__title"${_scopeId}></span>${ssrInterpolate(__props.address.email)} ${ssrInterpolate(__props.address.phone ?? null)}</li><li${_scopeId}><span class="ps-list__title"${_scopeId}></span> ${ssrInterpolate(__props.address.address)} ${ssrInterpolate(__props.address.city)} ${ssrInterpolate(__props.address.state)} ${ssrInterpolate(__props.address.country)}</li></ul></div>`);
            } else {
              _push2(`<div class="ps-product__info"${_scopeId}><a class="ps-product__branch" href="#"${_scopeId}></a><p class="ps-product__tite" style="${ssrRenderStyle({ "font-size": "16px", "color": "#262525" })}"${_scopeId}><a${_scopeId}></a> Shipping Address <small style="${ssrRenderStyle({ "font-size": "10px", "color": "rgb(117, 131, 242)" })}"${_scopeId}> Default</small><span style="${ssrRenderStyle({ "float": "right" })}"${_scopeId}><a href=""${_scopeId}><i class="icon-pen"${_scopeId}></i></a></span></p><hr${_scopeId}><ul class="ps-product__list"${_scopeId}><li${_scopeId}><span class="ps-list__title"${_scopeId}></span>You don&#39;t have a shippig address yet <br${_scopeId}>`);
              _push2(ssrRenderComponent(_component_Link, {
                href: "/account/address/create",
                class: "btn btn-primary"
              }, {
                default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(` Add New Address`);
                  } else {
                    return [
                      createTextVNode(" Add New Address")
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(`</li></ul></div>`);
            }
            _push2(`</div></div></div></div></div></div></div></div></div></div><div style="${ssrRenderStyle({ "height": "2em", "background": "#eee" })}"${_scopeId}></div>`);
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
                                      createTextVNode(" Account Information ")
                                    ]),
                                    createVNode("hr"),
                                    createVNode("div", { class: "ps-product__meta" }, [
                                      createVNode("span", {
                                        class: "ps-product__price",
                                        style: { "font-size": "15px" }
                                      }, toDisplayString(__props.account.first_name + " " + __props.account.last_name), 1)
                                    ]),
                                    createVNode("ul", { class: "ps-product__list" }, [
                                      createVNode("li", null, [
                                        createVNode("span", { class: "ps-list__title" }),
                                        createTextVNode(toDisplayString(__props.account.email), 1)
                                      ]),
                                      createVNode("li", null, [
                                        createVNode("span", { class: "ps-list__title" }),
                                        createTextVNode(toDisplayString(__props.account.phone ?? null), 1)
                                      ]),
                                      createVNode("li", null, [
                                        createVNode("span", { class: "ps-list__title" }),
                                        createTextVNode("Last Login: " + toDisplayString(__props.account.last_login), 1)
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
                                  __props.address ? (openBlock(), createBlock("div", {
                                    key: 0,
                                    class: "ps-product__info"
                                  }, [
                                    createVNode("a", {
                                      class: "ps-product__branch",
                                      href: "#"
                                    }),
                                    createVNode("p", {
                                      class: "ps-product__tite",
                                      style: { "font-size": "16px", "color": "#262525" }
                                    }, [
                                      createVNode("a"),
                                      createTextVNode(" Shipping Address "),
                                      createVNode("small", { style: { "font-size": "10px", "color": "rgb(117, 131, 242)" } }, " Default"),
                                      createVNode("span", { style: { "float": "right" } }, [
                                        createVNode(_component_Link, {
                                          href: `/account/address/edit/${__props.address.hashid}`
                                        }, {
                                          default: withCtx(() => [
                                            createVNode("i", { class: "icon-pen" })
                                          ]),
                                          _: 1
                                        }, 8, ["href"])
                                      ])
                                    ]),
                                    createVNode("hr"),
                                    createVNode("div", { class: "ps-product__meta" }, [
                                      createVNode("span", {
                                        class: "ps-product__price",
                                        style: { "font-size": "15px" }
                                      }, toDisplayString(__props.address.name), 1)
                                    ]),
                                    createVNode("ul", { class: "ps-product__list" }, [
                                      createVNode("li", null, [
                                        createVNode("span", { class: "ps-list__title" }),
                                        createTextVNode(toDisplayString(__props.address.email) + " " + toDisplayString(__props.address.phone ?? null), 1)
                                      ]),
                                      createVNode("li", null, [
                                        createVNode("span", { class: "ps-list__title" }),
                                        createTextVNode(" " + toDisplayString(__props.address.address) + " " + toDisplayString(__props.address.city) + " " + toDisplayString(__props.address.state) + " " + toDisplayString(__props.address.country), 1)
                                      ])
                                    ])
                                  ])) : (openBlock(), createBlock("div", {
                                    key: 1,
                                    class: "ps-product__info"
                                  }, [
                                    createVNode("a", {
                                      class: "ps-product__branch",
                                      href: "#"
                                    }),
                                    createVNode("p", {
                                      class: "ps-product__tite",
                                      style: { "font-size": "16px", "color": "#262525" }
                                    }, [
                                      createVNode("a"),
                                      createTextVNode(" Shipping Address "),
                                      createVNode("small", { style: { "font-size": "10px", "color": "rgb(117, 131, 242)" } }, " Default"),
                                      createVNode("span", { style: { "float": "right" } }, [
                                        createVNode("a", { href: "" }, [
                                          createVNode("i", { class: "icon-pen" })
                                        ])
                                      ])
                                    ]),
                                    createVNode("hr"),
                                    createVNode("ul", { class: "ps-product__list" }, [
                                      createVNode("li", null, [
                                        createVNode("span", { class: "ps-list__title" }),
                                        createTextVNode("You don't have a shippig address yet "),
                                        createVNode("br"),
                                        createVNode(_component_Link, {
                                          href: "/account/address/create",
                                          class: "btn btn-primary"
                                        }, {
                                          default: withCtx(() => [
                                            createTextVNode(" Add New Address")
                                          ]),
                                          _: 1
                                        })
                                      ])
                                    ])
                                  ]))
                                ])
                              ])
                            ])
                          ])
                        ])
                      ])
                    ])
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Users/Accounts/account.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
