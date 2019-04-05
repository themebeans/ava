<?php
/**
 * Top Header Customizer Section
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Add Section.
 */
$wp_customize->add_section(
	'ava__style-top-header', array(
		'title' => esc_html__( 'Top Header', 'ava' ),
		'panel' => 'ava__style-editor',
	)
);

/**
 * Settings and Controls.
 */
$wp_customize->add_setting( 'title-topheader', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-topheader', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Top Header', 'ava' ),
			'section' => 'ava__style-top-header',
		)
	)
);

$wp_customize->add_setting(
	'topheader', array(
		'default'           => ava_defaults( 'topheader' ),
		'sanitize_callback' => 'ava_sanitize_select',
		'transport'         => 'postMessage',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Layout_Control(
		$wp_customize, 'topheader', array(
			'type'    => 'themebeans-layout',
			'section' => 'ava__style-top-header',
			'choices' => ava_get_choices( ava_get_top_header_layouts() ),
		)
	)
);

$wp_customize->add_setting(
	'topheader_active', array(
		'default'           => ava_defaults( 'topheader_active' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Toggle_Control(
		$wp_customize, 'topheader_active', array(
			'label'    => esc_html__( 'Activate', 'ava' ),
			'section'  => 'ava__style-top-header',
			'type'     => 'themebeans-toggle',
			'settings' => 'topheader_active',
		)
	)
);

$wp_customize->add_setting(
	'topheader_padding_top', array(
		'default'           => ava_defaults( 'topheader_padding_top' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'topheader_padding_top', array(
			'default'     => ava_defaults( 'topheader_padding_top' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Top Padding', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-top-header',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'topheader_padding_bottom', array(
		'default'           => ava_defaults( 'topheader_padding_bottom' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'topheader_padding_bottom', array(
			'default'     => ava_defaults( 'topheader_padding_bottom' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Bottom Padding', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-top-header',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'topheader_padding_side', array(
		'default'           => ava_defaults( 'topheader_padding_side' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'topheader_padding_side', array(
			'default'     => ava_defaults( 'topheader_padding_side' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Side Padding', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-top-header',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'topheader_background_color', array(
		'default'           => ava_defaults( 'topheader_background_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'topheader_background_color', array(
			'label'   => esc_html__( 'Background', 'ava' ),
			'section' => 'ava__style-top-header',
		)
	)
);

$wp_customize->add_setting(
	'topheader_text_color', array(
		'default'           => ava_defaults( 'topheader_text_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'topheader_text_color', array(
			'label'   => esc_html__( 'Color', 'ava' ),
			'section' => 'ava__style-top-header',
		)
	)
);


/**
 * Text.
 */
$wp_customize->add_setting( 'title-topheader_text', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-topheader_text', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Top Header: Text', 'ava' ),
			'section' => 'ava__style-top-header',
		)
	)
);


$wp_customize->add_setting(
	'topheader_font', array(
		'default'           => ava_defaults( 'topheader_font' ),
		'sanitize_callback' => 'ava_sanitize_nohtml',
	)
);

$wp_customize->add_control(
	'topheader_font', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Font', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-top-header',
		'choices'     => ava_get_fonts(),
	)
);

$wp_customize->add_setting(
	'topheader_font_style', array(
		'default'           => ava_defaults( 'topheader_font_style' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_nohtml',
	)
);

$wp_customize->add_control(
	'topheader_font_style', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Style', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-top-header',
		'choices'     => array(
			'normal' => esc_html__( 'Normal', 'ava' ),
			'italic' => esc_html__( 'Italic', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'topheader_font_weight', array(
		'default'           => ava_defaults( 'topheader_font_weight' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'topheader_font_weight', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Weight', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-top-header',
		'choices'     => array(
			'normal' => esc_html__( 'Normal', 'ava' ),
			'bold'   => esc_html__( 'Bold', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'topheader_font_transform', array(
		'default'           => ava_defaults( 'topheader_font_transform' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'topheader_font_transform', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Transform', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-top-header',
		'choices'     => array(
			'none'      => esc_html__( 'Normal', 'ava' ),
			'lowercase' => esc_html__( 'Lowercase', 'ava' ),
			'uppercase' => esc_html__( 'Uppercase', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'topheader_font_size', array(
		'default'           => ava_defaults( 'topheader_font_size' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'topheader_font_size', array(
			'default'     => ava_defaults( 'topheader_font_size' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Size', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-top-header',
			'input_attrs' => array(
				'min'  => 9,
				'max'  => 20,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'topheader_font_letterspacing', array(
		'default'           => ava_defaults( 'topheader_font_letterspacing' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_number_intval',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'topheader_font_letterspacing', array(
			'default'     => ava_defaults( 'topheader_font_letterspacing' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Letter Spacing', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-top-header',
			'input_attrs' => array(
				'min'  => -5,
				'max'  => 20,
				'step' => 1,
			),
		)
	)
);




/**
 * Social.
 */
$wp_customize->add_setting( 'title-topheader_social', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-topheader_social', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Top Header: Social', 'ava' ),
			'section' => 'ava__style-top-header',
		)
	)
);

$wp_customize->add_setting(
	'topheader_social_size', array(
		'default'           => ava_defaults( 'topheader_social_size' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'topheader_social_size', array(
			'default'     => ava_defaults( 'topheader_social_size' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Icon Size', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-top-header',
			'input_attrs' => array(
				'min'  => 10,
				'max'  => 60,
				'step' => 2,
			),
		)
	)
);

$wp_customize->add_setting(
	'topheader_social_spacing', array(
		'default'           => ava_defaults( 'topheader_social_spacing' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'topheader_social_spacing', array(
			'default'     => ava_defaults( 'topheader_social_spacing' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Spacing', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-top-header',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 20,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'topheader_social_color', array(
		'default'           => ava_defaults( 'topheader_social_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'topheader_social_color', array(
			'label'   => esc_html__( 'Color', 'ava' ),
			'section' => 'ava__style-top-header',
		)
	)
);



/**
 * Search.
 */
$wp_customize->add_setting( 'title-topheader_search', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-topheader_search', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Top Header: Search', 'ava' ),
			'section' => 'ava__style-top-header',
		)
	)
);

$wp_customize->add_setting(
	'topheader_search', array(
		'default'           => ava_defaults( 'topheader_search' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Toggle_Control(
		$wp_customize, 'topheader_search', array(
			'label'    => esc_html__( 'Activate', 'ava' ),
			'section'  => 'ava__style-top-header',
			'type'     => 'themebeans-toggle',
			'settings' => 'topheader_search',
		)
	)
);

$wp_customize->add_setting(
	'topheader_search_size', array(
		'default'           => ava_defaults( 'topheader_search_size' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'topheader_search_size', array(
			'default'     => ava_defaults( 'topheader_search_size' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Icon Size', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-top-header',
			'input_attrs' => array(
				'min'  => 5,
				'max'  => 50,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'topheader_search_padding', array(
		'default'           => ava_defaults( 'topheader_search_padding' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'topheader_search_padding', array(
			'default'     => ava_defaults( 'topheader_search_padding' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Side Padding', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-top-header',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'topheader_search_margin', array(
		'default'           => ava_defaults( 'topheader_search_margin' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'topheader_search_margin', array(
			'default'     => ava_defaults( 'topheader_search_margin' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Side Margin', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-top-header',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'topheader_search_color', array(
		'default'           => ava_defaults( 'topheader_search_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'topheader_search_color', array(
			'label'   => esc_html__( 'Color', 'ava' ),
			'section' => 'ava__style-top-header',
		)
	)
);
