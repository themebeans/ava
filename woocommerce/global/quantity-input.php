<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see         http://docs.woothemes.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( $max_value && $min_value === $max_value ) {
	?>

	<div class="quantity hidden">
		<input type="hidden" id="<?php echo esc_attr( $input_id ); ?>" class="qty" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $min_value ); ?>" />
	</div>

	<?php
} else {
	?>

	<div class="quantity">

		<span class="quantity__title">
			<?php echo esc_html__( 'Qty:', 'ava' ); ?>
		</span>

		<select name="<?php echo esc_attr( $input_name ); ?>" title="<?php esc_html_x( 'Qty', 'Product quantity input tooltip', 'ava' ); ?>" class="qty">

		<?php

		if ( ! $min_value ) {
			$min_value = 1;
		}

		if ( ! $max_value ) {
			$max_value = 10;
		}

		for ( $count = $min_value; $count <= $max_value; $count = $count + $step ) {
			if ( $count === $input_value ) {
				$selected = ' selected';
			} else {
				$selected = '';
			}

			echo '<option value="' . esc_attr( $count ) . '"' . esc_attr( $selected ) . '>' . esc_html( $count ) . '</option>';
		}
		?>

		</select>

		</div>
	<?php
}

