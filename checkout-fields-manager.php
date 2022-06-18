<?php
/**
 * Plugin Name: Virtual product checkout fields manager.
 * Description: It will give you option to hide / remove checkout fields.
 * Version:     1.0.0
 * Author:      Mehedi Hasan
 * Author URI:  https://codewithmehedi.com
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: wccfm
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Define plugin __FILE__
 */
if ( ! defined( 'WCCFM_PLUGIN_FILE' ) ) {
	define( 'WCCFM_PLUGIN_FILE', __FILE__ );
}

/**
 * Include necessary files to initial load of the plugin.
 */
if ( ! class_exists( 'WPBP\Bootstrap' ) ) {
	require_once __DIR__ . '/includes/traits/trait-singleton.php';
	require_once __DIR__ . '/includes/class-bootstrap.php';
}

/**
 * Check if WooCommerce is active
 **/
if ( !in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option( 'active_plugins' ) ) ) ) {

	add_action('admin_notices', function() {
        echo '<div class="notice notice-error"><p>'.esc_html__('product based checkout field manager requires WooCommerce to be installed and active. You can download', 'scfwc').' <a href="https://woocommerce.com/" target="_blank">WooCommerce</a> '.esc_html__('here.','wccfm').'</p></div>';   
    });
	return;

}

/**
 * Add setting links for plugin
 */
function wccfm_settings_link( $links ) {
	$settings_link = '<a href="admin.php?page=wccfm_settings_tab">Settings</a>';
	array_unshift( $links, $settings_link );
	return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'wccfm_settings_link' );

/**
 * Initialize the plugin functionality.
 *
 * @since  1.0.0
 * @return WPBP\Bootstrap
 */
function wccfm_init() {
	return WPBP\Bootstrap::instance();
}

// Call initialization function.
wccfm_init();
