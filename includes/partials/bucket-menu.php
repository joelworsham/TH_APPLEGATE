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

function applegate_bucket_menu_loop_selectbox( $items ) {

	static $depth;
	$depth         = $depth ? $depth : 0;
	$current_depth = $depth;

	$indent = str_repeat( '&nbsp;&nbsp;', $depth );

	foreach ( $items as $item ) :
		?>
		<option value="<?php echo get_permalink( $item['post']->ID ); ?>">
				<?php echo $indent . ( $depth > 0 ? '- ' : '' ) . $item['post']->post_title; ?>
		</option>
		<?php

		if ( isset( $item['children'] ) ) {
			$depth ++;
			applegate_bucket_menu_loop_selectbox( $item['children'] );
		}

	endforeach;

	$depth = $current_depth;
}

function applegate_get_top_bucket_parent( $ID ) {

	if ( $parent = wp_get_post_parent_id( $ID ) ) {
		$ID = applegate_get_top_bucket_parent( $parent );
	}

	return $ID;
}

if ( $bucket = get_post_meta( get_the_ID(), 'bucket', true ) ): ?>
	<?php $top_level = applegate_get_top_bucket_parent( get_the_ID() ); ?>
	<div class="bucket-gutter <?php echo $bucket; ?>">
		<div class="row">
			<div class="columns small-12">
				<a href="<?php echo get_permalink( $top_level ); ?>">
					<?php
					$buckets = get_buckets();
					$bucket  = $buckets[ $bucket ];
					echo "<span class=\"left\"><span class=\"fa fa-$bucket[icon]\"></span></span>";
					echo $bucket['title'];
					?>
				</a>
			</div>
		</div>
	</div>

	<nav id="bucket-menu">
		<div class="row collapse">
			<div class="small-12 columns">
				<?php if ( $descendants = get_descendants( $top_level, 'any' ) ) : ?>

					<ul class="menu show-for-medium-up">
						<?php applegate_bucket_menu_loop( $descendants ); ?>
					</ul>

					<select class="select-menu hide-for-medium-up">
						<?php applegate_bucket_menu_loop_selectbox( $descendants ); ?>
					</select>

				<?php endif; ?>
			</div>
		</div>
	</nav>
<?php endif; ?>