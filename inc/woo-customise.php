<?php 

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
    function loop_columns() {
        return 2; // 3 products per row
    }
}



function phosis_product_thumbnail_url( $size = 'shop_catalog' ) {
    global $post;
    $image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );
    return get_the_post_thumbnail_url( $post->ID, $image_size );
}


// Zip Validation Disable
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields', 99 );

function custom_override_checkout_fields( $fields ) {

    unset($fields['billing']['billing_postcode']['validate']);
    unset($fields['shipping']['shipping_postcode']['validate']);

    return $fields;
}



// 
add_action('woocommerce_checkout_init','disable_billing');
function disable_billing($checkout){
  $checkout->checkout_fields['billing']=array();
  return $checkout;
  }

  //Change the Billing Details checkout label to Contact Information
function wc_billing_field_strings( $translated_text, $text, $domain ) {
    switch ( $translated_text ) {
        case 'Billing details' :
            $translated_text = __( 'Personal Information', 'woocommerce' );
			break;
		case 'Your order' :
			$translated_text = __( 'Your Membership', 'woocommerce' );
			break;
    }
    return $translated_text;
}
add_filter( 'gettext', 'wc_billing_field_strings', 20, 3 );

add_filter( 'woocommerce_order_button_text', 'misha_custom_button_text' );
 
function misha_custom_button_text( $button_text ) {
   return 'Get Start'; // new text is here 
}


add_filter ( 'woocommerce_account_menu_items', 'phosis_remove_my_account_links' );
function phosis_remove_my_account_links( $menu_links ){
 
	unset( $menu_links['edit-address'] ); // Addresses
 
 
	//unset( $menu_links['dashboard'] ); // Remove Dashboard
	//unset( $menu_links['payment-methods'] ); // Remove Payment Methods
	//unset( $menu_links['orders'] ); // Remove Orders
	unset( $menu_links['downloads'] ); // Disable Downloads
	//unset( $menu_links['edit-account'] ); // Remove Account details tab
	//unset( $menu_links['customer-logout'] ); // Remove Logout link
 
	return $menu_links;
 
}


add_filter ( 'woocommerce_account_menu_items', 'phosis_one_more_link' );
function phosis_one_more_link( $menu_links ){
 
	// we will hook "anyuniquetext123" later
	$new = array( 'meta-classes' => 'Classes' );
 
	// or in case you need 2 links
	// $new = array( 'link1' => 'Link 1', 'link2' => 'Link 2' );
 
	// array_slice() is good when you want to add an element between the other ones
	$menu_links = array_slice( $menu_links, 0, 1, true ) 
	+ $new 
	+ array_slice( $menu_links, 1, NULL, true );
 
 
	return $menu_links;
 
 
}
 
add_filter( 'woocommerce_get_endpoint_url', 'phosis_hook_endpoint', 10, 4 );
function phosis_hook_endpoint( $url, $endpoint, $value, $permalink ){
 
	if( $endpoint === 'meta-classes' ) {
 
		// ok, here is the place for your custom URL, it could be external
		$url = site_url('classes');
 
	}
	return $url;
 
}

// Custom Thankyou page
add_action( 'woocommerce_thankyou', 'bbloomer_redirectcustom');

function bbloomer_redirectcustom( $order_id ){

    $order = wc_get_order( $order_id );

    $url = home_url( 'classes' );

    if ( ! $order->has_status( 'failed' ) ) {

        wp_safe_redirect( $url );

        exit;

    }

}