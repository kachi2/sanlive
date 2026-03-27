import { withCtx, createVNode, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderStyle } from "vue/server-renderer";
import { A as AppTemplate } from "./AppTemplate-63cfd3c1.js";
import "./headTags-d006710e.js";
import "@inertiajs/vue3";
import "./pwa-521173f5.js";
import "./_plugin-vue_export-helper-cc2b3d55.js";
const _sfc_main = {
  __name: "404",
  __ssrInlineRender: true,
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(ssrRenderComponent(AppTemplate, _attrs, {
        content: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="ps-about"${_scopeId}><div${_scopeId}><section class="ps-banner--round"${_scopeId}><div class="ps-banner" style="${ssrRenderStyle({ "height": "200px" })}"${_scopeId}><div class="ps- mt-5"${_scopeId}><div class="ps-banner__content" style="${ssrRenderStyle({ "text-align": "center", "width": "100%", "padding": "20px" })}"${_scopeId}><h4 class="ps-banner__title"${_scopeId}>Page Not Found !</h4><p${_scopeId}><a href="/"${_scopeId}>Return to Home page </a></p></div></div></div></section></div></div>`);
          } else {
            return [
              createVNode("div", { class: "ps-about" }, [
                createVNode("div", null, [
                  createVNode("section", { class: "ps-banner--round" }, [
                    createVNode("div", {
                      class: "ps-banner",
                      style: { "height": "200px" }
                    }, [
                      createVNode("div", { class: "ps- mt-5" }, [
                        createVNode("div", {
                          class: "ps-banner__content",
                          style: { "text-align": "center", "width": "100%", "padding": "20px" }
                        }, [
                          createVNode("h4", { class: "ps-banner__title" }, "Page Not Found !"),
                          createVNode("p", null, [
                            createVNode("a", { href: "/" }, "Return to Home page ")
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
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/404.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
