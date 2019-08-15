<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nautilus-wp-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class("pushable"); ?>>

<?php
	$menu_name = 'header-menu'; // this is the registered menu name

  // Sidebar menu

	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) :
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items($menu->term_id);
		echo '<div id="sidebar" class="ui vertical sidebar left inverted menu">';
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
    echo '<a class="item" href="/contact"><i class="linkify icon"></i>Contact</a>';

    echo nautilus_current_user();
		echo '</div>';
	else :
		echo '<div class="ui error message"><p>Menu "' . $menu_name . '" not defined.</p></div>';
	endif;

  // Following menu
<div class="ui container">

	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) :
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items($menu->term_id);
		echo '<div class="ui fixed inverted menu">';
		echo '<div class="ui container">';
		echo '<a id="toc" class="toc item"><i class="sidebar icon"></i></a>';
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
    echo '<a class="item" href="/contact"><i class="linkify icon"></i>Contact</a>';

    echo '<a class="item" target="_blank" href="https://www.facebook.com/nautilus.braids.7">';
    echo '<i class="facebook square icon"></i></a>';

    echo nautilus_header_search_form();
    echo nautilus_current_user();

		echo '</div></div>';
	else :
		echo '<div class="ui error message"><p>Menu "' . $menu_name . '" not defined.</p></div>';
	endif;
?>
</div>

<div class="pusher">

  <div class="ui inverted segment">
    <div class="ui stackable column grid"
       id="site-branding">
      <div class="twelve wide column">
        <h1 class="ui huge inverted left aligned header">
          <div class="icon large">
            <?php
              $color = "#fafafa";
              $scale = 1;
              include get_template_directory() . '/icon.php';
            ?>
          </div>
          <div class="icon small">
            <?php
              $color = "#fafafa";
              $scale = 0.5;
              include get_template_directory() . '/icon.php';
            ?>
          </div>
          <div id="site-title" class="pageheader content">
                  <?php echo get_bloginfo('name'); ?>
            <div id="site-description" class="sub header nautilusblue">
              <?php echo get_bloginfo('description'); ?>
            </div>
          </div>
        </h1>
      </div>
      <div id="site-contact" class="floated right aligned four wide column">
        <div class="ui vertical text fitted menu">
          <a class="link item" href="mailto:rope@nautilusbraids.co.nz">
                  rope@nautilusbraids.co.nz
            <i class="mail icon"></i>
          </a>
          <a class="link item" href="tel:033295857">
                  03 329 5837
            <i class="phone icon"></i>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div id="content" class="ui main container">
