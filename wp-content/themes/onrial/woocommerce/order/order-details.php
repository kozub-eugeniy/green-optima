<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! $order = wc_get_order( $order_id ) ) {
	return;
}

$order_items           = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
$show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
$downloads             = $order->get_downloadable_items();
$show_downloads        = $order->has_downloadable_item() && $order->is_download_permitted();

if ( $show_downloads ) {
	wc_get_template( 'order/order-downloads.php', array( 'downloads' => $downloads, 'show_title' => true ) );
}
?>

<div class="account__order-more">
	<div class="account__order-info-header">
		<div class="account__order-info-header__left"><?php _e( 'Order details', 'woocommerce' ); ?> <span>№<?php echo $order->get_order_number(); ?></span></div>
		<div class="account__order-info-header__right"><span>Дата заказа:</span> <?php echo wc_format_datetime( $order->get_date_created() ); ?></div>
	</div>
	<div class="clearfix"></div>
	<div class="col-sm-1"></div>
	<div class="col-sm-10 account__order-info__wrapper">
		<div class="account__order-info">                    
			<table class="orders-head">
				<tr>
					<td>
						<div class="orders-head__title">Товар</div>
					</td>
					<td>
						<div class="orders-head__name"></div>
					</td>
					<td>
						<div class="orders-head__qty">Количество</div>
					</td>
					<td>
						<div class="orders-head__price">Сумма</div>
					</td>
				</tr>
			</table>
			<div class="ordering-scroll">
				<table class="orders-list">
					<?php
						foreach ( $order_items as $item_id => $item ) {
							$product = apply_filters( 'woocommerce_order_item_product', $item->get_product(), $item );

							wc_get_template( 'order/order-details-item.php', array(
								'order'			     => $order,
								'item_id'		     => $item_id,
								'item'			     => $item,
								'show_purchase_note' => $show_purchase_note,
								'purchase_note'	     => $product ? $product->get_purchase_note() : '',
								'product'	         => $product,
							) );
						}
					?>
					<?php do_action( 'woocommerce_order_items_table', $order ); ?>
				</table>
			</div>
			<div class="col-sm-12">
				<?php
					foreach ( $order->get_order_item_totals() as $key => $total ) {
						?>
						<div class="orders-footer col-sm-12">
							<div class="orders-footer__left"><?php echo $total['label']; ?></div>
							<div class="orders-footer__right"><?php echo $total['value']; ?></div>
						</div>
						<?php
					}
				?>
			</div>

		</div>
	</div>
	<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>
	<div class="col-sm-1"></div>
	
</div>
<div class="clearfix"></div>
<a class="back-to-orders__btn" href="/account/orders/">вернуться к списку</a>

<?php
if ( $show_customer_details ) {
	//wc_get_template( 'order/order-details-customer.php', array( 'order' => $order ) );
}
