<?php

// Blog Layout Masonry
	
function shopkeeper_enqueue_blog_layout_masonry() {

	if ( ( Shopkeeper_Opt::getOption( 'layout_blog', 'layout-3' ) == 'layout-3' ) && shopkeeper_is_blog() ) {
        wp_enqueue_style('shopkeeper-blog-layout-masonry', get_template_directory_uri() . '/css/public/blog-layout-masonry.css', NULL, shopkeeper_theme_version(), 'all');
    }

}
add_action( 'wp_enqueue_scripts', 'shopkeeper_enqueue_blog_layout_masonry' );
