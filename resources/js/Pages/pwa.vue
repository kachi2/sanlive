<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="pwaInstallModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="pwaInstallLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-bottom modal-dialog-centered" role="document">
      <div class="modal-content rounded-top shadow-lg">
        <div class="modal-header border-0">
          <h5 class="modal-title w-100 text-center" id="pwaInstallLabel">
            Install App
          </h5>
          <button
            type="button"
            class="close position-absolute"
            style="right: 1rem;"
            data-dismiss="modal"
            aria-label="Close"
            @click="dismiss"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body text-center">
          <div v-if="isIos">
            <p class="mb-3">To install this app on your iPhone:</p>
            <ol class="text-left">
              <li class="mb-2">
                Tap the <strong>Share</strong>
                <img
                  src="https://img.icons8.com/ios/24/share-2.png"
                  alt="Share"
                  style="height:22px;margin:0 4px;"
                />
                button at the bottom of Safari or <strong>Share</strong> at the top of the Chrome  <img 
                    src="https://img.icons8.com/ios-filled/50/export.png" 
                    alt="iOS Share" 
                    style="height:24px; margin:0 4px;" 
                    /> 
              </li>
              <li>
                Scroll and tap <strong>Add to Home Screen</strong>.
                <img
                  src="https://img.icons8.com/ios/24/add.png"
                  alt="Add"
                  style="height:22px;margin-left:4px;"
                />
              </li>
            </ol>
          </div>

          <div v-else>
            <p>Install this app on your device for the best experience.</p>
          </div>
        </div>

        <div class="modal-footer justify-content-center border-0">
          <button
            v-if="!isIos"
            type="button"
            class="btn btn-primary"
            @click="installApp"
          >
            Install
          </button>
          <button
            type="button"
            class="btn btn-secondary"
            data-dismiss="modal"
            @click="dismiss"
          >
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue"

const isIos = /iphone|ipad|ipod/i.test(window.navigator.userAgent)
let deferredPrompt = null

onMounted(() => {
  const isInStandaloneMode =
    window.matchMedia("(display-mode: standalone)").matches ||
    window.navigator.standalone

  if (isIos && !isInStandaloneMode) {
    // Show custom iOS sheet
    setTimeout(() => {
      if (!localStorage.getItem("pwaDismissed")) {
        $("#pwaInstallModal").modal("show")
      }
    }, 1500)
  } else {
    // Normal Android PWA flow
    window.addEventListener("beforeinstallprompt", (e) => {
      e.preventDefault()
      deferredPrompt = e
      if (!localStorage.getItem("pwaDismissed")) {
        $("#pwaInstallModal").modal("show")
      }
    })
  }
})

const installApp = async () => {
  if (deferredPrompt) {
    deferredPrompt.prompt()
    const { outcome } = await deferredPrompt.userChoice
    console.log("User response:", outcome)
    deferredPrompt = null
  }
  $("#pwaInstallModal").modal("hide")
}

const dismiss = () => {
  localStorage.setItem("pwaDismissed", "true")
  $("#pwaInstallModal").modal("hide")
}
</script>

<style scoped>
/* Make modal appear like bottom sheet on mobile */
.modal-bottom {
  margin: 0;
  position: fixed;
  bottom: 0;
  left: 0;
  right: 0;
}
.modal-content {
  border-radius: 1rem 1rem 0 0;
}
</style>
