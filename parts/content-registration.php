<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
  <header class="entry-header">
    <?php the_title('<h1 class="entry-title">', '</h1>') ?>
  </header>
  <div class="entry-content">
    <div class="vb-registration-form">
      <form data-abide novalidate id="reg-form" class="registration-form">
        <div data-abide-error class="alert callout" style="display:none;">
          <p><i class="fi-alert"></i> There are some errors in your form.</p>
        </div>

        <!--  ////////////
              ACCOUNT INFO
              ////////////  -->
        <div class="row">
          <div class="small-12 medium-12 columns">
            <h2>Account Info</h2>
          </div>
        </div>

              <!--
              Username (required)
              -->

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

            <!--
            Email and Email Confirm (required)
            -->

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

            <!-- Password and password confirm (required) -->

            <div class="row">
              <div class="small-12 medium-6 columns">
                <label for="vb_pass">Password
                <input type="password" name="vb_pass" id="vb_pass" aria-describedby="passHelpTex" required>
                <span class="form-error">
                  Your password must match the requirements.
                </span>
              </label>
              <p class="help-text" id="emailHelpTex">Choose a password.</p>
            </div>



            <div class="small-12 medium-6 columns">
              <label for="vb_pass">Re-enter Password
              <input type="password" name="vb_pass2" id="vb_pass2" aria-describedby="passHelpTex2" required data-equalto="vb_pass">
              <span class="form-error">
                Passwords must match.
              </span>
            </label>
            <p class="help-text" id="passHelpTex2">Re-enter your password to confirm.</p>
            </div>
            </div>
            <?php wp_nonce_field('vb_new_user','vb_new_user_nonce', true, true ); ?>


    <!--  //////////////////
          ABOUT YOU SECTION
          /////////////////  -->

      <div class="row">
        <div class="small-12 medium-12 columns">
          <h2>About You</h2>
        </div>
      </div>

            <!-- First/Last Name (required)-->
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

          <!-- Institutional Affiliation -->

          <div class="row">
            <div class="small-12 medium-4 columns">
              <label for="vb_institutionalaffiliation">Institutional Affiliation
              <input type="text" name="vb_institutionalaffiliation" id="vb_institutionalaffiliation" aria-describedby="institutionHelpTex" required>
            </label>
            <p class="help-text" id="institutionalHelpTex">Enter an institution.</p>
          </div>

          <!-- Location -->

            <div class="small-12 medium-4 columns">
              <label for="vb_location">Location
              <input type="text" name="vb_location" id="vb_location" aria-describedby="locationHelpTex">
            </label>
            <p class="help-text" id="locationHelpTex">Tell us where you're at.</p>
          </div>

          <div class="small-12 medium-4 columns">
            <label for="vb_twitter">Twitter Handle
            <input type="text" name="vb_twitter" id="vb_twitter" aria-describedby="twitterHelpTex">
          </label>
          <p class="help-text" id="usernameHelpTex">Enter your twitter handle. (i.e. @dhnow)</p>
          </div>
          </div>

          <!-- Bio -->

          <div class="row">
            <div class="small-12  medium-12 columns">
              <label for="vb_bio">Bio
              <textarea name="vb_bio" id="vb_bio" aria-describedby="bioHelpTex"></textarea>
            </label>
            <p class="help-text" id="bioHelpTex">Enter a bio.</p>
          </div>
          </div>


    <!--  ////////////////////
          ED-AT-LARGE SECTION
          ///////////////////  -->
    <div class="row">
      <div class="small-12 medium-12 columns">
      <h2>Editor-at-Large Info</h2>
      </div>
    </div>


        <div class="row">
        <!-- Opt Out -->

        <fieldset class="small-12 medium-3 columns">
              <legend>Opt Out</legend>
              <input type="radio" name="optout" value="true" id="optouttrue"><label for="pocketsRed">Yes</label>
              <input type="radio" name="optout" value="false" id="optoutfalse" checked><label for="pocketsBlue">No</label>
        </fieldset>


        <!-- Volunteer Dates -->

        <fieldset class="small-12 medium-9 columns">
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
      <button class="button" type="submit" id="btn-new-user" value="Submit">Submit</button>
    </fieldset>
    <fieldset class="large-6 columns">
      <button class="button" type="reset" value="Reset">Reset</button>
    </fieldset>
  </div>
</div>
      </form>


    <div class="medium-12 columns"  id="successfulregistration" style="display:none;" >
      <div class="callout success">
      <h2>Thank you for registering.</h2>
      <p>Please look for an email from us confirming your registration. We will confirm your account within 3-5 business days.</p>
    </div>
    </div>

</article>
