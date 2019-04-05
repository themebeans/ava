<?php
/**
 * WooCommerce Compatibility File
 * See: https://wordpress.org/plugins/woocommerce/
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Check the current version of WooCommerce.
 *
 * @param array $version Current version number.
 */
function ava_woocommerce_version_check( $version = '3.3' ) {
	if ( class_exists( 'WooCommerce' ) ) {
		global $woocommerce;
		if ( version_compare( $woocommerce->version, $version, '>=' ) ) {
			return true;
		}
	}
	return false;
}

/**
 * Change the number of Related products.
 *
 * @param array $args Related products arguments.
 */
function ava_woocommerce_related_products_args( $args ) {
	/*
	 * Customizer option.
	 */
	$columns_count = get_theme_mod( 'shop_layout_columns_size', ava_defaults( 'shop_layout_columns_size' ) );

	$count = '1';

	if ( 'small' === $columns_count ) {
		$count = '7';
	} elseif ( 'medium' === $columns_count ) {
		$count = '6';
	} else {
		$count = '4';
	}

	$args['posts_per_page'] = $count;
	$args['columns']        = $count;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'ava_woocommerce_related_products_args' );

/**
 * Exclude the featured image from appearing in the product gallery, if there's a product gallery.
 *
 * @param array $html Array of html to output for the product gallery.
 * @param array $attachment_id ID of each image variables.
 */
function ava_woocommerce_remove_featured_image( $html, $attachment_id ) {

	global $post, $product;

	// Get the IDs.
	$attachment_ids = $product->get_gallery_image_ids();

	// If there are none, go ahead and return early - with the featured image included in the gallery.
	if ( ! $attachment_ids ) {
		return $html;
	}

	// Look for the featured image.
	$featured_image = get_post_thumbnail_id( $post->ID );

	// If there is one, exclude it from the gallery.
	if ( $attachment_id == $featured_image ) {
		$html = '';
	}

	return $html;
}
add_filter( 'woocommerce_single_product_image_thumbnail_html', 'ava_woocommerce_remove_featured_image', 10, 2 );

/**
 * Disable the WooCommerce default lightbox styling.
 */
function ava_woocomerce_dequeue_pswp_lightbox_style() {
	wp_dequeue_style( 'photoswipe-default-skin' );
}
add_action( 'wp_enqueue_scripts', 'ava_woocomerce_dequeue_pswp_lightbox_style', 20 );

/**
 * Filter Flexslider to use navigation, instead of images.
 *
 * @param array $array Slider variables.
 */
function ava_woocommerce_single_product_carousel_options( $array ) {
	$array['controlNav'] = true;
	return $array;
}
add_filter( 'woocommerce_single_product_carousel_options', 'ava_woocommerce_single_product_carousel_options' );

/**
 * Customizer option for the WooCommerce sale flash text.
 *
 * @param int   $html Sales flash html.
 * @param array $post Post loop.
 * @param array $product Product loop.
 */
function ava_woocommerce_sale_flash( $html, $post, $product ) {
	/*
	 * Customizer options.
	 */
	$option   = get_theme_mod( 'shop_salebadge', ava_defaults( 'shop_salebadge' ) );
	$text     = get_theme_mod( 'shop_salebadge_text', ava_defaults( 'shop_salebadge_text' ) );
	$position = get_theme_mod( 'shop_salebadge_position', ava_defaults( 'shop_salebadge_position' ) );
	$style    = get_theme_mod( 'shop_salebadge_style', ava_defaults( 'shop_salebadge_style' ) );

	if ( false === $option ) {
		return false;
	}

	/**
	 * Only display if the option is selected in the Customizer.
	 */
	$visibility = ( false == $option ) ? ' hidden ' : '';

	$html = '<span class="onsale' . $visibility . ' ' . $position . ' ' . $style . '">' . $text . '</span>';

	return $html;
}
add_filter( 'woocommerce_sale_flash', 'ava_woocommerce_sale_flash', 10, 3 );

/**
 * Add a Shipping details header to the checkout form.
 */
if ( ! function_exists( 'ava_woocommerce_before_checkout_shipping_form' ) ) :
	function ava_woocommerce_before_checkout_shipping_form() {
		echo '<h3 style="margin-top: 0!important;">';
			echo esc_html__( 'Shipping details', 'ava' );
		echo '</h3>';
	}
	add_action( 'woocommerce_before_checkout_shipping_form', 'ava_woocommerce_before_checkout_shipping_form', 5 );
endif;

/**
 * Get the placeholder image source.
 *
 * @param string $src The image location within this package.
 *
 * @return string
 */
