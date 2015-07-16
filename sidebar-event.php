<?php
/**
 * Sidebar for contact template
 *
 * @since 0.1.0
 * @package Applegate
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
?>

<aside id="site-sidebar" class="event-sidebar small-12 medium-4 columns">
	<div class="event-date">
		<h3>Date</h3>
		<?php
		if ( $date = get_post_meta( get_the_ID(), '_event_date', true ) ) {
			echo mysql2date( get_option( 'date_format' ), $date );
		}
		?>
	</div>

	<div class="event-location">
		<h3>Location</h3>
		<?php
		if ( $location = get_post_meta( get_the_ID(), '_event_location', true ) ) {
			echo wpautop( $location );
		}
		?>
	</div>
</aside>
