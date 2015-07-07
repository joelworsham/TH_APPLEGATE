<?php
/**
 * Single post content.
 *
 * @since   0.1.0
 * @package Applegate
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

the_post();
?>

<article id="post-<?php the_ID(); ?>" class="small-12 columns">

	<h1 class="page-title">
		<?php echo ! is_single() ? '<a href="' . get_permalink( get_the_ID() ) . '">' : ''; ?>
		<?php the_title(); ?>
		<?php echo ! is_single() ? '</a>' : ''; ?>
	</h1>

	<div class="page-copy">
		<?php
		// Show content if on single post (or if told otherwise)
		if ( is_single() && ! apply_filters( 'applegate_post_show_excerpt', false ) ) {
			the_content();
		} else {
			the_excerpt();
		}
		?>
	</div>
</article>