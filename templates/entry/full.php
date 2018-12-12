<?php
/**
 * Full entry template.
 *
 * @package AMPNews
 */

?>
<article <?php ampnews_the_post_attributes( array( 'class' => 'entry entry--featured' ) ); ?>>
	<header class="entry__header">
		<?php do_action( 'ampnews-before-entry-header' ); ?>
		<?php the_title( '<h2 class="entry__title">', '</h2>' ); ?>
		<?php do_action( 'ampnews-after-entry-header' ); ?>
	</header><!-- .entry__header -->

	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="entry__thumbnail">
			<?php the_post_thumbnail( 'ampnews-1040x585', array(
				'data-amp-layout' => 'intrinsic',
			) ); ?>
		</figure><!-- .entry__thumbnail -->
	<?php endif; ?>
	<?php do_action( 'ampnews-after-entry-thumbnail' ); ?>
	<div class="entry__content">

		<?php
		do_action( 'ampnews-before-article' );
		the_content();
		do_action( 'ampnews-after-article' );
		?>

		<div class="entry__share entry__share--in-content">
			<?php get_template_part( 'templates/social-share' ); ?>
		</div>
	</div><!-- .entry__summary -->

	<footer class="entry__footer">
		<div class="entry__share entry__share--in-footer">
			<?php get_template_part( 'templates/social-share' ); ?>
		</div>
		<?php get_template_part( 'templates/entry/meta/byline' ); ?>
		<?php get_template_part( 'templates/entry/meta/category' ); ?>
		<?php do_action( 'ampnews-entry-footer' ); ?>
		<?php edit_post_link(); ?>
	</footer><!-- .entry__footer -->
</article><!-- .entry -->
