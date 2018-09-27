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

get_header(); ?>

	<?php
	// Only show the feature and subfeatures when not paged.
	if ( ! is_paged() && have_posts() ) :
		?>
		<amp-live-list id="ampnews-featured-articles-list" class="live-list" data-poll-interval="<?php echo esc_attr( AMPNEWS_LIVE_LIST_POLL_INTERVAL ); ?>" data-max-items-per-page="3">
			<div update class="live-list__button">
				<button class="button" on="tap:ampnews-articles-list.update,ampnews-featured-articles-list.update"><?php esc_html_e( 'Load Newer Articles', 'ampnews' ); ?></button>
			</div>
			<div items class="wrap wrap--triple-feature">
				<?php
				$show_count = 3;

				/*
				 * Override the modified time of the items to all be the same as the max so that the featured
				 * item will get updated to use the default template when a new featured item is published.
				 */
				global $wp_query;
				$featured_posts        = array_slice( $wp_query->posts, 0, $show_count );
				$max_post_modified     = max( wp_list_pluck( $featured_posts, 'post_modified' ) );
				$max_post_modified_gmt = max( wp_list_pluck( $featured_posts, 'post_modified_gmt' ) );
				foreach ( $featured_posts as $featured_post ) {
					$featured_post->post_modified     = $max_post_modified;
					$featured_post->post_modified_gmt = $max_post_modified_gmt;
				}

				// Show the first three posts with specific entry templates.
				for ( $i = 0; have_posts() && $i < $show_count; $i++ ) { // phpcs:ignore Generic.CodeAnalysis.ForLoopWithTestFunctionCall.NotAllowed
					the_post();

					if ( 0 === $i ) {
						get_template_part( 'templates/entry/featured' );
					} else {
						get_template_part( 'templates/entry/default' );
					}
				}
				?>
			</div>
		</amp-live-list>
	<?php endif; ?>

	<div class="wrap">
		<main class="wrap__item wrap__item--blog wrap__item--blog--primary">
			<?php if ( have_posts() ) : ?>

				<?php if ( ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
				<?php endif; ?>

				<amp-live-list id="ampnews-articles-list" class="live-list" data-poll-interval="<?php echo esc_attr( AMPNEWS_LIVE_LIST_POLL_INTERVAL ); ?>" data-max-items-per-page="<?php echo esc_attr( get_option( 'posts_per_page' ) ); ?>">
					<div items>
						<?php
						while ( have_posts() ) :
							the_post();
							get_template_part( 'templates/entry/slim' );
						endwhile;
						?>
					</div>

					<div update class="live-list__button">
						<button class="button" on="tap:ampnews-articles-list.update<?php echo esc_attr( ( ! is_paged() ) ? ',ampnews-featured-articles-list.update' : '' ); ?>"><?php esc_html_e( 'Load Newer Articles', 'ampnews' ); ?></button>
					</div>

					<div pagination></div>
				</amp-live-list>
			<?php else : ?>
				<div class="wrap__subitem wrap__subitem--blog">
					<?php get_template_part( 'templates/entry/none' ); ?>
				</div>
			<?php endif; ?>

			<?php the_posts_pagination(); ?>
		</main>

		<?php get_sidebar(); ?>
	</div><!-- .wrap -->

<?php
get_footer();
