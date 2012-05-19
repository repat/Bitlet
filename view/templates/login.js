function showLogin() {
	// wire up the buttons to dismiss the modal when shown
	$("#LoginModal").bind("show", function() {
		$("#LoginModal a.btn").click(function(e) {
			// do something based on which button was clicked
			// we just log the contents of the link element for demo purposes
			console.log("button pressed: "+$(this).html());
	
			// hide the dialog box
			$("#LoginModal").modal('hide');
		});
	});
	
	// remove the event listeners when the dialog is hidden
	$("#LoginModal").bind("hide", function() {
		// remove event listeners on the buttons
		$("#LoginModal a.btn").unbind();
	});
	
	// finally, wire up the actual modal functionality and show the dialog
	$("#LoginModal").modal({
	  "backdrop"  : "static",
	  "keyboard"  : true,
	  "show"      : true    // this parameter ensures the modal is shown immediately
	});
};

// attach a submit handler to the login button
$(".bitlet-login-submitbtn").click(function(event) {

	// get some values from elements on the page:
	var email = $(".login-email").val();
	var pass = $(".login-password").val();

	// Send the data using post and put the results in a div
	$.post("/ajax/login", {email:email, pass:pass},
		function(data) {
			console.log('login status: '+data.success);
			if(data.success) {
				// hide the dialog box
				$("#LoginModal").modal('hide');
				// redirect to account page
				window.location.reload();
			} else {
				// TODO: Display warning message
			}
		}, "json");

	// clear password input form
	$('.login-password').val('');
});
