import { unref, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderStyle, ssrRenderAttr, ssrInterpolate, ssrRenderClass, ssrIncludeBooleanAttr } from "vue/server-renderer";
import { H as HeadTags } from "./headTags-218fe00b.js";
import { usePage, useForm } from "@inertiajs/vue3";
import "./pwa-0a2b72e5.js";
import "./_plugin-vue_export-helper-cc2b3d55.js";
const ForgotPassword_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "ForgotPassword",
  __ssrInlineRender: true,
  props: {
    status: {
      type: String
    },
    pageMeta: Object
  },
  setup(__props) {
    const page = usePage();
    const form = useForm({
      email: ""
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(HeadTags, { pageMeta: __props.pageMeta }, null, _parent));
      _push(`<div class="container"><div style="${ssrRenderStyle({ "text-align": "center", "padding": "10px" })}"><img class="logo"${ssrRenderAttr("src", `/images/${unref(page).props.settings.site_logo}`)} alt="" width="200px"></div><h4 style="${ssrRenderStyle({ "text-align": "center" })}"> Forgot Passord</h4><p> Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one. </p>`);
      if (__props.status) {
        _push(`<div class="badge bg-info">${ssrInterpolate(__props.status)}</div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<form><div class="form-group"><label style="${ssrRenderStyle({ "float": "left" })}" for="password"> Email</label><input type="text" name="email"${ssrRenderAttr("value", unref(form).email)} class="${ssrRenderClass([{ "is-invalid": unref(form).errors.email }, "form-control"])}" placeholder="Email" required="" autofocus="" autocomplete=""><span class="badge bg-danger">${ssrInterpolate(unref(form).errors.email)}</span></div><button class="${ssrRenderClass([{ "opacity-25": unref(form).processing }, "btn btn-primary"])}"${ssrIncludeBooleanAttr(unref(form).processing) ? " disabled" : ""}> Email Password Reset Link </button></form></div><!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Auth/ForgotPassword.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
