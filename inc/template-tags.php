<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Adds data attributes to the body, based on Customizer entries.
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function ava_body_data( $classes ) {
	/*
     	 * Layout variables used throughout the theme.
     	 * These are all managed through the use of the Customizer API.
     	 */
	$footer                   = get_theme_mod( 'footer', ava_defaults( 'footer' ) );
	$colophon                 = get_theme_mod( 'colophon', ava_defaults( 'colophon' ) );
	$header                   = get_theme_mod( 'header', ava_defaults( 'header' ) );
	$single_product           = get_theme_mod( 'single_product', ava_defaults( 'single_product' ) );
	$single_sidebar           = get_theme_mod( 'singlepost_sidebar', ava_defaults( 'singlepost_sidebar' ) );
	$topheader                = get_theme_mod( 'topheader', ava_defaults( 'topheader' ) );
	$flyout_position          = get_theme_mod( 'flyout_position', ava_defaults( 'flyout_position' ) );
	$header_checkout_position = get_theme_mod( 'header_checkout_position', ava_defaults( 'header_checkout_position' ) );
	$shop_columns_size        = get_theme_mod( 'shop_layout_columns_size', ava_defaults( 'shop_layout_columns_size' ) );
	$product_hover            = get_theme_mod( 'shop_product_hover', ava_defaults( 'shop_product_hover' ) );
	$header_mobile_cart       = ( false === get_theme_mod( 'header_mobile_cart', ava_defaults( 'header_mobile_cart' ) ) ) ? 'false' : 'true';
	$header_mobile_search     = ( false === get_theme_mod( 'header_mobile_search', ava_defaults( 'header_mobile_search' ) ) ) ? 'false' : 'true';
	$flyout                   = ( false === get_theme_mod( 'flyout', ava_defaults( 'flyout' ) ) ) ? 'false' : 'true';
	$header_search            = ( false === get_theme_mod( 'header_search', ava_defaults( 'header_social' ) ) ) ? 'false' : 'true';
	$product_breadcrumbs      = ( false === get_theme_mod( 'single_product_breadcrumbs', ava_defaults( 'single_product_breadcrumbs' ) ) ) ? 'false' : 'true';

	$classes[] = sprintf(
		'"
	        data-header="%s"
	        data-top-header="%s"
	        data-footer="%s"
	        data-colophon="%s"
	        data-post-sidebar="%s"
	        data-mobile-cart="%s"
	        data-mobile-search="%s"
	        data-flyout="%s"
	        data-header-checkout-position="%s"
	        data-header-search="%s"
	        data-shop-columns-size="%s"
	        data-flyout-position="%s"
	        data-single-product="%s"
	        data-product-hover="%s"
	        data-single-product-breadcrumbs="%s"',
		esc_attr( $header ),
		esc_attr( $topheader ),
		esc_attr( $footer ),
		esc_attr( $colophon ),
		esc_attr( $single_sidebar ),
		esc_attr( $header_mobile_cart ),
		esc_attr( $header_mobile_search ),
		esc_attr( $flyout ),
		esc_attr( $header_checkout_position ),
		esc_attr( $header_search ),
		esc_attr( $shop_columns_size ),
		esc_attr( $flyout_position ),
		esc_attr( $single_product ),
		esc_attr( $product_hover ),
		esc_attr( $product_breadcrumbs )
	);

	return $classes;
}
add_filter( 'body_class', 'ava_body_data', 999 );



if ( ! function_exists( 'ava_get_menu' ) ) :
	/*
	 * Retrieve a navigational menu.
	 */
	function ava_get_menu( $location, $id, $class, $depth ) {
		$options = array(
			'theme_location' => $location,
			'menu_id'        => $id,
			'menu_class'     => $class,
			'depth'          => $depth,
		);
		return wp_nav_menu( $options );
	}
endif;



if ( ! function_exists( 'ava_get_template_part' ) ) :
	/*
	* Retrieve the component selected in the Customizer.
	*
	* If viewed from the Customizer, load the global template file, so that we can use live previewing.
	*/
	function ava_get_template_part( $path, $component ) {
		if ( is_customize_preview() ) :
			get_template_part( 'components/' . $path . '/' . $path . '-global' );
		else :
			get_template_part( 'components/' . $path . '/' . $component . '' );
		endif;
	}
endif;



