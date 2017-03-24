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
	<div style="overflow:hidden;">
		<a href="<?php the_permalink(); ?>">
			<?php //the_post_thumbnail( 'featured-small', array( 'class' => 'featured-small' ) );
			 ?>
			<img	
				src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAX0lEQVQoU52Q0QnAMAhEdQxdw/03SMYwbtFUC6HSliD1x+N4nHjYWptEBLsxM0BVPVygiHyyvXdg5nmBLjCMJ7w8D7rBiMtw1i9wwbFz+n+wdLr0TKmeKNzr2RY+xoATAmFuUbQap5IAAAAASUVORK5CYII="
				data-src="https://images.inpropriapersona.com/h_500/h_220,w_320,q_auto,f_auto,c_thumb,g_auto:faces/<?php the_post_thumbnail_url('full'); ?>"
				class="lazyload"
				height="220"
				alt="" />										
			
		</a>
	</div>
	<div class="categories sans-serif">
		<?php displayPostCategories($post->ID); ?>  
	</div>
	<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	<!-- <p class="byline">By <a class="" href="<?php //echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php //echo get_the_author(); ?></a></p>-->
	<p class="byline sans-serif"><?php the_date('F Y'); ?>
		&bull; 
		<?php  $content = strip_tags( get_the_content('', true) );
			echo getEstimatedReadingTime( $content ); ?> min read	
	</p>
</article><!-- /.col -->