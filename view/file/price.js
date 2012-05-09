
/* attach a submit handler to the form */
$("#price-form").submit(function(event) {

	/* stop form from submitting normally */
	event.preventDefault(); 

	/* get some values from elements on the page: */
	var $form = $(this);
	var price = $form.find( 'input[name="price"]' ).val();
	var fid = $form.find( 'input[name="fid"]' ).val();
	var url = $form.attr( 'action' );

	/* Send the data using post and put the results in a div */
	$.post(url, {price: price, fid: fid},
		function(data) {
			console.log('price set at '+data.price);
			$('#price').text(data.price);
		}, "json");
});

