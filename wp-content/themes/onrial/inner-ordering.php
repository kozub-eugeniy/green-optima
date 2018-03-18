<?php /* Template Name: inner ordering */?>
<?php
get_header(); ?>
    <main class="inner-page">
		<div class="container">
			<ul class="breadcrumbs">
				<li><a href="/">Главная</a></li>
				<li>Корзина</li>
			</ul>

            <h2 class="page-title">Корзина</h2>
			
			<div class="row">
				<div class="col-md-12">
					<div class="ordering-cart">
						<div class="ordering-cart__top clearfix">
							<a href="javascript:void(0)" class="btn ordering-cart__continue">Продолжить покупки</a>
							<div class="ordering-cart__title">Ваш заказ:</div>
						</div>
						<div class="ordering-scroll">
                            <?php
                            $items = WC()->cart->get_cart();
                                    if (WC()->cart->is_empty()) {
                                        wc_get_template('cart/cart-empty.php');
                                    } else {
                                        wc_get_template('cart/cart.php');
                                    }
                            ?>

						</div>
						<ul class="cart-result">
                            <?php do_action( 'woocommerce_cart_collaterals' );   ?>
						</ul>
					</div>
					<a href="/checkout/" class="woocommerce-Button button btn--accent" style="padding: 15px 40px; color: #fff !important;">Оформить заказ</a>
				</div>
			</div>

		</div>
	</main>

<?php get_footer(); ?>
