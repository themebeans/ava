<?php if ( ! empty( $settings->header_color ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--video_block__title {
		color: #<?php echo esc_attr( $settings->header_color ); ?>!important;
	}
<?php endif; ?>


<?php if ( ! empty( $settings->cta_color ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--video_block__link,
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--video_block__link:hover {
		color: #<?php echo esc_attr( $settings->cta_color ); ?>!important;
	}
<?php endif; ?>

<?php if ( ! empty( $settings->scrim_color ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--video_block__scrim {
		background-color: #<?php echo esc_attr( $settings->scrim_color ); ?>;
	}
<?php endif; ?>


<?php if ( ! empty( $settings->scrim_opacity ) ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .bb--video_block__scrim {
		opacity: <?php echo esc_attr( $settings->scrim_opacity / 100 ); ?>;
	}
<?php endif; ?>
