
var anim_time = 200;		// animation time in ms
var test_key = 'pk_DUnHd0SiqSyqP0zf1Ehps7gdDjS7r';
var live_key = 'pk_HsbDXewHwzHrCV0WHZUsnBmdidAiM';
Stripe.setPublishableKey(test_key);
var getIt = $("#getFile");
getIt.click(showBuyDetails);

//Functio that shows the but details
function showBuyDetails(){
	getIt.remove();
	$('#payment').show(anim_time);
}

$(document).ready(function() {
	$("#payment-form").submit(function(event) {
		// disable the submit button to prevent repeated clicks
		$('.submit-button').attr("disabled", "disabled");

		// check email
		var email = $('#BuyerEmail').val();
		if(!EmailValid(email)) {
			// TODO: Style the payment errors better
			$('.alert').remove();	
			var resetMessage = "<div class='alert alert-block alert-error fade in changePasswordAlert'><button type='button' class='close' data-dismiss='alert'>x</button><p class='alert-heading'>Please enter a valid email address<p></div>";
			$('#payment-form').after(resetMessage);
			
			return false;
		}

		// disable buyer email so it won't be accidentally changed
		$('#BuyerEmail').attr("readonly", "true");
		
		Stripe.createToken({
			number: $('.card-number').val(),
			cvc: $('.card-cvc').val(),
			exp_month: $('.card-expiry-month').val(),
			exp_year: '20' + $('.card-expiry-year').val()
		}, stripeResponseHandler);

		// prevent the form from submitting with the default action
		return false;
	});
});

function stripeResponseHandler(status, response) {
    if (response.error) {
		console.log("payment processing error");
        // show the errors on the form
		$('.alert').remove();	
		var resetMessage = "<div class='alert alert-block alert-error fade in changePasswordAlert'><button type='button' class='close' data-dismiss='alert'>x</button><p class='alert-heading'>There was an error processing your credit card. Please try again.<p></div>";
		$('#payment-form').after(resetMessage);
		
		// enable button to allow submissions again
		$(".submit-button").removeAttr("disabled");
		$('#BuyerEmail').removeAttr("readonly");
    } else {
		console.log("payment processing successful");
        // token contains id, last4, and card type
        var token = response['id'];

		// hide payment stuff
		$("#BuyerEmail").hide(anim_time);
		$("#NumLabel").hide(anim_time);
		$("#ExpLabel").hide(anim_time);
		$("#CvLabel").hide(anim_time);
		$(".alert").hide(anim_time);
		$(".card-number").hide(anim_time);
		$(".card-cvc").hide(anim_time);
		$(".card-expiry-month").hide(anim_time);
		$(".card-expiry-year").hide(anim_time);
		$("#purchaseButton").hide(anim_time);

		// reword header
		$("#paymentDetails").text("Download:");

		// AJAX in to save purchase
		$.post('/ajax/newpurchase', {email: $('#BuyerEmail').val(), fid: $('#dfid').val(), token: token},
				function(data) {
					// after the purchase is done
					console.log('new purchase added');
					$('#go-download').get(0).submit();

					// Unhide download form
					$('#post-pay').show(anim_time);
					$('#ddl').show(anim_time);
				}, 'json');
    }
}
