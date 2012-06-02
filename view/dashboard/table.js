
function DisplayProducts() {
	// toggle button states
	$('#purchasesBtn').removeClass('active');
	$('#productsBtn').addClass('active');

	// run AJAX query
	$.post("/ajax/products", 
		function(data) {
			$("dashTable").html(data);
		}, "html");
}

function DisplayPurchases() {
	// toggle button states
	$('#purchasesBtn').addClass('active');
	$('#productsBtn').removeClass('active');

	// run AJAX query
	$.post("/ajax/purchases", 
		function(data) {
			$("dashTable").html(data);
		}, "html");
}

$('#productsBtn').click(DisplayProducts);
$('#purchasesBtn').click(DisplayPurchases);

// we want to display products by default
DisplayProducts();

