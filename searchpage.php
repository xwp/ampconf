<?php
/**
 * Template Name: Search
 *
 * @package AMPNews
 */

get_header(); ?>

	<div class="wrap">
		<main class="wrap__item wrap__item--blog wrap__item--blog--primary">
			<?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					?>
					<div class="wrap__subitem wrap__subitem--blog">
						<?php get_template_part( 'templates/entry/search' ); ?>
					</div>
					<?php

				endwhile;

			endif;
			?>
		</main>

		<?php get_sidebar(); ?>
	</div><!-- .wrap -->

<?php
get_footer();
