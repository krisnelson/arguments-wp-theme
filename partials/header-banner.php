<style>
	#banner { 
		padding-top: 3.5rem;
		margin-bottom: 1.5rem;
	}
	#banner .logo { margin-right: 2rem; margin-bottom: 2rem; }
	/* **** */
	#banner .site-title,
		#banner .page-title { margin-top: -.2rem; }
	#banner .site-title h1,
		#banner .page-title h2 { padding-bottom: .5rem; border-bottom: 3px solid rgba(85, 74, 69, 0.2); }

	#banner .display-strong-title {
		font-weight: 700;
		font-size: 2.5rem;
		letter-spacing: 0.015rem;
		line-height: 1.10;
	}	
	#banner .subtitle {
		color: rgba(85,74,69,.9);
		margin-top: 1rem;
	    margin-left: 10%;
	    text-align: left;
	    font-size: 1.33rem;
	    font-weight: 300;
	    letter-spacing: 0.015rem;
	}
	/* **** */
	#banner .single-title { margin-top: -1.5rem; }

	#banner time.byline {
		margin-bottom: -0.5rem;
		text-transform: uppercase;
	}
	#banner a.byline {
		font-size: 1rem;
		float: right;
		font-style: italic;
	}
</style>

<header id="banner" class="hidden-sm-down" role="banner">
 <div class="container">
  <div class="row">	
	<div id="header-logo" class="logo col-sm-12 col-md-2">
		<?php 
		if ( has_site_icon() ) :
			//if (class_exists('Jetpack_Photon') ) { $photon_removed = remove_filter( 'image_downsize', array( Jetpack_Photon::instance(), 'filter_image_downsize' ) ); } 
		?>
			<a href="<?= esc_url(home_url('/')); ?>"><img height="150" width="150" src="https://images.inpropriapersona.com/h_150,w_150,q_auto,f_auto/<?php site_icon_url() ?>" 
				alt="<?php bloginfo('name'); ?>" /></a>
		<?php
			//if ( $photon_removed ) { add_filter( 'image_downsize', array( Jetpack_Photon::instance(), 'filter_image_downsize' ), 10, 3 ); }
		endif; // end has_site_icon() ?>
	</div><!-- /#header-logo -->
	<div id="header-title" class="col-sm-12 col-md-8">
		<?php if( is_single() ): // single posts only ?>
			<div class="single-title">
				<time class="byline updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time>
				<?php the_title('<h2 class="display-strong-title">', '</h2>'); // so just show the title ?>
				<a class="byline" href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author">
					by <?= get_the_author(); ?></a>
			</div><!-- /.single-title -->
		<?php elseif( is_page() && !is_front_page() ): // pages only ?>
			<div class="page-title">
				<?php the_title('<h2 class="display-strong-title">', '</h2>'); ?>
				<p class="subtitle serif"><?php bloginfo('name'); ?></p>
		<?php else: // home page, search, etc. ?>
			<div class="site-title">
				<h1 class="h1 display-strong-title">
					<a class="h1 display-strong-title" href="<?= esc_url(home_url('/')); ?>">
						<?php bloginfo('name'); // the text name of the site ?>
					</a>
				</h1>
				<?php if( is_front_page() && get_bloginfo('description') ): ?>
					<p class="subtitle serif"><?php bloginfo('description'); // only front page ?></p>
				<?php else: ?>
					<h2 class="subtitle serif"><?php echo wp_get_document_title(); ?></h2>
				<?php endif; // end is_front_page()/!is_front_page/description ?>
			</div><!-- /.site-title -->
		<?php endif; // end is_single()/else ?>
	</div><!-- /#header-title -->

  </div><!-- /.row -->
 </div><!-- /.container -->
</header>
