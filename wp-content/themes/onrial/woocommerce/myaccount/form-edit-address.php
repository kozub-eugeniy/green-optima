<?php
/**
 * Edit address form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-address.php.
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
 * @version 3.0.9
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$page_title = ( 'billing' === $load_address ) ? __( 'Billing address', 'woocommerce' ) : __( 'Shipping address', 'woocommerce' );

do_action( 'woocommerce_before_edit_account_address_form' ); ?>

<?php if ( ! $load_address ) : ?>
	<?php wc_get_template( 'myaccount/my-address.php' ); ?>
<?php else : ?>

 <div class="account__info">
	<form method="post">
	
		<h3><?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title, $load_address ); ?></h3>
		
		<?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>
	
		<div class="item item--1">
			
			<?php
				$i = 0;
				foreach ( $address as $key => $field ) { 
					if(in_array($field['label'], array('Имя', 'Фамилия', 'Название компании', 'Страна', 'Адрес', 'Населённый пункт', 'Область/регион', 'Почтовый индекс', 'Телефон', 'Email'))){
					?>
					<div class="item__row">
						<?php if ( isset( $field['country_field'], $address[ $field['country_field'] ] ) ) {
							$field['country'] = wc_get_post_data_by_key( $field['country_field'], $address[ $field['country_field'] ]['value'] );
						}
						$field['return'] = true;
						echo strip_tags(woocommerce_form_field( $key, $field, wc_get_post_data_by_key( $key, $field['value'] ) ), '<label><input><select><option>'); ?>
					</div>
					<?php 
						if($i == 4){
							echo '</div><div class="item">';
						}
						$i++;
					?>
				<?php }
				}
			?>
		</div>
		
		<?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>

		<div class="account__info--submit">
			<input type="submit" value="сохранить изменения">
			<?php wp_nonce_field( 'woocommerce-edit_address' ); ?>
			<input type="hidden" name="action" value="edit_address" />
		</div>
	</form>
</div>

<?php endif; ?>

<?php do_action( 'woocommerce_after_edit_account_address_form' ); ?>
