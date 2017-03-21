<?php /* Template Name: Home  */ ?>
<?php
/**
 * Generates a magazine-style layout (INSTEAD of index.php) for a page named "Home"
 *
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-templates/#creating-a-custom-page-template-for-one-specific-page
 *
 * @package Arguments
 */ 
echo "<!-- TEMPLATE: page-home.pp -->";
if( is_paged() ) :
get_template_part('index'); // revert to the standard loop once "pagination" starts

else : // not "paginated," so show the unique "home" page of articles
get_header(); ?>
<!-- TEMPLATE: page-home.php (non-paginated) -->
<style>
#top-article { padding-bottom: 1.5rem; }
#category-articles { margin-top: 3.5rem; }
@media (max-width: 767px) {
	section.articles-by-date { margin-top: 1rem; }
}
@media (min-width: 768px) {
	section.articles-by-date { margin-top: 5rem; }
}
/* #loop-container .compact-articles { margin-top: 2rem; } */

#top-article .top-article-image { overflow: hidden; max-height: 66vh; width:100%;}
h4.highlighted-article-title { font-size: 1.2rem; font-weight: 600;}
#category-articles h4.highlighted-article-title { margin-top: .5rem;}
h4.article-title { font-size: 1rem; font-weight: 600;}
h4.article-title-smaller { font-size: .8rem; padding-top: .8rem ;}

div.highlighted-articles {
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
}

.article-category { 
	color: rgba(85,74,69,.66);
    font-size: 0.6rem;
    letter-spacing: .05rem;
    text-transform: uppercase;
    font-weight: 700;
    margin-top: .5rem;
    margin-bottom: .1rem;
 }
 .article-category a {
 	color: rgba(85,74,69,.66);
 }
 .byline {
    margin-top: -.3rem;
 }
</style>

