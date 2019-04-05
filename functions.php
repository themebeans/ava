<?php
/**
 * Theme functions and definitions
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

if ( ! defined( 'AVA_DEBUG' ) ) :
	/**
	 * Check to see if development mode is active.
	 * If set to false, the theme will load un-minified assets.
	 */
	define( 'AVA_DEBUG', true );
endif;

if ( ! defined( 'AVA_ASSET_SUFFIX' ) ) :
	/**
	 * If not set to true, let's serve minified .css and .js assets.
	 * Don't modify this, unless you know what you're doing!
	 */
	if ( ! defined( 'AVA_DEBUG' ) || true === AVA_DEBUG ) {
		define( 'AVA_ASSET_SUFFIX', null );
	} else {
		define( 'AVA_ASSET_SUFFIX', '.min' );
	}
endif;

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ava_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Ava, use a find and replace
	 * to change 'ava' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ava', get_parent_theme_file_path( '/languages' ) );

	/*
	 * Add default posts and comments RSS feed links to head.
	 */
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 */
	add_theme_support(
		'custom-logo', array(
			'flex-height' => true,
		)
	);

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'ava-post-mini-image', 100, 100, true );

	/*
	 * This theme uses wp_nav_menu() in the following locations.
	 */
	register_nav_menus(
		array(
			'primary'           => esc_html__( 'Header', 'ava' ),
			'header-social'     => esc_html__( 'Header: Social', 'ava' ),
			'secondary'         => esc_html__( 'Header: Secondary', 'ava' ),
			'mobile'            => esc_html__( 'Mobile', 'ava' ),
			'mobile-social'     => esc_html__( 'Mobile: Social', 'ava' ),
			'top-header'        => esc_html__( 'Top Header', 'ava' ),
			'top-header-social' => esc_html__( 'Top Header: Social', 'ava' ),
			'colophon'          => esc_html__( 'Colophon', 'ava' ),
			'colophon-social'   => esc_html__( 'Colophon: Social', 'ava' ),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	/*
	 * This theme styles the visual editor to resemble the theme style.
	 */
	add_editor_style( array( 'assets/css/editor' . AVA_ASSET_SUFFIX . '.css', ava_fonts_url() ) );

	/*
	 * Enable support for Customizer Selective Refresh.
	 * See: https://make.wordpress.org/core/2016/02/16/selective-refresh-in-the-customizer/
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Delcare support for WooCommerce.
	 * See: https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
	 */
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-slider' );

	if ( true === get_theme_mod( 'single_product_gallery_lightbox', ava_defaults( 'single_product_gallery_lightbox' ) ) ) {
		add_theme_support( 'wc-product-gallery-lightbox' );
	}

	if ( true === get_theme_mod( 'single_product_gallery_zoom', ava_defaults( 'single_product_gallery_zoom' ) ) ) {
		add_theme_support( 'wc-product-gallery-zoom' );
	}

	/*
	 * Define starter content for the theme.
	 * See: https://make.wordpress.org/core/2016/11/30/starter-content-for-themes-in-4-7/
	 */
	$starter_content = array(

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts'       => array(
			'home',
			'lookbook',
			'about',
			'contact',
			'blog',
		),

		'attachments' => array(
			'logo' => array(
				'post_title' => _x( 'Logo', 'Theme starter content', 'ava' ),
				'file'       => 'inc/customizer/images/logo.png',
			),
		),

		'options'     => array(
			'show_on_front'   => 'page',
			'page_on_front'   => '{{home}}',
			'blogdescription' => _x( 'A WordPress theme by ThemeBeans', 'Theme starter content', 'ava' ),
			'page_for_posts'  => '{{blog}}',
		),

		'theme_mods'  => array(
			'custom_logo' => '{{image-logo}}',
		),

		'nav_menus'   => array(

			'primary'         => array(
				'name'  => esc_html__( 'Primary', 'ava' ),
				'items' => array(
					'page_home',
					'page_about',
				),
			),

			'secondary'       => array(
				'name'  => esc_html__( 'Secondary', 'ava' ),
				'items' => array(
					'page_blog',
					'page_contact',
				),
			),

			'header-social'   => array(
				'name'  => esc_html__( 'Social Menu', 'ava' ),
				'items' => array(
					'link_twitter',
					'link_instagram',
					'link_facebook',
				),
			),

			'colophon-social' => array(
				'name'  => esc_html__( 'Colophon Menu', 'ava' ),
				'items' => array(
					'link_twitter',
					'link_instagram',
					'link_facebook',
					'link_yelp',
				),
			),

			'colophon'        => array(
				'name'  => esc_html__( 'Colophon Menu', 'ava' ),
				'items' => array(
					'link_home',
					'link_about',
					'link_blog',
					'link_contact',
				),
			),
		),
	);

	/**
	 * Filters Ava array of starter content.
	 *
	 * @since Ava 1.0
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'ava_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );

}
add_action( 'after_setup_theme', 'ava_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ava_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ava_content_width', 1280 );
}
add_action( 'after_setup_theme', 'ava_content_width', 0 );

/**
 * Register widget areas.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function ava_widgets_init() {

	$footer = get_theme_mod( 'footer', ava_defaults( 'footer' ) );
	$flyout = get_theme_mod( 'flyout', ava_defaults( 'flyout' ) );

	register_sidebar(
		array(
			'name'          => esc_html__( 'Main Sidebar', 'ava' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Appears on the single posts.', 'ava' ),
			'before_widget' => '<div class="widget %2$s clearfix">',
			'after_widget'  => '</div>',
			'before_title'  => '<span class="widget-title">',
			'after_title'   => '</span>',
		)
	);

	/**
	 * Conditionally register the 'footer-col-1' widget area.
	 */
	if ( 'footer-1' === $footer || 'footer-2' === $footer || 'footer-3' === $footer || 'footer-4' === $footer || 'footer-5' === $footer || is_customize_preview() ) :
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Column 1', 'ava' ),
				'id'            => 'footer-col-1',
				'description'   => esc_html__( 'The first coloumn from the left of the site footer.', 'ava' ),
				'before_widget' => '<div class="widget %2$s clearfix">',
				'after_widget'  => '</div>',
				'before_title'  => '<span class="widget-title">',
				'after_title'   => '</span>',
			)
		);
	endif;

	/**
	 * Conditionally register the 'footer-col-2' widget area.
	 */
	if ( 'footer-1' === $footer || 'footer-2' === $footer || 'footer-3' === $footer || 'footer-5' === $footer || is_customize_preview() ) :
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Column 2', 'ava' ),
				'id'            => 'footer-col-2',
				'description'   => esc_html__( 'The second coloumn from the left of the site footer.', 'ava' ),
				'before_widget' => '<div class="widget %2$s clearfix">',
				'after_widget'  => '</div>',
				'before_title'  => '<span class="widget-title">',
				'after_title'   => '</span>',
			)
		);
	endif;

	/**
	 * Conditionally register the 'footer-col-3' widget area.
	 */
	if ( 'footer-1' === $footer || 'footer-2' === $footer || 'footer-5' === $footer || is_customize_preview() ) :
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Column 3', 'ava' ),
				'id'            => 'footer-col-3',
				'description'   => esc_html__( 'The third coloumn from the left of the site footer.', 'ava' ),
				'before_widget' => '<div class="widget %2$s clearfix">',
				'after_widget'  => '</div>',
				'before_title'  => '<span class="widget-title">',
				'after_title'   => '</span>',
			)
		);
	endif;

	/**
	 * Conditionally register the 'footer-col-4' widget area.
	 */
	if ( 'footer-1' === $footer || 'footer-5' === $footer || is_customize_preview() ) :
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Column 4', 'ava' ),
				'id'            => 'footer-col-4',
				'description'   => esc_html__( 'The fourth coloumn from the left of the site footer.', 'ava' ),
				'before_widget' => '<div class="widget %2$s clearfix">',
				'after_widget'  => '</div>',
				'before_title'  => '<span class="widget-title">',
				'after_title'   => '</span>',
			)
		);
	endif;

	/**
	 * Conditionally register the 'flyout' widget area.
	 */
	if ( true === $flyout || is_customize_preview() ) :
		register_sidebar(
			array(
				'name'          => esc_html__( 'Flyout', 'ava' ),
				'id'            => 'flyout',
				'description'   => esc_html__( 'Appears on the flyout sidebar widget area.', 'ava' ),
				'before_widget' => '<div class="widget %2$s clearfix">',
				'after_widget'  => '</div>',
				'before_title'  => '<span class="widget-title">',
				'after_title'   => '</span>',
			)
		);
	endif;

	/**
	 * Conditionally register the 'shop-sidebar' widget area.
	 */
	if ( ava_is_woocommerce_activated() ) :
		register_sidebar(
			array(
				'name'          => esc_html__( 'Shop Sidebar', 'ava' ),
				'id'            => 'shop-sidebar',
				'description'   => esc_html__( 'Appears on the shop sidebar widget area.', 'ava' ),
				'before_widget' => '<div class="widget %2$s clearfix">',
				'after_widget'  => '</div>',
				'before_title'  => '<span class="widget-title">',
				'after_title'   => '</span>',
			)
		);
	endif;
}
add_action( 'widgets_init', 'ava_widgets_init' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */
function ava_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js');})(document.documentElement);</script>\n";
}
add_action( 'wp_enqueue_scripts', 'ava_javascript_detection', 0 );

