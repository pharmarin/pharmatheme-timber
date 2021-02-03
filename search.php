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

$templates = ["search.twig", "archive.twig", "index.twig"];

$context = Timber::context();
$context["title"] = "Search results for " . get_search_query();
$context["posts"] = new PostQuery();
$context["query"] = get_search_query();

Timber::render($templates, $context);
