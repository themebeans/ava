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

if ( ! empty( $settings->overlay_color ) && ! empty( $settings->overlay_opacity ) ) : ?>

	<?php
	$background_rgba = ava_hex2rgb( $settings->overlay_color );
	$background_rgba = vsprintf( 'rgba( %1$s, %2$s, %3$s, . ' . $settings->overlay_opacity . ')', $background_rgba );
	?>

	.fl-node-<?php echo esc_attr( $id ); ?> .project__overlay {
		background: <?php echo esc_attr( $background_rgba ); ?> !important;
	}
<?php endif; ?>


<?php if ( ! empty( $settings->overlay_textcolor ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .project__overlay .entry-title {
		color: #<?php echo esc_attr( $settings->overlay_textcolor ); ?>;
	}
<?php endif; ?>
