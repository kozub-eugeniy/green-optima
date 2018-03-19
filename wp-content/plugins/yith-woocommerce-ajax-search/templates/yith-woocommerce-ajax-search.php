<?php
/**
 * YITH WooCommerce Ajax Search template
 *
 * @author Yithemes
 * @package YITH WooCommerce Ajax Search
 * @version 1.1.1
 */

if ( !defined( 'YITH_WCAS' ) ) { exit; } // Exit if accessed directly
wp_enqueue_script('yith_wcas_frontend' );

?>

<div class="search-wrapper">
    <form role="search" method="get" class="main-search" id="yith-ajaxsearchform" action="<?php echo esc_url( home_url( '/'  ) ) ?>">
        <div class="search-inner">
            <label class="screen-reader-text" for="yith-s"><?php _e( 'Search for:', 'yith-woocommerce-ajax-search' ) ?></label>

            <input type="search"
                   value="<?php echo get_search_query() ?>"
                   name="s"
                   id="yith-s"
                   class="search-field"
                   placeholder="<?php echo get_option('yith_wcas_search_input_label') ?>"
                   data-loader-icon="<?php echo str_replace( '"', '', apply_filters('yith_wcas_ajax_search_icon', '') ) ?>"
                   data-min-chars="<?php echo get_option('yith_wcas_min_chars'); ?>" />
            <input type="submit" class="search-field-btn" id="yith-searchsubmit" value="<?php echo get_option('yith_wcas_search_submit_label') ?>" />

            <input type="hidden" name="post_type" value="product" />
            <?php do_action( 'wpml_add_language_form_field' ); ?>

        </div>
        <div class="search-example__wrapper">
            Например, <span class="search-example">туя западная, лиственница</span>
        </div>
    </form>
</div>