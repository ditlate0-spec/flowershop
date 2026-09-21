<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Flower Shop — свежие букеты с доставкой за 2 часа</title>
<meta name="description" content="Свежие букеты с доставкой за 2 часа. Собственные плантации, флористы с опытом, гарантия свежести 14 дней.">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Open Graph -->
<meta property="og:title" content="Flower Shop — свежие букеты с доставкой за 2 часа">
<meta property="og:description" content="Собственные плантации, гарантия свежести 14 дней">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url('/') }}">

<link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>💐</text></svg>">
 
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
  (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
  m[i].l=1*new Date();
  for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
  k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
  (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

  ym(XXXXXXXX, "init", {
    clickmap:true,
    trackLinks:true,
    accurateTrackBounce:true,
    webvisor:true,
    ecommerce:"dataLayer"
  });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/XXXXXXXX" style="position:absolute; left:-9999px;" alt=""></div></noscript>
<!-- /Yandex.Metrika counter -->

<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --bg: #f7f3ee;
    --surface: #ffffff;
    --text: #1a1a1a;
    --text-muted: #8a8a8a;
    --border: #eaeae6;
    --accent: #1a1a1a;
    --accent-hover: #b8926a;
  }

  body.dark {
    --bg: #121212;
    --surface: #1c1c1c;
    --text: #f2f2f2;
    --text-muted: #999;
    --border: #2a2a2a;
    --accent: #f2f2f2;
    --accent-hover: #d4b088;
  }

  html, body { overflow: hidden; }

  body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    background: var(--bg);
    color: var(--text);
    transition: background .3s, color .3s;
  }

  /* ============================================================
     9. КАСТОМНЫЙ КУРСОР
     ============================================================ */
  @media (min-width: 1024px) {
    body.custom-cursor, body.custom-cursor * { cursor: none !important; }

    .cursor-dot {
      position: fixed; top: 0; left: 0;
      width: 8px; height: 8px;
      background: var(--accent-hover);
      border-radius: 50%;
      pointer-events: none;
      z-index: 10000;
      transform: translate(-50%, -50%);
      transition: width .25s ease, height .25s ease, background .25s ease;
      mix-blend-mode: difference;
      will-change: transform;
    }

    .cursor-ring {
      position: fixed; top: 0; left: 0;
      width: 36px; height: 36px;
      border: 1.5px solid var(--accent-hover);
      border-radius: 50%;
      pointer-events: none;
      z-index: 9999;
      transform: translate(-50%, -50%);
      transition: width .25s ease, height .25s ease, opacity .25s ease, border-color .25s;
      opacity: 0.6;
      will-change: transform;
    }

    body.cursor-hover .cursor-dot { width: 0; height: 0; }

    body.cursor-hover .cursor-ring {
      width: 64px; height: 64px;
      opacity: 1;
      background: rgba(212, 176, 136, 0.15);
      border-color: var(--accent-hover);
    }

    body.cursor-hover .cursor-ring::after {
      content: '';
      position: absolute;
      top: 50%; left: 50%;
      width: 6px; height: 6px;
      background: var(--accent-hover);
      border-radius: 50%;
      transform: translate(-50%, -50%);
    }
  }

  /* ============================================================
     ПРЕЛОАДЕР
     ============================================================ */
  .preloader {
    position: fixed; inset: 0;
    z-index: 9999;
    background: #121212;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 20px;
    transition: opacity .6s ease, visibility .6s ease;
  }

  .preloader.hidden { opacity: 0; visibility: hidden; }

  .preloader-bouquet { font-size: 64px; animation: pulse 1.4s ease-in-out infinite; }

  @keyframes pulse {
    0%, 100% { transform: scale(1); opacity: 0.85; }
    50%      { transform: scale(1.15); opacity: 1; }
  }

  .preloader-bar {
    width: 120px; height: 2px;
    background: rgba(255,255,255,0.15);
    border-radius: 2px;
    overflow: hidden;
  }

  .preloader-bar::after {
    content: '';
    display: block;
    width: 40%; height: 100%;
    background: var(--accent-hover);
    border-radius: 2px;
    animation: loading 1.4s ease-in-out infinite;
  }

  @keyframes loading {
    0%   { transform: translateX(-100%); }
    100% { transform: translateX(300%); }
  }

  /* ============================================================
     СКРОЛЛ-КОНТЕЙНЕР
     ============================================================ */
  .scroll-container {
    height: 100vh;
    overflow-y: auto;
    scrollbar-width: thin;
    scrollbar-color: var(--accent-hover) transparent;
  }

  .scroll-container::-webkit-scrollbar { width: 8px; }
  .scroll-container::-webkit-scrollbar-track { background: transparent; }
  .scroll-container::-webkit-scrollbar-thumb {
    background: var(--accent-hover);
    border-radius: 4px;
    opacity: 0.5;
  }

 .scroll-section {
  position: relative;
  height: 100vh;
  display: flex;
  flex-direction: column;
  box-sizing: border-box;
  overflow: hidden;
}

  .scroll-section.growable { height: auto; min-height: 100vh; }

  /* ============================================================
     11. ФОН С ПЯТНАМИ
     ============================================================ */
  .bg-blobs {
    position: absolute; inset: 0;
    overflow: hidden;
    pointer-events: none;
    z-index: 0;
  }

  .blob {
    position: absolute;
    border-radius: 50%;
    filter: blur(80px);
    opacity: 0.45;
    will-change: transform;
    transition: transform .1s linear;
  }

  .blob-1 { width: 500px; height: 500px; background: #f5c6d0; top: -100px; left: -100px; }
  .blob-2 { width: 450px; height: 450px; background: #c9d4e8; bottom: -80px; right: -80px; }
  .blob-3 { width: 350px; height: 350px; background: #e8d5b7; top: 40%; right: 20%; opacity: 0.35; }

  body.dark .blob { opacity: 0.15; }

  /* ============================================================
     ШАПКА
     ============================================================ */
  .header {
    position: fixed;
    top: 0; left: 0; right: 0;
    z-index: 100;
    padding: 12px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    pointer-events: none;
  }

  .header > * { pointer-events: auto; }

  .logo {
    font-size: 16px;
    font-weight: 700;
    letter-spacing: -0.5px;
    text-decoration: none;
    color: var(--text);
    display: flex;
    align-items: center;
    gap: 6px;
    background: rgba(255,255,255,0.7);
    backdrop-filter: blur(10px);
    padding: 7px 14px;
    border-radius: 999px;
    transition: background .3s;
  }

  body.dark .logo { background: rgba(28,28,28,0.7); }
  .logo span { color: var(--accent-hover); }

  .logo-bouquet {
    display: inline-block;
    animation: bouquetSway 4s ease-in-out infinite;
    transform-origin: bottom center;
  }

  @keyframes bouquetSway {
    0%, 100% { transform: rotate(-6deg) scale(1); }
    25%      { transform: rotate(0deg) scale(1.05); }
    50%      { transform: rotate(6deg) scale(1); }
    75%      { transform: rotate(0deg) scale(1.05); }
  }

  .logo:hover .logo-bouquet { animation: bouquetWink .6s ease-in-out; }

  @keyframes bouquetWink {
    0%   { transform: rotate(0deg) scale(1); }
    30%  { transform: rotate(-20deg) scale(1.2); }
    60%  { transform: rotate(20deg) scale(1.2); }
    100% { transform: rotate(0deg) scale(1); }
  }

  .header-actions {
    display: flex;
    align-items: center;
    gap: 6px;
    background: rgba(255,255,255,0.7);
    backdrop-filter: blur(10px);
    padding: 3px;
    border-radius: 999px;
    transition: background .3s;
  }

  body.dark .header-actions { background: rgba(28,28,28,0.7); }

  /* ============================================================
     СЕЛЕКТОР СТРАНЫ
     ============================================================ */
  .country-select {
    display: flex;
    align-items: center;
    gap: 4px;
    padding: 0 8px;
    height: 32px;
    border: none;
    background: transparent;
    color: var(--text);
    font-size: 12px;
    font-weight: 500;
    font-family: inherit;
    cursor: pointer;
    border-radius: 999px;
    transition: background .2s;
    outline: none;
    appearance: none;
    -webkit-appearance: none;
    padding-right: 20px;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12'%3e%3cpath fill='%238a8a8a' d='M6 9L1 4h10z'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 6px center;
    background-size: 8px;
  }

  .country-select:hover { background-color: var(--border); }

  .country-select option {
    background: var(--surface);
    color: var(--text);
  }

  .icon-btn {
    width: 32px; height: 32px;
    border: none;
    background: transparent;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    color: var(--text);
    transition: background .2s, transform .2s;
    position: relative;
  }

  .icon-btn:hover { background: var(--border); transform: scale(1.08); }

  .cart-badge {
    position: absolute;
    top: 0px; right: 0px;
    min-width: 14px; height: 14px;
    background: var(--accent-hover);
    color: #fff;
    font-size: 9px;
    font-weight: 700;
    border-radius: 7px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 3px;
  }

  @keyframes cartBounce {
    0%   { transform: scale(1) rotate(0deg); }
    25%  { transform: scale(1.25) rotate(-12deg); }
    50%  { transform: scale(1.3) rotate(10deg); }
    75%  { transform: scale(1.15) rotate(-5deg); }
    100% { transform: scale(1) rotate(0deg); }
  }

  .cart-icon { display: inline-block; transition: transform .2s; }

  #cartToggle.bounce .cart-icon {
    animation: cartBounce .7s cubic-bezier(0.34, 1.56, 0.64, 1);
  }

  @keyframes badgePulse {
    0%   { transform: scale(1); box-shadow: 0 0 0 0 rgba(212, 176, 136, 0.7); }
    50%  { transform: scale(1.3); box-shadow: 0 0 0 8px rgba(212, 176, 136, 0); }
    100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(212, 176, 136, 0); }
  }

  .cart-badge.pulse { animation: badgePulse .7s ease-out; }

  /* ============================================================
     HERO
     ============================================================ */
.hero-section { justify-content: center; align-items: center; overflow: visible; }
  .hero-text {
    position: absolute;
    top: 12%;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    z-index: 5;
    width: 100%;
    padding: 0 24px;
    pointer-events: none;
  }

  .hero-text h1 {
    font-size: clamp(26px, 3.5vw, 42px);
    font-weight: 700;
    letter-spacing: -1px;
    line-height: 1.15;
    margin-bottom: 10px;
  }

  .hero-text p {
    font-size: clamp(13px, 1.4vw, 16px);
    color: var(--text-muted);
    max-width: 520px;
    margin: 0 auto;
    line-height: 1.5;
  }






/* ============================================================
   HERO CAROUSEL (без Swiper, бесконечный цикл, 1 слева / 1 справа)
   ============================================================ */
.hero-carousel {
  position: relative;
  width: 100%;
  max-width: 1400px;
  height: 62vh;
  margin-top: 70px;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  z-index: 2;
  perspective: 1400px;
}

.hero-track {
  position: relative;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  transform-style: preserve-3d;
}

.hero-item {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 440px;
  height: 440px;
  display: flex;
  align-items: center;
  justify-content: center;
  transform-style: preserve-3d;
  transition: transform .7s cubic-bezier(.4, 0, .2, 1),
              opacity .7s ease;
  cursor: pointer;
  will-change: transform, opacity;
}

.hero-item .product-image {
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  transform-style: preserve-3d;
}

.hero-item .product-image img {
  max-width: 100%;
  max-height: 100%;
  width: auto;
  height: auto;
  object-fit: contain;
  display: block;
  pointer-events: none;
  filter: drop-shadow(0 20px 30px rgba(0,0,0,0.18))
          drop-shadow(0 40px 60px rgba(0,0,0,0.12));
}

/* Позиции */
.hero-item.pos-center {
  transform: translate(-50%, -50%) translateX(0) scale(1);
  opacity: 1;
  z-index: 3;
  animation: float3d 8s ease-in-out infinite;
}
.hero-item.pos-left {
  transform: translate(-50%, -50%) translateX(-320px) scale(0.72);
  opacity: 0.55;
  z-index: 2;
  animation: none;
}

.hero-item.pos-right {
  transform: translate(-50%, -50%) translateX(320px) scale(0.72);
  opacity: 0.55;
  z-index: 2;
  animation: none;
}

.hero-item.pos-hidden-left {
  transform: translate(-50%, -50%) translateX(-640px) scale(0.5);
  opacity: 0;
  z-index: 1;
  pointer-events: none;
  animation: none;
}

.hero-item.pos-hidden-right {
  transform: translate(-50%, -50%) translateX(640px) scale(0.5);
  opacity: 0;
  z-index: 1;
  pointer-events: none;
  animation: none;
}
/* Кнопки */
.hero-nav {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: 64px; height: 64px;
  background: transparent;
  border: none;
  color: var(--text-muted);
  font-size: 42px;
  font-weight: 700;
  line-height: 1;
  cursor: pointer;
  z-index: 10;
  transition: color .2s, transform .2s;
  font-family: inherit;
}

.hero-nav:hover { color: var(--text); transform: translateY(-50%) scale(1.15); }

.hero-prev { left: 40px; }
.hero-next { right: 40px; }

@media (max-width: 1000px) {
  .hero-item { width: 340px; height: 340px; }
  .hero-item.pos-left  { transform: translate(-50%, -50%) translateX(-320px) scale(0.72); }
  .hero-item.pos-right { transform: translate(-50%, -50%) translateX(320px)  scale(0.72); }
  .hero-item.pos-hidden-left  { transform: translate(-50%, -50%) translateX(-640px) scale(0.5); }
  .hero-item.pos-hidden-right { transform: translate(-50%, -50%) translateX(640px)  scale(0.5); }
}

@media (max-width: 768px) {
  .hero-carousel { height: 50vh; margin-top: 20px; }
  .hero-item { width: 260px; height: 260px; }
  .hero-item.pos-left  { transform: translate(-50%, -50%) translateX(-240px) scale(0.7); }
  .hero-item.pos-right { transform: translate(-50%, -50%) translateX(240px)  scale(0.7); }
  .hero-nav { width: 44px; height: 44px; font-size: 30px; }
  .hero-prev { left: 8px; }
  .hero-next { right: 8px; }
}








  .scroll-down {
    position: absolute;
    bottom: 32px;
    left: 50%;
    transform: translateX(-50%);
    background: transparent;
    border: none;
    cursor: pointer;
    font-size: 26px;
    color: var(--text-muted);
    animation: bounce 2s infinite;
    transition: color .2s;
    z-index: 10;
  }

  .scroll-down:hover { color: var(--text); }

  @keyframes bounce {
    0%, 100% { transform: translate(-50%, 0); }
    50%      { transform: translate(-50%, 8px); }
  }

  /* ============================================================
     КАТАЛОГ
     ============================================================ */
  .catalog-section { background: var(--bg); }

  .catalog-page {
    height: 100vh;
    padding: 55px 20px 40px;
    display: flex;
    flex-direction: column;
    position: relative;
    box-sizing: border-box;
    overflow: hidden;
  }

  .catalog-page-hint {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    color: var(--text-muted);
    font-size: 11px;
    letter-spacing: 0.5px;
    opacity: 0.6;
    animation: bounce 2s infinite;
    pointer-events: none;
  }

  .catalog-head { text-align: center; margin-bottom: 8px; }

  .catalog-head h1 {
    font-size: clamp(16px, 1.8vw, 22px);
    font-weight: 700;
    letter-spacing: -0.5px;
    margin-bottom: 1px;
  }

  .catalog-head p { font-size: 10px; color: var(--text-muted); }

  .filters {
    max-width: 1200px;
    margin: 0 auto 8px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 4px;
  }

  .filter-btn {
    padding: 4px 10px;
    background: var(--surface);
    color: var(--text);
    border: 1px solid var(--border);
    border-radius: 999px;
    font-size: 9px;
    font-weight: 500;
    cursor: pointer;
    transition: background .2s, color .2s, border-color .2s, transform .2s;
    font-family: inherit;
  }

  .filter-btn:hover { border-color: var(--accent-hover); transform: translateY(-1px); }
  .filter-btn.active { background: var(--accent); color: var(--bg); border-color: var(--accent); }

  .filter-sep { width: 1px; height: 14px; background: var(--border); margin: 0 2px; }

  .catalog {
    max-width: 1100px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 6px;
    width: 100%;
  }

  .card {
    background: var(--surface);
    border-radius: 10px;
    overflow: hidden;
    border: 1px solid var(--border);
    transition: transform .35s ease, border-color .35s ease, box-shadow .35s ease;
    display: flex;
    flex-direction: column;
    opacity: 0;
    transform: translateY(30px);
    cursor: pointer;
  }

  .card.visible { opacity: 1; transform: translateY(0); }
  .card.hide { display: none; }

  .card:hover {
    transform: translateY(-3px);
    border-color: var(--accent-hover);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
  }

  .card-image {
    aspect-ratio: 5 / 4;
    background: linear-gradient(180deg, var(--bg) 0%, var(--surface) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 4px;
    position: relative;
    overflow: hidden;
  }

  .card-image img {
    max-width: 100%;
    max-height: 100%;
    width: auto;
    height: auto;
    object-fit: contain;
    display: block;
    filter: drop-shadow(0 6px 12px rgba(0,0,0,0.15));
    transition: transform .4s ease, opacity .4s ease;
    opacity: 0;
  }

  .card-image img.loaded { opacity: 1; }

  .card-image::before {
    content: '';
    position: absolute;
    inset: 15%;
    border-radius: 12px;
    background: linear-gradient(90deg, rgba(140,140,140,0.08) 0%, rgba(140,140,140,0.18) 50%, rgba(140,140,140,0.08) 100%);
    background-size: 200% 100%;
    animation: skeleton 1.5s ease-in-out infinite;
    opacity: 1;
    transition: opacity .4s;
    z-index: 0;
  }

  .card-image.skeleton-done::before { opacity: 0; }

  @keyframes skeleton {
    0%   { background-position: 200% 0; }
    100% { background-position: -200% 0; }
  }

  .card:hover .card-image img { transform: scale(1.05) rotate(-2deg); }

  .badge {
    position: absolute;
    top: 5px; left: 5px;
    background: var(--accent-hover);
    color: #fff;
    font-size: 7px;
    font-weight: 700;
    padding: 2px 6px;
    border-radius: 999px;
    letter-spacing: 0.3px;
    text-transform: uppercase;
    z-index: 2;
  }

  .card-body {
    padding: 5px 9px 7px;
    display: flex;
    flex-direction: column;
    gap: 1px;
  }

  .card-name { font-size: 11px; font-weight: 600; line-height: 1.2; }
  .card-desc { font-size: 8px; color: var(--text-muted); line-height: 1.2; }

  .card-bottom {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 5px;
    margin-top: 4px;
  }

  .card-price { font-size: 12px; font-weight: 700; letter-spacing: -0.3px; }
  .card-price .old {
    font-size: 8px;
    color: var(--text-muted);
    text-decoration: line-through;
    font-weight: 400;
    margin-left: 2px;
  }

  .btn-add {
    padding: 4px 9px;
    background: var(--accent);
    color: var(--bg);
    border: none;
    border-radius: 999px;
    font-size: 9px;
    font-weight: 600;
    cursor: pointer;
    transition: background .2s, transform .2s;
    white-space: nowrap;
    font-family: inherit;
  }

  .btn-add:hover { background: var(--accent-hover); transform: translateY(-1px); }

  .empty-message {
    grid-column: 1 / -1;
    text-align: center;
    padding: 60px 20px;
    color: var(--text-muted);
    font-size: 14px;
  }

  .features {
    max-width: 1100px;
    margin: 16px auto 0;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 5px;
    width: 100%;
  }

  .feature {
    display: flex;
    align-items: center;
    gap: 5px;
    padding: 5px 8px;
    border-radius: 7px;
    background: var(--surface);
    border: 1px solid var(--border);
  }

  .feature-icon { font-size: 12px; flex-shrink: 0; }
  .feature-text h3 { font-size: 9px; font-weight: 600; margin-bottom: 0; }
  .feature-text p { font-size: 8px; color: var(--text-muted); line-height: 1.1; }

  /* ============================================================
     О НАС + ФУТЕР
     ============================================================ */
  .about-section {
    padding: 60px 24px 40px;
    background: var(--bg);
    justify-content: center;
    overflow-y: auto;
    height: auto;
    min-height: 100vh;
  }

  .about-inner { max-width: 900px; margin: 0 auto; text-align: center; }

  .about-section h2 {
    font-size: clamp(20px, 2.4vw, 28px);
    font-weight: 700;
    letter-spacing: -0.6px;
    margin-bottom: 16px;
  }

  .about-section p {
    font-size: 14px;
    color: var(--text-muted);
    line-height: 1.7;
    max-width: 640px;
    margin: 0 auto 12px;
  }

  .about-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
    margin-top: 32px;
  }

  .stat {
    padding: 20px;
    border-radius: 14px;
    background: var(--surface);
    border: 1px solid var(--border);
  }

  .stat strong {
    display: block;
    font-size: 28px;
    font-weight: 700;
    letter-spacing: -1px;
    color: var(--accent-hover);
    margin-bottom: 4px;
  }

  .stat span { font-size: 12px; color: var(--text-muted); }

  /* ФУТЕР */
  .footer {
    margin-top: 48px;
    padding-top: 32px;
    border-top: 1px solid var(--border);
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
    text-align: left;
  }

  .footer-col h4 {
    font-size: 12px;
    font-weight: 700;
    margin-bottom: 10px;
    letter-spacing: -0.2px;
    color: var(--text);
  }

  .footer-col p, .footer-col a {
    font-size: 12px;
    color: var(--text-muted);
    line-height: 1.8;
    text-decoration: none;
    display: block;
    transition: color .2s;
  }

  .footer-col a:hover { color: var(--accent-hover); }

  .footer-bottom {
    grid-column: 1 / -1;
    margin-top: 16px;
    padding-top: 16px;
    border-top: 1px solid var(--border);
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 11px;
    color: var(--text-muted);
    flex-wrap: wrap;
    gap: 8px;
  }

  .footer-social { display: flex; gap: 8px; }

  .footer-social a {
    width: 28px; height: 28px;
    border-radius: 50%;
    background: var(--surface);
    border: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    transition: background .2s, border-color .2s, transform .2s;
  }

  .footer-social a:hover {
    background: var(--accent-hover);
    border-color: var(--accent-hover);
    transform: translateY(-2px);
  }

  /* ============================================================
     МОДАЛЬНОЕ ОКНО
     ============================================================ */
  .modal-overlay {
    position: fixed; inset: 0;
    background: rgba(0,0,0,0.55);
    backdrop-filter: blur(4px);
    z-index: 200;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    opacity: 0;
    visibility: hidden;
    transition: opacity .3s, visibility .3s;
  }

  .modal-overlay.open { opacity: 1; visibility: visible; }

  .modal {
    background: var(--surface);
    border-radius: 20px;
    width: 100%;
    max-width: 480px;
    max-height: 85vh;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    transform: scale(0.94);
    transition: transform .3s ease;
    border: 1px solid var(--border);
  }

  .modal-overlay.open .modal { transform: scale(1); }

  .modal-header {
    padding: 20px 24px 14px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid var(--border);
  }

  .modal-header h2 { font-size: 18px; font-weight: 700; letter-spacing: -0.4px; }

  .modal-close {
    width: 32px; height: 32px;
    border: none;
    background: transparent;
    border-radius: 50%;
    cursor: pointer;
    font-size: 18px;
    color: var(--text-muted);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background .2s, color .2s;
  }

  .modal-close:hover { background: var(--border); color: var(--text); }

  .modal-body { padding: 16px 24px; overflow-y: auto; flex: 1; }

  .modal-empty { text-align: center; padding: 40px 0; color: var(--text-muted); font-size: 14px; }

  .modal-empty span { display: block; font-size: 40px; margin-bottom: 12px; opacity: 0.5; }

  .cart-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 0;
    border-bottom: 1px solid var(--border);
  }

  .cart-item:last-child { border-bottom: none; }

  .cart-item-img {
    width: 60px; height: 60px;
    border-radius: 10px;
    background: var(--bg);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  .cart-item-img img { max-width: 80%; max-height: 80%; object-fit: contain; }

  .cart-item-info { flex: 1; min-width: 0; }

  .cart-item-name { font-size: 13px; font-weight: 600; margin-bottom: 2px; }
  .cart-item-price { font-size: 12px; color: var(--text-muted); }

  .cart-item-qty { display: flex; align-items: center; gap: 6px; }

  .qty-btn {
    width: 24px; height: 24px;
    border: 1px solid var(--border);
    background: transparent;
    border-radius: 6px;
    cursor: pointer;
    font-size: 12px;
    color: var(--text);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background .2s, border-color .2s;
    font-family: inherit;
  }

  .qty-btn:hover { background: var(--border); border-color: var(--accent-hover); }

  .qty-value { font-size: 13px; font-weight: 600; min-width: 20px; text-align: center; }

  .promo-row { display: flex; gap: 8px; margin-top: 12px; }

  .promo-input {
    flex: 1;
    padding: 10px 14px;
    background: var(--bg);
    border: 1px solid var(--border);
    border-radius: 10px;
    color: var(--text);
    font-size: 13px;
    font-family: inherit;
    outline: none;
    transition: border-color .2s;
  }

  .promo-input:focus { border-color: var(--accent-hover); }

  .promo-btn {
    padding: 10px 16px;
    background: var(--accent);
    color: var(--bg);
    border: none;
    border-radius: 10px;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    font-family: inherit;
    transition: background .2s;
    white-space: nowrap;
  }

  .promo-btn:hover { background: var(--accent-hover); }

  .promo-hint { font-size: 11px; color: var(--text-muted); margin-top: 6px; }
  .promo-hint.success { color: #22c55e; }

  .order-form {
    display: none;
    flex-direction: column;
    gap: 10px;
    padding: 16px 0;
    border-top: 1px solid var(--border);
    margin-top: 12px;
  }

  .order-form.show { display: flex; }

  .order-form h3 { font-size: 14px; font-weight: 600; margin-bottom: 4px; }

  .order-form input, .order-form textarea {
    width: 100%;
    padding: 10px 14px;
    background: var(--bg);
    border: 1px solid var(--border);
    border-radius: 10px;
    color: var(--text);
    font-size: 13px;
    font-family: inherit;
    outline: none;
    transition: border-color .2s;
    resize: none;
  }

  .order-form input:focus, .order-form textarea:focus { border-color: var(--accent-hover); }

  .order-form input.error { border-color: #ef4444; }

  .phone-group {
    display: flex;
    gap: 8px;
    align-items: stretch;
  }

  .phone-group .country-mini {
    width: 80px;
    padding: 10px 8px;
    background: var(--bg);
    border: 1px solid var(--border);
    border-radius: 10px;
    color: var(--text);
    font-size: 12px;
    font-family: inherit;
    outline: none;
    cursor: pointer;
    appearance: none;
    -webkit-appearance: none;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12'%3e%3cpath fill='%238a8a8a' d='M6 9L1 4h10z'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 6px center;
    background-size: 8px;
    padding-right: 20px;
  }

  .phone-group .country-mini:focus { border-color: var(--accent-hover); }

  .phone-group input {
    flex: 1;
  }

  .modal-footer {
    padding: 16px 24px 20px;
    border-top: 1px solid var(--border);
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  .modal-total {
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 15px;
  }

  .modal-total strong { font-size: 20px; font-weight: 700; letter-spacing: -0.4px; }

  .modal-total .discount { font-size: 12px; color: #22c55e; font-weight: 600; }

  .modal-checkout {
    width: 100%;
    padding: 14px;
    background: var(--accent);
    color: var(--bg);
    border: none;
    border-radius: 999px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: background .2s, transform .2s;
    font-family: inherit;
  }

  .modal-checkout:hover { background: var(--accent-hover); transform: translateY(-1px); }
  .modal-checkout:disabled { opacity: 0.4; cursor: not-allowed; transform: none; }

  .modal-submit {
    width: 100%;
    padding: 14px;
    background: var(--accent-hover);
    color: #fff;
    border: none;
    border-radius: 999px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    font-family: inherit;
    transition: background .2s;
  }

  .modal-submit:hover { background: #a07c55; }
  .modal-submit:disabled { opacity: 0.6; cursor: wait; }

  /* ============================================================
     МОДАЛКА ТОВАРА
     ============================================================ */
  .product-modal .modal { max-width: 720px; }

  .product-modal-body {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
    padding: 24px;
  }

  .product-modal-img {
    background: var(--bg);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    aspect-ratio: 1 / 1;
    overflow: hidden;
    cursor: zoom-in;
    position: relative;
  }

  .product-modal-img img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    filter: drop-shadow(0 10px 20px rgba(0,0,0,0.15));
    transition: transform .4s ease;
    transform-origin: center center;
  }

  .product-modal-img.zoomed { cursor: zoom-out; }
  .product-modal-img.zoomed img { transform: scale(1.7); }

  .product-modal-img::after {
    content: '🔍 Нажмите, чтобы увеличить';
    position: absolute;
    bottom: 10px; left: 50%;
    transform: translateX(-50%);
    font-size: 10px;
    color: var(--text-muted);
    background: var(--surface);
    padding: 4px 10px;
    border-radius: 999px;
    opacity: 0;
    transition: opacity .3s;
    pointer-events: none;
    white-space: nowrap;
  }

  .product-modal-img:hover::after { opacity: 1; }
  .product-modal-img.zoomed::after { content: '✕ Уменьшить'; }

  .product-modal-info h3 { font-size: 20px; font-weight: 700; margin-bottom: 6px; letter-spacing: -0.4px; }

  .product-modal-info .desc {
    font-size: 13px;
    color: var(--text-muted);
    line-height: 1.6;
    margin-bottom: 14px;
  }

  .product-modal-info .price { font-size: 24px; font-weight: 700; margin-bottom: 16px; }

  .product-modal-info .price .old {
    font-size: 14px;
    color: var(--text-muted);
    text-decoration: line-through;
    font-weight: 400;
    margin-left: 8px;
  }

  .product-modal-meta {
    font-size: 12px;
    color: var(--text-muted);
    line-height: 1.8;
    margin-bottom: 16px;
  }

  .product-modal-meta div {
    display: flex;
    justify-content: space-between;
    padding: 6px 0;
    border-bottom: 1px solid var(--border);
  }

  .product-modal-meta div:last-child { border-bottom: none; }
  .product-modal-meta strong { color: var(--text); font-weight: 600; }

  /* ============================================================
     АДМИНКА
     ============================================================ */
  .admin-modal-window {
    max-width: 1200px;
    width: 95vw;
    height: 88vh;
    max-height: 88vh;
    display: flex;
    flex-direction: column;
    padding: 0;
    overflow: hidden;
  }

  .admin-modal-window .modal-header {
    padding: 16px 24px;
    border-bottom: 1px solid var(--border);
    flex-shrink: 0;
  }

  .admin-modal-window .modal-header h2 { font-size: 16px; letter-spacing: -0.3px; }

  .admin-frame {
    width: 100%;
    flex: 1;
    border: none;
    display: block;
    background: #fff;
  }

  /* ============================================================
     УВЕДОМЛЕНИЯ
     ============================================================ */
  .toast-container {
    position: fixed;
    top: 80px;
    right: 20px;
    z-index: 500;
    display: flex;
    flex-direction: column;
    gap: 8px;
    pointer-events: none;
  }

  .toast {
    background: var(--surface);
    border: 1px solid var(--border);
    border-left: 3px solid var(--accent-hover);
    border-radius: 12px;
    padding: 12px 16px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    font-size: 13px;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 10px;
    min-width: 240px;
    max-width: 320px;
    animation: toastIn .4s cubic-bezier(0.34, 1.56, 0.64, 1);
    pointer-events: auto;
  }

  .toast.error { border-left-color: #ef4444; }
  .toast.warning { border-left-color: #f59e0b; }
  .toast.success { border-left-color: #22c55e; }

  .toast.hide { animation: toastOut .3s ease forwards; }

  @keyframes toastIn {
    from { opacity: 0; transform: translateX(100%); }
    to   { opacity: 1; transform: translateX(0); }
  }

  @keyframes toastOut {
    from { opacity: 1; transform: translateX(0); }
    to   { opacity: 0; transform: translateX(100%); }
  }

  .toast-icon { font-size: 20px; flex-shrink: 0; }

  .fly-icon {
    position: fixed;
    z-index: 400;
    font-size: 24px;
    pointer-events: none;
    transition: all .8s cubic-bezier(0.34, 0.9, 0.4, 1);
  }

  /* ============================================================
     АДАПТИВ
     ============================================================ */
  @media (max-width: 1000px) {
    .catalog { grid-template-columns: repeat(2, 1fr); }
    .product-image { width: 340px; height: 340px; }
    .swiper-button-prev { left: 20px; }
    .swiper-button-next { right: 20px; }
    .footer { grid-template-columns: 1fr 1fr; gap: 20px; }
  }
@media (max-width: 768px) {
  /* ===== Разрешить вертикальный скролл внутри секции "О нас" ===== */
  .about-section {
    padding: 80px 16px 30px;
    justify-content: flex-start;   /* было center — из-за этого контент обрезался */
    overflow-y: auto;
    -webkit-overflow-scrolling: touch;
  }

  .about-inner {
    max-width: 100%;
  }

  .about-section h2 {
    font-size: 20px;
    margin-bottom: 12px;
  }

  .about-section p {
    font-size: 13px;
    line-height: 1.6;
    margin-bottom: 10px;
  }

  .about-stats {
    grid-template-columns: 1fr;
    gap: 10px;
    margin-top: 20px;
  }

  .stat {
    padding: 14px;
    text-align: center;
  }

  .stat strong {
    font-size: 22px;
  }

  .stat span {
    font-size: 11px;
  }

  .features {
    grid-template-columns: 1fr;
    gap: 6px;
    margin-top: 16px;
  }

  .feature {
    padding: 8px 10px;
  }

  .feature-icon { font-size: 14px; }
  .feature-text h3 { font-size: 10px; }
  .feature-text p { font-size: 9px; }

  /* ===== Футер ===== */
  .footer {
    grid-template-columns: 1fr;
    gap: 16px;
    padding-top: 24px;
    margin-top: 28px;
    text-align: left;
  }

  .footer-col h4 {
    font-size: 11px;
    margin-bottom: 6px;
  }

  .footer-col p,
  .footer-col a {
    font-size: 11px;
    line-height: 1.6;
  }

  .footer-bottom {
    flex-direction: column;
    align-items: flex-start;
    gap: 4px;
    font-size: 10px;
    margin-top: 12px;
    padding-top: 12px;
  }

  .footer-social a {
    width: 26px;
    height: 26px;
    font-size: 12px;
  }

  /* ===== Остальное из прошлой адаптации ===== */
  .hero-text { top: 8%; }
  .hero-swiper { height: 50vh; margin-top: 20px; }
  .product-image { width: 260px; height: 260px; }

  .swiper-button-prev, .swiper-button-next { width: 44px; height: 44px; }
  .swiper-button-prev::after, .swiper-button-next::after { font-size: 24px; }
  .swiper-button-prev { left: 8px; }
  .swiper-button-next { right: 8px; }

  .catalog-section { padding: 50px 14px 20px; }
  .catalog { grid-template-columns: 1fr; gap: 10px; }

  .blob { filter: blur(60px); }
  .blob-1 { width: 300px; height: 300px; }
  .blob-2 { width: 280px; height: 280px; }
  .blob-3 { display: none; }

  .modal { max-height: 90vh; }
  .product-modal-body { grid-template-columns: 1fr; gap: 16px; padding: 16px; }
  .toast-container { top: 70px; right: 10px; left: 10px; }
  .toast { max-width: none; }

  .country-select { font-size: 11px; padding: 0 6px; padding-right: 18px; }

  .admin-modal-window {
    width: 100vw;
    height: 100vh;
    max-width: none;
    max-height: none;
    border-radius: 0;
  }
}
</style>
</head>
<body class="dark">

<div class="cursor-dot" id="cursorDot"></div>
<div class="cursor-ring" id="cursorRing"></div>

<div class="preloader" id="preloader">
  <div class="preloader-bouquet">💐</div>
  <div class="preloader-bar"></div>
</div>

<header class="header">
  <a href="#" class="logo">
    <span class="logo-bouquet">💐</span> Flower<span>Shop</span>
  </a>
  <div class="header-actions">
    <select class="country-select" id="countrySelect" aria-label="Страна и валюта">
      <option value="RU">🇷🇺 RU ₽</option>
      <option value="US">🇺🇸 US $</option>
      <option value="EU">🇪🇺 EU €</option>
      <option value="BY">🇧🇾 BY Br</option>
      <option value="KZ">🇰🇿 KZ ₸</option>
    </select>
    <button class="icon-btn" id="themeToggle" aria-label="Переключить тему">☀️</button>
    <button class="icon-btn" id="cartToggle" aria-label="Открыть корзину">
      <span class="cart-icon">🛒</span>
      <span class="cart-badge" id="cartBadge">0</span>
    </button>
  </div>
</header>

<div class="scroll-container" id="scrollContainer">

  <!-- HERO -->
  <section class="scroll-section hero-section" id="top">
    <div class="bg-blobs">
      <div class="blob blob-1" data-parallax="0.3"></div>
      <div class="blob blob-2" data-parallax="0.5"></div>
      <div class="blob blob-3" data-parallax="0.4"></div>
    </div>

    <div class="hero-text">
      <h1>Цветы, которые говорят за вас</h1>
      <p>Собираем букеты каждое утро — доставим за 2 часа в любую точку города</p>
    </div>
@php
  // Все товары с badge (Хит, Новинка и т.п.). Если таких нет — все товары.
  $heroProducts = $products->filter(fn($p) => !empty($p->badge))->values();
  if ($heroProducts->count() === 0) {
      $heroProducts = $products->values();
  }
@endphp

@if($heroProducts->count() > 0)
<div class="hero-carousel" id="heroCarousel">
  <div class="hero-track" id="heroTrack">
    @foreach($heroProducts as $product)
      <div class="hero-item" data-product-name="{{ $product->name }}">
        <div class="product-image">
          <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
        </div>
      </div>
    @endforeach
  </div>

  @if($heroProducts->count() > 1)
    <button class="hero-nav hero-prev" id="heroPrev" aria-label="Предыдущий">‹</button>
    <button class="hero-nav hero-next" id="heroNext" aria-label="Следующий">›</button>
  @endif
</div>
@endif
    <button class="scroll-down" id="scrollDown" aria-label="К каталогу">↓</button>
  </section>

  <!-- КАТАЛОГ -->
  <section class="scroll-section catalog-section growable" id="catalog">
    @php
      $chunks = $products->chunk(6);
      $pageIndex = 0;
    @endphp

    @foreach($chunks as $chunk)
      @php $pageIndex++; @endphp
      <div class="catalog-page" data-page="{{ $pageIndex }}">
        @if($pageIndex === 1)
          <div class="catalog-head">
            <h1>Свежие букеты</h1>
            <p>Собраны утром, доставим за 2 часа</p>
          </div>

          <div class="filters">
            <button class="filter-btn active" data-filter="all">Все</button>
            <button class="filter-btn" data-filter="low">До 3000 ₽</button>
            <button class="filter-btn" data-filter="mid">3000–5000 ₽</button>
            <button class="filter-btn" data-filter="high">От 5000 ₽</button>
            <span class="filter-sep"></span>
            <button class="filter-btn" data-sort="asc">Цена ↑</button>
            <button class="filter-btn" data-sort="desc">Цена ↓</button>
          </div>
        @endif

        <div class="catalog" id="catalogGrid{{ $pageIndex }}">
          @foreach($chunk as $product)
            <article class="card" data-price="{{ $product->price }}"
                     data-name="{{ $product->name }}"
                     data-desc="{{ $product->description }}"
                     data-img="{{ $product->image_url }}"
                     data-size="{{ $product->size }}"
                     data-life="{{ $product->life }}">
              <div class="card-image">
                @if($product->badge)
                  <span class="badge">{{ $product->badge }}</span>
                @endif
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" loading="lazy">
              </div>
              <div class="card-body">
                <h3 class="card-name">{{ $product->name }}</h3>
                <p class="card-desc">{{ $product->description }}</p>
                <div class="card-bottom">
                  <span class="card-price" data-rub-price="{{ $product->price }}">
                    {{ number_format($product->price, 0, '.', ' ') }} ₽
                    @if($product->old_price)
                      <span class="old">{{ number_format($product->old_price, 0, '.', ' ') }} ₽</span>
                    @endif
                  </span>
                  <button class="btn-add"
                          data-name="{{ $product->name }}"
                          data-price="{{ $product->price }}"
                          data-img="{{ $product->image_url }}">В корзину</button>
                </div>
              </div>
            </article>
          @endforeach
        </div>
      </div>
    @endforeach
  </section>

  <!-- О НАС + ФУТЕР -->
  <section class="scroll-section about-section" id="about">
    <div class="about-inner">
      <h2>О нас</h2>
      <p>Flower Shop — небольшая мастерская в центре города. Мы работаем с 2018 года и за это время собрали больше 12 000 букетов. Цветы привозим напрямую с плантаций в Эквадоре, Голландии и Краснодарском крае — без посредников и долгого хранения на складах.</p>
      <p>Каждое утро наш флорист собирает свежие композиции. Мы не делаем букеты «на поток» — каждый собирается вручную под настроение и повод.</p>

      <div class="about-stats">
        <div class="stat">
          <strong>7 лет</strong>
          <span>на рынке цветов</span>
        </div>
        <div class="stat">
          <strong>12 000+</strong>
          <span>счастливых клиентов</span>
        </div>
        <div class="stat">
          <strong>2 часа</strong>
          <span>средняя доставка</span>
        </div>
      </div>

      <div class="features">
        <div class="feature">
          <span class="feature-icon">🚚</span>
          <div class="feature-text">
            <h3>Доставка 2 часа</h3>
            <p>По городу — от 2 часов</p>
          </div>
        </div>
        <div class="feature">
          <span class="feature-icon">🌿</span>
          <div class="feature-text">
            <h3>Свежесть 14 дней</h3>
            <p>Если завянут — заменим</p>
          </div>
        </div>
        <div class="feature">
          <span class="feature-icon">🎨</span>
          <div class="feature-text">
            <h3>Соберём под запрос</h3>
            <p>Скажите повод и бюджет</p>
          </div>
        </div>
      </div>

      <footer class="footer">
        <div class="footer-col">
          <h4>🌸 FlowerShop</h4>
          <p>Свежие букеты с доставкой за 2 часа. Собственные плантации, гарантия свежести 14 дней.</p>
        </div>

        <div class="footer-col">
          <h4>Контакты</h4>
          <a href="tel:+79991234567">+7 (999) 123-45-67</a>
          <a href="mailto:hello@flowershop.ru">hello@flowershop.ru</a>
          <p>ул. Цветочная, 5, Москва</p>
          <p>Ежедневно 9:00 – 22:00</p>
        </div>

        <div class="footer-col">
          <h4>Информация</h4>
          <a href="#">Доставка и оплата</a>
          <a href="#">Гарантия свежести</a>
          <a href="#">Политика конфиденциальности</a>
          <a href="#">Оферта</a>
        </div>

        <div class="footer-col">
          <h4>Мы в соцсетях</h4>
          <div class="footer-social">
            <a href="https://t.me/your_bot" target="_blank" rel="noopener" aria-label="Telegram">✈️</a>
            <a href="#" aria-label="VK">🅥</a>
            <a href="#" aria-label="WhatsApp">💬</a>
            <a href="#" aria-label="Instagram">📷</a>
          </div>
          <p style="margin-top: 10px;">Подпишитесь — дарим скидку 5% на первый заказ</p>
        </div>

        <div class="footer-bottom">
          <span>© 2026 FlowerShop. Все права защищены.</span>
          <span>ИП Иванов И.И. · ИНН 1234567890</span>
        </div>
      </footer>

    </div>
  </section>

</div>

<!-- ===================== МОДАЛЬНОЕ ОКНО КОРЗИНЫ ===================== -->
<div class="modal-overlay" id="cartModal">
  <div class="modal">
    <div class="modal-header">
      <h2>Корзина</h2>
      <button class="modal-close" id="cartClose" aria-label="Закрыть">✕</button>
    </div>

    <div class="modal-body" id="cartBody"></div>

    <div class="modal-footer">
      <div class="promo-row">
        <input type="text" class="promo-input" id="promoInput" placeholder="Промокод (FLOWER10)" aria-label="Промокод">
        <button class="promo-btn" id="promoBtn">Применить</button>
      </div>
      <div class="promo-hint" id="promoHint"></div>

      <div class="order-form" id="orderForm">
        <h3>Данные для доставки</h3>
        <input type="text" id="orderName" placeholder="Ваше имя" aria-label="Имя" autocomplete="name">
        <div class="phone-group">
          <select class="country-mini" id="phoneCountry" aria-label="Код страны">
            <option value="RU">🇷🇺 +7</option>
            <option value="BY">🇧🇾 +375</option>
            <option value="KZ">🇰🇿 +7</option>
            <option value="US">🇺🇸 +1</option>
            <option value="EU">🇩🇪 +49</option>
          </select>
          <input type="tel" id="orderPhone" placeholder="+7 (___) ___-__-__" aria-label="Телефон" inputmode="tel" maxlength="20" autocomplete="tel">
        </div>
        <input type="text" id="orderAddress" placeholder="Адрес доставки" aria-label="Адрес" autocomplete="street-address">
        <textarea id="orderComment" rows="2" placeholder="Комментарий (время доставки, пожелания)" aria-label="Комментарий"></textarea>
        <button class="modal-submit" id="submitOrder">Подтвердить заказ</button>
      </div>

      <div class="modal-total">
        <span>Итого:</span>
        <strong id="cartTotal">0 ₽</strong>
      </div>
      <button class="modal-checkout" id="checkoutBtn" disabled>Оформить заказ</button>
    </div>
  </div>
</div>

<!-- ===================== МОДАЛКА ТОВАРА ===================== -->
<div class="modal-overlay product-modal" id="productModal">
  <div class="modal">
    <div class="modal-header">
      <h2 id="productModalName">Букет</h2>
      <button class="modal-close" id="productModalClose" aria-label="Закрыть">✕</button>
    </div>
    <div class="product-modal-body">
      <div class="product-modal-img" id="productModalImgWrap">
        <img src="" alt="" id="productModalImg">
      </div>
      <div class="product-modal-info">
        <h3 id="productModalTitle"></h3>
        <p class="desc" id="productModalDesc"></p>
        <div class="price" id="productModalPrice"></div>
        <div class="product-modal-meta">
          <div><span>Размер</span><strong id="productModalSize"></strong></div>
          <div><span>Стойкость</span><strong id="productModalLife"></strong></div>
          <div><span>Доставка</span><strong>от 2 часов</strong></div>
        </div>
        <button class="btn-add" id="productModalAdd" style="padding: 12px 24px; font-size: 13px;">Добавить в корзину</button>
      </div>
    </div>
  </div>
</div>

<!-- ===================== МОДАЛКА АДМИНКИ ===================== -->
<div class="modal-overlay" id="adminModal">
  <div class="modal admin-modal-window">
    <div class="modal-header">
      <h2>Админка — товары</h2>
      <button class="modal-close" id="adminClose" aria-label="Закрыть">✕</button>
    </div>
    <iframe id="adminFrame" src="about:blank" class="admin-frame"></iframe>
  </div>
</div>

<div class="toast-container" id="toastContainer"></div>
 
<script>
  // ============================================================
  // АНАЛИТИКА
  // ============================================================
  const YM_ID = null;

  function reachGoal(goal, params = {}) {
    try {
      if (YM_ID && typeof ym === 'function') ym(YM_ID, 'reachGoal', goal, params);
      if (window.dataLayer) window.dataLayer.push({ event: goal, ...params });
    } catch (e) {}
  }

  // ============================================================
  // СТРАНЫ И ВАЛЮТЫ
  // ============================================================
  const COUNTRIES = {
    RU: { currency: 'RUB', symbol: '₽', flag: '🇷🇺', name: 'Россия', phoneCode: '+7', phoneMask: '+7 (999) 999-99-99' },
    US: { currency: 'USD', symbol: '$', flag: '🇺🇸', name: 'США', phoneCode: '+1', phoneMask: '+1 (999) 999-9999' },
    EU: { currency: 'EUR', symbol: '€', flag: '🇩🇪', name: 'Германия', phoneCode: '+49', phoneMask: '+49 999 9999999' },
    BY: { currency: 'BYN', symbol: 'Br', flag: '🇧🇾', name: 'Беларусь', phoneCode: '+375', phoneMask: '+375 (99) 999-99-99' },
    KZ: { currency: 'KZT', symbol: '₸', flag: '🇰🇿', name: 'Казахстан', phoneCode: '+7', phoneMask: '+7 (999) 999-99-99' }
  };

  // Курсы к RUB (базовая валюта). Обновляйте вручную или через API.
  // 1 RUB = X валюты
  const EXCHANGE_RATES = {
    RUB: 1,
    USD: 1 / 84.20,
    EUR: 1 / 98.50,
    BYN: 1 / 27.86,
    KZT: 1 / 0.16
  };

  let currentCountry = localStorage.getItem('flowershop_country') || 'RU';

  function getCurrentCurrency() { return COUNTRIES[currentCountry].currency; }
  function getCurrentSymbol() { return COUNTRIES[currentCountry].symbol; }

  function formatPrice(rubPrice) {
    const currency = getCurrentCurrency();
    const rate = EXCHANGE_RATES[currency] || 1;
    const converted = Math.round(rubPrice * rate);
    const symbol = getCurrentSymbol();

    let formatted;
    if (currency === 'RUB') {
      formatted = converted.toLocaleString('ru-RU');
    } else {
      formatted = converted.toLocaleString('en-US');
    }

    return symbol + ' ' + formatted;
  }

  // Для отображения в тостах и т.п. — в рублях (базовая валюта)
  function formatPriceRub(rubPrice) {
    return rubPrice.toLocaleString('ru-RU') + ' ₽';
  }

  function convertAllPrices() {
    document.querySelectorAll('[data-rub-price]').forEach(el => {
      const rubPrice = parseInt(el.dataset.rubPrice);
      if (isNaN(rubPrice)) return;

      // Сохраняем старую цену, если есть
      const oldEl = el.querySelector('.old');
      let oldRubPrice = null;
      if (oldEl) {
        oldRubPrice = parseInt(oldEl.dataset.rubPrice) || null;
      }

      el.innerHTML = formatPrice(rubPrice);

      if (oldRubPrice) {
        const oldSpan = document.createElement('span');
        oldSpan.className = 'old';
        oldSpan.dataset.rubPrice = oldRubPrice;
        oldSpan.textContent = formatPrice(oldRubPrice);
        el.appendChild(oldSpan);
      }
    });

    // Модалка товара
    const modalPrice = document.getElementById('productModalPrice');
    if (modalPrice && modalPrice.dataset.rubPrice) {
      const rubPrice = parseInt(modalPrice.dataset.rubPrice);
      if (!isNaN(rubPrice)) {
        modalPrice.textContent = formatPrice(rubPrice);
      }
    }

    // Корзина
    updateCart();
  }

  // ============================================================
  // КАСТОМНЫЙ КУРСОР
  // ============================================================
  const isDesktop = window.matchMedia('(min-width: 1024px)').matches;

  if (isDesktop) {
    document.body.classList.add('custom-cursor');

    const dot = document.getElementById('cursorDot');
    const ring = document.getElementById('cursorRing');

    let mouseX = 0, mouseY = 0;
    let ringX = 0, ringY = 0;

    document.addEventListener('mousemove', (e) => {
      mouseX = e.clientX;
      mouseY = e.clientY;
      dot.style.transform = `translate(${mouseX}px, ${mouseY}px) translate(-50%, -50%)`;
    });

    function animateRing() {
      ringX += (mouseX - ringX) * 0.18;
      ringY += (mouseY - ringY) * 0.18;
      ring.style.transform = `translate(${ringX}px, ${ringY}px) translate(-50%, -50%)`;
      requestAnimationFrame(animateRing);
    }
    animateRing();

    const hoverTargets = 'a, button, input, textarea, select, .card, .filter-btn, .qty-btn, .swiper-button-prev, .swiper-button-next, .product-modal-img';

    document.addEventListener('mouseover', (e) => {
      if (e.target.closest(hoverTargets)) document.body.classList.add('cursor-hover');
    });
    document.addEventListener('mouseout', (e) => {
      if (e.target.closest(hoverTargets)) document.body.classList.remove('cursor-hover');
    });
    document.addEventListener('mouseleave', () => {
      dot.style.opacity = '0';
      ring.style.opacity = '0';
    });
    document.addEventListener('mouseenter', () => {
      dot.style.opacity = '1';
      ring.style.opacity = '0.6';
    });
  }

  // ============================================================
  // ПРЕЛОАДЕР
  // ============================================================
  window.addEventListener('load', () => {
    setTimeout(() => {
      document.getElementById('preloader').classList.add('hidden');
    }, 1200);
  });

  

// ============================================================
// HERO CAROUSEL — бесконечный цикл без дублей
// Работает с любым числом товаров (1, 2, 3, ...)
// ============================================================
(function initHeroCarousel() {
  const carousel = document.getElementById('heroCarousel');
  if (!carousel) return;

  const track = document.getElementById('heroTrack');
  const items = Array.from(track.querySelectorAll('.hero-item'));
  const prevBtn = document.getElementById('heroPrev');
  const nextBtn = document.getElementById('heroNext');

  const total = items.length;
  if (total === 0) return;

  let activeIndex = 0;
  let isAnimating = false;

  function applyPositions() {
    items.forEach((item, i) => {
      // Смещение i относительно activeIndex, зацикленное в диапазон [-total/2, total/2]
      let o = (i - activeIndex) % total;
      if (o > total / 2) o -= total;
      if (o < -total / 2) o += total;

      item.classList.remove(
        'pos-center', 'pos-left', 'pos-right',
        'pos-hidden-left', 'pos-hidden-right'
      );

      if (o === 0) {
        item.classList.add('pos-center');
      } else if (o === 1) {
        item.classList.add('pos-right');
      } else if (o === -1) {
        item.classList.add('pos-left');
      } else if (o > 1) {
        item.classList.add('pos-hidden-right');
      } else {
        item.classList.add('pos-hidden-left');
      }
    });
  }

  function go(direction) {
    if (isAnimating || total < 2) return;
    isAnimating = true;

    activeIndex = (activeIndex + direction + total) % total;
    applyPositions();

    setTimeout(() => { isAnimating = false; }, 700);
  }

  if (prevBtn) prevBtn.addEventListener('click', () => go(-1));
  if (nextBtn) nextBtn.addEventListener('click', () => go(1));

  // Клик по слайду: центр — открыть товар, боковые — листнуть
  track.addEventListener('click', (e) => {
    const item = e.target.closest('.hero-item');
    if (!item) return;

    const productName = item.dataset.productName;
    if (!productName) return;

    if (item.classList.contains('pos-center')) {
      const targetCard = document.querySelector(
        `.card[data-name="${CSS.escape(productName)}"]`
      );
      if (!targetCard) return;

      const catalog = document.getElementById('catalog');
      smoothScrollTo(getAbsTop(catalog), 900);
      setTimeout(() => targetCard.click(), 950);
    } else if (item.classList.contains('pos-left')) {
      go(-1);
    } else if (item.classList.contains('pos-right')) {
      go(1);
    }
  });

  // Свайпы мышью/пальцем
  let startX = 0;
  let isDown = false;

  carousel.addEventListener('pointerdown', (e) => {
    isDown = true;
    startX = e.clientX;
  });

  carousel.addEventListener('pointerup', (e) => {
    if (!isDown) return;
    isDown = false;
    const dx = e.clientX - startX;
    if (Math.abs(dx) < 50) return;
    go(dx < 0 ? 1 : -1);
  });

  carousel.addEventListener('pointerleave', () => { isDown = false; });

  applyPositions();
})();





  // ============================================================
  // ТЁМНАЯ ТЕМА
  // ============================================================
  const toggle = document.getElementById('themeToggle');
  toggle.addEventListener('click', () => {
    document.body.classList.toggle('dark');
    toggle.textContent = document.body.classList.contains('dark') ? '☀️' : '🌙';
  });

  // ============================================================
  // УВЕДОМЛЕНИЯ
  // ============================================================
  const toastContainer = document.getElementById('toastContainer');

  function showToast(text, icon = '✅', type = 'success') {
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.innerHTML = `<span class="toast-icon">${icon}</span><span>${text}</span>`;
    toastContainer.appendChild(toast);

    setTimeout(() => {
      toast.classList.add('hide');
      setTimeout(() => toast.remove(), 300);
    }, 3000);
  }

  // ============================================================
  // КОРЗИНА
  // ============================================================
  let cart = [];
  try {
    const saved = localStorage.getItem('flowershop_cart');
    if (saved) cart = JSON.parse(saved);
  } catch (e) { cart = []; }

  let discount = 0;

  const cartBadge = document.getElementById('cartBadge');
  const cartBody = document.getElementById('cartBody');
  const cartTotal = document.getElementById('cartTotal');
  const checkoutBtn = document.getElementById('checkoutBtn');
  const orderForm = document.getElementById('orderForm');
  const promoInput = document.getElementById('promoInput');
  const promoBtn = document.getElementById('promoBtn');
  const promoHint = document.getElementById('promoHint');
  const cartToggle = document.getElementById('cartToggle');

  function saveCart() {
    try {
      localStorage.setItem('flowershop_cart', JSON.stringify(cart));
    } catch (e) {}
  }

  function updateCart() {
    saveCart();

    const totalQty = cart.reduce((sum, item) => sum + item.qty, 0);
    cartBadge.textContent = totalQty;

    cartBadge.classList.remove('pulse');
    void cartBadge.offsetWidth;
    cartBadge.classList.add('pulse');
    setTimeout(() => cartBadge.classList.remove('pulse'), 800);

    cartToggle.classList.remove('bounce');
    void cartToggle.offsetWidth;
    cartToggle.classList.add('bounce');
    setTimeout(() => cartToggle.classList.remove('bounce'), 800);

    if (cart.length === 0) {
      cartBody.innerHTML = `
        <div class="modal-empty">
          <span>💐</span>
          Корзина пока пуста.<br>Добавьте букет из каталога.
        </div>
      `;
      checkoutBtn.disabled = true;
      orderForm.classList.remove('show');
    } else {
      cartBody.innerHTML = cart.map((item, i) => `
        <div class="cart-item">
          <div class="cart-item-img">
            <img src="${item.img}" alt="${item.name}">
          </div>
          <div class="cart-item-info">
            <div class="cart-item-name">${item.name}</div>
            <div class="cart-item-price">${formatPrice(item.price)} × ${item.qty}</div>
          </div>
          <div class="cart-item-qty">
            <button class="qty-btn" data-action="minus" data-index="${i}">−</button>
            <span class="qty-value">${item.qty}</span>
            <button class="qty-btn" data-action="plus" data-index="${i}">+</button>
          </div>
        </div>
      `).join('');
      checkoutBtn.disabled = false;
    }

    const subtotal = cart.reduce((sum, item) => sum + item.price * item.qty, 0);
    const total = Math.round(subtotal * (1 - discount));

    if (discount > 0) {
      cartTotal.innerHTML = `${formatPrice(total)} <span class="discount">−${Math.round(discount * 100)}%</span>`;
    } else {
      cartTotal.textContent = formatPrice(total);
    }
  }

  cartBody.addEventListener('click', (e) => {
    const btn = e.target.closest('.qty-btn');
    if (!btn) return;

    const index = parseInt(btn.dataset.index);
    const action = btn.dataset.action;

    if (action === 'plus') cart[index].qty++;
    else if (action === 'minus') {
      cart[index].qty--;
      if (cart[index].qty <= 0) cart.splice(index, 1);
    }

    updateCart();
  });

  promoBtn.addEventListener('click', () => {
    const code = promoInput.value.trim().toUpperCase();
    if (code === 'FLOWER10') {
      discount = 0.1;
      promoHint.textContent = '✓ Промокод применён: скидка 10%';
      promoHint.className = 'promo-hint success';
      updateCart();
      reachGoal('promo_applied', { code: 'FLOWER10' });
    } else if (code === '') {
      promoHint.textContent = 'Введите промокод';
      promoHint.className = 'promo-hint';
    } else {
      promoHint.textContent = 'Промокод не найден';
      promoHint.className = 'promo-hint';
    }
  });

  checkoutBtn.addEventListener('click', () => {
    orderForm.classList.toggle('show');
  });

  // ============================================================
  // МАСКА ТЕЛЕФОНА (с учётом страны)
  // ============================================================
  const phoneInput = document.getElementById('orderPhone');
  const phoneCountry = document.getElementById('phoneCountry');

  // Синхронизация: если меняем основной селектор страны — меняем и в форме
  function syncPhoneCountry() {
    const codeMap = { RU: 'RU', BY: 'BY', KZ: 'KZ', US: 'US', EU: 'EU' };
    const mapped = codeMap[currentCountry] || 'RU';

    if (phoneCountry.querySelector(`option[value="${mapped}"]`)) {
      phoneCountry.value = mapped;
    } else if (currentCountry === 'EU') {
      phoneCountry.value = 'EU';
    }

    applyPhoneMask();
  }

  function applyPhoneMask() {
    const country = COUNTRIES[phoneCountry.value] || COUNTRIES.RU;
    phoneInput.value = '';
    phoneInput.placeholder = country.phoneMask.replace(/9/g, '_');
    phoneInput.maxLength = country.phoneMask.length + 3;
  }

  phoneCountry.addEventListener('change', applyPhoneMask);

  phoneInput.addEventListener('input', (e) => {
    const country = COUNTRIES[phoneCountry.value] || COUNTRIES.RU;
    const mask = country.phoneMask;
    const code = country.phoneCode;

    let digits = e.target.value.replace(/\D/g, '');

    // Убираем код страны из начала, если он уже введён
    const codeDigits = code.replace(/\D/g, '');
    if (digits.startsWith(codeDigits)) {
      digits = digits.slice(codeDigits.length);
    }

    // Ограничиваем длину
    const maxDigits = (mask.match(/9/g) || []).length;
    digits = digits.slice(0, maxDigits);

    // Форматируем по маске
    let result = '';
    let digitIndex = 0;
    for (let i = 0; i < mask.length; i++) {
      if (mask[i] === '9') {
        if (digitIndex < digits.length) {
          result += digits[digitIndex++];
        } else {
          break;
        }
      } else {
        result += mask[i];
      }
    }

    e.target.value = result;
    e.target.classList.remove('error');
  });

  phoneInput.addEventListener('focus', (e) => {
    if (!e.target.value) {
      const country = COUNTRIES[phoneCountry.value] || COUNTRIES.RU;
      const code = country.phoneCode;
      e.target.value = code + ' ';
    }
  });

  phoneInput.addEventListener('blur', (e) => {
    const country = COUNTRIES[phoneCountry.value] || COUNTRIES.RU;
    const code = country.phoneCode;
    if (e.target.value === code || e.target.value === code + ' ') {
      e.target.value = '';
    }
  });

  function isValidPhone(phone) {
    const digits = phone.replace(/\D/g, '');
    return digits.length >= 10 && digits.length <= 15;
  }

  // ============================================================
  // ОТПРАВКА ЗАКАЗА
  // ============================================================
  document.getElementById('submitOrder').addEventListener('click', async function () {
    const name    = document.getElementById('orderName').value.trim();
    const phone   = document.getElementById('orderPhone').value.trim();
    const address = document.getElementById('orderAddress').value.trim();
    const comment = document.getElementById('orderComment').value.trim();

    if (!name || !phone || !address) {
      showToast('Заполните имя, телефон и адрес', '⚠️', 'warning');
      return;
    }

    if (!isValidPhone(phone)) {
      showToast('Введите корректный номер телефона', '⚠️', 'warning');
      phoneInput.classList.add('error');
      phoneInput.focus();
      return;
    }

    if (cart.length === 0) {
      showToast('Корзина пуста', '⚠️', 'warning');
      return;
    }

    const subtotal = cart.reduce((sum, item) => sum + item.price * item.qty, 0);
    const total    = Math.round(subtotal * (1 - discount));
    const discountSum = subtotal - total;

    const submitBtn = this;
    const originalText = submitBtn.textContent;
    submitBtn.disabled = true;
    submitBtn.textContent = 'Отправляем...';

    try {
      const token = document.querySelector('meta[name="csrf-token"]')?.content || '';

    const response = await fetch('{{ url('/api/orders') }}', {
    method: 'POST',
    credentials: 'same-origin',    // ← добавить
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'X-CSRF-TOKEN': token,
    },
        body: JSON.stringify({
          name,
          phone,
          address,
          comment,
          country: currentCountry,
          currency: getCurrentCurrency(),
          items: cart.map(i => ({
            name:  i.name,
            price: i.price,
            qty:   i.qty,
            img:   i.img,
          })),
          subtotal,
          discount: discountSum,
          total,
        }),
      });

    const result = await response.json();

if (!response.ok || !result.ok) {
    // ← Показываем, ЧТО именно не так
    console.log('Status:', response.status);
    console.log('Response:', result);
    if (result.errors) {
        console.log('Ошибки валидации:', result.errors);
    }
    throw new Error(
        result.message || result.error || 'Ошибка отправки'
    );
}

      const message = result.order_id
        ? `Заказ №${result.order_id} принят! Перезвоним в течение 10 минут.`
        : 'Заказ принят! Перезвоним в течение 10 минут.';

      showToast(message, '🎉', 'success');

      reachGoal('purchase', {
        order_id: result.order_id || null,
        total: total,
        currency: getCurrentCurrency(),
        items_count: cart.reduce((s, i) => s + i.qty, 0),
      });

      cart = [];
      discount = 0;
      promoInput.value = '';
      promoHint.textContent = '';
      promoHint.className = 'promo-hint';
      document.getElementById('orderName').value = '';
      document.getElementById('orderPhone').value = '';
      document.getElementById('orderAddress').value = '';
      document.getElementById('orderComment').value = '';
      orderForm.classList.remove('show');
      updateCart();

      setTimeout(() => cartModal.classList.remove('open'), 800);

    } catch (err) {
      console.error(err);
      showToast(err.message || 'Не удалось отправить заказ. Позвоните нам.', '❌', 'error');
    } finally {
      submitBtn.disabled = false;
      submitBtn.textContent = originalText;
    }
  });

  // ============================================================
  // ЛЕТЯЩАЯ ИКОНКА
  // ============================================================
  function flyToCart(startEl) {
    const cartBtn = document.getElementById('cartToggle');
    const startRect = startEl.getBoundingClientRect();
    const endRect = cartBtn.getBoundingClientRect();

    const fly = document.createElement('div');
    fly.className = 'fly-icon';
    fly.textContent = '💐';
    fly.style.left = startRect.left + startRect.width / 2 - 12 + 'px';
    fly.style.top = startRect.top + startRect.height / 2 - 12 + 'px';
    document.body.appendChild(fly);

    requestAnimationFrame(() => {
      fly.style.left = endRect.left + endRect.width / 2 - 12 + 'px';
      fly.style.top = endRect.top + endRect.height / 2 - 12 + 'px';
      fly.style.opacity = '0.3';
      fly.style.transform = 'scale(0.4)';
    });

    setTimeout(() => fly.remove(), 850);
  }

  // ============================================================
  // ДОБАВЛЕНИЕ В КОРЗИНУ
  // ============================================================
  document.querySelectorAll('.btn-add').forEach(btn => {
    if (btn.id === 'productModalAdd') return;

    btn.addEventListener('click', (e) => {
      e.stopPropagation();
      const name = btn.dataset.name;
      const price = parseInt(btn.dataset.price);
      const img = btn.dataset.img;

      const existing = cart.find(item => item.name === name);
      if (existing) existing.qty++;
      else cart.push({ name, price, img, qty: 1 });

      flyToCart(btn);
      showToast(`${name} добавлен в корзину`, '✅', 'success');
      reachGoal('add_to_cart', { name, price, quantity: 1 });

      btn.animate(
        [{ transform: 'scale(1)' }, { transform: 'scale(0.92)' }, { transform: 'scale(1)' }],
        { duration: 200 }
      );

      updateCart();
    });
  });

  // ============================================================
  // МОДАЛЬНОЕ ОКНО КОРЗИНЫ
  // ============================================================
  const cartModal = document.getElementById('cartModal');
  const cartClose = document.getElementById('cartClose');

  cartToggle.addEventListener('click', () => {
    cartModal.classList.add('open');
    reachGoal('open_cart');
  });
  cartClose.addEventListener('click', () => cartModal.classList.remove('open'));
  cartModal.addEventListener('click', (e) => {
    if (e.target === cartModal) cartModal.classList.remove('open');
  });

  // ============================================================
  // МОДАЛКА ТОВАРА
  // ============================================================
  const productModal = document.getElementById('productModal');
  const productModalClose = document.getElementById('productModalClose');
  const productModalImgWrap = document.getElementById('productModalImgWrap');

  document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('click', (e) => {
      if (e.target.closest('.btn-add')) return;

      const name = card.dataset.name;
      const desc = card.dataset.desc;
      const price = parseInt(card.dataset.price);
      const img = card.dataset.img;
      const size = card.dataset.size || 'Стандартный';
      const life = card.dataset.life || '10 дней';

      document.getElementById('productModalName').textContent = name;
      document.getElementById('productModalTitle').textContent = name;
      document.getElementById('productModalDesc').textContent = desc;
      document.getElementById('productModalImg').src = img;
      document.getElementById('productModalImg').alt = name;

      const priceEl = document.getElementById('productModalPrice');
      priceEl.dataset.rubPrice = price;
      priceEl.textContent = formatPrice(price);

      document.getElementById('productModalSize').textContent = size;
      document.getElementById('productModalLife').textContent = life;

      const addBtn = document.getElementById('productModalAdd');
      addBtn.dataset.name = name;
      addBtn.dataset.price = price;
      addBtn.dataset.img = img;

      productModalImgWrap.classList.remove('zoomed');

      productModal.classList.add('open');
      reachGoal('view_product', { name, price });
    });
  });

  productModalImgWrap.addEventListener('click', () => {
    productModalImgWrap.classList.toggle('zoomed');
  });

  document.getElementById('productModalAdd').addEventListener('click', function() {
    const name = this.dataset.name;
    const price = parseInt(this.dataset.price);
    const img = this.dataset.img;

    const existing = cart.find(item => item.name === name);
    if (existing) existing.qty++;
    else cart.push({ name, price, img, qty: 1 });

    flyToCart(this);
    showToast(`${name} добавлен в корзину`, '✅', 'success');
    reachGoal('add_to_cart', { name, price, quantity: 1 });
    updateCart();
    productModal.classList.remove('open');
  });

  productModalClose.addEventListener('click', () => productModal.classList.remove('open'));
  productModal.addEventListener('click', (e) => {
    if (e.target === productModal) productModal.classList.remove('open');
  });

  // ============================================================
  // ФИЛЬТРЫ И СОРТИРОВКА
  // ============================================================
  const filterButtons = document.querySelectorAll('[data-filter]');
  const sortButtons = document.querySelectorAll('[data-sort]');
  let currentFilter = 'all';
  let currentSort = null;

  const catalogSection = document.getElementById('catalog');
  const PER_PAGE = 6;

  function getAllCards() {
    return Array.from(catalogSection.querySelectorAll('.card'));
  }

  function cardMatchesFilter(card) {
    const price = parseInt(card.dataset.price);
    if (isNaN(price)) return false;

    if (currentFilter === 'low'  && price >= 3000) return false;
    if (currentFilter === 'mid'  && (price < 3000 || price > 5000)) return false;
    if (currentFilter === 'high' && price < 5000) return false;
    return true;
  }

  function getFilteredSortedCards() {
    let cards = getAllCards().filter(cardMatchesFilter);

    if (currentSort) {
      cards.sort((a, b) => {
        const pa = parseInt(a.dataset.price) || 0;
        const pb = parseInt(b.dataset.price) || 0;
        return currentSort === 'asc' ? pa - pb : pb - pa;
      });
    }

    return cards;
  }

  function rebuildCatalog() {
    const allCards = getAllCards();
    const visibleCards = getFilteredSortedCards();

    let storage = catalogSection.querySelector('.cards-storage');
    if (!storage) {
      storage = document.createElement('div');
      storage.className = 'cards-storage';
      storage.style.display = 'none';
      catalogSection.appendChild(storage);
    }

    allCards.forEach(card => {
      card.classList.add('hide');
      storage.appendChild(card);
    });

    const pages = Array.from(catalogSection.querySelectorAll('.catalog-page'));
    const firstPage = pages[0];
    const firstGrid = firstPage.querySelector('.catalog');

    pages.slice(1).forEach(page => page.remove());

    firstGrid.innerHTML = '';
    firstPage.querySelectorAll('.catalog-page-hint').forEach(el => el.remove());
    firstPage.querySelectorAll('.empty-message').forEach(el => el.remove());

    if (visibleCards.length === 0) {
      const emptyMsg = document.createElement('div');
      emptyMsg.className = 'empty-message';
      emptyMsg.textContent = 'В этой категории пока ничего нет';
      firstGrid.appendChild(emptyMsg);
      return;
    }

    let pageIndex = 0;

    for (let i = 0; i < visibleCards.length; i += PER_PAGE) {
      const chunk = visibleCards.slice(i, i + PER_PAGE);

      let page, grid;

      if (pageIndex === 0) {
        page = firstPage;
        grid = firstGrid;
      } else {
        page = document.createElement('div');
        page.className = 'catalog-page';
        page.dataset.page = String(pageIndex + 1);

        grid = document.createElement('div');
        grid.className = 'catalog';
        grid.id = 'catalogGrid' + (pageIndex + 1);
        page.appendChild(grid);

        catalogSection.appendChild(page);
      }

      chunk.forEach(card => {
        card.classList.remove('hide');
        card.classList.add('visible');
        grid.appendChild(card);
      });

      const isLast = (i + PER_PAGE) >= visibleCards.length;
      if (!isLast) {
        const hint = document.createElement('div');
        hint.className = 'catalog-page-hint';
        hint.textContent = '↓ Ещё букеты';
        page.appendChild(hint);
      }

      pageIndex++;
    }

    // После пересборки — пересчитать цены
    convertAllPrices();
  }

  function refreshCatalog() {
    rebuildCatalog();
    observeCards();
    initSkeletons();
  }

  filterButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      filterButtons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      currentFilter = btn.dataset.filter;
      refreshCatalog();
      reachGoal('filter_used', { filter: btn.dataset.filter });
    });
  });

  sortButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      const dir = btn.dataset.sort;
      if (currentSort === dir) {
        currentSort = null;
        btn.classList.remove('active');
      } else {
        sortButtons.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        currentSort = dir;
      }
      refreshCatalog();
      reachGoal('sort_used', { direction: dir });
    });
  });

  // ============================================================
  // АНИМАЦИЯ ПОЯВЛЕНИЯ КАРТОЧЕК
  // ============================================================
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, i) => {
      if (entry.isIntersecting) {
        setTimeout(() => entry.target.classList.add('visible'), i * 80);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });

  function observeCards() {
    document.querySelectorAll('.card').forEach(card => observer.observe(card));
  }

  observeCards();

  // ============================================================
  // СКЕЛЕТОНЫ
  // ============================================================
  function initSkeletons() {
    document.querySelectorAll('.card-image img').forEach(img => {
      if (img.dataset.skeletonInit) return;
      img.dataset.skeletonInit = '1';

      const wrapper = img.parentElement;

      if (img.complete && img.naturalWidth > 0) {
        img.classList.add('loaded');
        wrapper.classList.add('skeleton-done');
      } else {
        img.addEventListener('load', () => {
          img.classList.add('loaded');
          wrapper.classList.add('skeleton-done');
        });
        img.addEventListener('error', () => {
          wrapper.classList.add('skeleton-done');
        });
      }
    });
  }

  initSkeletons();

  function reinitCards() {
    refreshCatalog();
  }

  // ============================================================
  // КАСТОМНЫЙ СКРОЛЛ
  // ============================================================
  const container = document.getElementById('scrollContainer');

  function easeInOutCubic(t) {
    return t < 0.5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2;
  }

  let scrollAnimationId = null;
  function smoothScrollTo(targetTop, duration = 1200) {
    if (scrollAnimationId) cancelAnimationFrame(scrollAnimationId);

    const startTop = container.scrollTop;
    const distance = targetTop - startTop;
    const startTime = performance.now();

    function step(now) {
      const elapsed = now - startTime;
      const progress = Math.min(elapsed / duration, 1);
      const eased = easeInOutCubic(progress);
      container.scrollTop = startTop + distance * eased;
      if (progress < 1) {
        scrollAnimationId = requestAnimationFrame(step);
      } else {
        scrollAnimationId = null;
      }
    }
    scrollAnimationId = requestAnimationFrame(step);
  }

  document.getElementById('scrollDown').addEventListener('click', () => {
    const catalog = document.getElementById('catalog');
    smoothScrollTo(getAbsTop(catalog), 1200);
  });

  document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', (e) => {
      const targetId = link.getAttribute('href').slice(1);
      const target = document.getElementById(targetId);
      if (target) {
        e.preventDefault();
        smoothScrollTo(getAbsTop(target), 1200);
      }
    });
  });

  let isAnimating = false;

  function getAbsTop(el) {
    const containerTop = container.getBoundingClientRect().top;
    return el.getBoundingClientRect().top - containerTop + container.scrollTop;
  }

  function getScreens() {
    const screens = [];
    document.querySelectorAll('.scroll-section').forEach(section => {
      const pages = section.querySelectorAll('.catalog-page');
      if (pages.length > 0) {
        pages.forEach(page => screens.push(page));
      } else {
        screens.push(section);
      }
    });

    screens.forEach(el => {
      el._absTop = getAbsTop(el);
    });

    screens.sort((a, b) => a._absTop - b._absTop);
    return screens;
  }

  container.addEventListener('wheel', (e) => {
    if (isAnimating) {
      e.preventDefault();
      return;
    }

    const screens = getScreens();
    const currentTop = container.scrollTop;

    let currentIndex = 0;
    for (let i = 0; i < screens.length; i++) {
      if (screens[i]._absTop <= currentTop + 5) {
        currentIndex = i;
      } else {
        break;
      }
    }

    const goingDown = e.deltaY > 0;
    const targetIndex = goingDown
      ? Math.min(currentIndex + 1, screens.length - 1)
      : Math.max(currentIndex - 1, 0);

    const target = screens[targetIndex];
    if (!target) return;

    e.preventDefault();
    isAnimating = true;

    smoothScrollTo(target._absTop, 700);
    setTimeout(() => { isAnimating = false; }, 750);
  }, { passive: false });

  // ============================================================
  // МОДАЛКА АДМИНКИ
  // ============================================================
  const adminModal = document.getElementById('adminModal');
  const adminClose = document.getElementById('adminClose');
  const adminFrame = document.getElementById('adminFrame');

  function openAdmin() {
    adminFrame.src = '/admin/products';
    adminModal.classList.add('open');
  }

  function closeAdmin() {
    adminModal.classList.remove('open');
    setTimeout(() => { adminFrame.src = 'about:blank'; }, 300);
    setTimeout(reinitCards, 100);
  }

  const logoSel = document.querySelector('.logo');
  let logoClicks = 0;
  let logoTimer = null;

  logoSel.addEventListener('click', (e) => {
    logoClicks++;
    clearTimeout(logoTimer);
    logoTimer = setTimeout(() => { logoClicks = 0; }, 1500);

    if (logoClicks >= 5) {
      e.preventDefault();
      logoClicks = 0;
      clearTimeout(logoTimer);
      openAdmin();
    }
  });

  adminClose.addEventListener('click', closeAdmin);
  adminModal.addEventListener('click', (e) => {
    if (e.target === adminModal) closeAdmin();
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      cartModal.classList.remove('open');
      productModal.classList.remove('open');
      productModalImgWrap.classList.remove('zoomed');
      if (adminModal.classList.contains('open')) closeAdmin();
    }
  });

  // ============================================================
  // СЕЛЕКТОР СТРАНЫ (в шапке)
  // ============================================================
  const countrySelect = document.getElementById('countrySelect');

  countrySelect.addEventListener('change', function() {
    currentCountry = this.value;
    localStorage.setItem('flowershop_country', currentCountry);

    convertAllPrices();
    syncPhoneCountry();

    reachGoal('country_changed', { country: currentCountry });
  });

  // ============================================================
  // ИНИЦИАЛИЗАЦИЯ
  // ============================================================
  countrySelect.value = currentCountry;
  syncPhoneCountry();
  convertAllPrices();

  updateCart();

  if (document.body.classList.contains('dark')) toggle.textContent = '☀️';
</script>

</body>
</html>