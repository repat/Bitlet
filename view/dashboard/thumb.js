function ThumbUploadDone(result) {
	if(result) {
		console.log("Thumb upload done!");

		// enable thumb upload button
		$('.thumb-button').removeAttr("disabled");
		$('#newthumb').removeAttr("disabled");

		$('#newthumb').html('New Thumbnail');
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
function ThumbChange() 
{
	// disable the file selection button
	$('#newthumb').attr('disabled', 'disabled');

	// change the button to show loading animation
	$('#newthumb').html('Uploading..');

	// finally submit the form through hidden button
	$('#thumbUpload').submit();
}
