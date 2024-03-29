<?php
/**
 * nautilus-wp-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nautilus-wp-theme
 */

if ( ! function_exists( 'nautilus_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function nautilus_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on nautilus-wp-theme, use a find and replace
		 * to change 'nautilus' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'nautilus', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'header-menu' => esc_html__( 'Primary', 'nautilus' ),
			'footer-menu' => esc_html__( 'Footer', 'nautilus' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

	}
endif;
add_action( 'after_setup_theme', 'nautilus_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nautilus_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'nautilus_content_width', 640 );
}
add_action( 'after_setup_theme', 'nautilus_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function nautilus_scripts() {

	wp_enqueue_style( 'semantic-style', get_template_directory_uri() . '/semantic/dist/semantic.min.css' );

	wp_enqueue_style( 'tachyons-style', get_template_directory_uri() . '/tachyons/tachyons.min.css' );

	wp_enqueue_style( 'nautilus-style', get_stylesheet_uri() );

	wp_enqueue_script( 'semantic-script', get_template_directory_uri() . '/semantic/dist/semantic.min.js', array('jquery'), false, true );

/*
	wp_enqueue_style( 'nautilus-style', get_stylesheet_uri() );

	wp_enqueue_script( 'nautilus-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'nautilus-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
*/
}
add_action( 'wp_enqueue_scripts', 'nautilus_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Add read_private_posts capability to subscriber
 * Note this is saves capability to the database on admin_init, so consider doing this once on theme/plugin activation
 */
add_action ('admin_init','add_sub_caps');
 
function add_sub_caps() {
  global $wp_roles;
  $role = get_role('subscriber');
  if ( !$role->has_cap('read_private_posts') ) {
    $role->add_cap('read_private_posts');
  }
}
