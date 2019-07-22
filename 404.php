<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package nautilus-wp-theme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header mt4">
          <h1 class="ui center aligned header huge">
            <?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'nautilus' ); ?>
          </h1>
				</header><!-- .page-header -->

				<div class="page-content">

          <div class="ui icon input container mt4">
            <input type="text" placeholder="Search...">
            <i class="circular search link icon"></i>
          </div>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
