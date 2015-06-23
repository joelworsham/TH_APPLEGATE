<?php
/**
 * The theme's front-page file use for displaying the home page.
 *
 * @since   0.1.0
 * @package Applegate
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

get_header();

the_post();

$buckets = array(
	array(
		'title'   => 'Contractors & Professionals',
		'content' => '"He\'s drowned with the rest on \'em, last night," said the old Manx sailor.',
		'icon'    => 'wrench',
		'link'    => '/contractors-professionals/',
		'img'     => get_template_directory_uri() . '/assets/images/mystery-man.jpg',
	),
	array(
		'title'   => 'Architects & Specifiers',
		'content' => '"He\'s drowned with the rest on \'em, last night," said the old Manx sailor.',
		'icon'    => 'bar-chart',
		'link'    => '#',
		'img'     => get_template_directory_uri() . '/assets/images/mystery-man.jpg',
	),
	array(
		'title'   => 'Building Officials',
		'content' => '"He\'s drowned with the rest on \'em, last night," said the old Manx sailor.',
		'icon'    => 'building',
		'link'    => '#',
		'img'     => get_template_directory_uri() . '/assets/images/mystery-man.jpg',
	),
	array(
		'title'   => 'Home Owners',
		'content' => '"He\'s drowned with the rest on \'em, last night," said the old Manx sailor.',
		'icon'    => 'home',
		'link'    => '#',
		'img'     => get_template_directory_uri() . '/assets/images/mystery-man.jpg',
	),
);
?>

	<section id="home-content" class="page-content text-center">
		<div class="row collapse">
			<div class="columns small-12">

				<h1 class="page-title">
					<?php the_title(); ?>
				</h1>

				<div class="page-copy">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</section>

<?php if ( ! empty ( $buckets ) ) : ?>

	<section id="home-buckets">

		<div class="row">
			<?php foreach ( $buckets as $bucket ) : ?>
				<div class="bucket columns small-12 large-3">
					<div class="bucket-icon">
						<div class="fa fa-<?php echo $bucket['icon']; ?>"></div>
					</div>

					<h4 class="bucket-title">
						<a href="<?php echo $bucket['link']; ?>">
							<?php echo $bucket['title']; ?>
						</a>
					</h4>

					<div class="bucket-image">
						<a href="<?php echo $bucket['link']; ?>">
							<img src="<?php echo $bucket['img']; ?>"/>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

	</section>

	<section id="home-cta">
		<div class="row">
			<div class="columns small-12">
				<a href="#" class="button large expand">
					Applegate Insulation Cellulose and Cotton Product Catalog
				</a>
			</div>
		</div>
	</section>

<?php endif; ?>

<?php
get_footer();