function ava_woocommerce_placeholder_img_src( $src ) {
	$src = get_theme_file_uri( '/assets/images/placeholder.png' );
	return $src;
}
add_filter( 'woocommerce_placeholder_img_src', 'ava_woocommerce_placeholder_img_src' );

/**
 * Get the placeholder image.
 *
 * @param string $size The image size.
 *
 * @return string
 */
function filter_woocommerce_placeholder_img( $size = 'full' ) {
	$thumb_2_src = get_theme_file_uri( '/assets/images/placeholder-2.png' );

	$thumb   = '<div class="thumb thumb--first" style="background-image: url(' . wc_placeholder_img_src() . ');"></div>';
	$thumb_2 = '<div class="thumb thumb--second" style="background-image: url(' . esc_url( $thumb_2_src ) . ');"></div>';

	return '<div class="intrinsic">' . $thumb . $thumb_2 . '</div>';
}
add_filter( 'woocommerce_placeholder_img', 'filter_woocommerce_placeholder_img', 10, 3 );

/**
 * Add product description above product.
 * Output description tab template using the 'woocommerce_after_single_product_summary' hook.
 */
function ava_woocommerce_product_description() {

	echo '<div class="single-product-description">';
		wc_get_template( 'single-product/tabs/description.php' );
	echo '</div>';
}

add_action( 'woocommerce_after_single_product_summary', 'ava_woocommerce_product_description', 5 );



/**
 * Add the product attributes, if there are any.
 */
function ava_woocommerce_add_additional_info_trigger() {

	global $product;

	$attributes = $product->has_attributes();

	if ( ! $attributes ) {
		return;
	}

	$heading = apply_filters( 'woocommerce_product_additional_information_heading', __( 'More Information', 'ava' ) );

	printf( '<div class="woocommerce-attributes-trigger-wrapper"><h2 id="woocommerce-info-trigger">%s</h2>%s</div>', esc_html( $heading ), ava_get_svg( array( 'icon' => 'plus' ) ) );

}
add_action( 'woocommerce_after_single_product_summary', 'ava_woocommerce_add_additional_info_trigger', 5 );

/**
 * Place the single product comments/reviews.
 */

function ava_woocommerce_add_additional_info() {
	wc_get_template( 'single-product/tabs/additional-information.php' );
}
add_filter( 'woocommerce_after_single_product_summary', 'ava_woocommerce_add_additional_info', 5 );



/**
 * Close the summary div, so that the tabs are below.
 */
function ava_woocommerce_single_product_after_summary() {

	if ( ! comments_open() ) {
		return;
	}

	$text = apply_filters( 'ava_product_reviews_text', esc_html__( 'Reviews', 'ava' ) );

	printf( '<div class="woocommerce-reviews-trigger-wrapper"><h2 id="woocommerce-reviews-trigger">%s</h2>%s</div>', esc_html( $text ), ava_get_svg( array( 'icon' => 'plus' ) ) );

}
add_action( 'woocommerce_after_single_product_summary', 'ava_woocommerce_single_product_after_summary', 5 );



/**
 * Remove the tabs, because we output them lower.
 */
function ava_woocommerce_remove_product_tabs( $tabs ) {
	unset( $tabs['description'] );
	unset( $tabs['reviews'] );  // Removes the reviews tab
	unset( $tabs['additional_information'] );  // Removes the additional information tab.
	return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'ava_woocommerce_remove_product_tabs', 98 );



/**
 * Remove the added to cart message.
 */
function ava_custom_add_to_cart_message() {

	global $woocommerce;

	$return_to = get_permalink( wc_get_page_id( 'shop' ) );

	$message = sprintf( '<a href="%s" class="button wc-forwards">%s</a> %s', $return_to, esc_html__( 'Continue Shopping', 'ava' ), esc_html__( 'Product successfully added to your cart.', 'ava' ) );

	return $message;
}

add_filter( 'wc_add_to_cart_message', 'ava_custom_add_to_cart_message' );



/**
 * Change the breadcrumb home text from 'Home' to 'Shop'
 *
 * @see https://docs.woocommerce.com/document/customise-the-woocommerce-breadcrumb/
 */
function ava_woocommerce_breadcrumb_home_text( $defaults ) {
	$defaults['home'] = esc_html__( 'Shop', 'ava' );
	return $defaults;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'ava_woocommerce_breadcrumb_home_text' );



/**
 * Change the breadcrumb home link to the shop link instead.
 *
 * @see https://docs.woocommerce.com/document/customise-the-woocommerce-breadcrumb/
 */

function ava_woocommerce_breadrumb_home_url() {
	return get_permalink( wc_get_page_id( 'shop' ) );
}
add_filter( 'woocommerce_breadcrumb_home_url', 'ava_woocommerce_breadrumb_home_url' );



/**
 * Add the WooCommerce breadcrumbs function to the single product.
 */
