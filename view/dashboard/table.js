
function DisplayProducts() {
	// run AJAX query
	$.post("/ajax/products", 
		function(data) {
			$("dashTable").html(data);
		}, "html");
}

function DisplayPurchases() {
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

