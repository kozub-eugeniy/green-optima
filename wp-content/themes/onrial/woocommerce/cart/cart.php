<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
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
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_cart' ); ?>

<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php //do_action( 'woocommerce_before_cart_table' ); ?>

<!--	<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">-->
		<!--<thead>
			<tr>

<!--				<th class="product-thumbnail">&nbsp;</th>-->
<!--				<th class="product-name">--><?php /*//_e( 'Product', 'woocommerce' ); */?><!--</th>-->
<!---->
<!--				<th class="product-subtotal">--><?php /*//_e( 'Total', 'woocommerce' ); */?><!--</th>-->
<!--                <th class="product-quantity">--><?php /*//_e( 'Quantity', 'woocommerce' ); */?><!--</th>-->
<!--                <th class="product-price">--><?php /*//_e( 'Price', 'woocommerce' ); */?><!--</th>-->
<!--                <th class="product-remove">&nbsp;</th>
			</tr>
		</thead>
		<tbody>-->
    <div class="order-wrapper">
        <ul class="order-list">
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<li class="order-item">
						<div class="order-item__pic-wrapper">
							<?php
								$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

								if ( ! $product_permalink ) {
									echo $thumbnail;
								} else {
									printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
								}
							?>
						</div>
                        <?php
                        if ( ! $product_permalink ) {
                            echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
                        } else {
                            echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s" class="order-item__title">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
                        }
                        // Meta data
                        echo WC()->cart->get_item_data( $cart_item );
                        // Backorder notification
                        if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                            echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
                        }
                        ?>
						<div class="order-item__count-wrapper" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
                            <div class="order-item__minus">–</div>
							<?php
								if ( $_product->is_sold_individually() ) {
									$product_quantity = sprintf( '1 <input type="hidden" class="order-item__count-field" name="cart[%s][qty]" value="1" />', $cart_item_key );
								} else {
									$product_quantity = woocommerce_quantity_input( array(
										'input_name'  => "cart[{$cart_item_key}][qty]",
										'input_value' => $cart_item['quantity'],
										'max_value'   => $_product->get_max_purchase_quantity(),
										'min_value'   => '0',
									), $_product, false );
								}
								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
							?>
                            <div class="order-item__plus">+</div>
						</div>
                        <div class="order-item__price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
                            <?php
                                echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                            ?>
                        </div>
                        <?php
                            echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                '<span href="%s" class="remove order-item__del" aria-label="%s" data-product_id="%s" data-product_sku="%s">удалить</span>',
                                esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
                                __( 'Remove this item', 'woocommerce' ),
                                esc_attr( $product_id ),
                                esc_attr( $_product->get_sku() )
                            ), $cart_item_key );
                            ?>
					</li>
					<?php
				}
			}
			?>

			<?php do_action( 'woocommerce_cart_contents' ); ?>

			<li>
				<div>

					<?php if ( wc_coupons_enabled() ) { ?>
						<div class="coupon">
							<label for="coupon_code"><?php _e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>" />
							<?php do_action( 'woocommerce_cart_coupon' ); ?>
						</div>
					<?php } ?>

					<input type="submit" class="button hidden" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>" />

					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart' ); ?>
				</div>
			</li>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
        </ul>
    </div>
<!--		</tbody>-->
<!--	</table>-->
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>

<div class="cart-collaterals">
	<?php
		/**
		 * woocommerce_cart_collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
//	 	do_action( 'woocommerce_cart_collaterals' );
	?>
</div>

<script>
	jQuery(document.body).on('change', '.order-item__count-wrapper input', function(){
		jQuery('[name=update_cart]').click();
	});
</script>

<?php do_action( 'woocommerce_after_cart' ); ?>
