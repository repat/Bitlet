
// input change flags
var nameChanged = false;
var priceChanged = false;
var descrChanged = false;
var paramChanged = false;

// nic text editor instance
var editor;

var editorConfig = {iconsPath: '/img/nicEditorIcons.gif', maxHeight: 155,
	buttonList: ['bold', 'italic', 'underline', 'left', 'right', 'justify', 'ol', 'ul', 
				'subscript', 'superscript', 'indent', 'outdent', 'hr', 'image', 'fontFormat']}

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
		var descr = editor.instanceById('descrInput').getContent();
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
	}).keydown(function() {
		nameChanged = true;
	});

	$("#price").blur(function() {
		UpdateDetails("price");
	}).keydown(function() {
		priceChanged = true;
	});

	// setup rich text editor
	editor = new nicEditor(editorConfig).panelInstance('descrInput');

	editor.addEvent('blur', function() {
		UpdateDetails("descr");
	}).addEvent('key', function() {
		descrChanged = true;
	});
	$(".nicEdit-main").keypress(function() {
		descrChanged = true;
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
	if(priceChanged == true) {
		priceChanged = false;
		UpdateDetails("price");
	}
	if(descrChanged == true) {
		descrChanged = false;
		UpdateDetails("descr");
	}
}, 500);

