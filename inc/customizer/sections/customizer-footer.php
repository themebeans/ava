<?php
/**
 * Footer Customizer Section
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Add Section.
 */
$wp_customize->add_section(
	'ava__style-footer', array(
		'title' => esc_html__( 'Footer', 'ava' ),
		'panel' => 'ava__style-editor',
	)
);

/**
 * Settings and Controls.
 */
$wp_customize->add_setting( 'title-footer', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-footer', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Footer', 'ava' ),
			'section' => 'ava__style-footer',
		)
	)
);

$wp_customize->add_setting(
	'footer', array(
		'default'           => ava_defaults( 'footer' ),
		'sanitize_callback' => 'ava_sanitize_select',
		'transport'         => 'postMessage',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Layout_Control(
		$wp_customize, 'footer', array(
			'type'    => 'themebeans-layout',
			'section' => 'ava__style-footer',
			'choices' => ava_get_choices( ava_get_footer_layouts() ),
		)
	)
);

$wp_customize->add_setting(
	'footer_padding_top', array(
		'default'           => ava_defaults( 'footer_padding_top' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'footer_padding_top', array(
			'default'     => ava_defaults( 'footer_padding_top' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Top Padding', 'ava' ),
			'description' => 'vw',
			'section'     => 'ava__style-footer',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 20,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'footer_padding_bottom', array(
		'default'           => ava_defaults( 'footer_padding_bottom' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'footer_padding_bottom', array(
			'default'     => ava_defaults( 'footer_padding_bottom' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Bottom Padding', 'ava' ),
			'description' => 'vw',
			'section'     => 'ava__style-footer',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 20,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'footer_background_color', array(
		'default'           => ava_defaults( 'footer_background_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'footer_background_color', array(
			'label'   => esc_html__( 'Background', 'ava' ),
			'section' => 'ava__style-footer',
		)
	)
);

$wp_customize->add_setting(
	'footer_text_color', array(
		'default'           => ava_defaults( 'footer_text_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'footer_text_color', array(
			'label'   => esc_html__( 'Color', 'ava' ),
			'section' => 'ava__style-footer',
		)
	)
);



/**
 * Mobile.
 */
$wp_customize->add_setting( 'title-footer_mobile', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-footer_mobile', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Footer: Mobile', 'ava' ),
			'section' => 'ava__style-footer',
		)
	)
);

$wp_customize->add_setting(
	'footer_mobile_padding_top', array(
		'default'           => ava_defaults( 'footer_mobile_padding_top' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'footer_mobile_padding_top', array(
			'default'     => ava_defaults( 'footer_mobile_padding_top' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Top Padding', 'ava' ),
			'description' => 'vw',
			'section'     => 'ava__style-footer',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 50,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'footer_mobile_padding_bottom', array(
		'default'           => ava_defaults( 'footer_mobile_padding_bottom' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'footer_mobile_padding_bottom', array(
			'default'     => ava_defaults( 'footer_mobile_padding_bottom' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Bottom Padding', 'ava' ),
			'description' => 'vw',
			'section'     => 'ava__style-footer',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 50,
				'step' => 1,
			),
		)
	)
);



/**
 * Large.
 */
$wp_customize->add_setting( 'title-footer_large', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-footer_large', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Footer: Large', 'ava' ),
			'section' => 'ava__style-footer',
		)
	)
);

$wp_customize->add_setting(
	'footer_large_padding_top', array(
		'default'           => ava_defaults( 'footer_large_padding_top' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'footer_large_padding_top', array(
			'default'     => ava_defaults( 'footer_large_padding_top' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Top Padding', 'ava' ),
			'description' => 'vw',
			'section'     => 'ava__style-footer',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 10,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'footer_large_padding_bottom', array(
		'default'           => ava_defaults( 'footer_large_padding_bottom' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'footer_large_padding_bottom', array(
			'default'     => ava_defaults( 'footer_large_padding_bottom' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Bottom Padding', 'ava' ),
			'description' => 'vw',
			'section'     => 'ava__style-footer',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 10,
				'step' => 1,
			),
		)
	)
);



/**
 * Footer Headers.
 */
$wp_customize->add_setting( 'title-footer_headers', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-footer_headers', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Footer: Headers', 'ava' ),
			'section' => 'ava__style-footer',
		)
	)
);

$wp_customize->add_setting(
	'footer_header_color', array(
		'default'           => ava_defaults( 'footer_header_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'footer_header_color', array(
			'label'   => esc_html__( 'Color', 'ava' ),
			'section' => 'ava__style-footer',
		)
	)
);

$wp_customize->add_setting(
	'footer_header_opacity', array(
		'default'           => ava_defaults( 'footer_header_opacity' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'footer_header_opacity', array(
			'default'     => ava_defaults( 'footer_header_opacity' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Opacity', 'ava' ),
			'description' => '%',
			'section'     => 'ava__style-footer',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 10,
			),
		)
	)
);



/**
 * Fonts.
 */
$wp_customize->add_setting( 'title-footer_fonts', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-footer_fonts', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Footer: Fonts', 'ava' ),
			'section' => 'ava__style-footer',
		)
	)
);

$wp_customize->add_setting(
	'footer_font', array(
		'default'           => ava_defaults( 'footer_font' ),
		'sanitize_callback' => 'ava_sanitize_nohtml',
	)
);

$wp_customize->add_control(
	'footer_font', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Font', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-footer',
		'choices'     => ava_get_fonts(),
	)
);

$wp_customize->add_setting(
	'footer_font_style', array(
		'default'           => ava_defaults( 'footer_font_style' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_nohtml',
	)
);

$wp_customize->add_control(
	'footer_font_style', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Style', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-footer',
		'choices'     => array(
			'normal' => esc_html__( 'Normal', 'ava' ),
			'italic' => esc_html__( 'Italic', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'footer_font_weight', array(
		'default'           => ava_defaults( 'footer_font_weight' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'footer_font_weight', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Weight', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-footer',
		'choices'     => array(
			'normal' => esc_html__( 'Normal', 'ava' ),
			'bold'   => esc_html__( 'Bold', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'footer_font_transform', array(
		'default'           => ava_defaults( 'footer_font_transform' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'footer_font_transform', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Transform', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-footer',
		'choices'     => array(
			'none'      => esc_html__( 'Normal', 'ava' ),
			'lowercase' => esc_html__( 'Lowercase', 'ava' ),
			'uppercase' => esc_html__( 'Uppercase', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'footer_font_size', array(
		'default'           => ava_defaults( 'footer_font_size' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'footer_font_size', array(
			'default'     => ava_defaults( 'footer_font_size' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Size', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-footer',
			'input_attrs' => array(
				'min'  => 9,
				'max'  => 30,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'footer_font_lineheight', array(
		'default'           => ava_defaults( 'footer_font_lineheight' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'footer_font_lineheight', array(
			'default'     => ava_defaults( 'footer_font_lineheight' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Line Height', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-footer',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 30,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'footer_font_letterspacing', array(
		'default'           => ava_defaults( 'footer_font_letterspacing' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_number_intval',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'footer_font_letterspacing', array(
			'default'     => ava_defaults( 'footer_font_letterspacing' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Letter Spacing', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-footer',
			'input_attrs' => array(
				'min'  => -5,
				'max'  => 20,
				'step' => 1,
			),
		)
	)
);
