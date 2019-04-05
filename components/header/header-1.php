<?php
/**
 * The template for displaying a header.
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

$flyout            = get_theme_mod( 'flyout', ava_defaults( 'flyout' ) );
$checkout_position = get_theme_mod( 'header_checkout_position', ava_defaults( 'header_checkout_position' ) );
?>

<div class="site-header__inner header-1">

	<div class="site-header__left flex__center">

		<?php
		// Display the checkout icon if the Left Customizer option is selected.
		if ( 'left' === $checkout_position || is_customize_preview() ) :
			ava_get_cart_icon( 'header_checkout' );
		endif;

		// Display the primary navigational element, on the right.
		if ( has_nav_menu( 'primary' ) ) :

			printf( '<nav class="main-navigation" aria-label="%s" itemscope itemtype="http://schema.org/SiteNavigationElement">', esc_html( 'Primary Menu', 'ava' ) );
				ava_get_menu( 'primary', 'primary-menu', 'primary-menu', 3 );
			printf( '</nav>' );

			// Display the secondary navigational element, on the right.
			elseif ( is_customize_preview() ) :
				ava_customizer_add_menu( 'right', esc_attr__( 'Primary', 'ava' ) );
			endif;
		?>

	</div>

	<div class="site-header__middle flex__center">
		<?php ava_the_custom_logo( true ); ?>
	</div>

	<div class="site-header__right flex__center">

		<?php
		// Display the secondary navigational element, on the right.
		if ( has_nav_menu( 'secondary' ) ) :

			printf( '<nav class="main-navigation" aria-label="%s" itemscope itemtype="http://schema.org/SiteNavigationElement">', esc_html( 'Secondary Menu', 'ava' ) );
				ava_get_menu( 'secondary', 'secondary-menu', 'secondary-menu', 3 );
			printf( '</nav>' );

			// Display the secondary navigational element, on the right.
			elseif ( is_customize_preview() ) :
				ava_customizer_add_menu( 'left', esc_attr__( 'Secondary', 'ava' ) );
		endif;

			ava_get_social_navigation( 'header-social' );

			ava_get_search_trigger( 'header_search' );

			/*
			* Get the position of the Checkout icon from the Customizer.
			* If the right position is enabled, show this icon - or if we're in the Customizer.
			*/
			if ( 'right' === $checkout_position || is_customize_preview() ) :
				ava_get_cart_icon( 'header_checkout' );
		endif;
			// If the flyout is enabled, show it - or if we're in the Customizer.
			if ( true === $flyout || is_customize_preview() ) :
				ava_flyout_trigger();
		endif;
		?>

	</div>

</div>
