<?php
/**
 * Provides an options page for the theme.
 *
 * @since   1.0.0
 * @package Applegate
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

add_action( 'admin_menu', function() {
	add_options_page(
		'Applegate Settings',
		'Applegate Settings',
		'manage_options',
		'applegate-settings',
		'applegate_pageapplegate_settings_output'
	);
});

function applegate_pageapplegate_settings_output() {

	// Include template
	include_once __DIR__ . '/views/html-applegate-settings.php';
}

// Register settings
add_action( 'admin_init', function() {

	register_setting( 'applegate-settings', 'applegate_phone' );
	register_setting( 'applegate-settings', 'applegate_facebook' );
	register_setting( 'applegate-settings', 'applegate_linkedin' );
	register_setting( 'applegate-settings', 'applegate_youtube' );
});