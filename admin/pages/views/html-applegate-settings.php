<?php
/**
 * Applegate Settings page HTML.
 *
 * @since   1.0.0
 * @package Applegate
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
?>

<div class="wrap">

	<h2>Applegate Settings</h2>

	<form method="post" action="options.php">

		<?php settings_fields( 'applegate-settings' ); ?>

		<h3>Company</h3>
		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					<label for="applegate_phone">
						Phone
					</label>
				</th>
				<td>
					<input type="text" class="regular-text" name="applegate_phone" id="applegate_phone"
					       value="<?php echo esc_attr( get_option('applegate_phone') ); ?>" />
				</td>
			</tr>
		</table>

		<h3>Social</h3>
		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					<label for="applegate_facebook">
						Facebook
					</label>
				</th>
				<td>
					<input type="text" class="regular-text" name="applegate_facebook" id="applegate_facebook"
					       value="<?php echo esc_attr( get_option('applegate_facebook') ); ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="applegate_linkedin">
						LinkedIn
					</label>
				</th>
				<td>
					<input type="text" class="regular-text" name="applegate_linkedin" id="applegate_linkedin"
					       value="<?php echo esc_attr( get_option('applegate_linkedin') ); ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="applegate_youtube">
						YouTube
					</label>
				</th>
				<td>
					<input type="text" class="regular-text" name="applegate_youtube" id="applegate_youtube"
					       value="<?php echo esc_attr( get_option('applegate_youtube') ); ?>" />
				</td>
			</tr>
		</table>

		<?php submit_button(); ?>

	</form>

</div>