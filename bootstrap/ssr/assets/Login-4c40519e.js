import { unref, withCtx, createTextVNode, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderStyle, ssrRenderAttr, ssrRenderClass, ssrInterpolate, ssrIncludeBooleanAttr, ssrLooseContain } from "vue/server-renderer";
import { H as HeadTags } from "./headTags-d006710e.js";
import { usePage, useForm, Link } from "@inertiajs/vue3";
import "./pwa-521173f5.js";
import "./_plugin-vue_export-helper-cc2b3d55.js";
const Login_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "Login",
  __ssrInlineRender: true,
  props: {
    pageMeta: Object
  },
  setup(__props) {
    const page = usePage();
    const form = useForm({
      email: "",
      password: "",
      remember: false
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(HeadTags, { pageMeta: __props.pageMeta }, null, _parent));
      _push(`<div class="container"><div style="${ssrRenderStyle({ "text-align": "center", "padding": "10px" })}"><img class="logo"${ssrRenderAttr("src", `/images/${unref(page).props.settings.site_logo}`)} alt="" width="200px"></div><h4 style="${ssrRenderStyle({ "text-align": "center" })}">Sign in</h4><form><div class="form-group"><input type="text" name="email"${ssrRenderAttr("value", unref(form).email)} class="${ssrRenderClass([{ "is-invalid": unref(form).errors.email }, "form-control"])}" placeholder="Email" required="" autofocus="" autocomplete=""><span class="badge bg-danger">${ssrInterpolate(unref(form).errors.email)}</span></div><div class="form-group"><input type="password" name="password"${ssrRenderAttr("value", unref(form).password)} class="${ssrRenderClass([{ "is-invalid": unref(form).errors.password }, "form-control"])}" id="password" placeholder="Password" required="" autocomplete="off"></div><div class="form-group d-flex justify-content-between"><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input"${ssrIncludeBooleanAttr(Array.isArray(unref(form).remember) ? ssrLooseContain(unref(form).remember, null) : unref(form).remember) ? " checked" : ""} checked="" id="customCheck1"><label class="custom-control-label" for="customCheck1">Remember me</label></div>`);
      _push(ssrRenderComponent(unref(Link), {
        href: _ctx.route("password.request"),
        class: "underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` Forgot your password? `);
          } else {
            return [
              createTextVNode(" Forgot your password? ")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div><button class="${ssrRenderClass([{ "opacity-25": unref(form).processing }, "btn btn-primary btn-block"])}"${ssrIncludeBooleanAttr(unref(form).processing) ? " disabled" : ""}>Sign in</button><p class="text-muted m-4">Don&#39;t have an account? <a href="/register" class="">Register now!</a></p></form></div><!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Auth/Login.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
