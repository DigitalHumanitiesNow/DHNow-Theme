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
    var first_name  = $('#vb_FirstName').val();
    var last_name  = $('#vb_LastName').val();
    var inst_affil = $('#vb_institutionalaffiliation').val();
    var location = $('#vb_location').val();
    var twitter = $('#vb_twitter').val();
    var bio = $('#vb_bio').val();
    //var optout = $('input[name=optout]:checked');
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
      firstname: first_name,
      lastname: last_name,
      institution: inst_affil,
      location: location,
      twitterhandle: twitter,
      userbio: bio,
      volunteerdates: checkboxValues,
    };
    console.log(data);
    console.log(data.user);
    // Do AJAX request
    $.post( ajax_url, data, function(response) {

      // If we have response
      if( response ) {

        // Hide 'Please wait' indicator
      //  $('.indicator').hide();

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
