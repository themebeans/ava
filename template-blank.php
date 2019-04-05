<?php
/**
 * Template Name: Blank Template
 *
 * A template without any header or footer elements. A blank canvas.
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main page-item single-page">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'components/page/content', 'page' );

		endwhile;
		?>

	</main>
</div>

<?php
get_footer();
