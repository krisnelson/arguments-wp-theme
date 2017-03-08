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
	#siteFooter .footer-title { 
		font-size: 1rem;
		color: rgba(255, 255, 255, 0.5); 
		padding-bottom: .5rem; 
		margin-bottom: 1rem;
		font-weight: 300;
	    letter-spacing: 0.08rem;
	}
	#siteFooter .footer-title a { color: rgba(255, 255, 255, 0.5); }
	#siteFooter .footer-title a:hover { color: rgba(255, 255, 255, 1);  } 
	#siteFooter .site-footer { 
		border-top: 1px solid rgba(255, 255, 255, 0.33);
		padding-top: 1rem;
		margin-top: 1rem;
	}
	#siteFooterNav ul.nav-list { text-align: left; }
    #siteFooterNav ul.nav-list li { margin-left: 0.8rem; margin-right: 4rem; } 
    #siteFooterNav ul.nav-list li a { color: rgba(255, 255, 255, 0.75);  } 
    #siteFooterNav ul.nav-list li a:hover { color: rgba(255, 255, 255, 1); }
</style>

<footer id="siteFooter" class="site-navigation navigation" role="navigation">
  	<span class="footer-title">More 
		<a href="<?= esc_url(home_url('/')); ?>">
		  <?php bloginfo( 'name' ); ?>
		</a>
	</span>

	<nav id="siteFooterNav" class="site-footer navigation" role="navigation">
	    <!-- navigation itens -->
	    <ul id="siteFooterPrimaryNavItems" class="nav-list">
	      <li><a href="#topNav">Top</a></li>
	      <li><a href="/about">About</a></li>
	      <li><a href="/contact">Contact</a></li>
	      <li><a href="http://twitter.com/krisnelson">Twitter</a></li>
	      <li><a href="http://github.com/krisnelson">Github</a></li>
	      <li><a href="<?php bloginfo('rss2_url'); ?>">RSS Feed</a></li>
	    </ul>
	</nav>


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
