<?php
/**
 *  NM: The template for including AJAX add-to-cart replacement elements/fragments
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Cart contents count.
echo ava_woocommerce_get_cart_contents_count();

// Mini cart.
woocommerce_mini_cart();
