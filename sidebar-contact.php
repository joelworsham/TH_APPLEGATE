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

<aside id="site-sidebar" class="contact-sidebar small-12 medium-4 columns">
	<ul class="widgets">
		<?php dynamic_sidebar( 'contact' ); ?>
	</ul>
</aside>
