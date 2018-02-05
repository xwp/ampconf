<?php
/**
 * Posts Live Lists.
 *
 * @package AMPConf
 */

if ( have_posts() ) :

	?>
	<amp-live-list id="ampconf-posts-list" data-poll-interval="15000" data-max-items-per-page="<?php echo esc_attr( get_option( 'posts_per_page' ) ); ?>">
		<button update on="tap:ampconf-posts-list.update" class="button"><?php esc_html_e( 'Click for updates!', 'ampconf' ); ?></button>
		<div items>
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				get_template_part( 'templates/entry/slim' );
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
