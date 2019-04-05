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
$alignment    = $settings->alignment;
?>

<div class="portfolio portfolio--liam">

	<div class="hfeed" itemscope itemtype="http://schema.org/ImageGallery">

		<?php
		$args = array(
			'post_type'          => 'portfolio',
			'posts_per_page'     => $settings->number,
			'portfolio_category' => $settings->slug,
			'orderby'            => 'ASC',
			'order'              => 'menu_order',
		);
		$loop = new WP_Query( $args );

		while ( $loop->have_posts() ) :
			$loop->the_post();

			global $post;
			?>

			<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php
				// Let's get the featured image, so we can add it to the parallax item.
				$featured_img       = get_post_thumbnail_id();
				$featured_img_array = wp_get_attachment_image_src( $featured_img, 'ava-post-fullsize-image', true );
				$featured_img_url   = $featured_img_array[0];

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

				<div class="portfolio--liam__parallax_item" data-parallax="scroll" data-image-src="<?php echo esc_url( $featured_img_url ); ?>"></div>

				<?php if ( 'on' === $settings->display_title ) : ?>

					<div class="project__overlay <?php echo esc_attr( $alignment ); ?>">
						<div>
							<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
						</div>
					</div>
					<div class="project__background"></div>

				<?php endif; ?>

			</figure>

		<?php
		endwhile;

		wp_reset_postdata();
		?>

	</div>

</div>
