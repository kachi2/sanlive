import { unref, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderStyle, ssrRenderAttr, ssrRenderClass, ssrInterpolate, ssrIncludeBooleanAttr } from "vue/server-renderer";
import { H as HeadTags } from "./headTags-d006710e.js";
import { usePage, useForm } from "@inertiajs/vue3";
import "./pwa-521173f5.js";
import "./_plugin-vue_export-helper-cc2b3d55.js";
const Register_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "Register",
  __ssrInlineRender: true,
  props: {
    pageMeta: Object
  },
  setup(__props) {
    const page = usePage();
    const form = useForm({
      first_name: "",
      last_name: "",
      name: "",
      email: "",
      password: "",
      password_confirmation: ""
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(HeadTags, { pageMeta: __props.pageMeta }, null, _parent));
      _push(`<div class="container"><div style="${ssrRenderStyle({ "text-align": "center", "padding": "10px" })}"><img class="logo"${ssrRenderAttr("src", `/images/${unref(page).props.settings.site_logo}`)} alt="" width="200px"></div><h4 style="${ssrRenderStyle({ "text-align": "center" })}">Register</h4><form><div class="form-group"><input type="text" name="first_name"${ssrRenderAttr("value", unref(form).first_name)} class="${ssrRenderClass([{ "is-invalid": unref(form).errors.first_name }, "form-control"])}" placeholder="Enter First Name" required="" autofocus="" autocomplete=""><span class="badge bg-danger">${ssrInterpolate(unref(form).errors.firs_name)}</span></div><div class="form-group"><input type="text" name="last_name"${ssrRenderAttr("value", unref(form).last_name)} class="${ssrRenderClass([{ "is-invalid": unref(form).errors.last_name }, "form-control"])}" placeholder="Enter last name" required="" autofocus="" autocomplete=""><span class="badge bg-danger">${ssrInterpolate(unref(form).errors.last_name)}</span></div><div class="form-group"><input type="text" name="email"${ssrRenderAttr("value", unref(form).email)} class="${ssrRenderClass([{ "is-invalid": unref(form).errors.email }, "form-control"])}" placeholder="Email" required="" autofocus="" autocomplete=""><span class="badge bg-danger">${ssrInterpolate(unref(form).errors.email)}</span></div><div class="form-group"><input type="password" name="password"${ssrRenderAttr("value", unref(form).password)} class="${ssrRenderClass([{ "is-invalid": unref(form).errors.password }, "form-control"])}" id="password" placeholder="Password" required="" autocomplete="off"></div><div class="form-group"><input type="password" name="password_confirmation"${ssrRenderAttr("value", unref(form).password_confirmation)} class="${ssrRenderClass([{ "is-invalid": unref(form).errors.password_confirmation }, "form-control"])}" id="password" placeholder="Password confirmation" required="" autocomplete="off"></div><button class="${ssrRenderClass([{ "opacity-25": unref(form).processing }, "btn btn-primary btn-block"])}"${ssrIncludeBooleanAttr(unref(form).processing) ? " disabled" : ""}>Sign in</button><p class="text-muted m-4">Already have an account? <a href="/login" class="">Login now!</a></p></form></div><!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Auth/Register.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
