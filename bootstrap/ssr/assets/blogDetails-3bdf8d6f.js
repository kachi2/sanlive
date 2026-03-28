import { withCtx, unref, createVNode, createTextVNode, toDisplayString, openBlock, createBlock, Fragment, renderList, createCommentVNode, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderAttr, ssrRenderStyle, ssrInterpolate, ssrRenderList } from "vue/server-renderer";
import { A as AppTemplate } from "./AppTemplate-2d192a23.js";
import { H as HeadTags } from "./headTags-218fe00b.js";
import { Link } from "@inertiajs/vue3";
import "./pwa-0a2b72e5.js";
import "./_plugin-vue_export-helper-cc2b3d55.js";
const _sfc_main = {
  __name: "blogDetails",
  __ssrInlineRender: true,
  props: {
    blog: Object,
    blogs: Object,
    pageMeta: Object
  },
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(HeadTags, { pageMeta: __props.pageMeta }, null, _parent));
      _push(ssrRenderComponent(AppTemplate, null, {
        content: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="ps-post ps-post--sidebar"${_scopeId}><div class="container"${_scopeId}><ul class="ps-breadcrumb"${_scopeId}><li class="ps-breadcrumb__item"${_scopeId}><a href=""${_scopeId}>Home</a></li><li class="ps-breadcrumb__item active" aria-current="page"${_scopeId}>Blog</li></ul><div class="ps-post__content"${_scopeId}><div class="row"${_scopeId}><div class="col-12 col-md-9"${_scopeId}><div class="ps-blog__banner"${_scopeId}><img${ssrRenderAttr("src", `/images/blog/'${__props.blog.image}}`)}${ssrRenderAttr("alt", __props.blog.title)} style="${ssrRenderStyle({ "width": "400px" })}"${_scopeId}></div><h1 class="ps-post__title"${_scopeId}>${ssrInterpolate(__props.blog.title)}</h1><p class="ps-blog__text"${_scopeId}>${__props.blog.content ?? ""}</p></div><div class="col-12 col-md-3"${_scopeId}><div class="ps-widget ps-widget--blog"${_scopeId}><div class="ps-widget__block"${_scopeId}><h4 class="ps-widget__title"${_scopeId}>Latest Blogs</h4><a class="ps-block-control" href="#"${_scopeId}><i class="fa fa-angle-down"${_scopeId}></i></a><div class="ps-widget__content"${_scopeId}><div class="ps-widget__product"${_scopeId}>`);
            if (__props.blogs.data.length > 0) {
              _push2(`<!--[-->`);
              ssrRenderList(__props.blogs.data, (item) => {
                _push2(`<div class="ps-product ps-product--standard"${_scopeId}><div class="ps-product__thumbnail"${_scopeId}>`);
                _push2(ssrRenderComponent(unref(Link), {
                  class: "ps-product__image",
                  href: `/blogs/details/${item.hashid}`
                }, {
                  default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      _push3(`<figure${_scopeId2}><img${ssrRenderAttr("src", `/images/blog/${item.image}`)}${ssrRenderAttr("alt", item.title)}${_scopeId2}><img${ssrRenderAttr("src", `/images/blog/'${item.image}`)}${ssrRenderAttr("alt", item.title)}${_scopeId2}></figure>`);
                    } else {
                      return [
                        createVNode("figure", null, [
                          createVNode("img", {
                            src: `/images/blog/${item.image}`,
                            alt: item.title
                          }, null, 8, ["src", "alt"]),
                          createVNode("img", {
                            src: `/images/blog/'${item.image}`,
                            alt: item.title
                          }, null, 8, ["src", "alt"])
                        ])
                      ];
                    }
                  }),
                  _: 2
                }, _parent2, _scopeId));
                _push2(`</div><div class="ps-product__content"${_scopeId}><h5 class="ps-product__title"${_scopeId}>`);
                _push2(ssrRenderComponent(unref(Link), {
                  href: `/blogs/details/${item.hashid}`
                }, {
                  default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      _push3(`${ssrInterpolate(item.title)}`);
                    } else {
                      return [
                        createTextVNode(toDisplayString(item.title), 1)
                      ];
                    }
                  }),
                  _: 2
                }, _parent2, _scopeId));
                _push2(`</h5></div></div>`);
              });
              _push2(`<!--]-->`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div></div></div></div></div></div></div></div></div>`);
          } else {
            return [
              createVNode("div", { class: "ps-post ps-post--sidebar" }, [
                createVNode("div", { class: "container" }, [
                  createVNode("ul", { class: "ps-breadcrumb" }, [
                    createVNode("li", { class: "ps-breadcrumb__item" }, [
                      createVNode("a", { href: "" }, "Home")
                    ]),
                    createVNode("li", {
                      class: "ps-breadcrumb__item active",
                      "aria-current": "page"
                    }, "Blog")
                  ]),
                  createVNode("div", { class: "ps-post__content" }, [
                    createVNode("div", { class: "row" }, [
                      createVNode("div", { class: "col-12 col-md-9" }, [
                        createVNode("div", { class: "ps-blog__banner" }, [
                          createVNode("img", {
                            src: `/images/blog/'${__props.blog.image}}`,
                            alt: __props.blog.title,
                            style: { "width": "400px" }
                          }, null, 8, ["src", "alt"])
                        ]),
                        createVNode("h1", { class: "ps-post__title" }, toDisplayString(__props.blog.title), 1),
                        createVNode("p", {
                          class: "ps-blog__text",
                          innerHTML: __props.blog.content
                        }, null, 8, ["innerHTML"])
                      ]),
                      createVNode("div", { class: "col-12 col-md-3" }, [
                        createVNode("div", { class: "ps-widget ps-widget--blog" }, [
                          createVNode("div", { class: "ps-widget__block" }, [
                            createVNode("h4", { class: "ps-widget__title" }, "Latest Blogs"),
                            createVNode("a", {
                              class: "ps-block-control",
                              href: "#"
                            }, [
                              createVNode("i", { class: "fa fa-angle-down" })
                            ]),
                            createVNode("div", { class: "ps-widget__content" }, [
                              createVNode("div", { class: "ps-widget__product" }, [
                                __props.blogs.data.length > 0 ? (openBlock(true), createBlock(Fragment, { key: 0 }, renderList(__props.blogs.data, (item) => {
                                  return openBlock(), createBlock("div", { class: "ps-product ps-product--standard" }, [
                                    createVNode("div", { class: "ps-product__thumbnail" }, [
                                      createVNode(unref(Link), {
                                        class: "ps-product__image",
                                        href: `/blogs/details/${item.hashid}`
                                      }, {
                                        default: withCtx(() => [
                                          createVNode("figure", null, [
                                            createVNode("img", {
                                              src: `/images/blog/${item.image}`,
                                              alt: item.title
                                            }, null, 8, ["src", "alt"]),
                                            createVNode("img", {
                                              src: `/images/blog/'${item.image}`,
                                              alt: item.title
                                            }, null, 8, ["src", "alt"])
                                          ])
                                        ]),
                                        _: 2
                                      }, 1032, ["href"])
                                    ]),
                                    createVNode("div", { class: "ps-product__content" }, [
                                      createVNode("h5", { class: "ps-product__title" }, [
                                        createVNode(unref(Link), {
                                          href: `/blogs/details/${item.hashid}`
                                        }, {
                                          default: withCtx(() => [
                                            createTextVNode(toDisplayString(item.title), 1)
                                          ]),
                                          _: 2
                                        }, 1032, ["href"])
                                      ])
                                    ])
                                  ]);
                                }), 256)) : createCommentVNode("", true)
                              ])
                            ])
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
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Users/Pages/blogDetails.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
