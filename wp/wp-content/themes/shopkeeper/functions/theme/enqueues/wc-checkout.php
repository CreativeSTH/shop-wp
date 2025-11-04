<?php

// Cart
	
function shopkeeper_enqueue_wc_checkout() {

	if ( SHOPKEEPER_WOOCOMMERCE_IS_ACTIVE && is_checkout() ) {

		wp_enqueue_style('shopkeeper-wc-checkout', 			get_template_directory_uri() . '/css/public/wc-checkout.css', 			NULL, shopkeeper_theme_version(), 'all');
		wp_enqueue_style('shopkeeper-wc-payment-methods', 	get_template_directory_uri() . '/css/public/wc-payment-methods.css', 	NULL, shopkeeper_theme_version(), 'all');
	
	}

}
add_action( 'wp_enqueue_scripts', 'shopkeeper_enqueue_wc_checkout' );
