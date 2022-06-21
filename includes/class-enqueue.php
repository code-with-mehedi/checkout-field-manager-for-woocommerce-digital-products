<?php
/**
 * Enqueue class.
 *
 * @package VirtualCheckoutManager
 */

namespace VirtualCheckoutManager;

use VirtualCheckoutManager\Traits\Singleton;

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add styles of scripts files inside this class.
 */
class Enqueue {

	use Singleton;

	/**
	 * Constructor of Bootstrap class.
	 */
	private function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
	}

	/**
	 * Add JS scripts.
	 */
	public function enqueue_scripts() {
		// Enqueue scripts for frontend.
	}

	/**
	 * Add admin JS scripts.
	 */
	public function enqueue_admin_scripts( $page ) {
		/**
		 * Load admin scripts only on plugin admin pages.
		 */
		if ( 'woocommerce_page_wccfm_settings_tab' === $page ) {
			// enqueue custom js for admin.
			wp_enqueue_script( 'wccfm-admin-js', plugin_dir_url( __DIR__ ) . 'assets/src/admin.js', array( 'jquery' ), '1.0.0', true );

			wp_enqueue_script( 'sweetalert', 'https://cdn.jsdelivr.net/npm/sweetalert2@11', array(), '1.0.0', true );

			wp_localize_script( 'wccfm-admin-js', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

			// enqueue custom css for admin.
			wp_enqueue_style( 'wccfm-admin-css', plugin_dir_url( __DIR__ ) . 'assets/css/admin.css', array(), '1.0.0' );

		}

	}

	/**
	 * Add CSS files.
	 */
	public function enqueue_styles() {
		// enqueue jquery ui css.
		wp_enqueue_style( 'jquery-ui-css', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array(), '1.0.0' );

	}
}
