<?php
/**
 * The template for displaying category archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AMPConf
 */

$category = get_category( get_query_var( 'cat' ) );
$cat_id   = $category->cat_ID;

$subcats = get_categories( array(
	'child_of' => $cat_id,
) );

get_header(); ?>

	<div class="wrap">
		<main class="wrap__item wrap__item--blog wrap__item--blog--primary">
			<?php
			if ( have_posts() ) :
				?>
					<header class="wrap__item wrap__item--page-heading">
						<?php the_archive_title( '<h1 class="heading heading--h1">', '</h1>' ); ?>
					</header>

					<?php if ( ! empty( $subcats ) ) : ?>
						<nav class="wrap__item wrap__item--sub-menu">
							<ul class="menu menu--horizontal">
								<?php foreach ( $subcats as $cat ) : ?>
									<li class="menu-item"><a href="<?php echo esc_url( get_term_link( $cat ) ); ?>"><?php echo esc_html( $cat->name ); ?></a></li>
								<?php endforeach; ?>
							</ul>
						</nav>
					<?php endif; ?>
				<?php

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					get_template_part( 'templates/entry/slim' );
				endwhile;

				the_posts_pagination();
			else :

				?>
				<div class="wrap__subitem wrap__subitem--blog">
					<?php get_template_part( 'templates/entry/none' ); ?>
				</div>
				<?php

			endif;
			?>
		</main>

		<?php get_sidebar(); ?>
	</div><!-- .wrap -->

<?php
get_footer();