<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AMPNews
 */

?>

	</div><!-- End #content -->

	<footer class="wrap wrap--full-width wrap--footer">
		<?php do_action( 'ampnews-before-footer' ); ?>
		<nav class="wrap__item wrap__item--footer-menu">
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_id'        => false,
						'depth'          => 1,
					)
				);
			?>
		</nav>
		<?php do_action( 'ampnews-after-footer' ); ?>
		<p class="wrap__item wrap__item--footer-copyright">
			<?php printf( '&copy; %s', esc_html( date( 'Y' ) ) ); ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</p>
	</footer>

	<?php wp_footer(); ?>

</div><!-- End #page -->

</body>
</html>
