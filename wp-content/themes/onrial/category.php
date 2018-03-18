<?php
    /**
     * A Simple Category Template
     */

    get_header(); ?>

    <div class="container">
        <?php woocommerce_breadcrumb(); ?>
        <?php if (have_posts()) : ?>
            <h2 class="inner-title"><?php single_cat_title('', true); ?></h2>
            <div class="articles">
                <div class="row">
                    <?php
                        // The Loop
                        $i = 0;
                        while (have_posts()) : the_post(); ?>

                            <div class="col-md-<?= $i ? '4' : '12' ?> col-sm-6">
                                <article class="articles-item articles-item--main" style="background-image: url('<?= get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>">
                                    <h3 class="articles-item__title"><?php the_title(); ?></h3>
                                    <div class="articles-item__descr"><?= get_the_excerpt(get_the_ID()); ?></div>
                                    <a href="<?php the_permalink() ?>" class="btn btn--black articles-btn">Подробнее</a>
                                    <div class="articles-item__descr article-date"><?= get_the_date('d F Y') ?></div>
                                </article>
                            </div>

                            <?php
                            $i++;
                        endwhile; ?>
                </div>
            </div>

        <?php else: ?>
            <p>Нет публикаций в данной категории.</p>
        <?php endif; ?>
    </div>

<?php get_footer(); ?>