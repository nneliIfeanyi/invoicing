const staticCacheName = 'site-static';
const dynamicCache = 'site-dynamic';
const assets = [
   'site.webmanifest',
   'index.php', 
   'offline.php',
   'app.js',
   'css/bootstrap.css',
   'css/font-awesome.css',
   'js/bootstrap.bundle.min.js',
   'js/jquery.js',
   'js/parsley.min.js',
   'webfonts/fa-brands-400.ttf',
   'webfonts/fa-brands-400.woff2',
   'webfonts/fa-regular-400.ttf',
   'webfonts/fa-regular-400.woff2',
   'webfonts/fa-solid-900.ttf',
   'webfonts/fa-solid-900.woff2',
   'webfonts/fa-v4compatibility.ttf',
   'webfonts/fa-v4compatibility.woff2',
   'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap',
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
               limitCache(dynamicCache, 1);
               return fetchRes;
            })
         });
      }).catch(() => caches.match('offline.php'))
   );

});