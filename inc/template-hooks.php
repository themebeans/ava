<?php
/**
 * Custom template hooks fors Ava.
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Beaver Themer Support.
 *
 * Functions placed in, before, and after the #page element on every page.
 * The #page element contains all the standard elements on a page, including the <header> and <footer>.
 *
 * @see ava_do_header()
 * @see ava_do_footer()
 */
function ava_beaver_themer_render_header_and_footer() {

	// If Beaver Builder does not exist, return.
	if ( ! class_exists( 'FLThemeBuilderLayoutData' ) ) {
		return;
	}

	// Get the header ID.
	$header_ids = FLThemeBuilderLayoutData::get_current_page_header_ids();

	// If we have a header, remove the theme header and hook in Theme Builder's.
	if ( ! empty( $header_ids ) ) {
		remove_action( 'ava_do_header', 'ava_do_header' );
		add_action( 'ava_do_header', 'FLThemeBuilderLayoutRenderer::render_header' );
	}

	// Get the footer ID.
	$footer_ids = FLThemeBuilderLayoutData::get_current_page_footer_ids();

	// If we have a footer, remove the theme footer and hook in Theme Builder's.
	if ( ! empty( $footer_ids ) ) {
		remove_action( 'ava_do_footer', 'ava_do_footer' );
		add_action( 'ava_do_footer', 'FLThemeBuilderLayoutRenderer::render_footer' );
	}
}
add_action( 'wp', 'ava_beaver_themer_render_header_and_footer' );

/**
 * Page.
 *
 * Functions placed in, before, and after the #page element on every page.
 * The #page element contains all the standard elements on a page, including the <header> and <footer>.
 *
 * @see ava_search()
 * @see ava_flyout()
 * @see ava_woocommerce_minicart()
 * @see ava_woocommerce_minibar()
 */
add_action( 'ava_after_page', 'ava_search' );
add_action( 'ava_after_page', 'ava_flyout' );

if ( ava_is_woocommerce_activated() ) :
	add_action( 'ava_after_page', 'ava_woocommerce_minicart' );
	add_action( 'ava_after_page', 'ava_woocommerce_minibar' );
endif;

/**
 * Header.
 *
 * Functions placed in, before, and after the #site-header element on every page.
 *
 * @see ava_do_header()
 * @see ava_header_contents()
 * @see ava_ally_skip_link()
 * @see ava_top_header()
 * @see ava_mobile_header()
 * @see ava_title_banner()
 */
add_action( 'ava_do_header', 'ava_do_header' );
add_action( 'ava_header', 'ava_header_contents' );
add_action( 'ava_before_header', 'ava_ally_skip_link' );
add_action( 'ava_before_header', 'ava_top_header' );
add_action( 'ava_after_header', 'ava_mobile_header' );
add_action( 'ava_after_header', 'ava_title_banner' );



/**
 * Footer.
 *
 * Functions placed in, before, and after the #site-footer element on every page.
 *
 * @see ava_do_footer()
 * @see ava_footer_contents()
 * @see ava_colophon()
 */
add_action( 'ava_do_footer', 'ava_do_footer' );
add_action( 'ava_footer', 'ava_footer_contents' );
add_action( 'ava_after_footer', 'ava_colophon' );
