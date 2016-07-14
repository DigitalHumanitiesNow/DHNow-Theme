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

        <div class="row">
          <div class="small-12 medium-12 columns">
            <h2>Account Info</h2>
          </div>
        </div>

        <!-- USERNAME (r) -->

        <div class="row">
          <div class="small-12 medium-12 columns">
            <label for="vb_username">Username
            <input type="text" name="vb_username" id="vb_username" aria-describedby="usernameHelpTex" required>
            <span class="form-error">
              You must enter a username.
            </span>
          </label>
          <p class="help-text" id="usernameHelpTex">Enter a username here.</p>
        </div>
      </div>

      <!-- //EMAIL(r)// -->

        <div class="row">
          <div class="small-12 medium-6 columns">
            <label for="vb_email">Email
            <input type="email" name="vb_email" id="vb_email" aria-describedby="emailHelpTex" required>
          </label>
          <p class="help-text" id="emailHelpTex">Enter a valid email address here.</p>
        </div>



        <div class="small-12 medium-6 columns">
          <label for="vb_email-confirm">Confirm Email
          <input type="email" name="vb_email-confirm" id="vb_email-confirm" aria-describedby="email-confirmHelpTex" data-equalto="vb_email" required>
          <span class="form-error">
            Email addresses don't match.
          </span>
        </label>
        <p class="help-text" id="emailHelpTex">Enter a valid email address here.</p>
      </div>
    </div>




      <!-- About You -->
      <div class="row">
        <div class="small-12 medium-12 columns">
          <h2>About You</h2>
        </div>
      </div>
      <!-- First/Last Name -->
      <div class="row">
        <div class="small-12 medium-6 columns">
          <label for="vb_FirstName">First Name
          <input type="text" name="vb_FirstName" id="vb_FirstName" aria-describedby="FirstNameHelpTex" required>
          <span class="form-error">
            Your first name is required.
          </span>
        </label>
      </div>

      <div class="small-12 medium-6 columns">
        <label for="vb_LastName">Last Name
        <input type="text" name="vb_LastName" id="vb_LastName" aria-describedby="LastNameHelpTex" required>
        <span class="form-error">
          Your last name is required.
        </span>
      </label>
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
    <label for="vb_institutionalaffiliation">Institutional Affiliation
    <input type="text" name="vb_institutionalaffiliation" id="vb_institutionalaffiliation" aria-describedby="institutionHelpTex">
  </label>
  <p class="help-text" id="usernameHelpTex">If you enter a institution and choose not to opt out, this information will be displayed on Editor's Choice posts for the weeks you serve as an Editor-At-Large.</p>
</div>
</div>

<!-- Location -->

<div class="row">
  <div class="small-12 columns">
    <label for="vb_location">Location
    <input type="text" name="vb_location" id="vb_location" aria-describedby="locationHelpTex">
  </label>
  <p class="help-text" id="usernameHelpTex">Tell us where you're at.</p>
</div>
</div>

<!-- Twitter Handle -->

<div class="row">
  <div class="small-12 columns">
    <label for="vb_twitter">Twitter
    <input type="text" name="vb_twitter" id="vb_twitter" aria-describedby="twitterHelpTex">
  </label>
  <p class="help-text" id="usernameHelpTex">Enter your twitter handle. (i.e. @dhnow)</p>
</div>
</div>

<!-- Bio -->
<div class="row">
  <div class="small-12 columns">
    <label for="vb_bio">Bio
    <textarea name="vb_bio" id="vb_bio" aria-describedby="bioHelpTex"></textarea>
  </label>
  <p class="help-text" id="bioHelpTex">Enter a bio.</p>
</div>
</div>

<!-- Opt Out -->
<div class="row">
<fieldset class="large-6 columns">
      <legend>Opt Out</legend>
      <input type="radio" name="optout" value="true" id="optouttrue"><label for="pocketsRed">Yes</label>
      <input type="radio" name="optout" value="false" id="optoutfalse" checked><label for="pocketsBlue">No</label>
</fieldset>
</div>

<!-- Volunteer Dates -->
<div class="row">
<fieldset class="small-12 columns">
<legend>Sign Up Dates</legened><br>
<input id="checkbox1" type="checkbox" value="27" name="signup" id="signup"><label for="checkbox1">Checkbox 1</label>
<input id="checkbox2" type="checkbox" value="28" name="signup" id="signup"><label for="checkbox2">Checkbox 2</label>
<input id="checkbox3" type="checkbox" value="29" name="signup" id="signup"><label for="checkbox3">Checkbox 3</label>
<p class="help-text">Editor-at-Large weeks run from x to x. Use these boxes to select the weeks you would like to volunteer as an Editor-at-Large. You can always edit these in your profile.</p>
</fieldset>
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
