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

<!-- Sidebar menu -->
<?php
	$menu_name = 'header-menu'; // this is the registered menu name

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
		echo '</div>';
	else :
		echo '<div class="ui error message"><p>Menu "' . $menu_name . '" not defined.</p></div>';
	endif;
?>
<!-- Following menu -->
<?php
	$menu_name = 'header-menu'; // this is the registered menu name

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
		echo '<div class="right menu">';
		echo '<div class="item">';
		echo '<form role="search" method="get" id="searchform" action="/">';
		echo '<div class="ui icon inverted transparent input">';
		echo '<input type="text" name="s" id="s" placeholder="Search...">';
		echo '<i class="search link icon"></i>';
		echo '</div>';
		echo '</form>';
		//echo get_search_form();
		echo '</div></div>';
		echo '</div></div>';
	else :
		echo '<div class="ui error message"><p>Menu "' . $menu_name . '" not defined.</p></div>';
	endif;
?>

<div class="pusher">
  <div class="ui inverted vertical center aligned segment" style="padding-top: 65px">
    <div id="branding" class="ui container">
      <h1 class="ui huge inverted left aligned header">
	<?php
	  $color = "#fafafa";
	  $scale = 1;
	  include get_template_directory() . '/icon.php';
	?>
	<div class="pageheader content">
          <?php echo get_bloginfo('name'); ?>
	  <div class="subheader sub header">
	    <?php echo get_bloginfo('description'); ?>
	  </div>
	  <div class="sub header">
	    <a class="link tiny" href="mailto:rope@nautilusbraids.co.nz">
	      <i class="mail icon"></i>
              rope@nautilusbraids.co.nz
            </a>
	    <a class="link tiny" href="tel:033295857">
	      <i class="phone icon"></i>
              03 329 5857
            </a>
	  </div>
	</div>
      </h1>
    </div>
  </div>

  <div id="content" class="ui main text container">
