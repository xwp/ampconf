<?php
/**
 * The home template file
 *
 * This template is specific to the blog index page, which could be the site
 * root or an alternate page, depending on your Homepage Settings.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AMPNews
 */

get_header();
do_action( 'ampnews-before-wrap' );
?>
<div class="wrap">
	<main class="wrap__item wrap__item--blog wrap__item--blog--primary">
		<?php if ( have_posts() ) : ?>

			<?php if ( ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php else : ?>
				<header>
					<h2 class="screen-reader-text">Posts list</h2>
				</header>
			<?php endif; ?>
			<amp-live-list id="ampnews-articles-list" class="live-list" data-poll-interval="<?php echo esc_attr( AMPNEWS_LIVE_LIST_POLL_INTERVAL ); ?>" data-max-items-per-page="<?php echo esc_attr( get_option( 'posts_per_page' ) ); ?>">
				<div update class="live-list__button">
					<button class="button" on="tap:ampnews-articles-list.update"><?php esc_html_e( 'Load Newer Articles', 'ampnews' ); ?></button>
				</div>
				<div items>
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( apply_filters(
							'ampnews-index-template',
							'templates/entry/slim'
						) );
					endwhile;
					?>
				</div>
				<div pagination></div>
			</amp-live-list>
		<?php else : ?>
			<div class="wrap__subitem wrap__subitem--blog">
				<?php get_template_part( 'templates/entry/none' ); ?>
			</div>
		<?php endif;
		the_posts_pagination();
	?>
	</main>
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php
do_action( 'ampnews-after-wrap' );
get_footer();
