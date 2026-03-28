import { defineComponent, withCtx, createVNode, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderStyle } from "vue/server-renderer";
import { A as AppTemplate } from "./AppTemplate-2d192a23.js";
import { H as HeadTags } from "./headTags-218fe00b.js";
import "@inertiajs/vue3";
import "./pwa-0a2b72e5.js";
import "./_plugin-vue_export-helper-cc2b3d55.js";
const _sfc_main = /* @__PURE__ */ defineComponent({
  __name: "faq",
  __ssrInlineRender: true,
  props: {
    faq: Object,
    pageMeta: Object
  },
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(HeadTags, { pageMeta: __props.pageMeta }, null, _parent));
      _push(ssrRenderComponent(AppTemplate, null, {
        content: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="ps-about"${_scopeId}><div class="container"${_scopeId}><ul class="ps-breadcrumb"${_scopeId}><li class="ps-breadcrumb__item"${_scopeId}><a href=""${_scopeId}>Home</a></li><li class="ps-breadcrumb__item active" aria-current="page"${_scopeId}>FAQ</li></ul></div><div class="ps-about__content"${_scopeId}><section class="ps-about__project"${_scopeId}><div class="container"${_scopeId}><section class="ps-section"${_scopeId}><div class="ps-section__cntent"${_scopeId}><div class="ps-section__desc" style="${ssrRenderStyle({ "color": "#09376e" })}"${_scopeId}>${__props.faq.content ?? ""}</div></div></section></div></section></div></div>`);
          } else {
            return [
              createVNode("div", { class: "ps-about" }, [
                createVNode("div", { class: "container" }, [
                  createVNode("ul", { class: "ps-breadcrumb" }, [
                    createVNode("li", { class: "ps-breadcrumb__item" }, [
                      createVNode("a", { href: "" }, "Home")
                    ]),
                    createVNode("li", {
                      class: "ps-breadcrumb__item active",
                      "aria-current": "page"
                    }, "FAQ")
                  ])
                ]),
                createVNode("div", { class: "ps-about__content" }, [
                  createVNode("section", { class: "ps-about__project" }, [
                    createVNode("div", { class: "container" }, [
                      createVNode("section", { class: "ps-section" }, [
                        createVNode("div", { class: "ps-section__cntent" }, [
                          createVNode("div", {
                            class: "ps-section__desc",
                            style: { "color": "#09376e" },
                            innerHTML: __props.faq.content
                          }, null, 8, ["innerHTML"])
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Users/Pages/faq.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
