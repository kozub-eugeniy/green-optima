<?php
add_action( 'wp_enqueue_scripts', function(){

    wp_enqueue_script('vendor-js', get_template_directory_uri() . '/assets/js/vendors.9cca13c1bf16725d1423.js');
    wp_enqueue_script('app', get_template_directory_uri() . '/assets/js/app.js');
   
    wp_enqueue_style('min_css', get_template_directory_uri() . '/assets/css/application.1bf6436c83c6b394706a.css');




    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/libs/bootstrap-grid/bootstrap-grid.css');
    wp_enqueue_style('magnific', get_template_directory_uri() . '/libs/magnific-popup/magnific-popup.css');
    wp_enqueue_style('sweetalert2', get_template_directory_uri() . '/libs/sweetalert2/sweetalert2.min.css');



    wp_enqueue_style('css', get_template_directory_uri() . '/style.css');

});

register_nav_menus(array(
    'top' => 'Верхнее меню'
));


function search_form_modify( $html ) {
    return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'search_form_modify' );

add_filter('woocommerce_sale_flash', 'my_custom_sale_flash', 10, 3);
function my_custom_sale_flash($text, $post, $_product) {
    return '<span class="catalog-label" style="display: block"></span>';}
	
add_theme_support('widgets');

function wp_sidebars() {

    register_sidebars(1,
        array('id' => 'products-sidebar',
            'name' => __('Боковая панель на странице товаров'),
            'description' => __( 'The first (primary) sidebar.'),
            'before_title' => '<h1>',
		    'after_title' => '</h1>'
        ));

}

add_action( 'widgets_init', 'wp_sidebars' );

add_filter( 'woocommerce_product_add_to_cart_text', 'woo_custom_product_add_to_cart_text' );  // 2.1 +

function woo_custom_product_add_to_cart_text() {

    return __( 'В корзину', 'woocommerce' );

}
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_single_add_to_cart_text' );  // 2.1 +

function woo_single_add_to_cart_text() {

    return __( 'В корзину', 'woocommerce' );

}

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

//* Активируем поддержку шрифта Font Awesome
add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );
function enqueue_font_awesome() {

    wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css' );

}


//добавляем нужные кнопки в меню
add_filter('wp_nav_menu_items', 'add_login_logout_link', 10, 2);

function add_login_logout_link($items, $args) {
    if($args->menu == 'headMenu') {
//        $loginoutlink = wp_loginout('index.php', false);
        $items .= '</ul>';
        $items .= '</div>';
        $items .= '</div>';
        $items .= '<div class="col-sm-2">';
        $items .= '    <ul class="top-mnu top-mnu&#45;&#45;login">';
        if (!is_user_logged_in())
            $items .= '<li><a href="/account/edit-account/">Регистрация</a></li>';
        else
            $items .= '<li><a href="/account/edit-account/">Кабинет</a></li>';
        if (is_user_logged_in() && $args->menu == 'headMenu') {

            $items .= '<li><a href="'. wp_logout_url( get_permalink( woocommerce_get_page_id( 'myaccount' ) ) ) .'">Выйти</a></li>';

        }

        elseif (!is_user_logged_in() && $args->menu == 'headMenu') {

            $items .= '<li><a href="' . get_permalink( woocommerce_get_page_id( 'myaccount' ) ) . '">Войти</a></li>';

        }
        $items .= '</ul>';

        return $items;
    }else {
        return $items;
    }
}

function wooc_extra_register_fields() {?>
   <div class="col-sm-12">
       <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
           <label for="reg_billing_first_name">Ваше имя <span class="required">*</span></label>
           <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" placeholder="Введите Ваше имя" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
       </p>
    </div>
    <div class="col-sm-12">
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="billing_phone">Ваш телефон <span class="required">*</span></label>
            <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" placeholder="Введите Ваш телефон" value="<?php esc_attr_e( $_POST['billing_phone'] ); ?>" /></p>
    </div>
    <?php
}
add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );


function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {

    if ( isset( $_POST['billing_phone'] ) && empty( $_POST['billing_phone'] ) ) {

        $validation_errors->add( 'billing_phone_error', __( '<strong>Error</strong>: Phone is required!.', 'woocommerce' ) );

    }

     return $validation_errors;
}

