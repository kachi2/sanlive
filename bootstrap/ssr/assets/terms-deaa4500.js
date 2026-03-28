import { defineComponent, resolveComponent, withCtx, createVNode, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderStyle } from "vue/server-renderer";
import { A as AppTemplate } from "./AppTemplate-2d192a23.js";
import "@inertiajs/vue3";
const _sfc_main = /* @__PURE__ */ defineComponent({
  __name: "terms",
  __ssrInlineRender: true,
  props: {
    terms: Object,
    pageMeta: Object
  },
  setup(__props) {
    const props = __props;
    console.log(props.terms);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_HeadTags = resolveComponent("HeadTags");
      _push(`<!--[-->`);
      _push(ssrRenderComponent(_component_HeadTags, { pageMeta: __props.pageMeta }, null, _parent));
      _push(ssrRenderComponent(AppTemplate, null, {
        content: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="ps-about"${_scopeId}><div class="container"${_scopeId}><ul class="ps-breadcrumb"${_scopeId}><li class="ps-breadcrumb__item"${_scopeId}><a href=""${_scopeId}>Home</a></li><li class="ps-breadcrumb__item active" aria-current="page"${_scopeId}>Terms and Conditions</li></ul></div><div class="ps-about__content"${_scopeId}><section class="ps-about__project"${_scopeId}><div class="container"${_scopeId}><section class="ps-section"${_scopeId}><div class="ps-section__cntent"${_scopeId}><div class="ps-section__desc" style="${ssrRenderStyle({ "color": "#09376e" })}"${_scopeId}><span${_scopeId}>${__props.terms.content ?? ""}</span></div></div></section></div></section></div></div>`);
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
                    }, "Terms and Conditions")
                  ])
                ]),
                createVNode("div", { class: "ps-about__content" }, [
                  createVNode("section", { class: "ps-about__project" }, [
                    createVNode("div", { class: "container" }, [
                      createVNode("section", { class: "ps-section" }, [
                        createVNode("div", { class: "ps-section__cntent" }, [
                          createVNode("div", {
                            class: "ps-section__desc",
                            style: { "color": "#09376e" }
                          }, [
                            createVNode("span", {
                              innerHTML: __props.terms.content
                            }, null, 8, ["innerHTML"])
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
});
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Users/Pages/terms.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
