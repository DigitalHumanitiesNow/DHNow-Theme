<?php
function ls_scripts() {
		wp_enqueue_style('brew-child-css', get_stylesheet_directory_uri() . '/library/css/style.css');
		wp_enqueue_style('ls-css', get_stylesheet_directory_uri() . '/library/css/liquid-slider.css');
		wp_enqueue_script( 'jquery-easing', get_stylesheet_directory_uri() .
			'/library/js/jquery.easing.1.3.js', array('jquery'));
		wp_enqueue_script( 'jquery-touchSwipe', get_stylesheet_directory_uri() . '/library/js/jquery.touchSwipe.min.js', array('jquery-easing'));
		wp_enqueue_script( 'jquery-ls', get_stylesheet_directory_uri() . '/library/js/jquery.liquid-slider.min.js', array('jquery-touchSwipe'));
		wp_enqueue_script( 'jquery-ls', get_stylesheet_directory_uri() . '/library/js/libs/bootstrap.min.js', array('jquery'));


}
add_action('wp_enqueue_scripts', 'ls_scripts');
add_action( 'admin_menu', 'custom_remove_menu_pages' );

function custom_remove_menu_pages() {
  $user = wp_get_current_user();
  if ( in_array('contributor', $user->roles) ) {
    remove_menu_page('tools.php');
  }
}
// <!-- SHORTCODES -->

// function active_feeds_function($atts) {
//   extract(shortcode_atts(array(
//       'status' => 'publish',
//     ), $atts));
//
//
//   $return_string = '<ul class="feedlist">';
//   query_posts(array('post_type' => pressforward('schema.feeds')->post_type, 'post_status' =>
//     $status, 'nopaging' => true, 'orderby' => 'title', 'order' => 'ASC'));
//
//   if (have_posts()) :
//     while (have_posts())  : the_post();
//       $return_string .= '<li class="feeditem"><a href="'.get_post_meta(get_the_ID(), 'feedUrl', true).'"target="_blank">'.get_the_title().'</a></li>';
//     endwhile;
//   endif;
//   $return_string .= '</ul>';
// wp_reset_query();
// return $return_string;
// }

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


function nomcount_shortcode() {
  $nomcount = get_post_meta($post->ID, 'nomination_count', true);
  $html = '<p id="nomcount">' . $nomcount . '</p>';
  return $html;
}



function register_shortcodes() {
  add_shortcode('feeds', 'active_feeds_function');
  add_shortcode('nomcount', 'nomcount_shortcode');
}
add_action('init', 'register_shortcodes');


function child_bones_excerpt_more($more) {
  global $post;
  // edit here if you like
  return '... </p>';
}
add_filter( 'excerpt_more', 'child_bones_excerpt_more');

add_image_size( 'brew-child-thumbnail', 200, 200, true );
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







require_once( 'library/navwalker.php' ); // needed for bootstrap navigation


// REDUX.  Needed for custom admin panel
// https://github.com/ReduxFramework/ReduxFramework
// WIP

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/library/admin/ReduxCore/framework.php' ) ) {
  require_once( dirname( __FILE__ ) . '/library/admin/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/library/option-config.php' ) ) {
  require_once( dirname( __FILE__ ) . '/library/option-config.php' );
}

//Removed this on 2/17/2015 to avoid confusion on live site.
// Custom metaboxes and fields
// https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
// add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
// function be_initialize_cmb_meta_boxes() {
//   if ( !class_exists( 'cmb_Meta_Box' ) ) {
//     require_once( 'library/metabox/init.php' );
//   }
// }


/* library/bones.php (functions specific to BREW)
  - navwalker
  - Redux framework
  - Read more > Bootstrap button
  - Bootstrap style pagination
  - Bootstrap style breadcrumbs
*/
require_once( 'library/brew.php' ); // if you remove this, BREW will break
/*
1. library/bones.php
  - head cleanup (remove rsd, uri links, junk css, ect)
  - enqueueing scripts & styles
  - theme support functions
  - custom menu output & fallbacks
  - related post function
  - page-navi function
  - removing <p> from around images
  - customizing the post excerpt
  - custom google+ integration
  - adding custom fields to user profiles
*/
require_once( 'library/bones.php' ); // if you remove this, bones will break
/*
2. library/custom-post-type.php
  - an example custom post type
  - example custom taxonomy (like categories)
  - example custom taxonomy (like tags)
*/
//require_once( 'library/custom-post-type.php' ); // you can disable this if you like
/*
3. library/admin.php
  - removing some default WordPress dashboard widgets
  - an example custom dashboard widget
  - adding custom login css
  - changing text in footer of admin
*/
// require_once( 'library/admin.php' ); // this comes turned off by default
/*
4. library/translation/translation.php
  - adding support for other languages
*/
// require_once( 'library/translation/translation.php' ); // this comes turned off by default

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
add_image_size( 'post-featured', 750, 300, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
  register_sidebar(array(
    'id' => 'sidebar1',
    'name' => __( 'Sidebar 1', 'bonestheme' ),
    'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));


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

}



/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <li <?php comment_class(); ?>>
    <article id="comment-<?php comment_ID(); ?>" class="clearfix comment-container">
      <div class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=64" class="load-gravatar avatar avatar-48 photo" height="64" width="64" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
      </div>
      <div class="comment-content">
        <?php printf(__( '<cite class="fn">%s</cite>', 'bonestheme' ), get_comment_author_link()) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>
        <?php edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ?>
        <?php if ($comment->comment_approved == '0') : ?>
          <div class="alert alert-info">
            <p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
          </div>
        <?php endif; ?>
        <section class="comment_content clearfix">
          <?php comment_text() ?>
        </section>
        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div> <!-- END comment-content -->
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!

/*************** PINGS LAYOUT **************/

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
