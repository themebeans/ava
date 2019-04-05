<?php
/**
 * Shop Customizer Section
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Add Section.
 */
$wp_customize->add_section(
	'ava__style-shop', array(
		'title' => esc_html__( 'Shop', 'ava' ),
		'panel' => 'ava__style-editor',
	)
);

/**
 * Shop Archive.
 */
$wp_customize->add_setting( 'title-shop', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-shop', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Shop', 'ava' ),
			'section' => 'ava__style-shop',
		)
	)
);

$wp_customize->add_setting(
	'shop_layout', array(
		'default'           => ava_defaults( 'shop_layout' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'shop_layout', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Layout', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-shop',
		'choices'     => array(
			'product-grid__gallery' => esc_html__( 'Gallery', 'ava' ),
			'product-grid__columns' => esc_html__( 'Columns', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'shop_pagination', array(
		'default'           => ava_defaults( 'shop_pagination' ),
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'shop_pagination', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Pagination', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-shop',
		'choices'     => array(
			'infinite' => esc_html__( 'Infinite Loading', 'ava' ),
			'pager'    => esc_html__( 'Standard Pager', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'shop_layout_columns_size', array(
		'default'           => ava_defaults( 'shop_layout_columns_size' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'shop_layout_columns_size', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Columns Size', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-shop',
		'choices'     => array(
			'small'  => esc_html__( 'Small', 'ava' ),
			'medium' => esc_html__( 'Medium', 'ava' ),
			'large'  => esc_html__( 'Large', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'shop_layout_columns_gutter', array(
		'default'           => ava_defaults( 'shop_layout_columns_gutter' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'esc_html',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'shop_layout_columns_gutter', array(
			'default'     => ava_defaults( 'shop_layout_columns_gutter' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Columns Gutter', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-shop',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 0,
			),
		)
	)
);


/**
 * Shop Archive.
 */
$wp_customize->add_setting( 'title-shop_product', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-shop_product', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Shop: Product', 'ava' ),
			'section' => 'ava__style-shop',
		)
	)
);

$wp_customize->add_setting(
	'shop_product_title', array(
		'default'           => ava_defaults( 'shop_product_title' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Toggle_Control(
		$wp_customize, 'shop_product_title', array(
			'label'    => esc_html__( 'Title', 'ava' ),
			'section'  => 'ava__style-shop',
			'type'     => 'themebeans-toggle',
			'settings' => 'shop_product_title',
		)
	)
);

$wp_customize->add_setting(
	'shop_product_price', array(
		'default'           => ava_defaults( 'shop_product_price' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Toggle_Control(
		$wp_customize, 'shop_product_price', array(
			'label'    => esc_html__( 'Price', 'ava' ),
			'section'  => 'ava__style-shop',
			'type'     => 'themebeans-toggle',
			'settings' => 'shop_product_price',
		)
	)
);

$wp_customize->add_setting(
	'shop_product_title_position', array(
		'default'           => ava_defaults( 'shop_product_title_position' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'shop_product_title_position', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Position', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-shop',
		'choices'     => array(
			'top-left'        => esc_html__( 'Top Left', 'ava' ),
			'top-right'       => esc_html__( 'Top Right', 'ava' ),
			'top-centered'    => esc_html__( 'Top Center', 'ava' ),
			'bottom-left'     => esc_html__( 'Bottom Left', 'ava' ),
			'bottom-right'    => esc_html__( 'Bottom Right', 'ava' ),
			'bottom-centered' => esc_html__( 'Bottom Center', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'shop_product_hover', array(
		'default'           => ava_defaults( 'shop_product_hover' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'shop_product_hover', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Hover', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-shop',
		'choices'     => array(
			'opacity'   => esc_html__( 'Opacity', 'ava' ),
			'zoom'      => esc_html__( 'Zoom', 'ava' ),
			'move-over' => esc_html__( 'Move', 'ava' ),
			'pressed'   => esc_html__( 'Pressed', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'shop_product_top_padding', array(
		'default'           => ava_defaults( 'shop_product_top_padding' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'shop_product_top_padding', array(
			'default'     => ava_defaults( 'shop_product_top_padding' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Top Padding', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-shop',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 5,
			),
		)
	)
);

$wp_customize->add_setting(
	'shop_product_bottom_padding', array(
		'default'           => ava_defaults( 'shop_product_bottom_padding' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'shop_product_bottom_padding', array(
			'default'     => ava_defaults( 'shop_product_bottom_padding' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Bottom Padding', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-shop',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 5,
			),
		)
	)
);

$wp_customize->add_setting(
	'shop_product_side_padding', array(
		'default'           => ava_defaults( 'shop_product_side_padding' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'shop_product_side_padding', array(
			'default'     => ava_defaults( 'shop_product_side_padding' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Side Padding', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-shop',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 5,
			),
		)
	)
);

$wp_customize->add_setting(
	'shop_product_background_color', array(
		'default'           => ava_defaults( 'shop_product_background_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'shop_product_background_color', array(
			'label'   => esc_html__( 'Background', 'ava' ),
			'section' => 'ava__style-shop',
		)
	)
);

$wp_customize->add_setting(
	'shop_product_title_color', array(
		'default'           => ava_defaults( 'shop_product_title_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'shop_product_title_color', array(
			'label'   => esc_html__( 'Color', 'ava' ),
			'section' => 'ava__style-shop',
		)
	)
);



/**
 * Sale Badge.
 */
$wp_customize->add_setting( 'title-shop_salebadge', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-shop_salebadge', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Shop: Sale Flash', 'ava' ),
			'section' => 'ava__style-shop',
		)
	)
);

$wp_customize->add_setting(
	'shop_salebadge', array(
		'default'           => ava_defaults( 'shop_salebadge' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Toggle_Control(
		$wp_customize, 'shop_salebadge', array(
			'label'    => esc_html__( 'Activate', 'ava' ),
			'section'  => 'ava__style-shop',
			'type'     => 'themebeans-toggle',
			'settings' => 'shop_salebadge',
		)
	)
);

$wp_customize->add_setting(
	'shop_salebadge_text', array(
		'default'   => ava_defaults( 'shop_salebadge_text' ),
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	'shop_salebadge_text', array(
		'type'    => 'text',
		'label'   => esc_html__( 'Text', 'ava' ),
		'section' => 'ava__style-shop',
	)
);

$wp_customize->add_setting(
	'shop_salebadge_position', array(
		'default'           => ava_defaults( 'shop_salebadge_position' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'shop_salebadge_position', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Position', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-shop',
		'choices'     => array(
			'top-left'        => esc_html__( 'Top Left', 'ava' ),
			'top-right'       => esc_html__( 'Top Right', 'ava' ),
			'top-centered'    => esc_html__( 'Top Centered', 'ava' ),
			'bottom-left'     => esc_html__( 'Bottom Left', 'ava' ),
			'bottom-right'    => esc_html__( 'Bottom Right', 'ava' ),
			'bottom-centered' => esc_html__( 'Bottom Centered', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'shop_salebadge_style', array(
		'default'           => ava_defaults( 'shop_salebadge_style' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'shop_salebadge_style', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Style', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-shop',
		'choices'     => array(
			'style--default' => esc_html__( 'Default', 'ava' ),
			'style--circle'  => esc_html__( 'Circle', 'ava' ),
			'style--square'  => esc_html__( 'Square', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'shop_salebadge_size', array(
		'default'           => ava_defaults( 'shop_salebadge_size' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'shop_salebadge_size', array(
			'default'     => ava_defaults( 'shop_salebadge_size' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Size', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-shop',
			'input_attrs' => array(
				'min'  => 50,
				'max'  => 150,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'shop_salebadge_background_color', array(
		'default'           => ava_defaults( 'shop_salebadge_background_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'shop_salebadge_background_color', array(
			'label'   => esc_html__( 'Background', 'ava' ),
			'section' => 'ava__style-shop',
		)
	)
);

$wp_customize->add_setting(
	'shop_salebadge_color', array(
		'default'           => ava_defaults( 'shop_salebadge_color' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'shop_salebadge_color', array(
			'label'   => esc_html__( 'Color', 'ava' ),
			'section' => 'ava__style-shop',
		)
	)
);


/**
 * MiniCart Archive.
 */
$wp_customize->add_setting( 'title-shop_minicart', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-shop_minicart', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Shop: MiniCart', 'ava' ),
			'section' => 'ava__style-shop',
		)
	)
);

$wp_customize->add_setting(
	'shop_ajaxcart_icon', array(
		'default'           => ava_defaults( 'shop_ajaxcart_icon' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'shop_ajaxcart_icon', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Icon', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-shop',
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
	'shop_minicart_url', array(
		'default'           => ava_defaults( 'shop_minicart_url' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'shop_minicart_url', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Link', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-shop',
		'choices'     => array(
			'checkout' => esc_html__( 'Checkout', 'ava' ),
			'cart'     => esc_html__( 'Cart', 'ava' ),
		),
	)
);




/**
 * Fonts.
 */
$wp_customize->add_setting( 'title-shop_fonts', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-shop_fonts', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Shop: Fonts', 'ava' ),
			'section' => 'ava__style-shop',
		)
	)
);

$wp_customize->add_setting(
	'shop_font', array(
		'default'           => ava_defaults( 'shop_font' ),
		'sanitize_callback' => 'ava_sanitize_nohtml',
	)
);

$wp_customize->add_control(
	'shop_font', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Font', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-shop',
		'choices'     => ava_get_fonts(),
	)
);

$wp_customize->add_setting(
	'shop_font_style', array(
		'default'           => ava_defaults( 'shop_font_style' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'shop_font_style', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Style', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-shop',
		'choices'     => array(
			'normal' => esc_html__( 'Normal', 'ava' ),
			'italic' => esc_html__( 'Italic', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'shop_font_weight', array(
		'default'           => ava_defaults( 'shop_font_weight' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'shop_font_weight', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Weight', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-shop',
		'choices'     => array(
			'normal' => esc_html__( 'Normal', 'ava' ),
			'bold'   => esc_html__( 'Bold', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'shop_font_transform', array(
		'default'           => ava_defaults( 'shop_font_transform' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'shop_font_transform', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Transform', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-shop',
		'choices'     => array(
			'none'      => esc_html__( 'Normal', 'ava' ),
			'lowercase' => esc_html__( 'Lowercase', 'ava' ),
			'uppercase' => esc_html__( 'Uppercase', 'ava' ),
		),
	)
);

$wp_customize->add_setting(
	'shop_font_size', array(
		'default'           => ava_defaults( 'shop_font_size' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'shop_font_size', array(
			'default'     => ava_defaults( 'shop_font_size' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Size', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-shop',
			'input_attrs' => array(
				'min'  => 9,
				'max'  => 20,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'shop_font_letterspacing', array(
		'default'           => ava_defaults( 'shop_font_letterspacing' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_number_intval',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'shop_font_letterspacing', array(
			'default'     => ava_defaults( 'shop_font_letterspacing' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Letter Spacing', 'ava' ),
			'description' => 'px',
			'section'     => 'ava__style-shop',
			'input_attrs' => array(
				'min'  => -5,
				'max'  => 20,
				'step' => 1,
			),
		)
	)
);
