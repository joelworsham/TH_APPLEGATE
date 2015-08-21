<?php
/**
 * Buckets extra meta.
 *
 * @since   1.0.0
 * @package Applegate
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

add_action( 'add_meta_boxes', '_applegate_add_metaboxes_buckets' );
add_action( 'save_post', '_applegate_save_metaboxes_buckets' );

function _applegate_add_metaboxes_buckets() {

	add_meta_box(
		'bucket',
		'Bucket',
		'_applegate_mb_bucket',
		'page',
		'side'
	);
}

function _applegate_mb_bucket() {

	wp_nonce_field( __FILE__, 'applegate_mb_buckets' );

	$selected = get_post_meta( get_the_ID(), 'bucket', true );
	?>
	<p>
		<label>
			<span class="screen-reader-text">Bucket</span>
			<select name="bucket">
				<option>
					None
				</option>
				<option value="building-officials" <?php selected( 'building-officials', $selected ); ?>>
					Building Officials
				</option>
				<option value="architects-specifiers" <?php selected( 'architects-specifiers', $selected ); ?>>
					Architects and Specifiers
				</option>
				<option value="contractors-professionals" <?php selected( 'contractors-professionals', $selected ); ?>>
					Contractors and Professionals
				</option>
				<option value="home-owners" <?php selected( 'home-owners', $selected ); ?>>Home Owners</option>
			</select>
		</label>
	</p>
	<?php
}

function _applegate_save_metaboxes_buckets( $post_ID ) {

	if ( ! isset( $_POST['applegate_mb_buckets'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['applegate_mb_buckets'], __FILE__ ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) ) {
		return;
	}

	if ( ! current_user_can( 'edit_page', $post_ID ) ) {
		return;
	}

	$options = array(
		'bucket',
	);

	foreach ( $options as $option ) {

		if ( ! isset( $_POST[ $option ] ) || empty( $_POST[ $option ] ) ) {
			delete_post_meta( $post_ID, $option );
		}

		update_post_meta( $post_ID, $option, $_POST[ $option ] );
	}
}