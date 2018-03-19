<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="col-md-4 col-xs-6">
    <div class="catalog-item">
        <div class="catalog-item__pic-wrapper">
           <?php /**
            * woocommerce_before_shop_loop_item_title hook.
            *
            * @hooked woocommerce_show_product_loop_sale_flash - 10
            * @hooked woocommerce_template_loop_product_thumbnail - 10
            */
           do_action( 'woocommerce_before_shop_loop_item_title' );?>
        </div>
        <div class="catalog-item__info-wrapper">
            <?php
            do_action( 'wc__before_shop_loop_item');
            do_action( 'wc__template_product_title');
            do_action( 'wc__after_shop_loop_item');
            do_action( 'wc__after_shop_loop_item_price');
            do_action( 'wc__without_add_cart_link');
            ?>
        </div>
    <?php



	?>
</div>
</div>
