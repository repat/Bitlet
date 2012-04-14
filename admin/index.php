<?
$path = $_SERVER['DOCUMENT_ROOT'];
?>

<!DOCTYPE html>
<html>
<? include "$path/view/header.php"; ?>

<body>
<? 

include "$path/view/nav.php";
include "$path/php/model.php";

$uid = $_GET['u'];
$db = Connect();

$credits = GetCredits($uid);
echo $credits;

$files = GetFids($uid);

// iterate through files and display info for each file
foreach($files as $file) {
	$finfo = GetFileInfo($file);

	$name = $finfo['name'];
	$price = $finfo['price'];
	$downloads = $finfo['downloads'];

	echo '<img src="'$name'" alt=""/> ';
	echo $price;
	echo $downloads;
}

Disconnect($db);

?>

</body>
<? include "$path/view/footer.php"; ?>
</html>

