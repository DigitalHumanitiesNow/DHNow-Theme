<!--
Features on this page:
01. Category Featured Images
02. Author Display Conditional by Category
03. Author Info (off by default)
04. Comment Template (off by default)
05. Sidebar (off by default)
-->

						<!-- <?php //global $brew_options ?>
						<?php
							// $b3c1cat = $brew_options['b3-c1-category'];
							// $b3c2cat = $brew_options['b3-c2-category'];
							// $b3c3cat = $brew_options['b3-c3-category'];
							// $b3c4cat = $brew_options['b3-c4-category'];
							// $b3c5cat = $brew_options['b3-c5-category'];
							// $b3c6cat = $brew_options['b3-c6-category'];
							// $slidercat = $brew_options['slider-categories'];
						?>

						<?php// if ( in_category($b3c1cat)) {
						// 	echo '<div class="col-md-2 featimg text-center">';
						// 	echo '<i class="fa ' . $brew_options['b3-c1-icon'] .' fa-5x"></i></div> <!--close col-md-2 featimg--><div class="col-md-10" id="postcontent">';
						// } else if (in_category($b3c2cat)) {
						// 	echo '<div class="col-md-2 featimg text-center">';
						// 	echo '<i class="fa ' . $brew_options['b3-c2-icon'] .' fa-5x"></i></div> <!--close col-md-2 featimg--><div
						// 		</div> <!--close col-md-2 featimg-->
						// 		<div class="col-md-10" id="postcontent">';
						// } else if (in_category($b3c3cat)) {
						// 	echo '<div class="col-md-2 featimg text-center">';
						// 	echo '<i class="fa ' . $brew_options['b3-c3-icon'] .' fa-5x"></i></div> <!--close col-md-2 featimg--><div class="col-md-10" id="postcontent">';
						// } else if (in_category($b3c4cat)) {
						// 	echo '<div class="col-md-2 featimg text-center">';
						// 	echo '<i class="fa ' . $brew_options['b3-c4-icon'] .' fa-5x"></i></div> <!--close col-md-2 featimg--><div class="col-md-10" id="postcontent">';
						// } else if (in_category($b3c5cat)) {
						// 	echo '<div class="col-md-2 featimg text-center">';
						// 	echo '<i class="fa ' . $brew_options['b3-c5-icon'] .' fa-5x"></i></div> <!--close col-md-2 featimg--><div class="col-md-10" id="postcontent">';
						// } else if (in_category($b3c6cat)) {
						// 	echo '<div class="col-md-2 featimg text-center">';
						// 	echo '<i class="fa ' . $brew_options['b3-c6-icon'] .' fa-5x"></i></div> <!--close col-md-2 featimg--><div class="col-md-10" id="postcontent">';
						// } else if (in_category('87')) {
						// 	echo '<div class="col-md-2 featimg text-center">
						// 		  <i class="fa fa-pencil fa-5x"></i>
						// 		  </div> <!--close col-md-2 featimg-->
						// 		  <div class="col-md-10" id="postcontent">';
						// } else if (in_category($slidercat)) {
						// 	echo '<div class="col-md-3 featimg">' . get_the_post_thumbnail( $post->ID, array(250,250)) . '</div> <!--close col-md-3 featimg-->
						// 		<div class="col-md-9" id="postcontent">';
						} ?> -->

						<!-- <?php //$currentpostdate = get_the_date('Y/m/d');

						// 	echo '<div class="col-md-3 ec-customfields"><span class="tags pull-left">';
						// 	printf( '<span class="">' . __( 'in %1$s&nbsp;&nbsp;', 'bonestheme' ) . '</span>', get_the_category_list(', ') ); ?> <?php the_tags( '<span class="tags-title">' . __( '<i class="fa fa-tags"></i>', 'bonestheme' ) . '</span> ', ', ', '' );
						// 	echo  '</span></div>';
						// 	$chief = get_post_meta($post->ID, 'editor-in-chief', true);
						// 	$large = get_post_meta($post->ID, 'editors-at-large', true);
						//
						// 	// $currentdate = new DateTime($currentpostdate);
						// 	// $weekno = $currentdate->format("W");
						//
						// 	$nomcount = get_post_meta($post->ID, 'nomination_count', true);
						// if (in_category($slidercat) && $currentpostdate < '2016/02/22') {
						// 	echo '<div class="col-md-9 editor"><p>This content was selected for <em>Digital Humanities Now</em> by Editor-in-Chief ' . $chief . ' based on nominations by Editors-at-Large: ' . $large . '</p></div>';
						//
						// } elseif (in_category( $slidercat) && $currentpostdate > '2016/02/22') {
						// 	$chief = get_post_meta($post->ID, 'editor-in-chief', true);
						// 	$El_statement = get_post_meta($post->ID, 'editors-at-large-statement');
						//
						// 	echo '<div class="col-md-9 editor"><p>This content was selected for <em>Digital Humanities Now</em> by Editor-in-Chief ' . $chief . ' based on nominations by Editors-at-Large: ' . implode($El_statement) . '</p></div>';
						// } else {
						// 	echo '<span class="tags pull-left">';
						// 	printf( '<span class="">' . __( 'in %1$s&nbsp;&nbsp;', 'bonestheme' ) . '</span>', get_the_category_list(', ') ); ?> <?php the_tags( '<span class="tags-title">' . __( '<i class="fa fa-tags"></i>', 'bonestheme' ) . '</span> ', ', ', '' );
						// 	echo '</span>';
						} ?> -->

<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="row">
		<?php $breadcrumb_nav = Kirki::get_option( 'pftk_opts', 'breadcrumbs');
		 if ($breadcrumb_nav == true):
				echo custom_breadcrumb();
			endif; ?>

					<main id="main" class="large-12 medium-12 columns" role="main">


		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    	<?php get_template_part( 'parts/loop', 'single' ); ?>

		    <?php endwhile; else : ?>

		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

		</main> <!-- end #main -->


	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>
