<?php
/**
 * Template Name: Bucket - Contractors
 *
 * Bucket template for contractors.
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

	<section id="page-<?php the_ID(); ?>" <?php body_class( array( 'page-content' ) ); ?>>
		<div class="row">
			<div class="small-12 columns">
				<div class="page-copy">
					<?php the_content(); ?>
				</div>
			</div>

			<?php applegate_template( 'technical-documents' ); ?>
		</div>
	</section>

<?php
get_footer();