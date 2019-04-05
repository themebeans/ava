<?php
/**
 * Fonts functionality
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Returns an array of Google Font options
 *
 * @return array of font styles.
 */
function ava_get_fonts() {

	$fonts = array(
		'Abril Fatface'       => 'Abril Fatface',
		'georgia'             => 'Georgia',
		'helvetica'           => 'Helvetica',
		'Lato'                => 'Lato',
		'Lora'                => 'Lora',
		'Karla'               => 'Karla',
		'Josefin Sans'        => 'Josefin Sans',
		'Montserrat'          => 'Montserrat',
		'Open Sans'           => 'Open Sans',
		'Oswald'              => 'Oswald',
		'Overpass'            => 'Overpass',
		'Poppins'             => 'Poppins',
		'PT Sans'             => 'PT Sans',
		'Roboto'              => 'Roboto',
		'Fira Sans Condensed' => 'Fira Sans',
		'times'               => 'Times New Roman',
		'Nunito'              => 'Nunito',
		'Merriweather'        => 'Merriweather',
		'Rubik'               => 'Rubik',
		'Playfair Display'    => 'Playfair Display',
		'Spectral'            => 'Spectral',
	);

	return apply_filters( 'ava_site_editor_fonts', $fonts );
}

