function showEdit() {
	// wire up the buttons to dismiss the modal when shown
	$("#EditModal").bind("show", function() {
		$("#EditModal a.btn").click(function(e) {
			// do something based on which button was clicked
			// we just log the contents of the link element for demo purposes
			console.log("button pressed: "+$(this).html());
	
			// hide the dialog box
			$("#EditModal").modal('hide');
		});
	});
	
	// remove the event listeners when the dialog is hidden
	$("#EditModal").bind("hide", function() {
		// remove event listeners on the buttons
		$("#EditModal a.btn").unbind();
	});
	
	// finally, wire up the actual modal functionality and show the dialog
	$("#EditModal").modal({
	  "backdrop"  : "static",
	  "keyboard"  : true,
	  "show"      : true    // this parameter ensures the modal is shown immediately
	});
};

