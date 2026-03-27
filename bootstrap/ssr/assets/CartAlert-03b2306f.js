import { defineComponent, useSSRContext } from "vue";
import { ssrRenderStyle, ssrInterpolate } from "vue/server-renderer";
const _sfc_main = /* @__PURE__ */ defineComponent({
  __name: "CartAlert",
  __ssrInlineRender: true,
  props: {
    message: Object
  },
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      var _a, _b;
      _push(`<!--[-->`);
      if ((_a = __props.message) == null ? void 0 : _a.success) {
        _push(`<p class="cart-success" style="${ssrRenderStyle({ "color": "#fff" })}">${ssrInterpolate(__props.message.success)}</p>`);
      } else {
        _push(`<!---->`);
      }
      if ((_b = __props.message) == null ? void 0 : _b.error) {
        _push(`<p class="cart-success">${ssrInterpolate(__props.message.error)}</p>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<!--]-->`);
    };
  }
});
const CartAlert_vue_vue_type_style_index_0_lang = "";
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/old/CartAlert.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as _
};
