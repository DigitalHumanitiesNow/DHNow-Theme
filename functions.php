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
      $popover .= '<span style="border-bottom: dotted 1px #8a8a8a; font-weight: bold;" data-toggle="' . $userinfo->display_name . '">' . $userinfo->display_name .  '</span>' . '<div class="dropdown-pane" id="' . $userinfo->display_name . '" data-dropdown>' . $popcontent . '</div>,';
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
          $popover .= '<span style="border-bottom: dotted 1px #8a8a8a; font-weight: bold;" data-toggle="' . $userinfo->display_name . '">' . $userinfo->display_name .  '</span>' . '<div class="dropdown-pane" id="' . $userinfo->display_name . '" data-dropdown>' . $popcontent . '</div>,';
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
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */
/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */
// if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
// 	require_once dirname( __FILE__ ) . '/cmb2/init.php';
// } elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
// 	require_once dirname( __FILE__ ) . '/CMB2/init.php';
// }



add_action( 'cmb2_admin_init', 'yourprefix_register_user_profile_metabox' );
/**
 * Hook in and add a metabox to add fields to the user profile pages
 */
function yourprefix_register_user_profile_metabox() {
	$prefix = 'yourprefix_user_';
	/**
	 * Metabox for the user profile screen
	 */
	$cmb_user = new_cmb2_box( array(
		'id'               => $prefix . 'edit',
		'title'            => __( 'User Profile Metabox', 'cmb2' ), // Doesn't output for user boxes
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
	) );

  $cmb_user->add_field( array(
    'name'    => __( '2016 Sign Up Dates', 'cmb2' ),
    'desc'    => __( 'field description (optional)', 'cmb2' ),
    'id'      => 'pie_checkbox_3',
    'type'    => 'multicheck',
    // 'multiple' => true, // Store values in individual rows
    'options' => array(
      '40' => __( 'Oct 1-7th', 'cmb2' ),
      '41' => __( 'Oct 8-14th', 'cmb2' ),
      '42' => __( 'October 15-21st', 'cmb2' ),
      '43' => __( 'October 22-28th', 'cmb2' ),
      '44' => __( 'October 29-November 4th', 'cmb2' ),
      '45' => __( 'November 5-11th', 'cmb2' ),
      '46' => __( 'November 12-18th', 'cmb2' ),
      '47' => __( 'November 19-25th', 'cmb2' ),
      '48' => __( 'November 26-December 2nd', 'cmb2' ),
      '49' => __( 'December 3-9th', 'cmb2' ),
      '50' => __( 'December 10-16th', 'cmb2' ),
      '51' => __( 'December 17-23rd', 'cmb2' ),
      '52' => __( 'December 24-30th', 'cmb2' ),
    ),
    // 'inline'  => true, // Toggles display to inline
  ) );

}
//add_action( 'cmb2_admin_init', 'yourprefix_register_theme_options_metabox' );

