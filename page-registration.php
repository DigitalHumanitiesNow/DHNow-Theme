<?php
/*
Template Name: Contact
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
          <?php while (have_posts()) : the_post() ?>
              <?php get_template_part('parts/content', 'registration') ?>
          <?php endwhile ?>


			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>
