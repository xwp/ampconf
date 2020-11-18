<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package AMPNews
 */

get_header(); ?>

	<div class="wrap">
		<header class="wrap__item wrap__item--page-heading">
			<h1 class="heading heading--h1">
			<?php
				$query = get_search_query();
				if ( ! empty( $query ) ) {
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'ampnews' ), $query );
				} else {
					/* translators: %s: search query. */
					echo esc_html( __( 'Enter a Search Query', 'ampnews' ) );
				}
			?>
			</h1>

		</header><!-- .page-header -->

		<main class="wrap__item wrap__item--blog wrap__item--blog--primary">
			<?php
				if ( empty( $query ) ) {
					get_search_form();
					do_action( 'ampnews-after-search-form' );
				} else {
					get_template_part( 'templates/live-lists/posts' );
				}
			?>
		</main>

		<?php get_sidebar(); ?>
	</div><!-- .wrap -->

<?php
get_footer();