add_action( 'woocommerce_before_single_product', 'woocommerce_breadcrumb', 10, 0 );




/**
 * Change the WooCommerce delimiter.
 */
function ava_woocommerce_change_breadcrumb_delimiter( $defaults ) {
	$defaults['delimiter'] = ava_get_svg( array( 'icon' => 'right' ) );
	return $defaults;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'ava_woocommerce_change_breadcrumb_delimiter' );



/**
 * Add post pagination to WooCommerce products.
 */
function ava_woocommerce_product_pagination() {
	if ( is_singular( 'product' ) ) :

		the_post_navigation(
			array(
				'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous Post: ', 'ava' ) . ' %title</span><span class="nav-title-icon-wrapper">' . ava_get_svg( array( 'icon' => 'left' ) ) . '</span><span class="nav-title">' . esc_html__( 'Previous', 'ava' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next Post:', 'ava' ) . ' %title</span> <span class="nav-title">' . esc_html__( 'Next', 'ava' ) . '<span class="nav-title-icon-wrapper">' . ava_get_svg( array( 'icon' => 'right' ) ) . '</span></span>',
			)
		);

	endif;
}
add_action( 'woocommerce_before_single_product', 'ava_woocommerce_product_pagination', 10, 0 );



/**
 * Add the "back to shop" link to the single products, if on mobile.
 */
function ava_woocommerce_back_to_shop() {

	$url = apply_filters( 'ava_back_to_shop_url', get_permalink( wc_get_page_id( 'shop' ) ) );

	$text = apply_filters( 'ava_back_to_shop_text', esc_html__( 'Back', 'ava' ) );

	printf( '<a href="%s" class="back-to-shop">%s%s</a>', esc_url( $url ), ava_get_svg( array( 'icon' => 'left' ) ), esc_html( $text ) );

}
add_action( 'woocommerce_before_single_product', 'ava_woocommerce_back_to_shop' );



/**
 * Output for the WooCommerce Social Sharing module.
 */
function ava_woocommerce_sharing() {
	global $post;

	if ( has_post_thumbnail() ) {
		$thumbnail_id = get_post_thumbnail_id( $post->ID );
		$thumbnail    = $thumbnail_id ? current( wp_get_attachment_image_src( $thumbnail_id, 'large', true ) ) : '';
	} else {
		$thumbnail = '';
	} ?>
		<div class="woocommerce--sharing">

			<ul>
				<li>
				<div class="svg__twitter-share">
					<a class="pulse-active" href="http://twitter.com/share?text=&#34;<?php the_title(); ?>&#34;&url=<?php echo get_the_permalink(); ?>" target="_blank">
						<?php echo ava_get_svg( array( 'icon' => 'twitter' ) ); ?>
					</a>
				</div>
				</li>

				<li>
					<div class="svg__pinterest-share">
						<a href="http://pinterest.com/pin/create/bookmarklet/?media=<?php echo esc_url( $thumbnail ); ?>&url=<?php the_permalink(); ?>&is_video=false&description=<?php the_title(); ?>" data-pin-do="buttonBookmark" data-pin-custom="true">
										<?php echo ava_get_svg( array( 'icon' => 'pinterest' ) ); ?>
								</a>
							</a>
					</div>
				</li>

				<li>
					<div class="svg__facebook-share">
						<a class="pulse-active" target="_blank" onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php the_title(); ?>&amp;p[summary]=&amp;p[url]=<?php the_permalink(); ?>&amp;&amp;p[images][0]=','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)">
							<?php echo ava_get_svg( array( 'icon' => 'facebook' ) ); ?>
						</a>
					</div>
				</li>

			</ul>

		</div>

	<?php
}
add_action( 'woocommerce_share', 'ava_woocommerce_sharing' );



/**
 * Add the WooCommerce Social Sharing module below the Purchase button.
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 30 );



/**
 * Move the WooCommerce rating below the price on singular views.
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15 );



/**
 * Remove the default "Sale" badge from the Single Product page.
 * and add it to the product images section instead.
 */
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash' );



/**
 * Place the single product comments/reviews.
 */
add_action( 'woocommerce_after_single_product_summary', 'comments_template', 10 );



/**
 * Remove the categories in the entry summary, as we're using the WooCommerce breadcrumbs feature instead.
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );



/**
 * Remove "Add to Cart" from the Product Loop.
 */
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );



/**
 * Remove the shop pagination, in lieu of the custom infinite loading pagination.
 */
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );



/**
 * Remove the Shop page title.
 */
add_filter(
	'woocommerce_show_page_title', function() {
		return false;
	}
);



/**
 * Remove the "Product Description" Header from the Singular product page.
 */
add_filter(
	'woocommerce_product_description_heading', function() {
		return false;
	}
);



