var UploadDone = function(result) {
	if(result) {
		console.log("upload done!");

		// hide loading div
		document.getElementById("loading-bg").style.display = 'none';
		document.getElementById("loading").style.display = 'none';

		// enable upload button
		$('.file-button').removeAttr("disabled");
		$('.upload-button').removeAttr("disabled");

		// show modal
		showUploadDone(result);
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
	$('.FileIFrame').attr('src', 'file');
};
