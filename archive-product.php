<?php
/**
 * Displays the Product archive.
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

					while ( have_posts() ) :
						the_post();

						// Only show if in current bucket (or if no bucket is set, show all)
						if ( $bucket = applegate_get_bucket() ) {

							if ( $category = wp_get_post_terms( get_the_ID(), 'product-bucket' ) ) {

								// Only take first (should only be one set)
								$category = $category[0];
								$category = $category->slug;

								if ( $category !== $bucket ) {
									continue;
								}
							}
						}
						?>
						<article <?php post_class( array( 'accordion-navigation' ) ); ?>>

							<a href="#<?php echo $post->post_name; ?>">
								<?php the_title(); ?>
							</a>

							<div id="<?php echo $post->post_name; ?>" class="content">
								<?php the_content(); ?>
							</div>

						</article>
						<?php
					endwhile;
				else:
					?>

					<div class="small-12 columns">
						Nothing found.
					</div>

				<?php endif; ?>

			</div>
		</div>
	</section>

<?php
get_footer();