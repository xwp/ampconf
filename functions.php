<?php
/**
 * AMPConf functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AMPConf
 */

if ( ! function_exists( 'ampconf_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ampconf_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on AMPConf, use a find and replace
		 * to change 'ampconf' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ampconf', get_template_directory() . '/languages' );

		add_theme_support( 'amp' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in multiple locations.
		register_nav_menus(
			array(
				'header' => esc_html__( 'Header', 'ampconf' ),
				'footer' => esc_html__( 'Footer', 'ampconf' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'ampconf_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo', array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Custom image sizes.
		foreach ( array(
			'1040x400',
			'768x461',
			'768x295',
			'727x508',
			'375x225',
			'335x225',
			'320x192',
			'280x188',
			'240x161',
			'160x107',
			'122x82',
		) as $size ) {
			$dimensions = explode( 'x', $size );

			add_image_size( 'ampconf-' . $size, $dimensions[0], $dimensions[1], true );
		}
	}
endif;
add_action( 'after_setup_theme', 'ampconf_setup' );

/**
 * Comments are not ever shown on pages.
 */
function ampconf_remove_page_comments_support() {
	remove_post_type_support( 'page', 'comments' );
}
add_action( 'init', 'ampconf_remove_page_comments_support' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ampconf_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ampconf_content_width', 694 );
}
add_action( 'after_setup_theme', 'ampconf_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ampconf_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ampconf' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ampconf' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ampconf_widgets_init' );

/**
 * Enqueues styles.
 */
function ampconf_enqueue_styles() {
	wp_enqueue_style( 'ampconf', get_template_directory_uri() . '/assets/dist/css/main.css' );
	wp_add_inline_style( 'ampconf', 'amp-live-list > [update] { display: none; } .amp-live-list-item-new {animation: amp-live-list-item-highlight 2s;}@keyframes amp-live-list-item-highlight {0% {box-shadow: 0 0 5px 2px rgba(81, 203, 238, 1);}100% {box-shadow: 0;}}' ); // @todo Merge into main.css
}
add_action( 'wp_enqueue_scripts', 'ampconf_enqueue_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * AMP plugin dependency.
 */
require get_template_directory() . '/inc/plugin-dependency.php';
