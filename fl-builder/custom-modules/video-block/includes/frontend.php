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

?>

<div class="bb--video_block bb--video_block--<?php echo esc_attr( $settings->height ); ?>">

	<div class="bb--video_block__inner">

		<div>

			<?php if ( ! empty( $settings->title ) ) : ?>
				<h2 class="bb--video_block__title">
					<?php echo esc_html( $settings->title ); ?>
				</h2>
			<?php endif; ?>

			<?php if ( ! empty( $settings->video ) ) : ?>
				<?php printf( '<a href="%s" class="bb--video_block__link lightbox-link" data-lity>%s%s</a>', esc_url( $settings->video ), esc_html( $settings->cta ), ava_get_svg( array( 'icon' => 'play' ) ) ); ?>
			<?php endif; ?>

		</div>

	</div>

	<?php if ( ! empty( $settings->image_src ) ) : ?>
		<div class="bb--video_block__image" style="background-image: url(<?php echo esc_url( $settings->image_src ); ?>);"></div>
	<?php endif; ?>

	<?php if ( ! empty( $settings->scrim_color ) ) : ?>
		<div class="bb--video_block__scrim"></div>
	<?php endif; ?>

</div>
