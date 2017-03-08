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
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail', array('class' => 'thumbnail') ); ?></a>
	<?php endif; //end has_post_thumbnail ?>
	<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
	<div class="categories sans-serif"><?php echo get_the_category_list( ' &bull; ' ); ?></div>
	<small><?php the_excerpt(); ?></small>
</article><!-- #post-##  -->