add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3 );



// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
    function loop_columns() {
        return 2; // 3 products per row
    }
}
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );



add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);

function add_my_currency_symbol( $currency_symbol, $currency )
{

    switch ($currency) {

        case 'UAH':
            $currency_symbol = ' грн';
            break;

    }

    return $currency_symbol;
}


function my_acf_google_map_api( $api ){

    $api['key'] = 'AIzaSyC-A04z2hqlnoeOBciuiT7uBesuzCYgUTA';

    return $api;

}
add_filter('nav_menu_link_attributes', 'wpse156165_menu_add_class', 10, 3 );
function wpse156165_menu_add_class($atts, $item, $args ) {
    $class = 'main-menu__link';
    $atts['class'] = $class;
    return $atts;
}
add_filter('nav_menu_item_args', 'filter_nav_menu_item_args', 10, 3 );
function filter_nav_menu_item_args($args, $item, $depth ) {
//    print_r($item);
//    print_r($args);
    if($item->ID == 686){
        $args->before = "<div class='main-menu__btn-icon__wrapper'><i class='main-menu__btn-icon'><span></span></i></div>";
    } else {
        $args->before = "";
    }
    return $args;
}

class Sublevel_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class='secondary-submenu'>\n";
    }
    function end_lvl(&$output, $depth = 0, $args = array()) {
        $args->before = '<div>';
        $indent = str_repeat("\t", $depth);
        $args->after = '</div>';
        $output .= "$indent</ul>\n";
    }
    function start_el( &$output, $item, $depth, $args ) {
        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

        // depth dependent classes
        $depth_classes = array(
            ( $depth == 0 ? 'main-submenu__item' : 'sub-menu-item' ),
            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

        // passed classes
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

        // build html
        $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '"><div class="main-submenu__item-inner">';

        if(!empty($classes[0])){
            $args->before = '<i class="main-submenu__icon '.$classes[0].'"></i>';
        }

        // link attributes
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-submenu__link' ) . ( $item->title == 'АКЦИИ!' ? ' action-link' : '' ) . '"';

        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );

        // build html
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    function end_el( &$output, $category, $depth = 0, $args = array() ) {
        $output .= "</div></li>\n";
    }
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
/* API Maps */

//}
//add_action( 'wp_enqueue_scripts', 'my_theme_add_scripts' );

if ( ! function_exists( 'wc_dropdown_variation_attribute_options' ) ) {

    /**
     * Output a list of variation attributes for use in the cart forms.
     *
     * @param array $args Arguments.
     * @since 2.4.0
     */
    function wc_dropdown_variation_attribute_options( $args = array() ) {
        $args = wp_parse_args( apply_filters( 'woocommerce_dropdown_variation_attribute_options_args', $args ), array(
            'options'          => false,
            'attribute'        => false,
            'product'          => false,
            'selected' 	       => false,
            'name'             => '',
            'id'               => '',
            'class'            => '',
            'show_option_none' => false,
        ) );

        $options               = $args['options'];
        $product               = $args['product'];
        $attribute             = $args['attribute'];
        $name                  = $args['name'] ? $args['name'] : 'attribute_' . sanitize_title( $attribute );
        $id                    = $args['id'] ? $args['id'] : sanitize_title( $attribute );
        $class                 = $args['class'];
        $show_option_none      = $args['show_option_none'] ? true : false;
        $show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __( 'Choose an option', 'woocommerce' ); // We'll do our best to hide the placeholder, but we'll need to show something when resetting options.

        if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
            $attributes = $product->get_variation_attributes();
            $options    = $attributes[ $attribute ];
        }

        $html = '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="attribute_' . esc_attr( sanitize_title( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
        $html .= '<option value="">' . esc_html( $show_option_none_text ) . '</option>';

        if ( ! empty( $options ) ) {
            if ( $product && taxonomy_exists( $attribute ) ) {
                // Get terms if this is a taxonomy - ordered. We need the names too.
                $terms = wc_get_product_terms( $product->get_id(), $attribute, array( 'fields' => 'all' ) );

                foreach ( $terms as $term ) {
                    if ( in_array( $term->slug, $options ) ) {
                        $html .= '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $args['selected'] ), $term->slug, false ) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) ) . '</option>';
                    }
                }
            } else {
                foreach ( $options as $option ) {
                    // This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
                    $selected = sanitize_title( $args['selected'] ) === $args['selected'] ? selected( $args['selected'], sanitize_title( $option ), false ) : selected( $args['selected'], $option, false );
                    $html .= '<option value="' . esc_attr( $option ) . '" ' . $selected . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</option>';
                }
            }
        }

        $html .= '</select>';

        echo apply_filters( 'woocommerce_dropdown_variation_attribute_options_html', $html, $args ); // WPCS: XSS ok.
    }
}

if ( ! function_exists( 'woocommerce_breadcrumb' ) ) {

    /**
     * Output the WooCommerce Breadcrumb.
     *
     * @param array $args Arguments.
     */
    function woocommerce_breadcrumb( $args = array() ) {
        $args = wp_parse_args( $args, apply_filters( 'woocommerce_breadcrumb_defaults', array(
            'delimiter'   => '',
            'wrap_before' => '<ul class="breadcrumbs">',
            'wrap_after'  => '</ul>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        ) ) );

        $breadcrumbs = new WC_Breadcrumb();

        if ( ! empty( $args['home'] ) ) {
            $breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
        }

        $args['breadcrumb'] = $breadcrumbs->generate();

        /**
         * WooCommerce Breadcrumb hook
         *
         * @hooked WC_Structured_Data::generate_breadcrumblist_data() - 10
         */
        do_action( 'woocommerce_breadcrumb', $breadcrumbs, $args );

        wc_get_template( 'global/breadcrumb.php', $args );
    }
}

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 5 );

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
  
function custom_override_checkout_fields( $fields ) {
	unset($fields['billing']['billing_last_name']);
	//unset($fields['billing']['billing_country']);
	unset($fields['billing']['billing_company']);
	//unset($fields['billing']['billing_city']);
	$fields['billing']['billing_city']['required'] = false;
	unset($fields['billing']['billing_address_1']);
	//$fields['billing']['billing_address_1']['required'] = false;
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_state']);
	unset($fields['billing']['billing_postcode']);
    return $fields;
}

function reduce_woocommerce_min_strength_requirement( $strength ) {
    return 0;
}
add_filter( 'woocommerce_min_password_strength', 'reduce_woocommerce_min_strength_requirement' );

add_filter( 'post_gallery', 'filter_function_name_9265', 10, 3 );
function filter_function_name_9265( $output, $attr ){
	$ids_arr = explode(',', $attr['ids']);
	$ids_arr = array_map('trim', $ids_arr );

	$pictures = get_posts( array(
		'posts_per_page' => -1,
		'post__in'       => $ids_arr,
		'post_type'      => 'attachment',
		'orderby'        => 'post__in',
	) );

	if( ! $pictures ) return 'Запрос вернул пустой результат.';

	// Вывод
	$out = '<section class="lightgallery"><div class="row">';

	// Выводим каждую картинку из галереи
	foreach( $pictures as $pic ){
		$src = $pic->guid;
		$out .= '<div class="col-lg-3 col-md-4 col-sm-6"><div class="gallery-item" style="background-image: url('. $src .')" data-src="'. $src .'"></div></div>';
	}

	$out .= '</div></section>';

	return $out;
}
/*
 * Для страницы категории товаров, кастомные ссылки и цена
 * */
function wc__before_shop_loop_item(){
    echo '<a href="' . esc_url( get_the_permalink() ) . '" class="catalog-item__title">';
}
add_action( 'wc__before_shop_loop_item', 'wc__before_shop_loop_item' );
function wc__after_shop_loop_item() {
    echo '</a>';
}
add_action( 'wc__after_shop_loop_item', 'wc__after_shop_loop_item' );
function wс__template_loop_product_title() {
    echo get_the_title();
}
add_action( 'wc__template_product_title', 'wс__template_loop_product_title' );
function wc__link_without_cart(){
    echo '<a href="' . esc_url( get_the_permalink() ) . '" class="catalog-item__btn">Подробнее</a>';
}
add_action( 'wc__without_add_cart_link', 'wc__link_without_cart');
add_action( 'wc__after_shop_loop_item_price', 'woocommerce_template_loop_price', 10 );