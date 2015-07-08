<?php
/**
 * Bucket menu.
 *
 * @since   0.1.0
 * @package Applegate
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

function applegate_bucket_menu_loop( $items ) {

	static $depth;
	$depth         = $depth ? $depth : 0;
	$current_depth = $depth;

	echo $depth > 0 ? '<ul class="sub-menu">' : '';

	foreach ( $items as $item ) :
		?>
		<li class="menu-item">
			<a href="<?php echo get_permalink( $item['post']->ID ); ?>">
				<?php echo $item['post']->post_title; ?>
			</a>

			<?php
			if ( isset( $item['children'] ) ) {
				$depth ++;
				applegate_bucket_menu_loop( $item['children'] );
			}
			?>
		</li>
		<?php
	endforeach;

	echo $depth > 0 ? '</ul>' : '';

	$depth = $current_depth;
}

if ( ( $template = applegate_get_current_template() ) && strpos( $template, 'bucket-' ) !== false ): ?>
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
				<?php if ( $children = get_descendants( $bucket_parent_ID, 'page' ) ) : ?>

					<ul class="menu">
						<?php applegate_bucket_menu_loop( $children ); ?>
					</ul>

				<?php endif; ?>
			</div>
		</div>
	</nav>
<?php endif; ?>