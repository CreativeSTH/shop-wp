<?php

// Select2
	
function shopkeeper_enqueue_shop_select2() {

	if ( SHOPKEEPER_WOOCOMMERCE_IS_ACTIVE && ( is_archive() || is_checkout() || is_cart() ) ) {
		wp_enqueue_script( 'selectWoo' );
		wp_enqueue_style( 'select2' );

		wp_enqueue_style('shopkeeper-select2', get_template_directory_uri() . '/css/public/misc-select2.css', NULL, shopkeeper_theme_version(), 'all');
	}

}
add_action( 'wp_enqueue_scripts', 'shopkeeper_enqueue_shop_select2' );