/**
 * Remove the standard WooCommerce stylesheet.
 */
add_filter( 'woocommerce_enqueue_styles', '__return_false' );



/**
 * Trim zeros in price decimals.
 */
add_filter( 'woocommerce_price_trim_zeros', '__return_true' );



/**
 * Remove results functionality site-wide.
 */
function woocommerce_result_count() {
	return;
}



/**
 * Get the product price for the loop.
 */
function woocommerce_template_loop_price() {
	return;
}



/**
 * Add masonry layout modifications at the start.
 */
function woocommerce_product_loop_start() {

	/*
	 * Retrieve the shop layout option from the Customizer.
	 */
	$shop_layout = get_theme_mod( 'shop_layout', ava_defaults( 'shop_layout' ) );

	if ( is_singular( 'product' ) ) {

		echo '<div id="hfeed" class="hfeed product-grid product-grid__columns">';

	} else {

		printf(
			'<div id="hfeed" class="hfeed product-grid %1s">',
			esc_attr( $shop_layout )
		);

	}
}



/**
 * Add masonry layout modifications at the end.
 */
function woocommerce_product_loop_end() {
	echo '</div>';
}



/**
 * Show the product title in the product loop. By default this is an H3.
 */
function woocommerce_template_loop_product_title() {

	$product_id = get_the_ID(); // the ID of the product to check

	/*
	 * Retrieve the sho layout option from the Customizer.
	 */
	$title_position = get_theme_mod( 'shop_product_title_position', ava_defaults( 'shop_product_title_position' ) );
	/**
	 * Only display the option if it is selected in the Customizer.
	 */
	$title_visibility = ( false == get_theme_mod( 'shop_product_title', ava_defaults( 'shop_product_title' ) ) ) ? ' hidden ' : '';
	/**
	 * Only display the option if it is selected in the Customizer.
	 */
	$price_visibility = ( false == get_theme_mod( 'shop_product_price', ava_defaults( 'shop_product_price' ) ) ) ? ' hidden ' : '';

	echo '<div class="product-title ' . esc_attr( $title_position ) . ' ">';

	if ( get_theme_mod( 'shop_product_title', ava_defaults( 'shop_product_title' ) ) || is_customize_preview() ) :
		echo '<h4 class=" ' . esc_attr( $title_visibility ) . ' ">' . get_the_title() . '</h4>';
	endif;

	if ( get_theme_mod( 'shop_product_price', ava_defaults( 'shop_product_price' ) ) || is_customize_preview() ) :

		echo '<div class="produt-title--info ' . esc_attr( $price_visibility ) . ' ">';

		echo '<span class="price">';

		if ( ! wc_get_product( $product_id )->get_price_html() ) {
			echo esc_html__( 'View', 'ava' );

		} else {
			wc_get_template( 'loop/price.php' );
		}

		echo '</span>';

		echo '<div class="product-viewmore ' . esc_attr( $price_visibility ) . '">';
			echo esc_html__( 'View', 'ava' );
			echo ava_get_svg( array( 'icon' => 'right' ) );
		echo '</div>';

	endif;

	echo '</div>';
}



/**
 * Get the product thumbnail, or the placeholder if not set.
 *
 * @subpackage  Loop
 * @param string $size (default: 'shop_catalog')
 * @param int    $deprecated1 Deprecated since WooCommerce 2.0 (default: 0)
 * @param int    $deprecated2 Deprecated since WooCommerce 2.0 (default: 0)
 * @return string
 */
function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $deprecated1 = 0, $deprecated2 = 0 ) {
	global $post;
	$image_size = apply_filters( 'ava_single_product_thumbnail_size', $size );

	if ( has_post_thumbnail() ) {

		/**
		 * Add a class if there's more than one thumbnail uploaded.
		 */
		if ( class_exists( 'MultiPostThumbnails' ) && MultiPostThumbnails::has_post_thumbnail( 'product', 'hover-image', $post->ID ) ) :
			$class = ' has-hover-img ';
		else :
			$class = '';
		endif;

		echo '<div class="intrinsic ' . esc_attr( $class ) . ' ">';
			echo ava_product_featured_img( get_the_ID() );
			echo ava_product_featured_img_hover( get_the_ID() );
		echo '</div>';

	} elseif ( wc_placeholder_img_src() ) {
		return wc_placeholder_img( $image_size );
	}
}




