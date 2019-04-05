<?php
/**
 * Shop Customizer Section
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Add Section.
 */
$wp_customize->add_section(
	'ava__style-singleproduct', array(
		'title' => esc_html__( 'Single Product', 'ava' ),
		'panel' => 'ava__style-editor',
	)
);

/**
 * Shop Archive.
 */
$wp_customize->add_setting( 'title-singleproduct', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-singleproduct', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Single Product', 'ava' ),
			'section' => 'ava__style-singleproduct',
		)
	)
);

$wp_customize->add_setting(
	'single_product', array(
		'default'           => ava_defaults( 'single_product' ),
		'sanitize_callback' => 'ava_sanitize_select',
		'transport'         => 'postMessage',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Layout_Control(
		$wp_customize, 'single_product', array(
			'type'    => 'themebeans-layout',
			'section' => 'ava__style-singleproduct',
			'choices' => ava_get_choices( ava_get_single_product_layouts() ),
		)
	)
);

$wp_customize->add_setting(
	'single_product_breadcrumbs', array(
		'default'           => ava_defaults( 'single_product_breadcrumbs' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Toggle_Control(
		$wp_customize, 'single_product_breadcrumbs', array(
			'label'    => esc_html__( 'Breadcrumbs', 'ava' ),
			'section'  => 'ava__style-singleproduct',
			'type'     => 'themebeans-toggle',
			'settings' => 'single_product_breadcrumbs',
		)
	)
);

/**
 * Gallery.
 */
$wp_customize->add_setting( 'title-singleproduct_gallery', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-singleproduct_gallery', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Single Product: Gallery', 'ava' ),
			'section' => 'ava__style-singleproduct',
		)
	)
);

