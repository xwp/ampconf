<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AMPConf
 */

get_header(); ?>

	<div class="wrap">

		<header class="wrap__item wrap__item--page-heading">
			<?php the_archive_title( '<h1 class="heading heading--h1">', '</h1>' ); ?>
		</header>

		<main class="wrap__item wrap__item--blog wrap__item--blog--primary">
			<?php get_template_part( 'templates/live-lists/posts' ); ?>
		</main>

		<?php get_sidebar(); ?>
	</div><!-- .wrap -->

<?php
get_footer();
