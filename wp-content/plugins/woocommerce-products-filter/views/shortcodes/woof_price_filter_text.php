<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
 function get_filtered_price() {
    global $wpdb, $wp_the_query;

    $args       = $wp_the_query->query_vars;
    $tax_query  = isset( $args['tax_query'] ) ? $args['tax_query'] : array();
    $meta_query = isset( $args['meta_query'] ) ? $args['meta_query'] : array();

    if ( ! is_post_type_archive( 'product' ) && ! empty( $args['taxonomy'] ) && ! empty( $args['term'] ) ) {
        $tax_query[] = array(
            'taxonomy' => $args['taxonomy'],
            'terms'    => array( $args['term'] ),
            'field'    => 'slug',
        );
    }

    foreach ( $meta_query + $tax_query as $key => $query ) {
        if ( ! empty( $query['price_filter'] ) || ! empty( $query['rating_filter'] ) ) {
            unset( $meta_query[ $key ] );
        }
    }

    $meta_query = new WP_Meta_Query( $meta_query );
    $tax_query  = new WP_Tax_Query( $tax_query );

    $meta_query_sql = $meta_query->get_sql( 'post', $wpdb->posts, 'ID' );
    $tax_query_sql  = $tax_query->get_sql( $wpdb->posts, 'ID' );

    $sql  = "SELECT min( FLOOR( price_meta.meta_value ) ) as min_price, max( CEILING( price_meta.meta_value ) ) as max_price FROM {$wpdb->posts} ";
    $sql .= " LEFT JOIN {$wpdb->postmeta} as price_meta ON {$wpdb->posts}.ID = price_meta.post_id " . $tax_query_sql['join'] . $meta_query_sql['join'];
    $sql .= " 	WHERE {$wpdb->posts}.post_type IN ('" . implode( "','", array_map( 'esc_sql', apply_filters( 'woocommerce_price_filter_post_type', array( 'product' ) ) ) ) . "')
					AND {$wpdb->posts}.post_status = 'publish'
					AND price_meta.meta_key IN ('" . implode( "','", array_map( 'esc_sql', apply_filters( 'woocommerce_price_filter_meta_keys', array( '_price' ) ) ) ) . "')
					AND price_meta.meta_value > '' ";
    $sql .= $tax_query_sql['where'] . $meta_query_sql['where'];

    if ( $search = WC_Query::get_main_search_query_sql() ) {
        $sql .= ' AND ' . $search;
    }

    return $wpdb->get_row( $sql );
}

$request_data = $this->get_request_data();
$min_price = 0;
$max_price = WOOF_HELPER::get_max_price();

$min_price_txt = __('min price', 'woocommerce-products-filter');
$max_price_txt = __('max price', 'woocommerce-products-filter');


$prices = get_filtered_price();
$min_price_data = floor( $prices->min_price );
$max_price_data = ceil( $prices->max_price );

if (isset($request_data['min_price']))
{
    $min_price = $request_data['min_price'];
}else{
    $min_price = $min_price_data;
}

if (isset($request_data['max_price']))
{
    $max_price = $request_data['max_price'];
}else{
    $max_price = $max_price_data;
}

//+++

//WOOCS compatibility
if (class_exists('WOOCS'))
{
    $min_price_data = apply_filters('woocs_exchange_value', $min_price_data);
    $max_price_data = apply_filters('woocs_exchange_value', $max_price_data);
}
?>


<div class="woof_price_filter_txt_container">
    <div class="sidebar-filter__title-wrapper">
        <span class="sidebar-filter__title">Цена</span>
    </div>
    <form method="get" action="<?='//'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."?".$_SERVER['QUERY_STRING']?>">
        <?php foreach($_GET as $key => $val){
            if(!in_array($key, array('min_price', 'max_price')))
                echo '<input type="hidden" name="'.$key.'" value="'.$val.'">';
        } ?>
        <div class="price-inputs">
            <span>от</span>
            <input type="text" class="sliderValue val1" placeholder="<?php echo $min_price_data ?>" name="min_price" data-index="0" data-value="<?php echo $min_price_data ?>" value="<?php echo $min_price ?>" />
            <span>до</span>
            <input type="text" class="sliderValue val2" placeholder="<?php echo $max_price_data ?>" name="max_price"  data-index="1" data-value="<?php echo $max_price_data ?>" value="<?php echo $max_price ?>" />
            <strong>грн</strong>
        </div>
        <div class="price-range"></div>
        <button type="submit" class="filtered-items" style="border: none;">
            Показать
            <span class="filtered-items__count">&nbsp;</span>
        </button>
    </form>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        /* слайдер цен */

        jQuery('.price-range').slider({
            min: <?=$min_price_data?>,
            max: <?=$max_price_data?>,
            values: [<?php echo $min_price ?>, <?php echo $max_price ?>],
            range: true,
            slide: function(event, ui) {
                for (var i = 0; i < ui.values.length; ++i) {
                    jQuery('input.sliderValue[data-index=' + i + ']').val(ui.values[i]);
                    jQuery('.filtered-items').addClass('active');
                }
            }
        });

        jQuery('input.sliderValue').change(function() {
            var $this = $(this);
            jQuery('.price-range').slider('values', $this.data('index'), $this.val());
        });
    </script>

<!--    <input type="text" class="woof_price_filter_txt woof_price_filter_txt_from" placeholder="--><?php //echo $min_price_txt ?><!--" data-value="--><?php //echo $min_price_data ?><!--" value="--><?php //echo $min_price ?><!--" />&nbsp;<input type="text" class="woof_price_filter_txt woof_price_filter_txt_to" placeholder="--><?php //echo $max_price_txt ?><!--" name="max_price" data-value="--><?php //echo $max_price_data ?><!--" value="--><?php //echo $max_price ?><!--" />-->
<!--    --><?php //if (class_exists('WOOCS')): ?>
<!--        &nbsp;(--><?php //echo get_woocommerce_currency_symbol() ?><!--)-->
<!--    --><?php //endif; ?>

</div>


<?php
