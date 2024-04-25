const staticCacheName = 'site-static';
//const dynamicCache = 'site-dynamic';
const assets = [
   '/',
   'index.php', 
   'offline.php',
   'app.js',
   'css/bootstrap.css',
   'css/font-awesome.css',
   'css/style.css',
   'css/styles.css',
   'js/bootstrap.bundle.min.js',
];
self.addEventListener("install", event => {
   
   event.waitUntil(
      caches.open(staticCacheName).then(cache => {
         console.log("Service worker installed", event);
         cache.addAll(assets);
      }) 
   );

});
self.addEventListener("activate", event => {

   event.waitUntil(
      caches.keys().then(keys => {
         return Promise.all(keys 
            .filter(key => key !== staticCacheName) 
            .map(key => caches.delete(key))
         )
      })
   );
});

self.addEventListener("fetch", event => {
    event.respondWith(
      caches.match(event.request).then(cacheRes => {
         return cacheRes || fetch(event.request);
      }).catch(() => caches.match('offline.php'))
   );

});