<?php
$BASE_DOMAIN = 'https://claimspins.online';
$DATA_DIR    = __DIR__ . '/data/';
$uri   = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$parts = explode('/', $uri);
$lang  = isset($parts[0]) && strlen($parts[0]) === 2 ? $parts[0] : 'en';
$lang  = preg_replace('/[^a-z]/', '', strtolower($lang));
$dataFile = $DATA_DIR . $lang . '.json';
if (!file_exists($dataFile)) { $dataFile = $DATA_DIR . 'en.json'; $lang = 'en'; }
$raw     = json_decode(file_get_contents($dataFile), true);
$meta    = $raw['meta']       ?? [];
$trust   = $raw['trust']      ?? [];
$nav     = $raw['nav']        ?? [];
$cats    = $raw['categories'] ?? [];
$affs    = $raw['affiliates'] ?? [];
$seo     = $raw['seo_text']   ?? [];
$faq     = $raw['faq']        ?? [];
$footer  = $raw['footer']     ?? [];
$blogs   = $raw['blogs']      ?? [];

// Scan blog posts from filesystem for "Latest Posts" section
$BLOG_DIR_IDX = __DIR__ . '/blog/';
$latestPosts  = [];
if (is_dir($BLOG_DIR_IDX)) {
    foreach (glob($BLOG_DIR_IDX . '*/index.html') as $file) {
        $slug = basename(dirname($file));
        $fh   = fopen($file, 'r');
        $chunk = fread($fh, 3200);
        fclose($fh);
        preg_match('/<html[^>]+lang=["\']([^"\']+)["\']/', $chunk, $lm);
        $postLang = substr($lm[1] ?? 'en', 0, 2);
        preg_match('/<title>([^<]+)<\/title>/i', $chunk, $tm);
        $title = preg_replace('/\s*[|—–]\s*ClaimSpins.*$/ui', '', trim($tm[1] ?? $slug));
        preg_match('/"datePublished"\s*:\s*"([^"]+)"/', $chunk, $dm);
        $date = $dm[1] ?? '2026-01-01';
        preg_match('/<meta\s+name=["\']description["\'][^>]+content=["\']([^"\']+)["\']/', $chunk, $em);
        if (empty($em[1])) preg_match('/<meta\s+content=["\']([^"\']+)["\'][^>]+name=["\']description["\']/', $chunk, $em);
        $rawEx  = trim($em[1] ?? '');
        $excerpt = mb_strlen($rawEx) > 115 ? mb_substr($rawEx, 0, 115) . '…' : $rawEx;
        $latestPosts[] = [
            'slug'    => $slug,
            'lang'    => $postLang,
            'title'   => $title,
            'date'    => $date,
            'excerpt' => $excerpt,
            'url'     => $BASE_DOMAIN . '/blog/' . $slug . '/',
        ];
    }
    usort($latestPosts, fn($a, $b) => strcmp($b['date'], $a['date']));
    $filtered    = array_values(array_filter($latestPosts, fn($p) => $p['lang'] === substr($lang, 0, 2)));
    $blogDisplay = array_slice(count($filtered) >= 3 ? $filtered : array_values($latestPosts), 0, 6);
} else {
    $blogDisplay = [];
}

// Available languages for hreflang
$availLangs = [];
foreach (glob($DATA_DIR . '*.json') as $f) {
    $availLangs[] = basename($f, '.json');
}

// Grupuj affiliate linky podle kategorie
$byCat = [];
foreach($affs as $a) {
    $cat = $a['category'] ?? 'main';
    $byCat[$cat][] = $a;
}

// Kategorie v pořadí zobrazení
$catOrder = ['reg','bonus','free','slots','jackpot','live','sport','tourn','main'];

// Helper funkce
function e($s){return htmlspecialchars($s??'',ENT_QUOTES,'UTF-8');}
function stars($r){
    $f=floor($r); $h=($r-$f)>=0.5?1:0;
    return str_repeat('★',$f).str_repeat('½',$h).str_repeat('☆',5-$f-$h);
}
// Top kasino (nejvyšší rating v 'reg' nebo 'bonus' kategorii)
$topAffs = array_merge($byCat['reg']??[], $byCat['bonus']??[]);
usort($topAffs, fn($a,$b) => ($b['rating']??0) <=> ($a['rating']??0));
$top = $topAffs[0] ?? ($affs[0] ?? []);
$trustYears = date('Y') - 2020;

