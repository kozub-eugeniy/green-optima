<?php get_header(); ?>

    <!-- <div id="container"> -->
        <!-- <div id="content" role="main"> -->
            <!-- <main id="main" class="site-main" role="main"> -->

                <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                <?php endwhile; else : endif; ?>

            <!-- </main>#main -->
        <!-- </div>#primary -->
    <!-- </div>.wrap -->

<?php get_footer(); ?>