<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package nautilus-wp-theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function nautilus_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'nautilus_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function nautilus_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'nautilus_pingback_header' );

/**
 * * Redirect non-admin users to home page
 * *
 * * This function is attached to the 'admin_init' action hook.
 * */
function redirect_non_admin_users() {
  if ( ! current_user_can( 'manage_options' ) && ('/wp-admin/admin-ajax.php' != $_SERVER['PHP_SELF']) ) {
    wp_redirect( home_url() );
    exit;
  }
}
add_action( 'admin_init', 'redirect_non_admin_users' );
