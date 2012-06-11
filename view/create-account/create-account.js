
$(document).ready(function(){
	//Variables used to validate the form	
	var name = $("#name");
	var email = $("#email");
	var pass1 = $("#password1");
	var pass2 = $("#password2");
	var subBtn = $("#createAccountSubmit");	
	var goodEmail = null; 

	//On blur
	name.blur(validateName);
	email.blur(validateEmail);
	pass1.blur(validatePass1);
	pass2.blur(validatePass2);
	//On key press
	name.keyup(validateName);
	pass1.keyup(validatePass1);
	pass2.keyup(validatePass2);

	function validateName(){  
		if(name.val().length < 3){
			var nameTip = $("#nameTip .tip");
			nameTip.removeClass("hide");
			console.log(nameTip);
			var nameTip1 = $("#nameTip .isaok");
			nameTip1.addClass("hide");
			console.log(nameTip1);
			return false;
		}
		else{
			var nameTip = $("#nameTip .tip");
			nameTip.addClass("hide");
			var nameTip1 = $("#nameTip .isaok");
			nameTip1.removeClass("hide");
			return true;
		}
	}
	
	function validateEmail(){
		var emailVal = $('#email').val();
		//console.log("email val: " + emailVal);

		// emails should be at least 5 characters, and contain a '@' and a '.'
		var aix = emailVal.indexOf('@');
		var dix = emailVal.indexOf('.');
		if(emailVal.length == 0){
			$('#emailTip .invalid').addClass('hide'); 
			$('#emailTip .tip').removeClass('hide'); 
			$('#emailTip .isaok').addClass('hide'); 
			$('#emailTip .taken').addClass('hide'); 
			goodEmail = false;	
			return;	
		}
		else if(emailVal.length > 4 && aix != -1 && dix != -1 && aix < dix) {
			//check the database if the email exists
			//console.log("email val: " + emailVal);
			$.post("/ajax/validateCreateAccount", {email:emailVal},
				function(data) {
					//console.log('reset status: '+data.success);
					if(data.success == true) {
						$('#emailTip .invalid').addClass('hide'); 
						$('#emailTip .tip').addClass('hide'); 
						$('#emailTip .isaok').removeClass('hide'); 
						$('#emailTip .taken').addClass('hide');
						goodEmail = true;	
					} else {
						$('#emailTip .invalid').addClass('hide'); 
						$('#emailTip .tip').addClass('hide'); 
						$('#emailTip .isaok').addClass('hide'); 
						$('#emailTip .taken').removeClass('hide'); 
						goodEmail = false;
					}
				}, "json");
			//If email does exists offer to send to login or recover page
			//If it does not exist then say it looks good
			return;	
		
		} else {
			//Not valid email 	
			$('#emailTip .invalid').removeClass('hide'); 
			$('#emailTip .tip').addClass('hide'); 
			$('#emailTip .isaok').addClass('hide'); 
			$('#emailTip .taken').addClass('hide'); 
			goodEmail = false;	
			return;	
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
	$("#createAccountSubmit").button();

	// Attach the submit button to the create account functions 
	 $("#createAccountSubmit").click(function(event) {

			if(validateName() && (goodEmail == true) && validatePass1() && validatePass2()){
			
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
			
			} else{
				console.log('bad');	
			}


		// clear form
		$('').val('');
	});


});
