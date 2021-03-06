
var tableSelected;
var fid;
var rightAnimationSpeed = 300;

function ExpandRight() {
	var w = 550;
	$('.rightSideContainer').animate({width: w}, rightAnimationSpeed);
	$('.rightSideFrame').animate({width: w}, rightAnimationSpeed);
	$('.rightSideContainer').css({'borderLeftWidth': 1});
}

function ContractRight() {
	var w = 0;
	$('.rightSideContainer').animate({width: w}, rightAnimationSpeed);
	$('.rightSideFrame').animate({width: w}, rightAnimationSpeed);
	$('.rightSideContainer').css({'borderLeftWidth': 0});
}

/*** FUNCTION DECLARATIONS ***/
function DisplayProducts(preselect) {
	// toggle button states
	$('#purchasesBtn').removeClass('active');
	$('#productsBtn').addClass('active');

	// scroll to top
	$("html, body").animate({scrollTop: 0}, 200);

	// clear the table
	// TODO: Add loading animation
	$('.dashTable').html('');
	$('#rightContent').html('');
	// reset right side container size
	ContractRight();

	// run AJAX query
	$.post('/ajax/products', function(data) {
		$('.dashTable').html(data);
		if(preselect) {
			// select the table row
			$('.dashTable [title='+preselect+']').addClass('selected');
		}
	}, 'html');

	// set state
	tableSelected = 0;
}

function DisplayPurchases(preselect) {
	// toggle button states
	$('#purchasesBtn').addClass('active');
	$('#productsBtn').removeClass('active');

	// scroll to top
	$("html, body").animate({scrollTop: 0}, 200);

	// clear the table
	// TODO: Add loading animation
	$('.dashTable').html('');
	$('#rightContent').html('');
	// reset right side container size
	ContractRight();

	// run AJAX query
	$.post('/ajax/purchases', function(data) {
		$('.dashTable').html(data);
		if(preselect) {
			// select the table row
			$('.dashTable [title='+preselect+']').addClass('selected');
		}
	}, 'html');

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
	}, 'html');
}

/*** EXECUTE ***/

$('#productsBtn').click(DisplayProducts);
$('#purchasesBtn').click(DisplayPurchases);

// we want to display products by default
// TODO: should make this a bit more intelligent
DisplayProducts();

// right is contracted by default
ContractRight();

/*** table right column functions ***/
$('.dashTable li').live('click', function (e) {
	e.stopPropagation();

	// clear right content
	// TODO: loading animation needs to go here
	$('#rightContent').html('');

	// see if the right side is expanded, if it is, contract right
	if($('.selected').length > 0 && $('.selected')[0] == this) {
		ContractRight();
		// disselect any currently selected items
		$('.selected').removeClass('selected');
	} else {	// else, expand right side
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

				// attach details event handlers for AJAX updating
				AttachDetails();

				// select and copy share link on input box click
				$('#productURL').tooltip({placement:'top'});

				// autoselect all the input boxes in the right side menu on click
				$('.rightSideMenu input').click(function() {
					this.select();
				});
			}, 'html');	
		} else {
			// AJAX the page with fid as argument
			$.post('/ajax/purchasecolumn', {fid: fid}, function(data) {
				$('#rightContent').html(data);
			}, 'html');	
		}
		return false;	// also for stopping propagation
	}
});

// when you click anywhere in the document, the right menu will contract
$(document).click(function(e) {
	// if the click is not on the right side container, contract
	if(!$('.rightSideContainer').is(':hover')) {
		ContractRight();
		// disselect any currently selected items
		$('.selected').removeClass('selected');
	}
});

