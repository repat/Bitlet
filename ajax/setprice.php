<?
	$fid = $_POST['fid'];
	$price = $_POST['price'];

	SetPrice($fid, $price);

	// send results
	echo json_encode(array("price"=>$price));
?>

