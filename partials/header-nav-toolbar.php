	<!-- toolbar/navbar -->
	<style>
	#site-toolbar { display:block; }
	#site-toolbar a#site-name { margin-left: 0.2rem; color: #554a45; font-weight: bold;}
	#site-toolbar ul#tools { float:right; }
	#site-toolbar ul#tools  { list-style-type: none; }
	#site-toolbar ul#tools li { display: inline-block; }

	</style>

	<nav id="site-toolbar" class="container-fluid" role="toolbar">
		<div class="row">
			<div id="site-logo-name" class="col-8">
				<span class="hidden-md-up">
					<?php 
					if ( has_site_icon() ) :
						if (class_exists('Jetpack_Photon') ) { $photon_removed = remove_filter( 'image_downsize', array( Jetpack_Photon::instance(), 'filter_image_downsize' ) ); } 
					?>
						<a href="<?= esc_url(home_url('/')); ?>"><img height="50" width="50" src="<?php site_icon_url('50') ?>" 
							alt="<?php bloginfo('name'); ?>" /></a>
					<?php
						if ( $photon_removed ) { add_filter( 'image_downsize', array( Jetpack_Photon::instance(), 'filter_image_downsize' ), 10, 3 ); }
					endif; // end has_site_icon() ?>
					<small>
						<a class="sans-serif" id="site-name" href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
					</small>
				</span>
			</div>
			<div id="site-tools" class="col-4">
				<ul id="tools">
					<!-- search box -->
					<li>
						<svg class="icon icon-search"><use xlink:href="#icon-search"></use></svg><span class="sr-only">Search</span>

						<script type="text/javascript">
							jQuery(document).ready(function() {
								jQuery(".icon-search").click(function() {
									jQuery("#tool-search-box").toggle();
								});
							});
						</script>

					</li>
					<!-- display author OR the authors and their pics -->
					<?php
					if( is_single() || is_page() || is_author() ): ?>
						<li class="hidden-sm-down">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
									<img class="img-circle" style="margin-top:-5px;"
										 height="32" width="32" 
										 src="<?php echo get_avatar_url( get_the_author_meta( 'ID' ), 32 ); ?>"
											 alt="<?php echo get_the_author(); ?>"
											 title="<?php echo get_the_author(); ?>">
								</a>
							</li>
					<?php 
					else:
						// Get all users order by amount of posts
						// see: http://www.paulund.co.uk/display-a-list-of-authors
						$allUsers = get_users('orderby=post_count&order=DESC');
						//echo "<!-- ";
						//echo($allUsers);
						//echo "-->";
						$users = array();
						// Remove subscribers from the list as they won't write any articles
						foreach($allUsers as $currentUser) {
							if(!in_array( 'subscriber', $currentUser->roles ))
							{ $users[] = $currentUser; }
						}
						foreach($users as $user) : ?>
							<li class="hidden-sm-down">
								<a href="<?php echo get_author_posts_url( $user->ID, $user->user_nicename ); ?>">
									<img class="img-circle" style="margin-top:-5px;"
										 height="32" width="32" 
										 src="<?php echo get_avatar_url( $user->ID, 32 ); ?>"
											 alt="<?php echo $user->display_name; ?>"
											 title="<?php echo $user->display_name; ?>">
								</a>
							</li>			
						<?php endforeach; ?>
					<?php endif; // end of authors  ?>
				</ul>
			</div><!-- /.col -->
		</div><!-- /.row -->
		<div id="tool-search-box" class="row" style="display:none;">
			<div class="col-8"></div>
			<div class="col-4">
				<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ) ?>" >
				    <div>
					    <label class="sr-only" for="s">Search for</label>
					    <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" />
					    <button class="btn btn-outline-primary" type="submit" id="searchsubmit" value="Search">Search</button>
				    </div>
			    </form>	
			</div><!-- /.col -->
		</div><!-- /.row -->
	</nav><!-- /.container -->
