<?php
/**
 * Template Name: Contact
 *
 * Page template for the contact us page.
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

	<section id="page-<?php the_ID(); ?>">
		<div class="row">
			<div class="page-content small-12 medium-8 columns">

				<h1 class="page-title">
					<?php the_title(); ?>
				</h1>

				<div class="page-copy">
					<?php the_content(); ?>
				</div>

				<?php applegate_template( 'technical-documents' ); ?>
			</div>

			<?php get_sidebar( 'contact' ); ?>
		</div>
	</section>


<?php
get_footer();