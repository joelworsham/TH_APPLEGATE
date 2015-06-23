<?php
/**
 * Adds theme functions.
 *
 * @since   0.1.0
 * @package Applegate
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

add_filter( 'template_include', '_applegate_save_current_template', 1000 );
add_filter( 'body_class', '_applegate_body_class' );

function _applegate_save_current_template( $t ) {

	$GLOBALS['current_theme_template'] = str_replace( '.php', '', basename( $t ) );
	return $t;
}

function _applegate_body_class( $classes ) {

	if ( $template = applegate_get_current_template() ) {
		$classes[] = $template;
	}

	return $classes;
}

function applegate_get_current_template() {
	return isset( $GLOBALS['current_theme_template'] ) ? $GLOBALS['current_theme_template'] : false;
}