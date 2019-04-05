<?php
/**
 * SVG icons related functions and filters
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Add SVG definitions to the footer.
 */
function ava_include_svg_icons() {
	require_once get_theme_file_path( '/assets/images/sprite.svg' );
}
add_action( 'wp_footer', 'ava_include_svg_icons', 9999 );

/**
 * Return SVG markup.
 *
 * @param array $args {
 *     Parameters needed to display an SVG.
 *
 *     @type string $icon  Required SVG icon filename.
 *     @type string $title Optional SVG title.
 *     @type string $desc  Optional SVG description.
 * }
 * @return string SVG markup.
 */
function ava_get_svg( $args = array() ) {
	// Make sure $args are an array.
	if ( empty( $args ) ) {
		return __( 'Please define default parameters in the form of an array.', 'ava' );
	}

	// Define an icon.
	if ( false === array_key_exists( 'icon', $args ) ) {
		return __( 'Please define an SVG icon filename.', 'ava' );
	}

	// Set defaults.
	$defaults = array(
		'icon'        => '',
		'title'       => '',
		'desc'        => '',
		'aria_hidden' => true, // Hide from screen readers.
		'fallback'    => false,
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	// Set aria hidden.
	$aria_hidden = '';

	if ( true === $args['aria_hidden'] ) {
		$aria_hidden = ' aria-hidden="true"';
	}

	// Set ARIA.
	$aria_labelledby = '';

	if ( $args['title'] && $args['desc'] ) {
		$aria_labelledby = ' aria-labelledby="title desc"';
	}

	// Begin SVG markup.
	$svg = '<svg class="icon icon--' . esc_attr( $args['icon'] ) . '"' . $aria_hidden . $aria_labelledby . ' role="img">';

	// If there is a title, display it.
	if ( $args['title'] ) {
		$svg .= '<title>' . esc_html( $args['title'] ) . '</title>';
	}

	// If there is a description, display it.
	if ( $args['desc'] ) {
		$svg .= '<desc>' . esc_html( $args['desc'] ) . '</desc>';
	}

	// Use absolute path in the Customizer so that icons show up in there.
	if ( is_customize_preview() ) {
		$svg .= '<use xlink:href="' . get_theme_file_uri( '/assets/images/sprite.svg#icon-' . esc_html( $args['icon'] ) ) . '"></use>';
	} else {
		$svg .= '<use xlink:href="#icon-' . esc_html( $args['icon'] ) . '"></use>';
	}

	// Add some markup to use as a fallback for browsers that do not support SVGs.
	if ( $args['fallback'] ) {
		$svg .= '<span class="svg-fallback icon--' . esc_attr( $args['icon'] ) . '"></span>';
	}

	$svg .= '</svg>';

	return $svg;
}

/**
 * Add dropdown icon if menu item has children.
 *
 * @param  string $title The menu item's title.
 * @param  object $item  The current menu item.
 * @param  array  $args  An array of wp_nav_menu() arguments.
 * @param  int    $depth Depth of menu item. Used for padding.
 * @return string $title The menu item's title with dropdown icon.
 */
function ava_dropdown_icon_to_menu_link( $title, $item, $args, $depth ) {
	if ( 'primary' === $args->theme_location or 'secondary' === $args->theme_location ) {
		foreach ( $item->classes as $value ) {
			if ( 'menu-item-has-children' === $value || 'page_item_has_children' === $value ) {
				$title = $title . ava_get_svg( array( 'icon' => 'down' ) );
			}
		}
	}

	return $title;
}
add_filter( 'nav_menu_item_title', 'ava_dropdown_icon_to_menu_link', 10, 4 );

/**
 * Display SVG icons in social links menu.
 *
 * @param  string  $item_output The menu item output.
 * @param  WP_Post $item        Menu item object.
 * @param  int     $depth       Depth of the menu.
 * @param  array   $args        wp_nav_menu() arguments.
 * @return string  $item_output The menu item output with social icon.
 */
function ava_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
	// Get supported social icons.
	$social_icons = ava_social_links_icons();

	// See if a menu has the name Social Media Menu.
	$menu_object = wp_get_nav_menu_object( 'social-menu' );

	// Make sure these don't match to start with.
	$social_menu_id = -1;
	$cur_menu       = 0;
	if ( $menu_object ) {
		$social_menu_id = $menu_object->term_id;
		if ( is_object( $args->menu ) ) {
			$cur_obj  = $args->menu;
			$cur_menu = $cur_obj->term_id;
		} else {
			$cur_menu = $args->menu;
		}
	}

	// Change SVG icon inside social links menu if there is supported URL.
	if ( 'header-social' === $args->theme_location || 'mobile-social' === $args->theme_location || 'colophon-social' === $args->theme_location || 'top-header-social' === $args->theme_location ) {
		foreach ( $social_icons as $attr => $value ) {
			if ( false !== strpos( $item_output, $attr ) ) {
				$item_output = str_replace( $args->link_after, '</span>' . ava_get_svg( array( 'icon' => esc_attr( $value ) ) ), $item_output );
			}
		}
	} else {
		// Check if the social-menu-icon is being used elsewhere and change SVG icon inside social links menu if there is supported URL.
		if ( $social_menu_id === $cur_menu ) {
			$item_output = str_replace( '">', '"><span class="screen-reader-text">', $item_output );
			$item_output = str_replace( '</a>', '</span></a>', $item_output );
			foreach ( $social_icons as $attr => $value ) {
				if ( false !== strpos( $item_output, $attr ) ) {
					$item_output = str_replace( '</span>', '</span>' . ava_get_svg( array( 'icon' => esc_attr( $value ) ) ), $item_output );
				}
			}
		}
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'ava_nav_menu_social_icons', 10, 4 );

/**
 * Returns an array of supported social links (URL and icon name).
 *
 * @return array $social_links_icons
 */
function ava_social_links_icons() {
	// Supported social links icons.
	$social_links_icons = array(
		'500px.com'           => '500px',
		'bandsintown.com'     => 'bandsintown',
		'behance.net'         => 'behance',
		'chownow.com'         => 'chownow',
		'codepen.io'          => 'codepen',
		'hub.docker.com'      => 'docker-hub',
		'dribbble.com'        => 'dribbble',
		'dropbox.com'         => 'dropbox',
		'facebook.com'        => 'facebook',
		'flickr.com'          => 'flickr',
		'foursquare.com'      => 'foursquare',
		'github.com'          => 'github',
		'houzz.com'           => 'houzz',
		'instagram.com'       => 'instagram',
		'itunes'              => 'itunes',
		'itunes.apple.com'    => 'itunes',
		'linkedin.com'        => 'linkedin',
		'mailto:'             => 'email',
		'medium.com'          => 'medium',
		'meetup.com'          => 'meetup',
		'pinterest.com'       => 'pinterest',
		'plus.google.com'     => 'google',
		'reddit.com'          => 'reddit',
		'residentadvisor.net' => 'resident-advisor',
		'smugmug.net'         => 'smugmug',
		'snapchat.com'        => 'snapchat-ghost',
		'soundcloud.com'      => 'soundcloud',
		'spotify.com'         => 'spotify',
		'stumbleupon.com'     => 'stumbleupon',
		'tumblr.com'          => 'tumblr',
		'twitch.tv'           => 'twitch',
		'twitter.com'         => 'twitter',
		'vevo.com'            => 'vevo',
		'vimeo.com'           => 'vimeo',
		'vine.co'             => 'vine',
		'vsco.co'             => 'vsco',
		'wordpress.com'       => 'wordpress',
		'wordpress.org'       => 'wordpress',
		'yelp.com'            => 'yelp',
		'youtube.com'         => 'youtube',
	);

	return apply_filters( 'ava_social_links_icons', $social_links_icons );
}

if ( ! function_exists( 'ava_get_cart_icon' ) ) :
	/**
	 * Conditionally display the content based on the Customizer.
	 *
	 * Create your own ava_get_cart_icon() to override in a child theme.
	 */
	function ava_get_cart_icon( $control ) {
		/**
		 * Only display the checkout icon(s) if the option is selected in the Customizer.
		 *
		 * The icons only display if there are items in the cart. In the ava_cart_icon() function,
		 * we are checking both for Easy Digital Downloads and WooCommerce, to see if they are
		 * active, and if there are items in the cart.
		 */
		$visibility = ( false === get_theme_mod( $control, ava_defaults( $control ) ) ) ? ' hidden ' : '';

		if ( get_theme_mod( $control, ava_defaults( $control ) ) || is_customize_preview() ) :

			if ( class_exists( 'Easy_Digital_Downloads' ) || ava_is_woocommerce_activated() ) :
				echo '<div class="checkout-wrapper' . esc_attr( $visibility ) . '">';
					ava_cart_icon();
				echo '</div>';
			endif;
		endif;
	}
endif;
