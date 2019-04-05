<?php
/**
 * Colophon Customizer Section
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Add Section.
 */
$wp_customize->add_section(
	'ava__style-colophon', array(
		'title' => esc_html__( 'Colophon', 'ava' ),
		'panel' => 'ava__style-editor',
	)
);

/**
 * Settings and Controls.
 */
$wp_customize->add_setting( 'title-colophon', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-colophon', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Colophon', 'ava' ),
			'section' => 'ava__style-colophon',
		)
	)
);

$wp_customize->add_setting(
	'colophon', array(
		'default'           => ava_defaults( 'colophon' ),
		'sanitize_callback' => 'ava_sanitize_select',
		'transport'         => 'postMessage',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Layout_Control(
		$wp_customize, 'colophon', array(
			'type'    => 'themebeans-layout',
			'section' => 'ava__style-colophon',
			'choices' => ava_get_choices( ava_get_colophon_layouts() ),
		)
	)
);

$wp_customize->add_setting(
	'colophon_active', array(
		'default'           => ava_defaults( 'colophon_active' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Toggle_Control(
		$wp_customize, 'colophon_active', array(
			'label'    => esc_html__( 'Activate', 'ava' ),
			'section'  => 'ava__style-colophon',
			'type'     => 'themebeans-toggle',
			'settings' => 'colophon_active',
		)
	)
);

$wp_customize->add_setting(
	'colophon_padding_top', array(
		'default'           => ava_defaults( 'colophon_padding_top' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'colophon_padding_top', array(
			'default'     => ava_defaults( 'colophon_padding_top' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Top Padding', 'ava' ),
			'description' => 'vw',
			'section'     => 'ava__style-colophon',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 50,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'colophon_padding_bottom', array(
		'default'           => ava_defaults( 'colophon_padding_bottom' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'colophon_padding_bottom', array(
			'default'     => ava_defaults( 'colophon_padding_bottom' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Bottom Padding', 'ava' ),
			'description' => 'vw',
			'section'     => 'ava__style-colophon',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 50,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'colophon_max_width', array(
		'default'           => ava_defaults( 'colophon_max_width' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'colophon_max_width', array(
			'default'     => ava_defaults( 'colophon_max_width' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Max Width', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-colophon',
			'input_attrs' => array(
				'min'  => 600,
				'max'  => 2800,
				'step' => 10,
			),
		)
	)
);

$wp_customize->add_setting(
	'colophon_background_color', array(
		'default'           => ava_defaults( 'colophon_background_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'colophon_background_color', array(
			'label'   => esc_html__( 'Background', 'ava' ),
			'section' => 'ava__style-colophon',
		)
	)
);

$wp_customize->add_setting(
	'colophon_text_color', array(
		'default'           => ava_defaults( 'colophon_text_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'colophon_text_color', array(
			'label'   => esc_html__( 'Color', 'ava' ),
			'section' => 'ava__style-colophon',
		)
	)
);



/**
 * Mobile.
 */
$wp_customize->add_setting( 'title-colophon_mobile', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-colophon_mobile', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Colophon: Mobile', 'ava' ),
			'section' => 'ava__style-colophon',
		)
	)
);

$wp_customize->add_setting(
	'colophon_mobile_padding_top', array(
		'default'           => ava_defaults( 'colophon_mobile_padding_top' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'colophon_mobile_padding_top', array(
			'default'     => ava_defaults( 'colophon_mobile_padding_top' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Top Padding', 'ava' ),
			'description' => 'vw',
			'section'     => 'ava__style-colophon',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 50,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'colophon_mobile_padding_bottom', array(
		'default'           => ava_defaults( 'colophon_mobile_padding_bottom' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'colophon_mobile_padding_bottom', array(
			'default'     => ava_defaults( 'colophon_mobile_padding_bottom' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Bottom Padding', 'ava' ),
			'description' => 'vw',
			'section'     => 'ava__style-colophon',
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
$wp_customize->add_setting( 'title-colophon_large', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-colophon_large', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Colophon: Large', 'ava' ),
			'section' => 'ava__style-colophon',
		)
	)
);

$wp_customize->add_setting(
	'colophon_large_padding_top', array(
		'default'           => ava_defaults( 'colophon_large_padding_top' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'colophon_large_padding_top', array(
			'default'     => ava_defaults( 'colophon_large_padding_top' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Top Padding', 'ava' ),
			'description' => 'vw',
			'section'     => 'ava__style-colophon',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 10,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'colophon_large_padding_bottom', array(
		'default'           => ava_defaults( 'colophon_large_padding_bottom' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'colophon_large_padding_bottom', array(
			'default'     => ava_defaults( 'colophon_large_padding_bottom' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Bottom Padding', 'ava' ),
			'description' => 'vw',
			'section'     => 'ava__style-colophon',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 10,
				'step' => 1,
			),
		)
	)
);



/**
 * Info.
 */
$wp_customize->add_setting( 'title-colophon_copyright', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-colophon_copyright', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Colophon: Info', 'ava' ),
			'section' => 'ava__style-colophon',
		)
	)
);

$wp_customize->add_setting(
	'colophon_copyright', array(
		'default'           => ava_defaults( 'colophon_copyright' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Toggle_Control(
		$wp_customize, 'colophon_copyright', array(
			'label'    => esc_html__( 'Copyright Year', 'ava' ),
			'section'  => 'ava__style-colophon',
			'type'     => 'themebeans-toggle',
			'settings' => 'colophon_copyright',
		)
	)
);

$wp_customize->add_setting(
	'colophon_theme_info', array(
		'default'           => ava_defaults( 'colophon_theme_info' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Toggle_Control(
		$wp_customize, 'colophon_theme_info', array(
			'label'    => esc_html__( 'WordPress Theme Info', 'ava' ),
			'section'  => 'ava__style-colophon',
			'type'     => 'themebeans-toggle',
			'settings' => 'colophon_theme_info',
		)
	)
);

$wp_customize->add_setting(
	'colophon_copyright_padding_side', array(
		'default'           => ava_defaults( 'colophon_copyright_padding_side' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'colophon_copyright_padding_side', array(
			'default'     => ava_defaults( 'colophon_copyright_padding_side' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Spacing', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-colophon',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'colophon_copyright_text', array(
		'default'           => ava_defaults( 'colophon_copyright_text' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_html',
	)
);

$wp_customize->add_control(
	'colophon_copyright_text', array(
		'type'        => 'textarea',
		'label'       => esc_html__( 'Copyright Text', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-colophon',
	)
);



/**
 * Social.
 */
$wp_customize->add_setting( 'title-colophon_social', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-colophon_social', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Colophon: Social', 'ava' ),
			'section' => 'ava__style-colophon',
		)
	)
);

$wp_customize->add_setting(
	'colophon_social_size', array(
		'default'           => ava_defaults( 'colophon_social_size' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'colophon_social_size', array(
			'default'     => ava_defaults( 'colophon_social_size' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Icon Size', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-colophon',
			'input_attrs' => array(
				'min'  => 10,
				'max'  => 60,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'colophon_social_spacing', array(
		'default'           => ava_defaults( 'colophon_social_spacing' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'colophon_social_spacing', array(
			'default'     => ava_defaults( 'colophon_social_spacing' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Spacing', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-colophon',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 20,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'colophon_social_color', array(
		'default'           => ava_defaults( 'colophon_social_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'colophon_social_color', array(
			'label'   => esc_html__( 'Color', 'ava' ),
			'section' => 'ava__style-colophon',
		)
	)
);



/**
 * Menu.
 */
$wp_customize->add_setting( 'title-colophon_menu', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-colophon_menu', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Colophon: Menu', 'ava' ),
			'section' => 'ava__style-colophon',
		)
	)
);

$wp_customize->add_setting(
	'colophon_menu', array(
		'default'           => ava_defaults( 'colophon_menu' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Toggle_Control(
		$wp_customize, 'colophon_menu', array(
			'label'    => esc_html__( 'Activate', 'ava' ),
			'section'  => 'ava__style-colophon',
			'type'     => 'themebeans-toggle',
			'settings' => 'colophon_menu',
		)
	)
);

$wp_customize->add_setting(
	'colophon_menu_font', array(
		'default'           => ava_defaults( 'colophon_menu_font' ),
		'sanitize_callback' => 'ava_sanitize_nohtml',
	)
);

$wp_customize->add_control(
	'colophon_menu_font', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Font', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-colophon',
		'choices'     => ava_get_fonts(),
	)
);

$wp_customize->add_setting(
	'colophon_menu_font_style', array(
		'default'           => ava_defaults( 'colophon_font_style' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_nohtml',
	)
);

$wp_customize->add_control(
	'colophon_menu_font_style', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Style', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-colophon',
		'choices'     => array(
			'normal' => esc_html__( 'Normal', 'ava' ),
			'italic' => esc_html__( 'Italic', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'colophon_menu_font_weight', array(
		'default'           => ava_defaults( 'colophon_menu_font_weight' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'colophon_menu_font_weight', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Weight', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-colophon',
		'choices'     => array(
			'normal' => esc_html__( 'Normal', 'ava' ),
			'bold'   => esc_html__( 'Bold', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'colophon_menu_font_transform', array(
		'default'           => ava_defaults( 'colophon_menu_font_transform' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'colophon_menu_font_transform', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Transform', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-colophon',
		'choices'     => array(
			'none'      => esc_html__( 'Normal', 'ava' ),
			'lowercase' => esc_html__( 'Lowercase', 'ava' ),
			'uppercase' => esc_html__( 'Uppercase', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'colophon_menu_font_size', array(
		'default'           => ava_defaults( 'colophon_menu_font_size' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'colophon_menu_font_size', array(
			'default'     => ava_defaults( 'colophon_menu_font_size' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Size', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-colophon',
			'input_attrs' => array(
				'min'  => 9,
				'max'  => 30,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'colophon_menu_font_letterspacing', array(
		'default'           => ava_defaults( 'colophon_menu_font_letterspacing' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_number_intval',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'colophon_menu_font_letterspacing', array(
			'default'     => ava_defaults( 'colophon_menu_font_letterspacing' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Letter Spacing', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-colophon',
			'input_attrs' => array(
				'min'  => -5,
				'max'  => 20,
				'step' => 1,
			),
		)
	)
);



/**
 * Fonts.
 */
$wp_customize->add_setting( 'title-colophon_fonts', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-colophon_fonts', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Colophon: Fonts', 'ava' ),
			'section' => 'ava__style-colophon',
		)
	)
);

$wp_customize->add_setting(
	'colophon_font', array(
		'default'           => ava_defaults( 'colophon_font' ),
		'sanitize_callback' => 'ava_sanitize_nohtml',
	)
);

$wp_customize->add_control(
	'colophon_font', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Font', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-colophon',
		'choices'     => ava_get_fonts(),
	)
);

$wp_customize->add_setting(
	'colophon_font_style', array(
		'default'           => ava_defaults( 'colophon_font_style' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_nohtml',
	)
);

$wp_customize->add_control(
	'colophon_font_style', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Style', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-colophon',
		'choices'     => array(
			'normal' => esc_html__( 'Normal', 'ava' ),
			'italic' => esc_html__( 'Italic', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'colophon_font_weight', array(
		'default'           => ava_defaults( 'colophon_font_weight' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'colophon_font_weight', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Weight', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-colophon',
		'choices'     => array(
			'normal' => esc_html__( 'Normal', 'ava' ),
			'bold'   => esc_html__( 'Bold', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'colophon_font_transform', array(
		'default'           => ava_defaults( 'colophon_font_transform' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'colophon_font_transform', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Transform', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-colophon',
		'choices'     => array(
			'none'      => esc_html__( 'Normal', 'ava' ),
			'lowercase' => esc_html__( 'Lowercase', 'ava' ),
			'uppercase' => esc_html__( 'Uppercase', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'colophon_font_size', array(
		'default'           => ava_defaults( 'colophon_font_size' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'colophon_font_size', array(
			'default'     => ava_defaults( 'colophon_font_size' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Size', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-colophon',
			'input_attrs' => array(
				'min'  => 9,
				'max'  => 30,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'colophon_font_lineheight', array(
		'default'           => ava_defaults( 'colophon_font_lineheight' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'colophon_font_lineheight', array(
			'default'     => ava_defaults( 'colophon_font_lineheight' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Line Height', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-colophon',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 30,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'colophon_font_letterspacing', array(
		'default'           => ava_defaults( 'colophon_font_letterspacing' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_number_intval',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'colophon_font_letterspacing', array(
			'default'     => ava_defaults( 'colophon_font_letterspacing' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Letter Spacing', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-colophon',
			'input_attrs' => array(
				'min'  => -5,
				'max'  => 20,
				'step' => 1,
			),
		)
	)
);
