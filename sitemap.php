<?php
/**
 * Dynamic XML Sitemap Generator
 * Reads all data/{lang}.json files, outputs sitemap with hreflang alternates
 * Route: /sitemap.xml → sitemap.php (via .htaccess)
 */
header('Content-Type: application/xml; charset=UTF-8');

$BASE_DOMAIN = 'https://claimspins.online';
$DATA_DIR    = __DIR__ . '/data/';
$today       = date('Y-m-d');

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

// Load blog slugs per language
$blogsByLang = [];
foreach ($langs as $l) {
    $dataFile = $DATA_DIR . $l . '.json';
    if (!file_exists($dataFile)) continue;
    $raw = json_decode(file_get_contents($dataFile), true);
    $blogsByLang[$l] = [];
    if (!empty($raw['blogs'])) {
        foreach ($raw['blogs'] as $b) {
            if (!empty($b['slug'])) {
                $blogsByLang[$l][] = $b['slug'];
            }
        }
    }
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

<?php /* ── Blog pages: /{lang}/{slug}/ ── */ ?>
<?php foreach ($langs as $l):
    if (empty($blogsByLang[$l])) continue;
    foreach ($blogsByLang[$l] as $slug):
?>
  <url>
    <loc><?= htmlspecialchars($BASE_DOMAIN . '/' . $l . '/' . $slug . '/') ?></loc>
    <lastmod><?= $today ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
<?php     // hreflang alternates — link same slug in other languages if it exists
          foreach ($langs as $alt):
              if (in_array($slug, $blogsByLang[$alt] ?? [])):
?>
    <xhtml:link rel="alternate" hreflang="<?= $alt ?>" href="<?= htmlspecialchars($BASE_DOMAIN . '/' . $alt . '/' . $slug . '/') ?>" />
<?php         endif;
          endforeach; ?>
    <xhtml:link rel="alternate" hreflang="x-default" href="<?= htmlspecialchars($BASE_DOMAIN . '/en/' . $slug . '/') ?>" />
  </url>
<?php
    endforeach;
endforeach; ?>

</urlset>