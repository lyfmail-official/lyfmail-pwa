<?php
// LYF Mail PWA – app.lyfmail.com
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>LYF Mail App – Smart Insights for Health, Business, Career & Growth</title>

  <!-- Mobile & PWA Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#0B5ED7" />

  <!-- Basic SEO -->
  <meta name="description"
        content="LYF Mail App delivers curated insights in Health, Business, Career, Self-Help and Creativity, plus focused email subscriptions for each category." />
  <meta name="keywords"
        content="LYF Mail, email insights, health, business, career, self-help, creativity, newsletter, learning" />
  <link rel="canonical" href="https://app.lyfmail.com/" />

  <!-- Favicon & App Icons -->
  <link rel="icon" href="/favicon.ico" type="image/x-icon" />
  <!-- Correct Apple Touch Icon Path (192x192 or another size based on your preference) -->
  <link rel="apple-touch-icon" href="/assets/icons/icon-192x192.png" />

  <!-- Open Graph -->
  <meta property="og:title" content="LYF Mail App – Smart Email Insights" />
  <meta property="og:description"
        content="Install the LYF Mail App (PWA) for fast access to curated insights and category-based email subscriptions." />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://app.lyfmail.com/" />
  <meta property="og:site_name" content="LYF Mail" />
  <meta property="og:image" content="https://app.lyfmail.com/assets/seo/og-lyfmail-app.jpg" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="LYF Mail App – Smart Insights for Your Growth" />
  <meta name="twitter:description"
        content="LYF Mail App lets you explore trending insights and subscribe to focused email content across key life categories." />
  <meta name="twitter:image" content="https://app.lyfmail.com/assets/seo/twitter-lyfmail-app.jpg" />

  <!-- Manifest -->
  <link rel="manifest" href="/manifest.php" />

  <!-- Styles -->
  <link rel="stylesheet" href="/css/styles.css" />
</head>

<body>

  <!-- HEADER -->
  <header class="app-header">
    <img src="/assets/logo/logo.png" class="logo-actual" alt="LYF Mail Logo">
  </header>

  <!-- MAIN -->
  <main class="app-main">

    <!-- Primary Page Heading -->
    <h1 class="page-title">Welcome to LYF Mail App</h1>

    <!-- Install App Button -->
    <button id="installLyfMailApp" class="install-app-btn" style="display:none;">
      📲 Install LYF Mail App
    </button>

    <!-- Intro Section -->
    <section class="intro">
      <p>
        LYF Mail curates high-quality insights across Health, Business &amp; Investment,
        Career &amp; Skills, Self-Help, and Creativity. Explore trending ideas and
        subscribe to focused email streams that match your interests.
      </p>
    </section>

    <!-- Trending Insights -->
    <section class="trending">
      <h2>Top Trending Insights</h2>
      <div id="news-list" class="news-list">
        <div class="news-loading">Loading trending insights…</div>
      </div>
    </section>

    <!-- Categories -->
    <section class="categories">
      <h2>Subscribe by Category</h2>

      <article class="card">
        <h3>Health &amp; Wellness</h3>
        <p>Science-based tips, practices and tools to support physical and mental health.</p>
        <button onclick="openSignup('https://health.signup.lyfmail.com')">Subscribe</button>
      </article>

      <article class="card">
        <h3>Business &amp; Investment</h3>
        <p>Insights to grow your income, investments and side projects with less guesswork.</p>
        <button onclick="openSignup('https://financing.signup.lyfmail.com')">Subscribe</button>
      </article>

      <article class="card">
        <h3>Career &amp; Skills</h3>
        <p>Practical ideas to improve productivity, learn skills and move your career forward.</p>
        <button onclick="openSignup('https://career.signup.lyfmail.com')">Subscribe</button>
      </article>

      <article class="card">
        <h3>Self-Help &amp; Personal Growth</h3>
        <p>Mindset, discipline and habit systems to build a better version of yourself.</p>
        <button onclick="openSignup('https://intuition.signup.lyfmail.com')">Subscribe</button>
      </article>

      <article class="card">
        <h3>Creativity &amp; Learning</h3>
        <p>Ideas and tools to spark creativity and keep your learning journey alive.</p>
        <button onclick="openSignup('https://creativity.signup.lyfmail.com')">Subscribe</button>
      </article>

      <article class="card secondary">
        <h3>Knowledge Hub</h3>
        <p>Explore in-depth guides, articles and references in the LYF Mail Knowledge Hub.</p>
        <button onclick="window.open('https://docs.lyfmail.com', '_blank', 'noopener')">Visit Hub</button>
      </article>
    </section>

  </main>

  <!-- FOOTER -->
  <footer class="app-footer">
    <p>&copy; <?php echo date('Y'); ?> LYF Mail. All rights reserved.</p>
    <p><a href="https://lyfmail.com" target="_blank" rel="noopener">Visit main website</a></p>
  </footer>

  <!-- App JS (Rocket Loader Disabled) -->
  <script src="/js/app.js" data-cfasync="false"></script>

  <!-- Schema.org Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "MobileApplication",
    "name": "LYF Mail App",
    "operatingSystem": "Android, iOS, Web",
    "applicationCategory": "Productivity",
    "url": "https://app.lyfmail.com/",
    "image": "https://app.lyfmail.com/assets/icons/icon-512.png",
    "screenshot": "https://app.lyfmail.com/assets/seo/screenshot-lyfmail-app.png",
    "description": "LYF Mail App delivers curated insights in Health, Business, Career, Self-Help and Creativity.",
    "publisher": {
      "@type": "Organization",
      "name": "LYF Mail",
      "url": "https://lyfmail.com/"
    }
  }
  </script>

  <!-- Service Worker Registration -->
  <script data-cfasync="false">
  if ("serviceWorker" in navigator) {
    window.addEventListener("load", () => {
      navigator.serviceWorker.register("/service-worker.js")
        .then(reg => console.log("Service Worker registered:", reg.scope))
        .catch(err => console.error("Service Worker registration failed:", err));
    });
  }
  </script>

</body>
</html>

