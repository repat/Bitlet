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


$fid = $_POST['fid'];

$db = Connect();
$name = GetFileFromId($fid);
IncrementDownloads($fid);
Disconnect($db);

?>

<div class="container mid">
	<button class="btn btn-large btn-primary" href="download.php?n=<? echo $name;?>">download!</button>
</div>

</body>

<? include "$path/view/footer.php"; ?>
</html>

