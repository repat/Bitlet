<?
	$path = $_SERVER['DOCUMENT_ROOT'];

	include $path.'/lib/db.php';

	$fid = $_POST['fid'];
	$price = $_POST['price'];

	$db = Connect();
	SetPrice($fid, $price);
	Disconnect($db);

	// send results
	echo json_encode(array("price"=>$price));
	exit();
?>