if ( ! function_exists( 'ava_scripts' ) ) :
	/**
	 * Enqueue scripts and styles.
	 */
	function ava_scripts() {

		// Add custom fonts, used in the main stylesheet.
		wp_enqueue_style( 'ava-fonts', ava_fonts_url(), array(), null );

		// Load theme styles.
		if ( is_child_theme() ) {
			wp_enqueue_style( 'ava-style', get_parent_theme_file_uri( '/style' . AVA_ASSET_SUFFIX . '.css' ) );
			wp_enqueue_style( 'ava-child-style', get_theme_file_uri( '/style.css' ), false, '@@pkg.version', 'all' );
		} else {
			wp_enqueue_style( 'ava-style', get_theme_file_uri( '/style' . AVA_ASSET_SUFFIX . '.css' ) );
		}

		// Load the standard WordPress comments reply javascript.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Load the Pinterest script, if the option is selected via the Customizer.
		if ( true === get_theme_mod( 'singlepost_pinterest', ava_defaults( 'singlepost_pinterest' ) ) && is_singular( 'post' ) && is_singular( 'product' ) ) {
			wp_enqueue_script( 'pinterest', '//assets.pinterest.com/js/pinit.js', array(), false, true );
		}

		/**
		 * Now let's check the same for the scripts.
		 */
		if ( SCRIPT_DEBUG || AVA_DEBUG ) {

			// Vendor scripts.
			wp_enqueue_script( 'dropkick', get_theme_file_uri( '/assets/js/vendors/dropkick.js' ), array( 'jquery' ), '@@pkg.version', true );
			wp_enqueue_script( 'fitvids', get_theme_file_uri( '/assets/js/vendors/fitvids.js' ), array( 'jquery' ), '@@pkg.version', true );
			wp_enqueue_script( 'headroom', get_theme_file_uri( '/assets/js/vendors/headroom.js' ), array( 'jquery' ), '@@pkg.version', true );
			wp_enqueue_script( 'infinitescroll', get_theme_file_uri( '/assets/js/vendors/infinitescroll.js' ), array( 'jquery' ), '@@pkg.version', true );
			wp_enqueue_script( 'ava-photoswipe', get_theme_file_uri( '/assets/js/vendors/photoswipe.js' ), array( 'jquery' ), '@@pkg.version', true );
			wp_enqueue_script( 'ava-photoswipe-ui', get_theme_file_uri( '/assets/js/vendors/photoswipe-ui-default.js' ), array( 'jquery' ), '@@pkg.version', true );
			wp_enqueue_script( 'sticky', get_theme_file_uri( '/assets/js/vendors/sticky.js' ), array( 'jquery' ), '@@pkg.version', true );
			wp_enqueue_script( 'superfish', get_theme_file_uri( '/assets/js/vendors/superfish.js' ), array( 'jquery' ), '@@pkg.version', true );
			wp_enqueue_script( 'svg4everybody', get_theme_file_uri( '/assets/js/vendors/svg4everybody.js' ), array( 'jquery' ), '@@pkg.version', true );

			// Custom scripts.
			wp_enqueue_script( 'ava-navigation', get_theme_file_uri( '/assets/js/custom/navigation.js' ), array( 'jquery' ), '@@pkg.version', true );
			wp_enqueue_script( 'ava-skip-link-focus-fix', get_theme_file_uri( '/assets/js/custom/skip-link-focus-fix.js' ), array( 'jquery' ), '@@pkg.version', true );
			wp_enqueue_script( 'ava-typography', get_theme_file_uri( '/assets/js/custom/typography.js' ), array( 'jquery' ), '@@pkg.version', true );
			wp_enqueue_script( 'ava-global', get_theme_file_uri( '/assets/js/custom/global.js' ), array( 'jquery' ), '@@pkg.version', true );

			// Load the Likes script, only on singular posts.
			if ( is_singular( 'post' ) ) {
				wp_enqueue_script( 'ava-likes', get_theme_file_uri( '/assets/js/custom/likes.js' ), array( 'jquery' ), '@@pkg.version', true );
			}

			// Load the following scripts, only if WooCommerce is activated.
			if ( ava_is_woocommerce_activated() ) {

				// Custom WooCommerce scripts.
				wp_enqueue_script( 'ava-woocommerce', get_theme_file_uri( '/assets/js/custom/woocommerce/ava-woocommerce.js' ), array( 'jquery' ), '@@pkg.version', true );
				wp_enqueue_script( 'ava-woocommerce-add-to-cart', get_theme_file_uri( '/assets/js/custom/woocommerce/woocommerce-add-to-cart.js' ), array( 'jquery' ), '@@pkg.version', true );
				wp_enqueue_script( 'ava-woocommerce-cart', get_theme_file_uri( '/assets/js/custom/woocommerce/woocommerce-cart.js' ), array( 'jquery' ), '@@pkg.version', true );
				wp_enqueue_script( 'ava-woocommerce-shop', get_theme_file_uri( '/assets/js/custom/woocommerce/woocommerce-shop.js' ), array( 'jquery' ), '@@pkg.version', true );
			}

			$localize_handle    = 'ava-likes';
			$translation_handle = 'ava-global';

		} else {
			wp_enqueue_script( 'ava-vendors-min', get_theme_file_uri( '/assets/js/vendors.min.js' ), array( 'jquery' ), '@@pkg.version', true );
			wp_enqueue_script( 'ava-custom-min', get_theme_file_uri( '/assets/js/custom.min.js' ), array( 'jquery' ), '@@pkg.version', true );

			if ( ava_is_woocommerce_activated() ) {
				wp_enqueue_script( 'ava-woocommerce-min', get_theme_file_uri( '/assets/js/woocommerce.min.js' ), array( 'jquery' ), '@@pkg.version', true );
			}

			$localize_handle    = 'ava-vendors-min';
			$translation_handle = 'ava-custom-min';
		}

		// Localize the script with new data.
		$localize_array = array(
			'url'   => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'ajax-nonce' ),
		);

		wp_localize_script( $localize_handle, 'ava_localization', $localize_array );

		// Translations in the custom functions.
		$translation_array = array(
			'ava_comment' => apply_filters( 'ava_comment_field_placeholder', esc_html__( 'Write a comment . . .', 'ava' ) ),
			'ava_author'  => apply_filters( 'ava_name_field_placeholder', esc_html__( 'Name', 'ava' ) ),
			'ava_email'   => apply_filters( 'ava_email_field_placeholder', esc_html__( 'email@address.com', 'ava' ) ),
		);

		wp_localize_script( $translation_handle, 'ava_translation', $translation_array );

		// Add local Javascript variables for WooCommerce scripts.
		$local_js_vars = array(
			'ava_ajaxUrl'           => admin_url( 'admin-ajax.php' ),
			'ava_shopAjaxAddToCart' => ( get_option( 'woocommerce_enable_ajax_add_to_cart' ) === 'yes' && get_option( 'woocommerce_cart_redirect_after_add' ) === 'no' ) ? 1 : 0,
		);

		// Localize the script with new data.
		if ( SCRIPT_DEBUG || AVA_DEBUG ) {
			wp_localize_script( 'ava-woocommerce', 'ava_wp_vars', $local_js_vars );
			wp_localize_script( 'ava-woocommerce-shop', 'ava_wp_vars', $local_js_vars );
		} else {
			wp_localize_script( 'ava-woocommerce-min', 'ava_wp_vars', $local_js_vars );
		}
	}

	add_action( 'wp_enqueue_scripts', 'ava_scripts' );

