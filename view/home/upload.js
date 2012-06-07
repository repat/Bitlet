function UploadDone(result) {
	if(result) {
		console.log("upload done!");

		// enable upload button
		$('.file-button').removeAttr("disabled");
		$('.upload-button').removeAttr("disabled");

		// show modal
		showUploadDone(result);

		// the user should be auto logged in now, make the page look like auto logged in
		$('#email').attr("disabled", "disabled");
		$('.menu-navbar-bitlet').html(
			'<span id="welcome">Welcome ' + $('#email').val() +
			', </span><a id="account" href="/dashboard">View your account</a>');
	} else {
		console.error("upload error!");
		
		//TODO: Redirect to error page
	}
}

function showUploadDone(result) {
	// wire up the buttons to dismiss the modal when shown
	$("#FileModal").bind("show", function() {
		$("#FileModal a.btn").click(function(e) {
			// do something based on which button was clicked
			// we just log the contents of the link element for demo purposes
			console.log("button pressed: "+$(this).html());
	
			// hide the dialog box
			$("#FileModal").modal('hide');
		});
	});
	
	// remove the event listeners when the dialog is hidden
	$("#FileModal").bind("hide", function() {
		// remove event listeners on the buttons
		$("#FileModal a.btn").unbind();
	});
	
	// finally, wire up the actual modal functionality and show the dialog
	$("#FileModal").modal({
	  "backdrop"  : "static",
	  "keyboard"  : true,
	  "show"      : true    // this parameter ensures the modal is shown immediately
	});

	// load the iframe page
	$('.FileIFrame').attr('src', 'iframe/file/'+result);
};