function vb_register_user_scripts() {
  // Enqueue script
  wp_register_script('vb_reg_script', get_template_directory_uri() . '/assets/js/registration.js', array('jquery'), null, false);
  wp_enqueue_script('vb_reg_script');

  wp_localize_script( 'vb_reg_script', 'vb_reg_vars', array(
        'vb_ajax_url' => admin_url( 'admin-ajax.php' ),
      )
  );
}
add_action('wp_enqueue_scripts', 'vb_register_user_scripts', 100);
function add_user_signupmeta($userid, $voldates) {
  add_user_meta( $userid, 'pie_checkbox_3', $voldates);
}
// function captcha_verification() {
//
// 	$response = isset( $_POST['g-recaptcha-response'] ) ? esc_attr( $_POST['g-recaptcha-response'] ) : '';
//
// 	$remote_ip = $_SERVER["REMOTE_ADDR"];
//
// 	// make a GET request to the Google reCAPTCHA Server
// 	$request = wp_remote_get(
// 		'https://www.google.com/recaptcha/api/siteverify?secret=6LcEcC8UAAAAANYjC9ND4B8UHqIZg6HT4bYULYS-&response=' . $response . '&remoteip=' . $remote_ip
// 	);
//
// 	// get the request response body
// 	$response_body = wp_remote_retrieve_body( $request );
//
// 	$result = json_decode( $response_body, true );
//
// 	return $result['success'];
// }
/**
 * New User registration
 *
 */



	function gglcptch_get_response( $privatekey ) {
		$args = array(
			'body' => array(
				'secret'   => $privatekey,
				'response' => stripslashes( esc_html( $_POST['captcha'] ) )
			),
			'sslverify' => false
		);
		$resp = wp_remote_post( 'https://www.google.com/recaptcha/api/siteverify', $args );
		return json_decode( wp_remote_retrieve_body( $resp ), true );
	}
  function check_captcha() {
     $privatekey = '6LcEcC8UAAAAANYjC9ND4B8UHqIZg6HT4bYULYS-';
     $response = gglcptch_get_response( $privatekey );
     if ($response['success']) {
      return 1;
     } else {
      return 2;
     }
  }

 function vb_reg_new_user() {

$cap_check = check_captcha();



 if($cap_check == 2){
   die("Captcha failure, code 2");
 }

  //$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcEcC8UAAAAANYjC9ND4B8UHqIZg6HT4bYULYS-".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);

   // Verify nonce
   if( !isset( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'vb_new_user' ) ) {
     die( 'Ooops, something went wrong, please try again later.' );
   } if($response.success==false){
     die( 'Captcha error');
	 } else {
   // Post values
     $username = $_POST['user'];
     $password = $_POST['pass'];
     $email    = $_POST['mail'];
     $fname    = $_POST['firstname'];
     $lname    = $_POST['lastname'];
     $instaffil = $_POST['institution'];
     $loc       = $_POST['location'];
     $twitter  = $_POST['twitterhandle'];
     $bio  = $_POST['userbio'];
     $voldates = $_POST['volunteerdates'];
     $username = sanitize_text_field($username);
     $fname = sanitize_text_field($fname);
     $lname = sanitize_text_field($lname);
     $instaffil = sanitize_text_field($instaffil);
     $loc = sanitize_text_field($loc);
     $twitter  = sanitize_text_field($twitter);
     $bio  = sanitize_text_field($bio);
     $userdata = array(
       'user_login' => $username,
       'user_pass'  => $password,
       'user_email' => $email,
       'first_name' => $fname,
       'last_name' => $lname,
       'description' => $bio,
       'role' => 'pending'
     );

     $user_id = wp_insert_user( $userdata ) ;

     // Return
     if( !is_wp_error($user_id) ) {
         echo '1';
         notifyadmin($email, $username, $fname, $lname);
         notifyuser($email, $fname, $lname);
     } else {
         echo $user_id->get_error_message();
     }
   add_user_signupmeta($user_id, $voldates);
   die();
 }
}//on line 49 of registration.js we use this action. This essentially asks wordpress to listen for the action and then run this function.
add_action('wp_ajax_register_user', 'vb_reg_new_user');
add_action('wp_ajax_nopriv_register_user', 'vb_reg_new_user');

function notifyadmin($email, $username, $fname, $lname) {
  $headers[] = 'Content-Type: text/html; charset=UTF-8';
  $to = "dhnow@pressforward.org";
  $subject = "New User Registration";
  $message = "A new user has registered. Here are the users details: <br> Username: " . $username . "<br>Email: " . $email . "<br>Name: " . $fname . " " . $lname . "<br> Please login to approve this user.";
  wp_mail($to, $subject, $message, $headers);
}

function notifyuser($email, $fname, $lname) {
  $headers[] = 'Content-Type: text/html; charset=UTF-8';
  $subject = "Thank You for Registering for Digital Humanities Now";
  $message = "Dear " . $fname . " " . $lname . ", <br>" . "Thank you for signing up to edit Digital Humanities Now. A request for approval has been sent to the site manager for DHNow. You will receive a confirmation email with your login information for digitalhumanitiesnow.org and instructions for using the PressForward plugin to nominate content for DHNow within the next 24-48 hours. If you have any questions, please email us at dhnow@pressforward.org or find us on Twitter @dhnow.<br>Thank You,<br>The Managing Editors of Digital Humanities Now";
  wp_mail($email, $subject, $message, $headers);
}


