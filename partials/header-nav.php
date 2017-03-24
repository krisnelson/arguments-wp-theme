<!-- header-nav.php -->
<style>
  #topNav { padding-left: 15px; padding-top: 0.1rem; padding-bottom: 1rem; }
  #topNav .nav-toggler { float: right; margin-right: 15px; }
  #topNav #navItems { display: block; }
  #topNav ul.nav-list { float: right; margin-right: 15px;}
  #topNav ul.nav-list li {
      margin-left: 0.2rem;
      margin-right: 0.2rem;
    } 
  #topNav #searchForm {
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

  @media (max-width: 575px) {  }
  @media (max-width: 767px) {
    #topNav #navItems {
      display:none; /* button shows them */
      z-index: 99999;
      position: absolute;  
      right: 0; top: 4.5rem;  
      /* width: 4rem; height: 80vh; */
      background-color: rgba(85,74,69,.95);
      padding-left: 15px;
      padding-right: 30px;
      transition: height 4s ease;
      border:1px solid #554A45;
      border-radius: 5px;
      box-shadow: rgba(0,0,0,.2) 2px 2px 2px;
    }
    #topNav ul.nav-list { text-align: left; }
    #topNav ul.nav-list li { display: block; }
    #topNav ul.nav-list li a { color: #fff; } 
    #topNav ul.nav-list li a:hover { color: #ddd; }     
  }
  @media (min-width: 768px) {
    #topNav .nav-toggler { display:none; }
    #topNav .nav-title { display:none; }
  }

</style>
  <nav id="topNav" class="site-navigation navigation" role="navigation">
    <!-- show/hide button -->
    <button class="nav-toggler btn btn-sm btn-outline-primary display-none" type="button" 
            aria-controls="navItems" aria-expanded="false" aria-label="Toggle navigation">
      <span class="nav-toggler-icon"></span>
    </button>
    <script type="text/javascript">
      jQuery(document).ready(function() {
        jQuery("#topNav .nav-toggler").click(function() {
          jQuery("#topNav .nav-collapse").toggle();
          jQuery("#topNav .nav-toggler").toggleClass("rotate-90");
        });
      });
    </script>
    <!-- title/branding -->
    <span class="nav-title">
      <a href="<?= esc_url(home_url('/')); ?>" >
      <?php 
        if ( has_site_icon() ) :
            //if (class_exists('Jetpack_Photon') ) { $photon_removed = remove_filter( 'image_downsize', array( Jetpack_Photon::instance(), 'filter_image_downsize' ) ); } ?>
                  <img class="site-icon-small" height="30" width="30" src="https://images.inpropriapersona.com/h_30,w_30,q_auto,f_auto/<?php site_icon_url(); ?>" 
                        alt="<?php bloginfo('name'); ?>" style="display:inline-block;" /><?php
            //if ( $photon_removed ) { add_filter( 'image_downsize', array( Jetpack_Photon::instance(), 'filter_image_downsize' ), 10, 3 ); }
        endif; // end has_site_icon() ?>
        &nbsp;<?php bloginfo( 'name' ); ?>
      </a>
    </span>
    <!-- navigation itens -->
    <ul id="navItems" class="nav-list nav-collapse">
      <li>
        <a href="/contact">
          <svg class="icon icon-envelope-o"><use xlink:href="#icon-envelope-o"></use></svg>
          <span class="hidden-md-up">&nbsp;&nbsp;Contact</span>
          <span class="sr-only">Contact</span>
        </a>
      </li>
      <li>
        <a href="http://twitter.com/krisnelson">
          <svg class="icon icon-twitter"><use xlink:href="#icon-twitter"></use></svg>
          <span class="hidden-md-up">&nbsp;&nbsp;Twitter</span>
          <span class="sr-only">Twitter</span>
        </a>
      </li>
      <li>
        <a href="http://github.com/krisnelson">
          <svg class="icon icon-github"><use xlink:href="#icon-github"></use></svg>
          <span class="hidden-md-up">&nbsp;&nbsp;Github</span>
          <span class="sr-only">Github</span>
        </a>
      </li>
      <li>
        <a href="<?php bloginfo('rss2_url'); ?>">
          <svg class="icon icon-feed"><use xlink:href="#icon-feed"></use></svg>
          <span class="hidden-md-up">&nbsp;&nbsp;RSS</span>
          <span class="sr-only">RSS Feed</span>
        </a>
      </li>      
      <li>
        <a id="nav-show-searchForm" aria-controls="searchForm" aria-haspopup="true" aria-expanded="false">
          <svg class="icon icon-search"><use xlink:href="#icon-search"></use></svg>
          <span class="hidden-md-up">&nbsp;&nbsp;Search</span>
          <span class="sr-only">Search</span>
        </a>
      </li>
    </ul>

    <section id="searchForm" class="display-none">
      <form role="search" method="get" id="searchform" class="searchform form-inline" 
            action="<?php echo home_url( '/' ) ?>" >
            <div class="form-group">
             <center>
              <label class="sr-only" for="searchbox">Search for</label>
              &nbsp;<input name="s" id="searchbox" 
                type="search" class="form-control"
                placeholder="<?php echo esc_attr_x( 'Search', 'placeholder' ) ?>"
                value="<?php echo get_search_query() ?>" 
                title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
              &nbsp;<button class="btn btn-outline-primary" id="searchsubmit" type="submit">Search</button>
             </center>
            </div>
      </form>
      <script type="text/javascript">
        jQuery(document).ready(function() {
          jQuery("#nav-show-searchForm").click(function() {
            jQuery("#searchForm").toggle();
          });
        });
      </script>      
    </section>

  </nav>