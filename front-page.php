<?php
/**
 * The home template file
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

use Timber\PostQuery;
use Timber\Timber;

$context = Timber::context();
$context["posts"] = new PostQuery();
$context["post_type"] = isset($_GET['type']) ? $_GET['type'] : "";
$context["post_types"] = [
    [
        "slug" => "",
        "name" => "Articles"
    ],
    [
        "slug" => "produit",
        "name" => "Produits",
        "cards" => [
            [
              "title" => "Tous les produits",
              "link" => "produits/"
            ],
            [
              "title" => "Trier par laboratoire",
              "link" => "laboratoire/"
            ]
        ]
    ],
    [
        "slug" => "aromatherapie",
        "name" => "Huiles essentielles",
        "cards" => [
            [
              "title" => "Toutes les huiles essentielles",
              "link" => "aromatherapie/"
            ],
            [
              "title" => "Trier par propriété",
              "link" => "proprietes/"
            ],
            [
              "title" => "Trier par utilisation",
              "link" => "usages/"
            ],
            [
              "title" => "Trier par molécule principale",
              "link" => "principes_actifs/"
            ]
        ]
    ],
    [
        "slug" => "phytotherapie",
        "name" => "Plantes",
        "cards" => [
            [
              "title" => "Toutes les plantes",
              "link" => "phytotherapie/"
            ],
            [
              "title" => "Trier par propriété",
              "link" => "proprietes/"
            ],
            [
              "title" => "Trier par utilisation",
              "link" => "usages/"
            ],
            [
              "title" => "Trier par molécule principale",
              "link" => "principes_actifs/"
            ]
        ]
    ]
];

Timber::render('front-page.twig', $context);
