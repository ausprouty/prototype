module.exports = {
  "globDirectory": "public/",
  "globPatterns": [
    "**/*.{png,xml,php,html,jpg,json,ico,gif,svg,lnk,webmanifest}"
  ],
 
  "swDest": "public\\sw.js",

  offlineGoogleAnalytics: true,

  // Define runtime caching rules.
  runtimeCaching: [{
    // Match any request that ends with .png, .jpg, .jpeg or .svg.
    urlPattern: /\.(?:png|jpg|jpeg|svg)$/,
    // Apply a cache-first strategy.
    handler: 'CacheFirst',
    options: {
      // Use a custom cache name.
      cacheName: 'images',
    },
  }],
};
};