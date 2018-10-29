<?php

if (isset($_SERVER['REQUEST_URI'])) {
  $current_page = rtrim($_SERVER['REQUEST_URI'], '/');
} else {
  $current_page = '';
}

$nav = array(
    array(
        'url' => '',
        'name' => 'Compétences',
        'childs' => array(
            '/integration-developpement-frontend' => 'UI et UX',
            '/devoloppment-web' => 'Modélisation',
            '/ergonomie-accessibilite' => 'Audit qualité web',
            '/presence-en-ligne' => 'Présence en ligne',
        ),
    ),
    array(
        'url' => '/technologies',
        'name' => 'Technologies',
        'childs' => array(
            '/technologies/api' => 'API et manipulation de données',
            '/technologies/responsive' => 'Responsive',
            '/technologies/donnees-structurees' => 'Données structurées',
        ),
    ),
    array(
        'url' => '/projets',
        'name' => 'Projets',
        'childs' => array(
            '/projets/sepa' => 'Automatisation de processus (SEPA)',
            '/projets/processus' => 'Tableau de bord de gestion (Processus)',
            '/projets/statistiques' => 'Tableau de bord de gestion (Statistiques)',
        ),
    ),
    array(
        'url' => '/references',
        'name' => 'Clients',
    ),
    array(
        'url' => '/contact',
        'name' => 'Contact',
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
