<?php
/**
 * Enqueue class.
 *
 * @package WPBP
 */

namespace WPBP;

use WPBP\Traits\Singleton;

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
		// wp_enqueue_script();
	}

	/**
	 * Add admin JS scripts.
	 */
	public function enqueue_admin_scripts( $page ) {
		if ( $page === 'woocommerce_page_wccfm_settings_tab' ) {
			// wp_enqueue_script();
			// enqueue custom js for admin
			wp_enqueue_script( 'wccfm-admin-js', plugin_dir_url( __DIR__ ) . 'assets/src/admin.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'sweetalert', 'https://cdn.jsdelivr.net/npm/sweetalert2@11', null, null, true );
			wp_localize_script( 'wccfm-admin-js', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

			// enqueue custom css for admin
			wp_enqueue_style( 'wccfm-admin-css', plugin_dir_url( __DIR__ ) . 'assets/css/admin.css', array(), '1.0.0' );

		}

	}

	/**
	 * Add CSS files.
	 */
	public function enqueue_styles() {
		// wp_enqueue_style();
		// enqueue jquery ui css
		wp_enqueue_style( 'jquery-ui-css', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' );

	}
}
