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

/**
 * Contorl checkout field visibility for digital products
 */

add_filter( 'woocommerce_checkout_fields' , 'wccfm_virtual_checkout_field_manager' );
 
function wccfm_virtual_checkout_field_manager( $fields ) {

	if(!is_checkout())
	return $fields;

	$options = wccfm_get_simple_product_options();
	if ( ! $options ) {
		$options = array();
	}

	$only_virtual = true;
    
   foreach( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
      //Check if there are non-virtual products
      if ( ! $cart_item['data']->is_virtual() ) $only_virtual = false;   
  	}

	foreach ( $options as $key => $value ) {
		// Unset fields which are not needed for digital products
		if ( $value === 'on' && $only_virtual ) {
			unset($fields['billing'][ $key ]);
		}
		if($key==="disable_order_notes" && $value === 'on' && $only_virtual){
			add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );
		}

	}
	return $fields;
}