if ( ! function_exists( 'ava_product_featured_img' ) ) :
	/**
	 * Return the porfolio featured image.
	 *
	 * Checks if a featured image is uploaded and creates a background image CSS rule
	 * Create your own ava_product_featured_img() to override in a child theme.
	 *
	 * @see https://codex.wordpress.org/Function_Reference/wp_get_attachment_url
	 * @see https://codex.wordpress.org/Function_Reference/get_post_thumbnail_id
	 * @see https://codex.wordpress.org/Function_Reference/has_post_thumbnail
	 */
	function ava_product_featured_img( $post_id ) {
		global $post;

		$feat_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'mark-port-grid' );

		$feat_image = 'background-image: url(' . esc_url( $feat_image[0] ) . ');';
		$feat_image = '<div class="thumb thumb--first" style="' . esc_attr( $feat_image ) . '"></div>';
		return $feat_image;
	}
endif;




if ( ! function_exists( 'ava_product_featured_img_hover' ) ) :
	/**
	 * Return the porfolio featured hover image.
	 *
	 * Checks if a featured image is uploaded and creates a background image CSS rule
	 * Create your own ava_product_featured_img_hover() to override in a child theme.
	 *
	 * @see https://codex.wordpress.org/Function_Reference/wp_get_attachment_url
	 * @see https://codex.wordpress.org/Function_Reference/get_post_thumbnail_id
	 * @see https://codex.wordpress.org/Function_Reference/has_post_thumbnail
	 */
	function ava_product_featured_img_hover( $post_id ) {
		global $post;

		if ( class_exists( 'MultiPostThumbnails' ) ) :

			if ( MultiPostThumbnails::has_post_thumbnail( 'product', 'hover-image' ) ) {
				$feat_image = MultiPostThumbnails::get_post_thumbnail_url( get_post_type(), 'hover-image', $post_id );
				$feat_image = 'background-image: url(' . esc_html( $feat_image ) . ');';
				$feat_image = '<div class="thumb thumb--second" style="' . $feat_image . '"></div>';
				return $feat_image;
			}

		endif;
	}
endif;



if ( ! function_exists( 'ava_woocommerce_pagination' ) ) :
	/**
	 * Prints the WooCommerce shop products pagination.
	 *
	 * Create your own ava_woocommerce_pagination() to override in a child theme.
	 */
	function ava_woocommerce_pagination() {

		if ( get_next_posts_link() ) :
			echo '<div id="infinite-navigation">';
			next_posts_link( apply_filters( 'ava_products_loadmore_button', esc_html__( 'Load More ...', 'ava' ) ), 0 );
			echo '</div>';
		endif;

	}
endif;

if ( ! function_exists( 'ava_woocommerce_standard_pagination' ) ) :
	/**
	 * Displays post pagination links
	 */
	function ava_woocommerce_standard_pagination( $query = false ) {

		global $wp_query;

		if ( $query ) {
			$temp_query = $wp_query;
			$wp_query   = $query;
		}

		// Return early if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		?>
		<div class="page-navigation">
			<?php
				$big = 999999999; // An unlikely integer.

				echo paginate_links(
					array(
						'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format'  => '?paged=%#%',
						'current' => max( 1, get_query_var( 'paged' ) ),
						'total'   => $wp_query->max_num_pages,
					)
				);
			?>
		</div>
		<?php
		if ( isset( $temp_query ) ) {
			$wp_query = $temp_query;
		}
	}
endif;

if ( ! function_exists( 'ava_woocommerce_catalog_orderby_labels' ) ) :
	/**
	 * Modify the default WooCommerce orderby dropdown labels in the mini-bar.
	 *
	 * Create your own ava_woocommerce_catalog_orderby_labels() to override in a child theme.
	 */
	function ava_woocommerce_catalog_orderby_labels( $orderby ) {
		$orderby['menu_order'] = esc_html__( 'All', 'ava' );
		$orderby['popularity'] = esc_html__( 'Popularity', 'ava' );
		$orderby['rating']     = esc_html__( 'Rating', 'ava' );
		$orderby['date']       = esc_html__( 'Newest', 'ava' );
		$orderby['price']      = esc_html__( 'Price: Low to High', 'ava' );
		$orderby['price-desc'] = esc_html__( 'Price: High to Low', 'ava' );

		return $orderby;
	}
	add_filter( 'woocommerce_catalog_orderby', 'ava_woocommerce_catalog_orderby_labels', 20 );
endif;



