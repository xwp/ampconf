<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AMPConf
 */

get_header(); ?>

	<?php
	while ( have_posts() ) :
		the_post();

		?>
		<div class="wrap">
			<div class="wrap__item wrap__item--full-width">
				<amp-live-list id="ampconf-live-page-<?php the_ID(); ?>" data-poll-interval="15000" data-max-items-per-page="1">
					<button update on="tap:ampconf-live-page-<?php the_ID(); ?>.update" class="button"><?php esc_html_e( 'Click for updates!', 'ampconf' ); ?></button>
					<div items>
						<?php get_template_part( 'templates/entry/full', 'page' ); ?>
					</div>
				</amp-live-list>
			</div>
		</div>
		<?php

	endwhile;
	?>

<?php
get_footer();
