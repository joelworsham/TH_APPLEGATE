<?php
/**
 * The theme's header file that appears on EVERY page.
 *
 * @since   0.1.0
 * @package Applegate
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/vendor/js/html5.js"></script>
	<![endif]-->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper">

	<header id="site-header">
		<div class="row">
			<div class="logo left">
				<a href="<?php bloginfo( 'url' ); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-medium.png"/>
				</a>
			</div>

			<div class="container right">
				<div class="row">
					<div class="columns small-12">
						<div class="right">
							<?php get_search_form(); ?>
						</div>

						<nav class="top-nav right">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'header-top',
								'container'      => false,
							) );
							?>
						</nav>

						<div class="social right">
							<?php
							echo applegate_sc_facebook();
							echo applegate_sc_linkedin();
							echo applegate_sc_youtube();
							?>
						</div>
					</div>
				</div>

				<div class="phone">
					<?php echo applegate_sc_phone(); ?>
				</div>

				<div class="bible-verse">
					<?php dynamic_sidebar( 'header-bible-verse' ); ?>
				</div>
			</div>
		</div>
	</header>

	<?php if ( ( $template = applegate_get_current_template() ) && strpos( $template, 'bucket-' ) !== - 1 ): ?>
		<?php
		$bucket_parent_ID = get_the_ID();

		if ( $parent = wp_get_post_parent_id( get_the_ID() ) ) {
			$bucket_parent_ID = $parent;
		}
		?>
		<div class="bucket-gutter <?php echo $template; ?>">
			<div class="row">
				<div class="columns small-12">
					<a href="<?php echo get_permalink( $bucket_parent_ID ); ?>">
						<?php
						$buckets = get_buckets();
						$bucket  = $buckets[ str_replace( 'bucket-', '', $template ) ];
						echo "<span class=\"left\"><span class=\"fa fa-$bucket[icon]\"></span></span>";
						echo $bucket['title'];
						?>
					</a>
				</div>
			</div>
		</div>

		<nav class="bucket-menu">
			<div class="row collapse">
				<div class="small-12 columns">
					<?php
					if ( $children = get_children( array(
						'post_parent' => $bucket_parent_ID,
						'post_type'   => 'page'
					) )
					) {
						?>
						<ul class="menu">
							<?php foreach ( $children as $post ) : ?>
								<li class="menu-item">
									<a href="<?php echo get_permalink( $post ); ?>">
										<?php echo $post->post_title; ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php
					}
					?>
				</div>
			</div>
		</nav>
	<?php endif; ?>

	<section id="site-content">