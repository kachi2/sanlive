import { defineComponent, withCtx, createVNode, createTextVNode, openBlock, createBlock, Fragment, renderList, toDisplayString, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderStyle, ssrRenderList, ssrInterpolate } from "vue/server-renderer";
import { A as AppTemplate } from "./AppTemplate-63cfd3c1.js";
import { A as AccountSidebar } from "./accountSidebar-48f81fac.js";
import { H as HeadTags } from "./headTags-d006710e.js";
import { _ as _export_sfc } from "./_plugin-vue_export-helper-cc2b3d55.js";
import "@inertiajs/vue3";
import "./pwa-521173f5.js";
const _sfc_main = /* @__PURE__ */ defineComponent({
  __name: "payments",
  __ssrInlineRender: true,
  props: {
    payments: Object,
    pageMeta: Object
  },
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(HeadTags, { pageMeta: __props.pageMeta }, null, _parent));
      _push(ssrRenderComponent(AppTemplate, null, {
        content: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="ps-shopping" style="${ssrRenderStyle({ "background": "#eee" })}" data-v-965ac63e${_scopeId}><div class="container" data-v-965ac63e${_scopeId}><div class="ps-shopping__content" data-v-965ac63e${_scopeId}><div class="row" data-v-965ac63e${_scopeId}>`);
            _push2(ssrRenderComponent(AccountSidebar, null, null, _parent2, _scopeId));
            _push2(`<div class="col-12 col-md-7 col-lg-8 mt-5" style="${ssrRenderStyle({ "background": "#fff", "border-radius": "5px" })}" data-v-965ac63e${_scopeId}><div class="row" data-v-965ac63e${_scopeId}><span class="pt-5 pl-5" data-v-965ac63e${_scopeId}><a href="#" onclick="history.back()" data-v-965ac63e${_scopeId}> &lt;&lt; back </a> <hr style="${ssrRenderStyle({ "width": "100%" })}" data-v-965ac63e${_scopeId}></span><div class="table-responsive-sm" data-v-965ac63e${_scopeId}><table class="table ps-table ps-table--product" data-v-965ac63e${_scopeId}><thead data-v-965ac63e${_scopeId}><tr data-v-965ac63e${_scopeId}><th data-v-965ac63e${_scopeId}>Order No</th><th data-v-965ac63e${_scopeId}>Payment Ref</th><th data-v-965ac63e${_scopeId}>External Ref</th><th data-v-965ac63e${_scopeId}>Amount</th><th data-v-965ac63e${_scopeId}>Status</th></tr></thead><tbody data-v-965ac63e${_scopeId}>`);
            if (__props.payments.length > 0) {
              _push2(`<!--[-->`);
              ssrRenderList(__props.payments, (pay) => {
                _push2(`<tr data-v-965ac63e${_scopeId}><td data-v-965ac63e${_scopeId}>${ssrInterpolate(pay.order_id)}</td><td data-v-965ac63e${_scopeId}>${ssrInterpolate(pay.payment_ref)}</td><td data-v-965ac63e${_scopeId}>${ssrInterpolate(pay.external_ref)}</td><td data-v-965ac63e${_scopeId}>${ssrInterpolate(pay.payable)}</td><td data-v-965ac63e${_scopeId}>`);
                if (pay.status == 1) {
                  _push2(`<span class="badge badge-success" data-v-965ac63e${_scopeId}> Success</span>`);
                } else {
                  _push2(`<span class="badge badge-warning" data-v-965ac63e${_scopeId}> Pending</span>`);
                }
                _push2(`</td></tr>`);
              });
              _push2(`<!--]-->`);
            } else {
              _push2(`<tr data-v-965ac63e${_scopeId}><p style="${ssrRenderStyle({ "margin": "80px auto" })}" data-v-965ac63e${_scopeId}> No Data Found</p></tr>`);
            }
            _push2(`</tbody></table></div></div></div></div></div></div></div><div style="${ssrRenderStyle({ "height": "2em", "background": "#eee" })}" data-v-965ac63e${_scopeId}></div>`);
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
                          createVNode("span", { class: "pt-5 pl-5" }, [
                            createVNode("a", {
                              href: "#",
                              onclick: "history.back()"
                            }, " << back "),
                            createTextVNode(),
                            createVNode("hr", { style: { "width": "100%" } })
                          ]),
                          createVNode("div", { class: "table-responsive-sm" }, [
                            createVNode("table", { class: "table ps-table ps-table--product" }, [
                              createVNode("thead", null, [
                                createVNode("tr", null, [
                                  createVNode("th", null, "Order No"),
                                  createVNode("th", null, "Payment Ref"),
                                  createVNode("th", null, "External Ref"),
                                  createVNode("th", null, "Amount"),
                                  createVNode("th", null, "Status")
                                ])
                              ]),
                              createVNode("tbody", null, [
                                __props.payments.length > 0 ? (openBlock(true), createBlock(Fragment, { key: 0 }, renderList(__props.payments, (pay) => {
                                  return openBlock(), createBlock("tr", null, [
                                    createVNode("td", null, toDisplayString(pay.order_id), 1),
                                    createVNode("td", null, toDisplayString(pay.payment_ref), 1),
                                    createVNode("td", null, toDisplayString(pay.external_ref), 1),
                                    createVNode("td", null, toDisplayString(pay.payable), 1),
                                    createVNode("td", null, [
                                      pay.status == 1 ? (openBlock(), createBlock("span", {
                                        key: 0,
                                        class: "badge badge-success"
                                      }, " Success")) : (openBlock(), createBlock("span", {
                                        key: 1,
                                        class: "badge badge-warning"
                                      }, " Pending"))
                                    ])
                                  ]);
                                }), 256)) : (openBlock(), createBlock("tr", { key: 1 }, [
                                  createVNode("p", { style: { "margin": "80px auto" } }, " No Data Found")
                                ]))
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
});
const payments_vue_vue_type_style_index_0_scoped_965ac63e_lang = "";
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Users/Accounts/payments.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const payments = /* @__PURE__ */ _export_sfc(_sfc_main, [["__scopeId", "data-v-965ac63e"]]);
export {
  payments as default
};
