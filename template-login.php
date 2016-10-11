<?php
/*
Template Name: Login (No Sidebar)
*/
?>

<?php get_header(); ?>

	<div id="content">


		<div class="row">
			<?php $breadcrumb_nav = Kirki::get_option( 'pftk_opts', 'breadcrumbs');
			 if ($breadcrumb_nav == true):
					echo custom_breadcrumb();
				endif; ?>
				<main id="main" class="small-6 large-centered end" role="main">
					<?php while (have_posts()) : the_post() ?>
							<?php get_template_part('parts/content', 'login') ?>
					<?php endwhile ?>
				</main>
	<!-- /section -->
  </div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>
