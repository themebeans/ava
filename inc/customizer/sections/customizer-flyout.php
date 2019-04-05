<?php
/**
 * Flyout Customizer Section
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Add Section.
 */
$wp_customize->add_section(
	'ava__style-flyout', array(
		'title' => esc_html__( 'Flyout', 'ava' ),
		'panel' => 'ava__style-editor',
	)
);

/**
 * Settings and Controls.
 */
$wp_customize->add_setting( 'title-flyout', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-flyout', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Flyout', 'ava' ),
			'section' => 'ava__style-flyout',
		)
	)
);

$wp_customize->add_setting(
	'flyout', array(
		'default'           => ava_defaults( 'flyout' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Toggle_Control(
		$wp_customize, 'flyout', array(
			'label'    => esc_html__( 'Activate', 'ava' ),
			'section'  => 'ava__style-flyout',
			'type'     => 'themebeans-toggle',
			'settings' => 'flyout',
		)
	)
);

$wp_customize->add_setting(
	'flyout_position', array(
		'default'           => ava_defaults( 'flyout_position' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'flyout_position', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Position', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-flyout',
		'choices'     => array(
			'sidebar--left'  => esc_html__( 'Left', 'ava' ),
			'sidebar--right' => esc_html__( 'Right', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'flyout_background_color', array(
		'default'           => ava_defaults( 'flyout_background_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'flyout_background_color', array(
			'label'   => esc_html__( 'Background', 'ava' ),
			'section' => 'ava__style-flyout',
		)
	)
);

$wp_customize->add_setting(
	'flyout_text_color', array(
		'default'           => ava_defaults( 'flyout_text_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'flyout_text_color', array(
			'label'   => esc_html__( 'Color', 'ava' ),
			'section' => 'ava__style-flyout',
		)
	)
);



/**
 * Overlay.
 */
$wp_customize->add_setting( 'title-flyout_overlay', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-flyout_overlay', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Overlay', 'ava' ),
			'section' => 'ava__style-flyout',
		)
	)
);

$wp_customize->add_setting(
	'flyout_overlay_background_color', array(
		'default'           => ava_defaults( 'flyout_overlay_background_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'flyout_overlay_background_color', array(
			'label'   => esc_html__( 'Background', 'ava' ),
			'section' => 'ava__style-flyout',
		)
	)
);

$wp_customize->add_setting(
	'flyout_overlay_opacity', array(
		'default'           => ava_defaults( 'flyout_overlay_opacity' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'flyout_overlay_opacity', array(
			'default'     => ava_defaults( 'flyout_overlay_opacity' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Opacity', 'ava' ),
			'description' => '%',
			'section'     => 'ava__style-flyout',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 5,
			),
		)
	)
);












