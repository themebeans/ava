<?php
/**
 * This file should be used to render each module instance.
 * You have access to two variables in this file:
 *
 * $module An instance of your module class.
 * $settings The module's settings.
 */

$image = wp_get_attachment_image_src( $settings->image, '' ); ?>

<div class="bb--icon_block <?php echo esc_attr( $settings->alignment ); ?>">

	<?php if ( ! empty( $settings->image ) ) : ?>
		<?php echo '<img src="' . esc_url( $image[0] ) . '" height="' . esc_attr( round( $image[2] / 2 ) ) . '" width="' . esc_attr( round( $image[1] / 2 ) ) . '" class="bb--icon_block__img">'; ?>
	<?php endif; ?>

	<?php if ( ! empty( $settings->title ) ) : ?>
		<h5><?php echo esc_html( $settings->title ); ?></h5>
	<?php endif; ?>

	<?php if ( ! empty( $settings->content ) ) : ?>
		<p><?php echo esc_html( $settings->content ); ?></p>
	<?php endif; ?>

	<?php if ( ! empty( $settings->button ) && ! empty( $settings->button_url ) ) : ?>
		<a class="btn" href="<?php echo esc_url( $settings->button_url ); ?>"><?php echo esc_html( $settings->button ); ?></a>
	<?php endif; ?>
</div>
