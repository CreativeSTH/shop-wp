<?php

// Blog Layout Three Columns
	
function shopkeeper_enqueue_blog_layout_three_columns() {

	if ( ( Shopkeeper_Opt::getOption( 'layout_blog', 'layout-3' ) == 'layout-1' ) && shopkeeper_is_blog() ) {
        wp_enqueue_style('shopkeeper-blog-layout-three-columns', get_template_directory_uri() . '/css/public/blog-layout-three-columns.css', NULL, shopkeeper_theme_version(), 'all');
        wp_enqueue_script( 'shopkeeper-salvattore', get_template_directory_uri() . '/js/vendor/salvattore.min.js', array('jquery'), '1.0.9', TRUE );
    }

}
add_action( 'wp_enqueue_scripts', 'shopkeeper_enqueue_blog_layout_three_columns' );
