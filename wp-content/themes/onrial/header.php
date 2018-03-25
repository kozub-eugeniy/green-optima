<?php
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="utf-8">

    <title>Green Optima - Питомник растений</title>
    <meta name="description" content="">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta property="og:image" content="path/to/image.jpg">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/img/favicon.png" type="image/png">
    <!--    <link rel="stylesheet" href="/css/main.min.css">-->

    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#000">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#000">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#000">
    <!--    <style>body { opacity: 0; overflow-x: hidden; } html { background-color: #fff; }</style>-->

    <?php wp_head(); ?>

    <style>
        .mfp-content #festi-cart-pop-up-content{
            display: block !important;
        }
        .festi-cart-pop-up-body{
            margin: 0 auto;
        }
        .sidebar-filters__chck + label {
            min-height: 20px;
            height: auto;
        }
        .sidebar-filters__chck + label::after {
            top: 0;
        }
    </style>
</head>

<body <?php body_class(); ?>>
<header class="header">
    <div class="main-header">
        <div class="container">
            <div class="main-header__container">
                <div class="col-md-6 main-header__left">
                    <div class="logo-wrapper">
                        <?php if (is_front_page()){ ?>
                            <img class="header-logo" src="<?php echo get_template_directory_uri();?>/assets/static/png/logo_10a97e11343ce178daa76bec437cd652.png" alt="">
                        <?php } else {?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <img class="header-logo" src="<?php echo get_template_directory_uri();?>/assets/static/png/logo_10a97e11343ce178daa76bec437cd652.png" alt="">
                            </a>
                        <?php }?>
                        <span class="logo-descr">Питомник растений</span>
                    </div>
                    <?php echo do_shortcode('[yith_woocommerce_ajax_search]'); ?>
                </div>
                <div class="col-md-6 main-header__right">
                    <div class="price-wrapper">
                        <div class="header-info__wrapper">
                            <div class="header-info__inner">
                                <i class="header-info__icon"></i>
                                <span class="header-info__txt">Инфо</span>
                            </div>
                            <ul class="header-info__list">
                                <li class="header-info__item">
                                    <a class="header-info__link" href="/events/">Статьи</a>
                                </li>
                                <li class="header-info__item">
                                    <a class="header-info__link" href="/shipping-and-payment/">Доставка и оплата</a>
                                </li>
                                <li class="header-info__item">
                                    <a class="header-info__link" href="/gift-certificates/">Подарочные сертификаты</a>
                                </li>
                            </ul>
                        </div>
                        <a href="" class="price-download" target="_blank">
                            <i class="price-download__icon"></i>
                            <span class="price-download__txt">Скачать <br>прайс-лист</span>
                        </a>
                    </div>
                    <span class="header-sep-line"></span>
                    <div class="header-phones">
                        <span class="header-phones__txt">Работаем по всей Украине</span>
                        <ul class="header-phones__list">
                            <li class="header-phone">
                                <a class="header-phone__link" href="tel:+380508305305">(050) 830-53-05</a>
                            </li>
                            <li class="header-phone">
                                <a class="header-phone__link" href="tel:+380975305305">(097) 530-53-05</a>
                            </li>
                        </ul>
                    </div>
                    <span class="header-sep-line"></span>
                    <a class="cart-wrapper" href="<?php if(WC()->cart->get_cart_contents_count() > 0){ echo '/checkout/';}else{ echo 'javascript:void(0)';}?>">
                        <i class="cart-icon">
                            <span class="cart-counter"><?php echo WC()->cart->get_cart_contents_count();?></span>
                        </i>
                        <div class="cart-inner">
                            <span class="cart-text">Корзина</span>
                            <span class="cart-sum"><?php echo WC()->cart->get_cart_subtotal();?></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-menu">
        <div class="container">
            <ul class="main-menu__list">
                <li class="main-menu__item main-menu__btn">
                    <div class="main-menu__btn-icon__wrapper"><i class="main-menu__btn-icon"><span></span></i></div>
                    <a class="main-menu__link" href="/product-category/plants/">Каталог растений</a>
                    <div class="main-submenu">
                        <?php
                        $args = array(
                            'menu'    => 'productMenu',
                            'container'     => '',
                            'menu_class'        => 'main-submenu__list',
                            'echo'          => 0,
                            'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth'         => 0,
                            'walker'        => new Sublevel_Walker
                        );
                        $menu =  wp_nav_menu($args);
                        $menu = str_replace('class="menu-item', 'class="main-submenu__item', $menu);
                        echo $menu;
                        ?>
                    </div>
                </li>
                <li class="main-menu__item">
                    <a class="main-menu__link" href="/about/">О компании</a>
                </li>
                <li class="main-menu__item">
                    <a class="main-menu__link" href="/garden-centers/">Садовые центры</a>
                </li>
                <li class="main-menu__item">
                    <a class="main-menu__link" href="/events/">События</a>
                </li>
                <li class="main-menu__item">
                    <a class="main-menu__link" href="/contacts/">Контакты</a>
                </li>
                <li class="main-menu__item main-menu__item-design">
                    <a class="main-menu__link main-menu__link-design" href="/landscape-design/">
                        <span class="main-menu__txt-design">Ландшафтный <br>дизайн</span>
                        <i class="main-menu__icon-design"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>