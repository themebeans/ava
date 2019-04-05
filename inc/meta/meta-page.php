<?php
/**
 * The file is for creating the portfolio post type meta.
 * Corresponding meta functions are located in framework/metaboxes.php
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

add_action( 'add_meta_boxes', 'ava_metabox_page' );
function ava_metabox_page() {

	$prefix = '_ava_';

	$meta_box = array(
		'id'       => 'ava-meta-box-page',
		'title'    => esc_html__( 'Page Options', 'ava' ),
		'page'     => array( 'page', 'portfolio' ),
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(

			array(
				'name'    => esc_html__( 'Header Style:', 'ava' ),
				'desc'    => esc_html__( 'Select an alternate color scheme for the header element on this page.', 'ava' ),
				'id'      => $prefix . 'header_scheme',
				'type'    => 'select',
				'std'     => 'default',
				'options' => array(
					'default' => esc_html__( 'Default', 'ava' ),
					'light'   => esc_html__( 'Light', 'ava' ),
				),
			),

			array(
				'name'    => esc_html__( 'Header Position:', 'ava' ),
				'desc'    => esc_html__( 'Add absolute positioning to the header element on this page.', 'ava' ),
				'id'      => $prefix . 'header_style',
				'type'    => 'select',
				'std'     => 'default',
				'options' => array(
					'default'  => esc_html__( 'Default', 'ava' ),
					'absolute' => esc_html__( 'Absolute', 'ava' ),
					'fixed'    => esc_html__( 'Fixed', 'ava' ),
				),
			),

			array(
				'name' => esc_html__( 'Footer:', 'ava' ),
				'desc' => esc_html__( 'Disable the footer and the colophon on this page.', 'ava' ),
				'id'   => $prefix . 'hide_footer',
				'type' => 'checkbox',
				'std'  => false,
			),
		),
	);
	ava_add_meta_box( $meta_box );
}
