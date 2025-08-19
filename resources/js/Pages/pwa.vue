<script setup>
import { onMounted } from "vue"

let deferredPrompt = null

onMounted(() => {
  // --- FOR REAL PWA INSTALL FLOW ---
  window.addEventListener("beforeinstallprompt", (e) => {
    e.preventDefault()
    deferredPrompt = e

    // Show modal only if not dismissed
    if (!localStorage.getItem("pwaDismissed")) {
      $("#pwaInstallModal").modal("show")
    }
  })
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


<template>
  <div 
    class="modal fade" 
    id="pwaInstallModal" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="pwaInstallLabel" 
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content rounded-lg shadow">
        <div class="modal-header">
          <h5 class="modal-title" id="pwaInstallLabel">Install App</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="dismiss">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <p>Install this app on your device for the best experience.</p>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-primary" @click="installApp">Install</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="dismiss">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</template>