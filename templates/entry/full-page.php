<?php
/**
 * Full page template.
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
		<?php the_title( '<h1 class="entry__title">', '</h1>' ); ?>
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
	</footer><!-- .entry__footer -->
</article><!-- .entry -->
