
var tableSelected;
var fid;

/*** FUNCTION DECLARATIONS ***/
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

function CollapseRight() {
	$(".collapse").collapse();
}

function EditCategory() {
	var selected = $("#categoryInput option:selected").text();

	$.post('/ajax/productdetails', {fid: fid, selected: selected}, function(data) {
		// file the details table
		$('.detailsTable').html(data);

		// select and copy share link on input box click
		$('#productURL').tooltip({placement:'bottom'});
		$('#productURL').click(function() {
			this.select();
		});
	});
}

/*** EXECUTE ***/

$('#productsBtn').click(DisplayProducts);
$('#purchasesBtn').click(DisplayPurchases);

// we want to display products by default
DisplayProducts();

/*** table right column functions ***/
$('.dashTable li').live('click', function () {
	// figure out which table was selected
	fid = $(this).attr('title');

	// mark the table as selected
	$('.dashTable li').each(function() {
		$(this).removeClass('selected');
	});
	$(this).addClass('selected');

	// products selected
	if(tableSelected == 0) {
		// AJAX the page with fid as argument
		$.post('/ajax/productcolumn', {fid: fid}, function(data) {
			$('.rightSideMenu').html(data);

			// run category function
			EditCategory();
		});	
	} else {
		// AJAX the page with fid as argument
		$.post('/ajax/purchasecolumn', {fid: fid}, function(data) {
			$('.rightSideMenu').html(data);
		});	
	}
});

