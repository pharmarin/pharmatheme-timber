<?php
/**
 * Search results page
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

use Timber\PostQuery;
use Timber\Timber;

if (get_search_query() === "") {
    wp_redirect(home_url());
}

$templates = ["archive.twig", "index.twig"];

$context = Timber::context();
$context["title"] = "Résultat de la recherche pour " . get_search_query();
$context["posts"] = new PostQuery(false, POST_MAP);
$context["query"] = get_search_query();

Timber::render($templates, $context);
