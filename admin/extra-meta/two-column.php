<?php
/**
 * Contact us template extra meta.
 *
 * @since   1.0.0
 * @package Applegate
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

add_action( 'add_meta_boxes', '_applegate_add_metaboxes_two_column' );
add_action( 'save_post', '_applegate_save_metaboxes_two_column' );

function _applegate_add_metaboxes_two_column() {

	if ( get_post_type() != 'page' ) {
		return;
	}

//	remove_post_type_support( 'page', 'editor' );

	add_meta_box(
		'column-left',
		'Content Column Left',
		'_applegate_mb_two_column_left',
		'page'
	);

	add_meta_box(
		'column-right',
		'Content Column Right',
		'_applegate_mb_two_column_right',
		'page'
	);
}

function _applegate_mb_two_column_left() {

	wp_nonce_field( __FILE__, 'applegate_mb_two_column_nonce' );

	wp_editor(
		get_post_meta( get_the_ID(), 'content_left', true ),
		'content_left',
		array()
	);
}

function _applegate_mb_two_column_right() {

	wp_editor(
		get_post_meta( get_the_ID(), 'content_right', true ),
		'content_right',
		array()
	);
}

function _applegate_save_metaboxes_two_column( $post_ID ) {

	if ( ! isset( $_POST['applegate_mb_two_column_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['applegate_mb_two_column_nonce'], __FILE__ ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) ) {
		return;
	}

	if ( ! current_user_can( 'edit_page', $post_ID ) ) {
		return;
	}

	$options = array(
		'content_left',
		'content_right',
	);

	foreach ( $options as $option ) {

		if ( ! isset( $_POST[ $option ] ) || empty( $_POST[ $option ] ) ) {
			delete_post_meta( $post_ID, $option );
		}

		update_post_meta( $post_ID, $option, $_POST[ $option ] );
	}
}