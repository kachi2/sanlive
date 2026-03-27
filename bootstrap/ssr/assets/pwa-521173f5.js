import { onMounted, mergeProps, unref, useSSRContext } from "vue";
import { ssrRenderAttrs, ssrRenderStyle } from "vue/server-renderer";
import { _ as _export_sfc } from "./_plugin-vue_export-helper-cc2b3d55.js";
const pwa_vue_vue_type_style_index_0_scoped_65e45a48_lang = "";
const _sfc_main = {
  __name: "pwa",
  __ssrInlineRender: true,
  setup(__props) {
    const isIos = /iphone|ipad|ipod/i.test(window.navigator.userAgent);
    onMounted(() => {
      const isInStandaloneMode = window.matchMedia("(display-mode: standalone)").matches || window.navigator.standalone;
      if (isIos && !isInStandaloneMode) {
        setTimeout(() => {
          if (!localStorage.getItem("pwaDismissed")) {
            $("#pwaInstallModal").modal("show");
          }
        }, 1500);
      } else {
        window.addEventListener("beforeinstallprompt", (e) => {
          e.preventDefault();
          if (!localStorage.getItem("pwaDismissed")) {
            $("#pwaInstallModal").modal("show");
          }
        });
      }
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({
        class: "modal fade",
        id: "pwaInstallModal",
        tabindex: "-1",
        role: "dialog",
        "aria-labelledby": "pwaInstallLabel",
        "aria-hidden": "true"
      }, _attrs))} data-v-65e45a48><div class="modal-dialog modal-bottom modal-dialog-centered" role="document" data-v-65e45a48><div class="modal-content rounded-top shadow-lg" data-v-65e45a48><div class="modal-header border-0" data-v-65e45a48><h5 class="modal-title w-100 text-center" id="pwaInstallLabel" data-v-65e45a48> Install App </h5><button type="button" class="close position-absolute" style="${ssrRenderStyle({ "right": "1rem" })}" data-dismiss="modal" aria-label="Close" data-v-65e45a48><span aria-hidden="true" data-v-65e45a48>×</span></button></div><div class="modal-body text-center" data-v-65e45a48>`);
      if (unref(isIos)) {
        _push(`<div data-v-65e45a48><p class="mb-3" data-v-65e45a48>To install this app on your iPhone:</p><ol class="text-left" data-v-65e45a48><li class="mb-2" data-v-65e45a48> Tap the <strong data-v-65e45a48>Share</strong><img src="https://img.icons8.com/ios/24/share-2.png" alt="Share" style="${ssrRenderStyle({ "height": "22px", "margin": "0 4px" })}" data-v-65e45a48> button at the bottom of Safari or <strong data-v-65e45a48>Share</strong> at the top of the Chrome <img src="https://img.icons8.com/ios-filled/50/export.png" alt="iOS Share" style="${ssrRenderStyle({ "height": "24px", "margin": "0 4px" })}" data-v-65e45a48></li><li data-v-65e45a48> Scroll and tap <strong data-v-65e45a48>Add to Home Screen</strong>. <img src="https://img.icons8.com/ios/24/add.png" alt="Add" style="${ssrRenderStyle({ "height": "22px", "margin-left": "4px" })}" data-v-65e45a48></li></ol></div>`);
      } else {
        _push(`<div data-v-65e45a48><p data-v-65e45a48>Install this app on your device for the best experience.</p></div>`);
      }
      _push(`</div><div class="modal-footer justify-content-center border-0" data-v-65e45a48>`);
      if (!unref(isIos)) {
        _push(`<button type="button" class="btn btn-primary" data-v-65e45a48> Install </button>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<button type="button" class="btn btn-secondary" data-dismiss="modal" data-v-65e45a48> Close </button></div></div></div></div>`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/pwa.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const Pwa = /* @__PURE__ */ _export_sfc(_sfc_main, [["__scopeId", "data-v-65e45a48"]]);
export {
  Pwa as default
};
