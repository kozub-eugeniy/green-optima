<?php get_header(); ?>
<main class="main-wrapper">
	<div class="container">
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>		
			<?php do_action( 'woocommerce_before_main_content' ); ?>		
			<?php the_content(); ?>
		<?php endwhile; else : endif; ?>
	</div>
</main>
<?php get_footer(); ?>