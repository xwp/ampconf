<?php
/**
 * Full entry template.
 *
 * @package AMPConf
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry entry--featured' ); ?> data-sort-time="<?php echo esc_attr( get_the_time( 'U' ) ); ?>" data-update-time="<?php echo esc_attr( get_the_modified_time( 'U' ) ); ?>">
	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="entry__thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php ampconf_the_post_thumbnail( 'ampconf-1040x400' ); ?>
			</a>
		</figure><!-- .entry__thumbnail -->
	<?php endif; ?>

	<header class="entry__header">
		<?php get_template_part( 'templates/entry/meta/date' ); ?>
		<?php the_title( '<h2 class="entry__title">', '</h2>' ); ?>
	</header><!-- .entry__header -->

	<div class="entry__content">
		<p><?php the_content(); ?></p>
	</div><!-- .entry__summary -->

	<footer class="entry__footer">
		<?php get_template_part( 'templates/entry/meta/date' ); ?>
		<?php get_template_part( 'templates/entry/meta/byline' ); ?>
		<?php get_template_part( 'templates/entry/meta/category' ); ?>
		<?php edit_post_link(); ?>
	</footer><!-- .entry__footer -->
</article><!-- .entry -->
