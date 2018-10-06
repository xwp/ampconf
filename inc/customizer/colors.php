<?php
/**
 * Adds theme colors to Customizer.
 *
 * @package AMPNews
 */

/**
 * Register color options for navigation, fonts, and other areas.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ampnews_customize_register_colors( $wp_customize ) {
	$colors = array(
		array(
			'slug' => 'primary_color',
			'default' => '#000',
			'label' => 'Primary Color'
		),
		array(
			'slug' => 'secondary_color',
			'default' => '#fff',
			'label' => 'Secondary Color'
		),
		array(
			'slug' => 'tertiary_color',
			'default' => '#777',
			'label' => 'Tertiary Color'
		),
		array(
			'slug' => 'muted_color',
			'default' => '#555555',
			'label' => 'Muted Color'
		),
		array(
			'slug' => 'muted_link',
			'default' => '#2200CC',
			'label' => 'Muted Link'
		),
		array(
			'slug' => 'headline_color',
			'default' => '#2c2d2d',
			'label' => 'Headline Color'
		),
	);
	foreach( $colors as $color ) {
		$wp_customize->add_setting(
			$color['slug'],
			array(
				'default' => $color['default'],
				'type' => 'theme_mod',
				'capability' => 'edit_theme_options'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$color['slug'],
				array(
					'label' => $color['label'],
					'section' => 'colors',
					'settings' => $color['slug']
				)
			)
		);
	}
}
add_action( 'customize_register', 'ampnews_customize_register_colors' );

if ( ! function_exists( 'ampnews_theme_colors' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see ampnews_custom_header_setup().
	 */
	function ampnews_theme_colors() {
		$background_color = get_theme_mod( 'background_color', '#f1f1f1' );
		$primary_color = get_theme_mod( 'primary_color', '#000' );
		$secondary_color = get_theme_mod( 'secondary_color', '#fff' );
		$tertiary_color = get_theme_mod( 'tertiary_color', '#777' );
		$headline_color = get_theme_mod( 'headline_color', '#2c2d2d' );
		$muted_color = get_theme_mod( 'muted_color', '#555555' );
		$muted_link = get_theme_mod( 'muted_link', '#2200CC' );

		printf(
			'<style type="text/css">
				body {
					background-color: %7$s;
				}
				.site-header__branding {
					background-color: %1$s;
					color: %2$s;
				}

				.site-header__search input {
					background: %1$s;
					color: %2$s;
				}

				.site-header__search input::placeholder {
					color: %2$s;
				}

				.entry__meta a {
					color: %1$s;
				}

				.site-header__nav {
					box-shadow: 30vw 0 0 %1$s, -30vw 0 0 %1$s;
					background-color: %1$s;
					color: %2$s;
				}

				.site-header__search button {
					background: %1$s;
					border: 2px solid %2$s;
				}

				.site-header__search button::after {
					background: %2$s;
				}

				.menu--header .menu-item a {
					color: %2$s;
				}

				.wrap--footer {
					border-top: 2px solid %1$s;
				}

				.button, .nav-links a, .nav-links span {
					background: %1$s;
					color: %2$s;
				}

				.wrap--footer .wrap__item--footer-copyright a {
					color: %5$s;
				}

				.wrap--footer .wrap__item--footer-copyright {
					color: %3$s;
				}

				a,
				button,
				input[type="submit"] {
					color: %5$s;
				}

				.site-header__description {
					color: %2$s;
				}

				.site-header__menu-toggle::before {
					box-shadow: 0 6px 0 0 %2$s, 0 -6px 0 0 %2$s;
					background-color: %2$s;
				}

				.site-header__menu-toggle::after {
					background-color: %2$s;
				}

				.entry__meta {
					color: %3$s;
				}

				.entry__meta .entry__date {
					color: %4$s;
				}

				.entry__meta a {
					color: %5$s;
				}

				.entry__title a {
					color: %6$s;
				}
				.heading--widget, .widget-title {
					color: %3$s;
				}
			</style>',
			esc_js( $primary_color ),
			esc_js( $secondary_color ),
			esc_js( $tertiary_color ),
			esc_js( $muted_color ),
			esc_js( $muted_link ),
			esc_js( $headline_color ),
			esc_js( $background_color )
		);
	}
	add_action( 'wp_head', 'ampnews_theme_colors' );

endif;
