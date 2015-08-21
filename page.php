<?php
/**
 * Page template
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
if ( $bucket = get_post_meta( get_the_ID(), 'bucket', true ) ) {
	applegate_save_bucket( $bucket );
}

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

				<div class="page-copy row">
					<div class="columns small-12 medium-6">
						<?php echo apply_filters( 'the_content', get_post_meta( get_the_ID(), 'content_left', true ) ); ?>
					</div>

					<div class="columns small-12 medium-6">
						<?php echo apply_filters( 'the_content', get_post_meta( get_the_ID(), 'content_right', true ) ); ?>
					</div>
				</div>
			</div>

			<?php applegate_template( 'technical-documents' ); ?>
		</div>
	</section>

<?php
get_footer();