import { defineComponent, withCtx, unref, createTextVNode, createVNode, openBlock, createBlock, Fragment, renderList, createCommentVNode, toDisplayString, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderStyle, ssrRenderList, ssrInterpolate } from "vue/server-renderer";
import { A as AppTemplate } from "./AppTemplate-2d192a23.js";
import { A as AccountSidebar } from "./accountSidebar-48f81fac.js";
import { H as HeadTags } from "./headTags-218fe00b.js";
import { Link } from "@inertiajs/vue3";
import "./pwa-0a2b72e5.js";
import "./_plugin-vue_export-helper-cc2b3d55.js";
const _sfc_main = /* @__PURE__ */ defineComponent({
  __name: "address",
  __ssrInlineRender: true,
  props: {
    addresses: Object,
    pageMeta: Object
  },
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(HeadTags, { pageMeta: __props.pageMeta }, null, _parent));
      _push(ssrRenderComponent(AppTemplate, null, {
        content: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="ps-shopping" style="${ssrRenderStyle({ "background": "#eee" })}"${_scopeId}><div class="container"${_scopeId}><div class="ps-shopping__content"${_scopeId}><div class="row"${_scopeId}>`);
            _push2(ssrRenderComponent(AccountSidebar, null, null, _parent2, _scopeId));
            _push2(`<div class="col-12 col-md-8 col-lg-8 mt-5" style="${ssrRenderStyle({ "background": "#fff", "border-radius": "5px" })}"${_scopeId}><div class="row"${_scopeId}><span class="pt-5 pl-5"${_scopeId}><a href="#" onclick="history.back()"${_scopeId}> &lt;&lt; back </a><hr style="${ssrRenderStyle({ "width": "100%" })}"${_scopeId}></span><div class="col-12 col-md-11"${_scopeId}><span style="${ssrRenderStyle({ "float": "right" })}"${_scopeId}>`);
            _push2(ssrRenderComponent(unref(Link), {
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
            _push2(`</span></div>`);
            if (__props.addresses.length > 0) {
              _push2(`<!--[-->`);
              ssrRenderList(__props.addresses, (address) => {
                _push2(`<div class="col-12 col-md-6"${_scopeId}><div class="ps-categogy--list"${_scopeId}><div class="ps-product ps-product--list" style="${ssrRenderStyle({ "border": "2px solid #d1d5dad4", "border-radius": "10px" })}"${_scopeId}><div class="ps-product__conent" style="${ssrRenderStyle({ "border-right": "0px" })}"${_scopeId}><div class="ps-product__info"${_scopeId}><a class="ps-product__branch" href="#"${_scopeId}></a><p class="ps-product__tite" style="${ssrRenderStyle({ "font-size": "16px", "color": "#262525" })}"${_scopeId}>`);
                if (address.is_default == 1) {
                  _push2(`<small style="${ssrRenderStyle({ "font-size": "10px", "color": "rgb(117, 131, 242)" })}"${_scopeId}>Default</small>`);
                } else {
                  _push2(`<!---->`);
                }
                _push2(`<span style="${ssrRenderStyle({ "float": "right" })}"${_scopeId}>`);
                _push2(ssrRenderComponent(unref(Link), {
                  href: `/account/address/edit/${address.hashid}`
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
                  _: 2
                }, _parent2, _scopeId));
                _push2(ssrRenderComponent(unref(Link), {
                  href: `/account/address/delete/${address.hashid}`,
                  onclick: "return confirm('Are you, you want to delete this Address?')"
                }, {
                  default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      _push3(`    <i class="badge badge-danger"${_scopeId2}>X</i>`);
                    } else {
                      return [
                        createTextVNode("    "),
                        createVNode("i", { class: "badge badge-danger" }, "X")
                      ];
                    }
                  }),
                  _: 2
                }, _parent2, _scopeId));
                _push2(`</span></p><div class="ps-product__meta"${_scopeId}><span class="ps-product__price" style="${ssrRenderStyle({ "font-size": "15px" })}"${_scopeId}>${ssrInterpolate(address.name.toUpperCase())}</span></div><ul class="ps-product__list"${_scopeId}><li${_scopeId}><span class=""${_scopeId}></span>${ssrInterpolate(address.email ? address.email + "," : "")} ${ssrInterpolate(address.phone ? address.phone + "," : "")}</li><li${_scopeId}>${ssrInterpolate(address.address)}</li></ul></div></div></div></div></div>`);
              });
              _push2(`<!--]-->`);
            } else {
              _push2(`<div class="col-12 col-md-6"${_scopeId}><div class="ps-categogy--list"${_scopeId}><div class="ps-product ps-product--list" style="${ssrRenderStyle({ "border": "2px solid #d1d5dad4", "border-radius": "10px" })}"${_scopeId}><div class="ps-product__conent" style="${ssrRenderStyle({ "border-right": "0px" })}"${_scopeId}><div class="ps-product__info"${_scopeId}><a class="ps-product__branch" href="#"${_scopeId}></a><p class="ps-product__tite" style="${ssrRenderStyle({ "font-size": "16px", "color": "#262525" })}"${_scopeId}><a${_scopeId}></a> Shipping Address <small style="${ssrRenderStyle({ "font-size": "10px", "color": "rgb(117, 131, 242)" })}"${_scopeId}> Default</small><span style="${ssrRenderStyle({ "float": "right" })}"${_scopeId}><a href=""${_scopeId}><i class="icon-pen"${_scopeId}></i></a></span></p><hr${_scopeId}><ul class="ps-product__list"${_scopeId}><li${_scopeId}><span class="ps-list__title"${_scopeId}></span>You don&#39;t have a shippig address yet <br${_scopeId}>`);
              _push2(ssrRenderComponent(unref(Link), {
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
              _push2(`</li></ul></div></div></div></div></div>`);
            }
            _push2(`</div></div></div></div></div></div>`);
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
                        class: "col-12 col-md-8 col-lg-8 mt-5",
                        style: { "background": "#fff", "border-radius": "5px" }
                      }, [
                        createVNode("div", { class: "row" }, [
                          createVNode("span", { class: "pt-5 pl-5" }, [
                            createVNode("a", {
                              href: "#",
                              onclick: "history.back()"
                            }, " << back "),
                            createVNode("hr", { style: { "width": "100%" } })
                          ]),
                          createVNode("div", { class: "col-12 col-md-11" }, [
                            createVNode("span", { style: { "float": "right" } }, [
                              createVNode(unref(Link), {
                                href: "/account/address/create",
                                class: "btn btn-primary"
                              }, {
                                default: withCtx(() => [
                                  createTextVNode(" Add New Address")
                                ]),
                                _: 1
                              })
                            ])
                          ]),
                          __props.addresses.length > 0 ? (openBlock(true), createBlock(Fragment, { key: 0 }, renderList(__props.addresses, (address) => {
                            return openBlock(), createBlock("div", { class: "col-12 col-md-6" }, [
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
                                        address.is_default == 1 ? (openBlock(), createBlock("small", {
                                          key: 0,
                                          style: { "font-size": "10px", "color": "rgb(117, 131, 242)" }
                                        }, "Default")) : createCommentVNode("", true),
                                        createVNode("span", { style: { "float": "right" } }, [
                                          createVNode(unref(Link), {
                                            href: `/account/address/edit/${address.hashid}`
                                          }, {
                                            default: withCtx(() => [
                                              createVNode("i", { class: "icon-pen" })
                                            ]),
                                            _: 2
                                          }, 1032, ["href"]),
                                          createVNode(unref(Link), {
                                            href: `/account/address/delete/${address.hashid}`,
                                            onclick: "return confirm('Are you, you want to delete this Address?')"
                                          }, {
                                            default: withCtx(() => [
                                              createTextVNode("    "),
                                              createVNode("i", { class: "badge badge-danger" }, "X")
                                            ]),
                                            _: 2
                                          }, 1032, ["href"])
                                        ])
                                      ]),
                                      createVNode("div", { class: "ps-product__meta" }, [
                                        createVNode("span", {
                                          class: "ps-product__price",
                                          style: { "font-size": "15px" }
                                        }, toDisplayString(address.name.toUpperCase()), 1)
                                      ]),
                                      createVNode("ul", { class: "ps-product__list" }, [
                                        createVNode("li", null, [
                                          createVNode("span", { class: "" }),
                                          createTextVNode(toDisplayString(address.email ? address.email + "," : "") + " " + toDisplayString(address.phone ? address.phone + "," : ""), 1)
                                        ]),
                                        createVNode("li", null, toDisplayString(address.address), 1)
                                      ])
                                    ])
                                  ])
                                ])
                              ])
                            ]);
                          }), 256)) : (openBlock(), createBlock("div", {
                            key: 1,
                            class: "col-12 col-md-6"
                          }, [
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
                                        createVNode(unref(Link), {
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
                                  ])
                                ])
                              ])
                            ])
                          ]))
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
});
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Users/Accounts/address.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
