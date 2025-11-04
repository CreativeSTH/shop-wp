<?php

// Product Layout Default
	
function shopkeeper_wc_product_layout_default() {

	if

	( 

		SHOPKEEPER_WOOCOMMERCE_IS_ACTIVE &&
		is_product() &&
		getbowtied_product_layout(get_the_ID()) == "default"

	)

	{

	    wp_enqueue_style('shopkeeper-wc-product-layout-default', 	get_template_directory_uri() . '/css/public/wc-product-layout-default.css', 	NULL, shopkeeper_theme_version(), 'all');
	    wp_enqueue_style('shopkeeper-wc-product-mobile', 			get_template_directory_uri() . '/css/public/wc-product-mobile.css', 			NULL, shopkeeper_theme_version(), 'all');

	}

}
add_action( 'wp_enqueue_scripts', 'shopkeeper_wc_product_layout_default' );