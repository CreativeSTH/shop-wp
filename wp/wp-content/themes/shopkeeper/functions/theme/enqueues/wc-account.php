<?php

// Account
	
function shopkeeper_enqueue_wc_account() {

	if ( SHOPKEEPER_WOOCOMMERCE_IS_ACTIVE && is_account_page() ) {

		wp_enqueue_style('shopkeeper-wc-account',	get_template_directory_uri() . '/css/public/wc-account.css', 	NULL, shopkeeper_theme_version(), 'all');
		wp_enqueue_style('shopkeeper-wc-orders', 	get_template_directory_uri() . '/css/public/wc-orders.css', 	NULL, shopkeeper_theme_version(), 'all');
	
	}

}
add_action( 'wp_enqueue_scripts', 'shopkeeper_enqueue_wc_account' );
