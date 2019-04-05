<?php
/**
 * Beaver Builder Modules
 *
 * Custom drag and drop frontend modules for Beaver Builder.
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Beaver Builder Variables.
 */
define( 'AVA_MODULES_CATEGORY', apply_filters( 'ava_bb_std_modules_category', esc_html__( 'Ava Modules', 'ava' ) ) );
define( 'AVA_MODULES_PORTFOLIO_CATEGORY', apply_filters( 'ava_bb_portfolio_modules_category', esc_html__( 'Ava Portfolio Modules', 'ava' ) ) );
define( 'AVA_MODULES_PORTFOLIO_SINGLE_CATEGORY', apply_filters( 'ava_bb_single_portfolio_modules_category', esc_html__( 'Ava Single Portfolio Modules', 'ava' ) ) );

/**
 * Disable inline-editing, as is messes up the hero block.
 */
add_filter( 'fl_inline_editing_enabled', '__return_false' );

/**
 * Load Custom Beaver Builder Modules.
 */
function ava_bb_load_modules() {

	// Page content modules.
	if ( class_exists( 'FLBuilder' ) ) :

		require get_theme_file_path( '/fl-builder/custom-modules/hero/hero.php' );
		require get_theme_file_path( '/fl-builder/custom-modules/video-block/video-block.php' );
		require get_theme_file_path( '/fl-builder/custom-modules/social-proof/social-proof.php' );
		require get_theme_file_path( '/fl-builder/custom-modules/title/title.php' );
		require get_theme_file_path( '/fl-builder/custom-modules/parallax-gallery/parallax-gallery.php' );
		require get_theme_file_path( '/fl-builder/custom-modules/team/ava-team.php' );
		require get_theme_file_path( '/fl-builder/custom-modules/icon-block/icon-block.php' );
		require get_theme_file_path( '/fl-builder/custom-modules/content-blocks/content-blocks.php' );

	endif;

	// Conditionally load portfolio template modules.
	if ( class_exists( 'FLBuilder' ) && post_type_exists( 'portfolio' ) ) :

		require get_theme_file_path( '/fl-builder/custom-modules/portfolio/carson/carson.php' );
		require get_theme_file_path( '/fl-builder/custom-modules/portfolio/ethan/ethan.php' );
		require get_theme_file_path( '/fl-builder/custom-modules/portfolio/gavin/gavin.php' );
		require get_theme_file_path( '/fl-builder/custom-modules/portfolio/liam/liam.php' );
		require get_theme_file_path( '/fl-builder/custom-modules/portfolio/jackson/jackson.php' );
		require get_theme_file_path( '/fl-builder/custom-modules/portfolio/mia/mia.php' );
		require get_theme_file_path( '/fl-builder/custom-modules/portfolio-single/parallax/parallax.php' );

	endif;

	// Conditionally load WooCommerce modules.
	if ( class_exists( 'FLBuilder' ) && ava_is_woocommerce_activated() ) :

		require get_theme_file_path( '/fl-builder/custom-modules/woocommerce-products/woocommerce-products.php' );

	endif;

}
add_action( 'init', 'ava_bb_load_modules' );

/**
 * Load Custom Beaver Builder Templates.
 */
function ava_bb_load_templates() {

	if ( ! class_exists( 'FLBuilder' ) || ! method_exists( 'FLBuilder', 'register_templates' ) ) {
		return;
	}

	FLBuilder::register_templates( get_parent_theme_file_path( '/fl-builder/templates.dat' ) );
}
add_action( 'after_setup_theme', 'ava_bb_load_templates' );


if ( ! function_exists( 'ava_bb_hover_styles' ) ) :
	/**
	 * Set the portfolio overlay select styles to be used in our Beaver Builder modules.
	 */
	function ava_bb_hover_styles() {
		$array = array(
			'project__hover--none'    => esc_html__( 'None', 'ava' ),
			'project__hover--scaled'  => esc_html__( 'Scaled Overlay', 'ava' ),
			'project__hover--pressed' => esc_html__( 'Pressed', 'ava' ),
			'project__hover--opacity' => esc_html__( 'Opacity', 'ava' ),
		);

		return $array;
	}
endif;

/**
 * Disable core Beaver Builder modules, in leiu of using our own.
 *
 * @param array $enabled Status of module.
 * @param array $instance Status of module instance.
 */
