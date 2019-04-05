<?php
/**
 * Template part for displaying the singular portfolio.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/*
 * Layout variable.
 */
$layout       = get_post_meta( $post->ID, '_ava_portfolio_layout', true );
$layout_class = 'single-portfolio--' . $layout;
$lightbox     = get_post_meta( $post->ID, '_ava_portfolio_lightbox', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( esc_attr( $layout_class ) ); ?>>

	<?php
	// Let's check if Beaver Builder is both active and enabled.
	if ( class_exists( 'FLBuilder' ) && method_exists( 'FLBuilderModel', 'is_builder_enabled' ) ) {
		if ( FLBuilderModel::is_builder_enabled() ) {
			the_content();
		} else {
			get_template_part( 'components/portfolio-single/portfolio-single-' . $layout . '' );
		}
	} else {
		get_template_part( 'components/portfolio-single/portfolio-single-' . $layout . '' );
	}
	?>

</article><!-- #post-## -->

<?php if ( 'yes' === $lightbox ) : ?>
	<?php
	// Let's check if Beaver Builder is both active and enabled.
	if ( class_exists( 'FLBuilder' ) && method_exists( 'FLBuilderModel', 'is_builder_enabled' ) ) {
		if ( ! FLBuilderModel::is_builder_enabled() ) {
			get_template_part( 'components/portfolio/photoswipe' );
		}
	} else {
		get_template_part( 'components/portfolio/photoswipe' );
	}
	?>
<?php endif; ?>

<?php
if ( get_theme_mod( 'portfolio_single_navigation', ava_defaults( 'portfolio_single_navigation' ) ) || is_customize_preview() ) :

	$visibility = ( false === get_theme_mod( 'portfolio_single_navigation', ava_defaults( 'portfolio_single_navigation' ) ) ) ? 'hidden' : '';
?>

	<div class="project-navigation <?php echo esc_attr( $visibility ); ?>">
		<?php
		$next = apply_filters( 'ava_portfolio_pagination_next', esc_html__( 'Next', 'ava' ) );
		$prev = apply_filters( 'ava_portfolio_pagination_prev', esc_html__( 'Prev', 'ava' ) );

		the_post_navigation(
			array(
				'prev_text' => '<span class="meta-nav" aria-hidden="true"></span><span class="screen-reader-text">' . esc_html__( 'Next post:', 'ava' ) . ' %title</span><span class="post-title">' . esc_html( $next ) . '</span>',
				'next_text' => '<span class="meta-nav" aria-hidden="true"></span><span class="screen-reader-text">' . esc_html__( 'Previous post:', 'ava' ) . ' %title</span><span class="post-title">' . esc_html__( $prev ) . '</span>',
			)
		);
		?>

	</div>

<?php
endif;
