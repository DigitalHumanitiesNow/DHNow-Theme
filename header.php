<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php if (is_front_page()) { bloginfo('name'); } else { wp_title(''); } ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png?v=2">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php //echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?>

    <header class="header">

      <nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
        
          <div class="container">
            <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
			
              <!-- <a class="navbar-brand" href="<?php bloginfo( 'url' ) ?>/" title="<?php // bloginfo( 'name' ) ?>" rel="homepage"><?php //bloginfo('name'); ?></a> -->
             <?php global $brew_options ;
				$themelogo = $brew_options['logo_uploader']['url'];
				$banner = $brew_options['banner_uploader']['url']; ?>

			
            </div> <!--close navbar-header -->
			<div class="navbar-collapse collapse navbar-responsive-collapse">
				<div class="row">
					<div class="col-md-12 topbar">
						<div class="logo">
							<a class="navbar-brand" href="<?php bloginfo ('url');?>" title="<?php bloginfo('name')?>" rel="homepage">
							<img  src="<?php echo $themelogo ;?> " alt ="logo" /></a>
						</div>
					<div class="menu-container">
						<div class="nav-container">
	              			<?php bones_main_nav(); ?>
	              		</div><!--close menu container-->
	              		
	              		<div class="search-container">
	              			<ul class="nav navbar-nav">
		              			<li><a href="#" id="example" rel="popover" data-content='<?php get_search_form() ?>' data-original-title="search">
				              				<i class="fa fa-1x fa-search"></i>
				              				</a>
		              			</li>
	              			</ul>
	              		</div>	
              		</div><!--menu container-->
             		</div><!--close topbar-->
             	</div> <!--CLOSE ROW-->
			</div>
          </div>
      </nav>
 <!--      <a href="#" id="example" class="btn btn-primary" rel="popover"
   data-content="This is the body of Popover"
   data-original-title="Creativity Tuts">pop
</a> -->

		</header> <?php // end header ?>
