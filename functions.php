<?php
/**
 * Arguments functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Arguments
 */

if ( ! function_exists( 'arguments_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function arguments_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Arguments, use a find and replace
	 * to change 'arguments' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'arguments', get_template_directory() . '/languages' );

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
	// additional "thumbnail"/featured image sizes: krisnelson
	add_image_size( 'featured-giant', 1800, 440, array( 'center', 'center' ) ); //  width, height, crop
	add_image_size( 'featured-large', 1200, 440, array( 'center', 'center' ) ); // width, height, crop
	add_image_size( 'featured-medium', 800, 352, array( 'center', 'center' ) );
	add_image_size( 'featured-small', 500, 220, array( 'center', 'center' ) );
	add_image_size( 'medium-large', 640, 480, array( 'center', 'center' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'arguments' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'arguments_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'arguments_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function arguments_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'arguments_content_width', 640 );
}
add_action( 'after_setup_theme', 'arguments_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function arguments_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Singular Item Sidebar', 'arguments' ),
		'id'            => 'sidebar-singular-item',
		'description'   => esc_html__( 'Add widgets here.', 'arguments' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'List of Items Sidebar', 'arguments' ),
		'id'            => 'sidebar-list',
		'description'   => esc_html__( 'Add widgets here.', 'arguments' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'arguments' ),
		'id'            => 'sidebar-footer',
		'description'   => esc_html__( 'Add widgets here.', 'arguments' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Tall Home Sidebar', 'arguments' ),
		'id'            => 'sidebar-home-tall',
		'description'   => esc_html__( 'Add widgets here.', 'arguments' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Short Home Sidebar', 'arguments' ),
		'id'            => 'sidebar-home-short',
		'description'   => esc_html__( 'Add widgets here.', 'arguments' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );


}
add_action( 'widgets_init', 'arguments_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function arguments_scripts() {
    wp_enqueue_style( 'arguments-bootstrap',  
    	get_stylesheet_directory_uri() . 
    	'/assets/bootstrap-4.0.0-alpha.6/dist/css/bootstrap.min.css', '', '4a6.8' );	
	wp_enqueue_style( 'arguments-style', get_stylesheet_uri(), 'arguments-bootstrap', '1.1' );

	//wp_enqueue_script( 'arguments-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	//wp_enqueue_script( 'arguments-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'arguments_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
