<?php
/**
 * Full entry template.
 *
 * @package AMPNews
 */

?>
<article <?php ampnews_the_post_attributes( array( 'class' => 'entry entry--featured' ) ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="entry__thumbnail">
			<?php the_post_thumbnail( 'ampnews-1040x585', array( 'data-amp-layout' => 'fill' ) ); ?>
		</figure><!-- .entry__thumbnail -->
	<?php endif; ?>

	<header class="entry__header">
		<?php get_template_part( 'templates/entry/meta/date' ); ?>
		<?php the_title( '<h2 class="entry__title">', '</h2>' ); ?>
	</header><!-- .entry__header -->

	<div class="entry__content">
		<?php the_content(); ?>

		<div class="entry__share entry__share--in-content">
			<?php get_template_part( 'templates/social-share' ); ?>
		</div>
	</div><!-- .entry__summary -->

	<footer class="entry__footer">
		<div class="entry__share entry__share--in-footer">
			<?php get_template_part( 'templates/social-share' ); ?>
		</div>
		<?php get_template_part( 'templates/entry/meta/date' ); ?>
		<?php get_template_part( 'templates/entry/meta/byline' ); ?>
		<?php get_template_part( 'templates/entry/meta/category' ); ?>
		<?php edit_post_link(); ?>
	</footer><!-- .entry__footer -->
</article><!-- .entry -->
