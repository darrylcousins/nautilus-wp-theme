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
  <div>
    <div class="ui container three column inverted divided stackable grid">
      <div class="row">
        <div class="column">
<?php
	$menu_name = 'footer-menu'; // this is the registered menu name

	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) :
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items($menu->term_id);
		echo '<div class="ui inverted vertical text menu">';
		foreach ( (array) $menu_items as $key => $menu_item ) :
			$title = $menu_item->title;
			$url = $menu_item->url;
			$class = $menu_item->classes; // get array with class names
			if ( get_the_ID() == $menu_item->object_id ) { // check for current page
				echo '<span class="item"><a class="ui active nautilusblue" href="' . $url . '">';
			} else {
				echo '<span class="item"><a class="ui nautilusblue" href="' . $url . '">';
			}
			echo $title;
			echo '</a></span>';
		endforeach;
	else :
		echo '<div class="ui error message"><p>Menu "' . $menu_name . '" not defined.</p></div>';
	endif;
?>
          </div><!-- end menu -->
        </div><!-- end column -->
        <div class="column">
        <div class="ui inverted vertical text menu">
          <span class="item">
            <a class="ui link" href="mailto:rope@nautilusbraids.co.nz">
              <i class="mail icon"></i>
              rope@nautilusbraids.co.nz
            </a>
          </span>
          <span class="item">
            <a class="ui link" href="tel:033295857">
              <i class="phone icon"></i>
              03 329 5837
            </a>
          </span>
          <span class="item">
            <a class="ui link" target="_blank" href="https://www.facebook.com/nautilus.braids.7">
              <i class="facebook square icon"></i>
              facebook
            </a>
          </span>

        </div><!-- end menu -->
      </div><!-- end column -->
      <div class="column">
        <div class="ui inverted vertical text menu">
          <span class="item">
            Powered by:
            <a href="https://wordpress.org/"
               class="ui link">WordPress</a>
          </span>
          <span class="item">
            Theme: <a class="nautilusblue" href="https://github.com/darrylcousins/nautilus-wp-theme">Nautilus</a>
          </span>
        </div><!-- menu -->
        <?php echo nautilus_current_user(); ?>
        </div><!-- end column -->
      </div><!-- end row -->
    </div><!-- end grid -->
  </div><!-- end container -->
</div><!-- end segment -->

<?php wp_footer(); ?>

<script type="text/javascript">
jQuery(document).ready(function () {
  jQuery('.ui.sidebar').sidebar('attach events', '.toc.item');
  jQuery('#headersearchform > .input > .search.link.icon').click(function() {
    var form = jQuery('form#headersearchform');
    form.submit();
  });
  jQuery('#contentsearchform > .input > .search.link.icon').click(function() {
    var form = jQuery('form#contentsearchform');
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
