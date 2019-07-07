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

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'nautilus' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'nautilus' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'nautilus' ), 'nautilus', '<a href="https://github.com/darrylcousins">Darryl Cousins</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

<?php wp_footer(); ?>

<script type="text/javascript">
jQuery(document).ready(function () {
	jQuery('.ui.sidebar').sidebar('attach events', '.toc.item');
console.log('code ran');
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
