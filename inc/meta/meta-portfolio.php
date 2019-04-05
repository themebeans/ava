<?php
/**
 * The file is for creating the portfolio post type meta.
 * Meta output is defined on the portfolio single editor.
 * Corresponding meta functions are located in framework/metaboxes.php
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

add_action( 'add_meta_boxes', 'ava_metabox_portfolio' );
function ava_metabox_portfolio() {

	$prefix = '_ava_';

	$meta_box = array(
		'id'          => 'portfolio-type',
		'title'       => esc_html__( 'Portfolio Format', 'ava' ),
		'description' => esc_html__( '', 'ava' ),
		'page'        => 'portfolio',
		'context'     => 'side',
		'priority'    => 'core',
		'fields'      => array(
			array(
				'name' => esc_html__( 'Gallery', 'ava' ),
				'desc' => esc_html__( '', 'ava' ),
				'id'   => $prefix . 'portfolio_type_gallery',
				'type' => 'checkbox',
				'std'  => true,
			),
			array(
				'name' => esc_html__( 'Video', 'ava' ),
				'desc' => esc_html__( '', 'ava' ),
				'id'   => $prefix . 'portfolio_type_video',
				'type' => 'checkbox',
				'std'  => false,
			),
		),
	);
	ava_add_meta_box( $meta_box );

	$meta_box = array(
		'id'          => 'portfolio-meta',
		'title'       => esc_html__( 'Portfolio Settings', 'ava' ),
		'description' => esc_html__( '', 'ava' ),
		'page'        => 'portfolio',
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'name' => esc_html__( 'Gallery Images:', 'ava' ),
				'desc' => esc_html__( 'Upload, reorder and caption the post gallery.', 'ava' ),
				'id'   => $prefix . 'portfolio_upload_images',
				'type' => 'images',
				'std'  => esc_html__( 'Browse & Upload', 'ava' ),
			),

			array(
				'name'    => __( ' Portfolio Layout:', 'ava' ),
				'desc'    => __( ' Choose the layout for this portfolio post.', 'ava' ),
				'id'      => $prefix . 'portfolio_layout',
				'type'    => 'select',
				'std'     => 'default',
				'options' => array(
					'1' => __( 'Stacked', 'ava' ),
				),
			),

			array(
				'name'    => __( ' Lightbox:', 'ava' ),
				'desc'    => __( ' Enable the lightbox.', 'ava' ),
				'id'      => $prefix . 'portfolio_lightbox',
				'type'    => 'select',
				'std'     => 'default',
				'options' => array(
					'yes' => __( 'Yes', 'ava' ),
					'no'  => __( 'No', 'ava' ),
				),
			),

			array(
				'name' => esc_html__( 'Date:', 'ava' ),
				'id'   => $prefix . 'portfolio_date',
				'type' => 'checkbox',
				'desc' => esc_html__( 'Display the date.', 'ava' ),
				'std'  => false,
			),
			array(
				'name' => esc_html__( 'Categories:', 'ava' ),
				'id'   => $prefix . 'portfolio_cats',
				'type' => 'checkbox',
				'desc' => esc_html__( 'Display the portfolio categories.', 'ava' ),
				'std'  => false,
			),
			array(
				'name' => esc_html__( 'Tags:', 'ava' ),
				'id'   => $prefix . 'portfolio_tags',
				'type' => 'checkbox',
				'desc' => esc_html__( 'Display the portfolio tags.', 'ava' ),
				'std'  => false,
			),
			array(
				'name' => esc_html__( 'Permalink:', 'ava' ),
				'id'   => $prefix . 'portfolio_permalink',
				'type' => 'checkbox',
				'desc' => esc_html__( 'Display the post permalink.', 'ava' ),
				'std'  => false,
			),
			array(
				'name' => esc_html__( 'Role:', 'ava' ),
				'desc' => esc_html__( 'Display the role.', 'ava' ),
				'id'   => $prefix . 'portfolio_role',
				'type' => 'text',
				'std'  => '',
			),
			array(
				'name' => esc_html__( 'Client:', 'ava' ),
				'desc' => esc_html__( 'Display the client meta.', 'ava' ),
				'id'   => $prefix . 'portfolio_client',
				'type' => 'text',
				'std'  => '',
			),
			array(
				'name' => esc_html__( 'URL:', 'ava' ),
				'desc' => esc_html__( 'Display a URL to link to.', 'ava' ),
				'id'   => $prefix . 'portfolio_url',
				'type' => 'text',
				'std'  => '',
			),
			array(
				'name' => esc_html__( 'External URL:', 'ava' ),
				'desc' => esc_html__( 'Link this portfolio post to an external URL. For example, link this post to your Behance portfolio post.', 'ava' ),
				'id'   => $prefix . 'portfolio_external_url',
				'type' => 'text',
				'std'  => '',
			),
		),
	);
	ava_add_meta_box( $meta_box );

	$meta_box = array(
		'id'       => 'bean-meta-box-portfolio-video',
		'title'    => esc_html__( 'Video Settings', 'ava' ),
		'page'     => 'portfolio',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name' => esc_html__( 'Embed 1:', 'ava' ),
				'desc' => esc_html__( 'Insert your embeded code here.', 'ava' ),
				'id'   => $prefix . 'portfolio_embed_code',
				'type' => 'textarea',
				'std'  => '',
			),
			array(
				'name' => esc_html__( 'Embed 2:', 'ava' ),
				'desc' => esc_html__( 'Insert your embeded code here.', 'ava' ),
				'id'   => $prefix . 'portfolio_embed_code_2',
				'type' => 'textarea',
				'std'  => '',
			),
			array(
				'name' => esc_html__( 'Embed 3:', 'ava' ),
				'desc' => esc_html__( 'Insert your embeded code here.', 'ava' ),
				'id'   => $prefix . 'portfolio_embed_code_3',
				'type' => 'textarea',
				'std'  => '',
			),
			array(
				'name' => esc_html__( 'Embed 4:', 'ava' ),
				'desc' => esc_html__( 'Insert your embeded code here.', 'ava' ),
				'id'   => $prefix . 'portfolio_embed_code_4',
				'type' => 'textarea',
				'std'  => '',
			),
			array(
				'name' => esc_html__( 'Video Shortcodes:', 'ava' ),
				'desc' => esc_html__( 'Insert any <a target="blank" href="https://codex.wordpress.org/Video_Shortcode">video shortcodes</a> here.', 'ava' ),
				'id'   => $prefix . 'portfolio_video_shortcodes',
				'type' => 'textarea',
				'std'  => '',
			),
		),

	);
	ava_add_meta_box( $meta_box );
}
