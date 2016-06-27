<?php
// Theme support options
require_once(get_template_directory().'/assets/functions/theme-support.php');

// WP Head and other cleanup functions
require_once(get_template_directory().'/assets/functions/cleanup.php');

// Register scripts and stylesheets
require_once(get_template_directory().'/assets/functions/enqueue-scripts.php');

// Register custom menus and menu walkers
require_once(get_template_directory().'/assets/functions/menu.php');
require_once(get_template_directory().'/assets/functions/menu-walkers.php');

// Register sidebars/widget areas
require_once(get_template_directory().'/assets/functions/sidebar.php');

// Makes WordPress comments suck less
require_once(get_template_directory().'/assets/functions/comments.php');

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/assets/functions/page-navi.php');

// Adds support for multiple languages
require_once(get_template_directory().'/assets/translation/translation.php');

// Adds site styles to the WordPress editor
//require_once(get_template_directory().'/assets/functions/editor-styles.php');

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/assets/functions/related-posts.php');

// Use this as a template for custom post types
// require_once(get_template_directory().'/assets/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/assets/functions/login.php');

// Customize the WordPress admin
// require_once(get_template_directory().'/assets/functions/admin.php');

//Include Kirki framework
include_once( dirname(__FILE__) . '/vendor/kirki/kirki.php' );
require_once(get_template_directory().'/assets/functions/theme_opts.php');





function custom_breadcrumb() {
  if(!is_home()) {
    echo '<nav aria-label="You are here:" role="navigation">';
    echo '<ul class="breadcrumbs">';
    echo '<li><a href="'.home_url().'">Home</a></li>';
    if (is_single()) {
      echo '<li>';
      the_category(', ');
      echo '</li>';
      if (is_single()) {
        echo '<li>';
        the_title();
        echo '</li>';
      }
    } elseif (is_category()) {
      echo '<li>';
      single_cat_title();
      echo '</li>';
    } elseif (is_page()) {
      echo '<li>';
      the_title();
      echo '</li>';
    } elseif (is_tag()) {
      echo '<li>Tag: ';
      single_tag_title();
      echo '</li>';
    } elseif (is_day()) {
      echo'<li>Archive for ';
      the_time('F jS, Y');
      echo'</li>';
    } elseif (is_month()) {
      echo'<li>Archive for ';
      the_time('F, Y');
      echo'</li>';
    } elseif (is_year()) {
      echo'<li>Archive for ';
      the_time('Y');
      echo'</li>';
    } elseif (is_author()) {
      echo'<li>Author Archives';
      echo'</li>';
    } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
      echo '<li>Blog Archives';
      echo'</li>';
    } elseif (is_search()) {
      echo'<li>Search Results';
      echo'</li>';
    }
    echo '</ul>';
    echo '</nav>';
  }
}
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

//add tgm plugin
require_once get_template_directory() . '/vendor/tgm-plugin-activation/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'pftk_register_required_plugins' );

function pftk_register_required_plugins() {
	$plugins = array(
  array(
    'name'      => 'PressForward',
    'slug'      => 'pressforward',
    'required'  => false,
  ),
);
$config = array(
  'id'           => 'pressforward-turnkey-theme',                 // Unique ID for hashing notices for multiple instances of TGMPA.
  'default_path' => '',                      // Default absolute path to bundled plugins.
  'menu'         => 'tgmpa-install-plugins', // Menu slug.
  'has_notices'  => true,                    // Show admin notices or not.
  'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
  'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
  'is_automatic' => false,                   // Automatically activate plugins after installation or not.
  'message'      => '',                       // Message to output right before the plugins table.
);

tgmpa($plugins, $config);
}





?>
