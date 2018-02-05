<?php
/**
 * AMPConf static site-footer template.
 *
 * @package AMPConf
 */

?>

	<footer class="wrap wrap--full-width wrap--footer">
		<nav class="wrap__item wrap__item--footer-menu">
			<ul class="menu">
				<li class="menu-item"><a href>Help and Contact Us</a></li>
				<li class="menu-item"><a href>Policies and Standards</a></li>
				<li class="menu-item"><a href>Terms of Service</a></li>
				<li class="menu-item"><a href>Privacy Policy</a></li>
			</ul>
		</nav>

		<p class="wrap__item wrap__item--footer-copyright">&copy; <?php echo date( 'Y' ) ?> Brand</p>
	</footer>

	<amp-state id="ampConf" aria-hidden="true">
		<script type="application/json">
			{
				"mobileMenu": false
			}
		</script>
	</amp-state>

</div><!-- #page -->
