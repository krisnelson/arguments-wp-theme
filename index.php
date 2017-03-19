<?php
/**
 * The main template file -- in turn calls partials/item... and partials/list... 
 * 
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Arguments
 */

get_header(); ?>
<main id="main" class="site-main container" role="main">
  <div class="row">
	<?php if ( is_active_sidebar( 'sidebar-singular-item' ) or
	 		is_active_sidebar( 'sidebar-list' ) ) : // is there an active sidebar? ?>
	<div id="loop-container" class="col-sm-12 col-md-8">
	<?php else: // no, so make the display the full width ?>
	<div id="loop-container" class="col-sm-12">
	<?php endif; ?>

		<?php
		if ( have_posts() ) :
			/* Start the Loop */

			while ( have_posts() ) : the_post(); 
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called partials/item-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				if( is_singular() ) { get_template_part( 'partials/item', get_post_format() ); }
				else { get_template_part( 'partials/list', get_post_format() ); }			
			endwhile;

			arguments_pagination();

		else :

			get_template_part( 'partials/noresults' );

		endif; 	
		?> 
	</div><!-- /.column -->

	<?php // do we have any active sidebars? ?>
	<?php if ( is_active_sidebar( 'sidebar-singular-item' ) && is_singular() ) : ?>
		<aside class="sidebar sidebar-singular-item hidden-sm-down col-md-4" role="complementary">
			<?php dynamic_sidebar( 'sidebar-singular-item' ); ?>
		</aside>
	<?php elseif ( is_active_sidebar( 'sidebar-list' ) ) : ?>
		<aside class="sidebar sidebar-list hidden-sm-down col-md-4" role="complementary">
			<?php dynamic_sidebar( 'sidebar-list' ); ?>
		</aside>
	<?php endif; ?>

  </div><!-- /.row -->
</main><!-- #main -->

<?php
get_footer();
