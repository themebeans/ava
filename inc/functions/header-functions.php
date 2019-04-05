<?php
/**
 * Header Functions
 *
 * Functions for header specific things.
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

if ( ! function_exists( 'ava_do_header' ) ) :
	/**
	 * Retrieve the header.
	 */
	function ava_do_header() {
		/*
		 * Don't show the #masthead on the Blank template.
		 */
		if ( ! is_page_template( 'template-blank.php' ) ) {
			/*
			 * @hooked ava_ally_skip_link
			 * @hooked ava_top_header
			 */
			do_action( 'ava_before_header' );

				echo '<header id="masthead" class="site-header" itemscope itemtype="http://schema.org/WPHeader">';

					/*
					 * @hooked ava_header_contents
					 */
					do_action( 'ava_header' );

				echo '</header>';

			/*
			 * @hooked ava_mobile_header
			 * @hooked ava_title_banner
			 */
			do_action( 'ava_after_header' );
		}
	}
endif;

if ( ! function_exists( 'ava_header_contents' ) ) :
	/**
	 * Retrieve the header layout selected in the Customizer.
	 * Then load the appropriate layout located in /components/header/.
	 */
	function ava_header_contents() {
		/*
		 * Get the current header layout option.
		 */
		$header = get_theme_mod( 'header', ava_defaults( 'header' ) );

		// Override the variable based on the URL parameter.
		if ( isset( $_GET['header'] ) ) {
			$header = $_GET['header'];
		}

		echo '<div class="site-header__wrapper">';
		ava_get_template_part( 'header', $header );
		echo '</div>';
	}
endif;



if ( ! function_exists( 'ava_top_header' ) ) :
	/**
	 * Retrieve the header layout selected in the Customizer.
	 * Then load the appropriate layout located in /components/top-header/.
	 */
	function ava_top_header() {

		$topheader = get_theme_mod( 'topheader', ava_defaults( 'topheader' ) );

		if ( isset( $_GET['topheader'] ) ) {
			$topheader = $_GET['topheader'];
		}

		ava_get_template_part( 'top-header', $topheader );

	}
endif;



if ( ! function_exists( 'ava_mobile_header' ) ) :

	function ava_mobile_header() {

		$ava_mobilecart      = get_theme_mod( 'header_mobile_cart', ava_defaults( 'header_mobile_cart' ) );
		$ava_mobilesearch    = get_theme_mod( 'header_mobile_search', ava_defaults( 'header_mobile_search' ) );
		$mobile_primary_menu = get_theme_mod( 'header_mobile_primary_menu', ava_defaults( 'header_mobile_primary_menu' ) );

		$visibility = ( false === $mobile_primary_menu ) ? ' hidden ' : ''; ?>

		<header class="site-mobile-header">
			<div class="site-mobile-header__inner flex__center">
				<div class="site-mobile-header__left flex__center">
					<?php
					if ( $ava_mobilesearch && ! $ava_mobilecart || is_customize_preview() ) :
						ava_get_search_trigger( 'header_mobile_search' );
					endif;
					ava_get_cart_icon( 'header_mobile_cart' );
					?>

					<?php
					if ( $mobile_primary_menu || is_customize_preview() ) :
						if ( has_nav_menu( 'primary' ) ) :
							printf( '<nav class="main-navigation ' . esc_attr( $visibility ) . '" aria-label="%s" itemscope itemtype="http://schema.org/SiteNavigationElement">', esc_html( 'Primary Menu', 'ava' ) );
							ava_get_menu( 'primary', 'primary-menu', 'primary-menu', 1 );
							printf( '</nav>' );
						endif;
					endif;
					?>

				</div>

				<div class="site-mobile-header__middle flex__center">
					<?php ava_the_custom_logo( false ); ?>
				</div>

				<div class="site-mobile-header__right flex__center">
				<?php
				if ( $ava_mobilesearch && $ava_mobilecart || is_customize_preview() ) :
					ava_get_search_trigger( 'header_mobile_search' );
					endif;
				?>

					<div class="trigger-wrapper">
						<button id="menu-toggle" class="menu-toggle" aria-controls="mobile-menu" aria-expanded="false">
						<div class="hamburger-inner"></div>
						</button>
					</div>

				</div>

			</div>
		</header>

	<?php
	}