endif;

/**
 * Remove the duplicate stylesheet enqueue for older versions of the child theme.
 *
 * Since v1.5.9 Ava has a built-in auto-loader for loading the appropriate
 * parent theme stylesheet, without the need for a wp_enqueue_scripts function within
 * the child theme. This means that stylesheets will "just work" and there's less chance
 * that users will accidently disrupt stylesheet loading.
 */
function ava_remove_duplicate_child_parent_enqueue_scripts() {
	remove_action( 'wp_enqueue_scripts', 'ava_child_scripts', 10 );
}
add_action( 'init', 'ava_remove_duplicate_child_parent_enqueue_scripts' );

/**
 * Register Google fonts for Ava.
 *
 * @return string Google fonts URL for the theme.
 */
function ava_fonts_url() {
	$fonts_url = '';
	$fonts     = array();

	/* translators: If there are characters in your language that are not supported by this font, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== esc_html_x( 'on', 'Rubik font: on or off', 'ava' ) ) {
		$fonts[] = 'Rubik';
	}

	/* translators: If there are characters in your language that are not supported by this font, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== esc_html_x( 'on', 'Karla font: on or off', 'ava' ) ) {
		$fonts[] = 'Karla';
	}

	/**
	 * Get font selections from the Customizer
	 */
	$fonts[] = get_theme_mod( 'header_font', ava_defaults( 'header_font' ) );
	$fonts[] = get_theme_mod( 'topheader_font', ava_defaults( 'topheader_font' ) );
	$fonts[] = get_theme_mod( 'shop_font', ava_defaults( 'shop_font' ) );
	$fonts[] = get_theme_mod( 'colophon_font', ava_defaults( 'colophon_font' ) );
	$fonts[] = get_theme_mod( 'colophon_menu_font', ava_defaults( 'colophon_menu_font' ) );
	$fonts[] = get_theme_mod( 'singleproduct_font', ava_defaults( 'singleproduct_font' ) );
	$fonts[] = get_theme_mod( 'singleproduct_header_font', ava_defaults( 'global_header_font' ) );
	$fonts[] = get_theme_mod( 'global_header_font', ava_defaults( 'global_header_font' ) );
	$fonts[] = get_theme_mod( 'global_body_font', ava_defaults( 'global_body_font' ) );

	if ( $fonts ) {
		$fonts_url = add_query_arg(
			array(
				'family' => rawurlencode( implode( '|', array_unique( $fonts ) ) ),
				'subset' => rawurlencode( 'latin,latin-ext' ),
			), 'https://fonts.googleapis.com/css'
		);
	}

	return esc_url_raw( $fonts_url );
}


