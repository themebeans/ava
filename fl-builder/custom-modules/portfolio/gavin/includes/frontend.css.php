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

if ( ! empty( $settings->scrim_color ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .portfolio--gavin__scrim {
		background-color: #<?php echo esc_attr( $settings->scrim_color ); ?>;
	}
<?php endif; ?>


<?php if ( ! empty( $settings->scrim_opacity ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .portfolio--gavin__scrim {
		opacity: <?php echo esc_attr( $settings->scrim_opacity / 100 ); ?>;
	}
<?php endif; ?>


<?php if ( ! empty( $settings->textcolor ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .project__navigation_link {
		color: #<?php echo esc_attr( $settings->textcolor ); ?>;
	}

	.fl-node-<?php echo esc_attr( $id ); ?> .project__navigation_link:before {
		background-color: #<?php echo esc_attr( $settings->textcolor ); ?>;
	}
<?php endif; ?>


<?php if ( ! empty( $settings->textcolor_active ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .project__navigation_link.js--active,
	.fl-node-<?php echo esc_attr( $id ); ?> .project__navigation_link:hover {
		color: #<?php echo esc_attr( $settings->textcolor_active ); ?>;
	}

	.fl-node-<?php echo esc_attr( $id ); ?> .project__navigation_link.js--active:before {
		background-color: #<?php echo esc_attr( $settings->textcolor_active ); ?>;
	}
<?php endif; ?>
