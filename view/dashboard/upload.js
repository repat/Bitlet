function UploadDone(result) {
	if(result) {
		console.log("upload done!");

		// enable upload button
		$('.file-button').removeAttr("disabled");
		$('#uploadBbutton').removeAttr("disabled");

		// change the button to show loading animation
		$('#uploadButton').html('<img src="/img/upload.png"/>New Item');

		// if currently viewing products table, reload the table
		if(tableSelected == 0) {
			DisplayProducts();

			// start sizing the right side container
			ExpandRight();
			$('.dashTable li[title="'+result+'"]').addClass('selected');

			// AJAX the page with fid as argument
			$.post('/ajax/productcolumn', {fid: fid}, function(data) {
				$('#rightContent').html(data);

				// run category function
				EditCategory();
			});	
		}
	} else {
		console.error("upload error!");
		
		//TODO: Redirect to error page
	}
}

// file upload handler
$('.file-button').change(function() {
	// disable the file selection button
	$('#uploadButton').attr('disabled', 'disabled');

	// change the button to show loading animation
	$('#uploadButton').html('<img src="/img/loading.gif"/>Uploading..');

	// finally submit the form through hidden button
	$('#homeUpload').submit();
});
