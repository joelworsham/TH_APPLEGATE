<?php
/**
 * Technical Docs archive page.
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

get_header();
?>

	<section id="archive-document" class="page-content">
		<div class="row collapse">

			<form class="auto-submit" method="get" data-url>
				<?php
				$categories = get_terms( 'document-category', array(
					'hide_empty' => false,
				) );

				if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) :
					?>
					<select name="url">
						<option value="<?php echo get_post_type_archive_link( 'document' ); ?>">
							- Select a Category -
						</option>
						<?php foreach ( $categories as $category ) : ?>
							<option value="<?php echo get_term_link( $category ); ?>"
								<?php selected( $wp_query->query['document-category'], $category->slug ); ?>>
								<?php echo $category->name; ?>
							</option>
						<?php endforeach; ?>
					</select>
				<?php endif; ?>
			</form>

			<?php
			if ( have_posts() ) {

				$classes = array(
					'small-block-grid-2',
				);

				if ( $wp_query->found_posts > 2 ) {
					$classes[] = 'medium-block-grid-3';
				}

				if ( $wp_query->found_posts > 3 ) {
					$classes[] = 'large-block-grid-4';
				}

				if ( function_exists( 'TECHNICALDOCS' ) ) {
					echo TECHNICALDOCS()->shortcodes->documents_list_HTML( wp_list_pluck( $wp_query->posts, 'ID' ), $classes );
				}

			} else {
				?>

				<div class="small-12 columns">
					Nothing found.
				</div>

			<?php } ?>
		</div>
	</section>

<?php
get_footer();