if ( ! function_exists( 'ava_woocommerce_minibar' ) ) :
	/*
	* Display the shop minibar.
	*
	* Create your own ava_woocommerce_minibar() to override in a child theme.
	*/
	function ava_woocommerce_minibar() {

		/*
		 * Query whether WooCommerce is activated. If not, return early.
		 *
		 * @see https://docs.woocommerce.com/document/query-whether-woocommerce-is-activated/
		 */
		if ( ! ava_is_woocommerce_activated() ) {
			return;
		}

		/*
		 * Display the shop minibar, on the shop and categorical pages only.
		 *
		 * @see https://docs.woocommerce.com/document/conditional-tags/
		 */
		if ( is_shop() || is_product_category() || is_product_tag() ) {
	?>
			<div id="shop-minibar" class="shop-minibar">
				<div class="shop-minibar__inner">
					<div class="shop-minibar__left">
						<span class="shop-minibar__filter-trigger">
							<span class="icon-plus"></span>
							<?php echo apply_filters( 'ava_products_category_filter', esc_html__( 'Filter', 'ava' ) ); ?>
						</span>
					</div>
					<div class="shop-minibar__middle">
						<?php the_widget( 'WC_Widget_Product_Search' ); ?>
					</div>
					<div class="shop-minibar__right">
						<?php do_action( 'ava_shop_minibar_right' ); ?>
					</div>
				</div>
			</div>
		<?php
		}
	}
endif;



if ( ! function_exists( 'ava_woocommerce_minicart' ) ) :
	/*
	* Display the shop minicart.
	*
	* Create your own ava_woocommerce_minicart() to override in a child theme.
	*/
	function ava_woocommerce_minicart() {

		/*
		 * Query whether WooCommerce is activated. If not, return early.
		 *
		 * @see https://docs.woocommerce.com/document/query-whether-woocommerce-is-activated/
		 */
		if ( ! ava_is_woocommerce_activated() ) {
			return;
		}

		/*
		 * Display the shop minibar, on every page except for the cart and checkout pages.
		 * We're also not displaying it on the singular post view, because that view has it's
		 * own mini-bar, which causes an odd overlap with this.
		 *
		 * @see https://docs.woocommerce.com/document/conditional-tags/
		 */
		if ( ! is_cart() && ! is_checkout() && ! is_singular( 'post' ) ) {
	?>

			<?php $cart_menu_class = ( WC()->cart->is_empty() ) ? 'no-contents' : 'has-contents'; ?>

			<?php $icon            = get_theme_mod( 'shop_ajaxcart_icon', ava_defaults( 'shop_ajaxcart_icon' ) ); ?>

			<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" id="cart--button" class="cart--button <?php echo esc_attr( $cart_menu_class ); ?>">
				<div class="svg__wrapper">
					<?php echo ava_get_svg( array( 'icon' => $icon ) ); ?>
					<?php echo ava_get_svg( array( 'icon' => 'close' ) ); ?>
				</div>
				<?php echo ava_woocommerce_get_cart_contents_count(); ?>
			</a>

			<div id="minicart-panel" class="minicart-panel">
					<div class="minicart-panel__container <?php echo esc_attr( $cart_menu_class ); ?>">
						<div class="wrapper">
							<div class="body">
								<div class="widget_shopping_cart_content">
									<?php woocommerce_mini_cart(); ?>
								</div>
							</div>
						</div>
					</div>
			</div>

			<div id="cart--overlay" class="cart--overlay"></div>

		<?php
		}
	}
endif;



/*
 * Display the shop minicart.
 *
 * Create your own ava_woocommerce_minicart() to override in a child theme.
 */
function ava_remove_exclamation_woocommerce_sale_flash( $html ) {
	return str_replace( '!', '', $html );
}
add_filter( 'woocommerce_sale_flash', 'ava_remove_exclamation_woocommerce_sale_flash' );



/**
 * Change text strings
 *
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/gettext
 */
function ava_woocommerce_related_text( $translated_text, $text, $domain ) {

	switch ( $translated_text ) {
		case 'Related products':
			$translated_text = apply_filters( 'ava_related_product_text', esc_html__( 'You might also enjoy these...', 'ava' ) );
			break;
	}

	return $translated_text;
}
add_filter( 'gettext', 'ava_woocommerce_related_text', 20, 3 );



/**
 * Change text strings
 *
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/gettext
 */
function ava_woocommerce_upsells_text( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'You may also like&hellip;':
			$translated_text = apply_filters( 'ava_upsells_text', esc_html__( 'Check these out...', 'ava' ) );
			break;
	}
	return $translated_text;
}
add_filter( 'gettext', 'ava_woocommerce_upsells_text', 20, 3 );



/**
 * Add a title to the quantity input
 */
function ava_woocommerce_single_quantity_text() {
	printf(
		'<span class="quantity-input-text text--small">%1s</span>',
		apply_filters( 'ava_quantity_text', esc_html__( 'QTY:', 'ava' ) )
	);
}
// add_action( 'woocommerce_before_add_to_cart_button', 'ava_woocommerce_single_quantity_text', 5 );
/**
 * Remove the default WooCommerce lightbox, because we have our own.
 */
