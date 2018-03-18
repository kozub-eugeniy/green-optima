<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product;


?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h1>ky-ky</h1>
	<?php
		/**
		 * woocommerce_before_single_product_summary hook.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>
<!--    <div class="row">-->
    <!-- <div class="col-md-6"> -->
        <!-- <div class="product-top"> -->
            <?php woocommerce_template_single_title(); ?>
        <!-- </div> -->
        <!-- <div class="col-sm-7"> -->

<!--	<div class="summary entry-summary">-->

            <?php
                /**
                 * woocommerce_single_product_summary hook.
                 *
                 * @hooked woocommerce_template_single_title - 5
                 * @hooked woocommerce_template_single_rating - 10
                 * @hooked woocommerce_template_single_price - 10
                 * @hooked woocommerce_template_single_excerpt - 20
                 * @hooked woocommerce_template_single_add_to_cart - 30
                 * @hooked woocommerce_template_single_meta - 40
                 * @hooked woocommerce_template_single_sharing - 50
                 * @hooked WC_Structured_Data::generate_product_data() - 60
                 */
                do_action( 'woocommerce_single_product_summary' );
            ?>

            <?php do_action( 'woocommerce_product_additional_information', $product ); ?>

        </div>
         <div class="col-sm-5">
            <ul class="product-advantages hidden-xs">
                <li>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/product-advantages_1.png" alt="">
                    <div class="product-advantages__title">Доставка по Украине</div>
                    <div class="product-advantages__text">За 1-2 дня</div>
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/product-advantages_2.png" alt="">
                    <div class="product-advantages__title">Оплата:</div>
                    <div class="product-advantages__text">Работаем по предоплате</div>
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/product-advantages_3.png" alt="">
                    <div class="product-advantages__title">Обмен/возврат:</div>
                    <div class="product-advantages__text">Если упаковка <br> не вскрыта</div>
                </li>
            </ul>
         </div>


    <?php woocommerce_template_single_add_to_cart(); ?>


<?php add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 ); ?>
<!--	</div>-->
<!-- .summary -->
<!--        </div>-->
    </div>
    <div class="row">
        <div class="col-md-7">
	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>
        </div>
        <div class="col-lg-4 col-lg-offset-1 col-md-5">
            <div class="reviews">
                <div class="reviews-top clearfix">
                    <a href="javascript:void(0)" onclick="jQuery('#tab-title-reviews a').click()" class="take-review">Оставить комментарий</a>
                    <div class="reviews-title">Отзывы покупателей:</div>
                </div>
                <ol class="commentlist review-list">
                    <?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
                </ol>
            </div>
        </div>
    </div>
</div>
</div>
<!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
