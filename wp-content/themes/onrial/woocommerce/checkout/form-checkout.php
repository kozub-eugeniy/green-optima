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

<div id="checkout">
    <div class="row">
        <div class="col-md-7">
            <div class="ordering-cart">
                <div class="ordering-cart__top clearfix">
                    <a href="javascript:void(0)" class="btn ordering-cart__continue">Продолжить покупки</a>
                    <div class="ordering-cart__title">Ваш заказ:</div>
                </div>
                <div class="ordering-scroll">
                    <?php
                        $items = WC()->cart->get_cart();
                        if (WC()->cart->is_empty()) {
                            wc_get_template('cart/cart-empty.php');
                        } else {
                            wc_get_template('cart/cart.php');
                        }
                    ?>

                </div>
                <ul class="cart-result">
                    <li class="clearfix">
                        <span class="cart-result__left"><?php _e('Subtotal', 'woocommerce'); ?>:</span>
                        <span class="cart-result__right"><?php wc_cart_totals_subtotal_html(); ?></span>
                    </li>
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
                                <span class="cart-result__left"><?php echo esc_html(WC()->countries->tax_or_vat()); ?>:</span>
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
                                <span class="cart-result__left"><?php echo esc_html(WC()->countries->tax_or_vat()); ?>:</span>
                                <span class="cart-result__right"><?php wc_cart_totals_taxes_total_html(); ?></span>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php do_action('woocommerce_review_order_before_order_total'); ?>

                    <li>
                        <span class="cart-result__left"><?php _e('Total', 'woocommerce'); ?>:</span>
                        <span class="cart-result__right"><?php wc_cart_totals_order_total_html(); ?></span>
                    </li>

                    <?php do_action('woocommerce_review_order_after_order_total'); ?>
                </ul>
            </div>
        </div>
        <div class="col-md-5">

            <div class="tabs">
                <?php if (!is_user_logged_in() && $checkout->is_registration_enabled()) { ?>
                    <ul class="tabs-caption ordering-tabs-captions clearfix">
                        <li class="active">Я новый покупатель</li>
                        <li>Я постоянный клиент</li>
                    </ul>
                <?php } ?>
                <div class="tabs-content active">
                    <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
                        <div id="first-step">
                            <?php if (!is_user_logged_in() && $checkout->is_registration_enabled()) { ?>
                                <div class="ordering-new__check">
                                    <input class="filter-block__check" id="createaccount" name="createaccount" value="1" type="checkbox" hidden>
                                    <label for="createaccount" class="filter-block__label">Я хочу зарегистрироваться</label>
                                </div>
                            <?php } ?>
                            <div id="customer_details" class="ordering-new-form">
                                <div class="row">
                                    <?php
                                        $main_fields = ['billing_first_name', 'billing_phone', 'billing_email', 'billing_city'];
                                        $fields      = $checkout->get_checkout_fields('billing');

                                        foreach ($main_fields as $key) {
                                            if (isset($fields[$key])) {
                                                $field                = $fields[$key];
                                                $field['return']      = true;
                                                $field['class']       = [];
                                                $field['label_class'] = ['label'];
                                                $field['input_class'] = ['input'];
                                                echo str_replace(
                                                    [
                                                        '<p',
                                                        '</p>',
                                                        '<abbr class="required" title="обязательно">*</abbr>',
                                                    ],
                                                    [
                                                        '<div class="col-sm-6"><p',
                                                        '</p></div>',
                                                        '<span class="accent">*</span>',
                                                    ],
                                                    woocommerce_form_field($key, $field, $checkout->get_value($key)));

                                            }
                                        }
                                    ?>
                                </div>

                                <div class="ordering-new-form__password">
                                    <div class="row">
                                        <?php if (!is_user_logged_in() && $checkout->is_registration_enabled()) { ?>
                                            <div class="col-sm-6 password-section" id="account_password_field">
                                                <label for="account_password" class="label">Пароль <span class="accent">*</span></label>
                                                <input class="input" name="account_password" id="account_password" type="password">
                                            </div>
                                            <div class="col-sm-6 password-section">
                                                <label for="account_repassword" class="label">Повторите пароль <span class="accent">*</span></label>
                                                <input class="input" name="account_repassword" id="account_repassword" type="password">
                                            </div>
                                        <?php } ?>
                                        <div class="col-sm-6 col-sm-offset-6">
                                            <button type="button" class="btn btn--accent" onclick="jQuery('#first-step, .ordering-tabs-captions').slideUp(); jQuery('#second-step').slideDown();">Далее</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="second-step" style="display: none;">
                            <div id="customer_details">

                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="woocommerce-shipping-method">
                                            <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>

                                                <?php do_action('woocommerce_review_order_before_shipping'); ?>

                                                <?php wc_cart_totals_shipping_html(); ?>

                                                <?php do_action('woocommerce_review_order_after_shipping'); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <?php woocommerce_checkout_payment(); ?>
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
                                    <div class="col-sm-6 col-sm-offset-6">
                                        <?php echo apply_filters('woocommerce_order_button_html', '<input type="submit" class="btn btn--accent" name="woocommerce_checkout_place_order" id="place_order" onclick="jQuery(\'form.checkout\').submit()" value="Подтвердить заказ" data-value="Подтвердить заказ" />'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php if (!is_user_logged_in() && $checkout->is_registration_enabled()) { ?>
                    <div class="tabs-content">
                        <form class="woocommerce-form woocommerce-form-login login" method="post">
                            <?php do_action('woocommerce_login_form_start'); ?>

                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="username"><?php _e('Username or email address', 'woocommerce'); ?> <span class="required">*</span></label>
                                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username"
                                       value="<?php echo (!empty($_POST['username'])) ? esc_attr($_POST['username']) : ''; ?>"/>
                            </p>
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="password"><?php _e('Password', 'woocommerce'); ?> <span class="required">*</span></label>
                                <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password"/>
                            </p>

                            <?php do_action('woocommerce_login_form'); ?>

                            <p class="form-row">
                                <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
                                <input type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e('Login', 'woocommerce'); ?>"/>
                                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                                    <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"/>
                                    <span><?php _e('Remember me', 'woocommerce'); ?></span>
                                </label>
                            </p>
                            <p class="woocommerce-LostPassword lost_password">
                                <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php _e('Lost your password?', 'woocommerce'); ?></a>
                            </p>

                            <?php do_action('woocommerce_login_form_end'); ?>

                        </form>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</div>
