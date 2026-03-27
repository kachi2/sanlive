import { ref, unref, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderStyle, ssrRenderAttr, ssrInterpolate, ssrRenderClass, ssrIncludeBooleanAttr } from "vue/server-renderer";
import { H as HeadTags } from "./headTags-d006710e.js";
import { usePage, useForm } from "@inertiajs/vue3";
import "./pwa-521173f5.js";
import "./_plugin-vue_export-helper-cc2b3d55.js";
const ResetPassword_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "ResetPassword",
  __ssrInlineRender: true,
  props: {
    email: {
      type: String,
      required: true
    },
    token: {
      type: String,
      required: true
    },
    pageMeta: Object
  },
  setup(__props) {
    const page = usePage();
    const props = __props;
    const form = useForm({
      token: props.token,
      email: props.email,
      password: "",
      password_confirmation: ""
    });
    const status = ref("");
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(HeadTags, { pageMeta: __props.pageMeta }, null, _parent));
      _push(`<div class="container"><div style="${ssrRenderStyle({ "text-align": "center", "padding": "10px" })}"><img class="logo"${ssrRenderAttr("src", `/images/${unref(page).props.settings.site_logo}`)} alt="" width="200px"></div><h4 style="${ssrRenderStyle({ "text-align": "center" })}"> Reset Passord</h4><div class="m-4">`);
      if (status.value) {
        _push(`<div class="badge bg-info p-2">${ssrInterpolate(status.value)}</div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><form><div class="form-group"><input type="password" name="password"${ssrRenderAttr("value", unref(form).password)} class="${ssrRenderClass([{ "is-invalid": unref(form).errors.password }, "form-control"])}" placeholder="password" required="" autofocus="" autocomplete="new-password"><span class="badge bg-danger">${ssrInterpolate(unref(form).errors.password)}</span></div><div class="form-group"><input type="password" name="password"${ssrRenderAttr("value", unref(form).password_confirmation)} class="${ssrRenderClass([{ "is-invalid": unref(form).errors.password_confirmation }, "form-control"])}" placeholder="password confirmation" required="" autofocus="" autocomplete="new-password"><span class="badge bg-danger">${ssrInterpolate(unref(form).errors.password_confirmation)}</span></div><button class="${ssrRenderClass([{ "opacity-25": unref(form).processing }, "btn btn-primary"])}"${ssrIncludeBooleanAttr(unref(form).processing) ? " disabled" : ""}> Reset Password </button></form></div><!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Auth/ResetPassword.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
