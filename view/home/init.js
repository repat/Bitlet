var domains = ['hotmail.com', 'gmail.com', 'aol.com', 'yahoo.com'];

function CheckEmail() {
	var email = $('#email').val();
	//console.log("email val: " + email);

	if(EmailValid(email)) {
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
};

// disable uplaod button by default
$('.upload-button').attr('disabled', 'disabled'); 
$('.file-button').attr('disabled', 'disabled'); 

$('#email').keyup(CheckEmail);
var mailCheckRun = setInterval(CheckEmail.bind($('#email')), 250);
		
