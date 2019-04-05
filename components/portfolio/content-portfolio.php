<?php
/**
 * Template part for displaying portfolios.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

?>

<figure id="post-<?php the_ID(); ?>" <?php post_class( 'project project__hover--scaled' ); ?>>

	<?php do_action( 'portfolio_professional_likes' ); ?>

	<?php

	/*
	 * Let's check if there's an external url included on the back end.
	 * If there is, that will be assigned as the $portfolio_url variable, if not,
	 * the post permalink will be assigned.
	 */
	$external_url         = get_post_meta( $post->ID, '_ava_portfolio_external_url', true );
	$portfolio_url        = ( $external_url ) ? $external_url : get_the_permalink();
	$portfolio_url_class  = ( $external_url ) ? 'class=project__link project__link--external' : '';
	$portfolio_url_target = ( $external_url ) ? '_blank' : '_self';

	printf(
		'<a href="%1s" data-id="%2$s" %3$s target="%4$s" class="project__link"></a>',
		esc_url( $portfolio_url ),
		esc_attr( get_the_ID() ),
		esc_attr( $portfolio_url_class ),
		esc_attr( $portfolio_url_target )
	);
	?>

	<div class="project__intrinsic">

		<?php
		global $post;

		// Grab the featured image.
		$feat_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'todo' );
		$feat_image = 'background-image: url(' . esc_url( $feat_image[0] ) . ');';
		?>

		<div class="project__thumb" style="<?php echo esc_attr( $feat_image ); ?>"></div>

			<div class="project__overlay">
				<div>
					<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
				</div>
			</div>

	</div>

</figure>
