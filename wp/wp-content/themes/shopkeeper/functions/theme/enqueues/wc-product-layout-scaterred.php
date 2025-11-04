<?php

// Product Layout Scattered
	
function shopkeeper_wc_product_layout_scattered() {

	if

	( 

		SHOPKEEPER_WOOCOMMERCE_IS_ACTIVE &&
		is_product() &&
		( 
			(getbowtied_product_layout(get_the_ID()) == "style_4") ||
			(getbowtied_product_layout(get_the_ID()) == "scattered")
		)

	)

	{

	    wp_enqueue_style('easyzoom', 								get_template_directory_uri() . '/css/vendor/easyzoom.css', 						NULL, '2.5.2', 'all');
	    wp_enqueue_style('shopkeeper-wc-product-layout-scattered', 	get_template_directory_uri() . '/css/public/wc-product-layout-scattered.css', 	NULL, shopkeeper_theme_version(), 'all');
	    wp_enqueue_style('shopkeeper-wc-product-mobile', 			get_template_directory_uri() . '/css/public/wc-product-mobile.css', 			NULL, shopkeeper_theme_version(), 'all');

	    wp_enqueue_script('easyzoom', 			 			get_template_directory_uri() . '/js/vendor/easyzoom.min.js',  		array('jquery'), '2.5.2', TRUE);
	    wp_enqueue_script('shopkeeper-wc-easyzoom-setup', 	get_template_directory_uri() . '/js/public/wc-product-easyzoom.js', array('jquery'), shopkeeper_theme_version(), TRUE);
	    wp_enqueue_script('shopkeeper-wc-product-infos', 	get_template_directory_uri() . '/js/public/wc-product-infos.js', 	array('jquery'), shopkeeper_theme_version(), TRUE);

	}

}
add_action( 'wp_enqueue_scripts', 'shopkeeper_wc_product_layout_scattered' );