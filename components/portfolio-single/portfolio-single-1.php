<?php
/**
 * Is the Photoswipe lightbox option enabled?
 **/

global $post;

$lightbox = get_post_meta( $post->ID, '_ava_portfolio_lightbox', true );

if ( method_exists( 'FLBuilderModel', 'is_builder_enabled' ) ) {
	$lightbox_class = ( 'yes' === $lightbox && ! FLBuilderModel::is_builder_enabled() ) ? ' photoswipe__portfolio' : null;
} else {
	$lightbox_class = ( 'yes' === $lightbox ) ? ' photoswipe__portfolio' : null;
}
?>

<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

<div class="entry-content"><?php the_content(); ?></div>

<?php get_template_part( 'components/portfolio/meta' ); ?>

<div class="<?php echo esc_attr( $lightbox_class ); ?>">

	<?php ava_portfolio_gallery( $post->ID, 'ava-portfolio-full', 'portfolio-single', '', true ); ?>

</div>
