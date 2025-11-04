<?php
/**
 * Admin setup
 *
 * @package shopkeeper
 */

require_once( get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php' );
require_once( get_template_directory() . '/inc/tgm/plugins.php' );

/**
 * On theme activation redirect to splash page and set wc image sizes
 */
global $pagenow;
if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
	add_action( 'init', 'shopkeeper_woocommerce_image_dimensions', 1 );
}

/**
 * Define wc image sizes
 */
function shopkeeper_woocommerce_image_dimensions() {

	update_option( 'woocommerce_thumbnail_image_width', 350 );
	update_option( 'woocommerce_thumbnail_cropping', 'custom' );
	update_option( 'woocommerce_thumbnail_cropping_custom_width', 70 );
	update_option( 'woocommerce_thumbnail_cropping_custom_height', 87 );
	update_option( 'woocommerce_single_image_width', 920 );
}
add_action( 'after_switch_theme', 'shopkeeper_woocommerce_image_dimensions', 1 );

/**
 * Admin notices
 */
/*function shopkeeper_theme_notifications() {

	if ( !get_option('dismissed-hookmeup-notice', FALSE ) && !class_exists('HookMeUp') ) {
		?>
		<div class="notice-warning settings-error notice is-dismissible hookmeup_notice">
			<p>
				<strong>
					<span>This theme recommends the following plugin: <em><a href="https://wordpress.org/plugins/hookmeup/" target="_blank">HookMeUp – Additional Content for WooCommerce</a></em>.</span>
				</strong>
			</p>
		</div>
		<?php
	}

	return;
}
add_action( 'admin_notices', 'shopkeeper_theme_notifications' );*/

/**
 * Admin dismiss notices
 */
/*function shopkeeper_dismiss_dashboard_notice() {
	if( $_POST['notice'] == 'hookmeup' ) {
		update_option('dismissed-hookmeup-notice', TRUE );
	}
}
add_action( 'wp_ajax_gbt_dismiss_dashboard_notice', 'shopkeeper_dismiss_dashboard_notice' );*/

/**
 * Block editor layout class
 *
 * @param string $classes
 * @return string
 */
function shopkeeper_editor_layout_class( $classes ) {
	global $post;

	$screen = get_current_screen();
	if( ! $screen->is_block_editor() )
		return $classes;

	if ( isset( $post ) && get_post_type($post->ID) == 'page' ) {
		$pagetemplate = get_post_meta( $post->ID, '_wp_page_template', true );
		if ( !empty( $pagetemplate ) ) {
			switch ( $pagetemplate ) {
				case 'page-boxed.php':
					$classes .= ' page-template-boxed ';
					break;
				case 'page-full-width.php':
					$classes .= ' page-template-full ';
					break;
				case 'page-blank.php':
					$classes .= ' page-template-blank ';
					break;
				default:
					$classes .= ' page-template-default ';
					break;
			}
		} else {
			$classes .= ' page-template-default ';
		}
	}

	return $classes;
}
add_filter( 'admin_body_class', 'shopkeeper_editor_layout_class' );

// Disable Woo redirect

add_filter( 'woocommerce_prevent_automatic_wizard_redirect', '__return_true' );
add_filter( 'woocommerce_enable_setup_wizard', '__return_false' );

// Disable Elementor redirect

add_action( 'admin_init', function() {
	if ( did_action( 'elementor/loaded' ) ) {
		remove_action( 'admin_init', [ \Elementor\Plugin::$instance->admin, 'maybe_redirect_to_getting_started' ] );
	}
}, 1 );

delete_transient( 'elementor_activation_redirect' );
