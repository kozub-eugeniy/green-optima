<?php
/*
Template name: main
*/
get_header(); ?>

<div id="primary" class="content-area">
<main class="main-wrapper">
    <section class="main-banner">
        <div class="container">
            <div class="main-banner__txt-wrap">
                <span class="main-banner__title">Мы вкладываем душу в каждое растение</span>
                <div class="main-banner__descr">За время своей деятельности мы накопили достаточно богатый опыт и материально-техническую базу, чтобы предложить нашим клиентам самые оригинальные и креативные идеи по оформлению зеленых</div>
                <a href="" class="main-banner__btn">Перейти в каталог</a>
            </div>
        </div>
    </section>
    <section class="main-adv__wrapper">
        <div class="container">
            <ul class="main-adv__list">
                <li class="main-adv__item">
                    <i class="main-adv__icon ai1"></i>
                    <div class="main-adv__text-wrap">
                        <div class="main-adv__text">
                            8<span class="main-adv__text-sm"> га</span>
                        </div>
                        <span class="main-adv__descr">Общая площадь <br>питомника</span>
                    </div>
                </li>
                <li class="main-adv__item">
                    <i class="main-adv__icon ai2"></i>
                    <div class="main-adv__text-wrap">
                        <div class="main-adv__text">
                            700+
                        </div>
                        <span class="main-adv__descr">растений в ассортименте</span>
                    </div>
                </li>
                <li class="main-adv__item">
                    <i class="main-adv__icon ai3"></i>
                    <div class="main-adv__text-wrap">
                        <div class="main-adv__text">
                            10<span class="main-adv__text-sm"> лет</span>
                        </div>
                        <span class="main-adv__descr">Работаем в <br>этой сфере</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section class="hot-wrapper">
        <div class="container">
            <div class="title-wrapper">
                <img class="title-pic" src="/wp-content/themes/onrial/images/hot-icon.png" alt="">
                <span class="title white">Горячие предложения</span>
            </div>
            <div class="hot-items">
                <?php  $args = array(
                    'numberposts' => 4,
                    'category'    => 'sales',
                    'orderby'     => 'date',
                    'order'       => 'DESC',
                    'include'     => array(),
                    'exclude'     => array(),
                    'meta_key'    => '',
                    'meta_value'  =>'',
                    'post_type'   => 'product',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                );
                $posts = get_posts( $args );
                foreach($posts as $post){ setup_postdata($post); ?>
                    <?php //var_dump($post, get_post_meta($post->ID, '', true));
                        $category_thumbnail = get_woocommerce_term_meta($post->ID, 'thumbnail_id', true);
                        $image = wp_get_attachment_url($category_thumbnail);
                        $product = get_post_meta($post->ID, '', true); 
                    ?>
                    <div class="col-md-3 col-xs-6">
                        <div class="hot-item">
                            <div class="hot-item__pic-wrapper">
                                <span class="hot-label"></span>
                                <img class="hot-item__pic" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title();?>">
                            </div>
                            <div class="hot-item__info-wrapper">
                                <a class="hot-item__title" href="<?php the_permalink();?>"><?php the_title();?></a>
                                <span class="hot-item__old-price"><?=$product['_regular_price'][0];?> грн</span>
                                <span class="hot-item__new-price"><?=$product['_sale_price'][0];?>  грн</span>
                                <a class="hot-item__btn" href="<?php the_permalink();?>">Подробнее</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <section class="about-wrapper">
        <div class="container">
            <div class="title-wrapper">
                <img class="title-pic" src="/wp-content/themes/onrial/images/about-icon.png" alt="">
                <span class="title">О компании Green Optima</span>
            </div>
            <ul class="about-adv__list">
                <li class="about-adv__item">
                    <i class="about-adv__icon ai1"></i>
                    <div class="about-adv__text-wrap">
                        <div class="about-adv__text">Доставка</div>
                        <span class="about-adv__descr">по Харькову и области <br>собственным транспортом</span>
                    </div>
                </li>
                <li class="about-adv__item">
                    <i class="about-adv__icon ai2"></i>
                    <div class="about-adv__text-wrap">
                        <div class="about-adv__text">Технология</div>
                        <span class="about-adv__descr">правильной высадки <br>растений в грунт</span>
                    </div>
                </li>
                <li class="about-adv__item">
                    <i class="about-adv__icon ai3"></i>
                    <div class="about-adv__text-wrap">
                        <div class="about-adv__text">Полный цикл</div>
                        <span class="about-adv__descr">производства, продажи <br>и высадки растений</span>
                    </div>
                </li>
            </ul>
            <div class="about-info__wrapper">
                <div class="col-md-6">
                    <div class="about-info">Питомник декоративных растений Green Optima, г. Харьков молодая и стремительно развивающаяся компания, которая специализируется на выращивании и продаже качественных декоративных растений для сада. Предлагаем широчайший ассортимент лиственных и хвойных деревьев и кустарников разных размеров.</div>
                    <span class="about-footnote">“Выбрав нас, останетесь довольны Вы и Ваши клиенты!”</span>
                </div>
                <div class="col-md-6">
                    <span class="about-list__title">Наши преимущества:</span>
                    <ul class="about-list">
                        <li class="about-list__item">
                           <i class="about-list__icon"></i>
                           <span class="about-list__txt">качественный посадочный материал</span>
                        </li>
                        <li class="about-list__item">
                           <i class="about-list__icon"></i>
                           <span class="about-list__txt">постоянное обновление ассортимента</span>
                        </li>
                        <li class="about-list__item">
                           <i class="about-list__icon"></i>
                           <span class="about-list__txt">предлагаем растения в наличии и под заказ</span>
                        </li>
                        <li class="about-list__item">
                           <i class="about-list__icon"></i>
                           <span class="about-list__txt">гарантируем качественную упаковку растений</span>
                        </li>
                        <li class="about-list__item">
                           <i class="about-list__icon"></i>
                           <span class="about-list__txt">работаем без перерывов и выходных</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="cat-wrapper">
        <div class="container">
            <div class="title-wrapper">
                <img class="title-pic" src="/wp-content/themes/onrial/images/plant-icon.png" alt="">
                <span class="title">Каталог растений</span>
            </div>
        </div>
        <ul class="cat-items">
        <?php
             $args = array(
                'type'         => 'product',
                'child_of'     => 0,
                'parent'       => '',
                'orderby'      => 'id',
                'order'        => 'ASC',
                'hide_empty'   => 0,
                'hierarchical' => 0,
                'exclude'      => '48,49,83',
                'include'      => '',
                'number'       => 0,
                'taxonomy'     => 'product_cat',
                'pad_counts'   => false,            
            );
            $categories = get_categories( $args );
            if($categories){
                foreach($categories as $cat){
                    $category_thumbnail = get_woocommerce_term_meta($cat->term_id, 'thumbnail_id', true);
                    $image = wp_get_attachment_url($category_thumbnail);
                    ?>
                    <li class="cat-item">
                        <div class="cat-item__inner">
                            <div class="green-overlay"></div>
                            <div class="blue-overlay"></div>                        
                            <img class="cat-item__pic" src="<?php echo $image; ?>" alt="<?php echo $cat->name;?>">
                            <a href="/product-category/<?php echo $cat->category_nicename;?>/" class="cat-item__title">
                                <span><?php echo $cat->name;?></span>
                            </a>
                        </div>
                    </li>
        <?php }} ?>
        </ul>
    </section>
    <section class="news-wrapper">
        <div class="container">
            <div class="title-wrapper">
                <img class="title-pic" src="/wp-content/themes/onrial/images/news-icon.png" alt="">
                <span class="title">Новости</span>
            </div>
            <div class="col-md-6">
                <div class="video-wrapper">
                    <div class="iframe-wrapper">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/McUfKttBghE" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                    <span class="video-title">Ёлки в горшке - главный новогодний тренд - Абзац! - 22.12.2016</span>
                </div>
            </div>
            <div class="col-md-6 news-block">
                <div class="news-inner">
                    <span class="news-block__title">Последние новости</span>
                    <ul class="news-block__list">
                        <?php  $args = array(
                            'numberposts' => 3,
                            'category'    => 'news',
                            'orderby'     => 'date',
                            'order'       => 'DESC',
                            'include'     => array(),
                            'exclude'     => array(),
                            'meta_key'    => '',
                            'meta_value'  =>'',
                            'post_type'   => 'post',
                            'suppress_filters' => true
                        );
                        $posts = get_posts( $args );
                        foreach($posts as $post){ setup_postdata($post); ?>
                            <li class="news-block__item">
                                <div class="news-block__pic-wrapper">
                                    <img class="news-block__pic" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title();?>">
                                </div>
                                <div class="news-block__info-wrapper">
                                    <a class="news-block__item-title" href="<?php the_permalink();?>"><?php the_title();?></a>
                                    <div class="news-block__item-txt"><?php the_excerpt();?></div>
                                    <div class="news-block__item-footer">
                                        <span class="news-block__item-date-wrapper">
                                            <i class="news-block__item-date-icon"></i>
                                            <span class="news-block__item-date-txt"><?php the_date('d m Y');?></span>
                                        </span>
                                        <a class="news-block__item-btn" href="<?php the_permalink();?>">Читать полностью</a>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                        <?php wp_reset_postdata(); ?>
                    </ul>
                    <a class="news-block__more" href="/news/">Все новости</a>
                </div>
            </div>
        </div>
    </section>
    <section class="partners-wrapper">
        <div class="container">
            <div class="title-wrapper">
                <img class="title-pic" src="/wp-content/themes/onrial/images/partners-icon.png" alt="">
                <span class="title">Наши партнеры</span>
            </div>
            <ul class="partners-list">
                <li class="partners-item">
                    <img class="partners-logo" src="/wp-content/themes/onrial/images/logo.png" alt="">
                </li>
                <li class="partners-item">
                    <img class="partners-logo" src="/wp-content/themes/onrial/images/logo.png" alt="">
                </li>
                <li class="partners-item">
                    <img class="partners-logo" src="/wp-content/themes/onrial/images/logo.png" alt="">
                </li>
                <li class="partners-item">
                    <img class="partners-logo" src="/wp-content/themes/onrial/images/logo.png" alt="">
                </li>
            </ul>
        </div>
    </section>
    <section class="contacts-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-5">                
                    <div class="title-wrapper">
                        <img class="title-pic" src="/wp-content/themes/onrial/images/contacts-icon.png" alt="">
                        <span class="title">Контакты</span>
                    </div>
                    <div class="contacts-info">
                        <span class="contacts-info__title">Компания “Green Optima”</span>
                        <ul class="contacts-info__list">
                            <li class="contacts-info__item">
                                <i class="contacts-info__icon ci1"></i>
                                <span class="contacts-info__txt">Украина, г.Харьков, <br>Харьковская обл., пос. Коротыч</span>
                            </li>
                            <li class="contacts-info__item">
                                <i class="contacts-info__icon ci2"></i>
                                <div class="contacts-info__txt">
                                    <a class="contacts-info__link" href="tel:+38050830-53-05">+38050830-53-05</a>
                                    <a class="contacts-info__link" href="tel:+38097530-53-05">+38097530-53-05</a>
                                </div>
                            </li>
                            <li class="contacts-info__item">
                                <i class="contacts-info__icon ci3"></i>
                                <div class="contacts-info__txt">
                                    <a class="contacts-info__link" href="mailto:info@green-optima.com.ua">info@green-optima.com.ua</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-7">
                    <nav class="address-tabs">
                        <ul class="address-list">
                            <li class="address-item active">Схема проезда</li>
                            <li class="address-item">Карта</li>
                        </ul>
                        <div class="address-content active">
                            <img class="address-pic" src="/wp-content/themes/onrial/images/scheme.jpg" alt="">
                        </div>
                        <div class="address-content">
                            <div id="map"></div>
                        </div>
                    </nav>
                </div>
            </div>
            <script>
                function initMap() {
                    var latLng = new google.maps.LatLng(49.954355, 36.0541763);
                    var map = new google.maps.Map(document.getElementById('map'), {
                        scrollwheel: false,
                        zoom: 12,
                        center: latLng,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });
                    var marker = new google.maps.Marker({
                        map: map,
                        position: new google.maps.LatLng(49.954355, 36.0541763)

                    });
                }
            </script>
            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-A04z2hqlnoeOBciuiT7uBesuzCYgUTA&callback=initMap">
            </script>
        </div>
    </section>
</main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>
