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


// DHNOW SPECIFIC functions
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




?>