if ( ! function_exists( 'ava_blogroll_pagination' ) ) :
	/**
	 * Prints the blog posts pagination, either standard or infinite scrolling.
	 *
	 * Create your own ava_blogroll_pagination() to override in a child theme.
	 */
	function ava_blogroll_pagination() {
		/*
		 * Customizer variable.
		 */
		$ava_infinitescroll = get_theme_mod( 'blog_infscr', ava_defaults( 'blog_infscr' ) );

		if ( $ava_infinitescroll ) {
			if ( get_next_posts_link() ) :
				echo '<div id="infinite-navigation">';
				next_posts_link( apply_filters( 'ava_loadmore_button', esc_html__( 'Load More', 'ava' ) ), 0 );
				echo '</div>';
			endif;

		} else {
			the_posts_pagination(
				array(
					'prev_text'          => apply_filters( 'ava_posts_pagination_prev', esc_html__( 'Prev', 'ava' ) ),
					'next_text'          => apply_filters( 'ava_posts_pagination_next', esc_html__( 'Next', 'ava' ) ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Posts', 'ava' ) . '</span>',
				)
			);
		}
	}
endif;



if ( ! function_exists( 'ava_customizer_add_menu' ) ) :
	/**
	 * Adds a "Add Menu" event to empty menu items within the Customizer.
	 *
	 * Create your own ava_customizer_add_menu() to override in a child theme.
	 */
	function ava_customizer_add_menu( $tooltip_position, $menu ) {

		printf(
			'<span class="customizer-add-menu"><button class="index-event-button customizer-event-button" data-customizer-event="index-add-menu" data-balloon-pos="%1s" data-balloon="' . esc_attr__( 'Add %2$s Menu', 'ava' ) . '"></button></span>',
			esc_attr( $tooltip_position ),
			esc_attr( $menu )
		);

	}
endif;



if ( ! function_exists( 'ava_cart_icon' ) ) :
	/**
	 * Displays the cart icon and checkout URL
	 *
	 * Create your own ava_cart_icon() to override in a child theme.
	 */
	function ava_cart_icon() {

		$icon = get_theme_mod( 'header_checkout_icon', ava_defaults( 'header_checkout_icon' ) );

		/*
		 * Check if Easy Digital Downloads is installed, but not in the Customizer.
		 */
		if ( class_exists( 'Easy_Digital_Downloads' ) && ! is_customize_preview() ) : ?>

				<a href="<?php echo esc_url( edd_get_checkout_uri() ); ?>">
					<?php echo ava_get_svg( array( 'icon' => esc_html( $icon ) ) ); ?>
				</a>

			<?php
		endif;
		/*
		 * Check if WooCommerce is installed, but not in the Customizer.
		 */
		if ( ava_is_woocommerce_activated() && ! is_customize_preview() ) :

			global $woocommerce;

			$url = get_theme_mod( 'header_checkout_url', ava_defaults( 'header_checkout_url' ) );

			if ( 'cart' == $url ) :
				$icon_url = wc_get_cart_url();
				else :
					$icon_url = wc_get_checkout_url();
				endif;
				?>

				<a href="<?php echo esc_url( $icon_url ); ?>">
				<?php echo ava_get_svg( array( 'icon' => esc_html( $icon ) ) ); ?>
			</a>

			<?php
		endif;

		/*
		 * If we're in the Customizer, show the icon.
		 * Because the other two methods are checking for cart contents, the only way to test is to add something to your cart in the Customizer.
		 * That's bad UX, so let's just output a cart icon for the Customizer.
		 */
		if ( is_customize_preview() ) :
	?>

				<a href="javascript:void(0)">
					<?php echo ava_get_svg( array( 'icon' => esc_html( $icon ) ) ); ?>
				</a>

			<?php
		endif;

	}
endif;



if ( ! function_exists( 'ava_search' ) ) :
	/**
	 * Displays the site search form.
	 *
	 * Create your own ava_search() to override in a child theme.
	 */
	function ava_search() {

		/*
		 * Don't show this on the Blank template.
		 */
		if ( is_page_template( 'template-blank.php' ) ) {
			return;
		}

		if ( get_theme_mod( 'header_search', ava_defaults( 'header_search' ) ) || get_theme_mod( 'topheader_search', ava_defaults( 'topheader_search' ) ) ) :
	?>

			<form id="site-search" role="search" method="get" class="site-search-form search-form is--hidden" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<label>
					<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'ava' ); ?></span>
					<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'ava' ); ?>" value="<?php echo get_search_query(); ?>" name="s" autocomplete="off" spellcheck="false"/>
				</label>
				<button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'ava' ); ?></span></button>

				<div class="search-wrapper">
					<?php ava_search_trigger(); ?>
				</div>

			</form>

		<?php
		endif;
	}