function ava_woocommerce_remove_lightbox_scripts_and_styles() {
		wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
		wp_dequeue_script( 'prettyPhoto' );
		wp_dequeue_script( 'prettyPhoto-init' );
}
add_action( 'wp_enqueue_scripts', 'ava_woocommerce_remove_lightbox_scripts_and_styles', 99 );



if ( ! function_exists( 'ava_woocommerce_custom_archive_title' ) ) :
	/**
	 * Removes the "Product Category:" from the Archive Title
	 */
	function ava_woocommerce_custom_archive_title( $title ) {
		if ( is_tax() ) {
			$title = single_cat_title( '', false );
		}
		return $title;
	}
endif;
add_filter( 'get_the_archive_title', 'ava_woocommerce_custom_archive_title' );



if ( ! function_exists( 'ava_ajax_add_to_cart_redirect_template' ) ) :
	/*
	*  AJAX "add to cart" redirect: Include custom template
	*/
	function ava_ajax_add_to_cart_redirect_template() {
		if ( isset( $_REQUEST['ava-ajax-add-to-cart'] ) ) {
			wc_get_template( 'ajax-add-to-cart-fragments.php' );
			exit;
		}
	}
	add_action( 'wp', 'ava_ajax_add_to_cart_redirect_template', 1000 );
endif;



if ( ! function_exists( 'ava_woocommerce_get_cart_contents_count' ) ) :
	/*
	*  Get cart contents count.
	*/
	function ava_woocommerce_get_cart_contents_count() {
		$cart_count  = apply_filters( 'ava_cart_count', WC()->cart->cart_contents_count );
		$count_class = ( $cart_count > 0 ) ? '' : ' count--zero';
		return '<span class="cart-count count' . $count_class . '">' . $cart_count . '</span>';
	}
endif;



if ( ! function_exists( 'ava_woocommerce_add_to_cart_count_fragment' ) ) :
	/*
	* Get refreshed count fragment.
	*
	* Ensures that the cart contents update when products are added to the cart via ajax.
	*/
	function ava_woocommerce_add_to_cart_count_fragment( $fragments ) {
		$cart_count               = ava_woocommerce_get_cart_contents_count();
		$fragments['.cart-count'] = $cart_count;
		return $fragments;
	}
endif;
add_filter( 'woocommerce_add_to_cart_fragments', 'ava_woocommerce_add_to_cart_count_fragment' );


if ( ! function_exists( 'ava_woocommerce_get_cart_fragments' ) ) :
	/*
	* Get refreshed cart fragments.
	*
	* Ensures that the cart contents update when products are added to the cart via ajax.
	*/
	function ava_woocommerce_get_cart_fragments( $return_array = array() ) {
		// Get cart count
		$cart_count = ava_woocommerce_add_to_cart_count_fragment( array() );

		// Get cart panel
		ob_start();
		woocommerce_mini_cart();
		$cart_panel = ob_get_clean();

		return apply_filters(
			'woocommerce_add_to_cart_fragments', array(
				'.cart-count'                      => reset( $cart_count ),
				'div.widget_shopping_cart_content' => '<div class="widget_shopping_cart_content">' . $cart_panel . '</div>',
			)
		);
	}
endif;



if ( ! function_exists( 'ava_woocommerce_get_minicart_hash' ) ) :
	/*
	*  Get refreshed cart hash
	*/
	function ava_woocommerce_get_minicart_hash() {
		return apply_filters( 'woocommerce_add_to_cart_hash', WC()->cart->get_cart_for_session() ? md5( json_encode( WC()->cart->get_cart_for_session() ) ) : '', WC()->cart->get_cart_for_session() );
	}
endif;



if ( ! function_exists( 'ava_woocommerce_minicart_remove_product' ) ) :
	/*
	*  Cart panel - AJAX: Remove product from cart
	*/
	function ava_woocommerce_minicart_remove_product() {
		$item_key = $_POST['cart_item_key'];
		$cart     = WC()->instance()->cart;
		$removed  = $cart->remove_cart_item( $item_key );

		if ( $removed ) {
			$json_array['status']    = '1';
			$json_array['fragments'] = ava_woocommerce_get_cart_fragments();
			$json_array['cart_hash'] = ava_woocommerce_get_minicart_hash();
		} else {
			$json_array['status'] = '0';
		}

		echo json_encode( $json_array );
		exit;
	}
endif;
add_action( 'wp_ajax_ava_woocommerce_minicart_remove_product', 'ava_woocommerce_minicart_remove_product' );
add_action( 'wp_ajax_nopriv_ava_woocommerce_minicart_remove_product', 'ava_woocommerce_minicart_remove_product' );