/**
 * Add preconnect for Google Fonts.
 *
 * @param  array  $urls           URLs to print for resource hints.
 * @param  string $relation_type  The relation type the URLs are printed.
 * @return array  $urls           URLs to print for resource hints.
 */
function ava_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'ava-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'ava_resource_hints', 10, 2 );

/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */
function ava_enqueue_admin_style() {
	wp_enqueue_style( 'ava-admin-style', get_theme_file_uri( '/assets/css/admin-style.css' ), false, '@@pkg.version', 'all' );
	wp_enqueue_style( 'wp-color-picker' );
}
add_action( 'admin_enqueue_scripts', 'ava_enqueue_admin_style' );

/**
 * Enqueue a script in the WordPress admin, for edit.php, post.php and post-new.php.
 *
 * @param int $hook Hook suffix for the current admin page.
 */
function ava_enqueue_admin_script( $hook ) {
	global $pagenow, $wp_customize;

	if ( 'edit.php' !== $hook ) {
		wp_enqueue_script( 'ava-post-meta', get_theme_file_uri( '/assets/js/admin/post-meta.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'wp-color-picker' );
	}

	if ( 'widgets.php' === $pagenow || isset( $wp_customize ) ) {
		wp_enqueue_media();
		wp_enqueue_script( 'widget-image-upload', get_theme_file_uri( '/assets/js/admin/media.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'jquery-ui-core' );
	}
}
add_action( 'admin_enqueue_scripts', 'ava_enqueue_admin_script' );

/**
 * Convert HEX to RGB.
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 * HEX code, empty array otherwise.
 */
function ava_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ) . substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ) . substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ) . substr( $color, 2, 1 ) );
	} elseif ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array(
		'red'   => $r,
		'green' => $g,
		'blue'  => $b,
	);
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function ava_body_classes( $classes ) {
	global $post;

	global $wp_version;

	// Adds a class if we're in the Customizer.
	if ( is_customize_preview() ) {
		$classes[] = 'is-customize-preview';
	}

	// Adds a class if we're in the Customizer.
	if ( is_customize_preview() ) {
		$classes[] = 'is-customize-preview';
	}

	// Adds a class is a site border is specified in the Customizer.
	if ( get_theme_mod( 'site_border', ava_defaults( 'site_border' ) ) ) {
		$classes[] = 'has-site-border';
	}

	// Adds a class is a site border is specified in the Customizer.
	if ( is_singular( 'post' ) && has_post_thumbnail() ) {
		$classes[] = 'has-featured-img';
	}

	// Override the variable based on the URL parameter.
	if ( isset( $_GET['header-position'] ) ) {
		$classes[] = $_GET['header-position'];
	}

	// Adds a class if a page has an absolute positioned header, via the page meta settings.
	if ( is_page() && ( 'absolute' === get_post_meta( $post->ID, '_ava_header_style', true ) ) ) {
		$classes[] = 'site-header--absolute';
	}

	// Adds a class if a page has an absolute positioned header, via the page meta settings.
	if ( is_page() && ( 'fixed' === get_post_meta( $post->ID, '_ava_header_style', true ) ) ) {
		$classes[] = 'site-header--fixed';
	}

	// Adds a class if a page has an alternate header color scheme, via the page meta settings.
	if ( is_page() && ( 'light' === get_post_meta( $post->ID, '_ava_header_scheme', true ) ) ) {
		$classes[] = 'site-header--light';
	}

	// Adds a class if a page has an absolute positioned header, via the page meta settings.
	if ( is_singular( 'portfolio' ) && ( 'absolute' === get_post_meta( $post->ID, '_ava_header_style', true ) ) ) {
		$classes[] = 'site-header--absolute';
	}

	// Adds a class if a page has an absolute positioned header, via the page meta settings.
	if ( is_singular( 'portfolio' ) && ( 'fixed' === get_post_meta( $post->ID, '_ava_header_style', true ) ) ) {
		$classes[] = 'site-header--fixed';
	}

	// Adds a class if a page has an alternate header color scheme, via the page meta settings.
	if ( is_singular( 'portfolio' ) && ( 'light' === get_post_meta( $post->ID, '_ava_header_scheme', true ) ) ) {
		$classes[] = 'site-header--light';
	}

	// Add a class to the WooCommerce cart page if the WooCommerce cart is empty.
	if ( ava_is_woocommerce_activated() ) {
		if ( is_cart() && count( WC()->cart->get_cart() ) === 0 ) {
			$classes[] = 'woocommerce--empty-cart';
		}
	}

	return $classes;
}
add_filter( 'body_class', 'ava_body_classes' );

