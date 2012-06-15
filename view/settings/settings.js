// enable submit button loading state
$("#saveButton").button();

// Attach the submit button to the create account functions 
 $("#saveButton").click(function(event) {

	var	email = $("#email").val();
	var	name = $("#name").val();
	var phone = $("#phone").val();
	var website = $("#website").val();
	var bio = $("#bioBox").val();
	var emailPurchase = $("#optionsCheckboxList1").is(':checked'); 
	var emailWeekly = $("#optionsCheckboxList2").is(':checked');  
	console.log(name+' '+phone+' '+website+' '+bio+' '+emailPurchase+' '+emailWeekly);	
	// Send the data using post and put the results in a div
	$.post("/ajax/settings", {email:email, name:name, phone:phone, website:website, bio:bio, emailPurchase:emailPurchase, emailWeekly:emailWeekly},
		function(data) {
			//console.log('reset status: '+data.success);
			$("#saveButton").button('reset');
			if(data.success == true) {
				//console.log('we fucking did it');		
				$('.alert').remove();	
				var resetMessage = "<div class='alert fade in resetDetailsAlert'><button type='button' class='close' data-dismiss='alert'>x</button><p class='alert-heading'>Thank you for updating you settings.</p></div>";
				$('#saveButton').after(resetMessage);
			
			} else {
				//console.log('we fucked up');		
				$('.alert').remove();	
				var resetMessage = "<div class='alert alert-block alert-error fade in resetDetailsAlert'><button type='button' class='close' data-dismiss='alert'>x</button><p class='alert-heading'>There was an error in saving your settings, please try again.<p></div>";
				$('#saveButton').after(resetMessage);
			}
		}, "json");
});
