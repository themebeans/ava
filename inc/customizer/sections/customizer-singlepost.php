<?php
/**
 * Single Post Customizer Section
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Add Section.
 */
$wp_customize->add_section(
	'ava__style-singlepost', array(
		'title' => esc_html__( 'Single Post', 'ava' ),
		'panel' => 'ava__style-editor',
	)
);



/**
 * Settings and Controls.
 */
$wp_customize->add_setting( 'title-single_post_header', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-single_post_header', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Post: Header', 'ava' ),
			'section' => 'ava__style-singlepost',
		)
	)
);

$wp_customize->add_setting(
	'singlepost_header_padding_top', array(
		'default'           => ava_defaults( 'singlepost_header_padding_top' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'singlepost_header_padding_top', array(
			'default'     => ava_defaults( 'singlepost_header_padding_top' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Top Margin', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-singlepost',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 200,
				'step' => 2,
			),
		)
	)
);

$wp_customize->add_setting(
	'singlepost_header_padding_bottom', array(
		'default'           => ava_defaults( 'singlepost_header_padding_bottom' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'singlepost_header_padding_bottom', array(
			'default'     => ava_defaults( 'singlepost_header_padding_bottom' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Bottom Margin', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-singlepost',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 200,
				'step' => 2,
			),
		)
	)
);



/**
 * Header, Mobile.
 */
$wp_customize->add_setting( 'title-single_post_header_mobile', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-single_post_header_mobile', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Post: Header Mobile', 'ava' ),
			'section' => 'ava__style-singlepost',
		)
	)
);

$wp_customize->add_setting(
	'singlepost_header_mobile_padding_top', array(
		'default'           => ava_defaults( 'singlepost_header_mobile_padding_top' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'singlepost_header_mobile_padding_top', array(
			'default'     => ava_defaults( 'singlepost_header_mobile_padding_top' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Top Margin', 'ava' ),
			'description' => 'vw',
			'section'     => 'ava__style-singlepost',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 50,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'singlepost_header_mobile_padding_bottom', array(
		'default'           => ava_defaults( 'singlepost_header_mobile_padding_bottom' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'singlepost_header_mobile_padding_bottom', array(
			'default'     => ava_defaults( 'singlepost_header_mobile_padding_bottom' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Bottom Margin', 'ava' ),
			'description' => 'vw',
			'section'     => 'ava__style-singlepost',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 300,
				'step' => 5,
			),
		)
	)
);



/**
 * Pinterest.
 */
$wp_customize->add_setting( 'title-singlepost_pinterest', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-singlepost_pinterest', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Blog: Pinterest', 'ava' ),
			'section' => 'ava__style-singlepost',
		)
	)
);

$wp_customize->add_setting(
	'singlepost_pinterest', array(
		'default'           => ava_defaults( 'singlepost_pinterest' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Toggle_Control(
		$wp_customize, 'singlepost_pinterest', array(
			'label'    => esc_html__( 'Activate', 'ava' ),
			'section'  => 'ava__style-singlepost',
			'type'     => 'themebeans-toggle',
			'settings' => 'singlepost_pinterest',
		)
	)
);

$wp_customize->add_setting(
	'singlepost_pinterest_position', array(
		'default'           => ava_defaults( 'singlepost_pinterest_position' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'singlepost_pinterest_position', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Position', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-singlepost',
		'choices'     => array(
			'top-left'     => esc_html__( 'Top Left', 'ava' ),
			'top-right'    => esc_html__( 'Top Right', 'ava' ),
			'bottom-left'  => esc_html__( 'Bottom Left', 'ava' ),
			'bottom-right' => esc_html__( 'Bottom Right', 'ava' ),
		),
	)
);



/**
 * Author Biography.
 */
$wp_customize->add_setting( 'title-single_post_bio', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-single_post_bio', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Post: Biography', 'ava' ),
			'section' => 'ava__style-singlepost',
		)
	)
);

$wp_customize->add_setting(
	'singlepost_bio', array(
		'default'           => ava_defaults( 'singlepost_bio' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Toggle_Control(
		$wp_customize, 'singlepost_bio', array(
			'label'    => esc_html__( 'Activate', 'ava' ),
			'section'  => 'ava__style-singlepost',
			'type'     => 'themebeans-toggle',
			'settings' => 'singlepost_bio',
		)
	)
);

$wp_customize->add_setting(
	'singlepost_bio_avatar_size', array(
		'default'           => ava_defaults( 'singlepost_bio_avatar_size' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'singlepost_bio_avatar_size', array(
			'default'     => ava_defaults( 'singlepost_bio_avatar_size' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Avatar Size', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-singlepost',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 200,
				'step' => 2,
			),
		)
	)
);

$wp_customize->add_setting(
	'singlepost_bio_text_color', array(
		'default'           => ava_defaults( 'singlepost_bio_text_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'singlepost_bio_text_color', array(
			'label'   => esc_html__( 'Text', 'ava' ),
			'section' => 'ava__style-singlepost',
		)
	)
);

$wp_customize->add_setting(
	'singlepost_bio_header_color', array(
		'default'           => ava_defaults( 'singlepost_bio_header_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'singlepost_bio_header_color', array(
			'label'   => esc_html__( 'Header', 'ava' ),
			'section' => 'ava__style-singlepost',
		)
	)
);

$wp_customize->add_setting(
	'singlepost_bio_background_color', array(
		'default'           => ava_defaults( 'singlepost_bio_background_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'singlepost_bio_background_color', array(
			'label'   => esc_html__( 'Background', 'ava' ),
			'section' => 'ava__style-singlepost',
		)
	)
);
