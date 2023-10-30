<?php

/**
 * aciana functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package aciana
 */

include 'inc/block-functions.php';

if (!function_exists('aciana_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function aciana_setup()
	{
		/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on aciana, use a find and replace
	 * to change 'aciana' to the name of your theme in all the template files.
	 */
		load_theme_textdomain('aciana', get_template_directory() . '/languages');

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
		add_image_size('blog-thumb', '600', '414', true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'primary' => esc_html__('Primary Menu', 'aciana'),
			'secondary' => esc_html__('Secondary Menu', 'aciana'),
		));

		/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
		add_theme_support('post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		));

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('aciana_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));
	}
endif; // aciana_setup
add_action('after_setup_theme', 'aciana_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aciana_content_width()
{
	$GLOBALS['content_width'] = apply_filters('aciana_content_width', 640);
}
add_action('after_setup_theme', 'aciana_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aciana_widgets_init()
{
	register_sidebar(array(
		'name'          => esc_html__('Sidebar', 'aciana'),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'aciana_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function aciana_scripts()
{

	wp_enqueue_style('aciana-style', get_stylesheet_uri());
	wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css?family=Exo:400,400i,500,500i|Raleway:400,400i,500,500i,600,600i,700,700i');

	// wp_enqueue_style('aciana', get_template_directory_uri() . '/assets/css/app.min.css');
	// wp_enqueue_style('custom-css', get_template_directory_uri() . '/css/custom.css');
	// wp_enqueue_script('aciana', get_template_directory_uri() . '/assets/js/app.min.js', array('jquery'), '20130115', true);
	wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'aciana_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Custom Functions file.
 */
require get_template_directory() . '/inc/custom-functions.php';

// function enqueue_custom_scripts()
// {
// 	Enqueue app.min.js
// 	wp_enqueue_script('app-js', get_template_directory_uri() . '/assets/js/app.min.js', array('jquery'), null, true);
// }
// add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

function wp_dereg_script_comment_reply()
{
	wp_deregister_script('comment-reply');
}
add_action('init', 'wp_dereg_script_comment_reply');

function fetch_and_display_pricing_plans()
{
	// aciana_scripts();
	//Register Style
	wp_register_style('style-css', get_stylesheet_uri());
	wp_enqueue_style('style-css');

	//Register Script
	// wp_register_script('app-min', get_template_directory_uri() . '/assets/js/app.min.js', [], false);
	// wp_enqueue_script('app.js');
	wp_enqueue_script('script-js', get_template_directory_uri() . '/script.js', array('jquery'), '1.0.0', true);

	//Register Font Family
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap', array(), null);

	//Actual Code Starts
	$api_url = 'http://20.193.129.237:7080/api/adminapi/subscription/getAllSubscription?applicationType=Docisn%20Arex';
	$response = wp_remote_get($api_url);

	if (!is_wp_error($response)) {
		$body = wp_remote_retrieve_body($response);
		$data = json_decode($body, true);

?>
		<div class="intro-text text-center">
			<h2>Subscription For Independent Practitioner</h2>
			<p>Select one of our options below exclusively for you. Only pay based on what you end up remitting.</p>
		</div>
		<div class="switch-buttons">
			<button class="switch-button active" data-target="pro">DOCISN PRO</button>
			<button class="switch-button" data-target="premium">DOCISN PREMIUM</button>
		</div>
<?php
		echo '<div class="pricing-container">';
		echo  '<div class="plan pro pricingColumns">';

		foreach ($data as $plan) {

			if ($plan['subscriptionName'] === 'PRO') {


				echo 	'<div class="planCol2 planCols mostPopular">';
				echo 		'<div class="pricingplanheadercontent">';
				echo 			'<div class="basicPlancontent mostPopularColumn">';

				echo 				'<img class="chargeIcon mostpopulartext" src="' . esc_url(get_template_directory_uri() . '/images/images/black-Flash_red.png') . '" alt="">';
				echo 				'<div class="labelPlaceholder"></div>';
				echo 				'<p>' . esc_html($plan['duration']) . ' Months</p>';
				echo 				'<p>&#8377; ' . esc_html($plan['finalPriceAfterDiscount']) . ' /-</p>';
				echo 			'</div>';
				echo 		'</div>';
				echo 		'<div class="pricingplancontent">';
				echo 			'<ul  class="columnTitle">';

				foreach ($plan['features'] as $feature) {
					echo '<li>';
					if ($plan['duration'] === 0) {
						echo esc_html($feature['featureName']);
					} else if ($plan['duration'] === 3) {
						if ($feature['value'] === 'true') {
							echo '<img alt="check" class="tick" src="' . esc_url(get_template_directory_uri() . '/images/images/tick.png') . '">';
						} else {
							echo '<img  alt="notavailable"  class="x" src="' . esc_url(get_template_directory_uri() . '/images/images/close.png') . '">';
						}
					} else if ($plan['duration'] === 6) {
						if ($feature['value'] === 'true') {
							echo '<img  alt="check" class="tick" src="' . esc_url(get_template_directory_uri() . '/images/images/tick.png') . '">';
						} else {
							echo '<img  alt="notavailable" class="x" src="' . esc_url(get_template_directory_uri() . '/images/images/close.png') . '">';
						}
					} else if ($plan['duration'] === 12) {

						if ($feature['value'] === 'true') {
							echo '<img  alt="check" class="tick" src="' . esc_url(get_template_directory_uri() . '/images/images/tick.png') . '">';
						} else {
							echo '<img  alt="notavailable" class="x" src="' . esc_url(get_template_directory_uri() . '/images/images/close.png') . '">';
						}
					}

					echo '</li>';
				}

				echo 			'</ul>';
				// && $plan['duration'] === 6 && $plan['duration'] === 12
				echo '<div class="getStarted">';
				if ($plan['duration'] == 3) {
					echo 	'<button class="gettingStarted">Get Started</button>';
				} else if ($plan['duration'] == 6) {
					echo 	'<button class="gettingStarted">Get Started</button>';
				} else if ($plan['duration'] == 12) {
					echo 	'<button class="gettingStarted">Get Started</button>';
				}
				echo '</div>';

				echo        '</div>';
				echo        '</div>';
			}
		}

		echo '</div>';
		// Pro PLANS Ends

		// PREMIUM PLANS Start
		echo  '<div class="plan premium pricingColumns">';

		foreach ($data as $plan) {

			if ($plan['subscriptionName'] === 'PREMIUM') {


				echo 	'<div class="planCol2 planCols mostPopular">';
				echo 		'<div class="pricingplanheadercontent">';
				echo 			'<div class="basicPlancontent mostPopularColumn">';

				echo 				'<img class="chargeIcon mostpopulartext" src="' . esc_url(get_template_directory_uri() . '/images/images/black-Flash_red.png') . '" alt="">';
				echo 				'<div class="labelPlaceholder"></div>';
				echo 				'<p>' . esc_html($plan['duration']) . ' Months</p>';
				echo 				'<p>&#8377; ' . esc_html($plan['finalPriceAfterDiscount']) . ' /-</p>';
				echo 			'</div>';
				echo 		'</div>';
				echo 		'<div class="pricingplancontent">';
				echo 			'<ul  class="columnTitle">';

				foreach ($plan['features'] as $feature) {
					echo '<li>';
					if ($plan['duration'] === 0) {
						echo esc_html($feature['featureName']);
					} else if ($plan['duration'] === 3) {
						if ($feature['value'] === 'true') {
							echo '<img  alt="check"  class="tick" src="' . esc_url(get_template_directory_uri() . '/images/images/tick.png') . '">';
						} else {
							echo '<img  alt="notavailable"  class="x" src="' . esc_url(get_template_directory_uri() . '/images/images/close.png') . '">';
						}
					} else if ($plan['duration'] === 6) {
						if ($feature['value'] === 'true') {
							echo '<img  alt="check"  class="tick" src="' . esc_url(get_template_directory_uri() . '/images/images/tick.png') . '">';
						} else {
							echo '<img  alt="notavailable"  class="x" src="' . esc_url(get_template_directory_uri() . '/images/images/close.png') . '">';
						}
					} else if ($plan['duration'] === 12) {

						if ($feature['value'] === 'true') {
							echo '<img  alt="check"  class="tick" src="' . esc_url(get_template_directory_uri() . '/images/images/tick.png') . '">';
						} else {
							echo '<img  alt="notavailable"  class="x" src="' . esc_url(get_template_directory_uri() . '/images/images/close.png') . '">';
						}
					}

					echo '</li>';
				}

				echo '</ul>';
				// && $plan['duration'] === 6 && $plan['duration'] === 12
				echo '<div class="getStarted premiumButton">';
				if ($plan['duration'] == 3) {
					echo 	'<button class="gettingStarted">Get Started</button>';
				} else if ($plan['duration'] == 6) {
					echo 	'<button class="gettingStarted">Get Started</button>';
				} else if ($plan['duration'] == 12) {
					echo 	'<button class="gettingStarted">Get Started</button>';
				}
				echo '</div>';

				echo        '</div>';
				echo        '</div>';
			}
		}
		echo '</div>';


		echo '</div>';
	} else {
		echo 'Error fetching data';
	}
}

function display_pricing_plans_shortcode()
{
	ob_start();
	fetch_and_display_pricing_plans();
	return ob_get_clean();
}
add_shortcode('display_pricing_plans', 'display_pricing_plans_shortcode');
function preload_logo_image()
{
	echo '<link rel="preload" as="image" href="' . get_template_directory_uri() . '/images/logo.png">' . "\n";
}
add_action('wp_head', 'preload_logo_image');



add_action('admin_head', 'editor_full_width_gutenberg');
function editor_full_width_gutenberg()
{
	echo '<style>
    body.gutenberg-editor-page .editor-post-title__block, body.gutenberg-editor-page .editor-default-block-appender, body.gutenberg-editor-page .editor-block-list__block {
		max-width: none !important;
	}
    .block-editor__container .wp-block {
        max-width: none !important;
    }
    /*code editor*/
    .edit-post-text-editor__body {
    	max-width: none !important;	
    	margin-left: 2%;
    	margin-right: 2%;
    }
  </style>';
}


function enqueue_custom_acf_block_styles()
{
	// wp_enqueue_style('custom-acf-block-styles', get_template_directory_uri() . '/template-parts/blocks/block.css', array(), '1.0', 'all');
	wp_enqueue_style('ahs-styles', get_template_directory_uri() . '/css/all.min.css', array(), filemtime(get_template_directory() . '/css/all.min.css'));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_acf_block_styles');

class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
	private $current_item;
	private $dropdown_menu_alignment_values = [
		'dropdown-menu-start',
		'dropdown-menu-end',
		'dropdown-menu-sm-start',
		'dropdown-menu-sm-end',
		'dropdown-menu-md-start',
		'dropdown-menu-md-end',
		'dropdown-menu-lg-start',
		'dropdown-menu-lg-end',
		'dropdown-menu-xl-start',
		'dropdown-menu-xl-end',
		'dropdown-menu-xxl-start',
		'dropdown-menu-xxl-end'
	];

	function start_lvl(&$output, $depth = 0, $args = null)
	{
		$dropdown_menu_class[] = '';
		foreach ($this->current_item->classes as $class) {
			if (in_array($class, $this->dropdown_menu_alignment_values)) {
				$dropdown_menu_class[] = $class;
			}
		}
		$indent = str_repeat("\t", $depth);
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ", $dropdown_menu_class)) . " depth_$depth\">\n";
	}

	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
	{
		$this->current_item = $item;
		$indent = ($depth) ? str_repeat("\t", $depth) : '';
		$li_attributes = '';
		$class_names = $value = '';
		$classes = empty($item->classes) ? array() : (array) $item->classes;
		$classes[] = ($args->walker->has_children) ? 'dropdown' : '';
		$classes[] = 'nav-item';
		$classes[] = 'nav-item-' . $item->ID;
		if ($depth && $args->walker->has_children) {
			$classes[] = 'dropdown-menu dropdown-menu-end';
		}
		$class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = ' class="' . esc_attr($class_names) . '"';
		$id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
		$id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';
		$output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';
		$attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
		$attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
		$attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
		$active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
		$nav_link_class = ($depth > 0) ? 'dropdown-item ' : 'nav-link ';
		$attributes .= ($args->walker->has_children) ? ' class="' . $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="' . $nav_link_class . $active_class . '"';

		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
}

class HeaderMenuWalker extends Walker_Nav_Menu
{
	function start_lvl(&$output, $depth = 0, $args = null)
	{
		if ($depth === 0) {
			$output .= '<ul class="sub-menu">';
		}
	}
	function end_lvl(&$output, $depth = 0, $args = null)
	{
		if ($depth === 0) {
			$output .= '</ul>';
		}
	}
}

class Custom_Bootstrap_5_Walker extends Walker_Nav_Menu
{
	public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
	{
		// Check if the menu item title is one of the specified titles.
		$menu_item_title = esc_html($item->title);

		$allowed_menu_titles = array('About aciana', 'Insights', 'Contact Us');

		if (in_array($menu_item_title, $allowed_menu_titles)) {
			$output .= '<li><a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a></li>';
		}
	}
}
