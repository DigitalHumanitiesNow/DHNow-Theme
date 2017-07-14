<?php
/*
Template Name: Registration
*/
?>

<?php get_header(); ?>

	<div id="content">


		<div id="inner-content" class="row">
			<?php $breadcrumb_nav = Kirki::get_option( 'pftk_opts', 'breadcrumbs');
			 if ($breadcrumb_nav == true):
					echo custom_breadcrumb();
				endif; ?>
		    <main id="main" class="small-10 large-centered end" role="main">
          <?php while (have_posts()) : the_post() ?>
              <?php get_template_part('parts/content', 'registration') ?>
          <?php endwhile ?>


			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>
