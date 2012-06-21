
// input change flags
var nameChanged = false;
var priceChanged = false;
var descrChanged = false;
var paramChanged = false;

// nic text editor instance
var editor = null;

var editorConfig = {iconsPath: '/img/nicEditorIcons.gif', maxHeight: 365,
	buttonList: ['bold', 'italic', 'underline', 'left', 'right', 'justify', 'ol', 'ul', 
				'subscript', 'superscript', 'indent', 'outdent', 'hr', 'h1', 'h2', 'p']};

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
	// attach thumbnail uploader
	$('.thumb-button').change(ThumbChange);

	$("#name").change(function() {
		UpdateDetails("name");
		// update the name field in the middle row also
		$(".selected .nameTd #big").text($("#name").val());
	}).keydown(function() {
		nameChanged = true;
	});

	$("#price").change(function() {
		UpdateDetails("price");
	}).keydown(function() {
		priceChanged = true;
	});

	// setup rich text editor
	editor = new nicEditor(editorConfig).panelInstance('descrInput');

	editor.addEvent('focus', function() {
		// make the thumbnail smaller so we'll have more room for editor
		$('.productHead').animate({height:100}, rightAnimationSpeed);
		$('.productInfo').animate({height:390}, rightAnimationSpeed);
	}).addEvent('key', function() {
		descrChanged = true;
	});

	// we need to catch events from the main div because the event listener for niceditor sucks
	$(".nicEdit-main").keypress(function() {
		descrChanged = true;
	}).blur(function() {
		UpdateDetails("descr");
		// make the thumbnail big again
		$('.productHead').animate({height:290}, rightAnimationSpeed);
		$('.productInfo').animate({height:200}, rightAnimationSpeed);
	});

	$("#categoryInput").change(function() {
		UpdateDetails("type");
	});
}

function ExecuteDelete()
{
	console.log("deleting file fid "+fid);
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