function rolescheck() {
    $default_caps = array(
        'read' => false,
        'upload_files' => false,
        'manage_options' => false,
        'manage_members' => false,
        'is_premium_member' => false,
        'is_approved_member' => false,
    );
    if (! get_role( 'pending' ) ) {
       add_role('pending', 'Pending Approval', $default_caps);
   }
}
add_action('init', 'rolescheck');


/**
 * Authenticates by username or email and only allow members to login
 *
 * @param    user
 * @param    username
 * @param    password
 * @return    bool
 */
function auth_email_username( $user, $username, $password ) {
    $field = is_email($username) ? 'email' : 'login';
    $user = get_user_by($field, $username);
    if ( $user && !is_wp_error($user) )
            $username = $user->user_login;
    if ( user_can($user, 'administrator') || user_can($user, 'contributor')) {
            return wp_authenticate_username_password( null, $username, $password );
    }
    return new WP_Error('login', __('You do not have permission to login at this time.'));
}
add_filter( 'authenticate', 'auth_email_username', 20, 3 );


//this sends the user an email when they are upgraded to contributor.
function user_role_update( $user_id, $new_role ) {
    $site_url = get_bloginfo('wpurl');
    $user_info = get_userdata( $user_id );

    if (user_can( $user_id, 'contributor' ) ) {

        $to = $user_info->user_email;
        $subject = "Role changed: ".$site_url."";
        // $message = "Hello " .$user_info->display_name . " your role has changed on     ".$site_url.", congratulations you are now an " . $new_role;
        $message = "Dear " . $user_info->display_name . ",<br>" . "Thank you for signing up to edit Digital Humanities Now. Your request for an account has been approved, and you can log into the site and set up your user profile by clicking the link below. You will receive an instructional email the week before your first week as editor with instructions on how to use the PressForward plugin and the Nominate This bookmarklet to begin nominating content for DHNow.<br> If you would like to learn more about the duties of an Editor-at-Large before that date, please visit the Editors-at-Large corner of Digital Humanities Now to read through instructions on how to choose and nominate content, and to see the schedule of Editors-at-Large for the current semester.<br>Thank you,<br>Managing Editors, Digital Humanities Now";
        wp_mail($to, $subject, $message);
        $adminnotification_to = "dhnow@pressforward.org";
        $adminnotification_subj = "Role changed:".$site_url."";
        $adminnotification_msg = "The following user: " . $user_info->display_name . " has been upgraded to " . $new_role . " on " . date("Y-m-d h:i:sa") . ". ";
        wp_mail($adminnotification_to, $adminnotification_subj, $adminnotification_msg);
    }

}
add_action( 'set_user_role', 'user_role_update', 10, 2);
function redirect_login_page() {
  $login_page  = home_url( '/login/' );
  $page_viewed = basename($_SERVER['REQUEST_URI']);

  if( $page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
    wp_redirect($login_page);
    exit;
  }
}
add_action('init','redirect_login_page');


function get_active_pffeeds() {
  //set up empty array for feed list.
  $jsfeedlist = "";

  //construct the feeds endpoint url
  //$endpoint_url = site_url($path = 'wp-json/pf/v1/feeds');
  $endpoint_url = 'https://requestb.in/1kkrf7j1';

  //fetch response
  $response = wp_remote_get($endpoint_url);

  //account for errors
  if( is_wp_error( $response ) ) {
    return;
  }


  $header = $response['headers'];


  $totalpages = $header['x-wp-totalpages'];

  $i = 1;

  while( $i<=$totalpages ) {
    $endpointpage = $endpoint_url . '&page=' . $i;
    $getpageresponse = wp_remote_get($endpointpage);
    $feeds = json_decode(wp_remote_retrieve_body($response));
    foreach( $feeds as $feed ) {
      $jsfeedlist .= '<tr><td><a href="' . $feed->feedUrl . '">' . $feed->title->rendered . '</a></td><td>' . $feed->ab_alert_msg . '</td></tr>';
    }
    $i++;
  }

 return '<table class="display" cellspacing="0" width="100%" id="archive_table">
        <thead>
          <th>Feed</th>
          <th>Broken?</th>
        </thead>

        <tbody>' . $jsfeedlist . '</tbody>
        </table>';
}
?>
