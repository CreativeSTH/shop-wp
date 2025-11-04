<?php


function shopkeeper_theme_scripts() {

    $ajax_url = admin_url('admin-ajax.php', 'relative');

    if ( SHOPKEEPER_WPBAKERY_IS_ACTIVE) { // If VC exists/active load scripts after VC
        $dependencies = array('jquery', 'wpb_composer_front_js');
    } else { // Do not depend on VC
        $dependencies = array('jquery');
    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }    
    
    if ( class_exists('SitePress') ) {
        $my_current_lang = apply_filters( 'wpml_current_language', NULL );
        if ( $my_current_lang ) {
            $ajax_url = add_query_arg( 'wpml_lang', $my_current_lang, $ajax_url );
    }}

    wp_enqueue_script( 'shopkeeper-scripts', get_template_directory_uri() . '/js/scripts.js', $dependencies, shopkeeper_theme_version(), TRUE );

    $getbowtied_scripts_vars_array = array(

        'ajax_load_more_locale' 	=> esc_html__( 'Load More Items', 'shopkeeper' ),
        'ajax_loading_locale' 		=> esc_html__( 'Loading', 'shopkeeper' ),
        'ajax_no_more_items_locale' => esc_html__( 'No more items available.', 'shopkeeper' ),
        'pagination_blog' 			=> Shopkeeper_Opt::getOption( 'pagination_blog', 'infinite_scroll' ),
        'layout_blog' 				=> Shopkeeper_Opt::getOption( 'layout_blog', 'layout-3' ),
        'shop_pagination_type' 		=> Shopkeeper_Opt::getOption( 'pagination_shop', 'infinite_scroll' ),
        'option_minicart' 			=> Shopkeeper_Opt::getOption( 'option_minicart', '1' ),
        'option_minicart_open' 		=> Shopkeeper_Opt::getOption( 'option_minicart_open', '1' ),
        'catalog_mode'				=> Shopkeeper_Opt::getOption( 'catalog_mode', false ),
        'product_lightbox'			=> Shopkeeper_Opt::getOption( 'product_gallery_lightbox', true ),
        'product_gallery_zoom'		=> Shopkeeper_Opt::getOption( 'product_gallery_zoom', true ),
        'mobile_product_columns'    => Shopkeeper_Opt::getOption( 'mobile_columns', 2 ),
        'sticky_header'             => Shopkeeper_Opt::getOption( 'sticky_header', true ),
        'mobile_sticky_header'      => Shopkeeper_Opt::getOption( 'mobile_sticky_header', true ),
        'back_to_top_button'        => Shopkeeper_Opt::getOption( 'back_to_top_button', false ),
        'ajax_url'					=> esc_url($ajax_url),
    );

    wp_localize_script( 'shopkeeper-scripts', 'getbowtied_scripts_vars', $getbowtied_scripts_vars_array );
}
add_action( 'wp_enqueue_scripts', 'shopkeeper_theme_scripts', 99 );


// ==========================================
// Enqueues
// ==========================================

// Global
include_once( get_template_directory() . '/functions/theme/enqueues/global.php');

// Misc
include_once( get_template_directory() . '/functions/theme/enqueues/misc-select2.php');
include_once( get_template_directory() . '/functions/theme/enqueues/misc-product-card-animation.php');
include_once( get_template_directory() . '/functions/theme/enqueues/misc-wishlist-counters.php');
include_once( get_template_directory() . '/functions/theme/enqueues/misc-minicart.php');

// Blog
include_once( get_template_directory() . '/functions/theme/enqueues/blog.php');
include_once( get_template_directory() . '/functions/theme/enqueues/blog-layout-three-columns.php');
include_once( get_template_directory() . '/functions/theme/enqueues/blog-layout-one-column.php');
include_once( get_template_directory() . '/functions/theme/enqueues/blog-layout-masonry.php');

// Shop
include_once( get_template_directory() . '/functions/theme/enqueues/wc-shop.php');

// Product
include_once( get_template_directory() . '/functions/theme/enqueues/wc-product.php');
include_once( get_template_directory() . '/functions/theme/enqueues/wc-product-layout-default.php');
include_once( get_template_directory() . '/functions/theme/enqueues/wc-product-layout-cascade.php');
include_once( get_template_directory() . '/functions/theme/enqueues/wc-product-layout-scaterred.php');

// Cart
include_once( get_template_directory() . '/functions/theme/enqueues/wc-cart.php');

// Checkout
include_once( get_template_directory() . '/functions/theme/enqueues/wc-checkout.php');

// Account
include_once( get_template_directory() . '/functions/theme/enqueues/wc-account.php');



