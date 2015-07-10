<?php
/**
 * Technical documents.
 *
 * @since   0.1.0
 * @package Applegate
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if ( function_exists( 'TECHNICALDOCS' ) ) {
	echo TECHNICALDOCS()->shortcodes->documents_list();
}