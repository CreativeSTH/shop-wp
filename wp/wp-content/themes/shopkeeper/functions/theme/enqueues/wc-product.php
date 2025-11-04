<?php

// Product
	
function shopkeeper_wc_product() {

	if ( SHOPKEEPER_WOOCOMMERCE_IS_ACTIVE && is_product() ) {

	    wp_enqueue_script('shopkeeper-wc-product-ratings', 		get_template_directory_uri() . '/js/public/wc-product-ratings.js', 		array('jquery'), shopkeeper_theme_version(), TRUE);
	    wp_enqueue_script('shopkeeper-wc-product-gallery', 		get_template_directory_uri() . '/js/public/wc-product-gallery.js', 		array('jquery'), shopkeeper_theme_version(), TRUE);
	    wp_enqueue_script('shopkeeper-wc-product-quantity', 	get_template_directory_uri() . '/js/public/wc-product-quantity.js', 	array('jquery'), shopkeeper_theme_version(), TRUE);
	    wp_enqueue_script('shopkeeper-wc-product-tabs', 		get_template_directory_uri() . '/js/public/wc-product-tabs.js', 		array('jquery'), shopkeeper_theme_version(), TRUE);
	    wp_enqueue_script('shopkeeper-wc-product-navigation', 	get_template_directory_uri() . '/js/public/wc-product-navigation.js', 	array('jquery'), shopkeeper_theme_version(), TRUE);

	}

}
add_action( 'wp_enqueue_scripts', 'shopkeeper_wc_product' );