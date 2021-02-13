<?php

use Timber\Timber;

$taxonomy = get_query_var("taxonomy");

$templates = ["archive-{$taxonomy}.twig", "archive-taxonomy.twig"];

$context = Timber::context();

$context["terms"] = array_map(
    function ($term) {
        return [
            "object" => $term,
            "link" => get_term_link($term),
        ];
    },
    get_terms([
        "taxonomy" => $taxonomy,
        "hide_empty" => false,
    ])
);

Timber::render($templates, $context);
