var domains = ['hotmail.com', 'gmail.com', 'aol.com', 'yahoo.com'];
$('#email').keyup(function() {
		console.log("blur");
	  $(this).mailcheck({
			domains: domains,   
			suggested: function(element, suggestion) {
				$('.email_suggestion').html('Did you mean <a class="address">'+suggestion.address+'@'+'<strong>'+suggestion.domain+'</strong></a>?').show();
			 },
			 empty: function(element) {
				//$('.email-suggestion').html('').hide();  
			 }
	  });
});

