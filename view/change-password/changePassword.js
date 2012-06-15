$(document).ready(function(){
	//Variables used to validate the form	
	var oldPass = $("#oldPassword");
	var pass1 = $("#newPass1");
	var pass2 = $("#newPass2");
	var subBtn = $("#savePassword");	

	//On blur
	oldPass.blur(validateOldPass);
	pass1.blur(validatePass1);
	pass2.blur(validatePass2);

	function validateOldPass(){
		
		var oldPassIsAOk = $("#passTipOld .isaok");
		var oldPassInvalid = $("#passTipOld .invalid"); 
		console.log("made it this far");	
		//ajax call to valdate against DB
		if(oldPass.val().length > 0){
		console.log("made it this far");	
			var checkpass = oldPass.val();	
			$.post("/ajax/validatePassword", {checkpass:checkpass},
			function(data) {
				if(data.success == false){
					oldPassInvalid.addClass("hide");
		console.log("made it this far");	
					oldPassIsAOk.removeClass("hide");
				} else {
					oldPassInvalid.removeClass("hide");
		console.log("madefail it this far");	
					oldPassIsAOk.addClass("hide");
				}
		
			}, "json");
		}else{
			//do nothing cause they didn't enter anything
		}
		
	}
	function validatePass1(){
		var pass1Tip = $("#passTip1 .tip");
		var pass1Almost = $("#passTip1 .almost");
		var pass1Isaok = $("#passTip1 .isaok");
		var pass1Crazy = $("#passTip1 .crazy");
		
		//it's NOT valid
		if(pass1.val().length ==0){
			pass1Tip.removeClass("hide");
			pass1Almost.addClass("hide");			
			pass1Isaok.addClass("hide");			
			pass1Crazy.addClass("hide");			
			return false;	
		}
		else if(pass1.val().length <5){
			pass1Tip.addClass("hide");
			pass1Almost.removeClass("hide");			
			pass1Isaok.addClass("hide");			
			pass1Crazy.addClass("hide");			
			return false;
		}
		else if(pass1.val().length >15){
			pass1Tip.addClass("hide");
			pass1Almost.addClass("hide");			
			pass1Isaok.addClass("hide");			
			pass1Crazy.removeClass("hide");			
			validatePass2();	
			return true;
		}
		//it's valid
		else{			
			pass1Tip.addClass("hide");
			pass1Almost.addClass("hide");			
			pass1Isaok.removeClass("hide");			
			pass1Crazy.addClass("hide");			
			validatePass2();	
			return true;
		}
	}

	function validatePass2(){
		var pass2Tip = $("#passTip2 .tip");
		var pass2Invalid = $("#passTip2 .invalid");
		var pass2Isaok = $("#passTip2 .isaok");
		
		//are NOT valid
		if( pass1.val() != pass2.val() && pass2.val().length==0 ){
			pass2Tip.removeClass("hide");
			pass2Invalid.addClass("hide");
			pass2Isaok.addClass("hide");	
			return false;
		}
		else if( pass1.val() == pass2.val() && pass2.val().length==0 ){
			pass2Tip.addClass("hide");
			pass2Invalid.addClass("hide");
			pass2Isaok.addClass("hide");	
			return false;
		}
		else if(pass1.val() != pass2.val()){	
			pass2Tip.addClass("hide");
			pass2Invalid.removeClass("hide");
			pass2Isaok.addClass("hide");	
			return false;
		}	
		//are valid
		else{
			pass2Tip.addClass("hide");
			pass2Invalid.addClass("hide");
			pass2Isaok.removeClass("hide");	
			return true;
		}
	}


	// enable submit button loading state
	$("#savePassword").button();

	// Attach the submit button to the create account functions 
	 $("#savePassword").click(function(event) {

			if(validateOldPass() && validatePass1() && validatePass2()){
			
				var password = $("#password1").val(); 

				// Send the data using post and put the results in a div
				$.post("/ajax/changePassword", {password:password},
					function(data) {
						//console.log('reset status: '+data.success);
						$("#createAccountSubmit").button('reset');
						if(data.success == true) {
						//do something to let them know it worked		
						} else {
						//do something to let them know it failed	
						}
					}, "json");
			
			} else{
				console.log('bad');	
			}


		// clear form
		$('').val('');
	});


});
