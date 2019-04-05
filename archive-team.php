<?php
/**
 * The main template file for the team post type.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

get_header(); ?>

<div id="primary" class="content-area">

	<main id="main" class="site-main hfeed bb--team">

		<div class="bb--team__inner">

			<?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) :

					the_post();

					get_template_part( 'components/team/content-team' );

				endwhile;

				/*
				 * The posts pagination outputs a set of page numbers with links to the previous and next pages of posts.
				 *
				 * @link https://codex.wordpress.org/Function_Reference/the_posts_pagination
				 */
				the_posts_pagination(
					array(
						'prev_text'          => ava_get_svg( array( 'icon' => 'left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'ava' ) . '</span>',
						'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'ava' ) . '</span>' . ava_get_svg( array( 'icon' => 'right' ) ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ava' ) . ' </span>',
					)
				);

			else :
					/* Yikes, there's no content, so let's pull this template part */
					get_template_part( 'components/post/content', 'none' );

			endif;
			?>

		</div>

	</main>

</div>

<?php
get_footer();
