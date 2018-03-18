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
                    <a href="/checkout/" class="cart-btn">
                        <img src="<?php //echo get_template_directory_uri(); ?>/img/ico-cart.png" alt="" class="">
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
                    <span class="main-descr">Производство качественных безопасных материалов для наращивания ресниц</span>
                </div>
                <div class="col-xs-5 col-right col-sm-6">
                    <a href="javascript:void(0)" data-mfp-src="#consult-popup" class="btn header-popup popup-btn">Обратный
                        звонок</a>
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
            <?php// wp_nav_menu(array(
                //'menu' => 'mainMenu',
                //'menu_class' => 'main-mnu',
           // )); ?>
            <div class="search-form">
                <?php //echo do_shortcode('[yith_woocommerce_ajax_search]'); ?> 
            </div>
			
        </nav>

    </div>
</header>
<div id="fixed_menu">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<nav>
					<img src="<?php //echo get_template_directory_uri(); ?>/img/logo.png" alt="" class="logo">
					<?php// wp_nav_menu(array(
                       // 'menu' => 'fixedMenu',
                       // 'menu_class' => 'top-mnu hidden-sm',
                   // )); ?>
					<div id="fixed_submenu">
						<label for="fixed_submenu_trigger">
							<span class="hidden-xs hidden-sm">Еще</span>
							<img src="<?php //echo get_template_directory_uri(); ?>/img/menu.png" alt="" class="">
							<span class="visible-sm">Меню</span>
						</label>
						<input type="checkbox" class="hidden" id="fixed_submenu_trigger" name="fixed_submenu_trigger">
						<div>
							<div class="left">
								<?php// wp_nav_menu(array(
									//'menu' => 'fixedMenu',
									//'menu_class' => 'top-mnu visible-xs visible-sm',
							//)); ?>
								<?php //wp_nav_menu(array(
								//	'menu' => 'fixedSubmenu'
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
						<?php //echo do_shortcode('[yith_woocommerce_ajax_search]'); ?> 
					</div>
					<a href="/checkout/" class="cart-btn">
                        <img src="<?php// echo get_template_directory_uri(); ?>/img/ico-cart.png" alt="" class="">
                        <span class="cart-btn__amount"><?php //echo WC()->cart->get_cart_contents_count(); ?></span>
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
                        <span class="logo-descr">Питомник растений</span>
                    </div>   
                    <div class="search-wrapper">
                        <form class="main-search">
                            <div class="search-inner">
                                <input class="search-field" type="text" name="search" placeholder="Поиск товаров по каталогу">
                                <button class="search-field-btn">поиск</button>
                            </div>
                            <div class="search-example__wrapper">
                                Например, <span class="search-example">туя западная, лиственница</span>
                            </div>
                        </form>
                    </div>                 
                </div>
                <div class="col-md-6 main-header__right">
                    <div class="price-wrapper">
                        <div class="header-info__wrapper">
                            <i class="header-info__icon"></i>
                            <span class="header-info__txt">Инфо</span>
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
                    <div class="cart-wrapper">
                        <i class="cart-icon">
                            <span class="cart-counter">2</span>
                        </i>
                        <div class="cart-inner">
                            <span class="cart-text">Корзина</span>
                            <span class="cart-sum">5 200 грн</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-menu">
        <div class="container">
            <ul class="main-menu__list">
                <li class="main-menu__item main-menu__btn">
                    <div class="main-menu__btn-icon__wrapper"><i class="main-menu__btn-icon"><span></span></i></div>
                    <a class="main-menu__link" href="">Каталог растений</a>
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
                    <a class="main-menu__link" href="">Садовые центры</a>
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

            <!--
            <ul class="main-menu__list">
                <li class="main-menu__item main-menu__btn">
                    <div class="main-menu__btn-icon__wrapper"><i class="main-menu__btn-icon"><span></span></i></div>
                    <a class="main-menu__link" href="">Каталог растений</a>
                    <div class="main-submenu">
                    	<ul class="main-submenu__list">
                    		<li class="main-submenu__item">
                    			<div class="main-submenu__item-inner"><i class="main-submenu__icon mi1"></i>
                    			<a class="main-submenu__link" href="">Хвойные деревья</a></div>
                    			<ul class="secondary-submenu first">
                    				<li class="secondary-submenu__item">
                    					<a class="secondary-submenu__link" href="">Ель</a>
                    				</li>
                    				<li class="secondary-submenu__item">
                    					<a class="secondary-submenu__link" href="">Можевельник</a>
                    				</li>
                    				<li class="secondary-submenu__item">
                    					<a class="secondary-submenu__link" href="">Кипарисовик</a>
                    				</li>
                    				<li class="secondary-submenu__item">
                    					<a class="secondary-submenu__link" href="">Пихта</a>
                    				</li>
                    				<li class="secondary-submenu__item">
                    					<a class="secondary-submenu__link" href="">Сосна</a>
                    				</li>
                    				<li class="secondary-submenu__item">
                    					<a class="secondary-submenu__link" href="">Тис</a>
                    				</li>
                    				<li class="secondary-submenu__item">
                    					<a class="secondary-submenu__link" href="">Туя</a>
                    				</li>
                    				<li class="secondary-submenu__item">
                    					<a class="secondary-submenu__link" href="">Тсуга</a>
                    				</li>
                    			</ul>
                    		</li>
                    		<li class="main-submenu__item">
                    			<div class="main-submenu__item-inner"><i class="main-submenu__icon mi2"></i>
                    			<a class="main-submenu__link" href="">Аллейные деревья</a></div>
                    			<ul class="secondary-submenu">
                    				<li class="secondary-submenu__item">
                    					<a class="secondary-submenu__link" href="">Ель</a>
                    				</li>
                    				<li class="secondary-submenu__item">
                    					<a class="secondary-submenu__link" href="">Можевельник</a>
                    				</li>
                    				<li class="secondary-submenu__item">
                    					<a class="secondary-submenu__link" href="">Кипарисовик</a>
                    				</li>
                    				<li class="secondary-submenu__item">
                    					<a class="secondary-submenu__link" href="">Пихта</a>
                    				</li>
                    				<li class="secondary-submenu__item">
                    					<a class="secondary-submenu__link" href="">Сосна</a>
                    				</li>
                    				<li class="secondary-submenu__item">
                    					<a class="secondary-submenu__link" href="">Тис</a>
                    				</li>
                    				<li class="secondary-submenu__item">
                    					<a class="secondary-submenu__link" href="">Туя</a>
                    				</li>
                    				<li class="secondary-submenu__item">
                    					<a class="secondary-submenu__link" href="">Тсуга</a>
                    				</li>
                    			</ul>
                    		</li>
                    		<li class="main-submenu__item">
                    			<div class="main-submenu__item-inner"><i class="main-submenu__icon mi3"></i>
                    			<a class="main-submenu__link" href="">Лиственные кустарники</a></div>
                    		</li>
                    		<li class="main-submenu__item">
                    			<div class="main-submenu__item-inner"><i class="main-submenu__icon mi4"></i>
                    			<a class="main-submenu__link" href="">Розы</a></div>
                    		</li>
                    		<li class="main-submenu__item">
                    			<div class="main-submenu__item-inner"><i class="main-submenu__icon mi5"></i>
                    			<a class="main-submenu__link" href="">Многолетники</a></div>
                    		</li>
                    		<li class="main-submenu__item">
                    			<div class="main-submenu__item-inner"><i class="main-submenu__icon mi6"></i>
                    			<a class="main-submenu__link" href="">Лианы</a></div>
                    		</li>
                    		<li class="main-submenu__item">
                    			<div class="main-submenu__item-inner"><i class="main-submenu__icon mi7"></i>
                    			<a class="main-submenu__link" href="">Бонсаи и топиарные формы</a></div>
                    		</li>
                    		<li class="main-submenu__item">
                    			<div class="main-submenu__item-inner"><i class="main-submenu__icon mi8"></i>
                    			<a class="main-submenu__link" href="">Однолетние растения</a></div>
                    		</li>
                    		<li class="main-submenu__item">
                    			<div class="main-submenu__item-inner"><i class="main-submenu__icon mi9"></i>
                    			<a class="main-submenu__link" href="">Удобрения и сопутствующие товары</a></div>
                    		</li>
                    		<li class="main-submenu__item">
                    			<div class="main-submenu__item-inner"><i class="main-submenu__icon mi10"></i>
                    			<a class="main-submenu__link" href="">Автоматический полив</a></div>
                    		</li>
                    		<li class="main-submenu__item">
                    			<div class="main-submenu__item-inner"><i class="main-submenu__icon mi11"></i>
                    			<a class="main-submenu__link action-link" href="">АКЦИИ!</a></div>
                    		</li>
                    		<li class="main-submenu__item hidden-item">
                    			<div class="main-submenu__item-inner"><i class="main-submenu__icon mi11"></i>
                    			<a class="main-submenu__link action-link" href="">О компании</a></div>
                    		</li>
                    		<li class="main-submenu__item hidden-item">
                    			<div class="main-submenu__item-inner"><i class="main-submenu__icon mi11"></i>
                    			<a class="main-submenu__link action-link" href="">Садовые центры</a></div>
                    		</li>
                    		<li class="main-submenu__item hidden-item">
                    			<div class="main-submenu__item-inner"><i class="main-submenu__icon mi11"></i>
                    			<a class="main-submenu__link action-link" href="">События</a></div>
                    		</li>
                    		<li class="main-submenu__item hidden-item">
                    			<div class="main-submenu__item-inner"><i class="main-submenu__icon mi11"></i>
                    			<a class="main-submenu__link action-link" href="">Контакты</a></div>
                    		</li>
                    		<li class="main-submenu__item hidden-item">
                    			<div class="main-submenu__item-inner"><i class="main-submenu__icon mi11"></i>
                    			<a class="main-submenu__link action-link" href="">Ландшафтный дизайн</a></div>
                    		</li>
                    	</ul>
                    </div>
                </li>
                <li class="main-menu__item">
                    <a class="main-menu__link" href="/about/">О компании</a>
                </li>
                <li class="main-menu__item">
                    <a class="main-menu__link" href="">Садовые центры</a>
                </li>
                <li class="main-menu__item">
                    <a class="main-menu__link" href="/events/">События</a>
                </li>
                <li class="main-menu__item">
                    <a class="main-menu__link" href="/contacts/">Контакты</a>
                </li>
                <li class="main-menu__item main-menu__item-design">
                    <a class="main-menu__link main-menu__link-design" href="">
                        <span class="main-menu__txt-design">Ландшафтный <br>дизайн</span>
                        <i class="main-menu__icon-design"></i>
                    </a>
                </li>
            </ul>
        -->
        </div>
    </nav>
</header>