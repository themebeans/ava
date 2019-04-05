<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

get_header(); ?>

<div id="primary" class="content-area">

	<main id="main" class="site-main page-item single-page">
		<?php

		/*
		 * Check if WooCommerce is activated, then display the following
		 * only on the WooCommerce archive and taxonomy pages.
		 */
		if ( ava_is_woocommerce_activated() ) {

			if ( is_shop() || is_product_category() || is_product_tag() || is_singular( 'product' ) ) {
				/*
				 * Let's not show the filtering system on the singular product pages, as that's not necessary.
				 *
				 * @see https://codex.wordpress.org/Function_Reference/is_singular
				 */
				if ( ! is_singular( 'product' ) ) {
					?>

					<div class="product-sidebar">

						<button class="product-categories-trigger">
							<span class="product-categories-trigger--text">
								<?php echo esc_html__( 'Filter', 'ava' ); ?>
							</span>
							<span class="product-categories-trigger--icon"></span>
						</button>

						<div class="product-filter">
							<?php if ( is_active_sidebar( 'shop-sidebar' ) ) : ?>
								<?php dynamic_sidebar( 'shop-sidebar' ); ?>
							<?php else : ?>
								<?php the_widget( 'WC_Widget_Product_Categories' ); ?>
							<?php endif; ?>
						</div>

					</div>

					<?php
				}

				/*
				 * Add basic WooCommerce support.
				 *
				 * @see https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/#section-1
				 */
				woocommerce_content();

				$pagination = get_theme_mod( 'shop_pagination', ava_defaults( 'shop_pagination' ) );

				if ( 'pager' === $pagination ) {
					ava_woocommerce_standard_pagination();
				} else {
					ava_woocommerce_pagination();
				}
			}
		}
		?>

	</main>

</div>

<?php
get_footer();
