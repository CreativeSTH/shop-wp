<?php

/*
 * Footer Components
 */
add_action( 'wp_footer_components', 'shopkeeper_after_footer_components' );
function shopkeeper_after_footer_components() { ?>

    <!-- Filters Offcanvas -->
    <?php if (class_exists('WooCommerce') && (is_shop() || is_product_category() || is_product_tag() || (is_tax() && is_woocommerce() ))) : ?>
        <div class="off-canvas-wrapper">
            <div class="off-canvas <?php echo is_rtl() ? 'position-right' : 'position-left' ?> <?php echo ( is_active_sidebar( 'catalog-widget-area' ) && ( Shopkeeper_Opt::getOption( 'sidebar_style', '1' ) == '0' ) ) ? 'hide-for-large':''; ?> <?php echo ( is_active_sidebar( 'catalog-widget-area' ) ) ? 'shop-has-sidebar':''; ?>" id="offCanvasLeft1" data-off-canvas>

                <div class="menu-close hide-for-medium">
                    <button class="close-button" aria-label="Close menu" type="button" data-close>
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="offcanvas_content_left wpb_widgetised_column">
                    <div id="filters-offcanvas">
                        <?php if ( is_active_sidebar( 'catalog-widget-area' ) ) : ?>
                            <?php dynamic_sidebar( 'catalog-widget-area' ); ?>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    <?php endif; ?>

    <!-- Back To Top Button -->
    <?php if( Shopkeeper_Opt::getOption( 'back_to_top_button', false ) ) : ?>
        <a href="#0" class="cd-top progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
            </svg>
        </a>
    <?php endif; ?>

    <?php

    return;
}




add_action( 'wp_footer_components', 'shopkeeper_after_header_components' );
function shopkeeper_after_header_components() { ?>

    <!-- Mobile Menu Offcanvas -->
    <div class="off-canvas menu-offcanvas <?php echo is_rtl() ? 'position-left' : 'position-right' ?> " id="offCanvasRight1" data-off-canvas>

        <div class="menu-close hide-for-medium">
            <button class="close-button" aria-label="Close menu" type="button" data-close>
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div id="mobiles-menu-offcanvas">

            <?php

            $display_class = !wp_is_mobile() ? 'hide-for-large' : '';

            $header_layout = Shopkeeper_Opt::getOption( 'main_header_layout', '1' );
            $header_layout_style = ('2' === $header_layout) || ('22' === $header_layout) ? 'centered' : 'default';

            if( 'centered' != $header_layout_style ) {
                shopkeeper_get_menu( 'mobile-navigation primary-navigation ' . $display_class, 'main-navigation', 0 );
            } else {
                shopkeeper_get_menu( 'mobile-navigation ' . $display_class, 'centered_header_left_navigation', 0 );
                shopkeeper_get_menu( 'mobile-navigation ' . $display_class, 'centered_header_right_navigation', 0 );
            }

            if( Shopkeeper_Opt::getOption( 'main_header_off_canvas', false ) ) {
                shopkeeper_get_menu( 'mobile-navigation', 'secondary_navigation', 0 );
            }

            if( Shopkeeper_Opt::getOption( 'top_bar_switch', false ) ) {
                shopkeeper_get_menu( 'mobile-navigation ' . $display_class, 'top-bar-navigation', 0 );
            }

            $theme_locations  = get_nav_menu_locations();
            if (isset($theme_locations['top-bar-navigation'])) {
                $menu_obj = get_term($theme_locations['top-bar-navigation'], 'nav_menu');
            }

            if ( is_user_logged_in() ) {
                echo '<nav class="mobile-navigation ' . $display_class . '" role="navigation" aria-label="Mobile Menu">';
                echo '<ul><li class="menu-item"><a href="' . get_home_url() . '/?' . get_option('woocommerce_logout_endpoint') . '=true" class="logout_link">' . esc_html__('Logout', 'woocommerce') . '</a></li></ul>';
                echo '</nav>';
            }

            ?>

        </div>

        <?php if ( is_active_sidebar( 'offcanvas-widget-area' ) ) : ?>
            <div class="shop_sidebar wpb_widgetised_column">
                <?php dynamic_sidebar( 'offcanvas-widget-area' ); ?>
            </div>
        <?php endif; ?>

    </div>

    <!-- Site Search -->
    <div class="off-canvas-wrapper">
        <div class="site-search off-canvas position-top" id="offCanvasTop1" data-off-canvas>
            <div class="row has-scrollbar">
                <div class="site-search-close">
                    <button class="close-button" aria-label="Close menu" type="button" data-close>
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <p class="search-text">
                    <?php esc_html_e('What are you looking for?', 'shopkeeper'); ?>
                </p>
                <?php
                if ( SHOPKEEPER_WOOCOMMERCE_IS_ACTIVE ) {
                    if ( Shopkeeper_Opt::getOption( 'predictive_search', true ) ) {
                        do_action( 'getbowtied_product_search' );
                    } else {
                        the_widget( 'WC_Widget_Product_Search', 'title=' );
                    }
                } else {
                    the_widget( 'WP_Widget_Search', 'title=' );
                }
                ?>
            </div>
        </div>
    </div><!-- .site-search -->

    <?php

    return;
}
