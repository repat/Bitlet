
function DisplayProducts() {
	// toggle button states
	$('#purchasesBtn').removeClass('active');
	$('#productsBtn').addClass('active');

	// clear the table
	// TODO: Add loading animation
	$(".dashTable").html('');

	// run AJAX query
	$(".dashTable").load("/ajax/products");
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
}

$('#productsBtn').click(DisplayProducts);
$('#purchasesBtn').click(DisplayPurchases);

// we want to display products by default
DisplayProducts();

