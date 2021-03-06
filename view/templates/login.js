function showLogin() {
	// wire up the buttons to dismiss the modal when shown
	$("#LoginModal").bind("show", function() {
		$("#LoginModal a.btn").click(function(e) {
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
$("#bitletLoginSubmitbtn").click(function(event) {
	// enable submit button loading state
	$("#bitletLoginSubmitbtn").button('loading');

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
				window.location.href = '/dashboard';
			} else {
					$("#bitletLoginSubmitbtn").button('reset');
					$('.loginPassword').val('');
					$('.loginEmail').val('');
					$('.alert-block').remove();	
					$loginErrorMessage = "<div class='alert alert-block alert-error fade in'><button type='button' class='close' data-dismiss='alert'>x</button><p class='alert-heading'>Wrong Username/Email and password combination</p></div>";
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
			window.location.href ='/';	
		}, "json");
	return false;
});

// attach a click handler to the logout button
$("#bitletLoginNewAccount").click(function(event) {
			window.location.href ='/signup';	
});