endif;



if ( ! function_exists( 'ava_search_trigger' ) ) :
	/**
	 * Displays the search buttons that trigger the fullpage search.
	 *
	 * Create your own ava_search_trigger() to override in a child theme.
	 */
	function ava_search_trigger() {

?>
		<div class="svg__wrapper">
			<a id="site-search-btn" class="site-search-btn pulse-active" href="javascript:void(0);">
				<?php echo ava_get_svg( array( 'icon' => 'search' ) ); ?>
				<?php echo ava_get_svg( array( 'icon' => 'close' ) ); ?>
			</a>
		</div>
	<?php
	}
endif;



if ( ! function_exists( 'ava_get_search_trigger' ) ) :
	/**
	 * Conditionally display the content based on the Customizer.
	 *
	 * Create your own ava_get_search() to override in a child theme.
	 */
	function ava_get_search_trigger( $control ) {
		/**
	 * Only display the search trigger if the option is selected in the Customizer.
	 */
		$visibility = ( false == get_theme_mod( $control, ava_defaults( $control ) ) ) ? ' hidden ' : '';

		if ( get_theme_mod( $control, ava_defaults( $control ) ) || is_customize_preview() ) :
			echo '<div class="search-wrapper' . esc_attr( $visibility ) . '">';
			ava_search_trigger();
			echo '</div>';
		endif;
	}
endif;



if ( ! function_exists( 'ava_flyout_trigger' ) ) :
	/**
	 * Displays the mobile menu trigger..
	 *
	 * Create your own ava_flyout_trigger() to override in a child theme.
	 */
	function ava_flyout_trigger() {

		/**
	 * Only display the search trigger if the option is selected in the Customizer.
	 */
		$visibility = ( false == get_theme_mod( 'flyout', ava_defaults( 'flyout' ) ) ) ? ' hidden ' : '';
	?>

		<div class="trigger-wrapper<?php echo esc_attr( $visibility ); ?>">
			<button id="menu-toggle" class="menu-toggle" aria-controls="mobile-menu" aria-expanded="false">
				<div class="hamburger-inner"></div>
			</button>
		</div>

	<?php
	}
endif;



if ( ! function_exists( 'ava_social_navigation' ) ) :
	/**
	 * Output the social menu.
	 * Checks if the social navigation is added.
	 *
	 * @param string $theme_location - The location of the menu.
	 */
	function ava_get_social_navigation( $theme_location ) {
		/*
		 * Check if a social menu is added.
		 */
		if ( has_nav_menu( esc_html( $theme_location ) ) ) :
	?>

			<div class="social-wrapper">
				<nav class="social-navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'ava' ); ?>">

					<?php
					wp_nav_menu(
						array(
							'theme_location' => esc_html( $theme_location ),
							'menu_class'     => 'social-links-menu',
							'depth'          => '1',
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>' . ava_get_svg( array( 'icon' => 'chain' ) ),
						)
					);
					?>

				</nav>
			</div>

		<?php
		endif;
	}
endif;



if ( ! function_exists( 'ava_post_thumbnail' ) ) :
	/**
	 * Display an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function ava_post_thumbnail() {
		global $post;

		if ( post_password_required() || is_attachment() ) {
			return;
		}

		if ( '' !== get_the_post_thumbnail() ) {

			echo '<div class="entry-media">';

			if ( is_singular() ) :

				the_post_thumbnail( 'page_post-feat' );

				ava_get_pinterest_btn( 'singlepost_pinterest' );

				else :
			?>

					<a class="post-thumbnail" href="<?php esc_url( the_permalink() ); ?>" aria-hidden="true">
					<?php the_post_thumbnail( 'page_post-feat', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
					</a>

					<?php

				 endif;

				echo '</div>';
		}
	}
endif;



if ( ! function_exists( 'ava_get_pinterest_btn' ) ) :
	/**
	 * Conditionally display the content based on the Customizer.
	 *
	 * Create your own ava_get_pinterest_btn() to override in a child theme.
	 */
	function ava_get_pinterest_btn( $control ) {

		if ( 'post' == get_post_type() ) {
			/**
		 * Only display the Pinterest button if the option is selected in the Customizer.
		 */
			$visibility = ( false == get_theme_mod( $control, ava_defaults( $control ) ) ) ? ' hidden ' : '';
			/*
			 * Let's the get the position of the Pinterest button from the Customizer. Then add it as a class on the link.
			 */
			$position = get_theme_mod( $control . '_position', ava_defaults( $control . '_position' ) );

			if ( get_theme_mod( $control, ava_defaults( $control ) ) || is_customize_preview() ) :
		?>

				<a href="https://www.pinterest.com/pin/create/button/" class="btn__pinterest <?php echo esc_attr( $visibility . $position ); ?>" data-pin-do="buttonBookmark" data-pin-custom="true">
					<div class="svg__wrapper">
						<div>
							<?php echo ava_get_svg( array( 'icon' => 'pinterest-share' ) ); ?>
						</div>
					</div>
				</a>

				<?php
			endif;
		}

	}
