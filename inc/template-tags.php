<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package nautilus-wp-theme
 */

if ( ! function_exists( 'nautilus_header_search_form' ) ) :
	/**
	 * Displays search form for header menu
	 *
	 */
	function nautilus_header_search_form() {

    ?>
		<div class="right menu">
      <div class="item">
        <form role="search" method="get" id="headersearchform" action="/">
          <div class="ui icon inverted transparent input">
            <input type="text" name="s" id="s" placeholder="Search...">
            <i class="search icon"></i>
          </div>
        </form>
      </div>
    </div>
		<?php

	}
endif;

if ( ! function_exists( 'nautilus_content_search_form' ) ) :
	/**
	 * Displays search form for header menu
	 *
	 */
	function nautilus_content_search_form() {

    ?>
      <div class="ui container mt4">
        <form role="search" method="get" id="contentsearchform" action="/">
          <div class="ui fluid icon input">
            <input type="text" name="s" id="s" placeholder="Search...">
            <i class="search link icon"></i>
          </div>
        </form>
      </div>

		<?php

	}
endif;

if ( ! function_exists( 'nautilus_current_user' ) ) :
	/**
	 * Displays sign in button or user name with log out
	 *
	 */
	function nautilus_current_user() {

    $user = wp_get_current_user();
    if ( $user->exists() ) :
    ?>
      <a class="item nautilusblue" href="<?php echo wp_logout_url( get_permalink() ); ?>">
        <i class="sign out icon"></i>
        Sign Out
      </a>
      <span class="item">
        <i class="user icon"></i>
        <?php echo $user->first_name; ?>
      </span>
    <?php
    else :
    ?>
      <a class="item nautilusblue" href="<?php echo wp_login_url( get_permalink() ); ?>">
        <i class="sign in icon"></i>Sign In</a>
    <?php
    endif;

	}
endif;
