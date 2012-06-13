// enable submit button loading state
$("#createAccountSubmit").button();

// Attach the submit button to the create account functions 
 $("#createAccountSubmit").click(function(event) {

			name = $("#name").val();
			email = $("#email").val();
			var password = $("#password1").val(); 

			// Send the data using post and put the results in a div
			$.post("/ajax/createAccount", {name:name, email:email, password:password},
				function(data) {
					//console.log('reset status: '+data.success);
					$("#createAccountSubmit").button('reset');
					if(data.success == true) {
						window.location = "/dashboard";		
					} else {
						console.log('fuck there was an error');
						window.location = "/404";
					}
				}, "json");
		
	// clear form
	$('').val('');
});
