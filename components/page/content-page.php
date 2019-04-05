<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="page-inner">

		<?php
		// Let's check if Beaver Builder is both active and enabled.
		if ( class_exists( 'FLBuilder' ) && FLBuilderModel::is_builder_enabled() ) :
			the_content();
		else :
			/*
			 * If it's not, display the standard post content elements.
			 */
			?>
			<div class="entry-content">
				<?php
					the_content();

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ava' ),
							'after'  => '</div>',
						)
					);
				?>
			</div>
		<?php
	endif;

		/*
		 * If comments are open or we have at least one comment, load up the comment template.
		 *
		 * @link https://codex.wordpress.org/Function_Reference/comments_open/
		 * @link https://codex.wordpress.org/Template_Tags/get_comments_number/
		 * @link https://developer.wordpress.org/reference/functions/comments_template/
		 */
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		?>

	</div><!-- .page-inner -->

</article><!-- #post-## -->
