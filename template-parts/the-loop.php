<?php
/**
 * The Loop using an amp-live-list
 *
 * @package AMPConf
 */

?>

<amp-live-list id="the-loop" data-poll-interval="15000" data-max-items-per-page="<?php echo esc_attr( get_option( 'posts_per_page' ) ); ?>">
	<button update on="tap:the-loop.update">
		<?php esc_html_e( 'You have updates!', 'ampconf' ); ?>
	</button>

	<div items>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php get_template_part( 'template-parts/content', is_search() ? 'search' : get_post_format() ); ?>
		<?php endwhile; ?>
	</div>

	<div pagination>
		<?php the_posts_navigation(); ?>
	</div>
</amp-live-list>
