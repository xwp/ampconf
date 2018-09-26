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
	printf(
		esc_html( '%s %s' ),
		apply_filters( 'ampnews_filter_author_prefix', $default ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	?>
</span>
