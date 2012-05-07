<?
	// send results
	function SendResult($result)
	{
		echo '
		<script language="javascript" type="text/javascript">
			   window.PriceChanged('.$result.');
		</script>';
		exit();
	}

	$path = $_SERVER['DOCUMENT_ROOT'];

	include $path.'/lib/db.php';

	$fid = $_POST['fid'];
	$price = $_POST['price'];

	$db = Connect();
	SetPrice($fid, $price);
	Disconnect($db);

	// send results
	SendResult($price);
?>

