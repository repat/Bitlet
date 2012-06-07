
var tableSelected;

/*** table AJAX functions ***/
function DisplayProducts() {
	// toggle button states
	$('#purchasesBtn').removeClass('active');
	$('#productsBtn').addClass('active');

	// scroll to top
	$("html, body").animate({ scrollTop: 0 }, 200);

	// clear the table
	// TODO: Add loading animation
	$('.dashTable').html('');
	$('.rightSideMenu').html('<div id="topBar"></div>');

	// run AJAX query
	$('.dashTable').load('/ajax/products');

	// set state
	tableSelected = 0;
}

function DisplayPurchases() {
	// toggle button states
	$('#purchasesBtn').addClass('active');
	$('#productsBtn').removeClass('active');

	// scroll to top
	$("html, body").animate({ scrollTop: 0 }, 200);

	// clear the table
	// TODO: Add loading animation
	$('.dashTable').html('');
	$('.rightSideMenu').html('<div id="topBar"></div>');

	// run AJAX query
	$('.dashTable').load('/ajax/purchases');

	// set state
	tableSelected = 1;
}

$('#productsBtn').click(DisplayProducts);
$('#purchasesBtn').click(DisplayPurchases);

// we want to display products by default
DisplayProducts();

/*** table right column functions ***/
$('.dashTable li').live('click', function () {
	// figure out which table was selected
	var fid = $(this).attr('title');

	// products selected
	if(tableSelected == 0) {
		// AJAX the page with fid as argument
		$.post('/ajax/productdetails', {fid: fid}, function(data) {
			$('.rightSideMenu').html(data);
		});	
	} else {
		// AJAX the page with fid as argument
		$.post('/ajax/purchasedetails', {fid: fid}, function(data) {
			$('.rightSideMenu').html(data);
		});	
	}
});