if ( ! function_exists( 'ava_browser_body_classes' ) ) :
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 * @return array (Maybe) filtered body classes.
	 */
	function ava_browser_body_classes( $classes ) {
		global $is_lynx, $is_gecko, $is_ie, $is_opera, $is_ns4, $is_safari, $is_chrome, $is_iphone;

		if ( $is_lynx ) {
			$classes[] = 'lynx';
		} elseif ( $is_gecko ) {
			$classes[] = 'gecko';
		} elseif ( $is_opera ) {
			$classes[] = 'opera';
		} elseif ( $is_ns4 ) {
			$classes[] = 'ns4';
		} elseif ( $is_safari ) {
			$classes[] = 'safari';
		} elseif ( $is_chrome ) {
			$classes[] = 'chrome';
		} elseif ( $is_ie ) {
			$classes[] = 'ie';
			if ( preg_match( '/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version ) ) {
				$classes[] = 'ie' . $browser_version[1];
			}
		} else {
			$classes[] = 'unknown';
		}

		if ( $is_iphone ) {
			$classes[] = 'iphone';
		}

		return $classes;
	}
endif;
add_filter( 'body_class', 'ava_browser_body_classes' );

/**
 * Query whether WooCommerce is activated.
 */
function ava_is_woocommerce_activated() {
	if ( class_exists( 'woocommerce' ) ) {
		return true;
	} else {
		return false;
	}
}

if ( ! function_exists( 'ava_comments' ) ) :
	/**
	 * Define custom callback for comment output.
	 * Based strongly on the output from Twenty Sixteen.
	 *
	 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments
	 * @link https://wordpress.org/themes/twentysixteen/
	 *
	 * @param string  $comment Comment to output.
	 * @param array   $args Arguments to pass through.
	 * @param integer $depth Amount of comments to go down.
	 *
	 * Create your own ava_comments() to override in a child theme.
	 */
	function ava_comments( $comment, $args, $depth ) {

		$allowed_html_array = array(
			'a'      => array(
				'href'  => array(),
				'title' => array(),
			),
			'br'     => array(),
			'cite'   => array(),
			'em'     => array(),
			'strong' => array(),
		);

		$GLOBALS['comment'] = $comment; ?>

		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<div id="comment-<?php comment_ID(); ?>">

				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, $size = '76' ); ?>
					<?php printf( wp_kses( __( '<cite class="fn">%s</cite> ', 'ava' ), $allowed_html_array ), get_comment_author_link() ); ?></span>
				</div>

				<p class="comment-meta commentmetadata subtext">
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf( esc_html__( ' %1$s at %2$s', 'ava' ), get_comment_date(), get_comment_time() ); ?></a><?php edit_comment_link( esc_html__( 'Edit', 'ava' ), ' &middot; ', '' ); ?>
										<?php
										comment_reply_link(
											array_merge(
												$args, array(
													'before' => ' &middot; ',
													'depth'  => $depth,
													'max_depth' => $args['max_depth'],
												)
											)
										);
?>
				</p>

				<div class="comment-body">
					<?php if ( $comment->comment_approved === '0' ) : ?>
						<span class="moderation"><?php esc_html_e( 'Awaiting Moderation', 'ava' ); ?></span>
					<?php endif; ?>
				<?php comment_text(); ?>
				</div>

			</div>
		</li>
	<?php
	}
