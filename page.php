<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
