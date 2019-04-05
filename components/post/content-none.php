<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post no-results not-found' ); ?>>

	<header class="entry-header">

		<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'ava' ); ?></h1>

	</header>

	<?php ava_post_thumbnail(); ?>

	<div class="post-content">

		<div class="entry-content">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) :
			?>
				<?php /* translators: Permalink */ ?>
				<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'ava' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

			<?php else : ?>

				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Please try again.', 'ava' ); ?></p>

			<?php endif; ?>
		</div>

	</div>

	<?php
	if ( is_single() ) :

		// Check if the sidebar is turned on.
		$ava_sidebar = get_theme_mod( 'singlepost_sidebar', ava_defaults( 'singlepost_sidebar' ) );

		// Only display the sidebar if the option is selected in the Customizer.
		$visibility = ( 'none' === $ava_sidebar ) ? ' hidden ' : '';

		if ( 'left' === $ava_sidebar || 'right' === $ava_sidebar || is_active_sidebar( 'sidebar-1' ) || is_customize_preview() ) :
		?>
			<aside id="secondary" class="widget-area content-sidebar<?php echo esc_attr( $visibility ); ?>">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</aside>

		<?php endif; ?>

	<?php endif; ?>

</article>
