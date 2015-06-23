<?php
/**
 * Shortcode: Style.
 *
 * Formats text.
 *
 * @since   1.0.0
 * @package Applegate
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
add_action( 'init', function () {
	add_shortcode( 'style', 'applegate_sc_style' );
} );

function applegate_sc_style( $atts = array(), $content = '' ) {

	$restricted_atts = array(
		'block',
	);

	$styles = 'style="';

	foreach ( $atts as $name => $value ) {

		if ( in_array( $name, $restricted_atts ) ) {
			continue;
		}

		$name = str_replace( '_', '-', $name );

		$styles .= "$name: $value;";
	}

	$styles .= '"';

	$tag = isset( $atts['tag'] ) ? $atts['tag'] : 'p';

	return "<$tag class=\"styled\" $styles>" . do_shortcode( $content ) . "</$tag>";
}