function UploadDone(result) {
	if(result) {
		console.log("upload done!");

		// enable upload button
		$('.file-button').removeAttr("disabled");
		$('.upload-button').removeAttr("disabled");

		// redirect the user to the dashboard
		window.location.replace("/dashboard/first");

		// the user should be auto logged in now, make the page look like auto logged in
		$('#email').attr("readonly", "true");
		$('.menu-navbar-bitlet').html(
			'<span id="welcome">Welcome ' + $('#email').val() +
			', </span><a id="account" href="/dashboard">View your account</a>');
	} else {
		console.error("upload error!");
		
		//TODO: Redirect to error page
	}
}

// file upload handler
$('.file-button').change(function() {
	// disable mail check interval or it'll cause the buttons to be enabled
	clearInterval(mailCheckRun);

	// disable the file selection button
	$('.upload-button').attr('disabled', 'disabled');
	$('.file-button').attr('disabled', 'disabled');
	$('#email').attr('readonly', 'true');

	// change the button to show loading animation
	$('.upload-button').html('<img src="/img/loading.gif"/> Uploading..');

	// finally submit the form through hidden button
	$('#homeUpload').submit();
});
