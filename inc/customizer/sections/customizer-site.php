<?php
/**
 * Site Customizer Section
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Add Section.
 */
$wp_customize->add_section(
	'ava__style-site', array(
		'title' => esc_html__( 'Site', 'ava' ),
		'panel' => 'ava__style-editor',
	)
);



/**
 * Settings and Controls.
 */
$wp_customize->add_setting( 'title-site_content', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-site_content', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Site', 'ava' ),
			'section' => 'ava__style-site',
		)
	)
);

$wp_customize->add_setting(
	'site_content_padding_top', array(
		'default'           => ava_defaults( 'site_content_padding_top' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'site_content_padding_top', array(
			'default'     => ava_defaults( 'site_content_padding_top' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Top Padding', 'ava' ),
			'description' => 'vw',
			'section'     => 'ava__style-site',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 50,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'site_content_padding_bottom', array(
		'default'           => ava_defaults( 'site_content_padding_bottom' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'site_content_padding_bottom', array(
			'default'     => ava_defaults( 'site_content_padding_bottom' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Bottom Padding', 'ava' ),
			'description' => 'vw',
			'section'     => 'ava__style-site',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 50,
				'step' => 1,
			),
		)
	)
);

/**
 * Site: Mobile.
 */
$wp_customize->add_setting( 'title-site_content_mobile', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-site_content_mobile', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Site: Mobile', 'ava' ),
			'section' => 'ava__style-site',
		)
	)
);

$wp_customize->add_setting(
	'site_content_mobile_padding_top', array(
		'default'           => ava_defaults( 'site_content_mobile_padding_top' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'site_content_mobile_padding_top', array(
			'default'     => ava_defaults( 'site_content_mobile_padding_top' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Top Padding', 'ava' ),
			'description' => 'vw',
			'section'     => 'ava__style-site',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 200,
				'step' => 5,
			),
		)
	)
);

$wp_customize->add_setting(
	'site_content_mobile_padding_bottom', array(
		'default'           => ava_defaults( 'site_content_mobile_padding_bottom' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'site_content_mobile_padding_bottom', array(
			'default'     => ava_defaults( 'site_content_mobile_padding_bottom' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Bottom Padding', 'ava' ),
			'description' => 'vw',
			'section'     => 'ava__style-site',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 50,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'site_content_mobile_padding_side', array(
		'default'           => ava_defaults( 'site_content_mobile_padding_side' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'site_content_mobile_padding_side', array(
			'default'     => ava_defaults( 'site_content_mobile_padding_side' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Side Padding', 'ava' ),
			'description' => 'vw',
			'section'     => 'ava__style-site',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 20,
				'step' => .1,
			),
		)
	)
);



/**
 * Site Colors.
 */
$wp_customize->add_setting( 'title-site_colors', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-site_colors', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Site: Colors', 'ava' ),
			'section' => 'ava__style-site',
		)
	)
);

$wp_customize->add_setting(
	'site_html_background_color', array(
		'default'           => ava_defaults( 'site_html_background_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'site_html_background_color', array(
			'label'   => esc_html__( 'HTML Color', 'ava' ),
			'section' => 'ava__style-site',
		)
	)
);

$wp_customize->add_setting(
	'site_background_color', array(
		'default'           => ava_defaults( 'site_background_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'site_background_color', array(
			'label'   => esc_html__( 'Background', 'ava' ),
			'section' => 'ava__style-site',
		)
	)
);

$wp_customize->add_setting(
	'site_accent_color', array(
		'default'           => ava_defaults( 'site_accent_color' ),
		// 'transport'             => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'site_accent_color', array(
			'label'   => esc_html__( 'Global Accent', 'ava' ),
			'section' => 'ava__style-site',
		)
	)
);

$wp_customize->add_setting(
	'site_button_color', array(
		'default'           => ava_defaults( 'site_button_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'site_button_color', array(
			'label'   => esc_html__( 'Button', 'ava' ),
			'section' => 'ava__style-site',
		)
	)
);

$wp_customize->add_setting(
	'site_button_hover_color', array(
		'default'           => ava_defaults( 'site_button_hover_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'site_button_hover_color', array(
			'label'   => esc_html__( 'Button Hover', 'ava' ),
			'section' => 'ava__style-site',
		)
	)
);



/**
 * Site Border.
 */
$wp_customize->add_setting( 'title-site_border', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-site_border', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Site: Border', 'ava' ),
			'section' => 'ava__style-site',
		)
	)
);

$wp_customize->add_setting(
	'site_border', array(
		'default'           => ava_defaults( 'site_border' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Toggle_Control(
		$wp_customize, 'site_border', array(
			'label'    => esc_html__( 'Activate', 'ava' ),
			'section'  => 'ava__style-site',
			'type'     => 'themebeans-toggle',
			'settings' => 'site_border',
		)
	)
);

$wp_customize->add_setting(
	'site_border_width', array(
		'default'           => ava_defaults( 'site_border_width' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'site_border_width', array(
			'default'     => ava_defaults( 'site_border_width' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Width', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-site',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'site_mobile_border_width', array(
		'default'           => ava_defaults( 'site_mobile_border_width' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'site_mobile_border_width', array(
			'default'     => ava_defaults( 'site_mobile_border_width' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Mobile Width', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-site',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 50,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'site_border_color', array(
		'default'           => ava_defaults( 'site_border_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'site_border_color', array(
			'label'   => esc_html__( 'Color', 'ava' ),
			'section' => 'ava__style-site',
		)
	)
);