<main id="main" class="site-main container" role="main">
	<div class="row">
		<div id="main-article-list" class="hidden-sm-down col-sm-12 col-md-9">
			<!-- the listing of articles and similar -->
			<div id="top-row" class="row">
				<!-- ************** -->
			    <section id="top-highlighted-articles" class="col-sm-12 col-md-8"><!-- contains the top & highlighted articles -->
				    <!-- +Top-billed article -->
			    	<div id="top-article" class="row">
						<?php $query = new WP_Query( array(
										'category__not_in' => array(1, 25, 193),
										//'date_query' => array('after' => date('Y-m-d', strtotime('-9 months')) ), 
										//'orderby'    => 'rand',
										'post_type'  => 'post',
										'posts_per_page' => 1
									) );
						while ($query->have_posts()) : $query->the_post();
							if ( has_post_thumbnail() ) : ?>
								<div class="top-article-image" style="width:480px;">
									<a href="<?php the_permalink(); ?>">
										<?php //the_post_thumbnail( 'medium-large', array( 'class' => '' ) ); ?>
										<img 
										src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAX0lEQVQoU52Q0QnAMAhEdQxdw/03SMYwbtFUC6HSliD1x+N4nHjYWptEBLsxM0BVPVygiHyyvXdg5nmBLjCMJ7w8D7rBiMtw1i9wwbFz+n+wdLr0TKmeKNzr2RY+xoATAmFuUbQap5IAAAAASUVORK5CYII="
										data-src="https://res.cloudinary.com/krisnelson/image/fetch/h_800/w_480,c_crop,g_auto:faces/<?php the_post_thumbnail_url('full'); ?>"
										class="lazyload"
										width="480"
										alt=""
										/>										
									</a>
								</div>
							<?php endif; ?>
							<div class="article-category">
								<?php displayPostCategories($post->ID); ?> 
							</div>
							<h4 class="highlighted-article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<p class="byline">By <a class="" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a></p>
						<?php $check_for_duplicate_posts[] = $post->ID;
						 		endwhile; wp_reset_postdata(); // Restore original Post Data ?>
					</div><!-- /.row /#top-article --> 
					<!-- /End of top-billed article -->

					<!-- +Next set of graphically highlighted articles (vertical) -->
					<?php $query = new WP_Query( array(
									'post_type' => 'post',
									'posts_per_page' => 3,
									'post__not_in' => $check_for_duplicate_posts
								) );
					while ($query->have_posts()) : $query->the_post(); ?>
						<div class="row highlighted-articles line-above">
							<?php if ( has_post_thumbnail() ) : // check if the post has a Post Thumbnail assigned to it. ?>
								<div class="col-4 flex-last text-right">
									<a href="<?php the_permalink(); ?>">
										<?php //the_post_thumbnail( 'thumbnail', array( 'class' => 'featured' ) );	?>
										<img 
										src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAX0lEQVQoU52Q0QnAMAhEdQxdw/03SMYwbtFUC6HSliD1x+N4nHjYWptEBLsxM0BVPVygiHyyvXdg5nmBLjCMJ7w8D7rBiMtw1i9wwbFz+n+wdLr0TKmeKNzr2RY+xoATAmFuUbQap5IAAAAASUVORK5CYII="
										data-src="https://res.cloudinary.com/krisnelson/image/fetch/h_125,w_125,c_thumb,g_auto:faces/<?php the_post_thumbnail_url('full'); ?>"
										class="thumbnail lazyload" 
										height="125" width="125"
										alt=""
										/>
									</a>
								</div>
							<?php endif; ?>
							<div class="col-8 flex-first">
								<div class="article-category">
									<?php displayPostCategories($post->ID); ?> 
								</div>
								<h4 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								<!-- <p class="byline">By <a class="" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a></p>-->
								<p class="byline"><?php the_date('F Y'); ?></p>
							</div>
						</div><!-- /.row /.highlighted-articles-->
					<?php $check_for_duplicate_posts[] = $post->ID;
							endwhile; wp_reset_postdata(); // Restore original Post Data ?>
					<!-- End of next set of graphically highlighted articles -->		
				</section><!-- /.col /#top-highlighted-articles -->	

				<!-- +SIDEBAR COLUMN: Magazine Home Thin Widget Area (hidden at smaller sizes) -->
				<?php if ( is_active_sidebar( 'sidebar-home-short' ) ) : ?>
					<aside class="sidebar sidebar-home-short col-md-4 hidden-sm-down" role="complementary">
						<?php dynamic_sidebar( 'sidebar-home-short' ); ?>
					</aside><!-- /col-sm-3 -->
				<?php endif; ?>   
				<!-- /end Magazine Home Thin Widget Area -->
				<!-- ************** -->
			</div><!-- /.row /#top-row -->
			<!-- and a "Read More" link to get more articles -->
			<div class="row">
				<div class="col-6 text-center">
					<a href="#articles-by-date" class="btn btn-sm btn-outline-primary"   
						style="margin-top: 1rem; margin-bottom: 2rem; text-transform: uppercase;  ">All Articles &rsaquo;</a>
				</div>
			</div>




			<!-- ************** -->
			<!-- +Articles by Category, done vertically by categories - hidden on smaller screens --> 
			<section id="category-articles" class="row hidden-sm-down">
			  <div class="col-12"><!-- column that acts as a container for nesting our columne 
			  						   note: we do it this way so the graphical versions at the top 
			  						   stay at the same height regardless of the length of their titles
			  						   and so on -->
			  	<div class="row"><!-- the header row -->
					<div class="col-4"><!-- column 1: law -->
						<a href="/category/law/"><h3 class="section-title">Law &rsaquo;</h3></a>
						<?php $query = new WP_Query( array(
										'post_type' => 'post',
									    'meta_key' => '_thumbnail_id',
										'posts_per_page' => 1,
										'date_query' => array('after' => date('Y-m-d', strtotime('-23 months')) ), 
					                    'category_name' => 'law',
		                                //'tag' => $name,
		                                'orderby' => 'rand',
										'post__not_in' => $check_for_duplicate_posts
									) );
						while ($query->have_posts()) : $query->the_post();
							if ( has_post_thumbnail() ) : ?>
								<div style="overflow: hidden;">
									<a href="<?php the_permalink(); ?>">
										<?php //the_post_thumbnail( 'featured-small', array( 'class' => 'featured-small' ) ); ?>
										<img 
											src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAX0lEQVQoU52Q0QnAMAhEdQxdw/03SMYwbtFUC6HSliD1x+N4nHjYWptEBLsxM0BVPVygiHyyvXdg5nmBLjCMJ7w8D7rBiMtw1i9wwbFz+n+wdLr0TKmeKNzr2RY+xoATAmFuUbQap5IAAAAASUVORK5CYII="
											data-src="https://res.cloudinary.com/krisnelson/image/fetch/h_320,w_{width},c_thumb,g_auto:faces/<?php the_post_thumbnail_url('full'); ?>"
											data-sizes="auto"
											class="lazyload"
											height="320"
											alt="" />										
									</a>
								</div>
							<?php endif; ?>
							<h4 class="highlighted-article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<!-- <p class="byline">By <a class="" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a></p> -->
							<p class="byline"><?php the_date('F Y'); ?></p>
						<?php $check_for_duplicate_posts[] = $post->ID;
						 		endwhile; wp_reset_postdata(); // Restore original Post Data ?>
					</div><!-- /.col -->
					<div class="col-4"><!-- column 2: history -->
						<a href="/category/history/"><h3 class="section-title">History &rsaquo;</h3></a>
						<?php $query = new WP_Query( array(
										'post_type' => 'post',
									    'meta_key' => '_thumbnail_id',
										'posts_per_page' => 1,
										'date_query' => array('after' => date('Y-m-d', strtotime('-23 months')) ), 
					                    'category_name' => 'history',
		                                //'tag' => $name,
		                                'orderby' => 'rand',
										'post__not_in' => $check_for_duplicate_posts
									) );
						while ($query->have_posts()) : $query->the_post();
							if ( has_post_thumbnail() ) : ?>
								<div style="overflow: hidden;">
									<a href="<?php the_permalink(); ?>">
										<?php //the_post_thumbnail( 'featured-small', array( 'class' => 'featured-small' ) ); ?>
										<img 
											src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAX0lEQVQoU52Q0QnAMAhEdQxdw/03SMYwbtFUC6HSliD1x+N4nHjYWptEBLsxM0BVPVygiHyyvXdg5nmBLjCMJ7w8D7rBiMtw1i9wwbFz+n+wdLr0TKmeKNzr2RY+xoATAmFuUbQap5IAAAAASUVORK5CYII="
											data-src="https://res.cloudinary.com/krisnelson/image/fetch/h_320,w_{width},c_thumb,g_auto:faces/<?php the_post_thumbnail_url('full'); ?>"
											data-sizes="auto"
											class="lazyload"
											height="320"
											alt="" />										
									</a>
								</div>
							<?php endif; ?>
							<h4 class="highlighted-article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<!-- <p class="byline">By <a class="" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a></p> -->
							<p class="byline"><?php the_date('F Y'); ?></p>
						<?php $check_for_duplicate_posts[] = $post->ID;
						 		endwhile; wp_reset_postdata(); // Restore original Post Data ?>
					</div><!-- /.col -->
					<div class="col-4"><!-- column 3: technology/science studies -->
						<a href="?s=technology+OR+science+OR+(science+studies)"><h3 class="section-title">Sci+Tech &rsaquo;</h3></a>
						<?php $query = new WP_Query( array(
										'post_type' => 'post',
									    'meta_key' => '_thumbnail_id',
										'posts_per_page' => 1,
										'date_query' => array('after' => date('Y-m-d', strtotime('-23 months')) ), 
					                    'category_name' => 'science studies,science,technology',
		                                //'tag' => $name,
		                                'orderby' => 'rand',
										'post__not_in' => $check_for_duplicate_posts
									) );
						while ($query->have_posts()) : $query->the_post();
							if ( has_post_thumbnail() ) : ?>
								<div style="overflow: hidden;">
									<a href="<?php the_permalink(); ?>">
										<?php //the_post_thumbnail( 'featured-small', array( 'class' => 'featured-small' ) ); ?>
										<img 
											src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAX0lEQVQoU52Q0QnAMAhEdQxdw/03SMYwbtFUC6HSliD1x+N4nHjYWptEBLsxM0BVPVygiHyyvXdg5nmBLjCMJ7w8D7rBiMtw1i9wwbFz+n+wdLr0TKmeKNzr2RY+xoATAmFuUbQap5IAAAAASUVORK5CYII="
											data-src="https://res.cloudinary.com/krisnelson/image/fetch/h_320,w_{width},c_thumb,g_auto:faces/<?php the_post_thumbnail_url('full'); ?>"
											data-sizes="auto"
											class="lazyload"
											height="320"
											alt="" />										
									</a>
								</div>
							<?php endif; ?>
							<h4 class="highlighted-article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<!-- <p class="byline">By <a class="" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a></p> -->
							<p class="byline"><?php the_date('F Y'); ?></p>
						<?php $check_for_duplicate_posts[] = $post->ID;
						 		endwhile; wp_reset_postdata(); // Restore original Post Data ?>
					</div><!-- /.col -->
				</div><!-- /.row (header row) -->
				<div class="row"><!-- list of articles under each header -->
					<div class="col-4"><?php displayPostsBy('category', 'law', 3); ?></div>
					<div class="col-4"><?php displayPostsBy('category', 'history', 3); ?></div>
					<div class="col-4"><?php displayPostsBy('category', 'science,science studies,technology', 3); ?></div>
				</div>
				<div class="row">
					<div class="col-4 text-right"><a href="/category/law/" class="btn btn-sm btn-outline-primary">Law &rsaquo;</a></div>
					<div class="col-4 text-right"><a href="/category/history/" class="btn btn-sm btn-outline-primary">History &rsaquo;</a></div>
					<div class="col-4 text-right"><a href="?s=technology+OR+science+OR+(science+studies)" class="btn btn-sm btn-outline-primary">Sci+Tech &rsaquo;</a></div>
				</div>
			  </div><!-- /.col-12 / end of the "container" column -->
			</section><!-- /.row -->

		</div><!-- /.col /#main-article-list / END of article listings -->
		<!-- tall sidebar on the home page -->
		<aside class="sidebar sidebar-home-tall hidden-sm-down col-md-3" role="complementary"> 
			<?php if ( is_active_sidebar( 'sidebar-home-tall' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-home-tall' ); ?>
			<?php endif; ?>
		</aside><!-- /tall sidebar on the home page /.col -->
	</div> <!-- /class="row" -->

	<!-- The Loop: MORE ARTICLES STRETCHING ACROSS THE WHOLE SCREEN -->
	<section id="loop-container" class="articles-by-date row">
		<div id="articles-by-date" class="hidden-sm-down col-12">
			<h3 class="section-title">Articles by Date</h3>
		</div>
		<div id="articles-by-date" class="hidden-md-up col-12">
			<?php if ( get_bloginfo('description') ): ?>
				<h3 class="section-title">
					<?php bloginfo('description'); // only front page ?>
				</h3>
			<?php endif; ?>	
		</div>
		<!-- ************** -->
		<!-- +More Articles --> 
		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) : the_post(); 
				get_template_part( 'partials/list-compact');
			endwhile;

			arguments_pagination();

		endif; 	
		?> 
	</section><!-- /.row /#loop-container /.articles-by-date  -->

	<!-- <section id="list-compact-max" class="compact-max-articles row"> -->
		<!-- ************** -->
		<!-- +Show all posts, taking advantage of the possibilities of infinite scroll, etc. -->

		<?php
		//if ( have_posts() ) :
		//	/* Start the Loop */
		//	while ( have_posts() ) : the_post(); 
		//		get_template_part( 'partials/list-compact');
		//	endwhile;

		//	the_posts_navigation();

		//endif; 	
		?> 

		<?php 
		// Pagination for a static home page like this: // see http://wordpress.stackexchange.com/questions/120407/how-to-fix-pagination-for-custom-loops/120408#120408 
		//$query = new WP_Query( array(
		//				'post_type' => 'post',
		//				'posts_per_page' => 6, 
		//				'post__not_in' => $check_for_duplicate_posts,
		//				'page' => get_query_var( 'page' ) ? get_query_var( 'page' ) : '1', 
		//			) );
		// Pagination fix
		//$temp_query = $wp_query;
		//$wp_query   = NULL;
		//$wp_query   = $query;
		//if( $query->have_posts() ) :
		//	while ($query->have_posts()) : $query->the_post(); 
		//		get_template_part( 'partials/list-compact', get_post_format() );
		//		$check_for_duplicate_posts[] = $post->ID;
		//	endwhile; 
		//endif;

		// Reset postdata
		//wp_reset_postdata();

		// Add pagination
		//the_posts_navigation();

		// Reset main query object
		//$wp_query = NULL;
		//$wp_query = $temp_query; ?>
	<!--</section>--><!-- /.row /#loop-container /.compact-articles -->
	<!-- and a "Read More" link to get more articles -->
	<!-- <div class="row">
		<div class="col text-right">
			<a href="/articles/" class="btn btn-sm btn-outline-primary"   
				style="margin-top: 1rem; margin-bottom: 2rem; text-transform: uppercase;  ">All Articles &rsaquo;</a>
		</div>
	</div> -->


</main>

<?php
get_footer();
endif; // end of pagination check


/////////////////////////////////////////////////////
function displayPostsBy($type, $name, $num_results) {
      if (strpos($type, 'cat') !== false)
      {
        // "cat" or "category" both OK
        $args = array(
            'orderby' => 'rand',
            'post_type' => 'post',
            'category_name' => $name,
			'category__not_in' => array(1, 25, 193),
            'posts_per_page' => $num_results 

        );
      }
      else {
        $args = array(
            'orderby' => 'rand',
            'post_type' => 'post',
            'tag' => $name,
			'category__not_in' => array(1, 25, 193),
            'posts_per_page' => $num_results 
        );                
      }
      $query = new WP_Query( $args );
      // Check that we have query results.
      if ( $query->have_posts() ) {
          // Start looping over the query results.
          while ( $query->have_posts() ) {
              $query->the_post();
              // Contents of the queried post results go here.
              echo '<h4 class="article-title-smaller line-above"><a href="' . get_the_permalink() .'" rel="bookmark">' 
                . get_the_title() .'</></h4>';
              echo 	'<p class="byline">'. get_the_date('F Y') . '</p>';

          }
      }
      // Restore original post data.
      wp_reset_postdata();
} 

// consider doing this: http://stackoverflow.com/questions/9910791/how-to-query-the-number-of-view-counts-for-a-post-in-wordpress-jetpack
