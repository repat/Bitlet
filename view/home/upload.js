var UploadDone = function(result) {
	if(result) {
		console.log("upload done!");

		// hide loading div
		document.getElementById("loading-bg").style.display = 'hidden';
		document.getElementById("loading").style.display = 'hidden';

		// enable upload button
		$('.file-button').removeAttr("disabled");
		$('.upload-button').removeAttr("disabled");

	} else {
		console.error("upload error!");
		
		//TODO: Redirect to error page
	}
}

