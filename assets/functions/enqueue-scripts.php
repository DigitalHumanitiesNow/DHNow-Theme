<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

    // Load What-Input files in footer
    wp_enqueue_script( 'what-input', get_template_directory_uri() . '/vendor/what-input/what-input.min.js', array(), '', true );

    // Adding Foundation scripts file in the footer
    wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/assets/js/foundation.min.js', array( 'jquery' ), '6.0', true );

    // Adding scripts file in the footer
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '', true );

    // Register main stylesheet
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/css/style.css', array(), '', 'all' );

    // Register FontAwesome
    wp_enqueue_style( 'prefix-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', array(), '4.5.0' );
    //google recaptcha
    wp_enqueue_script( 'recaptcha', 'https://www.google.com/recaptcha/api.js' );

    if(is_page()) {
      global $wp_query;

      $template_name = get_post_meta($wp_query->post->ID, '_wp_page_template', true);

      if($template_name == "page-feeds.php"){

          wp_enqueue_script('datatables', 'https://cdn.datatables.net/1.10.12/js/jquery.dataTables.js', true);

          wp_enqueue_style('datatables_css', 'https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css', false );

      }
    }
    //wp_enqueue_script( 'strength-js', get_template_directory_uri() . '/assets/js/strength.js', array('jquery'), '', true);
    //wp_enqueue_style( 'strength-css', get_template_directory_uri(). '/assets/css/strength.css', array(), '', 'all');
    //wp_enqueue_script( 'password-strength-meter' );
    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);
