<?php
/**
 * Slim entry template.
 *
 * @package AMPConf
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry entry--slim' ); ?> data-sort-time="<?php echo esc_attr( get_the_date( 'U' ) ); ?>">
	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="entry__thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php ampconf_the_post_thumbnail( 'ampconf-280x188' ); ?>
			</a>
		</figure><!-- .entry__thumbnail -->
	<?php endif; ?>

	<header class="entry__header">
		<?php get_template_part( 'templates/entry/meta/date' ); ?>
		<?php the_title( '<h3 class="entry__title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
	</header><!-- .entry__header -->

	<div class="entry__summary">
		<p><?php the_excerpt(); ?></p>
	</div><!-- .entry__summary -->

	<footer class="entry__footer">
		<?php get_template_part( 'templates/entry/meta/byline' ); ?>
		<?php get_template_part( 'templates/entry/meta/category' ); ?>
	</footer><!-- .entry__footer -->
</article><!-- .entry -->
