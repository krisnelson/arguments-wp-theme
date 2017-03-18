
<?php // a possible shrinking navbar system ?>
	<!-- Top navigation bar -->
	<!-- see http://codepen.io/lukejacksonn/pen/BowbWE -->
	<style>
	nav.greedy {
	  position: relative;
	  /* height: 60px;*/
	  display: flex;
	  align-items: center;
	  /* background: #f2f2f2; */
	}

	nav.greedy h4 {
	  display: flex;
	  align-self: stretch;
	  align-items: center;
	  /* background: #d8d8d8; */
	  color: #404040;
	  padding: 0 1.5rem;
	  font-weight: bold;
	}

	nav.greedy button {
	  align-self: stretch;
	  transition: all .4s ease-out;
	  padding: 0 1rem 0 1.5rem;
	  outline: 0;
	  border: 0;
	  font-size: 0.9rem;
	  font-weight: bold;
	  /* background: #c8c8c8; */
	  color: #404040;
	}

	nav.greedy button.hidden {
	  transition: none;
	  border-right: 0.5rem solid #b6b6b6;
	  width: 0;
	  padding: 0;
	  overflow: hidden;
	}

	nav.greedy button::after {
	  content: attr(count);
	  display: inline-flex;
	  width: 30px;
	  height: 30px;
	  align-items: center;
	  justify-content: center;
	  background: #9f9f9f;
	  color: #f2f2f2;
	  box-shadow: 0 0 1px 0 rgba(0,0,0,0.8);
	  border-radius: 50%;
	  font-size: 14px;
	  line-height: 14px;
	  margin-left: 1rem;
	  margin-right: calc(-1rem + -8px);
	}

	ul.menu {
	  display: flex;
	  justify-content: flex-end;
	  flex: 1;
	  overflow: hidden;
	}

	ul.menu li {
	  flex: none;
	  padding: 1rem;
	}

	ul.menu li a { color: #404040; }

	ul.hidden-menu {
	  position: absolute;
	  /* background: #d8d8d8; */
	  right: 0;
	  top: 100%;
	}

	ul.hidden-menu li a {
	  color: #404040;
	  padding-right: 1rem;
	}

	ul.hidden-menu.hidden {
	  display: none;
	}

	ul.hidden-menu li {
	  padding: 1rem;
	}


	nav.greedy ul { list-style-type: none; }
	</style>

	<nav id="site-navigation" class='greedy' role="navigation">
		<?php wp_nav_menu( array( 'depth' => '1', 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu',
									'container' => ''
									 ) ); ?>

	  <button><span class="sr-only">Show Menu</span><i class="icono-bars"></i></button>
	  <ul class='hidden-menu hidden'></ul>

	  <script>

			jQuery(function() {

				var $nav = jQuery('nav.greedy');
				var $btn = jQuery('nav.greedy button');
				var $vlinks = jQuery('nav.greedy .menu');
				var $hlinks = jQuery('nav.greedy .hidden-menu');

			  var numOfItems = 0;
			  var totalSpace = 0;
			  var breakWidths = [];

			  // Get initial state
			  $vlinks.children().outerWidth(function(i, w) {
			    totalSpace += w;
			    numOfItems += 1;
			    breakWidths.push(totalSpace);
			  });

			  var availableSpace, numOfVisibleItems, requiredSpace;

			  function check() {

			    // Get instant state
			    availableSpace = $vlinks.width() - 10;
			    numOfVisibleItems = $vlinks.children().length;
			    requiredSpace = breakWidths[numOfVisibleItems - 1];

			    // There is not enought space
			    if (requiredSpace > availableSpace) {
			      $vlinks.children().last().prependTo($hlinks);
			      numOfVisibleItems -= 1;
			      check();
			      // There is more than enough space
			    } else if (availableSpace > breakWidths[numOfVisibleItems]) {
			      $hlinks.children().first().appendTo($vlinks);
			      numOfVisibleItems += 1;
			    }
			    // Update the button accordingly
			    $btn.attr("count", numOfItems - numOfVisibleItems);
			    if (numOfVisibleItems === numOfItems) {
			      $btn.addClass('hidden');
			    } else $btn.removeClass('hidden');
			  }

			  // Window listeners
			  jQuery(window).resize(function() {
			    check();
			  });

			  $btn.on('click', function() {
			    $hlinks.toggleClass('hidden');
			  });

			  check();

			});


	  </script>
	</nav>