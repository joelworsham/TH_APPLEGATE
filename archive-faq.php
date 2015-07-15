<?php
/**
 * Displays the FAQ archive.
 *
 * @since 0.1.0
 * @package Applegate
 *
 * @global WP_Query $wp_query
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

$post_type = isset( $wp_query->post_type ) ? $wp_query->post_type : 'post';

get_header();
?>

	<section id="archive-<?php echo $post_type; ?>" class="page-content">
		<div class="row collapse">
			<div class="small-12 columns">

				<?php
				if ( have_posts() ) :
					global $post;
					?>

					<ul class="accordion" data-accordion>

						<?php
						while ( have_posts() ) :
							the_post();
							?>
							<li <?php post_class( array( 'accordion-navigation' ) ); ?>>

								<a href="#<?php echo $post->post_name; ?>">
									<?php the_title(); ?>
								</a>

								<div id="<?php echo $post->post_name; ?>" class="content">
									<?php the_content(); ?>
								</div>

							</li>
						<?php endwhile; ?>

					</ul>

				<?php else: ?>

					<div class="small-12 columns">
						Nothing found.
					</div>

				<?php endif; ?>

			</div>
		</div>
	</section>

<?php
get_footer();