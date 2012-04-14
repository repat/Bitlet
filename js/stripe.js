
var test_key = 'pk_DUnHd0SiqSyqP0zf1Ehps7gdDjS7r';
var live_key = 'pk_HsbDXewHwzHrCV0WHZUsnBmdidAiM';
Stripe.setPublishableKey(test_key);

$(document).ready(function() {
	$("#payment-form").submit(function(event) {

		// disable the submit button to prevent repeated clicks
		$('.submit-button').attr("disabled", "disabled");

		Stripe.createToken({
			number: $('.card-number').val(),
			cvc: $('.card-cvc').val(),
			exp_month: $('.card-expiry-month').val(),
			exp_year: $('.card-expiry-year').val()
		}, stripeResponseHandler);

		// prevent the form from submitting with the default action
		return false;
	});
});

function stripeResponseHandler(status, response) {
    if (response.error) {
		console.log("payment processing error");
        // show the errors on the form
        $(".payment-errors").text(response.error.message);
		// enable button to allow submissions again
		$(".submit-button").removeAttr("disabled");
    } else {
		console.log("payment processing successful");
        var form$ = $("#payment-form");
        // token contains id, last4, and card type
        var token = response['id'];
        // insert the token into the form so it gets submitted to the server
        form$.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
        // and submit
        form$.get(0).submit();

		// POST to download link
		$("#go-download").get(0).submit();
    }
}

