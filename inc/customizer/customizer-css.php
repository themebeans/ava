<?php
/**
 * Enqueues front-end CSS for Customizer options.
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

function ava_customizer_css() {

	$shop_product_background_color   = get_theme_mod( 'shop_product_background_color', ava_defaults( 'shop_product_background_color' ) );
	$shop_product_title_color        = get_theme_mod( 'shop_product_title_color', ava_defaults( 'shop_product_title_color' ) );
	$shop_product_side_padding       = get_theme_mod( 'shop_product_side_padding', ava_defaults( 'shop_product_side_padding' ) );
	$shop_product_top_padding        = get_theme_mod( 'shop_product_top_padding', ava_defaults( 'shop_product_top_padding' ) );
	$shop_product_bottom_padding     = get_theme_mod( 'shop_product_bottom_padding', ava_defaults( 'shop_product_bottom_padding' ) );
	$shop_salebadge_background_color = get_theme_mod( 'shop_salebadge_background_color', ava_defaults( 'shop_salebadge_background_color' ) );
	$shop_salebadge_color            = get_theme_mod( 'shop_salebadge_color', ava_defaults( 'shop_salebadge_color' ) );
	$shop_salebadge_size             = get_theme_mod( 'shop_salebadge_size', ava_defaults( 'shop_salebadge_size' ) );
	$shop_layout_columns_gutter      = get_theme_mod( 'shop_layout_columns_gutter', ava_defaults( 'shop_layout_columns_gutter' ) );
	$single_product_background_color = get_theme_mod( 'single_product_background_color', ava_defaults( 'single_product_background_color' ) );

	$shop_layout_columns_gutter_66 = number_format( $shop_layout_columns_gutter * .44, 2, '.', '' );
	$shop_layout_columns_gutter_50 = number_format( $shop_layout_columns_gutter * .50, 2, '.', '' );
	$shop_layout_columns_gutter_33 = number_format( $shop_layout_columns_gutter * .666666666, 2, '.', '' );
	$shop_layout_columns_gutter_25 = number_format( $shop_layout_columns_gutter * .75, 2, '.', '' );
	$shop_layout_columns_gutter_20 = number_format( $shop_layout_columns_gutter * .80, 2, '.', '' );
	$shop_layout_columns_gutter_16 = number_format( $shop_layout_columns_gutter * .84, 2, '.', '' );
	$shop_layout_columns_gutter_14 = number_format( $shop_layout_columns_gutter * .86, 2, '.', '' );

	$colophon_toppadding          = get_theme_mod( 'colophon_padding_top', ava_defaults( 'colophon_padding_top' ) );
	$colophon_bottompadding       = get_theme_mod( 'colophon_padding_bottom', ava_defaults( 'colophon_padding_bottom' ) );
	$colophon_maxwidth            = get_theme_mod( 'colophon_max_width', ava_defaults( 'colophon_max_width' ) );
	$colophon_mobiletoppadding    = get_theme_mod( 'colophon_mobile_padding_top', ava_defaults( 'colophon_mobile_padding_top' ) );
	$colophon_mobilebottompadding = get_theme_mod( 'colophon_mobile_padding_bottom', ava_defaults( 'colophon_mobile_padding_bottom' ) );
	$colophon_backgroundcolor     = get_theme_mod( 'colophon_background_color', ava_defaults( 'colophon_background_color' ) );
	$colophon_text_color          = get_theme_mod( 'colophon_text_color', ava_defaults( 'colophon_text_color' ) );

	$colophon_copyrightsidepadding = get_theme_mod( 'colophon_copyright_padding_side', ava_defaults( 'colophon_copyright_padding_side' ) );
	$colophon_social_color         = get_theme_mod( 'colophon_social_color', ava_defaults( 'colophon_social_color' ) );
	$colophon_social_size          = get_theme_mod( 'colophon_social_size', ava_defaults( 'colophon_social_size' ) );
	$colophon_social_spacing       = get_theme_mod( 'colophon_social_spacing', ava_defaults( 'colophon_social_spacing' ) );
	$colophon_largetoppadding      = get_theme_mod( 'colophon_large_padding_top', ava_defaults( 'colophon_large_padding_top' ) );
	$colophon_largebottompadding   = get_theme_mod( 'colophon_large_padding_bottom', ava_defaults( 'colophon_large_padding_bottom' ) );

	$flyout_background        = get_theme_mod( 'flyout_background_color', ava_defaults( 'flyout_background_color' ) );
	$flyout_textcolor         = get_theme_mod( 'flyout_text_color', ava_defaults( 'flyout_text_color' ) );
	$flyout_overlayopacity    = get_theme_mod( 'flyout_overlay_opacity', ava_defaults( 'flyout_overlay_opacity' ) ) * .01;
	$flyout_overlaybackground = get_theme_mod( 'flyout_overlay_background_color', ava_defaults( 'flyout_overlay_background_color' ) );
	$flyout_overlaybackground = ava_hex2rgb( $flyout_overlaybackground );
	$flyout_overlaybackground = vsprintf( 'rgba( %1$s, %2$s, %3$s, ' . $flyout_overlayopacity . ')', $flyout_overlaybackground );

	$footer_toppadding          = get_theme_mod( 'footer_padding_top', ava_defaults( 'footer_padding_top' ) );
	$footer_bottompadding       = get_theme_mod( 'footer_padding_bottom', ava_defaults( 'footer_padding_bottom' ) );
	$footer_mobiletoppadding    = get_theme_mod( 'footer_mobile_padding_top', ava_defaults( 'footer_mobile_padding_top' ) );
	$footer_mobilebottompadding = get_theme_mod( 'footer_mobile_padding_bottom', ava_defaults( 'footer_mobile_padding_bottom' ) );
	$footer_largetoppadding     = get_theme_mod( 'footer_large_padding_top', ava_defaults( 'footer_large_padding_top' ) );
	$footer_largebottompadding  = get_theme_mod( 'footer_large_padding_bottom', ava_defaults( 'footer_large_padding_bottom' ) );
	$footer_backgroundcolor     = get_theme_mod( 'footer_background_color', ava_defaults( 'footer_background_color' ) );
	$footer_textcolor           = get_theme_mod( 'footer_text_color', ava_defaults( 'footer_text_color' ) );
	$footer_headercolor         = get_theme_mod( 'footer_header_color', ava_defaults( 'footer_header_color' ) );
	$footer_headeropacity       = get_theme_mod( 'footer_header_opacity', ava_defaults( 'footer_header_opacity' ) ) * .01;
	$footer_right_margintop     = $footer_mobilebottompadding;

	$header_toppadding          = get_theme_mod( 'header_padding_top', ava_defaults( 'header_padding_top' ) );
	$header_sidepadding         = get_theme_mod( 'header_padding_side', ava_defaults( 'header_padding_side' ) );
	$header_mobileheight        = get_theme_mod( 'header_mobile_height', ava_defaults( 'header_mobile_height' ) );
	$header_bottompadding       = get_theme_mod( 'header_padding_bottom', ava_defaults( 'header_padding_bottom' ) );
	$header_backgroundcolor     = get_theme_mod( 'header_background_color', ava_defaults( 'header_background_color' ) );
	$header_social_color        = get_theme_mod( 'header_social_color', ava_defaults( 'header_social_color' ) );
	$header_socialsize          = get_theme_mod( 'header_socialsize', ava_defaults( 'header_socialsize' ) );
	$header_social_padding_side = get_theme_mod( 'header_social_padding_side', ava_defaults( 'header_social_padding_side' ) );
	$header_social_spacing      = get_theme_mod( 'header_social_spacing', ava_defaults( 'header_social_spacing' ) );
	$header_searchcolor         = get_theme_mod( 'header_search_color', ava_defaults( 'header_search_color' ) );
	$header_searchsize          = get_theme_mod( 'header_search_size', ava_defaults( 'header_search_size' ) );
	$header_searchpadding       = get_theme_mod( 'header_search_padding', ava_defaults( 'header_search_padding' ) );
	$header_checkout_color      = get_theme_mod( 'header_checkout_color', ava_defaults( 'header_checkout_color' ) );
	$header_checkout_size       = get_theme_mod( 'header_checkout_size', ava_defaults( 'header_checkout_size' ) );
	$header_textcolor           = get_theme_mod( 'header_text_color', ava_defaults( 'header_text_color' ) );
	$header_flyout_color        = get_theme_mod( 'header_flyout_color', ava_defaults( 'header_flyout_color' ) );
	$header_flyout_size         = get_theme_mod( 'header_flyout_size', ava_defaults( 'header_flyout_size' ) );

	$search_paddingtop       = $header_bottompadding - 5;
	$search_mobilepaddingtop = $header_mobileheight - 5;

	$top_header_toppadding      = get_theme_mod( 'topheader_padding_top', ava_defaults( 'topheader_padding_top' ) );
	$top_header_bottompadding   = get_theme_mod( 'topheader_padding_bottom', ava_defaults( 'topheader_padding_bottom' ) );
	$top_header_sidepadding     = get_theme_mod( 'topheader_padding_side', ava_defaults( 'topheader_padding_side' ) );
	$top_header_backgroundcolor = get_theme_mod( 'topheader_background_color', ava_defaults( 'topheader_background_color' ) );
	$top_header_social_color    = get_theme_mod( 'topheader_social_color', ava_defaults( 'topheader_social_color' ) );
	$top_header_socialsize      = get_theme_mod( 'topheader_social_size', ava_defaults( 'topheader_social_size' ) );
	$top_header_social_spacing  = get_theme_mod( 'topheader_social_spacing', ava_defaults( 'topheader_social_spacing' ) );
	$top_header_searchcolor     = get_theme_mod( 'topheader_search_color', ava_defaults( 'topheader_search_color' ) );
	$top_header_searchsize      = get_theme_mod( 'topheader_search_size', ava_defaults( 'topheader_search_size' ) );
	$top_header_searchpadding   = get_theme_mod( 'topheader_search_padding', ava_defaults( 'topheader_search_padding' ) );
	$top_header_searchmargin    = get_theme_mod( 'topheader_search_margin', ava_defaults( 'topheader_search_margin' ) );
	$top_header_textcolor       = get_theme_mod( 'topheader_text_color', ava_defaults( 'topheader_text_color' ) );

	$logo_maxwidth       = get_theme_mod( 'custom_logo_max_width', ava_defaults( 'custom_logo_max_width' ) );
	$logo_mobilemaxwidth = get_theme_mod( 'custom_logo_mobile_max_width', ava_defaults( 'custom_logo_mobile_max_width' ) );

	$singlepost_avatarsize                = get_theme_mod( 'singlepost_bio_avatar_size', ava_defaults( 'singlepost_bio_avatar_size' ) );
	$singlepost_avatar_textcolor          = get_theme_mod( 'singlepost_bio_text_color', ava_defaults( 'singlepost_bio_text_color' ) );
	$singlepost_avatar_headertextcolor    = get_theme_mod( 'singlepost_bio_header_color', ava_defaults( 'singlepost_bio_header_color' ) );
	$singlepost_avatar_backgroundcolor    = get_theme_mod( 'singlepost_bio_background_color', ava_defaults( 'singlepost_bio_background_color' ) );
	$singlepost_header_topmargin          = get_theme_mod( 'singlepost_header_padding_top', ava_defaults( 'singlepost_header_padding_top' ) );
	$singlepost_header_mobiletopmargin    = get_theme_mod( 'singlepost_header_mobile_padding_top', ava_defaults( 'singlepost_header_mobile_padding_top' ) );
	$singlepost_header_bottommargin       = get_theme_mod( 'singlepost_header_padding_bottom', ava_defaults( 'singlepost_header_padding_bottom' ) );
	$singlepost_header_mobilebottommargin = get_theme_mod( 'singlepost_header_mobile_padding_bottom', ava_defaults( 'singlepost_header_mobile_padding_bottom' ) );

	$mobilemenu_background      = get_theme_mod( 'mobilenav_background_color', ava_defaults( 'mobilenav_background_color' ) );
	$mobilemenu_textcolor       = get_theme_mod( 'mobilenav_text_color', ava_defaults( 'mobilenav_text_color' ) );
	$mobilemenu_socialcolor     = get_theme_mod( 'mobilenav_social_color', ava_defaults( 'mobilenav_social_color' ) );
	$mobilemenu_socialsize      = get_theme_mod( 'mobilenav_social_size', ava_defaults( 'mobilenav_social_size' ) );
	$mobilemenu_socialspacing   = get_theme_mod( 'mobilenav_social_spacing', ava_defaults( 'mobilenav_social_spacing' ) );
	$mobilemenu_closebackground = get_theme_mod( 'mobilenav_close_background_color', ava_defaults( 'mobilenav_close_background_color' ) );
	$mobilemenu_closesvgcolor   = get_theme_mod( 'mobilenav_close_color', ava_defaults( 'mobilenav_close_color' ) );

	$theme_accent_color              = get_theme_mod( 'site_accent_color', ava_defaults( 'site_accent_color' ) );
	$site_button_color               = get_theme_mod( 'site_button_color', ava_defaults( 'site_button_color' ) );
	$site_button_hover_color         = get_theme_mod( 'site_button_hover_color', ava_defaults( 'site_button_hover_color' ) );
	$site_sidepadding                = get_theme_mod( 'site_content_padding_side', ava_defaults( 'site_content_padding_side' ) );
	$site_mobilesidepadding          = get_theme_mod( 'site_content_mobile_padding_side', ava_defaults( 'site_content_mobile_padding_side' ) );
	$site_backgroundcolor            = get_theme_mod( 'site_background_color', ava_defaults( 'site_background_color' ) );
	$site_htmlbackgroundcolor        = get_theme_mod( 'site_html_background_color', ava_defaults( 'site_html_background_color' ) );
	$site_border_width               = get_theme_mod( 'site_border_width', ava_defaults( 'site_border_width' ) );
	$site_mobileborderwidth          = get_theme_mod( 'site_mobile_border_width', ava_defaults( 'site_mobile_border_width' ) );
	$site_search_width               = number_format( $site_border_width * 2 );
	$site_border_color               = get_theme_mod( 'site_border_color', ava_defaults( 'site_border_color' ) );
	$sitecontent_toppadding          = get_theme_mod( 'site_content_padding_top', ava_defaults( 'site_content_padding_top' ) );
	$sitecontent_bottompadding       = get_theme_mod( 'site_content_padding_bottom', ava_defaults( 'site_content_padding_bottom' ) );
	$sitecontent_mobiletoppadding    = get_theme_mod( 'site_content_mobile_padding_top', ava_defaults( 'site_content_mobile_padding_top' ) );
	$sitecontent_mobilebottompadding = get_theme_mod( 'site_content_mobile_padding_bottom', ava_defaults( 'site_content_mobile_padding_bottom' ) );
	$infinite_paddingtop             = $sitecontent_bottompadding;
	$infinite_mobilepaddingtop       = $sitecontent_mobilebottompadding;

	$header_font               = get_theme_mod( 'header_font', ava_defaults( 'header_font' ) );
	$header_font_size          = get_theme_mod( 'header_font_size', ava_defaults( 'header_font_size' ) );
	$header_font_style         = get_theme_mod( 'header_font_style', ava_defaults( 'header_font_style' ) );
	$header_font_weight        = get_theme_mod( 'header_font_weight', ava_defaults( 'header_font_weight' ) );
	$header_font_transform     = get_theme_mod( 'header_font_transform', ava_defaults( 'header_font_transform' ) );
	$header_font_lineheight    = get_theme_mod( 'header_font_lineheight', ava_defaults( 'header_font_lineheight' ) );
	$header_font_letterspacing = get_theme_mod( 'header_font_letterspacing', ava_defaults( 'header_font_letterspacing' ) );

	$topheader_font               = get_theme_mod( 'topheader_font', ava_defaults( 'topheader_font' ) );
	$topheader_font_size          = get_theme_mod( 'topheader_font_size', ava_defaults( 'topheader_font_size' ) );
	$topheader_font_style         = get_theme_mod( 'topheader_font_style', ava_defaults( 'topheader_font_style' ) );
	$topheader_font_weight        = get_theme_mod( 'topheader_font_weight', ava_defaults( 'topheader_font_weight' ) );
	$topheader_font_transform     = get_theme_mod( 'topheader_font_transform', ava_defaults( 'topheader_font_transform' ) );
	$topheader_font_lineheight    = get_theme_mod( 'topheader_font_lineheight', ava_defaults( 'topheader_font_lineheight' ) );
	$topheader_font_letterspacing = get_theme_mod( 'topheader_font_letterspacing', ava_defaults( 'topheader_font_letterspacing' ) );

	$shop_font               = get_theme_mod( 'shop_font', ava_defaults( 'shop_font' ) );
	$shop_font_size          = get_theme_mod( 'shop_font_size', ava_defaults( 'shop_font_size' ) );
	$shop_font_style         = get_theme_mod( 'shop_font_style', ava_defaults( 'shop_font_style' ) );
	$shop_font_weight        = get_theme_mod( 'shop_font_weight', ava_defaults( 'shop_font_weight' ) );
	$shop_font_transform     = get_theme_mod( 'shop_font_transform', ava_defaults( 'shop_font_transform' ) );
	$shop_font_letterspacing = get_theme_mod( 'shop_font_letterspacing', ava_defaults( 'shop_font_letterspacing' ) );

	$singleproduct_header_font               = get_theme_mod( 'singleproduct_header_font', ava_defaults( 'global_header_font' ) );
	$singleproduct_header_font_size          = get_theme_mod( 'singleproduct_header_font_size', ava_defaults( 'singleproduct_header_font_size' ) );
	$singleproduct_header_font_style         = get_theme_mod( 'singleproduct_header_font_style', ava_defaults( 'singleproduct_header_font_style' ) );
	$singleproduct_header_font_weight        = get_theme_mod( 'singleproduct_header_font_weight', ava_defaults( 'singleproduct_header_font_weight' ) );
	$singleproduct_header_font_transform     = get_theme_mod( 'singleproduct_header_font_transform', ava_defaults( 'singleproduct_header_font_transform' ) );
	$singleproduct_header_font_lineheight    = get_theme_mod( 'singleproduct_header_font_lineheight', ava_defaults( 'singleproduct_header_font_lineheight' ) );
	$singleproduct_header_font_letterspacing = get_theme_mod( 'singleproduct_header_font_letterspacing', ava_defaults( 'singleproduct_header_font_letterspacing' ) );

	$singleproduct_font               = get_theme_mod( 'singleproduct_font', ava_defaults( 'singleproduct_font' ) );
	$singleproduct_font_size          = get_theme_mod( 'singleproduct_font_size', ava_defaults( 'singleproduct_font_size' ) );
	$singleproduct_font_style         = get_theme_mod( 'singleproduct_font_style', ava_defaults( 'singleproduct_font_style' ) );
	$singleproduct_font_weight        = get_theme_mod( 'singleproduct_font_weight', ava_defaults( 'singleproduct_font_weight' ) );
	$singleproduct_font_transform     = get_theme_mod( 'singleproduct_font_transform', ava_defaults( 'singleproduct_font_transform' ) );
	$singleproduct_font_lineheight    = get_theme_mod( 'singleproduct_font_lineheight', ava_defaults( 'singleproduct_font_lineheight' ) );
	$singleproduct_font_letterspacing = get_theme_mod( 'singleproduct_font_letterspacing', ava_defaults( 'singleproduct_font_letterspacing' ) );
	$singleproduct_excerpt_color      = get_theme_mod( 'singleproduct_excerpt_color', ava_defaults( 'singleproduct_excerpt_color' ) );
	$singleproduct_header_color       = get_theme_mod( 'singleproduct_header_color', ava_defaults( 'singleproduct_header_color' ) );

	$colophon_font               = get_theme_mod( 'colophon_font', ava_defaults( 'colophon_font' ) );
	$colophon_font_size          = get_theme_mod( 'colophon_font_size', ava_defaults( 'colophon_font_size' ) );
	$colophon_font_style         = get_theme_mod( 'colophon_font_style', ava_defaults( 'colophon_font_style' ) );
	$colophon_font_weight        = get_theme_mod( 'colophon_font_weight', ava_defaults( 'colophon_font_weight' ) );
	$colophon_font_transform     = get_theme_mod( 'colophon_font_transform', ava_defaults( 'colophon_font_transform' ) );
	$colophon_font_lineheight    = get_theme_mod( 'colophon_font_lineheight', ava_defaults( 'colophon_font_lineheight' ) );
	$colophon_font_letterspacing = get_theme_mod( 'colophon_font_letterspacing', ava_defaults( 'colophon_font_letterspacing' ) );

	$colophon_menu_font               = get_theme_mod( 'colophon_menu_font', ava_defaults( 'colophon_menu_font' ) );
	$colophon_menu_font_size          = get_theme_mod( 'colophon_menu_font_size', ava_defaults( 'colophon_menu_font_size' ) );
	$colophon_menu_font_style         = get_theme_mod( 'colophon_menu_font_style', ava_defaults( 'colophon_menu_font_style' ) );
	$colophon_menu_font_weight        = get_theme_mod( 'colophon_menu_font_weight', ava_defaults( 'colophon_menu_font_weight' ) );
	$colophon_menu_font_transform     = get_theme_mod( 'colophon_menu_font_transform', ava_defaults( 'colophon_menu_font_transform' ) );
	$colophon_menu_font_letterspacing = get_theme_mod( 'colophon_menu_font_letterspacing', ava_defaults( 'colophon_menu_font_letterspacing' ) );

	$footer_font               = get_theme_mod( 'footer_font', ava_defaults( 'footer_font' ) );
	$footer_font_size          = get_theme_mod( 'footer_font_size', ava_defaults( 'footer_font_size' ) );
	$footer_font_style         = get_theme_mod( 'footer_font_style', ava_defaults( 'footer_font_style' ) );
	$footer_font_weight        = get_theme_mod( 'footer_font_weight', ava_defaults( 'footer_font_weight' ) );
	$footer_font_transform     = get_theme_mod( 'footer_font_transform', ava_defaults( 'footer_font_transform' ) );
	$footer_font_lineheight    = get_theme_mod( 'footer_font_lineheight', ava_defaults( 'footer_font_lineheight' ) );
	$footer_font_letterspacing = get_theme_mod( 'footer_font_letterspacing', ava_defaults( 'footer_font_letterspacing' ) );

	$global_header_font               = get_theme_mod( 'global_header_font', ava_defaults( 'global_header_font' ) );
	$global_header_font_style         = get_theme_mod( 'global_header_font_style', ava_defaults( 'global_header_font_style' ) );
	$global_header_font_weight        = get_theme_mod( 'global_header_font_weight', ava_defaults( 'global_header_font_weight' ) );
	$global_header_font_transform     = get_theme_mod( 'global_header_font_transform', ava_defaults( 'global_header_font_transform' ) );
	$global_header_font_letterspacing = get_theme_mod( 'global_header_font_letterspacing', ava_defaults( 'global_header_font_letterspacing' ) );
	$global_header_color              = get_theme_mod( 'global_header_color', ava_defaults( 'global_header_color' ) );

	$global_body_font               = get_theme_mod( 'global_body_font', ava_defaults( 'global_body_font' ) );
	$global_body_font_size          = get_theme_mod( 'global_body_font_size', ava_defaults( 'global_body_font_size' ) );
	$global_body_font_style         = get_theme_mod( 'global_body_font_style', ava_defaults( 'global_body_font_style' ) );
	$global_body_font_weight        = get_theme_mod( 'global_body_font_weight', ava_defaults( 'global_body_font_weight' ) );
	$global_body_font_transform     = get_theme_mod( 'global_body_font_transform', ava_defaults( 'global_body_font_transform' ) );
	$global_body_font_lineheight    = get_theme_mod( 'global_body_font_lineheight', ava_defaults( 'global_body_font_lineheight' ) );
	$global_body_font_letterspacing = get_theme_mod( 'global_body_font_letterspacing', ava_defaults( 'global_body_font_letterspacing' ) );
	$global_body_color              = get_theme_mod( 'global_body_color', ava_defaults( 'global_body_color' ) );

	$singleproduct_gallery_nav_color = get_theme_mod( 'singleproduct_gallery_nav_color', ava_defaults( 'singleproduct_gallery_nav_color' ) );

	$portfolio_archive_overlay      = get_theme_mod( 'portfolio_archive_overlay', ava_defaults( 'portfolio_archive_overlay' ) );
	$portfolio_archive_overlay_text = get_theme_mod( 'portfolio_archive_overlay_text', ava_defaults( 'portfolio_archive_overlay_text' ) );

	$css =
	'
body.archive .portfolio--mia .project__overlay {
	background-color: ' . esc_attr( $portfolio_archive_overlay ) . ';
}

body.archive .portfolio--mia .project__overlay h2.entry-title {
	color: ' . esc_attr( $portfolio_archive_overlay_text ) . ';
}

@media only screen and (min-width: 769px) {
  body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product {
  	width: calc( 50% - ' . $shop_layout_columns_gutter_50 . 'px );
    margin-right: ' . $shop_layout_columns_gutter . 'px;
    margin-bottom: ' . $shop_layout_columns_gutter . 'px;
  }

  body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product:nth-child(2n) {
    margin-right: 0;
  }
}

@media only screen and (min-width: 1100px) {
 body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product {
 	width: calc( 33.33333333333333% - ' . $shop_layout_columns_gutter_33 . 'px );
    margin-right: ' . $shop_layout_columns_gutter . 'px;
    margin-bottom: ' . $shop_layout_columns_gutter . 'px;
  }
  body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product:nth-child(2n + 1),
  body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product:nth-child(-n + 2),
  body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product:nth-child(2n) {
    margin-right: ' . $shop_layout_columns_gutter . 'px;
  }
  body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product:nth-child(3n) {
    margin-right: 0;
  }
}

@media only screen and (min-width: 1400px) {
  body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product:nth-child(2n + 1),
  body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product:nth-child(-n + 2),
  body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product:nth-child(2n),
  body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product:nth-child(3n + 2),
  body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product:nth-child(-n + 3),
  body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product:nth-child(3n) {
  	width: calc( 25% - ' . $shop_layout_columns_gutter_25 . 'px );
    margin-right: ' . $shop_layout_columns_gutter . 'px;
  }
  body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product:nth-child(4n) {
    margin-right: 0;
  }
}














@media only screen and (min-width: 769px) {
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product {
    width: calc( 33.33333333333333% - ' . $shop_layout_columns_gutter_33 . 'px );
  }
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(2n + 1),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 2),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(2n) {
    margin-bottom: ' . $shop_layout_columns_gutter . 'px;
    margin-right: ' . $shop_layout_columns_gutter . 'px;
  }
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(3n) {
    margin-right: 0;
  }
}

@media only screen and (min-width: 900px) {
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product {
    width: calc( 25% - ' . $shop_layout_columns_gutter_25 . 'px );
  }
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(2n + 1),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 2),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(2n),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(3n + 2),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 3),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(3n) {
  	margin-bottom: ' . $shop_layout_columns_gutter . 'px;
    margin-right: ' . $shop_layout_columns_gutter . 'px;
  }
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(4n) {
    margin-right: 0;
  }
}

@media only screen and (min-width: 1100px) {
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product {
    width: calc( 20% - ' . $shop_layout_columns_gutter_20 . 'px );
  }
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(2n + 1),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 2),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(2n),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(3n + 2),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 3),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(3n),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(4n + 3),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 4),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(4n) {
  	margin-bottom: ' . $shop_layout_columns_gutter . 'px;
    margin-right: ' . $shop_layout_columns_gutter . 'px;
  }
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(5n) {
    margin-right: 0;
  }
}

@media only screen and (min-width: 1500px) {
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product {
    width: calc( 16.6666666667% - ' . $shop_layout_columns_gutter_16 . 'px );
  }
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(2n + 1),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 2),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(2n),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(3n + 2),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 3),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(3n),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(4n + 3),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 4),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(4n),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(5n + 4),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 5),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(5n) {
  	margin-bottom: ' . $shop_layout_columns_gutter . 'px;
    margin-right: ' . $shop_layout_columns_gutter . 'px;
  }
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(6n) {
    margin-right: 0;
  }
}

@media only screen and (min-width: 1900px) {
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product {
    width: calc( 14.2857142857% - ' . $shop_layout_columns_gutter_14 . 'px );
  }
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(2n + 1),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 2),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(2n),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(3n + 2),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 3),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(3n),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(4n + 3),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 4),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(4n),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(5n + 4),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 5),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(5n),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(6n + 5),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 6),
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(6n) {
  	margin-bottom: ' . $shop_layout_columns_gutter . 'px;
    margin-right: ' . $shop_layout_columns_gutter . 'px;
  }
  body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(7n) {
    margin-right: 0;
  }
}

@media only screen and (min-width: 900px) {
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product {
		width: calc( 33.33333333333333% - ' . $shop_layout_columns_gutter_33 . 'px );
	}
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(2n + 1),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 2),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(2n) {
		margin-bottom: ' . $shop_layout_columns_gutter . 'px;
    	margin-right: ' . $shop_layout_columns_gutter . 'px;
	}
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(3n) {
		margin-right: 0;
	}
}

@media only screen and (min-width: 1400px) {
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product {
		width: calc( 25% - ' . $shop_layout_columns_gutter_25 . 'px );
	}
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(2n + 1),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 2),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(2n),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(3n + 2),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 3),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(3n) {
		margin-bottom: ' . $shop_layout_columns_gutter . 'px;
    	margin-right: ' . $shop_layout_columns_gutter . 'px;
	}
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(4n) {
		margin-right: 0;
	}
}

@media only screen and (min-width: 1800px) {
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product {
		width: calc( 20% - ' . $shop_layout_columns_gutter_20 . 'px );
	}
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(2n + 1),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 2),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(2n),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(3n + 2),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 3),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(3n),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(4n + 3),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 4),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(4n) {
		margin-bottom: ' . $shop_layout_columns_gutter . 'px;
    	margin-right: ' . $shop_layout_columns_gutter . 'px;
	}
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(5n) {
		margin-right: 0;
	}
}

@media only screen and (min-width: 2300px) {
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product {
		width: calc( 16.6666666667% - ' . $shop_layout_columns_gutter_16 . 'px );
	}
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(2n + 1),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 2),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(2n),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(3n + 2),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 3),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(3n),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(4n + 3),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 4),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(4n),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(5n + 4),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 5),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(5n) {
		margin-bottom: ' . $shop_layout_columns_gutter . 'px;
    	margin-right: ' . $shop_layout_columns_gutter . 'px;
	}
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(6n) {
		margin-right: 0;
	}
}

@media only screen and (min-width: 2700px) {
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product {
		width: calc( 14.2857142857% - ' . $shop_layout_columns_gutter_14 . 'px );
	}
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(2n + 1),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 2),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(2n),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(3n + 2),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 3),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(3n),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(4n + 3),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 4),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(4n),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(5n + 4),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 5),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(5n),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(6n + 5),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 6),
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(6n) {
		margin-bottom: ' . $shop_layout_columns_gutter . 'px;
    	margin-right: ' . $shop_layout_columns_gutter . 'px;
	}
	body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(7n) {
		margin-right: 0;
	}
}

    body .product .onsale {
    	width: ' . esc_attr( $shop_salebadge_size ) . 'px;
	}

	body .product .onsale:not(.style--default) {
    	height: ' . esc_attr( $shop_salebadge_size ) . 'px;
    	line-height: ' . esc_attr( $shop_salebadge_size ) . 'px;
	}

    body #order_review .button {
    	background-color: ' . esc_attr( $site_button_color ) . ';
	}

    body #order_review .button:hover {
    	background-color: ' . esc_attr( $site_button_hover_color ) . ';
	}

    body .product-images--dots .flex-control-nav a.flex-active {
        background-color: ' . esc_attr( $singleproduct_gallery_nav_color ) . ';
    }

    body .product-images--circles .flex-control-nav a {
        box-shadow: inset 0 0 0 2px ' . esc_attr( $singleproduct_gallery_nav_color ) . ';
    }

    body .product-images--circles .flex-control-nav a.flex-active {
        box-shadow: inset 0 0 0 8px ' . esc_attr( $singleproduct_gallery_nav_color ) . ';
    }

    body .product-images--line .flex-control-nav a.flex-active::after {
        background-color: ' . esc_attr( $singleproduct_gallery_nav_color ) . ';
    }

    @media screen and (max-width: 768px) {
        body:not(.blog):not(.search):not(.archive) .site-content .site-content__inner {
            padding-top: ' . esc_attr( $sitecontent_mobiletoppadding ) . 'vw;
        }
    }

    h1, h2, h3, h4, h5:not(.minibar-title), .single-portfolio .navigation .post-title, h6, blockquote, .mobile-navigation a, .site-search-form .search-field, #infinite-navigation a, body .cd-headline i, body .project-caption {
        font-family: ' . esc_attr( $global_header_font ) . ';
        font-style: ' . esc_attr( $global_header_font_style ) . ';
        font-weight: ' . esc_attr( $global_header_font_weight ) . ';
        text-transform: ' . esc_attr( $global_header_font_transform ) . ';
        letter-spacing: ' . esc_attr( $global_header_font_letterspacing ) . 'px;
    }

    h1, h2:not(.entry-excerpt):not(.upload-message), h3, h4, h5:not(.minibar-title), .single-portfolio .navigation .post-title, h6, blockquote, .mobile-navigation a, .site-search-form .search-field, #infinite-navigation a, body .cd-headline i, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover {
        color: ' . esc_attr( $global_header_color ) . ';
    }


@media (min-width: 600px) {
    .cd-words-wrapper.selected b, .cd-words-wrapper.selected i {
        background: ' . esc_attr( $global_header_color ) . ';
    }
}

    body,
    body .project-meta,
    body .author-info,
    body .comments-area,
    body .author-description,
    body .portfolio .entry-content,
    body .post .entry-content,
    body .fl-accordion-button-label,
    body label,
    body .single-product-description,
    body:not(.single-product):not(.woocommerce-checkout) .single-page .entry-content,
    body:not(.single-product):not(.woocommerce-checkout) .single-page .entry-content p,
    body:not(.single-product) .comment-form-comment input,
    body:not(.single-product) .comment-form-comment textarea, body:not(.single-product) .comment-form-author input,
    body:not(.single-product) .comment-form-author textarea, body:not(.single-product) .comment-form-email input,
    body:not(.single-product) .comment-form-email textarea {
            font-family: ' . esc_attr( $global_body_font ) . ';
            font-style: ' . esc_attr( $global_body_font_style ) . ';
            font-weight: ' . esc_attr( $global_body_font_weight ) . ';
            text-transform: ' . esc_attr( $global_body_font_transform ) . ';
            letter-spacing: ' . esc_attr( $global_body_font_letterspacing ) . 'px;
            font-size: ' . esc_attr( $global_body_font_size ) . 'px;
            line-height: ' . esc_attr( $global_body_font_lineheight ) . 'px;
            color: ' . esc_attr( $global_body_color ) . ';
    }

    .post .entry-footer .cat-links a, .post .entry-footer .tags-links a, .search-results .posts--default article .entry-footer .cat-links a, .search-results .posts--default article .entry-footer .tags-links a {
        color: ' . esc_attr( $global_body_color ) . ';
    }

    body .site-header .main-navigation a,
    body .site-mobile-header .main-navigation a {
        font-family: ' . esc_attr( $header_font ) . ';
        font-style: ' . esc_attr( $header_font_style ) . ';
        font-weight: ' . esc_attr( $header_font_weight ) . ';
        text-transform: ' . esc_attr( $header_font_transform ) . ';
        font-size: ' . esc_attr( $header_font_size ) . 'px;
        letter-spacing: ' . esc_attr( $header_font_letterspacing ) . 'px;
    }

    body .site-top-header {
        font-family: ' . esc_attr( $topheader_font ) . ';
        font-style: ' . esc_attr( $topheader_font_style ) . ';
        font-weight: ' . esc_attr( $topheader_font_weight ) . ';
        text-transform: ' . esc_attr( $topheader_font_transform ) . ';
        font-size: ' . esc_attr( $topheader_font_size ) . 'px;
        letter-spacing: ' . esc_attr( $topheader_font_letterspacing ) . 'px;
    }

    body .product-grid .product h4, body .product-grid .product .product-viewmore, body .product-grid .product .price {
        font-family: ' . esc_attr( $shop_font ) . ';
        font-style: ' . esc_attr( $shop_font_style ) . ';
        font-weight: ' . esc_attr( $shop_font_weight ) . ';
        text-transform: ' . esc_attr( $shop_font_transform ) . ';
        font-size: ' . esc_attr( $shop_font_size ) . 'px;
        letter-spacing: ' . esc_attr( $shop_font_letterspacing ) . 'px;
    }

    body.single-product .entry-summary p:not(.price),
    body.single-product .entry-summary .product_meta,
    body.single-product .entry-summary .woocommerce-product-details__short-description ul {
        font-family: ' . esc_attr( $singleproduct_font ) . ';
        font-style: ' . esc_attr( $singleproduct_font_style ) . ';
        font-weight: ' . esc_attr( $singleproduct_font_weight ) . ';
        text-transform: ' . esc_attr( $singleproduct_font_transform ) . ';
        font-size: ' . esc_attr( $singleproduct_font_size ) . 'px;
        letter-spacing: ' . esc_attr( $singleproduct_font_letterspacing ) . 'px;
        line-height: ' . esc_attr( $singleproduct_font_lineheight ) . 'px;
        color: ' . esc_attr( $singleproduct_excerpt_color ) . ';
    }

    body .upsells.products h2, body .related.products h2, body #woocommerce-reviews-trigger, body #woocommerce-info-trigger,  .product_title.entry-title {
        font-family: ' . esc_attr( $singleproduct_header_font ) . ';
        font-style: ' . esc_attr( $singleproduct_header_font_style ) . ';
        font-weight: ' . esc_attr( $singleproduct_header_font_weight ) . ';
        text-transform: ' . esc_attr( $singleproduct_header_font_transform ) . ';
        font-size: ' . esc_attr( $singleproduct_header_font_size ) . 'px;
        letter-spacing: ' . esc_attr( $singleproduct_header_font_letterspacing ) . 'px;
        line-height: ' . esc_attr( $singleproduct_header_font_lineheight ) . 'px;
        color: ' . esc_attr( $singleproduct_header_color ) . ';
    }

    body .site-colophon {
        font-family: ' . esc_attr( $colophon_font ) . ';
        font-style: ' . esc_attr( $colophon_font_style ) . ';
        font-weight: ' . esc_attr( $colophon_font_weight ) . ';
        text-transform: ' . esc_attr( $colophon_font_transform ) . ';
        font-size: ' . esc_attr( $colophon_font_size ) . 'px;
        letter-spacing: ' . esc_attr( $colophon_font_letterspacing ) . 'px;
        line-height: ' . esc_attr( $colophon_font_lineheight ) . 'px;
    }

    body .site-colophon .main-navigation {
        font-family: ' . esc_attr( $colophon_menu_font ) . ';
        font-style: ' . esc_attr( $colophon_menu_font_style ) . ';
        font-weight: ' . esc_attr( $colophon_menu_font_weight ) . ';
        text-transform: ' . esc_attr( $colophon_menu_font_transform ) . ';
        font-size: ' . esc_attr( $colophon_menu_font_size ) . 'px;
        letter-spacing: ' . esc_attr( $colophon_menu_font_letterspacing ) . 'px;
    }

    body .site-footer {
        font-family: ' . esc_attr( $footer_font ) . ';
        font-style: ' . esc_attr( $footer_font_style ) . ';
        font-weight: ' . esc_attr( $footer_font_weight ) . ';
        text-transform: ' . esc_attr( $footer_font_transform ) . ';
        font-size: ' . esc_attr( $footer_font_size ) . 'px;
        letter-spacing: ' . esc_attr( $footer_font_letterspacing ) . 'px;
        line-height: ' . esc_attr( $footer_font_lineheight ) . 'px;
    }

.single-product .upsells.products,
.single-product .related.products {
    margin: 0 calc( -' . esc_attr( $site_mobilesidepadding ) . 'vw);
}

@media screen and (min-width: 769px) {

    .portfolio--gavin .project__navigation {
        left: ' . esc_attr( $site_sidepadding ) . 'vw;
        width: calc(100% - ' . esc_attr( $site_sidepadding ) . 'vw);
    }

    .portfolio--gavin .project__navigation div {
        margin-right: ' . esc_attr( $site_sidepadding ) . 'vw;
    }

    @media only screen and (min-width: 400px) {
        .portfolio--mia .project:nth-child(3n+1), .portfolio--mia .project:nth-child(3n+2) {
            width: calc(50% - ' . esc_attr( $site_sidepadding / 2 ) . 'vw);
        }
    }

    @media only screen and (min-width: 400px) {
        .portfolio--mia .project:nth-child(3n+1) {
            margin-right: ' . esc_attr( $site_sidepadding / 2 ) . 'vw;
        }
    }

    @media only screen and (min-width: 400px) {
        .portfolio--mia .project:nth-child(3n+2) {
            margin-left: ' . esc_attr( $site_sidepadding / 2 ) . 'vw;
        }
    }

    .fl-row.fl-row-full-width {
        margin-left: -' . esc_attr( $site_sidepadding ) . 'vw;
        margin-right: -' . esc_attr( $site_sidepadding ) . 'vw;
    }

    .portfolio__single--mobile-showcase {
        padding-left: ' . esc_attr( $site_sidepadding ) . 'vw;
        padding-right: ' . esc_attr( $site_sidepadding ) . 'vw;
    }

    .portfolio__single--mobile-showcase figure {
        margin-bottom: ' . esc_attr( $site_sidepadding ) . 'vw;
    }

    @media screen and (min-width: 400px) {
        .portfolio__single--mobile-showcase figure {
            margin-right: 5vw;
            width: calc( 50% - ' . esc_attr( $site_sidepadding / 2 ) . 'vw);
        }
    }

    @media only screen and (min-width: 400px) {
        .tax-product_cat .product-sidebar,
        .tax-product_tag .product-sidebar,
        .post-type-archive-product .product-sidebar {
            padding-left: ' . esc_attr( $site_sidepadding ) . 'vw;
            padding-right: ' . esc_attr( $site_sidepadding ) . 'vw;
        }
    }

    .single-product .product-navigation-wrapper {
        padding-bottom: ' . esc_attr( $site_sidepadding ) . 'vw;
    }

    @media screen and (min-width: 1024px) {
        .single-product .entry-summary {
            padding-top: ' . esc_attr( $site_sidepadding ) . 'vw;
            padding-left: ' . esc_attr( $site_sidepadding ) . 'vw;
        }
    }

    .single-product .upsells.products,
    .single-product .related.products {
        margin: 0 calc( -' . esc_attr( $site_sidepadding ) . 'vw);
    }

    .post .entry-media, .search-results .posts--default article .entry-media {
        margin-left: calc( -5vw + ' . esc_attr( $site_sidepadding ) . 'vw);
        margin-right: calc( -5vw + ' . esc_attr( $site_sidepadding ) . 'vw);
        margin-bottom: ' . esc_attr( $site_sidepadding ) . 'vw;
    }

}

    body .single_add_to_cart_button.button.is-added {
        background-color: ' . esc_attr( $theme_accent_color ) . ' !important;
        border-color: ' . esc_attr( $theme_accent_color ) . ' !important;
    }



	body.single .navigation a:hover {
		color: ' . esc_attr( $theme_accent_color ) . ' !important;
	}




    body .single_add_to_cart_button.button.is-added:hover {
        border-color: ' . esc_attr( $theme_accent_color ) . ' !important;
    }


    body .onsale {
        background-color: ' . esc_attr( $shop_salebadge_background_color ) . ';
        color: ' . esc_attr( $shop_salebadge_color ) . ';
    }

    body .product-grid .product .thumb {
        top: ' . esc_attr( $shop_product_top_padding ) . 'px;
        right: ' . esc_attr( $shop_product_side_padding ) . 'px;
        bottom: ' . esc_attr( $shop_product_bottom_padding ) . 'px;
        left: ' . esc_attr( $shop_product_side_padding ) . 'px;
    }

    body .product-grid .product {
        background-color: ' . esc_attr( $shop_product_background_color ) . ';
    }

    body .images {
        background-color: ' . esc_attr( $single_product_background_color ) . ';
    }

    body .product .product-title h4,
    body .product .price {
        color: ' . esc_attr( $shop_product_title_color ) . ';
    }

    body .btn,
    body .single_add_to_cart_button,
    body .button a,
    body .btn[type="submit"],
    body .button[type="submit"],
    body input[type="button"],
    body input[type="reset"],
    body .page-navigation .page-numbers,
    body input[type="submit"],
    body .cart_totals .checkout-button {
        background-color: ' . esc_attr( $site_button_color ) . ';
    }

    .btn:hover,
     body .single_add_to_cart_button:hover,
    .button a:hover,
    .btn[type="submit"]:hover,
    .button[type="submit"]:hover,
    input[type="button"]:hover,
    input[type="reset"]:hover,
    input[type="submit"]:hover,
    body .page-numbers:hover,
    body .page-numbers.current,
    body .cart_totals .checkout-button:hover {
        background-color: ' . esc_attr( $site_button_hover_color ) . ';
    }

    body .site-colophon,
    body .site-colophon a {
        color: ' . esc_attr( $colophon_text_color ) . ';
    }

    @media screen and (max-width: 768px) {
    body .close-toggle {
        background: ' . esc_attr( $mobilemenu_closebackground ) . ';
    }

    body .close-toggle svg {
        stroke: ' . esc_attr( $mobilemenu_closesvgcolor ) . ';
    }
}

    @media screen and (max-width: 768px) {
        body .custom-logo-link img.custom-logo {
            width: ' . esc_attr( $logo_mobilemaxwidth ) . 'px;
        }
    }

    @media screen and (min-width: 769px) {
        body .custom-logo-link img.custom-logo {
            width: ' . esc_attr( $logo_maxwidth ) . 'px;
        }
    }


    body .sidebar--section.mobile-menu .main-navigation.flyout a {
        color: ' . esc_attr( $mobilemenu_textcolor ) . ';
    }

    @media screen and (max-width: 768px) {
        body .sidebar--section.mobile-menu {
            background-color: ' . esc_attr( $mobilemenu_background ) . ';
        }
    }

    body .sidebar--section.mobile-menu .social-navigation svg {
        fill: ' . esc_attr( $mobilemenu_socialcolor ) . ';
        height: ' . esc_attr( $mobilemenu_socialsize ) . 'px;
        width: ' . esc_attr( $mobilemenu_socialsize ) . 'px;
        margin: 0 ' . esc_attr( $mobilemenu_socialspacing ) . 'px;
    }

    body .site-flyout {
        background-color: ' . esc_attr( $flyout_background ) . ';
        color: ' . esc_attr( $flyout_textcolor ) . ';
    }

    body .site-flyout a {
        color: ' . esc_attr( $flyout_textcolor ) . ';
    }

    body .nav-close-overlay {
        background-color: ' . esc_attr( $flyout_overlaybackground ) . ';
    }

    body .site-header .site-logo-link a,
    body .site-header .main-navigation a,
    body .site-mobile-header .main-navigation a {
        color: ' . esc_attr( $header_textcolor ) . ';
    }

    body .site-colophon .social-navigation svg {
        fill: ' . esc_attr( $colophon_social_color ) . ';
        height: ' . esc_attr( $colophon_social_size ) . 'px;
        width: ' . esc_attr( $colophon_social_size ) . 'px;
        margin: 0 ' . esc_attr( $colophon_social_spacing ) . 'px;
    }

    @media screen and (max-width: 768px) {
        body .post .entry-header, .search-results .posts--default article {
            margin-top:     ' . esc_attr( $singlepost_header_mobiletopmargin ) . 'vw;
            margin-bottom:   ' . esc_attr( $singlepost_header_mobilebottommargin ) . 'vw;
        }
    }

    @media screen and (min-width: 769px) {
        body .post .entry-header, .search-results .posts--default article {
            margin-top:     ' . esc_attr( $singlepost_header_topmargin ) . 'px;
            margin-bottom:  ' . esc_attr( $singlepost_header_bottommargin ) . 'px;
        }
    }

    html {
        background: ' . esc_attr( $site_htmlbackgroundcolor ) . '!important;
    }

    @media screen and (max-width: 768px) {
        body.has-site-border {
            border: ' . esc_attr( $site_mobileborderwidth ) . 'px solid ' . esc_attr( $site_border_color ) . ';
        }
    }

    @media screen and (min-width: 769px) {
        body.has-site-border {
            border: ' . esc_attr( $site_border_width ) . 'px solid ' . esc_attr( $site_border_color ) . ';
        }
    }

    body.has-site-border .site-search-form {
        top: ' . esc_attr( $site_border_width ) . 'px;
        width: calc( 100% - ' . esc_attr( $site_search_width ) . 'px );
        bottom: ' . esc_attr( $site_border_width ) . 'px;
        left: ' . esc_attr( $site_border_width ) . 'px;
    }

    body .author-info p {
        color: ' . esc_attr( $singlepost_avatar_textcolor ) . ';
    }

    body .author-info .author-name {
        color: ' . esc_attr( $singlepost_avatar_headertextcolor ) . ';
    }

    body .author-info {
        background-color: ' . esc_attr( $singlepost_avatar_backgroundcolor ) . ';
    }

    @media screen and (min-width: 769px) {
        body .author-info .author-avatar {
            height: ' . esc_attr( $singlepost_avatarsize ) . 'px;
            width: ' . esc_attr( $singlepost_avatarsize ) . 'px;
        }
    }

    body .site-colophon .site-colophon__inner {
        max-width: ' . esc_attr( $colophon_maxwidth ) . 'px;
    }

    @media only screen and (max-width: 768px) {
        body[data-footer="footer-5"] .site-footer__inner .site-footer__right {
            margin-top: ' . esc_attr( $footer_right_margintop ) . 'vw;
        }
    }

    @media screen and (max-width: 768px) {
        body .site-colophon .site-colophon__inner {
            padding-top:     ' . esc_attr( $colophon_mobiletoppadding ) . 'vw;
            padding-right:   ' . esc_attr( $site_mobilesidepadding ) . 'vw;
            padding-bottom:  ' . esc_attr( $colophon_mobilebottompadding ) . 'vw;
            padding-left:    ' . esc_attr( $site_mobilesidepadding ) . 'vw;
        }
    }

    @media screen and (min-width: 769px) {
        body .site-colophon .site-colophon__inner {
            padding-top:     ' . esc_attr( $colophon_toppadding ) . 'vw;
            padding-right:   ' . esc_attr( $site_sidepadding ) . 'vw;
            padding-bottom:  ' . esc_attr( $colophon_bottompadding ) . 'vw;
            padding-left:    ' . esc_attr( $site_sidepadding ) . 'vw;
            max-width:       ' . esc_attr( $colophon_maxwidth ) . 'px;
        }
    }

    @media screen and (max-width: 768px) {
        body.woocommerce-cart .site-colophon .site-colophon__inner,
        body.woocommerce-checkout:not(.woocommerce--empty-cart) .site-colophon .site-colophon__inner {
            padding-top:     ' . esc_attr( $colophon_mobilebottompadding ) . 'vw;
        }
    }

    @media screen and (min-width: 769px) {
        body.woocommerce-cart .site-colophon .site-colophon__inner
        body.woocommerce-checkout:not(.woocommerce--empty-cart) .site-colophon .site-colophon__inner {
            padding-top:     ' . esc_attr( $colophon_bottompadding ) . 'vw;
        }
    }

    @media screen and (min-width: 769px) {
        body .site-copyright {
            padding-right:   ' . esc_attr( $colophon_copyrightsidepadding ) . 'px;
        }

        [data-colophon="colophon-2"] .site-colophon .site-info .site-copyright {
            padding-left:   ' . esc_attr( $colophon_copyrightsidepadding ) . 'px;
            padding-right: 0;
        }
    }

     @media screen and (min-width: 1501px) {
        body .site-colophon .site-colophon__inner {
            padding-top:     ' . esc_attr( $colophon_largetoppadding ) . 'vw;
            padding-bottom:  ' . esc_attr( $colophon_largebottompadding ) . 'vw;
        }
    }

    body .site-top-header {
        background:  ' . esc_attr( $top_header_backgroundcolor ) . ';
        color:  ' . esc_attr( $top_header_textcolor ) . ';
    }

    body .site-top-header a {
        color:  ' . esc_attr( $top_header_textcolor ) . ';
    }

        body .site-top-header .site-top-header__inner {
            padding-top:     ' . esc_attr( $top_header_toppadding ) . 'px;
            padding-right:   ' . esc_attr( $top_header_sidepadding ) . 'px;
            padding-bottom:  ' . esc_attr( $top_header_bottompadding ) . 'px;
            padding-left:    ' . esc_attr( $top_header_sidepadding ) . 'px;
        }

        body .site-top-header .social-navigation svg {
            fill: ' . esc_attr( $top_header_social_color ) . ';
        }

        body .site-top-header .social-navigation svg {
            height: ' . esc_attr( $top_header_socialsize ) . 'px;
            width: ' . esc_attr( $top_header_socialsize ) . 'px;
            margin: 0 ' . esc_attr( $top_header_social_spacing ) . 'px;
        }

        body .site-top-header .search-wrapper .svg__wrapper svg {
            stroke: ' . esc_attr( $top_header_searchcolor ) . ';
        }

        body .site-top-header .search-wrapper .svg__wrapper,
        body .site-top-header .search-wrapper .svg__wrapper svg {
            height: ' . esc_attr( $top_header_searchsize ) . 'px;
            width: ' . esc_attr( $top_header_searchsize ) . 'px;
        }

        body .site-top-header__left .search-wrapper {
            padding-right:   ' . esc_attr( $top_header_searchpadding ) . 'px;
        }

        body .site-top-header__right .search-wrapper {
            padding-left:   ' . esc_attr( $top_header_searchpadding ) . 'px;
        }

        body .site-top-header__left .search-wrapper {
            margin-right:   ' . esc_attr( $top_header_searchmargin ) . 'px;
        }

        body .site-top-header__right .search-wrapper {
            margin-left:   ' . esc_attr( $top_header_searchmargin ) . 'px;
        }

    body .site-footer {
        color: ' . esc_attr( $footer_textcolor ) . ';
    }

    body .site-footer a:not(.button) {
        color: ' . esc_attr( $footer_textcolor ) . ';
    }

    body .site-footer .widget-title {
        color: ' . esc_attr( $footer_headercolor ) . ';
        opacity: ' . esc_attr( $footer_headeropacity ) . ';
    }

    @media screen and (max-width: 768px) {
        body .site-footer .site-footer__inner {
            padding-top:     ' . esc_attr( $footer_mobiletoppadding ) . 'vw;
            padding-bottom:  ' . esc_attr( $footer_mobilebottompadding ) . 'vw;
            padding-left:   ' . esc_attr( $site_mobilesidepadding ) . 'vw;
            padding-right:  ' . esc_attr( $site_mobilesidepadding ) . 'vw;
        }
    }

    @media screen and (min-width: 769px) {
        body .site-footer .site-footer__inner {
            padding-top:     ' . esc_attr( $footer_toppadding ) . 'vw;
            padding-right:   ' . esc_attr( $site_sidepadding ) . 'vw;
            padding-bottom:  ' . esc_attr( $footer_bottompadding ) . 'vw;
            padding-left:    ' . esc_attr( $site_sidepadding ) . 'vw;
        }
    }

    @media screen and (min-width: 1501px) {
        body .site-footer .site-footer__inner {
            padding-top:     ' . esc_attr( $footer_largetoppadding ) . 'vw;
            padding-bottom:  ' . esc_attr( $footer_largebottompadding ) . 'vw;
        }
    }

    @media screen and (max-width: 768px) {
        body .site-mobile-header {
            padding-left:   ' . esc_attr( $site_mobilesidepadding ) . 'vw;
            padding-right:  ' . esc_attr( $site_mobilesidepadding ) . 'vw;
            padding-top:    ' . esc_attr( $header_mobileheight ) . 'vw;
            padding-bottom:  ' . esc_attr( $header_mobileheight ) . 'vw;
        }
    }

    @media screen and (min-width: 769px) {
        body .site-mobile-header {
            padding-right:   ' . esc_attr( $site_sidepadding ) . 'vw;
            padding-left:    ' . esc_attr( $site_sidepadding ) . 'vw;
            padding-top:    ' . esc_attr( $header_mobileheight ) . 'vw;
            padding-bottom:  ' . esc_attr( $header_mobileheight ) . 'vw;
        }
    }


    @media screen and (max-width: 768px) {
        body .portfolio--ethan {
            padding-left:   ' . esc_attr( $site_mobilesidepadding ) . 'vw;
            padding-right:  ' . esc_attr( $site_mobilesidepadding ) . 'vw;
        }
    }

    @media screen and (min-width: 769px) {
        body .portfolio--ethan {
            padding-right:   ' . esc_attr( $site_sidepadding ) . 'vw;
            padding-left:    ' . esc_attr( $site_sidepadding ) . 'vw;
        }
    }

    @media screen and (max-width: 768px) {
        body .site-content .site-content__inner {
            padding-bottom: ' . esc_attr( $sitecontent_mobilebottompadding ) . 'vw;
            padding-left:   ' . esc_attr( $site_mobilesidepadding ) . 'vw;
            padding-right:  ' . esc_attr( $site_mobilesidepadding ) . 'vw;
        }

        body .pagination {
            margin-top:    ' . esc_attr( $sitecontent_mobilebottompadding ) . 'vw;
        }
    }

    @media screen and (min-width: 769px) {
        body .site-content .site-content__inner {
            padding-right:   ' . esc_attr( $site_sidepadding ) . 'vw;
            padding-left:    ' . esc_attr( $site_sidepadding ) . 'vw;
        }
    }

    @media screen and (min-width: 769px) {
        body .site-header .site-header__inner {
            padding-top:     ' . esc_attr( $header_toppadding ) . 'px;
            padding-bottom:  ' . esc_attr( $header_bottompadding ) . 'px;
        }

        body.search-no-results .search-form {
            padding-top:     ' . esc_attr( $search_paddingtop ) . 'px;
        }
    }

    body .site-header .social-navigation svg {
        fill: ' . esc_attr( $header_social_color ) . ';
    }

    body .site-header .social-navigation svg {
        height: ' . esc_attr( $header_socialsize ) . 'px;
        width: ' . esc_attr( $header_socialsize ) . 'px;
        margin: 0 ' . esc_attr( $header_social_spacing ) . 'px;
    }

    body .site-header .social-navigation {
        margin-left: ' . esc_attr( $header_social_padding_side ) . 'px;
    }

    body .site-header .site-header__left .social-navigation {
        margin-left: 0;
        margin-right: ' . esc_attr( $header_social_padding_side ) . 'px;
    }

    body .site-header .search-wrapper .svg__wrapper svg {
        stroke: ' . esc_attr( $header_searchcolor ) . ';
    }

    body .site-header .search-wrapper .svg__wrapper,
    body .site-header .search-wrapper .svg__wrapper svg {
        height: ' . esc_attr( $header_searchsize ) . 'px;
        width: ' . esc_attr( $header_searchsize ) . 'px;
    }

    body .site-header__left .search-wrapper {
        padding-right:   ' . esc_attr( $header_searchpadding ) . 'px;
    }

    body .site-header__right .search-wrapper {
        padding-left:   ' . esc_attr( $header_searchpadding ) . 'px;
    }

    body .checkout-wrapper svg {
        stroke: ' . esc_attr( $header_checkout_color ) . ';
        fill: ' . esc_attr( $header_checkout_color ) . ';
    }

    body .checkout-wrapper svg {
        height: ' . esc_attr( $header_checkout_size ) . 'px;
        width: ' . esc_attr( $header_checkout_size ) . 'px;
    }

    body .menu-toggle .hamburger-inner,
    body .menu-toggle .hamburger-inner:before,
    body .menu-toggle .hamburger-inner:after {
        background-color: ' . esc_attr( $header_flyout_color ) . ';
    }

    body .menu-toggle {
        height: ' . esc_attr( $header_flyout_size ) . 'px;
        width: ' . esc_attr( $header_flyout_size ) . 'px;
    }

    body .site-header .site-header__inner {
        padding-right:   ' . esc_attr( $header_sidepadding ) . 'vw !important;
        padding-left:    ' . esc_attr( $header_sidepadding ) . 'vw !important;
    }



    .wp-autoresize a,
    body.single-page .entry-content p a,
    body .single-product-description a,
    body .fl-accordion-button-label a,
    body .post .entry-content a { color:' . esc_attr( $theme_accent_color ) . '; }

    @media only screen and (max-width: 768px) {
      body.tax-product_cat .product-sidebar .product-categories:hover li > a:hover, body.tax-product_tag .product-sidebar .product-categories:hover li > a:hover, body.post-type-archive-product .product-sidebar .product-categories:hover li > a:hover {
        color: ' . esc_attr( $theme_accent_color ) . ';
      }
    }

    body.tax-product_cat .product-sidebar .product-categories li.current-cat a,  body.tax-product_tag .product-sidebar .product-categories li.current-cat a, body.post-type-archive-product .product-sidebar .product-categories li.current-cat a {
        color: ' . esc_attr( $theme_accent_color ) . ';
    }

    body.tax-product_cat .product-sidebar .product-categories li a:hover, body.tax-product_tag .product-sidebar .product-categories li a:hover, body.post-type-archive-product .product-sidebar .product-categories li a:hover {
        color: ' . esc_attr( $theme_accent_color ) . ';
    }

    body .product-categories-trigger:hover, body .product-categories-trigger:hover:after, body .product-categories-trigger.js--active, body .product-categories-trigger.js--active:after {
        color:' . esc_attr( $theme_accent_color ) . ';
        border-color: ' . esc_attr( $theme_accent_color ) . ';
    }

    .woocommerce-attributes-trigger-wrapper:hover,
    .woocommerce-reviews-trigger-wrapper:hover {
        color: ' . esc_attr( $theme_accent_color ) . '!important;
    }

    .woocommerce-attributes-trigger-wrapper:hover h2,
    .woocommerce-reviews-trigger-wrapper:hover h2 {
        color: ' . esc_attr( $theme_accent_color ) . '!important;
    }

    .woocommerce-attributes-trigger-wrapper:hover svg,
    .woocommerce-reviews-trigger-wrapper:hover svg {
        fill: ' . esc_attr( $theme_accent_color ) . ' !important;
    }

    .orderby .dk-select-options .dk-option:hover {
        color: ' . esc_attr( $theme_accent_color ) . ';
    }

    .minicart-panel__container footer .checkout, .minicart-panel__container footer .checkout:hover, .minicart-panel__container footer .checkout:focus, .minicart-panel__container footer .checkout:active {
      background: ' . esc_attr( $theme_accent_color ) . ';
      border-color: ' . esc_attr( $theme_accent_color ) . ' !important;
    }

    .cart--button .count,
    .widget-panel-open .cart--button {
        background: ' . esc_attr( $theme_accent_color ) . ';
    }

    p.stars a
    .star-rating span,
    .product-grid .product .product-viewmore {
        color: ' . esc_attr( $theme_accent_color ) . ';
    }


    .shop-minibar__filter-trigger:hover {
      color: ' . esc_attr( $theme_accent_color ) . ';
    }

    .dk-selected:hover {
      color: ' . esc_attr( $theme_accent_color ) . ';
    }
    .shop-minibar__filter-trigger:hover span::before,
    .shop-minibar__filter-trigger:hover span::after {
      box-shadow: inset 0 0 0 32px ' . esc_attr( $theme_accent_color ) . ';
    }

    .dk-selected:hover:after {
      border-bottom: 1px solid ' . esc_attr( $theme_accent_color ) . ';
      border-right: 1px solid ' . esc_attr( $theme_accent_color ) . ';
    }

    #loader .bar {
        background-color: ' . esc_attr( $theme_accent_color ) . ';
    }

    body .site-colophon { background:  ' . esc_attr( $colophon_backgroundcolor ) . '; }

    body .site-footer { background:  ' . esc_attr( $footer_backgroundcolor ) . '; }

    body:not(.site-header--absolute):not(.site-header--fixed) .site-header { background:  ' . esc_attr( $header_backgroundcolor ) . '; }

    body { background:  ' . esc_attr( $site_backgroundcolor ) . '!important; }

    body .project-meta a:hover,
    body .portfolio .entry-content a:hover {
        color: ' . esc_attr( $theme_accent_color ) . ';
    }

    .new-tag,
    .bean-btn,
    div.jp-play-bar,
    .avatar-list li a.active,
    div.jp-volume-bar-value,
    .bean-direction-nav a:hover,
    .bean-pricing-table .table-mast,
    .entry-content .mejs-controls .mejs-time-rail span.mejs-time-current { background-color:' . esc_attr( $theme_accent_color ) . '; }
    .entry-content .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current { background:' . esc_attr( $theme_accent_color ) . '; }
    ';

	$site_backgroundcolor     = ( ! empty( $site_backgroundcolor ) ) ? null : '';
	$header_backgroundcolor   = ( ! empty( $header_backgroundcolor ) ) ? null : '';
	$footer_backgroundcolor   = ( ! empty( $footer_backgroundcolor ) ) ? null : '';
	$colophon_backgroundcolor = ( ! empty( $colophon_backgroundcolor ) ) ? '' : '';

	/**
	 * Combine the values from above and minifiy them.
	 */
	wp_add_inline_style( 'ava-style', wp_strip_all_tags( $css ) );
}

add_action( 'wp_enqueue_scripts', 'ava_customizer_css' );
