
var tableSelected;

/*** table AJAX functions ***/
function DisplayProducts() {
	// toggle button states
	$('#purchasesBtn').removeClass('active');
	$('#productsBtn').addClass('active');

	// clear the table
	// TODO: Add loading animation
	$(".dashTable").html('');

	// run AJAX query
	$(".dashTable").load("/ajax/products");

	// set state
	tableSelected = 0;
}

function DisplayPurchases() {
	// toggle button states
	$('#purchasesBtn').addClass('active');
	$('#productsBtn').removeClass('active');

	// clear the table
	// TODO: Add loading animation
	$(".dashTable").html('');

	// run AJAX query
	$(".dashTable").load("/ajax/purchases");

	// set state
	tableSelected = 1;
}

$('#productsBtn').click(DisplayProducts);
$('#purchasesBtn').click(DisplayPurchases);

// we want to display products by default
DisplayProducts();

/*** table right column functions ***/
function SelectRow() {
	// products selected
	if(tableSelected == 0) {
	} else {
	}
}

$('.dashTable li').live('click', function () {
	// figure out which table was selected
	var fid = $(this).attr('title');

	// AJAX the page with fid as argument
	$.post('/ajax/itemdetails', {fid: fid}, function(data) {
		$('.rightSideMenu').html(data);
	});	
});

