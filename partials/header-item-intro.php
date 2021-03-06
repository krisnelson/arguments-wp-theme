<!-- "intro" material that follows the image -->
<?php
// we only show the "lead in" paragraph if it is substantially different
// from the post excerpt
function fixTextForComparison ($stringToFix)
{
	$str = $stringToFix;
	$str = strtolower($str);
	$str = strip_tags($str, '<a>');
	$str = preg_replace('/<a href=\"(.*?)\">(.*?)<\/a>/', "\\2", $str);
	$str = preg_replace("/[^a-z 0-9]+/", " ", $str);	
	return $str;
}

// We need to be careful to distinguish custom excerpts from automatic ones... b/c
// we don't want to use automatic ones as a lead in! I think this is simple enough
// if we compare the number of characters returned by get_the_excerpt() with the same
// first number of characters returned by get_the_content()--at least, after we strip everything
// out and back to the basics...
$theExcerpt = get_the_excerpt();
$theExcerpt = fixTextForComparison( $theExcerpt );
$theExcerptLength = strlen( $theExcerpt );

// now get the same number of characters from the content to compare
$theContentFirstPart = wpautop( get_the_content() );
$theContentFirstPart = substr( $theContentFirstPart, 0, $theExcerptLength );
$theContentFirstPart = fixTextForComparison( $theContentFirstPart );

//$str = wpautop( get_the_content() );
//$str = substr( $str, 0, strpos( $str, '</p>' ) + 4 );
//$firstPara = fixExcerptForComparison( $str );

// calculate similarity and save as "$similarPct"
similar_text($theContentFirstPart, $theExcerpt, $similarPct);
$show_excerpt = false; 
if ( $similarPct < 66) { $show_excerpt = true; }
// and check if there's a post thumbnail/featured image
$show_featured = has_post_thumbnail( get_the_ID() );
?>


<style>
	/* #intro { margin-bottom: -2em; }
	#intro-byline { 
	    margin-top: -0.5rem;
		margin-bottom: 2rem;
		padding-bottom: 2rem;
		border-bottom: 1px solid rgba(85, 74, 69, 0.2);
	} */
	section#intro { 
		margin-bottom: 0;
		padding-bottom: 2rem;
		border-bottom: 1px solid rgba(85, 74, 69, 0.2);
	}
	section#intro #intro-byline { margin-top: -0.5rem; }
</style>

<section id="intro" class="container">
  <div class="row">
	<div class="col-12">
		<?php if ( $show_featured ) : // only show the title if there's a featured image above ?>
			<p class="h2"><?php the_title(); ?></p>
		<?php endif; ?>

		<?php // only show the intro paragraph if it isn't too similar to the first paragraph of the article ?>
		<?php if ( $show_excerpt ) : ?>
			<p class="lead">
				<?php echo wptexturize( strip_tags( get_the_excerpt(), '<a><strong><em>') ); ?>
			</p>
		<?php endif; ?>
	</div><!-- /.col -->
  </div><!-- /.row -->
  
  <?php if ( $show_featured and $show_excerpt ) : ?>
	  <div id="intro-byline" class="row">
		<div class="byline sans-serif col-12">
			<em>By</em> <a class="text-uppercase" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a> 
			<em>in</em>
			<time class="date text-uppercase"><?php the_date('F Y'); ?></time>
				&bull; 
				<?php  $content = strip_tags( get_the_content('', true) );
				echo getEstimatedReadingTime( $content ); ?> min read
			</div>
	  </div><!-- /.row -->
  <?php endif; ?>
</section>


