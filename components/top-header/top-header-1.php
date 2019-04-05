<?php
/**
 * Only display the secondary header if the option is selected in the Customizer.
 */

if ( isset( $_GET['topheader'] ) ) {
	$visibility = '';
} else {
	$visibility = ( false === get_theme_mod( 'topheader_active', ava_defaults( 'topheader_active' ) ) ) ? ' hidden ' : '';
}

if ( get_theme_mod( 'topheader_active', ava_defaults( 'topheader_active' ) ) || is_customize_preview() || isset( $_GET['topheader'] ) ) { ?>

	<header class="site-top-header<?php echo esc_attr( $visibility ); ?>" itemscope itemtype="http://schema.org/WPHeader">

		<div class="site-top-header__inner top-header-1">

			<div class="site-top-header__left flex__center">
			</div>

			<div class="site-top-header__middle flex__center">

				<?php if ( has_nav_menu( 'top-header' ) ) : ?>
					<nav class="main-navigation" aria-label="<?php esc_attr_e( 'Secondary Header Menu', 'ava' ); ?>">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'top-header',
								'menu_class'     => 'header-secondary-menu',
								'depth'          => '1',
							)
						);
						?>
					</nav>
				<?php
				elseif ( is_customize_preview() ) :
					ava_customizer_add_menu( 'right', esc_attr__( 'Top', 'ava' ) );
				endif;
				?>

			</div>

			<div class="site-top-header__right flex__center">

				<?php ava_get_social_navigation( 'top-header-social' ); ?>

				<?php ava_get_search_trigger( 'topheader_search' ); ?>

			</div>

		</div>

	</header>

<?php
}
?>
