self.addEventListener("install", function (event) {
    console.log("ServiceWworker terinstal");
    event.waitUntil(
      caches.open("static").then(function (cache) {
        cache.add('./');
        cache.add('./index.html')
        cache.add('./api');
        cache.add('./web');
        cache.add('./webassets');
  
      })
    );
  });
  self.addEventListener("activate", function () {
    console.log("ServiceWorker aktif");
  });
  self.addEventListener("fetch", function (event) {
    event.respondWith(
      caches.match(event.request).then(function (res) {
        if (res) {
          return res;
        } else {
          return fetch(event.request);
        }
      })
    );
  });
  