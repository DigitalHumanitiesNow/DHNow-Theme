<?php
/*
Template Name: Post Index
*/
?>

<?php get_header(); ?>

	<div id="content">
		<script>
		jQuery(document).ready(function($){

	// Call the /posts endpoint via the WordPress API
	$.get("http://digitalhumanitiesnow.org/wp-json/wp/v2/posts?categories=234", function (posts) {

  		// Loop through all the posts returned and console.log() each of
  		// their HTML content
    		$.each(posts, function(index, post) {
    			//console.log(post.title['rendered']);
					var titles = post.title['rendered'];
					$("#announcements").append('<li>'+titles+'</li>');

    		});
	});
});
		</script>

		<div id="inner-content" class="row">
			<?php $breadcrumb_nav = Kirki::get_option( 'pftk_opts', 'breadcrumbs');
			 if ($breadcrumb_nav == true):
					echo custom_breadcrumb();
				endif; ?>
		    <main id="main" class="large-12 medium-12 columns" role="main">

          <ul class="tabs" data-tabs id="example-tabs">
            <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Tab 1</a></li>
            <li class="tabs-title"><a href="#panel2">Tab 2</a></li>
          </ul>

          <div class="tabs-content" data-tabs-content="example-tabs">
            <div class="tabs-panel is-active" id="panel1">
							<ul id="announcements">
							</ul>
            </div>
            <div class="tabs-panel" id="panel2">
              <p>Suspendisse dictum feugiat nisl ut dapibus.  Vivamus hendrerit arcu sed erat molestie vehicula. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.  Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor.</p>
            </div>
          </div>

        </main> <!-- end #main -->

        </div> <!-- end #inner-content -->

        </div> <!-- end #content -->

        <?php get_footer(); ?>
