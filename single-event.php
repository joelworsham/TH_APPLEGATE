<?php
/**
 * The theme's page file use for displaying pages.
 *
 * @since 0.1.0
 * @package Applegate
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

get_header();

the_post();
?>

	<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="row">
			<div class="page-content small-12 medium-8 columns">

				<h1 class="post-title">
					<?php the_title(); ?>
				</h1>

				<div class="post-copy">
					<?php the_content(); ?>
				</div>

			</div>

			<?php get_sidebar( 'event' ); ?>
		</div>
	</section>

<?php
get_footer();