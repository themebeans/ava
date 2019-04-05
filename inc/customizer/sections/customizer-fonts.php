<?php
/**
 * Fonts Customizer Section
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Add Section.
 */
$wp_customize->add_section(
	'ava__style-fonts', array(
		'title' => esc_html__( 'Fonts', 'ava' ),
		'panel' => 'ava__style-editor',
	)
);



/**
 * Typekit.
 */
$wp_customize->add_setting( 'title-typekit', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-typekit', array(
			'type'        => 'themebeans-title',
			'label'       => esc_html__( 'Fonts', 'ava' ),
			'description' => esc_html__( 'Located within your kit embed code. Font changes can be added to the CSS module or child theme.', 'ava' ),
			'section'     => 'ava__style-fonts',
		)
	)
);
$wp_customize->add_setting(
	'typekit_id', array(
		'default'           => ava_defaults( 'typekit_id' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_html',
	)
);

$wp_customize->add_control(
	'typekit_id', array(
		'type'        => 'text',
		'label'       => esc_html__( 'Typekit Kit ID', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-fonts',
	)
);

$wp_customize->add_setting(
	'typekit_font_1', array(
		'default'           => ava_defaults( 'typekit_font_1' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_html',
	)
);

$wp_customize->add_control(
	'typekit_font_1', array(
		'type'        => 'text',
		'label'       => esc_html__( 'Font #1', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-fonts',
	)
);

$wp_customize->add_setting(
	'typekit_font_2', array(
		'default'           => ava_defaults( 'typekit_font_2' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_html',
	)
);

$wp_customize->add_control(
	'typekit_font_2', array(
		'type'        => 'text',
		'label'       => esc_html__( 'Font #2', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-fonts',
	)
);



/**
 * Fonts.
 */

$wp_customize->add_setting( 'title-global_header_fonts', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-global_header_fonts', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Fonts: Global Headers', 'ava' ),
			'section' => 'ava__style-fonts',
		)
	)
);

$wp_customize->add_setting(
	'global_header_font', array(
		'default'           => ava_defaults( 'global_header_font' ),
		'sanitize_callback' => 'ava_sanitize_nohtml',
	)
);

$wp_customize->add_control(
	'global_header_font', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Font', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-fonts',
		'choices'     => ava_get_fonts(),
	)
);

$wp_customize->add_setting(
	'global_header_font_style', array(
		'default'           => ava_defaults( 'global_header_font_style' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'global_header_font_style', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Style', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-fonts',
		'choices'     => array(
			'normal' => esc_html__( 'Normal', 'ava' ),
			'italic' => esc_html__( 'Italic', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'global_header_font_weight', array(
		'default'           => ava_defaults( 'global_header_font_weight' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'global_header_font_weight', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Weight', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-fonts',
		'choices'     => array(
			'normal' => esc_html__( 'Normal', 'ava' ),
			'bold'   => esc_html__( 'Bold', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'global_header_font_transform', array(
		'default'           => ava_defaults( 'global_header_font_transform' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'global_header_font_transform', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Transform', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-fonts',
		'choices'     => array(
			'none'      => esc_html__( 'Normal', 'ava' ),
			'lowercase' => esc_html__( 'Lowercase', 'ava' ),
			'uppercase' => esc_html__( 'Uppercase', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'global_header_font_letterspacing', array(
		'default'           => ava_defaults( 'global_header_font_letterspacing' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_number_intval',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'global_header_font_letterspacing', array(
			'default'     => ava_defaults( 'global_header_font_letterspacing' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Letter Spacing', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-fonts',
			'input_attrs' => array(
				'min'  => -5,
				'max'  => 20,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'global_header_color', array(
		'default'           => ava_defaults( 'global_header_color' ),
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'global_header_color', array(
			'label'   => esc_html__( 'Color', 'ava' ),
			'section' => 'ava__style-fonts',
		)
	)
);



/**
 * Body Fonts.
 */
$wp_customize->add_setting( 'title-global_body_fonts', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-global_body_fonts', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Fonts: Global Body', 'ava' ),
			'section' => 'ava__style-fonts',
		)
	)
);

$wp_customize->add_setting(
	'global_body_font', array(
		'default'           => ava_defaults( 'global_body_font' ),
		'sanitize_callback' => 'ava_sanitize_nohtml',
	)
);

$wp_customize->add_control(
	'global_body_font', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Font', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-fonts',
		'choices'     => ava_get_fonts(),
	)
);

$wp_customize->add_setting(
	'global_body_font_style', array(
		'default'           => ava_defaults( 'global_body_font_style' ),
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'global_body_font_style', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Style', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-fonts',
		'choices'     => array(
			'normal' => esc_html__( 'Normal', 'ava' ),
			'italic' => esc_html__( 'Italic', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'global_body_font_weight', array(
		'default'           => ava_defaults( 'global_body_font_weight' ),
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'global_body_font_weight', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Weight', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-fonts',
		'choices'     => array(
			'normal' => esc_html__( 'Normal', 'ava' ),
			'bold'   => esc_html__( 'Bold', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'global_body_font_transform', array(
		'default'           => ava_defaults( 'global_body_font_transform' ),
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'global_body_font_transform', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Transform', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-fonts',
		'choices'     => array(
			'none'      => esc_html__( 'Normal', 'ava' ),
			'lowercase' => esc_html__( 'Lowercase', 'ava' ),
			'uppercase' => esc_html__( 'Uppercase', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'global_body_font_size', array(
		'default'           => ava_defaults( 'global_body_font_size' ),
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'global_body_font_size', array(
			'default'     => ava_defaults( 'global_body_font_size' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Size', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-fonts',
			'input_attrs' => array(
				'min'  => 9,
				'max'  => 30,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'global_body_font_lineheight', array(
		'default'           => ava_defaults( 'global_body_font_lineheight' ),
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'global_body_font_lineheight', array(
			'default'     => ava_defaults( 'global_body_font_lineheight' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Line Height', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-fonts',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 40,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'global_body_font_letterspacing', array(
		'default'           => ava_defaults( 'global_body_font_letterspacing' ),
		'sanitize_callback' => 'ava_sanitize_number_intval',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'global_body_font_letterspacing', array(
			'default'     => ava_defaults( 'global_body_font_letterspacing' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Letter Spacing', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-fonts',
			'input_attrs' => array(
				'min'  => -5,
				'max'  => 20,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'global_body_color', array(
		'default'           => ava_defaults( 'global_body_color' ),
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'global_body_color', array(
			'label'   => esc_html__( 'Color', 'ava' ),
			'section' => 'ava__style-fonts',
		)
	)
);
