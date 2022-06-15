<?php
/**
 * All necessary custom functions will be here.
 *
 * @package WPBP
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get saved options from database for checkout field control
 * @return array
 */
function wccfm_get_simple_product_options() {
	$options = get_option( 'wccfm_simple_product_checkout_fields' );
	if ( ! $options ) {
		$options = array();
	}
	return $options;
}
// foreach ( wccfm_get_simple_product_options() as $key => $value ) {
// 	echo $key . ': ' . $value . '<br>';
// }