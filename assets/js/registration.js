function checkPasswordStrength( $pass1,
                                $pass2,
                                $strengthResult,
                                $submitButton,
                                blacklistArray ) {
        var pass1 = $pass1.val();
    var pass2 = $pass2.val();

    // Reset the form & meter
    $submitButton.attr( 'disabled', 'disabled' );
        $strengthResult.removeClass( 'short bad good strong' );

    // Extend our blacklist array with those from the inputs & site data
    blacklistArray = blacklistArray.concat( wp.passwordStrength.userInputBlacklist() )

    // Get the password strength
    var strength = wp.passwordStrength.meter( pass1, blacklistArray, pass2 );

    // Add the strength meter results
    switch ( strength ) {

        case 2:
            $strengthResult.addClass( 'bad' ).html( pwsL10n.bad );
            break;

        case 3:
            $strengthResult.addClass( 'good' ).html( pwsL10n.good );
            break;

        case 4:
            $strengthResult.addClass( 'strong' ).html( pwsL10n.strong );
            break;

        case 5:
            $strengthResult.addClass( 'short' ).html( pwsL10n.mismatch );
            break;

        default:
            $strengthResult.addClass( 'short' ).html( pwsL10n.short );

    }

    // The meter function returns a result even if pass2 is empty,
    // enable only the submit button if the password is strong and
    // both passwords are filled up
    if ( 4 === strength && '' !== pass2.trim() ) {
        $submitButton.removeAttr( 'disabled' );
    }

    return strength;
}





jQuery( document ).ready( function( $ ) {
    // Binding to trigger checkPasswordStrength
    $( 'body' ).on( 'keyup', 'input[name=password]', 'input[name=password_retyped]',
        function( event ) {
            checkPasswordStrength(
                $('input[name=password]'),         // First password field
                $('input[name=password_retyped]'), // Second password field
                $('#password-strength'),           // Strength meter
                $('input[type=submit]'),           // Submit button
                ['black', 'listed', 'word']        // Blacklisted words
            );
        }
    );
});
jQuery( document ).ready( function( $ ) {
  var form = document.getElementById('reg-form');
  /**
   * When user clicks on button...
   *
   */
  $('#btn-new-user').click( function(event) {
    // if (strength <= 2) {
    //   $('.result-message').html('You have problems.'); // Add success message to results div
    //   die;
    // }
    var elements = this.elements;

    /**
     * Prevent default action, so when user clicks button he doesn't navigate away from page
     *
     */
    if (event.preventDefault) {
        event.preventDefault();
    } else {
        event.returnValue = false;
    }

    // Show 'Please wait' loader to user, so she/he knows something is going on
    $('.indicator').show();

    // If for some reason result field is visible hide it
    $('.result-message').hide();

    // Collect data from inputs
    var reg_nonce = $('#vb_new_user_nonce').val();
    var reg_user  = $('#vb_username').val();
    var reg_pass  = $('#vb_pass').val();
    var reg_mail  = $('#vb_email').val();
    var reg_name  = $('#vb_name').val();
    var reg_nick  = $('#vb_nick').val();
    var checkboxValues = [];
    $('input[name=signup]:checked').map(function() {
            checkboxValues.push($(this).val());
});
console.log(checkboxValues);
    /**
     * AJAX URL where to send data
     * (from localize_script)
     */
    var ajax_url = vb_reg_vars.vb_ajax_url;

    // Data to send
    data = {
      action: 'register_user',
      nonce: reg_nonce,
      user: reg_user,
      pass: reg_pass,
      mail: reg_mail,
      name: reg_name,
      nick: reg_nick,
      volunteerdates: checkboxValues,
    };
    console.log(data);

    // Do AJAX request
    $.post( ajax_url, data, function(response) {

      // If we have response
      if( response ) {

        // Hide 'Please wait' indicator
        $('.indicator').hide();

        if( response === '1' ) {
          // If user is created
          $('.result-message').html('Your submission is complete.'); // Add success message to results div
          $('.result-message').addClass('alert-success'); // Add class success to results div
          $('.result-message').show(); // Show results div
        } else {
          $('.result-message').html( response ); // If there was an error, display it in results div
          $('.result-message').addClass('alert-danger'); // Add class failed to results div
          $('.result-message').show(); // Show results div
        }
      }
    });

  });
});
