<!-- featured image -->
<style>
	/* smaller screens */
	@media (max-width: 767px) {
		/* dimensions for the image (container)  */
		#header-featured-image {
			width: 100%;
			overflow-x: hidden;
			background-repeat: no-repeat;
			background-position: 40% 28%;
			background-size: cover;
			height: 150px;
			margin-bottom: 2rem;
		}
	}
	/* larger screens */
	@media (min-width: 768px) {
		/* dimensions for the image (container)  */
		#header-featured-image {
			width: 100%;
			overflow-x: hidden;
			background-repeat: no-repeat;
			background-position: 40% 28%;
			background-size: cover;
			height: 408px;
			margin-bottom: 3rem;
		}
	}
	<?php // establish the background urls to stick into our media queries 
	// sizes of images we're using: 1800w, 1200w, 800w, 500w	
	// aka featured-small, -medium, -large, -giant and thumbnail (150x150)
	// use the featured/thumbnail if available 
	// .... and yes, this does seem overly complicated!
	$thumb_id = ''; $thumbnail = ''; $small = ''; $medium = ''; $large = ''; $giant = '';
	if ( has_post_thumbnail( get_the_ID() ) ) { 
		$post_id = get_the_ID(); 
		$thumb_id = get_post_thumbnail_id($post_id); 
	}
	// Now get the URLs
	if ( $thumb_id ) { 
			$thumbsrc=wp_get_attachment_image_src($thumb_id, 'featured-giant', true);
			$giant=$thumbsrc[0];
			$thumbsrc=wp_get_attachment_image_src($thumb_id, 'featured-large', true);
			$large=$thumbsrc[0];
			$thumbsrc=wp_get_attachment_image_src($thumb_id, 'featured-medium', true);
			$medium=$thumbsrc[0];
			$thumbsrc=wp_get_attachment_image_src($thumb_id, 'featured-small', true);
			$small=$thumbsrc[0];
			$thumbsrc=wp_get_attachment_image_src($thumb_id, 'thumbnail'); // default WP thumbnail
			$thumbnail=$thumbsrc[0];
	}	
	/* oddly, since get_post_thumbnail_id returns TRUE for some kinds of
	   pages (like category listings? maybe others) we have to throw it away in
		 those cases regardless of the above (thus no elseif here)--not sure about 404... */
	if( is_404() ) {
		$thumbnail = "https://c2.staticflickr.com/4/3190/2959326615_d7ae66b193_q.jpg"; 
		$small = 'https://c2.staticflickr.com/4/3190/2959326615_d7ae66b193.jpg'; 
		$medium = 'https://c2.staticflickr.com/4/3190/2959326615_2d82eac8e7_o.jpg'; 
		$large = ''; 
		$giant = '';
	}
	// end of has_post_thumbnail() ?>

	<?php // build our media queries OR hide the space if no thumbnail/featured image ?>
	<?php if( !$thumbnail ): ?>	
		#header-featured-image { /* height: 0; */ display: none; }
	<?php endif; ?> 
	<?php if ($thumbnail): $featured_url=$thumbnail; // WP default "thumbnail" size  ?> 
		#header-featured-image {
			background-image: linear-gradient(rgba(57, 47, 41, 0.33), rgba(57, 47, 41, 0.33)), url('<?php echo $featured_url; ?>');
		}	
	<?php endif; ?>
	<?php if ($small): $featured_url=$small; ?> 
		@media (min-width: 500px) {
			#header-featured-image {
				background-image: linear-gradient(rgba(57, 47, 41, 0.33), rgba(57, 47, 41, 0.33)), url('<?php echo $featured_url; ?>');
			}
		}
	<?php endif; ?> 
	<?php if ($medium): $featured_url=$medium; ?> 
		@media (min-width: 800px) {
			#header-featured-image {
				background-image: linear-gradient(rgba(57, 47, 41, 0.33), rgba(57, 47, 41, 0.33)), url('<?php echo $featured_url; ?>');
			}
		}
	<?php endif; ?> 
	<?php if ($large): $featured_url=$large;?> 
		@media (min-width: 1200px) {
			#header-featured-image {
				background-image: linear-gradient(rgba(57, 47, 41, 0.33), rgba(57, 47, 41, 0.33)), url('<?php echo $featured_url; ?>');
			}
		}	
	<?php endif; ?> 
	<?php if ($giant): $featured_url=$giant; ?> 
		@media (min-width: 1800px) {
			#header-featured-image {
				background-image: linear-gradient(rgba(57, 47, 41, 0.33), rgba(57, 47, 41, 0.33)), url('<?php echo $featured_url; ?>');
			}
		}	
	<?php endif; ?>
</style>
<section id="header-featured-image"><?php // this is an empty div filled with a background image if available ?>
	<?php // if we have a caption (attribution), display it
	if( isset($featured_url) ) {
		if( preg_match("/unsplash/", $featured_url) ) { // if it's from Unsplash, add that
			$featured_caption = 'Photo via <a href="https://unsplash.com">Unsplash</a>.'; 
		}
		else { $featured_caption = get_post(get_post_thumbnail_id())->post_excerpt; }
	}
	// if available, caption/attribution for featured images 
	if(isset($featured_caption) and !empty($featured_caption)) :  ?>
		<style>
			figure.featured-image-caption-wrapper {
				top: 0;
				text-align: right;
				margin-right: 2em;
			}
			figure.featured-image-caption-wrapper figcaption span {
				font-size: 0.6em;
				font-style: italic;
				background-color: rgba(0, 0, 0, 0.15);
				padding: 3px 3px 3px 3px;
				color: #ddd;
			}
			figure.featured-image-caption-wrapper figcaption span a {
				color: #ddd;
			}
		</style>
		<figure class="featured-image-caption-wrapper">
			<?php // the img tag is really just referring to the 
						// background image... but we want this semantic,
						// right? And good for screen readers? ?>
			<?php //<img style="display:none;" 
					 //src="<?php echo $featured_url; ? />" 
					 // data-adaptive-background>  ?>
			<img src="" alt="" style="display:none;" />
				<figcaption>
					<span class="featured-image-caption"><?php echo $featured_caption; ?></span>
				</figcaption>
		</figure>
	<?php endif; // end check for post_thumbnail caption or unsplash ?>
</section><!-- / #header-featured-image -->