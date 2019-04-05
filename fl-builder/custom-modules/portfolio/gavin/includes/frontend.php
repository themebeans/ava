<?php
/**
 * Beaver Builder module, front-end instance
 *
 * You have access to two variables in this file:
 *
 * $module:   An instance of your module class.
 * $settings: The module's settings.
 *
 * @package   Ava
 * @link      https://themebeans.com/themes/ava
 */

?>
<div class="portfolio portfolio--gavin portfolio--fullscreen <?php echo esc_attr( $settings->alignment ); ?>">

	<?php
	$args = array(
		'post_type'          => 'portfolio',
		'posts_per_page'     => $settings->number,
		'portfolio_category' => $settings->slug,
		'orderby'            => 'menu_order',
		'order'              => 'ASC',
	);
	$loop = new WP_Query( $args );
	?>

	<nav class="project__navigation">
		<?php
		while ( $loop->have_posts() ) :
			$loop->the_post();

			global $post;

			/*
			 * Let's check if there's an external url included on the back end.
			 * If there is, that will be assigned as the $portfolio_url variable, if not,
			 * the post permalink will be assigned.
			 */
			$external_url         = get_post_meta( $post->ID, '_ava_portfolio_external_url', true );
			$portfolio_url        = ( $external_url ) ? $external_url : get_the_permalink();
			$portfolio_url_target = ( $external_url ) ? '_blank' : '_self';
			?>

			<div>
				<h2>
					<?php
					printf(
						'<a href="%1s" data-id="%2$s" target="%3$s" class="project__navigation_link">',
						esc_url( $portfolio_url ),
						esc_attr( get_the_ID() ),
						esc_attr( $portfolio_url_target )
					);
				?>
				<?php the_title(); ?>
				</a></h2>
			</div>
		<?php endwhile; ?>

	</nav>

	<div class="portfolio--gavin__scrim"></div>

	<?php
	while ( $loop->have_posts() ) :
		$loop->the_post();

		global $post;

		// Grab the featured image.
		$feat_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );
		$feat_image = 'background-image: url(' . esc_url( $feat_image[0] ) . ');';
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'project' ); ?> style="<?php echo esc_attr( $feat_image ); ?>">
			<div class="project__thumb">
				<?php the_post_thumbnail(); ?>
			</div>
		</article>

	<?php endwhile; ?>

	<?php wp_reset_postdata(); ?>

</div>
