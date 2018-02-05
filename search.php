<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package AMPConf
 */

get_header(); ?>

	<div class="wrap">
		<header class="wrap__item wrap__item--page-heading">
			<h1 class="heading heading--h1">
			<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for: %s', 'ampconf' ), get_search_query() );
			?>
			</h1>
		</header><!-- .page-header -->

		<main class="wrap__item wrap__item--blog wrap__item--blog--primary">
			<?php get_template_part( 'templates/live-lists/posts' ); ?>
		</main>

		<?php get_sidebar(); ?>
	</div><!-- .wrap -->

<?php
get_footer();
