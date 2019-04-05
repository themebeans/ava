<?php
/**
 * Template part for displaying the singular post.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

// Check for Customizer values.
if ( ! is_singular() ) {
	$text_alignment  = get_theme_mod( 'blog_text_alignment', ava_defaults( 'blog_text_alignment' ) );
	$title_alignment = get_theme_mod( 'blog_title_alignment', ava_defaults( 'blog_title_alignment' ) );
} else {
	$text_alignment  = null;
	$title_alignment = null;
} ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header <?php echo esc_attr( $title_alignment ); ?>">

		<?php
		if ( is_sticky() && is_home() ) :
			echo ava_get_svg( array( 'icon' => 'sticky' ) );
		endif;
		?>

		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>

		<?php ava_entry_meta(); ?>

	</header>

	<?php ava_post_thumbnail(); ?>

	<div class="post-content <?php echo esc_attr( $text_alignment ); ?>">

		<?php if ( is_single() && has_excerpt() ) : ?>
			<?php printf( '<h2 class="entry-excerpt">%1s</h2>', get_the_excerpt() ); ?>
		<?php endif; ?>

		<div class="entry-content">
			<?php
			if ( is_search() && 'post' !== get_post_type() ) {
				// Let's not show page content as part of the search results.
			} else {
				the_content( '' );

				wp_link_pages(
					array(
						'before'      => '<div class="page-links">' . __( 'Pages:', 'ava' ),
						'after'       => '</div>',
						'link_before' => '<span class="page-number">',
						'link_after'  => '</span>',
					)
				);

				ava_entry_footer();
			}
			?>

		</div>

		<?php if ( is_singular( 'post' ) ) : ?>
			<?php get_template_part( 'components/post/biography' ); ?>
		<?php endif; ?>

	</div>

	<?php
	if ( is_single() ) :

		// Check if the sidebar is turned on.
		$sidebar = get_theme_mod( 'singlepost_sidebar', ava_defaults( 'singlepost_sidebar' ) );

		// Only display the sidebar if the option is selected in the Customizer.
		$visibility = ( 'none' === $sidebar ) ? ' hidden ' : '';

		if ( 'left' === $sidebar || 'right' === $sidebar || is_active_sidebar( 'sidebar-1' ) || is_customize_preview() ) :
		?>
			<aside id="secondary" class="widget-area content-sidebar<?php echo esc_attr( $visibility ); ?>">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</aside><!-- #secondary -->
		<?php endif; ?>

	<?php endif; ?>

	<?php if ( ! is_single() ) : ?>
		<hr class="post__divide">
	<?php endif; ?>

</article>
