
// disable uplaod button by default
$('.upload-button').attr('disabled', 'disabled'); 
$('.file-button').attr('disabled', 'disabled'); 

var domains = ['hotmail.com', 'gmail.com', 'aol.com', 'yahoo.com'];

$('#email').keyup(function() {
	var email = $(this).val();

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
});

