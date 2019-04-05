<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$visibility = ( false === get_theme_mod( 'single_product_breadcrumbs', ava_defaults( 'single_product_breadcrumbs' ) ) ) ? ' hidden ' : '';

if ( true === get_theme_mod( 'single_product_breadcrumbs', ava_defaults( 'single_product_breadcrumbs' ) ) || is_customize_preview() ) : ?>

	<div class="product-navigation-wrapper <?php echo esc_attr( $visibility ); ?>">

		<?php
			/**
			 * WooCommerce hook.
			 *
			 * @hooked wc_print_notices - 10
			 */
			do_action( 'woocommerce_before_single_product' );
		?>

	</div>

<?php endif; ?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class(); ?>>

	<?php $slider_nav = get_theme_mod( 'singleproduct_gallery_nav', ava_defaults( 'singleproduct_gallery_nav' ) ); ?>

	<div class="product__inner <?php echo esc_attr( $slider_nav ); ?>">

		<?php
			/**
			 * WooCommerce hook.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
		?>

		<div class="summary entry-summary">

			<?php
				/**
				 * WooCommerce hook.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 */
				do_action( 'woocommerce_single_product_summary' );
			?>

		</div><!-- .summary -->

	</div><!-- .product__inner -->

	<?php
		/**
		 * WooCommerce hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php
do_action( 'woocommerce_after_single_product' );
