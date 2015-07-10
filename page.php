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

<section id="page-<?php the_ID(); ?>" <?php body_class( array( 'page-content' ) ); ?>>
	<div class="row">
		<div class="small-12 columns">

			<h1 class="page-title">
				<?php the_title(); ?>
			</h1>

			<div class="page-copy">
				<?php the_content(); ?>
			</div>

			<?php applegate_template( 'technical-documents' ); ?>
		</div>
	</div>
</section>

<?php
get_footer();