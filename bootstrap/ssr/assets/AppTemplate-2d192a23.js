import { ssrRenderAttrs, ssrRenderStyle, ssrRenderComponent, ssrRenderAttr, ssrInterpolate, ssrRenderClass, ssrRenderSlot } from "vue/server-renderer";
import { mergeProps, unref, withCtx, createTextVNode, useSSRContext, createVNode, toDisplayString, inject, ref, provide } from "vue";
import { Link, usePage, useForm } from "@inertiajs/vue3";
const _sfc_main$6 = {
  __name: "TopNav",
  __ssrInlineRender: true,
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({
        class: "ps-navigation",
        style: { "background": "#E6F3FF", "border-top": "1px solid #e4e8ee", "border-bottom": "1px solid #e4e8ee" }
      }, _attrs))}><div class="container"><div class="" style="${ssrRenderStyle({ "text-align": "center" })}"><nav class="ps-main-menu"><ul class="menu"><li>`);
      _push(ssrRenderComponent(unref(Link), { href: "/" }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`Home`);
          } else {
            return [
              createTextVNode("Home")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li>`);
      _push(ssrRenderComponent(unref(Link), { href: "/catalogs" }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`Products`);
          } else {
            return [
              createTextVNode("Products")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li>`);
      _push(ssrRenderComponent(unref(Link), { href: "/page/services" }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`Our Services`);
          } else {
            return [
              createTextVNode("Our Services")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li>`);
      _push(ssrRenderComponent(unref(Link), { href: "/pages/about" }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`About Us`);
          } else {
            return [
              createTextVNode("About Us")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li>`);
      _push(ssrRenderComponent(unref(Link), { href: "/pages/contactus" }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`Contact Us`);
          } else {
            return [
              createTextVNode("Contact Us")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li>`);
      _push(ssrRenderComponent(unref(Link), { href: "/blogs" }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`Blog`);
          } else {
            return [
              createTextVNode("Blog")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li>`);
      _push(ssrRenderComponent(unref(Link), { href: "/faq" }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`FAQ`);
          } else {
            return [
              createTextVNode("FAQ")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li></ul></nav></div></div></div>`);
    };
  }
};
const _sfc_setup$6 = _sfc_main$6.setup;
_sfc_main$6.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/TopNav.vue");
  return _sfc_setup$6 ? _sfc_setup$6(props, ctx) : void 0;
};
const _sfc_main$5 = {
  __name: "Header",
  __ssrInlineRender: true,
  setup(__props) {
    var _a;
    const page = usePage();
    const queryParam = new URLSearchParams(((_a = page.url) == null ? void 0 : _a.split("?")[1]) ?? "");
    const form = useForm({
      q: queryParam.get("query") ?? ""
    });
    return (_ctx, _push, _parent, _attrs) => {
      var _a2, _b, _c, _d, _e, _f, _g, _h;
      _push(`<header${ssrRenderAttrs(mergeProps({ class: "ps-header ps-header--1" }, _attrs))}><div class="ps-noti p-2"><div class="container"><h1 class="m-0" style="${ssrRenderStyle({ "color": "#fff", "font-weight": "bold", "font-size": "13px" })}"><marquee><span>${((_c = (_b = (_a2 = unref(page)) == null ? void 0 : _a2.props) == null ? void 0 : _b.announcment) == null ? void 0 : _c.content) ?? ""}</span></marquee></h1></div></div><div class="ps-header__middle"><div class="container"><div class="ps-logo"><a href="/"><img${ssrRenderAttr("src", `/images/${(_e = (_d = unref(page)) == null ? void 0 : _d.props.settings) == null ? void 0 : _e.site_logo}`)} style="${ssrRenderStyle({ "width": "160px" })}" alt="sanlive pharmacy"><img class="sticky-logo" src="" alt=""></a></div><div class="ps-header__right"><ul class="ps-header__icons"><li><a class="ps-header__item open-search" href=""><i class="icon-magnifier"></i></a></li>`);
      if (!((_h = (_g = (_f = unref(page)) == null ? void 0 : _f.props) == null ? void 0 : _g.auth) == null ? void 0 : _h.user)) {
        _push(`<span>`);
        _push(ssrRenderComponent(unref(Link), {
          class: "",
          href: "/login",
          rel: "nofollow"
        }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`Sign in`);
            } else {
              return [
                createTextVNode("Sign in")
              ];
            }
          }),
          _: 1
        }, _parent));
        _push(`</span>`);
      } else {
        _push(`<li>`);
        _push(ssrRenderComponent(unref(Link), {
          class: "ps-header__item",
          style: { "width": "120px", "font-size": "0.85em", "color": "#5b6c8f" },
          href: "/accounts/index"
        }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            var _a3, _b2, _c2, _d2, _e2, _f2, _g2, _h2, _i, _j;
            if (_push2) {
              _push2(`<i class="icon-user" style="${ssrRenderStyle({ "font-size": "1.4em", "padding-right": "2px", "font-weight": "800" })}"${_scopeId}></i>Hi, ${ssrInterpolate((_e2 = (_d2 = (_c2 = (_b2 = (_a3 = unref(page)) == null ? void 0 : _a3.props) == null ? void 0 : _b2.auth) == null ? void 0 : _c2.user) == null ? void 0 : _d2.first_name) == null ? void 0 : _e2.toUpperCase())}`);
            } else {
              return [
                createVNode("i", {
                  class: "icon-user",
                  style: { "font-size": "1.4em", "padding-right": "2px", "font-weight": "800" }
                }),
                createTextVNode("Hi, " + toDisplayString((_j = (_i = (_h2 = (_g2 = (_f2 = unref(page)) == null ? void 0 : _f2.props) == null ? void 0 : _g2.auth) == null ? void 0 : _h2.user) == null ? void 0 : _i.first_name) == null ? void 0 : _j.toUpperCase()), 1)
              ];
            }
          }),
          _: 1
        }, _parent));
        _push(`</li>`);
      }
      _push(`<li><a class="ps-header__item" target="_blank" href="https://wa.me/+2348058885913?text=&#39;Good day, please i want to make enquiries&#39;" id="cart-mini"><i class="icon-phone-bubble"></i></a></li><li>`);
      _push(ssrRenderComponent(unref(Link), {
        class: "ps-header__item",
        href: "/carts/index",
        id: "cart-mini"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          var _a3, _b2, _c2, _d2;
          if (_push2) {
            _push2(`<i class="icon-cart-empty"${_scopeId}></i> <span class="badge cartReload"${_scopeId}>${ssrInterpolate((_b2 = (_a3 = unref(page)) == null ? void 0 : _a3.props) == null ? void 0 : _b2.cartItem)}</span>`);
          } else {
            return [
              createVNode("i", { class: "icon-cart-empty" }),
              createTextVNode(),
              createVNode("span", { class: "badge cartReload" }, toDisplayString((_d2 = (_c2 = unref(page)) == null ? void 0 : _c2.props) == null ? void 0 : _d2.cartItem), 1)
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li></ul><div class="ps-header__search"><form action=""><div class="ps-search-table"><div class="input-group"><input class="form-control ps-input" type="text" name="q"${ssrRenderAttr("value", unref(form).q)} placeholder="Search for anti-malaria, antibiotics, asthma, cough and cold,  eyes drops, fitness and vitality etc.."><div class="input-group-append"><button type="submit" style="${ssrRenderStyle({ "border": "none", "background": "none" })}"><i class="fa fa-search"></i></button></div></div></div></form></div></div></div></div>`);
      _push(ssrRenderComponent(_sfc_main$6, null, null, _parent));
      _push(`</header>`);
    };
  }
};
const _sfc_setup$5 = _sfc_main$5.setup;
_sfc_main$5.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Header.vue");
  return _sfc_setup$5 ? _sfc_setup$5(props, ctx) : void 0;
};
const _sfc_main$4 = {};
const _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/MobileNav.vue");
  return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
const _sfc_main$3 = {
  __name: "Footer",
  __ssrInlineRender: true,
  setup(__props) {
    const page = usePage();
    return (_ctx, _push, _parent, _attrs) => {
      var _a, _b, _c, _d, _e, _f, _g, _h, _i, _j, _k, _l, _m, _n;
      _push(`<footer${ssrRenderAttrs(mergeProps({
        class: "ps-footer ps-footer--8",
        style: { "background-image": "url('/frontend/footer.png')", "background-repeat": "no-repeat", "background-size": "cover" }
      }, _attrs))}><div class="container"><div class="ps-footer__middle"><div class="row"><div class="col-12 col-md-7"><div class="row"><div class="col-12 col-md-6"><div class="ps-footer--address"><div class="ps-logo">`);
      _push(ssrRenderComponent(unref(Link), { href: "" }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          var _a2, _b2, _c2, _d2, _e2, _f2, _g2, _h2, _i2, _j2, _k2, _l2;
          if (_push2) {
            _push2(`<img${ssrRenderAttr("src", `/images/${(_a2 = unref(page).props.settings) == null ? void 0 : _a2.site_logo}`)} alt=""${_scopeId}><img class="logo-white"${ssrRenderAttr("src", `/images/${(_b2 = unref(page).props.settings) == null ? void 0 : _b2.site_logo}`)} style="${ssrRenderStyle({ "border-radius": "5px" })}" alt=""${_scopeId}><img class="logo-black" src="" style="${ssrRenderStyle({ "border-radius": "5px" })}" alt=""${_scopeId}><img class="logo-white-all"${ssrRenderAttr("src", `/images/${(_d2 = (_c2 = unref(page)) == null ? void 0 : _c2.props.settings) == null ? void 0 : _d2.site_logo}`)} style="${ssrRenderStyle({ "border-radius": "5px" })}" alt=""${_scopeId}><img class="logo-green"${ssrRenderAttr("src", `/images/${(_f2 = (_e2 = unref(page)) == null ? void 0 : _e2.props.settings) == null ? void 0 : _f2.site_logo}`)} style="${ssrRenderStyle({ "border-radius": "5px" })}" alt=""${_scopeId}>`);
          } else {
            return [
              createVNode("img", {
                src: `/images/${(_g2 = unref(page).props.settings) == null ? void 0 : _g2.site_logo}`,
                alt: ""
              }, null, 8, ["src"]),
              createVNode("img", {
                class: "logo-white",
                src: `/images/${(_h2 = unref(page).props.settings) == null ? void 0 : _h2.site_logo}`,
                style: { "border-radius": "5px" },
                alt: ""
              }, null, 8, ["src"]),
              createVNode("img", {
                class: "logo-black",
                src: "",
                style: { "border-radius": "5px" },
                alt: ""
              }),
              createVNode("img", {
                class: "logo-white-all",
                src: `/images/${(_j2 = (_i2 = unref(page)) == null ? void 0 : _i2.props.settings) == null ? void 0 : _j2.site_logo}`,
                style: { "border-radius": "5px" },
                alt: ""
              }, null, 8, ["src"]),
              createVNode("img", {
                class: "logo-green",
                src: `/images/${(_l2 = (_k2 = unref(page)) == null ? void 0 : _k2.props.settings) == null ? void 0 : _l2.site_logo}`,
                style: { "border-radius": "5px" },
                alt: ""
              }, null, 8, ["src"])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div><p>${ssrInterpolate((_a = unref(page).props.settings) == null ? void 0 : _a.title)}</p><p>Follow Us</p><ul class="ps-social"><li>`);
      _push(ssrRenderComponent(unref(Link), {
        class: "ps-social__link facebook",
        href: `${(_c = (_b = unref(page)) == null ? void 0 : _b.props.settings) == null ? void 0 : _c.facebook}`
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<i class="fa fa-facebook"${_scopeId}></i><span class="ps-tooltip"${_scopeId}>Facebook</span>`);
          } else {
            return [
              createVNode("i", { class: "fa fa-facebook" }),
              createVNode("span", { class: "ps-tooltip" }, "Facebook")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li>`);
      _push(ssrRenderComponent(unref(Link), {
        class: "ps-social__link instagram",
        href: `${(_e = (_d = unref(page)) == null ? void 0 : _d.props.settings) == null ? void 0 : _e.instagram}`
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<i class="fa fa-instagram"${_scopeId}></i><span class="ps-tooltip"${_scopeId}>Instagram</span>`);
          } else {
            return [
              createVNode("i", { class: "fa fa-instagram" }),
              createVNode("span", { class: "ps-tooltip" }, "Instagram")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li>`);
      _push(ssrRenderComponent(unref(Link), {
        class: "ps-social__link pinterest",
        href: `${(_g = (_f = unref(page)) == null ? void 0 : _f.props.settings) == null ? void 0 : _g.pinterest}`
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<i class="fa fa-pinterest-p"${_scopeId}></i><span class="ps-tooltip"${_scopeId}>Pinterest</span>`);
          } else {
            return [
              createVNode("i", { class: "fa fa-pinterest-p" }),
              createVNode("span", { class: "ps-tooltip" }, "Pinterest")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li>`);
      _push(ssrRenderComponent(unref(Link), {
        class: "ps-social__link linkedin",
        href: `${(_i = (_h = unref(page)) == null ? void 0 : _h.props.settings) == null ? void 0 : _i.linkedin}`
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<i class="fa fa-linkedin"${_scopeId}></i><span class="ps-tooltip"${_scopeId}>Linkedin</span>`);
          } else {
            return [
              createVNode("i", { class: "fa fa-linkedin" }),
              createVNode("span", { class: "ps-tooltip" }, "Linkedin")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li></ul></div></div><div class="col-12 col-md-6"><div class="ps-footer--contact"><h5 class="ps-footer__title">Need help</h5><div class="ps-footer__work" style="${ssrRenderStyle({ "color": "#fff" })}"><i class="icon-telephone"></i> ${ssrInterpolate((_j = unref(page).props.settings) == null ? void 0 : _j.site_phone)}</div><p class="ps-footer__work" style="${ssrRenderStyle({ "color": "#fff" })}"><i class="icon-envelope-open"></i> ${ssrInterpolate((_k = unref(page).props.settings) == null ? void 0 : _k.site_email)}</p></div></div></div></div><div class="col-12 col-md-5"><div class="row"><div class="col-6 col-md-4"><div class="ps-footer--block"><h5 class="ps-block__title">Account</h5><ul class="ps-block__list"><li>`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/accounts/index",
        rel: "nofollow"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`My account`);
          } else {
            return [
              createTextVNode("My account")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li>`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/account/orders",
        rel: "nofollow"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`My orders`);
          } else {
            return [
              createTextVNode("My orders")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li>`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/account/address",
        rel: "nofollow"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`Address Book`);
          } else {
            return [
              createTextVNode("Address Book")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li>`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/account/order/payments",
        rel: "nofollow"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`Payments`);
          } else {
            return [
              createTextVNode("Payments")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li></ul></div></div><div class="col-6 col-md-4"><div class="ps-footer--block"><h5 class="ps-block__title">Help Links</h5><ul class="ps-block__list"><li>`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/pages/about",
        rel: "nofollow"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`About Us`);
          } else {
            return [
              createTextVNode("About Us")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li>`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/pages/privacypolicy",
        rel: "nofollow"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`Privacy Policy`);
          } else {
            return [
              createTextVNode("Privacy Policy")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li>`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/pages/terms",
        rel: "nofollow"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`Terms &amp; Conditions`);
          } else {
            return [
              createTextVNode("Terms & Conditions")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li>`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/pages/contactus",
        rel: "nofollow"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`Contact Us`);
          } else {
            return [
              createTextVNode("Contact Us")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li>`);
      _push(ssrRenderComponent(unref(Link), { href: "/blogs" }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`Blogs`);
          } else {
            return [
              createTextVNode("Blogs")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li></ul></div></div></div></div></div></div><div class="ps-footer--bottom"><div class="row"><div class="col-12 col-md-5"><p>${ssrInterpolate((_n = (_m = (_l = unref(page)) == null ? void 0 : _l.props) == null ? void 0 : _m.settings) == null ? void 0 : _n.site_copyright)}</p></div><div class="col-12 col-md-7 text-right"><img src="/images/paystack_logo.png" width="50px" alt=""><img class="payment-light" src="/images/paystack.png" width="50px" alt=""><img class="payment-light" src="/images/nafdac.png" width="50px" alt=""><img class="payment-light" src="/images/secure_ssl.png" width="50px" alt=""><img class="payment-light" src="/images/mastercard.png" width="50px" alt=""><img class="payment-light" src="/images/visa.png" width="50px" alt=""><img class="payment-light" src="/images/pcn.png" width="50px" alt=""></div></div></div></div></footer>`);
    };
  }
};
const _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Footer.vue");
  return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
const MobileHeader_vue_vue_type_style_index_0_scope_true_lang = "";
const _sfc_main$2 = {
  __name: "MobileHeader",
  __ssrInlineRender: true,
  setup(__props) {
    var _a;
    const page = usePage();
    const queryParam = new URLSearchParams(((_a = page.url) == null ? void 0 : _a.split("?")[1]) ?? "");
    const isMenuOpen = inject("isMenuOpen", ref(false));
    const form = useForm({
      q: queryParam.get("q") ?? ""
    });
    return (_ctx, _push, _parent, _attrs) => {
      var _a2, _b, _c;
      _push(`<!--[--><header class="ps-header ps-header--8 ps-header--mobile"><div class="ps-noti"><div class="container"><p class="m-0" style="${ssrRenderStyle({ "color": "#fff", "font-weight": "bold" })}"><marquee><span>${((_a2 = unref(page).props.announcment) == null ? void 0 : _a2.content) ?? ""}</span></marquee></p></div></div><div class="ps-header__middle"><div class="container"><div class="ps-logo"><a href="/"><img${ssrRenderAttr("src", `/images/${(_b = unref(page).props.settings) == null ? void 0 : _b.site_logo}`)} style="${ssrRenderStyle({ "width": "160px" })}" alt=""></a></div><div class="ps-header__right"><ul class="ps-header__icons"><a style="${ssrRenderStyle({ "color": "green", "width": "49px" })}" href="/carts/index/"><i class="icon-cart"></i><span class="badge bg-info" style="${ssrRenderStyle({ "color": "#fff" })}">${ssrInterpolate(unref(page).props.cartItem)}</span></a>     <div class="ps-nav__item" style="${ssrRenderStyle({ "display": "inline" })}">`);
      if (!unref(isMenuOpen)) {
        _push(`<button id="open-menus" class="btn-menu"><i class="icon-menu" style="${ssrRenderStyle({ "font-size": "30px" })}"></i></button>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(isMenuOpen)) {
        _push(`<button id="close-menus" class="btn-menu"><i class="icon-cross" style="${ssrRenderStyle({ "font-size": "30px" })}"></i></button>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></ul></div></div></div><div class="ps-search__content ps-search--mobile" style="${ssrRenderStyle({ "padding": "15px" })}"><form action=""><div class="ps-search-table"><div class="input-group"><input class="form-control ps-input" type="text" name="q"${ssrRenderAttr("value", unref(form).q)} placeholder="Search for anti-malaria, antibiotics, asthma, cough and cold,  eyes drops, fitness and vitality etc.."><div class="input-group-append"><button type="submit" style="${ssrRenderStyle({ "border": "none", "background": "none" })}"><i class="fa fa-search"></i></button></div></div></div></form></div></header><div class="${ssrRenderClass([["ps-menu--slidebar", { "active": unref(isMenuOpen) }], "ps-menu--slidebar"])}"><div class="ps-menu__content"><ul class="menu--mobile"><div class="pb-5"><img${ssrRenderAttr("src", `/images/${(_c = unref(page).props.settings) == null ? void 0 : _c.site_logo}`)} style="${ssrRenderStyle({ "width": "160px" })}" alt="sanlive pharmacy"></div><li style="${ssrRenderStyle({ "border-bottom": "1px solid #eee" })}">`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/accounts/index",
        rel: "nofollow"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` Account`);
          } else {
            return [
              createTextVNode(" Account")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li style="${ssrRenderStyle({ "border-bottom": "1px solid #eee" })}">`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/account/orders",
        rel: "nofollow"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` Orders`);
          } else {
            return [
              createTextVNode(" Orders")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li style="${ssrRenderStyle({ "border-bottom": "1px solid #eee" })}">`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/catalogs",
        rel: "nofollow"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`Products`);
          } else {
            return [
              createTextVNode("Products")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li style="${ssrRenderStyle({ "border-bottom": "1px solid #eee" })}">`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/page/services",
        rel: "nofollow"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`Our Services`);
          } else {
            return [
              createTextVNode("Our Services")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li style="${ssrRenderStyle({ "border-bottom": "1px solid #eee" })}">`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/pages/about",
        rel: "nofollow"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`About Us`);
          } else {
            return [
              createTextVNode("About Us")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li style="${ssrRenderStyle({ "border-bottom": "1px solid #eee" })}">`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/pages/contactus",
        rel: "nofollow"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`Contact Us`);
          } else {
            return [
              createTextVNode("Contact Us")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li style="${ssrRenderStyle({ "border-bottom": "1px solid #eee" })}">`);
      _push(ssrRenderComponent(unref(Link), { href: "/blogs" }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`Blog`);
          } else {
            return [
              createTextVNode("Blog")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li style="${ssrRenderStyle({ "border-bottom": "1px solid #eee" })}">`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/pages/privacypolicy",
        rel: "nofollow"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`Privacy Policy`);
          } else {
            return [
              createTextVNode("Privacy Policy")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li style="${ssrRenderStyle({ "border-bottom": "1px solid #eee" })}">`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/pages/terms",
        rel: "nofollow"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`Terms &amp; Conditions`);
          } else {
            return [
              createTextVNode("Terms & Conditions")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li style="${ssrRenderStyle({ "border-bottom": "1px solid #eee" })}">`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/faq",
        rel: "nofollow"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`FAQ`);
          } else {
            return [
              createTextVNode("FAQ")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li class="nav-item"><a class="nav-link pl-3" style="${ssrRenderStyle({ "color": "#fff", "background": "#103178" })}" href="/upload/prescription" rel="nofollow"> UPLOAD PRESCRIPTION</a></li></ul></div><div class="ps-menu__footer"><div class="ps-menu__item"><ul class="ps-language-currency"><li class="menu-item-has-children"><a href="#">English</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span></li><li class="menu-item-has-children"><a href="#">NGN</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span></li></ul></div><div class="ps-menu__item"><div class="ps-menu__contact">Need help? <strong></strong></div></div></div></div><!--]-->`);
    };
  }
};
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/MobileHeader.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const _sfc_main$1 = {
  __name: "MobileSidebar",
  __ssrInlineRender: true,
  setup(__props) {
    const page = usePage();
    const isMenuOpen = inject("isMenuOpen", ref(false));
    return (_ctx, _push, _parent, _attrs) => {
      var _a;
      _push(`<div${ssrRenderAttrs(mergeProps({
        class: ["ps-menu--slidebar", ["ps-menu--slidebar", { "active": unref(isMenuOpen) }]]
      }, _attrs))}><div class="ps-menu__content"><ul class="menu--mobile"><div class="pb-5"><img${ssrRenderAttr("src", `/images/${(_a = unref(page).props.settings) == null ? void 0 : _a.site_logo}`)} style="${ssrRenderStyle({ "width": "160px" })}" alt="sanlive pharmacy"></div><li style="${ssrRenderStyle({ "border-bottom": "1px solid #eee" })}">`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/accounts/index",
        rel: "nofollow"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` Account`);
          } else {
            return [
              createTextVNode(" Account")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li style="${ssrRenderStyle({ "border-bottom": "1px solid #eee" })}">`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/account/orders",
        rel: "nofollow"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` Orders`);
          } else {
            return [
              createTextVNode(" Orders")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li style="${ssrRenderStyle({ "border-bottom": "1px solid #eee" })}">`);
      _push(ssrRenderComponent(unref(Link), { href: "/catalogs" }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`Products`);
          } else {
            return [
              createTextVNode("Products")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li style="${ssrRenderStyle({ "border-bottom": "1px solid #eee" })}">`);
      _push(ssrRenderComponent(unref(Link), { href: "/page/services" }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`Our Services`);
          } else {
            return [
              createTextVNode("Our Services")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li style="${ssrRenderStyle({ "border-bottom": "1px solid #eee" })}">`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/pages/about",
        rel: "nofollow"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`About Us`);
          } else {
            return [
              createTextVNode("About Us")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li style="${ssrRenderStyle({ "border-bottom": "1px solid #eee" })}">`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/pages/contactus",
        rel: "nofollow"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`Contact Us`);
          } else {
            return [
              createTextVNode("Contact Us")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li style="${ssrRenderStyle({ "border-bottom": "1px solid #eee" })}">`);
      _push(ssrRenderComponent(unref(Link), { href: "/blogs" }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`Blog`);
          } else {
            return [
              createTextVNode("Blog")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li style="${ssrRenderStyle({ "border-bottom": "1px solid #eee" })}">`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/pages/privacypolicy",
        rel: "nofollow"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`Privacy Policy`);
          } else {
            return [
              createTextVNode("Privacy Policy")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li style="${ssrRenderStyle({ "border-bottom": "1px solid #eee" })}">`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/pages/terms",
        rel: "nofollow"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`Terms &amp; Conditions`);
          } else {
            return [
              createTextVNode("Terms & Conditions")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li style="${ssrRenderStyle({ "border-bottom": "1px solid #eee" })}">`);
      _push(ssrRenderComponent(unref(Link), {
        href: "/faq",
        rel: "nofollow"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`FAQ`);
          } else {
            return [
              createTextVNode("FAQ")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</li><li class="nav-item"><a class="nav-link pl-3" style="${ssrRenderStyle({ "color": "#fff", "background": "#103178" })}" href="/upload/prescription" rel="nofollow"> UPLOAD PRESCRIPTION</a></li></ul></div><div class="ps-menu__footer"><div class="ps-menu__item"><ul class="ps-language-currency"><li class="menu-item-has-children"><a href="#">English</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span></li><li class="menu-item-has-children"><a href="#">NGN</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span></li></ul></div><div class="ps-menu__item"><div class="ps-menu__contact">Need help? <strong></strong></div></div></div></div>`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/MobileSidebar.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const _sfc_main = {
  __name: "AppTemplate",
  __ssrInlineRender: true,
  setup(__props) {
    const isMenuOpen = ref(false);
    provide("isMenuOpen", isMenuOpen);
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(_sfc_main$5, null, null, _parent));
      _push(ssrRenderComponent(_sfc_main$2, null, null, _parent));
      ssrRenderSlot(_ctx.$slots, "content", {}, null, _push, _parent);
      _push(ssrRenderComponent(_sfc_main$3, null, null, _parent));
      _push(ssrRenderComponent(_sfc_main$1, null, null, _parent));
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/AppTemplate.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const AppTemplate = _sfc_main;
export {
  AppTemplate as A
};
