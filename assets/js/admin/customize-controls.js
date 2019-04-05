/**
 * Scripts within the customizer controls window.
 *
 * Contextually shows the color hue control and informs the preview
 * when users open or close the front page sections section.
 */

(function() {
	wp.customize.bind( 'ready', function() {

		/**
		 * Function to hide/show Customizer options, based on another control.
		 *
		 * Parent option, Affected Control, Value which affects the control.
		 */
		function customizer_option_display( parent_setting, affected_control, value ) {
			wp.customize( parent_setting, function( setting ) {
				wp.customize.control( affected_control, function( control ) {
					var visibility = function() {
						if ( value === setting.get() ) {
							control.container.slideDown( 180 );
						} else {
							control.container.slideUp( 180 );
						}
					};

					visibility();
					setting.bind( visibility );
				});
			});
		}

		/**
		 * Function to hide/show Customizer options, based on another control.
		 *
		 * Parent option, Affected Control, Value which affects the control.
		 */
		function customizer_image_option_display( parent_setting, affected_control, speed ) {
			wp.customize( parent_setting, function( setting ) {
				wp.customize.control( affected_control, function( control ) {
					var visibility = function() {
						if ( setting.get() && 'none' !== setting.get() && '0' !== setting.get() ) {
							control.container.slideDown( speed );
						} else {
							control.container.slideUp( speed );
						}
					};

					visibility();
					setting.bind( visibility );
				});
			});
		}

		// Only show the logo max width options, if a logo is uploaded.
		customizer_image_option_display( 'custom_logo', 'title-logo_max_width', 140 );
		customizer_image_option_display( 'custom_logo', 'custom_logo_max_width', 140 );
		customizer_image_option_display( 'custom_logo', 'custom_logo_mobile_max_width', 140 );
		customizer_image_option_display( 'custom_logo', 'light_site_logo', 140 );

		// Only show the columns size and gutter controls, when the "Columns" shop layout option is selected.
		customizer_option_display( 'shop_layout', 'shop_layout_columns_size', 'product-grid__columns' );
		customizer_option_display( 'shop_layout', 'shop_layout_columns_gutter', 'product-grid__columns' );

		// Only show the sales flash settings, if it's enabled.
		customizer_option_display( 'shop_salebadge', 'shop_salebadge_text', true );
		customizer_option_display( 'shop_salebadge', 'shop_salebadge_position', true );
		customizer_option_display( 'shop_salebadge', 'shop_salebadge_style', true );
		customizer_option_display( 'shop_salebadge', 'shop_salebadge_background_color', true );
		customizer_option_display( 'shop_salebadge', 'shop_salebadge_size', true );
		customizer_option_display( 'shop_salebadge', 'shop_salebadge_color', true );

		// Only show the header search settings, if it's enabled.
		customizer_option_display( 'header_search', 'header_search_icon', true );
		customizer_option_display( 'header_search', 'header_search_size', true );
		customizer_option_display( 'header_search', 'header_search_padding', true );
		customizer_option_display( 'header_search', 'header_search_color', true );

		// Only show the header search settings, if it's enabled.
		customizer_option_display( 'header_checkout', 'header_checkout_icon', true );
		customizer_option_display( 'header_checkout', 'header_checkout_url', true );
		customizer_option_display( 'header_checkout', 'header_checkout_icon', true );
		customizer_option_display( 'header_checkout', 'header_checkout_position', true );
		customizer_option_display( 'header_checkout', 'header_checkout_size', true );
		customizer_option_display( 'header_checkout', 'header_checkout_color', true );

		// Only show the flyout settings, if it's enabled.
		customizer_option_display( 'flyout', 'flyout_position', true );
		customizer_option_display( 'flyout', 'flyout_background_color', true );
		customizer_option_display( 'flyout', 'flyout_text_color', true );
		customizer_option_display( 'flyout', 'title-flyout_overlay', true );
		customizer_option_display( 'flyout', 'flyout_overlay_background_color', true );
		customizer_option_display( 'flyout', 'flyout_overlay_opacity', true );

		// As well as the options in the Header panel.
		customizer_option_display( 'flyout', 'title-header_flyout', true );
		customizer_option_display( 'flyout', 'header_flyout_size', true );
		customizer_option_display( 'flyout', 'header_flyout_color', true );

		// Only show the Pinterest postion setting, if it's enabled.
		customizer_option_display( 'singlepost_pinterest', 'singlepost_pinterest_position', true );

		// Only show the biography settings, if it's enabled.
		customizer_option_display( 'singlepost_bio', 'singlepost_bio_avatar_size', true );
		customizer_option_display( 'singlepost_bio', 'singlepost_bio_text_color', true );
		customizer_option_display( 'singlepost_bio', 'singlepost_bio_header_color', true );
		customizer_option_display( 'singlepost_bio', 'singlepost_bio_background_color', true );


		// customizer_option_display( 'topheader_active', 'topheader', true );
		customizer_option_display( 'topheader_active', 'topheader_padding_top', true );
		customizer_option_display( 'topheader_active', 'topheader_padding_bottom', true );
		customizer_option_display( 'topheader_active', 'topheader_padding_side', true );
		customizer_option_display( 'topheader_active', 'topheader_background_color', true );
		customizer_option_display( 'topheader_active', 'title-topheader_text', true );
		customizer_option_display( 'topheader_active', 'topheader_text_color', true );
		customizer_option_display( 'topheader_active', 'title-topheader_social', true );
		customizer_option_display( 'topheader_active', 'topheader_social_size', true );
		customizer_option_display( 'topheader_active', 'topheader_social_spacing', true );
		customizer_option_display( 'topheader_active', 'topheader_social_color', true );
		customizer_option_display( 'topheader_active', 'title-topheader_search', true );
		customizer_option_display( 'topheader_active', 'topheader_search', true );
		customizer_option_display( 'topheader_active', 'topheader_font', true );
		customizer_option_display( 'topheader_active', 'topheader_font_style', true );
		customizer_option_display( 'topheader_active', 'topheader_font_weight', true );
		customizer_option_display( 'topheader_active', 'topheader_font_transform', true );
		customizer_option_display( 'topheader_active', 'topheader_font_size', true );
		customizer_option_display( 'topheader_active', 'topheader_font_letterspacing', true );

		// Only show the Top Header's search settings, if it's enabled.
		customizer_option_display( 'topheader_search', 'topheader_search_size', true );
		customizer_option_display( 'topheader_search', 'topheader_search_padding', true );
		customizer_option_display( 'topheader_search', 'topheader_search_margin', true );
		customizer_option_display( 'topheader_search', 'topheader_search_color', true );

		// Only show the Colophon settings, if it's enabled.
		customizer_option_display( 'colophon_active', 'colophon_padding_top', true );
		customizer_option_display( 'colophon_active', 'colophon_padding_bottom', true );
		customizer_option_display( 'colophon_active', 'colophon_max_width', true );
		customizer_option_display( 'colophon_active', 'colophon_background_color', true );
		customizer_option_display( 'colophon_active', 'colophon_text_color', true );

		customizer_option_display( 'colophon_active', 'title-colophon_mobile', true );
		customizer_option_display( 'colophon_active', 'colophon_mobile_padding_top', true );
		customizer_option_display( 'colophon_active', 'colophon_mobile_padding_bottom', true );

		customizer_option_display( 'colophon_active', 'title-colophon_large', true );
		customizer_option_display( 'colophon_active', 'colophon_large_padding_top', true );
		customizer_option_display( 'colophon_active', 'colophon_large_padding_bottom', true );

		customizer_option_display( 'colophon_active', 'title-colophon_copyright', true );
		customizer_option_display( 'colophon_active', 'colophon_copyright', true );
		customizer_option_display( 'colophon_active', 'colophon_theme_info', true );
		customizer_option_display( 'colophon_active', 'colophon_copyright_padding_side', true );
		customizer_option_display( 'colophon_active', 'colophon_copyright_text', true );

		customizer_option_display( 'colophon_active', 'title-colophon_social', true );
		customizer_option_display( 'colophon_active', 'colophon_social_size', true );
		customizer_option_display( 'colophon_active', 'colophon_social_spacing', true );
		customizer_option_display( 'colophon_active', 'colophon_social_color', true );

		customizer_option_display( 'colophon_active', 'title-colophon_menu', true );
		customizer_option_display( 'colophon_active', 'colophon_menu', true );
		customizer_option_display( 'colophon_active', 'colophon_menu_font', true );
		customizer_option_display( 'colophon_active', 'colophon_menu_font_style', true );
		customizer_option_display( 'colophon_active', 'colophon_menu_font_weight', true );
		customizer_option_display( 'colophon_active', 'colophon_menu_font_transform', true );
		customizer_option_display( 'colophon_active', 'colophon_menu_font_size', true );
		customizer_option_display( 'colophon_active', 'colophon_menu_font_letterspacing', true );

		customizer_option_display( 'colophon_active', 'title-colophon_fonts', true );
		customizer_option_display( 'colophon_active', 'colophon_font', true );
		customizer_option_display( 'colophon_active', 'colophon_font_style', true );
		customizer_option_display( 'colophon_active', 'colophon_font_weight', true );
		customizer_option_display( 'colophon_active', 'colophon_font_transform', true );
		customizer_option_display( 'colophon_active', 'colophon_font_size', true );
		customizer_option_display( 'colophon_active', 'colophon_font_lineheight', true );
		customizer_option_display( 'colophon_active', 'colophon_font_letterspacing', true );

		// Only show the Colophon menu settings, if it's enabled.
		customizer_option_display( 'colophon_menu', 'colophon_menu_font', true );
		customizer_option_display( 'colophon_menu', 'colophon_menu_font_style', true );
		customizer_option_display( 'colophon_menu', 'colophon_menu_font_weight', true );
		customizer_option_display( 'colophon_menu', 'colophon_menu_font_transform', true );
		customizer_option_display( 'colophon_menu', 'colophon_menu_font_size', true );
		customizer_option_display( 'colophon_menu', 'colophon_menu_font_letterspacing', true );

	});
})( jQuery );



























