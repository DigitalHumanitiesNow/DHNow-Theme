<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">

		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">

		<!-- If Site Icon isn't set in customizer -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />
			<!--[if IE]>
				<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
			<![endif]-->
			<meta name="msapplication-TileColor" content="#f01d4f">
			<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/images/win8-tile-icon.png">
	    	<meta name="theme-color" content="#121212">
	    <?php } ?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>
    <?php
    //block4 gradient
    $b5_color_1 = get_theme_mod( 'b5-color-1', '' );
    $b5_color_2 = get_theme_mod( 'b5-color-2', '' );
    $slider_color_1 = get_theme_mod( 'slider-color-1', '' );
    $slider_color_2 = get_theme_mod( 'slider-color-2', '' );
    $dropdown_arrow = Kirki::get_option('pftk_opts', 'topbar-text');
    echo '<style>.block-5{' . construct_gradient($b5_color_1, $b5_color_2) . '}';
    echo '.slider-container {' . construct_gradient($slider_color_1, $slider_color_2) . '}';
    if (!empty($dropdown_arrow)){
    echo '.dropdown.menu > li.is-dropdown-submenu-parent > a::after { border-color:' . $dropdown_arrow . ' transparent transparent; }';
    }
    echo '</style>';
    ?>


		<!-- Drop Google Analytics here -->
		<!-- end analytics -->

	</head>

	<!-- Uncomment this line if using the Off-Canvas Menu -->

	<body <?php body_class(); ?>>


  <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
    <button class="menu-icon" type="button" data-toggle></button>
    <div class="title-bar-title">Menu</div>
  </div>

  <header class="header" role="banner">

      <!-- This navs will be applied to the topbar, above all content
      To see additional nav styles, visit the /parts directory -->
      <?php get_template_part( 'parts/nav', 'topbar' ); ?>

      <div class="reveal" id="searchform" data-reveal>
        <?php get_search_form(); ?>
        <button class="close-button" data-close aria-label="Close modal" type="button">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
  </header> <!-- end .header -->