endif;



if ( ! function_exists( 'ava_mobile_navigation' ) ) :

	function ava_mobile_navigation() {
		if ( has_nav_menu( 'mobile' ) ) :
	?>
			<nav id="site-navigation" class="main-navigation flyout mobile-navigation" aria-label="<?php esc_attr_e( 'Mobile Menu', 'ava' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'mobile',
						'link_before'    => '<span>',
						'link_after'     => '</span>',
						'walker'         => new AvaClassMobileNavigationWalker(),
					)
				);
			?>
			</nav>
		<?php
		endif;
	}
endif;



if ( ! function_exists( 'ava_flyout' ) ) :

	function ava_flyout() {
		/*
		 * Don't show this on the Blank template.
		 */
		if ( is_page_template( 'template-blank.php' ) ) {
			return;
		}

		/*
		 * Customizer variables.
		 */
		$flyout = get_theme_mod( 'flyout', ava_defaults( 'flyout' ) );

		/*
		 * Let's the get the position of the Flyout element from the Customizer. Then add it as a class on the #secondary aside.
		 */
		$position = get_theme_mod( 'flyout_position', ava_defaults( 'flyout_position' ) );

		/**
	 * Only display if the option is selected in the Customizer.
	 */
		$visibility = ( false === $flyout ) ? ' hidden ' : '';
		?>

		<div id="nav-close" class="nav-close-overlay"></div>

		<aside id="site-flyout" class="site-flyout
		<?php
		if ( ! is_active_sidebar( 'flyout' ) ) {
			echo 'no-widget-area';
		};
?>
	<?php echo esc_attr( $position ); ?>">

		<div class="svg__wrapper close-toggle">
			<a id="flyout-close-toggle" class="flyout-close-toggle">
				<?php echo ava_get_svg( array( 'icon' => 'close' ) ); ?>
			</a>
		</div>

		<div class="sidebar--section mobile-menu">

			<div class="sidebar--section-inner">

				<?php
				ava_mobile_navigation();

				/*
				 * If there is a specified mobile social menu, use it.
				 */
				if ( has_nav_menu( 'mobile-social' ) ) :
					ava_get_social_navigation( 'mobile-social' );
					else :
						/*
						 * If not, fallback to the default header social menu.
						 */
						ava_get_social_navigation( 'header-social' );
					endif;
				?>

				</div>

			</div>

			<?php if ( true === $flyout && is_active_sidebar( 'flyout' ) || is_customize_preview() ) : ?>
			<div class="sidebar--section widget-area">
				<div class="sidebar--section-inner">
					<?php dynamic_sidebar( 'flyout' ); ?>
				</div>
			</div>
		<?php endif; ?>

		</aside>
		<?php
	}
endif;



if ( ! function_exists( 'ava_ally_skip_link' ) ) :

	function ava_ally_skip_link() {
		printf( '<a class="skip-link screen-reader-text" href="#content">%1$s</a>', esc_html( 'Skip to content', 'ava' ) );
	}
endif;

