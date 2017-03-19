<!-- header-nav.php -->
<style>  

	#searchForm {
		display: none;
		z-index: 99999;
		position: absolute;
		top: 6rem;
		right: 15px;
		background-color: #fff;
		padding: 5px 5px 5px 5px;
		transition: height 4s ease;
		border:1px solid #554A45;
		border-radius: 5px;
		box-shadow: rgba(0,0,0,.2) 2px 2px 2px;
	}


	nav.navbar { margin: auto; width 100%; }
	nav.navbar .nav-title { 
		display: block;
		} 

	nav.navbar > div { display: inline-block; } 
	nav.navbar ul {
		display: inline-block;
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #fff;
	}

	nav.navbar li { float: left; }
	nav.navbar li a {
		display:block;
		color: #733e26;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}
	nav.navbar li a:hover:not(.active) { background-color: rgba(85, 74, 69, 0.2); }
	nav.navbar .active { background-color: #4CAF50; }

	nav.navbar ul > li > ul {
		display: none;
		position: absolute;
		background-color: #f9f9f9;
		min-width: 160px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		padding: 12px 16px;
		z-index: 1;	
	}
	nav.navbar ul > li:hover > ul { display: block; }
	nav.navbar ul > li:active > ul { display: block; } 
	nav.navbar ul > li > ul > li { float:none; }
	nav.navbar ul > li > ul > li > a { text-align: left; }
	
/* 	
<div class="menu-primary-container">
	<ul id="menu-primary" class="menu">
		<li id="menu-item-7378" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7378"><a href="http://ipp.chid.org/home/">Home</a></li>
		<li id="menu-item-7380" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7380"><a href="http://ipp.chid.org/about/">About</a></li>
		<li id="menu-item-7379" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7379"><a href="http://ipp.chid.org/contact/">Contact</a></li>
		<li id="menu-item-7392" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-7392"><a href="#">Topics</a>
			<ul class="sub-menu">
				<li id="menu-item-7383" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-7383"><a href="http://ipp.chid.org/category/history/">History</a></li>
				<li id="menu-item-7381" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-7381"><a href="http://ipp.chid.org/category/law/">Law</a></li>
				<li id="menu-item-7382" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-7382"><a href="http://ipp.chid.org/category/technology/">Technology</a></li>
			</ul>
		</li>
	</ul>
</div> 
*/
/*	.float-center-container,
		.menu-primary-container {
		float: right;
		position: relative;
		left: -50%; /* or right 50% */
/*		text-align: left;
	}
	
	.float_center > .child,
		.menu-primary-container > .menu {
		position: relative;
		left: 50%;
	}
*/
	
</style>
<nav id="topNav" class="navbar">
	<!-- title/branding -->
	<div class="nav-title">
		  <a href="<?= esc_url(home_url('/')); ?>" >
		  <?php 
			if ( has_site_icon() ) :
				//if (class_exists('Jetpack_Photon') ) { $photon_removed = remove_filter( 'image_downsize', array( Jetpack_Photon::instance(), 'filter_image_downsize' ) ); } ?>
					  <img class="site-icon-small" height="30" width="30" src="<?php site_icon_url('30') ?>" 
							alt="<?php bloginfo('name'); ?>" style="display:inline-block;" /><?php
				//if ( $photon_removed ) { add_filter( 'image_downsize', array( Jetpack_Photon::instance(), 'filter_image_downsize' ), 10, 3 ); }
			endif; // end has_site_icon() ?>
			&nbsp;<?php bloginfo( 'name' ); ?>
		  </a>
	</div>

	<!-- <ul class="nav-hide">
		<li><a href="#">Menu</a> -->
			<?php wp_nav_menu( array( 'theme_location' => 'Primary' ) ); ?>
<!--		</li>
	</ul> -->

</nav>


