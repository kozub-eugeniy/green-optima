<?php get_header(); ?>

    <div class="container">
        <?php woocommerce_breadcrumb(); ?>

        <h2 class="inner-title"><?php the_title(); ?></h2>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="article-inner">
                <img src="<?= get_the_post_thumbnail_url($post->ID, 'large'); ?>" alt="" class="article-inner__img" style="max-height: 275px; object-fit: cover;">
                <div class="article-inner__text">
                    <p>
                        <?= get_the_date('d F Y') ?>
                    </p>
                    <h3 class="article-inner__title"><?= get_the_excerpt($post->ID); ?></h3>
                    <p><?php the_content(); ?>
                </div>
                <a href="/sample-page/catalog/" class="articles-btn btn btn--black">В магазин</a>
            </article>
        <?php endwhile;
        else : endif; ?>
    </div>

<?php get_footer(); ?>