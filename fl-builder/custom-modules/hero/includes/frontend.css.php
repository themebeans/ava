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

if ( ! empty( $settings->bg_color ) && 'color' === $settings->bg_layout ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--hero {
		background-color: #<?php echo esc_attr( $settings->bg_color ); ?>;
	}
<?php endif; ?>

<?php if ( ! empty( $settings->scrim_color ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--hero__scrim {
		background-color: #<?php echo esc_attr( $settings->scrim_color ); ?>;
	}
<?php endif; ?>

<?php if ( ! empty( $settings->scrim_opacity ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--hero__scrim {
		opacity: <?php echo esc_attr( $settings->scrim_opacity / 100 ); ?>;
	}
<?php endif; ?>

<?php if ( ! empty( $settings->header_color ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--hero__title {
		color: #<?php echo esc_attr( $settings->header_color ); ?>;
	}
<?php endif; ?>

<?php if ( ! empty( $settings->content_color ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--hero__content {
		color: #<?php echo esc_attr( $settings->content_color ); ?>;
	}
<?php endif; ?>

<?php if ( ! empty( $settings->button_bg_color ) ) : ?>
	body .fl-node-<?php echo esc_attr( $id ); ?> .btn.bb--hero__btn {
		background-color: #<?php echo esc_attr( $settings->button_bg_color ); ?>;
	}
<?php endif; ?>

<?php if ( ! empty( $settings->button_bg_hover_color ) ) : ?>
	body .fl-node-<?php echo esc_attr( $id ); ?> .btn.bb--hero__btn:hover,
	body .fl-node-<?php echo esc_attr( $id ); ?> .btn.bb--hero__btn:focus {
		background-color: #<?php echo esc_attr( $settings->button_bg_hover_color ); ?>;
	}
<?php endif; ?>

<?php if ( ! empty( $settings->button_text_color ) ) : ?>
	body .fl-node-<?php echo esc_attr( $id ); ?> .btn.bb--hero__btn {
		color: #<?php echo esc_attr( $settings->button_text_color ); ?>;
	}
<?php endif; ?>

<?php if ( 'video' === $settings->bg_layout ) : ?>
	@media screen and (max-device-width: 768px) {

		.fl-node-<?php echo esc_attr( $id ); ?> .bb--hero {
			background-position: center center;
			background-repeat: no-repeat;
			background-size: cover;
			background-image: url(<?php echo esc_attr( $settings->bg_video_poster_src ); ?>);
		}

		.fl-node-<?php echo esc_attr( $id ); ?> .bb--hero__video {
			display: none;
		}

	}
<?php endif; ?>
