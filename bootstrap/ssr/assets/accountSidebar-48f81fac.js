import { mergeProps, unref, withCtx, createVNode, createTextVNode, useSSRContext } from "vue";
import { ssrRenderAttrs, ssrRenderStyle, ssrRenderComponent } from "vue/server-renderer";
import { Link } from "@inertiajs/vue3";
const accountSidebar_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "accountSidebar",
  __ssrInlineRender: true,
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({
        class: "d-none d-xl-block col-xl-3 col-12 col-md-5 col-lg-3",
        style: { "border-radius": "10px" }
      }, _attrs))}><div class="ps-shopping__box mt-5" style="${ssrRenderStyle({ "background": "#fff", "padding": "0px" })}"><ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar view-all"><li class="dropdown-title mb-0 p-4" style="${ssrRenderStyle({ "background": "#103178", "color": "#fff", "padding-left": "10px", "border-radius": "10px 10px 0px 0px" })}"><strong>Account Information</strong></li><li class="border-b-4">`);
      _push(ssrRenderComponent(unref(Link), {
        class: "dropdown-item",
        style: { "padding": "15px", "font-weight": "bold" },
        href: "/accounts/index"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<i class="icon-user"${_scopeId}></i>  Account `);
          } else {
            return [
              createVNode("i", { class: "icon-user" }),
              createTextVNode("  Account ")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li>`);
      _push(ssrRenderComponent(unref(Link), {
        class: "dropdown-item navIL",
        href: "/account/orders"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<i class="icon-cart"${_scopeId}></i>   Orders`);
          } else {
            return [
              createVNode("i", { class: "icon-cart" }),
              createTextVNode("   Orders")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li>`);
      _push(ssrRenderComponent(unref(Link), {
        class: "dropdown-item navIL",
        href: "/account/address"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<i class="icon-book"${_scopeId}></i>   Address Book`);
          } else {
            return [
              createVNode("i", { class: "icon-book" }),
              createTextVNode("   Address Book")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li>`);
      _push(ssrRenderComponent(unref(Link), {
        class: "dropdown-item navIL",
        href: "/account/order/payments"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<i class="icon-wallet"${_scopeId}></i>  Card Payments`);
          } else {
            return [
              createVNode("i", { class: "icon-wallet" }),
              createTextVNode("  Card Payments")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li>`);
      _push(ssrRenderComponent(unref(Link), {
        class: "dropdown-item navIL",
        href: "/accounts/settings"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<i class="icon-cog"${_scopeId}></i>  Update Account`);
          } else {
            return [
              createVNode("i", { class: "icon-cog" }),
              createTextVNode("  Update Account")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li><button class="dropdown-item navIL"><i class="icon-eraser"></i>  Logout</button><form id="logout-form" method="POST"></form></li></ul></div></div>`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/accountSidebar.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const AccountSidebar = _sfc_main;
export {
  AccountSidebar as A
};
