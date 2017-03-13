<?php
/**
 * The header for our theme: called as get_header()
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Arguments
 */

// get post info earlier than the loop if this is a singular() page 
if( is_singular() ) {
	if ( have_posts() ) {
	    while ( have_posts() ) {
	        the_post();
	    }
	}
}
// note: need to call wp_reset_query(); at the bottom of this file
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<!-- customized and stripped-down Bootstrap 4 framework -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/bootstrap-4.0.0-alpha.6/dist/css/bootstrap.min.css?v=8'; ?>">

<?php wp_head(); ?>

<style>
	/**** **
		* Elements:
		* make global changes to HTML elements
		*/
	/* make <blockquote> fit in better */
	blockquote {
		margin-left: 1.5rem;
		margin-right: 0.5rem;
		font-size: 90%; 
	}
	/**** **
		* Global utilities:
		* extra classes for adding stuff
		*/
	/* allow for inclusion of SVG icons */
	.icon {
	  display: inline-block;
	  width: 1rem;
	  height: 1rem;
	  stroke-width: 0;
	  stroke: currentColor;
	  fill: currentColor;
	}
	/* allow for a quick line above or below something */
	.line-above { border-top: 1px solid rgba(85, 74, 69, 0.2); }
	.line-below { border-bottom: 1px solid rgba(85, 74, 69, 0.2); }
	/* "byline" is also used for date elements in article and article listings */
	.byline,
		.byline a {
		color: rgba(85,74,69,.66);
	    font-size: 0.6rem;
	    letter-spacing: .02rem;
	    font-weight: 500;
	 }
	.rotate-90 { transform: rotate(90deg); }
	.display-none { display:none; }
	.alignright { float: right; }
	.alignleft { float: left; }
	/**** **
		* Articles:
		* Global changes to anything under the <article> element
		*/
	/* make the article font size a big bigger of smaller screens */
	@media (max-width: 575px) {
	  article {
	  	font-size: 1.6rem;
	  }
	}
	@media (max-width: 767px) {
	  article {
	  	font-size: 1.3rem;
	  }
	}
 	/* classes for lists and compact lists of articles */
	article.list {
		hyphens: auto;
		margin-top: 3rem;
		margin-bottom: 2rem;
	}
	article.list-compact {
		margin-bottom: 2rem;
	}
	article.list-compact h4 { font-size: 1rem; font-weight: 600;}
	article.list-compact-max h4 { font-size: .8rem; padding-top: .8rem ;}
	article.list img.thumbnail {
		float: left;
		margin-top: 0.2rem;
		margin-bottom: 0.2rem;
		margin-left: 0;
		margin-right: 0.8rem;
	}
	article.list .categories,
		article.list-compact .categories { 
		color: rgba(85,74,69,.66);
	    font-size: 0.6rem;
	    letter-spacing: .05rem;
	    text-transform: uppercase;
	    font-weight: 700;
	    margin-top: .5rem;
	    margin-bottom: .1rem;
 	}
	article.list .categories a,
		article.list-compact .categories a {
		color: rgba(85,74,69,.66);
	}
	article.list .byline {
		color: rgba(85,74,69,.66);
		font-size: 0.6rem;
		letter-spacing: .04rem;
		font-weight: 300;
		margin-top: -.3rem;
		padding-right: 2rem;
	}
	article.list-compact-max .byline {
		color: rgba(85,74,69,.66);
	    font-size: 0.6rem;
	    letter-spacing: .04rem;
	    font-weight: 300;
	    margin-top: -.3rem;
	 }
	article.list .categories { opacity: .66; }
	article.list .categories:hover { opacity: 1; }
	/**** **
		* Sidebar:
		* classes for various sidebars (.sidebar, .sidebar-list, etc.)
		*/
	aside.sidebar p,
		aside.sidebar p,
		aside.sidebar h5,
		aside.sidebar li { 
		font-size: 0.9rem;
		line-height: 1.1rem;
		font-weight: 300;
	}
	aside.sidebar ul { list-style: none; margin: 0; padding: 0;} 
	aside.sidebar ul li { padding: 5px 0; }	
	aside.sidebar-singular-item,
		aside.sidebar-list { 
		margin-top: 2.45rem; 
		padding-left: 1rem;
		border-left: 1px solid rgba(85, 74, 69, 0.2);
	}
	/*
	aside.sidebar-list ul li { border-bottom: 1px solid rgba(85, 74, 69, 0.2); padding-bottom: .5rem; margin-bottom: .5rem; }
	aside.sidebar-list ul li:last-child { border-bottom: none; padding-top: 0; margin-top: 0; }
	*/
	/**** **
		* Widgets:
		* classes for various sidebars (.sidebar, .sidebar-list, etc.)
		*/
	/* classes for widgets (usually in sidebars, but not necessarily) */	
	aside .widget { margin-bottom: 2rem; }
	aside .widget-title,
		.section-title {
		color: rgba(85,74,69,.66);
		font-size: .85rem;
		letter-spacing: .06rem;
		text-transform: uppercase;
		font-weight: 700;
		padding-bottom: .2rem;
 		border-bottom: 1px solid rgba(85, 74, 69, 0.2);  
 	}
 	aside .widget-title a,
 		.section-title a { color: rgba(85,74,69,.66); }
	/**** **
		* For "infinite scroll":
		* default "post navigation" WP adds uses the following (Bootstrap uses .sr-only)
		*/
	.screen-reader-text {
		position: absolute;
		width: 1px;
		height: 1px;
		padding: 0;
		margin: -1px;
		overflow: hidden;
		clip: rect(0, 0, 0, 0);
		border: 0;
	}
	/* handles navigation links and site footer, including when infinite scroll is active */

	nav.posts-navigation .nav-links div  { display: inline-block; margin-right: 2em;} 
	nav.posts-navigation .nav-links div a { 
		font-size: 1.1rem; 
		background-color: #554a45; 
		padding: .25rem .5rem;
		border: 1px solid #554a45;
		border-radius: .25rem;
	}
	nav.posts-navigation .nav-links div a { color: #fff; }
	nav.posts-navigation .nav-links div a:hover { background-color: transparent; }
	nav.posts-navigation .nav-links div a:hover { color: #554a45; }
	nav.posts-navigation .nav-links .nav-previous a:before {
		content: "< ";
	}
	nav.posts-navigation .nav-links .nav-next a:after {
		content: " >";
	}

	/* infinite scroll replaces the above */
	#infinite-handle span:hover { color: #554a45; background-color: transparent; }
	.infinite-scroll .posts-navigation,
	.infinite-scroll.neverending #footer { display: none; }
	/* shows the footer again in case all posts have been loaded */
	.infinity-end.neverending #footer { display: block; }
	#infinite-handle { margin-left: 33vw; }
	#infinite-handle span { 
		font-size: 1.4rem; 
		background-color: #554a45; 
		padding: 1rem 1.5rem;
		border: 1px solid #554a45;
		border-radius: .25rem;
	}
	#infinite-handle span:hover { color: #554a45; background-color: transparent; }
	/**** **
		* Navigation:
		* a very simple system for horizontal navigation
		*  - inspired roughly by: http://css-snippets.com/simple-horizontal-navigation/
		*  - colors, etc. should then be adjusted for the specific nav area
		*  - by default, the nav ends up stacked vertically on smaller screens
		*  - media queries, etc. can be used to put in a menu bar button and hide the nav instead
		*/	
	.navigation span.nav-title { 
      font-size: 1.1rem;
      font-weight: 600;
      letter-spacing: 0.015rem;
    }
    .navigation ul.nav-list {
      list-style: none;
      text-align: center;
      padding: 0;
      margin: 0;
    }
    .navigation ul.nav-list li {
      display: inline-block;
      margin-left: 0.8rem;
      margin-right: 0.8rem;
    } 
    .navigation ul.nav-list li a { display: block; color: #554a45; text-decoration: none;} 
    .navigation ul.nav-list li a:hover { color: #733e26; text-decoration: underline;}     
    /* toggler icon (heaven trigram) */
    .nav-toggler { display: inline-block; color: #554a45;}
    .nav-toggler-icon:before { content:'\2630'; }

    /* customize these colors as necessary for specific nav area */
    .navigation span.nav-title { display: inline-block; font-size: 1.1rem; letter-spacing: 0.015rem; font-weight: 600; }
    .navigation span.nav-title a { color: #554a45; }
    .navigation span.nav-title a:hover { color: #733e26; }

	/* see also additions */
	div.ijrp { width: 100%; margin-left: -.5rem; margin-right:-.5rem; }
	div.ijrp a.ijrp-link {
		display: block;
		font-size: .8rem;
		color: rgba(85,74,69,1);
		background-color: rgba(85,74,69,.2);
		margin-top: 1.3rem;
		margin-bottom: 1.3rem;
		padding-top: .5rem;
		padding-bottom: .5rem;
		padding-left: .5rem;
		padding-right: .5rem;
		border: 1px solid rgba(85,74,69,.2);
		border-left: .5rem solid rgba(139,0,0,1);
	}
	div.ijrp a.ijrp-link:hover {
		text-decoration: none;
		color: rgba(255,255,255,1);
		background-color: rgba(139,0,0,1);
		border: 1px solid rgba(139,0,0,1);	
		border-left: .5rem solid rgba(139,0,0,1);
	}
	div.ijrp a.ijrp-link span.ijrp-first:before {
		font-style: italic;
		color: rgba(85,74,69,.75);
		font-weight: 700;
		content: 'See also:  ';
	}
	div.ijrp a.ijrp-link:hover span.ijrp-first:before {
		color: rgba(255,255,255,.75);
	}

</style>

</head>


<body <?php body_class(); ?>>
<!-- SVG icons -->
<svg style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
<symbol id="icon-search" viewBox="0 0 26 28">
<title>search</title>
<path d="M18 13c0-3.859-3.141-7-7-7s-7 3.141-7 7 3.141 7 7 7 7-3.141 7-7zM26 26c0 1.094-0.906 2-2 2-0.531 0-1.047-0.219-1.406-0.594l-5.359-5.344c-1.828 1.266-4.016 1.937-6.234 1.937-6.078 0-11-4.922-11-11s4.922-11 11-11 11 4.922 11 11c0 2.219-0.672 4.406-1.937 6.234l5.359 5.359c0.359 0.359 0.578 0.875 0.578 1.406z"></path>
</symbol>
<symbol id="icon-envelope-o" viewBox="0 0 28 28">
<title>envelope-o</title>
<path d="M26 23.5v-12c-0.328 0.375-0.688 0.719-1.078 1.031-2.234 1.719-4.484 3.469-6.656 5.281-1.172 0.984-2.625 2.188-4.25 2.188h-0.031c-1.625 0-3.078-1.203-4.25-2.188-2.172-1.813-4.422-3.563-6.656-5.281-0.391-0.313-0.75-0.656-1.078-1.031v12c0 0.266 0.234 0.5 0.5 0.5h23c0.266 0 0.5-0.234 0.5-0.5zM26 7.078c0-0.391 0.094-1.078-0.5-1.078h-23c-0.266 0-0.5 0.234-0.5 0.5 0 1.781 0.891 3.328 2.297 4.438 2.094 1.641 4.188 3.297 6.266 4.953 0.828 0.672 2.328 2.109 3.422 2.109h0.031c1.094 0 2.594-1.437 3.422-2.109 2.078-1.656 4.172-3.313 6.266-4.953 1.016-0.797 2.297-2.531 2.297-3.859zM28 6.5v17c0 1.375-1.125 2.5-2.5 2.5h-23c-1.375 0-2.5-1.125-2.5-2.5v-17c0-1.375 1.125-2.5 2.5-2.5h23c1.375 0 2.5 1.125 2.5 2.5z"></path>
</symbol>
<symbol id="icon-home" viewBox="0 0 26 28">
<title>home</title>
<path d="M22 15.5v7.5c0 0.547-0.453 1-1 1h-6v-6h-4v6h-6c-0.547 0-1-0.453-1-1v-7.5c0-0.031 0.016-0.063 0.016-0.094l8.984-7.406 8.984 7.406c0.016 0.031 0.016 0.063 0.016 0.094zM25.484 14.422l-0.969 1.156c-0.078 0.094-0.203 0.156-0.328 0.172h-0.047c-0.125 0-0.234-0.031-0.328-0.109l-10.813-9.016-10.813 9.016c-0.109 0.078-0.234 0.125-0.375 0.109-0.125-0.016-0.25-0.078-0.328-0.172l-0.969-1.156c-0.172-0.203-0.141-0.531 0.063-0.703l11.234-9.359c0.656-0.547 1.719-0.547 2.375 0l3.813 3.187v-3.047c0-0.281 0.219-0.5 0.5-0.5h3c0.281 0 0.5 0.219 0.5 0.5v6.375l3.422 2.844c0.203 0.172 0.234 0.5 0.063 0.703z"></path>
</symbol>
<symbol id="icon-twitter" viewBox="0 0 26 28">
<title>twitter</title>
<path d="M25.312 6.375c-0.688 1-1.547 1.891-2.531 2.609 0.016 0.219 0.016 0.438 0.016 0.656 0 6.672-5.078 14.359-14.359 14.359-2.859 0-5.516-0.828-7.75-2.266 0.406 0.047 0.797 0.063 1.219 0.063 2.359 0 4.531-0.797 6.266-2.156-2.219-0.047-4.078-1.5-4.719-3.5 0.313 0.047 0.625 0.078 0.953 0.078 0.453 0 0.906-0.063 1.328-0.172-2.312-0.469-4.047-2.5-4.047-4.953v-0.063c0.672 0.375 1.453 0.609 2.281 0.641-1.359-0.906-2.25-2.453-2.25-4.203 0-0.938 0.25-1.797 0.688-2.547 2.484 3.062 6.219 5.063 10.406 5.281-0.078-0.375-0.125-0.766-0.125-1.156 0-2.781 2.25-5.047 5.047-5.047 1.453 0 2.766 0.609 3.687 1.594 1.141-0.219 2.234-0.641 3.203-1.219-0.375 1.172-1.172 2.156-2.219 2.781 1.016-0.109 2-0.391 2.906-0.781z"></path>
</symbol>
<symbol id="icon-github" viewBox="0 0 24 28">
<title>github</title>
<path d="M12 2c6.625 0 12 5.375 12 12 0 5.297-3.437 9.797-8.203 11.391-0.609 0.109-0.828-0.266-0.828-0.578 0-0.391 0.016-1.687 0.016-3.297 0-1.125-0.375-1.844-0.812-2.219 2.672-0.297 5.484-1.313 5.484-5.922 0-1.313-0.469-2.375-1.234-3.219 0.125-0.313 0.531-1.531-0.125-3.187-1-0.313-3.297 1.234-3.297 1.234-0.953-0.266-1.984-0.406-3-0.406s-2.047 0.141-3 0.406c0 0-2.297-1.547-3.297-1.234-0.656 1.656-0.25 2.875-0.125 3.187-0.766 0.844-1.234 1.906-1.234 3.219 0 4.594 2.797 5.625 5.469 5.922-0.344 0.313-0.656 0.844-0.766 1.609-0.688 0.313-2.438 0.844-3.484-1-0.656-1.141-1.844-1.234-1.844-1.234-1.172-0.016-0.078 0.734-0.078 0.734 0.781 0.359 1.328 1.75 1.328 1.75 0.703 2.141 4.047 1.422 4.047 1.422 0 1 0.016 1.937 0.016 2.234 0 0.313-0.219 0.688-0.828 0.578-4.766-1.594-8.203-6.094-8.203-11.391 0-6.625 5.375-12 12-12zM4.547 19.234c0.031-0.063-0.016-0.141-0.109-0.187-0.094-0.031-0.172-0.016-0.203 0.031-0.031 0.063 0.016 0.141 0.109 0.187 0.078 0.047 0.172 0.031 0.203-0.031zM5.031 19.766c0.063-0.047 0.047-0.156-0.031-0.25-0.078-0.078-0.187-0.109-0.25-0.047-0.063 0.047-0.047 0.156 0.031 0.25 0.078 0.078 0.187 0.109 0.25 0.047zM5.5 20.469c0.078-0.063 0.078-0.187 0-0.297-0.063-0.109-0.187-0.156-0.266-0.094-0.078 0.047-0.078 0.172 0 0.281s0.203 0.156 0.266 0.109zM6.156 21.125c0.063-0.063 0.031-0.203-0.063-0.297-0.109-0.109-0.25-0.125-0.313-0.047-0.078 0.063-0.047 0.203 0.063 0.297 0.109 0.109 0.25 0.125 0.313 0.047zM7.047 21.516c0.031-0.094-0.063-0.203-0.203-0.25-0.125-0.031-0.266 0.016-0.297 0.109s0.063 0.203 0.203 0.234c0.125 0.047 0.266 0 0.297-0.094zM8.031 21.594c0-0.109-0.125-0.187-0.266-0.172-0.141 0-0.25 0.078-0.25 0.172 0 0.109 0.109 0.187 0.266 0.172 0.141 0 0.25-0.078 0.25-0.172zM8.937 21.438c-0.016-0.094-0.141-0.156-0.281-0.141-0.141 0.031-0.234 0.125-0.219 0.234 0.016 0.094 0.141 0.156 0.281 0.125s0.234-0.125 0.219-0.219z"></path>
</symbol>
<symbol id="icon-feed" viewBox="0 0 22 28">
<title>feed</title>
<path d="M6 21c0 1.656-1.344 3-3 3s-3-1.344-3-3 1.344-3 3-3 3 1.344 3 3zM14 22.922c0.016 0.281-0.078 0.547-0.266 0.75-0.187 0.219-0.453 0.328-0.734 0.328h-2.109c-0.516 0-0.938-0.391-0.984-0.906-0.453-4.766-4.234-8.547-9-9-0.516-0.047-0.906-0.469-0.906-0.984v-2.109c0-0.281 0.109-0.547 0.328-0.734 0.172-0.172 0.422-0.266 0.672-0.266h0.078c3.328 0.266 6.469 1.719 8.828 4.094 2.375 2.359 3.828 5.5 4.094 8.828zM22 22.953c0.016 0.266-0.078 0.531-0.281 0.734-0.187 0.203-0.438 0.313-0.719 0.313h-2.234c-0.531 0-0.969-0.406-1-0.938-0.516-9.078-7.75-16.312-16.828-16.844-0.531-0.031-0.938-0.469-0.938-0.984v-2.234c0-0.281 0.109-0.531 0.313-0.719 0.187-0.187 0.438-0.281 0.688-0.281h0.047c5.469 0.281 10.609 2.578 14.484 6.469 3.891 3.875 6.188 9.016 6.469 14.484z"></path>
</symbol>
</defs>
</svg>

<!-- /SVG icons -->

<a class="sr-only sr-only-focusable" href="#main">Skip to main content</a>

<?php get_template_part( 'partials/header', 'nav' ); ?>
<?php get_template_part( 'partials/header', 'banner' ); ?>
<?php if ( is_singular() || is_404() ) { get_template_part( 'partials/header', 'featured-image' ); } ?>
<?php if ( is_singular() ) { get_template_part( 'partials/header', 'item-intro' ); } ?>
<?php wp_reset_query(); // reset the query since we may have accessed current post info outside of the regular loop and now need to go back again ?>
 