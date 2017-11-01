<?php
/*
Template Name: Post Index
*/
?>

<?php get_header(); ?>

	<div id="content">
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			var wpURL="http://local.wordpress.test/index.php?rest_route=/wp/v2/posts";
			$.ajax({
				type: 'GET',
				url: wpURL,
				data: {action: 'createHTML'},
				success: function(data) {
					var obj = JSON.stringify(data);
					var test = jQuery.parseJSON(obj);

					console.log(test);
					createHTML(test);
				}
			});
 		});
 	function createHTML(postData) {
 		console.log(postData);
		console.log(postData.length);
		console.log(postData[1].title.rendered);
		var posts = postData.length;
		for (i = 0; i < posts; i++){
			console.log(postData[i].title.rendered);
		}


 }


		</script>

		<div id="inner-content" class="row">
			<?php $breadcrumb_nav = Kirki::get_option( 'pftk_opts', 'breadcrumbs');
			 if ($breadcrumb_nav == true):
					echo custom_breadcrumb();
				endif; ?>
		    <main id="main" class="large-12 medium-12 columns" role="main">
				<div class=".entry-content">
				</div>

        </main> <!-- end #main -->

        </div> <!-- end #inner-content -->

        </div> <!-- end #content -->

        <?php get_footer(); ?>
