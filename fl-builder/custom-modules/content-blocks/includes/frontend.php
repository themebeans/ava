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
 * Is the Photoswipe lightbox option enabled?
 */
$position_1 = ( ! empty( $settings->position_1 ) ) ? $settings->position_1 : null;
$position_2 = ( ! empty( $settings->position_1 ) ) ? $settings->position_2 : null;
$position_3 = ( ! empty( $settings->position_1 ) ) ? $settings->position_3 : null;
$position_4 = ( ! empty( $settings->position_1 ) ) ? $settings->position_4 : null; ?>

<div class="bb--content-blocks">

	<?php if ( ! empty( $settings->title_1 ) || ! empty( $settings->image_1 ) ) : ?>

		<div class="bb--content-blocks__block bb--content-blocks__1">

			<?php if ( ! empty( $settings->title_1 ) ) : ?>
				<h3 class="bb--content-blocks__title <?php echo esc_attr( $settings->position_1 ); ?>">
					<?php echo esc_html( $settings->title_1 ); ?>
				</h3>
			<?php endif; ?>

			<?php if ( ! empty( $settings->url_1 ) ) : ?>
				<a class="bb--content-blocks__link" href="<?php echo esc_url( $settings->url_1 ); ?>"></a>
			<?php endif; ?>

			<div class="bb--content-blocks__intrinsic"></div>

		</div>

	<?php endif; ?>

	<?php if ( ! empty( $settings->title_2 ) || ! empty( $settings->image_2 ) ) : ?>

		<div class="bb--content-blocks__block bb--content-blocks__2">

			<?php if ( ! empty( $settings->title_2 ) ) : ?>
				<h3 class="bb--content-blocks__title <?php echo esc_attr( $settings->position_2 ); ?>">
					<?php echo esc_html( $settings->title_2 ); ?>
				</h3>
			<?php endif; ?>

			<?php if ( ! empty( $settings->url_2 ) ) : ?>
				<a class="bb--content-blocks__link" href="<?php echo esc_url( $settings->url_2 ); ?>"></a>
			<?php endif; ?>

			<div class="bb--content-blocks__intrinsic"></div>

		</div>

	<?php endif; ?>

	<?php if ( ! empty( $settings->title_3 ) || ! empty( $settings->image_3 ) ) : ?>

		<div class="bb--content-blocks__block bb--content-blocks__3">

			<?php if ( ! empty( $settings->title_3 ) ) : ?>
				<h3 class="bb--content-blocks__title <?php echo esc_attr( $settings->position_3 ); ?>">
					<?php echo esc_html( $settings->title_3 ); ?>
				</h3>
			<?php endif; ?>

			<?php if ( ! empty( $settings->url_3 ) ) : ?>
				<a class="bb--content-blocks__link" href="<?php echo esc_url( $settings->url_3 ); ?>"></a>
			<?php endif; ?>

			<div class="bb--content-blocks__intrinsic"></div>

		</div>

	<?php endif; ?>

	<?php if ( ! empty( $settings->title_4 ) || ! empty( $settings->image_4 ) ) : ?>

		<div class="bb--content-blocks__block bb--content-blocks__4">

			<?php if ( ! empty( $settings->title_4 ) ) : ?>
				<h3 class="bb--content-blocks__title <?php echo esc_attr( $settings->position_4 ); ?>">
					<?php echo esc_html( $settings->title_4 ); ?>
				</h3>
			<?php endif; ?>

			<?php if ( ! empty( $settings->url_4 ) ) : ?>
				<a class="bb--content-blocks__link" href="<?php echo esc_url( $settings->url_4 ); ?>"></a>
			<?php endif; ?>

			<div class="bb--content-blocks__intrinsic"></div>

		</div>

	<?php endif; ?>

</div>
