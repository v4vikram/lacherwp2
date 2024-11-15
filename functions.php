<?php
/**
 * lacher functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lacher
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lacher_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on lacher, use a find and replace
	 * to change 'lacher' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('lacher', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'lacher'),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'lacher_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);

	// =========== woocommerce support ===============
	add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'lacher_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lacher_content_width()
{
	$GLOBALS['content_width'] = apply_filters('lacher_content_width', 640);
}
add_action('after_setup_theme', 'lacher_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lacher_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'lacher'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'lacher'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'lacher_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function lacher_scripts()
{
	wp_enqueue_style('lacher-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('lacher-style', 'rtl', 'replace');


	// fontawesome
	wp_enqueue_style('fontawesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css', array(), '', false);
	// fonts
	wp_enqueue_style('Montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap', array(), '', false);
	wp_enqueue_style('Philosopher', 'https://fonts.googleapis.com/css2?family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&display=swap', array(), '', false);
	// owls carousal
	wp_enqueue_style('owl-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', array(), '1.0.0', false);
	wp_enqueue_style('owl-carousel-theme', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css', array(), '1.0.0', false);
	// range slider
	wp_enqueue_style('noUiSlider-css', 'https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.0/nouislider.min.css', array(), '1.0.0', false);

	// lacher-woo.css
	wp_enqueue_style('lacher-woo-css', get_template_directory_uri() . '/assets/css/lacher-woo.css', array(), '', false);
	// output.css
	wp_enqueue_style('output-css', get_template_directory_uri() . '/assets/css/output.css', array(), '', false);

	// lacher.css
	wp_enqueue_style('lacher-css', get_template_directory_uri() . '/assets/css/lacher.css', array(), '', false);



	wp_enqueue_script('lacher-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('lacher', get_template_directory_uri() . '/assets/js/lacher.js', array('jquery'), _S_VERSION, true);

	wp_enqueue_script('jquery.min2', get_template_directory_uri() . 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', array(), _S_VERSION, true);
	// lacher-woo.js
	// wp_enqueue_script('lacher-woo-js', get_template_directory_uri() . '/assets/js/lacher-woo.js', array('jquery'), _S_VERSION, true);
	// lacher.js
	wp_enqueue_script('lacher-js', get_template_directory_uri() . '/assets/js/lacher.js', array('jquery.min2'), _S_VERSION, true);
	wp_localize_script('lacher-js', 'ajax_object', array(
		'ajax_url' => admin_url('admin-ajax.php')
	));

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'lacher_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

function ajax_product_search() {
    // Get and sanitize input
    $query = sanitize_text_field($_POST['term']);
    $category = sanitize_text_field($_POST['category']); // Get the category slug or "all"

    // Log the search term and category to check values
    error_log("Search Term: " . $query);
    error_log("Category: " . $category);

    // Base arguments for WP_Query
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 5,
        's' => $query, // Search term
    );

    // Only add the tax_query if a category is selected and not "all"
    if (!empty($category) && $category !== "all") {
        $category_term = get_term_by('slug', $category, 'product_cat');
        if ($category_term) {
            $category = $category_term->term_id; // Get the term ID
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'term_id',
                    'terms' => $category, // Pass the term ID
                ),
            );
            error_log("Tax Query Added: " . print_r($args['tax_query'], true));
        }
    }

    // Execute the query
    $loop = new WP_Query($args);

    if ($loop->have_posts()) {
        echo '<ul>';
        while ($loop->have_posts()) {
            $loop->the_post();
            ?>
            <li class="flex items-center space-x-3">
                <div><?php the_post_thumbnail("full", array("class" => "w-[60px] h-[60px]")) ?></div>
                <a href="<?= get_permalink() ?>"><?= get_the_title() ?></a>
            </li>
            <?php
        }
        echo '</ul>';
    } else {
        echo '<p>No products found.</p>';
    }

    wp_die(); // Properly terminate the AJAX request
}

add_action('wp_ajax_search_products', 'ajax_product_search');
add_action('wp_ajax_nopriv_search_products', 'ajax_product_search');






