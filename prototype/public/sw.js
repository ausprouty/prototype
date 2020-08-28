importScripts("js/analytics-helper.js");

importScripts("js/sw-offline-google-analytics.js");
//goog.offlineGoogleAnalytics.initialize();
var CACHE_DYNAMIC_NAME = "myfriends-run-time-v3";
workbox.googleAnalytics.initialize();
const NOT_FOUND_PAGE = "/not-found.html";

importScripts(
  "https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js"
);

// from https://developers.google.com/web/tools/workbox/

workbox.setConfig({
  debug: true
});

workbox.core.setCacheNameDetails({
  prefix: "myfriends",
  suffix: "v1",
  precache: "install-time",
  runtime: "run-time",
  googleAnalytics: "ga"
});

workbox.precaching.cleanupOutdatedCaches();
workbox.precaching.precacheAndRoute([
  "/",
  "/not-found.html",
  "/js/fetch.js",
  "/js/promise.js",
  "/js/analytics-helper.js"
]);

workbox.routing.registerRoute(
  new RegExp(".*.js"),
  workbox.strategies.StaleWhileRevalidate()
);

workbox.routing.registerRoute(
  new RegExp(".*.css"),
  workbox.strategies.StaleWhileRevalidate()
);

workbox.routing.registerRoute(
  /.*\.(?:html|htm|shtml|png|jpg|jpeg|svg|gif)/g,
  workbox.strategies.StaleWhileRevalidate()({
    cacheName: CACHE_DYNAMIC_NAME
  })
);