if ( ! function_exists( 'ava_title_banner' ) ) :

	function ava_title_banner() {

		global $post;

		if ( ava_is_woocommerce_activated() ) :
			$url = apply_filters( 'ava_back_to_shop_url', get_permalink( wc_get_page_id( 'shop' ) ) );
		else :
			$url = '';
		endif;

		$text      = esc_html__( 'Back', 'ava' );
		$cart_text = esc_html__( 'Back to Shop', 'ava' );

		if ( ( ava_is_woocommerce_activated() && ! is_shop() ) && ! is_home() && ! is_singular() && ! is_search() && ! is_post_type_archive( 'team' ) && ! is_post_type_archive( 'portfolio' ) && ! is_post_type_archive( 'download' ) && ! is_tax( 'portfolio_category' ) && ! is_tax( 'portfolio_tag' ) ) :

			echo '<header class="site-title-banner">';
			echo '<div class="entry-header--wrappper__inner">';

			if ( ava_is_woocommerce_activated() ) :
				if ( is_product_category() || is_product_tag() ) :
					printf( '<a href="%s" class="back-to-shop">%s%s</a>', esc_url( $url ), ava_get_svg( array( 'icon' => 'left' ) ), esc_html( $text ) );
					endif;
				endif;

				echo '<h1>';
					echo esc_html( ava_page_title() );
				echo '</h1>';

			echo '</div>';

			echo '</header>';

		endif;

		if ( ava_is_woocommerce_activated() && is_cart() ) :

			echo '<header class="site-title-banner">';
			echo '<div class="entry-header--wrappper__inner">';

					printf( '<a href="%s" class="back-to-shop">%s%s</a>', esc_url( $url ), ava_get_svg( array( 'icon' => 'left' ) ), esc_html( $cart_text ) );

				echo '<h1>';
					echo esc_html( ava_page_title() );
				echo '</h1>';

			echo '</div>';

			echo '</header>';

		endif;

	}
endif;



if ( ! function_exists( 'ava_page_title' ) ) :
	/**
	 * Returns the page titles.
	 */
	function ava_page_title() {

		global $post;

		$page_title = '';

		if ( is_archive() ) {

			if ( is_category() ) {
				$page_title = sprintf( '%1$s %2$s', esc_html__( 'Posted in', 'ava' ), esc_html( single_cat_title( '', false ) ) );
			} elseif ( is_tag() ) {
				$page_title = sprintf( '%1$s %2$s', esc_html__( 'Tagged', 'ava' ), esc_html( single_tag_title( '', false ) ) );
			} elseif ( is_date() ) {
				if ( is_month() ) {
					$page_title = sprintf( '%1$s %2$s', esc_html__( 'Archive:', 'ava' ), esc_html( get_the_time( 'F, Y' ) ) );
				} elseif ( is_year() ) {
					$page_title = sprintf( '%1$s %2$s', esc_html__( 'Archive:', 'ava' ), esc_html( get_the_time( 'Y' ) ) );
				} elseif ( is_day() ) {
					$page_title = sprintf( '%1$s %2$s', esc_html__( 'Archive:', 'ava' ), esc_html( get_the_time( get_option( 'date_format' ) ) ) );
				} else {
					$page_title = sprintf( '%1$s', esc_html__( 'Archive:', 'ava' ) );
				}
			} elseif ( is_author() ) {

				the_archive_title();

			} elseif ( is_product_category() ) {
				$page_title = sprintf( '%1$s', esc_html( single_term_title( '', false ) ) );
			} elseif ( is_product_tag() ) {
				$page_title = sprintf( '%1$s', esc_html( single_term_title( '', false ) ) );
			} elseif ( is_tax() ) {
				$page_title = sprintf( '%1$s %2$s', esc_html__( 'Archive:', 'ava' ), esc_html( single_term_title( '', false ) ) );
			} else {
				$page_title = single_term_title( '', false ); }
		} elseif ( is_search() ) {
			if ( have_posts() ) :
				$page_title = sprintf( '%1$s "%2$s"', esc_html__( 'Results for', 'ava' ), esc_html( get_search_query() ) );
					else :
						$page_title = sprintf( '%1$s', esc_html__( 'Nothing Found', 'ava' ) );
					endif;

		} elseif ( is_cart() ) {
			$page_title = sprintf( '%1$s', esc_html__( 'Cart', 'ava' ) );
		}

		echo esc_html( $page_title );

	}
endif;
