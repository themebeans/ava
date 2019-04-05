<?php if ( ! empty( $settings->color ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--team__overlay .entry-title {
		color: #<?php echo esc_attr( $settings->color ); ?>;
	}
<?php endif; ?>


<?php if ( ! empty( $settings->overlay_color ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--team__overlay {
		background-color: #<?php echo esc_attr( $settings->overlay_color ); ?>;
	}
<?php endif; ?>
