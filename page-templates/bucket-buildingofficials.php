<?php
/**
 * Template Name: Bucket - Building Officials
 *
 * Bucket template for building officials.
 *
 * @since 0.1.0
 * @package Applegate
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

get_header();

// Define current bucket session
applegate_save_bucket( 'building-officials' );

the_post();
?>

	<section id="page-<?php the_ID(); ?>" <?php body_class( array( 'page-content' ) ); ?>>
		<div class="row">
			<div class="small-12 columns">

				<?php applegate_show_testimonial(); ?>

				<?php if ( has_post_thumbnail() ) : ?>
					<div class="page-image">
						<?php the_post_thumbnail( 'full' ); ?>
					</div>
				<?php endif; ?>

				<div class="page-copy">
					<?php the_content(); ?>
				</div>
			</div>

			<?php applegate_template( 'technical-documents' ); ?>
		</div>
	</section>

<?php
get_footer();