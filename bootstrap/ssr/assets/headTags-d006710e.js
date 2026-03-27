import { unref, withCtx, createVNode, toDisplayString, useSSRContext } from "vue";
import { ssrRenderComponent, ssrInterpolate, ssrRenderAttr } from "vue/server-renderer";
import Pwa from "./pwa-521173f5.js";
import { Head } from "@inertiajs/vue3";
const _sfc_main = {
  __name: "headTags",
  __ssrInlineRender: true,
  props: {
    pageMeta: Object
  },
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(unref(Head), null, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<title${_scopeId}> ${ssrInterpolate(__props.pageMeta.title)}</title><meta property="title"${ssrRenderAttr("content", __props.pageMeta.metaTitle)}${_scopeId}><meta name="description"${ssrRenderAttr("content", __props.pageMeta.description ?? "Get all your medications delivered to your doorstep from your number one online pharmacy store in Lagos Nigeria- Sanlive Pharmacy and Stores. Fast delivery and affordable medication")}${_scopeId}><meta name="keywords"${ssrRenderAttr("content", __props.pageMeta.keywords)}${_scopeId}><meta property="og:title"${ssrRenderAttr("content", __props.pageMeta.metaTitle ?? "Sanlive Pharmacy: The largest and biggest online pharmacy marketplace that you can trus")}${_scopeId}><meta property="og:description"${ssrRenderAttr("content", __props.pageMeta.description ?? "Get all your medications delivered to your doorstep from your number one online pharmacy store in Lagos Nigeria- Sanlive Pharmacy and Stores. Fast delivery and affordable medication")}${_scopeId}><meta property="og:image"${ssrRenderAttr("content", __props.pageMeta.image_url)}${_scopeId}><meta property="og:url"${ssrRenderAttr("content", __props.pageMeta.url)}${_scopeId}><link rel="canonical"${ssrRenderAttr("href", __props.pageMeta.url)}${_scopeId}><meta name="twitter:card" content="summary_large_image"${_scopeId}><meta name="twitter:title"${ssrRenderAttr("content", __props.pageMeta.metaTitle ?? "Sanlive Pharmacy: The largest and biggest online pharmacy marketplace that you can trust")}${_scopeId}><meta name="twitter:description"${ssrRenderAttr("content", __props.pageMeta.description ?? "Get all your medications delivered to your doorstep from your number one online pharmacy store in Lagos Nigeria- Sanlive Pharmacy and Stores. Fast delivery and affordable medication")}${_scopeId}><meta name="twitter:image"${ssrRenderAttr("content", __props.pageMeta.image_url)}${_scopeId}><meta name="robots"${ssrRenderAttr("content", __props.pageMeta.robots || "index, follow")}${_scopeId}><meta name="mobile-web-app-capable" content="yes"${_scopeId}>`);
          } else {
            return [
              createVNode("title", null, " " + toDisplayString(__props.pageMeta.title), 1),
              createVNode("meta", {
                property: "title",
                content: __props.pageMeta.metaTitle
              }, null, 8, ["content"]),
              createVNode("meta", {
                name: "description",
                content: __props.pageMeta.description ?? "Get all your medications delivered to your doorstep from your number one online pharmacy store in Lagos Nigeria- Sanlive Pharmacy and Stores. Fast delivery and affordable medication"
              }, null, 8, ["content"]),
              createVNode("meta", {
                name: "keywords",
                content: __props.pageMeta.keywords
              }, null, 8, ["content"]),
              createVNode("meta", {
                property: "og:title",
                content: __props.pageMeta.metaTitle ?? "Sanlive Pharmacy: The largest and biggest online pharmacy marketplace that you can trus"
              }, null, 8, ["content"]),
              createVNode("meta", {
                property: "og:description",
                content: __props.pageMeta.description ?? "Get all your medications delivered to your doorstep from your number one online pharmacy store in Lagos Nigeria- Sanlive Pharmacy and Stores. Fast delivery and affordable medication"
              }, null, 8, ["content"]),
              createVNode("meta", {
                property: "og:image",
                content: __props.pageMeta.image_url
              }, null, 8, ["content"]),
              createVNode("meta", {
                property: "og:url",
                content: __props.pageMeta.url
              }, null, 8, ["content"]),
              createVNode("link", {
                rel: "canonical",
                href: __props.pageMeta.url
              }, null, 8, ["href"]),
              createVNode("meta", {
                name: "twitter:card",
                content: "summary_large_image"
              }),
              createVNode("meta", {
                name: "twitter:title",
                content: __props.pageMeta.metaTitle ?? "Sanlive Pharmacy: The largest and biggest online pharmacy marketplace that you can trust"
              }, null, 8, ["content"]),
              createVNode("meta", {
                name: "twitter:description",
                content: __props.pageMeta.description ?? "Get all your medications delivered to your doorstep from your number one online pharmacy store in Lagos Nigeria- Sanlive Pharmacy and Stores. Fast delivery and affordable medication"
              }, null, 8, ["content"]),
              createVNode("meta", {
                name: "twitter:image",
                content: __props.pageMeta.image_url
              }, null, 8, ["content"]),
              createVNode("meta", {
                name: "robots",
                content: __props.pageMeta.robots || "index, follow"
              }, null, 8, ["content"]),
              createVNode("meta", {
                name: "mobile-web-app-capable",
                content: "yes"
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(Pwa, null, null, _parent));
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/headTags.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const HeadTags = _sfc_main;
export {
  HeadTags as H
};
