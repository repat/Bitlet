
// input change flags
var nameChanged = false;

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
		var type = $("#categoryInput").val().toLowerCase();
		$.extend(args, {type: type});
		break;
	case "param":
		//TODO: Generate param
		break;
	}

	$.post('/ajax/updatecolumn', args,
		function(data) {
			console.log("server updated with new "+input);
		}, "json");	
}

// attach details hander to inputs
function AttachDetails() 
{
	$("#name").blur(function() {
		UpdateDetails("name");
		// update the name field in the middle row also
		$(".selected .nameTd #big").text($("#name").val());
	}).change(function() {
		nameChanged = true;
	});

	$("#price").blur(function() {
		UpdateDetails("price");
	});

	$("#descrInput").blur(function() {
		UpdateDetails("descr");
	});

	$("#categoryInput").change(function() {
		UpdateDetails("type");
	});
}

// attach name changed interval
setInterval(function() {
	if(nameChanged == true) {
		nameChanged = false;
		UpdateDetails("name");
		// update the name field in the middle row also
		$(".selected .nameTd #big").text($("#name").val());
	}
}, 500);

