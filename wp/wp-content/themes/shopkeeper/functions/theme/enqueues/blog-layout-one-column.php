<?php

// Blog Layout One Column
	
function shopkeeper_enqueue_blog_layout_one_column() {

	if ( ( Shopkeeper_Opt::getOption( 'layout_blog', 'layout-3' ) == 'layout-2' ) && shopkeeper_is_blog() ) {
        wp_enqueue_style('shopkeeper-blog-layout-one-column', 				get_template_directory_uri() . '/css/public/blog-layout-one-column.css', 				NULL, shopkeeper_theme_version(), 'all');
        wp_enqueue_style('shopkeeper-blog-layout-one-column-with-sidebar', 	get_template_directory_uri() . '/css/public/blog-layout-one-column-with-sidebar.css', 	NULL, shopkeeper_theme_version(), 'all');
    }

}
add_action( 'wp_enqueue_scripts', 'shopkeeper_enqueue_blog_layout_one_column' );
