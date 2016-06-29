<?php
/*
Template Name: Volunteer (DHNow Specific)
*/
?>

<?php get_header(); ?>

	<div id="content">


		<div id="inner-content" class="row">
			<div class="large-offset-1 large-10 large-offset-1 columns">
			<?php $breadcrumb_nav = Kirki::get_option( 'pftk_opts', 'breadcrumbs');
			 if ($breadcrumb_nav == true):
					echo custom_breadcrumb();
				endif; ?>
			</div>

		 <?php if (is_user_logged_in() ) { ?>
			<div class="row">
				<div class="large-offset-1 large-10 large-offset-1 columns">
		 			<div class="row">
		 									<div class="large-6 medium-6 small-12 columns text-center" id="login-col">
		 											<h3>Nominate Content</h3>
		 											<?php echo '<a class="button" href="' .get_dashboard_url() . '/admin.php?page=pf-menu" role="button">Nominate Content</a>'; ?>
		 									</div>

											<div class="large-6 medium-6 small-12 columns text-center">
		 											<h3>Manage Volunteer Dates & Profile</h3>
		 											<?php echo '<a class="button" href="' . get_edit_profile_url() . '" role="button">Manage Volunteer Dates</a> '; ?>
		 									</div>
		 			</div> <!-- close reg-row -->
				</div>
			</div>
	 		<?php } else { ?>
				<div class="row">
					<div class="large-offset-1 large-10 large-offset-1 columns">
			 			<div class="row">
				 							<div class="medium-6 large-6 small-12 columns text-center" id="login-col">
				 									<h3>Editor-at-Large Login</h3>
				 									<?php echo '<a class="button" href="' . get_site_url() . '/login" role="button">Log In</a>'; ?>
				 							</div>

											<div class="medium-6 large-6 small-12 columns text-center">
				 									<h3>Volunteer</h3>
				 									<?php echo '<a class="button" href="' . get_site_url() . '/registration" role="button">Register</a>'; ?>
				 							</div>
				 					</div>
								</div>
							</div>
	 <?php } ?>

		    <main id="main" class="large-offset-1 large-10 large-offset-1" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php get_template_part( 'parts/loop', 'page' ); ?>

				<?php endwhile; endif; ?>

			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>
