<?php
/**
 * The home template file
 *
 * This template is specific to the blog index page, which could be the site
 * root or an alternate page, depending on your Homepage Settings.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AMPConf
 */

get_header(); ?>

	<div class="wrap">
		<?php
		// Only show the feature and subfeatures when not paged.
		if ( ! is_paged() && have_posts() ) {
			the_post();
			ampconf_set_additional_post_classes( array( 'wrap__item', 'wrap__item--full-width' ) );
			get_template_part( 'templates/entry/featured' );
			?>
			<hr>
			<?php

			// Show the next two posts with the default entry template.
			for ( $i = 0; have_posts() && $i < 2; $i++ ) { // phpcs:ignore Generic.CodeAnalysis.ForLoopWithTestFunctionCall.NotAllowed
				the_post();
				ampconf_set_additional_post_classes( array(
					'wrap__item',
					'wrap__item--half',
					sprintf( 'wrap__item--half--%s', 0 === $i ? 'primary' : 'secondary' ),
				) );
				get_template_part( 'templates/entry/default' );
			}
			ampconf_set_additional_post_classes( array() );
		}
		?>

		<main class="wrap__item wrap__item--blog wrap__item--blog--primary">
			<?php
			if ( have_posts() ) :

				if ( ! is_front_page() ) :
				?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>

				<?php
				endif;

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					get_template_part( 'templates/entry/slim' );
				endwhile;

			else :
				?>
				<div class="wrap__subitem wrap__subitem--blog">
					<?php get_template_part( 'templates/entry/none' ); ?>
				</div>
				<?php

			endif;

			the_posts_pagination();
			?>
		</main>

		<?php get_sidebar(); ?>
	</div><!-- .wrap -->

<?php
get_footer();
