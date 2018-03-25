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
    <link rel="shortcut icon" href="/wp-content/themes/onrial/img/favicon.png" type="image/png">
    <!--    <link rel="stylesheet" href="/css/main.min.css">-->

    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#000">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#000">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#000">

    <!--    <style>body { opacity: 0; overflow-x: hidden; } html { background-color: #fff; }</style>-->

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="header header-landscape">
    <div class="main-header">
        <div class="container">
            <div class="main-header__container">
                <div class="col-md-6 main-header__left">
                    <div class="logo-wrapper">
                        <?php if (is_front_page()){ ?>
                            <img class="header-logo" src="/wp-content/themes/onrial/assets/static/png/logo_10a97e11343ce178daa76bec437cd652.png" alt="">
                        <?php } else {?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <img class="header-logo" src="/wp-content/themes/onrial/assets/static/png/logo_10a97e11343ce178daa76bec437cd652.png" alt="">
                            </a>
                        <?php }?>
                        <span class="logo-descr">Ландшафтный дизайн</span>
                    </div>
                    <div class="land-header__block">
                        <i class="land-header__icon"></i>
                        <span class="land-header__txt">Даем гарантию <br>на все работы</span>
                    </div>
                </div>
                <div class="col-md-6 main-header__right">
                    <div class="land-header__block land-header__block-right">
                        <i class="land-header__icon"></i>
                        <span class="land-header__txt">Всегда соблюдаем <br>сроки проекта</span>
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
                </div>
            </div>
        </div>
    </div>
    <nav class="main-menu">
        <div class="container">
            <ul class="main-menu__list row land-menu__list">
                <li class="main-menu__item main-menu__btn">
                    <div class="main-menu__btn-icon__wrapper land-menu__btn"><i class="main-menu__btn-icon"><span></span></i></div>
                    <a class="main-menu__link" href="/about/">О компании</a>
                    <div class="main-submenu">
                        <ul class="main-submenu__list">
                            <li class="main-submenu__item hidden-item">
                                <div class="main-submenu__item-inner">
                                    <a class="main-submenu__link" href="">О компании</a></div>
                                <div class="main-submenu__item-inner">
                                    <a class="main-submenu__link" href="">Наши услуги</a></div>
                                <div class="main-submenu__item-inner">
                                    <a class="main-submenu__link" href="">Портфолио</a></div>
                                <div class="main-submenu__item-inner">
                                    <a class="main-submenu__link" href="">События</a></div>
                                <div class="main-submenu__item-inner">
                                    <a class="main-submenu__link" href="">Статьи</a></div>
                                <div class="main-submenu__item-inner">
                                    <a class="main-submenu__link" href="">Контакты</a></div>
                                <div class="main-submenu__item-inner">
                                    <a class="main-submenu__link" href="">Питомник растений</a></div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="main-menu__item">
                    <a class="main-menu__link" href="/services/">Наши услуги</a>
                </li>
                <li class="main-menu__item">
                    <a class="main-menu__link" href="/portfolio/">Портфолио</a>
                </li>
                <li class="main-menu__item">
                    <a class="main-menu__link" href="/events/">События</a>
                </li>
                <li class="main-menu__item">
                    <a class="main-menu__link" href="/news/">Статьи</a>
                </li>
                <li class="main-menu__item">
                    <a class="main-menu__link" href="/contacts/">Контакты</a>
                </li>
                <li class="main-menu__item main-menu__item-design">
                    <a class="main-menu__link main-menu__link-design" href="/">
                        <span class="main-menu__txt-design">Питомник растений</span>
                        <i class="main-menu__icon-design"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>