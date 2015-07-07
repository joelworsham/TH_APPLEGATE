<?php
/**
 * The theme's index file used for displaying an archive of blog posts.
 *
 * @since   0.1.0
 * @package Applegate
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

get_header();
?>
	<section id="page-search" class="page-content">
		<div class="row">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) {
					applegate_template( 'post-content' );
				}
			else:
				?>
			<div class="small-12 columns">
				<p class="no-results">
					No results found
				</p>
			</div>
			<?php endif; ?>
		</div>
	</section>
<?php
get_footer();