$canonical   = $BASE_DOMAIN.'/'.$lang.'/';
$currentYear = date('Y');
$totalLinks  = count($affs);
$maxBonus    = max(array_column($affs,'bonus_amount') ?: [0]);
$totalSpins  = array_sum(array_column($affs,'free_spins'));
?><!DOCTYPE html>
<html lang="<?= e($lang) ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= e($meta['title'] ?? 'Best Online Casinos ' . $currentYear) ?></title>
<meta name="description" content="<?= e($meta['description'] ?? '') ?>">
<meta name="keywords" content="<?= e($meta['keywords'] ?? '') ?>">
<link rel="canonical" href="<?= e($canonical) ?>">
<?php foreach($availLangs as $al): ?>
<link rel="alternate" hreflang="<?= e($al) ?>" href="<?= e($BASE_DOMAIN . '/' . $al . '/') ?>">
<?php endforeach; ?>
<link rel="alternate" hreflang="x-default" href="<?= e($BASE_DOMAIN . '/en/') ?>">
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large">
<meta property="og:type" content="website">
<meta property="og:title" content="<?= e($meta['title'] ?? '') ?>">
<meta property="og:description" content="<?= e($meta['description'] ?? '') ?>">
<meta property="og:url" content="<?= e($canonical) ?>">
<meta property="og:image" content="<?= e($meta['og_image'] ?? '') ?>">
<meta property="og:site_name" content="<?= e($meta['site_name'] ?? 'ClaimSpins') ?>">
<meta name="twitter:card" content="summary_large_image">
<!-- Favicon -->
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<!-- Resource hints -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="dns-prefetch" href="https://fonts.googleapis.com">
<link rel="dns-prefetch" href="https://fonts.gstatic.com">
<link rel="dns-prefetch" href="https://www.googletagmanager.com">
<!-- Google Fonts — loaded async to avoid render-blocking -->
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500&family=Syne:wght@400;700;800&display=swap" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500&family=Syne:wght@400;700;800&display=swap"></noscript>
<script type="application/ld+json">
{
  "@context":"https://schema.org",
  "@type":"WebSite",
  "name":"ClaimSpins",
  "url":<?= json_encode($BASE_DOMAIN) ?>,
  "description":<?= json_encode($meta['description'] ?? 'Best online casino bonuses and free spins') ?>,
  "inLanguage":<?= json_encode($lang) ?>,
  "potentialAction":{
    "@type":"SearchAction",
    "target":{
      "@type":"EntryPoint",
      "urlTemplate":<?= json_encode($BASE_DOMAIN . '/' . $lang . '/?q={search_term_string}') ?>
    },
    "query-input":"required name=search_term_string"
  }
}
</script>
<script type="application/ld+json">
{
  "@context":"https://schema.org",
  "@type":"Organization",
  "name":"ClaimSpins",
  "url":<?= json_encode($BASE_DOMAIN) ?>,
  "logo":{
    "@type":"ImageObject",
    "url":<?= json_encode($BASE_DOMAIN . '/favicon.svg') ?>,
    "width":512,
    "height":512
  },
  "sameAs":[],
  "contactPoint":{
    "@type":"ContactPoint",
    "contactType":"customer support",
    "url":<?= json_encode($canonical) ?>
  }
}
</script>
<script type="application/ld+json">
{
  "@context":"https://schema.org",
  "@type":"WebPage",
  "name":<?= json_encode($meta['title'] ?? 'Best Online Casinos ' . $currentYear) ?>,
  "description":<?= json_encode($meta['description'] ?? '') ?>,
  "url":<?= json_encode($canonical) ?>,
  "inLanguage":<?= json_encode($lang) ?>,
  "dateModified":<?= json_encode($meta['updated'] ?? date('Y-m-d')) ?>,
  "isPartOf":{"@type":"WebSite","url":<?= json_encode($BASE_DOMAIN) ?>},
  "publisher":{"@type":"Organization","name":"ClaimSpins","url":<?= json_encode($BASE_DOMAIN) ?>}
}
</script>
<?php if(!empty($affs)): ?>
<script type="application/ld+json">
{
  "@context":"https://schema.org",
  "@type":"ItemList",
  "name":<?= json_encode($meta['title'] ?? 'Best Online Casinos ' . $currentYear) ?>,
  "description":<?= json_encode($meta['description'] ?? '') ?>,
  "url":<?= json_encode($canonical) ?>,
  "numberOfItems":<?= $totalLinks ?>,
  "itemListElement":[
    <?php foreach($affs as $idx => $item): ?>
    <?= $idx > 0 ? ',' : '' ?>{
      "@type":"ListItem",
      "position":<?= $idx+1 ?>,
      "name":<?= json_encode($item['brand'] ?? '') ?>,
      "url":<?= json_encode($item['url'] ?? '') ?>
    }
    <?php endforeach; ?>
  ]
}
</script>
<?php endif; ?>
<?php if(!empty($faq)): ?>
<script type="application/ld+json">
{
  "@context":"https://schema.org",
  "@type":"FAQPage",
  "mainEntity":[
    <?php foreach($faq as $fi => $f): ?>
    <?= $fi > 0 ? ',' : '' ?>{
      "@type":"Question",
      "name":<?= json_encode($f['q'] ?? '') ?>,
      "acceptedAnswer":{
        "@type":"Answer",
        "text":<?= json_encode($f['a'] ?? '') ?>
      }
    }
    <?php endforeach; ?>
  ]
}
</script>
<?php endif; ?>
<style>
:root {
  --void:#07070f;--deep:#0e0e1a;--surface:#161625;
  --gold:#e8b84b;--gold2:#f5cc6a;--gold-glow:rgba(232,184,75,0.12);
  --plat:#c8d0e0;--white:#f0f2f8;--green:#00d68f;--red:#ff4757;
  --border:rgba(232,184,75,0.12);--border-hi:rgba(232,184,75,0.35);
  --banner-h:44px;
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth;-webkit-text-size-adjust:100%}
body{font-family:'DM Sans',sans-serif;font-weight:400;background:var(--void);color:var(--plat);line-height:1.6;overflow-x:hidden;min-height:100vh}
h1,h2,h3,h4{font-family:'Syne',sans-serif;color:var(--white);line-height:1.2}
a{color:var(--gold);text-decoration:none}
img{max-width:100%;display:block}

@keyframes shimmer{0%{background-position:-200% center}100%{background-position:200% center}}
@keyframes glowPulse{0%,100%{box-shadow:0 0 20px rgba(232,184,75,0.15)}50%{box-shadow:0 0 50px rgba(232,184,75,0.45),0 0 100px rgba(232,184,75,0.15)}}
@keyframes cardIn{from{opacity:0;transform:translateY(24px)}to{opacity:1;transform:translateY(0)}}
@keyframes float{0%,100%{transform:translateY(0)}50%{transform:translateY(-12px)}}
@keyframes fillBar{from{width:0}to{width:var(--w)}}
@keyframes fadeUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
@keyframes particleDrift{0%{transform:translate(0,0);opacity:0.3}25%{opacity:0.8}50%{transform:translate(var(--dx),var(--dy));opacity:0.4}75%{opacity:0.7}100%{transform:translate(0,0);opacity:0.3}}

