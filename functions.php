<?php
function custom_remove_menu_pages() {
  $user = wp_get_current_user();
  if ( in_array('contributor', $user->roles) ) {
    remove_menu_page('tools.php');
  }
}
function active_feeds_function($atts) {
	extract(shortcode_atts(array(
      'status' => 'publish',
    ), $atts));


  $return_string = '<ul class="feedlist">';
    $the_query = new WP_Query(array('post_type' => 'pf_feed', 'post_status' =>
    $status, 'nopaging' => true, 'orderby' => 'title', 'order' => 'ASC', 'no_found_rows' => true));

  if ($the_query->have_posts()) :
    while ($the_query->have_posts())  : $the_query->the_post();
      $return_string .= '<li class="feeditem"><a href="'.get_post_meta(get_the_ID(), 'feedUrl', true).'"target="_blank">'.get_the_title().'</a></li>';
    endwhile;
  endif;
  $return_string .= '</ul>';
wp_reset_query();
wp_reset_postdata();
return $return_string;
}





function register_shortcodes() {
  add_shortcode('feeds', 'active_feeds_function');
  add_shortcode('nomcount', 'nomcount_shortcode');
}
add_action('init', 'register_shortcodes');



//THESE SECTIONS ARE HARDCODED FOR THE DHNOW THEME.

  //   register_sidebar(array(
  //   'id' => 'homepageabout',
  //   'name' => __( 'About Section Widget', 'bonestheme' ),
  //   'description' => __( 'The homepage about widget.', 'bonestheme' ),
  //   'before_widget' => '<div id="%1$s" class="widget infowidget %2$s">',
  //   'after_widget' => '</div>',
  //   'before_title' => '<h1 class="widgettitle">',
  //   'after_title' => '</h1>',
  // ));

  //   register_sidebar(array(
  //   'id' => 'blogexcerpt',
  //   'name' => __( 'Blog Widget 1', 'bonestheme' ),
  //   'description' => __( 'The blog widget.', 'bonestheme' ),
  //   'before_widget' => '<div id="%1$s" class="widget blogwidget %2$s">',
  //   'after_widget' => '</div>',
  //   'before_title' => '<h1 class="widgettitle">',
  //   'after_title' => '</h1>',
  // ));
  //            register_sidebar(array(
  //   'id' => 'bloglist',
  //   'name' => __( 'Blog Widget 2', 'bonestheme' ),
  //   'description' => __( 'The blog widget.', 'bonestheme' ),
  //   'before_widget' => '<div id="%1$s" class="widget blogwidget %2$s">',
  //   'after_widget' => '</div>',
  //   'before_title' => '<h1 class="widgettitle">',
  //   'after_title' => '</h1>',
  // ));

?>
<?php
//OPEN GRAPH METADATA
function add_opengraph_markup() {
  if (is_single()) {
    global $post;
    global $brew_options ;
    // $themelogo = $brew_options['logo_uploader']['url'];
    if(get_the_post_thumbnail($post->ID, 'thumbnail')) {
      $thumbnail_id = get_post_thumbnail_id($post->ID);
      $thumbnail_object = get_post($thumbnail_id);
      $image = $thumbnail_object->guid;
    } else {
      // set default image
    }
    //$description = get_bloginfo('description');
    $description = substr(strip_tags($post->post_content),0,200) . '...';
?>
<meta property="og:title" content="<?php the_title(); ?>" />
<meta property="og:type" content="article" />
<meta property="og:image" content="<?=$image?>" />
<meta property="og:url" content="<?php the_permalink(); ?>" />
<meta property="og:description" content="<?=$description?>" />
<meta property="og:site_name" content="<?=get_bloginfo('name')?>" />

<?php
  }
}
add_action('wp_head', 'add_opengraph_markup');




