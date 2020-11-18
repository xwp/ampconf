<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AMPNews
 */

get_header(); ?>

	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<div class="wrap">
			<main class="wrap__item wrap__item--full-width">
				<amp-live-list id="ampnews-live-post-<?php the_ID(); ?>" class="live-list" data-poll-interval="<?php echo esc_attr( AMPNEWS_LIVE_LIST_POLL_INTERVAL ); ?>" data-max-items-per-page="1">
					<div update class="live-list__button">
						<button class="button" on="tap:ampnews-live-post-<?php the_ID(); ?>.update"><?php esc_html_e( 'Load updates!', 'ampnews' ); ?></button>
					</div>
					<div items>
						<?php get_template_part( 'templates/entry/full' ); ?>
					</div>
				</amp-live-list>
			</main>
		</div>

		<div class="wrap wrap--single">
			<?php
			do_action( 'ampnews-before-comments' );
			if ( comments_open() || get_comments_number() ) :
				// comments_template();
			endif;
			do_action( 'ampnews-after-comments' );
			get_template_part( 'templates/more-stories' );
			?>
		</div>
		<?php
	endwhile;
	?>

<?php
do_action( 'ampnews-after-wrap-single' );
get_footer();
