<?php
/**
 * The theme's functions file that loads on EVERY page, used for uniform functionality.
 *
 * @since   0.1.0
 * @package Applegate
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

// Make sure PHP version is correct
if ( ! version_compare( PHP_VERSION, '5.3.0', '>=' ) ) {
	wp_die( 'ERROR in Applegate theme: PHP version 5.3 or greater is required.' );
}

// Make sure no theme constants are already defined (realistically, there should be no conflicts)
if ( defined( 'THEME_VERSION' ) || defined( 'THEME_ID' ) || isset( $applegate_fonts ) ) {
	wp_die( 'ERROR in Applegate theme: There is a conflicting constant. Please either find the conflict or rename the constant.' );
}

/**
 * The theme's current version (make sure to keep this up to date!)
 */
define( 'THEME_VERSION', '1.2.0' );

/**
 * The theme's ID (used in handlers).
 */
define( 'THEME_ID', 'my_theme' );

/**
 * Fonts for the theme. Must be hosted font (Google fonts for example).
 */
$applegate_fonts = array(
	'Font Awesome' => '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',
);

// Extra image sizes
$applegate_image_sizes = array(
	// 'slide' => array(
	// 	'title' => 'Slide',
	// 	'width' => 1000,
	// 	'height' => 500,
	// 	'crop' => array( 'center', 'center' ),
	// ),
);

/**
 * Setup theme properties and stuff.
 *
 * @since 0.1.0
 */
add_action( 'after_setup_theme', function () {

	// Image sizes
	if ( ! empty( $applegate_image_sizes ) ) {

		foreach ( $applegate_image_sizes as $ID => $size ) {
			add_image_size( $ID, $size['width'], $size['height'], $size['crop'] );
		}

		add_filter( 'image_size_names_choose', '_meesdist_add_image_sizes' );
	}

	// Add theme support
	require_once __DIR__ . '/includes/theme-support.php';

	// Allow shortcodes in text widget
	add_filter( 'widget_text', 'do_shortcode' );
} );

/**
 * Adds support for custom image sizes.
 *
 * @since 0.1.0
 *
 * @param $sizes array The existing image sizes.
 *
 * @return array The new image sizes.
 */
function _meesdist_add_image_sizes( $sizes ) {

	global $applegate_image_sizes;

	$new_sizes = array();
	foreach ( $applegate_image_sizes as $ID => $size ) {
		$new_sizes[ $ID ] = $size['title'];
	}

	return array_merge( $sizes, $new_sizes );
}

/**
 * Register theme files.
 *
 * @since 0.1.0
 */
add_action( 'init', function () {

	global $applegate_fonts;

	// Theme styles
	wp_register_style(
		THEME_ID,
		get_template_directory_uri() . '/style.css',
		null,
		defined( 'WP_DEBUG' ) && WP_DEBUG ? time() : THEME_VERSION
	);

	// Theme script
	wp_register_script(
		THEME_ID,
		get_template_directory_uri() . '/script.js',
		array( 'jquery' ),
		defined( 'WP_DEBUG' ) && WP_DEBUG ? time() : THEME_VERSION,
		true
	);

	// Theme fonts
	if ( ! empty( $applegate_fonts ) ) {
		foreach ( $applegate_fonts as $ID => $link ) {
			wp_register_style(
				THEME_ID . "-font-$ID",
				$link
			);
		}
	}
} );

/**
 * Enqueue theme files.
 *
 * @since 0.1.0
 */
add_action( 'wp_enqueue_scripts', function () {

	global $applegate_fonts;

	// Theme styles
	wp_enqueue_style( THEME_ID );

	// Theme script
	wp_enqueue_script( THEME_ID );

	// Theme fonts
	if ( ! empty( $applegate_fonts ) ) {
		foreach ( $applegate_fonts as $ID => $link ) {
			wp_enqueue_style( THEME_ID . "-font-$ID" );
		}
	}
} );

/**
 * Register nav menus.
 *
 * @since 0.1.0
 */
add_action( 'after_setup_theme', function () {

	register_nav_menu( 'primary', 'Primary Menu' );
	register_nav_menu( 'error-404', 'Error 404' );
	register_nav_menu( 'header-top', 'Header Top Menu' );
	register_nav_menu( 'footer', 'Footer Menu' );
} );

/**
 * Register sidebars.
 *
 * @since 0.1.0
 */
add_action( 'widgets_init', function () {

	// Page
	register_sidebar( array(
		'name'         => 'Page',
		'id'           => 'page',
		'description'  => 'Displays on all pages.',
		'before_title' => '<h3 class="widget-title">',
		'after_title'  => '</h3>',
	) );

	// Header Bible Verse
	register_sidebar( array(
		'name'          => 'Header Bible Verse',
		'id'            => 'header-bible-verse',
		'description'   => 'Displays in the header.',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		'before_widget' => '',
		'after_widget'  => '',
	) );
} );

/**
 * Adds a favicon.
 *
 * @since 0.1.0
 */
add_action( 'wp_head', function () {

	if ( ! file_exists( get_stylesheet_directory() . '/assets/images/favicon.ico' ) ) {
		return;
	}
	?>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() . '/assets/images/favicon.ico'; ?>" />
<?php
});

/**
 * Loads a partial.
 *
 * @since 0.1.0
 *
 * @param array|string $template The template to load.
 */
function applegate_template( $template ) {

	$template = is_array( $template ) ? implode( '/', $template ) : $template;

	if ( file_exists( __DIR__ . "/includes/partials/$template.php" ) ) {
		include __DIR__ . "/includes/partials/$template.php";
	}
}

require_once __DIR__ . '/admin/admin.php';
require_once __DIR__ . '/includes/theme-functions.php';

// Include shortcodes
require_once __DIR__ . '/includes/shortcodes/button.php';
require_once __DIR__ . '/includes/shortcodes/contact.php';
require_once __DIR__ . '/includes/shortcodes/style.php';
require_once __DIR__ . '/includes/shortcodes/foundation.php';
require_once __DIR__ . '/includes/shortcodes/social.php';

// Include widgets
require_once __DIR__ . '/includes/widgets/image.php';
require_once __DIR__ . '/includes/widgets/text-icon.php';