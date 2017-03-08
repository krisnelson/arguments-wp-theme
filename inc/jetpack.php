<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package Arguments
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 */
function arguments_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'loop-container',
		'wrapper'   => false,
		'footer_widgets' => true,
		'render'    => 'arguments_infinite_scroll_render',
		'footer'    => 'footer',
		'posts_per_page' => '12',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'arguments_jetpack_setup' );

/**
 * Custom render function for Related Posts headline.
 */
function jetpackme_related_posts_headline( $headline ) {
$headline = sprintf(
			'<h3 class="section-title">%s</h3>',
			esc_html( 'Related Articles' )
			);
return $headline;
}
add_filter( 'jetpack_relatedposts_filter_headline', 'jetpackme_related_posts_headline' );

/**
 * Custom render function for Infinite Scroll.
 */
function arguments_infinite_scroll_render() {

	while ( have_posts() ) : the_post(); 
		if ( is_search() ) :
			get_template_part( 'partials/list', 'search' );
		elseif ( is_home() ) :
			get_template_part( 'partials/list-compact', get_post_format() );			
		else :
			get_template_part( 'partials/list', get_post_format() );
		endif;
	endwhile;
}
