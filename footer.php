<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nautilus-wp-theme
 */

?>

	</div><!-- #content -->
	</div><!-- #pusher -->

<div class="ui inverted vertical segment">
<?php
	$menu_name = 'footer-menu'; // this is the registered menu name

	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) :
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items($menu->term_id);
		echo '<div class="ui inverted menu">';
		foreach ( (array) $menu_items as $key => $menu_item ) :
			$title = $menu_item->title;
			$url = $menu_item->url;
			$class = $menu_item->classes; // get array with class names
			if ( get_the_ID() == $menu_item->object_id ) { // check for current page
				echo '<a class="item active" href="' . $url . '">';
			} else {
				echo '<a class="item" href="' . $url . '">';
			}
			echo $title;
			echo '</a>';
		endforeach;
		echo '</div>';
	else :
		echo '<div class="ui error message"><p>Menu "' . $menu_name . '" not defined.</p></div>';
	endif;
?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'nautilus' ) ); ?>"
			   class="link">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'nautilus' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'nautilus' ), 'nautilus', '<a class="link" href="https://github.com/darrylcousins">Darryl Cousins</a>' );
				?>
		</div><!-- .site-info -->
</div>

<?php wp_footer(); ?>

<script type="text/javascript">
jQuery(document).ready(function () {
  jQuery('.ui.sidebar').sidebar('attach events', '.toc.item');
  jQuery('.search.link.icon').click(function() {
    var form = jQuery('form#searchform');
    form.submit();
  });
});
</script>

<!--
	<header id="masthead" class="ui text container">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="ui header">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php bloginfo( 'name' ); ?></a>
				</h1>
				<?php
			else :
				?>
				<p class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php bloginfo( 'name' ); ?>
				</a></p>
				<?php
			endif;
			$nautilus_description = get_bloginfo( 'description', 'display' );
			if ( $nautilus_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $nautilus_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div>

	</header>
-->

</body>
</html>
