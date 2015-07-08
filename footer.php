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

			$menu = get_menu_by_location( 'primary' );
			$items = wp_get_nav_menu_items( $menu->name );
			foreach ( $items as $i => $item ) {
				if ( $item->menu_item_parent != '0' ) {
					unset( $items[ $i ] );
				}
			}

			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'depth' => 2,
				'walker' => new Applegate_Walker_PrimaryNav( count( $items ) ),
			) );
			?>
		</div>
	</nav>

	<div class="footer-menu">
		<div class="row">

			<!-- Default footer -->
			<div class="small-12 columns show-for-medium-up">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'footer',
					'container'      => false,
					'menu_class' => 'nav-menu',
					'depth' => 3,
				) );
				?>
			</div>

			<!-- Small screen footer -->
			<div class="small-12 columns hide-for-medium-up">
				<?php
				require_once __DIR__ . '/includes/class-applegate-walker-footernav.php';

				wp_nav_menu( array(
					'theme_location' => 'footer',
					'container'      => false,
					'menu_class' => 'nav-menu-small accordion',
					'items_wrap' => '<ul id="%1$s" class="%2$s" data-accordion>%3$s</ul>',
					'walker' => new Applegate_Walker_FooterNav(),
					'depth' => 3,
				) );
				?>
			</div>

		</div>
	</div>
</footer>

<?php // #wrapper ?>
</div>

<?php wp_footer(); ?>

</body>
</html>