endif;



if ( ! function_exists( 'ava_entry_meta' ) ) :
	/**
	 * Prints HTML with meta information for the author and comments.
	 * Create your own ava_entry_meta() to override in a child theme.
	 */
	function ava_entry_meta() {

		// Get the variables from the Customizer.
		$date_option   = get_theme_mod( 'blog_date', ava_defaults( 'blog_date' ) );
		$byline_option = get_theme_mod( 'blog_byline', ava_defaults( 'blog_byline' ) );

		if ( false === $date_option && false === $byline_option && ! is_customize_preview() ) {
			return false;
		}

		/**
		 * Only display if the options are selected in the Customizer.
		 */
		$date_visibility   = ( false == $date_option ) ? ' hidden ' : '';
		$byline_visibility = ( false == $byline_option ) ? ' hidden ' : '';

		echo '<div class="entry-meta">';

		if ( 'post' == get_post_type() ) {

			if ( $date_option || is_customize_preview() ) :
				printf( _x( '<span class="days-ago%1$s">%2$s ago </span>', '%s = human-readable time difference', 'ava' ), esc_attr( $byline_visibility ), esc_html( human_time_diff( get_the_time( 'U' ) ), esc_html( current_time( 'timestamp' ) ) ) );
			endif;

			if ( $byline_option || is_customize_preview() ) :
				printf(
					'<span class="byline' . esc_attr( $byline_visibility ) . '"><span class="author vcard"><span class="screen-reader-text">%1$s</span> %2$s <a class="url fn n" href="%3$s">%4$s </a></span></span> ',
					esc_html_x( 'Author', 'Used before post author name.', 'ava' ),
					esc_html( 'By', 'ava' ),
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_html( get_the_author() )
				);
			endif;
		}

		echo '</div>';

	}
endif;

if ( ! function_exists( 'ava_entry_date' ) ) :
	/**
	 * Print HTML with date information for current post.
	 * Create your own ava_entry_date() to override in a child theme.
	 */
	function ava_entry_date() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			'<span class="posted-on"><span class="screen-reader-text">%1$s</span><a href="%2$s" rel="bookmark">%3$s</a></span>',
			esc_html_x( 'Posted on', 'Used before publish date.', 'ava' ),
			esc_url( get_permalink() ),
			$time_string
		);
	}
endif;



if ( ! function_exists( 'ava_the_custom_logo' ) ) :
	/**
	 * Displays the optional custom logo.
	 * Does nothing if the custom logo is not available.
	 */
	function ava_the_custom_logo( $light_option ) {

		if ( has_custom_logo( $light_option ) ) {

			if ( is_singular( 'page' ) || is_singular( 'portfolio' ) ) {
				global $post;

				$scheme     = get_post_meta( $post->ID, '_ava_header_scheme', true );
				$light_logo = get_theme_mod( 'light_site_logo', ava_defaults( 'light_site_logo' ) );

			} else {
				$scheme     = null;
				$light_logo = null;
			}

			/**
		 * We added this, so that the light option does not display on the .site-mobile-header element.
		 */
			if ( false == $light_option ) {
				$light_logo = null;
			}

			if ( 'light' == $scheme && $light_logo ) {

				printf(
					'<div itemscope itemtype="http://schema.org/Organization"><a class="custom-logo-link" href="%1$s" rel="home" itemprop="url"><img class="custom-logo" src="%2$s" alt="%3$s" itemprop="logo"></a></div>',
					esc_url( home_url( '/' ) ),
					esc_url( get_theme_mod( 'light_site_logo' ) ),
					esc_attr( get_bloginfo( 'name', 'display' ) )
				);

			} else {
				echo '<div itemscope itemtype="http://schema.org/Organization">';
				the_custom_logo();
				echo '</div>';
			}
		} else {
			?>
			<h1 class="site-logo-link" itemscope itemtype="http://schema.org/Organization"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
		<?php
		}
	}
