<?php
/**
 * Posts Live Lists.
 *
 * @package AMPNews
 */

if ( have_posts() ) :

	?>
	<amp-live-list id="ampnews-posts-list" class="live-list" data-poll-interval="<?php echo esc_attr( AMPNEWS_LIVE_LIST_POLL_INTERVAL ); ?>" data-max-items-per-page="<?php echo esc_attr( get_option( 'posts_per_page' ) ); ?>">
		<div update class="live-list__button">
			<button class="button" on="tap:ampnews-posts-list.update"><?php esc_html_e( 'Load Newer Articles', 'ampnews' ); ?></button>
		</div>
		<div items>
			<?php
			/* Start the Loop */
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
	<?php

else :

	?>
	<div class="wrap__subitem wrap__subitem--blog">
		<?php get_template_part( 'templates/entry/none' ); ?>
	</div>
	<?php

endif;

the_posts_pagination();
