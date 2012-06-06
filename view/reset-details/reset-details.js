// enable submit button loading state
$("#resetPassSubBtn").button();

// Attach the submit button to the reset handler 
$("#resetPassSubBtn").click(function(event) {

	// get some values from elements on the page:
	var email = $("#emailToReset").val();

	// Send the data using post and put the results in a div
	$.post("/ajax/resetPassword", {email:email},
		function(data) {
			//console.log('reset status: '+data.success);
			$("#resetPassSubBtn").button('reset');
			if(data.success) {
				// TODO need to create link that is below
				window.location = '/reset-details';
			} else {
					$("#emailToReset").val('');
					$loginErrorMessage = "<div class='alert alert-block alert-error fade in'><button type='button' class='close' data-dismiss='alert'>x</button><p class='alert-heading'>Wrong Username/Email and password combination</p></div>";
					$('.bitletTopOfLogin').before($loginErrorMessage);
			}
		}, "json");

	// clear password input form
	$('#emailToReset').val('');
});
