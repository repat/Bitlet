// enable submit button loading state
$("#createAccountSubmit").button();

// Attach the submit button to the create account functions 
$("#createAccountSubmit").click(function(event) {

	// get some values from elements on the page:
	var email = $("#emailToReset").val();

	// Send the data using post and put the results in a div
	$.post("/ajax/createAccount", {email:email},
		function(data) {
			//console.log('reset status: '+data.success);
			$("#resetPassSubBtn").button('reset');
			if(data.success == true) {
					$("#emailToReset").val('');
					$resetMessage = "<div class='alert fade in resetDetailsAlert'><button type='button' class='close' data-dismiss='alert'>x</button><p class='alert-heading'>We have sent a new password to your email. Hope to see you soon!</p></div>";
					$('.resetDetailsAlert').remove();
					$('#resetContent').after($resetMessage);
			} else {
					$("#emailToReset").val('');
					$resetMessage = "<div class='alert alert-block alert-error fade in resetDetailsAlert'><button type='button' class='close' data-dismiss='alert'>x</button><p class='alert-heading'>We couldn't find your email<p></div>";
					$('.resetDetailsAlert').remove();	
					$('#resetContent').after($resetMessage);
			}
		}, "json");

	// clear password input form
	$('#emailToReset').val('');
});

$(document).ready(function(){
	//Variables used to validate the form	
	var name = $("#name");
	var email = $("#email");
	var pass1 = $("#password1");
	var pass2 = $("#password2");
	var domains = ['hotmail.com', 'gmail.com', 'aol.com', 'yahoo.com'];
	
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
		
		var email = $('#email').val();
		//console.log("email val: " + email);

		// emails should be at least 5 characters, and contain a '@' and a '.'
		var aix = email.indexOf('@');
		var dix = email.indexOf('.');
		if(email.length > 4 && aix != -1 && dix != -1 && aix < dix) {
			$('.upload-button').removeAttr('disabled');
			$('.file-button').removeAttr('disabled');
		} else {
			$('.upload-button').attr('disabled', 'disabled'); 
			$('.file-button').attr('disabled', 'disabled'); 
		}

		$(this).mailcheck({
			domains: domains,   
			suggested: function(element, suggestion) {
				$('.email-suggestion')
					.html('Did you mean '+suggestion.address+'@'+'<strong>'+suggestion.domain+'</strong>?').show();
			},
			empty: function(element) {
				$('.email-suggestion').html('').hide();  
			}
		});

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
	
});
