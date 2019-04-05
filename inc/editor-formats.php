<?php
/**
 * Custom TinyMCE editor formats for this theme.
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * TinyMCE callback function to insert 'styleselect' into the $buttons array.
 */
function ava_mce_formats_button( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
add_filter( 'mce_buttons_2', 'ava_mce_formats_button' );

/**
 * TinyMCE Callback function to filter the MCE settings.
 */
function ava_mce_before_init_insert_formats( $init_array ) {
	// Define the style_formats array.
	$style_formats = array(
		// Each array child is a format with it's own settings.
		array(
			'title'   => esc_html__( 'Button', 'ava' ),
			'inline'  => 'span',
			'classes' => 'button entry-format-button',
			'wrapper' => false,
		),
		array(
			'title'   => esc_html__( 'Highlight', 'ava' ),
			'inline'  => 'span',
			'classes' => 'entry-format-highlight',
			'wrapper' => false,
		),
	);
	// Insert the array, JSON ENCODED, into 'style_formats'.
	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;
}
add_filter( 'tiny_mce_before_init', 'ava_mce_before_init_insert_formats' );
