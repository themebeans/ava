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

// Continue, only if we have at least uploaded image.
if ( ! empty( $settings->gallery_items ) ) :

	echo '<div class="beaver--social-proof">';

	// Grab each of the uploaded images.
	foreach ( $settings->gallery_items as $gallery_item ) :

			// Retrieve the image source URL for each uloaded images.
			$gallery_item_src = wp_get_attachment_image_src( $gallery_item, 'small' );

			printf(
				'<div class="social-proof__logo"><img src="%1$s"></div>',
				esc_url( $gallery_item_src[0] )
			);

		endforeach;

	echo '</div>';

endif;
