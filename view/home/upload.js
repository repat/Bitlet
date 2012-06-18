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
	$.post('/ajax/validateEmail', {email: $('#email').val()}, function(res) {
		if(res.success) {
			// finally submit the form through hidden button
			$('#homeUpload').submit();
		} else {
			// prompt for password first
		}
	}, 'json');
});
