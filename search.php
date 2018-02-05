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
		<main class="wrap__item wrap__item--blog wrap__item--blog--primary">
			<?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					get_template_part( 'templates/entry/slim' );
				endwhile;

				the_posts_pagination();
			else :

				?>
				<div class="wrap__subitem wrap__subitem--blog">
					<?php get_template_part( 'templates/entry/none' ); ?>
				</div>
				<?php

			endif;
			?>
		</main>

		<?php get_sidebar(); ?>
	</div><!-- .wrap -->

<?php
get_footer();
