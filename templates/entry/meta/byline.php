<?php
/**
 * Entry byline partial.
 *
 * @package AMPNews
 */

?>
<span class="entry__meta entry__meta--byline">
	<?php
	/* translators: %s: post author. */
	$default = _x( 'by', 'post author', 'ampnews' );
	$default_suffix = '';
	printf(
		esc_html( '%s %s %s' ),
		apply_filters( 'ampnews_filter_author_prefix', $default ),
		'<span class="author vcard"><a '. ampnews_permalink_open_new() . ' class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>',
		apply_filters( 'ampnews_filter_author_suffix', $default_suffix )
	);
	?>
</span>
