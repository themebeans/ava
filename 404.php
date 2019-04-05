<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

get_header(); ?>

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">

		<section class="error-404 not-found">

			<header class="page-header">
				<h2 class="page-title"><?php echo esc_html__( 'That page can&rsquo;t be found.', 'ava' ); ?></h2>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php echo esc_html__( 'It looks like nothing was found at this location.', 'ava' ); ?></p>

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Go back to the homepage', 'ava' ); ?>→</a>

			</div><!-- .page-content -->

		</section><!-- .error-404 -->

	</main><!-- #main -->

</div><!-- #primary -->

<?php
get_footer();
