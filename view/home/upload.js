function UploadDone(result) {
	if(result) {
		console.log("upload done!");

		// enable upload button
		$('.file-button').removeAttr("disabled");
		$('.upload-button').removeAttr("disabled");

		// redirect the user to the dashboard
		window.location.replace("/dashboard/first");
	} else {
		console.error("upload error!");
		window.location.href = '/error';	
	}
}

function Login(email) {
	// wire up the buttons to dismiss the modal when shown
	$("#passwordModal").bind("show", function() {
		$("#passwordModal a.btn").click(function(e) {
			// hide the dialog box
			$("#passwordModal").modal('hide');
		});
	});
	
	// remove the event listeners when the dialog is hidden
	$("#passwordModal").bind("hide", function() {
		// enable upload button
		$('.file-button').removeAttr("disabled");
		$('.upload-button').removeAttr("disabled");

		// remove event listeners on the buttons
		$("#passwordModal a.btn").unbind();
	});
	
	// finally, wire up the actual modal functionality and show the dialog
	$("#passwordModal").modal({
	  "backdrop"  : "static",
	  "keyboard"  : true,
	  "show"      : true    // this parameter ensures the modal is shown immediately
	});

	$('#passwordModal').modal('show');

	// attach submit handle to click
	$("#passwordSubmit").click(function(event) {
		$('#passwordSubmit').button('loading');
		$.post("/ajax/login", {email: email, pass: $('#passwordModalInput').val()}, 
			function(res) {
				// check to see if we successfully logged in
				console.log('login status: '+res.success);
				if(res.success) {
					// hide the dialog box
					$("#passwordModal").modal('hide');
					$('#homeUpload').submit();
				} else {
					$('#passwordSubmit').button('reset');
					$('.loginPassword').val('');
					$loginErrorMessage = "<div class='alert alert-block alert-error fade in'><button type='button' class='close' data-dismiss='alert'>x</button><p class='alert-heading'>Wrong Username/Email and password combination</p></div>";
					$('#passwordError').html($loginErrorMessage);
				}
			}, 'json');
	});
}

// file upload handler
$('.file-button').change(function() {
	// disable mail check interval or it'll cause the buttons to be enabled
	clearInterval(mailCheckRun);

	// disable the file selection button
	$('.upload-button').attr('disabled', 'disabled');
	$('#email').attr('readonly', 'true');

	// change the button to show loading animation
	$('.upload-button').html('<img src="/img/loader/home-upload.gif"/> Uploading..');

	// first validate the email
	var email = $('#email').val();
	$.post('/ajax/validateEmail', {email: email}, function(res) {
		if(!res.success) {
			// create a new account
			$.post('ajax/newuser', {email: email}, function(res) {
				if(res.success) {
					// finally submit the form through hidden button
					$('#homeUpload').submit();
				} else {
					// can't create new account, we're pretty screwed
					window.location.href = '/error';
				}
			}, 'json');
		} else {
			// prompt for password first
			Login(email);
		}
	}, 'json');
});
