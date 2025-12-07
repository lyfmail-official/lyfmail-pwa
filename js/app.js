/* ==========================================================
   LYF MAIL – FINAL STATIC-ONLY app.js
   Ultra-stable | No API | No fetch | Cloudflare-safe | PWA-safe
========================================================== */

/* -------------------------------
   STATIC TRENDING NEWS
-------------------------------- */
const staticTrendingNews = [
  {
    title: "5-Minute Habits That Boost Your Daily Energy",
    category: "Health & Wellness",
    source: "LYF Mail Knowledge Hub",
    url: "https://docs.lyfmail.com/health-wellness/mind-body-wellness/5-minute-energy-habits"
  },
  {
    title: "3 Low-Risk Business Models You Can Start From Home",
    category: "Business & Investment",
    source: "LYF Mail Docs",
    url: "https://docs.lyfmail.com/financing/entrepreneur/low-risk-online-business-models"
  },
  {
    title: "A Simple Weekly Review System to Grow Your Career",
    category: "Career & Skills",
    source: "LYF Mail",
    url: "https://docs.lyfmail.com/career/simple-weekly-review-system"
  },
  {
    title: "How to Restart After Burnout Without Feeling Guilty",
    category: "Self-Help & Personal Growth",
    source: "LYF Mail",
    url: "https://docs.lyfmail.com/self-help-intuition/restart-after-burnout"
  },
  {
    title: "One 10-Minute Exercise to Unlock Creativity",
    category: "Creativity & Learning",
    source: "LYF Mail",
    url: "https://docs.lyfmail.com/unlocking-creativity-expression-and-culture/10-minute-creative-exercise"
  }
];

/* -------------------------------
   RENDER STATIC TRENDING NEWS
-------------------------------- */
function renderTrending() {
  const container = document.getElementById("news-list");

  // If Rocket Loader delays element creation
  if (!container) {
    console.warn("⚠️ news-list not available yet — retrying...");
    setTimeout(renderTrending, 120);
    return;
  }

  container.innerHTML = "";

  staticTrendingNews.forEach(item => {
    const card = document.createElement("article");
    card.className = "news-item";
    card.onclick = () => window.open(item.url, "_blank", "noopener");

    card.innerHTML = `
      <h3 class="news-title">${item.title}</h3>
      <p class="news-meta">${item.category} • ${item.source}</p>
    `;

    container.appendChild(card);
  });
}

/* -------------------------------
   PWA INSTALL PROMPT HANDLING
-------------------------------- */
let deferredPrompt = null;

window.addEventListener("beforeinstallprompt", event => {
  event.preventDefault();
  deferredPrompt = event;

  const btn = document.getElementById("installLyfMailApp");
  if (btn) btn.style.display = "block";

  btn.onclick = () => {
    if (!deferredPrompt) return;
    deferredPrompt.prompt();
    deferredPrompt = null;
    btn.style.display = "none";
  };
});

/* -------------------------------
   GLOBAL SIGNUP HANDLER
-------------------------------- */
function openSignup(url) {
  try {
    window.open(url, "_blank", "noopener");
  } catch (e) {
    console.error("Signup open error:", e);
  }
}

// Make globally accessible for onclick=""
window.openSignup = openSignup;

/* -------------------------------
   INITIALIZATION
-------------------------------- */
document.addEventListener("DOMContentLoaded", () => {
  renderTrending();
});

