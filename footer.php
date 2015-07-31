<?php
/**
 * The theme's footer file that appears on EVERY page.
 *
 * @since   0.1.0
 * @package Applegate
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
?>

<?php // #site-content ?>
</section>

<footer id="site-footer">
	<nav class="primary-nav">
		<div class="row">
			<?php
			require_once __DIR__ . '/includes/class-applegate-walker-primarynav.php';

			$menu  = get_menu_by_location( 'primary' );
			$items = wp_get_nav_menu_items( $menu->name );
			foreach ( $items as $i => $item ) {
				if ( $item->menu_item_parent != '0' ) {
					unset( $items[ $i ] );
				}
			}

			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'depth'          => 2,
				'walker'         => new Applegate_Walker_PrimaryNav( count( $items ) ),
			) );
			?>
		</div>
	</nav>

	<div class="footer-menu show-for-medium-up">
		<div class="row">
			<?php
			$footer_menu_pages = array();
			for ( $i = 1; $i <= 5; $i ++ ) {
				$footer_menu_pages[] = get_option( "applegate_footer_menu_$i" );
			}
			$footer_menu_pages = array_filter( $footer_menu_pages );

			$columns = count( $footer_menu_pages );

			if ( ! empty( $footer_menu_pages ) ) {
				foreach ( $footer_menu_pages as $page_ID ) {

					echo '<ul class="footer-menu-column columns medium-' . ( 12 / $columns ) . '">';

					wp_list_pages( array(
						'child_of' => $page_ID,
						'title_li' => get_the_title( $page_ID ),
					) );

					echo '</ul>';
				}
			}
			?>
		</div>
	</div>

	<!-- Small screen footer -->
	<div class="footer-mobile hide-for-medium-up text-center">
		<div class="phone">
			<?php echo applegate_sc_phone(); ?>
		</div>

		<div class="social">
			<a href="<?php echo get_option( 'applegate_social_facebook', '#' ); ?>" class="button expand facebook">
				Facebook
			</a>
			<a href="<?php echo get_option( 'applegate_social_youtube', '#' ); ?>" class="button expand youtube">
				YouTube
			</a>
			<a href="<?php echo get_option( 'applegate_social_linkedin', '#' ); ?>" class="button expand linkedin">
				LinkedIn
			</a>
		</div>
	</div>
</footer>

<?php // #wrapper ?>
</div>

<?php wp_footer(); ?>

</body>
</html>