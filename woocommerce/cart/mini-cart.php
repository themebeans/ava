<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_mini_cart' );

$empty_class = ( WC()->cart->is_empty() ) ? ' class="ava-cart-panel-empty"' : '';
?>

<div id="ava-cart-panel"<?php echo esc_attr( $empty_class ); ?>>

	<div class="ava-cart-panel-list-wrap">

		<ul class="cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">

			<?php if ( ! WC()->cart->is_empty() ) : ?>

			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
					$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					$product_price     = apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					$thumbnail         = str_replace( array( 'http:', 'https:' ), '', $thumbnail );

					if ( ! $_product->is_visible() ) {
						$product_name = '<span class="ava-cart-panel-product-title">' . $product_name . '</span>';
					} else {
						$product_permalink = esc_url( $product_permalink );
						$thumbnail         = '<a href="' . $product_permalink . '">' . $thumbnail . '</a>';
						$product_name      = '<a href="' . $product_permalink . '" class="ava-cart-panel-product-title">' . $product_name . '</a>';
					}

					$allowed = array(
						'a'      => array(
							'href'   => array(),
							'title'  => array(),
							'target' => array(),
							'class'  => array(),
						),
						'br'     => array(),
						'em'     => array(),
						'strong' => array(),
						'p'      => array(
							'class' => array(),
						),
					);
					?>

				<li id="ava-cart-panel-item-<?php echo esc_attr( $cart_item['product_id'] ); ?>" class="<?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">

					<div class="product-thumbnail">

						<?php
						$allowed_img = array(
							'a'   => array(
								'href'   => array(),
								'title'  => array(),
								'target' => array(),
								'class'  => array(),
							),
							'img' => array(
								'width'  => array(),
								'height' => array(),
								'src'    => array(),
								'class'  => array(),
							),
							'p'   => array(
								'class' => array(),
							),
						);

						echo wp_kses( $thumbnail, $allowed_img );
						?>

					</div>

					<div class="product-details">
					<h5><?php echo wp_kses( $product_name, $allowed ); ?></h5>
					<div class="ava-cart-panel-item-price">
						<?php echo wp_kses( $product_price, $allowed ); ?>
					</div>

					<div class="product-details__bottom">

						<?php if ( ava_woocommerce_version_check() ) { ?>
							<?php echo wc_get_formatted_cart_item_data( $cart_item, false ); ?>
						<?php } else { ?>
							<?php echo WC()->cart->get_item_data( $cart_item ); ?>

						<?php } ?>

						<div class="product-quantity" data-title="<?php esc_html_e( 'Quantity', 'ava' ); ?>">
							<?php
							if ( $_product->is_sold_individually() ) :
								echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . esc_html__( 'Qty', 'ava' ) . ': ' . $cart_item['quantity'] . '</span>', $cart_item, $cart_item_key );
							else :
								$product_quantity = woocommerce_quantity_input(
									array(
										'input_name'  => "cart[{$cart_item_key}][qty]",
										'input_value' => $cart_item['quantity'],
										'max_value'   => $_product->get_max_purchase_quantity(),
										'min_value'   => '0',
									), $_product, false
								);

								echo apply_filters( 'woocommerce_widget_cart_item_quantity', $product_quantity, $cart_item, $cart_item_key );
							endif;
							?>
						</div>

						<?php
						if ( ava_woocommerce_version_check() && function_exists( 'wc_get_cart_remove_url' ) ) {
							$remove_url = wc_get_cart_remove_url( $cart_item_key );
						} else {
							$remove_url = WC()->cart->get_remove_url( $cart_item_key );

						}
						?>

						<?php
						echo apply_filters(
							'woocommerce_cart_item_remove_link', sprintf(
								'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">%s</a>',
								esc_url( $remove_url ),
								esc_html__( 'Remove this item', 'ava' ),
								esc_attr( $product_id ),
								esc_attr( $cart_item_key ),
								esc_attr( $_product->get_sku() ),
								esc_html__( 'Remove', 'ava' )
							), $cart_item_key
						);
						?>
					</div>
				</li>
					<?php
				}
			}

			endif;
			?>

		</ul><!-- end product list -->

	</div>

	<?php
	$url  = ( 'checkout' === get_theme_mod( 'shop_minicart_url', ava_defaults( 'shop_minicart_url' ) ) ) ? wc_get_checkout_url() : wc_get_cart_url();
	$text = ( 'checkout' === get_theme_mod( 'shop_minicart_url', ava_defaults( 'shop_minicart_url' ) ) ) ? esc_html__( 'Checkout', 'ava' ) : esc_html__( 'View Cart', 'ava' );
	?>

	<footer class="ava-cart-panel-summary">
		<?php if ( ! WC()->cart->is_empty() ) : ?>
		<a href="<?php echo esc_url( $url ); ?>" class="checkout btn wc-forward">
			<em><?php echo esc_html( $text ); ?>
			<span class="ava-cart-panel-summary-subtotal">
				<?php echo WC()->cart->get_cart_subtotal(); ?>
			</span>
			</em>
		</a>
		<?php else : ?>

		<?php $url = get_permalink( wc_get_page_id( 'shop' ) ); ?>

		<a href="<?php echo esc_url( $url ); ?>" id="cart--button-continue" class="checkout btn">
			<em><?php echo esc_html__( 'Continue Shopping', 'ava' ); ?></em>
		</a>
		<?php endif; ?>
	</footer>

	<?php do_action( 'woocommerce_after_mini_cart' ); ?>

	</div>

</div>
