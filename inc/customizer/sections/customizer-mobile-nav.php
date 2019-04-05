<?php
/**
 * Mobile Menu Customizer Section
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Add Section.
 */
$wp_customize->add_section(
	'ava__style-mobilenav', array(
		'title' => esc_html__( 'Mobile Menu', 'ava' ),
		'panel' => 'ava__style-editor',
	)
);

/**
 * Settings and Controls.
 */
$wp_customize->add_setting( 'title-mobilenav', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-mobilenav', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Mobile Menu', 'ava' ),
			'section' => 'ava__style-mobilenav',
		)
	)
);

$wp_customize->add_setting(
	'mobilenav_background_color', array(
		'default'           => ava_defaults( 'mobilenav_background_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'mobilenav_background_color', array(
			'label'   => esc_html__( 'Background', 'ava' ),
			'section' => 'ava__style-mobilenav',
		)
	)
);

$wp_customize->add_setting(
	'mobilenav_text_color', array(
		'default'           => ava_defaults( 'mobilenav_text_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'mobilenav_text_color', array(
			'label'   => esc_html__( 'Color', 'ava' ),
			'section' => 'ava__style-mobilenav',
		)
	)
);


/**
 * Close Icon.
 */

$wp_customize->add_setting( 'title-mobilenav_close_icon', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-mobilenav_close_icon', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Mobile Menu: Close Icon', 'ava' ),
			'section' => 'ava__style-mobilenav',
		)
	)
);

$wp_customize->add_setting(
	'mobilenav_close_background_color', array(
		'default'           => ava_defaults( 'mobilenav_close_background_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'mobilenav_close_background_color', array(
			'label'   => esc_html__( 'Background', 'ava' ),
			'section' => 'ava__style-mobilenav',
		)
	)
);

$wp_customize->add_setting(
	'mobilenav_close_color', array(
		'default'           => ava_defaults( 'mobilenav_close_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'mobilenav_close_color', array(
			'label'   => esc_html__( 'Color', 'ava' ),
			'section' => 'ava__style-mobilenav',
		)
	)
);



/**
 * Social.
 */

$wp_customize->add_setting( 'title-mobilenav_social', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-mobilenav_social', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Mobile Menu: Social', 'ava' ),
			'section' => 'ava__style-mobilenav',
		)
	)
);

$wp_customize->add_setting(
	'mobilenav_social_size', array(
		'default'           => ava_defaults( 'mobilenav_social_size' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'mobilenav_social_size', array(
			'default'     => ava_defaults( 'mobilenav_social_size' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Icon Size', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-mobilenav',
			'input_attrs' => array(
				'min'  => 10,
				'max'  => 60,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'mobilenav_social_spacing', array(
		'default'           => ava_defaults( 'mobilenav_social_spacing' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'mobilenav_social_spacing', array(
			'default'     => ava_defaults( 'mobilenav_social_spacing' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Spacing', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-mobilenav',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 20,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'mobilenav_social_color', array(
		'default'           => ava_defaults( 'mobilenav_social_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'mobilenav_social_color', array(
			'label'   => esc_html__( 'Color', 'ava' ),
			'section' => 'ava__style-mobilenav',
		)
	)
);
