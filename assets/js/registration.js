/*
	jQuery document ready.
*/
jQuery(document).ready(function($) {

	/*
		assigning keyup event to password field
		so everytime user type code will execute
	*/

	$('#vb_pass').keyup(function()
	{
		$('#result').html(checkStrength($('#vb_pass').val()))
	})

	/*
		checkStrength is function which will do the
		main password strength checking for us
	*/

	function checkStrength(password)
	{
		//initial strength
		var strength = 0

		//if the password length is less than 8, return message.
		if (password.length < 8) {
			$('#result').removeClass()
			$('#result').addClass('callout alert')
			return 'Too short'
		}

		//length is ok, lets continue.

		//if length is 9 characters or more, increase strength value
		if (password.length > 9) strength += 1

		//if password contains both lower and uppercase characters, increase strength value
		if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  strength += 1

		//if it has numbers and characters, increase strength value
		if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))  strength += 1

		//if it has one special character, increase strength value
		if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 1

		//if it has two special characters, increase strength value
		if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1

		//now we have calculated strength value, we can return messages

		//if value is less than 2
		if (strength < 2 )
		{
			$('#result').removeClass()
			$('#result').addClass('callout alert')
			return 'This password is too weak. Please include both upper and lowercase characters, one special character, and one number.'
		}
		else if (strength >= 3 )
		{
			$('#result').removeClass()
			$('#result').addClass('callout success')
			return 'This is a strong password.'
		}
	}
});


jQuery(document).ready(function($) {
  var form = document.getElementById('reg-form');
  /**
   * When user clicks on button...
   *
   */
  $('#btn-new-user').click( function(event) {
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
