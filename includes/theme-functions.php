<?php
/**
 * Adds theme functions.
 *
 * @since   0.1.0
 * @package Applegate
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

add_filter( 'template_include', '_applegate_save_current_template', 1000 );
add_filter( 'body_class', '_applegate_body_class' );

function _applegate_save_current_template( $t ) {

	$GLOBALS['current_theme_template'] = str_replace( '.php', '', basename( $t ) );

	return $t;
}

function _applegate_body_class( $classes ) {

	if ( $template = applegate_get_current_template() ) {
		$classes[] = $template;
	}

	return $classes;
}

function applegate_get_current_template() {
	return isset( $GLOBALS['current_theme_template'] ) ? $GLOBALS['current_theme_template'] : false;
}

function get_buckets() {

	return $buckets = array(
		'contractors' => array(
			'title'   => 'Contractors & Professionals',
			'content' => '"He\'s drowned with the rest on \'em, last night," said the old Manx sailor.',
			'icon'    => 'wrench',
			'link'    => '/contractors-professionals/',
			'img'     => get_template_directory_uri() . '/assets/images/mystery-man.jpg',
		),
		'architects'  => array(
			'title'   => 'Architects & Specifiers',
			'content' => '"He\'s drowned with the rest on \'em, last night," said the old Manx sailor.',
			'icon'    => 'bar-chart',
			'link'    => '/architects-specifiers/',
			'img'     => get_template_directory_uri() . '/assets/images/mystery-man.jpg',
		),
		'buildingofficials'    => array(
			'title'   => 'Building Officials',
			'content' => '"He\'s drowned with the rest on \'em, last night," said the old Manx sailor.',
			'icon'    => 'building',
			'link'    => '/building-officials/',
			'img'     => get_template_directory_uri() . '/assets/images/mystery-man.jpg',
		),
		'homeowners'        => array(
			'title'   => 'Home Owners',
			'content' => '"He\'s drowned with the rest on \'em, last night," said the old Manx sailor.',
			'icon'    => 'home',
			'link'    => '/home-owners/',
			'img'     => get_template_directory_uri() . '/assets/images/mystery-man.jpg',
		),
	);
}

add_filter( 'the_content', 'tgm_io_shortcode_empty_paragraph_fix' );
/**
 * Filters the content to remove any extra paragraph or break tags
 * caused by shortcodes.
 *
 * @since 1.0.0
 *
 * @param string $content String of HTML content.
 *
 * @return string $content Amended string of HTML content.
 */
function tgm_io_shortcode_empty_paragraph_fix( $content ) {

	$array = array(
		'<p>['    => '[',
		']</p>'   => ']',
		']<br />' => ']'
	);

	return strtr( $content, $array );

}

function get_descendants( $parent_id, $post_type = 'post' ) {

	$descendants = array();

	$children = get_posts( array(
		'numberposts' => - 1,
		'post_status' => 'publish',
		'post_type'   => $post_type,
		'post_parent' => $parent_id,
	) );

	foreach ( $children as $child ) {

		$descendants[ $child->ID ]['post'] = $child;

		$grandchildren = get_descendants( $child->ID, $post_type );

		if ( ! empty( $grandchildren ) ) {
			$descendants[ $child->ID ]['children'] = $grandchildren;
		}
	}

	return $descendants;
}
function get_menu_by_location( $location ) {

	if ( empty( $location ) ) {
		return false;
	}

	$locations = get_nav_menu_locations();
	if ( ! isset( $locations[ $location ] ) ) {
		return false;
	}

	$menu_obj = get_term( $locations[ $location ], 'nav_menu' );

	return $menu_obj;
}

function applegate_save_bucket( $bucket ) {

	if ( is_user_logged_in() ) {

		update_user_meta( get_current_user_id(), 'applegate_current_bucket', $bucket );
		return true;
	} elseif ( isset( $_SESSION ) ) {

		$_SESSION['applegate-bucket'] = $bucket;
		return true;
	}

	return false;
}

function applegate_get_bucket() {

	if ( is_user_logged_in() ) {
		return get_user_meta( get_current_user_id(), 'applegate_current_bucket', true );
	} elseif ( isset( $_SESSION['applegate-bucket'] ) ) {
		return $_SESSION['applegate-bucket'];
	}

	return false;
}