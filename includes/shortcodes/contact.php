<?php
/**
 * Shortcodes: Phone, Email, Address.
 *
 * Displays company phone number.
 *
 * @since   1.0.0
 * @package Applegate
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
add_action( 'init', function () {

	add_shortcode( 'phone', 'applegate_sc_phone' );
	add_shortcode( 'email', 'applegate_sc_email' );
	add_shortcode( 'address', 'applegate_sc_address' );
} );

function applegate_sc_phone() {

	$phone = get_option( 'applegate_phone', '' );
	return wp_is_mobile() ? "<a href=\"tel:$phone\">$phone</a>" : $phone;
}

function applegate_sc_email() {

	$email = get_option( 'applegate_email', '' );
	return "<a href=\"mailto:$email\">$email</a>";
}

function applegate_sc_address() {

	$address = get_option( 'applegate_address', '' );
	return wpautop( do_shortcode( $address ) );
}