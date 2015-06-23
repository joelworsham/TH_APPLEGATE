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
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
			) );
			?>
		</div>
	</nav>

	<div class="footer-menu">
		<div class="row">
			<div class="small-12 columns">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'footer',
					'container'      => false,
					'menu_class'     => 'nav-menu',
				) )
				?>
			</div>
		</div>

		<!--		<div class="copyright small-12 columns">-->
		<!--			<p class="left">-->
		<!--				&copy; --><?php //echo date( 'Y' ); ?><!-- Applegate-->
		<!--			</p>-->
		<!---->
		<!--			<p class="right">-->
		<!--				<a href="/about-this-site/">-->
		<!--					About this site-->
		<!--				</a>-->
		<!--			</p>-->
		<!--		</div>-->
	</div>
</footer>

<?php // #wrapper ?>
</div>

<?php wp_footer(); ?>

</body>
</html>