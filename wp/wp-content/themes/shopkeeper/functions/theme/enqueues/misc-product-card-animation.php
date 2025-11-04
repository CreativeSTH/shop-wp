<?php

// Product Card Animation
	
function shopkeeper_enqueue_product_card_animation() {

	if ( SHOPKEEPER_WOOCOMMERCE_IS_ACTIVE && Shopkeeper_Opt::getOption( 'product_card_animation', true ) ) {

	    wp_enqueue_style('shopkeeper-product-card-animation', get_template_directory_uri() . '/css/public/misc-product-card-animation.css', NULL, shopkeeper_theme_version(), 'all');
	    wp_enqueue_script('shopkeeper-product-card-animation', get_template_directory_uri() . '/js/public/misc-product-card-animation.js', array('jquery'), shopkeeper_theme_version(), TRUE);

	}

}
add_action( 'wp_enqueue_scripts', 'shopkeeper_enqueue_product_card_animation' );
