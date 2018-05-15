<?php
/**
 * AMPConf Theme Customizer
 *
 * @package AMPConf
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ampconf_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname', array(
				'selector'        => '.site-title a', // @todo .site-title is invalid.
				'render_callback' => 'ampconf_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription', array(
				'selector'        => '.site-header__description',
				'render_callback' => 'ampconf_customize_partial_blogdescription',
			)
		);
	}

	$wp_customize->add_setting( 'header_nav_background_color', array(
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
		'default'           => '#000000',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_nav_background_color', array(
		'label'   => __( 'Header Nav Background Color', 'ampconf' ),
		'section' => 'colors',
	) ) );
}
add_action( 'customize_register', 'ampconf_customize_register' );

/**
 * Display custom color CSS.
 */
function ampconf_custom_colors() {
	?>
	<style type="text/css">
		.site-header__nav {
			background-color: <?php echo esc_html( get_theme_mod( 'header_nav_background_color', '#000000' ) ); ?>;
			box-shadow: 30vw 0 0 <?php echo esc_html( get_theme_mod( 'header_nav_background_color', '#000000' ) ); ?>, -30vw 0 0 <?php echo esc_html( get_theme_mod( 'header_nav_background_color', '#000000' ) ); ?>;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'ampconf_custom_colors', 20 );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ampconf_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ampconf_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ampconf_customize_preview_js() {
	wp_enqueue_script( 'ampconf-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'ampconf_customize_preview_js' );
