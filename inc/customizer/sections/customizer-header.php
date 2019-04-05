<?php
/**
 * Header Customizer Section
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Add Section.
 */
$wp_customize->add_section(
	'ava__style-header', array(
		'title' => esc_html__( 'Header', 'ava' ),
		'panel' => 'ava__style-editor',
	)
);

/**
 * Settings and Controls.
 */
$wp_customize->add_setting( 'title-header', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-header', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Header', 'ava' ),
			'section' => 'ava__style-header',
		)
	)
);

$wp_customize->add_setting(
	'header', array(
		'default'           => ava_defaults( 'header' ),
		'sanitize_callback' => 'ava_sanitize_select',
		'transport'         => 'postMessage',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Layout_Control(
		$wp_customize, 'header', array(
			'type'    => 'themebeans-layout',
			'section' => 'ava__style-header',
			'choices' => ava_get_choices( ava_get_header_layouts() ),
		)
	)
);

$wp_customize->add_setting(
	'header_padding_top', array(
		'default'           => ava_defaults( 'header_padding_top' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'header_padding_top', array(
			'default'     => ava_defaults( 'header_padding_top' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Top Padding', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-header',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 300,
				'step' => 5,
			),
		)
	)
);

$wp_customize->add_setting(
	'header_padding_bottom', array(
		'default'           => ava_defaults( 'header_padding_bottom' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'header_padding_bottom', array(
			'default'     => ava_defaults( 'header_padding_bottom' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Bottom Padding', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-header',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 300,
				'step' => 5,
			),
		)
	)
);

$wp_customize->add_setting(
	'header_padding_side', array(
		'default'           => ava_defaults( 'header_padding_side' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'header_padding_side', array(
			'default'     => ava_defaults( 'header_padding_side' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Side Padding', 'ava' ),
			'description' => 'vw',
			'section'     => 'ava__style-header',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 20,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'header_background_color', array(
		'default'           => ava_defaults( 'header_background_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'header_background_color', array(
			'label'   => esc_html__( 'Background', 'ava' ),
			'section' => 'ava__style-header',
		)
	)
);

$wp_customize->add_setting(
	'header_text_color', array(
		'default'           => ava_defaults( 'header_text_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'header_text_color', array(
			'label'   => esc_html__( 'Color', 'ava' ),
			'section' => 'ava__style-header',
		)
	)
);

/**
 * Mobile.
 */
$wp_customize->add_setting( 'title-mobile_header', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-mobile_header', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Header: Mobile', 'ava' ),
			'section' => 'ava__style-header',
		)
	)
);

$wp_customize->add_setting(
	'header_mobile_height', array(
		'default'           => ava_defaults( 'header_mobile_height' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'header_mobile_height', array(
			'default'     => ava_defaults( 'header_mobile_height' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Height', 'ava' ),
			'description' => 'vw',
			'section'     => 'ava__style-header',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 20,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'header_mobile_cart', array(
		'default'           => ava_defaults( 'header_mobile_cart' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Toggle_Control(
		$wp_customize, 'header_mobile_cart', array(
			'label'    => esc_html__( 'Show Checkout', 'ava' ),
			'section'  => 'ava__style-header',
			'type'     => 'themebeans-toggle',
			'settings' => 'header_mobile_cart',
		)
	)
);

$wp_customize->add_setting(
	'header_mobile_search', array(
		'default'           => ava_defaults( 'header_mobile_search' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Toggle_Control(
		$wp_customize, 'header_mobile_search', array(
			'label'    => esc_html__( 'Show Search', 'ava' ),
			'section'  => 'ava__style-header',
			'type'     => 'themebeans-toggle',
			'settings' => 'header_mobile_search',
		)
	)
);

$wp_customize->add_setting(
	'header_mobile_primary_menu', array(
		'default'           => ava_defaults( 'header_mobile_primary_menu' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Toggle_Control(
		$wp_customize, 'header_mobile_primary_menu', array(
			'label'    => esc_html__( 'Show Primary Menu', 'ava' ),
			'section'  => 'ava__style-header',
			'type'     => 'themebeans-toggle',
			'settings' => 'header_mobile_primary_menu',
		)
	)
);


/**
 * Social.
 */
$wp_customize->add_setting( 'title-header_social', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-header_social', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Header: Social', 'ava' ),
			'section' => 'ava__style-header',
		)
	)
);

$wp_customize->add_setting(
	'header_socialsize', array(
		'default'           => ava_defaults( 'header_socialsize' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'header_socialsize', array(
			'default'     => ava_defaults( 'header_socialsize' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Icon Size', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-header',
			'input_attrs' => array(
				'min'  => 10,
				'max'  => 60,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'header_social_padding_side', array(
		'default'           => ava_defaults( 'header_social_padding_side' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'header_social_padding_side', array(
			'default'     => ava_defaults( 'header_social_padding_side' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Side Padding', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-header',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 120,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'header_social_spacing', array(
		'default'           => ava_defaults( 'header_social_spacing' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'header_social_spacing', array(
			'default'     => ava_defaults( 'header_social_spacing' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Spacing', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-header',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 20,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'header_social_color', array(
		'default'           => ava_defaults( 'header_social_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'header_social_color', array(
			'label'   => esc_html__( 'Color', 'ava' ),
			'section' => 'ava__style-header',
		)
	)
);

/**
 * Search.
 */
$wp_customize->add_setting( 'title-header_search', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-header_search', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Header: Search', 'ava' ),
			'section' => 'ava__style-header',
		)
	)
);

$wp_customize->add_setting(
	'header_search', array(
		'default'           => ava_defaults( 'header_search' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Toggle_Control(
		$wp_customize, 'header_search', array(
			'label'    => esc_html__( 'Activate', 'ava' ),
			'section'  => 'ava__style-header',
			'type'     => 'themebeans-toggle',
			'settings' => 'header_search',
		)
	)
);

$wp_customize->add_setting(
	'header_search_size', array(
		'default'           => ava_defaults( 'header_search_size' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_setting(
	'header_search_icon', array(
		'default'           => ava_defaults( 'header_search_icon' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'header_search_icon', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Icon', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-header',
		'choices'     => array(
			'search'        => esc_html__( 'Line', 'ava' ),
			'search-filled' => esc_html__( 'Filled', 'ava' ),
		),
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'header_search_size', array(
			'default'     => ava_defaults( 'header_search_size' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Icon Size', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-header',
			'input_attrs' => array(
				'min'  => 5,
				'max'  => 60,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'header_search_padding', array(
		'default'           => ava_defaults( 'header_search_padding' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'header_search_padding', array(
			'default'     => ava_defaults( 'header_search_padding' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Side Padding', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-header',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'header_search_color', array(
		'default'           => ava_defaults( 'header_search_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'header_search_color', array(
			'label'   => esc_html__( 'Color', 'ava' ),
			'section' => 'ava__style-header',
		)
	)
);

/**
 * Checkout.
 */
if ( ava_is_woocommerce_activated() || class_exists( 'Easy_Digital_Downloads' ) ) :

	$wp_customize->add_setting( 'title-header_checkout', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
	$wp_customize->add_control(
		new ThemeBeans_Title_Control(
			$wp_customize, 'title-header_checkout', array(
				'type'    => 'themebeans-title',
				'label'   => esc_html__( 'Header: Checkout / Cart', 'ava' ),
				'section' => 'ava__style-header',
			)
		)
	);

	$wp_customize->add_setting(
		'header_checkout', array(
			'default'           => ava_defaults( 'header_checkout' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'ava_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Toggle_Control(
			$wp_customize, 'header_checkout', array(
				'label'    => esc_html__( 'Activate', 'ava' ),
				'section'  => 'ava__style-header',
				'type'     => 'themebeans-toggle',
				'settings' => 'header_checkout',
			)
		)
	);

	$wp_customize->add_setting(
		'header_checkout_url', array(
			'default'           => ava_defaults( 'header_checkout_url' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'ava_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'header_checkout_url', array(
			'type'        => 'select',
			'label'       => esc_html__( 'Link', 'ava' ),
			'description' => '',
			'section'     => 'ava__style-header',
			'choices'     => array(
				'checkout' => esc_html__( 'Checkout', 'ava' ),
				'cart'     => esc_html__( 'Cart', 'ava' ),
			),
		)
	);

	$wp_customize->add_setting(
		'header_checkout_icon', array(
			'default'           => ava_defaults( 'header_checkout_icon' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'ava_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'header_checkout_icon', array(
			'type'        => 'select',
			'label'       => esc_html__( 'Icon', 'ava' ),
			'description' => '',
			'section'     => 'ava__style-header',
			'choices'     => array(
				'bag'             => esc_html__( 'Bag', 'ava' ),
				'filled-bag'      => esc_html__( 'Filled Bag', 'ava' ),
				'bags'            => esc_html__( 'Multiple Bags', 'ava' ),
				'cart'            => esc_html__( 'Cart', 'ava' ),
				'approved-cart'   => esc_html__( 'Approved Cart', 'ava' ),
				'approved-basket' => esc_html__( 'Approved Basket', 'ava' ),
			),
		)
	);

	$wp_customize->add_setting(
		'header_checkout_position', array(
			'default'           => ava_defaults( 'header_checkout_position' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'ava_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'header_checkout_position', array(
			'type'        => 'select',
			'label'       => esc_html__( 'Position', 'ava' ),
			'description' => '',
			'section'     => 'ava__style-header',
			'choices'     => array(
				'left'  => esc_html__( 'Left', 'ava' ),
				'right' => esc_html__( 'Right', 'ava' ),
			),
		)
	);

	$wp_customize->add_setting(
		'header_checkout_size', array(
			'default'           => ava_defaults( 'header_checkout_size' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'header_checkout_size', array(
				'default'     => ava_defaults( 'header_checkout_size' ),
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'Icon Size', 'ava' ),
				'description' => 'px',
				'section'     => 'ava__style-header',
				'input_attrs' => array(
					'min'  => 5,
					'max'  => 40,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'header_checkout_color', array(
			'default'           => ava_defaults( 'header_checkout_color' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'header_checkout_color', array(
				'label'   => esc_html__( 'Color', 'ava' ),
				'section' => 'ava__style-header',
			)
		)
	);

endif;

/**
 * Flyout.
 */
$wp_customize->add_setting( 'title-header_flyout', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-header_flyout', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Header: Flyout', 'ava' ),
			'section' => 'ava__style-header',
		)
	)
);

$wp_customize->add_setting(
	'header_flyout_size', array(
		'default'           => ava_defaults( 'header_flyout_size' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'header_flyout_size', array(
			'default'     => ava_defaults( 'header_flyout_size' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Icon Size', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-header',
			'input_attrs' => array(
				'min'  => 15,
				'max'  => 50,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'header_flyout_color', array(
		'default'           => ava_defaults( 'header_flyout_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'header_flyout_color', array(
			'label'   => esc_html__( 'Color', 'ava' ),
			'section' => 'ava__style-header',
		)
	)
);

/**
 * Fonts.
 */
$wp_customize->add_setting( 'title-header_fonts', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-header_fonts', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Header: Fonts', 'ava' ),
			'section' => 'ava__style-header',
		)
	)
);

$wp_customize->add_setting(
	'header_font', array(
		'default'           => ava_defaults( 'header_font' ),
		'sanitize_callback' => 'ava_sanitize_nohtml',
	)
);

$wp_customize->add_control(
	'header_font', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Font', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-header',
		'choices'     => ava_get_fonts(),
	)
);

$wp_customize->add_setting(
	'header_font_style', array(
		'default'           => ava_defaults( 'header_font_style' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_nohtml',
	)
);

$wp_customize->add_control(
	'header_font_style', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Style', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-header',
		'choices'     => array(
			'normal' => esc_html__( 'Normal', 'ava' ),
			'italic' => esc_html__( 'Italic', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'header_font_weight', array(
		'default'           => ava_defaults( 'header_font_weight' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'header_font_weight', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Weight', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-header',
		'choices'     => array(
			'normal' => esc_html__( 'Normal', 'ava' ),
			'bold'   => esc_html__( 'Bold', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'header_font_transform', array(
		'default'           => ava_defaults( 'header_font_transform' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'header_font_transform', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Transform', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-header',
		'choices'     => array(
			'none'      => esc_html__( 'Normal', 'ava' ),
			'lowercase' => esc_html__( 'Lowercase', 'ava' ),
			'uppercase' => esc_html__( 'Uppercase', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'header_font_size', array(
		'default'           => ava_defaults( 'header_font_size' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'header_font_size', array(
			'default'     => ava_defaults( 'header_font_size' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Size', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-header',
			'input_attrs' => array(
				'min'  => 9,
				'max'  => 20,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'header_font_letterspacing', array(
		'default'           => ava_defaults( 'header_font_letterspacing' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_number_intval',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'header_font_letterspacing', array(
			'default'     => ava_defaults( 'header_font_letterspacing' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Letter Spacing', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-header',
			'input_attrs' => array(
				'min'  => -5,
				'max'  => 20,
				'step' => 1,
			),
		)
	)
);
