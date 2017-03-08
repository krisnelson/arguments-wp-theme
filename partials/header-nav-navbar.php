<!-- navbar -->
<style>
  .rotate-90 { 
    -ms-transform: rotate(90deg); /* IE 9 */
    -webkit-transform: rotate(90deg); /* Chrome, Safari, Opera */
    transform: rotate(90deg); 
  }
  .navbar-light .navbar-nav .nav-link,
    .navbar-light .navbar-brand, 
    .navbar-light .navbar-toggler { color: #554a45; } /* #733e26  554a45 */
  .nav-link:hover { color: #733e26; }
  .navbar-brand { font-weight: 600; }

  #navbarSearchForm {
    display:none;
    z-index: 99999;
    position: absolute;  /* <-- added declarations */
    left: 0; top: 100%;  /*     here               */
    width: 100%;         /*     and here...        */
    transition: height 1s ease;
  }
  @media (max-width: 575px) {
    .navbar-brand { padding-top: 50px; /* allow for menu button to be above the branding on small screens */ }
  }
  @media (max-width: 767px) {
    .navbar-brand { display:flex;justify-content:flex-start; }
    #navbarSearchForm { width:20rem !important; }
    #navbarNavItems {
      display:none; /* button shows them */
      z-index: 99999;
      position: absolute;  
      left: 0; top: 100%; 
      width: 100%; height: 80vh;
      transition: height 1s ease;
      background-color: rgba(85,74,69,.95);
      padding-left: 15px;
      padding-right: 30px;
    }
    .navbar-light .navbar-nav .nav-link { font-size: 1.5rem; color: #fff; text-align: center; padding-right: 30px;} 
    .nav-link:hover { background-color: #fff; color: #554a45; opacity: 9; }
  }
  @media (min-width: 768px) {
    #navbarNavItems {
      display:flex;justify-content:flex-end;
    }
    #navbarSearchForm {
      margin-left:-15rem; !important;width:20rem !important;
    }
    .navbar-toggler { 
      display:none; 
    }
    .navbar-brand {
      display:none;
    }
  }


  </style>
  <nav class="navbar navbar-toggleable-sm navbar-light">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavItems"  aria-controls="navbarNavItems" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <script type="text/javascript">
      jQuery(document).ready(function() {
        jQuery(".navbar-toggler").click(function() {
          jQuery(".collapse").toggle();
          jQuery(".navbar-toggler-icon").toggleClass("rotate-90");
        });
      });
    </script>

    <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>" >
    <?php 
      if ( has_site_icon() ) :
          if (class_exists('Jetpack_Photon') ) { $photon_removed = remove_filter( 'image_downsize', array( Jetpack_Photon::instance(), 'filter_image_downsize' ) ); } ?>
                <img class="site-icon-small" height="30" width="30" src="<?php site_icon_url('30') ?>" 
                      alt="<?php bloginfo('name'); ?>" style="display:inline-block;" /><?php
          if ( $photon_removed ) { add_filter( 'image_downsize', array( Jetpack_Photon::instance(), 'filter_image_downsize' ), 10, 3 ); }
      endif; // end has_site_icon() ?>
      &nbsp;<?php bloginfo( 'name' ); ?>
    </a>

    <div class="collapse navbar-collapse align-right" id="navbarNavItems" style="">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li> 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Search
          </a>
          <div id="navbarSearchForm" class="dropdown-menu">
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
          </div>
        </li>
        <script type="text/javascript">
          jQuery(document).ready(function() {
            jQuery("#navbarDropdownSearch").click(function() {
              jQuery("#navbarSearchForm").toggle();
            });
          });
        </script>
      </div>
    </div>

    

  </nav>