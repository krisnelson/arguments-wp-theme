<?php
/**
 * Template part for displaying items in a compact way in a listing (within a Loop)
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Arguments
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('list-compact col-xs-12 col-sm-6 col-md-4'); ?> >
	<div style="overflow: hidden;">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'featured-small', array( 'class' => 'featured-small' ) ); ?>
		</a>
	</div>
	<div class="categories sans-serif">
		<?php displayPostCategories($post->ID); ?>  
	</div>
	<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	<!-- <p class="byline">By <a class="" href="<?php //echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php //echo get_the_author(); ?></a></p>-->
	<p class="byline sans-serif"><?php the_date('F Y'); ?></p>
</article><!-- /.col -->