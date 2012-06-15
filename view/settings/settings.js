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
				console.log('we fucking did it');		
			} else {
				console.log('we fucked up');		
			}
		}, "json");
});
