<?php


function getbowtied_theme_register_required_plugins() {

    $plugins = array(
        'woocommerce' => array(
            'name'               => 'WooCommerce',
            'slug'               => 'woocommerce',
            'required'           => true,
        ),
        'shopkeeper-extender' => array(
            'name'               => 'Shopkeeper Extender',
            'slug'               => 'shopkeeper-extender',
            'required'           => true,
        ),
        'hookmeup' => array(
            'name'               => 'WooCommerce HookMeUp',
            'slug'               => 'hookmeup',
            'required'           => true,
        ),
        'yith-woocommerce-wishlist' => array(
            'name'               => 'WooCommerce Wishlist',
            'slug'               => 'yith-woocommerce-wishlist',
            'required'           => false,
        ),
        'elementor' => array(
            'name'               => 'Elementor Page Builder',
            'slug'               => 'elementor',
            'required'           => false,
        ),
        'pro-elements' => array(
            'name'               => 'Elementor Pro Elements',
            'slug'               => 'pro-elements',
            'source'             => 'https://getbowtied.github.io/repository/plugins/pro-elements/pro-elements.zip',
            'required'           => false,
            'external_url'       => 'https://shopkeeper.getbowtied.com/'
        ),
        'kits-templates-and-patterns' => array(
            'name'               => 'Kits, Templates and Patterns',
            'slug'               => 'kits-templates-and-patterns',
            'required'           => false,
        ),
        'js_composer' => array(
            'name'               => 'WPBakery - Legacy Page Builder',
            'slug'               => 'js_composer',
            'source'             => 'https://getbowtied.github.io/repository/plugins/wp-bakery/js_composer.zip',
            'required'           => false,
            'external_url'       => '',
            'version'            => '8.7.2'
        )
    );

    $config = array(
        'id'                => 'getbowtied',
        'default_path'      => '',
        'parent_slug'       => 'getbowtied-dashboard',
        'menu'              => 'getbowtied-plugins',
        'capability'        => 'edit_theme_options',
        'has_notices'       => true,
        'is_automatic'      => true,
        //'message'      		=> '',
        'strings'      => array(
			'page_title'                      => __( 'Plugins', 'shopkeeper' ),
			'menu_title'                      => __( 'Plugins', 'shopkeeper' ),
		)
    );

    tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'getbowtied_theme_register_required_plugins' );
