<?php
/**
 * WPBakery setup
 *
 * @package shopkeeper
 */

/**
 * WPBakery setup
 */
function shopkeeper_wp_bakery_plugin_setup() {
    // Remove vc_teaser
    if (is_admin()) :
        function remove_vc_teaser() {
            remove_meta_box('vc_teaser', '' , 'side');
        }
        add_action( 'admin_head', 'remove_vc_teaser' );
    endif;
}
add_action( 'init', 'shopkeeper_wp_bakery_plugin_setup' );

/**
 * WPBakery disable updater
 */
function shopkeeper_wp_bakery_vcSetAsTheme() {
    vc_manager()->disableUpdater(true);
    vc_set_as_theme();
}
add_action( 'vc_before_init', 'shopkeeper_wp_bakery_vcSetAsTheme' );

remove_action('vc_activation_hook', 'vc_page_welcome_set_redirect');
remove_action('admin_init', 'vc_page_welcome_redirect');
