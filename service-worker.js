/* ==========================================================
   LYF MAIL – FINAL SERVICE WORKER
   Static-only PWA · Offline-first · Cache versioning
========================================================== */

const CACHE_VERSION = "v4";  // Bumped version to v4
const CACHE_NAME = `lyfmail-cache-${CACHE_VERSION}`;

/* ----------------------------------------------------------
   PRECACHE ASSETS
   (Includes all updated icons)
----------------------------------------------------------- */
const PRECACHE_ASSETS = [
  "/",                       // Root
  "/index.php",              // Main page
  "/offline.html",           // Offline fallback

  "/css/styles.css",         // Main CSS
  "/js/app.js",              // App JS (static-only)

  "/assets/logo/logo.png",   // Logo
  "/assets/icons/icon-48x48.png",
  "/assets/icons/icon-72x72.png",
  "/assets/icons/icon-96x96.png",
  "/assets/icons/icon-128x128.png",
  "/assets/icons/icon-144x144.png",
  "/assets/icons/icon-152x152.png",
  "/assets/icons/icon-192x192.png", 
  "/assets/icons/icon-256x256.png",
  "/assets/icons/icon-384x384.png",
  "/assets/icons/icon-512x512.png",
  "/assets/icons/icon-512-maskable.png"
];

/* ----------------------------------------------------------
   INSTALL SW + PRECACHE
----------------------------------------------------------- */
self.addEventListener("install", (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then((cache) => cache.addAll(PRECACHE_ASSETS))
      .catch((err) => console.error("SW Install error:", err))
  );
  self.skipWaiting();
});

/* ----------------------------------------------------------
   ACTIVATE SW + DELETE OLD CACHES
----------------------------------------------------------- */
self.addEventListener("activate", (event) => {
  event.waitUntil(
    caches.keys().then((keys) =>
      Promise.all(
        keys
          .filter((key) => key !== CACHE_NAME)
          .map((key) => caches.delete(key))
      )
    )
  );
  self.clients.claim();
});

/* ----------------------------------------------------------
   FETCH HANDLER
   - HTML = Network-first → Offline fallback
   - Static Files = Cache-first → Network fallback
----------------------------------------------------------- */
self.addEventListener("fetch", (event) => {
  const req = event.request;

  // Only handle GET requests
  if (req.method !== "GET") return;

  // Handle navigation requests (HTML pages)
  if (req.mode === "navigate") {
    event.respondWith(
      fetch(req).catch(() => caches.match("/offline.html"))
    );
    return;
  }

  // STATIC FILES → Cache First
  event.respondWith(
    caches.match(req).then((cached) => {
      if (cached) return cached;

      return fetch(req)
        .then((networkRes) => {
          const clone = networkRes.clone();
          caches.open(CACHE_NAME).then((cache) => cache.put(req, clone));
          return networkRes;
        })
        .catch(() => caches.match("/offline.html"));
    })
  );
});

