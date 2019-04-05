<?php
/**
 * Blogroll Customizer Section
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Add Section.
 */
$wp_customize->add_section(
	'ava__style-blogroll', array(
		'title' => esc_html__( 'Blogroll', 'ava' ),
		'panel' => 'ava__style-editor',
	)
);

/**
 * Settings and Controls.
 */
$wp_customize->add_setting( 'title-blog', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-blog', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Blog', 'ava' ),
			'section' => 'ava__style-blogroll',
		)
	)
);

$wp_customize->add_setting(
	'blog_title_alignment', array(
		'default'           => ava_defaults( 'blog_title_alignment' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'blog_title_alignment', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Title Alignment', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-blogroll',
		'choices'     => array(
			'align__left'    => esc_html__( 'Left', 'ava' ),
			'align__right'   => esc_html__( 'Right', 'ava' ),
			'align__center'  => esc_html__( 'Centered', 'ava' ),
			'align__justify' => esc_html__( 'Justified', 'ava' ),
		),
	)
);


$wp_customize->add_setting(
	'blog_text_alignment', array(
		'default'           => ava_defaults( 'blog_text_alignment' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_select',
	)
);

$wp_customize->add_control(
	'blog_text_alignment', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Text Alignment', 'ava' ),
		'description' => '',
		'section'     => 'ava__style-blogroll',
		'choices'     => array(
			'align__left'    => esc_html__( 'Left', 'ava' ),
			'align__right'   => esc_html__( 'Right', 'ava' ),
			'align__center'  => esc_html__( 'Centered', 'ava' ),
			'align__justify' => esc_html__( 'Justified', 'ava' ),
		),
	)
);




/**
 * Metadata.
 */
$wp_customize->add_setting( 'title-blog_options', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-blog_options', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Blog: Meta', 'ava' ),
			'section' => 'ava__style-blogroll',
		)
	)
);

$wp_customize->add_setting(
	'blog_date', array(
		'default'           => ava_defaults( 'blog_date' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Toggle_Control(
		$wp_customize, 'blog_date', array(
			'label'    => esc_html__( 'Show Date', 'ava' ),
			'section'  => 'ava__style-blogroll',
			'type'     => 'themebeans-toggle',
			'settings' => 'blog_date',
		)
	)
);

$wp_customize->add_setting(
	'blog_byline', array(
		'default'           => ava_defaults( 'blog_byline' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ava_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Toggle_Control(
		$wp_customize, 'blog_byline', array(
			'label'    => esc_html__( 'Show Byline', 'ava' ),
			'section'  => 'ava__style-blogroll',
			'type'     => 'themebeans-toggle',
			'settings' => 'blog_byline',
		)
	)
);


/**
 * Infinite Scroll.
 */
$wp_customize->add_setting( 'title-blog_infscr', array( 'sanitize_callback' => 'ava_sanitize_nohtml' ) );
$wp_customize->add_control(
	new ThemeBeans_Title_Control(
		$wp_customize, 'title-blog_infscr', array(
			'type'    => 'themebeans-title',
			'label'   => esc_html__( 'Blog: Pagination', 'ava' ),
			'section' => 'ava__style-blogroll',
		)
	)
);

$wp_customize->add_setting(
	'blog_infscr', array(
		'default'           => ava_defaults( 'blog_infscr' ),
		'sanitize_callback' => 'ava_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Toggle_Control(
		$wp_customize, 'blog_infscr', array(
			'label'    => esc_html__( 'Enable Infinite Scroll', 'ava' ),
			'section'  => 'ava__style-blogroll',
			'type'     => 'themebeans-toggle',
			'settings' => 'blog_infscr',
		)
	)
);
