import { defineComponent, withCtx, unref, createVNode, createTextVNode, toDisplayString, openBlock, createBlock, Fragment, renderList, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderList, ssrRenderAttr, ssrInterpolate } from "vue/server-renderer";
import { A as AppTemplate } from "./AppTemplate-2d192a23.js";
import { H as HeadTags } from "./headTags-218fe00b.js";
import { Link } from "@inertiajs/vue3";
import "./pwa-0a2b72e5.js";
import "./_plugin-vue_export-helper-cc2b3d55.js";
const _sfc_main = /* @__PURE__ */ defineComponent({
  __name: "blogs",
  __ssrInlineRender: true,
  props: {
    blogs: Object,
    pageMeta: Object
  },
  setup(__props) {
    const props = __props;
    console.log(props.blogs, "asasasas");
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(HeadTags, { pageMeta: __props.pageMeta }, null, _parent));
      _push(ssrRenderComponent(AppTemplate, null, {
        content: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="ps-blog ps-blog--masonry"${_scopeId}><div class="container"${_scopeId}><ul class="ps-breadcrumb"${_scopeId}><li class="ps-breadcrumb__item"${_scopeId}><a href=""${_scopeId}>Home</a></li><li class="ps-breadcrumb__item active" aria-current="page"${_scopeId}>Blogs </li></ul><div class="ps-blog__content"${_scopeId}><div class="row"${_scopeId}>`);
            if (__props.blogs.data.length > 0) {
              _push2(`<!--[-->`);
              ssrRenderList(__props.blogs.data, (blog) => {
                _push2(`<div class="col-12 col-md-6 col-lg-4"${_scopeId}><div class="ps-blog--latset"${_scopeId}><div class="ps-blog__thumbnail"${_scopeId}>`);
                _push2(ssrRenderComponent(unref(Link), {
                  href: `/blogs/details/${blog.hashid}`
                }, {
                  default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      _push3(`<img${ssrRenderAttr("src", `/images/blog/${blog.image}`)}${ssrRenderAttr("alt", blog.title)}${_scopeId2}>`);
                    } else {
                      return [
                        createVNode("img", {
                          src: `/images/blog/${blog.image}`,
                          alt: blog.title
                        }, null, 8, ["src", "alt"])
                      ];
                    }
                  }),
                  _: 2
                }, _parent2, _scopeId));
                _push2(`</div><div class="ps-blog__content"${_scopeId}><div class="ps-blog__meta"${_scopeId}></div>`);
                _push2(ssrRenderComponent(unref(Link), {
                  class: "ps-blog__title",
                  href: `/blogs/details/${blog.hashid}`
                }, {
                  default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      _push3(`${ssrInterpolate(blog.title)}`);
                    } else {
                      return [
                        createTextVNode(toDisplayString(blog.title), 1)
                      ];
                    }
                  }),
                  _: 2
                }, _parent2, _scopeId));
                _push2(`</div></div></div>`);
              });
              _push2(`<!--]-->`);
            } else {
              _push2(`<div class="col-12 col-md-6 col-lg-4"${_scopeId}><div class="ps-blog--latset"${_scopeId}><div class="ps-blog__content"${_scopeId}><p class="ps-blog__desc"${_scopeId}>No data found</p></div></div></div>`);
            }
            _push2(`</div><div${_scopeId}></div></div></div></div>`);
          } else {
            return [
              createVNode("div", { class: "ps-blog ps-blog--masonry" }, [
                createVNode("div", { class: "container" }, [
                  createVNode("ul", { class: "ps-breadcrumb" }, [
                    createVNode("li", { class: "ps-breadcrumb__item" }, [
                      createVNode("a", { href: "" }, "Home")
                    ]),
                    createVNode("li", {
                      class: "ps-breadcrumb__item active",
                      "aria-current": "page"
                    }, "Blogs ")
                  ]),
                  createVNode("div", { class: "ps-blog__content" }, [
                    createVNode("div", { class: "row" }, [
                      __props.blogs.data.length > 0 ? (openBlock(true), createBlock(Fragment, { key: 0 }, renderList(__props.blogs.data, (blog) => {
                        return openBlock(), createBlock("div", { class: "col-12 col-md-6 col-lg-4" }, [
                          createVNode("div", { class: "ps-blog--latset" }, [
                            createVNode("div", { class: "ps-blog__thumbnail" }, [
                              createVNode(unref(Link), {
                                href: `/blogs/details/${blog.hashid}`
                              }, {
                                default: withCtx(() => [
                                  createVNode("img", {
                                    src: `/images/blog/${blog.image}`,
                                    alt: blog.title
                                  }, null, 8, ["src", "alt"])
                                ]),
                                _: 2
                              }, 1032, ["href"])
                            ]),
                            createVNode("div", { class: "ps-blog__content" }, [
                              createVNode("div", { class: "ps-blog__meta" }),
                              createVNode(unref(Link), {
                                class: "ps-blog__title",
                                href: `/blogs/details/${blog.hashid}`
                              }, {
                                default: withCtx(() => [
                                  createTextVNode(toDisplayString(blog.title), 1)
                                ]),
                                _: 2
                              }, 1032, ["href"])
                            ])
                          ])
                        ]);
                      }), 256)) : (openBlock(), createBlock("div", {
                        key: 1,
                        class: "col-12 col-md-6 col-lg-4"
                      }, [
                        createVNode("div", { class: "ps-blog--latset" }, [
                          createVNode("div", { class: "ps-blog__content" }, [
                            createVNode("p", { class: "ps-blog__desc" }, "No data found")
                          ])
                        ])
                      ]))
                    ]),
                    createVNode("div")
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Users/Pages/blogs.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
