<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nautilus-wp-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
      <?php if ( !is_front_page() ) : ?>
          <?php the_title( '<h1 class="ui center aligned header huge">', '</h1>' ); ?>
      <?php endif; ?>
    </header><!-- .entry-header -->
    <div class="ui horizontal divider">
      <?php
        $color = "#343434";
        $scale = 0.3;
        include get_template_directory() . '/icon.php';
      ?>
    </div>

	<?php nautilus_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nautilus' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

  <div class="ui horizontal divider">
    <?php
      $color = "#343434";
      $scale = 0.3;
      include get_template_directory() . '/icon.php';
    ?>
  </div>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'nautilus' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
