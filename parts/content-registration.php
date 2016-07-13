<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
  <header class="entry-header">
    <?php the_title('<h1 class="entry-title">', '</h1>') ?>
  </header>
  <div class="entry-content">
    <div class="vb-registration-form">
  <form class="form-horizontal registraion-form" id="reg-form" role="form">

      <div class="row">
        <div class="medium-6 columns">
        <label for="vb_name" >Name</label>
        <input type="text" name="vb_name" id="vb_name" value="" placeholder="Your Name" required/>
      </div>
    </div>

    <div class="row">
      <div class="medium-6 columns">

      <label for="vb_email" class="sr-only">Your Email</label>
      <input type="email" name="vb_email" id="vb_email" value="" placeholder="Your Email" class="form-control" />
    </div>
  </div>

  <div class="row">
    <div class="medium-6 columns">
      <label for="vb_nick" class="sr-only">Your Nickname</label>
      <input type="text" name="vb_nick" id="vb_nick" value="" placeholder="Your Nickname" class="form-control" />
    </div>
  </div>

  <div class="row">
    <div class="medium-6 columns">
      <label for="vb_username" class="sr-only">Choose Username</label>
      <input type="text" name="vb_username" id="vb_username" value="" placeholder="Choose Username" class="form-control" />
      <span class="help-block">Please use only a-z,A-Z,0-9,dash and underscores, minimum 5 characters</span>
    </div>
  </div>

  <div class="row">
    <div class="medium-6 columns">
      <label for="vb_pass" class="sr-only">Choose Password</label>
      <input type="password" name="vb_pass" id="vb_pass" value="" placeholder="Choose Password" class="form-control" />
      <span class="help-block">Minimum 8 characters</span>
    </div>
  </div>

  <div class="row">
    <div class="medium-6 columns">
      <legend>Check these out</legend>
        <input id="checkbox1" type="checkbox" value="27" name="signup" id="signup"><label for="checkbox1">Checkbox 1</label>
        <input id="checkbox2" type="checkbox" value="28" name="signup" id="signup"><label for="checkbox2">Checkbox 2</label>
        <input id="checkbox3" type="checkbox" value="29" name="signup" id="signup"><label for="checkbox3">Checkbox 3</label>
    </fieldset>
  </div>
</div>

  <div class="row">
    <div class="medium-6 columns">
      <label for="location">Location</label>
      <input type="text" name="vb_location" id="vb_location" value"" placeholder="Your Location" class="form-control" />
    </div>
  </div>

  <div class="row">
    <div class="medium-6 columns">
      <label for="institutional-affil">Institutional Affiliation</label>
      <input type="text" name="vb_institutional-affil" id="vb_institutional-affil" value"" placeholder="Institutional Affiliation" class="form-control" />
    </div>
  </div>



    <?php wp_nonce_field('vb_new_user','vb_new_user_nonce', true, true ); ?>

    <input type="submit" class="btn btn-primary" id="btn-new-user" value="Register" />
  </form>

    <div class="indicator">Please wait...</div>
    <div class="alert result-message"></div>
</div>
  </div>

</article>
