<?php
/**
 * Customizer defaults
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Get the default option for Ava's Customizer settings.
 *
 * @param  string $name Option key name to get.
 * @return mixin
 */
function ava_defaults( $name ) {
	static $defaults;

	$body_font   = get_theme_mod( 'global_body_font', 'Karla' );
	$header_font = get_theme_mod( 'global_header_font', 'Playfair Display' );
	$karla_font  = 'Karla';
	$white       = apply_filters( 'ava_customizer_default__white', '#ffffff' );
	$black       = apply_filters( 'ava_customizer_default__black', '#222222' );
	$lightgray   = apply_filters( 'ava_customizer_default__lightgray', '#f6f6f6' );
	$accent      = apply_filters( 'ava_customizer_default__accent', '#0003D1' );
	$lightyellow = apply_filters( 'ava_customizer_default__lightyellow', '#fff8de' );

	if ( ! $defaults ) {
		$defaults = apply_filters(
			'ava_defaults', array(

				// Shop.
				'shop_layout'                             => 'product-grid__gallery',
				'shop_pagination'                         => 'infinite',
				'shop_layout_columns_size'                => 'large',
				'shop_layout_columns_gutter'              => 25,
				'shop_ajaxcart_icon'                      => 'cart',
				'shop_minicart_url'                       => 'checkout',
				'shop_product_title_position'             => 'bottom-left',
				'shop_product_hover'                      => 'zoom',
				'shop_product_title'                      => true,
				'shop_product_price'                      => true,
				'shop_product_top_padding'                => 0,
				'shop_product_bottom_padding'             => 0,
				'shop_product_side_padding'               => 0,
				'shop_product_background_color'           => $white,
				'shop_product_title_color'                => $black,
				'shop_salebadge'                          => true,
				'shop_salebadge_background_color'         => $white,
				'shop_salebadge_color'                    => $black,
				'shop_salebadge_size'                     => 70, // Units: px.
				'shop_salebadge_style'                    => 'style--circle',
				'shop_salebadge_text'                     => 'Sale',

				// Blog.
				'blog_title_alignment'                    => 'align__center',
				'blog_text_alignment'                     => 'align__left',
				'blog_date'                               => true,
				'blog_byline'                             => true,
				'singlepost_pinterest_position'           => 'top-left',
				'blog_infscr'                             => true,

				// Portfolio.
				'portfolio_single_navigation'             => true,
				'portfolio_archive_overlay'               => $black,
				'portfolio_archive_overlay_text'          => $white,

				// Colophon.
				'colophon'                                => 'colophon-3',
				'colophon_active'                         => true,
				'colophon_padding_top'                    => 9,
				'colophon_padding_bottom'                 => 9,
				'colophon_max_width'                      => 2800,
				'colophon_background_color'               => '',
				'colophon_text_color'                     => $black,
				'colophon_mobile_padding_top'             => 12,
				'colophon_mobile_padding_bottom'          => 12,
				'colophon_large_padding_top'              => 6,
				'colophon_large_padding_bottom'           => 6,
				'colophon_copyright'                      => true,
				'colophon_theme_info'                     => true,
				'colophon_copyright_padding_side'         => 20,
				'colophon_copyright_text'                 => '',
				'colophon_social_size'                    => 16,
				'colophon_social_spacing'                 => 4,
				'colophon_social_color'                   => $black,
				'colophon_menu'                           => true,

				// Flyout.
				'flyout'                                  => true,
				'flyout_position'                         => 'sidebar--left',
				'flyout_background_color'                 => $white,
				'flyout_text_color'                       => $black,
				'flyout_overlay_background_color'         => $black,
				'flyout_overlay_opacity'                  => 20,

				// Footer.
				'footer'                                  => 'footer-4',
				'footer_padding_top'                      => 12,
				'footer_padding_bottom'                   => 8,
				'footer_background_color'                 => '',
				'footer_text_color'                       => $black,
				'footer_mobile_padding_top'               => 17,
				'footer_mobile_padding_bottom'            => 12,
				'footer_large_padding_top'                => 10,
				'footer_large_padding_bottom'             => 4,
				'footer_header_color'                     => $black,
				'footer_header_opacity'                   => 50,

				// Header.
				'header'                                  => 'header-1',
				'header_padding_top'                      => 45,
				'header_padding_bottom'                   => 45,
				'header_padding_side'                     => 5, // Units: vw.
				'header_background_color'                 => '',
				'header_text_color'                       => $black,
				'header_mobile_height'                    => 5, // Units: vw.
				'header_mobile_cart'                      => true,
				'header_mobile_search'                    => false,
				'header_mobile_primary_menu'              => false,
				'header_socialsize'                       => 17,
				'header_social_padding_side'              => 30,
				'header_social_spacing'                   => 2,
				'header_social_color'                     => $black,
				'header_search'                           => false,
				'header_search_icon'                      => 'search',
				'header_search_size'                      => 20,
				'header_search_padding'                   => 30,
				'header_search_color'                     => $black,
				'header_checkout'                         => true,
				'header_checkout_url'                     => 'checkout',
				'header_checkout_icon'                    => 'bag',
				'header_checkout_position'                => 'left',
				'header_checkout_size'                    => 23,
				'header_checkout_color'                   => $black,
				'header_flyout_size'                      => 23,
				'header_flyout_color'                     => $black,

				// Top Header.
				'topheader'                               => 'top-header-1',
				'topheader_active'                        => false,
				'topheader_padding_top'                   => 15,
				'topheader_padding_bottom'                => 15,
				'topheader_padding_side'                  => 15,
				'topheader_background_color'              => $lightgray,
				'topheader_text_color'                    => $black,
				'topheader_social_size'                   => 15,
				'topheader_social_spacing'                => 3,
				'topheader_social_color'                  => $black,
				'topheader_search'                        => false,
				'topheader_search_size'                   => 16,
				'topheader_search_padding'                => 14,
				'topheader_search_margin'                 => 11,
				'topheader_search_color'                  => $black,

				// Identity.
				'custom_logo_max_width'                   => 75,
				'custom_logo_mobile_max_width'            => 65,

				// Single Post.
				'singlepost_header_padding_top'           => 70,
				'singlepost_header_padding_bottom'        => 120,
				'singlepost_header_mobile_padding_top'    => 6, // Units: vw.
				'singlepost_header_mobile_padding_bottom' => 12, // Units: vw.
				'singlepost_sidebar'                      => 'none',
				'singlepost_pinterest'                    => true,
				'singlepost_bio'                          => false,
				'singlepost_bio_avatar_size'              => 80,
				'singlepost_bio_text_color'               => $black,
				'singlepost_bio_header_color'             => $black,
				'singlepost_bio_background_color'         => $lightgray,

				// Single Product.
				'single_product'                          => 'single-product-1',
				'singleproduct_gallery_nav'               => 'product-images--line',
				'singleproduct_gallery_nav_color'         => $black,
				'single_product_background_color'         => $lightgray,
				'single_product_breadcrumbs'              => true,
				'single_product_gallery_lightbox'         => true,
				'single_product_gallery_zooming'          => true,

				// Mobile Navigation.
				'mobilenav_background_color'              => $white,
				'mobilenav_text_color'                    => $black,
				'mobilenav_close_background_color'        => $white,
				'mobilenav_close_color'                   => $black,
				'mobilenav_social_size'                   => 20,
				'mobilenav_social_spacing'                => 6,
				'mobilenav_social_color'                  => $black,

				// Site.
				'site_content_padding_top'                => 0,
				'site_content_padding_bottom'             => 5, // Units: vw.
				'site_content_padding_side'               => 5, // Units: vw.
				'site_content_mobile_padding_top'         => 0,
				'site_content_mobile_padding_bottom'      => 0, // Units: vw.
				'site_content_mobile_padding_side'        => 5, // Units: vw.
				'site_html_background_color'              => $lightgray,
				'site_background_color'                   => '',
				'site_accent_color'                       => $accent,
				'site_border'                             => false,
				'site_border_width'                       => '12',
				'site_mobile_border_width'                => '4',
				'site_border_color'                       => $lightgray,
				'site_button_color'                       => $black,
				'site_button_hover_color'                 => $accent,

				// Typography - Header.
				'header_font'                             => $karla_font,
				'header_font_style'                       => 'normal',
				'header_font_weight'                      => 'normal',
				'header_font_transform'                   => 'uppercase',
				'header_font_size'                        => 12, // Units: vw.
				'header_font_lineheight'                  => 0,
				'header_font_letterspacing'               => 2, // Units: vw.

			// Typography - Top Header.
				'topheader_font'                          => $karla_font,
				'topheader_font_style'                    => 'normal',
				'topheader_font_weight'                   => 'normal',
				'topheader_font_transform'                => 'uppercase',
				'topheader_font_size'                     => 11, // Units: vw.
				'topheader_font_lineheight'               => 0,
				'topheader_font_letterspacing'            => 3, // Units: vw.

			// Typography - Shop.
				'shop_font'                               => $karla_font,
				'shop_font_style'                         => 'normal',
				'shop_font_weight'                        => 'normal',
				'shop_font_transform'                     => 'uppercase',
				'shop_font_size'                          => 12, // Units: vw.
				'shop_font_lineheight'                    => 0,
				'shop_font_letterspacing'                 => 2, // Units: vw.

			// Typography - Single Product.
				'singleproduct_font'                      => $body_font,
				'singleproduct_font_style'                => 'normal',
				'singleproduct_font_weight'               => 'normal',
				'singleproduct_font_transform'            => 'none',
				'singleproduct_font_size'                 => 15, // Units: vw.
				'singleproduct_font_lineheight'           => 26,
				'singleproduct_font_letterspacing'        => 0, // Units: vw.

			// Typography - Single Product Header.
				'singleproduct_header_font'               => $header_font,
				'singleproduct_header_font_style'         => 'normal',
				'singleproduct_header_font_weight'        => 'normal',
				'singleproduct_header_font_transform'     => 'none',
				'singleproduct_header_font_size'          => 35, // Units: vw.
				'singleproduct_header_font_lineheight'    => 40,
				'singleproduct_header_font_letterspacing' => 0, // Units: vw.
				'singleproduct_excerpt_color'             => '#777',
				'singleproduct_header_color'              => $black,

				// Typography - Colophon.
				'colophon_font'                           => $body_font,
				'colophon_font_style'                     => 'normal',
				'colophon_font_weight'                    => 'normal',
				'colophon_font_transform'                 => 'none',
				'colophon_font_size'                      => 15, // Units: vw.
				'colophon_font_lineheight'                => 26,
				'colophon_font_letterspacing'             => 0, // Units: vw.

			// Typography - Colophon Menu.
				'colophon_menu_font'                      => $karla_font,
				'colophon_menu_font_style'                => 'normal',
				'colophon_menu_font_weight'               => 'normal',
				'colophon_menu_font_transform'            => 'uppercase',
				'colophon_menu_font_size'                 => 12, // Units: vw.
				'colophon_menu_font_letterspacing'        => 2, // Units: vw.

			// Typography - Footer.
				'footer_font'                             => $body_font,
				'footer_font_style'                       => 'normal',
				'footer_font_weight'                      => 'normal',
				'footer_font_transform'                   => 'none',
				'footer_font_size'                        => 15, // Units: vw.
				'footer_font_lineheight'                  => 26,
				'footer_font_letterspacing'               => 0, // Units: vw.

			// Typography - Header.
				'typekit_id'                              => '',
				'typekit_font_1'                          => '',
				'typekit_font_2'                          => '',
				'global_header_font'                      => $header_font,
				'global_header_font_style'                => 'normal',
				'global_header_font_weight'               => 'normal',
				'global_header_font_transform'            => 'none',
				'global_header_font_letterspacing'        => 0, // Units: vw.
				'global_header_color'                     => $black,

				// Typography - Body.
				'global_body_font'                        => 'Lora',
				'global_body_font_style'                  => 'normal',
				'global_body_font_weight'                 => 'normal',
				'global_body_font_transform'              => 'none',
				'global_body_font_size'                   => 18, // Units: vw.
				'global_body_font_lineheight'             => 32,
				'global_body_font_letterspacing'          => 0, // Units: vw.
				'global_body_color'                       => $black,

			)
		);
	}

	return isset( $defaults[ $name ] ) ? $defaults[ $name ] : null;
}
