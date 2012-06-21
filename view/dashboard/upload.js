function UploadDone(result) {
	if(result) {
		console.log("upload done!");

		// enable upload button
		$('.file-button').removeAttr("disabled");
		$('#uploadBbutton').removeAttr("disabled");

		// change the button to show loading animation
		$('#uploadButton').removeClass('hovered');
		$('#uploadButton').html('<img src="/img/upload.png"/>New Item');
		console.log("file uploaded, fid="+result);

		// if currently viewing products table
		if(tableSelected == 0) {
			// set the global current fid as the new fid for updating details
			fid = result;

			// reload the products table
			DisplayProducts(result);

			// clear right content
			// TODO: loading animation needs to go here
			$('#rightContent').html('');

			// start sizing the right side container
			ExpandRight();

			// AJAX the page with fid as argument
			$.post('/ajax/productcolumn', {fid: result}, function(data) {
				$('#rightContent').html(data);

				// attach details event handlers for AJAX updating
				AttachDetails();

				// select and copy share link on input box click
				$('#productURL').tooltip({placement:'top'});

				// autoselect all the input boxes in the right side menu on click
				$('.rightSideMenu input').click(function() {
					this.select();
				});
			});	
		}
	} else {
		console.error("upload error!");
		
		// Redirect to error page
		window.location.href = "/error";
	}
}

// file upload handler
$('.file-button').change(function() {
	// disable the file selection button
	$('#uploadButton').attr('disabled', 'disabled');

	// change the button to show loading animation
	$('#uploadButton').addClass('hovered');
	$('#uploadButton').html('<img src="/img/loader/dash-upload.gif"/>Uploading..');

	// finally submit the form through hidden button
	$('#homeUpload').submit();
});
