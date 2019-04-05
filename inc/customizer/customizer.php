<?php
/**
 * Customizer functionality
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Register Customizer Settings.
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 */
function ava_customize_register( $wp_customize ) {

	/**
	 * Remove unnecessary controls.
	 */
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_control( 'site_logo_header_text' );

	/**
	 * Set transports for Customizer defaults.
	 */
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	/**
	 * Add custom controls.
	 */
	require get_parent_theme_file_path( THEMEBEANS_CUSTOM_CONTROLS_DIR . '/class-themebeans-title-control.php' );
	require get_parent_theme_file_path( THEMEBEANS_CUSTOM_CONTROLS_DIR . '/class-themebeans-range-control.php' );
	require get_parent_theme_file_path( THEMEBEANS_CUSTOM_CONTROLS_DIR . '/class-themebeans-toggle-control.php' );
	require get_parent_theme_file_path( THEMEBEANS_CUSTOM_CONTROLS_DIR . '/class-themebeans-layout-control.php' );

	/**
	 * Top-Level Customizer sections and panels.
	 */
	$wp_customize->add_panel(
		'ava__style-editor', array(
			'title'       => esc_html__( 'Site Editor', 'ava' ),
			'description' => esc_html__( 'Customize various options throughout the theme with the settings within this panel.', 'ava' ),
			'priority'    => 1,
		)
	);

	/**
	 * Add Customizer sections.
	 */
	require get_theme_file_path( '/inc/customizer/sections/customizer-identity.php' );
	require get_theme_file_path( '/inc/customizer/sections/customizer-site.php' );
	require get_theme_file_path( '/inc/customizer/sections/customizer-header.php' );
	require get_theme_file_path( '/inc/customizer/sections/customizer-top-header.php' );
	require get_theme_file_path( '/inc/customizer/sections/customizer-mobile-nav.php' );
	require get_theme_file_path( '/inc/customizer/sections/customizer-blog.php' );

	// We don't need these options, if there are not products.
	if ( post_type_exists( 'product' ) ) {
		require get_theme_file_path( '/inc/customizer/sections/customizer-shop.php' );
		require get_theme_file_path( '/inc/customizer/sections/customizer-singleproduct.php' );
	}

	require get_theme_file_path( '/inc/customizer/sections/customizer-singlepost.php' );

	// We don't need these options, if there are not portfolio post types.
	if ( post_type_exists( 'portfolio' ) ) {
		require get_theme_file_path( '/inc/customizer/sections/customizer-portfolio.php' );
	}

	require get_theme_file_path( '/inc/customizer/sections/customizer-footer.php' );
	require get_theme_file_path( '/inc/customizer/sections/customizer-colophon.php' );
	require get_theme_file_path( '/inc/customizer/sections/customizer-flyout.php' );
	require get_theme_file_path( '/inc/customizer/sections/customizer-fonts.php' );
}
add_action( 'customize_register', 'ava_customize_register', 11 );

/**
 * Customizer Preview.
 */
function ava_customize_preview_js() {
	wp_enqueue_script( 'ava-customize-preview', get_theme_file_uri( '/assets/js/admin/customize-preview' . AVA_ASSET_SUFFIX . '.js' ), array( 'customize-preview' ), '@@pkg.version', true );
}
add_action( 'customize_preview_init', 'ava_customize_preview_js' );

/**
 * Customizer Events.
 */
function ava_customize_events_enqueue_scripts() {
	wp_enqueue_script( 'ava-customize-events', get_theme_file_uri( '/assets/js/admin/customize-events' . AVA_ASSET_SUFFIX . '.js' ), array( 'customize-controls' ), '@@pkg.version', true );
}
add_action( 'customize_controls_enqueue_scripts', 'ava_customize_events_enqueue_scripts' );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 */
function ava_customize_live_js() {
	wp_enqueue_script( 'ava-customize-live', get_theme_file_uri( '/assets/js/admin/customize-live' . AVA_ASSET_SUFFIX . '.js' ), array( 'customize-preview' ), '@@pkg.version', true );
}
add_action( 'customize_preview_init', 'ava_customize_live_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function ava_customize_panel_js() {
	wp_enqueue_script( 'ava-customize-controls', get_theme_file_uri( '/assets/js/admin/customize-controls' . AVA_ASSET_SUFFIX . '.js' ), array(), '@@pkg.version', true );
}
add_action( 'customize_controls_enqueue_scripts', 'ava_customize_panel_js' );
