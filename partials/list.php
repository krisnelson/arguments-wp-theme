<?php
/**
 * Template part for displaying a summarized item in the context of a list (within a Loop)
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Arguments
 */

?>
<!-- TEMPLATE list.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class('list'); ?> >
	<div class="byline text-right sans-serif"><?php the_date('F Y'); ?></div>
	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>">
			<?php //the_post_thumbnail( 'thumbnail', array('class' => 'thumbnail') ); ?>
			<img 
				src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAX0lEQVQoU52Q0QnAMAhEdQxdw/03SMYwbtFUC6HSliD1x+N4nHjYWptEBLsxM0BVPVygiHyyvXdg5nmBLjCMJ7w8D7rBiMtw1i9wwbFz+n+wdLr0TKmeKNzr2RY+xoATAmFuUbQap5IAAAAASUVORK5CYII="
				data-src="https://images.inpropriapersona.com/h_600/h_180,w_150,q_auto,f_auto,c_thumb,g_auto:faces/<?php the_post_thumbnail_url('full'); ?>"
				class="thumbnail lazyload" 
				height="180" width="150"
				alt=""
				/>

		</a>
	<?php endif; //end has_post_thumbnail ?>
	<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
	<div class="categories sans-serif"><?php echo get_the_category_list( ' &bull; ' ); ?></div>
	<small><?php the_excerpt(); ?></small>
</article><!-- #post-##  -->
