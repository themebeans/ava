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

if ( ! empty( $settings->textcolor ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .portfolio--liam .project__overlay h2 {
		color: #<?php echo esc_attr( $settings->textcolor ); ?>;
	}

<?php endif; ?>

<?php if ( ! empty( $settings->overlay_color ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .portfolio--liam .project__background {
		background-color: #<?php echo esc_attr( $settings->overlay_color ); ?>;
	}
<?php endif; ?>

<?php if ( ! empty( $settings->overlay_opacity ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .portfolio--liam .project__background {
		opacity: <?php echo esc_attr( $settings->overlay_opacity ); ?>;
	}
<?php endif; ?>
