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

// enable submit button loading state
$("#bitletLoginSubmitbtn").button();

// attach a submit handler to the login button
$("#bitletLoginSubmitbtn").click(function(event) {

	// get some values from elements on the page:
	var email = $(".loginEmail").val();
	var pass = $(".loginPassword").val();

	// Send the data using post and put the results in a div
	$.post("/ajax/login", {email:email, pass:pass},
		function(data) {
			console.log('login status: '+data.success);
			$("#bitletLoginSubmitbtn").button('reset');
			if(data.success) {
				// hide the dialog box
				$("#LoginModal").modal('hide');
				window.location = '/dashboard';
			} else {
					$('.loginPassword').val('');
					$('.loginEmail').val('');
					$loginErrorMessage = "<div class='alert alert-block alert-error fade in'><button type='button' class='close' data-dismiss='alert'>x</button><h4 class='alert-heading'>We Do Not Recognize You</h4><p>Please reenter your password and username. If you think you entered everything correctly please contact us.</p></div>";
					$('.bitletTopOfLogin').before($loginErrorMessage);
			}
		}, "json");

	// clear password input form
	$('.loginPassword').val('');
});

// attach a click handler to the logout button
$("#logoutBtn").click(function(event) {
	$.post("/ajax/logout", 
		function(data) {
			console.log('logout successful');
			// reload the window on logout
			window.location ='/';	
		}, "json");
});
