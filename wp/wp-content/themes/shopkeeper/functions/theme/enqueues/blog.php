<?php

// Blog
	
function shopkeeper_enqueue_blog() {

	if ( shopkeeper_is_blog() ) {
        wp_enqueue_script('shopkeeper-blog-ajax', get_template_directory_uri() . '/js/public/blog-ajax.js', array('jquery'), shopkeeper_theme_version(), TRUE);
    }

}
add_action( 'wp_enqueue_scripts', 'shopkeeper_enqueue_blog' );
