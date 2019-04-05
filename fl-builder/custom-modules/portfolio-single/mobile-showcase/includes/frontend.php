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

if ( $settings->gallery_items ) { ?>

	<div class="portfolio__single--mobile-showcase">

		<?php foreach ( $settings->gallery_items as $gallery_item ) { ?>

			<?php $gallery_item_src = wp_get_attachment_image_src( $gallery_item, 'large' ); ?>

			<figure class="iphone">
				<div class="camera_and_speaker"></div>
				<div class="screen">
					<img src="<?php echo esc_url( $gallery_item_src[0] ); ?>">
				</div>
				<div class="home_button"></div>
			</figure>

		<?php } ?>

	</div>

<?php } ?>
