<?php
/**
 * Add Typekit Support
 * See: https://typekit.com/
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

if ( ! function_exists( 'ava_typekit_setup' ) ) :
	/**
	 * Enqueue Typekit scripts.
	 */
	function ava_typekit_setup() {

		// Get the theme option from the Customizer > Site Editor > Fonts panel.
		$typekit_id = get_theme_mod( 'typekit_id', ava_defaults( 'typekit_id' ) );

		// If there's no font ID. Stop here.
		if ( empty( $typekit_id ) ) {
			return;
		}

		// Enqueue the Typekit Javascript file, using the Typekit ID provided.
		wp_enqueue_script( 'ava-typekit', '//use.typekit.net/' . esc_js( $typekit_id ) . '.js', array(), '@@pkg.version' );

		// Add the inine script.
		if ( wp_script_is( 'ava-typekit', 'enqueued' ) ) {
			wp_add_inline_script( 'ava-typekit', 'try{Typekit.load({ async: true });}catch(e){}' );
		}
	}
endif;
add_action( 'wp_head', 'ava_typekit_setup', 6 );

/**
 * Prepends the Typekit enabled fonts added to the Customizer.
 *
 * @param  array $fonts Default fonts from the ava_get_fonts function.
 * @return array of default fonts, plus the new typekit additions.
 */
function ava_typekit_fonts( $fonts ) {

	// Get the options from the Customizer > Typography section.
	$typekit_id = get_theme_mod( 'typekit_id', ava_defaults( 'typekit_id' ) );
	$font_1     = get_theme_mod( 'typekit_font_1', ava_defaults( 'typekit_font_1' ) );
	$font_2     = get_theme_mod( 'typekit_font_2', ava_defaults( 'typekit_font_2' ) );

	// Return if there's no font family added.
	if ( empty( $typekit_id ) || ( ! $font_1 && ! $font_2 ) ) {
		return $fonts;
	}

	if ( $font_1 ) {
		// Generate the slug.
		$font_1_slug = ( $font_1 ) ? strtolower( preg_replace( '#[^a-zA-Z]#', '-', $font_1 ) ) : null;

		// Setup the array.
		$typekit_fonts = array(
			$font_1_slug => $font_1,
		);

		// Combine arrays.
		$fonts = array_merge( $typekit_fonts, $fonts );
	}

	if ( $font_2 ) {
		// Generate the slug.
		$font_2_slug = ( $font_1 ) ? strtolower( preg_replace( '#[^a-zA-Z]#', '-', $font_2 ) ) : null;

		// Setup the array.
		$typekit_fonts = array(
			$font_2_slug => $font_2,
		);

		// Combine arrays.
		$fonts = array_merge( $typekit_fonts, $fonts );
	}

	return $fonts;
}

add_filter( 'ava_site_editor_fonts', 'ava_typekit_fonts' );
