<?php
/*
Template Name: Home Page Template
*/
?>

<?php get_header(); ?>
<div id="content" class="slider-container">
<div class="row">
<div class="medium-12 large-12 columns">
	<div class="orbit" role="region" data-options="autoPlay:false;" aria-label="Editor's Choice" data-orbit>
  	<ul class="orbit-container">
    	<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
    	<button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>

			<?php
			//get slider category ids from customizer option
			$pftk_opts = '';
			$slider_category = '';

			$slider_categories_option = Kirki::get_option( 'pftk_opts', 'slider_category');

			//get number of posts from customizer option
			$slider_numposts_option = Kirki::get_option( 'pftk_opts', 'slider_numposts' );

			$postcats = 'category='. $slider_categories_option . '&posts_per_page=' . $slider_numposts_option;
			$feat_posts = get_posts($postcats);
			$bullets = 1;
			foreach($feat_posts as $post) {
        $trim_title = get_post_field('post_title', $id);
        $short_title = wp_trim_words( $trim_title, $num_words = 14, $more = '… ' );
				$trimexcerpt = get_post_field('post_content', $id);
        $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 55, $more = '… ' );
						echo '<li class="orbit-slide">';
						echo '<div class="row">';
						echo '<div id="medium-12 columns"><h1>' . $short_title . '</h1></div>';
						echo '<div class="row">';
						echo '<div class="medium-7 columns">';
						echo '<h2 class="slider-byline">By: ' . get_the_author() . '</h2></br><p class="info-title">' . $shortexcerpt . '</p> <a href="' . get_permalink() . '
						" alt="' . get_the_title() . '" class="pf-tk-button">Read More</a></div>';
						$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
						echo '<div class="medium-5 columns"><img src="' . $thumb[0] . '" class="thumbnail"></div>';
						echo '</div>';
						echo '</li>';
						$bullets++;
			}
?>
</ul>
<nav class="orbit-bullets">
		<?php
		$counter = 0;
		while($counter < $bullets - 1) {
			if ($counter == 0) {
			echo '<button data-slide="'. $counter . '"><span class="show-for-sr">slide details.</span><span class="show-for-sr">Current Slide</span></button>';
			$counter++;
		} elseif ($counter < $bullets - 1) {
			echo '<button data-slide="'. $counter . '"><span class="show-for-sr">slide details.</span></button>';
			$counter++;
		}
		} ?>
  </nav>
	</div> <!-- close .orbit -->
</div>
</div><!--  close .row #slider -->
</div>
<!-- </div> end content -->

<!--
Block 2
-->

      <div class="block-2" id="block-2">
	              <div class="row">
	                  <div class="large-3 medium-3 columns">
											<?php $b2c1_icon = Kirki::get_option( 'pftk_opts', 'b2c1-icon' );
												echo '<i class="fa ' . $b2c1_icon . ' fa-3x"></i>'; ?>
	                      <h1 class="widgettitle"><a href="#">Title Goes Here</a></h1>
	                    <div class="textwidget">
	                      <p>Text goes here</p>
	                    </div>
	                </div>

	                 <div class="large-3 medium-3 columns">
	                      <i class="fa fa-taxi fa-3x"></i>
	                      <h1 class="widgettitle"><a href="#">Title Goes Here</a></h1>
	                    <div class="textwidget">
	                      <p>Text goes here</p>
	                    </div>
	                </div>

	                 <div class="large-3 medium-3 columns">
	                      <i class="fa fa-taxi fa-3x"></i>
	                      <h1 class="widgettitle"><a href="#">Title Goes Here</a></h1>
	                    <div class="textwidget">
	                      <p>Text goes here</p>
	                    </div>
	                </div>
	                <div class="large-3 medium-3 columns">
	                      <i class="fa fa-taxi fa-3x"></i>
	                      <h1 class="widgettitle"><a href="#">Title Goes Here</a></h1>
	                    <div class="textwidget">
	                      <p>Text goes here</p>
	                    </div>
	                </div>
	            </div> <!-- close .row -->
	      </div> <!-- close .block-2 -->

