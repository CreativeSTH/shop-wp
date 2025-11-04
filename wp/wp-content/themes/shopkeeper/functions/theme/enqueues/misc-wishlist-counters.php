<?php

// Product Card Animation
	
function shopkeeper_enqueue_misc_wishlist_counters() {

	if ( SHOPKEEPER_WISHLIST_IS_ACTIVE ) {

	    wp_enqueue_script('shopkeeper-misc-wishlist-counters', get_template_directory_uri() . '/js/public/misc-wishlist-counters.js', array('jquery'), shopkeeper_theme_version(), TRUE);

	}

}
add_action( 'wp_enqueue_scripts', 'shopkeeper_enqueue_misc_wishlist_counters' );
