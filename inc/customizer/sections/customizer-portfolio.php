<?php
/**
 * Portfolio Customizer Section
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Add Section.
 */
$wp_customize->add_section(
	'ava__style-portfolio', array(
		'title' => esc_html__( 'Portfolio', 'ava' ),
		'panel' => 'ava__style-editor',
	)
);

$wp_customize->add_setting(
	'portfolio_single_navigation', array(
		'default'           => ava_defaults( 'portfolio_single_navigation' ),
		'sanitize_callback' => 'ava_sanitize_number_intval',
		'transport'         => 'postMessage',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Toggle_Control(
		$wp_customize, 'portfolio_single_navigation', array(
			'label'    => esc_html__( 'Portfolio Navigation', 'ava' ),
			'section'  => 'ava__style-portfolio',
			'type'     => 'themebeans-toggle',
			'settings' => 'portfolio_single_navigation',
		)
	)
);

$wp_customize->add_setting(
	'portfolio_archive_overlay', array(
		'default'           => ava_defaults( 'portfolio_archive_overlay' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'portfolio_archive_overlay', array(
			'label'   => esc_html__( 'Archive Overlay', 'ava' ),
			'section' => 'ava__style-portfolio',
		)
	)
);

$wp_customize->add_setting(
	'portfolio_archive_overlay_text', array(
		'default'           => ava_defaults( 'portfolio_archive_overlay_text' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'portfolio_archive_overlay_text', array(
			'label'   => esc_html__( 'Archive Overlay Text', 'ava' ),
			'section' => 'ava__style-portfolio',
		)
	)
);

