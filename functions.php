<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

use Timber\Timber;
use Timber\Menu;
use Timber\PostQuery;
use Timber\Site;

/**
 * If you are installing Timber as a Composer dependency in your theme, you'll need this block
 * to load your dependencies and initialize Timber. If you are using Timber via the WordPress.org
 * plug-in, you can safely delete this block.
 */
$composer_autoload = __DIR__ . "/vendor/autoload.php";
if (file_exists($composer_autoload)) {
    $loader = require_once $composer_autoload;
    $timber = new Timber();
    $loader->add("Models", __DIR__ . "models");
}

const POST_MAP = [
    "aromatherapie" => "Models\AromatherapiePost",
    "produit" => "Models\ProduitPost",
];

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if (!class_exists("Timber")) {
    add_action("admin_notices", function () {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' .
            esc_url(admin_url("plugins.php#timber")) .
            '">' .
            esc_url(admin_url("plugins.php")) .
            "</a></p></div>";
    });

    add_filter("template_include", function ($template) {
        return get_stylesheet_directory() . "/static/no-timber.html";
    });
    return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = ["templates", "views"];

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;

/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Site
{
    /** Add timber support. */
    public function __construct()
    {
        add_action("after_setup_theme", [$this, "theme_supports"]);
        add_filter("timber/context", [$this, "add_to_context"]);
        add_filter("timber/twig", [$this, "add_to_twig"]);
        add_action("init", [$this, "register_post_types"]);
        add_action("init", [$this, "register_taxonomies"]);
        add_action("admin_enqueue_scripts", [$this, "enqueue_admin_styles"]);
        parent::__construct();
    }

    /** This is where you add some context
     *
     * @param string $context context['this'] Being the Twig's {{ this }}.
     */
    public function add_to_context($context)
    {
        $context["menu"] = new Menu();
        $context["site"] = $this;
        return $context;
    }

    public function theme_supports()
    {
        // Add default posts and comments RSS feed links to head.
        add_theme_support("automatic-feed-links");

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support("title-tag");

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support("post-thumbnails");

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support("html5", [
            "comment-form",
            "comment-list",
            "gallery",
            "caption",
        ]);

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support("post-formats", [
            "aside",
            "image",
            "video",
            "quote",
            "link",
            "gallery",
            "audio",
        ]);

        add_theme_support("menus");

        add_theme_support("infinite-scroll", [
            "container" => "infinite-loop-content",
            "footer" => false,
            "render" => [$this, "render_infinite_scroll"],
        ]);
    }

    public function render_infinite_scroll()
    {
        $context = [
            "posts" => Timber::get_posts(false, POST_MAP),
        ];

        Timber::render("templates/archive-loop.twig", $context);
    }

    /** This is where you can add your own functions to twig.
     *
     * @param string $twig get extension.
     */
    public function add_to_twig($twig)
    {
        $twig->addExtension(new Twig\Extension\StringLoaderExtension());
        return $twig;
    }
    
    public function enqueue_admin_styles()
    {
        global $pagenow; 
        //global $post_type;
 
        if ($pagenow == 'post.php') {
            wp_enqueue_style('timber-tailwind-css', get_template_directory_uri().'/style.css');
        }
    }
}

Routes::map(":query", function ($params) {
    if ($taxonomy = get_taxonomy($params["query"])) {
        $query = "taxonomy=" . $params["query"];

        Routes::load("archive-taxonomy.php", null, $query, 200);
    }
});

new StarterSite();