endif;

if ( ! function_exists( 'ava_widget_tag_cloud_args' ) ) :
	/**
	 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
	 *
	 * @param array $args Arguments for tag cloud widget.
	 * @return array A new modified arguments.
	 */
	function ava_widget_tag_cloud_args( $args ) {
		$args['largest']  = .9;
		$args['smallest'] = .9;
		$args['unit']     = 'em';
		return $args;
	}
	add_filter( 'widget_tag_cloud_args', 'ava_widget_tag_cloud_args' );
endif;

if ( ! function_exists( 'ava_pingback_header' ) ) :
	/**
	 * Add a pingback url auto-discovery header for singularly identifiable articles.
	 */
	function ava_pingback_header() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
		}
	}
	add_action( 'wp_head', 'ava_pingback_header' );
endif;

if ( ! function_exists( 'ava_disable_team_singular_post' ) ) :
	/**
	 * Disable team single post pages.
	 */
	function ava_disable_team_singular_post() {

		$post_type = get_query_var( 'post_type' );
		if ( is_single() && 'team' === $post_type ) {
			wp_safe_redirect( esc_url( home_url( '/' ) ), 301 );
			exit;
		}

	}
	add_action( 'template_redirect', 'ava_disable_team_singular_post' );
endif;

/**
 * Add the hover featured image thumbnail to the WooCommerce product post type.
 */
