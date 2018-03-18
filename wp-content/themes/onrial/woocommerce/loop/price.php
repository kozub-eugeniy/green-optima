<?php
/**
 * Loop Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;


//    if(!empty($product->regular_price)){
//        echo '<div class="catalog-item__old-price__wrapper"><span class="catalog-item__old-price">'. $product->regular_price .'грн</span></div>';
//    } elseif(!empty($product->sale_price)){
//        echo '<span class="catalog-item__new-price">'. $product->sale_price .' грн</span>';
//    } else {
        if(!empty($product->price)) echo '<span class="catalog-item__new-price">'. $product->price .' грн</span>';
//    }

?>

<?php //if ( $price_html = $product->get_price_html() ) :?>
<!--	<span class="price">--><?php //echo $price_html; ?><!--</span>-->
<?php //endif; ?>
