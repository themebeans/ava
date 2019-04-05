<?php
/**
 * Template part for displaying team membercontent.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Grab the featured image.
 */
$feat_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
$feat_image = 'background-image: url(' . esc_url( $feat_image[0] ) . ');'; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'bb--team__member' ); ?>>

	<div class="bb--team__image" style="<?php echo esc_attr( $feat_image ); ?>"></div>

	<div class="bb--team__overlay">
		<div>
			<?php the_title( '<p class="entry-title">', '</p>' ); ?>
		</div>
	</div>

</article>