endif;



if ( ! function_exists( 'ava_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function ava_entry_footer() {
		// Hide category and tag text for pages.
		if ( is_singular() && 'post' == get_post_type() ) {

			$tags_list       = get_the_tag_list( '', ', ' );
			$categories_list = get_the_category_list( ', ' );

			if ( ! $tags_list || ! $categories_list ) {
				return;
			}

			echo '<footer class="entry-footer">';

			if ( $tags_list ) {
				printf( '<span class="tags-links">' . esc_html__( 'Tagged: %1$s', 'ava' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}

			if ( $categories_list && ava_categorized_blog() ) {
				printf( '<span class="cat-links">' . esc_html__( 'Posted in: %1$s', 'ava' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			echo '</footer>';
		}
	}
endif;



if ( ! function_exists( 'ava_entry_categories' ) ) :
	/**
	 * Prints HTML with meta information for the categories.
	 */
	function ava_entry_categories() {
		if ( 'post' == get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( '&nbsp;&middot;&nbsp;' );
			if ( $categories_list && ava_categorized_blog() ) {
				printf( '<span class="cat-links">%1$s</span><br>', $categories_list ); // WPCS: XSS OK.
			}
		}
	}
endif;



/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function ava_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'ava_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories(
			array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				// We only need to know if there is more than one category.
				'number'     => 2,
			)
		);

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'ava_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so ava_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so ava_categorized_blog should return false.
		return false;
	}
}



/**
 * Flush out the transients used in ava_categorized_blog.
 */
function ava_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'ava_categories' );
}
add_action( 'edit_category', 'ava_category_transient_flusher' );
add_action( 'save_post', 'ava_category_transient_flusher' );


if ( ! class_exists( 'AvaClassMobileNavigationWalker' ) ) :
	/**
	 * Determine whether blog/site has more than one category.
	 *
	 * @return bool True of there is more than one category, false otherwise.
	 */
	class AvaClassMobileNavigationWalker extends Walker_Nav_Menu {


		function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
			$id_field = $this->db_fields['id'];
			if ( is_object( $args[0] ) ) {
				$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
			}
			return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}

		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent  = str_repeat( "\t", $depth );
			$output .= "\n" . $indent . '<ul class="sub_menu">' . "\n";
		}

		function end_lvl( &$output, $depth = 0, $args = array() ) {
			$indent  = str_repeat( "\t", $depth );
			$output .= "$indent</ul>\n";
		}

		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

			$sub    = '';
			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // Code indent.

			if ( $depth >= 0 && $args->has_children ) :
				$sub = ' has_sub';
			endif;

			$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
			$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

			$anchor = '';
			if ( '' !== $item->anchor ) {
				$anchor = '#' . esc_attr( $item->anchor );
			}

			$active = '';
			if ( '' === $item->anchor && ( ( 0 === $item->current && $depth ) || ( 0 === $item->current_item_ancestor && $depth ) ) ) :
				$active = 'ava-active-item';
			endif;

			$output .= $indent . '<li id="mobile-menu-item-' . $item->ID . '" class="' . $class_names . ' ' . $active . $sub . '">';

			$current_a = '';

			// Attributes.
			$attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
			$attributes .= ' href="' . esc_attr( $item->url ) . $anchor . '"';

			if ( ( 0 === $item->current && $depth ) || ( 0 === $item->current_item_ancestor && $depth ) ) :
				$current_a .= ' current ';
			endif;
			if ( esc_attr( $item->url ) === '#' ) {
				$current_a .= ' ava-mobile-no-link';
			}

			$attributes .= ' class="' . $current_a . '"';
			$item_output = $args->before;
			if ( '' === $item->hide ) {
				if ( '' === $item->nolink ) {
					$item_output .= '<a' . $attributes . '>';
				} else {
					$item_output .= '<h6>';
				}
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID );
				$item_output .= $args->link_after;
				if ( '' === $item->nolink ) {
					$item_output .= '</a>';
				} else {
					$item_output .= '</h6>';
				}

				if ( $args->has_children ) {
					$item_output .= '<span class="mobile-navigation--arrow"></span>';
				}
			}
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
endif;
