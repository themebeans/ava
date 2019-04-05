<?php
/**
 * Ava Portfolio Functions
 *
 * Functions for portfolio specific things.
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

if ( ! function_exists( 'ava_portfolio_tags' ) ) :
	/**
	 * Outputs the portfolio post type tags.
	 * Create your own ava_portfolio_tags() to override in a child theme.
	 */
	function ava_portfolio_tags() {
		global $post;

		$terms = wp_get_post_terms( $post->ID, 'portfolio_tag' );

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
			echo '<div class="project-tags">';
			foreach ( $terms as $term ) {
				echo '<span>#' . esc_html( $term->name ) . '</span>';
			}
			echo '</div>';
		}
	}
endif;



if ( ! function_exists( 'ava_portfolio_gallery' ) ) :
	/**
	 * Return the portfolio and post galleries.
	 *
	 * Checks if there are images uploaded to the post or portfolio post and outputs them.
	 * Create your own ava_portfolio_gallery() to override in a child theme.
	 *
	 * @param string $postid Post ID.
	 * @param string $imagesize Image Size.
	 * @param string $layout Portfolio Layout.
	 * @param string $orderby Portfolio Order By Format.
	 * @param string $single If Single Portfolio Item.
	 */
	function ava_portfolio_gallery( $postid, $imagesize = '', $layout = '', $orderby = '', $single = false ) {

		$thumb_ID      = get_post_thumbnail_id( $postid );
		$image_ids_raw = get_post_meta( $postid, '_ava_image_ids', true );

		// Lightbox option.
		$lightbox = get_post_meta( $postid, '_ava_portfolio_lightbox', true );

		// Post meta.
		$embed            = get_post_meta( $postid, '_ava_portfolio_embed_code', true );
		$embed2           = get_post_meta( $postid, '_ava_portfolio_embed_code_2', true );
		$embed3           = get_post_meta( $postid, '_ava_portfolio_embed_code_3', true );
		$embed4           = get_post_meta( $postid, '_ava_portfolio_embed_code_4', true );
		$video_shortcodes = get_post_meta( $postid, '_ava_portfolio_video_shortcodes', true );

		wp_reset_postdata();

		if ( '' !== $image_ids_raw ) {
			$image_ids   = explode( ',', $image_ids_raw );
			$post_parent = null;
		} else {
			$image_ids   = '';
			$post_parent = $postid;
		}

		$i = 1;

		// Pull in the image assets.
		$args        = array(
			'exclude'        => $thumb_ID,
			'include'        => $image_ids,
			'numberposts'    => -1,
			'orderby'        => 'post__in',
			'order'          => 'ASC',
			'post_type'      => 'attachment',
			'post_parent'    => $post_parent,
			'post_mime_type' => 'image',
			'post_status'    => null,
		);
		$attachments = get_posts( $args ); ?>

		<div class="project-assets">
			<?php
			if ( ! post_password_required() ) {
				if ( $embed ) {
					echo '<figure class="video-frame">';
						echo stripslashes( htmlspecialchars_decode( $embed ) );
					echo '</figure>';
				}

				if ( $embed2 ) {
					echo '<figure class="video-frame">';
						echo stripslashes( htmlspecialchars_decode( $embed2 ) );
					echo '</figure>';
				}

				if ( $embed3 ) {
					echo '<figure class="video-frame">';
						echo stripslashes( htmlspecialchars_decode( $embed3 ) );
					echo '</figure>';
				}

				if ( $embed4 ) {
					echo '<figure class="video-frame">';
						echo stripslashes( htmlspecialchars_decode( $embed4 ) );
					echo '</figure>';
				}

				if ( $video_shortcodes ) {
					echo '<figure class="video-frame">';
						echo do_shortcode( '' . $video_shortcodes . '' );
					echo '</figure>';
				}
			}
			?>

			<div itemscope itemtype="http://schema.org/ImageGallery" class="
			<?php
			if ( get_theme_mod( 'portfolio_lazyload', true ) === true ) {
				echo 'lazy-load'; }
?>
">

				<?php
				if ( ! empty( $attachments ) ) {

					if ( ! post_password_required() ) {

						foreach ( $attachments as $attachment ) {

							$caption = $attachment->post_excerpt;
							$caption = ( $caption ) ? "$caption" : '';
							$alt     = ( ! empty( $attachment->post_content ) ) ? $attachment->post_content : $attachment->post_title;
							$src     = wp_get_attachment_image_src( $attachment->ID, $imagesize );
							?>

							<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">

								<?php

								if ( 'yes' === $lightbox ) {
									echo '<a href="' . esc_url( $src[0] ) . '" class="lightbox-link" title="' . htmlspecialchars( $caption ) . '" alt="' . esc_attr( $alt ) . '" itemprop="contentUrl" data-size="' . esc_attr( $src[1] ) . 'x' . esc_attr( $src[2] ) . '">';
								}

								echo '<img src="' . esc_url( $src[0] ) . '"/>';

								if ( 'yes' === $lightbox ) {
									echo '</a>';
								}

								if ( $caption ) {
									echo '<div class="project-caption">' . htmlspecialchars( $caption ) . '</div>';
								}
								?>

							</figure>

							<?php
						}
					}
				}

				echo '</div>';
	}

endif;
