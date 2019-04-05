<?php
/**
 * Beaver Builder module, front-end instance
 *
 * You have access to two variables in this file:
 * $module:   An instance of your module class.
 * $settings: The module's settings.
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

if ( ! empty( $settings->bg_image_src ) && 'image' === $settings->bg_layout && 'yes' === $settings->parallax ) {
	$parallax = 'data-parallax=scroll data-image-src=' . esc_url( $settings->bg_image_src ) . '';
} else {
	$parallax = null;
} ?>

<div class="bb--hero bb--hero--<?php echo esc_attr( $settings->height ); ?>">

	<div class="bb--hero__inner" <?php echo esc_attr( $parallax ); ?>>

		<div>

			<?php if ( ! empty( $settings->title ) ) : ?>

				<h1 class="bb--hero__title cd-headline letters type">
					<?php
					$allowed_html_array = array(
						'span'   => array(
							'class' => array(),
						),
						'b'      => array(
							'class' => array(),
						),
						'i'      => array(),
						'em'     => array(),
						'strong' => array(),
					);
					?>

					<?php echo wp_kses( $settings->title, $allowed_html_array ); ?>
				</h1>

			<?php endif; ?>

			<?php if ( ! empty( $settings->content ) ) : ?>
				<p class="bb--hero__content">
					<?php echo esc_html( $settings->content ); ?>
				</p>
			<?php endif; ?>

			<?php if ( ! empty( $settings->button ) ) : ?>
				<a class="bb--hero__btn btn btn--large" target="<?php echo esc_attr( $settings->button_target ); ?>" href="<?php echo esc_url( $settings->button_url ); ?>">
					<?php echo esc_html( $settings->button ); ?>
				</a>
			<?php endif; ?>

		</div>

	</div>

	<?php if ( ! empty( $settings->scrim_color ) ) : ?>
		<div class="bb--hero__scrim"></div>
	<?php endif; ?>

	<?php $module->render_background( $settings->bg_layout ); ?>

</div>
