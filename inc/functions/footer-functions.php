<?php
/**
 * Footer Functions
 *
 * Functions for footer specific things.
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

if ( ! function_exists( 'ava_do_footer' ) ) :
	/**
	 * Retrieve the footer.
	 */
	function ava_do_footer() {
		if ( ! is_page_template( 'template-blank.php' ) ) {
			/*
			 * @hooked null
			 */
			do_action( 'ava_before_footer' );

			/*
			 * @hooked ava_footer_contents
			 */
			do_action( 'ava_footer' );

			/*
			 * @hooked ava_colophon
			 */
			do_action( 'ava_after_footer' );
		}
	}
endif;

if ( ! function_exists( 'ava_footer_contents' ) ) :
	/**
	 * Retrieve the footer layout selected in the Customizer.
	 * Then load the appropriate layout located in /components/footer/.
	 */
	function ava_footer_contents() {

		global $post;

		// Get the current footer layout option.
		$footer = get_theme_mod( 'footer', ava_defaults( 'footer' ) );

		// Override the variable based on the URL parameter.
		if ( isset( $_GET['footer'] ) ) {
			$footer = $_GET['footer'];
		}

		if ( have_posts() ) {

			// Hide the footer on this page, if the page settings are set to do so.
			if ( 'on' !== get_post_meta( $post->ID, '_ava_hide_footer', true ) ) {
				ava_get_template_part( 'footer', $footer );
			}
		} else {
			ava_get_template_part( 'footer', $footer );
		}
	}
endif;



if ( ! function_exists( 'ava_colophon' ) ) :
	/**
	 * Retrieve the colophon layout selected in the Customizer.
	 * Then load the appropriate layout located in /components/colophon/.
	 */
	function ava_colophon() {

		global $post;

		// Get the current colophon layout option.
		$colophon = get_theme_mod( 'colophon', ava_defaults( 'colophon' ) );

		// Override the variable based on the URL parameter.
		if ( isset( $_GET['colophon'] ) ) {
			$colophon = $_GET['colophon'];
		}

		if ( have_posts() ) {
			// Hide the footer on this page, if the page settings are set to do so.
			if ( 'on' !== get_post_meta( $post->ID, '_ava_hide_footer', true ) ) {

				// Check if the colophon is enabled via the Customizer.
				if ( get_theme_mod( 'colophon_active', ava_defaults( 'colophon_active' ) ) || is_customize_preview() ) :
					ava_get_template_part( 'colophon', $colophon );
				endif;
			}
		} else {
			if ( get_theme_mod( 'colophon_active', ava_defaults( 'colophon_active' ) ) || is_customize_preview() ) :
				ava_get_template_part( 'colophon', $colophon );
			endif;
		}

	}
endif;



if ( ! function_exists( 'ava_site_info' ) ) :
	/**
	 * Conditionally display the content based on the Customizer.
	 *
	 * Create your own ava_site_info() to override in a child theme.
	 */
	function ava_site_info() {
		/*
		 * Set the variables derived from the Customizer.
		 */
		$copyright     = get_theme_mod( 'colophon_copyright', ava_defaults( 'colophon_copyright' ) );
		$copyrighttext = get_theme_mod( 'colophon_copyright_text', ava_defaults( 'colophon_copyright_text' ) );
		$themeinfo     = get_theme_mod( 'colophon_theme_info', ava_defaults( 'colophon_theme_info' ) );

		/*
		 * Check if the copyright or theme info is visible. If so, proceed.
		 */
		if ( $copyright || $themeinfo || is_customize_preview() ) :

			echo '<div class="site-info">';

			/*
			 * Check if the Copyright option is selected in the Customizer.
			 * Let's also display it in the Customizer, so we don't have to do a page refresh.
			 */
			if ( $copyright || is_customize_preview() ) :

				/**
				 * Only display if the option is selected in the Customizer.
				 */
				$visibility = ( false === $copyright ) ? ' hidden ' : '';

				echo '<span class="site-copyright' . esc_attr( $visibility ) . '">';

					/*
					 * Copyright Year.
					 */
					printf(
						'<span class="%1s" itemscope itemtype="http://schema.org/copyrightYear">&copy; %2s </span>',
						esc_attr( 'copyright-year' ),
						esc_html( date( 'Y' ) )
					);

					/*
					 * Format an array of allowed HTML tags and attributes for the $copyrighttext value.
					 *
					 * @link https://codex.wordpress.org/Function_Reference/wp_kses
					 */
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

				/*
				 * Check if the Copyright option is selected in the Customizer.
				 */
				if ( $copyrighttext || is_customize_preview() ) {
					printf(
						'<span class="%1s" itemscope itemtype="http://schema.org/copyrightHolder">%2s</span>',
						esc_attr( 'copyright-text' ),
						wp_kses( $copyrighttext, $allowed_html_array )
					);
				}

				echo '</span>';

			endif;

			/*
			 * Check if the Theme Info option is selected in the Customizer.
			 * Let's also display it in the Customizer, so we don't have to do a page refresh.
			 */
			if ( $themeinfo || is_customize_preview() ) :
				/**
				 * Only display if the option is selected in the Customizer.
				 */
				$visibility = ( false === $themeinfo ) ? ' hidden ' : '';

				/*
				 * Format an array of allowed HTML tags and attributes for the $copyrighttext value.
				 *
				 * @link https://codex.wordpress.org/Function_Reference/wp_kses
				 */
				$allowed_html_array = array(
					'a'    => array(
						'href'  => array(),
						'title' => array(),
					),
					'span' => array(
						'class' => array(),
					),
				);

				/* translators: 'Year, Permalink, Name' */
				printf(
					wp_kses( __( '<span class="%1$1s%2$2s"><a href="%3$3s">Proudly Powered by %4$4s</a></span>', 'ava' ), $allowed_html_array ),
					esc_attr( 'site-theme' ),
					esc_attr( $visibility ),
					esc_url( 'https://themebeans.com/themes/ava/' ),
					esc_html( 'Ava' ) // Let's not translate the theme name.
				);

			endif;

			echo '</div>';

		endif;

	}
endif;
