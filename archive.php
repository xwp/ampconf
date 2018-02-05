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
		<main class="wrap__item wrap__item--blog wrap__item--blog--primary">
			<?php
			if ( have_posts() ) :

				?>
					<header class="wrap__item wrap__item--page-heading">
						<?php the_archive_title( '<h1 class="heading heading--h1">', '</h1>' ); ?>
					</header>
				<?php

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
