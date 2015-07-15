<?php
/**
 * Generic archive page.
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

			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>
					<article <?php post_class( array( 'small-12', 'columns' ) ); ?>>

						<h1 class="<?php echo $post_type; ?>-title">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h1>

						<div class="<?php echo $post_type; ?>-copy">
							<?php the_excerpt(); ?>
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
	</section>

<?php
get_footer();