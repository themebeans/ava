<?php
/**
 * Ava Beaver Builder module, front-end instance
 *
 * You have access to two variables in this file:
 *
 * $module:   An instance of your module class.
 * $settings: The module's settings.
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/*
 * Set the hover style as a variable that we can use anywhere in the loop.
 */
$hover_style = $settings->hover_style;

/*
 * Add the following classes to the posts.
 */
$post_classes = 'project ' . $hover_style; ?>

<div class="portfolio portfolio--carson">

	<div class="hfeed" itemscope itemtype="http://schema.org/ImageGallery">

		<?php if ( 'media' === $settings->media_source ) : ?>

			<?php if ( ! empty( $settings->media ) ) : ?>

				<?php foreach ( $settings->media as $media_item ) { ?>

					<?php
					$media_item_src   = wp_get_attachment_image_src( $media_item, 'todo' );
					$media_item_title = get_the_title( $media_item );
					$feat_image       = 'background-image: url(' . esc_url( $media_item_src[0] ) . ');';
					?>

					<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" <?php post_class( esc_attr( $post_classes ) ); ?>>

						<?php if ( 'project__hover--scaled' === $hover_style || 'project__hover--opacity' === $hover_style ) : ?>
							<div class="project__overlay">
								<div>
									<h2 class="entry-title"><?php echo esc_html( $media_item_title ); ?></h2>
								</div>
							</div>
						<?php endif; ?>

						<div class="project__intrinsic">

							<div class="project__thumb" style="<?php echo esc_attr( $feat_image ); ?>"></div>

						</div>

					</figure>

				<?php
} //end foreach.
				?>
			<?php endif; ?>

		<?php else : ?>

			<?php
			$args = array(
				'post_type'          => 'portfolio',
				'posts_per_page'     => $settings->number,
				'portfolio_category' => $settings->slug,
				'orderby'            => 'menu_order',
				'order'              => 'ASC',
			);
			$loop = new WP_Query( $args );

			while ( $loop->have_posts() ) :
				$loop->the_post();

				global $post;
				?>

				<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" id="post-<?php the_ID(); ?>" <?php post_class( esc_attr( $post_classes ) ); ?>>

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

					<?php if ( 'project__hover--scaled' === $hover_style || 'project__hover--opacity' === $hover_style ) : ?>
						<div class="project__overlay">
							<div>
								<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
							</div>
						</div>
					<?php endif; ?>

					<div class="project__intrinsic">

						<?php
						// Grab the featured image.
						$feat_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
						$feat_image = 'background-image: url(' . esc_url( $feat_image[0] ) . ');';
						?>

						<div class="project__thumb" style="<?php echo esc_attr( $feat_image ); ?>"></div>

					</div>

				</figure>

			<?php endwhile; ?>

			<?php wp_reset_postdata(); ?>

		<?php endif; ?>

	</div>

</div>
