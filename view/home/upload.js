var UploadDone = function(result) {
	if(result) {
		console.log("upload done!");

		// hide loading div
		document.getElementById("loading-bg").style.display = 'none';
		document.getElementById("loading").style.display = 'none';

		// enable upload button
		$('.file-button').removeAttr("disabled");
		$('.upload-button').removeAttr("disabled");

	} else {
		console.error("upload error!");
		
		//TODO: Redirect to error page
	}
}

