<?php
/**
 * Dynamic XML Sitemap Generator
 * Reads all data/{lang}.json files, outputs sitemap with hreflang alternates
 * Also scans blog/ directory for static blog post HTML files
 * Route: /sitemap.xml → sitemap.php (via .htaccess)
 */
header('Content-Type: application/xml; charset=UTF-8');

$BASE_DOMAIN = 'https://claimspins.online';
$DATA_DIR    = __DIR__ . '/data/';
$BLOG_DIR    = __DIR__ . '/blog/';
$today       = date('Y-m-d');

// ── Main language pages ────────────────────────────────────────────────────

// Discover all available languages from data files
$langs = [];
foreach (glob($DATA_DIR . '*.json') as $file) {
    $code = basename($file, '.json');
    if (preg_match('/^[a-z]{2}$/', $code)) {
        $langs[] = $code;
    }
}
sort($langs);

if (empty($langs)) {
    $langs = ['en'];
}

// ── Blog posts from /blog/ directory ──────────────────────────────────────

// Cross-language pairs: slug => [ lang => canonical_slug, ... ]
// Add new pairs here when translation pairs are created
$blogCrossLang = [
    'best-casino-bonus-japan-2026'    => ['en' => 'best-casino-bonus-japan-2026', 'ja' => 'best-casino-bonus-japan-2026-ja'],
    'best-casino-bonus-japan-2026-ja' => ['en' => 'best-casino-bonus-japan-2026', 'ja' => 'best-casino-bonus-japan-2026-ja'],
];

$blogPosts = [];
if (is_dir($BLOG_DIR)) {
    foreach (glob($BLOG_DIR . '*/index.html') as $file) {
        $slug = basename(dirname($file));
        // Extract lang attribute from <html lang="...">
        $html = file_get_contents($file);
        preg_match('/<html[^>]+lang=["\']([^"\']+)["\']/', $html, $m);
        $postLang = $m[1] ?? 'en';
        $blogPosts[] = ['slug' => $slug, 'lang' => $postLang];
    }
    usort($blogPosts, fn($a, $b) => strcmp($a['slug'], $b['slug']));
}

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml">

<?php /* ── Main pages: /{lang}/ ── */ ?>
<?php foreach ($langs as $l): ?>
  <url>
    <loc><?= htmlspecialchars($BASE_DOMAIN . '/' . $l . '/') ?></loc>
    <lastmod><?= $today ?></lastmod>
    <changefreq>weekly</changefreq>
    <priority>1.0</priority>
<?php   foreach ($langs as $alt): ?>
    <xhtml:link rel="alternate" hreflang="<?= $alt ?>" href="<?= htmlspecialchars($BASE_DOMAIN . '/' . $alt . '/') ?>" />
<?php   endforeach; ?>
    <xhtml:link rel="alternate" hreflang="x-default" href="<?= htmlspecialchars($BASE_DOMAIN . '/en/') ?>" />
  </url>
<?php endforeach; ?>

<?php /* ── Blog posts: /blog/{slug}/ ── */ ?>
<?php foreach ($blogPosts as $post):
    $slug     = $post['slug'];
    $postLang = $post['lang'];
    $postUrl  = $BASE_DOMAIN . '/blog/' . $slug . '/';
    // Determine hreflang alternates
    if (isset($blogCrossLang[$slug])) {
        $alternates = $blogCrossLang[$slug];
        $xDefault   = $BASE_DOMAIN . '/blog/' . ($alternates['en'] ?? $slug) . '/';
    } else {
        $alternates = [$postLang => $slug];
        $xDefault   = $postUrl;
    }
?>
  <url>
    <loc><?= htmlspecialchars($postUrl) ?></loc>
    <lastmod><?= $today ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
<?php   foreach ($alternates as $altLang => $altSlug): ?>
    <xhtml:link rel="alternate" hreflang="<?= htmlspecialchars($altLang) ?>" href="<?= htmlspecialchars($BASE_DOMAIN . '/blog/' . $altSlug . '/') ?>" />
<?php   endforeach; ?>
    <xhtml:link rel="alternate" hreflang="x-default" href="<?= htmlspecialchars($xDefault) ?>" />
  </url>
<?php endforeach; ?>

</urlset>
