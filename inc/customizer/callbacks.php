<?php
/**
 * Customizer callbacks
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Only displays the customizer secction, if we're on a single post.
 *
 * @param string $control Customizer Control.
 */
function ava_is_single_post_callback( $control ) {
	return is_singular( 'post' );
}

/**
 * Only displays the customizer secction, if we're on a single product page.
 *
 * @param string $control Customizer Control.
 */
function ava_is_single_product_callback( $control ) {
	return is_singular( 'product' );
}

/**
 * Only displays the customizer secction, if we're on the shop page.
 *
 * @param string $control Customizer Control.
 */
function ava_is_shop_callback( $control ) {
	/*
     * Query whether WooCommerce is activated. If not, return early.
     *
     * @see https://docs.woocommerce.com/document/query-whether-woocommerce-is-activated/
     */
	if ( ! ava_is_woocommerce_activated() ) {
		return;
	}

	return is_shop() || is_product_category();
}
