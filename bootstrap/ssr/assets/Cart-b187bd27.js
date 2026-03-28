import { onMounted, reactive, ref, withCtx, unref, createTextVNode, createVNode, toDisplayString, openBlock, createBlock, Fragment, renderList, withModifiers, createCommentVNode, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderStyle, ssrRenderList, ssrRenderAttr, ssrInterpolate } from "vue/server-renderer";
import { A as AppTemplate } from "./AppTemplate-2d192a23.js";
import { Link, router } from "@inertiajs/vue3";
import { _ as _sfc_main$1 } from "./CartAlert-03b2306f.js";
import { u as useFunctions } from "./useFunctions-b8a0fd2e.js";
import { H as HeadTags } from "./headTags-218fe00b.js";
import "./pwa-0a2b72e5.js";
import "./_plugin-vue_export-helper-cc2b3d55.js";
const _sfc_main = {
  __name: "Cart",
  __ssrInlineRender: true,
  props: {
    carts: Object,
    latest: Object,
    cartSession: String,
    total: Number,
    message: String,
    pageMeta: Object
  },
  setup(__props) {
    onMounted(() => {
      $(".owl-carousel").owlCarousel({
        responsive: {
          0: {
            items: 2
          },
          600: {
            items: 3
          },
          1e3: {
            items: 4
          }
        }
      });
    });
    function updateAction(param) {
      if (param == "+")
        cartForm.action = "+";
      if (param == "-")
        cartForm.action = "-";
    }
    const cartForm = reactive({
      qty: 0,
      cartId: 0,
      action: ""
    });
    const isLoading = ref(false);
    function updateCart(cartsData) {
      cartForm.qty = cartsData.quantity;
      cartForm.cartId = cartsData.id;
      isLoading.value = true;
      router.post("/updatecart", cartForm, {
        onSuccess: (page) => {
          if (page.props.flash.success) {
            toastr.success(page.props.flash.success);
            sleep(2);
            isLoading.value = false;
          } else {
            toastr.error(page.props.flash.error);
          }
          toastr.options.preventDuplicates = true;
          toastr.options.progressBar = true;
        }
      });
    }
    function deleteCart(CartData) {
      router.get("/delete/" + CartData.id, {
        onSuccess: (page) => {
          toastr.error(page.props.flash.error);
        }
      });
    }
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(HeadTags, { pageMeta: __props.pageMeta }, null, _parent));
      _push(ssrRenderComponent(AppTemplate, null, {
        content: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="ps-shopping" style="${ssrRenderStyle({ "background": "#fff" })}"${_scopeId}><div class="container"${_scopeId}><div class="ps-shopping__content"${_scopeId}><div class="row"${_scopeId}><div class="col-12 col-md-7 col-lg-9 mt-5" style="${ssrRenderStyle({ "background": "#fff" })}"${_scopeId}><h1 class="m-4" style="${ssrRenderStyle({ "font-size": "12px" })}"${_scopeId}></h1>`);
            if (Object.entries(__props.carts).length > 0) {
              _push2(`<div class="ps-categogy--list"${_scopeId}><!--[-->`);
              ssrRenderList(__props.carts, (cart) => {
                var _a, _b, _c, _d, _e, _f;
                _push2(`<div${_scopeId}><form id="cartUpdate"${_scopeId}><div class="ps-product ps-product--list" style="${ssrRenderStyle({ "border": "2px solid #d1d5dad4", "border-radius": "10px" })}"${_scopeId}><div class="ps-product__content" style="${ssrRenderStyle({ "border-right": "0px" })}"${_scopeId}><div class="ps-product__thumbnail"${_scopeId}><a class="ps-product__image" href=""${_scopeId}><figure${_scopeId}><img${ssrRenderAttr("src", `/images/products/${(_a = cart.associatedModel) == null ? void 0 : _a.image_path}`)} alt=""${_scopeId}></figure></a></div><div class="ps-product__info"${_scopeId}><a class="ps-product__branch" href="#"${_scopeId}>${ssrInterpolate((_c = (_b = cart == null ? void 0 : cart.associatedModel) == null ? void 0 : _b.category) == null ? void 0 : _c.name)}</a><h3 class="ps-product__tite" style="${ssrRenderStyle({ "font-size": "16px", "color": "#262525" })}"${_scopeId}><a${_scopeId}>${ssrInterpolate(cart.name)}</a></h3><div class="ps-product__meta"${_scopeId}><span class="ps-product__price" style="${ssrRenderStyle({ "font-size": "15px" })}"${_scopeId}></span> ${ssrInterpolate(unref(useFunctions).addSeperator((_d = cart == null ? void 0 : cart.associatedModel) == null ? void 0 : _d.sale_price))} <span class="ps-product__del" style="${ssrRenderStyle({ "font-size": "15px" })}"${_scopeId}>${ssrInterpolate(unref(useFunctions).addSeperator((_e = cart == null ? void 0 : cart.associatedModel) == null ? void 0 : _e.price))}</span></div><ul class="ps-product__list"${_scopeId}><li${_scopeId}><span class="ps-list__title"${_scopeId}>SKU: </span><a class="ps-list__text" href="#"${_scopeId}>${ssrInterpolate((_f = cart == null ? void 0 : cart.associatedModel) == null ? void 0 : _f.sku)}</a></li></ul><button type="submit" value="decrement" class="ps-btn--success decrement-btn" style="${ssrRenderStyle({ "width": "30px", "border-radius": "3px", "height": "30px" })}"${_scopeId}> - </button><input type="text"${ssrRenderAttr("value", cart.quantity)} class="qty" style="${ssrRenderStyle({ "border": "1px solid #8c8a8a53", "height": "30px", "width": "30px", "text-align": "center" })}"${_scopeId}><input type="hidden"${ssrRenderAttr("value", cartForm.cartId)}${_scopeId}><button type="submit" value="increment" class="ps-btn--success increment-btn" style="${ssrRenderStyle({ "width": "30px", "border-radius": "3px", "height": "30px" })}"${_scopeId}> + </button><span style="${ssrRenderStyle({ "padding-left": "10px" })}"${_scopeId}>`);
                _push2(ssrRenderComponent(unref(Link), {
                  href: "",
                  onClick: ($event) => deleteCart(cart),
                  class: "btn btn-danger"
                }, {
                  default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      _push3(` Remove`);
                    } else {
                      return [
                        createTextVNode(" Remove")
                      ];
                    }
                  }),
                  _: 2
                }, _parent2, _scopeId));
                _push2(`</span></div></div></div></form></div>`);
              });
              _push2(`<!--]--></div>`);
            } else {
              _push2(`<div class="ps-product ps-product--li"${_scopeId}><div class="ps-prod" style="${ssrRenderStyle({ "border-right": "0px" })}"${_scopeId}><p style="${ssrRenderStyle({ "text-align": "center" })}"${_scopeId}><i style="${ssrRenderStyle({ "font-size": "50px", "padding-right": "2px", "font-weight": "800" })}" class="icon-cart-empty"${_scopeId}></i><br${_scopeId}> Your cart is empty. You have not added any item to your cart.</p></div></div>`);
            }
            _push2(`</div>`);
            if (Object.entries(__props.carts).length > 0) {
              _push2(`<div class="col-12 col-md-5 col-lg-3"${_scopeId}><div class="ps-shopping__box mt-5" style="${ssrRenderStyle({ "background": "#fff" })}"${_scopeId}><div class="ps-shopping__row"${_scopeId}><div class="ps-shopping__label"${_scopeId}>Cart Summary</div></div><div class="ps-shopping__form"${_scopeId}><div class="ps-shopping__group"${_scopeId}><input class="form-control ps-input" type="text" placeholder="County"${_scopeId}></div><div class="ps-shopping__group"${_scopeId}><input class="form-control ps-input" type="text" placeholder="Town / City"${_scopeId}></div><div class="ps-shopping__group"${_scopeId}><input class="form-control ps-input" type="text" placeholder="Postcode"${_scopeId}></div></div><div class="ps-shopping__row"${_scopeId}><div class="ps-shopping__label"${_scopeId}>Total</div><div class="ps-shopping__price"${_scopeId}>${ssrInterpolate(unref(useFunctions).addSeperator(__props.total))}</div></div><div class="ps-shopping__text"${_scopeId}>Shipping options will be updated during checkout.</div><div class="ps-shopping__checkout"${_scopeId}>`);
              _push2(ssrRenderComponent(unref(Link), {
                class: "ps-btn ps-btn--primary",
                style: { "border-radius": "5px" },
                href: `/checkout/${__props.cartSession}`
              }, {
                default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`Proceed to checkout`);
                  } else {
                    return [
                      createTextVNode("Proceed to checkout")
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(unref(Link), {
                class: "ps-shopping__link",
                href: "/catalogs"
              }, {
                default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`Continue Shopping`);
                  } else {
                    return [
                      createTextVNode("Continue Shopping")
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(`</div></div></div>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div></div></div></div><div style="${ssrRenderStyle({ "height": "2em", "background": "#eee" })}"${_scopeId}></div><section class="ps-section--latest" style="${ssrRenderStyle({ "margin-top": "5px" })}"${_scopeId}><div class="container" style="${ssrRenderStyle({ "background": "#f4f3f33f", "padding": "10px", "border": "5px solid #ede8e836" })}"${_scopeId}><div class="ps-noti p-2" style="${ssrRenderStyle({ "border-radius": "5px" })}"${_scopeId}><p class="ml-2" style="${ssrRenderStyle({ "color": "#fff", "font-weight": "bold", "text-align": "left" })}"${_scopeId}> Related Products </p></div><div class="ps-section__carousel"${_scopeId}><div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on"${_scopeId}><!--[-->`);
            ssrRenderList(__props.latest, (products) => {
              _push2(`<div${_scopeId}><div class="ps-section__product shadow-sm"${_scopeId}><div class="ps-product ps-product--standard cart-card border-gray-800" style="${ssrRenderStyle({ "background-color": "#fff" })}"${_scopeId}><div class="ps-product__thumbnail"${_scopeId}>`);
              _push2(ssrRenderComponent(unref(Link), {
                class: "ps-product__image",
                href: `/products/${products == null ? void 0 : products.slug}`,
                style: { "min-height": "250px" }
              }, {
                default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<figure${_scopeId2}><img${ssrRenderAttr("src", `/images/products/${products == null ? void 0 : products.image_path}`)} alt="" style="${ssrRenderStyle({ "max-height": "200px" })}"${_scopeId2}><img${ssrRenderAttr("src", `/images/products/${products == null ? void 0 : products.image_path}`)}${ssrRenderAttr("alt", products == null ? void 0 : products.name)}${_scopeId2}></figure>`);
                  } else {
                    return [
                      createVNode("figure", null, [
                        createVNode("img", {
                          src: `/images/products/${products == null ? void 0 : products.image_path}`,
                          alt: "",
                          style: { "max-height": "200px" }
                        }, null, 8, ["src"]),
                        createVNode("img", {
                          src: `/images/products/${products == null ? void 0 : products.image_path}`,
                          alt: products == null ? void 0 : products.name
                        }, null, 8, ["src", "alt"])
                      ])
                    ];
                  }
                }),
                _: 2
              }, _parent2, _scopeId));
              _push2(`</div><div class="ps-product__content"${_scopeId}><h5 class=""${_scopeId}>`);
              _push2(ssrRenderComponent(unref(Link), {
                href: `/products/${products == null ? void 0 : products.slug}`
              }, {
                default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`${ssrInterpolate(products == null ? void 0 : products.name)}`);
                  } else {
                    return [
                      createTextVNode(toDisplayString(products == null ? void 0 : products.name), 1)
                    ];
                  }
                }),
                _: 2
              }, _parent2, _scopeId));
              _push2(`</h5><div class="ps-product__meta"${_scopeId}><span class="ps-product__price sale"${_scopeId}>${ssrInterpolate(unref(useFunctions).addSeperator(products == null ? void 0 : products.sale_price))}</span><span class="ps-product__del"${_scopeId}>${ssrInterpolate(unref(useFunctions).addSeperator(products == null ? void 0 : products.price))}</span></div><span class="download-note"${_scopeId}><span${_scopeId}>`);
              _push2(ssrRenderComponent(unref(Link), {
                class: "btn btn-lg",
                href: `/products/${products.slug}`,
                style: { "background": "#fff", "color": "#73c2fb", "border": "1px solid #73c2fb", "display": "inline" }
              }, {
                default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<i class="fa fa-plus"${_scopeId2}></i> Add to basket`);
                  } else {
                    return [
                      createVNode("i", { class: "fa fa-plus" }),
                      createTextVNode(" Add to basket")
                    ];
                  }
                }),
                _: 2
              }, _parent2, _scopeId));
              _push2(`<a target="_blank" rel="noopener noreferrer"${ssrRenderAttr("href", `https://wa.me/+2348058885913?text=Please i need  to order this product ${products.name} the price is: ${unref(useFunctions).addSeperator(products.sale_price)} `)}${_scopeId}><img src="/frontend/whatsapp.png" style="${ssrRenderStyle({ "width": "80px", "float": "right", "padding": "0px" })}"${_scopeId}></a></span></span></div></div></div></div>`);
            });
            _push2(`<!--]--></div></div></div></section>`);
          } else {
            return [
              createVNode("div", {
                class: "ps-shopping",
                style: { "background": "#fff" }
              }, [
                createVNode("div", { class: "container" }, [
                  createVNode("div", { class: "ps-shopping__content" }, [
                    createVNode("div", { class: "row" }, [
                      createVNode("div", {
                        class: "col-12 col-md-7 col-lg-9 mt-5",
                        style: { "background": "#fff" }
                      }, [
                        createVNode("h1", {
                          class: "m-4",
                          style: { "font-size": "12px" }
                        }),
                        Object.entries(__props.carts).length > 0 ? (openBlock(), createBlock("div", {
                          key: 0,
                          class: "ps-categogy--list"
                        }, [
                          (openBlock(true), createBlock(Fragment, null, renderList(__props.carts, (cart) => {
                            var _a, _b, _c, _d, _e, _f;
                            return openBlock(), createBlock("div", {
                              key: cart.id
                            }, [
                              createVNode("form", {
                                id: "cartUpdate",
                                onSubmit: withModifiers(($event) => updateCart(cart), ["prevent"])
                              }, [
                                createVNode("div", {
                                  class: "ps-product ps-product--list",
                                  style: { "border": "2px solid #d1d5dad4", "border-radius": "10px" }
                                }, [
                                  createVNode("div", {
                                    class: "ps-product__content",
                                    style: { "border-right": "0px" }
                                  }, [
                                    createVNode("div", { class: "ps-product__thumbnail" }, [
                                      createVNode("a", {
                                        class: "ps-product__image",
                                        href: ""
                                      }, [
                                        createVNode("figure", null, [
                                          createVNode("img", {
                                            src: `/images/products/${(_a = cart.associatedModel) == null ? void 0 : _a.image_path}`,
                                            alt: ""
                                          }, null, 8, ["src"])
                                        ])
                                      ])
                                    ]),
                                    createVNode("div", { class: "ps-product__info" }, [
                                      createVNode("a", {
                                        class: "ps-product__branch",
                                        href: "#"
                                      }, toDisplayString((_c = (_b = cart == null ? void 0 : cart.associatedModel) == null ? void 0 : _b.category) == null ? void 0 : _c.name), 1),
                                      createVNode("h3", {
                                        class: "ps-product__tite",
                                        style: { "font-size": "16px", "color": "#262525" }
                                      }, [
                                        createVNode("a", null, toDisplayString(cart.name), 1)
                                      ]),
                                      createVNode("div", { class: "ps-product__meta" }, [
                                        createVNode("span", {
                                          class: "ps-product__price",
                                          style: { "font-size": "15px" }
                                        }),
                                        createTextVNode(" " + toDisplayString(unref(useFunctions).addSeperator((_d = cart == null ? void 0 : cart.associatedModel) == null ? void 0 : _d.sale_price)) + " ", 1),
                                        createVNode("span", {
                                          class: "ps-product__del",
                                          style: { "font-size": "15px" }
                                        }, toDisplayString(unref(useFunctions).addSeperator((_e = cart == null ? void 0 : cart.associatedModel) == null ? void 0 : _e.price)), 1)
                                      ]),
                                      createVNode("ul", { class: "ps-product__list" }, [
                                        createVNode("li", null, [
                                          createVNode("span", { class: "ps-list__title" }, "SKU: "),
                                          createVNode("a", {
                                            class: "ps-list__text",
                                            href: "#"
                                          }, toDisplayString((_f = cart == null ? void 0 : cart.associatedModel) == null ? void 0 : _f.sku), 1)
                                        ])
                                      ]),
                                      createVNode("button", {
                                        type: "submit",
                                        onClick: ($event) => updateAction("-"),
                                        value: "decrement",
                                        class: "ps-btn--success decrement-btn",
                                        style: { "width": "30px", "border-radius": "3px", "height": "30px" }
                                      }, " - ", 8, ["onClick"]),
                                      createVNode("input", {
                                        type: "text",
                                        value: cart.quantity,
                                        class: "qty",
                                        style: { "border": "1px solid #8c8a8a53", "height": "30px", "width": "30px", "text-align": "center" }
                                      }, null, 8, ["value"]),
                                      createVNode("input", {
                                        type: "hidden",
                                        value: cartForm.cartId
                                      }, null, 8, ["value"]),
                                      createVNode("button", {
                                        type: "submit",
                                        onClick: ($event) => updateAction("+"),
                                        value: "increment",
                                        class: "ps-btn--success increment-btn",
                                        style: { "width": "30px", "border-radius": "3px", "height": "30px" }
                                      }, " + ", 8, ["onClick"]),
                                      createVNode("span", { style: { "padding-left": "10px" } }, [
                                        createVNode(unref(Link), {
                                          href: "",
                                          onClick: ($event) => deleteCart(cart),
                                          class: "btn btn-danger"
                                        }, {
                                          default: withCtx(() => [
                                            createTextVNode(" Remove")
                                          ]),
                                          _: 2
                                        }, 1032, ["onClick"])
                                      ])
                                    ])
                                  ])
                                ])
                              ], 40, ["onSubmit"])
                            ]);
                          }), 128))
                        ])) : (openBlock(), createBlock("div", {
                          key: 1,
                          class: "ps-product ps-product--li"
                        }, [
                          createVNode("div", {
                            class: "ps-prod",
                            style: { "border-right": "0px" }
                          }, [
                            createVNode("p", { style: { "text-align": "center" } }, [
                              createVNode("i", {
                                style: { "font-size": "50px", "padding-right": "2px", "font-weight": "800" },
                                class: "icon-cart-empty"
                              }),
                              createVNode("br"),
                              createTextVNode(" Your cart is empty. You have not added any item to your cart.")
                            ])
                          ])
                        ]))
                      ]),
                      Object.entries(__props.carts).length > 0 ? (openBlock(), createBlock("div", {
                        key: 0,
                        class: "col-12 col-md-5 col-lg-3"
                      }, [
                        createVNode("div", {
                          class: "ps-shopping__box mt-5",
                          style: { "background": "#fff" }
                        }, [
                          createVNode("div", { class: "ps-shopping__row" }, [
                            createVNode("div", { class: "ps-shopping__label" }, "Cart Summary")
                          ]),
                          createVNode("div", { class: "ps-shopping__form" }, [
                            createVNode("div", { class: "ps-shopping__group" }, [
                              createVNode("input", {
                                class: "form-control ps-input",
                                type: "text",
                                placeholder: "County"
                              })
                            ]),
                            createVNode("div", { class: "ps-shopping__group" }, [
                              createVNode("input", {
                                class: "form-control ps-input",
                                type: "text",
                                placeholder: "Town / City"
                              })
                            ]),
                            createVNode("div", { class: "ps-shopping__group" }, [
                              createVNode("input", {
                                class: "form-control ps-input",
                                type: "text",
                                placeholder: "Postcode"
                              })
                            ])
                          ]),
                          createVNode("div", { class: "ps-shopping__row" }, [
                            createVNode("div", { class: "ps-shopping__label" }, "Total"),
                            createVNode("div", { class: "ps-shopping__price" }, toDisplayString(unref(useFunctions).addSeperator(__props.total)), 1)
                          ]),
                          createVNode("div", { class: "ps-shopping__text" }, "Shipping options will be updated during checkout."),
                          createVNode("div", { class: "ps-shopping__checkout" }, [
                            createVNode(unref(Link), {
                              class: "ps-btn ps-btn--primary",
                              style: { "border-radius": "5px" },
                              href: `/checkout/${__props.cartSession}`
                            }, {
                              default: withCtx(() => [
                                createTextVNode("Proceed to checkout")
                              ]),
                              _: 1
                            }, 8, ["href"]),
                            createVNode(unref(Link), {
                              class: "ps-shopping__link",
                              href: "/catalogs"
                            }, {
                              default: withCtx(() => [
                                createTextVNode("Continue Shopping")
                              ]),
                              _: 1
                            })
                          ])
                        ])
                      ])) : createCommentVNode("", true)
                    ])
                  ])
                ])
              ]),
              createVNode("div", { style: { "height": "2em", "background": "#eee" } }),
              createVNode("section", {
                class: "ps-section--latest",
                style: { "margin-top": "5px" }
              }, [
                createVNode("div", {
                  class: "container",
                  style: { "background": "#f4f3f33f", "padding": "10px", "border": "5px solid #ede8e836" }
                }, [
                  createVNode("div", {
                    class: "ps-noti p-2",
                    style: { "border-radius": "5px" }
                  }, [
                    createVNode("p", {
                      class: "ml-2",
                      style: { "color": "#fff", "font-weight": "bold", "text-align": "left" }
                    }, " Related Products ")
                  ]),
                  createVNode("div", { class: "ps-section__carousel" }, [
                    createVNode("div", {
                      class: "owl-carousel",
                      "data-owl-auto": "false",
                      "data-owl-loop": "true",
                      "data-owl-speed": "13000",
                      "data-owl-gap": "0",
                      "data-owl-nav": "true",
                      "data-owl-dots": "true",
                      "data-owl-item": "5",
                      "data-owl-item-xs": "2",
                      "data-owl-item-sm": "2",
                      "data-owl-item-md": "3",
                      "data-owl-item-lg": "5",
                      "data-owl-item-xl": "5",
                      "data-owl-duration": "1000",
                      "data-owl-mousedrag": "on"
                    }, [
                      (openBlock(true), createBlock(Fragment, null, renderList(__props.latest, (products) => {
                        return openBlock(), createBlock("div", null, [
                          createVNode("div", { class: "ps-section__product shadow-sm" }, [
                            createVNode("div", {
                              class: "ps-product ps-product--standard cart-card border-gray-800",
                              style: { "background-color": "#fff" }
                            }, [
                              createVNode("div", { class: "ps-product__thumbnail" }, [
                                createVNode(unref(Link), {
                                  class: "ps-product__image",
                                  href: `/products/${products == null ? void 0 : products.slug}`,
                                  style: { "min-height": "250px" }
                                }, {
                                  default: withCtx(() => [
                                    createVNode("figure", null, [
                                      createVNode("img", {
                                        src: `/images/products/${products == null ? void 0 : products.image_path}`,
                                        alt: "",
                                        style: { "max-height": "200px" }
                                      }, null, 8, ["src"]),
                                      createVNode("img", {
                                        src: `/images/products/${products == null ? void 0 : products.image_path}`,
                                        alt: products == null ? void 0 : products.name
                                      }, null, 8, ["src", "alt"])
                                    ])
                                  ]),
                                  _: 2
                                }, 1032, ["href"])
                              ]),
                              createVNode("div", { class: "ps-product__content" }, [
                                createVNode("h5", { class: "" }, [
                                  createVNode(unref(Link), {
                                    href: `/products/${products == null ? void 0 : products.slug}`
                                  }, {
                                    default: withCtx(() => [
                                      createTextVNode(toDisplayString(products == null ? void 0 : products.name), 1)
                                    ]),
                                    _: 2
                                  }, 1032, ["href"])
                                ]),
                                createVNode("div", { class: "ps-product__meta" }, [
                                  createVNode("span", { class: "ps-product__price sale" }, toDisplayString(unref(useFunctions).addSeperator(products == null ? void 0 : products.sale_price)), 1),
                                  createVNode("span", { class: "ps-product__del" }, toDisplayString(unref(useFunctions).addSeperator(products == null ? void 0 : products.price)), 1)
                                ]),
                                createVNode("span", { class: "download-note" }, [
                                  createVNode("span", null, [
                                    createVNode(unref(Link), {
                                      class: "btn btn-lg",
                                      href: `/products/${products.slug}`,
                                      style: { "background": "#fff", "color": "#73c2fb", "border": "1px solid #73c2fb", "display": "inline" }
                                    }, {
                                      default: withCtx(() => [
                                        createVNode("i", { class: "fa fa-plus" }),
                                        createTextVNode(" Add to basket")
                                      ]),
                                      _: 2
                                    }, 1032, ["href"]),
                                    createVNode("a", {
                                      target: "_blank",
                                      rel: "noopener noreferrer",
                                      href: `https://wa.me/+2348058885913?text=Please i need  to order this product ${products.name} the price is: ${unref(useFunctions).addSeperator(products.sale_price)} `
                                    }, [
                                      createVNode("img", {
                                        src: "/frontend/whatsapp.png",
                                        style: { "width": "80px", "float": "right", "padding": "0px" }
                                      })
                                    ], 8, ["href"])
                                  ])
                                ])
                              ])
                            ])
                          ])
                        ]);
                      }), 256))
                    ])
                  ])
                ])
              ])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_sfc_main$1, { message: __props.message }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_sfc_main$1, { message: __props.message }, null, 8, ["message"])
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Users/Carts/Cart.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