<!--
Block 3
-->
						<div class="block-3">
            <div class="row homecategories">
              <!--Section 1-->
                <div class="large-4 medium-4 columns about" id="content1">
                    <div class="homeinnerwrapper">
                      <i class="fa ' . $brew_options['b3-c1-icon'] . ' fa-3x"></i>
                      <div class="homeinnercontent">
                      <h1><a href="#">Category Link</a></h1>
                      <ul>
                      <?php $b3c1cat = 'cat=2&posts_per_page=3';
                      query_posts($b3c1cat);
                      if ( have_posts() ) : while ( have_posts() ) : the_post();
                        echo '<li><a href="';
                        echo the_permalink() . '">';
                        echo  the_title() . '</a></li>';
                      endwhile; endif;
                      wp_reset_query(); ?>
                      </ul>
                      </div>

                    </div> <!-- close homeinnerwrapper -->
                </div> <!-- close #content1 -->

              <!--Section 2-->
							<div class="large-4 medium-4 columns about" id="content2">
									<div class="homeinnerwrapper">
										<i class="fa-taxi"></i>
										<div class="homeinnercontent">
										<h1><a href="#">Category Link</a></h1>
										<ul>
										<?php $b3c2cat = 'cat=2&posts_per_page=3';
										query_posts($b3c2cat);
										if ( have_posts() ) : while ( have_posts() ) : the_post();
											echo '<li><a href="';
											echo the_permalink() . '">';
											echo  the_title() . '</a></li>';
										endwhile; endif;
										wp_reset_query(); ?>
										</ul>
										</div>
									</div>
								</div>

              <!--Section 3-->
							<div class="large-4 medium-4 columns about" id="content3">
									<div class="homeinnerwrapper">
										<i class="fa-taxi fa-3x"></i>
										<div class="homeinnercontent">
										<h1><a href="#">Category Link</a></h1>
										<ul>
										<?php $b3c3cat = 'cat=2&posts_per_page=3';
										query_posts($b3c3cat);
										if ( have_posts() ) : while ( have_posts() ) : the_post();
											echo '<li><a href="';
											echo the_permalink() . '">';
											echo  the_title() . '</a></li>';
										endwhile; endif;
										wp_reset_query(); ?>
										</ul>
										</div>
									</div>
								</div>

            </div> <!--end row-->
						<div class="row homecategories">
							<!--Section 1-->
								<div class="large-4 medium-4 columns about" id="content1">
										<div class="homeinnerwrapper">
											<i class="fa ' . $brew_options['b3-c1-icon'] . ' fa-3x"></i>
											<div class="homeinnercontent">
											<h1><a href="#">Category Link</a></h1>
											<ul>
											<?php $b3c1cat = 'cat=2&posts_per_page=3';
											query_posts($b3c1cat);
											if ( have_posts() ) : while ( have_posts() ) : the_post();
												echo '<li><a href="';
												echo the_permalink() . '">';
												echo  the_title() . '</a></li>';
											endwhile; endif;
											wp_reset_query(); ?>
											</ul>
											</div>

										</div>
								</div>

							<!--Section 2-->
							<div class="large-4 medium-4 columns about" id="content2">
									<div class="homeinnerwrapper">
										<i class="fa-taxi"></i>
										<div class="homeinnercontent">
										<h1><a href="#">Category Link</a></h1>
										<ul>
										<?php $b3c2cat = 'cat=2&posts_per_page=3';
										query_posts($b3c2cat);
										if ( have_posts() ) : while ( have_posts() ) : the_post();
											echo '<li><a href="';
											echo the_permalink() . '">';
											echo  the_title() . '</a></li>';
										endwhile; endif;
										wp_reset_query(); ?>
										</ul>
										</div>
									</div>
								</div>

							<!--Section 3-->
							<div class="large-4 medium-4 columns about" id="content3">
									<div class="homeinnerwrapper">
										<i class="fa-taxi fa-3x"></i>
										<div class="homeinnercontent">
										<h1><a href="#">Category Link</a></h1>
										<ul>
										<?php $b3c3cat = 'cat=2&posts_per_page=3';
										query_posts($b3c3cat);
										if ( have_posts() ) : while ( have_posts() ) : the_post();
											echo '<li><a href="';
											echo the_permalink() . '">';
											echo  the_title() . '</a></li>';
										endwhile; endif;
										wp_reset_query(); ?>
										</ul>
										</div>
									</div>
								</div>

						</div> <!--end row-->
          </div> <!--end .block-3 -->

<!--
Block 4
-->
			<div class="block-4">
							<div class="row">
									<div class="large-12 medium-12 columns" id="infotext">
										<h2>About Block #4</h2>
									</div>
							</div>
			</div>

<!--
Block 5
-->
				<div class="block-5">
					<div class="row">
							<div class="medium-7 large-7 columns">
								most recent post
							</div>
							<div class="medium-5 large-5 columns" id="bloglist">
								bloglist
							</div>
					</div>
				</div>


<?php get_footer(); ?>