if ( class_exists( 'MultiPostThumbnails' ) ) {
	new MultiPostThumbnails(
		array(
			'label'     => esc_html__( 'Product Image, Hover', 'ava' ),
			'id'        => 'hover-image',
			'post_type' => 'product',
		)
	);
}

/**
 * Post meta.
 */
require get_theme_file_path( '/inc/meta/meta.php' );
require get_theme_file_path( '/inc/meta/meta-page.php' );
require get_theme_file_path( '/inc/meta/meta-portfolio.php' );

/**
 * Customizer.
 */
require get_theme_file_path( '/inc/customizer/defaults.php' );
require get_theme_file_path( '/inc/customizer/customizer.php' );
require get_theme_file_path( '/inc/customizer/customizer-css.php' );
require get_theme_file_path( '/inc/customizer/sanitization.php' );
require get_theme_file_path( '/inc/customizer/layouts.php' );
require get_theme_file_path( '/inc/customizer/callbacks.php' );
require get_theme_file_path( '/inc/customizer/fonts.php' );

/**
 * Custom template tags for this theme.
 */
require get_theme_file_path( '/inc/template-tags.php' );

/**
 * Custom template hooks for this theme.
 */
require get_theme_file_path( '/inc/template-hooks.php' );

/**
 * Load Likes compatibility file.
 */
require get_theme_file_path( '/inc/likes.php' );

/**
 * Load Jetpack compatibility file.
 */
require get_theme_file_path( '/inc/jetpack.php' );

/**
 * Load WooCommerce compatibility file.
 */
if ( ava_is_woocommerce_activated() ) :
	require get_theme_file_path( '/inc/woocommerce.php' );
endif;

/**
 * Load Beaver Builder compatibility file.
 */
require get_theme_file_path( '/fl-builder/fl-builder.php' );

/**
 * Load editor formats.
 */
require get_theme_file_path( '/inc/editor-formats.php' );

/**
 * Load template functions.
 */
require get_theme_file_path( '/inc/functions/header-functions.php' );
require get_theme_file_path( '/inc/functions/footer-functions.php' );
require get_theme_file_path( '/inc/functions/portfolio-functions.php' );

/**
 * Load Typekit compatibility file.
 */
require get_theme_file_path( '/inc/typekit.php' );

/**
 * SVG icons functions and filters.
 */
require get_theme_file_path( '/inc/icons.php' );

/**
 * Admin specific functions.
 */
require get_parent_theme_file_path( '/inc/admin/init.php' );

/**
 * Disable Merlin WP.
 */
function themebeans_merlin() {}
