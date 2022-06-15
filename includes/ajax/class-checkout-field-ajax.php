<?php
/**
 * Sample_Ajax class.
 *
 * @package WPBP
 */

namespace WPBP\Ajax;

use WPBP\Traits\Singleton;

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load sample ajax functionality inside this class.
 */
class Checkout_field_ajax {

	use Singleton;

	/**
	 * Constructor of Bootstrap class.
	 */
	private function __construct() {
		add_action( 'wp_ajax_checkout_field_manager', array( $this, 'checkout_field_manager' ) );

	}

	/**
	 * Run a sample action.
	 */
	public function checkout_field_manager() {
		//verify nonce
		check_ajax_referer( 'simple-product-shipping-nonce', 'nonce' );
 
		//handle ajax call
		if(isset($_POST['formValues'])){
			// print_r($_POST['formValues']);
			//serialize and update to options
			$formValues = $_POST['formValues'];
			update_option('wccfm_simple_product_checkout_fields', $formValues);
		}

		wp_send_json_success();
	}
}