/* STICKY CTA BANNER */
.sticky-cta-bar{position:sticky;top:0;z-index:110;height:var(--banner-h);background:linear-gradient(90deg,#0e0e1a,#161625,#0e0e1a);border-bottom:1px solid rgba(232,184,75,0.25);display:flex;align-items:center;justify-content:center;gap:.75rem;padding:0 3rem 0 1.5rem;overflow:hidden;transition:height .25s}
.sticky-cta-bar.hidden{height:0;border:none;overflow:hidden;pointer-events:none}
.scb-icon{font-size:.85rem;flex-shrink:0}
.scb-text{font-size:.78rem;color:var(--plat);white-space:nowrap;flex-shrink:0}
.scb-text strong{color:var(--white)}
.scb-sep{color:rgba(232,184,75,.3);flex-shrink:0;font-size:.75rem}
.scb-btn{font-family:'Syne',sans-serif;font-weight:700;font-size:.72rem;background:linear-gradient(135deg,var(--gold),#c8922a);color:var(--void);padding:.3rem .85rem;border-radius:7px;border:none;cursor:pointer;white-space:nowrap;text-decoration:none;transition:transform .15s;flex-shrink:0}
.scb-btn:hover{transform:scale(1.05)}
.scb-close{position:absolute;right:.75rem;top:50%;transform:translateY(-50%);background:none;border:none;color:var(--plat);font-size:.9rem;cursor:pointer;opacity:.4;padding:4px 8px;line-height:1}
.scb-close:hover{opacity:.8}

/* HEADER */
header{position:sticky;top:var(--banner-h,0px);z-index:100;height:64px;display:flex;align-items:center;justify-content:space-between;padding:0 1.5rem;background:rgba(7,7,15,0.85);backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);border-bottom:1px solid transparent;transition:border-color 0.3s,background 0.3s}
header.scrolled{border-bottom-color:var(--border);background:rgba(7,7,15,0.95)}
.logo{font-family:'Syne',sans-serif;font-weight:800;font-size:1.15rem;color:var(--gold);display:flex;align-items:center;gap:0.4rem;white-space:nowrap}
.logo span{color:var(--plat);font-weight:400;font-size:0.7rem;opacity:0.5;text-transform:uppercase;letter-spacing:1px}
.nav-tabs{display:flex;align-items:center;gap:0.25rem;overflow-x:auto;scrollbar-width:none;-ms-overflow-style:none;scroll-snap-type:x mandatory;flex:1;margin:0 1rem}
.nav-tabs::-webkit-scrollbar{display:none}
.cat-tab{font-family:'DM Sans',sans-serif;font-size:0.75rem;font-weight:500;color:var(--plat);background:none;border:none;padding:0.5rem 0.85rem;cursor:pointer;white-space:nowrap;position:relative;transition:color 0.2s;scroll-snap-align:start;border-radius:6px}
.cat-tab:hover{color:var(--white)}
.cat-tab.active{color:var(--gold)}
.cat-tab.active::after{content:'';position:absolute;bottom:0;left:50%;transform:translateX(-50%);width:60%;height:2px;background:var(--gold);border-radius:1px}
.header-cta{font-family:'Syne',sans-serif;font-size:0.75rem;font-weight:700;background:linear-gradient(135deg,var(--gold),#c8922a);color:var(--void);padding:0.45rem 1rem;border-radius:8px;border:none;cursor:pointer;white-space:nowrap;transition:transform 0.15s,box-shadow 0.15s;text-decoration:none}
.header-cta:hover{transform:scale(1.05);box-shadow:0 4px 20px rgba(232,184,75,0.3)}

/* HERO */
.hero{position:relative;min-height:100vh;display:flex;align-items:center;justify-content:center;text-align:center;overflow:hidden;padding:6rem 1.5rem 4rem}
.hero-bg{position:absolute;inset:0;z-index:0}
.hero-bg::before{content:'';position:absolute;top:20%;left:50%;transform:translate(-50%,-50%);width:800px;height:800px;background:radial-gradient(circle,rgba(232,184,75,0.08) 0%,rgba(232,184,75,0.02) 40%,transparent 70%);pointer-events:none}
.hero-bg::after{content:'';position:absolute;inset:0;background-image:linear-gradient(rgba(232,184,75,0.03) 1px,transparent 1px),linear-gradient(90deg,rgba(232,184,75,0.03) 1px,transparent 1px);background-size:80px 80px;pointer-events:none}
.hero-particles{position:absolute;inset:0;pointer-events:none;z-index:1}
.particle{position:absolute;width:3px;height:3px;background:var(--gold);border-radius:50%;opacity:0.3;animation:particleDrift var(--dur) ease-in-out infinite}
.hero-content{position:relative;z-index:2;max-width:800px}
.hero-badge{display:inline-flex;align-items:center;gap:0.4rem;background:rgba(232,184,75,0.1);border:1px solid rgba(232,184,75,0.25);border-radius:50px;padding:0.35rem 1rem;font-size:0.75rem;color:var(--gold);margin-bottom:1.5rem;font-weight:500}
.hero h1{font-weight:800;font-size:clamp(2rem,5vw,4rem);margin-bottom:1rem;letter-spacing:-0.02em}
.hero h1 .gold{color:var(--gold)}
.hero-sub{font-weight:300;font-size:clamp(0.95rem,2vw,1.2rem);color:var(--plat);opacity:0.7;margin-bottom:2.5rem;max-width:600px;margin-left:auto;margin-right:auto}
.hero-stats{display:flex;justify-content:center;gap:2.5rem;margin-bottom:2.5rem;flex-wrap:wrap}
.hero-stat{text-align:center}
.hero-stat .counter{font-family:'Syne',sans-serif;font-weight:800;font-size:clamp(1.5rem,3.5vw,2.5rem);color:var(--white);display:block}
.hero-stat small{font-size:0.75rem;color:var(--plat);opacity:0.5;text-transform:uppercase;letter-spacing:1px}
.hero-btns{display:flex;justify-content:center;gap:1rem;flex-wrap:wrap}
.btn-primary{font-family:'Syne',sans-serif;font-weight:700;font-size:0.95rem;background:linear-gradient(135deg,var(--gold),#c8922a);color:var(--void);padding:0.85rem 2rem;border-radius:12px;border:none;cursor:pointer;position:relative;overflow:hidden;transition:transform 0.15s,box-shadow 0.15s;text-decoration:none;display:inline-flex;align-items:center;gap:0.5rem}
.btn-primary:hover{transform:translateY(-2px);box-shadow:0 8px 30px rgba(232,184,75,0.35)}
.btn-primary .shim{position:absolute;inset:0;background:linear-gradient(90deg,transparent,rgba(255,255,255,0.15),transparent);background-size:200%;animation:shimmer 2s infinite}
.btn-secondary{font-family:'Syne',sans-serif;font-weight:700;font-size:0.95rem;background:transparent;color:var(--gold);padding:0.85rem 2rem;border-radius:12px;border:1px solid var(--border-hi);cursor:pointer;transition:background 0.2s,transform 0.15s;text-decoration:none;display:inline-flex;align-items:center;gap:0.5rem}
.btn-secondary:hover{background:rgba(232,184,75,0.08);transform:translateY(-2px)}

/* TRUST STRIP */
.trust-strip{background:var(--deep);border-top:1px solid var(--border);border-bottom:1px solid var(--border);padding:1.25rem 1.5rem;display:flex;align-items:center;justify-content:center;gap:2rem;flex-wrap:wrap;overflow-x:auto}
.trust-item{display:flex;align-items:center;gap:0.5rem;white-space:nowrap;font-size:0.8rem;color:var(--plat);opacity:0.7}
.trust-item strong{color:var(--gold);font-weight:700}

/* TRUST BADGES */
.trust-badges{display:flex;border-top:1px solid var(--border);border-bottom:1px solid var(--border);background:var(--deep);overflow:hidden}
.tb-item{flex:1;padding:1.1rem .75rem;text-align:center;border-right:1px solid var(--border)}
.tb-item:last-child{border-right:none}
.tb-num{font-family:'Syne',sans-serif;font-weight:800;font-size:clamp(1.3rem,3vw,1.8rem);color:var(--gold);display:block;margin-bottom:.15rem}
.tb-label{font-size:.68rem;color:var(--plat);opacity:.55;text-transform:uppercase;letter-spacing:.5px}

/* WHY TRUST */
.why-trust{padding:3.5rem 0;background:var(--deep);border-top:1px solid var(--border);border-bottom:1px solid var(--border)}
.why-trust-h{text-align:center;margin-bottom:2rem}
.why-trust-h h2{font-size:clamp(1.2rem,3vw,1.8rem);font-weight:700}
.why-trust-h h2 .g{color:var(--gold)}
.why-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;max-width:1200px;margin:0 auto;padding:0 1.5rem}
.why-card{background:var(--surface);border:1px solid var(--border);border-radius:14px;padding:1.5rem 1.25rem;text-align:center;transition:border-color .2s,transform .2s}
.why-card:hover{border-color:var(--border-hi);transform:translateY(-3px)}
.why-icon{font-size:1.75rem;margin-bottom:.75rem;display:block}
.why-title{font-family:'Syne',sans-serif;font-weight:700;font-size:.88rem;color:var(--white);margin-bottom:.4rem}
.why-desc{font-size:.76rem;color:var(--plat);opacity:.6;line-height:1.55}

/* CATEGORY NAV MOBILE */
.cat-nav-mobile{display:none;position:sticky;top:calc(var(--banner-h,0px) + 64px);z-index:90;background:rgba(7,7,15,0.92);backdrop-filter:blur(16px);-webkit-backdrop-filter:blur(16px);border-bottom:1px solid var(--border);padding:0.5rem 1rem;overflow-x:auto;scrollbar-width:none;scroll-snap-type:x mandatory}
.cat-nav-mobile::-webkit-scrollbar{display:none}
.cat-nav-mobile .cat-tab{font-size:0.7rem;padding:0.4rem 0.7rem}

/* SECTIONS */
.container{max-width:1200px;margin:0 auto;padding:0 1.5rem}
.cat-section{padding:3rem 0}
.cat-header{text-align:center;margin-bottom:2rem}
.cat-header h2{font-size:clamp(1.3rem,3vw,2rem);font-weight:700;margin-bottom:0.5rem}
.cat-header h2 .g{color:var(--gold)}
.cat-sub{font-size:0.85rem;color:var(--plat);opacity:0.6;max-width:500px;margin:0 auto}
.links-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:1rem}

/* TOP PICK */
.top-pick{padding:3rem 1.5rem;max-width:1200px;margin:0 auto}
.top-card{background:var(--deep);border:1.5px solid var(--border-hi);border-radius:20px;padding:2rem;animation:glowPulse 4s ease-in-out infinite;position:relative;overflow:hidden}
.top-card::before{content:'';position:absolute;top:0;left:0;right:0;height:1px;background:linear-gradient(90deg,transparent,var(--gold),transparent)}
.top-card-inner{display:grid;grid-template-columns:1fr 1fr;gap:2rem;align-items:center}
.top-badge{display:inline-flex;align-items:center;gap:0.5rem;font-family:'Syne',sans-serif;font-size:0.75rem;font-weight:700;color:var(--gold);letter-spacing:2px;text-transform:uppercase;margin-bottom:1rem}
.top-brand{font-family:'Syne',sans-serif;font-weight:800;font-size:clamp(1.5rem,3vw,2.2rem);color:var(--white);margin-bottom:0.5rem}
.top-license{font-size:0.75rem;color:var(--green);margin-bottom:1rem;display:flex;align-items:center;gap:0.3rem}
.top-highlights{list-style:none;margin-bottom:1rem}
.top-highlights li{font-size:0.85rem;color:var(--plat);padding:0.25rem 0;display:flex;align-items:center;gap:0.5rem}
.top-highlights li::before{content:'✓';color:var(--gold);font-weight:700}
.top-right{display:flex;flex-direction:column;gap:1rem}
.top-rating{text-align:right;margin-bottom:0.5rem}
.top-rating .stars-big{font-size:1.3rem;color:var(--gold)}
.top-rating .rating-num{font-family:'Syne',sans-serif;font-weight:800;font-size:1.8rem;color:var(--white)}
.top-bonus-text{font-family:'Syne',sans-serif;font-weight:700;font-size:clamp(1.2rem,2.5vw,1.8rem);color:var(--white);margin-bottom:0.5rem}
.top-progress{height:6px;background:rgba(255,255,255,0.06);border-radius:3px;overflow:hidden;margin-bottom:1rem}
.top-progress-fill{height:100%;background:linear-gradient(90deg,var(--gold),var(--gold2));border-radius:3px;transition:width 1.5s ease}
.top-no-deposit{background:rgba(0,214,143,0.06);border:1px solid rgba(0,214,143,0.2);border-radius:10px;padding:0.75rem 1rem;margin-bottom:1rem}
.top-no-deposit .label{font-size:0.75rem;font-weight:700;color:var(--green);margin-bottom:0.4rem}
.top-code-row{display:flex;align-items:center;gap:0.5rem}
.top-code{flex:1;font-family:monospace;font-size:0.85rem;background:var(--void);border:1px dashed rgba(0,214,143,0.3);border-radius:6px;padding:6px 10px;color:var(--green);text-align:center}
.top-copy-btn{background:rgba(0,214,143,0.12);border:1px solid rgba(0,214,143,0.25);border-radius:6px;padding:6px 14px;font-size:0.7rem;color:var(--green);cursor:pointer;font-weight:700;white-space:nowrap}
.top-cta{display:block;width:100%;background:linear-gradient(135deg,var(--gold),#c8922a);color:var(--void);font-family:'Syne',sans-serif;font-weight:700;font-size:1.1rem;padding:1rem;border-radius:12px;text-decoration:none;text-align:center;position:relative;overflow:hidden;transition:transform 0.15s,box-shadow 0.15s}
.top-cta:hover{transform:translateY(-2px);box-shadow:0 8px 30px rgba(232,184,75,0.35)}
.top-cta .shim{position:absolute;inset:0;background:linear-gradient(90deg,transparent,rgba(255,255,255,0.12),transparent);background-size:200%;animation:shimmer 2s infinite}
.top-terms{font-size:0.7rem;color:var(--plat);opacity:0.4;text-align:center;margin-top:0.5rem}

/* AFF CARD */
.aff-card{background:var(--deep);border:1px solid var(--border);border-radius:14px;padding:1.25rem;display:flex;flex-direction:column;gap:0.75rem;animation:cardIn 0.5s ease both;transition:transform 0.25s cubic-bezier(0.34,1.56,0.64,1),border-color 0.2s,box-shadow 0.2s}
.aff-card:hover{transform:translateY(-6px) scale(1.01);border-color:var(--border-hi);box-shadow:0 16px 50px rgba(0,0,0,0.5),0 0 30px var(--gold-glow)}
.aff-top-row{display:flex;justify-content:space-between;align-items:flex-start}
.aff-brand{font-family:'Syne',sans-serif;font-weight:700;font-size:1rem;color:var(--white)}
.aff-license{font-size:0.7rem;color:var(--green);margin-top:2px}
.aff-stars{color:var(--gold);font-size:0.85rem}
.aff-rating-num{font-size:0.7rem;color:var(--gold);font-weight:700;text-align:right}
.aff-bar{height:3px;background:rgba(255,255,255,0.06);border-radius:2px;overflow:hidden}
.rating-fill{height:100%;background:var(--gold);border-radius:2px;transition:width 1s ease}
.aff-headline{font-size:0.85rem;color:var(--plat);font-style:italic;opacity:0.8}
.aff-bonus{font-size:0.9rem;font-weight:500;color:var(--white)}
.aff-wagering{font-size:0.75rem;color:var(--plat);opacity:0.45}
.aff-promo{display:flex;align-items:center;gap:0.5rem}
.aff-promo-code{flex:1;font-family:monospace;font-size:0.8rem;background:var(--surface);border:1px dashed rgba(232,184,75,0.3);border-radius:6px;padding:5px 8px;color:var(--gold);cursor:pointer;text-align:center}
.aff-promo-btn{background:rgba(232,184,75,0.12);border:1px solid rgba(232,184,75,0.25);border-radius:6px;padding:5px 10px;font-size:0.7rem;color:var(--gold);cursor:pointer;white-space:nowrap;font-weight:700}
.aff-nodeposit{background:rgba(0,214,143,0.06);border:1px solid rgba(0,214,143,0.2);border-radius:8px;padding:8px 10px}
.aff-nodeposit .nd-label{font-size:0.7rem;color:var(--green);font-weight:700;margin-bottom:4px}
.aff-nodeposit .nd-code-row{display:flex;align-items:center;gap:6px}
.aff-nodeposit .nd-code{flex:1;font-family:monospace;font-size:0.75rem;background:var(--void);border:1px dashed rgba(0,214,143,0.3);border-radius:4px;padding:3px 6px;color:var(--green);text-align:center}
.aff-nodeposit .nd-copy{background:rgba(0,214,143,0.12);border:none;border-radius:4px;padding:3px 8px;font-size:0.65rem;color:var(--green);cursor:pointer;font-weight:700}
.aff-cta{display:block;width:100%;background:linear-gradient(135deg,var(--gold),#c8922a);color:var(--void);font-family:'Syne',sans-serif;font-weight:700;font-size:0.85rem;padding:10px;border-radius:8px;text-decoration:none;text-align:center;position:relative;overflow:hidden;transition:transform 0.15s,box-shadow 0.15s}
.aff-cta:hover{transform:translateY(-2px);box-shadow:0 4px 20px rgba(232,184,75,0.3)}
.aff-cta .shim{position:absolute;inset:0;background:linear-gradient(90deg,transparent,rgba(255,255,255,0.12),transparent);background-size:200%;animation:shimmer 2s infinite}

/* SEO ABOUT */
.about-section{padding:4rem 1.5rem;max-width:1200px;margin:0 auto}
.about-section h2{font-size:clamp(1.3rem,3vw,2rem);font-weight:700;margin-bottom:2rem;text-align:center}
.about-grid{display:grid;grid-template-columns:2fr 1fr;gap:2rem;align-items:start}
.about-text p{font-size:0.9rem;color:var(--plat);margin-bottom:1rem;line-height:1.7}
.about-stats{background:var(--deep);border:1px solid var(--border);border-radius:14px;padding:1.5rem;display:flex;flex-direction:column;gap:1rem;position:sticky;top:80px}
.about-stats div{display:flex;align-items:center;gap:0.6rem;font-size:0.85rem;color:var(--plat)}
.about-stats div strong{color:var(--gold)}
.about-cat-links{display:flex;flex-wrap:wrap;gap:0.5rem;margin-top:0.5rem}
.about-cat-links a{font-size:0.7rem;background:var(--surface);border:1px solid var(--border);border-radius:6px;padding:0.3rem 0.6rem;color:var(--plat);transition:border-color 0.2s,color 0.2s}
.about-cat-links a:hover{border-color:var(--gold);color:var(--gold)}

/* FAQ */
.faq-section{padding:4rem 1.5rem;max-width:800px;margin:0 auto}
.faq-section h2{font-size:clamp(1.3rem,3vw,2rem);font-weight:700;margin-bottom:2rem;text-align:center}
.faq-item{border-bottom:1px solid var(--border);overflow:hidden}
.faq-item input{display:none}
.faq-item label{display:flex;justify-content:space-between;align-items:center;padding:1.15rem 0;cursor:pointer;font-family:'Syne',sans-serif;font-weight:700;font-size:0.95rem;color:var(--white);transition:color 0.2s}
.faq-item label:hover{color:var(--gold)}
.faq-item label::after{content:'+';font-size:1.2rem;color:var(--gold);transition:transform 0.3s}
.faq-item input:checked~label::after{transform:rotate(45deg)}
.faq-answer{max-height:0;overflow:hidden;transition:max-height 0.4s ease,padding 0.3s;padding:0}
.faq-item input:checked~.faq-answer{max-height:300px;padding:0 0 1.15rem}
.faq-answer p{font-size:0.85rem;color:var(--plat);line-height:1.7}

/* BLOG */
.blog-section{padding:4rem 1.5rem;max-width:1200px;margin:0 auto}
.blog-section h2{font-size:clamp(1.3rem,3vw,2rem);font-weight:700;margin-bottom:2rem;text-align:center}
.blog-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:1.25rem}
.blog-card{background:var(--deep);border:1px solid var(--border);border-radius:14px;padding:1.5rem;transition:transform 0.25s,border-color 0.2s;animation:fadeUp 0.5s ease both}
.blog-card:hover{transform:translateY(-4px);border-color:var(--border-hi)}
.blog-card h3{font-family:'Syne',sans-serif;font-weight:700;font-size:1rem;color:var(--white);margin-bottom:0.5rem}
.blog-card .blog-date{font-size:0.7rem;color:var(--plat);opacity:0.4;margin-bottom:0.75rem}
.blog-card p{font-size:0.8rem;color:var(--plat);opacity:0.7;line-height:1.6;margin-bottom:1rem}
.blog-card a{font-size:0.8rem;font-weight:700;color:var(--gold)}

/* FOOTER */
footer{border-top:1px solid var(--border);padding:3rem 1.5rem;text-align:center;max-width:900px;margin:0 auto}
.footer-18{font-size:2.5rem;margin-bottom:1rem}
footer strong{display:block;font-size:0.85rem;color:var(--white);margin-bottom:1rem}
footer p{font-size:0.75rem;color:var(--plat);opacity:0.4;line-height:1.7;margin-bottom:0.75rem}
.footer-updated{font-size:0.7rem;color:var(--plat);opacity:0.3;margin-top:1.5rem}

/* COOKIE */
.cookie-banner{position:fixed;bottom:0;left:0;right:0;z-index:200;background:rgba(14,14,26,0.92);backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);border-top:1px solid var(--border);padding:1rem 1.5rem;display:flex;align-items:center;justify-content:center;gap:1rem;flex-wrap:wrap;animation:fadeUp 0.4s ease}
.cookie-banner p{font-size:0.8rem;color:var(--plat);max-width:600px}
.cookie-banner button{font-family:'Syne',sans-serif;font-weight:700;font-size:0.75rem;background:var(--gold);color:var(--void);border:none;padding:0.5rem 1.5rem;border-radius:8px;cursor:pointer;white-space:nowrap}

/* TOAST */
.toast{position:fixed;bottom:80px;left:50%;transform:translateX(-50%) translateY(20px);background:var(--gold);color:var(--void);font-family:'Syne',sans-serif;font-weight:700;font-size:0.8rem;padding:0.6rem 1.5rem;border-radius:10px;opacity:0;pointer-events:none;transition:opacity 0.3s,transform 0.3s;z-index:300}
.toast.show{opacity:1;transform:translateX(-50%) translateY(0)}

/* RESPONSIVE */
@media(max-width:768px){
  .cat-nav-mobile{display:flex}
  .nav-tabs{display:none}
  .hero{min-height:auto;padding:5rem 1rem 3rem}
  .hero-stats{gap:1.5rem}
  .hero-stat .counter{font-size:1.5rem}
  .top-card-inner{grid-template-columns:1fr}
  .top-rating{text-align:left}
  .about-grid{grid-template-columns:1fr}
  .about-stats{position:static}
  .links-grid{grid-template-columns:1fr}
  .trust-strip{gap:1.25rem;padding:1rem;justify-content:flex-start;overflow-x:auto;flex-wrap:nowrap}
  .header-cta{padding:0.35rem 0.75rem;font-size:0.7rem}
  .blog-grid{grid-template-columns:1fr}
  .why-grid{grid-template-columns:1fr 1fr}
  .sticky-cta-bar .scb-text:nth-child(3){display:none}
  .sticky-cta-bar .scb-sep{display:none}
}
@media(max-width:420px){
  .why-grid{grid-template-columns:1fr}
  .trust-badges{flex-wrap:wrap}
  .tb-item{flex:1 0 48%;border-right:none;border-bottom:1px solid var(--border)}
  .tb-item:nth-child(odd){border-right:1px solid var(--border)}
  .sticky-cta-bar .scb-text{display:none}
}
@media(min-width:769px) and (max-width:1024px){
  .links-grid{grid-template-columns:repeat(2,1fr)}
}
</style>
</head>
<body>

<!-- STICKY CTA BANNER -->
<div class="sticky-cta-bar" id="sticky-cta">
  <span class="scb-icon">🏆</span>
  <span class="scb-text"><strong>#1 Pick: Casinia</strong></span>
  <span class="scb-sep">·</span>
  <span class="scb-text">100% up to <strong>€500 + 200 Free Spins</strong></span>
  <a href="https://9867-cas1nia.com/en/promotions/casino/welcome-bonus" rel="nofollow sponsored" target="_blank" class="scb-btn">🎁 Claim Now →</a>
  <button class="scb-close" id="scb-close-btn" aria-label="Close banner">✕</button>
</div>

<!-- HEADER -->
<header>
  <div class="logo">◆ CLAIMSPINS <span><?= strtoupper(e($lang)) ?></span></div>
  <nav class="nav-tabs">
    <?php foreach($nav as $catKey => $catLabel): ?>
    <button class="cat-tab<?= $catKey === 'all' ? ' active' : '' ?>" onclick="filterCat('<?= e($catKey) ?>',this)"><?= e($catLabel) ?></button>
    <?php endforeach; ?>
  </nav>
  <a href="#top-pick" class="header-cta">🎁 Get Bonus</a>
</header>

<!-- CATEGORY NAV MOBILE -->
<div class="cat-nav-mobile">
  <?php foreach($nav as $catKey => $catLabel): ?>
  <button class="cat-tab<?= $catKey === 'all' ? ' active' : '' ?>" onclick="filterCat('<?= e($catKey) ?>',this)"><?= e($catLabel) ?></button>
  <?php endforeach; ?>
</div>

<!-- HERO -->
<section class="hero">
  <div class="hero-bg"></div>
  <div class="hero-particles">
    <?php for($p=0;$p<18;$p++):
      $x=rand(0,100); $y=rand(0,100);
      $dx=rand(-40,40); $dy=rand(-40,40);
      $dur=rand(6,14); $del=rand(0,8);
      $sz=rand(2,5);
    ?>
    <div class="particle" style="left:<?=$x?>%;top:<?=$y?>%;width:<?=$sz?>px;height:<?=$sz?>px;--dx:<?=$dx?>px;--dy:<?=$dy?>px;--dur:<?=$dur?>s;animation-delay:<?=$del?>s"></div>
    <?php endfor; ?>
  </div>
  <div class="hero-content">
    <div class="hero-badge">✦ Updated <?= e($meta['updated'] ?? date('F Y')) ?></div>
    <h1><?php
      $h1 = $meta['h1'] ?? 'Best Online Casinos';
      $words = explode(' ', $h1);
      $highlight = max(0, count($words) - 2);
      foreach($words as $wi => $word) {
        echo $wi === $highlight ? '<span class="gold">' . e($word) . '</span> ' : e($word) . ' ';
      }
    ?></h1>
    <p class="hero-sub"><?= e($meta['subtitle'] ?? '') ?></p>
    <div class="hero-stats">
      <div class="hero-stat">
        <span class="counter" data-target="<?= $totalLinks ?>"><?= $totalLinks ?></span>
        <small>Casinos</small>
      </div>
      <div class="hero-stat">
        <span class="counter" data-target="<?= $maxBonus ?>" data-prefix="€"><?= $maxBonus ?></span>
        <small>Max Bonus</small>
      </div>
      <div class="hero-stat">
        <span class="counter" data-target="<?= $totalSpins ?>"><?= $totalSpins ?></span>
        <small>Free Spins</small>
      </div>
    </div>
    <div class="hero-btns">
      <a href="#top-pick" class="btn-primary">→ Claim Best Bonus<span class="shim"></span></a>
    </div>
  </div>
</section>

<!-- TRUST BADGES -->
<div class="trust-badges">
  <div class="tb-item">
    <span class="tb-num counter" data-target="<?= $totalLinks ?>"><?= $totalLinks ?>+</span>
    <span class="tb-label">Casinos Reviewed</span>
  </div>
  <div class="tb-item">
    <span class="tb-num"><?= count($availLangs) ?></span>
    <span class="tb-label">Languages</span>
  </div>
  <div class="tb-item">
    <span class="tb-num"><?= $trustYears ?>+</span>
    <span class="tb-label">Years Experience</span>
  </div>
  <div class="tb-item">
    <span class="tb-num">100%</span>
    <span class="tb-label">Free to Use</span>
  </div>
</div>

<!-- TRUST STRIP -->
<?php if(!empty($trust)): ?>
<div class="trust-strip">
  <?php foreach($trust as $t): ?>
  <div class="trust-item"><?= e(is_array($t) ? ($t['text'] ?? '') : $t) ?></div>
  <?php endforeach; ?>
</div>
<?php endif; ?>

<!-- TOP PICK SHOWCASE -->
<?php if(!empty($top)): ?>
<section class="top-pick" id="top-pick">
  <div class="top-card">
    <div class="top-card-inner">
      <div>
        <div class="top-badge">✦ EDITOR'S CHOICE</div>
        <div class="top-brand"><?= e($top['brand'] ?? '') ?></div>
        <div class="top-license">✓ <?= e($top['license'] ?? '') ?></div>
        <div class="top-progress">
          <div class="top-progress-fill" style="width:<?= ($top['rating']??0)/5*100 ?>%"></div>
        </div>
        <ul class="top-highlights">
          <?php $highlights = $top['highlights'] ?? [];
          foreach($highlights as $hl): ?>
          <li><?= e($hl) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="top-right">
        <div class="top-rating">
          <div class="stars-big"><?= stars($top['rating']??0) ?></div>
          <div class="rating-num"><?= number_format($top['rating']??0,1) ?>/5</div>
        </div>
        <div class="top-bonus-text"><?= e($top['bonus'] ?? '') ?></div>
        <?php if(($top['no_deposit_spins']??0)>0): ?>
        <div class="top-no-deposit">
          <div class="label">🎁 <?= (int)$top['no_deposit_spins'] ?> FREE SPINS — NO DEPOSIT</div>
          <?php if(!empty($top['no_deposit_code'])): ?>
          <div class="top-code-row">
            <div class="top-code"><?= e($top['no_deposit_code']) ?></div>
            <button class="top-copy-btn" onclick="copyCode('<?= e($top['no_deposit_code']) ?>')">COPY</button>
          </div>
          <?php endif; ?>
        </div>
        <?php endif; ?>
        <a href="<?= e($top['url']??'') ?>" rel="nofollow sponsored" target="_blank" class="top-cta">
          <?= e($top['cta_text'] ?? 'Claim Bonus') ?> → €<?= (int)($top['bonus_amount']??0) ?>
          <span class="shim"></span>
        </a>
        <div class="top-terms">Min €<?= (int)($top['min_deposit']??0) ?> · Wager <?= e($top['wagering']??'') ?> · 18+</div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- WHY TRUST -->
<section class="why-trust">
  <div class="why-trust-h">
    <h2>Why Trust <span class="g">ClaimSpins</span></h2>
  </div>
  <div class="why-grid">
    <div class="why-card">
      <span class="why-icon">🛡️</span>
      <div class="why-title">Licensed Casinos Only</div>
      <div class="why-desc">Every listed casino holds a valid MGA, UKGC, or Curaçao license — verified before publication.</div>
    </div>
    <div class="why-card">
      <span class="why-icon">🔄</span>
      <div class="why-title">Updated Weekly</div>
      <div class="why-desc">Bonus amounts, promo codes, and free spin counts are refreshed every week — always current.</div>
    </div>
    <div class="why-card">
      <span class="why-icon">🏆</span>
      <div class="why-title">Expert Reviews</div>
      <div class="why-desc">Each casino is hands-on tested for game selection, support quality, and fair bonus terms.</div>
    </div>
    <div class="why-card">
      <span class="why-icon">⚡</span>
      <div class="why-title">Fast Payouts</div>
      <div class="why-desc">We prioritize casinos with swift withdrawals — most listed operators process within 24 hours.</div>
    </div>
  </div>
</section>

<!-- AFFILIATE CARDS GRID -->
<div class="container">
<?php foreach($catOrder as $catKey):
  if(empty($byCat[$catKey])) continue;
  $cat = $cats[$catKey] ?? ['label'=>$catKey,'headline'=>'','sub'=>''];
  $links = $byCat[$catKey];
?>
  <section class="cat-section" id="cat-<?= e($catKey) ?>" data-cat="<?= e($catKey) ?>">
    <div class="cat-header">
      <h2><?= e($cat['label'] ?? '') ?> <span class="g"><?= e($cat['headline'] ?? '') ?></span></h2>
      <p class="cat-sub"><?= e($cat['sub'] ?? '') ?></p>
    </div>
    <div class="links-grid">
      <?php foreach($links as $i => $a): ?>
      <div class="aff-card" style="animation-delay:<?= $i*0.06 ?>s">
        <!-- Top row: brand + rating -->
        <div class="aff-top-row">
          <div>
            <div class="aff-brand"><?= e($a['brand'] ?? '') ?></div>
            <div class="aff-license">✓ <?= e($a['license'] ?? '') ?></div>
          </div>
          <div style="text-align:right">
            <div class="aff-stars"><?= stars($a['rating']??0) ?></div>
            <div class="aff-rating-num"><?= number_format($a['rating']??0,1) ?></div>
          </div>
        </div>

        <!-- Rating bar -->
        <div class="aff-bar">
          <div class="rating-fill" style="--w:<?= ($a['rating']??0)/5*100 ?>%;width:0"></div>
        </div>

        <!-- Card headline -->
        <?php if(!empty($a['card_headline'])): ?>
        <div class="aff-headline">"<?= e($a['card_headline']) ?>"</div>
        <?php endif; ?>

        <!-- Bonus info -->
        <div class="aff-bonus"><?= e($a['bonus'] ?? '') ?></div>

        <!-- Wagering -->
        <div class="aff-wagering"><?= e($a['wagering']??'') ?> wagering · Min €<?= (int)($a['min_deposit']??0) ?></div>

        <!-- Promo code -->
        <?php if(!empty($a['promo_code'])): ?>
        <div class="aff-promo">
          <div class="aff-promo-code" onclick="copyCode('<?= e($a['promo_code']) ?>')"><?= e($a['promo_code']) ?></div>
          <button class="aff-promo-btn" onclick="copyCode('<?= e($a['promo_code']) ?>')">COPY</button>
        </div>
        <?php endif; ?>

        <!-- No deposit -->
        <?php if(($a['no_deposit_spins']??0) > 0): ?>
        <div class="aff-nodeposit">
          <div class="nd-label">🎁 <?= (int)$a['no_deposit_spins'] ?> FREE SPINS — NO DEPOSIT</div>
          <?php if(!empty($a['no_deposit_code'])): ?>
          <div class="nd-code-row">
            <div class="nd-code"><?= e($a['no_deposit_code']) ?></div>
            <button class="nd-copy" onclick="copyCode('<?= e($a['no_deposit_code']) ?>')">COPY</button>
          </div>
          <?php endif; ?>
        </div>
        <?php endif; ?>

        <!-- CTA -->
        <a href="<?= e($a['url'] ?? '') ?>" rel="nofollow sponsored" target="_blank" class="aff-cta">
          <?= e($a['cta_text'] ?? 'Claim') ?> →
          <span class="shim"></span>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
  </section>
<?php endforeach; ?>
</div>

<!-- SEO TEXT -->
<section class="about-section" id="about">
  <h2><?= e($seo['about_h2'] ?? '') ?></h2>
  <div class="about-grid">
    <div class="about-text">
      <?php if(!empty($seo['about_p1'])): ?><p><?= e($seo['about_p1']) ?></p><?php endif; ?>
      <?php if(!empty($seo['about_p2'])): ?><p><?= e($seo['about_p2']) ?></p><?php endif; ?>
      <?php if(!empty($seo['about_p3'])): ?><p><?= e($seo['about_p3']) ?></p><?php endif; ?>
    </div>
    <aside class="about-stats">
      <div>📊 <strong><?= $totalLinks ?></strong> affiliate links</div>
      <div>💰 Up to <strong>€<?= number_format($maxBonus) ?></strong> bonus</div>
      <div>🎰 <strong><?= number_format($totalSpins) ?></strong> free spins total</div>
      <div class="about-cat-links">
        <?php foreach($cats as $ck => $cv): ?>
        <a href="#cat-<?= e($ck) ?>"><?= e($cv['label'] ?? $ck) ?></a>
        <?php endforeach; ?>
      </div>
    </aside>
  </div>
</section>

<!-- FAQ -->
<?php if(!empty($faq)): ?>
<section class="faq-section" id="faq">
  <h2><?= e($meta['faq_title'] ?? 'Frequently Asked Questions') ?></h2>
  <?php foreach($faq as $fi => $f): ?>
  <div class="faq-item">
    <input type="checkbox" id="faq-<?= $fi ?>">
    <label for="faq-<?= $fi ?>"><?= e($f['q'] ?? '') ?></label>
    <div class="faq-answer"><p><?= e($f['a'] ?? '') ?></p></div>
  </div>
  <?php endforeach; ?>
</section>
<?php endif; ?>

<!-- LATEST BLOG POSTS -->
<?php if(!empty($blogDisplay)): ?>
<section class="blog-section" id="blog">
  <h2><?= e($meta['blog_title'] ?? 'Latest Articles') ?></h2>
  <div class="blog-grid">
    <?php foreach($blogDisplay as $bi => $b): ?>
    <div class="blog-card" style="animation-delay:<?= $bi*0.08 ?>s">
      <h3><?= e($b['title']) ?></h3>
      <div class="blog-date"><?= e($b['date']) ?></div>
      <p><?= e($b['excerpt']) ?></p>
      <a href="<?= e($b['url']) ?>">Read more →</a>
    </div>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>

<!-- FOOTER -->
<footer>
  <div class="footer-18">🔞</div>
  <strong><?= e($footer['disclaimer_18'] ?? 'Gambling is for adults only. You must be 18+ to participate.') ?></strong>
  <p><?= e($footer['affiliate_disclosure'] ?? 'This website contains affiliate links. We may earn a commission at no extra cost to you.') ?></p>
  <p><?= e($footer['responsible_gambling'] ?? 'Please gamble responsibly. If you have a gambling problem, seek help.') ?></p>
  <div class="footer-updated">Last updated: <?= e($meta['updated'] ?? date('F Y')) ?></div>
</footer>

<!-- COOKIE BANNER -->
<div class="cookie-banner" id="cookie-banner">
  <p>We use cookies to improve your experience and analyze site traffic. By continuing, you agree to our cookie policy.</p>
  <button id="cookie-ok">Accept</button>
</div>

<!-- TOAST -->
<div class="toast" id="toast"></div>

<script>
// Toast notification
const toast=document.getElementById('toast');
function copyCode(code){
  navigator.clipboard?.writeText(code).catch(()=>{const t=document.createElement('textarea');t.value=code;document.body.appendChild(t);t.select();document.execCommand('copy');document.body.removeChild(t);});
  toast.textContent='Copied! ✓';
  toast.classList.add('show');
  setTimeout(()=>toast.classList.remove('show'),2000);
}

// Category filter
function filterCat(key,btn){
  document.querySelectorAll('.cat-tab').forEach(b=>b.classList.remove('active'));
  btn.classList.add('active');
  // Sync both desktop and mobile nav
  document.querySelectorAll('.cat-tab').forEach(b=>{
    if(b!==btn&&b.textContent.trim()===btn.textContent.trim()) b.classList.add('active');
  });
  document.querySelectorAll('.cat-section').forEach(s=>{
    s.style.display=(key==='all'||s.dataset.cat===key)?'':'none';
  });
  // Scroll to the first visible section
  const target = key==='all'
    ? document.querySelector('.cat-section')
    : document.getElementById('cat-'+key);
  if(target){
    const stickyOffset = parseInt(getComputedStyle(document.documentElement).getPropertyValue('--banner-h')||'0')+64+8;
    const top = target.getBoundingClientRect().top + window.scrollY - stickyOffset;
    window.scrollTo({top, behavior:'smooth'});
  }
}

// Count-up animation
function countUp(el,target,prefix,duration){
  prefix=prefix||'';duration=duration||2000;
  let start=null;
  const step=ts=>{
    if(!start)start=ts;
    const p=Math.min((ts-start)/duration,1);
    const ease=1-Math.pow(1-p,3);
    el.textContent=prefix+Math.floor(ease*target).toLocaleString();
    if(p<1)requestAnimationFrame(step);
    else el.textContent=prefix+target.toLocaleString();
  };
  requestAnimationFrame(step);
}
document.querySelectorAll('.counter').forEach(el=>{
  const obs=new IntersectionObserver(([e])=>{
    if(e.isIntersecting){
      countUp(el,+el.dataset.target,el.dataset.prefix||'');
      obs.unobserve(el);
    }
  },{threshold:0.5});
  obs.observe(el);
});

// Rating bars trigger
document.querySelectorAll('.rating-fill').forEach(bar=>{
  const obs=new IntersectionObserver(([e])=>{
    if(e.isIntersecting){
      bar.style.width=getComputedStyle(bar).getPropertyValue('--w');
      obs.unobserve(bar);
    }
  },{threshold:0.3});
  obs.observe(bar);
});

// Header scroll effect
window.addEventListener('scroll',()=>{
  document.querySelector('header')?.classList.toggle('scrolled',scrollY>80);
},{passive:true});

// Cookie banner
if(localStorage.getItem('ck'))document.getElementById('cookie-banner').style.display='none';
document.getElementById('cookie-ok')?.addEventListener('click',()=>{
  localStorage.setItem('ck','1');
  document.getElementById('cookie-banner').style.display='none';
});

// Sticky CTA banner dismiss
if(sessionStorage.getItem('scb_dismissed')){
  const b=document.getElementById('sticky-cta');
  if(b){b.classList.add('hidden');document.documentElement.style.setProperty('--banner-h','0px');}
}
document.getElementById('scb-close-btn')?.addEventListener('click',()=>{
  const b=document.getElementById('sticky-cta');
  if(b){b.classList.add('hidden');document.documentElement.style.setProperty('--banner-h','0px');}
  sessionStorage.setItem('scb_dismissed','1');
});

</script>
<!-- Google Analytics — deferred to end of body for faster FCP -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-KEV90PCXTW"></script>
<script>
window.dataLayer=window.dataLayer||[];
function gtag(){dataLayer.push(arguments);}
gtag('js',new Date());
gtag('config','G-KEV90PCXTW',{send_page_view:true});
</script>
<!-- v2.2-perf | <?= date('Y-m-d') ?> -->
</body>
</html>