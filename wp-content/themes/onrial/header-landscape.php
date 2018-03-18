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
<!--
<header class="header">
    <div class="top-line">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <?php //wp_nav_menu(array(
                        //'menu' => 'headMenu',
                        //'menu_class' => 'top-mnu',
                    //)); ?>
                <div class="col-sm-2 col-right">
                    <a href="/cart" class="cart-btn">
                        <img src="<?php// echo get_template_directory_uri(); ?>/img/ico-cart.png" alt="" class="">
                        <span class="cart-btn__amount"><?php //echo WC()->cart->get_cart_contents_count(); ?></span>
                        <span class="cart-btn__price"><?php //echo WC()->cart->get_cart_subtotal(); ?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="logo-line">
            <div class="row">
                <div class="col-xs-7 col-sm-6">
                    <a href="/" class="logo">
                        <img src="<?php //echo get_template_directory_uri(); ?>/img/logo.png" alt="">
                    </a>
                    <span class="main-descr">Питомник растений</span>
                </div>
				
                <div class="col-xs-5 col-right col-sm-6">
                    <a href="javascript:void(0)" data-mfp-src="#consult-popup" class="btn header-popup popup-btn">Обратный звонок</a>
                    <ul class="header-phones">
                        <li>+38 (‎‎096) 600 01 55</li>
                        <li><img src="<?php //echo get_template_directory_uri(); ?>/img/viber_logo.png">+38 (050) 600 01 55</li>
                        <li>+38 (073) 600 01 55</li>
                    </ul>
                </div>
				<ul class="footer-social">
					<li><a href="https://www.facebook.com/lashonrial/" target="blank" class="footer-social__link"><i>&#xf09a</i></a></li>
					<li><a href="https://www.instagram.com/onrial/" target="blank" class="footer-social__link"><i>&#xF16D</i></a></li>
					
				</ul>
            </div>
        </div>

        <nav class="mnu-wrap clearfix">
            <?php //wp_nav_menu(array(
                //'menu' => 'mainMenu',
                //'menu_class' => 'main-mnu',
            //)); ?>
            <div class="search-form">
                <?php// echo do_shortcode('[yith_woocommerce_ajax_search]'); ?> 
            </div>
        </nav>
        <div class="header-middle">
            <h1 class="main-title">ПОЛУЧАЙТЕ МАКСИМАЛЬНОЕ УДОБСТВО И ПОДДЕРЖКУ,<br>
                РАБОТАЯ С НАДЕЖНЫМ БИЗНЕС-ПАРТНЕРОМ</h1>
            <h2 class="main-subtitle">Стань нашим клиентом сейчас и заработай скидку до 20% на этот и следующий месяц</h2>
            <a href="javascript:void(0)" data-mfp-src="#prod-popup-old" class="btn header-content__btn popup-btn">Получить скидку</a>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="header-advantage">
                    <img src="<?php// echo get_template_directory_uri(); ?>/img/ico-advantages_1.png" class="header-advantage__icon" alt="">
                    <span class="header-advantage__text">Собственное производство <br> В Южной Корее</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="header-advantage">
                    <img src="<?php //echo get_template_directory_uri(); ?>/img/ico-advantages_2.png" class="header-advantage__icon" alt="">
                    <span class="header-advantage__text">Продукция одобрена <br> Ассоциацией дерматологов</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="header-advantage">
                    <img src="<?php //echo get_template_directory_uri(); ?>/img/ico-advantages_3.png" class="header-advantage__icon" alt="">
                    <span class="header-advantage__text">Контроль качества <br> и обязательная сертификация</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div id="fixed_menu">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<nav>
					<img src="<?php// echo get_template_directory_uri(); ?>/img/logo.png" alt="" class="logo">
					<?php //wp_nav_menu(array(
                        //'menu' => 'fixedMenu',
                        //'menu_class' => 'top-mnu hidden-sm',
                    //)); ?>
					<div id="fixed_submenu">
						<label for="fixed_submenu_trigger">
							<span class="hidden-xs hidden-sm">Еще</span>
							<img src="<?php// echo get_template_directory_uri(); ?>/img/menu.png" alt="" class="">
							<span class="visible-sm">Меню</span>
						</label>
						<input type="checkbox" class="hidden" id="fixed_submenu_trigger" name="fixed_submenu_trigger">
						<div>
							<div class="left">
								<?php //wp_nav_menu(array(
									//'menu' => 'fixedMenu',
									//'menu_class' => 'top-mnu visible-xs visible-sm',
								//)); ?>
								<?php //wp_nav_menu(array(
									//'menu' => 'fixedSubmenu'
								//)); ?>
							</div>
							<div class="right">
								<ul class="header-phones">
									<li>+38 (‎‎096) 600 01 55</li>
									<li>+38 (050) 600 01 55</li>
									<li>+38 (073) 600 01 55</li>
								</ul>
								<ul class="footer-social" style="width: 100%;">
									<li><a href="https://www.facebook.com/lashonrial/" target="blank" class="footer-social__link"><i>&#xf09a</i></a></li>
									<li><a href="https://www.instagram.com/onrial/" target="blank" class="footer-social__link"><i>&#xF16D</i></a></li>
								</ul>
								<a href="javascript:void(0)" data-mfp-src="#consult-popup" class="btn header-popup popup-btn">Обратный звонок</a>
							</div>
						</div>
					</div>
					<a href="http://onrial.imsmedia.in.ua/account/edit-account/"><img src="<?php //echo get_template_directory_uri(); ?>/img/users.png" alt="" class="profile"></a>
					<div class="search-form">
						<?php// echo do_shortcode('[yith_woocommerce_ajax_search]'); ?> 
					</div>
					<a href="/checkout/" class="cart-btn">
                        <img src="<?php// echo get_template_directory_uri(); ?>/img/ico-cart.png" alt="" class="">
                        <span class="cart-btn__amount"><?php// echo WC()->cart->get_cart_contents_count(); ?></span>
                        <span class="cart-btn__price"><?php// echo WC()->cart->get_cart_subtotal(); ?></span>
                    </a>
				</nav>
			</div>
		</div>
	</div>
	<div id="toHeader" onclick="jQuery('html, body').animate({scrollTop: 0}, 800)"><img src="<?php// echo get_template_directory_uri(); ?>/img/download.png">Вверх</div>
</div>
-->
<header class="header">
    <div class="main-header">
        <div class="container">
            <div class="main-header__container">
                <div class="col-md-6 main-header__left">
                    <div class="logo-wrapper">
                        <img class="header-logo" src="/wp-content/themes/onrial/assets/static/png/logo_10a97e11343ce178daa76bec437cd652.png" alt="">
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
            <ul class="main-menu__list land-menu__list">
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