function ava_bb_disable_modules( $enabled, $instance ) {

	$disable = array( 'woocommerce' );

	if ( in_array( $instance->slug, $disable, true ) ) {
		return false;
	}

	return $enabled;
}
add_filter( 'fl_builder_register_module', 'ava_bb_disable_modules', 10, 2 );

/**
 * Use this filter to modify the post types that the builder works with.
 *
 * @param array $post_types Array of post types to enable.
 * @link http://kb.wpbeaverbuilder.com/article/117-plugin-filter-reference
 */
function ava_bb_enable_post_types( $post_types ) {
	$post_types[] = apply_filters( 'ava_beaver_builder_post_types', 'portfolio' );
	return $post_types;
}
add_filter( 'fl_builder_post_types', 'ava_bb_enable_post_types' );

/**
 * Use this filter to disable specific post types from showing up in the Beaver Builder settings.
 *
 * @param array $post_types Array of post types to disable.
 * @link http://kb.wpbeaverbuilder.com/article/117-plugin-filter-reference
 */
function ava_bb_disable_post_types( $post_types ) {
	unset( $post_types[ apply_filters( 'ava_beaver_builder_post_types', 'team' ) ] );
	return $post_types;
}
add_filter( 'fl_builder_admin_settings_post_types', 'ava_bb_disable_post_types' );

/**
 * Filter Beaver Tunnels' list of actions.
 *
 * @param array $actions Array of actions.
 * @link https://beavertunnels.com/docs/docs-how-to-add-support-for-additional-themes-and-plugins/
 */
function ava_beaver_tunnels_actions( $actions = array() ) {
	$actions[] = array(
		'title'   => esc_html__( 'Ava', 'ava' ),
		'actions' => array(
			'ava_before_page',
			'ava_after_page',
			'ava_before_header',
			'ava_header',
			'ava_after_header',
			'ava_before_footer',
			'ava_footer',
			'ava_after_footer',
			'ava_before_colophon',
			'ava_after_colophon',
			'ava_before_footer_widgets',
			'ava_after_footer_widgets',
			'ava_before_first_footer_col',
			'ava_after_first_footer_col',
			'ava_before_second_footer_col',
			'ava_after_second_footer_col',
			'ava_before_third_footer_col',
			'ava_after_third_footer_col',
			'ava_before_fourth_footer_col',
			'ava_after_fourth_footer_col',
			'ava_shop_minibar_right',
			'ava_before_single_product_carousel',
		),
	);
	return $actions;
}
add_filter( 'beaver_tunnels', 'ava_beaver_tunnels_actions' );

/**
 * Add support for Beaver Themer: Header and Footer.
 *
 * @link http://kb.wpbeaverbuilder.com/article/389-add-header-footer-and-parts-support-to-your-theme-themer
 */
function ava_beaver_themer_support() {
	add_theme_support( 'fl-theme-builder-headers' );
	add_theme_support( 'fl-theme-builder-footers' );
	add_theme_support( 'fl-theme-builder-parts' );
}
add_action( 'after_setup_theme', 'ava_beaver_themer_support' );

/**
 * Add support for Beaver Themer Parts.
 *
 * @link http://kb.wpbeaverbuilder.com/article/389-add-header-footer-and-parts-support-to-your-theme-themer
 */
function ava_beaver_themer_register_part_hooks() {

	return array(
		array(
			'label' => esc_html__( 'Header', 'ava' ),
			'hooks' => array(
				'ava_before_header' => esc_html__( 'Before Header', 'ava' ),
				'ava_after_header'  => esc_html__( 'After Header', 'ava' ),
			),
		),
		array(
			'label' => esc_html__( 'Footer', 'ava' ),
			'hooks' => array(
				'ava_before_footer' => esc_html__( 'Before Footer', 'ava' ),
				'ava_after_footer'  => esc_html__( 'After Footer', 'ava' ),
			),
		),
		array(
			'label' => esc_html__( 'WooCommerce Single Product', 'ava' ),
			'hooks' => array(
				'ava_after_footer'                         => esc_html__( 'After Footer', 'ava' ),
				'woocommerce_after_single_product_summary' => esc_html__( 'After Product Summary', 'ava' ),
			),
		),
	);
}
add_filter( 'fl_theme_builder_part_hooks', 'ava_beaver_themer_register_part_hooks' );

/**
 * Load globals.
 */
require get_theme_file_path( '/fl-builder/globals.php' );
