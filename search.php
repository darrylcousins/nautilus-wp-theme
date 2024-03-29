<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package nautilus-wp-theme
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

    <header class="entry-header">
      <h1 class="ui center aligned header huge">
        <?php
        /* translators: %s: search query. */
        //printf( esc_html__( 'Search Results for: %s', 'nautilus' ), '<span>' . get_search_query() . '</span>' );
        echo "Search results for: ";
        echo get_search_query();
        ?>
      </h1>
    </header>

    <?php echo nautilus_content_search_form(); ?>

      <div class="ui horizontal divider">
        <?php
          $color = "#343434";
          $scale = 0.3;
          include get_template_directory() . '/icon.php';
        ?>
      </div>


			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
