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
			if(data.success == true) {
				$("#emailToReset").val('');
				$('.alert').remove();	
				var resetMessage = "<div class='alert fade in resetDetailsAlert'><button type='button' class='close' data-dismiss='alert'>x</button><p class='alert-heading'>We have sent a new password to your email. Hope to see you soon!</p></div>";
				$('#resetPassSubBtn').after(resetMessage);
			} else {
				$("#emailToReset").val('');
				$('.alert').remove();	
				var resetMessage = "<div class='alert alert-block alert-error fade in resetDetailsAlert'><button type='button' class='close' data-dismiss='alert'>x</button><p class='alert-heading'>We couldn't find your email<p></div>";
				console.log(resetMessage);
				$('#resetPassSubBtn').after(resetMessage);
			}
		}, "json");

	// clear password input form
	$('#emailToReset').val('');
});
