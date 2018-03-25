<?php
    /**
     * Checkout Form
     *
     * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
     *
     * HOWEVER, on occasion WooCommerce will need to update template files and you
     * (the theme developer) will need to copy the new files to your theme to
     * maintain compatibility. We try to do this as little as possible, but it does
     * happen. When this occurs the version of the template file will be bumped and
     * the readme will list any important changes.
     *
     * @see           https://docs.woocommerce.com/document/template-structure/
     * @author        WooThemes
     * @package       WooCommerce/Templates
     * @version       2.3.0
     */

    if (!defined('ABSPATH')) {
        exit;
    }

    wc_print_notices();

    // If checkout registration is disabled and not logged in, the user cannot checkout
    if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
        echo apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce'));
        return;
    }

?>
<div class="main-order">
    <div class="container">
        <div class="col-md-7 main-order__left">
            <div class="ordering-cart__top clearfix order-page-wrapper">
                <div class="order-page__title-wrapper">
                    <div class="order-page__title">Ваш заказ:</div>
                    <a href="javascript:void(0)" class="btn ordering-cart__continue order-page__resume">Продолжить покупки</a>
                </div>
                <div class="order-wrapper">
                    <?php
                    $items = WC()->cart->get_cart();
                    if (WC()->cart->is_empty()) {
                        wc_get_template('cart/cart-empty.php');
                    } else {
                        wc_get_template('cart/cart.php');
                    }
                    ?>

                </div>
                <div class="order-page__totals">
<!--                    <li class="clearfix">-->
<!--                        <span class="cart-result__left">--><?php //_e('Subtotal', 'woocommerce'); ?><!--:</span>-->
<!--                        <span class="cart-result__right">--><?php //wc_cart_totals_subtotal_html(); ?><!--</span>-->
<!--                    </li>-->
                    <?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
                        <li>
                            <span class="cart-result__left"><?php wc_cart_totals_coupon_label($coupon); ?>:</span>
                            <span class="cart-result__right"><?php wc_cart_totals_coupon_html($coupon); ?></span>
                        </li>
                    <?php endforeach; ?>
                    <?php foreach (WC()->cart->get_fees() as $fee) : ?>
                        <li>
                            <span class="cart-result__left"><?php echo esc_html($fee->name); ?>:</span>
                            <span class="cart-result__right"><?php wc_cart_totals_fee_html($fee); ?></span>
                        </li>
                    <?php endforeach; ?>

                    <?php if (wc_tax_enabled() && 'excl' === WC()->cart->tax_display_cart) : ?>
                        <?php if ('itemized' === get_option('woocommerce_tax_total_display')) : ?>
                            <?php foreach (WC()->cart->get_tax_totals() as $code => $tax) : ?>
                                <li>
                                    <span class="cart-result__left"><?php echo esc_html($tax->label); ?>:</span>
                                    <span class="cart-result__right"><?php echo wp_kses_post($tax->formatted_amount); ?></span>
                                </li>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <li>
                                <span class="cart-result__left"><?php echo esc_html(WC()->countries->tax_or_vat()); ?>
                                    :</span>
                                <span class="cart-result__right"><?php wc_cart_totals_taxes_total_html(); ?></span>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>


                    <?php if (wc_tax_enabled() && 'excl' === WC()->cart->tax_display_cart) : ?>
                        <?php if ('itemized' === get_option('woocommerce_tax_total_display')) : ?>
                            <?php foreach (WC()->cart->get_tax_totals() as $code => $tax) : ?>
                                <li>
                                    <span class="cart-result__left"><?php echo esc_html($tax->label); ?>:</span>
                                    <span class="cart-result__right"><?php echo wp_kses_post($tax->formatted_amount); ?></span>
                                </li>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <li>
                                <span class="cart-result__left"><?php echo esc_html(WC()->countries->tax_or_vat()); ?>
                                    :</span>
                                <span class="cart-result__right"><?php wc_cart_totals_taxes_total_html(); ?></span>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php do_action('woocommerce_review_order_before_order_total'); ?>


                    <span class="order-page__totals-title"><?php _e('Total', 'woocommerce'); ?>:</span>
                    <span class="order-page__totals-sum"><?php wc_cart_totals_order_total_html(); ?></span>


                    <?php do_action('woocommerce_review_order_after_order_total'); ?>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <form name="checkout" method="post" class="checkout woocommerce-checkout order-form pbz_form clear-styles" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
                <div id="first-step">
                    <div class="ordering-new-form__password">
                        <div class="row">
                            <span class="order-form__title">Оформление заказа</span>
                            <div class="order-form__input-wrapper">
                                <label class="order-form__label">Ваше имя:*</label>
                                <input class="order-form__input" type="text" name="name"
                                       data-validate-required="Обязательное поле" placeholder="Введите Ваше имя">
                            </div>
                            <div class="order-form__input-wrapper">
                                <label class="order-form__label">Ваш телефон:*</label>
                                <input class="order-form__input" type="text" name="phone"
                                       data-validate-uaphone="Неправильный номер"
                                       data-validate-required="Обязательное поле" placeholder="Введите Ваш телефон">
                            </div>
                            <div class="order-form__input-wrapper">
                                <label class="order-form__label">Ваш E-mail:*</label>
                                <input class="order-form__input" type="text" name="email"
                                       data-validate-required="Обязательное поле" placeholder="Введите Ваш E-mail">
                                <small class="order-form__input-footnote">(чтобы отслеживать заказ)</small>
                            </div>
                            <button type="button" class="btn btn--accent order-form__btn"
                                    onclick="jQuery('#first-step, .ordering-tabs-captions').slideUp(); jQuery('#second-step').slideDown();">
                                Оформить заказ
                            </button>
                        </div>
                    </div>
                </div>
                <div id="second-step" style="display: none;">
                    <div id="customer_details">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="order-form__input-wrapper">
                                    <label class="order-form__label">Выберите способ доставки:</label>
                                    <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>

                                        <?php do_action('woocommerce_review_order_before_shipping'); ?>

                                        <?php wc_cart_totals_shipping_html(); ?>

                                        <?php do_action('woocommerce_review_order_after_shipping'); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="order-form__input-wrapper">
                                    <label class="order-form__label">Выберите способ оплаты:</label>
                                    <?php woocommerce_checkout_payment(); ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        $fields = $checkout->get_checkout_fields('billing');
                        foreach ($fields as $key => $field) {
                            if (!in_array($field['label'], ['Имя', 'Телефон', 'Email', 'Населённый пункт'])) {
                                $field['return'] = true;
                                if ($field['label'] == 'Страна') {
                                    $field['default'] = 'UA';
                                }
                                echo str_replace(['<select', '</select>', '<p', '</p>'], ['<div class="select-wrap"><select', '</select></div>', '<div', '</div>'], woocommerce_form_field($key, $field, $checkout->get_value($key)));
                            }
                        }
                        ?>

                        <?php do_action('woocommerce_checkout_shipping'); ?>

                        <?php do_action('woocommerce_checkout_after_customer_details'); ?>

                        <?php wp_nonce_field('woocommerce-process_checkout'); ?>

                    </div>
                    <div class="ordering-new-form">
                        <div class="row">
                            <div class="col-xs-12">
                                <?php echo apply_filters('woocommerce_order_button_html', '<input type="submit" class="btn btn--accent order-form__btn" name="woocommerce_checkout_place_order" id="place_order" onclick="jQuery(\'form.checkout\').submit()" value="Подтвердить заказ" data-value="Подтвердить заказ" />'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
