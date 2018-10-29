<?php

require_once('_config.php');


$page = '<?xml version="1.0" encoding="UTF-8" ?>';
$page .= '<urlset xmlns="http://www.google.com/schemas/sitemap/0.84">';
$page .= sprintf('
    <url>
        <loc>https://www.simplement-web.com/%s</loc>
        <lastmod>%s</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.1</priority>
    </url>', '', date('Y-m-d'));

foreach ($nav as $category) {
    $page .= sprintf('
    <url>
        <loc>https://www.simplement-web.com%s</loc>
        <lastmod>%s</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.1</priority>
    </url>', $category['url'], date('Y-m-d'));
  if (isset($category['childs']) && is_array($category['childs']) && (count($category['childs']) > 0)) {
         foreach ($category['childs'] as $url => $name) {
            $page .= sprintf('
            <url>
                <loc>https://www.simplement-web.com%s/</loc>
                <lastmod>%s</lastmod>
                <changefreq>monthly</changefreq>
                <priority>0.1</priority>
            </url>', $url, date('Y-m-d'));
         }
  }
}
$page .= '</urlset>';
file_put_contents('sitemap.xml', $page);
