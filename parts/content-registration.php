<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
  <header class="entry-header">
    <?php the_title('<h1 class="entry-title">', '</h1>') ?>
  </header>
  <div class="entry-content">
    <div class="vb-registration-form">
      <form data-abide novalidate>
        <div data-abide-error class="alert callout" style="display:none;">
          <p><i class="fi-alert"></i> There are some errors in your form.</p>
        </div>

        <!-- //Name(r)//// -->

        <div class="row">
          <div class="small-12 columns">
            <label for="vb_name">Name
            <input type="text" name="vb_name" id="vb_name" aria-describedby="nameHelpTex" required>
          </label>
          <p class="help-text" id="nameHelpTex">Enter your name here.</p>
        </div>
      </div>

      <!-- //EMAIL(r)// -->

        <div class="row">
          <div class="small-12 columns">
            <label for="vb_email">Email
            <input type="email" name="vb_email" id="vb_email" aria-describedby="emailHelpTex" required>
          </label>
          <p class="help-text" id="emailHelpTex">Enter a valid email address here.</p>
        </div>
      </div>

      <!-- //PASSWORD(r)// -->

      <div class="row">
        <div class="small-12 columns">
          <label for="vb_pass">Password
          <input type="password" name="vb_pass" id="vb_pass" aria-describedby="passHelpTex" required>
          <span class="form-error">
            I'm required!
          </span>
        </label>
        <p class="help-text" id="emailHelpTex">Choose a password.</p>
      </div>
    </div>

    <div class="row">
      <div class="small-12 columns">
        <label for="vb_pass">Re-enter Password
        <input type="password" name="vb_pass2" id="vb_pass2" aria-describedby="passHelpTex2" required pattern="alpha_numeric" data-equalto="vb_pass">
        <span class="form-error">
          Passwords must match.
        </span>
      </label>
      <p class="help-text" id="passHelpTex2">Re-enter your password to confirm.</p>
    </div>
  </div>

  <!-- USERNAME (r) -->

  <div class="row">
    <div class="small-12 columns">
      <label for="vb_username">Username
      <input type="text" name="vb_username" id="vb_username" aria-describedby="usernameHelpTex" required>
      <span class="form-error">
        You must enter a username.
      </span>
    </label>
    <p class="help-text" id="usernameHelpTex">Enter a username here.</p>
  </div>
</div>

<!-- Institutional Affiliation -->

<div class="row">
  <div class="small-12 columns">
    <label for="vb_username">Username
    <input type="text" name="vb_username" id="vb_username" aria-describedby="usernameHelpTex" required>
    <span class="form-error">
      You must enter a username.
    </span>
  </label>
  <p class="help-text" id="usernameHelpTex">Enter a username here.</p>
</div>
</div>

<!-- Location -->

<div class="row">
  <div class="small-12 columns">
    <label for="vb_username">Username
    <input type="text" name="vb_username" id="vb_username" aria-describedby="usernameHelpTex" required>
    <span class="form-error">
      You must enter a username.
    </span>
  </label>
  <p class="help-text" id="usernameHelpTex">Enter a username here.</p>
</div>
</div>

  <!-- SUBMIT/RESET -->
  <div class="row">
    <fieldset class="large-6 columns">
      <button class="button" type="submit" value="Submit">Submit</button>
    </fieldset>
    <fieldset class="large-6 columns">
      <button class="button" type="reset" value="Reset">Reset</button>
    </fieldset>
  </div>

      </form>

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

  <!-- <input type="password" name="password" />
   <input type="password" name="password_retyped" />
   <span id="password-strength"></span> -->

  <div class="row">
    <div class="medium-6 columns">
      <label for="vb_pass" class="sr-only">Choose Password</label>
      <input type="password" name="password" id="vb_pass" value="" placeholder="Choose Password" class="form-control" />
      <input type="password" name="password_retyped" value="" placeholder="Confirm Password" class="form-control" />
      <span id="password-strength"></span>
      <!-- <div id="result" class="callout">
      <p>Please pick a password with a miniumum of 8 characters.</p>
    </div> -->
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

    <input type="submit" class="button" id="btn-new-user" disabled="disabled" value="Submit" />
  </form>

    <div class="indicator">Please wait...</div>
    <div class="alert result-message"></div>
</div>
  </div>

</article>
