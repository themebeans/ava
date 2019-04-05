<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */



if ( ! function_exists( 'ava_jetpack_setup' ) ) :
	function ava_jetpack_setup() {

		/*
		 * Let JetPack manage the site logo.
		 * By adding theme support, we declare that this theme does use the default
		 * JetPack Site Logo functionality, if the module is activated.
		 *
		 * See: http://jetpack.me/support/site-logo/
		 * See: https://developer.wordpress.org/reference/functions/add_image_size/
		 */
		add_image_size( 'ava-logo', 200, 75 );

		add_theme_support( 'site-logo', array( 'size' => 'ava-logo' ) );

	}
endif;
add_action( 'after_setup_theme', 'ava_jetpack_setup' );
