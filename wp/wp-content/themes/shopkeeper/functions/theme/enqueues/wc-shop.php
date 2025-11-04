<?php

// Shop
	
function shopkeeper_wc_shop() {

	if ( SHOPKEEPER_WOOCOMMERCE_IS_ACTIVE && is_archive() ) {

		wp_enqueue_script('shopkeeper-wc-products-ajax-load', get_template_directory_uri() . '/js/public/wc-shop-products-ajax-load.js', array('jquery'), shopkeeper_theme_version(), TRUE);
	
	}

}
add_action( 'wp_enqueue_scripts', 'shopkeeper_wc_shop' );
