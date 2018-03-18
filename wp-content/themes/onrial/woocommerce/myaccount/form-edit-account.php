<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
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
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_edit_account_form' ); ?>
<div class="account__info">
<form class="woocommerce-EditAccountForm edit-account" action="" method="post">

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>
	
	<div class="item item--1">
		<div class="item__row">
			<label for="account_first_name">Ваше имя:</label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $user->first_name ); ?>" />
		</div>
		
		<div class="item__row">
			<label for="account_last_name">Ваша фамилия:</label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" value="<?php echo esc_attr( $user->last_name ); ?>" />
		</div>

		<div class="item__row">
			<label for="account_email">Ваш E-mail:</label>
			<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" value="<?php echo esc_attr( $user->user_email ); ?>" />
		</div>
	</div>

	<div class="item item--2">
		<div class="item__title">Смена пароля</div>
		<div class="item__row">
			<label for="password_current">Действующий пароль (не заполняйте, чтобы оставить прежний)</label>
			<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" />
		</div>
		<div class="item__row">
			<label for="password_1">Новый пароль (не заполняйте, чтобы оставить прежний): </label>
			<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" />
		</div>
		<div class="item__row">
			<label for="password_2">Ваш новый пароль еще раз: </label>
			<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" />
		</div>
	</div>

	<?php do_action( 'woocommerce_edit_account_form' ); ?>
	
	<div class="account__info--submit">
		<?php wp_nonce_field( 'save_account_details' ); ?>
		<input type="submit" value="сохранить изменения">
		<input type="hidden" name="action" value="save_account_details" />
	</div>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
</div>