<?php
/**
 * The theme's search form.
 *
 * @since   0.1.0
 * @package Applegate
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
?>

<form role="search" method="get" class="search-form" action="<?php bloginfo( 'url' ); ?>">
		<label class="search-field-label">
			<span class="screen-reader-text">Search for:</span>
			<input type="search" class="search-field" placeholder="Search" value="" name="s"
			       title="Search for:">
		</label>
</form>