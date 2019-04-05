<?php if ( ! empty( $settings->color ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--video_block__title {
		color: #<?php echo esc_attr( $settings->color ); ?>;
	}
<?php endif; ?>
