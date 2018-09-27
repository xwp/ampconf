<?php
/**
 * AMP News functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AMPNews
 */

/**
 * Interval for polling for updates to live-lists.
 *
 * @var int
 */
define( 'AMPNEWS_LIVE_LIST_POLL_INTERVAL', 15000 );

if ( ! function_exists( 'ampnews_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ampnews_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on AMP News, use a find and replace
		 * to change 'ampnews' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ampnews', get_template_directory() . '/languages' );

		add_theme_support( 'amp', array(
			'comments_live_list' => true,
		) );
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
				'header' => esc_html__( 'Header', 'ampnews' ),
				'footer' => esc_html__( 'Footer', 'ampnews' ),
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
				'ampnews_custom_background_args',
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
			'1600x900',
			'1400x787',
			'1200x675',
			'1040x585',
			'768x432',
			'727x409',
			'600x338',
			'500x281',
			'375x211',
			'335x188',
			'320x180',
			'280x158',
			'240x135',
			'160x90',
			'122x67',
		) as $size ) {
			$dimensions = explode( 'x', $size );

			add_image_size( 'ampnews-' . $size, $dimensions[0], $dimensions[1], true );
		}
	}
endif;
add_action( 'after_setup_theme', 'ampnews_setup' );

/**
 * Comments are not ever shown on pages.
 */
function ampnews_remove_page_comments_support() {
	remove_post_type_support( 'page', 'comments' );
}
add_action( 'init', 'ampnews_remove_page_comments_support' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ampnews_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ampnews_content_width', 694 );
}
add_action( 'after_setup_theme', 'ampnews_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ampnews_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ampnews' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ampnews' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ampnews_widgets_init' );

/**
 * Enqueues styles.
 */
function ampnews_enqueue_styles() {
	wp_enqueue_style( 'ampnews', get_template_directory_uri() . '/assets/dist/css/main.css' );
	wp_enqueue_style( 'roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400,700', array(), null );
}
add_action( 'wp_enqueue_scripts', 'ampnews_enqueue_styles' );

/**
 * AMP State
 *
 * @todo Expand into a more dynamic method of adding and manipulating state.
 */
function ampnews_state() {
	?>
	<amp-state id="ampNews">
		<script type="application/json">
			{
				"mobileMenu": false
			}
		</script>
	</amp-state>
	<?php
}
add_action( 'wp_footer', 'ampnews_state' );

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
