
var tableSelected;
var fid;
var rightAnimationSpeed = 300;

function ExpandRight() {
	$('.rightSideContainer').animate({width: 550}, rightAnimationSpeed);
	$('#topBar').animate({width: 550}, rightAnimationSpeed);
	$('#topDiv').animate({width: 308}, rightAnimationSpeed);
}

function ContractRight() {
	$('.rightSideContainer').animate({width: 300}, rightAnimationSpeed);
	$('#topBar').animate({width: 300}, rightAnimationSpeed);
	$('#topDiv').animate({width: 558}, rightAnimationSpeed);
}

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
	$('#rightContent').html('');
	// reset right side container size
	ContractRight();

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
	$('#rightContent').html('');
	// reset right side container size
	ContractRight();

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
// TODO: should make this a bit more intelligent
DisplayProducts();

/*** table right column functions ***/
$('.dashTable li').live('click', function (e) {
	e.stopPropagation();
	// start sizing the right side container
	ExpandRight();

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
			$('#rightContent').html(data);

			// run category function
			EditCategory();
		});	
	} else {
		// AJAX the page with fid as argument
		$.post('/ajax/purchasecolumn', {fid: fid}, function(data) {
			$('#rightContent').html(data);
		});	
	}
	return false;	// also for stopping propagation
});

// when you click anywhere in the document, the right menu will contract
$(document).click(function(e) {
	// if the click is not on the right side container, contract
	if(!$('.rightSideContainer').is(':hover')) {
		ContractRight();
	}
});

