<?php
/**
 * The template for displaying the footer
 *
 * Note potential interaction with "infinite scroll" 
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Arguments
 */

?>
<!-- header-nav.php -->
<style>
	#siteFooter { 
		color: rgba(255, 255, 255, 0.9); 
		background-color: #554a45;
		margin-top: 5rem;
		padding-top: 1.5rem;
		padding-left: 2rem; padding-right: 2rem;
		width: 100%; 
		min-height: 8rem; 
	}

	#siteFooter .menu-footer-container { 
		margin-top: 1rem;
		padding-top: 1rem;
		border-top: 1px solid rgba(255, 255, 255, 0.33);		
	}
	
	ul#menu-footer {
		display: inline-block;
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		text-align: left;
	}
    ul#menu-footer li { 
    	float:left; 
    	margin-left: 0.8rem; 
    	margin-right: 4rem; 
    } 
    ul#menu-footer li a { 
    	padding: .8rem .8rem .8rem .8rem;
    	color: rgba(255, 255, 255, 0.75);  
       	border: 1px solid #554a45;
	    border-radius: .25rem;
    } 
    ul#menu-footer li a:hover { 
    	text-decoration: none;
    	color: #554a45;
    	background-color: rgba(255, 255, 255, 0.75);
    	border: 1px solid #444;
	    border-radius: .25rem;
    }
    
	/* #menu-footer ul > li:hover > ul { display: block; }
	#menu-footer ul > li:active > ul { display: block; } 
	#menu-footer ul > li > ul > li { float:none; }
	#menu-footer ul > li > ul > li > a { text-align: left; } */
    
    
/* 	
<div class="menu-footer-container">
	<ul id="menu-footer" class="menu">
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
    
	#siteFooter h3,
		#siteFooter h3 a {
			color: rgba(255, 255, 255, 0.75);
		}
	#siteFooter h3 a:hover {
		color: rgba(255, 255, 255, 1);
		text-decoration: none;	
	}
	#siteFooter h3 .text-muted-darkbg {
		margin-left: 1rem;
		color: rgba(255, 255, 255, 0.5);
	}

</style>

<footer id="siteFooter">
	<h3>
		<a href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?> </a>
		<small class="text-muted-darkbg"><?php bloginfo('description'); ?></small>
	</h3>

	<?php wp_nav_menu( array( 'theme_location' => 'Footer' ) ); ?>

	<?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
		<style>
			#sidebar-footer { 
				font-size: 90%;
				line-height: 1.1rem;
				margin-top: 6rem;
			}
			#sidebar-footer h3 { font-size: 1rem; }
			#sidebar-footer a { color: rgba(255, 255, 255, 0.5); }
			#sidebar-footer a:hover { color: rgba(255, 255, 255, 1);  } 
			
			#sidebar-footer .widget { 
				display: inline-block; 
				width: 20vw; 
				margin-left: 15px; margin-right: 15px;
				vertical-align: top;
			}
			#sidebar-footer .widget-title { 
				color: rgba(255, 255, 255, 0.75);
				font-size: .85rem;
				letter-spacing: .06rem;
				text-transform: uppercase;
				font-weight: 700;
				padding-bottom: .2rem;
				margin-bottom: 1rem;
				border-bottom: 1px solid rgba(255, 255, 255, 0.2); 
			}
			#sidebar-footer .widget-title a { 		color: rgba(255, 255, 255, 0.75); }
			#sidebar-footer .widget-title a:hover { color: rgba(255, 255, 255, 1);  } 
		</style>
		<div id="sidebar-footer" class="hidden-sm-down" role="complementary">
			<?php dynamic_sidebar( 'sidebar-footer' ); ?>
		</div>
	<?php endif; ?>

	<style>
	#Colophon { 
		margin-top: 5rem; 
		padding-bottom: 2rem; 
		font-size: .7rem; 
		color: rgba(255, 255, 255, 0.66); 
	}
	#Colophon { text-align: center; margin-left: 10vw; margin-right: 10vw;}
	#Colophon h4 { font-size: 1rem; }
	#Colophon a { color: ; color: rgba(255, 255, 255, 0.75); }
	</style>
	<section id="Colophon" role="contentinfo"> 

		<h4>Imprinted in California.</h4>
		
		<p><em>Delivered by</em> <a href="http://cloudflare.com" rel="nofollow">CloudFlare</a>, <a href="http://www.nginx.com" rel="nofollow">NGINX</a>, <a href="http://easyengine.io" rel="nofollow">EasyEngine</a>, and <a href="http://debian.org" rel="nofollow">Debian</a>/<a href="http://www.ubuntu.com" rel="nofollow">Ubuntu</a>.
		<em>Presented via</em> <a href="http://wordpress.org" rel="nofollow">WordPress</a>, <a href="http://php.net" rel="nofollow">PHP7</a>, HTML5, CSS3, SASS, <a href="jquery.com" rel="nofollow">jQuery</a>, a modified <a href="http://getbootstrap.com" rel="nofollow">Bootstrap</a> 4 framework, and a highly customized theme based on <a href="http://underscores.me/" rel="nofollow"><em>_s</em></a>.
		<em>Made possible thanks to</em> open-source technologies, good education, decent medical care,
		post-graduate education, dissertation procrastination, and a brilliant spouse. <em>And</em> kittens. Of course. 

		<p><em>Design and development by</em><br/>
		<a href="https://krisnelson.org">Kristopher A. Nelson</a>,<br/>
		&copy; 2005&ndash;<?php echo date("Y"); ?>.</p>

		<p><em>Remember,</em> I am not your lawyer,<br/>
		this is not legal advice, <br/>
		and I am not offering legal practice services.</p>

	</section>

</footer>
<?php wp_footer(); ?>
</body>
</html>
