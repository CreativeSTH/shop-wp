<?php

// Cart
	
function shopkeeper_wc_cart() {

	if ( SHOPKEEPER_WOOCOMMERCE_IS_ACTIVE && is_cart() ) {

		wp_enqueue_style('shopkeeper-wc-cart', get_template_directory_uri() . '/css/public/wc-cart.css', NULL, shopkeeper_theme_version(), 'all');

		wp_enqueue_script('shopkeeper-wc-product-quantity', get_template_directory_uri() . '/js/public/wc-product-quantity.js', array('jquery'), shopkeeper_theme_version(), TRUE);

	}

}
add_action( 'wp_enqueue_scripts', 'shopkeeper_wc_cart' );
