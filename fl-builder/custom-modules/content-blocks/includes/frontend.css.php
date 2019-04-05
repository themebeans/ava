<?php
/**
 * Beaver Builder module, front-end styles
 *
 * You have access to one variable in this file:
 * $settings: The module's settings.
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

if ( ! empty( $settings->image_1 ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--content-blocks__1 .bb--content-blocks__intrinsic {
		background-image: url("<?php echo esc_attr( $settings->image_1_src ); ?>");
	}
<?php endif; ?>

<?php if ( ! empty( $settings->image_2 ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--content-blocks__2 .bb--content-blocks__intrinsic {
		background-image: url("<?php echo esc_attr( $settings->image_2_src ); ?>");
	}
<?php endif; ?>

<?php if ( ! empty( $settings->image_3 ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--content-blocks__3 .bb--content-blocks__intrinsic {
		background-image: url("<?php echo esc_attr( $settings->image_3_src ); ?>");
	}
<?php endif; ?>

<?php if ( ! empty( $settings->image_4 ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--content-blocks__4 .bb--content-blocks__intrinsic {
		background-image: url("<?php echo esc_attr( $settings->image_4_src ); ?>");
	}
<?php endif; ?>

<?php if ( ! empty( $settings->title_color_1 ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--content-blocks__1 .bb--content-blocks__title {
		color: #<?php echo esc_attr( $settings->title_color_1 ); ?>;
	}
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--content-blocks__1 .bb--content-blocks__title:before {
		background-color: #<?php echo esc_attr( $settings->title_color_1 ); ?>;
	}
<?php endif; ?>

<?php if ( ! empty( $settings->title_color_2 ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--content-blocks__2 .bb--content-blocks__title {
		color: #<?php echo esc_attr( $settings->title_color_2 ); ?>;
	}
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--content-blocks__2 .bb--content-blocks__title:before {
		background-color: #<?php echo esc_attr( $settings->title_color_2 ); ?>;
	}
<?php endif; ?>

<?php if ( ! empty( $settings->title_color_3 ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--content-blocks__3 .bb--content-blocks__title {
		color: #<?php echo esc_attr( $settings->title_color_3 ); ?>;
	}
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--content-blocks__3 .bb--content-blocks__title:before {
		background-color: #<?php echo esc_attr( $settings->title_color_3 ); ?>;
	}
<?php endif; ?>

<?php if ( ! empty( $settings->title_color_4 ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--content-blocks__4 .bb--content-blocks__title {
		color: #<?php echo esc_attr( $settings->title_color_4 ); ?>;
	}
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--content-blocks__4 .bb--content-blocks__title:before {
		background-color: #<?php echo esc_attr( $settings->title_color_4 ); ?>;
	}
<?php endif; ?>
