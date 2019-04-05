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

<div class="site-header__inner header-4">

	<div class="site-header__left flex__center">
		<?php
		// Get the position of the Checkout icon from the Customizer.
		// If the right position is enabled, show this icon - or if we're in the Customizer.
		if ( 'left' === $checkout_position || is_customize_preview() ) :
			ava_get_cart_icon( 'header_checkout' );
		endif;
		?>

		<?php if ( has_nav_menu( 'primary' ) ) : ?>

			<nav class="main-navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'ava' ); ?>" itemscope itemtype="http://schema.org/SiteNavigationElement">
				<?php ava_get_menu( 'primary', 'primary-menu', 'primary-menu', 2 ); ?>
			</nav>

		<?php
		elseif ( is_customize_preview() ) :
			ava_customizer_add_menu( 'right', esc_attr__( 'Primary', 'ava' ) );
		endif;
		?>

		<?php ava_the_custom_logo( true ); ?>

	</div>

	<div class="site-header__right flex__center">

		<?php if ( has_nav_menu( 'secondary' ) ) : ?>
			<nav class="main-navigation" aria-label="<?php esc_attr_e( 'Secondary Menu', 'ava' ); ?>" itemscope itemtype="http://schema.org/SiteNavigationElement">
				<?php ava_get_menu( 'secondary', 'secondary-menu', '', 2 ); ?>
			</nav>
		<?php
		elseif ( is_customize_preview() ) :
			ava_customizer_add_menu( 'left', esc_attr__( 'Secondary', 'ava' ) );
		endif;
		?>

		<?php ava_get_social_navigation( 'header-social' ); ?>

		<?php ava_get_search_trigger( 'header_search' ); ?>

		<?php
		// Get the position of the Checkout icon from the Customizer.
		// If the right position is enabled, show this icon - or if we're in the Customizer.
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
