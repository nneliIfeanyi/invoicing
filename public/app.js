let installPrompt = null;
const installButton = document.querySelector("#install");

window.addEventListener("beforeinstallprompt", (event) => {
  event.preventDefault();
  installPrompt = event;
  //installButton.removeAttribute("hidden");
});


installButton.addEventListener("click", async () => {
  if (!installPrompt) {
    return;
  }
  const result = await installPrompt.prompt();
  console.log(`Install prompt was: ${result.outcome}`);
  installPrompt = null;
  installButton.setAttribute("hidden", "");
  //installButton.style.display = 'none';
});

// window.addEventListener('appinstalled', () => {
//   // Hide the app-provided install promotion
//   hideInstallPromotion();
//   // Clear the deferredPrompt so it can be garbage collected
//   deferredPrompt = null;
//   // Optionally, send analytics event to indicate successful install
//   console.log('PWA was installed');
// });




if ('serviceWorker' in navigator) {
   navigator.serviceWorker.register("sw.js")
   .then((reg) => console.log('Service worker registered.', reg))
   .catch((err) => console.log('Service worker not registered..', err))
}