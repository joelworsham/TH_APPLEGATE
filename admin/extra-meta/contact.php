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

add_action( 'add_meta_boxes', '_applegate_add_metaboxes_contact' );
add_action( 'save_post', '_applegate_save_metaboxes_contact' );

function _applegate_add_metaboxes_contact() {

	global $post;

	if ( get_post_meta( $post->ID, '_wp_page_template', true ) != 'page-templates/contact.php' ) {
		return;
	}

	add_meta_box(
		'applegate_mb_contact_address',
		'Contact Info',
		'_applegate_mb_contact_address_callback',
		'page'
	);
}

function _applegate_mb_contact_address_callback() {

	global $post;

	wp_nonce_field( __FILE__, 'applegate_mb_contact_address_nonce' );

	$address_line_1 = get_post_meta( $post->ID, '_applegate_address_line_1', true );
	$address_line_2 = get_post_meta( $post->ID, '_applegate_address_line_2', true );
	$address_city = get_post_meta( $post->ID, '_applegate_address_city', true );
	$address_state = get_post_meta( $post->ID, '_applegate_address_state', true );
	$address_zip = get_post_meta( $post->ID, '_applegate_address_zip', true );

	$phone = get_post_meta( $post->ID, '_applegate_phone', true );
	$phone_2 = get_post_meta( $post->ID, '_applegate_phone_2', true );
	$fax = get_post_meta( $post->ID, '_applegate_fax', true );
	?>
	<h4>Address</h4>
	<p>
		<label>
			Address Line 1<br/>
			<input type="text" class="regular-text" name="_applegate_address_line_1"
			       value="<?php echo $address_line_1; ?>"/>
		</label>
	</p>
	<p>
		<label>
			Address Line 2<br/>
			<input type="text" class="regular-text" name="_applegate_address_line_2"
			       value="<?php echo $address_line_2; ?>"/>
		</label>
	</p>
	<p>
		<label>
			City<br/>
			<input type="text" class="regular-text" name="_applegate_address_city"
			       value="<?php echo $address_city; ?>"/>
		</label>
	</p>
	<p>
		<label>
			State<br/>
			<input type="text" class="regular-text" name="_applegate_address_state"
			       value="<?php echo $address_state; ?>"/>
		</label>
	</p>
	<p>
		<label>
			Zip Code<br/>
			<input type="text" class="regular-text" name="_applegate_address_zip"
			       value="<?php echo $address_zip; ?>"/>
		</label>
	</p>

	<hr/>

	<h4>Contact Information</h4>

	<p>
		<label>
			Phone<br/>
			<input type="text" class="regular-text" name="_applegate_phone"
			       value="<?php echo $phone; ?>"/>
			<br/>
			<input type="text" class="regular-text" name="_applegate_phone_2"
			       value="<?php echo $phone_2; ?>"/>
		</label>
	</p>

	<p>
		<label>
			Fax<br/>
			<input type="text" class="regular-text" name="_applegate_fax"
			       value="<?php echo $fax; ?>"/>
		</label>
	</p>
<?php
}

function _applegate_save_metaboxes_contact( $post_ID ) {

	if ( ! isset( $_POST['applegate_mb_contact_address_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['applegate_mb_contact_address_nonce'], __FILE__ ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) ) {
		return;
	}

	if ( ! current_user_can( 'edit_page', $post_ID ) ) {
		return;
	}

	$options = array(
		'_applegate_address_line_1',
		'_applegate_address_line_2',
		'_applegate_address_city',
		'_applegate_address_state',
		'_applegate_address_zip',
		'_applegate_phone',
		'_applegate_phone_2',
		'_applegate_fax',
	);

	foreach ( $options as $option ) {

		if ( ! isset( $_POST[ $option ] ) || empty( $_POST[ $option ] ) ) {
			delete_post_meta( $post_ID, $option );
		}

		update_post_meta( $post_ID, $option, $_POST[ $option ] );
	}
}