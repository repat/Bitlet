
// grab details from all the input fields and submit AJAX call
// argument specifies an input field to update
function UpdateDetails(input)
{
	console.log("updating "+input);

	// build argument list
	var args = {fid: fid};

	switch(input) 
	{
	case "name":
		var name = $("#name").val();
		$.extend(args, {name: name});
		break;
	case "price":
		var price = $("#price").val();
		$.extend(args, {price: price});
		break;
	case "descr":
		var descr = $("#descrInput").val();
		$.extend(args, {description: descr});
		break;
	case "type":
		var descr = $("#categoryInput").val().toLowerCase();
		$.extend(args, {type: type});
		break;
	case "param":
		//TODO: Generate param
		break;
	}

	$.post('/ajax/updatecolumn', args,
		function(data) {
			$('#rightContent').html(data);

			// run category function
			EditCategory();
		});	
}

$("#name").blur(function() {
	UpdateDetails("name");
});

$("#price").blur(function() {
	UpdateDetails("price");
});

$("#descrInput").blur(function() {
	UpdateDetails("descr");
});

$("#categoryInput").blur(function() {
	UpdateDetails("type");
});