$wp_customize->add_setting(
	'single_product_gallery_zoom', array(
		'default'           => ava_defaults( 'single_product_gallery_zoom' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Toggle_Control(
		$wp_customize, 'single_product_gallery_zoom', array(
			'label'    => esc_html__( 'Zooming', 'ava' ),
			'section'  => 'ava__style-singleproduct',
			'type'     => 'themebeans-toggle',
			'settings' => 'single_product_gallery_zoom',
		)
	)
);

$wp_customize->add_setting(
	'single_product_gallery_lightbox', array(
		'default'           => ava_defaults( 'single_product_gallery_lightbox' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Toggle_Control(
		$wp_customize, 'single_product_gallery_lightbox', array(
			'label'    => esc_html__( 'Lightbox', 'ava' ),
			'section'  => 'ava__style-singleproduct',
			'type'     => 'themebeans-toggle',
			'settings' => 'single_product_gallery_lightbox',
		)
	)
);

// $wp_customize->add_control( 'single_product_gallery_lightbox', array(
// 'type'                  => 'checkbox',
// 'label'                 => esc_html__( 'Lightbox', 'ava' ),
// 'description'           => '',
// 'section'               => 'ava__style-singleproduct',
// ) );
$wp_customize->add_setting(
	'single_product_background_color', array(
		'default'           => ava_defaults( 'single_product_background_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'single_product_background_color', array(
			'label'   => esc_html__( 'Background', 'ava' ),
			'section' => 'ava__style-singleproduct',
		)
	)
);

$wp_customize->add_setting(
	'singleproduct_gallery_nav', array(
		'default'           => ava_defaults( 'singleproduct_gallery_nav' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'singleproduct_gallery_nav', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Navigation', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-singleproduct',
		'choices'     => array(
			'product-images--line'    => esc_html__( 'Lines', 'ava' ),
			'product-images--dots'    => esc_html__( 'Dots', 'ava' ),
			'product-images--circles' => esc_html__( 'Circles', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'singleproduct_gallery_nav_color', array(
		'default'           => ava_defaults( 'singleproduct_gallery_nav_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'singleproduct_gallery_nav_color', array(
			'label'   => esc_html__( 'Navigation Color', 'ava' ),
			'section' => 'ava__style-singleproduct',
		)
	)
);


/**
 * Fonts.
 */
$wp_customize->add_setting( 'title-singleproduct_header_fonts', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-singleproduct_header_fonts', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Single Product: Headers', 'ava' ),
			'section' => 'ava__style-singleproduct',
		)
	)
);

$wp_customize->add_setting(
	'singleproduct_header_font', array(
		'default'           => ava_defaults( 'global_header_font' ),
		'sanitize_callback' => 'ava_sanitize_nohtml',
	)
);

$wp_customize->add_control(
	'singleproduct_header_font', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Font', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-singleproduct',
		'choices'     => ava_get_fonts(),
	)
);

$wp_customize->add_setting(
	'singleproduct_header_font_style', array(
		'default'           => ava_defaults( 'singleproduct_header_font_style' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'singleproduct_header_font_style', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Style', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-singleproduct',
		'choices'     => array(
			'normal' => esc_html__( 'Normal', 'ava' ),
			'italic' => esc_html__( 'Italic', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'singleproduct_header_font_weight', array(
		'default'           => ava_defaults( 'singleproduct_header_font_weight' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'singleproduct_header_font_weight', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Weight', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-singleproduct',
		'choices'     => array(
			'normal' => esc_html__( 'Normal', 'ava' ),
			'bold'   => esc_html__( 'Bold', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'singleproduct_header_font_transform', array(
		'default'           => ava_defaults( 'singleproduct_header_font_transform' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'singleproduct_header_font_transform', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Transform', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-singleproduct',
		'choices'     => array(
			'none'      => esc_html__( 'Normal', 'ava' ),
			'lowercase' => esc_html__( 'Lowercase', 'ava' ),
			'uppercase' => esc_html__( 'Uppercase', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'singleproduct_header_font_size', array(
		'default'           => ava_defaults( 'singleproduct_header_font_size' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'singleproduct_header_font_size', array(
			'default'     => ava_defaults( 'singleproduct_header_font_size' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Size', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-singleproduct',
			'input_attrs' => array(
				'min'  => 9,
				'max'  => 50,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'singleproduct_header_font_lineheight', array(
		'default'           => ava_defaults( 'singleproduct_header_font_lineheight' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'singleproduct_header_font_lineheight', array(
			'default'     => ava_defaults( 'singleproduct_header_font_lineheight' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Line Height', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-singleproduct',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 60,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'singleproduct_header_font_letterspacing', array(
		'default'           => ava_defaults( 'singleproduct_header_font_letterspacing' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_number_intval',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'singleproduct_header_font_letterspacing', array(
			'default'     => ava_defaults( 'singleproduct_header_font_letterspacing' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Letter Spacing', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-singleproduct',
			'input_attrs' => array(
				'min'  => -5,
				'max'  => 20,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'singleproduct_header_color', array(
		'default'           => ava_defaults( 'singleproduct_header_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'singleproduct_header_color', array(
			'label'   => esc_html__( 'Color', 'ava' ),
			'section' => 'ava__style-singleproduct',
		)
	)
);



/**
 * Excerpt Fonts.
 */
$wp_customize->add_setting( 'title-singleproduct_fonts', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-singleproduct_fonts', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Single Product: Excerpt', 'ava' ),
			'section' => 'ava__style-singleproduct',
		)
	)
);

$wp_customize->add_setting(
	'singleproduct_font', array(
		'default'           => ava_defaults( 'singleproduct_font' ),
		'sanitize_callback' => 'ava_sanitize_nohtml',
	)
);

$wp_customize->add_control(
	'singleproduct_font', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Font', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-singleproduct',
		'choices'     => ava_get_fonts(),
	)
);

$wp_customize->add_setting(
	'singleproduct_font_style', array(
		'default'           => ava_defaults( 'singleproduct_font_style' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'singleproduct_font_style', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Style', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-singleproduct',
		'choices'     => array(
			'normal' => esc_html__( 'Normal', 'ava' ),
			'italic' => esc_html__( 'Italic', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'singleproduct_font_weight', array(
		'default'           => ava_defaults( 'singleproduct_font_weight' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'singleproduct_font_weight', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Weight', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-singleproduct',
		'choices'     => array(
			'normal' => esc_html__( 'Normal', 'ava' ),
			'bold'   => esc_html__( 'Bold', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'singleproduct_font_transform', array(
		'default'           => ava_defaults( 'singleproduct_font_transform' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'singleproduct_font_transform', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Transform', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-singleproduct',
		'choices'     => array(
			'none'      => esc_html__( 'Normal', 'ava' ),
			'lowercase' => esc_html__( 'Lowercase', 'ava' ),
			'uppercase' => esc_html__( 'Uppercase', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'singleproduct_font_size', array(
		'default'           => ava_defaults( 'singleproduct_font_size' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'singleproduct_font_size', array(
			'default'     => ava_defaults( 'singleproduct_font_size' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Size', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-singleproduct',
			'input_attrs' => array(
				'min'  => 9,
				'max'  => 30,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'singleproduct_font_lineheight', array(
		'default'           => ava_defaults( 'singleproduct_font_lineheight' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'singleproduct_font_lineheight', array(
			'default'     => ava_defaults( 'singleproduct_font_lineheight' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Line Height', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-singleproduct',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 40,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'singleproduct_font_letterspacing', array(
		'default'           => ava_defaults( 'singleproduct_font_letterspacing' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_number_intval',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'singleproduct_font_letterspacing', array(
			'default'     => ava_defaults( 'singleproduct_font_letterspacing' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Letter Spacing', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-singleproduct',
			'input_attrs' => array(
				'min'  => -5,
				'max'  => 20,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'singleproduct_excerpt_color', array(
		'default'           => ava_defaults( 'singleproduct_excerpt_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'singleproduct_excerpt_color', array(
			'label'   => esc_html__( 'Color', 'ava' ),
			'section' => 'ava__style-singleproduct',
		)
	)
);
