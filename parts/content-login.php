<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
  <header class="entry-header">
    <?php the_title('<h1 class="entry-title">', '</h1>') ?>
  </header>
  <div class="entry-content">

    <section class="login">
      <?php
      if ( ! is_user_logged_in() ) { // Display WordPress login form:
  $args = array(
      'redirect' => admin_url(),
      'form_id' => 'loginform-custom',
      'label_username' => __( 'Username' ),
      'label_password' => __( 'Password' ),
      'label_remember' => __( 'Remember Me' ),
      'label_log_in' => __( 'Log In' ),
      'id_submit' => __('loginformsubmit'),
      'remember' => true
  );
  wp_login_form( $args );
} else { // If logged in:
  wp_loginout( home_url() ); // Display "Log Out" link.
  echo " | ";
  wp_register('', ''); // Display "Site Admin" link.
}
?>
  </section>
</div>
</article>
