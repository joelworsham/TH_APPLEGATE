<?php
/**
 * The theme's 404 page for showing not found pages.
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

	<section id="error-404" class="page-content">
		<div class="row">
			<div class="columns small-12">
				<div class="page-copy">
					<p>
						Sorry, but there doesn't seem to be anything here!
					</p>

					<?php if ( $has_menu = has_nav_menu( 'error-404' ) ) : ?>
						<p>
							Perhaps one of these pages could be helpful:
						</p>
						<?php
						wp_nav_menu( array(
							'theme_location' => 'error-404',
							'container'      => false,
						) );
						?>
					<?php endif; ?>

					<p>
						If you're <?php echo $has_menu ? 'still' : ''; ?> lost, you can always contact us
						at <?php echo applegate_sc_email(); ?>
						or <?php echo applegate_sc_phone(); ?>.
					</p>
				</div>
			</div>
		</div>
	</section>

<?php
get_footer();