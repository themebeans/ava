<?php
/**
 * Identity Customizer Section
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Light Site Logo.
 */
$wp_customize->add_setting(
	'light_site_logo', array(
		'sanitize_callback' => 'ava_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize, 'light_site_logo', array(
			'label'    => esc_html__( 'Light Logo', 'ava' ),
			'section'  => 'title_tagline',
			'settings' => 'light_site_logo',
			'priority' => 9,
		)
	)
);

/**
 * Retina Logo.
 */
$wp_customize->add_setting( 'title-logo_max_width', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-logo_max_width', array(
			'type'     => 'themebeans-title',
			'label'    => esc_html__( 'Logo: Size', 'ava' ),
			'section'  => 'title_tagline',
			'priority' => 9,
		)
	)
);

$wp_customize->add_setting(
	'custom_logo_max_width', array(
		'default'           => ava_defaults( 'custom_logo_max_width' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'custom_logo_max_width', array(
			'default'     => ava_defaults( 'custom_logo_max_width' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Max Width', 'ava' ),
			'description' => 'px',
			'section'     => 'title_tagline',
			'priority'    => 9,
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 300,
				'step' => 2,
			),
		)
	)
);

$wp_customize->add_setting(
	'custom_logo_mobile_max_width', array(
		'default'           => ava_defaults( 'custom_logo_mobile_max_width' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'custom_logo_mobile_max_width', array(
			'default'     => ava_defaults( 'custom_logo_mobile_max_width' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Mobile Max Width', 'ava' ),
			'description' => 'px',
			'section'     => 'title_tagline',
			'priority'    => 9,
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 200,
				'step' => 2,
			),
		)
	)
);
