const staticCacheName = 'site-static-2';
const dynamicCache = 'site-dynamic';
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

const limitCache = (name, size) => {
   caches.open(name).then(cache => {
      cache.keys().then(keys => {
         if (keys.length > size) {
            cache.delete(keys[0]).then(limitCache(name, size));
         }
      })
   })
};


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
            .filter(key => key !== staticCacheName && key !== dynamicCache) 
            .map(key => caches.delete(key))
         )
      })
   );
});

self.addEventListener("fetch", event => {
    event.respondWith(
      caches.match(event.request).then(cacheRes => {
         return cacheRes || fetch(event.request).then(fetchRes => {
            return caches.open(dynamicCache).then(cache => {
               cache.put(event.request.url, fetchRes.clone());
               limitCache(dynamicCache, 20);
               return fetchRes;
            })
         });
      }).catch(() => caches.match('offline.php'))
   );

});