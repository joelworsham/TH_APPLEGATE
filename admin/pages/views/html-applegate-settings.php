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

		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					<label for="applegate_phone">
						Phone
					</label>
				</th>
				<td>
					<input type="text" name="applegate_phone" id="applegate_phone"
					       value="<?php echo esc_attr( get_option('applegate_phone') ); ?>" />

					<p class="description">
						<strong>Preferred Format:</strong> 555.555.5555
					</p>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row">
					<label for="applegate_fax">
						Fax
					</label>
				</th>
				<td>
					<input type="text" name="applegate_fax" id="applegate_fax"
					       value="<?php echo esc_attr( get_option('applegate_fax') ); ?>" />

					<p class="description">
						<strong>Preferred Format:</strong> 555.555.5555
					</p>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row">
					<label for="applegate_email">
						Email
					</label>
				</th>
				<td>
					<input type="text" name="applegate_email" id="applegate_email"
					       value="<?php echo esc_attr( get_option('applegate_email') ); ?>" />
				</td>
			</tr>


			<tr valign="top">
				<th scope="row">
					<label for="applegate_hours_condensed">
						Hours (condensed)
					</label>
				</th>
				<td>
					<input type="text" name="applegate_hours_condensed" id="applegate_hours_condensed"
					       style="max-width: 100%; width: 500px;"
					       value="<?php echo get_option('applegate_hours_condensed'); ?>" />
				</td>
			</tr>

			<tr valign="top">
				<th scope="row">
					<label for="applegate_hours_office">
						Office Hours
					</label>
				</th>
				<td>
					<div style="max-width: 100%; width:400px;">
						<?php
						wp_editor( get_option('applegate_hours_office'), 'applegate_hours_office', array(
							'teeny' => true,
							'media_buttons' => false,
							'textarea_rows' => 6,
							'textarea_name' => 'applegate_hours_office',
						));
						?>
					</div>
				</td>
			</tr>

		</table>

		<?php submit_button(); ?>

	</form>

</div>