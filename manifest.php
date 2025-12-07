<?php
// LYF Mail – Dynamic Manifest for PWA
header("Content-Type: application/manifest+json; charset=utf-8");

$manifest = [
  "name" => "LYF Mail App",
  "short_name" => "LYF Mail",
  "description" => "LYF Mail App delivers curated insights in Health, Business, Career, Self-Help and Creativity.",
  
  "id" => "/",
  "start_url" => "/?source=pwa",
  "scope" => "/",
  "display" => "standalone",
  "orientation" => "portrait",

  "background_color" => "#FFFFFF",
  "theme_color" => "#0B5ED7",
  "lang" => "en-IN",
  "dir" => "ltr",

  "categories" => [
    "productivity",
    "education",
    "lifestyle",
    "business",
    "health"
  ],

  "icons" => [
    ["src" => "/assets/icons/icon-48x48.png",  "sizes" => "48x48",  "type" => "image/png"],
    ["src" => "/assets/icons/icon-72x72.png",  "sizes" => "72x72",  "type" => "image/png"],
    ["src" => "/assets/icons/icon-96x96.png",  "sizes" => "96x96",  "type" => "image/png"],
    ["src" => "/assets/icons/icon-128x128.png", "sizes" => "128x128", "type" => "image/png"],
    ["src" => "/assets/icons/icon-144x144.png", "sizes" => "144x144", "type" => "image/png"],
    ["src" => "/assets/icons/icon-152x152.png", "sizes" => "152x152", "type" => "image/png"],
    ["src" => "/assets/icons/icon-192x192.png", "sizes" => "192x192", "type" => "image/png"],
    ["src" => "/assets/icons/icon-256x256.png", "sizes" => "256x256", "type" => "image/png"],
    ["src" => "/assets/icons/icon-384x384.png", "sizes" => "384x384", "type" => "image/png"],
    ["src" => "/assets/icons/icon-512x512.png", "sizes" => "512x512", "type" => "image/png"]
  ],

  "screenshots" => [
    [
      "src" => "/assets/seo/screenshot-lyfmail-app.png",
      "sizes" => "1080x1920",
      "type" => "image/png",
      "form_factor" => "narrow",
      "label" => "LYF Mail App – Home screen"
    ]
  ],

  "shortcuts" => [
    [
      "name" => "Top Trending Insights",
      "short_name" => "Trending",
      "url" => "/?open=trending"
    ],
    [
      "name" => "Categories",
      "short_name" => "Categories",
      "url" => "/?open=categories"
    ]
  ],

  "prefer_related_applications" => false
];

echo json_encode($manifest, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
?>

