 <div class="wccfm-wrap">
	 <ul class="js-errors"></ul>
	 <form id="simple-product-shipping" method="post">
		 <h3>Billing fields</h3>
		 <p> Check the field that you want to disable</p>
		 <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'simple-product-shipping-nonce' ); ?>">
		 <ul>
		<?php
			$wc_checkout = \WC_Checkout::instance();
			// get all options values
			$wccfm_simple_checkout_fields = get_option( 'wccfm_simple_product_checkout_fields' );

		foreach ( $wc_checkout->get_checkout_fields( 'billing' ) as $key => $value ) {

			?>
			 <li>
				 <input 
					type="checkbox" 
					name="<?php echo $key; ?>" 
					id="<?php echo $key; ?>" 
				<?php checked( true, isset( $wccfm_simple_checkout_fields[ $key ] ) ); ?>
				>
				 <label for="<?php echo $key; ?>"><?php echo $value['label']; ?></lable>
			 </li>
			<?php
		}
		?>

		 </ul>
		<h3>Disable shipping for downloadable products</h3>
		<p>Check the checkbox to disable shipping</p>
		 <ul>

			 <li>
				 <input type="checkbox" 
					name="disable_shipping"
					id="disable_shipping"
					<?php checked( true, isset( $wccfm_simple_checkout_fields['disable_shipping'] ) ); ?>
				 >
				 <label for="disable_shipping"> Disable shipping </lable>
			 </li>

		 </ul>
		<h3>Order notes</h3>
		<p>Check the checkbox to disable order notes</p>
		 <ul>

			 <li>
				 <input type="checkbox" 
					name="disable_order_notes"
					id="disable_order_notes"
					<?php checked( true, isset( $wccfm_simple_checkout_fields['disable_order_notes'] ) ); ?>
				 >
				 <label for="disable_order_notes"> Disable order notes </lable>
			 </li>

		 </ul>
		 <input type="submit" id="simple-product-fields" name="Submit" value="Submit" />
	 </form>
 </div>
