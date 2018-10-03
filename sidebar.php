<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AMPNews
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside class="wrap__item wrap__item--blog wrap__item--blog--secondary">
	<div class="wrap__subitem wrap__subitem--blog wrap__subitem--no-separator">
		<?php dynamic_sidebar( 'ampnews-sidebar' ); ?>
	</div>
</aside>