if ( ! function_exists( 'ava_woocommerce_minicart_update_quantity' ) ) :
	/*
	*  Cart panel - AJAX: Update quantity
	*/
	function ava_woocommerce_minicart_update_quantity() {
		$product_json_array = array();

		// WooCommerce: Code from the "../woocommerce/includes/class-wc-form-handler.php" source file
		$cart_updated = false;
		$cart_totals  = isset( $_POST['cart'] ) ? $_POST['cart'] : '';

		if ( is_array( $cart_totals ) ) {
			foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {

				$_product = $values['data'];

				// Skip product if no updated quantity was posted
				if ( ! isset( $cart_totals[ $cart_item_key ] ) || ! isset( $cart_totals[ $cart_item_key ]['qty'] ) ) {
					continue;
				}

				// Sanitize
				$quantity = apply_filters( 'woocommerce_stock_amount_cart_item', wc_stock_amount( preg_replace( '/[^0-9\.]/', '', $cart_totals[ $cart_item_key ]['qty'] ) ), $cart_item_key );

				if ( '' === $quantity || $quantity == $values['quantity'] ) {
					continue;
				}

				// Update cart validation
				$passed_validation = apply_filters( 'woocommerce_update_cart_validation', true, $cart_item_key, $values, $quantity );

				// is_sold_individually
				if ( $_product->is_sold_individually() && $quantity > 1 ) {
					$passed_validation = false;
				}

				if ( $passed_validation ) {
					WC()->cart->set_quantity( $cart_item_key, $quantity, false );
					$cart_updated = true;

					$product_id    = $_product->id; // Save product-id ("$_product" is overwritten by the loop)
					$cart_subtotal = apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $quantity ), $values, $cart_item_key );
				}
			}
		}

		// Trigger action - lets 3rd parties update the cart if they need to and update the $cart_updated variable.
		$cart_updated = apply_filters( 'woocommerce_update_cart_action_cart_updated', $cart_updated );

		if ( $cart_updated ) {

			WC()->cart->calculate_totals(); // Recalc our totals

			$product_json_array['status']    = '1';
			$product_json_array['fragments'] = apply_filters(
				'woocommerce_add_to_cart_fragments', array(
					'.cart-count' => ava_woocommerce_get_cart_contents_count(), // Cart count
					'#ava-cart-panel-item-' . esc_attr( $product_id ) . ' .ava-cart-panel-item-price' => '<div class="ava-cart-panel-item-price">' . $cart_subtotal . '</div>', // Cart item subtotal
					'#minicart-panel .ava-cart-panel-summary-subtotal' => '<span class="ava-cart-panel-summary-subtotal">' . WC()->cart->get_cart_subtotal() . '</span>', // Cart subtotal
				)
			);
		} else {
			$product_json_array['status'] = '0';
		}

		echo json_encode( $product_json_array );

		exit;
	}
endif;
add_action( 'wp_ajax_ava_cart_panel_update', 'ava_woocommerce_minicart_update_quantity' );
add_action( 'wp_ajax_nopriv_ava_cart_panel_update', 'ava_woocommerce_minicart_update_quantity' );



if ( ! function_exists( 'ava_woocommerce_template_loop_product_link_open' ) ) :
	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
	function ava_woocommerce_template_loop_product_link_open() {
		echo '<a href="' . get_the_permalink() . '" class="woocommerce-LoopProduct-link"></a>';
	}
endif;
add_action( 'woocommerce_before_shop_loop_item', 'ava_woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_close', 10 );



if ( ! function_exists( 'ava_woocommerce_remove_catalog_ordering' ) ) :
	/**
	 * Move the WooCommerce filter.
	 */
	function ava_woocommerce_remove_catalog_ordering() {

		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

		add_action( 'ava_shop_minibar_right', 'woocommerce_catalog_ordering' );

	}
endif;
add_action( 'init', 'ava_woocommerce_remove_catalog_ordering' );



if ( ! function_exists( 'ava_woocommerce_image_dimensions' ) ) :
	/**
	 * Set WooCommerce image dimensions upon theme activation.
	 */
	function ava_woocommerce_image_dimensions() {
		global $pagenow;

		if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
			return;
		}
		$catalog   = array(
			'width'  => '1200',   // px
			'height' => '1200',   // px
			'crop'   => 1,        // true
		);
		$single    = array(
			'width'  => '1200',   // px
			'height' => '1200',   // px
			'crop'   => 0,        // true
		);
		$thumbnail = array(
			'width'  => '180',   // px
			'height' => '180',   // px
			'crop'   => 1,        // false
		);
		// Image sizes
		update_option( 'shop_catalog_image_size', $catalog );       // Product category thumbs
		update_option( 'shop_single_image_size', $single );         // Single product image
		update_option( 'shop_thumbnail_image_size', $thumbnail );   // Image gallery thumbs
	}
endif;
add_action( 'after_switch_theme', 'ava_woocommerce_image_dimensions', 1 );
