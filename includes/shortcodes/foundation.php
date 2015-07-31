<?php
/**
 * Shortcodes: Row, Column.
 *
 * Foundation grid shortcodes.
 *
 * @since   1.0.0
 * @package Applegate
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
add_action( 'init', function () {
	add_shortcode( 'row', 'applegate_sc_row' );
	add_shortcode( 'column', 'applegate_sc_column' );
	add_shortcode( 'hide_for_small', 'applegate_sc_hide_for_small' );
} );

function applegate_sc_row( $atts = array(), $content = '' ) {
	return '<div class="row">' . do_shortcode( $content ) . '</div>';
}

function applegate_sc_column( $atts = array(), $content = '' ) {

	$atts = shortcode_atts( array(
		'small' => '12',
		'medium' => false,
		'large' => false,
	), $atts );

	$class = 'columns ';
	foreach ( $atts as $size => $value ) {
		if ( $value ) {
			$class .= "$size-$value ";
		}
	}

	return "<div class=\"$class\">" . do_shortcode( $content ) . '</div>';
}

function applegate_sc_hide_for_small( $atts = array(), $content = '' ) {
	return '<div class="hide-for-small">' . do_shortcode( $content ) . '</div>';
}