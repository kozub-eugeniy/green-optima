<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
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
 * @version 3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

$attribute_keys = array_keys( $attributes );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="product-filter__wrapper variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo htmlspecialchars( wp_json_encode( $available_variations ) ) ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>
    <?php woocommerce_template_single_price(); ?>
    <div class="woocommerce-variation single_variation product-price"></div>
    <div class="product-filter__wrapper">
	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php _e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?></p>
        <div class="product-order__wrapper">
	<?php else : ?>
				<?php $i=1; foreach ( $attributes as $attribute_name => $options ) : ?>
                    <span class="product-filter__title">
                        <?php echo wc_attribute_label( $attribute_name ); ?>:
                    </span>
                    <?php if($i == count($attributes)){ echo '<div class="product-order__wrapper">'; } $i++;?>
                    <div class="product-select__wrapper variations">
                        <?php
                        $selected = isset( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ? wc_clean( stripslashes( urldecode( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ) ) : $product->get_variation_default_attribute( $attribute_name );
                        wc_dropdown_variation_attribute_options( array( 'options' => $options, 'attribute' => $attribute_name, 'product' => $product, 'selected' => $selected, 'show_option_none' => wc_attribute_label( $attribute_name ), 'class' => 'product-select' ) );
                        ?>
                    </div>
				<?php endforeach;?>
                <?php if(0 == count($attributes)){ echo '<div class="product-order__wrapper">'; } $i++;?>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<div class="single_variation_wrap">
			<?php
				/**
				 * woocommerce_before_single_variation Hook.
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * woocommerce_single_variation hook. Used to output the cart button and placeholder for variation data.
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				do_action( 'woocommerce_single_variation' );

				/**
				 * woocommerce_after_single_variation Hook.
				 */
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
        </div>
	<?php endif; ?>
    <?php //echo do_shortcode( '[viewBuyButton]') ?>
	<?php do_action( 'woocommerce_after_variations_form' ); ?>
    </div>
</form>
<form action="" class="product-fast-order__form pbz_form clear-styles" data-error-title="Ошибка отправки!" data-error-message="Попробуйте отправить заявку через некоторое время." data-success-title="Спасибо за заявку!" data-success-message="Наш менеджер свяжется с вами в ближайшее время.">
    <div class="product-fast-order__wrapper">
        <input class="product-fast-order__input" name="phone" data-validate-uaphone="Неправильный номер" data-validate-required="Обязательное поле" placeholder="Введите ваш телефон" type="text">
        <button class="product-fast-order__btn">Купить в один клик</button>
    </div>
</form>
<?php
do_action( 'woocommerce_after_add_to_cart_form' );
