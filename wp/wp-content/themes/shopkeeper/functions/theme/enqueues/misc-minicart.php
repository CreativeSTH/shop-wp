<?php

// Minicart
	
function shopkeeper_enqueue_misc_minicart() {

	if ( SHOPKEEPER_WOOCOMMERCE_IS_ACTIVE ) {

	    wp_enqueue_script('shopkeeper-misc-minicart', get_template_directory_uri() . '/js/public/misc-minicart.js', array('jquery'), shopkeeper_theme_version(), TRUE);

	}

}
add_action( 'wp_enqueue_scripts', 'shopkeeper_enqueue_misc_minicart' );
