<?php
/**
 * Search page template.
 *
 * @package AMPNews
 */

?>
<article <?php ampnews_the_post_attributes( array( 'class' => 'entry entry--featured' ) ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="entry__thumbnail">
			<?php the_post_thumbnail( 'ampnews-1040x585', array( 'data-amp-layout' => 'intrinsic' ) ); ?>
		</figure><!-- .entry__thumbnail -->
	<?php endif; ?>

	<header class="entry__header">
		<?php the_title( '<h1 class="entry__title">', '</h1>' ); ?>
	</header><!-- .entry__header -->

	<div class="entry__content">
		<?php
			get_search_form();
			the_content();
		?>
	</div><!-- .entry__summary -->
</article><!-- .entry -->
