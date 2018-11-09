<?php

if (isset($_SERVER['REQUEST_URI'])) {
  $current_page = rtrim($_SERVER['REQUEST_URI'], '/');
} else {
  $current_page = '';
}

$nav = array(
    array(
        'url' => '/generate',
        'name' => 'Générateurs',
        'childs' => array(
            '/generate/password' => 'Mot de passe',
        //    '/generate/html' => 'faut text HTML',
        //    '/generate/html-table' => 'table HTML',
        //    '/generate/html-list' => 'liste HTML',
        ),
    ),
    array(
        'url' => '/website',
        'name' => 'Site',
        'childs' => array(
            '/website/info' => 'Informations',
        //    '/generate/html' => 'faut text HTML',
        //    '/generate/html-table' => 'table HTML',
        //    '/generate/html-list' => 'liste HTML',
        ),
    ),
);

function getBreadcrumb($current_page, $nav)
{
    $breadcrumb = array(
        '' => 'simplement Web',
    );

    foreach ($nav as $category) {
        if ($current_page == $category['url']) {
            $breadcrumb[$category['url']] = $category['name'];
        }
        if (isset($category['childs']) && is_array($category['childs']) && (count($category['childs']) > 0)) {
            if (isset($category['childs'][$current_page])) {
                $breadcrumb[$category['url']] = $category['name'];
                $breadcrumb[$current_page] = $category['childs'][$current_page];
            }
        }
    }

    return $breadcrumb;
}

$breadcrumb = getBreadcrumb($current_page, $nav);
