var domains = ['hotmail.com', 'gmail.com', 'aol.com', 'yahoo.com'];
$('#email').keyup(function() {
		console.log("blur");
	  $(this).mailcheck({
			domains: domains,   
			suggested: function(element, suggestion) {
				$('.email-suggestion').html('Did you mean '+suggestion.address+'@'+'<strong>'+suggestion.domain+'</strong>?').show();
			 },
			 empty: function(element) {
				$('.email-suggestion').html('').hide();  
			 }
	  });
});

