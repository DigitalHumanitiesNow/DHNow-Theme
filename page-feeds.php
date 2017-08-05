<?php
/*
Template Name: Subscribed Feeds (No Sidebar)
*/
?>

<?php get_header(); ?>

	<div id="content">


		<div id="inner-content" class="row">
			<?php $breadcrumb_nav = Kirki::get_option( 'pftk_opts', 'breadcrumbs');
			 if ($breadcrumb_nav == true):
					echo custom_breadcrumb();
				endif; ?>
		    <main id="main" class="large-offset-1 large-10 large-offset-1 columns" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php get_template_part( 'parts/content', 'feeds' ); ?>

				<?php endwhile; endif; ?>

			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->
	<script type="text/javascript" >
		jQuery(document).ready( function ($) {
			$('#archive_table').DataTable( {
				 "pageLength": 50,
				 "order": [[ 1, 'asc' ]],
			});
		} );
	</script>
<?php get_footer(); ?>
