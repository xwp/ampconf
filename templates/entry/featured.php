<?php
/**
 * Featured entry template.
 *
 * @package AMPNews
 */

?>
<article <?php ampnews_the_post_attributes( array( 'class' => 'entry wrap__item' ) ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="entry__thumbnail">
			<a href="<?php the_permalink(); ?>" <?php echo ampnews_permalink_open_new(); ?>>
				<?php the_post_thumbnail( 'ampnews-1040x585', array( 'data-amp-layout' => 'fill' ) ); ?>
			</a>
		</figure><!-- .entry__thumbnail -->
	<?php endif; ?>

	<header class="entry__header">
		<?php get_template_part( 'templates/entry/meta/date' ); ?>
		<?php the_title( '<h2 class="entry__title"><a href="' . esc_url( get_permalink() ) . '" ' . ampnews_permalink_open_new() . ' rel="bookmark">', '</a></h2>' ); ?>
	</header><!-- .entry__header -->

	<div class="entry__summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry__summary -->

	<footer class="entry__footer">
		<?php get_template_part( 'templates/entry/meta/date' ); ?>
		<?php get_template_part( 'templates/entry/meta/byline' ); ?>
		<?php get_template_part( 'templates/entry/meta/category' ); ?>
	</footer><!-- .entry__footer -->
</article><!-- .entry -->
