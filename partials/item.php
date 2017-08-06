<?php
/**
 * Template part for displaying singular items (within a Loop)
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Arguments
 */
?>

<!-- TEMPLATE item.php -->
<style>
	article { 
		hyphens: auto;
		margin-top: 2rem;
		padding-right: 1rem;
	}
	aside .widget { opacity: 0.5; transition-timing-function: ease-in-out;}
	aside .widget:hover { opacity: 0.9; transition-timing-function: ease-in-out; }
</style>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'arguments' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			//if ( is_page() ) { echo get_the_content(); }
			//if ( is_page() ) { 
			//	global $wp_filter; 
			//	echo "<pre>"; print_r($wp_filter['the_content'], false); echo "</pre>";
			//}
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'arguments' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php arguments_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-##  -->