// add footer widgets

  register_sidebar(array(
    'id' => 'footer-1',
    'name' => __( 'Footer Widget 1', 'bonestheme' ),
    'description' => __( 'The first footer widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget widgetFooter %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'footer-2',
    'name' => __( 'Footer Widget 2', 'bonestheme' ),
    'description' => __( 'The second footer widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget widgetFooter %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'footer-3',
    'name' => __( 'Footer Widget 3', 'bonestheme' ),
    'description' => __( 'The third footer widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget widgetFooter %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

    register_sidebar(array(
    'id' => 'footer-4',
    'name' => __( 'Footer Widget 4', 'bonestheme' ),
    'description' => __( 'The fourth footer widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget widgetFooter %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  /*
  to add more sidebars or widgetized areas, just copy
  and edit the above sidebar code. In order to call
  your new sidebar just use the following code:

  Just change the name to whatever your new
  sidebar's id is, for example:

  register_sidebar(array(
    'id' => 'sidebar2',
    'name' => __( 'Sidebar 2', 'bonestheme' ),
    'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  To call the sidebar in your template, you can just copy
  the sidebar.php file and rename it to your sidebar's name.
  So using the above example, it would be:
  sidebar-sidebar2.php

  */
} // don't remove this bracket!

add_action( 'after_setup_theme', 'acme_remove_default_widgets' );
/**
 * When the theme is activated, all of the active widgets are deactived.
 *
 * @since    1.0.0
 */
function acme_remove_default_widgets() {

  if ( ! get_option( 'acme_cleared_widgets' ) ) {

    update_option( 'sidebars_widgets', array() );
    update_option( 'acme_cleared_widgets', true );

  }

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






function list_pings( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment; ?>
  <li id="comment-<?php comment_ID(); ?>">
    <span class="pingcontent">
      <?php printf(__('<cite class="fn">%s</cite> <span class="says"></span>'), get_comment_author_link()) ?>
      <?php comment_text(); ?>
    </span>
  </li>
<?php } // end list_pings
function get_past_editors() {
  $blogusers = get_users( 'orderby=nicename&role=contributor' );
  // Array of WP_User objects.
  foreach ( $blogusers as $user ) {
    $userdirectory .= '<div class="userdir panel panel-default">
      <div class="panel-body"><h5>' . $user->display_name . '</h5><p>' . $user->description .

      '</p></div>
  </div>';
  }
  return $userdirectory;
}
function get_current_editors_test($postdate) {
    $options = get_option('dhnsm_settings');
        $db_pie_field = $options['dhnsm_text_field_0'];
        global $wpdb;

        //setup the query arguments
        $args = array (
                'meta_query' => array(
                array( 'key' => $db_pie_field, 'count_total' => true ),),);
        $current_week = date("W");

        //initiate the user query and call the $args
        $user_query = new WP_User_Query( $args );

        global $userdetails;
        if ( ! empty($user_query->results)) {
          //then setup variables for each user

          foreach ($user_query->results as $user) {
              $checkbox = get_user_meta($user->ID, $db_pie_field, true);
              if (is_array($checkbox) && in_array($postdate, get_user_meta($user->ID, $db_pie_field, true), false)) {
                $current_el_id[] = $user->ID;
              } //end if
          } //end foreach
        } //endif
        return $current_el_id;
} //end get_current_editors

define('CHARSET', 'UTF-8');
define('REPLACE_FLAGS', ENT_COMPAT);
function html($string) {
    return htmlspecialchars($string, REPLACE_FLAGS, CHARSET);
}

function construct_el_info($weekno) {
    $options = get_option('dhnsm_settings');
        $db_pie_field = $options['dhnsm_text_field_0'];
        global $wpdb;
        $popover = '';
        $current_eds = get_current_editors_test($weekno);
        $count = count($current_eds);
        $x = 0;
        foreach ($current_eds as $current_ed) {
          $x++;
          $userinfo = get_userdata($current_ed);
          $username = $userinfo->user_login;
          $description = $userinfo->description;
      $institutionalaffil = get_user_meta($current_ed, 'pie_text_4', true);
      $optout = 'true';
      $optoutcheckbox = get_user_meta($current_ed, 'pie_radio_7', true);
      if ($x < $count) {
        if (is_array($optoutcheckbox) && in_array($optout,$optoutcheckbox)) {
          $popcontent = '<strong>This user has opted out.';
        } elseif (empty($description) == TRUE && empty($institutionalaffil) == TRUE) {
          $popcontent = '<strong>This user has not edited their profile. If this is your profile, please login to your account and edit your user profile.</strong>';
        }
        else {
          if (empty($institutionalaffil) == TRUE) {
                            $popcontent = '<strong>Institution:</strong> Not provided. If this is your profile, please login to edit your profile.<br>';
                        } else {
                        //generate popover content
                            $popcontent = '<strong>Institution:</strong>' . $institutionalaffil . '<br>';
                        }
                        if (empty($description) == TRUE) {
                            $popcontent .= '<strong>Bio:</strong> Not provided. If this is your profile, please login to edit your profile.<br>';
                        } else {
                            $popcontent .= '<strong>Bio: </strong>' . htmlspecialchars($description) . '<br>';
                        }
        }
      //create popover
      $popover .= '<a tabindex="0" data-toggle="popover" data-placement="auto" data-trigger="focus" data-content="'. $popcontent . '" data-html="true" title="' . $userinfo->display_name . '" data-content"'. $userinfo->display_name . '">' . $userinfo->display_name . '</a>, ';
      }
      elseif ($x == $count) {
            if (is_array($optoutcheckbox) && in_array($optout,$optoutcheckbox)) {
          $popcontent = '<strong>This user has opted out.';
        } elseif (empty($description) == TRUE && empty($institutionalaffil) == TRUE) {
          $popcontent = '<strong>This user has not edited their profile. If this is your profile, please login to your account and edit your user profile.</strong>';
        }
        else {
          if (empty($institutionalaffil) == TRUE) {
                            $popcontent = '<strong>Institution:</strong> Not provided. If this is your profile, please login to edit your profile.<br>';
                        } else {
                        //generate popover content
                            $popcontent = '<strong>Institution: </strong>' . $institutionalaffil . '<br>';
                        }
                        if (empty($description) == TRUE) {
                            $popcontent .= '<strong>Bio:</strong> Not provided. If this is your profile, please login to edit your profile.<br>';
                        } else {
                            $popcontent .= '<strong>Bio: </strong>' . htmlspecialchars($userinfo->description) . '<br>';
                        }
        }
        $popover .= '<a tabindex="0" data-toggle="popover" data-placement="auto" data-trigger="focus" data-content="'. $popcontent . '" data-html="true" title="<p>' . $userinfo->display_name . '</p>" data-content"'. $userinfo->display_name . '">' . $userinfo->display_name . '</a>.';
			}

        }
        return $popover;
}


function EL_info($postID,  $post) {
  global $_POST;
  $postdate = get_the_date('Y/m/d', $postID);
  $currentpostdate = new DateTime($postdate);
  $weekno = $currentpostdate->format("W");

  $els = construct_el_info($weekno);
	remove_action('publish_post', 'EL_info', 10, 2);
	update_post_meta($postID, 'editors-at-large-statement', $els);
	add_action('publish_post', 'EL_info', 10, 2);
  add_post_meta($postID, 'editors-at-large-statement', $els, true);
  return $postID;
  }
  add_action('publish_post', 'EL_info', 10, 2);
//populat the our editors page
function get_all_editors() {
  //query arguments
  $args = array(
    'role' => 'Contributor'
    );
  $eds = "<table class='table-striped'><tr><th>Name</th><th>Institutional Affiliation</th><th>Twitter Handle</th></tr>";
  //the query
  $user_query = new WP_User_Query( $args );

  // User loop
  if (! empty($user_query->results) ) {
    foreach ($user_query->results as $user) {
      $institutionalaffil = get_user_meta($user->ID, 'pie_text_4', true);
      $twitterhandle = get_user_meta($user->ID, 'pie_text_5', true);
      $eds .= '<tr><td>' . $user->display_name . '</td><td>' . $institutionalaffil . '</td><td>' . $twitterhandle .'</td></tr>'; }
  } else {
    echo 'No users found';
  }
$eds .= '</table>';
return $eds;

}

?>
