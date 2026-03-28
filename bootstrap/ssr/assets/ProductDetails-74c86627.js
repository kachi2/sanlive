import { onMounted, reactive, computed, ref, withCtx, unref, createTextVNode, toDisplayString, createVNode, openBlock, createBlock, createCommentVNode, withModifiers, withDirectives, vModelText, Fragment, renderList, useSSRContext } from "vue";
import { ssrRenderComponent, ssrInterpolate, ssrRenderAttr, ssrRenderStyle, ssrRenderList } from "vue/server-renderer";
import { A as AppTemplate } from "./AppTemplate-2d192a23.js";
import "./CartAlert-03b2306f.js";
import { usePage, Link, Head, router } from "@inertiajs/vue3";
import { u as useFunctions } from "./useFunctions-b8a0fd2e.js";
import { H as HeadTags } from "./headTags-218fe00b.js";
import ProductReview from "./productReview-aba2c957.js";
import WriteReview from "./writeReview-7864a2ba.js";
import { _ as _export_sfc } from "./_plugin-vue_export-helper-cc2b3d55.js";
import "./pwa-0a2b72e5.js";
const ProductDetails_vue_vue_type_style_index_0_scoped_fc2d9619_lang = "";
const _sfc_main = {
  __name: "ProductDetails",
  __ssrInlineRender: true,
  props: {
    data: Object,
    pageMeta: Object,
    reviews: Object,
    ratings: Object
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
    usePage();
    const props = __props;
    let product = props.data.product;
    const form = reactive({
      image: "",
      qty: 1
    });
    const TaglineText = computed(() => {
      return product.tagline.replace(/Description:/gi, "");
    });
    const addSubstract = function(oprand) {
      if (oprand == "+") {
        form.qty++;
        return form;
      } else if (oprand == "-") {
        if (form.qty <= 0)
          return;
        form.qty--;
        return form;
      }
      return false;
    };
    const isPrescribed = ref(product.requires_prescription);
    const isLoading = ref(false);
    function addToCart(id) {
      if (isPrescribed.value == 1 && !ImageFile.value) {
        toastr.error("please Upload prescription before you add this item to card");
        return;
      }
      isLoading.value = true;
      router.post("/cart/" + id, form, {
        onSuccess: (page) => {
          setTimeout(() => {
            if (page.props.flash.success) {
              isLoading.value = false;
              toastr.success(page.props.flash.success);
            } else {
              toastr.error(page.props.flash.error);
            }
            toastr.options.preventDuplicates = true;
            toastr.options.progressBar = true;
          }, 2e3);
        }
      });
    }
    const ImageFile = ref("");
    function handleFileUpload(event) {
      ImageFile.value = event.target.files[0];
      form.image = ImageFile.value;
    }
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(HeadTags, { pageMeta: __props.pageMeta }, null, _parent));
      _push(ssrRenderComponent(AppTemplate, null, {
        content: withCtx((_, _push2, _parent2, _scopeId) => {
          var _a, _b;
          if (_push2) {
            _push2(`<div class="ps-page--product ps-page--product1" data-v-fc2d9619${_scopeId}><div class="container" data-v-fc2d9619${_scopeId}><ul class="ps-breadcrumb" data-v-fc2d9619${_scopeId}><li class="ps-breadcrumb__item" data-v-fc2d9619${_scopeId}><a href="/" data-v-fc2d9619${_scopeId}>Home</a></li><li class="ps-breadcrumb__item" data-v-fc2d9619${_scopeId}><a href="/catalogs" data-v-fc2d9619${_scopeId}>${ssrInterpolate(unref(product).category.name)}</a></li><li class="ps-breadcrumb__item active" aria-current="page" data-v-fc2d9619${_scopeId}>`);
            _push2(ssrRenderComponent(unref(Link), {
              href: `/products/${unref(product).slug}/`
            }, {
              default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(unref(product).name)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(unref(product).name), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(`</li></ul><div class="ps-page__content" data-v-fc2d9619${_scopeId}><div class="row" data-v-fc2d9619${_scopeId}><div class="col-12 col-md-12" data-v-fc2d9619${_scopeId}><div class="ps-product--detail" data-v-fc2d9619${_scopeId}><div class="row" data-v-fc2d9619${_scopeId}><div class="col-12 col-xl-6" data-v-fc2d9619${_scopeId}><div class="" data-v-fc2d9619${_scopeId}><div class="" data-v-fc2d9619${_scopeId}><img${ssrRenderAttr("src", `/images/products/${unref(product).image_path}`)}${ssrRenderAttr("alt", unref(product).name)} data-v-fc2d9619${_scopeId}></div></div></div><div class="col-12 col-xl-6" data-v-fc2d9619${_scopeId}><div class="ps-product__info" data-v-fc2d9619${_scopeId}><div class="ps-product__badge" data-v-fc2d9619${_scopeId}>`);
            if (unref(product).status == 1) {
              _push2(`<span class="ps-badge ps-badge--outstock" data-v-fc2d9619${_scopeId}>OUT OF STOCK</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><h2 class="ps-product__branch" style="${ssrRenderStyle({ "font-size": "13px" })}" data-v-fc2d9619${_scopeId}>Category: `);
            _push2(ssrRenderComponent(unref(Link), { href: "/catalogs" }, {
              default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(unref(product).category.name)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(unref(product).category.name), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(`</h2><h1 style="${ssrRenderStyle({ "font-size": "20px" })}" class="ps-product__title" data-v-fc2d9619${_scopeId}><a href="#" data-v-fc2d9619${_scopeId}>${ssrInterpolate(unref(product).name)}</a></h1><p data-v-fc2d9619${_scopeId}><span class="ps-product__price sale" data-v-fc2d9619${_scopeId}>${ssrInterpolate(unref(useFunctions).addSeperator(unref(product).sale_price))}</span><span class="ps-product__del" data-v-fc2d9619${_scopeId}>${ssrInterpolate(unref(useFunctions).addSeperator(unref(product).price))}</span></p><div class="ps-product__meta" data-v-fc2d9619${_scopeId}><h2 style="${ssrRenderStyle({ "font-size": "25px", "color": "deepskyblue" })}" data-v-fc2d9619${_scopeId}>Description: <span data-v-fc2d9619${_scopeId}>${TaglineText.value ?? ""}</span></h2></div><div class="ps-product__meta" data-v-fc2d9619${_scopeId}><h2 style="${ssrRenderStyle({ "font-size": "20px", "color": "deepskyblue" })}" data-v-fc2d9619${_scopeId}>Manufacturer: <span style="${ssrRenderStyle({ "font-size": "15px" })}" data-v-fc2d9619${_scopeId}>${ssrInterpolate((_a = unref(product)) == null ? void 0 : _a.brand)}</span></h2></div><form enctype="multipart/form-data" data-v-fc2d9619${_scopeId}><div class="ps-product__quantity" data-v-fc2d9619${_scopeId}><h6 data-v-fc2d9619${_scopeId}>Quantity: <button type="button" class="ps-btn--primary decrement-btn" style="${ssrRenderStyle({ "width": "30px", "border-radius": "3px", "height": "30px" })}" data-v-fc2d9619${_scopeId}> - </button><input type="text"${ssrRenderAttr("value", form.qty)} id="qty" style="${ssrRenderStyle({ "border": "1px solid #8c8a8a53", "height": "30px", "width": "30px", "text-align": "center" })}" data-v-fc2d9619${_scopeId}><button type="button" class="ps-btn--primary increment-btn" style="${ssrRenderStyle({ "width": "30px", "border-radius": "3px", "height": "30px" })}" data-v-fc2d9619${_scopeId}> + </button></h6>`);
            if (unref(product).requires_prescription == 1) {
              _push2(`<div data-v-fc2d9619${_scopeId}><label for="precription_upload" data-v-fc2d9619${_scopeId}><span id="fileName" style="${ssrRenderStyle({ "color": "red" })}" hidden data-v-fc2d9619${_scopeId}> Upload file </span><div class="pb-1" data-v-fc2d9619${_scopeId}><img src="/frontend/upload.png" data-v-fc2d9619${_scopeId}> ${ssrInterpolate(ImageFile.value.name)}</div><input type="file" id="precription_upload" style="${ssrRenderStyle({ "border": "none", "visibility": "hidden" })}" data-v-fc2d9619${_scopeId}></label><br data-v-fc2d9619${_scopeId}></div>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`<div class="d-md-flex align-items-center" data-v-fc2d9619${_scopeId}><div class="def-number-input number-input safari_only" data-v-fc2d9619${_scopeId}></div><br data-v-fc2d9619${_scopeId}>`);
            if (!isLoading.value) {
              _push2(`<button style="${ssrRenderStyle({ "border-radius": "5px" })}" class="ps-btn ps-btn--primary w-50" id="add2cart" data-v-fc2d9619${_scopeId}> Add to Cart </button>`);
            } else {
              _push2(`<button style="${ssrRenderStyle({ "border-radius": "5px" })}" class="ps-btn ps-btn--primary w-50" id="add2cart" data-v-fc2d9619${_scopeId}> Please wait... </button>`);
            }
            _push2(`<br data-v-fc2d9619${_scopeId}><br data-v-fc2d9619${_scopeId}><span class="p-2" data-v-fc2d9619${_scopeId}></span><a target="_blank" class="btn btn-primary" rel="noopener noreferrer"${ssrRenderAttr("href", `https://wa.me/+2348058885913?text=Please i need ${unref(product).name}, the  price on your website is ${unref(product).sale_price} `)} data-v-fc2d9619${_scopeId}><i class="fa fa-whatsapp" aria-hidden="true" style="${ssrRenderStyle({ "font-size": "20px", "padding": "5px", "color": "#fff" })}" data-v-fc2d9619${_scopeId}> Order on Whatsapp </i></a></div></div></form><div class="ps-product__social" data-v-fc2d9619${_scopeId}><ul class="ps-social ps-social--color" data-v-fc2d9619${_scopeId}> Share this Product <li data-v-fc2d9619${_scopeId}><a class="ps-social__link facebook" target="_blank" rel="noopener noreferrer"${ssrRenderAttr("href", `https://www.facebook.com/sharer/sharer.php?u=products/${unref(product).slug}`)} data-v-fc2d9619${_scopeId}><i class="fa fa-facebook" data-v-fc2d9619${_scopeId}></i><span class="ps-tooltip" data-v-fc2d9619${_scopeId}>Facebook</span></a></li><li data-v-fc2d9619${_scopeId}><a class="ps-social__link twitter" target="_blank" rel="noopener noreferrer"${ssrRenderAttr("href", `https://twitter.com/share?url=products/${unref(product).slug}`)} data-v-fc2d9619${_scopeId}><i class="fa fa-twitter" data-v-fc2d9619${_scopeId}></i><span class="ps-tooltip" data-v-fc2d9619${_scopeId}>Twitter</span></a></li><li data-v-fc2d9619${_scopeId}><a class="ps-social__link whatsapp" target="_blank" rel="noopener noreferrer" data-action="share/whatsapp/share"${ssrRenderAttr("href", `https://api.whatsapp.com/send?text=products/${unref(product).slug}`)} data-v-fc2d9619${_scopeId}><i class="fa fa-whatsapp" data-v-fc2d9619${_scopeId}></i><span class="ps-tooltip" data-v-fc2d9619${_scopeId}>WhatsApp</span></a></li></ul></div></div></div></div></div></div></div><div class="ps-product__content mt-5" data-v-fc2d9619${_scopeId}><ul class="nav nav-tabs ps-tab-list" id="productContentTabs" role="tablist" data-v-fc2d9619${_scopeId}><li class="nav-item" role="presentation" data-v-fc2d9619${_scopeId}><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description-content" role="tab" aria-controls="description-content" aria-selected="true" data-v-fc2d9619${_scopeId}>Description</a></li><li class="nav-item" role="presentation" data-v-fc2d9619${_scopeId}><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews-content" role="tab" aria-controls="reviews-content" aria-selected="false" data-v-fc2d9619${_scopeId}>Reviews</a></li><li class="nav-item" role="presentation" data-v-fc2d9619${_scopeId}><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#write-reviews" role="tab" aria-controls="write-reviews" aria-selected="false" data-v-fc2d9619${_scopeId}>Write a Review</a></li></ul><div class="tab-content" id="productContent" data-v-fc2d9619${_scopeId}><div class="tab-pane fade show active" id="description-content" role="tabpanel" aria-labelledby="description-tab" data-v-fc2d9619${_scopeId}><div class="ps-document" data-v-fc2d9619${_scopeId}><div class="row row-reverse" data-v-fc2d9619${_scopeId}><div class="col-12 col-md-12" data-v-fc2d9619${_scopeId}><p class="p-4" data-v-fc2d9619${_scopeId}>${unref(product).description ?? ""}</p></div></div></div></div><div class="tab-pane fade" id="reviews-content" role="tabpanel" aria-labelledby="reviews-tab" data-v-fc2d9619${_scopeId}>`);
            _push2(ssrRenderComponent(ProductReview, {
              reviews: __props.reviews,
              ratings: __props.ratings
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="tab-pane fade" id="write-reviews" role="tabpanel" aria-labelledby="reviews-tab" data-v-fc2d9619${_scopeId}>`);
            _push2(ssrRenderComponent(WriteReview, { product: unref(product) }, null, _parent2, _scopeId));
            _push2(`</div></div></div></div></div><section class="ps-section--latest" style="${ssrRenderStyle({ "margin-top": "5px" })}" data-v-fc2d9619${_scopeId}><div class="container" style="${ssrRenderStyle({ "background": "#f4f3f33f", "padding": "10px", "border": "5px solid #ede8e836" })}" data-v-fc2d9619${_scopeId}><div class="ps-noti p-2" style="${ssrRenderStyle({ "border-radius": "5px" })}" data-v-fc2d9619${_scopeId}><p class="ml-2" style="${ssrRenderStyle({ "color": "#fff", "font-weight": "bold", "text-align": "left" })}" data-v-fc2d9619${_scopeId}> Related Products </p></div><div class="ps-section__carousel" data-v-fc2d9619${_scopeId}><div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on" data-v-fc2d9619${_scopeId}><!--[-->`);
            ssrRenderList(__props.data.related, (products) => {
              _push2(`<div data-v-fc2d9619${_scopeId}><div class="ps-section__product shadow-sm" data-v-fc2d9619${_scopeId}><div class="ps-product ps-product--standard cart-card border-gray-800" style="${ssrRenderStyle({ "background-color": "#fff" })}" data-v-fc2d9619${_scopeId}><div class="ps-product__thumbnail" data-v-fc2d9619${_scopeId}>`);
              _push2(ssrRenderComponent(unref(Link), {
                class: "ps-product__image",
                href: `/products/${products.slug}/`,
                style: { "min-height": "250px" }
              }, {
                default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<figure data-v-fc2d9619${_scopeId2}><img${ssrRenderAttr("src", `/images/products/${products.image_path}`)}${ssrRenderAttr("alt", products.name)} style="${ssrRenderStyle({ "max-height": "200px" })}" data-v-fc2d9619${_scopeId2}><img${ssrRenderAttr("src", `/images/products/${products.image_path}`)}${ssrRenderAttr("alt", unref(product).name)} data-v-fc2d9619${_scopeId2}></figure>`);
                  } else {
                    return [
                      createVNode("figure", null, [
                        createVNode("img", {
                          src: `/images/products/${products.image_path}`,
                          alt: products.name,
                          style: { "max-height": "200px" }
                        }, null, 8, ["src", "alt"]),
                        createVNode("img", {
                          src: `/images/products/${products.image_path}`,
                          alt: unref(product).name
                        }, null, 8, ["src", "alt"])
                      ])
                    ];
                  }
                }),
                _: 2
              }, _parent2, _scopeId));
              _push2(`</div><div class="ps-product__content" data-v-fc2d9619${_scopeId}><h5 class="" data-v-fc2d9619${_scopeId}>`);
              _push2(ssrRenderComponent(unref(Link), {
                href: `/products/${products.slug}`
              }, {
                default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`${ssrInterpolate(products.name)}`);
                  } else {
                    return [
                      createTextVNode(toDisplayString(products.name), 1)
                    ];
                  }
                }),
                _: 2
              }, _parent2, _scopeId));
              _push2(`</h5><div class="ps-product__meta" data-v-fc2d9619${_scopeId}><span class="ps-product__price sale" data-v-fc2d9619${_scopeId}>${ssrInterpolate(unref(useFunctions).addSeperator(products.sale_price))}</span><span class="ps-product__del" data-v-fc2d9619${_scopeId}>${ssrInterpolate(unref(useFunctions).addSeperator(products.price))}</span></div><span class="download-note" data-v-fc2d9619${_scopeId}><span data-v-fc2d9619${_scopeId}>`);
              _push2(ssrRenderComponent(unref(Link), {
                class: "btn btn-lg",
                href: `/products/${products.slug}`,
                style: { "background": "#fff", "color": "#73c2fb", "border": "1px solid #73c2fb", "display": "inline" }
              }, {
                default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<i class="fa fa-plus" data-v-fc2d9619${_scopeId2}></i> Add to basket`);
                  } else {
                    return [
                      createVNode("i", { class: "fa fa-plus" }),
                      createTextVNode(" Add to basket")
                    ];
                  }
                }),
                _: 2
              }, _parent2, _scopeId));
              _push2(`<a target="_blank" rel="noopener noreferrer"${ssrRenderAttr("href", `https://wa.me/+2348058885913?text=Please i need  to order this product ${products.name} the price is: ${unref(useFunctions).addSeperator(products.sale_price)} `)} data-v-fc2d9619${_scopeId}><img src="/frontend/whatsapp.png" style="${ssrRenderStyle({ "width": "80px", "float": "right", "padding": "0px" })}" data-v-fc2d9619${_scopeId}></a></span></span></div></div></div></div>`);
            });
            _push2(`<!--]--></div></div></div></section></div>`);
          } else {
            return [
              createVNode("div", { class: "ps-page--product ps-page--product1" }, [
                createVNode("div", { class: "container" }, [
                  createVNode("ul", { class: "ps-breadcrumb" }, [
                    createVNode("li", { class: "ps-breadcrumb__item" }, [
                      createVNode("a", { href: "/" }, "Home")
                    ]),
                    createVNode("li", { class: "ps-breadcrumb__item" }, [
                      createVNode("a", { href: "/catalogs" }, toDisplayString(unref(product).category.name), 1)
                    ]),
                    createVNode("li", {
                      class: "ps-breadcrumb__item active",
                      "aria-current": "page"
                    }, [
                      createVNode(unref(Link), {
                        href: `/products/${unref(product).slug}/`
                      }, {
                        default: withCtx(() => [
                          createTextVNode(toDisplayString(unref(product).name), 1)
                        ]),
                        _: 1
                      }, 8, ["href"])
                    ])
                  ]),
                  createVNode("div", { class: "ps-page__content" }, [
                    createVNode("div", { class: "row" }, [
                      createVNode("div", { class: "col-12 col-md-12" }, [
                        createVNode("div", { class: "ps-product--detail" }, [
                          createVNode("div", { class: "row" }, [
                            createVNode("div", { class: "col-12 col-xl-6" }, [
                              createVNode("div", { class: "" }, [
                                createVNode("div", { class: "" }, [
                                  createVNode("img", {
                                    src: `/images/products/${unref(product).image_path}`,
                                    alt: unref(product).name
                                  }, null, 8, ["src", "alt"])
                                ])
                              ])
                            ]),
                            createVNode("div", { class: "col-12 col-xl-6" }, [
                              createVNode("div", { class: "ps-product__info" }, [
                                createVNode("div", { class: "ps-product__badge" }, [
                                  unref(product).status == 1 ? (openBlock(), createBlock("span", {
                                    key: 0,
                                    class: "ps-badge ps-badge--outstock"
                                  }, "OUT OF STOCK")) : createCommentVNode("", true)
                                ]),
                                createVNode("h2", {
                                  class: "ps-product__branch",
                                  style: { "font-size": "13px" }
                                }, [
                                  createTextVNode("Category: "),
                                  createVNode(unref(Link), { href: "/catalogs" }, {
                                    default: withCtx(() => [
                                      createTextVNode(toDisplayString(unref(product).category.name), 1)
                                    ]),
                                    _: 1
                                  })
                                ]),
                                createVNode("h1", {
                                  style: { "font-size": "20px" },
                                  class: "ps-product__title"
                                }, [
                                  createVNode("a", { href: "#" }, toDisplayString(unref(product).name), 1)
                                ]),
                                createVNode("p", null, [
                                  createVNode("span", { class: "ps-product__price sale" }, toDisplayString(unref(useFunctions).addSeperator(unref(product).sale_price)), 1),
                                  createVNode("span", { class: "ps-product__del" }, toDisplayString(unref(useFunctions).addSeperator(unref(product).price)), 1)
                                ]),
                                createVNode("div", { class: "ps-product__meta" }, [
                                  createVNode("h2", { style: { "font-size": "25px", "color": "deepskyblue" } }, [
                                    createTextVNode("Description: "),
                                    createVNode("span", { innerHTML: TaglineText.value }, null, 8, ["innerHTML"])
                                  ])
                                ]),
                                createVNode("div", { class: "ps-product__meta" }, [
                                  createVNode("h2", { style: { "font-size": "20px", "color": "deepskyblue" } }, [
                                    createTextVNode("Manufacturer: "),
                                    createVNode("span", { style: { "font-size": "15px" } }, toDisplayString((_b = unref(product)) == null ? void 0 : _b.brand), 1)
                                  ])
                                ]),
                                createVNode("form", {
                                  enctype: "multipart/form-data",
                                  onSubmit: withModifiers(($event) => addToCart(unref(product).id), ["prevent"])
                                }, [
                                  createVNode("div", { class: "ps-product__quantity" }, [
                                    createVNode("h6", null, [
                                      createTextVNode("Quantity: "),
                                      createVNode("button", {
                                        type: "button",
                                        onClick: ($event) => addSubstract("-"),
                                        class: "ps-btn--primary decrement-btn",
                                        style: { "width": "30px", "border-radius": "3px", "height": "30px" }
                                      }, " - ", 8, ["onClick"]),
                                      withDirectives(createVNode("input", {
                                        type: "text",
                                        "onUpdate:modelValue": ($event) => form.qty = $event,
                                        id: "qty",
                                        style: { "border": "1px solid #8c8a8a53", "height": "30px", "width": "30px", "text-align": "center" }
                                      }, null, 8, ["onUpdate:modelValue"]), [
                                        [vModelText, form.qty]
                                      ]),
                                      createVNode("button", {
                                        type: "button",
                                        onClick: ($event) => addSubstract("+"),
                                        class: "ps-btn--primary increment-btn",
                                        style: { "width": "30px", "border-radius": "3px", "height": "30px" }
                                      }, " + ", 8, ["onClick"])
                                    ]),
                                    unref(product).requires_prescription == 1 ? (openBlock(), createBlock("div", { key: 0 }, [
                                      createVNode("label", { for: "precription_upload" }, [
                                        createVNode("span", {
                                          id: "fileName",
                                          style: { "color": "red" },
                                          hidden: ""
                                        }, " Upload file "),
                                        createVNode("div", { class: "pb-1" }, [
                                          createVNode("img", { src: "/frontend/upload.png" }),
                                          createTextVNode(" " + toDisplayString(ImageFile.value.name), 1)
                                        ]),
                                        createVNode("input", {
                                          type: "file",
                                          id: "precription_upload",
                                          onChange: handleFileUpload,
                                          style: { "border": "none", "visibility": "hidden" }
                                        }, null, 32)
                                      ]),
                                      createVNode("br")
                                    ])) : createCommentVNode("", true),
                                    createVNode("div", { class: "d-md-flex align-items-center" }, [
                                      createVNode("div", { class: "def-number-input number-input safari_only" }),
                                      createVNode("br"),
                                      !isLoading.value ? (openBlock(), createBlock("button", {
                                        key: 0,
                                        style: { "border-radius": "5px" },
                                        class: "ps-btn ps-btn--primary w-50",
                                        id: "add2cart"
                                      }, " Add to Cart ")) : (openBlock(), createBlock("button", {
                                        key: 1,
                                        style: { "border-radius": "5px" },
                                        class: "ps-btn ps-btn--primary w-50",
                                        id: "add2cart"
                                      }, " Please wait... ")),
                                      createVNode("br"),
                                      createVNode("br"),
                                      createVNode("span", { class: "p-2" }),
                                      createVNode("a", {
                                        target: "_blank",
                                        class: "btn btn-primary",
                                        rel: "noopener noreferrer",
                                        href: `https://wa.me/+2348058885913?text=Please i need ${unref(product).name}, the  price on your website is ${unref(product).sale_price} `
                                      }, [
                                        createVNode("i", {
                                          class: "fa fa-whatsapp",
                                          "aria-hidden": "true",
                                          style: { "font-size": "20px", "padding": "5px", "color": "#fff" }
                                        }, " Order on Whatsapp ")
                                      ], 8, ["href"])
                                    ])
                                  ])
                                ], 40, ["onSubmit"]),
                                createVNode("div", { class: "ps-product__social" }, [
                                  createVNode("ul", { class: "ps-social ps-social--color" }, [
                                    createTextVNode(" Share this Product "),
                                    createVNode("li", null, [
                                      createVNode("a", {
                                        class: "ps-social__link facebook",
                                        target: "_blank",
                                        rel: "noopener noreferrer",
                                        href: `https://www.facebook.com/sharer/sharer.php?u=products/${unref(product).slug}`
                                      }, [
                                        createVNode("i", { class: "fa fa-facebook" }),
                                        createVNode("span", { class: "ps-tooltip" }, "Facebook")
                                      ], 8, ["href"])
                                    ]),
                                    createVNode("li", null, [
                                      createVNode("a", {
                                        class: "ps-social__link twitter",
                                        target: "_blank",
                                        rel: "noopener noreferrer",
                                        href: `https://twitter.com/share?url=products/${unref(product).slug}`
                                      }, [
                                        createVNode("i", { class: "fa fa-twitter" }),
                                        createVNode("span", { class: "ps-tooltip" }, "Twitter")
                                      ], 8, ["href"])
                                    ]),
                                    createVNode("li", null, [
                                      createVNode("a", {
                                        class: "ps-social__link whatsapp",
                                        target: "_blank",
                                        rel: "noopener noreferrer",
                                        "data-action": "share/whatsapp/share",
                                        href: `https://api.whatsapp.com/send?text=products/${unref(product).slug}`
                                      }, [
                                        createVNode("i", { class: "fa fa-whatsapp" }),
                                        createVNode("span", { class: "ps-tooltip" }, "WhatsApp")
                                      ], 8, ["href"])
                                    ])
                                  ])
                                ])
                              ])
                            ])
                          ])
                        ])
                      ])
                    ]),
                    createVNode("div", { class: "ps-product__content mt-5" }, [
                      createVNode("ul", {
                        class: "nav nav-tabs ps-tab-list",
                        id: "productContentTabs",
                        role: "tablist"
                      }, [
                        createVNode("li", {
                          class: "nav-item",
                          role: "presentation"
                        }, [
                          createVNode("a", {
                            class: "nav-link active",
                            id: "description-tab",
                            "data-toggle": "tab",
                            href: "#description-content",
                            role: "tab",
                            "aria-controls": "description-content",
                            "aria-selected": "true"
                          }, "Description")
                        ]),
                        createVNode("li", {
                          class: "nav-item",
                          role: "presentation"
                        }, [
                          createVNode("a", {
                            class: "nav-link",
                            id: "reviews-tab",
                            "data-toggle": "tab",
                            href: "#reviews-content",
                            role: "tab",
                            "aria-controls": "reviews-content",
                            "aria-selected": "false"
                          }, "Reviews")
                        ]),
                        createVNode("li", {
                          class: "nav-item",
                          role: "presentation"
                        }, [
                          createVNode("a", {
                            class: "nav-link",
                            id: "reviews-tab",
                            "data-toggle": "tab",
                            href: "#write-reviews",
                            role: "tab",
                            "aria-controls": "write-reviews",
                            "aria-selected": "false"
                          }, "Write a Review")
                        ])
                      ]),
                      createVNode("div", {
                        class: "tab-content",
                        id: "productContent"
                      }, [
                        createVNode("div", {
                          class: "tab-pane fade show active",
                          id: "description-content",
                          role: "tabpanel",
                          "aria-labelledby": "description-tab"
                        }, [
                          createVNode("div", { class: "ps-document" }, [
                            createVNode("div", { class: "row row-reverse" }, [
                              createVNode("div", { class: "col-12 col-md-12" }, [
                                createVNode("p", {
                                  class: "p-4",
                                  innerHTML: unref(product).description
                                }, null, 8, ["innerHTML"])
                              ])
                            ])
                          ])
                        ]),
                        createVNode("div", {
                          class: "tab-pane fade",
                          id: "reviews-content",
                          role: "tabpanel",
                          "aria-labelledby": "reviews-tab"
                        }, [
                          createVNode(ProductReview, {
                            reviews: __props.reviews,
                            ratings: __props.ratings
                          }, null, 8, ["reviews", "ratings"])
                        ]),
                        createVNode("div", {
                          class: "tab-pane fade",
                          id: "write-reviews",
                          role: "tabpanel",
                          "aria-labelledby": "reviews-tab"
                        }, [
                          createVNode(WriteReview, { product: unref(product) }, null, 8, ["product"])
                        ])
                      ])
                    ])
                  ])
                ]),
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
                        "data-owl-item": "1",
                        "data-owl-item-xs": "2",
                        "data-owl-item-sm": "2",
                        "data-owl-item-md": "3",
                        "data-owl-item-lg": "5",
                        "data-owl-item-xl": "5",
                        "data-owl-duration": "1000",
                        "data-owl-mousedrag": "on"
                      }, [
                        (openBlock(true), createBlock(Fragment, null, renderList(__props.data.related, (products) => {
                          return openBlock(), createBlock("div", null, [
                            createVNode("div", { class: "ps-section__product shadow-sm" }, [
                              createVNode("div", {
                                class: "ps-product ps-product--standard cart-card border-gray-800",
                                style: { "background-color": "#fff" }
                              }, [
                                createVNode("div", { class: "ps-product__thumbnail" }, [
                                  createVNode(unref(Link), {
                                    class: "ps-product__image",
                                    href: `/products/${products.slug}/`,
                                    style: { "min-height": "250px" }
                                  }, {
                                    default: withCtx(() => [
                                      createVNode("figure", null, [
                                        createVNode("img", {
                                          src: `/images/products/${products.image_path}`,
                                          alt: products.name,
                                          style: { "max-height": "200px" }
                                        }, null, 8, ["src", "alt"]),
                                        createVNode("img", {
                                          src: `/images/products/${products.image_path}`,
                                          alt: unref(product).name
                                        }, null, 8, ["src", "alt"])
                                      ])
                                    ]),
                                    _: 2
                                  }, 1032, ["href"])
                                ]),
                                createVNode("div", { class: "ps-product__content" }, [
                                  createVNode("h5", { class: "" }, [
                                    createVNode(unref(Link), {
                                      href: `/products/${products.slug}`
                                    }, {
                                      default: withCtx(() => [
                                        createTextVNode(toDisplayString(products.name), 1)
                                      ]),
                                      _: 2
                                    }, 1032, ["href"])
                                  ]),
                                  createVNode("div", { class: "ps-product__meta" }, [
                                    createVNode("span", { class: "ps-product__price sale" }, toDisplayString(unref(useFunctions).addSeperator(products.sale_price)), 1),
                                    createVNode("span", { class: "ps-product__del" }, toDisplayString(unref(useFunctions).addSeperator(products.price)), 1)
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
              ])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(unref(Head), null, {
              default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<title data-v-fc2d9619${_scopeId2}>Product details</title>`);
                } else {
                  return [
                    createVNode("title", null, "Product details")
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(unref(Head), null, {
                default: withCtx(() => [
                  createVNode("title", null, "Product details")
                ]),
                _: 1
              })
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Users/Carts/ProductDetails.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const ProductDetails = /* @__PURE__ */ _export_sfc(_sfc_main, [["__scopeId", "data-v-fc2d9619"]]);
export {
  ProductDetails as default
};
