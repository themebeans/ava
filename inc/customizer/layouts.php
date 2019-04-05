<?php
/**
 * Customizer Layouts.
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Returns an array of choices registered for Ava.
 *
 * @param array|array $choices Options.
 */
function ava_get_choices( $choices ) {
	$layouts                 = $choices;
	$layouts_control_options = array();

	foreach ( $layouts as $layout => $value ) {
		$layouts_control_options[ $layout ] = $value;
	}

	return $layouts_control_options;
}

/**
 * Register header layouts.
 */
function ava_get_header_layouts() {

	$image_dir = get_template_directory_uri() . '/inc/customizer/images/';

	return apply_filters(
		'ava_header_layouts', array(
			'header-1' => esc_url( $image_dir ) . 'header-1.svg',
			'header-2' => esc_url( $image_dir ) . 'header-2.svg',
			'header-3' => esc_url( $image_dir ) . 'header-3.svg',
			'header-4' => esc_url( $image_dir ) . 'header-4.svg',
		)
	);
}

/**
 * Register top header layouts.
 */
function ava_get_top_header_layouts() {

	$image_dir = get_template_directory_uri() . '/inc/customizer/images/';

	return apply_filters(
		'ava_top_header_layouts', array(
			'top-header-1' => esc_url( $image_dir ) . 'top-header-1.svg',
			'top-header-2' => esc_url( $image_dir ) . 'top-header-2.svg',
			'top-header-3' => esc_url( $image_dir ) . 'top-header-3.svg',
		)
	);
}

/**
 * Register footer layouts.
 */
function ava_get_footer_layouts() {

	$image_dir = get_template_directory_uri() . '/inc/customizer/images/';

	return apply_filters(
		'ava_footer_layouts', array(
			'footer-1' => esc_url( $image_dir ) . 'footer-col-4.svg',
			'footer-2' => esc_url( $image_dir ) . 'footer-col-3.svg',
			'footer-3' => esc_url( $image_dir ) . 'footer-col-2.svg',
			'footer-4' => esc_url( $image_dir ) . 'footer-col-1.svg',
			'footer-5' => esc_url( $image_dir ) . 'footer-col-3-1.svg',
			'footer-6' => '',
		)
	);
}

/**
 * Register colophon layouts.
 */
function ava_get_colophon_layouts() {

	$image_dir = get_template_directory_uri() . '/inc/customizer/images/';

	return apply_filters(
		'ava_colophon_layouts', array(
			'colophon-1' => esc_url( $image_dir ) . 'colophon-1.svg',
			'colophon-2' => esc_url( $image_dir ) . 'colophon-2.svg',
			'colophon-3' => esc_url( $image_dir ) . 'colophon-3.svg',
		)
	);
}

/**
 * Register single product layouts.
 */
function ava_get_single_product_layouts() {

	$image_dir = get_template_directory_uri() . '/inc/customizer/images/';

	return apply_filters(
		'ava_single_product_layouts', array(
			'single-product-1' => esc_url( $image_dir ) . 'single-product-1.svg',
			'single-product-2' => esc_url( $image_dir ) . 'single-product-2.svg',
			'single-product-3' => esc_url( $image_dir ) . 'single-product-3.svg',
		)
	);
}
