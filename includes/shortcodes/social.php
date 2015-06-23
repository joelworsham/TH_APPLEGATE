<?php
/**
 * Shortcodes: Facebook, Twitter, GooglePlus, YouTube.
 *
 * Social link shortcodes
 *
 * @since   1.0.0
 * @package Applegate
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
add_action( 'init', function () {

	add_shortcode( 'facebook', 'applegate_sc_facebook' );
	add_shortcode( 'linkedin', 'applegate_sc_linkedin' );
	add_shortcode( 'youtube', 'applegate_sc_youtube' );
} );

function applegate_sc_facebook( $atts = array() ) {

	$atts = shortcode_atts( array(
		'size' => 'medium',
	), $atts );

	return "<span class=\"social-icon-facebook-$atts[size] fa fa-facebook\"></span>";
}

function applegate_sc_linkedin( $atts = array() ) {

	$atts = shortcode_atts( array(
		'size' => 'medium',
	), $atts );

	return "<span class=\"social-icon-linkedin-$atts[size] fa fa-linkedin\"></span>";
}

function applegate_sc_youtube( $atts = array() ) {

	$atts = shortcode_atts( array(
		'size' => 'medium',
	), $atts );

	return "<span class=\"social-icon-youtube-$atts[size] fa fa-youtube\"></span>";
}